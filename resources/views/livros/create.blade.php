<?php ?>
@extends('layout.layout')
@section('title','Criar novo livro')
@section('content')
@if((Auth::check()) && (Auth::user()->isAdmin()))
<div class="shadow alert">
    
    <h1 class="display-4">Criar novo Cadastro de livro: </h1>
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
    </div>
    @endif
    {!! Form::open(['route' => 'livros.store', 'method' => 'POST']) !!}
    {!! Form::label('titulo', 'Titulo do livro') !!}
    {!! Form::text('titulo', '', ['class'=>'form-control', 'required', 'placeholder' =>'Titulo do livro']) !!}
    
    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::text('descricao', '', ['class'=>'form-control', 'required', 'placeholder' =>'Descrição completa']) !!}
    
    {!! Form::label('autor', 'Autor(a) do livro') !!}
    {!! Form::text('autor', '', ['class'=>'form-control', 'required', 'placeholder' =>'Autor do livro']) !!}
    
    {!! Form::label('editora', 'Editora do livro') !!}
    {!! Form::text('editora', '', ['class'=>'form-control', 'required', 'placeholder' =>'Editora do livro']) !!}
    
    {!! Form::label('anolancamento', 'Ano de lançamento do livro:') !!}
    {!! Form::number('anolancamento', '', ['class'=>'form-control', 'required', 'placeholder' =>'Ano de lançamento']) !!}
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-danger shadow'])!!}
    {!! Form::close() !!}
</div>
@endif
@endsection