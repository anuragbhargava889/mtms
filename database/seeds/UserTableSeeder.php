<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'test@admin.com';
        $user1->email = 'test@admin.com';
        $user1->password = bcrypt('test');
        $user1->save();

        $user2 = new User();
        $user2->name = 'test2@admin.com';
        $user2->email = 'test2@admin.com';
        $user2->password = bcrypt('test2');
        $user2->save();
    }
}
