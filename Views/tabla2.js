$(document).ready(function () {
    var id, opcion;
    opcion = 4;
  
    tablaUsuarios = $("#tablaUsuarios").DataTable({
      ajax: {
        url: "../Controllers/TablaController2.php",
        method: "POST", //usamos el metodo POST
        data: { opcion: opcion }, //enviamos opcion 4 para que haga un SELECT
        dataSrc: "",
      }, //COLUMNAS QUE OBTENDRA DE LA BASE DE DATOS
      columns: [
        { data: "id", className: "text-center" },
        { data: "nombre", className: "text-center" },
        { data: "correo", className: "text-center" },
        { data: "contrasena", className: "text-center" },
  
        {
          data: "avatar",
          className: "text-center",
          render: function (usuario, noimage) {
            return usuario
              ? '<button class="btnFoto  data-toggle="tooltip"  title="Cambiar Foto de Perfil"" style="background-color:transparent;border:none;"><img  text-align:center; height="80" width="80" src="' +
              usuario +
              '"/></button>'
              : null;
          },
          defaultContent: "Sin Foto de Perfil",
          title: "Image",
        },
        { data: "id_departamento", className: "text-center" },
        { data: "departamento", className: "text-center" },
        { data: "nivel_criticidad", className: "text-center" },
        { data: "fecha_ingreso", className: "text-center" },
        { data: "fecha_nacimiento", className: "text-center" },
        { data: "telefono", className: "text-center" },
        { data: "celular", className: "text-center" },
        { data: "contacto_emergencia", className: "text-center" },
        { data: "domicilio_anterior", className: "text-center" },
        { data: "rfc", className: "text-center" },
        { data: "curp", className: "text-center" },
        { data: "imss", className: "text-center" },
        { data: "tipo_sangre", className: "text-center" },
        { data: "carta_antecedentes", className: "text-center" },
        { data: "examen_tox", className: "text-center" },
        { data: "enfermedades", className: "text-center" },
        { data: "admin", className: "text-center" },
        { data: "vacaciones", className: "text-center",
        render: function (data) {
          return data
            ? '<button class="btn btnVacaciones">'+data+'</button>'
            : null;
        },
        defaultContent: "<button class='btn btnVacaciones'>SIN PROGRAMAR</button>",
      
      },
        {
          defaultContent:
            "<div class='text-center'><br><div class='btn-group1' style='text-align:center;'><button class='btn btn-success btn-sm btnVer data-toggle='tooltip'  title='Ver Empleado''><i class='material-icons'>account_box</i></button><button class='btn btn-primary btn-sm btnRecuperar data-toggle='tooltip'  title='Recuperar''><i class='material-icons'>restore</i></button><button class='btn btn-danger btn-sm btnBorrar data-toggle='tooltip'  title='Eliminar Empleado''><i class='material-icons'>delete</i></button></div></div>",
        },
      ],
  
      //PARA OCULAR COLUMNAS EN LA TABLA
      columnDefs: [
        {
          //CONTRASEÑA
          targets: [3], //COLUMNA
          visible: false, //PARA OCULAR
          searchable: false, //PARA  BUSCAR
        },
  
        {
          //ID DEL DEPARTAMENTO
          targets: [5],
          visible: false,
          searchable: false,
        },
        {
          //FECHA INGRESO
          targets: [8],
          visible: false,
          searchable: false,
        },
        {
          //FECHA NACIMIENTO
          targets: [9],
          visible: false,
          searchable: false,
        },
  
        {
          //TELEFONO
          targets: [10],
          visible: false,
          searchable: true,
        },
        {
          //CELULAR
          targets: [11],
          visible: false,
          searchable: true,
        },
        {
          //CONTACTO EMERGENCIA
          targets: [12],
          visible: false,
          searchable: true,
        },
        {
          //DOMICILIO ANTERIOR
          targets: [13],
          visible: false,
          searchable: true,
        },
        {
          //RFC
          targets: [14],
          visible: false,
          searchable: true,
        },
        {
          //CURP
          targets: [15],
          visible: false,
          searchable: true,
        },
        {
          //IMSS
          targets: [16],
          visible: false,
          searchable: true,
        },
        {
          //TIPO DE SANGRE
          targets: [17],
          visible: false,
          searchable: true,
        },
        {
          //CARTA ANTECEDENTES
          targets: [18],
          visible: false,
          searchable: true,
        },
        {
          //EXAMEN TOXICOLOGICO
          targets: [19],
          visible: false,
          searchable: true,
        },
        {
          //ENFERMEDADES
          targets: [20],
          visible: false,
          searchable: true,
        },
  
        {
          //ADMINISTRADOR
          targets: [21],
          visible: false,
          searchable: true,
        },
        {
          //VACACIONES
          targets: [22],
          visible: true,
          searchable: true,
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
      }, //BOTONES PARA EXCEL, PDF, E IMPRIMIR
      responsive: "true",
      dom: "Bfrltip",
      buttons: [
        {
          extend: "excelHtml5",
          text: '<i class="fas fa-file-excel"></i> ',
          titleAttr: "Exportar a Excel",
          className: "btn btn-success ",
          exportOptions: {
            columns: [
              0, 1, 2, 3, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
            ],
          },
  
          customize: function (xlsx) {
            var sheet = xlsx.xl.worksheets["sheet1.xml"];
            var col = $("col", sheet);
            var width_details = [];
            $("tr:nth-child(20) > td").each(function () {
              width_details.push($(this).width());
            });
            var q = 0;
            col.each(function () {
              $(this).attr("width", width_details[q]);
              q++;
            });
          },
        },
        {
          extend: "pdfHtml5",
          download: "open",
          filename: "Reporte de Personal",
          orientation: "landscape",
          pageSize: "A3",
          text: '<i class="fas fa-file-pdf"></i> ',
          titleAttr: "Exportar a PDF",
          className: "btn btn-danger ",
          exportOptions: {
            columns: [1, 2, 6, 7, 8, 9, 10, 11, 12, 13, 14, 16, 17, 18, 19, 20],
            search: "applied",
            order: "applied",
          },
          customize: function (doc) {
            //Remove the title created by datatTables
            doc.content.splice(0, 1);
            //Create a date string that we use in the footer. Format is dd-mm-yyyy
            var now = new Date();
            var jsDate =
              now.getDate() +
              "-" +
              (now.getMonth() + 1) +
              "-" +
              now.getFullYear();
  
            var logo =
              "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcAAAAE1CAYAAABwejDZAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NDkxMSwgMjAxMy8xMC8yOS0xMTo0NzoxNiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozNzJDMjg2NjE5MEMxMUU0QkU1NEM5OTE3NUQwRjhGRSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozNzJDMjg2NzE5MEMxMUU0QkU1NEM5OTE3NUQwRjhGRSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjM3MkMyODY0MTkwQzExRTRCRTU0Qzk5MTc1RDBGOEZFIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjM3MkMyODY1MTkwQzExRTRCRTU0Qzk5MTc1RDBGOEZFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+4qQrQQAAgcxJREFUeNrsXQd8HMXVf7N7d+rVlmRZslxlyUXlFmxMAFNDS0LovYUSCDXwUQIECJ1AaCHUQOid0EvoHQyYO8lyr3KVLcmW1aW7251v9oq0tzdb7iTZlv3+P6/3dLc7OzM78/7vvZl5QyilgEAgEAjErgYBqwCBQCAQSIAIBAKBQCABIhAIBAKBBIhAIBAIBBIgAoFAIBBIgAgEAoFAIAEiEAgEAoEEiEAgEAgEEiACgUAgEEiACAQCgUAgASIQCAQCgQSIQCAQCAQSIAKBQCAQSIAIBAKBQCABIhAIBAKBBIhAIBAIBBIgAoFAIBBIgAgEAoFAIAEiEAgEAoEEiEAgEAgkQAQCgUAgkAARCAQCgUACRCAQCAQCCRCBQCAQCCRABAKBQCCQABEIBAKBQAJEIBAIBAIJEIFAIBAIJEAEAoFAIJAAEQgEAoFAAkQgEAgEAgkQgUAgEAgkQAQCgUAgkAARCAQCgUACRCAQCAQCCRCBQCAQCCRABAKBQCCQABEIBAKBQAJEIBAIBAIJEIFAIBBIgAgEAoFAIAEiEAgEAoEEiEAgEAgEEiACgUAgEEiACAQCgUAgASIQCAQCgQSIQCAQCAQSIAKBQCAQSIAIBAKBQCABIhAIBAKBBIhAIBAIBBIgAoFAIBBIgAgEAoFAIAEiEAgEAoEEiEAgEAgEEiACgUAgEEiACAQCgUAgASIQCAQCgQSIQCAQCAQSIAKBQCCQABEIBAKB2LXgGIpECSFYswgEAoEYclBKdywCROyUIBZ/R7VJi78RO3/7GLBcwypFDEsLELHDCCBiU7BQG2kSk+/0aZEEnoXYOZShwSBCykmHYhtCIAHu/NoxHUDaxMbzSBzPIpwzMRGAeiFFNcJM/xkxvNuxkUI0EDI08hzolSqChIhAAhyeAkP7N68Tkzg6NeEIHmKDCKmOpHikxCM9YiP9SDqKjgQBBddO1a6NlCI77c8uEVKD9spTqrA9IZAAd0DyIxbaM48c7FhKRgJHMLHUeNYZNXiOnvAE3Zmn8VMdAUZIUOE8B4XV8G3P+vYGnHZnRoRW796M+LSHgt4FxLAmQEm6daerVI/nr1xh4a7+QwYR8sd6PH9faNLZ+743qxv2DH36ggFREY6GTDnkxLNCI+kED8n955lA0vYGcJazn0aHvqc9LInN7NhEafvnXu8D32jSVTRCKvJZW27CyogCa3i0aR4h8tqcYEMJoxZESE2UNUVHfgpHpmCbGr7tCi3AnUhjjjqIMPYsVuV3lpftO3Lxkq98OjIieitJbRw2OzMjkpuuZud0AFklI5YeJUDZQSICiH0Of+zpnvvCwkUft3GeSzl5FyX3Xy8G4jqNybVy00yQ5EtYPn5W5PrLa2qfWhROX9YJQQW19eHdppkilEfJiK/Y5yzWvFIoUIX9sJ69TjnW4qMGXgiif/ciu7aVHV2siTQABFYA7V7R07PgB9ZWW3QEaKpcxdFvEGgBIobA+jNwHYpnqXWemrrPiQBfvchx3Sh2XEUcC5OlTZhlJhwSlCNg4HgKw+XK/5ydusPkpHCss2C6bve5EwgZ8yRLd3fNbzKlm/7Y073Am5Kyx3nMIjxPJ8dmEHHCR1WVJ+xbO++VegOtH8dshqdHI6TB0LYugWQ/xD4ms6OEgDibvdKKwV0J4WLJpUJyyj5bJWnWJ4q8+qGa2mcWadqqHD64lqWaZyRBBBLg9rX++t2H0pWMoMjU0K+u/2P/v6KxiASONhskChNtlkQLqRuOKiwc7ywsPO02JjwuMsucrHSqz3OGnytzrDRGfueXAyn6iH3MjhYxPe96vQ+q2j+prBjxnsNZdV5sxkiq6Ci7kX08l+PKIhrCRytwGKKm5j+q8vRYyGoLHZL7umuYMXiV5c205T4A30ZVDwRIKmB9oZw1RYk1hUyDrsTan+s4QSw9RnJfeYvHe/fj4faqdbPK6F1AJAIMhTY01h9A9HgIExIZf9FUe6nkvuTgMAk5w4pIRJjox1HskG3w+oaGVYwwb/4b6/tbTWWQ4tc+V3uoz3dMmjQzjZCi94ie/ILoWhFSzyFJdBTsZvwUcZpJmYiRdYHY4ZU6wlHwRI/3tntZy2qzSmTjpjdf9HgffN/jve8Vj/fO+1l7Pa+z89NDWZO9x1JWkawbJfdfbgi3P7O+Q8LKI7YtBBLgdhAU2kkBott9LtNyhf2jr8q9XNeJ9R25z81p0ZFjhBFThFeaZVChQQJ0hQ89CToyMw+5lSWZZ/C0lIgAIiBkGT+l90cd8enJD4XT8IJ+Fq9+opTa7lZbJZKTUz5BT2BLlny11eP9xxOKvPws4ExqiW5/6ecx5fFkTfvVkqCdGdAIBBLgEFt/GqEAIiGF/xd7h2OPqqqTKwxI0K4VSHiWIIDcYirJaED7zChLcOrUg/OZcXemifnYd8/W1m/fB/AtiL3I52lt/fhOA4GEgmn4EyHPKlTbXavlzVR2cEgr2Fdqap/+idINN1irmPm3T568d6GFFWhHeUTs4sAxwKFzEwU7dUXFUYXqGAbvYlEYfyE7XcaOAERPDNHOcIt0ZLOZbToiNI8OS/tJTHtdcBwlOWnKgeaKUXBWX/DelSs9HTm5a84eN/b4owlJH8dSYw9u83i9j74dLpNRPqNI0WoqtJ3JDIMg6KyCBpjmh/P8hKP/DEV5h3hCiH4sDiwUKJHTxoNjd17vw+9K0t/OZaJprJninp428zSAbx+IODUgdrlEZFx9SKfaa+vVhqeGbuv2jROBkAC3tfUX5fZzOqZeaEgoJOW3k0v3+vvSZd81QvRyBP1aJwB7YcvCzyXmln1IC3fo0hSCf5PkMvPHKKLmXrllS7PSsuXh16B/Mo1sRh4cJYFalI2G69dOUICBWJhWcU37ymMgUK1ipRqFoIuZFWtTYMdjUcfUYTyCUb1WJ4DNXKEWTE8jnhEZoidEadD2CUDuOealzziE/f8I8JdGCLq8DjYJ2CE9O7F57b7vRNo3N20kRJ0mhVUwJJpwsJOXTpqVTknymWbXp6fPOlPjyuG5hmLcOZpGbCCIKDG3AKmocxtpxgCpy7yEzlyInXAAHOtVgdgIMEaRZUTOoXcD8xZYG03KMErT6HBY/G4VZEAwKJNgUB5R9zuvrFbltFNew3TVtpSAVUFNSNCy3YVvsxyno0rnWhu6e0nYDeoweH/6uhEs3q8QxzWCzTYY93sxedfxvG+jtgoJvnckQERc5Bc8MjJmn0aApJnflXXCqFFj08FiRpuFMDIKTWYgxRSHgfBXCdB8EgIlSTpS0C9Q1lqCRiRoR9iIHAGWKBk4BnCIHKWEmBC0Gck6TMjWjnAlnDqxInve9WQAREgHZl1RI8Wp76C0e4uN7uZ0OXMKwHgGtWiT/Oy8G30bEAfhmabvhfPOxTgIXbRIG2dfIwEOuvsztsGS9AttvIKM0YWHHw02pnUPWsOlQU2d38mpv9v85kC3ToBRDvHJHCsQOB2aJ4R4FplgIDDMtO1IetrJPnpLO+rzmJLyFM51TgPhaGk1VFWeWFBddWrh1Cm/zjQQpo7KyhNGlpbumWJSJjPS4xG1HYKNu13pXGeDEdeV8Mgv+ANxpthJQJY7e0wsaYFTLw5du3Ca/TZiZL4LjJcLmZGOiYfFlqVqR8mx8lpYKVVIgoBjgENm/Unuy45gp0J7dxecyv5/PUwc6jsJaBpxZEzDbIFvXAKI9mvh4sSJM7LSUscWUJB9VPGz5yaNNb/bVVBevv9YQXARQUgWens2rV62fE6DCQnq44sKubl5ZNzYk3cHkjqZ/TlSHSpV/V4A/o2Ksunnmtpn1oFxDMgo968kXV6myiqgKjEHhJAbTmZnhdAol5yQIstN6+fNe60hcn9+fpFQXHTyUSwfh7OqGMe+y8wbCb3BUFy05+OtrR89u3Klt5dD5grPBVhRcVSm0zntZFZHh7G/SygQVjZITk4pa5OkfVYD7f2c0qZ3vTWPLwrm3X3lYZRkPpCRMfZPAD98ZGAxU46FHxRorI3tBiRlqjotMlyHXawOWB02/lJT+9RqMI+jqf0uosyZjhFZjAXabXyWXgpC0kZbJxTY1Ng8f6Oe9KoqTxoninnMMpTb+sOtRdpBf5sgILr8gYa1dXVvNGlTLS4udeTnH8v6Y/KR7KrCsSXASNb/9ZYtb99cXz+vJ3wZb6eTYLITJrhd2VkHHwwkaU/WptSYuSPY91tZfhcCdH/j8dz9iUm7NtqRRaiuOr1AEEb/iomH0ayCskLv2r9BVtb/UFv7wsZI7TLShrEl512kyGtfqal9ugGix0XjnVeABIiwZf3Fjm+R7MvjeA1FVVWnzGYN+XONpigbaG90kGY8Bo+szD1+C2TUpfbvzNorNfXAvfro0Ln5PwBz7rfj+qyYfuRIp2v6RYxkf8/+LInt6ikgiJk+SbrJA7TjBY/37pcMhLYm3ayLmaA5hydS9V85xNzn2EkNSEAl95+PAJJ7FaveCRyrvJxZ7/tnZx/1R3f1jIsZYf0M/LFNDTlczaz49DtUocl5foqq5TCymklIyV8k6Ya32O2bWT2cHbomuOZS1LwXxUAYqnWY7XRVsvflPJb9OZ5XYEHMCLA69AJ0vejx/P05Th3KOvKLJ44m5RB0HK5Qau2mJxkzrZNp+XJzc6Oib8+iOJYpNOnXWpmdKpzOzLvZ6b5Iim73hbMJKbgjtk0kTcvNPXoKI8ATwCSIvOS+7k9Akv8U07ZDPeVAdlwsSTfPA9p6p8d7z0fm7TqUVXf1H8YQYeyNFMTfBWPD6fqLKGb6JelvHwHd8pisNK8TxbK7WFP6tSCMVJWsTRxPjQBWay3RBYpIhEwi5Ce5L1S1v6khb+Omm5n2t8EqEVEYfyYYL4q3u8URxCmE2OHIGljxndk6NyjX9cmsnROcrt2+Z5r1xdECIvADQO8r7Px9RFKwYs9iRPsgExZfud0X7GPmigwEFt4BtP0U9jiP9ZvybVbTl9zX3s2Ms0f55BfVPcYToeTdqqqTp0H04u0ot5jk/ss5ABlPa8mPWRq9LF93AV13AtCGM4F2Pcm+bQ4X8UiV/DTvw2Hh4go9R7r6OFaHc9n9V0aTX+DncB1+3a/YijNYnu5jdfi9233xgZp888Y0BY5iZ8+eS9wa5I53TZt6GGsbKb+yeGzvlpbPXuCl2d7+5VOszx3HrKO3rXOvBCMahdrEpccTUviKcZtw7OeuPnt3nvucWWelrJ4/ZwrOHf1tW1nGrP0/AF3P8tL9lKZNVQLJeZG1wWsM3LB937E87cey8x37eALRkl+wrwS+YQXYFLrWwZTY/HdFcapXJb+wg5jq3LLcyTa7uhsULcDBtf5CDYzkXRluqEu93gdfl6QrpzBL5ThzcZBcwTp/+YKFH9Zx/PuyDTcoxKeJh/KsKM3zBTH16+AzqNzLOvEU8zVYvk1MmC9k2XIwfZtQ2DKXo8VGBdaW3NdcBiQtViunm6/0eO97rc+Kcv/fqUw4aPaAEqYRMvptyX0Fu+4fz3PckDBv3ivqov+PioomflFQcOZC4IZv66udTMl91V+ZLDklTFI9JJgWMRtzYlZFGSNLOIRj4TIN/ZwKZnHcq3Mxd1J56Sne2ufqNHX9TemkWQ9mZBxwNXv+STp9ZITG6ucpOUSSrmWWReptsWXaegOrm2f6LAb3pccQkqcJKyZMZlbNa0wBuZ5Z1E9oLIDIs7TLVpQEyExzLYmn7elJELJzcsWk5D3+aen89NfcWF8/v41nfS5bPqcLYA4jDfiWWcGTwiH5DKC6yiGpuuoPe7A++4BlpkmmGrhivra9V1WePF4QS99lv+ZoqqS5o+Oj3y9d+l1n+IufJek6RmApJ/QnlnoF6xeix3vH3Tw3aGXlcUWUjHyDCROntsNQuuZ8r/ffP4XcrVJadtbsQ0NRpYQiXWZzNW2qr8BguPQELUDEIFiATCBOZu1udsj6a1ID95Le3gVv2kkoKanyDIgdMNfPggQYvGgqpKb2+e88ntuvYMfVHu/fb2R99wNTaUdb5jCBe5d6LbvnKq/3if+B8ea6quV3Kpf8oOslRn5vaTRel8d7zyuMkz6MzWX23ZL7shMgdgJL33n9ejVEqbzMvLSZZ7HjbEZQPqCNd7W1vn1Qy9b/HsDkioXwEyez93oIRIffCoWDE8Y8HNsgeufU1D63OHxNUuR6Jpx7PN7bWR233KmrVZfOMouy/phicDSf/HreYe/iRW2evN4H3mF1+wbHdX0LS+cPEB3+zmgKfSIzQ20JVFnu9QNn9u706UeUThh/EbPAHCZWuW+jz/fTlfPq/jtX53HgLbVhZer93rwtt20YmVeYJogTHrdXSJ+sffdMYR0jOqZ8EE1+6oVNtzPy69V6DLZseee20FZP2neSdpnbfcFhmnbVdzgc0x6LJr+gN+lWRn41Eat15UqP3+O9/53W1nd+w+rmO51SlQbGy3gwXBwS4KBYf5w9/0aHx/6U5jVrXw8K8wULPljOhNU8azrKOHDSpJkFEDujz2qj0fi0OWrc8CmIKeZsL7qAMxmFR35VlSeOZ4L3Pr4Wv+w1jkvRGZCXPsV/8Ij7KyqOLjNwh4Y/y002Ct/j7/3xTI/3n6+sWDG3e9XKml5GxM8y0vjStNzCiIMigiciAN3uc/dXyZHjWBmnI8soNxcj+qeZkfiqhmBzgT/F3cGIoZjJ18d4eVKU1a9ynuH09db9h1+InNuZxVKpu0cvJIdUKLIOEnTH5Y7Id5SX7VtSXXX6bMl99fVO1wzWHlwG+00GmoCuf6Gh4dk/zZ//Ti3EjsdyJyUBlf3mmREyS4pPv4V9SApt6qy2AaXD6HK/b80ibT0za/Wp2F0slJZV9S98qFfQ6uvrWF5658TWx6h/FI6ekKZVYpiytbcaKjHmfctbGnVEGXyHrB33ejw3n8Xa/3JN2TLAehkRWoBYBYNm/QlM4I9i7fL4kJxtf2Jz86Y+94OsrHzeToKZGb86GczHAQUTl5LdXFPjnwixUWarGWzBfIqOcgN3ltK6vuGrFcCZtt3Q8M2SkDCKhdNZ8Q/gj8WFl3AoPnPepwGfb+4l8xe8Vw+68TBKt1qMITqKNdp/8CAk9wCDaydK7qtuBv5yimA5Pd47bmDlbIwUDQymvLtc1fdC1CaPfaXp3drqXc6rw/kL3mXlk9dzbVnH5AfAOgj7kI0PpaUfdLsk3fjMuLEXvJqSdtDLgjj5fqb4HcvanUP/rphl/kZvz3cXezx/O93jfYQRYH038IMt8JbbRLb8MmwOhIw+nz37cGY9Ldm69e1TVS9Id9cXp7G/l8Ze3fE2q9fV/Vb5RSex05TY67q/bmnZLAInzi77jeOhEHIKCw4/TuMtYO0q7yj+u5t4KUQHAI9aNuXz/XKBpgumg8kSCAQS4ECsP+BZf6KjVN0bT51q3dPW/tULWqKorX3xW6ZDNliTU+6RBQUlKQau0MGMdm80my/ee3nLAgS3+4J9eVpsWKNft7m5UYDYKP5CU1MDSydgUE9Od3XVqbMMXKHqjuJOc+Zu+3T+/LeXcl1/1Ndp4QbNjSVfk7FSknmkJF374IQJ7jwjlyOl628MXesoAs5i+urqs2ayR+5v4ExcX18/v5dXh6HDaOKVo5Sle6COmBPZhitBOFh9OEerZz3pxSpaYqrTOXLMpEl75Bu0Od5sY7tKIVHJR1UkmppeuWzlyl9Uy09ctPiLhuUrHjwdaNOjjAjrQseWxzzeO2+I1M/IvEIXkPxL+Mm2LwTDNX89jQZ9XrsOmKXtmGwwSDKTtal/FhVNyoDYyTMis47Xsec/E+6hSSbEhySIBDhgy09LgsKUKQemUnAFN4AltOfF5ct/6tCQRaij0k2v2nglqaNHH/Z7sF4QPtgkqNgjQULBeMwv0qYEQvKNgwDQwFYDwR3ZVcBwP0NBLDkV+LPnRNV8NS0s7WkxsnZs1JWLo9U7zW9J3TM7+6iXqqvPOJgnFL3ex1SXW6u6BSNwFr0LQtEFxmkHWkxc5OZ1SEafCsazQofUUqB04+tUWfUw6wvPA936PkDX96wOtnI8Eex9Zh8qiGVXZWb+7hnJfd391VVnHgzmSwd4O1VY5KfxrbVrl/Ro66+ttUXxeB94wuO5+Qx2nObx3PuItvqKiw7bj51GcH0btH0zxAa0CB4UfD0GTauqvGx2cf870c74jGlT+xQUnPJ8RcVRbs5zhObmd+4PlT5lL458RwtQr45hFSRMgFEx+lKS9zhdHcRTf/T55z0KnN0dGjb+753CwrP+qF5umjgpVN2gr+kEvAz8KPqJZN8oqodicyYfNXF9AlMGRrIs7238+CABihpBJkSXSTGxxpL3Khk7NXvN6oVtEL2myXqBNQjJELs1E41IXIsiK+H3QPrqivoazCeQBuVltiCU3iJJV+3b2vrFP1es+HmTpg5Fn2/uyQ4xNxv6Jm6E6mHCBCmDKVSzjTMV3HpIhOi1fP2L5qncaVQiSpJmMasqb/nyHxs17Uk721iJqZ9BQmPjh6+vX79CfXf+8CGPGVOWNCJ3jxmCOPZUdc0d/+WllAnipDJJuv6IgH/Rv+bVvf6DDcXUEj09C7/QlZlauFaJIBQcZJSeonRHotPEkjNVjEbfSXLyhAqAr8PLZOQO81w7S5zO3R6X3EVPerz/elIra9asWeQbOaLlPpaTNnR9ogU4FO5PffT78NKHlMtCX/s+nD//3Y0QG21BaVDHMOiWd23oJaOrq07dF+ytCUy0YSfq/gQT8gseKcnT9jLNF1X8YLAGTSPcjZpsek5WZQXfzWQRBDy23uIos5hRWDg+VfsuFKXxZ/v3Zx6UlfW759zVfzxGk3dh/vx36mtqn/4FdDN+szJ334MEJ2cYFUYOmLssjeuQpetKT5viBuM4mkMWLisjvXik/jtmgXXV1D77lcdzy7lAW983TyGp1OGsfqC6+qyD9e0uti1aBef2N66s/2G1rl1HSC8QPqKWvmTnqJ7w5GqjFLu712ww6q9+f6PhhsGCkDm+73ravcKeHjvqbKYQ/IdZg9XafuDx3vNvj/e+F5D40ALcJtYf0+6PjCyCVpQ1D0Lsdix9a9faO358JSPjN8dbaibCOGZRwpcaYRmA2DWBg6GdR1tzxMICJFwXqG4Kemql+SPlXk0Z9Hmx7LCiOEKdLfgL2Nl/zthK4LnNzG5zOZ0pqgUZcZfRlfXvfDdp4qVM2XGMsqlvZhGh5CpJumbP9rYv7li2fM5GrfGgrYPwmjOzOuwZSB0KQpY6geOrcB1qQ+/JOot8KNaLGbneicd7922S+9oCIKm7m+d/wq2VFceuZ5bgzxqioXERIO1Z1dvdpfF+9C2tiJCffmxbLBzlLqAgFBJDgt/3csm912ZQZ7tSTX+i1McsN5PQiEmjI+/N51v6oStp1gn2qjKpnFmDj0nuYkZ6D/4boiO+mCnLZKisfLQAdy3rjx3pV4SF0i81NU/XcQRtJPyUvGzZDw1A27+zlrfJ06dP++1UsLFmKwFNj5ocidyvIxhHifntvnbgL+Wg9gR4Sgm3PiiNN4KJZnzWsuyKQuUoi0MdKwoEFt4Sf2tK2ycj8/AXq6pO3gv4gZRFNTa3hfXSBuY7hViEG0vS16E2WggMleVA+RNZosLotbZ9fGNwFqiV9u6suINZZE4w3grIAt0beX1UQ4ABratWPVzOvFxitt8mydgbSM7vAbJ+CyTrd8zyPyJ4kKxjGanvZdLfJ0Ta5fwF7y0FaP88PrWu4FymOPxr0qSZecAPDI5AC3BQrL+oQ3L/+VesfanaesDvr7kQYndK0AagDXb4xqY3b87PP+0dMHNxMbiSpp0B8N7VOiswIigV4A9yD4QEIaS1JnhvpF6IkGl+MxFNyM/GWwiucRKBH3nGbt514zuCEsf778O8ea/+IrnzHgRSeHGcume2KE590F19/m3emkdfh+gYoOoMxWyLrDiAvxejLQsQaF8d6skvcpaHqAPpySZyRN69sGLF3GbJfcCnQDIPtfAFjBo/9qhfe1ue/EBvQdshQQq+rRwS1hKfdrxdCFmeKebbm9GWD9Rg5ERISlYDLTEjVCFEUCg18K6oShshIlU6GjXPIhs3vnbrqFGnT7XvXVDvSp2Zmfmb56ZOyTpv4aJPVmised4ieAQSYMLWnybodc4VYd7odTomHSZJVzpDlkg43iZh576/1d3UqUCpX1anX1sRIEDG/qWTZo1atnzOWh0Jyhp3VdzaOuFPdLFHPtRy3NCGS4WSAZEwpQrH7UVtCl+FQ4Jg6fo1UQI83oeed7vP7yWk+Iq4CUEovs5d/Ue/t+bxdzR1p2Y1UWuc2isP1caKtNqUdSh2VNdvo6V1RVJF2fSlIFoRoFrMkfux08cQG9jbTp9QTCy/gCZfpE9JIKk5ZgnKykZvbe0LX+nSCIBBEHUOKQU/b9iwsiMt7aPzMzIOfgDAOdZ+1YoFySn7/Ke8zHfy4iVfrQHz2b19wfV31Z3ikQATtwAFJvTKWPs6IEwqaUCybuR2PaLvtPYfmJEx60SAOfdx3KCKgcswkc1NNenYngVq2gsHYImCDevDwP1rywWqt/6UOCxfMLK4vN5HX6uoOHqF01l5A3tVhXE1KqHkb+Xl+9csXvzFun4Cs+qblJjWIaWyRXn0O43H4TocSA8i+hmW2kkmkXyB39+4MkkstZFekBxEjiwjdjJjYgEGOBY1u0FuN234wkh1fPpLnfKgn1kKEBu6LUa+LFv2w4bCwo1nFo464RYg6XvH4V3ITU3b/1GAr34H9jfY3iWBvmH71p9+zz9CSP6lYdnZA+D7jB3fhGLy9R3f9x+9PwQP2vMjQPccgC72t9Jj3UdzjywsHJ8G0UsiDDc2TVAbj88KNL42HIJKaU3Umgp793LMLw+0G2jOiVpMic6AjRKedXVveJqaXjoN6NYP430JqSkzzo9Scqi5oLXOm2hRh3K7Sf0NtZDU7x4i6whI7ultalTnjNkgMRcYxs2lxKZHgEfIMnBmgiqhtaQmiaZNBL57X5u2X3P4woefdzQ0rOr0eO+8itIND8dp24yT3OcfCYM7dwAtQLT+Qkdl5XEFAK4Tgz/Q9ns83rseB/60dO192hifLnf1+ScTofgSCx0lddSoQ37f0PDo8xAd+5IXBHgHgY9ZMskDEI5mC4FV46Zr4yCUOZr4SFyWr+GGpmvXLmljxy1VVSd/K4qTmYLkyLfXutJnFxVNSl+/fnk4YHL3Bmb/J6rIqHGJLBYodm9I0GswwE5EqIkFGFkTSgTBQWx6EhSdcKd2lXsaHdSBR8j6PiZSpWerecrJ5WPGlKevXbu4BYwn+xgF8NbLir725vU+/Py0aYd7kpJ2u1pdCmKvskeqIdXegoQnCaEFiNYfv3EKDkfZn9RzKOzZl8+baFT6nbj7Otmmxo/fZh97rR01o06G2NBovMkLJCGZNOjqfccCiwcqpj9TMJ0BGAg0Lk/AYo3XmrUiTqWi4qjJkvvSUyB63VjwqK198cvGppf+ALT5HZtdMTUne8qkiLCS5eZlNgS/SR1SUzeyLG9ekWD5B9iOCDWxovs+JyePzlPrxPpt9G408IjYzRNvXNhoMTxt61i8Vg14bfIek0fkzpyp649GRBjguF0DlRXHjKuuOnWq7nv/ggUfLPR4bjmb0k0v2qtr14Ti4tJ0iH9vUSRABNeCCzag8rJ902h4Q1NCe19dvvynLpuNPWpqtTrQDbTVhrvMUcA6xH5gvVXSQBs1SfDaKMuoo8P7nblQdaSb1LGq/5ts0qt0NG+pXQz83SgSL7f9JRT9pRDzStS9H6urz9gdYteQ+detXbLV473/3kCg7nqz0GR9nVFIzo68z+bNP3pB3bbJEE7zOgQxy4w1WrbWzgPjYAjxuoXtj8ESrhUd4452OArLbGkjdEstGC6ET9gjYJRHZdXKmk72ek2VE0EsORaMo9JoZ8EG20x19VnT3NVnVURkhcMx+WhBLH991Kjg3Be93Ah4vQ8+5vfNvQzA12Bh4aZnZIzNB+txwF2WCJEAra0/0GmXYmraXmeT8DYoAXnpE8Cfjm5Gfn2fu7rm2tolQhDHn60jQJPtkqwiolC9hqwRnraIwGyaD1227AemIfd8bXy3K9NAcIcPYuL7a/+xYcPKLogrfqkhUcTb8aPuCcjNa0LENfZS4EcRCWr48+a98m1Ly1vnszoxjfAhK519a/vWr1/Rw8r6rQn9mtdhaKmIQQPomLtmzaJ2MN7VgyZQH/Zmi1Lgtb2YNkXIiOOtH6/4mpq//mSIRQGNUWxp55fmtyRPqq46/UCwsY3ZxIm7JQnChA+IUHxBf/vpUkkdRhcefayBDAnUzX/Lu6nxxfNYXmpMdI3u7u5NHRA72QnHAJEAbbs+tX5zsXD0BCdAyqVhEfjjvHmvrjZxd+gH1P0QvbjWv3jJV/WhCTFWSJpcUXG0BPxtbPQaHjXXmmUKRpNISMJCIkpTVuTV/zG+2jECDMKo5RcUu1hRDNcR9vbMfw2MtsIhlrNHZWMhHpcBSUL1GAjPFHRVu6vP3sdM+Vm1ytvY2PTaFeyrNgNh3tXSsmRtVFl7F7xsnANHrhH5paSlC2rUGaNb/f4lr0LshrKKTSuQDMTiUqis8BWv/r7mdp+zH6vTCstGp6x+bN26pR3AX14A4fitdgnODvkFj+6emresFdbSKydP3ms0WIy7ZWX9LviO5cDSWyJth0aGRUjOJcwKFCB2zWSwTa1ft7zd473jSmYJrufnIrCpvr6uA12fSIDxkp++Y/e5GgsLTr5KHV0OdYvOz8B44TtvVhlvrVFAlutt+fSdjqkXcUgv7inOopjsNLDgbHQMKgN/5miUkKipfW4ObwPQ0FOSio1czLnZE/MoCHn8Z3fOWbDww0UQO2YU1swFi90ZBJeBYFfnQwSsyi0HfLK2zLLc2UnD6/WIMPbvkybNzAB+SK3g53Vrl7QB3fIpP/nOmg0bVmgtW2XBgvcXMWvtG35+XMUQO5Ei2A5GjyrPVheJ8+/rrlWtB0671CsUMQTBiQuqa2/EctYOVfwB3nuPfJ427fASQkr+Yd0OW7/01jz5tkHewwqRIFh4Y2Wb7vMo5W7Ros82MqXVYmyXONPTf33/tGm/mQKxO32Q4uJSlyTd8BjTY2ewtP5VO+/l+v6n+cOzX4W80YWn3gHGUXOCbYvSDf/l57rdE4cXBwkQwRfKkUZbXXXqWCDJmsXOvRvA2MdvNqVaP2Hie+P927S5Sp5WXXX6fibkFz6bR2JxODLSDTs9FS2EWJBkjMZuoiY0dHf/cC3/OY7C8rLZBTwrMDl5QhkJRYrRZ8zX2vrxHRA9eSBagPdbRUYqRDYYbKFDwJVuUe50h8MV5eZTlIBMQpa8+nt2ZuZvXigt3TPLgASDlj8FH3fXep9vwUscMpK3BsvMGwsUc6ZOPXQ8p35Jenp5mVqVXOdnx1e3GdQhzwK06wYPfw7ua2iKtLSpM4A/+1GQ3BcekZS0J7OuBPM2SFs+9njuvhX4C9f7STDkaTBjNdnE9Ws241fp7przD7CMQOQoYOV5QnJfcXVV5Ykzpk49eExlxTHlkvuyM/PzT/uEKTG/VYcVPZ7bb9fZyf2eCpJyFLv/HOAv2A9+VpSuZq6q013zBgxezGAkwF3M+ovqoBMn7p4iiJNfjur4JGMfMB7/01uBiqklSHuX2Xph4qTrioompkBMPFLtu3SMMSfArFwwGvshKdXmYi9tOsRuRMolwUWLPl1PlTXc6CipqbPO5nVOQSw+nevMCcy7csWKX5oMhJ6cl6euPXdONM97ajnwZ/yxcmfPtqj55OysKRO0Ze3pae5Q1WwNKZVmZBz6RnX1GTOMSJCQvINjJXHrp/MXvFfHaxsrV3qaZXnRVbwcJSe7z+LVoRgKpB7r/5UX/WXp0m/XGdUhx6rmWX+8hdsguf98DBha7ppXIIw9z1193jHM0iudOuXgMVWVJ0mS+9IzJOnG14AU3gvhsXUDl95mqtTf7/He83fNMIJ2aCG6DCS5ypzBs3ezcP3y2nfwGYsWf76B0vXX21Ons48RHdP/nZS8z/sOp/sdICNuZHU1IdisA/NP07smFdq9VXe/GkD9uoKCEoHXRkShmNN2t7y2aPEXq6Gf5BMd5925LR1KB78eSByhTiTp1h2NAPVrcUTJffWhTPDfpk4A5bhi7u3u+uUV1iEaDVye+hBIEcstsqFqErPq9mbEdl9oh2o78C3x++dfW1f3Rh30R6wIVr0kXXkxQNbl5vf3LGxpee//Vq2q2Zybm6eMHr3nWIdj5GhBKDqDZWd3ay9ot0dR1j0TCGxe0dm1dt2qVbVb9fkAzXpHptmfwITb32LTaXqkfvWL/9mypSlQOHqCq7DgmEuBZJ0MenVYXnxFbe3z3/OUibKyfUemppRXEaHwkvDGslZ5/yUgL/tPc/MvXtXlyDTyModz8inMNjnCut6VVkWpf6inZ9XcxUy4FI8pE/PzTn6TvU6O5dP9vqKsf729fT57V100K6tsktM5lb2blJnR1/Uurl/92PlbNjf6ITY2Zl9cS3f1OYcSYdxtseXZ/MS69a/+u7FxvS8/v0gsLjrxT0Byzo7Jubz82prapz+H/kk6EQJRx5t84bMfYsOAxVjpU6Yc6EpJrprMbmHtN7mUKU2HsfNpQ9czfctZW/l446aP32HvrFvz/v06ImTtYXZ2asqkyUQoPp81vdnW7aH9E1lZ+3og0Lqmfs03yzrb27qhf2E6r02Hdm2H4I7rSYy8LwSSd3G8JaKqVa/Un+StefInfT0za3ESI8wvYg0UeSWrhyfaO375ZtmyH9rUPR0zM/Y+i73v6D5De+Z5vLeeH86/T/N+eyF64X3fe2ZyWNlOMnfAaQyEw5AAjQlQkKTrj2dtXN1iJMXGa2hjfWUTOz3MNNQXDdxL4RBql+5ByIh7wl8Vq0NfieVYaaR04/Ve78Mfs7w+yPrlAVaLyHXC18P6Qj2F9CNIKLhycNdOC+2QREXDpy23sfI+BtGhoyIWaURgOBnJ7yWIE/6qRqjQdeqNQP3LgbimxO6y3evt7fXcuWDB+ysMxkEUyX3NTUw5OTGcd8sAzhH3qhyYf3btvJd/lqSbvw27jCm1mDTR75rtrfN4blGtrIAk/e0tViZmecqrVXZln8v1go4A7eQrN20frF7z9O2bm4PkR00IMNhuqipPkERH2TXsPU/WtwP2mKWsDstirTDfAr+v7u91899cqKlD7YzkXoiORKJ3JcZ4RCT3JaMoyatj9ZGjK6utANokFIJM0N4XalO0S1Uy2OOb1AkclLbVBgIbFjFFb5HmegqxQav7QpdJ7qsuYkZkxOsgm23yEW7HkU2YGzZvfuWA1asXtJoQYERxdWlJ0F39x6MY4V5uvx/7vH5/3dV1dW8uA054NGYd5yUl/Wpu6HnyEpZugWoG6vrNOsq+Z2Vw6gj9w9Vrn75lc/MmrXXs0x1RO1wE6207xQLd3gSIkWBMa1ZuAyK/x9rIeiYbWcNRBKYyhLfdoUIo0LUqFIVU1pfSWXvNphDc7dxsV2n1pi41aIg6isSOxYwAWlRvCBBFZM8RI0Gz1UtpKGAhDS0gVuMoqocgs3bPOp+riAm+8O7RMrNAez9WlxcG06Usr5p0oG+JQyTiiSuLpZGlyA0fyXLbM0EjQenuVctGQ/epeREojaQRminCOpwa3V4WxTQiOjKS/P4taznljIlQU1P77Ld5eYW/Ly4+6khCcg5iFsOM0DiVOIrximbChsLqr+dnqjR97K359ycc93IUSfT6ah9wOLKflwPtHRRkkSoBB8u/Q61HNe9MAAqkb2mHIKvbtLG8J7W1L69X0/D1/qxqz1RRegPBMCVUZvdSIfbeUPkdjrQkqvg7+klCtf7kdevWPX4Ys8IC1VVn7CYIow5gRWOWnrOKBEN1BcN19VmRaig8OVD/Vu28l34G4zFjveUl1M57RbUWjnG7z2cKy4hfh56hKjxCPvusiTijtDErYC6FzZ94vY9p15kqHAIMWLk/9ejqqm1JTZXYO5RTKe3xK0qHQmmvQ1F8LoX6XJQG2KG+A9nBhJNmo2JCQ7FAiSIQ0c/6jKy2JQi2KVGQA11d7Z3r2tevW67dMFnUWUL6kGJRFmtvb93zTlf+53KgrZ3lg7UBtT2o+ZCdwbastulInyKC+lzZ4chU3093e0dTj8V4oN6tHcybt+bxt8ePr/omJ3v28YynDqLgKtVvmcTakp8Aeyd083te76NvQv/OLhElp08+yHK3P5R279tM0bq0vGzf3NTU6gMBMmazprRXiGjFYqIx+Zju9aNC179VU/PM1xxFJ+53jC7QXcwC1I1xaDtfROvTnkXduJtRhAcZYjfW1Kbr1LhUtEdkqYN2hqm24/k5wgt06fPWCgKYh2bSlp9XTqpzP/G0SW05BYhdtxj8fuLE3bPSUseNEYT0HEIcTEAFfLLc2tzatnjtmjWLunVjq/qo/XrCJRblJhC7ADlgUW4R+BOctO9BYZat1NOzesXiJV9t1guU8rL98pKTS8YLQoZKkn5/oHFda+uiNax8PRA9c5j3PhQ9AeqP8ePdGRnpE0sEMS2HgNPFlC9Wh23NbW1L1jJLpotThzwC1FoKMRNiVMvApG84tFa+ri1r2zCv7QVM2h9v3RpPCeJNftGHHXRq8qJvD9q68HHcgwGT4QsHp98Gv59c+qtRycmji1nbDi73kZXWTd1d69YuX/Gz0Rh2lOI4duw014jc2bt7vI/8qKsDMmZMWUpOdsV4Ucwdoyrjitze0tG5fM2KFXNbdfUkc+SF4bveVS1AJMBYAhQMhCFvU1p9g1MMyE/mCDOHjgSdGsHh1AlhyiEfIwHCI27BRJBrB8m15ddvlcMjAF6HojqXkWigPNhdk8QLI6fXYnmxVvXCl0c2PALkRdcxu5+7ZEAnzHnl5e0UYJcA461DyrFe9O1ITyR9QtEgILzIIUGHhgicBm2PNzGMO9ao+xwTQcXEXatXvvRkTAzasp9jVZr1XZeu/zoN+pz+Wbw653lOeOv3BM5vAMbrkHmu4hhXO7pAEVphwduvTuFoo4SjXSsGbgbKEUgk3Ah5Wq5ZJ5INxot4eRE5JKYXJvqxHkGXL2LiRuMRMdUJGW1e9JFrQNeB9XVlNKtWv4O8wCFLMwJUTAiQF9ScZ43ydrHnWTKKCVEZEYKiI3etUiIPoA5l4MeitHKLGbVfRdNW9M8TOG0YLPqJvizE4N3JBoqMlgD1bZ1HgFauQoDYPQYjpOg3IB29gsLbBDhgQ6GjnDagaNo6b89GamEp68tGd9W9AJEAoy1RravHivhEzfdGEeUVMJ5yzCNA0LlljAiQWvjztWQgczRI7romMI5ML5gQAG/GK48AqQExmVkwvKUVsfv4xWrnCseFaRSogBeR3ypivtlWSkRHhkbxIMEgPwrHIteWjRpY58SEtMysTP1mrUocFgE1eA/UoO0Z5YlaEKBVW5A57zHSBqiBQklMiELmtDO9MmFUF5E0HCbP4r0DIwvQaqNiO23KbFb6Lj8GiARo3cGpAdkRE2LgTn7hXG/UiYxccArwN3S1I8jNBAoYuKB4EWKMXJI8i0hPhEb7GMZDgLw8Gwk1Mw3ZjETNym8UhJuYWIHUJA1q0yLSzrAFTh2buT6N3pds47l65VD7bMXCojXbIcXumjRqorQpFm1BMCBkXp8z2q7IaDIMr54jipdsoDxSC2tf4fRBxYL8CKctKgbPijfYARIgEmDM2AI1EGhG1oVZJ6cad4qWJGQDzZ7XwHmCGHQdkFgIYKsxGCOBJBu4A/X54RGgXU3WyFqlJuQlmBA/mJQZLAiQ2BQcZtcZCSs7Fhfh5F0xUXDM3POG1peJ9ae3hATO+xc0v4EFAQKYb8hMOQoAz6sAHBc+1eVJ3x8AzLc/UiyIQjGxuHjuaSOFxKhNmxGeXaWRWr3zXdn9iQRo3sn1mpWi0yoB+GOFVlEX9J2a6ASKEKeWBxbjJ1adxUygE5P6UeJwZfEsQWJhIYBFffKEhdYyEUysN7M6owkIHqMA0cB5h8TAeiMc4c17Rjz73fHa3mBFA9F7R8Dg/YLF+wWbyoLp9km6elJM2huA8ZiZWXumFnkTOH1YMCBOM4WOmvRhu3VqpjRS2M4TX5AAd1BwxgGBo2VTG8QANiwi7eQNWeeuseN+s0texAbZUxvWDNgQptTEctETFImjnNRCIPGERTyRLXgTVgQTRcBsjM9srzViUj5iUY88y97Ozt7ExKoQdAQWRGRmnoGApByiIbr3rNhog9TGd1bhyfRtzEiBoTb6gd22RjntGOJU7uyGJiMmbcysPYEFkSP5IQHadjfxOpUdQrHSHAkYT4ax+5x4yMvMNUcTrCO7ZGxUh2blpBaKhFGd2qk/K4IiBlZXH/lMnfLrEU7nyBHR+yeqQQSi/w6dNN+RSCACEg7CTWh/cILw94TElrEvjegz1e3f2NvTsHnJ0m9aOIKaVy8Kxz3X1zZNpqgbKXPEot1ZtWU7bczMgiQGf1spg0ab4QLPVRhWkrXPlsF4zM4O4YINCzCRcnBjnCL5aXsbrgOMAWdLJDOhaYeYrDR6iENwDHXjpQO43g4Z2+3MAOa7vlMbhGbHatPv+hE1jlhetm9WamrVngDJJUCSZjCdcUooZJc4gV2WteN1aTWSjrIaaM9PQHxrFbmlrrHpa3WrJR/w1zAazbC1q9jEsZWWodsuofbFIaVE82XqETEiDF2AACvSMrIk7ciIgXh0op6zo5EfLoTfAQnQRqcabBLZUffmiqscZp3LQKmIxzowFUqcd2WH+PSTZoKzb93u8yoJyZwGkHIogHNW3/6PwxYyI8Te7wHav2jvmKsGUm6F2BmhAyXCIUMiQtukPQz68xJo2zTOPmZXDtnuL0iASICIHUu5GDThx3mOfvwsJrIKs/TSU1P3PA1I6insq+k7b82rgbN7PuvpmXvPwkUfb4TYNWJGZIizB7dz295WfQYJEAkQsfMIIjNXp1hVeVKR6Bh/PEDyH9XN1Hed2lGDcve8FwiseHrevFcWQ2wMW7PQc0iCCCRAJEDEDq6BGxLf1KmHZicnz7yTgvP3BEjaLl1htOOZ9o6v7l227IctwA+RpidCAJxNiNgJCBB3hEfsKuTXF7y5svKEMcnJe74J4Dp5lye/YE2ln5GRcdjHkvvyCyC8xx30B2fX7qwRE2JuIGNtCMT2BhIgYmcmP/22Vk7JfcXRDsf0H9ifu2GNRYmCAiC510jSDa+7q8+aHSZB/dZG2kDmSIIIJEAEYhiQX9CKkaTr7wWS/RT7ORNrzAiu3Ygw4QXJ/X8Xa0hQu9WPfrsfJEHEsAUuhEfsTOBafjm5I53jx13wOJPlxwzRcyn7FwDatYzSLR5CBJHGzlSng1NAdcBDYGVLmwgkfRr7PDQuXJJzheS+TPB473sYjGOrqlA0SghOjEEgASIQ28H645JfVeVJxaKj/AX20T24lNezmsLW2kBgQ13A39Iky709S5d9vw5MInBYkKFRlB7D2KMTJ+4+IjkpL9/hzCkQhcJZQDKmsy49YvBIcMTlkvvyJI/33gfAfCE2kiBieGrMOAsUsROSX3DX7orpR41yuqSv2E+Fg/O0zqWK3PCdz9+wfOHCjxYBf//HeAIp84jNKiIIgEGottGjJ6aNGFE13ekongFk5EHs6+TBIfutj3m8/7iXffKFD+3O6dwthJAEETb778CbJy6DQCD5Rc32DI/53fQp+1MaeA9r9foDKz6rq3vjRzDe0FS2IEEr8rPsVjwrEPg72Yulk2aNzsjY/Qgg+Qezr1IGXgctj3q899zPPvXaIEEl3LeRBBE7NAGiCxQxnMkPjMnvhicHTH60fVFX14/PLV7y5QqI3Vk7ANa7bRvtSGHXArQK6M1d46gey5bPWQMw59FJk2a+nZmx57FA8g4fmFabc77kvrTD433gCYNyRD7LJpYsArFDAS1AxM5g/UVmJYbJ77rrAFKuGJhW2fS11/vAIwakF9Ac2gXjdjdT5RGInW2NzDbwFXT1EFz2EVEKpk45eGpysnQGkPSKgdSLHFh4du28F78NW4G9OkswoFcC0ApE7MgWIBIgYriTnxBFfu5L9geS/+ZA0lfkxU/V1D7/sZb4SktnjczImH0mQFJBa+v//rJixc+bdCRoHDLM/ZfrgAgZfv/iJ+vq3lgOUdH5r7qSkfXuvb1zr1yw4P01ke+rq06TBGHMyYxn6j3efzxkQppRFnBlxTEVDuf0m4B2LWxseuvBdeuW+aF/+YLD7b7gDEJGHzsAcdPV0/PtcQsXfrQc+t2hPoh1h6IrFLHDEyCuA0QMW++FXviXTd47E0jefxLuSKwr+Xrn3KUnv4qKoyszMg6/HyBzH0aAk52OVIFj+QT0f1dWnjBZkv72OrO6TgdIPcrpKBgLMW7T1JnMUKtOSirbFzTji4KQXwEk9XdAsi+WpOsfnjLlwFzgu2G1VqifCCnM6nNOBJL1u/z8U/49bdpvxmvz6vU+/DTQhtcHUO2pycl7qBNiIovk9ZFizJZMIBA7FJAAEcPV+ou0374QXWnpB9yrDlYlyn++nu/vmL/gPa+WUCT3n451OqVb2KMymPEzt6Pjf0ctXvLVGh3x6d1/itt98W9Ex/Q31MmoLLm1VFlxksf7yEc665BdqzSH1dherfXo8d7zJCOqSxgpdzPSPSAlZd+33NVnz9JYVtqjjxRra5+fEwjUMcsxsII9e6wrada/3dXnHKIlaI/3oaepsua5xN+Cq8ztPv946A+XhpFiEEiACMT2sv4k94V7MVmcsGuvt/eHuxYs/LBOQxR+Sbr8IiBFp4UIqul5j/f2S5Yu/XY98Ce+9Lk/JfcV5xFS8AABwoih9yOP58Z9vTVP/QTcpRG0J3T2bY0he+9D77dufZORXqCWFTOfCOOfk9wXH6G5n8YSKijz5r1S4/H87UiAzg9ZHkQijLtGcl90isYS9HtrHn+ZKuteSvgFkNF/Lhk7NQeio8RorUC0ABE7viDBMUDEMLT+iEbYqoLXFV7yUJ1IunJg/uO1817+QmvNMRK7HEj2/iGq6fZ09/zwdwIOKoqpTNgThRBRDp0FRT0DEajanUSx+HCAjPPDKa9RlJWXBwItzaKYnqXtdpFPojjpesYfM4C2PSwr6z6K+p0q4A+0tCQljS0jpOhuxish65ZuuUlWNv2iM2BJ+B5B/RwItHWJYlqOwzn9NlZFE8Ik/qzH+8CTGrJySO7LrwSSu39iNvPW1zzef6gduCd8RMYEI0pE1PpAHAtEcPr0gNPASTCIXYkAoxa7q9aH233xgcziSmxcizZ9y0jhIQ35+SX3ZRcCGXGY5qJu1qrjXktHmXXHLLABL0Zn6fhDZq9qUcZ9NyMlktT/Z8NDzLJ8FbRLRtzX3gsktTyBrCnt7e8fvmzZD+s0JKidFBO1PhAJELGjESC6QBHDzfoD0IU8I2TE1Yml6mtetPTJyFKHIPlVVZ2yVzT5BR+X0ELywSC/CPElRn7Bu5Oi/yy8cNq030zQWrvNW966kXFUbyLyIyN9zz9AbKBsdIUihgVwITxiuCFq7M/tPtfNmvGMRBLq7v7+X92dHX0zNydN2mOEKE65JmzctFJl3cPszKwaQQFCqGqKqWdGRgoNuynZZ0aeQhKQ/OvUGZKhe7f8gxlejcYWXf9SBkLyzmL5nwLQ9V9Kt/4UTpNqrD8SXfj0MiCZZ4XzuJHSDX9nz3fx7iHsTIN1RQkBMZWSUdeoY4JJSXvcW1Aw78hNm9aq5aZrVi/cMiJ37TOEjP1j/G8j+7fFxaUPr1u3TDsjNXJERerBOKEIJEAEYnDIL2T9QX5iOzzQ1nmLFn26WGP9BTIzDupbPE+V1fd5a578AMxDnIXX+V16Sp+lRdtf8njvfRrMF8L3rwN0X7s/EMcUShs/93qf+MrgPi0JvidJ1zPCTNqTkXAOVbraamqf/VFzD9XVVd8huS8fBST3HHUssajopP/btOmuOyOJrl333lslY84/kVVpnFtFCWl5Iw/8PSPA58KWYACiZ4MK4TxhdBjEDgd0gSJ2eHBifgZJcOLEGalAkhOa+dnd43lNY6kEqqtO3RtISihKCu36UUN++hmfUSRTWXFMOZC860JCX2lcvfapOzUkbe3+I0LYakzOB5vuwu7uH65nVp7MrLkkQSz916RJM3N0igHREWJwdmhoV4fAqtBPmUdMn35EacRqa25q6KHKhpcT0kqEguMzs3KSgL8mUO+6RiCQABGIBC3APssiM3PG7uyrkfFbf50rFi36bJnG+pMFccJJkZ/9/oWPQPQic8MlDw5H2Tn96W5+ZnNzo6IhH6P1etrvwgUj2uup7v6oOKPMct1AaOcb4TtTMjP2PlFHeLx7Q8+mmx6LPNPlmn6GppyBjZs+eotd2pGAI2lU3siJIyF2/C9mUTyuCUQgASIQiZFf1PgfIVl7JJKQLK/8SEtsVVUns3RcoaUC0PNL3fy36oAfbSWKwCqmHzkWSOohofuUli0tn/03/AjFhPx0R2jsjsaSlmxggQY/+/yLngl/VsfhTh07dloKh/xi0lu09Lm32WljKJupB0ybdnhfdJqGhvouoA2vJvBqHBnpU3cD64kwSH4IJEAEIgHyi7ICR+YVOoLr5+I3//xbW+fXaolBFMb1jSNSpfEdA2svxvpzOstPCQt51ar8uL5+fgcYLE43sAIp9E+mMbtHb83R+fPfZhasb264G2eNyD3w97zC6tPo7uxgaXS+FbkgyVVxojb9nt5VPyb0goT00Rzys+8KRiCQABEISwswKFCbmxpAjaEZfzLda1evXtASIZNx4yoygKRMCfNFT1u75xsdcfAirtCcnBGMs1L27GMa2vy1TsgbEZr+u/DFhIJJdBfgbbNE277of1zmXibPj0pPkTd83l+rKbvn5xcJEWJubVu+JhE3KCHZe4Kx+1M7LolEiEACRCDsgLPvX1Cgut3n7g6hOJTx2X/K5hqtxZOdVV3Jkgyn469fsWJuC4eAYja3LSk5ZCqT9RMjxNnTW7+UY32ZWXRGm+VSnfVmRISKQlsW9DOQq2py6a9yOenFpN3RuXQFuz0ces0xtiB/5qTI7+vXLWfk17MkAf3EqSE/ozFAJD8EEiACkaD113cQyD+andLjTSggNy7XkgkhLk2UlJ5FHItJTybBs0DSs/t/klcvWvRZA+c+amZFmvG0BREGP7e21S5Q112ELcg0lys300ZadPnyn1pZTfSRnCAkJWtJltL2+fG/oqSx06cfUWFBfjgRBoEEiEAMgAhDgpUoXfHfLnd1dtavgqjxNBqI/Koom760IKu+s0I7tvRTTOfXBpafjSO4CwQrWKDDxvVRZLpqZY1qrc0JV4zc1b1hM4f0eAROGW9+rvkpEPUc2tOUgChJdToKSnXkxxv/Q/JD7DDAhfCI4WYFhj5TNRhL3ATYtnKlt0lDJAqF/lArlPZ2TJ16SAkhYoCAIAMR5eDkFEKiyYRSIggjSvu/8DVPm3pYSfg6lp4aOUYIBsyOfA5NdomkQ4PRWUKBq4WwJZlawiyoseo14QDb4XRin00hFPCa0gA7BzaEWU3IzKiYOm3aqPXaZxrln4K/ifAtRdrROf+H9IwShd0bl4Ks7qbIIT50gSKQABGIQSG+gQlSMSUtHbo7O7TWVP+PjulPion0CJJ3TVJy3jUDK2XWZS7XzMsSrySSRMTSJ5PE0oHkImwB0oiLOE4PETUiPCQ/BBIgAjFAIhwMEoxyKzJrSRtDM4YUTQgnyJnhPxWVNQyus0ovslwgKg2r+/rjfZII6cSbf2JAcKoFCgOoX57lp3+HCAQSIAIxAGtwYFYOZ5xM9teesbVt4TLV/UkIkYN7/hEdoYQdr9lZM2cRoSQUVYU23rlly2dvBzNIiBy9X2Bkz0A9MVGBUkqys3/7CIBrNtDm21taPv8vIUGXpep+DLkwSbTrVL0n+IlSRjCKmJNzKLMaM85QZ/AE/J5T29qWrg3lIViG0L0klhSzs351ACGj7+fVjyC41N0nxEF6R2j9IZAAEYgdAHLY/clFZ1f92jWrF3ZDfwQYLXFFCfWqqqlb+82/jo2rVy/oAX40F96yh77JPJL0m/CO8P62+vp5+jSi1grq71WPnOwDmiM56+lp2Mzy0Q3Ri+YBOLNZqyqnrhcdo7n1kJJSWpUY9TlSTKw9XAeI2OGAs0ARw9MSJIkIUkfWxIm75+nJIIKszN335n3PzQBxpfZ1IjJyFsfK1H+mRqwROovx7B0YJNO0jExWC2m7R750OrPSbdwXepqjaLZx4VJHx1+3Sm8g0LQamyYCCRCBGFowQS6mJ9DcU9JSx443sExUCtwdrBewh9YPgqgljN1NrqVha8woLFoUi4B5HNGodAvySpnFlST1cTIRqcGzoxbQh84pe2jpPJog/fEHxKbdK+fPf3e+kXJh43sEAgkQgbAlb5XmT1WpG+99ojhyXDT5kX4CJEmTQL9ezoAIKZU1zxaLysv2zYsmGFMi4rhFiRmBcvORmTG9VBMMQJHlri6D+6O+mzhxN0acjoma2owaDyWQPSt+m5wAWK8/RCCQABGIxC2/kCD11jz+bWQReXxyOqcCNDNJu7qXetW99UK/OsaNG1eZbvDMqGgsbe11C9lpfTjVtOSU8RPA5gJ24MQCBX4wbGpChlQQcqf0W7D+utVr524yeEZUPjLSpzAlQBgR5s1Nbe1LlkUyMWXKQSXMok0gyLiQDOaL+JEEEUiACMQAyK+PkAoKxqiLwJfGb6mkjCsuLk2PEOCSJV81ENoT3gFBSM/J2ftAHuHq/1658pcOgM53+zqSUHhoHAROrQjeFmGQzN/023DNb2gm+JjFGGV5Lf5d/08d/1u1qqYzQqTJSROlxN5O23wDwrdXFgQCCRCBMCWFPgLZtGltAGhPXfzJiekjRszaEzQ7Fcjyipf6LcSRJ2kpxiwlX+/Cl2lfKLXUw8vL9ssH/uJv3o72AwGprjq9CsA5M2zFNTY1ffqxCfn1gVm4KczCOzb8p9LTXfNilIFM8g5LJEPtHT+9DdyxRluxTxEIJEAEIg4iZAK2Z00iCYni2N+DZrF27byXf2Z0tjj0q2taddWZe4KNafvzF7y7jtDu98KXpaam7n6cxT3xEp8RgYIglmh2om99cd26pT12LM3cnF8fz+4O7xrR/eHCRR+vj6Q7fdpvJwNJdsf/ZnpWLVs2ZwMYb92ELlAEEiACMUgkGDxatn79FpOv7fEnkzxu+vTfu0Gzno4qG1/u6xRi0Sl2CUuW65/tp6uMo0wsvkTXwcWkM3ny3tkUkg4JVQj1d3TMeZ2jJPBJl2Se1J/3Vc9r03UlVZyd2Etp+h7MZ8GiJYhAAkQgBkh+oBWuq1bVdADt/DCRxFzO8uO0BOiteZyl4wtvEZRygNt9wW+B77KM2nS2dt6LdUC3PhC2LUdL7quu0V0rmBMi7QoVztds0/oj6ekH3EsYXwXdr3T95UuXfbfZTplZ3i5leSwPW23/q619sTaS5pQpB40FSDsgkbrs7loUIUAZ+AEAoiLhSNKtSIKIHQIYCQYx7Cw/jVBV/P6lLzpdux0fd4okw11ett+4xUu+XB4hwfb2T/6ckXHYM+xjPiGFN0vuqytYF8nkhRIL50oN2amGLEvRWFhnSO6/FqqbKoTpi0bvBBGVACMfZ3AhOyF550vu6w7pvyf4gXOPOIrdE1mwrxDI2UeSrj1AQ5hqmFAanU7wjyRm+f429DlQ19j0ylVagk5J3uPqxF5N56LFS75ezSE/2cQKRCCQABEIS6uFWQvhDVR5a+zkuvlvLpKkinnMpquMN+3UtNk3FBQsP2/TpnWqsBaWLfthS0XFqMudzt2eV5c2MJI805xEjb5PPjj+kjrdQJxxjb+pViDL5vG28xVix5621nf/sG7dMnXyTjAQd3X1WYcyCpyZyPvx9dapE4gC4YNnASpIfAgkQARiYBZgRKzHRElRlHVPCMKEf8afrKuoaPRpt27adMcVESFdV/fmUre74BZCiq/vf177c5T2rCTgzAoRTNjCopGtBGnYPcksQZJ9DkR2iaA9/2P3fs14Kjdsj8WSAEk/il0+EaDnU6DddX1WX/8efgqlvmZCso9lJBlen6c0AW19QVcvmrqKrCn0bwbImMUI+Yi+X5VVf1qx4peucB7F8rJ9iwRh/F8Tey1dy+cveM+rIb0AGMdARRJEIAEiEAMkQq0LNChsa2r+86kk3biCEcTEuFMkadWS+5I/ebz/fCicJni9j77rrj5fJkLx31TLEKij0Ot94E4TId43PldddfoPRCx9gqgxPok4ZuvWrz9audLbDvw1cURyX1fOeHMipZte93r//RWPLCqmHzXR6cq9OMxgDb29P56+YMH7ayF2fDLq3qKiia6CglMjM1MpVVac46156qcI+eXkjnSlpu3/SJQLNw709tY+qyG+AMcS1FuBOP6H2KGAk2AQw5X8IkdQ6FK6/qGEUyb5x0juC/8QVgiD5OCtefQDqqy+Rp1lyfjhYEm66dOqypMiM0eJUd5qap/9SQksOJnJ/wZGyNOys4+Z63ZfdCRE75Te/5kIaaEkkguAM+FFki4/1+na7UOWpWI12ktP97cnh8mPVy995Od2n39wfsGZvwRdq6BslgMLT2Xk92OkfGpZx4/74z3sNCaxSutczPJRoyE9v4UFCGgBIpAAEYg4EbYauNZfxALxep/4H4CvLuGHkMLTJPdFfwyToCNEgv/+zNf7w4mh2aFikeiY9pLkvuxcHfnEjEvWznu5tq3t/SOYjfQlBBeXj7pLcl9z0/jxVSk8Sy1kQpKoxePlZbNHStL1jwLkXhm6o+Mlj+emYxcu+ngD8MOk9ZGOJF17MyHFDwbHCKH3286OT46snRec8RkhXlFy/+UOgNR9Eq2utrbP7tcQn5b8rEgQgUACRCAStAJ5uyQErZDOji8uY382JU6Co06S3H/+s5YEFyz4YE19/SOnqIvNWdqMfJRujvUl64/ly39q8XhuOQfo5hupGrOUpJ2YmVkxIZa8wsYkcbi0RJaSWjEDIGl/9rGZ0g0Xe7x33qAjOtngUIDKXezjaqAtd7M8nLtk6TdbIpbnpEkz8yTpuoeBpP864Zeg1D/LyrdeQ3x+DhEi+SF2eKg7TA9+osT+Wl+m3eNbQFgiPBM0ckTceM7woZKHGow5edrUw6YmJe/1+sCe1r2ws+Pr2xhxrDGxbCKfLSd4TJt2+GinM79w46Yv6zY21Pu1XCJJN73LijKd0oZLvd6H3o98P25cZWp2tjS1s2Px0mXL57QbWY687gfRbtZIXYmVlSfMcDim3sw+FiZeN11LPZ7b1SUUPeGjW3dWA5T7NGSo9FumOP6HiOnXA9eKB8BhSICI4UaCesEeIcA+EnRX//E4IpTcMLCnKV1UWf2wt+bJtzkkaOTmAwtiium77upzfkVIWnH96hff2LKlyWySjT4eKoDBbvWa+hEilqwkXX4xQO45A6uTQNv69U+et2nT2jYDAoyQn09XRzRE9kiAiB2LAHEWKGK4IeI+jFg6WvefanWI3prH35Dcf0oHUnR54o8RUokw/gpJunb/gH/JU/Pq/vuLhnwEnTVGwHyiB4HoJQt913hrnvge+LM5zciPF/CaFzlGqKo6ZaYoTmT14Jo+0Irv6f7+dkZ+7RqSi1h6EcILGCgFSH6IHRJIgIhhg/CieC0paGeCRiwfVSALHu8jL0jui5KBjLpgYE9N3c3hdO8muct+VuiGtxYtefWT3u4u4FhjoCFmO9ZgvIRg5faEiHWcn1/kKi763cEAI48BkrzPYNS93zf3toWLPl6oITyfztrTW8XUpmWMQCABIhAJWoGynvwih8f7r/9I7gspkMILB/xEkjpDIJNmTJty5XlA2z+X5fVf1M57xaPJg5bYjIJSG8UUBc5vevcmMbEuyci8QseYot/sSYQRBzDS3p8ZwiWDVdmM/G6vm//WTxzii1iARksg0PpD7NDAMUDEsINmLFA73qUqc9rxwKTwkeyuPu8kIoy5fPBz4lsCtPtHgI4Ffn/D/E2NP69qbFzvB7471KpTEAOLj3DSolWVJ04VxJGlBMRkdXcLICn7sSqYPNiKhs/3023z57/zc5js1DG+Ht05cvgh1g2KY38Iq7488EaKY4CIXdQK1FqDMhjsuuCteexlt/ucXkJKLmN8mTx4WXCVAWEHZIHTVaQUF1evLi6WG8OcRYao3IEQwbskGNJlTF0ru7vmPLxo8edLw+TWqzu0FiDP/Ynkh9jhgQSIGHbQjAUC9LvaiI4Eo0jI633izfLy/eelpu59EzMMJw9BtgQ1uEroGO5o/Xn5iifuamtt6dGQny9s9fkgeqmDH3DhOwIJEIHY7lYgAH8T2iAWL/5iOcAXZ0nuSy4Ekn8SVp8eSrcir3i+pvaZDyB2sove8tNafwGO9YdxPxE7PDASDGLYWoEa8osKRQbR0Um0wju4ds3j/eeDfv8vlwB01WFNRmpx60+tre9czsjvPYh1d/LG+3hRX3DcD4EWIAKxrUhQs1cgaKxAvZUYQ5Z1dW/+BPBmjbv6vBOJUHgC6wojdlGrr1ORlz9XU/vs/yA6sLXe+tOu+TOz/JD4EMMGOAsUMeyhC5OmnRkamR0amSGqDZ0WOZwlJVNycnJ2myUKY36rbo+0a1h8PWsUZf2nbe21361c6WnkkJ+eBPXxPnmL3hWddY5AWPXdgTdlDIWGwI5kSoJ6InTpyLCPHCsrjt3T4SzZFyBrT3Zbxs5VS3Ib0C0/9fqWfblgwQfzITqsW4TYtGSn/2y03x/O+kQgASIBInZAEuRZgzyLMPJd8Dx+fPWIrMzqXwlC3kwgqWXsq5HDs1YCWwHaauXAhl+2ttbVrF69oAWiI+hoyc/PITwzqw/JD4EEiASIGAYkaOQW1ZKh/vvg9cVjyjIz0otHJ7mKJglC4X5AXHbHC4eSEDidTO4A2r6UgsDy7+/o7V05t7191bq1a5dEdqTnbaMU0BEgj/S0QcC15AdIfggkQCRAxI5LgmBCgnqrUE9+Ds1n7Q4L2kg0dshvMDsZsSbCfmKC2E2EtTNl9RagdhxQv+uFdmcHXO6AQAIcBAIk2AQQQ2gdac/60GkChwj1pOeA6HFEUUOkPBIk28DyMyovb4eImN3qOdafbGDpRW+yyw9wTbdTeRE7P2y3qeESCs0q+C8CMVTtTd++IoG0I+NgvLWEjvBZT34ih1CN2jbdToKDcspktJs8z8oz2+eQoCKL2AbEZ6TUDSoc21gY8c4EOxFiGxGg3jWqJwo9iWiJQ2v96clveytz1IIA9S5QhUN2vFmdejcyhaFz7SIQ+vW6+r0wyWC3Occ2EkQ8AUQMCBCJEDEUHgdeWxQ4ZKhwrDhBc9YTn5ESR7ahwDASIHoipxA7i9OI9LTEB2C8yB1JEDGYxMdrv0NmCTq2oRDizc4jHEGErlHEtmyTAud7vUUYgRK+XrFBgDuCBm1kCeqJT1sfVFMvaO0htpXXAiB2gpVicM+gWYLb0gIMHtOn/S6VfRIUxSdQxS9QKhMKlFCqEGAHBYWEi4rkhxjiHqiok8BYO6PBtqZ+Zu0wTIiKEPpNPYPaLoVQmwxeq94Xvo7doyU+Srd9uyWEajpb+DNRc8syQ8LCJPK3oBCi/q2eSfAcSiLyd+jeyGd2PRIfYqiYob+NEYG1OXamirJk6bfdEL3MRhmOFiBvYgBxJs1UI1Ck20wASRAxHKh0B2qnBAkLMRzMP2og8zsBvp2m4Q8F+JPKBsUK3BYu0Ci3J9NIi/H1I3Y2VRaBQAxKj8mG6HFn4BDhoFmB23IWKEFJgUAgEAgbvCTryI7AMJ8FGh5YD7zEPo5UN9+MjKf0nWlwyAJJErHjYGcdiyY4qQWxo/QxdXw6OJSewv7YHOYl3lKlQSfBbTULtI8Ae3rmXA1USZLlbpFSWVRowEGpwj5TMTLhIEiCOAkGsZ175SC1/aGl54F3USRCxPZTwqg64So0KUsUnFShsk/DS5FZ15GJMFo+GZR2O5Sh0HiBiHkxF3nxFtFlikAgEDuxhqk5eDFqtcHZzXYi2WFDofHWAAIYR+o3i7GIQCAQiJ3J/uu37LSTXrQ8wOMNGEwr0LGtSy25r72Q5T2XEXqv6vJkZQgfkc8QtItxCQQCgUDs1CZgZJ2qymcKEEcyUKXF473nsW2Vh21NgISSlKtYodPsmo4IBAKB2DlNQA5DdLH/H9tWlCBs+0ITF756BAKBQHCswm3KD8J2KKMTXzMCgUAgOAbSNvVKbmsXKAXafgmAksQOEUAW2RcCYZ9D435UCJ+j4ysiEAgEYicjOwiG2VXHAdlZCZ2hl28YDlEetvEyiMhSCKfurN10FGeBIhAIxM4P7e4P+k2a/bqzfqPmHX4ZhLaQ+kMOk5ysu0YB/iajCAQCgdj5CFC/8bR+k2arvQEHBMc2KKCe7eV+Czim8AIY7w2IQGwLDHrAXSz/Ll2HWI/m3KDfo1LmHArE7nU5LAhQT35Ec5Y5lp/e+kMCRGwvobUrCTBio/8iBlaHWI/GBMgjQb2rUxmK+nNs48IqBiaw0ep/BGIoBVU8ihY18GoM53Lzys6LsEFtfN4VSY5YfG9UXxSJMYYD9CSoJ0IKw4wAqUlhFU1H03+HBIjYHuRnFmbJzP1Ch3nZzZQAalF+iu2HG6LLytrZ1RUJIwKkBlaf0TFsLEA9+UUmwAgm5IckiBhKIcaLTWukvVMD4UWHYdl55Tbqc0ZCh8KuK7St6k/7N8V6tO1V4REhHUrrb1sRINU0Dt6WFkadEAkQMdRE0HdI7r+cCcRVBbT7R4/37ldtdFC6M5Q7clRUHF3kdJQdCyBmeby33qopd2TYQtkJyj+YBKgfsiF5eYXimOLj9gGSdRTQrW95vA9+aVJ3u3o9mnkYeEQ4JArDtpgFyhtTUEwID4kPMZSCK/K5b7axJF17OkDqPaFfXKdL7iu7GQm+BbEz1cBAI6XDqNzBso8YmS+MHXPMVIDsWUCSDqMg7sV+SlUvYoL8tqamBtlEE1eGsRU80DqMkF9QhlVVnTZaFEbvzepwfyZO92Q/TQhdktXK/vvCxKJRwNglikS4jTwv28oC5I2pEItGhkSIGCpBpm2PTJglHx19Vfox7P83TLTR4Si4tNYKHV24VzqQou9jO5uyWtdP9UJb2QUJUF9NEfkliGLp0+w0K/ZKZatOeeJN8lB2cfKjNv8eMmXTsZ0Kqv+OAE4RjkcDHepn0J24HonOC8HOSh0TYgf0XxaoMSGBgbqw6HZ679o9OGlzc01n4aiy09ifhZSk/JUAydRkkOcm3dVdeNohm/6dymnHnexjAZDkXzNxeixHyTeqvyGd3bgTkeKQyiPH9i6gJN0K2ABi4fH8ldgUisSmNmWUBrHQdM3StMrjYAp7O1ogiTPdoHDy+2v/7nRWl1AQ9iIgf97S8t4/dQLPTqckcWqyatun2+i9E53XhTQ0rKINDXe+xz6LknQTs3jFPfoSoIrDwOLRC3Sj59h5h4PZdgaj/STUdjzeuz4P1qH7ovVARmkIkEaWdmmfZzg5htcWdhE5t12f7wDEcLMCjc7xuKSMpnAbCQ5qM088oUFtkIYd4U7jKJvVOjftIdTVvdkB8OYfJk/eO2Xp0m99musEiN6xWruOVdCTigHhUR6ZxiHwBuu9ay1AMfqg2nKp8YEjckG24aIy8+TYHfYgNt49JNAG7azBs1PXeggQE+vYNTK6ZhQC/bGN9W0hqq3squS3IwAJcMe2/oymXBsRl9V6I6up/0ZC1WjSh12BYScvVgRq5HajYLy0wYr4tYKMMPLzc1xWoCNB3hggMVEcuGsH1XesF3w237udOuLVNdGQnp4ENXKAEmYCijaVDTvWHrVhARKLtmNHASNxtB87yhixoUhoDnV3m6jHRuo48iz9ki+wsKYR2wACVsEObfERTocLCq3xE6qTJk2ckRyrzUcJN10njd2ho7xs3/SwAHToBKL+OxFid/aIEqTl5fun6e51aNITzY5RheNc2vtKJ81KM8kHr2xReWP3J3GEvFEaUWSoTmeH6GnuAl/oheswVG6jsmmvtWN1m7730aMnuBJ47zF5Hjt2miYNGmXphV2gVu/M8p1q8iToPse0nZKSqS61TdtIj5eWOG7c9P9n70zgoyjPP/6+M7ubOyEH4YYIJIQjxw74FytoPVpFi9QqiChYq7QWq1Slxb94othibS1aFUVb8Sq1/ReRHoqKB22lArtJCAlIIlEIV4BcJJs9Zt7/M3u+MzszuxGosT7fz2c/gd2Zd95rnt/7PPO+76Ty/aWk5KzMJPqxYJamRZua3E9M16aMmvQv3OwDPUAkgffH3yDRG6i87Ipsm33c9dBsFzJCJ8F3AUmaXkWI/x89PVueqqt7o5MYT1XXGFjJufhsQtOugft5EhwwWJIuOEKIXEOY5y2fv35Dbe3rR3Tej5knA2ktmkpo5tWQ1kT4MU+Szm2GbG1j7PAqt3vlxyaj7yCSc2EloTlXQXnOD/i3Tz94oOmIJN15IyGpl0LSRZI0rZ6w7j+53Mtf5sKRZp4VdTp/MJzSAd+F9M6B+imVpEva4JRqKNdfXe6fv2rlCY8tPTc7Le3070BZ4PyuNS0ty1cZhEG5ZzaLLyIkTX129jU4rFCSzmuCOqwi7Pgal/uRjbqQl6JLI9LW0VCowbO/qNEsK/tOtt0+4Qa1nsLtDt7j9Gpo9w+83m0rd+z4W0cS7S5I0m1nEKKWzzYFksjPz/dvZcrhl4OvZdMi8vUrST+ZR4hjJBx2VI2QEiqkEeatcrkf/nPo9zuhDe1OuPSx0DlUFVWfLDetrq5+8aBZ36kovzJHtJVAf7afC4meDt/5Jek7NYT4Nnk8Hz5ZX/9Ol0X/gb73w9GEFsyAvM0mpHVxU1PtJujbcwhNh3YRJkjShZ8Q0vO6y/XQkwn6T2Q5zBWEpEyHQ9U2zYe+DOcrLsJaV7vcKz7SHU8NBlF861GuvQWi3eyDoAD2ES/jFL4PMCnCk2AQYwGMGkFJ+t8LGElfBffVIJNI0WeyvHN6dfXLe4nFDgqSdO8vwODcaBG5agVDXhvpHur/e3o2LwRxbdcbDUm65+dgfMzSkglr/7HL/Ys1vMEBkRpDaeEsyMP5qqbHDm+/mZD0i+H7afFJdf8cjNgjxHhjXBbKy5L5jKQ+CPWTZpKdt44d+795TU01/DM+4nT+6AxKcy+DcoDhowNCKXoed7mXLTOoRzZseKnYv2D2ShCRy82rsPt+l/uhFST26i+j6e+ayQ/m7b74LEYyX4ByDTG52D5F3j2jqvqFPdbtfvdPwLjfYxxjZH5I3x6up3179jw2rbX1qPoOtuB72CRpKQi6UKQ764DLdXdZKO2lm+D3sfEpd8x1uR7+i5Eog6iC6GWr/bnQuFxKkxyou7S6Zk0z4ZYLlJdfmW+zFV8L7aX2n7O4PnI/YcJgQlPnx6flX+dy3X+9Wf8ZN/Yb6alpU1aDnl1k3qbHb4VB1AsGA5Sgxyg5b7kEivJM7Pi2R2Eg9ASJvd/O7KNAH1C+wvbuhNM4EQ3DEOiXIPwpOX8MxiXjL2Hxg9buXNTd/XaxHNgxGe6f3eFThotiMRjm6EuG48KPIFhR8VPnbxN27PtyYPvXwGCv5C6dC6dMDX3Es+HvjBTHiBJ9aBPSWhETP+8fQCdvAs/plxovguY87nQuOJfLk53SfBCalFu14qcagpzHI+IHeevRVkf6HZUV15TqyhYtnyTdtQi8sV+GxE9xM9YyS5brJoInwRks8Rt5eZc9x4eyJOdd91E68K+Qnxui4hesAsVjFiYD8VsVEz/5H36/q9LjeW8MYV0/j52ffq/TOX+iLp+G4TBV+HTeX7Tdnc6bRxGS9WZU/FjXEo9nYwm02elBjz10+FBBHPWsdbvffUdM/JRPQbvm+XwfTWHs0CKt+EUFURN2bW9ffylTPrtSPZYTqCOR63V1vTMDxOpMyNNHWsvkU3Qh9WB6zsobx0F7rwuLHyTbcRvXn+vDpqlItJU+QWIvzg6mYxMLiwlJvUcrfqqgpd8TEb9g39ZgnwECNY1Phw/lpqZNfTUmfoG/er0fjuvxfFAKA6EnYq2S+WhFxdVjDEKqViHQRM9w0Qv8gkEB7Jvipx1l0tyfcsapy+Va/srOne95qmt+3wzC8yQX0T6zomLOOCNjKDlvrOC9NUo67nO5f/X36po/NIO3Asbb+5bOY/oEvnsTjMCLx49Xf6oRP+ePwVNzXBseef/G5Xpgkcv9y/Uu188eJ+zoHdpowMBHOSNm62h/67dM2QPGpufl+FC8771AoGaat2cTjO69GzUdVRh6uYEAQl4WTg0ZxJDX4HLdM83tXrGpuvqV/a2t6+/Teh72iysr5pbGjFfbhyDa4Fn6XtPaLoUPb0WNXGXl9ybAJb/NeQXrt2//c0t9/dvdLvfPoB2Uw7H6HTCPy6/RM8dEk3QESgtui9QNtHt3y9G1L9XXb+yGNjsI9cy1O2hKxTXjw9ez8/UEhn8KiN+ScBoen2/L5S73Ex/U1r5+0O1+fD1R9t4eP6LWPutqbNzS7a56Zgslyh6NToavtWvX+9AXX9lHyPH1uj4kGIkyFQbczvXnTpf74TWx/nz0aa5bTC0vn1nCl6n5wLoaRW6EQVX3cp0dgzqTP1bkhlndXW/D712/09Zszmy+H0by4nQuPAdOP4fz3Nbv2PHX9rr6DV37mp9/hBdTURg226A9xVCohNEEA1mC4ocCiCQOf+pDLFR9nhH7kmaWjjmnIHIzM9ZxiE9DFPLGcTc4Z4DzZ/HHBfyfbOEMi0OWm57T5iawF4TtJpd72b27GzZ7NcaV5i0LC87+cGgyaqBc7kf/DwxRM9fFhjgr558dyVND4xafu+q5OhDud7RW17PO5Vp6Y03Nq011dRuOebr/uZRolh3Yio0MPKH5v4qlcXgJb2z37HGDxyLX6arZETHsLvdv3gfRXiEHPl6hkwDDiRYCzR2vNW+2obx3GwofR34Ti008QCEJwxj+0Aqu3dP75YwbFrmWwjpatQOEvIq4ugnWT8EvYml4XqytXX+EN+IgbO/yws15MnETi4hmWUTwOL6f2fWrJhiRRQOvC/4KY7hyZY8b+83BsXS8nXwa4PGN48t16OBnQlX173b7fXXaQQvxfdTc/NxlVdXP14AgH4d2fRjKdZRL6TTdgCSYd0rTy3Xe4sDI9SgV7JT3Jqm9xGxQQ80FUC+GSB8CJ8H0/RAo3GC+12EUXxYWpq07d73fGW47QWGegG7+dWQ2nHbHCioO110jJZKG+mlt3dZQUFDiIdFnaLbR4d81z66clddNhMMjaQmSdOcyuPczwqKhwFjYB2mkar3AXPDSyL+1gibm8scorHk9l2/i6TniTUtXuuESmeFE8rj8Bp+rOZ0LQFiF0eEU9oGgbSKxqefBsxjb/wClQ1epMSwQ2Veqql/cpRv4UUrTcg3CV/yEleAzNb+/cavNMTEaMmSs5Z9cnoVw3evbwWoXmUhb6ydXhEVSbffUSWFvqga8zeZIHTDmk3ViExEiOZKm03njGfyzOaYceJMYTtzwg/eWUpjAcFNd3RrZD4fOk456SETz3K0H8pFRHunP4G21RstFAroFlUKerh+Geo+YO1B7rY53Dh36jITrIDKIg3I58sPFyBs4cETqwYOf9vD5UeR9mwRxTMxnlfd+FMnLoUN76ZAhfJmCe6XaSOxl3tH6UT1AVDcUQOTkil/4OdEDj0jOxe3qTby3+QV1dqI4dGhxev/+F32b0vzv6gwh44yyHDO2TGO8qJCuGpZ9EUP42Wd1voICuQVOjYgbTcvIFD1dx7VaJvT/Oud3gBFKvzrxuNY+hDO4YcOhyw9NzeeMJbHZ0lK14UuN8QkaMEr6cRNm/PUGBpq43U9vHjv2gnPt9rws8C4bDY07paJBG8QJ4Pba1w5UVmROp+KQaUxp3eauenares3yspnjbfZiaAdxGNcScjg//ABC0A4CDMUv6oG5XA8+LkmLu9TVD83NLz6lpjdgwPCUIYNnXAae77XaLAeTFbk0QMVzufph3d2exk+J8XR8vp4NZ1yGPryXwyjRz35UBU/TFxSRa5PoddRQueRcBOUSspv3/159/iwOGzYmvX/BhWq55hp442J8m8i6NhNydOUPlpkPjthsDlXMAvwgAQZEDc7K+VfA+OrrCjv4XnXNGvWZulhRPscpiqd9j4QEOFIehWjX9kXbzsQDxHf+oQAiJ8MLdLmXrw6PsO1gPG4hNFu9ObM46yeETtIswI3dqExu442TKPRXt76qJdo1apxxlo+A+OmnckM6juJYOv5aGHm/EetHvBGg4SUAokOW972rN7bxI2amn04uasUqKig0asBoMCwaGe0f1Bmn6N/6+rfVsN8R0rtFx3woMLp4uar6pZ3wR13eITgrvzeVCoOvAy/tbJPzIwIok/hJMIqFx8VNkln+Uqzdb/8RoTlqu/fjykc5b0szQABHdRwvgF5vq58YP4cUtIMRw0XiRgZe1OafaR+pUIXvi5qZoC73I6tJdAblopugXOpEpIz4S2h2VOHSUHSPb6iBIDNBI8+KbDSwIe6qVepAxkWCzwTnn0fpQKjjlDPC/RQyQIXw0dSsPEmCIogCiPTC+GpEEAzgNWAobod/hrZdYkd+w4jvGKGD7qIRO8gUvQAqoe8P/Z3S0+bErtDv6n65eS+0tR4LiltBcPG3GAsrsaN/0YXklLC3lBk7xlvvcj+62sCgGm36q1kDFzdiZlGPgsSLaZzBJeCdwrFiPldlqQmMEzOvbNNFzAonENHRflnZZaPs9rL7QJdCMxFZzz8Z2/9HKgy/GW6pUVwaIld2Ia4u4z0wQyGUpNuuIqTfIvhvOEx57Emoe7Xd79SJDx/6ho/Y36D+RBK/MDtRX2Qkbr6AgQdo3ab63XWgP//4KkLzFkb6M2Mtv1K3oSG08HYTD5BG+7P+WpTxfTVyRUqMB1lMlx9aUTGnUhRHL4E2lcLjhbcV5cB6QSy6Ay4/iLtG/OASQQFETqrwxYmgJN3zGNycM8PeTkOP558L6+rf2j9hwvQxDsdgzjhFBVBjVN1Vz/1bku7aCN5K+K0HQuHIogVPeQe7fun1HmnPzj735tizu8Cexj2//xOJX5fGNJ4LdUzQGSdeABUL7yHe6FKmFwSzheE83POZ4CQHkRi/w89oazcac1Xjnt/oyxw1dM7KG6YQYcQz8HNKyGgfWOp2P/HnoCcj3bfQwAOUub9mE2BMQ+CSdDe0e0p4ApO8x9uzeeGOur/vHT/+4uKUlEFG7U45L5C/vx2U2tT68pHkdyRJ9IYQvZeuax9FMBMMybnk14SmfSsSvvZ4Nt1WX7/xUEX5lZJoK+QHJ/o0eI9Xj2BVHpBWwaAfU6dzwUWUDv5N7Li9d7jdT78ZFGlpqUMn6HwfU7iIhkB7d38jfQCcBfolCINK0pK7YuKntLe3r79WFT/1ZhTFnAEmo9y4LZ9crgdvIqxtJdysgbDTNDkl5Wt/zM6+dAMhWdND5/t2dna++cP2tmNG4kX5jZMZsY8pLp5cYGFIWdmEGaMl6Se3ji09d4CBsJsZMCFsbIx+D35C4Vm5I/aTfcKoUZP6EfPtp8Do3nRBednMkXF5YMRqG6voZ/z4S4ZToeh5GhY/8MAfA/Fbq9Z1Slq6SOKfQZptRZdo79LwziRL7oiJH+vo7Hzju6r4keDzLN0kkJhQcLM2Ze4BrpCVkT50ADGejaoXCkrM9401GygIeq+MMWa43Zgk/fSOmPgp7a2tr81XxU/9XRAyCrVuO+P3MOXX3QkG3qbuo8sPicuPWFE+u0wrfgceiIhfUdGEbGL8MlyjWb2WAxmrfm/xBhAEBfCrKXqRT3n5LDB0aTHPgh1/rbFx2/HozccCAQODod+7Mmak2NEa9eFZ6GjvdjCSLcEP82wmbN9yl2vptbt3f3jU4KYNi4X/ABdhErIyp8wlFhsQ2x3S44Tk3OBwDCi0DBmxRKNjFr8/Jgsc4EOgOdlfv54YT/KAUf4Nkwkd9FubvfS2JISYGAiokOKoWMiFHD37mv/4QiQvXk83NdhSzGzZg5lBjH4Pnj0MLNJu59p9PbRLW6zssmzS7rEPi76UNZi23TFMIgknwbBE/TKCTOL2SZX9FmHJ4Gfs2POhP2ffELtc59o9e6q7YiKqKAZepNkAghiEX5MR7Gg6oq2Y89qVY2FvPni9QMCr7a/UdE9PswFbb6M+CIZAEU0D2YqmaL/xH+NvcEaUpMOpTuePZlI68D640Vs8ng9uqK9/+0CisJE+dMVIp5uSrKtiKfe7dsKEGW/U1q7T7/upSM7Fd6sTVkFo/1Vds6aaWM6KY4yYv1nBpHwdWwlJv4DLy/WVFfM2V1W/8C8+lFpedvkoQkf8NhQ5O/SyQRhUH45V9KHY3Nx8ARw/icuv7/Dh5oAuDEgTeADJ7gVJHfbiSdqvAi38+QrzesWE7X68ipDUaP+htFBtt7UGx/KdSAHvXzEJGwu8RxlfFluWtkX9Pn2Z01JLJmk7lq9VUy7F0yVohuWCvk7NFFo26FeylZAPGToaPHl7JZebbr6d9u3b3VNYmGitZuSaLJlnqQh6gIgRJpshU/16OUKzvhG56YYOLU6z2UbP0YyXlePBxb+njazUGKOKiqulkPgFjWmbzZbdb9zYb44oHj25oLj4zP5wfM7IkZL66acTMs1SgNbWTe+At+Hl03Y4Jj7rdP7g4pKSs/JGjnRmlpfPHBd6xpMVDN/5fbXLdOmB2ilenQD6CTdpJiB7fTrD7NcLaHvHh39jujcZCGLJKkm67Qfjx19SBF5UkdO58CqbvfI1GlxG4XvLXfXMh/ERP59H50zEGVq7PZUSzT6jQnZlxdzJkTOczvmXMGKL7dPKFHW9GRs1alJWRlZ2Mi+51YmJkK49MvPCSMoDBgx32O2lunbvCi6MLyoqj05S6vHu3KAbTpUEZ5JyJR1bet5gKF1J7CuxoKzsshISP5EJ/irc4nvbiPLyWZFF5AwGHmdR2v9qTZapIyN+JGVL1x6Tc37kp+HDx6bbbKOu0pRL7gwu0j/ttApNf1aYz6erSv7ZXvjDb/HGFI+nI8C3a1pKbgq/ZpURYRCUvTTyf6dzwSxuxq06ETm4Obd6nxjor277PqXHJCqCoogeIJI0rKNaOzvcMUGS7n4aHJCD8D2M7oV8rcdY8n1Jum8x6EnTHlJ1S9SsiSO4t1U7iu12abUdzENq1KQH978MrhuUpG99CvLyrsu94hmi3byZNDVtP56XewGIW/5iTgwyKB32QGbmUK8aGtQYDdKxcnvt2t0kbgKKI0trCNMLeMHr6Wn3aBfUCxlEu5kxaWzc1iY5p0Be+uu288q7JSXlzFt0IUJPT/c/Fuu8v2CeRCFb+zJTmlKk93xVb2/oUHm/uh1o1OKKxer6zLcItalh6jN1aYyUnHc9xWjKpPS0rdO2167b1QvvAP7f1URIP16Cx0K7Pwftvg+0fLK6JFDb7sXXSdK9C9X6b2qqUbdhY3V1bzRJzsp1IJ4zYinn3iBJS0oJO/Z2cJE4zZ+nijl36XS7feKrkuRs83je+059/caD0bZjnm3gm06MNIjNNuEJyXkapCPmwGlfjxtdCyPvhDxf5fNVP1hb+3qwDzClbQ/VZN1RDvX0JAxOoD9nTtX3Z1EceW1ocpH/0J491TdG2kQAH1l7tZQBugGTWitcu9IM8GwDvLA3NG7pgL5+WH0bUzjCKdrtTihT8ftQTvguVdK2Shrce3c9zUhKxejRtnMbGj46Fq0bmpKj8+ELifn7KxPGm5H/DPg2iL7lAfJv7I5st2SXpPs3qHMHjM/0VsHNXx7nzbP2F13uXywn0Vl3N32b0EHLepcrn+vQ4Veub97X0E30r6KRloDRSjvfWry717ncD/2EM0ysouKaCaIw+ELwDueq7ix38HHC2tYo7GiNQDMKCc2bBuWaqE2vcy1jbZvdVU//jWjeSnHnw4SkTzOP37IAUZrmqDNhiWYm4q0zwciVgvGeDclka8/qXgv537mr4beruzo7WNgjuITSwb8yvoq6ObTcBs01Wv9Ld/c7k3fufHd/2ItVP5q3AXCCLBDNJt/Bdp9o1u6MOMbrN7KGOoI6X35PpJyDB49KGThw7u/DW8n1An+9p/uDBfU73z0Qqa/SMWcXpGd88wNisOFAOE/V4R2LNH1RDtTOqa5Z447Wu3TfWsjPWIs0yuMGBax9DfTnZeq2aampZZdCc12q3XggeMxLjB3dog6uqJAHYpp+ofZ3z0YYkG1yuR9fE+sDt1xJaOH9xnlRd5JR28hWpOtPvtZjr06FwWAn3FfTCckYD135ivBmDdyBXXAdT7XL/euXicXbIEjojRDsK2r3TtxHwLdB/Hf6fpG/Pu/WecF3zWkNbhthhx91uR64npBjz2t/a38JjMXDmo7mfmId3JDre5cFhzSg/4zv6vIU/LhcyxaAwQEPUek0CAftZ6xlKYjfT3VemyIKucPBeC0IiZ/qLUY+NFP1TgSaWwIe3eyQ+MV+V40OnHIZpQXnE+0rhmSX66FFoU3BlXYDEd8k+6u/BeK3JX6klnMZOAbfV8WPBZ//RK6npp8Ov+V9jw8Dut1PrgeRXmEg9O+0tv15ZmfnhgVEEx727fD7t00H8Wshya8Zix4TavfAVl27dxDWskJtd8pantL+1vGHsPhFFt/L+/c3dh85+upsaPu1+nBxsE7VNYUk0Bg2+LsIO/qY1/uvaS7X/Zdz4hcs/85dHxxW5AboD8ohXZ664PsfyYGPfx2yKWoddm9gyqe3NTevrATxq+LT8Xg2QZ37a3RptBN26BEoF9T5sd/p+rM6mHtIPd9m75cN/eSmkPjx/UedRpVzDaV55dBHLlLFLxSq546haecRWnAd3ydd7sdApDqejW+Grjf27//dTG/PvxdpPUuvy+vZNEONhISumT8Lus+8kPhp8qNA35oNeb2OmL/DEkEPED1AAw9Q4wmEP3bwQNT35Q2kxNvZ3rFlS3g2aPC8yop5X6NCRn7Af2Dn9trXdhLt/pPU6Zz/DUqHLg4u6mVHnpGVIztEIWc0I7ZMSmxh70c1kPYcuFw2o6kTwbtwgBne7nItnUl0ezFG8qp6BWlppRMpdfSD8wOK0n3k4OF3Nx880OQlBu+/U08cN+6iQkFwpDDFrzCiCIzJIiWCjTG/Akb38LDhpanZmUUFCvP5+bEapaLt0OGq5qNHDgUMQoi0uPjM3MyM8tMh2zmUKD0BuWV3Tc2rtST+vXzBfAwcOMJW2H/SYEXxQT7k0KSi4PoyRiF/9o6OhpbPPqvXP8sh5WWXjxFtA8vV4+TA4Yaa7X/aFcnD2LHnD0lLLXYyEuhyu599MzzK95l4f7KBB8i/QSH4gXYH79Y+GIzv8ePHq7bt3r25XdPuNL1/IHCwjmt3/d6jwWPHj794hMMxfByFNmbEd7ynp6Gmvv6dAxXlcyRBzMh3u1dt0A9YSPxaSjpy5MSsnJzTp0A6+Yx5O7u661wff/yPo8XFk/MzMyvP7O6u37pr1/sHick7ECMN6qz8PvTJlP6M9LR1dLi3NTZujQymaGXltVMpTevn9zXvqN2xfjefTknJWf3s9pwMaLdwP1Af2qqTZaitrn5Dc35BoW3ggEmDFMXr04ZkU2zdnv1H93xS1Ul0W9CVl88aJ4qF4FHLst+/f/f22nUNXL0VQb2VMdbTVlX1/Ht8Xxo+fFxqdtbI/tBXvXrTKgppcL29h+E+7dC1ub790QP8gjxAFMC+1RkiMzL5dU/RUCjR7vYfWYtktARBM9qsrJj7P4I4ZnXo154PXe4Hb+ZCrUY7uMjqpBlRHLtSXXztct07TWesCTGf3Wi0C0zcC2y5CISgKwu18IxM3+ZtcK7BJA5+b1TN+UKC8ujF1mx9n8al4YydkfjxBpCPyBi1u/pvB/ed0fWYhdiYtZdRnSkWbUcM2s1oVxmrPsCIfjmL9RIHpjtfsWgTQsyX5BCDgYFZmyaTF6PBgVHfk7lPQPcXBfALFkCcBNN3w5+8AeF396Dc90Y3vWb6+pAhox2COPqhaHBS/uRZAzHSP5hngpAW9gp9DSZiohcdanB90ze4GxyTrACaGcBkRFAh5m9jSHZ3FGIhfnEDCRODZ2QwqUE5+XYPWLQ7vzOJkQDSBGJvZeCN6ku/zZvZoEGx8khNhMesXKZvuyexN4SYbshgMYAiSebFbIBATMKaRgKoWIgw8gWAAtj3hE8vDlRnCHnvIuG6soL8iaPBVg2J/F8UT7u6ePTkpt0Nm9uNrjloUJF90MBvXUHowEVBwQw0PM3duEYGPBmDY2QoImUy2hszGQ+QGIVBLTxiJQkDmKwAUgvx0xtLWR/u0tUjMxG+ZNs9UTnNymg2eErG4xJ04ickGAQZrSukxGTHngSDKbNykQR9hyToPyeSF6NXW+kHALLJ4ARFEAUQsfBaiIlhNRulav7tD7QfFflWpmnnZWVffIbkPGcjIz1NhPi7QyfZMuG3YYRknBWdis5aHqqu+UONwY3MTLwwlkTIUu9JKEmKj5UAJjKCzMSDYCTx7ixWQkstjCUzMH6ySRhWPwDqTbszE2/JKkxsFeplCTwufuBital2sl6XXkBpAuGyWk9Hk7ivSIL2FyzSTNSnSYLog2wRokZQABEDYxcJo/DfiyTxdlrBT13dG/slqWIFIVnclk9CBqFZ0ynJMrm80srY/qVu98q/6Qx3b25g3iCTBMKVrOeVjAdIkjTGRgaQkOQWJ1sJIDMRQSXJMFhv250Z1K+SoK6JRQjUarDQm4FLovwQC/GjJgJoJl7JtpuZaCWzVZ1ZXlgS/T/R81nkCwInwfQxuNmg1CBMZDbpglqEucLvXLt1LqH9fqh9wacmHSW0Fq9jfXvH+6saG7e06oRPL4LJhHESGQszo5MojEUswrCJjHEiL+LziKCVF2xlAK3qJNl2ZxYDBGYi7tTCwyEkPmz9eQcuLIHoWNUjIcaLxplFe5Be9J/etCkxqedE6TGTQYWmD3xVJ8CE7d2Jewtf5lmgSEJPxkgMrYyPkeHUzywUifVrjBQD0QvoQnjJiCBLYHxogr9Whof0MhSWKK+0l22UrJBYPYNkSYhCMu3OelHGRAOOZEJ81MJz6m1+kvHeSS/bzqr/nOq8WPUBvTeMk2FORrgMZ4H+14U/jcJbNMlwX0T0FE78zK5jtoSB9/RkkxBoollwyRqKZMOPyY7gSQJB6u1gJNlnTjQJA5jIE2Un0O69EYpEAwWj/LEE3vbnFYveTGI50cGLVTrJhsJ7s5UZSzAgQOH7gkEB7NsiqEdO4kbl30Bu5nFYTV83emZlJoDJhkETGZ0TNWI0gVFM9Hb4k/UqG2pxrUR/rbBq90Rls3pWlkgAEwmXUXrJ5Id8zjyd6vvrZOYl0f6fOAsUBRDpxU2q9w7MjLZgIHRG67sSTYKQifkEjkTPsXo7Qqaf07CcLANp5VUkayw/ryE8We3em/qhn7NOEglZb9JgvczPf2qQSU/xPXwqhR1BAfyvFkKWwDDzs/N072/TjDj5aexG11NMRNNK/NhJNBR92Qv/vPlmp7Ddeysw7CTkmZ6EeqJ9sP3ZlzRtBAXwK+kZGv0uEPNnUJHwqEySnwavGPwlBBf0flkMM+tj+UFBQFAAkVNilCiJD5vpBUshyU2DN5vGjeKHIAgKINLnvYWI16eQ+H0vrQTQaso+ih+CICiASJ/2AiMCZzTpJZEAEmL+nA/FD0EQFECkz4ugPixqJn7EQtxQ+BAEQQFEvlQimMg7NBJBq6n6KHwIgqAAIl9aMdSv3zoV6+oQBEFQAJEvlYeIIAiCAnhClpWhbUUQBEH6NgJWAYIgCIICiCAIgiAogAiCIAiCAoggCIIgKIAIgiAIggKIIAiCICiACIIgCIICiCAIgiAogAiCIAiCAoggCIIgKIAIgiAIggKIIAiCICiACIIgCIICiCAIgiAogAiCIAiCAoggCIIgKIAIgiAIggKIIAiCICiACIIgCIICiCAIgqAAIgiCIAgKIIIgCIKgACIIgiAICiCCIAiCoAAiCIIgCAoggiAIgqAAIgiCIAgKIIIgCIKgACIIgiAICiCCIAiCoAAiCIIgCAoggiAIgqAAIgiCIAgKIIIgCIKgACIIgiAICiCCIAiCoAAiCIIgCAoggiAIgqAAIgiCIAgKIIIgCIICiCAIgiAogAiCIAiCAoggCIIgKIAIgiAIggKIIAiCICiACIIgCIICiCAIgiAogAiCIAiCAoggCIIgKIAIgiAIggKIIAiCICiACIIgCIICiCAIgiCngv8XYAADx4U/qFBWsQAAAABJRU5ErkJggg==";
            // A documentation reference can be found at
            // https://github.com/bpampuch/pdfmake#getting-started
            // Set page margins [left,top,right,bottom] or [horizontal,vertical]
            // or one number for equal spread
            // It's important to create enough space at the top for a header !!!
            doc.pageMargins = [20, 60, 20, 30];
            // Set the font size fot the entire document
            doc.defaultStyle.fontSize = 7;
            // Set the fontsize for the table header
            doc.styles.tableHeader.fontSize = 7;
            // Create a header object with 3 columns
            // Left side: Logo
            // Middle: brandname
            // Right side: A document title
            doc["header"] = function () {
              return {
                columns: [
                  {
                    image: logo,
                    width: 60,
                  },
                  {
                    alignment: "left",
                    italics: true,
                    text: "Agencia Aduanal Alfonso Bres",
                    fontSize: 18,
                    margin: [10, 0],
                  },
                  {
                    alignment: "right",
                    fontSize: 14,
                    text: "Reporte de Personal",
                  },
                ],
                margin: 20,
              };
            };
            // Create a footer object with 2 columns
            // Left side: report creation date
            // Right side: current page and total pages
            doc["footer"] = function (page, pages) {
              return {
                columns: [
                  {
                    alignment: "left",
                    text: ["Created on: ", { text: jsDate.toString() }],
                  },
                  {
                    alignment: "right",
                    text: [
                      "page ",
                      { text: page.toString() },
                      " of ",
                      { text: pages.toString() },
                    ],
                  },
                ],
                margin: 20,
              };
            };
            // Change dataTable layout (Table styling)
            // To use predefined layouts uncomment the line below and comment the custom lines below
            // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
            var objLayout = {};
            objLayout["hLineWidth"] = function (i) {
              return 0.5;
            };
            objLayout["vLineWidth"] = function (i) {
              return 0.5;
            };
            objLayout["hLineColor"] = function (i) {
              return "#aaa";
            };
            objLayout["vLineColor"] = function (i) {
              return "#aaa";
            };
            objLayout["paddingLeft"] = function (i) {
              return 4;
            };
            objLayout["paddingRight"] = function (i) {
              return 4;
            };
            doc.content[0].layout = objLayout;
          },
        },
      ],
  
      fnRowCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData["admin"] == "1") {
          $("td", nRow).css("background-color", "#DCFBF3");
          }
        if (aData["nivel_criticidad"] == "Criticidad Alta") {
          $(nRow).find("td:eq(5)").css("background-color", "#f2dede");
          $(nRow).find("td:eq(5)").css("color", "black");
          $(nRow).find("td:eq(5)").css("font-size", "18px");
        } else if (aData["nivel_criticidad"] == "Criticidad Baja") {
          $(nRow).find("td:eq(5)").css("background-color", "#dff0d8");
          $(nRow).find("td:eq(5)").css("color", "black");
          $(nRow).find("td:eq(5)").css("font-size", "18px");
        } else if (aData["nivel_criticidad"] == "Criticidad Media") {
          $(nRow).find("td:eq(5)").css("background-color", "#fcf8e3");
          $(nRow).find("td:eq(5)").css("color", "black");
          $(nRow).find("td:eq(5)").css("font-size", "18px");
        } else {
          $(nRow).find("td:eq(5)").css("background-color", "#d9edf7");
        }
      },
    });
  
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
   
  

    $("#formVacaciones").submit(function (e) {
      e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
      id = parseInt(fila.find("td:eq(0)").text());
      vacaciones= $.trim($("#vacaciones").val());
      inicio= $.trim($("#inicio").val());
      final= $.trim($("#final").val());
  
      $.ajax({
        url: "../Controllers/TablaController2.php",
        type: "POST",
        datatype: "json",
        data: {id: id,vacaciones:vacaciones,inicio:inicio,final:final, opcion: opcion,
        },
        success: function (data) {
          //CONSOLE LOG PARA VER LO QUE APARECE EN LA CONSOLA
          console.log(data);
          tablaUsuarios.ajax.reload(null, false);
  
        },
      });
    
    });
    
    
   $(document).on("click", ".btnFoto", function () {
    opcion = 5;
    fila = $(this).closest("tr");
  
    id = parseInt(fila.find("td:eq(0)").text());
   nombre = $(this).closest("tr").find("td:eq(1)").text();
  
      $("#txtid").val(id);
      $("#nombreemp").text(nombre);
  
    $("#modalNuevaFoto").modal("show");
  
  
  });

  $(document).on("click", ".btnRecuperar", function () {
    fila = $(this);
    id = parseInt($(this).closest("tr").find("td:eq(0)").text());
    nombre = $(this).closest("tr").find("td:eq(1)").text();
    opcion = 6; //eliminar

    Swal.fire({
      title: "¿Quieres recuperar al empleado " + nombre + "?",
      text: "El empleado podrá utilizar el sistema!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: '<i class="fa fa-thumbs-up"></i> Si',
      cancelButtonText:  '<i class="fa fa-thumbs-down"></i> No',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "../Controllers/TablaController2.php",
          type: "POST",
          datatype: "json",
          data: { opcion: opcion, id: id },
         
          success: function () {
            tablaUsuarios.row(fila.parents("tr")).remove().draw();
            Swal.fire("Recuperado!", "El empleado podrá utilizar el sistema", "success");
          },
        });
      }
    });
  });
  
  
  
    $(document).on("click", ".btnVer", function () {
      fila = $(this).closest("tr");
  
      id = parseInt(fila.find("td:eq(0)").text());
  
      window.open("../PDF/index.php?id=" + id);
    });
  
    $(document).on("click", ".btnVacaciones", function () {
 
      opcion = 5;
      fila = $(this).closest("tr");
  
      id = parseInt(fila.find("td:eq(0)").text());
      vacaciones = $(this).closest("tr").find("td:eq(6)").text();
  
      nombre= $(this).closest("tr").find("td:eq(1)").text();
  
      let str =  vacaciones = $(this).closest("tr").find("td:eq(6)").text();
      const myArr = str.split(" ", 1);
      inicio  = document.getElementById("fecha").innerHTML = myArr; 
  
      let str1 =  vacaciones = $(this).closest("tr").find("td:eq(6)").text();
      const myArr1 = str1.slice(13,23);
      final  = document.getElementById("fecha").innerHTML = myArr1; 
  
  
  
      $("#modalFecha").modal("show");
  
      
      $("#fecha").val(vacaciones);
      $("#empleado").val(nombre);
  
      $("#inicio").val(inicio);
      $("#final").val(final);
  
     
        $("#btnCancelar3").click(function () {
          location.reload();
        });
       
        $("#btnGuardar2").click(function () {
          
          location.reload();
        });
     
    });
  
    $(document).on("click", ".btnBorrar", function () {
      fila = $(this);
      id = parseInt($(this).closest("tr").find("td:eq(0)").text());
      nombre = $(this).closest("tr").find("td:eq(1)").text();
      opcion = 3; //eliminar
  
      Swal.fire({
        title: "¿Quieres eliminar al empleado " + nombre + "?",
        text: "El empleado sera eliminado permanentemente!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Si',
        cancelButtonText:  '<i class="fa fa-thumbs-down"></i> No',
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "../Controllers/TablaController2.php",
            type: "POST",
            datatype: "json",
            data: { opcion: opcion, id: id },
            success: function () {
              tablaUsuarios.row(fila.parents("tr")).remove().draw();
              Swal.fire("Eliminado!", "El empleado ha sido eliminado.", "success");
            },
          });
        }
      });
    });
  });
  
  //FUNCION PARA MOSTRAR ALERTA DE REGISTRAR Y MODIFICAR
  function MostrarAlerta(titulo, descripcion, tipoAlerta, timer) {
    Swal.fire(titulo, descripcion, tipoAlerta, timer);
  }
  
  //FUNCION PARA COLOCAR LA FOTO DEL USUARIO EN SESION
  function avatar(usuario, noimage) {
    var usuario = " <?php echo $busquedafoto[0]['avatar']; ?>";
    var noimage = " <?php echo ../Util/Img/user_default.png ?>";
  }
  