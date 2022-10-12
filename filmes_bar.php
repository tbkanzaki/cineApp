
  <?php 
    include 'open_dbconn.php';
  
    $sql_genero = 'SELECT id, title FROM genre ORDER BY title;';
    $result_genero = mysqli_query($dbconn,$sql_genero);

    $sql_diretor = 'SELECT id, name FROM professionals WHERE type in (2,3) ORDER BY name;';
    $result_diretor = mysqli_query($dbconn,$sql_diretor);   
  ?>
  <div >
    <div class="row p-2">
      <div class="col-3 m-2">
        <h3><i class="fa fa-film"></i> Filmes</h3>
      </div>
      <div class="col-1 justify-content-end ">
        <form class="d-flex m-2"  action="filmes_cad_form.php">
          <button class="btn btn-outline-secondary" type="submit">Novo</button>
        </form>
      </div>
      <div class="col-1 justify-content-center ">
        <form class="d-flex m-2"  action="filmes_todos.php">
          <button class="btn btn-outline-secondary" type="submit">Todos</button>
        </form>
      </div>
      <div class="col d-flex justify-content-end">
        <form class="d-flex" role="search" action="filmes_busca.php">
          <div class="form-floating m-2">
            <select class="form-control" name="opcao" onchange="showDiv(this)">
              <option value="0" selected>Opção de busca...</option>
              <option value="1">Título</option>
              <option value="2">Sinopse</option>
              <option value="3">Título e Sinopse</option>
              <option value="4">Gênero</option>
              <option value="5">Diretor</option>
            </select>
          </div>        
          <div class="form-floating m-2" id="diretor_div" style="display:none;">
            <select class="form-control" name="diretor_busca">
              <option value="" selected>Diretor</option>
                <?php foreach($result_diretor as $diretor){ ?>
                  <option value="<?= $diretor['id']; ?>"><?= $diretor['name']; ?></option> 
                <?php } ?>            
            </select>
          </div>  
          <div class="form-floating m-2" id="genero_div" style="display:none;">
            <select class="form-control" name="genero_busca">
              <option value="" selected>Gênero</option>
              <?php foreach($result_genero as $genero){ ?>
                <option value="<?= $genero['id']; ?>"><?= $genero['title']; ?></option> 
              <?php } ?>
            </select>
          </div>
          <div class="form-floating m-2" id="titulo_div" style="display:none;">
            <input class="form-control " type="search" placeholder="Parte do título/sinopse..." name="q" aria-label="Search" />
          </div>
          <div class="form-floating m-2" >
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
          </div>
        </form>
      </div>  
    </div>
  </div>

<script type="text/javascript">
function showDiv(select){

  var opc = select.value;
  
  switch (opc) {
    case "1":
    case "2":
    case "3":
        document.getElementById('diretor_div').style.display = "none";
        document.getElementById('genero_div').style.display = "none";
        document.getElementById('titulo_div').style.display = "block";
      break
    case "4":
        document.getElementById('diretor_div').style.display = "none";
        document.getElementById('genero_div').style.display = "block";
        document.getElementById('titulo_div').style.display = "none";            
      break
    case "5":
        document.getElementById('diretor_div').style.display = "block";
        document.getElementById('genero_div').style.display = "none";
        document.getElementById('titulo_div').style.display = "none";   
        break  
    default:
        document.getElementById('diretor_div').style.display = "none";
        document.getElementById('genero_div').style.display = "none";
        document.getElementById('titulo_div').style.display = "none";      
        alert("Escolha uma opção!");       
        break
  }             
} 
</script>
