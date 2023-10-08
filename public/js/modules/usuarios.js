$(function () {
    var focoTabla = $('#tabla-usuario').DataTable({
        processing: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: listar_usuarios,
        },
        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        columns: [
            { data: null, title: 'No.', },
            { data: 'id', name: 'id', orderable: false, searchable: false, visible: false },
            { data: 'name', name: 'name', title: 'Nombre y Apellido', orderable: false, searchable: true },
            { data: 'email', name: 'email', title: 'E-mail', orderable: false, searchable: true },
            { data: 'rol', name: 'rol', title: 'Rol', orderable: true, searchable: true },
            { data: 'division', name: 'division', title: 'Division', orderable: true, searchable: true },
            { data: 'unidad', name: 'unidad', title: 'Unidad', orderable: true, searchable: true },
            { data: 'detalles', name: 'detalles', title: 'Opciones', orderable: false, searchable: false },
        ],
        // language: { 'url': ruta_tabla_traduccion },
        dom: 'lfiptip',
    });

    focoTabla.on('order.dt search.dt', function () {
        focoTabla.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();


});

