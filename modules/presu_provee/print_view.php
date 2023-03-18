<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['presu_cod'])){
            $codigo = $_GET['presu_cod'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_presu
                                                        WHERE presu_cod = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                $cod = $data['presu_cod'];
                $presu_decri = $data['presu_decri'];
                $presu_fecha = $data['presu_fecha'];
                $estado = $data['estado'];
                $name_user = $data['name_user'];
                $sucursal = $data['cod_sucursal'];
                $ped_cod = $data['descrip_com'];
            }
        }
         //Detal|le de Orden
         $detalle_presu = mysqli_query($mysqli, "SELECT * FROM v_det_presu WHERE presu_cod = $codigo")
         or die('error'.mysqli_error($mysqli));                                          
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">  
        <title>Reporte Pedidos de Cliente</title>
    </head>
    <body>
        <div style="border: solid">
        <div align='center'>
            <strong>THN PARAGUAY S.A.</strong> <br>
            <strong>Timbrado: </strong> 12345678  <br>
            <strong>Fecha Inicio Vigencia: </strong> 10/07/2022 <br>
            <strong>Fecha Fin Vigencia: </strong> 10/0/2022  <br>
            <strong>RUC: </strong> 80015246-5  <br>
            <strong>FACTURA </strong> <br>
        </div>
        <div style="border: solid">
            <label><strong>Numero de Pedido :</strong><?php echo $cod; ?></label><br> 
            <label><strong>Descripcion del Presupuesto: </strong><?php echo $presu_decri; ?></label><br>
            <label><strong>Fecha Emision: </strong><?php echo $presu_fecha; ?></label><br>
            <label><strong>Estado: </strong><?php echo $estado; ?></label><br>
            <label><strong>Usuario: </strong><?php echo $name_user; ?></label><br>
            <label><strong>Sucursal :</strong><?php echo $sucursal; ?></label><br>            
            <label><strong>Pedido de Compra :</strong><?php echo $ped_cod; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Descripcion de Materia</small></th>
                        <th height="30" align="center" valign="middle"><small>Tipo de Materia</small></th>
                        <th height="30" align="center" valign="middle"><small>Proveedor</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_presu)){
                        $codigo1= $data2['presu_cod'];
                        $descrip_materia= $data2['descri_materia'];
                        $tipo= $data2['tipo_materia'];
                        $prov= $data2['prv_razsoc'];
                        $cantidad = $data2['cantidad'];
                        $precio = $data2['precio'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='100' align='left'>$descrip_materia</td>
                                    <td width='100' align='center'>$tipo</td>
                                    <td width='100' align='center'>$prov</td>
                                    <td width='100' align='center'>$cantidad</td>
                                    <td width='100' align='center'>$precio</td>
                                </tr>";
                        }
                    ?> 
                    
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid" align="center">
            <label><strong>www.thnparaguay.com.py</strong></label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>info@thnparaguay.com.py</strong></label>         
        </div>
        <div style="border: solid" align="left">
            <label><strong>Casa Central: </strong> Itaugua c/ Patiño</label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>info@thnparaguay.com.py</strong></label>         
        </div>
        </div>
    </body>
</html>