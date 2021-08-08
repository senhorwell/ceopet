<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Credenciado extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'credenciado';

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
        'fantasia',
        'cnpj',
        'telefone',
        'email',
        'endereco',
        'cep',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class, 'credenciado_id');
    }
}
