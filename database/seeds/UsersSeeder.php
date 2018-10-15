<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
		$adminRole->name = "admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();	

		$userRole = new Role();
		$userRole->name = "user";
		$userRole->display_name = "User";
		$userRole->save();	


		$admin = new User();
		$admin->name = 'Admin Larapus';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);

		$user = new User();
		$user->name = 'user';
		$user->email = 'SampleUser@gmail.com';
		$user->password = bcrypt('rahasia');
		$user->save();
		$user->attachRole($userRole);

		
    }
}
