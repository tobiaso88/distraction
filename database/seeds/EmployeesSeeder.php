<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = array(
            'Mikael Dalholm',
            'Tobias Olsson',
            'Björn Wiberg',
            'Hanna Holmgren',
            'Albert Engvie',
            'Hanna Anderberg',
            'Ida Wivel',
            'Simon Dubois',
            'Linnèa Abrahamsson',
            'Mikael Nilsson'
        );
        foreach ($employees as $employee) {
            DB::table('employees')->insert([
                'name' => $employee
            ]);
        }
    }
}
