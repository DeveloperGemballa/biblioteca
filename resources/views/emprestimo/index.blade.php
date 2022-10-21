@extends('layout.layout')
@section('title','Empréstimos')
@section('content')
<div class="container">
    <h1 class="display-4">Empréstimos</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'emprestimos/buscar','method'=>'GET'])}}
        <div class="row">
            <div class="col-sm-3">
                -----------<a class="btn btn-secondary" href="{{url('emprestimos/create')}}">Novo Empréstimo</a>-----------
            </div>
            <div class="col-sm-9">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('livros/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <br />
    <br>
    <br>


    <table class="table table-hover">
    <tr>
        <th>Id</th>
        <th>Contato</th>
        <th>Livro</th>
        <th>Data</th>
        <th>Devolução</th>
    </tr>
        @foreach ($emprestimos as $emprestimo)
        
            <tr>
                <td>
                    <a href="{{url('emprestimos/'.$emprestimo->id)}}" class="btn btn-info shadow">{{$emprestimo->id}}</a> <-- 
                </td>
                <td>
                    {{$emprestimo->contato->nome}}
                </td>
                <td>
                    {{$emprestimo->livro_id}}
                </td>
                <td>
                    {!!\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')!!}
                </td>
                <td>@if($emprestimo->datadevolucao != null)
                            <strong> <mark class="bg-success">DEVOLVIDO</mark> </strong>
                        @endif{!! $emprestimo->devolvido !!}</td>
            </tr>
        @endforeach
    </table>
    {!! $emprestimos->links() !!}
    </div>
@endsection
