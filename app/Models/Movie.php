<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $table = 'movies'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria

    protected $fillable = ['titulo', 'duracion', 'sinopsis', 'imagen', 'id_categoria', 'id_director']; // Campos que se pueden llenar
    public function director()
    {
        return $this->belongsTo(Director::class, 'id_director');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_categoria');
    }


}
