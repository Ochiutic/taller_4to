<?php 
    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['username']) && empty($_SESSION['password'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
    }
    else{
        if($_GET['act']=='insert'){
            if(isset($_POST['Guardar'])){
                $codigo = $_POST['codigo']; 
                $descri_materia = $_POST['descri_materia'];
                $tipo_materia = $_POST['tipo_materia'];
                
                $query = mysqli_query($mysqli, "INSERT INTO materia_prima (cod_materia, descri_materia, tipo_materia)
                VALUES ($codigo,'$descri_materia','$tipo_materia')") or die(header("Location: ../../main.php?module=materia_prima&alert=5"));
                if($query){
                    header("Location: ../../main.php?module=materia_prima&alert=1");
                }else{
                    header("Location: ../../main.php?module=materia_prima&alert=4");
                }
            }
        } 
        elseif($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['codigo'])){
                    $codigo = $_POST['codigo']; 
                    $descri_materia = $_POST['descri_materia'];
                    $tipo_materia = $_POST['tipo_materia'];
                    $query = mysqli_query($mysqli, "UPDATE materia_prima SET descri_materia = '$descri_materia',
                                                                            tipo_materia ='$tipo_materia'
                                                                        WHERE cod_materia = $codigo")
                                                                        or die('error 29: '.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=materia_prima&alert=2");
                    }else{
                        header("Location: ../../main.php?module=materia_prima&alert=4");
                    }
                }
            }
        }
        elseif($_GET['act']=='delete'){
            if(isset($_GET['cod_materia'])){
                $codigo = $_GET['cod_materia'];

                $query = mysqli_query($mysqli, "DELETE FROM materia_prima
                                                WHERE cod_materia = $codigo")
                                                or die('error'.mysqli_error($mysqli));
                if($query){
                    header("Location: ../../main.php?module=materia_prima&alert=3");
                }else{
                    header("Location: ../../main.php?module=materia_prima&alert=4");
                }
            }
        }
    }
?>