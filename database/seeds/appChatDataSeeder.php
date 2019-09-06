<?php

use Illuminate\Database\Seeder;

class appChatDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\room::class,30)->create();
        factory(App\users::class,200)->create();
        factory(App\user_room::class,400)->create();
        factory(App\messages::class,800)->create();
    }
}
