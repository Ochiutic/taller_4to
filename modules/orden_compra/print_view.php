<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['ord_cod'])){
            $codigo = $_GET['ord_cod'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_compra2
                                                        WHERE ord_cod = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                $cod = $data['ord_cod'];
                               $descri_comp = $data['ord_descrip'];
                               $fecha = $data['ord_fecha'];
                               $presu = $data['presu_decri'];
                               $name_user = $data['name_user'];
                               $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_pmat = mysqli_query($mysqli, "SELECT *FROM v_detalle_com WHERE ord_cod= $codigo")
         or die('error'.mysqli_error($mysqli));                                          
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte Orden de Compra.</title>
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
            <label><strong>Codigo de Pedido :</strong><?php echo $cod; ?></label><br> 
            <label><strong>Orden de Compra :</strong><?php echo $descri_comp; ?></label><br>
            <label><strong>Presupuestos Aprobados :</strong><?php echo $presu; ?></label><br>    
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>
            <label><strong>Usuario: </strong><?php echo $name_user; ?></label><br>            
            <label><strong>Estado del Pedido :</strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Razon Social</small></th>
                        <th height="30" align="center" valign="middle"><small>Proveedor</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio Compra</small></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_pmat)){
                        $codigo1= $data2['ord_cod'];      
                        $cliente = $data2['descrip_razon'];
                        $proveedor = $data2['prv_razsoc'];
                        $precio= $data2['precio'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='150' align='left'>$cliente</td>
                                    <td width='150' align='center'>$proveedor</td>
                                    <td width='150' align='center'>$precio</td>
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