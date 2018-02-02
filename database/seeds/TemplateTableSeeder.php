<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('templates')->insert([
            'template_name' => "MyBookOne"
        ]);

        DB::table('templates')->insert([
            'template_name' => "MyBookTwo"
        ]);
    }
}
