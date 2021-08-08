<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\Credenciado;
use App\Models\Pet;
use App\Models\Plano;
use App\Models\Banner;
use Auth;

use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */

    public function bannerRegistra()
    {
        $banners = Banner::all();
        return view('banner.registra',['banners' => $banners]);
    }
    public function bannerRegistraSalvar(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $banner = Banner::create([
            'name'=> $request->post()["name"],
        ]);
        $imageName = $banner->id . '.png';  
   
        
        $request->image->move(public_path('img/banner/home'), $imageName);

        $banners = Banner::all();
        return view('banner.registra',['banners' => $banners]);
    }
    public function deletar(Request $request)
    {
        try{
            $post = $request->post();
            $plano = Banner::find($post["id"]);
            $plano->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return;
    }
}
