<?php namespace App;

use SleepingOwl\Models\SleepingOwlModel;

class Group extends SleepingOwlModel {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';
    protected $guarded = array('_token');

    protected $weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    //protected $fillable = array('name', 'description', 'country', 'city');


    public function users()
    {
        return $this->belongsToMany('\App\User', 'user_group', 'group_id', 'user_id');
    }

    public function notMembers()
    {
        return !$this->belongsToMany('\App\User', 'user_group', 'group_id', 'user_id');
    }

    public function meetings()
    {
        return $this->hasMany('\App\Groupmeeting');
    }


    // future / past meetings
    public function previous_meetings()
    {
        // hmmm
        return $this->meetings()->whereHas('meeting_date', function($q) {

            $q->where('meeting_date', '<', 'CURDATE()');

        })->get();
    }

    public function future_meetings()
    {
        // hmmm
        return $this->meetings()->whereHas('meeting_date', function($q) {

            $q->where('meeting_date', '>', 'CURDATE()');

        })->get();
    }


    // future past meeting dates
    public function next_meeting()
    {
        // a meeting that has attendees
        return \App\Groupmeeting::where('group_id', $this->id)->orderBy('meeting_date')->first();
    }

    public function next_meeting_date($weeks_gap = 0)
    {
        $verb = "next ";
        if($weeks_gap > 0)
        {
            $verb = "+$weeks_gap ";
        }

        return date('Y-m-d', strtotime($verb.$this->weekdays[(int)$this->meeting_weekday]));
    }

    public function next_meeting_timestamp($weeks_gap = 0)
    {
        // Wrong
        $verb = "next ";
        if($weeks_gap > 0)
        {
            $verb = "+$weeks_gap ";
        }

        $timestamp = strtotime($verb.$this->weekdays[(int)$this->meeting_weekday].' '.$this->meeting_time);

        return $timestamp;
    }

    public function next_meeting_str($weeks_gap = 0)
    {
        // OK
        //
        $verb = "next ";
        if($weeks_gap > 0)
        {
            $verb = "+$weeks_gap ";
        }

        return date('d M H:i', strtotime($verb.$this->weekdays[(int)$this->meeting_weekday].' '.$this->meeting_time));
    }



    public function getPhotoPath()
    {
        $ret = (strlen($this->photo) > 0 ? $this->photo : "images/icons/default_group.png");
        return $ret;
    }

    public static function getList()
    {
        return static::lists('name', 'id');
    }
}
