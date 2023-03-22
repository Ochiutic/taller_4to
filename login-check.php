
<?php

require_once "config/database.php";

$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: index.php?alert=1");
}else {

	$query = mysqli_query($mysqli, "SELECT * FROM v_usuarios WHERE username='$username' AND password='$password' AND status='activo'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['id_user']   = $data['id_user'];
		$_SESSION['username']  = $data['username'];
		$_SESSION['name_user'] = $data['name_user'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['cod_sucursal'] = $data['cod_sucursal'];
		$_SESSION['descri_sucursal'] = $data['descri_sucursal'];
		$_SESSION['permisos_accesos'] = $data['permisos_accesos'];
	
		 //echo"Existe el usuario sea Benvienido";
		 header("Location: main.php?module=start");

		 //setea cont a 0
		 $query_bloqueo_cero = mysqli_query($mysqli, "UPDATE usuarios SET intentos = 0 
													 WHERE username ='$username'")
													 or die('error 30: '.mysqli_error($mysqli));
	 }else{
		 //header("Location: index.php?alert=1");
 
		 //consultar si el usuario existe
		 $query_existe = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE username ='$username'")
			 or die('error 37: '.mysqli_error($mysqli));
 
		 if($query_existe){ //si el usuario existe
			 $data_existe = mysqli_fetch_assoc($query_existe);
			 $status = $data_existe['status'];
			 $contador_usu = $data_existe['intentos'];
 
			 if($status == 'bloqueado'){
				 //si el usuario esta bloqueado
				 header("Location: index.php?alert=4");
			 } else{
				 
				 //capturar el dato de contador_usu de la BD
				 $contador_usu += 1;
				 $query_suma = mysqli_query($mysqli, "UPDATE usuarios SET intentos = $contador_usu
				 WHERE username ='$username'")
				 or die('error 52: '.mysqli_error($mysqli));
 
				 //volver a consultar el bloqueo
				 $query_consulta = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE username ='$username'")
				 or die('error 57: '.mysqli_error($mysqli));
 
				 if($query_consulta){
					 $data_consulta = mysqli_fetch_assoc($query_consulta);
					 $bloqueo_consulta = $data_consulta['intentos'];
 
					 if($bloqueo_consulta == 3){
 
						 $query_bloqueo = mysqli_query($mysqli, "UPDATE usuarios SET status = 'bloqueado'
																 WHERE username ='$username'")
																 or die('error 66: '.mysqli_error($mysqli));
						 if($query_bloqueo){
							 header("Location: index.php?alert=4");
						 }
					 } else {
						 //si no existe el usuario, alerta 1
						 header("Location: index.php?alert=1");
					 }
				 } else {
					 //si no existe el usuario, alerta 1
					 header("Location: index.php?alert=1");
				 }
			 }
		 } else {
			 //si no existe el usuario, alerta 1
			 header("Location: index.php?alert=1");
		 }
	 }
 }
 
 ?>