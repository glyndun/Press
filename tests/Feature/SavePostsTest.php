<?php

namespace glyndun\Press\Tests;

use glyndun\Press\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SavePostsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_post_can_be_created_with_a_factory()
    {
        $post = factory(Post::class)->create();

        $this->assertCount(1, Post::all());
    }
}
