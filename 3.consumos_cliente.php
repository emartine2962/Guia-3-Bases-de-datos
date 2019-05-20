<?php
  $page_title = 'Consumos por cliente';
  require_once('includes/load.php');
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>

<?php
 $clientesCom = clientesCon();
?>

<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Consumo por Clientes</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center">Cliente</th>                
                <th class="text-center">Producto</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">ID Orden</th>
                <th class="text-center">Fecha </th>              
              </tr>
            </thead>
           <tbody>
             <?php foreach ($clientesCom as $clidom):?>
             <tr>            
              <td class="text-center"><?php echo $clidom[0]; ?></td>
				      <td class="text-center"><?php echo $clidom[1]; ?></td>
              <td class="text-center"><?php echo $clidom[2]; ?></td>
              <td class="text-center"><?php echo $clidom[3]; ?></td>				              
              <td class="text-center"><?php echo date("d/m/Y", strtotime ($clidom[4])); ?></td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

  <a href="consumo_cli_print.php" class="btn btn-primary active" role="button" target="_blank">Imprimir</a>

<?php include_once('layouts/footer.php'); ?>
