<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo"><img src="../logos/direccion-administrativa.png" alt=""></div>
    <p>Parque Vehicular (Administrador)</p>
    <div class="menunav">
        <ul class="nav-links">
            <div class="menu">
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Registro</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="#">Resguardos</a>
                        <a class="nav__link" href="#">Control de Combustible</a>
                        <a class="nav__link" href="#">Multi Registro</a>
                        <a class="nav__link" href="#">Multi Registro 2</a>
                        <a class="nav__link" href="#">Registro de Eco</a>
                        <a class="nav__link" href="#">Registro Vehicular</a>
                        <a class="nav__link" href="#">Inspeccion Vehicular</a>
                        <a class="nav__link" href="#">Cargar Imagenes</a>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Consultas</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="#">Control Combustible</a>
                        <a class="nav__link" href="#">Registro Vehicular</a>
                        <a class="nav__link" href="#">Historial de inspecciones</a>
                        <a class="nav__link" href="#">Resguardatarios</a>
                        <a class="nav__link" href="#">Resguardo de unidades</a>
                        <a class="nav__link" href="#">Tipos Combustible</a>
                        <a href="../Admin/auditorias.php">Auditorias</a>
                        <a href="">Catalogo</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a></li>
                <li class="dropdown"><a class="nav__link" href="#">Catalogo</a></li>
                <li class="dropdown"><a class="nav__link" href="#">Usuarios</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../Pages/registroUsuarios.php">Alta Usuarios</a>
                        <a class="nav__link" href="#">Busqueda Usuarios</a>
                    </div>
                </li>

                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>