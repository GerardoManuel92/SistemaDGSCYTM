<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo"><a href="../ParqueVehicular/menuAdmin.php"><img src="../logos/direccion-administrativa.png" alt=""></a></div>
    <p>Parque Vehicular (Administrador)</p>
    <div class="menunav">
        <ul class="nav-links">
            <div class="menu">
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Registro</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../Pages/altaResguardatarios.php">Resguardos</a>
                        <a class="nav__link" href="../Pages/registroCombustible.php">Control de Combustible</a>
                        <a class="nav__link" href="../Pages/registroVehicular.php">Registro Vehicular</a>
                        <a class="nav__link" href="../Pages/inspeccion.php">Inspeccion Vehicular</a>
                        <a class="nav__link" href="../Pages/Multiregistro.php">Otros registros</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Consultas</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../Pages/listaResguardatarios.php">Resguardatarios</a>
                        <a class="nav__link" href="../Pages/resguardoUnidades.php">Resguardo de unidades</a>
                        <a class="nav__link" href="../Pages/FormGasolinas.php">Tipos Combustible</a>
                        <a href="#">Auditorias</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="#">Registro Vehicular</a>
                        <a class="nav__link" href="#">Control Combustible</a>
                        <a class="nav__link" href="#">Resguardo de Unidades</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Catalogo</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../Pages/catalogo.php">Ver catalogo</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Usuarios</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../Pages/registroUsuarios.php">Alta Usuarios</a>
                        <a class="nav__link" href="../Pages/BusquedaUsuarios.php">Busqueda de usuarios</a>
                    </div>
                </li>

                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>