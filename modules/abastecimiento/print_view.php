<?php 
    require_once '../../config/database.php';
    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_abastecimiento'])){
            $cod = $_GET['cod_abastecimiento'];
            //Cabecera de abastecimiento
            $cabecera_abastecimiento = mysqli_query($mysqli, "SELECT * FROM v_abastecimiento
                                                        WHERE cod_abastecimiento = $cod")
                                                        or die('error'.mysqli_error($mysqli));
            while($data = mysqli_fetch_assoc($cabecera_abastecimiento)){
                $codigo = $data['cod_abastecimiento'];
                $fecha = $data['fecha'];
                $hora = $data['hora'];
                $estado = $data['estado'];
                $usuarios = $data['name_user'];
            }
            //Detalle de abastecimiento
            $cabecera_abastecimiento = mysqli_query($mysqli, "SELECT * FROM v_abastecimiento WHERE cod_abastecimiento = $cod")
                                                                            or die('error'.mysqli_error($mysqli));
            
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Factura de Abastecimiento</title>
    </head>
    <body>
        <div align='center'>
            Registro de Factura de Abastecimiento <br>
            <label><strong>Codigo:</strong><?php echo $cod; ?></label><br>
            <label><strong>Fecha</strong><?php echo $fecha; ?></label><br>
            <label><strong>Hora:</strong><?php echo $hora; ?></label><br>
            <label><strong>Estado:</strong><?php echo $estado; ?></label><br>
            <label><strong>Usuario:</strong><?php echo $usuarios; ?></label>
        </div>
        
        <div>
            <table width="100%" border="0.3" cellpaddign="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="tabla-title">
                        <th height="20" align="center" valign="middle"><small>Descripcion</small></th>
                        <th height="20" align="center" valign="middle"><small>Tipo de Materia:</small></th>
                        <th height="20" align="center" valign="middle"><small>Cantidad</small></th>
                    </tr>
                </thead>
            </table>
        </div>
      
    </body>
</html>