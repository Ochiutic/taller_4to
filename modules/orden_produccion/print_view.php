<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_orden'])){
            $codigo = $_GET['cod_orden'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_orden
                                                        WHERE cod_orden = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                                    $cod= $data['cod_orden'];
                                    $descri_orden = $data['descri_orden'];
                                    $descri_pedi = $data['descri_pedi'];
                                    $fecha = $data['fecha'];
                                    $hora = $data['hora'];
                                    $estado_ = $data['estado_'];
            }
        }
         //Detal|le de Orden
         $detalle_orden = mysqli_query($mysqli, "SELECT *FROM v_detalle_orden WHERE cod_orden= $codigo")
         or die('error'.mysqli_error($mysqli));                                          
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Orden Produccion</title>
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
            <label><strong>Codigo de Orden :</strong><?php echo $cod; ?></label><br> 
            <label><strong>Descripcion de la Orden :</strong><?php echo $descri_orden; ?></label><br>
            <label><strong>Descripcion del Pedido :</strong><?php echo $descri_pedi; ?></label><br>
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora de Emisión :</strong><?php echo $hora; ?></label><br>            
            <label><strong>Estado de la Orden :</strong><?php echo $estado_; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Descripción del Producto</small></th>
                        <th height="30" align="center" valign="middle"><small>Orden de Produccion</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_orden)){
                        $codigo1= $data2['cod_producto'];
                        $descrip_producto= $data2['descrip_producto'];
                        $part_number = $data2['part_number'];
                        $cantidad = $data2['cantidad'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='400' align='left'>$descrip_producto</td>
                                    <td width='100' align='center'>$part_number</td>
                                    <td width='150' align='center'>$cantidad</td>
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