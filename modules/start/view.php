<?php
      if($_SESSION['permisos_accesos'] == 'Super Admin'){?>
     <section class="content-header">
        <h1>
            <i class="fa fa-home icon-title"></i>Inicio
        </h1>
        <ol class="breadcrumb">
            <li><a href="?module=start"><i class="fa fa-home"></i></a></li>
        </ol>
    </section>
     <section class="content">
     <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="alert alert-info alert-dismissable"  style="color: #8181F7">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <p style="font-size: 15px">
                        <i class="icon fa fa-user"></i>Bienvenido/a <strong><?php echo $_SESSION['name_user']; ?></strong>
                        a la aplicación: <strong>THN Py.</strong> 
                        <p> <strong>Sucursal </strong><?php echo $_SESSION['descri_sucursal']; ?> </p>
                     </p>
                     
             </div>
        </div>
     </div>
     <h2><strong>Formulario de movimiento</strong></h2>
            <!--Fila principal de los bloques-->
            <div class="row">
                <!--Bloque 1 -->
                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #50C473; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Recetas</strong>
                                <ul>
                                    <li>Recetas</li>
                                    <li>de</li>
                                    <li>Produccion</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask"></i>
                        </div>
                            <a href="?module=recetas" class="small-box-footer" title="Ver recetas de poroduccion" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            
                <!--Fin Bloque 1 Recetas-->
                <!--Bloque 3 Stock-->
                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #f39c12; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Presupuestos</strong>
                                <ul>
                                    <li>Presupuestos</li>
                                    <li>de</li>
                                    <li>Produccion</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cc-mastercard"></i>
                        </div>
                            <a href="?module=presupuesto" class="small-box-footer" title="Ver stock de materia prima" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #46777E; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Orden de Produccion</strong>
                                <ul>
                                    <li>Orden</li>
                                    <li>de</li>
                                    <li>Produccion</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-th-list"></i>
                        </div>
                            <a href="?module=orden_produccion" class="small-box-footer" title="Ver orden de Produccion" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #55ADBA; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Pedidos de Material</strong>
                                <ul>
                                    <li>Pedidos</li>
                                    <li>de</li>
                                    <li>Material</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sobre"></i>
                        </div>
                            <a href="?module=pedido_material" class="small-box-footer" title="Ver pedidos de materia prima" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #2A46AC; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Costos de Produccion</strong>
                                <ul>
                                    <li>Costos</li>
                                    <li>de</li>
                                    <li>Produccion</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-usd"></i>
                        </div>
                            <a href="?module=costos" class="small-box-footer" title="Ver Costos de Produccion" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #D02B16; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Control de Calidad</strong>
                                <ul>
                                    <li>Control</li>
                                    <li>de</li>
                                    <li>Calidad</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check-circle"></i>
                        </div>
                            <a href="?module=control" class="small-box-footer" title="Control de Calidad" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>
           </div>
     </section>
     <?php 
      }
      elseif($_SESSION['permisos_accesos'] == 'Supervisor'){?>
       <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>Inicio
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i></a></li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="alert alert-info alert-dismissable"  style="color: #F86A08">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="font-size: 15px">
                            <i class="icon fa fa-user"></i>Bienvenido/a <strong><?php echo $_SESSION['name_user']; ?></strong>
                            a la aplicación: <strong>THN PARAGUAY S.A COMPRAS</strong> 
                            <p> <strong>Sucursal </strong><?php echo $_SESSION['descri_sucursal']; ?> </p>
                        </p>
                    </div>
                </div>
            </div>
            <h2><strong>Formulario de movimiento</strong></h2>
            <!--Fila principal de los bloques-->
            <div class="row">
            

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #46777E; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Presupuesto de Proveedores</strong>
                                <ul>
                                    <li>Presupuesto</li>
                                    <li>de</li>
                                    <li>Proveedores</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="glyphicon glyphicon-th-list"></i>
                        </div>
                            <a href="?module=presu_provee" class="small-box-footer" title="Ver Presupuesto de Proveedores" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                
                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #1B8BB6; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Pedidos de Compra</strong>
                                <ul>
                                    <li>Pedidos </li>
                                    <li>de</li>
                                    <li>Compra</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-ol"></i>
                        </div>
                            <a href="?module=compras" class="small-box-footer" title="Pedido de Compra" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #55ADBA; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Orden de Compra</strong>
                                <ul>
                                    <li>Orden</li>
                                    <li>de</li>
                                    <li>Compra</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-sobre"></i>
                        </div>
                            <a href="?module=orden_compra" class="small-box-footer" title="Ver Ordenes de Compras" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #1B8BB6; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Registrar Compras</strong>
                                <ul>
                                    <li>Registrar </li>
                                    <li>y generar IVA de</li>
                                    <li>Compras</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-ol"></i>
                        </div>
                            <a href="?module=registrar_compras" class="small-box-footer" title="Registrar Compras" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>


                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #D02B16; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Control de Calidad</strong>
                                <ul>
                                    <li>Control</li>
                                    <li>de</li>
                                    <li>Calidad</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-check-circle"></i>
                        </div>
                            <a href="?module=control" class="small-box-footer" title="Control de Calidad" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                
    
            </div>
        </section>
    <?php 
    } 
    elseif($_SESSION['permisos_accesos'] == 'Leader'){?>
     <section class="content-header">
            <h1>
                <i class="fa fa-home icon-title"></i>Inicio
            </h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i></a></li>
            </ol>
      </section>
      <section class="content">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    <div class="alert alert-info alert-dismissable"  style="color: #F86A08">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <p style="font-size: 15px">
                            <i class="icon fa fa-user"></i>Bienvenido/a <strong><?php echo $_SESSION['name_user']; ?></strong>
                            a la aplicación: <strong>SysWeb</strong> 
                            <p> <strong>Sucursal </strong><?php echo $_SESSION['descri_sucursal']; ?> </p>
                        </p>
                    </div>
                </div>
            </div>
            
                <!--Fin Bloque 3 Stock-->
    
                <div class="col-lg-4 col-xs-6">
                    <div style="background-color: #1B8BB6; color: #fff" class="small-box">
                        <div class="inner">
                            <p><strong>Pedidos de Cliente</strong>
                                <ul>
                                    <li>Pedidos </li>
                                    <li>de</li>
                                    <li>Cliente</li>
                                </ul>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list-ol"></i>
                        </div>
                            <a href="?module=pedidos" class="small-box-footer" title="Control de Calidad" data-toggle="tooltip">
                            <i class="fa fa-plus"></i></a>
                    </div>
                </div>


                
        </section>      


            <?php }
            ?>