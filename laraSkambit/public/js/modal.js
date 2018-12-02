console.log('modal.js rodadndo');

var ajax = new XMLHttpRequest();
ajax.onadystatehange = function(){
  if(ajax.readyState == 4 && ajax.status == 200){
    console.log('coneccao ajax efetuada!');
    console.log(ajax.responseText);
  }
}

window.onload = function(){

  var modalProduto = document.getElementById('modalProduto');
  var links = document.getElementsByClassName('main_card_link');
  var modalCloseBtn = document.getElementById('modalClose');

  console.log(modalProduto);

  for(var i = 0; i < links.length; i++){
    links[i].addEventListener('click', function(event){
      console.log('elemento clicado');
      event.preventDefault();
      modalProduto.classList.remove('modalOff');
      modalProduto.classList.add('modalOn');
    });
  }

  modalCloseBtn.addEventListener('click', function(){
    modalProduto.classList.remove('modalOn');
    modalProduto.classList.add('modalOff');
  });


}
