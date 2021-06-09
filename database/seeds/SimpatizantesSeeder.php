<?php

use Illuminate\Database\Seeder;
use App\Models\Simpatizantes;
class SimpatizantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Simpatizantes::class, 50)->create();
    }
}
