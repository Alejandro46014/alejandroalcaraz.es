
/*=============================================

VALIDAR REGISTRO

=============================================*/

function validarRegistro(){

"use strict";

	var usuario = document.querySelector("#nombre_usuario").value;	



	var password = document.querySelector("#password_usuario").value;

	
	var rpassword = document.querySelector("#rpassword_usuario").value;


	var email = document.querySelector("#email_usuario").value;



	var terminos = document.querySelector("#terminos").checked;



	/* VALIDAR USUARIO */



	if(usuario !== ""){



		var caracteres = usuario.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres > 10){



			document.getElementById("fallo").innerHTML = "Escriba por favor menos de 10 caracteres.";

			document.getElementById("nombre_usuario").style.border="2px solid red";

			return false;

		}



		if(!expresion.test(usuario)){



			document.getElementById("fallo").innerHTML = "No escriba caracteres especiales.";


			document.getElementById("nombre_usuario").style.border="2px solid red";

			return false;



		}



	}



	/* VALIDAR PASSWORD */



	if(password !== ""){



		var caracteres = password.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres < 8){



			document.getElementById("fallo").innerHTML = "Escriba por favor un mínimo de 8 caracteres.";


			document.getElementById("password_usuario").style.border="2px solid red";

			return false;

		}



		if(!expresion.test(password)){



			document.getElementById("fallo").innerHTML = "No escriba caracteres especiales.";


			document.getElementById("password_usuario").style.border="2px solid red";

			return false;



		}
		
		if(rpassword !== password){
			
			
			document.getElementById("fallo").innerHTML = "Las contraseñas no coinciden.";
			
			document.getElementById("password_usuario").style.border="2px solid red";
			document.getElementById("rpassword_usuario").style.border="2px solid red";
			
			
			
			return false;
		}



	}



	/* VALIDAR EMAIL*/



	if(email !== ""){



		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;



		if(!expresion.test(email)){



			document.getElementById("fallo").innerHTML = "Escriba correctamente el Email.";


			document.getElementById("email_usuario").style.border="2px solid red";

			return false;



		}
	}



	/* VALIDAR TÉRMINOS*/



	if(!terminos){



		document.getElementById("fallo").innerHTML = "No se logró el registro, acepte términos y condiciones!";

		document.querySelector("#nombre_usuario").value = usuario;	

		document.querySelector("#password_usuario").value = password;
		
		document.querySelector("#rpassword_usuario").value = rpassword;

		document.querySelector("#email_usuario").value = email;



		return false;

	}

	

return true;



}

/*=====  FIN VALIDAR REGISTRO  ======*/



/*=============================================

VALIDAR INGRESO

=============================================*/

function validarIngreso(){
	
	var usuario = document.querySelector("#email_usuario").value;	

	var password = document.querySelector("#password_usuario").value;
	
	if(usuario === ""){
		
		document.getElementById("fallo").innerHTML = "El campo correo electrónico no puede estar vacío.";

		document.getElementById("email_usuario").style.border="2px solid red";
		
		if(password !== ""){
			
			document.getElementById("password_usuario").style.border="2px solid green";
		}

			return false;
	}
	
	if(password === ""){
		
		document.getElementById("fallo").innerHTML = "El campo contraseña no puede estar vacío.";

		document.getElementById("password_usuario").style.border="2px solid red";
		
		if(usuario !== ""){
			
			document.getElementById("email_usuario").style.border="2px solid green";
		}

		
			return false;
	}
	
	return true;
}


/*=============================================

VALIDAR ACTUALIZAR

=============================================*/

function validarActualizar(){

"use strict";

	var usuario = document.querySelector("#nombre_usuario").value;	


	var email = document.querySelector("#email_usuario").value;




	/* VALIDAR USUARIO */



	if(usuario !== ""){



		var caracteres = usuario.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres > 10){



			document.getElementById("fallo").innerHTML = "Escriba por favor menos de 10 caracteres.";

			document.getElementById("nombre_usuario").style.border="2px solid red";

			return false;

		}



		if(!expresion.test(usuario)){



			document.getElementById("fallo").innerHTML = "No escriba caracteres especiales.";


			document.getElementById("nombre_usuario").style.border="2px solid red";

			return false;



		}



	}


	/* VALIDAR EMAIL*/



	if(email !== ""){



		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;



		if(!expresion.test(email)){



			document.getElementById("fallo").innerHTML = "Escriba correctamente el Email.";


			document.getElementById("email_usuario").style.border="2px solid red";

			return false;



		}
	}

	

