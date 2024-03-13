<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['nome'];

    public function curso(){
        return $this->belongsTo('\App\Models\Curso');
    }

}
