<?

/*
 *      accesodummy.class.php
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



	class AccesoDummy {
		
		var $contraUsuarios;
		
		function AccesoDummy(){
			
			$this->contraUsuarios = array(
					"usu1" => "contra1",
					"usu2" => "contra2",
				);		
			
		}
		
		/*
		 * Devuelve simplemente la contraseña del usuario que está 
		 * cargado en el array de usuarios 
		 * name: dameContrasena
		 * @param
		 * @return
		 */
		function dameContrasena( $usuario ) {
				
			return $this->contraUsuarios[ $usuario ];
			
		}
		
		
		
	}


?>