return true;



}


/*=====  FIN VALIDAR ACTUALIZAR  ======*/

/*=============================================

VALIDAR ACTUALIZARPASSWORD

=============================================*/

function validarActualizarPassword(){
	
	"use strict";

	var password = document.querySelector("#password_usuario").value;	
	
	
	var rpassword = document.querySelector("#rpassword_usuario").value;	



	if(password === "" || rpassword === ""){
		
		
		document.getElementById("fallop").innerHTML = "Debe rellenar los campos.";
		
		return false;
		
	}

	if(password !== ""){



		var caracteres = password.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres > 8){



			document.getElementById("fallop").innerHTML = "Escriba por favor menos de 8 caracteres.";

			document.getElementById("password_usuario").style.border="2px solid red";

			return false;

		}



		if(!expresion.test(password)){



			document.getElementById("fallop").innerHTML = "No escriba caracteres especiales.";


			document.getElementById("password_usuario").style.border="2px solid red";

			return false;



		}

		if(password !== rpassword){
			
			document.getElementById("fallop").innerHTML = "Las contraseñas no coinciden.";


			document.getElementById("rpassword_usuario").style.border="2px solid red";

			return false;

			
		}

	}


return true;



}


/*=====  FIN VALIDAR ACTUALIZARPASSWORD  ======*/

/*=============================================

VALIDAR RESTABLECER PASSWORD

=============================================*/

function validarResetPassword(){
	
	"use strict";
	
	var email = document.querySelector("#email_usuario").value;
	
	var password = document.querySelector("#password_usuario").value;
	
	var rpassword = document.querySelector("#rpassword_usuario").value;
	
	if(email === "" || password === "" || rpassword === ""){
		
		
		document.getElementById("fallor").innerHTML = "Debe rellenar los campos.";
		
		return false;
		
	}
	
	if(password !== ""){



		var caracteres = password.length;

		var expresion = /^[a-zA-Z0-9]*$/;



		if(caracteres > 8){



			document.getElementById("fallor").innerHTML = "Escriba por favor menos de 8 caracteres.";

			document.getElementById("password_usuario").style.border="2px solid red";

			return false;

		}



		if(!expresion.test(password)){



			document.getElementById("fallor").innerHTML = "No escriba caracteres especiales.";


			document.getElementById("password_usuario").style.border="2px solid red";

			return false;



		}

		if(password !== rpassword){
			
			document.getElementById("fallor").innerHTML = "Las contraseñas no coinciden.";


			document.getElementById("rpassword_usuario").style.border="2px solid red";

			return false;

			
		}

	}
	
	if(email !== ""){
		
		var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;



		if(!expresion.test(email)){



			document.getElementById("fallo").innerHTML = "Escriba correctamente el Email.";


			document.getElementById("email_usuario").style.border="2px solid red";

			return false;

			
	}

	
}

	return true;
}


/*=====  FIN VALIDAR RESTABLECER PASSWORD  ======*/

/*=============================================

VALIDAR AMPLIARPERFIL

=============================================*/

function validarAmpliarPerfil(){
	
	"use strict";
	
	var pais = document.querySelector("#pais_usuario").value;
	
	/*var ciudad = document.querySelector("#ciudad_usuario").value;
	
	var poblacion = document.querySelector("#poblacion_usuario").value;*/
	
	
	if(pais !== ""){
		
		var expresion = /^[a-zA-Z]*$/;



		if(!expresion.test(pais)){



			document.getElementById("falloa").innerHTML = "Solo se aceptan caracteres alfabeticos.";


			document.getElementById("pais_usuario").style.border="2px solid red";

			return false;

			
	}

	
}
	
	
	
	return false;
}


