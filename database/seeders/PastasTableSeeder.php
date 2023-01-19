<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasta;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // leggo i dati dal config
        $pastas = config('db');
        // creo le paste
        foreach( $pastas as $pasta ) {
            $new_pasta = new Pasta();
            $new_pasta->image = $pasta['src'];
            $new_pasta->title = $pasta['titolo'];
            $new_pasta->type = $pasta['tipo'];
            $new_pasta->cooking_time = $pasta['cottura'];
            $new_pasta->weight = $pasta['peso'];
            $new_pasta->description = $pasta['descrizione'];
            $new_pasta->save();
        }
    }
}
