<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo"><a href="../ParqueVehicular/menUser.php"><img src="../logos/direccion-administrativa.png" alt=""></a></div>
    <p>Parque Vehicular (Usuario)</p>
    <div class="menunav">
        <ul class="nav-links">
            <div class="menu">
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Registro</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserParque/MenuCombustible.php">Control de Combustible</a>
                        <a class="nav__link" href="../PagesUserParque/registroVehicular.php">Registro Vehicular</a>
                        <a class="nav__link" href="../PagesUserParque/inspeccion.php">Inspeccion Vehicular</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Consultas</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserParque/BusquedaUnidades.php">Busqueda de unidades</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a>
                    <div class="dropdown-content">                        
                    <a class="nav__link" href="../PagesUserParque/reportCombustible.php">Control Combustible</a>
                        <a class="nav__link" href="../reports/resguardosPDF.php">Control Vehicular</a>                        
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Catalogo</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesUserParque/catalogo.php">Ver catalogo</a>
                    </div>
                </li>

                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>