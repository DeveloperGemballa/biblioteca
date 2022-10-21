@extends('layout.layout')
@section('title','Listagem de Contatos')
@section('content')
{{Form::open(['url'=>'contatos/buscar','method'=>'GET', 'class' => 'position-relative start-50 translate-middle'])}}
    <div class="row container">
        <div class="col-sm-9">
            <div class="input-group ml-5">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if(isset($_GET['busca']))
                    @if($_GET['busca'] !== null)
                    <span class="input-group-btn">
                        <a href="/contatos" class="btn btn-info">Todos</a>
                    </span>
                    &nbsp;|&nbsp;
                    @endif
                @endif
                {{Form::text('busca','',['class'=>'form-control shadow','required','placeholder'=>'buscar'])}}
                &nbsp;|&nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar',['class'=>'btn btn-secondary shadow'])}}
                </span>
            </div>
        </div>
    </div>
{{Form::close()}}
    <h1 align="center" class="display-2">Listagem de Contatos</h1>
    <br>
    <br>
    @if(Session::has("mensagem"))
        <div class="alert alert-danger">
            {!! Session::get("mensagem") !!}
        </div>
    @endif
    <ol>
    @foreach($contatos as $contato)
        <li><a href="{{url('contatos/'.$contato->id)}}" class="btn"><mark>{{$contato->nome}}</mark></a></li>
    @endforeach
    </ol>
@endsection