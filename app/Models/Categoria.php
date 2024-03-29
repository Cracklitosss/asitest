<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id');
    }

    public function chatsCliente()
    {
        return $this->hasMany(Chat::class, 'id_usuario_cliente', 'id');
    }

    public function chatsTecnico()
    {
        return $this->hasMany(Chat::class, 'id_usuario_tecnico', 'id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_usuario', 'id');
    }
}