<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Andres David',
            'email' => 'andres@gmail.com',
            'password' => bcrypt('12345'), // password
            'dpi' => '123456789',
            'address' => '',
            'phone' => '',
            'role' => 'admin']);
        factory(User::class, 50)->create();

    }
}
