// Script para mostrar ou ocultar senha
function mostrarOcultarSenhaCadastro() {
    var senha1 = document.getElementById("senha1");
    var senha2 = document.getElementById("senha2");
  
    if (senha1.type == "password"){
      senha1.type = "text";
      senha2.type = "text";
    } else {
      senha1.type = "password";
      senha2.type = "password";
    }
  }
  
  // Script para validar confirmação de senha Ok
  function validarSenha() {
    var senha  = document.getElementById("senha1");
    var senha2 = document.getElementById("senha2");
  
    if (senha.value != senha2.value) {
      senha2.setCustomValidity("Senhas diferentes!");
      senha2.reportValidity();
      return false;
    } else {
      senha2.setCustomValidity("");
      return true;
    }
  }