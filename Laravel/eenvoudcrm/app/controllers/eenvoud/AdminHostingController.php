<?php

class AdminHostingController extends AdminController
{

    public function __construct()
    {
        $this->modelName  = 'CompanyMeta';

        $this->validationRules = [
        ];

        $this->validationMessages = [
        ];
    }

    /**
     * [getModelData - gets the saved hosting content info]
     * @param  [Eloquent model] $model  [company model]
     * @return [json]                   [DT compatible object]
     */
    public function getModelData($model)
    {
        $Model = $this->modelName;
        $company_hosting = $Model::where('company_id', '=', $model->id)
                                        ->where('key', '=', 'hosting_info')
                                        ->orderBy('id', 'DESC')
                                        ->first();

        $ret = ($company_hosting ? $company_hosting->content : (object) null);

        return Response::json($ret);

    }

    /**
     * [postModelData - handle content posting and save]
     * @param  [Eloquent model] $model [company model]
     * @return [json]        [DT compatible object]
     */
    public function postModelData($model)
    {
        $Model = $this->modelName;
        $posted_content = $_POST['content'];

        // create key if it doesn't exist
        $company_meta            = $Model::firstOrNew(['type' => 'hosting', 'key' => 'hosting_info', 'company_id' => $model->id]);
        $company_meta['content'] = $posted_content;
        $company_meta->save();

        return Response::json($posted_content);
    }
}
