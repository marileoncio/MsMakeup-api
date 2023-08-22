<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Models\MsMakeup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(ClienteRequest $request){
     $usuario = Cliente::create([
        'nome'=> $request->nome,
        'celular'=> $request->celular,
        'email'=> $request->email,
        'password'=> Hash::make($request->password)
     ]);
        return response()->json([
            "success" => true,
            "message" =>"Cliente Cadrastado com sucesso",
            "data" => $usuario

        ],200);
    }

public function pesquisarPorId($id){
  return Cliente::find($id);
}

};





    

