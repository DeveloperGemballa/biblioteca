<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contato;
use App\Models\Livros;

class Emprestimo extends Model
{
    use HasFactory;

    public function contato() {
        return $this->belongsTo(Contato::class);
    }

    public function livro() {
        return $this->belongsTo(Livros::class);
    }

}
