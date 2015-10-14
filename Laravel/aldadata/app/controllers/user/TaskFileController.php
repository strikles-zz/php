<?php


class TaskFileController extends CRUDController {

    public function __construct() {

        $this->name       = 'taskfiles';
        $this->modelName  = 'TaskFile';
        $this->singleName = 'taskfile';

        $this->aws_config = Config::get('packages/aws/aws-sdk-php-laravel/config');
        $this->aws_client = App::make('aws')->get('s3');

        $this->validationRules = [
        ];
        $this->validationMessages = [
        ];
    }

    // for js file download - anonymous header blah not allowed
    // so ...
    public function getFileURL($file)
    {
        $url = "";

        // find the file
        $afile = TaskFile::find($file->id);
        if (!$afile)
        {
            return "";
        }

        // get corresponding taskevent so that we can get at the event_id
        // used to segment files per event
        $taskevent = TaskEvent::find($afile->taskevents_id);
        if (!$taskevent)
        {
            return "";
        }

        $url = $this->aws_client->getObjectUrl($this->aws_config['bucket'], "files/events/$taskevent->events_id/".$afile->path, '+60 minutes',
            array('ResponseContentDisposition' => 'attachment; filename='.$afile->original_filename, 'ResponseContentType' => 'application/octet-stream'));

        return $url;
    }

    // new s3 version - N.B. files are uploaded client side via js
    // the only thing this does is stash an already uploaded file to the db
    public function postFileS3($event, $task)
    {
        // defs
        $user = Auth::user();
        $all_input = Input::all();
        eerror_log('AI '.$all_input['path'].' - '.$event->id.' - '.$task->id);

        // create a new TaskFile
        $taskfile = new TaskFile();
        // stash posted data
        $taskfile->original_filename = $all_input['original_name'];
        $taskfile->taskevents_id = $task->id;
        $taskfile->path = $all_input['path'];
        if($user)
        {
            $taskfile->users_id = $user->id;
        }
        // save
        $taskfile->save();


        // set num files depending on user id
        if($task->updated_by !== $user->id)
        {
            // reset
            $task->updated_by = $user->id;
            $task->cnt_updated_files    = 1;
            $task->cnt_updated_comments = 0;
            $task->owner_changed_at = date("Y-m-d H:i:s");
        }
        else
        {
            $num_updated_fles = TaskFile::where('taskevents_id', $task->id)
                                            ->where('users_id', $user->id)
                                            ->where('updated_at', '>', $task->owner_changed_at)
                                            ->count();

            $task->cnt_updated_files = $num_updated_fles ? : 1;


        }

        $task->update();
        $response = Response::make('File Uploaded and moved to destination :)'.json_encode($task), 200);

        return $response;

    }

    public function deleteFile($taskfile)
    {
        $user = Auth::user();
        if($user->hasRole('promoter'))
        {
            if($taskfile->users_id !== $user->id)
            {
                return Response::make('You did not create this file, therefore you can not delete it'  , 403);
            }

            $minutes_diff = (strtotime("now") - strtotime($taskfile->created_at)) / 60;
            eerror_log('time_diff '.$minutes_diff);
            if($minutes_diff > 30)
            {
                return Response::make('You deletion grace period has expired', 403);
            }
        }

        $taskfile->delete();
        $task = $taskfile->taskevent()->first();
        if($task)
        {
            $task->updated_by = $user->id;
            $task->cnt_updated_files = TaskFile::where('taskevents_id', $task->id)
                                            ->where('users_id', '=', $user->id)
                                            ->count();

            $task->save();
        }
    }
}
