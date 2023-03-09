    <?php
      use \App\Session\login;

      //DADOS DO USUÁRIO LOGADO
      $usuarioLogado = Login::getUsuarioLogado();
    
        //DETALHES DO USUÁRIO
      $usuario = $usuarioLogado ?
                 $usuarioLogado['nome'].'<a href="logout.php" class="text-light font-weight-bold ml-2">Sair</a>' :
                 'Visitante'.'<a href="login.php" class="text-light font-weight-bold ml-2">Entrar</a>';

    ?>
    
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <title>WDEV Vagas!</title>
    </head>
    <body class="bg-dark text-light">

     <div class="container">

      <div class="jumbotron bg-danger">
        <h1>WDEV VAGAS</h1>
        <p>Exemplo de CRUD com PHP Orientado a Objetos</p>

        <hr class="border-light">

        <div class="d-flex justify-content-start">
          <?=$usuario?>
        </div>

      </div>


        
