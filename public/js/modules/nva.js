$(function () {
    var nvaTabla = $('#tabla-nva').DataTable({
        processing: true,
        deferRender: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        ajax: {
            url: listar_nva,
        },
        columns: [
            { data: 'id', name: 'id', orderable: false, searchable: false, visible: false },
            { data: 'descripcion', name: 'descripcion', title: 'Descripcion', orderable: false, searchable: false },
            { data: 'tipo', name: 'tipo', title: 'Tipo', orderable: false, searchable: false },
            { data: 'fecha', name: 'fecha', title: 'Fecha', orderable: false, searchable: false },
            // { data: 'archivo', name: 'archivo', title: 'Archivo', orderable: false, searchable: false },
            { data: 'detalles', name: 'detalles', title: 'Opciones', orderable: false, searchable: false },
        ],
        // language: { 'url': ruta_tabla_traduccion },
        dom: 'lfiptip',
    });
});

// var vm = new Vue({
//     el: '#persona-app',
//     data: {
//         auth: auth,
//         errorBag: {},
//         isLoading: false,
//         isLoadingFile: false,
//         modelo: {},
//         roles: {},
//         isEditing: false,
//         password: {},
//         arroba: true,
//         nombres : '',
//         paterno : '',
//         materno : '',
//         ci : '',
//         complemento : '',
//         fecha_nacimiento : '',
//         lugar_nacimiento_id : '',
//         expedido_id : '',
//         telefono: '',
//         lugarNacimiento: [],
//         lugarExpedido: [],
//     },
//     created: function () {
//         // Ladda.bind('.ladda-button');
//         axios
//             .get(lugar_nacimiento)
//             .then(response => {
//                 this.lugarNacimiento = response.data.data;
//             });
//         axios
//             .get(expedido)
//             .then(response => {
//                 this.lugarExpedido = response.data.data;
//             });
//     },
//     methods: {
//         getListCargo(id) {
//             axios
//                 .get(getListCargo + '/' + id)
//                 .then(response => {
//                     this.cargos = response.data.data;
//                 });
//         },
//         newPersona() {
//             vm.id = null;
//             vm.nombres = '';
//             vm.paterno = '';
//             vm.materno = '';
//             vm.ci = '';
//             vm.telefono = '';
//             vm.complemento = '';
//             vm.fecha_nacimiento = '';
//             vm.lugar_nacimiento_id = '';
//             vm.expedido_id = '';
//             vm.editar = false;
//             vm.errors = {};
//             $('#frmpersona').modal('show');
//         },
//         showPersona(id) {
//             axios.get(datos_persona + '/' + id)
//                 .then(response => {
//                     vm.modelo = response.data.data;

//                     $('#frmverpersona').modal('show');
//                 }).catch(error => {
//                     Swal.fire(error.response.data.message, { icon: 'error' });
//                 });
//         },
//         cambiopassword(id) {
//             $('#frmverpersona').modal('hide');
//             $('#frmverpassword').modal('show');
//         },
//         changePassword() {
//             vm.password.Persona = vm.persona.id;
//             axios.post(urlChangePasswordPersona, vm.password)
//                 .then(response => {
//                     if (response.data.success) {
//                         toastr.success(response.data.msg, 'Correcto!');
//                         $('#frmverpassword').modal('hide');
//                         $('#frmverpersona').modal('show');
//                     } else {
//                         toastr.error(response.msg, 'Oops!');
//                     }
//                 })
//                 .catch(error => {
//                     toastr.error('Error al guardar el registro', 'Oops!');
//                     vm.errorBag = error.response.data.errors;
//                 })
//         },
//         editPersona(id) {
//             var temporal;
//             vm.editar = true;
//             vm.errors = {};
//             axios
//                 .get(datos_persona + '/' + id)
//                 .then(response => {
//                     temporal = response.data.data;
//                     vm.id = temporal.id;
//                     vm.nombres = temporal.nombres;
//                     vm.paterno = temporal.paterno;
//                     vm.materno = temporal.materno;
//                     vm.ci = temporal.ci;
//                     vm.telefono = temporal.telefono;
//                     vm.complemento = temporal.complemento;
//                     vm.expedido_id = temporal.expedido.id;
//                     vm.fecha_nacimiento = temporal.fecha_nacimiento;
//                     vm.lugar_nacimiento_id = temporal.lugar_nacimiento.id;
//                     vm.observaciones = temporal.observaciones;

