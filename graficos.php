<?php

    include 'config.php';
    include 'header.php';
    include 'classes/controllerHistoricoVendas.class.php';


    $controllerHistoricoVendas = new ControllerHistoricoVendas();
    $lista_produtos_mais_vendidos = $controllerHistoricoVendas->getGraficosPedidosProduto();

    $lista_tipos_produtos_mais_vendidos = $controllerHistoricoVendas->getGraficosTiposProdutos();


?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Produtos', 'Quantidade de Pedidos'],
          <?php foreach($lista_produtos_mais_vendidos as $lista): ?>
            ['<?php echo $lista['nome_produto']; ?>', <?php echo $lista['total']; ?>],

          <?php endforeach; ?>
          
        ]);

        var options = {
          title: 'Gráficos com porcentagem/quantidade de pedidos por produto'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Tipos Produtos', 'Quantidade de Pedidos'],
          <?php foreach($lista_tipos_produtos_mais_vendidos as $lista1): ?>
            ['<?php echo $lista1['nome_tipo_produto']; ?>', <?php echo $lista1['total']; ?>],

          <?php endforeach; ?>
          
        ]);

        var options = {
          title: 'Gráficos com porcentagem/quantidade de tipos produtos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>




    <div class="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1>Gráficos</h1>

                    <div id="piechart1" style="width: 900px; height: 500px;"></div>

                    <div id="piechart2" style="width: 900px; height: 500px;"></div>

					
				</div>
			</div>
        </div>

<?php

    include 'footer.php';

?>