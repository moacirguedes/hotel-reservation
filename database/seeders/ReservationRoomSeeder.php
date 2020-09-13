<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationRoom;

class ReservationRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReservationRoom::factory(10)->create();
    }
}
