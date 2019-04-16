function chamaLogin()
{
	if (document.escolheLogin.usuario[0].checked == true)
	{
		var escolheLogin = document.getElementById("escolheLogin");
		escolheLogin.style.display = "none";
		var paciente = document.getElementById("paciente");
		paciente.style.display = "block";
		return false;
	}
	else if (document.escolheLogin.usuario[1].checked == true) 
	{
		var escolheLogin = document.getElementById("escolheLogin");
		escolheLogin.style.display = "none";
		var medico = document.getElementById("medico");
		medico.style.display="block";
		return false;
	}
}

function voltaEscolha()
{
	var paciente = document.getElementById("paciente");
		paciente.style.display = "none";
	var medico = document.getElementById("medico");
		medico.style.display="none";
	var escolheLogin = document.getElementById("escolheLogin");
		escolheLogin.style.display = "block";	
		return false;
}
