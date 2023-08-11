const formulario = document.getElementById('formFiltro');

document.getElementById('form2').style.display = "none";


function validarOpcFiltro() {
    let opt = document.getElementById('cbOpcion').value;

    switch (opt) {
        case '3':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "block";            
            break;
    }
}