<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesquisaController extends Controller
{
    public function ceps()
    {
        return view('pesquisas.ceps');
    }

    public function buscaCeps(Request $request)
    {
        $cep = $request->cep;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, "http://api.postmon.com.br/v1/cep/". $cep);
        $ceps = curl_exec($ch);

        curl_close($ch);

        $ceps = json_decode($ceps, true);

        return view('pesquisas.ceps', compact('ceps'));      
    }
}
