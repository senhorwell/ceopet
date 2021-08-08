<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Prontuario extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prontuario';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'procedimento_id',
        'pet_id',
        'qtd',
        'obs',
        'guia_id',
        'prontuario_status',
    ];
    public function procedimento()
    {
        return $this->belongsTo(Procedimento::class, 'procedimento_id');
    }
}
