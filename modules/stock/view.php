<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=stock">
                Stock
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Stock de Materia Prima
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!------------------------------------------->
            <div class="box box-primary">
                    <div class="box-body">
                        <!------------------------------------------->
                        <form role="form" class="form-horizontal" method="POST">
                            <div class="form-group">
                            <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-social btn-submit" style="width:170px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Stock General
                                        <?php 

                                            $query_val = mysqli_query($mysqli, "SELECT * FROM v_stock1
                                                                                ORDER BY cod_materia ASC") or die ('Error'.mysqli_error($mysqli));

                                        ?>
                                    </button>
                                </div>
                            </div>
                            <!------------------------------------------->
                            <div class="form-group">
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="codigo_materia" data-placeholder= "-- Seleccionar  Materia --"
                                    autocomplete="off">
                                        <option value=""></option>
                                        <?php 
                                            $query_dep = mysqli_query($mysqli, "SELECT cod_materia, descri_materia, tipo_materia
                                                                                FROM materia_prima
                                                                                ORDER BY cod_materia ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_mat = mysqli_fetch_assoc($query_dep)){

                                                echo "<option value=\"$data_mat[cod_materia]\">$data_mat[cod_materia] | $data_mat[descri_materia] | $data_mat[tipo_materia]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!------------------------------------------->
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary btn-social btn-submit" style="width:170px">
                                        <i class="fa fa-file-text-o icon-title"></i>
                                        Buscar Materia
                                    </button>
                                </div>
                                <?php 
                                    if(!empty($_POST['codigo_materia'])){
                                        $codigo_materia = $_POST['codigo_materia'];
                                        $query_val = mysqli_query($mysqli, "SELECT * FROM v_stock1 WHERE cod_materia = $codigo_materia
                                                                            ORDER BY cod_materia ASC") or die ('Error'.mysqli_error($mysqli));
            
                                    }
                                ?>
                    
                            </div>

                        </form>
                        <!------------------------------------------->
                    <section class="content-header">
                        
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">

                        <!------------------------------------------->
                        <h2>Stock de Materia Prima</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                 <th class="center">Codigo</th>
                                 <th class="center">Deposito</th>
                                <th class="center">Materia Prima</th>
                                <th class="center">Tipo de Materia Prima</th>
                                <th class="center">Cantidad</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                if(isset($codigo_materia)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_stock1 WHERE cod_materia = $codigo_materia
                                    ORDER BY cod_materia ASC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else if(isset($cod_deposito)){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_stock1 WHERE cod_deposito = $cod_deposito;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_stock1 ;")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod_materia = $data ['cod_materia'];
                                    $cod_deposito = $data ['descripcion'];
                                    $d_materia = $data ['descri_materia'];
                                    $t_d_materia = $data ['tipo_materia'];
                                    $cantidad = $data ['cantidad'];


                                    echo "<tr>
                                            <td class='center'>$cod_materia</td>
                                            <td class='center'>$cod_deposito    </td>
                                            <td class='center'>$d_materia</td>
                                            <td class='center'>$t_d_materia</td>
                                            <td class='center'>$cantidad</td>
                                            <td class='center' width='80'>
                                            </tr>
                                                
                                            ";
                                
                                }
                            ?>
                        </tbody>
                        <!------------------------------------------->
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>