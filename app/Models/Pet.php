<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Pet extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pet';

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
        'name',
        'credenciado_id',
        'raca',
        'especie',
        'aniversario',
        'microchip',
        'plano_id',
        'status',
    ];

    public function dono()
    {
        return $this->belongsTo(Credenciado::class, 'credenciado_id');
    }
    public function plano()
    {
        return $this->belongsTo(Plano::class, 'plano_id');
    }
}
