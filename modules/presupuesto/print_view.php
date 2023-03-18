<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_presu'])){
            $codigo = $_GET['cod_presu'];
            //Cabecera de Venta
            $cabecera_presupuesto = mysqli_query($mysqli, "SELECT * FROM presupuesto
                                                        WHERE cod_presu = $codigo")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_presupuesto)){
                $cod = $data['cod_presu'];
                $descri_presu = $data['descri_presu'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $estado = 'aprobado';

            }                                                               
        }
          //Detal|le de Orden
          $detalle_presu = mysqli_query($mysqli, "SELECT * FROM v_det_presupuesto WHERE cod_presu = $codigo")
          or die('error'.mysqli_error($mysqli));  
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Factura de Presupuesto a Clientes</title>
    </head>
    <body>
    
    <div style="border: solid">
    <div align="right= 50">
            <img src="../../images/apple-icon-72x72.png">
    </div>
        <div align='center'>
            <strong>THN PARAGUAY S.A.</strong>  <br>
            <strong>Timbrado: </strong> 12345678  <br>
            <strong>Fecha Inicio Vigencia: </strong> 10/07/2022 <br>
            <strong>Fecha Fin Vigencia: </strong> 10/0/2022  <br>
            <strong>RUC: </strong> 80015246-5  <br>
            <strong>FACTURA </strong> <br>
        </div>
        <div style="border: solid">                
        </div>
        <div style="border: solid">
             <label><strong>N° de Presupuesto :</strong><?php echo $cod; ?></label><br> 
             <label><strong>Descripcion del Presupuesto  :</strong><?php echo $descri_presu; ?></label><br> 
            <label><strong>Fecha Emisión :</strong><?php echo $fecha; ?></label><br>             
            <label><strong>Hora de Emision </strong><?php echo $hora; ?> </label><br>
            <label><strong>Estado :</strong><?php echo $estado; ?></label><br> 
        </div>
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>N° de Presupuesto</small></th>
                        <th height="30" align="center" valign="middle"><small>Pedido del Cliente</small></th>
                        <th height="30" align="center" valign="middle"><small>Precio</small></th>

                    </tr>
                </thead>
                <tbody>
                <?php
                       while($data2 = mysqli_fetch_assoc($detalle_presu)){
                        $codigo1= $data2['cod_presu'];
                        $descri= $data2['descri_pedi'];
                        $precio = $data2['precio'];
                            echo "<tr>
                                    <td width='80' align='center'>$codigo1</td>
                                    <td width='100' align='left'>$descri</td>
                                    <td width='200' align='center'>$precio</td>
                                </tr>";
                        }
                    ?> 
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid" align="center">
            <label><strong>www.thnparaguay.com.py</strong></label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>thnparaguayinfo@gmail.com.py</strong></label>         
        </div>
        <div style="border: solid" align="left">
            <label><strong>Casa Central: </strong> Av. Patiño Barrio Cañadita/ Itaugua </label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>thnparaguayinfo@gmail.com.py</strong></label>         
        </div>
    </div>
    </body>
</html>



