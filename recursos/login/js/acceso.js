/*function loguear(){

  var usuario=document.getElementById("username").value;
  var password=document.getElementById("password").value;


  const url = 'index.php?controller=ControlLogin&action=validar';
  const http = new XMLHttpRequest();

  var params = "usuario="+usuario+"&password="+password+"";
  http.open("POST", url);

  http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this);
          //  var objeto=JSON.parse(resultado);
            //location.href="index.php?controller="+objeto.control;
            //location.href="index.php?controller=ControlAdminLTE";
            //var resultado = JSON.parse(this.responseText);
            //  console.log("antes jsjsjsju7ytgjj");
              //console.log(resultado);
              //resolve(resultado.cuatrimestre);
          }
        }
  // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //Enviamos la solicitud junto con los parámetros
  http.send(params);
}
*/
