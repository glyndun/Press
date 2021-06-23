<?php

namespace glyndun\Press;

use Illuminate\Support\Str;

class Press
{
    protected $fields = [];

    /**
    * Check config file.
    *
    * @return boolean
    */
    public function configNotPublish()
    {
        return is_null(config('press'));
    }

    /**
    * Get instance of the set driver.
    *
    * @return mixed
    */
    public function driver()
    {
        $driver = Str::title(config('press.driver'));
        $class = 'glyndun\Press\Drivers\\' . $driver . 'Driver';

        return new $class;
    }

    public function path()
    {
        return config('config.path', 'blogs');
    }

    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    public function availableFields()
    {
        return array_reverse($this->fields);
    }
}
