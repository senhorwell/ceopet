<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Plano extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plano';

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
    public function planos()
    {
        return $this->hasMany(Prontuario::class, 'plano_id');
    }
    public function pets()
    {
        return $this->hasMany(Pet::class, 'plano_id');
    }
    public function carencias()
    {
        return $this->hasMany(Carencia::class, 'plano_id');
    }
}
