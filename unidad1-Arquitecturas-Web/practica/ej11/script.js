const OPCIONES = document.querySelectorAll(".opcion");
const CONTENEDOR = document.getElementById("contenedorElementos");

// Se le agrega su correspondiente eventListener a cada link
for (const OPCION of OPCIONES) {
  OPCION.addEventListener("click", async()=>{
    console.log(`Se clickeo el link con el id: ${OPCION.getAttribute("id")}`);
    // let cant = OPCION.getAttribute("data-cant");
    let estado = await fetch(`./generar_elementos.php?cant=${OPCION.getAttribute("data-cant")}`, {method: "GET"})
    if(estado.ok){
      respuesta = await estado.json();
      // console.log(respuesta);  // Muestra por consola el array resultante de parsear el json.
      let acum = document.createElement("div");
      respuesta.forEach(element => {
        acum.appendChild(crearElemento(element));  
      });
      CONTENEDOR.replaceChildren(acum);
    }
  });
}

function crearElemento(element){
  let tag = document.createElement("p");
  tag.textContent = element;

  return tag;
}