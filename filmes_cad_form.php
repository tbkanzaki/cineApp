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
    
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar Holder -->
    <?php include 'sidebar.html'; ?>
    
    <div id="content">
      <?php 
      include 'navbar.html';
      include 'filmes_bar.php';
      include 'open_dbconn.php';

      $sql_genero = 'SELECT id, title FROM genre ORDER BY title;';
      $result_genero = mysqli_query($dbconn,$sql_genero);

      $sql_diretor = 'SELECT id, name FROM professionals WHERE type in (2,3) ORDER BY name;';
      $result_diretor = mysqli_query($dbconn,$sql_diretor);
      ?>
      <div class="line"></div>

      <div class="container p-2">
        <form method="POST" action="filmes_cad_insere.php">
          <div class="form-floating p-2">
            <input  class="form-control" type="text" placeholder="Título do filme" id="titulo" name="titulo" required/>
          </div>
          <div class="form-floating p-2">
            <textarea class="form-control" placeholder="Sinopse do filme" id="sinopse" name="sinopse" style="height: 100px" required ></textarea>
          </div>

          <div class="row p-2">
            <div class="col-md">
              <div class="form-floating">
                <select name="diretor" id="diretor" class="form-control" required>
                  <option selected disabled value="">Diretor</option>
                  <?php foreach($result_diretor as $diretor){ ?>
                    <option value="<?= $diretor['id']; ?>"><?= $diretor['name']; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <select name="genero" id="genero" class="form-control" required>
                  <option value="">Gênero</option>
                  <?php foreach($result_genero as $genero){ ?>
                    <option value="<?= $genero['id']; ?>"><?= $genero['title']; ?></option> 
                  <?php } ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-md">
              <div class="form-floating">
                <input  class="form-control" type="number" placeholder="Ano de lançamento" name="ano" min="1960" max="<?=date('Y')?>" required/>
              </div>
            </div>
            <div class="col-md">
              <div class="form-floating">
                <input  class="form-control" type="number" placeholder="Duração em min." name="duracao" min="60" required/>
              </div>
            </div>
          </div>

          <div class="p-2">
            <div> Classificação</div>
            <div class="col-md form-check">
              <input class="form-check-input" type="radio" name="classifica" value="16" required />
              <label class="form-check-label" for="classifica">Até 16 anos: autorização permitida crianças e adolescentes de qualquer idade.</label>
            </div>
            <div class="col-md form-check">
              <input class="form-check-input" type="radio" name="classifica" value="18" required />
              <label class="form-check-label" for="classifica">18 anos: autorização permitida apenas a adolescentes a partir de 16 anos.</label>
            </div>
          </div>

          <div class="p-2">
            <button class="btn btn-secondary" type="submit" >Enviar</button>
          </div>
        </form>
      </div>

      <?php 
        mysqli_free_result($result_genero);
        mysqli_free_result($result_diretor);
        include 'close_dbconn.php';
      ?>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
      });
    });
  </script>

  <!-- jQuery CDN - Slim version (=without AJAX) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>