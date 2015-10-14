<?php namespace App\admin;

use SleepingOwl\Admin\Exceptions\MethodNotFoundException;
use SleepingOwl\Admin\Exceptions\ValueNotSetException;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Arr;

use SleepingOwl\Admin\Models\Form\Interfaces\FormItemInterface;

class ChosenSelect implements FormItemInterface
{
    protected $list;
    protected $value;
    protected $label;

    public function render()
    {

        //AssetManager::addScript(\URL::asset('js/chosenpicker.js'));

        if (is_array($this->list))
        {
            $list = $this->list;
        }
        else
        {
            if (!method_exists($this->list, 'getList'))
            {
                throw new \Exception('You must implement "public static function getList()" in "' . $this->list . '"');
            }

            $list = forward_static_call([
                $this->list,
                'getList'
            ]);
        }

        if (!isset($this->attributes['class']))
        {
            $this->attributes['class'] = '';
        }

        $this->attributes['class'] .= ' multiselect';
        $this->attributes['size'] = 2;

        return $this->formBuilder->selectGroup($this->name, $this->label, $list, $this->getValueFromForm(), $this->attributes);
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getName()
    {
        return 'SearchableSelect';
    }

    public function getValidationRules()
    {
        return array();
    }

    public function getDefault()
    {
        return null;
    }

    public function updateRequestData(&$data)
    {
        return;
    }

    /**
     * @param $list
     * @return $this
     */
    public function setList($list)
    {
        $this->list = $list;
        return $this;
    }

    public function enum($values)
    {
        $this->list(array_combine($values, $values));
    }

    function __call($name, $arguments)
    {
        if ($name === 'list')
        {
            $this->list = Arr::get($arguments, 0, null);
            return $this;
        }
        return parent::__call($name, $arguments);
    }

    /**
     * @param $value
     * @return $this
     */
    public function value($value)
    {
        error_log('value '.json_encode($value));
        $this->value = $value;
        return $this;
    }

    /**
     * @throws ValueNotSetException
     * @return mixed
     */
    public function values()
    {
        error_log('values');
        $result = $this->form->instance;
        if (is_null($this->value))
        {
            throw new ValueNotSetException;
        }
        $parts = explode('.', $this->value);
        foreach ($parts as $part)
        {
            if ($result instanceof Relation)
            {
                $result = $result->lists($part);
            } else
            {
                $result = $result->$part();
            }
        }

        error_log(json_encode($result));

        if (count($result) == 0 && ! $this->form->instance->exists)
        {
            return $this->getDefault();
        }
        return $result;
    }

}
