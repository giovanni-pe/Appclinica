<?php
include("../vars.php");
include('../layout/parte1.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Roles</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">

                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Roles Registrados</font>
                                </font>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">


                                
                                    <h1>Registro de Cliente</h1>
                                    <?php include '../vars.php'; ?>
                                    <!-- Formulario de Registro de Cliente -->
                                    <form action="<?php echo $URL; ?>/controllers/registrar_cliente.php" method="POST">
                                        <div class="form-group">
                                        <label for="nombre">Nombre del Cliente:</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                        <br>
                                        </div>

                                        <div class="form-group">
                                        <label for="emailCliente">Email del Cliente:</label>
                                        <input type="email"class='form-control' id="email" name="email" required>
                                        <br>
                                        </div>

                                       <div class="from-group">
                                       <label for="telefonoCliente">Teléfono del Cliente:</label>
                                        <input type="tel" id="telefono"class='form-control' name="telefono" required>
                                        <br>
                                       </div>

                                        <input type="submit" value="Registrar Cliente">
                                    </form>





                        </div>

                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>

<!-- /.content-wrapper -->

<?php
include('../layout/parte2.php');
include('../layout/mensajes.php');
?>


