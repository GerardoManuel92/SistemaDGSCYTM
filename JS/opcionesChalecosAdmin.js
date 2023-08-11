const formulario = document.getElementById('formFiltro');

document.getElementById('form1').style.display = "none";
document.getElementById('form2').style.display = "none";
document.getElementById('form3').style.display = "none";
document.getElementById('form4').style.display = "none";
document.getElementById('form5').style.display = "none";
document.getElementById('form6').style.display = "none";
document.getElementById('form7').style.display = "none";
document.getElementById('form8').style.display = "none";
document.getElementById('form9').style.display = "none";
document.getElementById('form10').style.display = "none";

function validarSeleccion() {
    let formulario = document.getElementById('cbOpcion').value;

    switch (formulario) {
        case '0':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '1':
            document.getElementById('form1').style.display = "block";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '2':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "block";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            form10.style.display = "none";
            break;
        case '3':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "block";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '4':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "block";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '5':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "block";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '6':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "block";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '7':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "block";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '8':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "block";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
            break;
        case '9':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "block";
            document.getElementById('form10').style.display = "none";
            break;
        case '10':
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "block";
            break;
        default:
            document.getElementById('form1').style.display = "none";
            document.getElementById('form2').style.display = "none";
            document.getElementById('form3').style.display = "none";
            document.getElementById('form4').style.display = "none";
            document.getElementById('form5').style.display = "none";
            document.getElementById('form6').style.display = "none";
            document.getElementById('form7').style.display = "none";
            document.getElementById('form8').style.display = "none";
            document.getElementById('form9').style.display = "none";
            document.getElementById('form10').style.display = "none";
    }
}