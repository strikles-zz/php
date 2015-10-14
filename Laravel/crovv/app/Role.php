<?php namespace App;

use Zizaco\Entrust\Contracts\EntrustRoleInterface;
use Zizaco\Entrust\Traits\EntrustRoleTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

use SleepingOwl\Models\SleepingOwlModel;
use Zizaco\Entrust\EntrustRole;
class Role extends SleepingOwlModel implements EntrustRoleInterface
{
    use EntrustRoleTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

    /**
     * Creates a new instance of the model.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $this->table = Config::get('entrust.roles_table');
    }

	//protected $fillable = array('name', 'display_name', 'description');
	protected $guarded = array('_token');

	public static function getList()
	{
		return static::lists('name', 'id');
	}
}
