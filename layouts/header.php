<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);           
            else echo "RAPPI Reportes";?>
    </title>
	
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css" />
  </head>
  <body>
  <?php  if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
      <div class="logo pull-left"> RAPPI Reportes </div>
      <div class="header-content">
      <div class="header-date pull-left">
        <strong><?php echo date("d/m/Y  g:i a");?></strong>
      </div>
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              
              <span>Menu Usuario<i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">              
              <li class="last">
                 <a href="logout.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Salir
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>
    <div class="sidebar">
      <ul>
        <li>
          <a href="#" class="submenu-toggle">
            <i class="glyphicon glyphicon-signal"></i>
            <span>Reporte de ventas</span>
            </a>
            <ul class="nav submenu">
              <li><a href="1.estado_ordenes.php">Estado de ordenes</a></li>
              <li><a href="2.atendidos_domiciliarios.php">Atendidos por domiciliario</a></li>
              <li><a href="3.consumos_cliente.php">Consumos por Cliente</a> </li>
            </ul>
        </li>
      </ul>

   </div>
<?php endif;?>

<div class="page">
  <div class="container-fluid">
