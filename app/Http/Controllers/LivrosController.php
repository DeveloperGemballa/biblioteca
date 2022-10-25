<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Livro;
use Session;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livros = Livro::paginate(13);

        return view('livros.index',array('livros' => $livros));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        return view('livros.create');
    } else {
        return redirect('login');
    }
    }

    public function buscar(Request $request) {
        $livros = Livro::where('TituloLivro','LIKE','%'.$request->input('busca').'%')->orwhere('AutorLivro','LIKE','%'.$request->input('busca').'%')->orwhere('EditoraLivro','LIKE','%'.$request->input('busca').'%')->orwhere('AnoLancamentoLivro','LIKE','%'.$request->input('busca').'%')->get();
        return view('livros.index',array('livros' => $livros,'busca'=>$request->input('busca')));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $livro = new Livro();
        $livro->TituloLivro = $request->input('titulo');
        $livro->DescricaoLivro = $request->input('descricao');
        $livro->AutorLivro = $request->input('autor');
        $livro->EditoraLivro = $request->input('editora');
        $livro->AnoLancamentoLivro = $request->input('anolancamento');
        if($livro->save())
        {
            return redirect('livros');
        }
    } else {
        return redirect('login');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livros = Livro::find($id);
        return view('livros.show',array('livros' => $livros));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $livros = Livro::find($id);
        return view("livros.edit",array("livro"=>$livros));
    } else {
        return redirect('login');
    }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $livro = Livro::find($id);
        $livro->TituloLivro = $request->input('titulo');
        $livro->DescricaoLivro = $request->input('descricao');
        $livro->AutorLivro = $request->input('autor');
        $livro->EditoraLivro = $request->input('editora');
        $livro->AnoLancamentoLivro = $request->input('anolancamento');
        if($livro->save()) {
            Session::flash('mensagem','Livro alterado com sucesso');
            return redirect()->back();
        }
    } else {
        return redirect('login');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
        $livro = Livro::find($id);
        $livro -> delete();
        Session::flash("mensagem","Livro excluído com sucesso");
        return redirect(url("livros/"));
    } else {
        return redirect('login');
    }
    }
}
