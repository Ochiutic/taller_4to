<?php
if($_SESSION['permisos_accesos']=='Super Admin'){?>
    <ul class="sidebar-menu" >
    <li class="header">Menú</li>
    <?php 
                if($_GET["module"]=="start"){
                    $active_home="active";
                }else{
                    $active_home="";
                }
            ?>
            <li class="<?php echo $active_home; ?>" >
            <a href="?module=start" style="color: #8181F7"  style="background:#CEECF5"><i class="fa fa-home"></i><strong>Inicio</strong></a> 
        </li>
        <?php 
            //if($_GET['module']=="start"){?>
             <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text" ></i><strong><span>Referenciales</span></strong><i class="fa fa-angle-left pull-right" ></i>
                    </a>
                    <ul class="treeview-menu">
                         <a href="javascript:void(0);" style="color: #8181F7">
                            <i class="fa fa-file-text" ></i><strong><span>Referenciales Produccion</span></strong><i class="fa fa-angle-left pull-right" ></i>
                         </a>
                        <li><a href="?module=materia_prima"><i class="fa fa-circle-o"></i>Materias Primas</a></li>
                         <li><a href="?module=sector"><i class="fa fa-circle-o"></i>Sectores de trabaho</a></li>
                         <li><a href="?module=sucursal"><i class="fa fa-circle-o"></i>Sucursales</a></li>
                         <li><a href="?module=productos"><i class="fa fa-circle-o"></i>Productos</a></li>
                         <li><a href="?module=operarios"><i class="fa fa-circle-o"></i>Operarios</a></li>
                         <li><a href="?module=deposito"><i class="fa fa-circle-o"></i>Deposito</a></li>
                    </ul>

                    <ul class="treeview-menu">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text" ></i><strong><span>Referenciales Personal</span></strong><i class="fa fa-angle-left pull-right" ></i>
                    </a>
                        <li><a href="?module=razon_social"><i class="fa fa-circle-o"></i>Clientes</a></li>
                         <li><a href="?module=user"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                        
                    </ul>
                   
                </li>

                <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Produccion de Arneses</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">    
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Produccion</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>           
                        <li><a href="?module=productos"><i class="fa fa-circle-o"></i>Productos</a></li>
                        <li><a href="?module=costos"><i class="fa fa-circle-o"></i>Costos de Produccion</a></li>
                        <li><a href="?module=presupuesto"><i class="fa fa-circle-o"></i>Presupuestos de Produccion</a></li>
                        <li><a href="?module=control"><i class="fa fa-circle-o"></i>Control de Calidad</a></li>
                        <li><a href="?module=?"><i class="fa fa-circle-o"></i>Mermas</a></li>
                    </ul>
                    <!------------>
                    <ul class="treeview-menu">    
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Etapas</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>           
                        <li><a href="?module=orden_produccion"><i class="fa fa-circle-o"></i>Orden de Produccion</a></li>
                    </ul>
                    <!------------>
                    <ul class="treeview-menu">    
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Pedidos de Produccion</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>           
                        <li><a href="?module=pedido_material"><i class="fa fa-circle-o"></i>Pedidos de Materiales</a></li>
                        <li><a href="?module=pedidos"><i class="fa fa-circle-o"></i>Pedidos de Clientes</a></li>
                    </ul>
                   
                </li>


                <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Informes</span></strong><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?module=?"><i class="fa fa-circle-o"></i>Informes Referenciales</a></li>
                        <li><a href="?module=?"><i class="fa fa-circle-o"></i>Informes de Movimiento</a></li>
                    </ul>
                    
                </li>

               
                <?php 
                    if($_GET['module']=="user" || $_GET['module']=="form_user"){ ?>
                        <li class="active" >
                            <a href="?module=user" style="color: #8181F7"><i class="fa fa-user" ></i><strong>Administrar Usuarios</strong></a>
                        </li>
                <?php }
                    else{ ?>
                        <li>
                            <a href="?module=user" style="color: #8181F7"><i class="fa fa-user"></i><strong>Administrar Usuarios</strong></a>
                        </li>
                   <?php }

                    if($_GET['module']=="password"){ ?>
                        <li class="active">
                            <a href="?module=password" style="color: #8181F7"><i class="fa fa-user"><strong></i>Cambiar Contraseña</strong></a>
                        </li>
                    <?php }
                    else{ ?>
                        <li>
                            <a href="?module=password" style="color: #8181F7"><i class="fa fa-user"><strong></i>Cambiar Contraseña</strong></a>
                        </li>
                    <?php }

                ?> 
    </ul>
    

<?php
}
elseif($_SESSION['permisos_accesos']=='Supervisor'){?>
<ul class="sidebar-menu">
        <li class="header">Menú</li>
            <?php 
                if($_GET["module"]=="start"){
                    $active_home="active";
                }else{
                    $active_home="";
                }
            ?>
        <li class="<?php echo $active_home; ?>">
            <a href="?module=start"  style="color: #8181F7"><i class="fa fa-home"></i> Inicio </a> 
        </li>
        <?php 
            //if($_GET['module']=="start"){?>
                     <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text" ></i><strong><span>Referenciales</span></strong><i class="fa fa-angle-left pull-right" ></i>
                    </a>
                    <ul class="treeview-menu">
                         <a href="javascript:void(0);" style="color: #8181F7">
                            <i class="fa fa-file-text" ></i><strong><span>Referenciales Compras</span></strong><i class="fa fa-angle-left pull-right" ></i>
                         </a>
                        <li><a href="?module=materia_prima"><i class="fa fa-circle-o"></i>Sucursal</a></li>
                         <li><a href="?module=sector"><i class="fa fa-circle-o"></i>Producto</a></li>
                         <li><a href="?module=sucursal"><i class="fa fa-circle-o"></i>Proveedor</a></li>
                         <li><a href="?module=productos"><i class="fa fa-circle-o"></i>Usuario</a></li>
                        
                    </ul>
                   
                </li>

                <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Movimiento Compras</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">    
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Compras</strong><i class="fa fa-angle-left pull-right"></i>
                    </a>           
                        <li><a href="?module=productos"><i class="fa fa-circle-o"></i>Registrar Pedido de Compras</a></li>
                        <li><a href="?module=control"><i class="fa fa-circle-o"></i>Regsitrar Presupuesto de Proveedores</a></li>
                    </ul>
                   
                   
                </li>

                <?php
                    if($_GET['module']=="password"){ ?>
                        <li class="active">
                            <a href="?module=password"  style="color: #8181F7"><i class="fa fa-user"></i>Cambiar Contraseña</a>
                        </li>
                    <?php }
                    else{ ?>
                        <li>
                            <a href="?module=password"  style="color: #8181F7"><i class="fa fa-user"></i>Cambiar Contraseña</a>
                        </li>
                    <?php }

                ?> 
        <?php //} ?>
    </ul>
<?php
}
elseif($_SESSION['permisos_accesos']=='Leader'){?>
<ul class="sidebar-menu">
        <li class="header">Menú</li>
            <?php 
                if($_GET["module"]=="start"){
                    $active_home="active";
                }else{
                    $active_home="";
                }
            ?>
        <li class="<?php echo $active_home; ?>">
            <a href="?module=start"   style="color: #8181F7"><i class="fa fa-home"></i> Inicio </a> 
        </li>
        <?php 
            //if($_GET['module']=="start"){?>
                   <li class="treeview">
                    <a href="javascript:void(0);" style="color: #8181F7">
                        <i class="fa fa-file-text"></i><strong><span>Informes</span></strong><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="?module=?"><i class="fa fa-circle-o"></i>Informes Referenciales</a></li>
                        <li><a href="?module=?"><i class="fa fa-circle-o"></i>Informes de Movimiento</a></li>
                    </ul>
                    
                </li>

                <?php
                    if($_GET['module']=="password"){ ?>
                        <li class="active">
                            <a href="?module=password"   style="color: #8181F7"><i class="fa fa-user"></i>Cambiar Contraseña</a>
                        </li>
                    <?php }
                    else{ ?>
                        <li>
                            <a href="?module=password"   style="color: #8181F7"><i class="fa fa-user"></i>Cambiar Contraseña</a>
                        </li>
                    <?php }

                ?> 
        <?php //} ?>
    </ul>
    <?php
}
?>