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
                    <h1 class="m-0">Bienvenido al sistema Clinico</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

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

                                    <form action="<?php echo $URL; ?>/controllers/registrar_doctor.php" method="POST" class="needs-validation" novalidate>
                                        <div class="mb-3">
                                            <label for="nombreDoctor" class="form-label">Nombre del Doctor:</label>
                                            <input type="text" class="form-control" id="nombreDoctor" name="nombreDoctor" required>
                                            <div class="invalid-feedback">Por favor ingresa el nombre del doctor.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="especialidadDoctor" class="form-label">Especialidad del Doctor:</label>
                                            <input type="text" class="form-control" id="especialidadDoctor" name="especialidadDoctor" required>
                                            <div class="invalid-feedback">Por favor ingresa la especialidad del doctor.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="correoDoctor" class="form-label">Correo del Doctor:</label>
                                            <input type="email" class="form-control" id="correoDoctor" name="correoDoctor" required>
                                            <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telefonoDoctor" class="form-label">Teléfono del Doctor:</label>
                                            <input type="tel" class="form-control" id="telefonoDoctor" name="telefonoDoctor" required>
                                            <div class="invalid-feedback">Por favor ingresa un número de teléfono válido.</div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Registrar Doctor</button>
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