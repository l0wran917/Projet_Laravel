<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(App\User::class, 100)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Models\Post::class)->make());
        });*/
        factory(App\User::class, 100)->create();
        $this->call(LikesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
    }
}
