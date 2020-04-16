function validacao(){
	user = document.formlogin.user.value; //Puxa o usuário do form
	senha = document.formlogin.senha.value; //Puxa a Senha do Form
	if(senha != 12345678){ //valida a senha enquanto não faço a conexão com o Banco	
		alert("SENHA ERRADA CARALHO");
	}
		document.formlogin.submit();
}
