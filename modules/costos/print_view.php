<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_costos'])){
            $codigo = $_GET['cod_costos'];
            //Cabecera de Venta
            $cabecera_costos = mysqli_query($mysqli, "SELECT * FROM v_costos
                                                        WHERE cod_costos = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_costos)){
                                                $cod= $data['cod_costos'];
                                                $descri_orden = $data['descri_orden'];
                                                $descri_pmat = $data['descri_pmat'];
                                                $fecha = $data['fecha'];
                                                $hora = $data['hora'];
                                                $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_costos = mysqli_query($mysqli, "SELECT *FROM v_detalle_costos WHERE cod_costos= $codigo")
         or die('error'.mysqli_error($mysqli));                                          
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Costos de Produccion</title>
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
            <label><strong>Codigo de Costos de Produccion :</strong> <?php echo $cod; ?></label><br> 
            <label><strong>Descripcion de la Orden :</strong> <?php echo $descri_orden; ?></label><br>
            <label><strong>Descripcion del Pedido de Material :</strong> <?php echo $descri_pmat; ?></label><br>
            <label><strong>Fecha Emisión :</strong> <?php echo $fecha; ?></label><br>
            <label><strong>Hora de Emisión :</strong> <?php echo $hora; ?></label><br>            
            <label><strong>Estado de la Orden :</strong> <?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Descripción de Manufactura</small></th>
                        <th height="30" align="center" valign="middle"><small>Tipo de Manufactura</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                        <th height="30" align="center" valign="middle"><small>Total de Costos.</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_costos)){
                            $cod_manu=$data2['cod_manu'];
                            $descri_manu=$data2['descri_manu'];
                            $tipo_manu=$data2['tipo_manu'];
                            $cantidad=$data2['cantidad'];
                            $precio=$data2['precio'];
                            $suma_total=$data2['total'];
                            echo "<tr>
                                    <td width='80' align='center'>$cod_manu</td>
                                    <td width='150' align='left'>$descri_manu</td>
                                    <td width='100' align='center'>$tipo_manu</td>
                                    <td width='80' align='center'>$cantidad</td>
                                    <td width='150' align='center'>$precio</td>
                                    <td width='150' align='center'>$suma_total</td>
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