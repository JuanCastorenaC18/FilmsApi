<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Nombre de la tabla
    protected $primaryKey = 'id_categoria'; // Clave primaria

    protected $fillable = ['categoria']; // Campos que se pueden llenar
    
    public function movies()
    {
        return $this->hasMany(Movie::class, 'id_categoria', 'id_categoria');
    }

}
