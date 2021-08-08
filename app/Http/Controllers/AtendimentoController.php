<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Procedimento;
use App\Models\Prontuario;
use App\Models\ProntuarioExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Credenciado;
use App\Models\Pet;
use App\Models\Guia;
use App\Models\Carencia;
use Request;

class AtendimentoController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function registrar()
    {
        $pets = Pet::with('dono','plano')->where('status',1)->get();
        $procedimentos = Procedimento::all();
        $guias = Guia::all();
        $prontuarios = array();

        return view('atendimento.registra', ['procedimentos' => $procedimentos,'pets' => $pets,'prontuarios' => $prontuarios,'guias' => $guias]);
    }
    public function registrarProntuario()
    {
        $post = Request::post();

        if(isset($post["finalizar"])){
            $guia = Guia::create([
                'status' => 'Finalizado',
                'pet_id' => $post["paciente"]
            ]);

            Prontuario::where('prontuario_status',0)
                        ->where('pet_id',$post['paciente'])
                        ->update(['guia_id' => $guia->id,'prontuario_status' => 1]);
        }
        else{

            $carencia = Carencia::where('plano_id',$post["plano_id"])->where('procedimento_id',$post["prod_id"])->first();
            $prontuario = Prontuario::where('pet_id',$post["paciente"])->where('procedimento_id',$post["prod_id"])->count();
            
            $novoValor = $prontuario + $post["qtd"];

            if($novoValor > $carencia->limite){
                die(header("HTTP/1.0 404 Not Found")); //Throw an error on failure
            }else{
                return "deu certo";
                Prontuario::create([
                    'procedimento_id'=> $post["prod_id"],
                    'pet_id' => $post["paciente"],
                    'qtd'=> $post["qtd"],
                    'prontuario_status'=> 0,
                    'obs'=> $post["obs"]
                ]);
            }
        }
        return redirect('/atendimento/registra');
    }
    public function consultar()
    {
        $pets = Pet::with('dono')->where('status',1)->get();
        $guias = Guia::all();

        $procedimentos = Procedimento::all();
        $prontuarios = Prontuario::with('procedimento')->get();
        

        return view('atendimento.consulta', ['procedimentos' => $procedimentos,'prontuarios' => $prontuarios,'pets' => $pets,'guias' => $guias]);
    }
    public function excel()
    {
        $post = Request::post();
        $guia = Guia::find($post["guia_id"]);
        $pet = Pet::find($guia["pet_id"]);
        Request::session()->put('guia_id', $post["guia_id"]);
        $saida = 'prontuario-' . $pet["name"] .'-'. date('d-m-Y', time()) . '.xlsx';
        return Excel::download(new ProntuarioExport, $saida );
    }
}
