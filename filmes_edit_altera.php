<?php 
  header("location:filmes_todos.php");

  include 'open_dbconn.php'; 
      
  // prepare and bind
  $sql = "UPDATE movies SET title=?, synopsis=?, classification=?, release_year=?, duration=?, genre_id=?, direction_id=? WHERE id=?";
  $stmt = $dbconn->prepare($sql);
  $stmt->bind_param("ssiiiiii", $titulo, $sinopse, $classifica, $ano, $duracao, $genero, $diretor, $id);

// set parameters and execute
  $id = $_POST["id"];
  $titulo = $_POST["titulo"];
  $sinopse = $_POST["sinopse"];
  $classifica = $_POST["classifica"];
  $ano = $_POST["ano"];
  $duracao = $_POST["duracao"];
  $genero = $_POST["genero"];
  $diretor = $_POST["diretor"];



  $stmt->execute();
  $stmt->close();
  include 'close_dbconn.php';

?>