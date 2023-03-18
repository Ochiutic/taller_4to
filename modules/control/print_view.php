<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_calidad'])){
            $codigo = $_GET['cod_calidad'];
            //Cabecera de Venta
            $cabecera_orden = mysqli_query($mysqli, "SELECT * FROM v_control_calidad
                                                        WHERE cod_calidad = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_orden)){
                $cod= $data['cod_calidad'];
                $descri_calidad = $data['descri_calidad'];
                $descri_orden = $data['descri_orden'];
                $nombre = $data['nombre'];
                $numero_legajo = $data['numero_legajo'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $estado = $data['estado'];
            }
        }
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
        <div style="border: solid">
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora de Emisión :</strong><?php echo $hora; ?></label><br>            
            <label><strong>Estado de la Orden :</strong><?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Observacion de Calidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Descrip. de la Orden Anulada</small></th>
                        <th height="30" align="center" valign="middle"><small>Nombre del Operario/a.</small></th>
                        <th height="30" align="center" valign="middle"><small>N° de Legajo</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       
                       echo "<tr>
                       <td width='80' align='center'>$cod</td>
                       <td width='200' align='left'>$descri_calidad</td>
                       <td width='100' align='center'>$descri_orden</td>
                       <td width='100' align='center'>$nombre</td>
                       <td width='100' align='center'>$numero_legajo</td>
                       
                      
                       </tr>";

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