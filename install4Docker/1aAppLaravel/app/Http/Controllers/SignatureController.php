<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignatureController extends Controller
{
    public function index( Request $req )
    {
        $params = $req->all();
        $bebida = array_key_exists('drink', $params) ? $params['drink'] : 'Cerveja';

        $nome = auth()->user()->name;
        $documento = auth()->user()->client->document;
        $status = auth()->user()->client->signatures->first()->status->name;

        return view('teste', [ 'nome' => $nome, 'documento' => $documento, 'situacao' => $status . ' !!!', 'bebida' => $bebida  ]);
    }
}
