@extends('layout.layout')
@section('title',"$livros->TituloLivro")
@section('content')
    <div class="alert shadow">
        <h1 class="display-3" align="center">Livro: <br> {{$livros->TituloLivro}}</h1>
        <br>
        <ul>
            <li><mark>ID:</mark> {{$livros->id}}</li><hr style="width:200px;">
            <li><mark>Título:</mark> {{$livros->TituloLivro}}</li>&nbsp;
            <li><mark>Descrição:</mark> {{$livros->DescricaoLivro}}</li><hr style="width:200px;">
            <li><mark>Autor:</mark> {{$livros->AutorLivro}}</li>&nbsp;
            <li><mark>Editora:</mark> {{$livros->EditoraLivro}}</li>&nbsp;
            <li><mark>Ano de lançamento:</mark> {{$livros->AnoLancamentoLivro}}</li><br>
        </ul>
        @if((Auth::check()) && (Auth::user()->isAdmin()))
        {!! Form::open(["route" => ['livros.destroy', $livros->id], 'method' => "DELETE"]) !!}
        {!! Form::submit('Excluir',['class'=>'btn btn-danger shadow']) !!} |
        <a href="{{url('livros/'.$livros->id.'/edit')}}" class="btn btn-warning shadow">Alterar</a> |
        <a href="{{url('livros')}}" class="btn btn-info shadow">Voltar</a>
        {!! Form::close() !!}
        @endif
    </div>
@endsection