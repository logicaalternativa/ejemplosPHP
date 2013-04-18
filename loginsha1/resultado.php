<?
/*
 *      resultado.php
 *      
 *      Copyright 2013 Miguel Rafael Esteban Martín <miguel.esteban@logicaalternativa.com>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

	session_start();
	
	require_once './lib/accesodummy.class.php';
	
	$usuario = $_REQUEST[ 'usu'];
	$token = $_REQUEST['token'];
	
	$tokenSesion = $_SESSION['tokenSesion'];	
	$_SESSION['tokenSesion'] = null;
	
	
	// Usuarios	
	$claseAcceso = new AccesoDummy();
	
	// Se obtiene la contraseña del usuario
	$contra = $claseAcceso->dameContrasena( $usuario );
	
	// Se calcula el token
	$tokenCalculado = sha1( $tokenSesion.$contra );	
	
	$texto='';
	
	if ( isset( $contra )  &&
				$token == $tokenCalculado ){
		
		$texto = 'Acceso correcto';		
		session_destroy();
		session_start();
		// Aquí se hace lo necesario obtener las propiedades del usuario y cargarlo en sesión
		
		
	}else {
		$texto = '<font color="#ff0000">Acceso incorrecto</font>';
		
	}
	
	
?>
<html>
<head>
<title>[LogicaAlternativa.com] Ejemplo de securización acceso sha1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
	<div align="center">
		<p>[LogicaAlternativa.com] Ejemplo de securización acceso sha1</p>  
	</div>

	<div align="center">
	<br>
	  <h2><?= $texto ?></h2>  
	<h3>Datos que llegan del formulario</h3>
	  <p>Usuario: <em><?= $usuario ?></em></p>
	  <p>Token: <em><?= $token ?></em></p>
	  <p>Contraseña: <em><?= $_REQUEST['contra'] ?></em></p> 
	  <p><a href= "index.php">volver</a></p>
	</div>
</body>
</html>
