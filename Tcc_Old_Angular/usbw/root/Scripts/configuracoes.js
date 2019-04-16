$(document).ready(function(){
	console.log("allooaoaloalao");
	$('#novocelular').mask("(99)99999-9999");
	//função de edição de nome
	$('#frmeditname').submit(function(){
		var nomenovo = $('#newname').val();
		var buttonnome = $('#buttonnome').val();
		$.post('configuracoesinfo.php', {nomenovo:nomenovo, botao:buttonnome}, function(resposta){
			alert('Dado Alterado com Sucesso');
		});
	});

	//função de edição de login	
	$('#frmeditlogin').submit(function(){
		var loginnovo = $('#loginnovo').val();
		var botaologin = $('#envialogin').val();
		$.post('configuracoesinfo.php', {loginnovo:loginnovo, botaologin:botaologin}, function(resposta){
			alert('Dado Alterado com Sucesso');
		});
	});

	//função de edição de senha
	$('#frmeditsenha').submit(function(){
		var senhanova = $('#senhanova').val();
		var confirmasenha = $('#confirmasenha').val();
		var botaosenha = $('#enviasenha').val();
		if (senhanova = confirmasenha) {
		$.post('configuracoesinfo.php', {senhanova:senhanova, botaosenha:botaosenha}, function(resposta){
			alert('Dado Alterado com Sucesso');
		});
		}
		else{
			alert('Senhas nao são iguais!!');
		}
	});

	//função de edição celular
	$('#frmeditcel').submit(function(){
		var celnovo = $('#novocelular').val();
		var botaocel = $('#enviacel').val();
		$.post('configuracoesinfo.php', {celnovo:celnovo, botaocel:botaocel}, function(resposta){
			alert('Dado Alterado com Sucesso');
		});
		
	});

	//função para deletar usuários
	$('#frmdel').submit(function(){
		var senhadel = $('#senhadel').val();
		var botaodel = $('#deleta').val();
		$.post('configuracoesinfo.php', {senhadel:senhadel, botaodel:botaodel}, function(){
			window.location.href='index.php';
			alert('CONTA DELETADA COM SUCESSO!'); 
		});
	});

	$('#frmeditprofissao').submit(function(){
		$.post('configuracoesinfo.php',$('#frmeditprofissao').serialize(), function(resposta){
			alert("Dado alterado com sucesso");
		});
	});

	$('#frmeditsalario').submit(function(){
		$.post('configuracoesinfo.php',$('#frmeditsalario').serialize(), function(resposta){
			alert('Dado alterado com sucesso!');
		});
	});

});