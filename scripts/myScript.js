function validar(){
  alert("entrou ");

  var titulo = fomulario.titulo.value;
  var sinopse = fomulario.sinopse.value;

  var select_diretor = fomulario.diretor;
  var index_diretor = select_diretor.selectedIndex;
  var value_diretor = select_diretor.options[select_diretor.selectedIndex].value;

  var select_genero = fomulario.genero;
  var index_genero = select_genero.selectedIndex;
  var value_genero = select_genero.options[select_genero.selectedIndex].value;

  var duracao = fomulario.duracao;
  var ano = fomulario.ano.value;
  var radios = fomulario.classifica;
  var radiobutton = "";

  

  // alert("titulo: " + titulo);
  // alert("sinopse: " + sinopse);
  // alert("duracao: " + duracao);
  // alert("ano: " + ano);

  //alert("diretor: " + value_diretor);
  //alert("genero: " + value_genero);

  //document.querySelector('#meters')
  
  for (var i = 0; i < radios.length; i++) {
    if (radios[i].checked) {
      //console.log("Escolheu: " + radios[i].value)
      radiobutton = "OK"     
      alert("radiobutton: " + radiobutton)
    }     
  }

  // verificar se os campos foram preenchidos
          if (titulo == "") {
            alert("Título não informado");

            // Deixa o input com o focus
            titulo.focus();
            // retorna a função e não olha as outras linhas
            return;
          }
          if (sinopse.value == "") {
            alert("Sinopse não informado");
            sinopse.focus();
            return;
          }
          if (value_diretor.value == "") {
            alert("Escolha um diretor");
            document.getElementsByName("diretor").focus()
            //fomulario.select_diretor.focus();
            return;
          }
          if (value_genero.value == "") {
            alert("Escolha um gênero");
            document.getElementsByName("genero").focus()
            //fomulario.select_genero.focus();
            return;
          }
          if (ano.value == "") {
            alert("Ano de lançamento não informado");
            ano.focus();
            return;
          }
          if (duracao.value == "") {
            alert("Duração do filme não informado");
            duracao.focus();
            return;
          }
          if (classifica == "") {
            alert("Escolha a classificação do filme");
            //classifica.focus();
            return;
          }
          
          alert("Formulário enviado!");
               
}
  
// para acessar checklist

function mostrar_check() {

  var chkBike = document.getElementById("chkBike");
  var chkCar = document.getElementById("chkCar");

    if (chkBike.checked) {
        console.log("escolheu 'bike'");
    } else {
        console.log("não escolheu 'bike'");
    }

    if (chkCar.checked) {
        console.log("escolheu 'car'");
    } else {
        console.log("não escolheu 'car'");
    }
};



function mostrar_select(){
  var cartoes = document.getElementById("card");
  //comboCidades.options[comboCidades.selectedIndex].value);
  
   document.getElementById('ct').innerHTML = cartoes
  
  document.getElementById('cn').innerHTML = cartoes.selectedIndex
  
  document.getElementById('de').innerHTML = cartoes.options[cartoes.selectedIndex].value
  
  //document.getElementById('de').innerHTML = cartoes.options[cartoes.selectedIndex].value
  
  //document.getElementById('cn').innerHTML = document.getElementById('number').value
  
  //document.getElementById('de').innerHTML = document.getElementById('expiration').value
  
}

const otherText = document.querySelector("#otherValue");
otherText.style.visibility = "hidden";

function mostraCxText(){
  const otherCheckbox = document.querySelector("#other");
    if (otherCheckbox.checked) {
      otherText.style.visibility = "visible";
      otherText.value = "";
    } else {
      otherText.style.visibility = "hidden";
    }
  }

function mostra_multicheck() {
  var myChecks = document.getElementsByName("interest");

  for (var i = 0; i < myChecks.length; i++) {
    if (myChecks[i].checked) {
      // Create element:
      const para+i = document.createElement("p");
      para+i.innerText = myChecks[i].value;

      // Append to body:
      document.body.appendChild(para+i);
    }
  }
}

