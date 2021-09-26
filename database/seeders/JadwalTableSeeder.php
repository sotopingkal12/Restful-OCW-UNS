<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JadwalTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jadwal')->delete();
        
        \DB::table('jadwal')->insert(array (
            0 => 
            array (
                'matkul_id' => 1,
                'pertemuan' => '1',
                'tanggal' => '2021-09-25',
                'jam_awal' => '17:17:56',
                'jam_akhir' => '23:17:56',
                'status' => 'Kehadiran Anda: Hadir',
                'link' => 'adsad',
                'is_send' => 0,
                'created_at' => NULL,
                'updated_at' => '2021-09-25 19:57:42',
            ),
        ));
        
        
    }
}