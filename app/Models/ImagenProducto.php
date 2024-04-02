<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'url_imagen'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_imagen', 'id');
    }
}
