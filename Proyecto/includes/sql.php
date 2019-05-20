<?php
  require_once('includes/load.php');

function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}

function  ordenes(){
  global $db;
  $sql  = "SELECT ord.idOrdenes, ord.FechaInicio, ord.FechaFin, ord.Usuarios_idUsuarios,";
  $sql .= " usu.Nombre, pro.idProductos, pro.Nombre, ord.Estado, dom.idDomiciliario, dom.Nombre";  
  $sql .= " FROM ordenes ord, domiciliario dom, productos pro, usuarios usu";
  $sql .= " where ord.Productos_idProductos=pro.idProductos";
  $sql .= " and ord.Domiciliario_idDomiciliario=dom.idDomiciliario";
  $sql .= " and ord.Usuarios_idUsuarios=usu.idUsuarios";
  return find_by_sql($sql);
}

function  clientesDom(){
  global $db;
  $sql  = "SELECT dom.idDomiciliario, dom.Nombre , dom.Ubicacion, usu.Nombre, usu.Edad, ord.idOrdenes,";
  $sql .= " ord.FechaInicio, ord.Productos_idProductos, prd.Nombre, prd.Tipo";
  $sql .= " FROM";
  $sql .= " domiciliario dom, usuarios usu ,ordenes ord, productos prd ";
  $sql .= " WHERE ord.Domiciliario_idDomiciliario=dom.idDomiciliario";
  $sql .= " AND ord.Usuarios_idUsuarios=usu.idUsuarios";
  $sql .= " AND ord.Productos_idProductos=prd.idProductos";
  return find_by_sql($sql);
}


function  clientesCon(){
  global $db;
  $sql ="SELECT usu.Nombre, prd.Nombre, prd.Tipo, ord.idOrdenes, ord.FechaInicio, ord.FechaFin";
  $sql .=" FROM";
  $sql .=" usuarios usu, ordenes ord, productos prd";
  $sql .=" WHERE ord.Usuarios_idUsuarios=usu.idUsuarios";
  $sql .=" AND ord.Productos_idProductos=prd.idProductos";
  return find_by_sql($sql);
}


function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }


 /*--------------------------------------------------------------*/
 /* Funciones de autenticacion y carga de sesion de los usuarios
 /*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT idUsuarios, Nombre, Documento, clave, Estado, Tipo FROM usuarios WHERE documento=$username LIMIT 1");
    //$sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['clave'] ){
        return $user['idUsuarios'];
      }
    }
   return false;
  }

  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

?>
