@extends('layout.layout')
@section('title','Empréstimo - '.$emprestimo->id)
@section('content')
    <div class="card w-50">
        <div class="card-header">
            <h1>Empréstimo - {{$emprestimo->id}}</h1>
        </div>
        <div class="card-body">
            <div class="col-4">
            @if(Session::has('mensagem'))
                <div class="alert alert-info">
                    {{Session::get('mensagem')}}
                </div>
            @endif
                        @if($emprestimo->datadevolucao == null)
                            {{Form::open(['route'=>['emprestimos.devolver',$emprestimo->id],'method'=>'PUT'])}}
                            {{form::submit('Devolver',['class'=>'btn btn-success','onclick'=>'return confim("Confirma devolução?")'])}}
                            {{Form::close()}}
                        @endif
                        @if($emprestimo->datadevolucao != null)
                            <strong> <mark class="bg-success">DEVOLVIDO {!! $emprestimo->devolvido !!}</mark> </strong>
                        @endif
            </div>
            <br>
            <h3 class="card-title">ID: {{$emprestimo->id}}</h3>
            Data:
            {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}} -
            {!! $emprestimo->devolvido !!}
            <br/>
            Contato: {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}<br/>
            Livro: {{$emprestimo->livro_id}} - {{$emprestimo->livro->TituloLivro}}<br/>

            <p class="text">obs: {{$emprestimo->obs}}</p>
        </div>
        <div class="card-footer">
            {{Form::open(['route' => ['emprestimos.destroy',$emprestimo->id],'method' => 'DELETE'])}}
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
            <a href="{{url('emprestimos/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        </div>
    </div>
@endsection
