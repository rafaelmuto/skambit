console.log('verCEP.js');
function pesquisacep(valor) {
  //Nova variável "cep" somente com dígitos.
  var cep = valor.replace(/\D/g, '');
  //Verifica se campo cep possui valor informado.
  if (cep != "") {
    //Expressão regular para validar o CEP.
    var validacep = /^[0-9]{8}$/;
    //Valida o formato do CEP.
    if(validacep.test(cep)) {
      console.log('cep validado: ', cep);
    } //end if.
    else {
      alert("Formato de CEP inválido.");
      }
    } //end if.

  };
