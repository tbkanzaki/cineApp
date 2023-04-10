<?php 
  //header('location:filmes_todos.php?sucesso=1');

  include 'open_dbconn.php'; 
      
  // prepare and bind
  $sql = "INSERT INTO movies (title, synopsis, classification, release_year, duration, genre_id, direction_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $dbconn->prepare($sql);
  $stmt->bind_param("sssssss", $titulo, $sinopse, $classifica, $ano, $duracao, $genero, $diretor);

  // set parameters and execute
  $titulo = $_POST["titulo"];
  $sinopse = trim($_POST["sinopse"]);
  $classifica = $_POST["classifica"];
  $ano = $_POST["ano"];
  $duracao = $_POST["duracao"];
  $genero = $_POST["genero"];
  $diretor = $_POST["diretor"];

  $stmt->execute();
  $stmt->close();
  include 'close_dbconn.php';

  echo "<SCRIPT>
        alert('Sucesso!')
        window.location.replace('filmes_todos.php');
        </SCRIPT>";
?>

