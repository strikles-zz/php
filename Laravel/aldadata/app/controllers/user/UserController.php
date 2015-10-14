<?php

class UserController extends CRUDController {

    /**
     * User Model
     * @var User
     */
    protected $user;

    /**
     * Inject the models.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct();
        $this->user = $user;

        $this->name       = 'users';
        $this->modelName  = 'User';
        $this->singleName = 'user';

        $this->validationRules = [
            'username'   => 'required|unique:users',
            'email'      => 'required|email',
            'password'   => 'required|between:4,11|confirmed',
            'first_name' => 'required|max:40',
            'last_name'  => 'required|max:40',
        ];

        $this->validationMessages = [
            'email'       => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address'
        ];

        $this->dataTableColumns = ['id', 'username'];
    }

    // This is for the typeahead lookups, restfull routes are configured in routes.php (/api/v1/)
    public function index() {

        //$datums = //Role::find(Config::get('aldadata.promoter_role_id'))->users()->selectRaw('users.id, users.username AS value');
        $datums = User::selectRaw('users.id, users.username AS value, users.email, users.first_name, users.last_name, assigned_roles.role_id')
                    ->join('assigned_roles', 'users.id', '=','assigned_roles.user_id');

        //Debugbar::info($datums);
        if (Input::get('q'))
        {
            $queryTokens = explode(' ', Input::get('q'));
            foreach ($queryTokens as $queryToken)
            {
                $datums = $datums->where(function($query) use ($queryToken)
                {
                    //eerror_log("Test - ".$queryToken);
                    $query->whereRaw("users.email LIKE ? OR users.first_name LIKE ? OR users.last_name LIKE ? ", array('%'.$queryToken.'%','%'.$queryToken.'%','%'.$queryToken.'%'))
                        ->whereRaw('(assigned_roles.role_id = 3 or assigned_roles.role_id = 4)');
                });
            }
        }

        $datums = $datums->distinct()->take(50)->get();
        $datums_out = [];
        foreach ($datums as $datum)
        {
            $datum_out               = [];
            $datum_out['id']         = $datum->id;
            $datum_out['first_name'] = $datum->first_name;
            $datum_out['last_name']  = $datum->last_name;
            $datum_out['email']      = $datum->email;
            $datum_out['value']      = $datum->value;
            $datum_out['tokens']     = array_merge(explode(' ', $datum->value), [$datum->value]);
            $datums_out[]            = $datum_out;
        }

        return Response::json($datums_out);
    }

    public function populateForm($model = false) {

        if($model)
        {
            $company = $model->company;
            $events  = $model->events;
            $types   = $model->types;

            Former::populate($model);
        }
        else
        {
            $input = Input::All();
            Former::populate($input);
        }
    }

    /**
     * Users settings page
     *
     * @return View
     */
    public function getIndex()
    {
        list($user,$redirect) = $this->user->checkAuthAndRedirect('user');
        if($redirect){return $redirect;}

        $title = Lang::get('admin/users/title.user_management');

        $view = 'site/user/index';

        // Show the page
        return View::make($view, compact('user', 'title'));
    }

    public function getCreate()
    {
        // All roles
        $roles               = Role::all();
        // Get all the available permissions
        $permissions         = Permission::all();
        // Selected groups
        $selectedRoles       = Input::old('roles', array());
        // Selected permissions
        $selectedPermissions = Input::old('permissions', array());
        // Title
        $title = "Create a new promotter";
        // Mode
        $mode = 'create';

        // Show the page
        return View::make('site/user/create', compact('title', 'mode'));
    }

