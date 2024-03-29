<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id', 'id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    }

    public function imagen()
    {
        return $this->belongsTo(ImagenProducto::class, 'id_imagen', 'id');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'id_producto', 'id');
    }
}