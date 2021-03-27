<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perro extends Model
{
    use HasFactory, SoftDeletes;

    //DEFINIMOS EL NOMBRE DE LA TABLA
    protected $table = 'perros';
    //DEFINIMOS LA CLAVE PRIMARIA DE LA TABLA, AUTOMATICAMENTE SE LE ASIGNA AUTO INCREMENT
    protected $primaryKey = 'id';

    //CAMPOS QUE NO QUEREMOS QUE SE DEVUELVAN EN LAS CONSULTAS
    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    //ATRIBUTOS DE LA TABLE
    protected $fillable = [
        'perro_nombre',
        'perro_color',
        'perro_edad',
        'perro_raza_id'
    ];
    //RELACIÓN DIRECTA HACIA RAZA
    public function raza()
    {
        return $this->belongsTo('App\Models\Raza', 'perro_raza_id');
    }
}
