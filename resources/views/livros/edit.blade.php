@extends('layout.layout')
@section('title','Alteração livro {{$livro->TituloLivro}}')
@section('content')
    <h1>Alteração livro {{$livro->TituloLivro}}</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['livros.update',$livro->id], 'method' => 'PUT'])}}
        {{Form::label('titulo', 'Titulo do Livro')}}
        {{Form::text('titulo',$livro->TituloLivro,['class'=>'form-control','required','placeholder'=>'Nome completo do livro (Título)'])}}
        {{Form::label('descricao', 'Descrição do livro')}}
        {{Form::text('descricao',$livro->DescricaoLivro,['class'=>'form-control','required','placeholder'=>'Insira a descrição'])}}
        {{Form::label('autor', 'Autor(a)')}}
        {{Form::text('autor',$livro->AutorLivro,['class'=>'form-control','required','placeholder'=>'Autor(a) do livro'])}}
        {{Form::label('editora', 'Editora')}}
        {{Form::text('editora',$livro->EditoraLivro,['class'=>'form-control','required','placeholder'=>'Nome da editora do livro'])}}
        {{Form::label('anolancamento', 'Ano de lançamento')}}
        {{Form::text('anolancamento',$livro->AnoLancamentoLivro,['class'=>'form-control','required','placeholder'=>'Ano de lançamento do livro'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Undo',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
        <a href="/livros" class="btn btn-warning">voltar</a>
    {{Form::close()}}
@endsection