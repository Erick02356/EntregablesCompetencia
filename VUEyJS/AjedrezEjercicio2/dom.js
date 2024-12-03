
// 0. CREAR LOS COLORES
// 1. DEFINIR LOS COLORES DE LAS CASILLAS
// 2. AGREGAR LAS FICHAS A LAS CASILLAS 
// 3. DEFINIR EL COLOR A LAS FICHAS
// 4. DEFINIR POSICIONES INICIALES DE LAS DIFERENTES FICHAS


//DESAFIO REALIZAR ESTE ESCALADO EN BURBUJA PERO CON UN WHILE
const piezas = [
    ['♜','♞','♝','♛','♚','♝','♞','♜'],
    ['♟','♟','♟','♟','♟','♟','♟','♟'],
    ['','','','','','','',''],
    ['','','','','','','',''],
    ['','','','','','','',''],
    ['','','','','','','',''],
    ['♙','♙','♙','♙','♙','♙','♙','♙'],
    ['♖','♘','♗','♕','♔','♗','♘','♖'],
];
document.addEventListener('DOMContentLoaded',(Event)=>{

    const tablero = document.querySelector('#tablero');

    for (let fila = 0; fila < 8; fila++) {        

        for (let columna = 0; columna < 8; columna++) {
            let definirColores=fila+columna;
            const casilla = document.createElement('div');
            const pieza = document.createElement('div');
            casilla.classList.add("casilla")
            //definirColores % 2 !== 0 ? casilla.classList.add("negra") : casilla.classList.add("blanca");
            if (definirColores%2 !== 0){
                casilla.classList.add("negra")
            }else{
                casilla.classList.add("blanca")
            }
            
            tablero.appendChild(casilla)


            if (fila <2){
                pieza.classList.add("pieza")
                pieza.classList.add("fichaNegra")
                casilla.appendChild(pieza)
                pieza.textContent = piezas[fila][columna]

            }

            if(fila>5){
                pieza.classList.add("pieza")
                pieza.classList.add("fichaBlanca")
                casilla.appendChild(pieza)
                pieza.textContent = piezas[fila][columna]
            }

            // pieza.addEventListener('click',() => seleccionarFicha(pieza))
            
            pieza.addEventListener('click',() => cambiarTurno(pieza))

        }

    
    }
  
});



const seleccionarFicha = (pieza) =>{
        // cambiarTurno(pieza)
        
        const eliminarSeleccion = document.querySelector('.seleccionado')
        if(eliminarSeleccion){
            eliminarSeleccion.classList.remove('seleccionado')
        }
        pieza.classList.add('seleccionado')
        pieza.setAttribute("id", "seleccionado");
        movimientoPeon(pieza);

}


const movimientoPeon = (pieza) => {
 /*
 1 .Identificar que la pieza sea un peon
 2. Al dar click se deben iluminar las dos siguientes casillas
 */ 
    let elementoBuscado = pieza.textContent;
    // let filaOrigen, indiceElemento;
    elementoClikeado = pieza.getAttribute('id');
    // console.log(elementoClikeado)
    let piezaAmover = document.querySelector('#seleccionado')
    console.log(piezaAmover.id)
    if(elementoClikeado=== 'seleccionado'){
        console.log('Eres un peon')

    //Encontramos la fila en la que se encuentra la pIeza que vamos a buscar
        for (let fila = 0; fila < piezas.length; fila++) { 
           let indice = piezas[fila].indexOf(piezaAmover.id);
           console.log(indice);
           if (indice !== -1 && piezaAmover.id === 'seleccionado'){
            filaOrigen= fila;
            indiceElemento = indice;
            console.log(filaOrigen);
            console.log(indiceElemento);
            break;
           }
        }


        console.log(`Aquí se guarda la info del elemento clickeado y es ${elementoClikeado}`)

        
/* 
AVANCE:

Esta funcion lo que intenta es encontrar los indices del elemento que fue seleccionado esto con el fin
de que al dar clic sepamos con exactitud donde estamos situados y en funcion a esto se conozca cuales seran 
las casillas que deben cambiar de color para habilitar su movimiento

Lo que me tiene frenado es que al haber valores repetidos no puedo conocer el indice exacto del elemento clickeado
sino que me devuelve el primer elemento siempre [en el caso del peon]


POSIBLE SOLUCION, GUARDAR LA INFORMACIÓN DE LAS COORDENADAS DE LAS PIEZAS AL CREARLAS EN EL TABLERO
*/
    }

}


let inicioMovimientos=true;

let parrafo = document.createElement("p");
parrafo.textContent = "Empiezan las fichas blancas";
document.body.appendChild(parrafo);
//TURNO ES AL TABLERO
const cambiarTurno = (pieza) =>{

    const turno =  pieza.getAttribute('class');
    //console.log(turno)
    if(turno === 'pieza fichaBlanca'){
      if(inicioMovimientos){
        //MUEVEN LAS BLANCAS
        inicioMovimientos=!inicioMovimientos    
        seleccionarFicha(pieza)
        // console.log('Mueven las negras')
        // console.log(inicioMovimientos)
        parrafo.textContent = "Ahora mueven las fichas negras";

      }
      return;
    }else{
        if(!inicioMovimientos){
            //MUEVEN LAS NEGRAS
            inicioMovimientos=!inicioMovimientos    
            //console.log('Mueven las blancas')
            seleccionarFicha(pieza)
            parrafo.textContent = "Ahora mueven las fichas blancas";

            //console.log(inicioMovimientos)
        }
      

    }
    document.body.appendChild(parrafo);

}
