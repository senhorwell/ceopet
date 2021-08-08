<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Credenciado;
use App\Models\Pet;
use App\Models\Plano;
use Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }
    public function update(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = Auth::user()->id . '.png';  
   
        $request->image->move(public_path('img/profile'), $imageName);
   
        return redirect('/');
    }
    public function dados()
    {
        $user = Auth::user();
        return view('profile.dados', ['user' => $user]);
    }
    public function registrarPaciente()
    {
        $post = Request::post();

        $dono = Credenciado::create([
            'name'=> $post["name"],
            'fantasia' => $post["fantasia"],
            'cnpj'=> $post["cnpj"],
            'telefone'=> $post["phone"],
            'email'=> $post["email"],
            'endereco'=> $post["endereco"],
            'cep'=> $post["cep"],
            'numero'=> $post["numero"],
            'complemento'=> $post["complemento"],
            'bairro'=> $post["bairro"],
            'cidade'=> $post["cidade"],
            'estado'=> $post["estado"],
        ]);
        $pet = Pet::create([
            'name'=> $post["paciente"],
            'credenciado_id' => $dono->id,
            'raca'=> $post["raca"],
            'plano'=> $post["plano"],
        ]);
    }
}
