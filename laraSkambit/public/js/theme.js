console.log('theme.js');
var woot = document.getElementsByTagName('html')[0];
woot.style.cssText = '--cor_principal: black ; --cor_sub: #95a5a6; --cor_fundo: #ecf0f1; --cor_base: white;';

var logo_btn = document.getElementById('logo_btn');

  logo_btn.addEventListener('click', function(event){
    woot.style.cssText = '--cor_principal: #ff5d6e ; --cor_sub: #a3de83; --cor_fundo: #feffea; --cor_base: white;';
    return true;
  });
