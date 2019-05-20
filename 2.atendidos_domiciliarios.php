<?php
  $page_title = 'Clientes Atendidos por Domiciliario';
  require_once('includes/load.php');
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<?php
 $clientesDom = clientesDom();
?>

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Clientes Por Domiciliario</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th class="text-center">Nombre Domiciliario</th>
                <th class="text-center">Ubicacion</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">Edad</th>
                <th class="text-center">ID Orden</th> 
                <th class="text-center">Fecha</th>              
                <th class="text-center">ID Producto</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Tipo</th>
              </tr>
            </thead>
           <tbody>
             <?php foreach ($clientesDom as $clidom):?>
             <tr>            
              <td class="text-center"><?php echo $clidom[0]; ?></td>
				      <td class="text-center"><?php echo $clidom[1]; ?></td>
              <td class="text-center"><?php echo $clidom[2]; ?></td>
              <td class="text-center"><?php echo $clidom[3]; ?></td>				
              <td class="text-center"><?php echo $clidom[4]; ?></td>
              <td class="text-center"><?php echo $clidom[5]; ?></td>
              <td class="text-center"><?php echo date("d/m/Y", strtotime ($clidom[6])); ?></td>
              <td class="text-center"><?php echo $clidom[7]; ?></td>
              <td class="text-center"><?php echo $clidom[8]; ?></td>
              <td class="text-center"><?php echo $clidom[9]; ?></td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

  <a href="atend_domicil_print.php" class="btn btn-primary active" role="button" target="_blank">Imprimir</a>

<?php include_once('layouts/footer.php'); ?>
