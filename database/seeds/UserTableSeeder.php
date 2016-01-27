<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();

        $users =
            array('admin', 'admin@admin.com', Hash::make('admin'), 'CbnYEmtDaePmLJb6Yn4j3aogp0v36o', 'CbnYEmtDaePmLJb6Yn4j3aogp0v36o', 'CbnYEmtDaePmLJb6Yn4j3aogp0v36o','127.0.1.1','2015-08-27 16:33:22','','CbnYEmtDaePmLJb6Yn4j3aogp0v36o');

        foreach($users as $user) {
            \App\User::insert(array(
                'username' => $user[0],
                'email' => $user[1],
                'password' => $user[2],
                'auth_key' => $user[3],
                'access_token' => $user[4],
                'csrf_token' => $user[5],
                'ip_address' => $user[6],
                'last_visit' => $user[7],
                'role_id' => $user[8],
                'remember_token' => $user[9],
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ));
        }

    }
}
