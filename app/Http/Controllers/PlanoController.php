<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Plano;
use App\Models\Carencia;
use App\Models\Procedimento;
use Request;

class PlanoController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function registrar()
    {
        $planos = Plano::all();
        return view('plano.registra',['planos' => $planos]);
    }
    public function registrarCarencia()
    {
        $post = Request::post();

        $carencia = Carencia::with('procedimento')->where('plano_id',$post["plano_id"])->get();
        $plano = Plano::find($post["plano_id"]);
        $procedimentos = Procedimento::all();
        return view('carencia.registra',['carencias' => $carencia,'procedimentos' => $procedimentos,'plano' => $plano]);
    }

    public function registrarCarenciaSalvar()
    {
        try{
            $post = Request::post();
            
            $plano = Plano::find($post["plano_id"]);
    
            $plano->update([
                'name' => $post["name"]
            ]);
    
            if(!isset($post["finalizar"])) {
                Carencia::create([
                    'plano_id'=> $post["plano_id"],
                    'procedimento_id'=> $post["procedimento_id"],
                    'carencia'=> $post["carencia"],
                    'limite'=> $post["limite"]
                ]);
                $carencia = Carencia::with('procedimento')->where('plano_id',$post["plano_id"])->get();
                $procedimentos = Procedimento::all();
                return "Sucesso";
            }else{
                return redirect('/');
            }

        } catch (\Exception $e) {
            return "Houve algum erro";
        }
        return;
    }
    public function registrarCarenciaDeletar()
    {
        try{
            $post = Request::post();
            $plano = Carencia::find($post["id"]);
            $plano->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return;
    }
    public function deletar()
    {
        try{
            $post = Request::post();
            $plano = Plano::find($post["id"]);
            $plano->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return;
    }

    public function registrarSalvar()
    {
        $post = Request::post();

        if($post["name"] != ""){
            if($post["edit"] != 0){
                $plano = Plano::find($post["edit"]);
                $plano->update([
                    'name'=> $post["name"]
                ]);
            }else{
                $plano = Plano::create([
                    'name'=> $post["name"]
                ]);
            }
        }
        $planos = Plano::all();
        return view('plano.registra',['planos' => $planos]);
    }
}
