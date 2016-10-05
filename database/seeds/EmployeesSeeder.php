<?php

use App\Employee;
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
        $employees = [
            ['name' => 'Mikael Dalholm'],
            ['name' => 'Tobias Olsson'],
            ['name' => 'Björn Wiberg'],
            ['name' => 'Hanna Holmgren'],
            ['name' => 'Albert Engvie'],
            ['name' => 'Hanna Anderberg'],
            ['name' => 'Ida Wivel'],
            ['name' => 'Simon Dubois'],
            ['name' => 'Linnèa Abrahamsson'],
            ['name' => 'Mikael Nilsson']
        ];
        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
