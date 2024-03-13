<?php

namespace App\Http\Controllers;

use App\Repositories\ComprovanteRepository;
use App\Models\Comprovante;
use App\Repositories\UserRepository;
use App\Repositories\AlunoRepository;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;

class ComprovanteController extends Controller
{
    protected $repository;
    public function __construct(){
        $this->repository = new ComprovanteRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['categoria', 'aluno', 'user']);
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $objUser = (new UserRepository())->findById($request->user_id);
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objCategoria = (new CategoriaRepository())->findById($request->categoria_id);

        if(isset($objUser) && isset($objAluno) && isset($objCategoria)) {
            $obj = new Comprovante();
            
            $obj->horas = $request->horas;
            $obj->atividade = mb_strtoupper($request->atividade, 'UTF-8');

            $obj->categoria()->associate($objCategoria);
            $obj->aluno()->associate($objAluno);
            $obj->user()->associate($objUser);

            $this->repository->save($obj);

            return "<h1>Store - OK!</h1>";
        }
        return "<h1>Store - Not found User or Aluno or Categoria!</h1>";
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
        $objAluno = (new AlunoRepository())->findById($request->aluno_id);
        $objCategoria = (new CategoriaRepository())->findById($request->categoria_id);

        if(isset($obj) && isset($objUser) && isset($objAluno) && isset($objCategoria)) {

            $obj-> horas= $request->horas;
            $obj->atividade = mb_strtoupper($request->atividade, 'UTF-8');

            $obj->user()->associate($objUser);
            $obj->aluno()->associate($objAluno);
            $obj->categoria()->associate($objCategoria);

            $this->repository->save($obj);
            
            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found Comprovante or User or Aluno or Categoria!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        
        return "<h1>Delete - Not found Comprovante!</h1>";
    }
}
