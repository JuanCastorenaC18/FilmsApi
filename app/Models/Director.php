<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;
    protected $table = 'directors'; // Nombre de la tabla
    protected $primaryKey = 'id_director'; // Clave primaria

    protected $fillable = ['director']; // Campos que se pueden llenar

    public function movies()
    {
        return $this->hasMany(Movie::class, 'id_director', 'id_director');
    }
}
