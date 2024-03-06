<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


    $data = [
        ["nome" => "ADMINISTRADOR"],
        ["nome" => "COORDENADOR"],
        ["nome" => "PROFESSOR"],
        ["nome" => "ALUNO"],
    ];

        DB::table('roles')->insert($data);
