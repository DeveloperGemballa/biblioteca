<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\Livro;

define('PRAZO_EMPRESTIMO', 15);

class Emprestimo extends Model
{
    use HasFactory;

    public function contato() {
        return $this->belongsTo(Contato::class);
    }

    public function livro() {
        return $this->belongsTo(Livro::class);
    }

    public function getDevolvidoAttribute() {
        // Usando assessador
        //$datadevolucao = $this->datadevolucao;
        $prazodevolucao = \Carbon\Carbon::create($this->datahora)->addDays(PRAZO_EMPRESTIMO);
        //$prazo = $hoje->addDays(PRAZO_EMPRESTIMO);
        $atrasado = $prazodevolucao < \Carbon\Carbon::now()?"<mark class='bg-danger'> ATRASADO! </mark>":"";
        $devolvido = $this->datadevolucao == null?"Prazo de devolução: ".$prazodevolucao->format('d/m/Y').$atrasado:\Carbon\Carbon::create($this->datadevolucao)->format('d/m/Y H:i:s');
        return $devolvido;

    }

}
