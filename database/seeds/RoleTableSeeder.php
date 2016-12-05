<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $regionalmanager = new Role();
        $regionalmanager->name         = 'regionalmanager';
        $regionalmanager->display_name = 'Region Manager'; // optional
        $regionalmanager->description  = 'User is to manage region'; // optional
        $regionalmanager->save();

        $localtechinician = new Role();
        $localtechinician->name         = 'localtechinician';
        $localtechinician->display_name = 'Local Technician'; // optional
        $localtechinician->description  = 'This Group of User will fix the issues at tower'; // optional
        $localtechinician->save();
    }
}
