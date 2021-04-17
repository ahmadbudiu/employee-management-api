<?php

namespace Database\Seeders;

use App\Models\Position;
use App\Traits\JsonSeeder;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    use JsonSeeder;

    public function __construct()
    {
        $this->path = 'json/seeders/positions.json';
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
            Position::create($this->objectToArray($row));
        }
    }
}
