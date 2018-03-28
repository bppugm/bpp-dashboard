<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'BPP UGM',
            'email' => 'bpp@ugm.ac.id',
            'password' => bcrypt('BPPu9m'),
        ]);
    }
}
