$(document).ready(function () {
  var id, opcion;
  opcion = 4;

  tablaPapelera = $("#tablaPapelera").DataTable({
    ajax: {
      url: "../Controllers/PapeleraController.php",
      method: "POST", //usamos el metodo POST
      data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
      dataSrc: "",
    },
    columns: [
      { data: "id", className: "text-center" },
      {
        data: "name",
        className: "text-center",

        fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
          $(nTd).html(
            "<a class='data-toggle='tooltip'  title='Descargar'' href='downloadfile.php?id=" +
              oData.id +
              "'target='_blank'>" +
              oData.name +
              "</a>"
          );
        },
      },
      { data: "description", className: "text-center" },
      { data: "user_id", className: "text-center" },
      { data: "folder_id", className: "text-center" },
      { data: "file_type", className: "text-center" },
      { data: "file_path", className: "text-center" },
      { data: "is_public", className: "text-center" },
      { data: "date_updated", className: "text-center" },
      {
        defaultContent:
          "<div class='text-center'><div class='btn-group1' style='text-align:center;'><button class='btn btn-info btn-sm btnVer data-toggle='tooltip'  title='Ver archivo''><i class='material-icons'>visibility</i></button><button class='btn btn-success btn-sm btnRecuperar data-toggle='tooltip'  title='Recuperar Archivo''><i class='material-icons'>restore</i></button><button class='btn btn-danger btn-sm btnBorrar data-toggle='tooltip'  title='Eliminar Archivo''><i class='material-icons'>delete</i></button></div></div>",
      },
    ],

    columnDefs: [
      {
        //ID PAPELERA
        targets: [0], //COLUMNA
        visible: true, //PARA OCULAR
        searchable: true, //PARA  BUSCAR
      },

      {
        //NAME
        targets: [1],
        visible: true,
        searchable: false,
      },
      {
        //DESCRIPCION
        targets: [2],
        visible: true,
        searchable: false,
      },
      {
        //USER ID
        targets: [3],
        visible: false,
        searchable: false,
      },
      {
        //FOLDER ID
        targets: [4],
        visible: false,
        searchable: false,
      },
      {
        //FILE TYPE
        targets: [5],
        visible: true,
        searchable: false,
      },
      {
        //FILE path
        targets: [6],
        visible: false,
        searchable: false,
      },
      {
        //is public
        targets: [7],
        visible: false,
        searchable: false,
      },
      {
        //fecha
        targets: [8],
        visible: true,
        searchable: false,
      },
    ],

    language: {
      lengthMenu: "Mostrar _MENU_ registros",
      zeroRecords: "No se encontraron resultados",
      info: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      infoFiltered: "(filtrado de un total de _MAX_ registros)",
      sSearch: "Buscar:",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      sProcessing: "Procesando...",
    },

    responsive: "true",
  });

  var fila; //captura la fila, para editar o eliminar
  //submit para el Alta y Actualización

  $(document).on("click", ".btnVer", function () {
    // tablaPapelera
    // .columns([0])
    // .visible(true);
    fila = $(this).closest("tr");

    id = parseInt(fila.find("td:eq(0)").text());

    window.open("visualizarfile.php?id=" + id);
  });

  $(document).on("click", ".btnRecuperar", function () {
    fila = $(this).closest("tr");
    id = parseInt(fila.find("td:eq(0)").text());
    archivo = $(this).closest("tr").find("td:eq(1)").text();

    Swal.fire({
      title: "¿Deseas recuperar el archivo?",
      text: "",
      icon: "info",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Si',
      cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          "Recuperado!",
          "El archivo se ha recuperado correctamente.",
          "success"
        );

        setTimeout(() => {
          var accion = "recuperar";
          window.location =
            "papeleraiframe.php?id=" + id + "&recuperar=" + accion;
        }, 1500);
      }
    });
  });

  $(document).on("click", ".btnBorrar", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    archivo = $(this).closest("tr").find("td:eq(1)").text();

    Swal.fire({
      title: "¿Deseas eliminar el archivo?",
      text: "El archivo será eliminado definitivamente!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Si',
      cancelButtonText: '<i class="fa fa-thumbs-down"></i> No',
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          "Eliminado!",
          "El archivo se ha eliminado correctamente.",
          "success"
        );

        setTimeout(() => {
          var accion = "eliminar";
          window.location =
            "papeleraiframe.php?id=" + id + "&eliminar=" + accion;
        }, 1500);
      }
    });
  });
});

function MostrarAlerta(titulo, descripcion, tipoAlerta, timer) {
  Swal.fire(titulo, descripcion, tipoAlerta, timer);
}
