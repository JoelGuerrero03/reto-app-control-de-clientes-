<?php
 include_once '../../includes/templates/header.php';
 include_once '../../includes/templates/menu.php'; 
 ?>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listados de clientes</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Maneja los clientes en esta sección</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre Completo</th>
                  <th>Celular</th>
                  <th>Ubicacion</th>
                  <th>Cedula</th>
                  <th>Empresa</th>
                  <th>Activo</th>
                </tr>
                </thead>
                <tbody>
                        <?php
                            try {
                                require_once('../../includes/funciones/conexionBd.php');
                                // $sql = "SELECT idClientes,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,celular_cliente,
                                // ubicacion_cliente,cedula,idEmpresa,idActivo FROM clientes";
                                // $resultado = $conn->query($sql);
                                $sql = "SELECT clientes.*, empresa.*, activo.* FROM clientes ";
                                $sql .= " JOIN empresa ";
                                $sql .= " ON clientes.idEmpresa = empresa.idEmpresa ";
                                $sql .= " JOIN activo ";
                                $sql .= " ON clientes.idActivo = activo.idActivo ";
                                $resultado = $conn->query($sql);
                            } catch (Exception $e) {
                                $error = $e->getMessage();
                                echo $error;
                            }
                            while($cliente = $resultado->fetch_assoc() ) { ?>
                                <tr>
                                    <td><?php echo $cliente['primer_nombre'] . " " .  $cliente['segundo_nombre'] . " " .  $cliente['primer_apellido'] . " " .  $cliente['segundo_apellido']  ?></td>
                                    <td><?php echo $cliente['celular_cliente']; ?></td>
                                    <td><?php echo $cliente['ubicacion_cliente']; ?></td>
                                    <td><?php echo $cliente['cedula']; ?></td>
                                    <td><?php echo $cliente['nombre_empresa']; ?></td>
                                    <td><?php echo $cliente['estado_cliente']; ?></td>
                                    <td>
                                        <a href="../actualizar/actualizar.php?id=<?php echo $cliente['idClientes'] ?>" class="btn bg-orange btn-flat margin">                                      
                                            <i class="fas fa-pencil-alt text-white"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }  ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <?php include_once '../../includes/templates/footer.php' ?>