    public function getEdit($user)
    {
        if ( $user->id )
        {
            // Title
            $title = Lang::get('admin/users/title.user_update');
            // mode
            $mode = 'edit';

            $this->populateForm($user);

            return View::make('site/user/edit', compact('user', 'title', 'mode'));
        }
        else
        {
            return Redirect::to('user')->with('error', Lang::get('admin/users/messages.does_not_exist'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate()
    {
        $all_input = Input::all();
        $user = new User();

        $user->username   = Input::get( 'email' );
        $user->email      = Input::get( 'email' );
        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $tmp_rnd_psswd               = Str::random(8);
        $user->password              = $tmp_rnd_psswd;
        $user->password_confirmation = $tmp_rnd_psswd;
        $user->confirmed             = 1;
        $user->confirmation_code     = "";

        eerror_log(json_encode($user));

        // Permissions are currently tied to roles. Can't do this yet.
        // $user->permissions = $user->roles()->preparePermissionsForSave(Input::get( 'permissions' ));
        // Save if valid. Password field will be hashed before save
        try
        {
            $user->save();
            eerror_log('user saved OK');
        }
        catch (\Exception $e)
        {
            eerror_log('Fail '.json_encode($user));
        }

        if ($user->id)
        {
            // Create token
            $token = md5( uniqid(mt_rand(), true) );
            $values = array(
                'email'=> $user->email,
                'token'=> $token,
                'created_at'=> new \DateTime
            );

            DB::table('password_reminders')
                ->insert( $values );

            // send password reset email
            Mail::send('emails.auth.reset', array('user' => $user, 'token' => $token), function($message) use ($user, $token)
            {
                $message->to($user->email, $user->username)->subject('Please define your password');
            });

            // make user a promoter
            $user->saveRoles(['4']);

            // attach user types id
            $posted_user_types = Input::get('types');
            eerror_log('Posted types '.json_encode($posted_user_types));
            if(!$posted_user_types)
            {
                $user->types()->attach(5);
            }
            else if((!is_array($posted_user_types) && $posted_user_types !== "5") || (is_array($posted_user_types) && !in_array("5", $posted_user_types)))
            {
                $user->types()->attach($posted_user_types);
            }

            // attach to parent model
            if(Input::get('parent_model'))
            {
                $parent_model = ucfirst(Input::get('parent_model'));
                eerror_log('user has parent '.$parent_model.' : '.Input::get('parent_id'));
                $curr_parent = $parent_model::find((int)Input::get('parent_id'));
                if($curr_parent)
                {
                    eerror_log('parent found - ready to attach '.$parent_model.' : '.Input::get('parent_id'));
                    $this->postAttachChild($curr_parent, 'users', $user->id);
                }
            }

            // populate form
            $this->populateForm($user);

            // return view
            return View::make('site.user.edit')
                ->with('user', $user)
                ->with('title', 'Edit User')
                ->with('success', Lang::get('user/user.user_account_created'));
        }
        else
        {
            // Get validation errors (see Ardent package)
            $all_errors = $user->errors()->all();
            eerror_log('Fail '.json_encode($all_errors).__FILE__.':'.__LINE__);

            $this->populateForm();

            return View::make('site.user.create', compact('title', 'controller'))
                ->withInput(Input::all())
                ->with('title', 'Create User')
                ->with('errors', $all_errors);
        }
    }

    /**
     * User profile
     *
     */
    public function postIndex()
    {
        eerror_log("Posted to Index");
        $user = Confide::user();
        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');
        $password             = Input::get('password');
        $passwordConfirmation = Input::get('password_confirmation');

        if(!empty($password))
        {
            if($password === $passwordConfirmation)
            {
                $user->password = $password;
                // The password confirmation will be removed from model
                // before saving. This field will be used in Ardent's
                // auto validation.
                $user->password_confirmation = $passwordConfirmation;
            }
            else
            {
                // Redirect to the new user page
                return Redirect::to('user/create')
                    ->withInput(Input::except('password','password_confirmation'))
                    ->with('error', Lang::get('admin/users/messages.password_does_not_match'));
            }
        }

        // Save if valid. Password field will be hashed before save
        $edit_status = $user->amend(['first_name' => 'required|max:40','last_name'  => 'required|max:40']);
        if ($edit_status)
        {
            // Redirect with success message, You may replace "Lang::get(..." for your custom message.
            return Redirect::to('user/login')
                ->with( 'success', Lang::get('user/user.user_account_created') );
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all();
            return Redirect::to('user/create')
                ->withInput(Input::except('password'))
                ->with( 'error', $error );
        }
    }

    /**
     * Edits a user
     *
     */
    public function postEdit($user)
    {

        $oldUser = clone $user;

        $user->confirmed  = 1;
        $user->username   = Input::get( 'email' );
        $user->email      = Input::get( 'email' );
        $user->first_name = Input::get('first_name');
        $user->last_name  = Input::get('last_name');

        // The password confirmation will be removed from model
        // before saving. This field will be used in Ardent's
        // auto validation.
        $user->prepareRules($oldUser, $user);

        // Save if valid. Password field will be hashed before save
        $edit_status = $user->amend(['first_name' => 'required|max:40', 'last_name'  => 'required|max:40']);

        // attach user types id
        $posted_user_types = Input::get('types');
        eerror_log("types ".json_encode($posted_user_types));
        if(!$posted_user_types)
        {
            $user->types()->attach(5);
        }
        else
        {
            $user->types()->detach();
            if((!is_array($posted_user_types) && $posted_user_types !== "5") || (is_array($posted_user_types) && !in_array("5", $posted_user_types)))
            {
                $user->types()->attach($posted_user_types);
            }
        }


        // Get validation errors (see Ardent package)
        $error = $user->errors()->all();

        if(empty($error))
        {
            $this->populateForm($user);

            eerror_log('>>> Edited User '.json_encode($user));

            //return Redirect::to('user/'.$user->id.'/edit')
            return View::make('site.user.edit')
                ->with('user', $user)
                ->with('title', Lang::get('admin/users/title.user_update'))
                ->with('mode', 'edit')
                ->with('success', Lang::get('user/user.user_account_updated'));
        }
        else
        {
            eerror_log('Edit Failed due to errors - '.json_encode($error));
            //return Redirect::to('user/'.$user->id.'/edit')
            return View::make('site.user.edit')
                ->withInput(Input::except('password','password_confirmation'))
                ->with('title', Lang::get('admin/users/title.user_update'))
                ->with('mode', 'edit')
                ->with('error', $error);
        }
    }

    public function getDelete($model) {

        $name = property_exists($model, 'name') ? $model->name : $model->last_name;
        $title = 'Delete ' . ucfirst($this->singleName) . ' - ' . $name;

        return View::make('site/layouts/modals/delete', compact('model', 'title'))->with(['name' => $this->singleName]);
    }


    /**
     * Displays the login form
     *
     */
    public function getLogin()
    {
        $user = Auth::user();
        if(!empty($user->id)){
            return Redirect::to('/');
        }

        return View::make('site/user/login');
    }

    /**
     * Attempt to do login
     *
     */
    public function postLogin()
    {
        $input = array(
            'email'    => Input::get( 'email' ), // May be the username too
            'username' => Input::get( 'email' ), // May be the username too
            'password' => Input::get( 'password' ),
            'remember' => Input::get( 'remember' ),
        );

        // If you wish to only allow login from confirmed users, call logAttempt
        // with the second parameter as true.
        // logAttempt will check if the 'email' perhaps is the username.
        // Check that the user is confirmed.
        if (Confide::logAttempt($input, true))
        {
            $user = Auth::user();
            if($user->hasRole('promoter'))
            {
                return Redirect::to('/my-events');
            }

            return Redirect::intended('/');
        }
        else
        {
            // Check if there was too many login attempts
            if (Confide::isThrottled($input)) {
                $err_msg = Lang::get('confide::confide.alerts.too_many_attempts');
            } elseif ( $this->user->checkUserExists( $input ) && ! $this->user->isConfirmed( $input ) ) {
                $err_msg = Lang::get('confide::confide.alerts.not_confirmed');
            } else {
                $err_msg = Lang::get('confide::confide.alerts.wrong_credentials');
            }

            return Redirect::to('user/login')
                ->withInput(Input::except('password'))
                ->with( 'error', $err_msg );
        }
    }

    /**
     * Attempt to confirm account with code
     *
     * @param  string  $code
     */
    public function getConfirm( $code )
    {
        if (Confide::confirm( $code ))
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.confirmation') );
        }
        else
        {
            return Redirect::to('user/login')
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_confirmation') );
        }
    }

    /**
     * Displays the forgot password form
     *
     */
    public function getForgot()
    {
        return View::make('site/user/forgot');
    }

    /**
     * Attempt to reset password with given email
     *
     */
    public function postForgot()
    {
        if( Confide::forgotPassword( Input::get( 'email' ) ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.password_forgot') );
        }
        else
        {
            return Redirect::to('user/forgot')
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_forgot') );
        }
    }

    /**
     * Shows the change password form with the given token
     *
     */
    public function getReset( $token )
    {

        return View::make('site/user/reset')
            ->with('token',$token);
    }


    /**
     * Attempt change password of the user
     *
     */
    public function postReset()
    {
        $input = array(
            'token'=>Input::get( 'token' ),
            'password'=>Input::get( 'password' ),
            'password_confirmation'=>Input::get( 'password_confirmation' ),
        );

        // By passing an array with the token, password and confirmation
        if( Confide::resetPassword( $input ) )
        {
            return Redirect::to('user/login')
                ->with( 'notice', Lang::get('confide::confide.alerts.password_reset') );
        }
        else
        {
            return Redirect::to('user/reset/'.$input['token'])
                ->withInput()
                ->with( 'error', Lang::get('confide::confide.alerts.wrong_password_reset') );
        }
    }

    /**
     * Log the user out of the application.
     *
     */
    public function getLogout()
    {
        Confide::logout();
        return Redirect::to('/');
    }

    /**
     * Get user's profile
     * @param $username
     * @return mixed
     */
    public function getProfile($username)
    {
        $userModel = new User;
        $user = $userModel->getUserByUsername($username);

        // Check if the user exists
        if (is_null($user))
        {
            return App::abort(404);
        }

        return View::make('site/user/profile', compact('user'));
    }

    public function getSettings()
    {
        list($user,$redirect) = User::checkAuthAndRedirect('user/settings');
        if($redirect)
        {
            return $redirect;
        }

        return View::make('site/user/profile', compact('user'));
    }

    /**
     * Process a dumb redirect.
     * @param $url1
     * @param $url2
     * @param $url3
     * @return string
     */
    public function processRedirect($url1,$url2,$url3)
    {
        $redirect = '';
        if( ! empty( $url1 ) )
        {
            $redirect = $url1;
            $redirect .= (empty($url2)? '' : '/' . $url2);
            $redirect .= (empty($url3)? '' : '/' . $url3);
        }

        return $redirect;
    }
}
