<?php

class DocumentsController extends CRUDController {

	public function __construct() {

		$this->name = 'documents';
		$this->modelName = 'Document';
		$this->singleName = 'document';

		$this->validationRules = [
    	];
    	$this->validationMessages = [
    	];

    	$this->dataTableColumns = ['id', 'title'];
	}

    protected function saveModel($document = false) {

        if (Input::get('id')) {
            $document = Document::find(Input::get('id'));
        }
        if (!$document) $document = new Document();

        $document->type           = Input::get('type');
        $document->title          = Input::get('title');
        $document->description    = Input::get('description');
        $document->url            = Input::get('url');
        $document->meta           = Input::get('meta');

        $document->save();

        return $document;
    }

	public function populateForm($model = false) {

    	if ($model) {
	        Former::populate( $model );
	    } else {
	    	$input = Input::All();
	    	Former::populate( $input);
	    }
    }
}