function confirmservico(){
	var confirma = confirm("Clicando em ok você confirma um novo serviço :)");
	var endereco = document.formcriaservico.npendereco.value;
	var plano = document.formcriaservico.npendereco.value;
	var data = document.formcriaservico.npendereco.value;
	if (confirma != true){
		return false;
	}
	if (endereco == ''){
		alert('Por favor preencha o endereço!');
		document.formcriaservico.npendereco.focus();
		return false;
	}
	if (data == ''){
		alert('Por favor preencha o endereço!');
		document.formcriaservico.npendereco.focus();
		return false;
	}
	document.getElementById("formcriaservico").submit();
}
function fechar(){
	document.getElementById('popup').style.display = 'none';
}
function fechar2(){
	document.getElementById('popup2').style.display = 'none';	
}
function abrirpopup(){
	document.getElementById('popup').style.display = 'block';
}
function abrirpop2(){
	document.getElementById('popup2').style.display = 'block';
}	
function enviaraltera(){
    var resposta2 = confirm("Deseja ralmente alterar esse registro?");
     if (resposta2 == true) {
        document.getElementById("formalteraservico").submit();
    }
}
function enviaralteracadastro(){
    var resposta2 = confirm("Deseja ralmente alterar esse registro?");
     if (resposta2 == true) {
        document.getElementById("formalteracadastro").submit();
    }
}
function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
     if (resposta == true) {
          window.location.href = "excluir.php?id="+id;
     }
}
function validacadastro(){
	var confirmacadastro = confirm("Clicando em ok você confirma um novo serviço :)");
	var nome = document.formcadastro.nome.value;
	var cpf = document.formcadastro.endereco.value;
	var nasc = document.formcadastro.nasc.value;
	var endereco = document.formcadastro.endereco.value;
	var plano = document.formcadastro.plano.value;
	var data = document.formcadastro.datains.value;
	if (confirmacadastro != true){
		return false;
	}
	if (nome == '') {
		alert('Por favor preencha o seu nome!');
		return false;
	}
	if (cpf =='') {
		alert('Por favor preencha o seu CPF!');
		return false;
	}
	if (endereco == ''){
		alert('Por favor preencha o endereço!');
		document.formcriaservico.npendereco.focus();
		return false;
	}
	if (data == ''){
		alert('Por favor escolha uma data!');
		document.formcriaservico.npendereco.focus();
		return false;
	}
	document.getElementById("formcadastro").submit();
}
function href(){
	window.location.href = "chat.php";
}
function href2(){
	window.location.href = "chat2.php";
}