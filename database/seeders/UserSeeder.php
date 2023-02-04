<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Tambahan
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed Admin
        $admin = new \App\Models\User();
        $admin -> nik = "000001";
        $admin -> name = "Admin";
        $admin -> telepon = "101010101";
        $admin -> username = "admin";
        $admin -> password=bcrypt("userke1");
        $admin -> level = "1";
        $admin->save();

        //Seed Karyawan
        $karyawan = new \App\Models\User();
        $karyawan -> nik = "000002";
        $karyawan -> name = "Karyawan";
        $karyawan -> telepon = "202020202";
        $karyawan -> username = "karyawan";
        $karyawan -> password=bcrypt("userke2");
        $karyawan -> level = "2";
        $karyawan->save();
    }
}
