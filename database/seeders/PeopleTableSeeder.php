<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'taro',
            'mail' => 'taro@yamada.jp',
            'age' => '50',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'john',
            'mail' => 'john@smith.us',
            'age' => '20',
        ];
        DB::table('people')->insert($param);

        $param = [
            'name' => 'hans',
            'mail' => 'hans@muller.de',
            'age' => '30',
        ];
        DB::table('people')->insert($param);
    }
}
