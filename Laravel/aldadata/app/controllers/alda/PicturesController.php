<?php

class PicturesController extends BaseController {

	public function __construct() {

		$this->name = 'pictures';
		$this->modelName = 'Picture';
		$this->singleName = 'picture';

		$this->validationRules = [
    	];
    	$this->validationMessages = [
    	];
	}

    /**
     * Remove company page.
     *
     * @param $user
     * @return Response
     */
    public function getDelete($model) {

        $name = $model->filename;
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

        // Validate the inputs
        $validator = Validator::make(Input::All(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $model->id;
            $model->delete();

            $file_path = public_path().'/uploads/'.$model->filename;
            $file_ok = true;
            if(File::exists($file_path))
            {
                $file_ok = false;
                File::delete($file_path);
                if(!File::exists($file_path)){
                    $file_ok = true;
                }
            }

            // Was the blog post deleted?
            $Model = $this->modelName;
            $model = $Model::find($id);
            if(empty($model) && $file_ok)
            {
                // Redirect to the blog posts management page
                return Response::json([
                	'success'	=> 'success',
                	'reload'	=> true
                ]);
            }
        }
        // There was a problem deleting the blog post
        return Response::json([
        	'error'	=> 'error',
        	'reload'	=> false
		]);
    }

}