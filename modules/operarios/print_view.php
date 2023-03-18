<?php
require_once "../../config/database.php";

$query = mysqli_query($mysqli, "SELECT * FROM v_operarios")
    or die('Error'.mysqli_error($mysqli));
$count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Operarios.</title>
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
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#3A7EAE">
                    <tr class="tabla-title" style="background: #3A7EAE">
                        <th height="30" align="center" valign="middle"><small>N° de Operario</small></th>
                        <th height="30" align="center" valign="middle"><small>Nombres</small></th>
                        <th height="30" align="center" valign="middle"><small>Apellidos</small></th>
                        <th height="30" align="center" valign="middle"><small>CI</small></th>
                        <th height="30" align="center" valign="middle"><small>Numero de Legajo</small></th>
                        <th height="30" align="center" valign="middle"><small>Sector de Trabajo</small></th>
                
            
                    </tr>
                </thead>
                <tbody>
                    <?php
                     
                     while($data = mysqli_fetch_assoc($query)){
                               $id_operario = $data['id_operario'];
                               $nombre= $data['nombre'];
                               $apellido= $data['apellido'];
                               $ci= $data['ci'];
                               $numero_legajo= $data['numero_legajo'];
                               $sector= $data['descrip_sector'];
                        


                        echo "<tr>
                        <td width='100' align='center'>$id_operario</td>
                        <td width='200' align='left'>$nombre</td>
                        <td width='100' align='center'>$apellido</td>
                        <td width='100' align='left'>$ci</td>
                        <td width='100' align='center'>$numero_legajo</td>
                        <td width='100' align='center'>$sector</td>
                        
                       
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <div style="border: solid" align="left">
            <label><strong>www.thnparaguay.com.py</strong></label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label align="right= 50"><strong>thnparaguayinfo@gmail.com.py</strong></label>         
        </div>
        <div style="border: solid" align="left">
            <label><strong>Casa Central: </strong> Av. Patiño Barrio Cañadita/ Itaugua </label>  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <label><strong>thnparaguayinfo@gmail.com.py</strong></label>         
        </div>
    </div>
    </body>
</html>



