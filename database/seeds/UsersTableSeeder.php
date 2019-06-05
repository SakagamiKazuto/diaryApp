<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
       'name'=>'たろう',
       'email'=>'tarou@icloud.com',
       'password'=>1234123,
        ];
        DB::table('users')->insert($param);

        $param=[
       'name'=>'こたろう',
       'email'=>'kotarou@icloud.com',
       'password'=>12345123,
        ];
       DB::table('users')->insert($param); 
              
        $param=[
       'name'=>'ろう',
       'email'=>'rou@icloud.com',
       'password'=>123456123,
        ];
        DB::table('users')->insert($param);
    }
}
