<?php
  $page_title = 'Estado ordenes';
  require_once('includes/load.php');
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>


<?php
 $ordenes = ordenes();
?>


<div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Estado de Ordenes</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th class="text-center">Fecha Inico</th>
                <th class="text-center">Fecha Fin</th>
                <th class="text-center">ID Cliente</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">ID Domiciliario</th> 
                <th class="text-center">Domiciliario</th>              
                <th class="text-center">ID Producto</th>
                <th class="text-center">Producto</th>
                <th class="text-center">Estado Orden</th>
              </tr>
            </thead>
           <tbody>
             <?php foreach ($ordenes as $orden):?>
             <tr>            
              <td class="text-center"><?php echo $orden[0]; ?></td>
              <td class="text-center"><?php echo date("d/m/Y", strtotime ($orden[1])); ?></td>
				      <td class="text-center"><?php echo date("d/m/Y", strtotime ($orden[2])); ?></td>
              <td class="text-center"><?php echo $orden[3]; ?></td>
              <td class="text-center"><?php echo $orden[4]; ?></td>				
              <td class="text-center"><?php echo $orden[8]; ?></td>
              <td class="text-center"><?php echo $orden[9]; ?></td>
              <td class="text-center"><?php echo $orden[5]; ?></td>
              <td class="text-center"><?php echo $orden[6]; ?></td>
              <td class="text-center"><?php echo $orden[7]; ?></td>
             </tr>
             <?php endforeach;?>
           </tbody>
         </table>
        </div>
      </div>
    </div>
  </div>

  <a href="estado_ord_print.php" class="btn btn-primary active" role="button" target="_blank">Imprimir</a>

<?php include_once('layouts/footer.php'); ?>
