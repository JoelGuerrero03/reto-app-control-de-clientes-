<?php

 include_once '../../includes/templates/header.php';
 include_once '../../includes/templates/menu.php';
 
 ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Crear cliente <small>llena el formulario para crear un cliente</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-10 ml-3">
    <!-- Main content -->
    <section class="content ">
      <!-- Default box -->
      <div class="card ">
        <div class="card-header">
          <h3 class="card-title">Crear cliente</h3>
        </div>
        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-cliente.php">
           <div class="card-body ">
              <div class="form-group">
                  <label for="primer_nombre">Primer nombre:</label>
                  <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder="Primer nombre">
               </div>
               <div class="form-group">
                  <label for="segundo_nombre">Segundo nombre:</label>
                  <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo nombre">
               </div>
               <div class="form-group">
                  <label for="primer_apellido">Primer apellido:</label>
                  <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido">
               </div>
               <div class="form-group">
                  <label for="segundo_apellido">Segundo apellido:</label>
                  <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido">
               </div>
               <div class="form-group">
                  <label for="celular">Celular:</label>
                  <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
               </div>
               <div class="form-group">
                  <label for="residencia">Residencia:</label>
                  <input type="text" class="form-control" id="residencia" name="residencia" placeholder="Residencia">
               </div>
               <div class="form-group">
                  <label for="cedula">Cedula:</label>
                  <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula ">
               </div>
               <div class="form-group">
               <label for="nombre_empresa">Nombre empresa:</label>
               <select name="nombre_empresa" class="form-control seleccionar">
                   <option value="0">- Seleccione -</option>
                   <?php
                   try{
                     require_once('../../includes/funciones/conexionBd.php');
                     $sql = "SELECT * FROM empresa ";
                     $resultado = $conn->query($sql);
                     while($empresa = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $empresa['idEmpresa']; ?>">
                        <?php echo $empresa['nombre_empresa']; ?>
                                             
                        </option>
                                     
                        <?php } 
                   } catch (Exception $e) {
                     echo "Error: " . $e->getMessage();
                   }; 
                   
                   ?>
                 </select>
                 </div>
               <div class="form-group">
               <label for="activo">Estado cliente:</label>
               <select name="activo" class="form-control seleccionar">
                   <option value="0">- Seleccione -</option>
                   <?php
                   try{
                     require_once('../../includes/funciones/conexionBd.php');
                     $sql = "SELECT * FROM activo ";
                     $resultado = $conn->query($sql);
                     while($activo = $resultado->fetch_assoc()) { ?>
                        <option value="<?php echo $activo['idActivo']; ?>">
                        <?php echo $activo['estado_cliente']; ?>
                                             
                        </option>
                                     
                        <?php } 

                   } catch (Exception $e) {
                     echo "Error: " . $e->getMessage();
                   }; 
                   
                   ?>
                 </select>
               </div>
         </div>
         <div class="card-footer">
                <input type="hidden" name="registro" value="nuevo">
                <button type="submit" class="btn btn-primary" id="crear_registro_cliente">Añadir</button>
         </div>
        </form>
    </div>

    </section>
       </div>
    </div>
  </div>
  <?php include_once '../../includes/templates/footer.php' ?>
