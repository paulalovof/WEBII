<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turma extends Model
{
    use HasFactory;
    use SoftDeletes;

    //has many alunos

    public function curso(){
        return $this->belongsTo('\App\Models\Curso');
    }

    public function aluno(){
        return $this->hasMany('\App\Models\Aluno');
    }
}
