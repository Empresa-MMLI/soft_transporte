
var $dias = [];
var $total_e = [];
var $total_s = [];
var $total = [];

	$(document).ready(function(){
	
	$.ajaxSetup({
	  headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});
	
	$.ajax({
	  url: 'buscar_estatisticas',
	  method: 'GET',
	  dataType: 'json',
	  //contentType: 'application/json',
	  success: function(response){
		pegar_dias_bar(response.dados);
		//pegar_total_bar(response.dados);
    pegar_total_e_bar(response.dados);
	  pegar_total_s_bar(response.dados);
		mostrar_grafico_bar();
	  },
	  error: function(){
		console.log('Não foi possível pegar os dados estatisticos');
	  }
	});
	
	});
	
	// dias com consultas atendidas
	function pegar_dias_bar(dados){
	  var dias = 0;
	  $(dados).each(function(index, result){
		dias= result.dias;
		$dias.push('Dia '+Number(dias));
	  });
	}
	// pegar o total de consultas
	/*function pegar_total_bar(dados){
		var total = 0;
	  $(dados).each(function(index, result){
		total= result.total;
		
		$total.push(Number(total));
	  });
	}	*/

  function pegar_total_e_bar(dados){
		var total = 0;
	  $(dados).each(function(index, result){
		total= result.total_e;
		
		$total_e.push(Number(total));
	  });
	}	

  function pegar_total_s_bar(dados){
		var total = 0;
	  $(dados).each(function(index, result){
		total= result.total_s;
		
		$total_s.push(Number(total));
	  });
	}	
// mostrar resultados
function mostrar_grafico_bar(){
  // Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: $dias,
    datasets: [{
      label: "Total Entradas",
      lineTension: 0.3,
      backgroundColor: "rgba(101, 176, 233, 0.801)",
      borderColor: "rgba(101, 176, 233, 0.801)",
      pointRadius: 5,
      pointBackgroundColor: "red",
      pointBorderColor: "#999",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(0, 0, 0, 255)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: $total_e,
    },
    {
      label: "Total Saídas",
      lineTension: 0.3,
      backgroundColor: "rgba(214, 161, 61, 0.801)",
      borderColor: "rgba(214, 161, 61, 0.801)",
      pointRadius: 5,
      pointBackgroundColor: "red",
      pointBorderColor: "#999",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(0, 0, 0, 255)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: $total_s,
    },
    /*{
      label: "Saldo Líquido",
      lineTension: 0.3,
      backgroundColor: "rgba(98, 190, 129, 0.883)",
      borderColor: "rgba(98, 190, 129, 0.883)",
      pointRadius: 5,
      pointBackgroundColor: "red",
      pointBorderColor: "#999",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(0, 0, 0, 255)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      
      data: $total,
    }*/],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          min:1
        }
      }],
      yAxes: [{
        ticks: {
          min: 100
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});

}
