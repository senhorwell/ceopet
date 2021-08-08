<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;
use App\Models\Prontuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Request;
class ProntuarioExport implements FromCollection {

   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prontuario::where('guia_id',Request::session()->get('guia_id'))->get();
    }
}
