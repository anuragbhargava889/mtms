<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Region;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', '=', 'admin')->first();
        $region = Region::where('name', '=', 'East Gurgaon')->first();


        $user1 = new User();
        $user1->name = 'rajnish';
        $user1->email = 'rajnish.srivastava@nagarro.com';
        $user1->password = bcrypt('rajnish');
        $user1->region_id = $region->id;
        $user1->save();
        $user1->roles()->attach($role->id);


        $user2 = new User();
        $user2->name = 'anurag';
        $user2->email = 'anurag.bhargava@nagarro.com';
        $user2->password = bcrypt('anurag');
        $user2->region_id = $region->id;
        $user2->save();
        $user2->roles()->attach($role->id);
    }
}
