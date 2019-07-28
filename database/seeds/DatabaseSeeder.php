<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        
        factory('App\Cat', 5)->create();
        $tags = factory('App\Tag', 8)->create();

        factory(Post::class, 15)->create()->each(function($post) use ($tags){
            $post->comments()->save(factory(Comment::class)->make());
            $post->tags()->attach( $tags->random(mt_rand(1,4))->pluck('id')->toArray() );
        });
    }
}
