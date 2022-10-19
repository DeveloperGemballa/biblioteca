@extends('layout.layout')
@section('title','Listagem')
@section('content')
{{Form::open(['url'=>'livros/buscar','method'=>'GET'])}}
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
                        <a href="/livros" class="btn btn-info">Todos</a>
                    </span>
                    &nbsp;|&nbsp;
                    @endif
                @endif
                {{Form::text('busca','',['class'=>'form-control','required','placeholder'=>'Insira aqui o que deseja procurar de nossos livros'])}}
                &nbsp;|&nbsp;
                <span class="input-group-btn">
                    {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                </span>
            </div>
        </div>
    </div>
    <hr>
    <br>
    <br>
{{Form::close()}}
    <ul>
        @foreach($livros as $livro)
            <li><a href="{{url('livros/'.$livro->id)}}" class="btn"><mark>{{$livro->TituloLivro}}</mark></a></li>
        @endforeach
    </ul>
    <br>
    <div class="position-absolute start-50 translate-middle"> 
        {{ $livros -> links() }}
    </div>
@endsection