
    
    function mostrarContrasena(){
      var tipo = document.getElementById("contrasena");

      if(tipo.type == "password")
      {
          tipo.type = "text";
      
      }
      else
      {
          tipo.type = "password";
      }
   
  }

  function sololetras(e)
{
      var estatus =false;

       key=e.keyCode || e.which;
        tecla=String.fromCharCode(key).toLowerCase();
         letras=" abcdefghijklmnñopqrstuvwxyzáéíóúÁÉÍÓÚ";

  for(var i=0;i<letras.length;i++)
  {


    if (tecla==letras[i])
        {


          estatus=true;
        }

  }
  return estatus;
}

  function mostrarPassword(){
		var cambio = document.getElementById("contrasena");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 

    function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}


function RFC()
{
var x = document.getElementById("rfc");
x.value = x.value.toUpperCase();
}

    
function solomayusculas(e)
{
      var estatus =false;

       key=e.keyCode || e.which;
        tecla=String.fromCharCode(key);
         letras="abcdefghijklmnnñopqrstuvwxyz0123456789";

  for(var i=0;i<letras.length;i++)
  {


    if (tecla==letras[i])
        {


          estatus=true;
        }

  }
  return estatus;
}

function CURP()
{
var ye = document.getElementById("curp");
ye.value = ye.value.toUpperCase();
}
