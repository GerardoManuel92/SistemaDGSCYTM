const formularioCombustible = document.getElementById('formCombustible');

function cargaPrecio(){
    let precio = Number(document.getElementById('precio_litro').value);
    let cantidad_litros = Number(document.getElementById('litros_gasolina').value);

    let costo = precio*cantidad_litros;

    document.getElementById('precio_ticket').value = costo.toFixed(2);

}

