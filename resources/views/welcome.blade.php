<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- js Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <style>
    body {
      background: black;
    }
    .header {
      /* Menu */

      position: absolute;
      width: 80%;
      height: 60px;
      top: 0px;

      background: #FFFFFF;
      border-radius: 10px;
      font-size: 35px;
      text-align: center;
    }
    .content {
      /* Conteúdo */

      position: absolute;
      width: 80%;
      height: 850px;
      top: 80px;

      background: #FFFFFF;
      border-radius: 10px;
    }
    .buscar {
      
      position: absolute;
      width: 80%;
      height: 80vh;
      top: 80px;
      left: 120px;

      background: #EDECEC;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
        <a href="{{url('/')}}" class="btn">HOME</a> 
        <a href="{{url('livros/create')}}" class="btn">Adicionar livro</a> 
        <a href="{{url('/livros')}}" class="btn">Listar livros</a> 
        <a href="{{url('/emprestimos')}}" class="btn">Empréstimos de livros</a>  
        <a href="{{url('contatos/create')}}" class="btn">Adicionar Contato</a> 
        <a href="{{url('/contatos')}}" class="btn">Listar contatos</a>
    </div>
    <div class="content">
        <div class="buscar">
        <div class="row justify-content-center" style="margin:50px;">
        <div class="col-md-11 text-light">
            <div class="row text-center h5">
                <div class="col m-3 bg-success text-black">
                    <div class="card-header p-2">Livros</div>
                    <div class="card-body h3 p-5">
                        {{$numLivros}}
                    </div>
                </div>
                <div class="col m-3 bg-primary text-black">
                    <div class="card-header p-2">Contatos</div>
                    <div class="card-body h3 p-5">
                        {{$numContatos}}
                    </div>
                </div>
                <div class="col m-3 bg-warning text-black">
                    <div class="card-header p-2">Empréstimos</div>
                    <div class="card-body h3 p-5">
                        {{$numEmprestimos}}
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col m-3 text-black">
                    <div class="card-header p-2 h5">Empréstimos a devolver</div>
                    <div class="card-body ">
                        <table class="table table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Contato</th>
                                <th>Livro</th>
                                <th>Data</th>
                                <th>Devolução</th>
                            </tr>
                            @foreach ($emprestimosadevolver as $emprestimo)
                            <tr>
                                <td>
                                    <a href="emprestimos/{{$emprestimo->id}}" class="btn btn-primary">{{$emprestimo->id}}</a>
                                </td>
                                <td>
                                    {{$emprestimo->contato_id}} - {{$emprestimo->contato->nome}}
                                </td>
                                <td>
                                    {{$emprestimo->livro_id}} - {{$emprestimo->livro->TituloLivro}}
                                </td>
                                <td>
                                    {{\Carbon\Carbon::create($emprestimo->datahora)->format('d/m/Y H:i:s')}}
                                </td>
                                <td>{!!$emprestimo->devolvido!!}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
        </div>
    </div>
        </div>
          @yield('content')
    </div>
  </div>
</body>
</html>