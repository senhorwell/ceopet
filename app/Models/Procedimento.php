<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Procedimento extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'procedimento';

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
    ];
    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class, 'procedimento_id');
    }
    public function carencia()
    {
        return $this->hasMany(Carencia::class, 'procedimento_id');
    }
}