//                     $('#frmpersona').modal('show');
//                     $('#frmverpersona').modal('hide');
//                 });
//         },
//         storePersona() {
//             vm.errors = {};
//             vm.modelo = {
//                 id: vm.id,
//                 nombres: vm.nombres,
//                 paterno: vm.paterno,
//                 materno: vm.materno,
//                 ci: vm.ci,
//                 telefono: vm.telefono,
//                 fecha_nacimiento: vm.fecha_nacimiento,
//                 lugar_nacimiento_id: vm.lugar_nacimiento_id,
//                 complemento: vm.complemento,
//                 expedido_id: vm.expedido_id,
//             };
//             //inicializamos una variable tipo FormData para las imagenes
//             const modelo = new FormData();
//             modelo.append('foto', vm.foto);
//             //recorremos y asignamos todas las variables incluyendo las de tipo File al modelo
//             for (let key in vm.modelo) {
//                 Array.isArray(vm.modelo[key]) ?
//                     vm.modelo[key].forEach(value => modelo.append(key + '[]', value)) :
//                     modelo.append(key, vm.modelo[key]);
//             }

//             axios
//                 .post(guardar_persona, modelo, {
//                     headers: {
//                         'Accept': 'application/json',
//                         'Content-Type': 'application/json',
//                     }
//                 })
//                 .then(response => {
//                     vm.modelo = {};
//                     vm.errors = {};
//                     $('#frmpersona').modal('hide');
//                     Swal.fire({
//                         position: 'top-end',
//                         icon: 'success',
//                         title: 'Los datos de la Persona se ha guardado exitosamente',
//                         showConfirmButton: false,
//                         timer: 1500
//                     })
//                     var tablaPrincipal = $('#tabla-persona').DataTable();
//                     tablaPrincipal.draw();
//                 }).catch(error => {
//                     vm.errors = error.response.data.errors;
//                 })

//         },
//         //los dos funcionan para recuperar los datos del archivo File y las asignamos a las variables
//         select_foto(event) {
//             vm.foto = event.target.files[0];
//         },
//         deletePersona(id) {
//             Swal.fire({
//                 title: "Estas seguro que deseas eliminar el registro?",
//                 text: "Esta accion es irreversible!",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Eliminar'
//             })
//                 .then((response) => {
//                     if (response.isConfirmed) {
//                         axios
//                             .delete(eliminar_persona + '/' + id)
//                             .then(response => {
//                                 if (response.data.success) {
//                                     Swal.fire({
//                                         position: 'top-end',
//                                         icon: 'success',
//                                         title: response.data.mensaje,
//                                         showConfirmButton: false,
//                                         timer: 1500
//                                     })
//                                     var personaTabla = $('#tabla-persona').DataTable();
//                                     personaTabla.draw();
//                                     $('#frmverpersona').modal('hide');
//                                 } else {
//                                     Swal.fire({
//                                         position: 'top-end',
//                                         icon: 'error',
//                                         title: response.data.mensaje,
//                                         showConfirmButton: false,
//                                         timer: 1500
//                                     })
//                                 }
//                             })
//                             .catch(error => {
//                                 Swal.fire({
//                                     position: 'top-end',
//                                     icon: 'error',
//                                     title: 'Hubo un problema, contactese con el administrador',
//                                     showConfirmButton: false,
//                                     timer: 1500
//                                 })
//                             })
//                     }
//                 });
//         },
//         activatePersona(id) {
//             Swal.fire({
//                 title: "Estas seguro que deseas activar esta persona?",
//                 icon: "warning",
//                 showCancelButton: true,
//                 confirmButtonColor: '#3085d6',
//                 cancelButtonColor: '#d33',
//                 confirmButtonText: 'Activar'
//             })
//                 .then((response) => {
//                     if (response.isConfirmed) {
//                         axios
//                             .post(activar_persona + '/' + id)
//                             .then(response => {
//                                 if (response.data.success) {
//                                     Swal.fire({
//                                         position: 'top-end',
//                                         icon: 'success',
//                                         title: response.data.mensaje,
//                                         showConfirmButton: false,
//                                         timer: 1500
//                                     })
//                                     var personaTabla = $('#tabla-persona').DataTable();
//                                     personaTabla.draw();
//                                     $('#frmverpersona').modal('hide');
//                                 } else {
//                                     Swal.fire({
//                                         position: 'top-end',
//                                         icon: 'error',
//                                         title: response.data.mensaje,
//                                         showConfirmButton: false,
//                                         timer: 1500
//                                     })
//                                 }
//                             })
//                             .catch(error => {
//                                 Swal.fire({
//                                     position: 'top-end',
//                                     icon: 'error',
//                                     title: 'Hubo un problema, contactese con el administrador',
//                                     showConfirmButton: false,
//                                     timer: 1500
//                                 })
//                             })
//                     }
//                 });
//         },
//     }
// });
