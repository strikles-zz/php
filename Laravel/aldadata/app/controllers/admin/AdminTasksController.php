<?php

class AdminTasksController extends CRUDController {

    public function __construct() {

        $this->name = 'tasks';
        $this->singleName = 'task';

        $this->validationRules = [
        ];
        $this->validationMessages = [
        ];

        $this->dataTableColumns = ['id', 'title', 'deadline_days_gap', 'group_id'];
    }

    public function getIndex() {

        $this->populateForm();
        return View::make('admin/alda/tasks/index')->with('title', 'Task Groups');

    }

    public function getData() {

        $models = TaskTemplate::select($this->dataTableColumns);
        return Datatables::of($models)
            ->addColumn('Group', function($m)
            {
                $ret = TaskGroup::find($m->group_id)->name;
                Debugbar::info($ret);
                return $ret;

            })
            ->removeColumn('group_id')
            ->add_column('actions', '<a href="{{{ URL::to(\'/admin/tasktemplates/\' . $id . \'/edit\' ) }}}" class="iframe btn btn-xs btn-default cboxElement">{{{ Lang::get(\'button.edit\') }}}</a>
                                     <a href="{{{ URL::to(\'/admin/tasktemplates/\' . $id . \'/delete\' ) }}}" class="iframe btn btn-xs btn-danger cboxElement">{{{ Lang::get(\'button.delete\') }}}</a>')
            ->make();
    }

    public function postIndex()
    {
        $all_input = Input::all();
        eerror_log(json_encode($all_input));

        $task_groups = TaskGroup::orderBy('id')->get();

        //set all the values
        $task_ndx = 1;
        foreach ($task_groups as $key => $tg) {

            if($task_ndx > 4)
                break;

            //error_log('Le key'.json_encode($key));
            $tg->name = Input::get('group'.$task_ndx.'_name');
            $tg->order = Input::get('group'.$task_ndx.'_order');
            $tg->update();

            $task_ndx++;
        }


        $this->populateForm();
        return View::make('admin/alda/tasks/index')->with('title', 'Task Groups');
    }

    protected function populateForm() {

        $task_ndx = 1;

        $task_groups = TaskGroup::orderBy('id')->get();
        foreach ($task_groups as $key => $tg) {

            if($task_ndx > 4)
                break;

            Former::populateField('group'.$task_ndx.'_name', $tg->name);
            Former::populateField('group'.$task_ndx.'_order', $tg->order);

            $task_ndx++;
        }
    }
}
