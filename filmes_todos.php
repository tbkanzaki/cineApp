<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CineApp - Filmes</title>
    <link rel="shortcut icon" href="movies.ico" type="image/x-icon">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles/myStyle.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script>
      function mostra_alerta()
     {
        alert("Seu cadastro foi efetuado com sucesso!");
      }
    // rest of your code
    </script>

</head>
<body>
  <?php if ( isset($_GET['sucesso']) && $_GET['sucesso'] == 1 ){  ?>
    <script>
      alert("Seu cadastro foi efetuado com sucesso!");
    </script>
<?php } ?>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.html' ?>
    <div id="content">
      <?php 
      include 'navbar.html';
      include 'filmes_bar.php';
      include 'open_dbconn.php';

      $sql = 'SELECT 
                movies.id as id,
                movies.title as titulo, 
                movies.synopsis as sinopse, 
                genre.title as genero, 
                movies.release_year as ano,  
                professionals.name as diretor
          FROM ((movies
          INNER JOIN genre ON movies.genre_id = genre.id)
          INNER JOIN professionals ON movies.direction_id = professionals.id)
          ORDER BY movies.title;';
      
      $result = mysqli_query($dbconn,$sql); 
      ?>
      <div class="line"></div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">Título</th>
              <th scope="col">Sinopse</th>
              <th scope="col">Gênero</th>
              <th scope="col">Diretor</th>
              <th scope="col">Ano</th>
              <th scope="col"> </th>
              <th scope="col"> </th>
            </tr>
          </thead>
          <tbody>
            <?php //while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
              <?php foreach($result as $line){ ?>
                <tr class="table-dark">
                  <td scope="row"><?= $line['titulo'] ?></td>
                  <td scope="row">
                    <a href="#" role="button" class="btn popovers limittext" data-toggle="popover" title="" 
                    data-content="<?= $line['sinopse'] ?>" data-original-title="<?= $line['titulo'] ?>"><?= $line['sinopse'] ?>
                    </a>
                  </td>
                  <td scope="row"><?= $line['genero'] ?></td>
                  <td scope="row"><?= $line['diretor'] ?></td>
                  <td scope="row"><?= $line['ano'] ?></td>
                  <td scope="row">
                    <a href="filmes_edit_form.php?movie_id=<?= $line['id']; ?>" class="btn btn-outline-secondary">Editar</a> 
                  </td>
                  <td scope="row">
                    <a href="filmes_delete.php?movie_id=<?= $line['id']; ?>" class="btn btn-outline-secondary" 
                      onclick="return confirm('Tem certeza que quer excluir?')">Deletar</a>
                  </td>
                  </td>
                </tr>
            <?php } ?>
          </tbody>
        </table>
      <?php 
      mysqli_free_result($result);
      include 'close_dbconn.php';
      ?>
    </div>
  </div>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  <script type="text/javascript">
    // popover
    $("[data-toggle=popover]")
    .popover({html:true})

    //sidebar
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });
    });

  </script>
</body>

</html>
