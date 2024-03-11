<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Categori;
class CategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Categori::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'komik','novel','sejarah','horror','aksi'
        ];

        foreach ($data as $value) {
            Categori::insert([
                'nama' => $value
            ]);
        }
    }
}
