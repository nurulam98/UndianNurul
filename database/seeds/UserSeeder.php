<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['id' => 1, 'name' => 'sysadmin', 'email'=>'nurulakbarmalik98@gmail.com','password'=> Hash::make('undianzee9098'),'created_at'=>now(),'updated_at'=>now()]);
    }
}
