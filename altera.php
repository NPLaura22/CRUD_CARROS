<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>CRUD - Controle de Carros</title>
</head>

<body style="background-color: gray;">
<nav class="navbar navbar-expand-lg navbar-dark" > 

        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 grid gap-4">
              <li class="nav-item">
                <a class="nav-link active speech" style="color:hotpink; font-weight: bold; font-family: sans-serif; "aria-current="page" href="index.html"> HOME </a> 
            </li>
            <li class="nav-item">
                <a class="nav-link active speech" style="color:hotpink; font-weight: bold; font-family: sans-serif" href="consulta.php"> CONSULTA </a> 
            </li>

        </ul>

    </div>
</nav>

<h2 style="color:white">Altera</h2>

</body>
</html>

<?php

    include("bd.php");

    $cod = $_POST['codCarro'];
    $novoNome = $_POST['nome'];
    $novaMontadora = $_POST['montadora'];
    $novaFoto = $_FILES['foto'];
    $nomeFoto = $novaFoto['name'];
    $tipoFoto = $novaFoto['type'];
    $tamanhoFoto = $novaFoto['size'];

    alterar($cod, $novoNome, $novaMontadora, $novaFoto, $nomeFoto);

?>
