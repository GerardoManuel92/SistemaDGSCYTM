<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo"><a href="../EquipamientoPolicial/menUser.php"><img src="../logos/direccion-administrativa.png" alt=""></a></div>
    <p>Equipamiento Policial (Usuario)</p>
    <div class="menunav">
        <ul class="nav-links">
            <div class="menu">
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Chalecos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserEP/datos-generales.php">Resguardo Chalecos</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Cascos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserEP/resguardo-bienes.php">Resguardo bienes inmuebles</a>
                        <a class="nav__link" href="../PagesUserEP/resguardo-cascos.php">Relación cascos balisticos</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../reports/report-resguardochalecos.php">Resguardo de chalecos</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Elementos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserEP/listEmpleados.php">Listado elementos</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>