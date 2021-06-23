<?php

namespace glyndun\Press\Fields;

class Extra extends FieldContract
{
    public static function process($field, $value, $data)
    {
        $extra = isset($data['extra']) ? (array) json_decode($data['extra']) : [];

        return [
            'extra' => json_encode(array_merge($extra, [
                $field => $value
            ]))
        ];
    }
}
