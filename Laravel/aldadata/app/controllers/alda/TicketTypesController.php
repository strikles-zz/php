<?php

class TicketTypesController extends Controller {

	public function __construct() {

		$this->name = 'tickettypes';
		$this->modelName = 'TicketType';
		$this->singleName = 'tickettype';

		$this->validationRules = [
            'num_available' => 'numeric',
            'order' => 'numeric',
            'price' => 'numeric'
        ];

    	$this->validationMessages = [];

    	$this->dataTableColumns = [];
	}

    protected function saveModel($event, $tickettype = false)
    {
        eerror_log(json_encode($event));
        $new_tickettype = false;

        if (Input::get('id'))
        {
            $tickettype = TicketType::find(Input::get('id'));
            eerror_log("a tickettype id was posted");
        }

        if (!$tickettype)
        {
            $tickettype = new TicketType();
            $new_tickettype = true;
        }

        $tickettype->events_id     = $event->id;
        $tickettype->name          = Input::get('name');
        $tickettype->num_available = Input::get('num_available');
        $tickettype->price         = str_replace(',', '.', Input::get('price'));
        $tickettype->order         = Input::get('order');

        if(!$new_tickettype)
        {
            $tickettype->update();
        }
        else
        {
            $tickettype->save();
        }

        return $tickettype;
    }

    public function populateForm($model = false)
    {
        if ($model)
        {
            Former::populate($model);
        }
        else
        {
            $input = Input::All();
            Former::populate($input);
        }
    }

    protected function validateModel($model = false)
    {
        $validation = Validator::make(Input::All(), $this->validationRules, $this->validationMessages);
        if($validation->fails()) {
            return $validation;
        }

        return true;
    }

	// ticket types are always associated with an event
    public function getCreate($event)
    {
    	// Title
        $title = 'Add New ' . ucfirst($this->singleName);
        $controller = $this->name;

    	return View::make('site/tickets/types/create', compact('title', 'controller'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function postCreate($event)
    {
        // ticket types are always associated with an event

    	$title = 'Add New ' . ucfirst($this->singleName);
    	$controller = $this->name;

    	$input_validation = $this->validateModel();
    	if ($input_validation !== true)
    	{
    		$this->populateForm();
			Former::withErrors($input_validation);
			return View::make('site/tickets/types/create', compact('title', 'controller'))->with('error', 'Not saved!');
    	};

    	$tickettype = $this->saveModel($event);
        eerror_log(json_encode($tickettype));
        eerror_log(json_encode($event));
    	$this->populateForm($tickettype);

    	return Redirect::to('/events/'.$event->id.'/tickettypes/'.$tickettype->id.'/edit')->with('success', 'Saved!');
    }

    public function getEdit($event, $tickettype)
    {
        $title = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $tickettype->name;

        $controller = $this->name;
        $this->populateForm($tickettype);
        $view = 'site/tickets/types/edit';

        return View::make($view, compact('title', 'event', 'tickettype', 'controller'));
    }


      /**
     * Update the specified resource in storage.
     *
     * @param $event, tickettype
     * @return View
     */
    public function postEdit($event, $tickettype)
    {
        $title = 'Edit ' . ucfirst($this->singleName) . ' Details - ' . $tickettype->name;
        $controller = $this->name;

        $input_validation = $this->validateModel();
        if ($input_validation !== true)
        {
            $this->populateForm();
            Former::withErrors($input_validation);
            return View::make('site/tickets/types/edit', compact('title', 'tickettype', 'controller'))->with('error', 'Not saved!');
        };

        $this->saveModel($event, $tickettype);
        $this->populateForm($tickettype);

        return View::make('site/tickets/types/edit', compact('title', 'tickettype', 'controller'))->with('success', 'Saved!');

    }

    /**
     * Remove model
     *
     * @param $model
     * @return View
     */
    public function getDelete($model) {

        $name = property_exists($model, 'name') ? $model->name : $model->last_name;
        $title = 'Delete ' . ucfirst($this->singleName) . ' - ' . $name;

        return View::make('site/layouts/modals/delete', compact('model', 'title'))->with(['name' => $this->name]);
    }


    /**
     * Remove the specified company from storage.
     *
     * @param $company
     * @return Response
     */
    public function postDelete($model) {

        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        $has_sold_entries = ($model->sold()->count() > 0);
        if($has_sold_entries)
        {
            return Response::json([
                'error' => 'Though shall not delete a ticket type with associated sales',
                'reload'    => false
            ]);
        }

        // Validate the inputs
        $validator = Validator::make(Input::All(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $model->id;
            $model->delete();

            // Was the blog post deleted?
            $Model = $this->modelName;
            $model = $Model::find($id);
            if(empty($model))
            {
                // Redirect to the blog posts management page
                return Response::json([
                    'success'   => 'success',
                    'reload'    => true
                ]);
            }
        }
        // There was a problem deleting the blog post
        return Response::json([
            'error' => 'error',
            'reload'    => false
        ]);
    }
}
