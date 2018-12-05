console.log('modal.js');

window.onload = function(){

  var ajax = new XMLHttpRequest();
  var viaCEP = new XMLHttpRequest();

  var modalProduto = document.getElementById('modalProduto');
  var links = document.getElementsByClassName('main_card_link_AJAX');
  var modalCloseBtn = document.getElementById('modalClose');

  // console.log(links);

  for(var i = 0; i < links.length; i++){
    links[i].addEventListener('click', function(event){
      event.preventDefault();

      let produto_id = this.id;

      modalProduto.classList.remove('modalOff');
      modalProduto.classList.add('modalOn');

      ajax.open('get', 'getProduto/'+produto_id , true);
      ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      ajax.send();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
          // console.log('readyState ', ajax.readyState);
          // console.log('status ', ajax.status);
          console.log(JSON.parse(ajax.responseText));
          let produto = JSON.parse(ajax.responseText)[0];

          let cep = produto.cep;
          console.log(cep);
          viaCEP.open('get', 'http://viacep.com.br/ws/'+ cep +'/json/', true);
          viaCEP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          viaCEP.send();

          viaCEP.onreadystatechange = function(){
            if(viaCEP.readyState == 4 && viaCEP.status == 200){
              console.log(JSON.parse(viaCEP.responseText));
              let end = JSON.parse(viaCEP.responseText);
              document.getElementById('modalImg').style.backgroundImage = 'url(' + produto.imagem + ')';
              document.getElementById('modalTitle').innerHTML = produto.nome;
              document.getElementById('modalPreco').innerHTML = produto.valor;
              document.getElementById('modalDescricao').innerHTML = produto.descricao;
              document.getElementById('modalAvatar').src = produto.avatar;
              document.getElementById('modalNome').innerHTML = produto.primeiro_nome + ' ' + produto.ultimo_nome;
              document.getElementById('modalEnd').innerHTML = end.logradouro;
              document.getElementById('modalEnd2').innerHTML = 'CEP: '+end.cep+'  '+end.localidade+' - '+end.uf;
              document.getElementById('modalEmail').innerHTML = produto.email;
            }
          }
        }
      }
    });
  }

  modalCloseBtn.addEventListener('click', function(){
    modalProduto.classList.remove('modalOn');
    modalProduto.classList.add('modalOff');
  });

}
