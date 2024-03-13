<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AlunoRepository;
use App\Repositories\UserRepository;
use App\Repositories\CursoRepository;
use App\Repositories\TurmaRepository;

class AlunoController extends Controller
{
    protected $repository;
    public function __construct(){
        $this->repository = new AlunoRepository();
    }

    public function index()
    {
        $data = $this->repository->selectAllWith(['user', 'curso', 'turma']);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objUser = (new UserRepository())->findById($request->user_id);
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);

        if(isset($objUser) && isset($objCurso) && isset($objTurma)) {
            $obj = new Aluno();
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf = $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password); 

            $obj->user()->associate($objUser);
            $obj->curso()->associate($objCurso);
            $obj->turma()->associate($objTurma);

            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found User or Curso or Turma!</h1>";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->repository->findById($id);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obj = $this->repository->findById($id);
        $objUser = (new UserRepository())->findById($request->user_id);
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objTurma = (new TurmaRepository())->findById($request->turma_id);

        if(isset($obj) && isset($objUser) && isset($objCurso) && isset($objTurma)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->cpf = $request->cpf;
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);

            $obj->user()->associate($objUser);
            $obj->curso()->associate($objCurso);
            $obj->turma()->associate($objTurma);

            $this->repository->save($obj);
            
            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found Aluno or User or Turma or Curso!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        
        return "<h1>Delete - Not found Aluno!</h1>";
    }
}
