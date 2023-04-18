<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_costos'])){
            $codigo = $_GET['cod_costos'];
            //Cabecera de Venta
            $cabecera_costos = mysqli_query($mysqli, "SELECT * FROM costos
                                                        WHERE cod_costos = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_costos)){
                $cod= $data['cod_costos'];
                $descri_costos = $data['descri_costos'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $total = $data['total'];
                $estado = $data['estado'];
            }
        }
         //Detal|le de Orden
         $detalle_costos = mysqli_query($mysqli, "SELECT *FROM v_det_costo_orden WHERE cod_costos= $codigo")
         or die('error'.mysqli_error($mysqli));    
         
         //Detal|le de Material
         $detalle_material = mysqli_query($mysqli, "SELECT *FROM v_det_costo_material WHERE cod_costos= $codigo")
         or die('error'.mysqli_error($mysqli)); 

         //Detal|le de Recetas
         $detalle_recetas = mysqli_query($mysqli, "SELECT *FROM v_det_costo_recetas WHERE cod_recetas= $codigo")
         or die('error'.mysqli_error($mysqli));

         //Detal|le de Operarios
         $detalle_operario = mysqli_query($mysqli, "SELECT *FROM v_det_costo_salario WHERE cod_sector= $codigo")
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
            <label><strong>Descripcion del Costo de Produccion: </strong> <?php echo $descri_costos; ?></label><br>
            <label><strong>Fecha Emisión :</strong> <?php echo $fecha; ?></label><br>
            <label><strong>Hora de Emisión :</strong> <?php echo $hora; ?></label><br>
            <label><strong>Total de Costo Produccion:</strong> <?php echo $total; ?></label><br>            
            <label><strong>Estado de la Orden :</strong> <?php echo $estado; ?></label><br>
        </div>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Orden a Costear</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                        <th height="30" align="center" valign="middle"><small>Total de Orden.</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_costos)){
                            $cod_costos=$data2['cod_costos'];
                            $descri_orden=$data2['descri_orden'];
                            $cantidad=$data2['cantidad'];
                            $precio=$data2['precio_orden'];
                            $suma_total1=$data2['total_orden'];
                            echo "<tr>
                                    <td width='80' align='center'>$cod_costos</td>
                                    <td width='150' align='left'>$descri_orden</td>
                                    <td width='80' align='center'>$cantidad</td>
                                    <td width='150' align='center'>$precio</td>
                                    <td width='150' align='center'>$suma_total1</td>
                                </tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Pedido de Materia a Costear</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                        <th height="30" align="center" valign="middle"><small>Total de Materia.</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data3 = mysqli_fetch_assoc($detalle_material)){
                            $cod_costos=$data3['cod_costos'];
                            $descri_pmat=$data3['descri_pmat'];
                            $cantidad_=$data3['cantidad_materia'];
                            $precio_=$data3['precio_materia'];
                            $suma_total2=$data3['total'];
                            echo "<tr>
                                    <td width='80' align='center'>$cod_costos</td>
                                    <td width='150' align='left'>$descri_pmat</td>
                                    <td width='80' align='center'>$cantidad_</td>
                                    <td width='150' align='center'>$precio_</td>
                                    <td width='150' align='center'>$suma_total2</td>
                                </tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Receta de Produccion a Costear</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                        <th height="30" align="center" valign="middle"><small>Total de Recetas.</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data4= mysqli_fetch_assoc($detalle_recetas)){
                            $cod_recetas=$data4['cod_recetas'];
                            $descri_=$data4['tipo_receta'];
                            $cantidad_recetas=$data4['cantidad_receta'];
                            $precio_receta=$data4['precio_receta'];
                            $suma_total3=$data4['total_receta'];
                            echo "<tr>
                                    <td width='80' align='center'>$cod_costos</td>
                                    <td width='150' align='left'>$descri_pmat</td>
                                    <td width='80' align='center'>$cantidad_recetas</td>
                                    <td width='150' align='center'>$precio_receta</td>
                                    <td width='150' align='center'>$suma_total3</td>
                                </tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid">  </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>CODIGO</small></th>
                        <th height="30" align="center" valign="middle"><small>Sector de Trabajo Costear</small></th>
                        <th height="30" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>
                        <th height="30" align="center" valign="middle"><small>Total de Salario.</small></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data5= mysqli_fetch_assoc($detalle_operario)){
                            $cod_sector=$data5['cod_sector'];
                            $sectores=$data5['descrip_sector'];
                            $cantidad_sector=$data5['cantidad_sector'];
                            $precio_salario=$data5['precio_salario'];
                            $suma_total4=$data5['total_salario'];
                            echo "<tr>
                                    <td width='80' align='center'>$cod_sector</td>
                                    <td width='150' align='left'>$sectores</td>
                                    <td width='80' align='center'>$cantidad_sector</td>
                                    <td width='150' align='center'>$precio_salario</td>
                                    <td width='150' align='center'>$suma_total4</td>
                                </tr>";
                        }
                    ?>
                    
                </tbody>
            </table>
        </div>
        <div style="border: solid" align="center">
            <label><strong>www.thnparaguay.com.py</strong></label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>info@thnparaguay.com.py</strong></label>         
        </div>
        <div style="border: solid" align="left">
            <label><strong>Casa Central: </strong> Itaugua c/ Patiño</label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>info@thnparaguay.com.py</strong></label>         
        </div>
        </div>
    </body>
</html>