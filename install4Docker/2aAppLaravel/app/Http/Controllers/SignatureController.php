<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class SignatureController extends Controller
{
    public function index( Request $request )
    {
        $validator = Validator::make( $request->all(), [
            "drink" => "required|string"
        ]);

        //$parametros = http_build_query( $request->all() );

        $parametros = $validator->fails() ? $validator->messages() : $validator->validated()["drink"];

        $nome = Auth::user()->name;
        $documento = Client::where('user_id', Auth::user()->id)->first()->document;
        $status = Auth::user()->client->signatures->first()->status->name;

        // Ou

        $user = Auth::user();
        $cliente = $user->client;
        $nome = $user->name;
        $documento = $cliente->document;
        $status = $cliente->signatures->first()->status->name;

        return view("test", [
            "name" => $nome,
            "document" => $documento,
            "status" => $status,
            "params" => $parametros
        ]);
    }
}
