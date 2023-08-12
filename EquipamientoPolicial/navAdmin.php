<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<nav class="navbar">
    <div class="logo"><a href="../EquipamientoPolicial/menuAdmin.php"><img src="../logos/direccion-administrativa.png" alt=""></a></div>
    <p>Equipamiento Policial (Administrador)</p>
    <div class="menunav">
        <ul class="nav-links">
            <div class="menu">
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Chalecos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminEP/registro-general.php">Registro general</a>
                        <a class="nav__link" href="../PagesAdminEP/datos-generales.php">Resguardo Chalecos</a>                       
                        <a class="nav__link" href="../PagesAdminEP/opcRegistroChalecos.php">Otros registros</a>                        
                    </div>
                </li>
                <li class="dropdown">
                    <a class="nav__link" href="#Start">Cascos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminEP/regeneral-casco.php">Registro general</a>
                        <a class="nav__link" href="../PagesAdminEP/casco.php">Registro casco</a>
                        <a class="nav__link" href="../PagesAdminEP/resguardo-bienes.php">Resguardo bienes inmuebles</a>
                        <a class="nav__link" href="../PagesAdminEP/resguardo-cascos.php">Relación cascos balisticos</a>
                        <a class="nav__link" href="../PagesAdminEP/opcRegistroCascos.php">Otros registros</a> 
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Reportes</a>
                    <div class="dropdown-content">                        
                        <a class="nav__link" href="../reports/report-resguardochalecos.php">Resguardo de chalecos</a>                                                
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Elementos</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminEP/registroElementos.php">Registrar elemento</a>
                        <a class="nav__link" href="../PagesAdminEP/listEmpleados.php">Listado elementos</a>
                    </div>
                </li>
                <li class="dropdown"><a class="nav__link" href="#">Usuarios</a>
                    <div class="dropdown-content">
                        <a class="nav__link" href="../PagesAdminEP/registroUsuarios.php">Alta Usuarios</a>
                        <a class="nav__link" href="../PagesAdminEP/BusquedaUsuarios.php">Busqueda de usuarios</a>
                    </div>
                </li>

                <li class="dropdown"><a class="nav__link" href="../Clases/cerrar-sesion.php">Cerrar Sesion</a></li>
            </div>
        </ul>
    </div>
</nav>