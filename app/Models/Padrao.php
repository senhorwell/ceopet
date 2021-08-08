<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yourapplicationname\User;


class Padrao extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'aluno_atividade_questaos';

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
        'resposta',
        'atividade_id',
        'questao_id',
        'aluno_id',
        'tempo_utilizado'
    ];

    public function aluno()
    {
        return $this->belongsTo(User::class);
    }

    public function atividade()
    {
        return $this->belongsTo(
            'Yourapplicationname\Models\Atividade',
            'atividade_id',
            'id'
        );
    }

    /**
     * Retorna a questao a qual a resposta pertence
     *
     * Cada resposta questão que o aluno possui a questão em si com as
     * alternativas e a reposta correta, essa função retorna essa questão
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function questao()
    {
        // return $this->belongsTo(Questao::class);
        // $atividade_questao = $this->atividadeQuestao();
        // dd($atividade_questao);
        return $this->hasOne(
            'Yourapplicationname\Models\AulaQuestao',
            'id',
            'questao_id'
        );
    }

}
