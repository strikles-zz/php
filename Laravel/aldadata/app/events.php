<?php

Event::listen('event.datechanged', function($event)
{
    $event_date = $event->date()->first();
    $tasks = TaskEvent::where('events_id', $event->id)->get();
    if($event_date)
    {
        $event_date_str = $event_date->datetime_start->format('d-m-Y');
        foreach ($tasks as $task_ndx => $task)
        {
            $task_deadline = new DateTime($event_date_str);
            //error_log(__DIR__.' >> Le event '.$task_deadline->format('d-m-Y'));
            if($task->deadline_days_gap > 0)
            {
                $disc = 'P'.$task->deadline_days_gap.'D';
                $task_deadline->sub(new DateInterval($disc));
                $task->due_date = $task_deadline->format('Y-m-d');
                $task->save();

                //error_log('Updating task due_date'.json_encode($task->due_date));
            }
        }
    }

    return false;
});

Event::listen('event.created', function($event)
{
    // associate user who created the event with the event
    return false;
});
