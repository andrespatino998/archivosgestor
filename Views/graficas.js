$(document).ready(function () {
  var chart1, options;
  $.ajax({
    url: "../Controllers/graficos.php",
    type: "POST",
    dataType: "json",
    success: function (data) {
      $("#contenedor-modal").html(data);
      options.series[0].data = data;
      chart1 = new Highcharts.Chart(options);
      console.log(data);
    },
  });
  datos();

  function datos() {
    options = {
      chart: {
        renderTo: "contenedor-modal",
        type: "column",
      },
      title: {
        text: "<br>",
        useHTML: true,
      },
      xAxis: {
        type: "category",
      },
      yAxis: {
        title: {
          text: " Cantidad",
        },
      },
      plotOptions: {
        series: {
          borderWidth: 1,
          dataLabels: {
            enabled: true,
            format: "{point.y:.0f}",
          },
        },
      },
      tooltip: {
        headerFormat: "<span style='font-size:11px'> {series.name}</span><br>",
        pointFormat:
          "<span style='color:{point.color}'>{point.name}</span>: <b>{point.y:.0f}</b>",
      },
      series: [
        {
          name: "Departamentos",
          colorByPoint: true,
          data: [],
        },
      ],
    };
  }
});
