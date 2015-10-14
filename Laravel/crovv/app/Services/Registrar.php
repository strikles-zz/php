<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'email'           => 'required|email|max:255|unique:users',
            'password'        => 'required|confirmed|min:3',
            'first_name'      => 'required',
            'last_name'       => 'required',
            'phone'           => 'required',
            'birthdate'       => 'required',
            'company_name'    => 'required',
            'company_address' => 'required',
            'company_city'    => 'required',
            'company_zip'     => 'required',
            'company_country' => 'required',
            'company_website' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function create(array $data)
    {
        error_log("Data ".json_encode($data));

        $confirmation_code = str_random(30);

        $user = User::create([

            'email'             => $data['email'],
            'password'          => bcrypt($data['password']),
            'first_name'        => $data['first_name'],
            'last_name'         => $data['last_name'],
            'name'              => $data['first_name'].' '.$data['last_name'],
            'phone'             => $data['phone'],
            'company_name'      => $data['company_name'],
            'company_address'   => $data['company_address'],
            'company_city'      => $data['company_city'],
            'company_zip'       => $data['company_zip'],
            'company_country'   => $data['company_country'],
            'company_website'   => $data['company_website'],
            'confirmed'         => 0,
            'confirmation_code' => $confirmation_code
        ]);

        // photo file input
        $photo_posted = (array_key_exists('photo', $data) && !empty($data['photo'])) || \Request::has('photo');
        $photo_path = 'images/icons/default_user.png';
        if($photo_posted)
        {
            $photo_path = 'images/uploads/users/'.$data['photo'];
            // user image
            \Image::make(\Input::file('photo'))->fit(100)->save($photo_path);
        }
        $user->update(['photo' => $photo_path]);

        // send verification email
        \Mail::queue('emails.verify', array('data' => $data, 'user' => $user), function($message) use ($data, $user) {
            $message->to($data['email'], null)
                ->subject('Crovv - Please Verify your account');
        });

        return $user;
    }
}
