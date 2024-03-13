<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function eixo(){
        return $this->belongsTo('\App\Models\Eixo');
    }

    public function nivel(){
        return $this->belongsTo('\App\Models\Nivel');
    }

    public function turma(){
        return $this->hasMany('\App\Models\Turma');
    }

    public function categoria(){
        return $this->hasMany('\App\Models\Categoria');
    }

    public function aluno(){
        return $this->hasMany('\App\Models\Aluno');
    }
}
