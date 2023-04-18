<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['ped_cod'])){
            $codigo = $_GET['ped_cod'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_registro
                                                        WHERE ped_cod = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                               $cod = $data['ped_cod'];
                               $ped_descri = $data['ped_descri'];
                               $ped_fecha = $data['ped_fecha'];
                               $id_user = $data['id_user'];
                               $ord_cod= $data['ord_descrip'];
                               $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_pmat = mysqli_query($mysqli, "SELECT *FROM v_detalle_registro WHERE ped_cod= $codigo")
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
        <div align="right= 50">
            <img src="../../images/apple-icon-72x72.png">
    </div>
        <div align='center'>
            <strong>THN PARAGUAY S.A.</strong> <br>
            <strong>Timbrado: </strong> 12345678  <br>
            <strong>Fecha Inicio Vigencia: </strong> 10/07/2022 <br>
            <strong>Fecha Fin Vigencia: </strong> 10/0/2022  <br>
            <strong>RUC: </strong> 80015246-5  <br>
            <strong>FACTURA </strong> <br>
        </div>
        <div align= 'center' style="border: solid">
            <label><strong>Codigo de Registro :</strong><?php echo $cod; ?></label><br> 
            <label><strong>Descripcion de Registro :</strong><?php echo $ped_descri; ?></label><br>
            <label><strong>Pedido de Fecha :</strong><?php echo $ped_fecha; ?></label><br>    
            <label><strong>Usuario :</strong><?php echo $id_user; ?></label><br>
            <label><strong>Orden de compra Aprob.: </strong><?php echo $ord_cod; ?></label><br>            
            <label><strong>Estado del Pedido :</strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Presupuesto de Compra</small></th>
                        <th height="30" align="center" valign="middle"><small>IVA</small></th>
                        <th height="30" align="center" valign="middle"><small>Proveedor de Materia</small></th>
                        <th height="30" align="center" valign="middle"><small>Toral IVA</small></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_pmat)){
                        $codigo1= $data2['ped_cod'];      
                        $presu_cod = $data2['precio'];
                        $iva = $data2['iva'];
                        $prv_cod= $data2['prv_razsoc'];
                        $total= $data2['total_iva'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='150' align='left'>$presu_cod</td>
                                    <td width='150' align='center'>$iva</td>
                                    <td width='150' align='center'>$prv_cod</td>
                                    <td width='150' align='center'>$total</td>
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