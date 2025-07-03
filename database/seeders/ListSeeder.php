<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lists = [
            [
                'id_categories' => 1,
                'nama' => 'Bakso Pak Slamet',
                'desc' => 'Bakso enak dan murah',
                'address' => 'Jl. Raya Genteng No. 1',
                'email' => 'bakso.slamet@example.com',
                'telp' => '081234567890',
                'owner' => 'Slamet',
                'year' => 2010,
                'full_desc' => 'Bakso Pak Slamet sudah berdiri sejak 2010 dan terkenal dengan bakso uratnya.',
                'about' => 'Usaha keluarga yang konsisten menjaga rasa.',
                'products' => 'Bakso, Mie Ayam',
                'op_hour' => '08:00-21:00',
                'img_lists' => 'bakso.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_categories' => 2,
                'nama' => 'Herbal Sehat',
                'desc' => 'Toko obat herbal alami',
                'address' => 'Jl. Sehat No. 2',
                'email' => 'herbal.sehat@example.com',
                'telp' => '082233445566',
                'owner' => 'Siti',
                'year' => 2015,
                'full_desc' => 'Menjual berbagai macam obat herbal alami dan terpercaya.',
                'about' => 'Mengutamakan kualitas dan keaslian produk.',
                'products' => 'Jamu, Madu, Minyak Herbal',
                'op_hour' => '09:00-17:00',
                'img_lists' => 'herbal.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_categories' => 3,
                'nama' => 'Kerajinan Bambu Jaya',
                'desc' => 'Kerajinan tangan dari bambu',
                'address' => 'Jl. Kerajinan No. 3',
                'email' => 'bambu.jaya@example.com',
                'telp' => '083344556677',
                'owner' => 'Jaya',
                'year' => 2012,
                'full_desc' => 'Produk kerajinan bambu berkualitas ekspor.',
                'about' => 'Memberdayakan masyarakat sekitar.',
                'products' => 'Anyaman, Vas, Hiasan Dinding',
                'op_hour' => '10:00-18:00',
                'img_lists' => 'bambu.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('lists')->insert($lists);
    }
}
