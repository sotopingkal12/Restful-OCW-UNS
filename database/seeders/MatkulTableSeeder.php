<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MatkulTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('matkul')->delete();
        
        \DB::table('matkul')->insert(array (
            0 => 
            array (
                'nama' => 'Pendidikan Kewarganegaraan',
                'codename' => 'pkn',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhNVEl3TURNPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VTFWT01ERTE%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'nama' => 'Strategi Belajar Mengajar',
                'codename' => 'sbm',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhNekl3TURRPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=UWtGVE1EQXo%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'nama' => 'Praktikum Rangkaian Elektronika dan Instrumentasi',
                'codename' => 'prei',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TWpFPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=UVVkVk1ERXc%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'nama' => 'Praktikum Teknik Animasi 2D',
                'codename' => 'p2d',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TWpNPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=V1ZWVE1ERTA%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'nama' => 'Praktikum Keamanan Jaringan Komputer',
                'codename' => 'pkjk',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TWpVPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VUZWVE1EQXg%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'nama' => 'Praktikum Pemrograman Berorientasi Objek',
                'codename' => 'ppbo',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TWpjPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VWs5VE1EQXk%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'nama' => 'Praktikum Pemrograman Web',
                'codename' => 'pweb',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TXpBPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VGxWU01ETXc%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'nama' => 'Desain Grafis Percetakan',
                'codename' => 'dgp',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TXpFPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=V1ZWVE1ERTA%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'nama' => 'Praktikum Desain Grafis Percetakan',
                'codename' => 'pdgp',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREV3TXpJPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=V1ZWVE1ERTA%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'nama' => 'Rangkaian Elektronika dan Instrumentasi',
                'codename' => 'rei',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWpBPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=UVVkVk1ERXc%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'nama' => 'Teknik Animasi 2D',
                'codename' => '2d',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWpJPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=V1ZWVE1ERTA%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'nama' => 'Keamanan Jaringan Komputer',
                'codename' => 'kjk',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWpRPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VUZWVE1EQXg%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'nama' => 'Pemrograman Berorientasi Objek',
                'codename' => 'pbo',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWpZPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VWs5VE1EQXk%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'nama' => 'English for IT',
                'codename' => 'eit',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWpnPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=UTFWRE1EQXk%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'nama' => 'Pemrograman Web',
                'codename' => 'web',
                'link' => 'https://ocw.uns.ac.id/presensi-online-mahasiswa/view?mk=TURJeE5ETXhOREl3TWprPQ%3D%3D&kelas=UVE9PQ%3D%3D&prodi=U3pNMU1RPT0%3D&dosen=VGxWU01ETXc%3D',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}