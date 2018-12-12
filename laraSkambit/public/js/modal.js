console.log('modal.js');

window.onload = function(){
  modal();
  like();
}

function likeIt(id){
  var likeAJAX = new XMLHttpRequest();
  likeAJAX.open('get', 'like/'+id, true);
  likeAJAX.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  likeAJAX.send();
  likeAJAX.onreadystatechange = function(){
    if(likeAJAX.readyState == 4 && likeAJAX.status == 200){
      return true;
    }
  }
}

function like(){
  var likeBtns = document.getElementsByClassName('like_btn');
  var login = document.getElementById('login');
  if(login == null){
    for(let i =0; i<=likeBtns.length; i++){
      likeBtns[i].style.display = 'none';
    }
  }
  for(var i=1; i< likeBtns.length; i++){
    likeBtns[i].addEventListener('click', function(event){
      event.preventDefault();
      let produto_id = this.id.split('_')[1];
      likeIt(produto_id);
      document.getElementById('produto_'+produto_id).style.display = 'none';
    });
  }

}


function modal(){
  var ajax = new XMLHttpRequest();
  var viaCEP = new XMLHttpRequest();

  var modalProduto = document.getElementById('modalProduto');
  var links = document.getElementsByClassName('main_card_link_AJAX');
  var modalCloseBtn = document.getElementById('modalClose');

  // console.log(links);

  for(var i = 0; i < links.length; i++){
    links[i].addEventListener('click', function(event){
      event.preventDefault();

      let produto_id = this.id.split('_')[1];

      modalProduto.classList.remove('modalOff');
      modalProduto.classList.add('modalOn');

      // TENTATIVA DE FAZER O MODAL FECHAR COM CLICK FORA DELE...
      // document.querySelector('body').addEventListener('click', function(){
      //   modalProduto.classList.remove('modalOn');
      //   modalProduto.classList.add('modalOff');
      //   this.removeEventListener('click');
      // });

      ajax.open('get', 'getProduto/'+produto_id , true);
      ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      ajax.send();

      ajax.onreadystatechange = function(){
        if(ajax.readyState == 4 && ajax.status == 200){
          // console.log('readyState ', ajax.readyState);
          // console.log('status ', ajax.status);
          // console.log(JSON.parse(ajax.responseText));
          let produto = JSON.parse(ajax.responseText)[0];

          let cep = produto.cep;
          // console.log(cep);
          viaCEP.open('get', 'http://viacep.com.br/ws/'+ cep +'/json/', true);
          viaCEP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          viaCEP.send();

          viaCEP.onreadystatechange = function(){
            if(viaCEP.readyState == 4 && viaCEP.status == 200){
              // console.log(JSON.parse(viaCEP.responseText));
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
              if(document.getElementById('modalLike')!= null){
                document.getElementById('modalLike').addEventListener('click', function(event){
                  event.preventDefault();
                  likeIt(produto_id);
                  modalProduto.classList.remove('modalOn');
                  modalProduto.classList.add('modalOff');
                  document.getElementById('produto_'+produto_id).style.display = 'none';
                });
              }
              if(document.getElementById('modaldisLike') != null){
                document.getElementById('modaldisLike').href = 'dislike/'+produto.produto_id;
                console.log(document.getElementById('modaldisLike').href);
              }
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
