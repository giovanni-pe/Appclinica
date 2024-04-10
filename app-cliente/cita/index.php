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

                                    <table id="example1" class="table table-bordered table-striped">


                                        <thead>
                                            <th>ID</th>
                                            <th>Cliente ID</th>
                                            <th>Doctor ID</th>
                                            <th>Fecha y Hora</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // URL de la API de citas
                                            $apiUrl = $api_uri.'/app/Negocio/cita.php';

                                            // Realizar una solicitud GET a la API de citas y decodificar la respuesta JSON
                                            $citas = json_decode(file_get_contents($apiUrl), true);

                                            // Iterar sobre las citas y mostrar los detalles en una fila de la tabla
                                            foreach ($citas as $cita) {
                                                echo "<tr>";
                                                echo "<td>{$cita['id']}</td>";
                                                echo "<td>{$cita['cliente_id']}</td>";
                                                echo "<td>{$cita['doctor_id']}</td>";
                                                echo "<td>{$cita['fecha_hora']}</td>";
                                                echo "<td>{$cita['estado']}</td>";
                                                echo "</tr>";
                                            }
                                            ?></tbody>
                                        <tfoot>

                                            <th>ID</th>
                                            <th>Cliente ID</th>
                                            <th>Doctor ID</th>
                                            <th>Fecha y Hora</th>
                                            <th>Estado</th>

                                        </tfoot>
                                    </table>




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


<script>
    $(function() {
        $("#example1").DataTable({

            "pageLength": 2,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando INICIO a FIN de TOTAL Roles",
                "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
                "infoFiltered": "(Filtrado de MAX total Roles)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar MENU Roles",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },

            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',

                }, {
                    extend: 'pdf'
                }, {
                    extend: 'csv'
                }, {
                    extend: 'excel'
                }, {
                    text: 'Imprimir',
                    extend: 'print'
                }]
            }, {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayaut: 'fixed three-column'
            }],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>