<?php
require_once "../../config/database.php";

$query = mysqli_query($mysqli, "SELECT * FROM usuarios")
    or die('Error'.mysqli_error($mysqli));
$count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Usuarios</title>
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
                        <th height="30" align="center" valign="middle"><small>Id Usuario</small></th>
                        <th height="30" align="center" valign="middle"><small>Nombre de Usuario</small></th>
                        <th height="30" align="center" valign="middle"><small>Nombre y Apellido</small></th>
                        <th height="30" align="center" valign="middle"><small>Permisos de Acceso</small></th>
                        <th height="30" align="center" valign="middle"><small>Status</small></th>
                        

                
            
                    </tr>
                </thead>
                <tbody>
                    <?php
                     
                     while($data = mysqli_fetch_assoc($query)){
                        $id_user = $data['id_user'];
                        $username = $data['username'];
                        $name_user = $data['name_user'];
                        $permisos_accesos = $data['permisos_accesos'];
                        $status = $data['status'];
                        


                        echo "<tr>
                        <td width='100' align='center'>$id_user</td>
                        <td width='200' align='left'>$username</td>
                        <td width='100' align='center'>$name_user</td>
                        <td width='200' align='left'>$permisos_accesos</td>
                        <td width='100' align='center'>$status</td>
                        
                       
                       
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



