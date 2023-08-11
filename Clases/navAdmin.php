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
                        <a class="nav__link" href="../PagesAdminParque/altaResguardatarios.php">Resguardos</a>
                        <a class="nav__link" href="../PagesAdminParque/MenuCombustible.php">Control de Combustible</a>
                        <a class="nav__link" href="../PagesAdminParque/registroVehicular.php">Registro Vehicular</a>
                        <a class="nav__link" href="../PagesAdminParque/inspeccion.php">Inspeccion Vehicular</a>
                        <a class="nav__link" href="../PagesAdminParque/Multiregistro.php">Otros registros</a>                        
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Consultas</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminParque/listaResguardatarios.php">Resguardatarios</a>
                        <a class="nav__link" href="../PagesAdminParque/resguardoUnidades.php">Resguardo de unidades</a>
                        <a class="nav__link" href="../PagesAdminParque/FormGasolinas.php">Tipos Combustible</a>
                        <a class="nav__link" href="../PagesAdminParque/BusquedaUnidades.php">Busqueda de unidades</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a>
                    <div class="dropdown-content">                        
                        <a class="nav__link" href="../PagesAdminParque/reportCombustible.php">Control Combustible</a>
                        <a class="nav__link" href="../reports/resguardosPDF.php">Control Vehicular</a>                        
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Catalogo</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminParque/catalogo.php">Catálogo general</a>
                        <a class="nav__link" href="../PagesAdminParque/dialogCatalogoEco.php">Catálogo por económico</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Usuarios</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminParque/registroUsuarios.php">Alta Usuarios</a>
                        <a class="nav__link" href="../PagesAdminParque/BusquedaUsuarios.php">Busqueda de usuarios</a>
                    </div>
                </li>

                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>