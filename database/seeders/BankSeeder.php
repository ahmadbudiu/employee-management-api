<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Traits\JsonSeeder;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    use JsonSeeder;

    public function __construct()
    {
        $this->path = 'json/seeders/banks.json';
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->runSeeder();
    }

    public function seed()
    {
        foreach ($this->jsonData as $row) {
            Bank::create($this->objectToArray($row));
        }
    }
}
