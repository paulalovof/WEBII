<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\Repositories\CursoRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repository;
    public function __construct(){
        $this->repository = new UserRepository();
    }
    public function index()
    {
        $data = $this->repository->selectAllWith(['role', 'curso']);
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
        $objCurso = (new CursoRepository())->findById($request->curso_id);
        $objRole = (new RoleRepository())->findById($request->role_id);
        
        if(isset($objCurso) && isset($objRole)) {
            $obj = new User();
            $obj->name = mb_strtoupper($request->nome, 'UTF-8');
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password); 
            $obj->curso()->associate($objCurso);
            $obj->role()->associate($objRole);
            $this->repository->save($obj);
            return "<h1>Store - OK</h1>";
        }
        return "<h1>Store - Not found Role or Curso!</h1>";
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
        $objRole = (new RoleRepository())->findById($request->role_id);
        $objCurso = (new CursoRepository())->findById($request->curso_id);

        if(isset($obj) && isset($objRole) && isset($objCurso)) {
            $obj->nome = mb_strtoupper($request->nome, 'UTF-8');
            $obj->email = mb_strtolower($request->email, 'UTF-8');
            $obj->password = Hash::make($request->password);

            $obj->curso()->associate($objCurso);
            $obj->role()->associate($objRole);

            $this->repository->save($obj);
            
            return "<h1>Upate - OK!</h1>";
        }
        return "<h1>Upate - Not found User or Role or Curso!</h1>";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if($this->repository->delete($id)) {
            return "<h1>Delete - OK!</h1>";
        }
        
        return "<h1>Delete - Not found User!</h1>";
    }
}
