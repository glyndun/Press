<?php

namespace glyndun\Press\Tests;

use Orchestra\Testbench\TestCase;
use Parsedown;

class MarkdownTest extends TestCase
{
    /** @test */
    public function experiment()
    {
        $parsedown = new Parsedown();

        dd($parsedown->text('# Heading'));
    }
}
