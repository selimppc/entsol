<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->truncate();

        $roles = array(
            array('admin','admin','active'),
            array('user', 'user','active'),
            array('system-user','system-user','active')
        );

        foreach($roles as $role) {
            \App\Role::insert(array(
                'title' => $role[0],
                'slug' => $role[1],
                'status' => $role[2],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }
    }
}
