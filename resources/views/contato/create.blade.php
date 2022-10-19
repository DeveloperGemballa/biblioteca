<?php ?>
@extends('layout.layout')
@section('title','Criar novo Contato')
@section('content')
<div class="shadow alert">

    <h1 class="display-4">Criar novo Cadastro: </h1>
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
    {!! Form::open(['route' => 'contatos.store', 'method' => 'POST']) !!}
    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', '', ['class'=>'form-control', 'required', 'placeholder' =>'Nome completo']) !!}
    
    {!! Form::label('email', 'E-mail') !!}
    {!! Form::email('email', '', ['class'=>'form-control', 'required', 'placeholder' =>'E-mail completo', 'pattern'=>'^[\w+.]+@\w+\.\w{2,}(?:\.\w{2})?$']) !!}
    
    {!! Form::label('telefone', 'Telefone') !!}
    {!! Form::tel('telefone', '', ['class'=>'form-control', 'required', 'placeholder' =>'+55 (99)8888-8888', 'patern'=>'[0-9]{3}-[0-9]{2}-[0-9]{3}']) !!}
    
    {!! Form::label('cidade', 'Cidade') !!}
    {!! Form::text('cidade', '', ['class'=>'form-control', 'required', 'placeholder' =>'Cidade residente']) !!}
    
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::text('estado', '', ['class'=>'form-control', 'required', 'placeholder' =>'Estado residente']) !!}
    <hr>
    {!! Form::submit('Salvar',['class'=>'btn btn-primary shadow']) !!} |
    {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary shadow'])!!}
    {!! Form::close() !!}
</div>
@endsection