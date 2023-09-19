<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de Carros</title>

    <style type="text/css">
        body {
            background-color: black;
        }

        .input__container--variant {
  background: linear-gradient(to bottom, #F3FFF9, #F3FFF9);
  border-radius: 30px;
  max-width: 13em;
  padding: 1em 1em;
}

.shadow__input--variant {
  filter: blur(25px);
  border-radius: 30px;
  background-color: #F3FFF9;
  opacity: 0.5;
}

.input__button__shadow--variant {
  border-radius: 15px;
  background-color: #07372C;
  padding: 10px;
  border: none;
}

.input__button__shadow--variant:hover {
  background-color: #3C6659;
}

.input__search--variant {
  width: 13em;
  align-items: center;
  border-radius: 13em;
  outline: none;
  border: none;
  padding: 0.8em;
  font-size: 1.2em;
  color: #002019;
  background-color: transparent;
}

.input__search--variant::placeholder {
  color: #002019;
  opacity: 0.7;
}

.input__container--variant {
  background: linear-gradient(to bottom, #F3FFF9, #F3FFF9);
  border-radius: 1.5em;
  max-width: 14em;
  padding: 1em;
  box-shadow: 0em 1em 3em #beecdc64;
}

.nav-link{
      color: white;
  }

  .nav-link:hover{
      color: #BE2121;
  }
  .php-content {
        color: white;
    }
    .table-container {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

    .btn {
        background-color: hotpink;
        border-radius: 8px;
        font-size: 15px;
        justify-content: center;
        margin-left: 47em;
        padding: 9px;

    }
     table {
        width: 100%;
    }

    th {
        text-align: left;
    }

    th:nth-child(2) {
        width: 10%; /* Define a largura da segunda coluna (Código) */
    }

    th:nth-child(3) {
        width: 30%; /* Define a largura da terceira coluna (Nome) */
    }

    th:nth-child(4) {
        width: 30%; /* Define a largura da quarta coluna (Montadora) */
    }

    th:nth-child(5) {
        width: 20%; /* Define a largura da quinta coluna (Foto) */
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
                <a class="nav-link active speech" style="color:hotpink; font-weight: bold; font-family: sans-serif" href="cadastra.php"> CADASTRO </a> 
            </li>

        </ul>

    </div>
</nav>

<div align="center">
    <form method="post">
        <div class="input__container input__container--variant">
        <div class="shadow__input shadow__input--variant"></div>
        <input type="text" name="codCarro" size="10" class="input__search input__search--variant" placeholder="Consulta">
        <button class="input__button__shadow input__button__shadow--variant">
          <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="1.5em" width="13em">
            <path d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z" fill-rule="evenodd" fill="#FFF"></path>
          </svg>
        </button>
      </div>
    </form>
</div>
<div class="php-content">
        <?php
            include("bd.php");

            if ($_SERVER["REQUEST_METHOD"] === 'POST') {

                try {
                    $stmt = consultar();
                    echo "<form method='post'>";
                    // Div para centralizar a tabela
                    echo "<div class='table-container'>";
                    echo "<table border='1px'>";    
                    echo "<tr><th></th><th>Código</th><th>Nome</th><th>Montadora</th><th>Foto</th></tr>";

                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td><input type='radio' name='codCarro' 
                            value='" . $row['Cod'] . "'>";
                        echo "<td>" . $row['Cod'] . "</td>";
                        echo "<td>" . $row['Nome'] . "</td>";
                        echo "<td>" . $row['Montadora'] . "</td>";
                        if ($row["foto"] == null) {
                            echo "<td align='center'> - </td>";
                        } else {
                            echo "<td align='center'><img src='data:image;base64,".base64_encode($row["foto"])."' width='80px' height='50px'></td>";
                        }
                        echo "</tr>";
                        echo "<br><br>";
                    }


                    echo "</table></div><br>
                    <button class='btn' type='submit' formaction='remove.php'>Excluir Carro</button>
                    <br><br>
                    <button class='btn' type='submit' formaction='edicao.php'>Editar Carro</button>
                    </form>";

                } catch (PDOException $e) {
                    echo 'Error: ' . $e->getMessage();
                }
            }
        ?>
    </div>

</body>
</html>

