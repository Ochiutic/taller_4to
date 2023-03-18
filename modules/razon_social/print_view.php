<?php
require_once "../../config/database.php";

$query = mysqli_query($mysqli, "SELECT * FROM razon_social")
    or die('Error'.mysqli_error($mysqli));
$count = mysqli_num_rows($query);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Factura de Clientes</title>
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
                <thead style="background:#e8ecee">
                    <tr class="tabla-title" style="background: #22AF2F">
                        <th height="30" align="center" valign="middle"><small>N° de Cliente</small></th>
                        <th height="30" align="center" valign="middle"><small>Razon Social</small></th>
                        <th height="30" align="center" valign="middle"><small>Nombre de Cliente</small></th>
                        <th height="30" align="center" valign="middle"><small>Ci o Ruc</small></th>

                
            
                    </tr>
                </thead>
                <tbody>
                    <?php
                     
                     while($data = mysqli_fetch_assoc($query)){
                        $cod_razon = $data['cod_razon'];
                        $descrip_razon = $data['descrip_razon'];
                        $nom_cli = $data['nom_cli'];
                        $ci_ruc = $data['ci_ruc'];


                        echo "<tr>
                        <td width='100' align='center'>$cod_razon</td>
                        <td width='200' align='left'>$descrip_razon</td>
                        <td width='200' align='center'>$nom_cli</td>
                        <td width='150' align='center'>$ci_ruc</td>
                       
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



