<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('petugas')->insert([
        	'username' => 'admin',
        	'password' => Hash::make('admin'),
        	'nama_petugas' => 'Alvin Maulana',
        	'level' => 'admin'
        ]);
    }
}