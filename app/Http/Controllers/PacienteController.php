<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Procedimento;
use App\Models\Credenciado;
use App\Models\Prontuario;
use App\Models\Plano;
use App\Models\Carencia;
use App\Models\Pet;
use Request;

class PacienteController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function consultar()
    {
        $prontuarios = Prontuario::with("procedimento")->get();
        $pets = Pet::with(['dono','plano'])->get();
        $credenciados = Credenciado::all();
        $planos = Plano::all();
        $carencia = Carencia::with("procedimento")->get();

        return view('paciente.consulta', ['pets' => $pets,'credenciados' => $credenciados,'planos'=>$planos,'prontuarios'=>$prontuarios]);
    }
    public function consultarProntuario()
    {
        $post = Request::post();

        if( isset($post["paciente"]) ) {
            $prontuarios = Prontuario::with("procedimento")->where('pet_id',$post["paciente"])->get();
            $carencias = Carencia::with("procedimento")->where('plano_id',$post["plano"])->get();

            $pacotes = array();
            foreach($carencias as $carencia){
                $valid = 0;
                foreach($prontuarios as $prontuario){
                    if($prontuario->procedimento_id == $carencia->procedimento_id){
                        $valid += $prontuario->qtd;
                    }
                }
                if($valid > 0){
                    $pacote = array([
                        "nome" => $carencia->procedimento->name,
                        "qtd" => $valid,
                        "limite" => $carencia->limite,
                        "carencia" => $carencia->carencia,
                    ]);
                    $pacotes = array_merge($pacotes,$pacote);
                }
            }
        }

        if(sizeof($prontuarios) <= 0){
            return array(
                "error" => "vazio",
            );
        }
        return $pacotes;
    }
    public function registra()
    {
        $credenciados = Credenciado::all();
        $planos = Plano::all();
        return view('paciente.registra', ['credenciados' => $credenciados,'planos' => $planos]);
    }
    public function registrar()
    {
        $post = Request::post();

        $pet = Pet::create([
            'name'=> $post["name"],
            'credenciado_id' => $post["dono"],
            'raca'=> $post["raca"],
            'especie'=> $post["especie"],
            'aniversario'=> $post["aniversario"],
            'microchip'=> $post["microchip"],
            'plano_id'=> $post["plano"],
            'status'=> $post["status"],
        ]);
        return redirect('/paciente/consulta');
    }
}
