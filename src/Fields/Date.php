<?php

namespace glyndun\Press\Fields;

use Carbon\Carbon;

class Date extends FieldContract
{
    public static function process($field, $value, $data)
    {
        return [
            $field => Carbon::parse($value),
            'parsed_at' => Carbon::now(),
        ];
    }
}
