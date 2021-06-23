<?php

namespace glyndun\Press\Fields;

use glyndun\Press\MarkdownParser;

class Body extends FieldContract
{
    public static function process($fieldType, $fieldValue, $data)
    {
        return [
            $fieldType => MarkdownParser::parse($fieldValue)
        ];
    }
}
