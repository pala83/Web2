const RESPUESTA = document.getElementById("respuesta");
const FORMULARIO = document.getElementById("formulario").addEventListener("submit", async function(event){
  event.preventDefault();
  
  /*
   * URLSearchParams: Permite que lo que se pase por parametros PUEDA ser enviado por url.
   * Cuando usamos el metodo GET, se envia la info por la url
   */

  
  const DATA = new URLSearchParams(new FormData(this));
  try {
    let estado = await fetch('showData.php', {method: 'POST', body: DATA});
     if(estado.ok){
        let respuesta = await estado.text();
        RESPUESTA.innerHTML = respuesta;
     }else{
      RESPUESTA.innerHTML = "No se establecio conexion con el archivo .php";
     }

  } catch (error) {
    console.log(error);
  }  
});