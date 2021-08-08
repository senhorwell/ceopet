<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Carencia extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plano_carencia';

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
        'plano_id',
        'procedimento_id',
        'carencia',
        'limite',
    ];
    public function plano()
    {
        return $this->hasMany(Plano::class, 'plano_id');
    }
    public function procedimento()
    {
        return $this->belongsTo(Procedimento::class, 'procedimento_id');
    }
}