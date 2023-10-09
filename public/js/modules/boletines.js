$(function () {
    var boletinesTabla = $('#tabla-boletines').DataTable({
        processing: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: listar_boletines,
        },
        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        columns: [
            { data: null, title: 'No.', },
            { data: 'id', name: 'id', orderable: false, searchable: false, visible: false },
            { data: 'fecha', name: 'fecha', title: 'Fecha', orderable: false, searchable: true },
            { data: 'descripcion', name: 'descripcion', title: 'Descripción', orderable: false, searchable: true },
            { data: 'archivo', name: 'archivo', title: 'Archivo', orderable: true, searchable: true },
        ],
        // language: { 'url': ruta_tabla_traduccion },
        dom: 'lfiptip',
    });

    boletinesTabla.on('order.dt search.dt', function () {
        focoTabla.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


});

