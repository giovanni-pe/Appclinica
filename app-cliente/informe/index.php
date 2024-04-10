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
                                    <font style="vertical-align: inherit;">Informes Registrados</font>
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
                                            <th>Cita ID</th>
                                            <th>Diagnóstico</th>
                                            <th>Receta</th>
                                            <th>Tratamiento</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        // URL de la API de informes
                                        $apiUrl = $api_uri . '/app/Negocio/informe.php';

                                        // Realizar una solicitud GET a la API de informes y decodificar la respuesta JSON
                                        $informes = json_decode(file_get_contents($apiUrl), true);

                                        // Iterar sobre los informes y mostrar los detalles en una fila de la tabla
                                        foreach ($informes as $informe) {
                                            echo "<tr>";
                                            echo "<td>{$informe['id']}</td>";
                                            echo "<td>{$informe['cita_id']}</td>";
                                            echo "<td>{$informe['diagnostico']}</td>";
                                            echo "<td>{$informe['receta']}</td>";
                                            echo "<td>{$informe['tratamiento']}</td>";
                                            echo "</tr>";
                                        }
                                        ?></tbody>
                                        <tfoot>
                                        <th>ID</th>
                                            <th>Cita ID</th>
                                            <th>Diagnóstico</th>
                                            <th>Receta</th>
                                            <th>Tratamiento</th>
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
                "info": "Mostrando INICIO a FIN de TOTAL Informes",
                "infoEmpty": "Mostrando 0 to 0 of 0 Informes",
                "infoFiltered": "(Filtrado de MAX total Informes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar MENU Informes",
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