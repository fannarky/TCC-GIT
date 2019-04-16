
function mostraCadastroMedico()
{
	var medico = document.getElementById("medico");
	var divCadastro = document.getElementById("cadastro");
	medico.style.display = "block";
	divCadastro.style.display = "none";
}

function mostraCadastroPaciente()
{
	var paciente = document.getElementById("paciente");
	var divCadastro = document.getElementById("cadastro");
	paciente.style.display = "block";
	divCadastro.style.display = "none";
}

function VoltaCadastro()
{
	var medico = document.getElementById("medico");
	var paciente = document.getElementById("paciente");
	var divCadastro = document.getElementById("cadastro");
	medico.style.display = "none";
	paciente.style.display = "none";
	divCadastro.style.display = "block";
}