/*=====  FIN VALIDAR RESTABLECER PASSWORD  ======*/

(function(){
	
	"use strict";



/*=====  FIN VALIDAR INGRESO  ======*/	
	document.addEventListener('DOMContentLoaded', function(){
		
		/*var map = L.map('mapa').setView([39.551160,-0.626431], 16);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

L.marker([39.551160,-0.626431]).addTo(map)
    .bindPopup('EnanoMaligno')
    .openPopup();*/
		
		//DATOS PERSONALES
		
		/*var nombre=document.getElementById('nombre_usuario');
		var email=document.getElementById('email_usuario');
		var password=document.getElementById('password_usuario');
		var rpassword=document.getElementById('rpassword_usuario');
		var patron=/^[a-zA-Z0-9]*$/;*/
		
		
		//BOTONES Y DIVS
		//var error=document.getElementById('error');
		
		
		
		
			
		
		/*nombre.addEventListener('blur', validarCampos);
		password.addEventListener('blur', validarCampos);
		password.addEventListener('blur', validarPatron);
		rpassword.addEventListener('blur', validarPassword);
		email.addEventListener('blur', validarCampos);
		email.addEventListener('blur', validarEmail);*/
		
		
		
		/*function validarCampos(){
			
			if(this.value === ''){
				error.style.display='block';
				error.innerHTML='Este campo es oblgatorio';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}else{
				error.style.display='none';
				this.style.border='1px solid green';
			}
			
		}
		
		function validarEmail(){
			
			if(this.value.indexOf('@')>-1){
				
				error.style.display='none';
				this.style.border='1px solid green';
			}else{
				
				error.style.display='block';
				error.innerHTML='No es una dirección de correo correcta';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}
		}
		
		function validarPassword(){
			
			if(this.value != password){
				error.style.display='block';
				error.innerHTML='Las contraseñas no coinciden';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}else{
				error.style.display='none';
				this.style.border='1px solid green';
			}
			
			
		}
		
		function validarPatron(){
			
			if(patron.test(this.value)){
				error.style.display='block';
				error.innerHTML='La contraseña debe tener una longitud de 8 caracteres y contener minúsculas, mayúsculas y numeros';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}else{
				error.style.display='none';
				this.style.border='1px solid green';
			}
		}*/
		
		/*apellido.addEventListener('blur', function(){
			if(this.value === ''){
				error.style.display='block';
				error.innerHTML='Este campo es oblgatorio';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}
		});
		
		email.addEventListener('blur', function(){
			if(this.value === ''){
				error.style.display='block';
				error.innerHTML='Este campo es oblgatorio';
				this.style.border='1px solid red';
				error.style.border='1px solid red';
			}
		});*/
		
		/*function calcularMontos(event){
			
			event.preventDefault();
			
			if(regalo.value === ''){
				
				alert("Debes elegir un regalo");
				regalo.focus();
			}else{
				
				var boletoDia=parseInt(pase_undia.value,10) || 0,
					boleto2Dias=parseInt(pase_dosdias.value,10) || 0,
					boletoCompleto=parseInt(pase_completo.value,10) || 0 ,
					cantCamisas=parseInt(camisa_evento.value,10) || 0,
					cantEtiquetas=parseInt(etiquetas.value,10) || 0;
				
				var totalAPagar=(boletoDia * 30) + (boleto2Dias * 45) + (boletoCompleto * 50) + ((cantCamisas *10)* 0.93) + (cantEtiquetas * 2);
				
				var listadoProductos=[];
				
				if(boletoDia >=1){
					
					listadoProductos.push(boletoDia + ' Pases por un día');
				}
				if(boleto2Dias >= 1){
					
					listadoProductos.push(boleto2Dias + ' Pases por dos días');
				}
				if(boletoCompleto >= 1){
					
					listadoProductos.push(boletoCompleto + ' Pases todos los días');
				}
				if(cantCamisas >= 1){
					
					listadoProductos.push(cantCamisas + ' Camisas');
				}
				if(cantEtiquetas >= 1){
					
					listadoProductos.push(cantEtiquetas + ' Etiquetas');
				}
				
				listaProductos.style.display="block";
				listaProductos.innerHTML = '';
				
				for(var i=0;i < listadoProductos.length;i++){
					
					listaProductos.innerHTML+=listadoProductos[i] + '<br/>';
				}
				
				
				suma.innerHTML = totalAPagar.toFixed(2) + ' €';
				
			}
		}
		
		function mostrarDias(){
			
			var boletoDia=parseInt(pase_undia.value,10) || 0,
					boleto2Dias=parseInt(pase_dosdias.value,10) || 0,
					boletoCompleto=parseInt(pase_completo.value,10) || 0 ;
			
			var diasElegidos=[];
			
			if(boletoDia > 0){
				
				diasElegidos.push('viernes');
			}
			if(boleto2Dias > 0){
				
				diasElegidos.push('viernes', 'sabado');
			}
			if(boletoCompleto > 0){
				
				diasElegidos.push('viernes','sabado','domingo');
			}
			
			for(var i=0; i < diasElegidos.length; i++){
				
				document.getElementById(diasElegidos[i]).style.display="block";
			}
		}
	*/
	});//DOM CONTENT LOADED
	
})();

