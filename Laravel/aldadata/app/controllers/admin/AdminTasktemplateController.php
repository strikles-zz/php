<?php

class AdminTasktemplateController extends AdminCRUDController {

    public function __construct() {

        $this->name       = 'tasktemplates';
        $this->modelName  = 'TaskTemplate';
        $this->singleName = 'tasktemplate';

        $this->validationRules = [
        ];
        $this->validationMessages = [
        ];
    }

    protected function saveModel($tasktemplate = false) {

        if (Input::get('id')) {
            $tasktemplate = TaskTemplate::find(Input::get('id'));
        }
        if (!$tasktemplate) $tasktemplate = new TaskTemplate();

        $tasktemplate->title             = Input::get('title');
        $tasktemplate->description       = Input::get('description');
        $tasktemplate->group_id          = Input::get('group_id');
        $tasktemplate->deadline_days_gap = Input::get('deadline_days_gap');

        $tasktemplate->save();

        return $tasktemplate;
    }

    protected function populateForm($tasktemplate = false) {

    	if($tasktemplate)
    	{
    		Former::populate( $tasktemplate );
    	}
    }
}
