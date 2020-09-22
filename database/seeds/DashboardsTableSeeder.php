<?php

use App\Dashboard;
use Illuminate\Database\Seeder;

class DashboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dashboard::class, 5)->create();
    }
}