/*-------------empieza jquery---------------*/

$( document ).ready(function() {
'use strict';
	
	/*-----------------BARRA FIJA SCROLL---------------*/
	
	var windowHeight=$(window).height();
	var barraAltura=$('.barra').innerHeight();
	
	$(window).scroll(function(){
		var scroll=$(window).scrollTop();
		if(scroll>windowHeight){
			
			$('.barra').addClass('fixed');
			$('body').css({'margin-top':barraAltura +'px'});
		}else{
			
			$('.barra').removeClass('fixed');
			$('body').css({'margin-top':'0px'});
		}
		
	});
	
	/*--------------MENÜ MOVIL-----------------*/
	
	$('.menu-movil').on('click',function(){
		
		$('.navegacion-principal').slideToggle();
		
	});
	
	$('.user_icono').on('click',function(){
		
		$('.extendido_usuarios').slideToggle();
		
	});
	
	/*---------lettering------------*/
	
	$('.nombre-sitio').lettering();
	
	/*------------------addclass body---------*/
	
	$('body.index .navegacion-principal a:contains("Inicio")').addClass('activo');
	
	$('body.galeria .navegacion-principal a:contains("Galería")').addClass('activo');
	
	$('body.registro .navegacion-principal a:contains("Registro")').removeClass('enlace_registro');
	
	$('body.registro .navegacion-principal a:contains("Registro")').addClass('activo_registro');
	
	$('body.login .navegacion-principal a:contains("Iniciar sesión")').addClass('activo');
	
	$('body.entradas .navegacion-principal a:contains("Entradas")').addClass('activo');
	
	$('body.modificarPerfil .navegacion-principal a:contains("Modificar perfil")').addClass('activo');
	
	
	
	
	
	/*--------------cuenta regresiva--------------------*/
	
	$('.cuenta').countdown('2020/08/25 00:00:00', function(event){
		
		$('#dias').html(event.strftime('%D'));
		$('#horas').html(event.strftime('%H'));
		$('#minutos').html(event.strftime('%M'));
		$('#segundos').html(event.strftime('%S'));
	});
	
	/*-------------NAVEGACION GALERÍAS-------------*/
	
	$('#nueva_york').hide();
	$('#melilla').hide();
	$('#paisajes').hide();
	
	$('#btn_nueva_york').on('click',function(){
		
		$('#melilla').hide();
		$('#paisajes').hide();
		$('#nueva_york').show();
		
	});
	
	$('#btn_melilla').on('click',function(){
		
		
		$('#paisajes').hide();
		$('#nueva_york').hide();
		$('#melilla').show();
		
	});
	
	$('#btn_paisajes').on('click',function(){
		
		$('#melilla').hide();
		$('#nueva_york').hide();
		$('#paisajes').show();
		
	});
	
	/*----------------COLORBOX DESCRIPCIÖN DE LOS INVITADOS------------------*/
	
	/*$('.invitado-info').colorbox({inline:true,width:"50%"});*/
	
});//fin document ready