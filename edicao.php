<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Controle de Carros</title>
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

<h1>Edição de Carros</h1>

</body>
</html>

<?php

include("bd.php");

if (!isset($_POST["codCarro"])) {
    echo "Selecione o carro a ser editado";
} else {
    $cod = $_POST["codCarro"];

    try {

        $stmt = buscarEdicao($cod);

        $audi = "";
        $mercedes = "";
        $ferrari = "";
        $porsche = "";
        $volkswagen = "";
        $BMW = "";
        $honda = "";

        while ($row = $stmt->fetch()) {

            //para setar o curso correto no combo
            if ($row['Montadora'] == "Audi") {
                $audi = "selected";
            } else if ($row['Montadora'] == "BMW") {
                $BMW = "selected";
            } else if ($row['Montadora'] == "Ferrari") {
                $ferrari = "selected";
            } else if ($row['Montadora'] == "Honda") {
                $honda = "selected";
            } else if ($row['Montadora'] == "Mercedes") {
                $mercedes = "selected";
            }  else if ($row['Montadora'] == "Porsche") {
                $porsche = "selected";
            } else if ($row['Montadora'] == "Volkswagen") {
                $volkswagen = "selected";
            } 

            $foto = $row['foto'];

            echo "<form method='post' enctype='multipart/form-data' action='altera.php'>\n
            Codigo:<br>\n
            <input type='text' size='10' name='codCarro' value='$row[Cod]' readonly><br><br>\n
            Nome:<br>\n
            <input type='text' size='30' name='nome' value='$row[Nome]'><br><br>\n
            Montadora:<br>\n
            <select name='montadora'>\n
                <option></option>\n
                 <option value='Audi' $audi>Audi</option>\n
                 <option value='BMW' $BMW>BMW</option>\n
                 <option value='Ferrari' $ferrari>Ferrari</option>\n
                 <option value='Honda' $honda>Honda</option>\n
                 <option value='Mercedes' $mercedes>Mercedes</option>\n
                 <option value='Porsche' $porsche>Porsche</option>\n
                 <option value='Volkswagen' $volkswagen>Volkswagen</option>\n
                 
             </select><br><br>\n    
             Foto:<br>";
            if ($foto=="") {
              echo "-<br><br>";
            } else {
              echo  "<img src='data:image;base64,". base64_encode($foto)."' width='80px' height='50px'><br><br>";
            }
            echo "
             <input type='file' name='foto'><br><br>


             <input type='submit' value='Salvar Alterações'>\n        
             <hr>\n
            </form>";
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }

}

?>
