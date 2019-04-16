/************************************* QUIZ *****************************************************************/
/*SETAS PARA AVANÇAR */
function comecaquiz()
{
	var inicio = document.getElementById("inicio");
	inicio.style.display = "none";
	var pergunta1 = document.getElementById("pergunta1");
	pergunta1.style.display = "block";
}

function Gotop2()
{
	var alerta = document.getElementById("alerta"); 
	if (document.quiz.q1[0].checked == false && document.quiz.q1[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta1 = document.getElementById("pergunta1");
		pergunta1.style.display = "none";
		var pergunta2 = document.getElementById("pergunta2");
		pergunta2.style.display = "block";
		alerta.style.display = "none";
	}
}


function Gotop3()
{
	var alerta = document.getElementById("alerta2"); 
	if (document.quiz.q2[0].checked == false && document.quiz.q2[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta2 = document.getElementById("pergunta2");
		pergunta2.style.display = "none";
		var pergunta3 = document.getElementById("pergunta3");
		pergunta3.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop4() 
{
	var alerta = document.getElementById("alerta3"); 
	if (document.quiz.q3[0].checked == false && document.quiz.q3[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta3 = document.getElementById("pergunta3");
		pergunta3.style.display = "none";
		var pergunta4 = document.getElementById("pergunta4");
		pergunta4.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop5() 
{
	var alerta = document.getElementById("alerta4"); 
	if (document.quiz.q4[0].checked == false && document.quiz.q4[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta4 = document.getElementById("pergunta4");
		pergunta4.style.display = "none";
		var pergunta5 = document.getElementById("pergunta5");
		pergunta5.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop6() 
{
	var alerta = document.getElementById("alerta5"); 
	if (document.quiz.q5[0].checked == false && document.quiz.q5[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta5 = document.getElementById("pergunta5");
		pergunta5.style.display = "none";
		var pergunta6 = document.getElementById("pergunta6");
		pergunta6.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop7() 
{
	var alerta = document.getElementById("alerta6"); 
	if (document.quiz.q6[0].checked == false && document.quiz.q6[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta6 = document.getElementById("pergunta6");
		pergunta6.style.display = "none";
		var pergunta7 = document.getElementById("pergunta7");
		pergunta7.style.display = "block";
		alerta.style.display = "none";
	}
}

function proximaEtapaQuiz()
{
	var alerta = document.getElementById("alerta7"); 
	if (document.quiz.q7[0].checked == false && document.quiz.q7[1].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta7 = document.getElementById("pergunta7");
		pergunta7.style.display = "none";
		var parteDois = document.getElementById("parteDois");
		parteDois.style.display = "block";
		alerta.style.display = "none";
	}
}


/*SETAS PARA RETROCEDER */

function Backtop1()
{
	var pergunta1 = document.getElementById("pergunta1");
	pergunta1.style.display = "block";
	var pergunta2 = document.getElementById("pergunta2");
	pergunta2.style.display = "none";
}

function Backtop2()
{
	var pergunta2 = document.getElementById("pergunta2");
	pergunta2.style.display = "block";
	var pergunta3 = document.getElementById("pergunta3");
	pergunta3.style.display = "none";
}

function Backtop3()
{
	var pergunta3 = document.getElementById("pergunta3");
	pergunta3.style.display = "block";
	var pergunta4 = document.getElementById("pergunta4");
	pergunta4.style.display = "none";
}

function Backtop4()
{
	var pergunta4 = document.getElementById("pergunta4");
	pergunta4.style.display = "block";
	var pergunta5 = document.getElementById("pergunta5");
	pergunta5.style.display = "none";
}

function Backtop5()
{
	var pergunta5 = document.getElementById("pergunta5");
	pergunta5.style.display = "block";
	var pergunta6 = document.getElementById("pergunta6");
	pergunta6.style.display = "none";
}

function Backtop6()
{
	var pergunta6 = document.getElementById("pergunta6");
	pergunta6.style.display = "block";
	var pergunta7 = document.getElementById("pergunta7");
	pergunta7.style.display = "none";
}

/* PARTE DOIS DOS QUIZ */
/* SETAS PARA AVANÇAR */

function comecaquiz2()
{
	var parteDois = document.getElementById("parteDois");
	parteDois.style.display = "none";
	var pergunta8 = document.getElementById("pergunta8");
	pergunta8.style.display = "block";
}

function Gotop9()
{
	var alerta = document.getElementById("alerta8"); 
	if (document.quiz.q8[0].checked == false && document.quiz.q8[1].checked == false && document.quiz.q8[2].checked == false && document.quiz.q8[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta8 = document.getElementById("pergunta8");
		pergunta8.style.display = "none";
		var pergunta9 = document.getElementById("pergunta9");
		pergunta9.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop10()
{
	var alerta = document.getElementById("alerta9"); 
	if (document.quiz.q9[0].checked == false && document.quiz.q9[1].checked == false && document.quiz.q9[2].checked == false && document.quiz.q9[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta9 = document.getElementById("pergunta9");
		pergunta9.style.display = "none";
		var pergunta10 = document.getElementById("pergunta10");
		pergunta10.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop11()
{
	var alerta = document.getElementById("alerta10"); 
	if (document.quiz.q10[0].checked == false && document.quiz.q10[1].checked == false && document.quiz.q10[2].checked == false && document.quiz.q10[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta10 = document.getElementById("pergunta10");
		pergunta10.style.display = "none";
		var pergunta11 = document.getElementById("pergunta11");
		pergunta11.style.display = "block";
		alerta.style.display = "none";
	}
}


function Gotop12()
{
	var alerta = document.getElementById("alerta11"); 
	if (document.quiz.q11[0].checked == false && document.quiz.q11[1].checked == false && document.quiz.q11[2].checked == false && document.quiz.q11[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta11 = document.getElementById("pergunta11");
		pergunta11.style.display = "none";
		var pergunta12 = document.getElementById("pergunta12");
		pergunta12.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop13()
{
	var alerta = document.getElementById("alerta12"); 
	if (document.quiz.q12[0].checked == false && document.quiz.q12[1].checked == false && document.quiz.q12[2].checked == false && document.quiz.q12[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta12 = document.getElementById("pergunta12");
		pergunta12.style.display = "none";
		var pergunta13 = document.getElementById("pergunta13");
		pergunta13.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop13()
{
	var alerta = document.getElementById("alerta12"); 
	if (document.quiz.q12[0].checked == false && document.quiz.q12[1].checked == false && document.quiz.q12[2].checked == false && document.quiz.q12[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta12 = document.getElementById("pergunta12");
		pergunta12.style.display = "none";
		var pergunta13 = document.getElementById("pergunta13");
		pergunta13.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop14()
{
	var alerta = document.getElementById("alerta13"); 
	if (document.quiz.q13[0].checked == false && document.quiz.q13[1].checked == false && document.quiz.q13[2].checked == false && document.quiz.q13[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta13 = document.getElementById("pergunta13");
		pergunta13.style.display = "none";
		var pergunta14 = document.getElementById("pergunta14");
		pergunta14.style.display = "block";
		alerta.style.display = "none";
	}
}

function Gotop15()
{
	var alerta = document.getElementById("alerta14"); 
	if (document.quiz.q14[0].checked == false && document.quiz.q14[1].checked == false && document.quiz.q14[2].checked == false && document.quiz.q14[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta14 = document.getElementById("pergunta14");
		pergunta14.style.display = "none";
		var pergunta15 = document.getElementById("pergunta15");
		pergunta15.style.display = "block";
		alerta.style.display = "none";
	}
}


/*SETAS PARA RETROCEDER */

function Backtop8()
{
	var pergunta8 = document.getElementById("pergunta8");
	pergunta8.style.display = "block";
	var pergunta9 = document.getElementById("pergunta9");
	pergunta9.style.display = "none";
}

function Backtop9()
{
	var pergunta9 = document.getElementById("pergunta9");
	pergunta9.style.display = "block";
	var pergunta10 = document.getElementById("pergunta10");
	pergunta10.style.display = "none";
}

function Backtop10()
{
	var pergunta10 = document.getElementById("pergunta10");
	pergunta10.style.display = "block";
	var pergunta11 = document.getElementById("pergunta11");
	pergunta11.style.display = "none";
}

function Backtop11()
{
	var pergunta11 = document.getElementById("pergunta11");
	pergunta11.style.display = "block";
	var pergunta12 = document.getElementById("pergunta12");
	pergunta12.style.display = "none";
}

function Backtop12()
{
	var pergunta12 = document.getElementById("pergunta12");
	pergunta12.style.display = "block";
	var pergunta13 = document.getElementById("pergunta13");
	pergunta13.style.display = "none";
}

function Backtop13()
{
	var pergunta13 = document.getElementById("pergunta13");
	pergunta13.style.display = "block";
	var pergunta14 = document.getElementById("pergunta14");
	pergunta14.style.display = "none";
}

function Backtop14()
{
	var pergunta14 = document.getElementById("pergunta14");
	pergunta14.style.display = "block";
	var pergunta15 = document.getElementById("pergunta15");
	pergunta15.style.display = "none";
}

function Resultado()
{
	var alerta = document.getElementById("alerta15"); 
	if (document.quiz.q15[0].checked == false && document.quiz.q15[1].checked == false && document.quiz.q15[2].checked == false && document.quiz.q15[3].checked == false)
    {
	    alerta.style.display = "block";
    }
    else
    {
		var pergunta15 = document.getElementById("pergunta15");
		pergunta15.style.display = "none";
		var resultado = document.getElementById("resultado");
		resultado.style.display = "block";
		alerta.style.display = "none";
	}
}



/********************************************* FIM DO QUIZ *****************************************************************/

/********************************************* GASTOS *****************************************************************/

function addgastos()
{
	var menu =  document.getElementById("menu");
	menu.style.display = "none";
	var addgasto = document.getElementById("addgasto");
	addgasto.style.display = "block";
}

function mostragasto()
{
	var menu =  document.getElementById("menu");
	menu.style.display = "none";
	var gasto = document.getElementById("gasto");
	gasto.style.display = "block";
}

function voltamenu()
{
	var menu =  document.getElementById("menu");
	menu.style.display = "block";
	var addgasto = document.getElementById("addgasto");
	addgasto.style.display = "none";
}

 $('#pergunta1').keypress(function(e) {
      if(e.which == 13) {
        e.preventDefault();
      }
  });
  
  $('#pergunta2').keypress(function(e) {
      if(e.which == 13) {
        e.preventDefault();
      }
  });