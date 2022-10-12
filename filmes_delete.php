<?php 
  header("location:filmes_todos.php");

  include 'open_dbconn.php'; 
      
  // prepare and bind
  $id = $_GET["movie_id"];

  $sql = "DELETE FROM movies WHERE id=?"; // SQL with parameters
  $stmt = $dbconn->prepare($sql); 
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->close();
  
  include 'close_dbconn.php';

?>