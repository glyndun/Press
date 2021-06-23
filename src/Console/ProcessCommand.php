<?php

namespace glyndun\Press\Console;

use glyndun\Press\Facades\Press;

use glyndun\Press\Post;
use glyndun\Press\Repositories\PostRepository;
use Illuminate\Console\Command;

class ProcessCommand extends Command
{
    protected $signature = 'press:process';

    protected $description = 'Update blog posts.';

    public function handle(PostRepository $postRepository)
    {
        if (Press::configNotPublish()) {
            return $this->warn('Please publish the config file by running ' .
                                '\'php artisan vendor:publish --tag=press-config\'');
        }

        try {
            $posts = Press::driver()->fetchPosts();

            $this->info('Number of Posts: ' . count($posts));

            foreach ($posts as $post) {
                $postRepository->save($post);

                $this->info('Post: ' . $post['title']);
            }
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
