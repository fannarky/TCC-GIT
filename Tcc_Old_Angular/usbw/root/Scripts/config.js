function editaNome()
{
	var nome = document.getElementById("nome");
	var editanome = document.getElementById("editaNome");
	nome.style.display = "none";
	editanome.style.display = "block";
}

function VoltaNome()
{
	var editanome = document.getElementById("editaNome");
	editanome.style.display = "none";
	var nome = document.getElementById("nome");
	nome.style.display = "block";
}

function editaLogin()
{
	var login = document.getElementById("login");
	var editalogin = document.getElementById("editaLogin");
	login.style.display = "none";
	editalogin.style.display = "block";
}

function VoltaLogin()
{
	var login = document.getElementById("login");
	login.style.display = "block";
	var editalogin = document.getElementById("editaLogin");
	editalogin.style.display = "none";
}

function editaSenha()
{
	var senha = document.getElementById("senha");
	var editaSenha = document.getElementById("editaSenha");
	senha.style.display = "none";
	editaSenha.style.display = "block";
}

function VoltaSenha()
{
	var senha = document.getElementById("senha");
	senha.style.display = "block";
	var editaSenha = document.getElementById("editaSenha");
	editaSenha.style.display = "none";
}

function editaTel()
{
	var tel = document.getElementById("tel");
	var editaTel = document.getElementById("editaTel");
	tel.style.display = "none";
	editaTel.style.display = "block";
}

function VoltaTel()
{
	var tel = document.getElementById("tel");
	tel.style.display = "block";
	var editaTel = document.getElementById("editaTel");
	editaTel.style.display = "none";
}

function editaCel()
{
	var cel = document.getElementById("cel");
	cel.style.display = "none";
	var editaCel = document.getElementById("editaCel");
	editaCel.style.display = "block";
}

function VoltaCel()
{
	var cel = document.getElementById("cel");
	cel.style.display = "block";
	var editaCel = document.getElementById("editaCel");
	editaCel.style.display = "none";
}


function exibeInfoAdicionais()
{
	var confgerais = document.getElementById("confgerais");
	confgerais.style.display = "none";
	var infoadicionais = document.getElementById("infoadicionais");
	infoadicionais.style.display = "block";
}

function exibeConfGerais()
{
	var confgerais = document.getElementById("confgerais");
	confgerais.style.display = "block";
	var infoadicionais = document.getElementById("infoadicionais");
	infoadicionais.style.display = "none";
}

function editaProfissao()
{
	var  profissao = document.getElementById("profissao");
	profissao.style.display="none";
	var editaProfissao = document.getElementById("editaProfissao");
	editaProfissao.style.display="block";
}

function voltaProfissao()
{
	var  editaProfissao = document.getElementById("editaProfissao");
	editaProfissao.style.display="none";
	var  profissao = document.getElementById("profissao");
	profissao.style.display = "block";
}

function editaSalario()
{
	var salario = document.getElementById("salario");
	salario.style.display= "none";
	var editaSalario = document.getElementById("editaSalario");
	editaSalario.style.display = "block";
}
function voltaSalario()
{
	var salario = document.getElementById("salario");
	salario.style.display="block";
	var editaSalario = document.getElementById("editaSalario");
	editaSalario.style.display = "none";
}