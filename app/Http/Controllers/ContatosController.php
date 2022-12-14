<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contato;
use Session;

class ContatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();
        return view('contato.index',array('contatos' => $contatos));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ((Auth::check()) && (Auth::user()->isAdmin())) {
            return view('contato.create');
        }
        else {
            return redirect('login');
        }
    }

    public function buscar(Request $request) {
        $contatos = Contato::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('email','LIKE','%'.$request->input('busca').'%')->orwhere('cidade','LIKE','%'.$request->input('busca').'%')->orwhere('estado','LIKE','%'.$request->input('busca').'%')->get();
        return view('contato.index',array('contatos' => $contatos,'busca'=>$request->input('busca')));
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
        $this->validate($request,[
            'nome' => 'required|min:3]',
            'email' => 'required|e-mail',
            'telefone' => 'required',
            'cidade' => 'required',
            'estado' => 'required',
        ]);
        $contato = new Contato();
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if($contato->save())
        {
            return redirect('contatos');
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
        $contato = Contato::find($id);
        return view('contato.show',array('contato'=>$contato));
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
        $contato = Contato::find($id);
        return view("contato.edit",array("contato"=>$contato));
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
        $contato = Contato::find($id);
        $contato->nome = $request->input('nome');
        $contato->email = $request->input('email');
        $contato->telefone = $request->input('telefone');
        $contato->cidade = $request->input('cidade');
        $contato->estado = $request->input('estado');
        if($contato->save()) {
            Session::flash('mensagem','Contato alterado com sucesso');
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
        $contato = Contato::find($id);
        $contato -> delete();
        Session::flash("mensagem","Contato exclu??do com sucesso");
        return redirect(url("contatos/"));
        } else {
            return redirect('login');
        }
    }
}
