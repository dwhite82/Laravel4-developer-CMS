<?php


class UsersTableSeeder extends Seeder {

    public function run(){
        $now = date('Y-m-d H:i:s');

        DB::table('users')->insert(array(
            'id' => 1,
            'first_name' => 'First',
            'last_name' => 'Name',
            'email' => 'you@youremailaddress.com',
            'username' => 'username',
            'role' => 'developer',
            'password' => 'testpass',
            'active' => 1,
            'created_at' => $now,
            'updated_at' => $now)
        );
    }
}

