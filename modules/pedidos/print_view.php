<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_pedi'])){
            $codigo = $_GET['cod_pedi'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_pedidos
                                                        WHERE cod_pedi = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                $cod = $data['cod_pedi'];
                $descri_pedi = $data['descri_pedi'];
                $nom_cli = $data['nom_cli'];
                $name_user = $data['name_user'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_pedido = mysqli_query($mysqli, "SELECT * FROM v_det_pedi_cli WHERE cod_pedi = $codigo")
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
            <label><strong>Pedido a Producir :</strong><?php echo $descri_pedi; ?></label><br>
            <label><strong>Cliente :</strong><?php echo $nom_cli; ?></label><br>
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora :</strong><?php echo $hora; ?></label><br>
            <label><strong>Usuario :</strong><?php echo $name_user; ?></label><br>            
            <label><strong>Estado de la Orden :</strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Producto</small></th>
                        <th height="30" align="center" valign="middle"><small>Part Number</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_pedido)){
                        $codigo1= $data2['cod_pedi'];
                        $descrip_producto= $data2['descrip_producto'];
                        $part_number= $data2['part_number'];
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