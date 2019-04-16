$(document).ready(function(){
        $('#frmlogin').submit(function(){
          $.post('validalogin.php', $(this).serialize(), function(resposta){
            if (resposta.resposta==true) {
              window.location.href='homepage.php';
              alert("LOGADO !!!!");
            }
            else {
              alert('Login e/ou Senha Incorretos!');
            }
          }, "JSON");
        });

         $('#frmloginmedico').submit(function(){
          $.post('validamedico.php', $(this).serialize(), function(resposta){
            if (resposta.resposta==true) {
              window.location.href='homepagemedico.php';
              alert("LOGADO !!!!");
            }
            else {
              alert('Login e/ou Senha Incorretos!');
            }
          }, "JSON");
        });

        $('#content').sliphover({
            textAlign:'left',
            verticalMiddle:false
       });

});
      