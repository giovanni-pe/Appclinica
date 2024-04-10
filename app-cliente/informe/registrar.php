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


                                    <h1>Registro de Informe</h1>
                                    <?php include('../vars.php'); ?>
                                    <!-- Formulario para registrar informe -->
                                    <form action="<?php echo $URL ?>/controllers/registrar_informe.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="from-group">
                                                    <label for="cita_id">ID de la Cita:</label>
                                                    <input type="text" class='form-control' id="cita_id" name="cita_id" required>

                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="diagnostico">Diagnóstico:</label>
                                                    <textarea id="diagnostico" class="form-control" name="diagnostico" rows="4" required></textarea>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="from-group">
                                                    <label for="receta">Receta:</label>
                                                    <textarea id="receta" class="form-control" name="receta" rows="4" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="tratamiento">Tratamiento:</label>
                                                    <textarea id="tratamiento" class="form-control" name="tratamiento" rows="4" required></textarea>

                                                </div>
                                            </div>
                                        </div>

                                        <br>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="from-group">
                                                    <label for="informe">Informe:</label>
                                                    <textarea id="informe" name="informe" class='form-control' rows="4" required></textarea>
                                                </div>
                                            </div>
                                        </div>





                                        <input type="submit" value="Registrar Informe">
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