<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_pmat'])){
            $codigo = $_GET['cod_pmat'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_detalle_mat
                                                        WHERE cod_pmat = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                $cod = $data['cod_pmat'];
                $descri_presu = $data['descri_presu'];
                $descri_mat = $data['descri_pmat'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_pmat = mysqli_query($mysqli, "SELECT *FROM v_detalle_material WHERE cod_pmat= $codigo")
         or die('error'.mysqli_error($mysqli));                                          
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte Pedido de Material</title>
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
            <label><strong>Presupuestos Aprobados :</strong><?php echo $descri_presu; ?></label><br>
            <label><strong>Especificacion de Material :</strong><?php echo $descri_mat; ?></label><br>
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora de Emisión :</strong><?php echo $hora; ?></label><br>            
            <label><strong>Estado del Pedido :</strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Descripción del Material</small></th>
                        <th height="30" align="center" valign="middle"><small>Tipo de Material</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_pmat)){
                        $codigo1= $data2['cod_materia'];
                        $descri_materia= $data2['descri_materia'];
                        $tipo_materia = $data2['tipo_materia'];
                        $cantidad = $data2['cantidad'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='150' align='left'>$descri_materia</td>
                                    <td width='150' align='center'>$tipo_materia</td>
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