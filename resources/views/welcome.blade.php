<style>
    .div1{
    position: absolute;
    width: 1250px;
    height: 1024px;
    left: 10%;
    top: 0px;

    background: #d9d9d9;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    border-radius: 30px;}
    .div2{
    position: absolute;
    width: 1200px;
    height: 880px;
    left: 25px;
    top: 125px;

    background: #ECECEC;
    border-radius: 15px;
    }
    .div3{
    position: absolute;
    width: 1260px;
    height: 70px;
    left: -5px;
    top: 41px;

    background: #000000;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }

</style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- js Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<div class='div1'>
  <div class='div3' align="center">
        <h1 class="display-4 text-light">Bem-vindo(a)!</h1>
   </div>
  <div class='div2'>
        °<a href="{{url('/contatos')}}" class="btn">Contato</a><br><br>
        °<a href="{{url('/livros')}}" class="btn">Livro</a><br><br>
        °<a href="{{url('/emprestimo')}}" class="btn">Empréstimos de livros</a>
  </div>
</div>