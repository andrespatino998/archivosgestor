$(document).ready(function () {
  var chart1, options;
  $.ajax({
    url: "../Controllers/graficalineas.php",
    type: "POST",
    dataType: "json",
    success: function (data) {
      $("#contenedor").html(data);
      options.series[0].data = data;
      chart1 = new Highcharts.Chart(options);
      console.log(data);
    },
  });
  datos();

  function datos() {
    options = {
        chart:{
            renderTo: "contenedor",
            type:'pie',
            plotBackgroundColor: '#f8f9fa', //color de fondo del gráfico
            plotBorderwidth: 1,
            plotShadow:false,   
        },
        title:{
            text: "<br>",
            useHTML: true,
        },
        tooltip:{
            pointFormat:'{series.name}:<b>{point.percentage:.2f}</b>%',
        },
        plotOptions:{
            pie:{
                allowPointSelect:true,
                cursor:'pointer',
                dataLabels:{
                    enabled: true,
                    format: '{point.name}:<b>{point.percentage:.2f}</b>%'                    
                }
            }
        },            
        series: [{
            name: 'Cantidad en Porcentaje',
            colorByPoint: true,
            data:[]
        }]   
    };
  }
});
