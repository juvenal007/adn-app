<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raza extends Model
{
    use HasFactory, SoftDeletes;

    //DEFINIMOS EL NOMBRE DE LA TABLA
    protected $table = 'razas';
    //DEFINIMOS LA CLAVE PRIMARIA DE LA TABLA, AUTOMATICAMENTE SE LE ASIGNA AUTO INCREMENT
    protected $primaryKey = 'id';

    //CAMPOS QUE NO QUEREMOS QUE SE DEVUELVAN EN LAS CONSULTAS
    protected $hidden = ['deleted_at','created_at', 'updated_at'];

    //ATRIBUTOS DE LA TABLE
    protected $fillable = [
        'raza_nombre',
        'raza_descripcion'
    ];

        //RELACIÓN INVERSA HACIA PERRO
        public function perros()
        {
            return $this->hasMany('App\Models\Perro');
        }

}

