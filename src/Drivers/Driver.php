<?php

namespace glyndun\Press\Drivers;

use glyndun\Press\PressFileParser;
use Illuminate\Support\Str;

abstract class Driver
{
    protected $config;

    protected $posts = [];

    public function __construct()
    {
        $this->setConfig();

        $this->validateSource();
    }

    public abstract function fetchPosts();

    protected function setConfig()
    {
        $this->config = config('press.' . config('press.driver'));
    }

    protected function validateSource()
    {
        return true;
    }

    protected function parse($content, $filename)
    {
        $this->posts[] = array_merge(
            (new PressFileParser($content))->getData(),
            ['identifier' => Str::slug($filename)]
        );
    }
}
