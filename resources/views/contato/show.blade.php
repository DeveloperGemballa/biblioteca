@extends('layout.layout')
@section('title','Contato - {{$contato->nome}}')
@section('content')
    <div class="alert shadow">
        <h1 class="display-3" align="center">Contato - <mark>{{$contato->nome}}</mark></h1>
        <br>
        <ul>
            <li><mark>id:</mark> {{$contato->id}}</li><hr style="width:200px;">
            <li><mark>nome:</mark> {{$contato->nome}}</li>
            <li><mark>email:</mark> <a href="mailto:{{$contato->email}}">{{$contato->email}}</a> &nbsp; <-- enviar e-mail</li>
            <li><mark>telefone:</mark> {{$contato->telefone}}</li><hr style="width:250px;">
            <li><mark>cidade:</mark> {{$contato->cidade}}</li>
            <li><mark>estado:</mark> {{$contato->estado}}</li><br>
        </ul>
        @if((Auth::check()) && (Auth::user()->isAdmin()))
        {!! Form::open(["route" => ['contatos.destroy', $contato->id], 'method' => "DELETE"]) !!}
        <a href="{{url('contatos/'.$contato->id.'/edit')}}" class="btn btn-warning shadow">Alterar</a> |
        {!! Form::submit('Excluir',['class'=>'btn btn-danger shadow']) !!} |
        <a href="{{url('contatos')}}" class="btn btn-info shadow">Voltar</a>
        {!! Form::close() !!}
        @endif
    </div>
@endsection