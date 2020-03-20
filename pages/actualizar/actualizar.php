<?php
 error_reporting(E_ALL ^ E_NOTICE);
include_once '../../includes/templates/header.php';
include_once '../../includes/templates/menu.php';

$id = $_GET['id'];

  if(!filter_var($id, FILTER_VALIDATE_INT)){
      die("error");
  }
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1>Editar clientes <small>puedes editar los datos del cliente aqui</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <div class="row">
      <div class="col-md-8 ml-3">

      
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Clientes</h3>
        </div>
        <?php 
             require_once('../../includes/funciones/conexionBd.php');
             $sql = "SELECT * FROM `clientes` WHERE `idClientes` = $id ";
             $resultado = $conn->query($sql);
             $cliente = $resultado->fetch_assoc();
        ?>
        <form role="form" name="guardar-registro" id="guardar-registro" method="post" action="modelo-cliente-actualizar.php">
           <div class="card-body ">
              <div class="form-group">
                  <label for="primer_nombre">Primer nombre:</label>
                  <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" placeholder="Primer nombre" value="<?php echo $cliente['primer_nombre']; ?>">
               </div>
               <div class="form-group">
                  <label for="segundo_nombre">Segundo nombre:</label>
                  <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre" placeholder="Segundo nombre"value="<?php echo $cliente['segundo_nombre']; ?>">
               </div>
               <div class="form-group">
                  <label for="primer_apellido">Primer apellido:</label>
                  <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido"value="<?php echo $cliente['primer_apellido']; ?>">
               </div>
               <div class="form-group">
                  <label for="segundo_apellido">Segundo apellido:</label>
                  <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido"value="<?php echo $cliente['segundo_apellido']; ?>">
               </div>
               <div class="form-group">
                  <label for="celular">Celular:</label>
                  <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" value="<?php echo $cliente['celular_cliente']; ?>">
               </div>
               <div class="form-group">
                  <label for="residencia">Residencia:</label>
                  <input type="text" class="form-control" id="residencia" name="residencia" placeholder="Residencia" value="<?php echo $cliente['ubicacion_cliente']; ?>">
               </div>
               <div class="form-group">
                  <label for="cedula">Cedula:</label>
                  <input type="text" class="form-control" id="cedula" name="cedula" placeholder="Cedula " value="<?php echo $cliente['cedula']; ?>">
               </div>
               <div class="form-group">
                     <label for="nombre_empresa">Nombre empresa:</label>
                     <select name="nombre_empresa" class="form-control seleccionar">
                         <option value="0">--Seleccione--</option>
                         <?php
                         try{
                           require_once('../../includes/funciones/conexionBd.php');
                           $empresa_actual = $cliente['idEmpresa'];
                           $sql = "SELECT * FROM empresa ";
                           $resultado = $conn->query($sql);
                           while($empresa = $resultado->fetch_assoc()) { 
                              if($empresa['idEmpresa'] == $empresa_actual){ ?>

                             <option value="<?php echo $empresa['idEmpresa']; ?>" selected>
                              <?php echo $empresa['nombre_empresa']; ?>                        
                              </option>
                              }
                             <?php } else { ?>
                                 <option value="<?php echo $empresa['idEmpresa']; ?>">
                              <?php echo $empresa['nombre_empresa']; ?>   
                             <?php }            
                             }    
                      } catch (Exception $e) {
                          echo "Error: " . $e->getMessage();
                      };     
                      ?>
                 </select>
                </div>
                <div class="form-group">
                     <label for="activo">Estado del cliente:</label>
                     <select name="activo" class="form-control seleccionar">
                         <option value="0">--Seleccione--</option>
                         <?php
                         try{
                           require_once('../../includes/funciones/conexionBd.php');
                           $estado_actual = $cliente['idActivo'];
                           $sql = "SELECT * FROM activo ";
                           $resultado = $conn->query($sql);
                           while($estado = $resultado->fetch_assoc()) { 
                              if($estado['idActivo'] == $estado_actual){ ?>

                             <option value="<?php echo $estado['idActivo']; ?>" selected>
                              <?php echo $estado['estado_cliente']; ?>                        
                              </option>
                              }
                             <?php } else { ?>
                                 <option value="<?php echo $estado['idActivo']; ?>">
                              <?php echo $estado['estado_cliente']; ?>   
                             <?php }            
                             }    
                      } catch (Exception $e) {
                          echo "Error: " . $e->getMessage();
                      };     
                      ?>
                 </select>
                </div>
         </div>
         <div class="card-footer">
                <input type="hidden" name="registro" value="actualizar">
                <input type="hidden" name="id_registro" value="<?php echo $id;?>">
                <button type="submit" class="btn btn-primary">Guardar</button>
         </div>
        </form>
    </div>
    </section>
       </div>
    </div>
  </div>
  <?php include_once '../../includes/templates/footer.php' ?>
