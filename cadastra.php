
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css"> 
    <title>CRUD - Controle de Carros</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <title>CRUD - Controle de Carros</title>

    <style>
        #sucess {
            color: green;
            font-weight: bold;
        }

        #error {
            color: red;
            font-weight: bold;
        }

        #warning {
            color: orange;
            font-weight: bold;
        }

        body {
          display: flex;
          flex-direction: column;
          align-items: center; /* Centraliza horizontalmente */
          justify-content: flex-start; /* Alinha no topo */
          height: 100vh; /* Toda a altura da viewport */
          margin: 0;
          background-color: black;
      }


      .form {
          display: flex;
          flex-direction: column;
          gap: 20px;
          padding-left: 8em;
          padding-right: 8em;
          padding-bottom: 0.4em;
          background-color: #171717;
          border-radius: 25px;
          transition: .4s ease-in-out;
      }

      #heading {
          text-align: center;
          margin: 2em;
          color: rgb(255, 255, 255);
          font-size: 1.5em;
      }

      .field {
          display: flex;
          align-items: center;
          justify-content: center;
          gap: 1.5em;
          border-radius: 25px;
          padding: 0.6em;
          border: none;
          outline: none;
          color: white;
          background-color: #171717;
          box-shadow: inset 2px 5px 10px rgb(5, 5, 5);
          width: 110%;
      }

      .input-icon {
          height: 1.3em;
          width: 1.3em;
          fill: white;
      }

      .input-field{ /*QUANDO DIGITA TEXTO (COD, NOME)*/
          background: none;
          border: none;
          outline: none;
          width: 100%;
          color: #d3d3d3;
      }
      select.input-field option {
        color: #03f40f;
      }

      .mont { /*LABEL: MONTADORA*/
        color: whitesmoke;
        opacity: 0.5;
        font-size: 16px;
        font-weight: bold;
    }

    .form .btn {
      display: flex;
      justify-content: center;
      flex-direction: row;
      margin-top: 2.5em;
  }

  .button1 {
      padding: 0.5em;
      padding-left: 1.1em;
      padding-right: 1.1em;
      border-radius: 5px;
      margin-right: 0.5em;
      border: none;
      outline: none;
      transition: .4s ease-in-out;
      background-color: #252525;
      color: white;
  }

  .button1:hover {
      background-color: black;
      color: white;
  }

  .button2 {
      padding: 0.5em;
      padding-left: 2.3em;
      padding-right: 2.3em;
      border-radius: 5px;
      border: none;
      outline: none;
      transition: .4s ease-in-out;
      background-color: #252525;
      color: white;
  }

  .button2:hover {
      background-color: black;
      color: white;
  }

  .button3 {
      margin-bottom: 3em;
      padding: 0.5em;
      border-radius: 5px;
      border: none;
      outline: none;
      transition: .4s ease-in-out;
      background-color: #252525;
      color: white;
      width: 110%;
  }

  .button3:hover {
      background-color: hotpink;
      color: white;
  }

  //CONTROLE DE CARROS
  .button-container {
      margin-top: 2%;
  }

  .button {
      margin: 0;
      height: auto;
      background: transparent;
      padding: 0;
      border: none;
  }

  /* button styling */
  .button {
      --border-right: 6px;
      --text-stroke-color: #03f40f;
      --fs-size: 2em;
      letter-spacing: 3px;
      text-decoration: none;
      font-size: var(--fs-size);
      font-family: "Arial";
      position: relative;
      text-transform: uppercase;
      color: transparent;
      -webkit-text-stroke: 1px var(--text-stroke-color);
  }
  .nav-link{
      color: white;
  }

  .nav-link:hover{
      color: #BE2121;
  }

</style>

</head>

<body>

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

<button data-text="Awesome" class="button">
    <span class="actual-text">&nbsp;CONTROLE DE CARROS L&L&nbsp;</span><br><br>
</button>

<div>
    <form method="post" enctype="multipart/form-data" class="form">
        <p id="heading">Cadastro de Carros</p>
        <div class="field">

            <input name="codCarro" placeholder="Código do Carro" style="font-weight: bold;" class="input-field" type="text" size="5"> <br><br>

            <input  name="nome" placeholder="Nome do Carro" style="font-weight: bold;" class="input-field" type="text" size="20"> <br><br>

            <label class="mont">Montadora</label>
            <select name="montadora" id="montadora" class="input-field">
                <option></option>
                <option value="Audi">Audi</option>
                <option value="BMW">BMW</option>
                <option value="Ferrari">Ferrari</option>
                <option value="Honda">Honda</option>
                <option value="Mercedes">Mercedes</option>                
                <option value="Porsche">Porsche</option>
                <option value="Volkswagen">Volkswagen</option>             
            </select><br><br>

            <input placeholder="Foto" class="input-field" type="file" accept="image/gif, image/png, image/jpg, image/jpeg" name="foto">

        </div>
        <!--<button type="submit" class="button3" value="Cadastrar">Cadastrar</button>-->
        <input class="button3" type="submit" value="Cadastrar">
    </form>
</div>

</body>
</html>

<?php
include("bd.php");

define('TAMANHO_MAXIMO', (2 * 1024 * 1024));

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    try{
            //inserindo dados
        $cod = $_POST["codCarro"];
        $nome = $_POST["nome"];
        $montadora = $_POST["montadora"];
            //foto
        $foto = $_FILES["foto"];
        $nomeFoto = $foto["name"];
        $tipoFoto = $foto["type"];
        $tamanhoFoto = $foto["size"];

        if ((trim($cod) == "") || (trim($nome) == "")) {
            echo "<span id='warning'>Código e Nome são obrigatórios!</span>";
        } else if ( ($nomeFoto != "") && 
            (!preg_match('/^image\/(jpg|jpeg|png|gif)$/', $tipoFoto)) ) {
            echo "<span id='error'>Não é uma imagem válida!</span>";
            //validação tamanho arquivo
        } else if ($tamanhoFoto > TAMANHO_MAXIMO) { 
            echo "<span id='error'>A imagem deve possuir no máximo 2 MB</span>";
        }
        else {
            cadastrar($cod, $nome, $montadora, $nomeFoto, $foto);
        }
    } catch(PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
