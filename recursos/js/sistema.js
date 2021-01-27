function logout(e){

  const url = 'index.php?controller=ControlLogin&action=cerrar';
  const http = new XMLHttpRequest();
  var params ="";
      http.open("GET", url,true);
      http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
              console.log("cerrando sesion");
              window.location="index.php";
              //var resultado=this.responseText;
              //$("#contenido").html(this.responseText);
            }
        }
  // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //Enviamos la solicitud junto con los parámetros
  http.send(params);
}
function botonsitem(e)
{
  //console.log(e);
  let menu=e.dataset.menu;
  let titulo=e.dataset.titulo;
  let control=e.dataset.control;
  const url = 'index.php?controller='+control;
  const http = new XMLHttpRequest();
  var params ="";
      http.open("GET", url,true);
      http.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
              //console.log(this);
              //var resultado=this.responseText;
              $("#contenido").html(this.responseText);
            }
        }
  // Ponemos las cabeceras de la solicitud como si fuera un formulario, necesario si se utiliza POST
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  //Enviamos la solicitud junto con los parámetros
  http.send(params);

}
function cerrarsesion(){
  $.ajax
  ({
    url:"index.php",
    data:"controller=ControlLogin&action=cerrar",
    type:"GET"
  }).done(function()
  {
    window.location="index.php";
  });
}
