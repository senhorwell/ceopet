<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Procedimento;
use Request;

class ProcedimentoController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function registrar()
    {
        $procedimentos = Procedimento::all();
        return view('procedimento.registra',['procedimentos' => $procedimentos]);
    }

    public function registrarSalvar()
    {
        $post = Request::post();

        if($post["name"] != ""){
            if($post["edit"] != 0){
                $procedimento = Procedimento::find($post["edit"]);
                $procedimento->update([
                    'name'=> $post["name"]
                ]);
            }else{
                $procedimento = Procedimento::create([
                    'name'=> $post["name"]
                ]);
            }
        }
        $procedimentos = Procedimento::all();
        return view('procedimento.registra',['procedimentos' => $procedimentos]);
    }

    public function deletar()
    {
        try{
            $post = Request::post();
            $procedimento = Procedimento::find($post["id"]);
            $procedimento->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return;
    }
}
