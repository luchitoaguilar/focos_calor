$(function () {
    var focoTabla = $('#tabla-focos-calor').DataTable({
        processing: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: listar_focos,
        },
        columnDefs: [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        columns: [
            { data: null, title: 'No.', },
            { data: 'id', name: 'id', orderable: false, searchable: false, visible: false },
            { data: 'name', name: 'name', title: 'Nombre/ID', orderable: false, searchable: true },
            { data: 'descripcion', name: 'descripcion', title: 'Descripcion', orderable: false, searchable: true },
            { data: 'fecha', name: 'fecha', title: 'Fecha', orderable: true, searchable: true },
            { data: 'nivel', name: 'nivel', title: 'Nivel', orderable: false, searchable: true },
            { data: 'division', name: 'division', title: 'Division', orderable: true, searchable: true },
            { data: 'unidad', name: 'unidad', title: 'Unidad', orderable: true, searchable: true },
            { data: 'latitude', name: 'latitude', title: 'Latitud', orderable: false, searchable: true },
            { data: 'longitude', name: 'longitude', title: 'Longitud', orderable: false, searchable: true },
            { data: 'estado', name: 'estado', title: 'Estado', orderable: false, searchable: false },
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


    $('.confirm').click(function(event) {

        console.log('jere');
        //This will choose the closest form to the button
        var form =  $(this).closest("form");

        //don't let the form submit yet
        event.preventDefault();

        //configure sweetalert alert as you wish
        Swal.fire({
            title: 'هل أنت متأكد؟',
            text: "لا يمكنك التراجع عن حذف الفلم",
            cancelButtonText: "إلغاء",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'حذف'
        }).then((result) => {
            
            //in case of deletion confirm then make the form submit
            if (result.isConfirmed) {
                form.submit();
            }
        })
    });


});

