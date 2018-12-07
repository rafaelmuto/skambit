console.log('theme.js');
var woot = document.getElementsByTagName('html')[0];
var logo_btn = document.getElementById('logo_btn');

var themeList = ['--cor_principal: #000000 ; --cor_sub: #95a5a6; --cor_fundo: #ecf0f1; --cor_base: #ffffff;',
                 '--cor_principal: #ff5d6e ; --cor_sub: #a3de83; --cor_fundo: #feffea; --cor_base: #ffffff;',
                 '--cor_principal: #062743 ; --cor_sub: #113a5d; --cor_fundo: #ff7a8a; --cor_base: #f9f9f9;',
                 '--cor_principal: #583131 ; --cor_sub: #fc6e5e; --cor_fundo: #e3f3f7; --cor_base: #b0dedb;'
                ];


if(sessionStorage.getItem('theme')===null){
  sessionStorage.setItem('theme', 0);
  var themeID = 0;
  // console.log('theme is null');
}
else {
  var themeID = sessionStorage.getItem('theme');
  woot.style.cssText = themeList[themeID];
  // console.log('theme is not null',sessionStorage.getItem('theme') );
}


logo_btn.addEventListener('click', function(event){
  themeID++;
  if(themeID>=themeList.length){
    themeID=0;
  }
  console.log(themeID);
  woot.style.cssText = themeList[themeID];
  sessionStorage.setItem('theme', themeID);
});
