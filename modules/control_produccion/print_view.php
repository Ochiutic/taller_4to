<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_control'])){
            $codigo = $_GET['cod_control'];
            //Cabecera de Venta
            $cabecera_control = mysqli_query($mysqli, " SELECT * FROM v_control_produc
                                                        WHERE cod_control = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_control)){
                $cod= $data['cod_control'];
                                    $descri_produc = $data['descri_produc'];
                                    $fecha = $data['fecha'];
                                    $hora = $data['hora'];
                                    $descri_orden = $data['descri_orden'];
                                    $nombre = $data['nombre'];
                                    $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_compra = mysqli_query($mysqli, "SELECT * FROM detalle_control_produc WHERE cod_control = $codigo")
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
            <label><strong>Codigo de Control de Produccion: </strong><?php echo $cod; ?></label><br> 
            <label><strong>Descripcion de la Produccion: </strong><?php echo $descri_produc; ?></label><br>
            <label><strong>Fecha Emisión: </strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora: </strong><?php echo $hora; ?></label><br>
            <label><strong>Orden de Produccion Aprobada: </strong><?php echo $descri_orden; ?></label><br>   
            <label><strong>Operaria a Control: </strong><?php echo $nombre; ?></label><br>         
            <label><strong>Estado de la Orden: </strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>N° de Control</small></th>
                        <th height="30" align="center" valign="middle"><small>Materia Prima</small></th>
                        <th height="30" align="center" valign="middle"><small>Tipo de Materia Prima</small></th>
                        <th height="30" align="center" valign="middle"><small>Etapas de Produccion</small></th>
                        <th height="30" align="center" valign="middle"><small>Observacion</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_compra)){
                        $codigo1= $data2['cod_control'];
                        $descri_materia= $data2['descri_materia'];
                        $tipo_materia= $data2['tipo_materia'];
                        $etapas = $data2['descri_etapas'];
                        $obs = $data2['observacion'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='120' align='left'>$descri_materia</td>
                                    <td width='120' align='center'>$tipo_materia</td>
                                    <td width='120' align='center'>$etapas</td>
                                    <td width='150' align='center'>$obs</td>
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