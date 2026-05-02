<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori_id'=> Kategori::all()->random()->id,
            'nama_produk'=> fake()->words(2, true),
            'harga'=> fake()->numberBetween(10000, 500000),
            'stok'=> fake()->numberBetween(1, 1000),
            'satuan'=> fake()->randomElement(['pcs','unit','box','kg']),
            'keterangan'=> fake()->paragraph(),
            
        ];
    }
}
