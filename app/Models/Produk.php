<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;


#[Fillable(['kategori_id','nama_produk','harga','stok','satuan','diskon'])]
class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory, SoftDeletes;
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

}
