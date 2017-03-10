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
        factory(App\User::class, 10)->create()->each(function ($u) {
            $u->posts()->save(factory(App\Models\Post::class)->make());
        });
        $this->call(LikesTableSeeder::class);
        $this->call(FollowsTableSeeder::class);
    }
}
