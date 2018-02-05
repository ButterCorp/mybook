<?php

use Illuminate\Database\Seeder;

class UsersAdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
            ->where('name', 'Brixton Dev')
            ->update(['is_admin' => 1]);

        DB::table('users')
            ->where('name', 'Youyou Dev')
            ->update(['is_admin' => 1]);

        DB::table('users')
            ->where('name', 'Kevin Gilibert')
            ->update(['is_admin' => 1]);
    }
}
