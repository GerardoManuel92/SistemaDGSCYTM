const formulario = document.getElementById('formFiltro');

document.getElementById('form1').style.display = "none";
document.getElementById('form2').style.display = "none";
document.getElementById('form3').style.display = "none";
document.getElementById('form4').style.display = "none";
document.getElementById('form5').style.display = "none";
document.getElementById('form6').style.display = "none";
document.getElementById('alert').innerHTML = '';

function validarOpcFiltro() {
    let opt = document.getElementById('cbOpcion').value;

    switch (opt) {
        case '0':
            document.getElementById('alert').innerHTML = 'Opción no valida';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            break;
        case '1':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "block";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            break;
        case '2':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "block";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            break;
        case '3':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "block";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            break;
        case '4':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "block";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            break;
        case '5':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "block";
            document.getElementById('form6').style.display = "none";
            break;
        case '6':
            document.getElementById('alert').innerHTML = '';
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "block";
            break;
        default:
            document.getElementById('alert').innerHTML = 'Opción no valida';
            break;
    }
}