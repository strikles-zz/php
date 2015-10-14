<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends SleepingOwlModel implements AuthenticatableContract, CanResetPasswordContract, ModelWithImageFieldsInterface {

    use Authenticatable, CanResetPassword, EntrustUserTrait, ModelWithImageOrFileFieldsTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $fillable = ['name', 'email', 'password', 'roles', 'groups', 'image'];
    protected $guarded = array('_token', 'password_confirmation', 'phone_int');

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function roles()
    {
        return $this->belongsToMany('\App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function groups()
    {
        return $this->belongsToMany('\App\Group', 'user_group', 'user_id', 'group_id');
    }

    public function hasGroup($group_id)
    {
        return ($this->groups()->where('user_group.group_id', $group_id)->first() ? true : false);
    }

    public function meeting_attendances()
    {
        return $this->hasMany('\App\Groupmeeting');
    }


    public function getUserNthGroupOrderedByMeetingTimestamp($nth, $type)
    {
        $num_user_groups = $this->groups()->count();
        if($num_user_groups <= 0)
        {
            return null;
        }

        // get all the groups
        $user_groups = $this->groups()->get();
        $group_1st_meetings = [];

        // stick the groups datetimes in an array and sort them by next_meeting_timestamp
        foreach ($user_groups as $key => $ugroup)
        {
            $group_1st_meetings[$ugroup->next_meeting_timestamp()] = $ugroup;
        }

        // sort array by key timestamps
        error_log('B'.json_encode($group_1st_meetings));
        ksort($group_1st_meetings);
        error_log('A'.json_encode($group_1st_meetings));

        // calculate offset
        $offset_ndx = $nth % $num_user_groups;
        // get array keys for reference
        $gmeeting_keys = array_keys($group_1st_meetings);
        $offset_key = $gmeeting_keys[$offset_ndx];
        // get num wraparounds
        $weeks_gap = (int) ($nth / $num_user_groups);

        $ret = $group_1st_meetings[$offset_key]->next_meeting_timestamp($weeks_gap);
        if($type === 'timestamp')
        {
            return $ret;
        }
        else
        {
            return date("d M H:i", $ret);
        }
    }



    public function next_meeting_timestamp($ndx = 0)
    {
        return $this->getUserNthGroupOrderedByMeetingTimestamp($ndx, 'timestamp');
    }

    public function next_meeting_date($ndx = 0)
    {
        return $this->getUserNthGroupOrderedByMeetingTimestamp($ndx, 'date');
    }




    public function setRolesAttribute($roles)
    {
        error_log('Roles '.json_encode($roles));

        $this->roles()->detach();
        if (!$roles) return;
        if (!$this->exists) $this->save();

        $this->roles()->attach($roles);
        $this->save();
    }

    public function setGroupsAttribute($groups)
    {
        error_log('Groups '.json_encode($groups));

        $this->groups()->detach();
        if (!$groups) return;
        if (!$this->exists) $this->save();

        $this->groups()->attach($groups);
        $this->save();
    }

    public function getPhotoPath()
    {

        $ret = (strlen($this->photo) > 0 ? $this->photo : "images/icons/default_user.png");
        error_log(json_encode($ret));
        return $ret;
    }

    public static function getList()
    {
        return static::lists('name', 'id');
    }

    public function getImageFields()
    {
        return [
            'image' => '',
            'photo' => 'uploads/'
        ];
    }

    public function setImage($field, $image)
    {
        if (is_null($image)) return;
        $filename = $image;

        if ($image instanceof UploadedFile)
        {
            $filename = $this->getFilenameFromFile(null, $field, $image);
            $this->$field->setFilename($filename);
        }

        $this->attributes[$field] = $filename;
    }
}
