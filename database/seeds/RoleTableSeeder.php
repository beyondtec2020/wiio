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
        $role_user = new Role();
        $role_user->slug = "admin";
        $role_user->name = "Admin";
        $role_user->save();

          $role_user = new Role();
          $role_user->slug = "moderator";
          $role_user->name = "Moderator";
          $role_user->save();


          $role_user = new Role();
	        $role_user->slug = "user";
	        $role_user->name = "User";
	        $role_user->save();

    }
}
