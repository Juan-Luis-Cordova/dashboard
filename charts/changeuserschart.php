<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
require_once(dirname(dirname(__FILE__)) . '/locallib.php');

$select = $_POST['select'];
$dispersion = $_POST['dispersion'];
switch ($select) {
	case 1:
		echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'X');
					data.addColumn('number', 'Sesiones');

					var datos =".json_encode(users_sessions_dispersion($dispersion))."
					$.each(datos, function( key, value ) {
		  				value[1]= parseFloat(value[1]);
					});

					data.addRows(datos);

					var options = {
						chartArea: {
			       			top: 28,
			       			height: '50%'
			    		},
						hAxis: {
							title: 'Fecha',
							textStyle: {fontSize: 9}
						},
						vAxis: {
							title: 'Sesiones'
						}
					};

					var chart = new google.visualization.LineChart(document.getElementById('userschart'));

					chart.draw(data, options);
				}
			</script>";
	break;

	case 2:
		echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'X');
					data.addColumn('number', 'Segundos');

					var datos =".json_encode(users_avgsessions_dispersion($dispersion))."
					$.each(datos, function( key, value ) {
		  				value[1]= parseFloat(value[1]);
					});

					data.addRows(datos);

					var options = {
						hAxis: {
							title: 'Fecha',
							textStyle: {fontSize: 9}
						},
						vAxis: {
							title: 'Tiempo Promedio de Sesiones'
						}
					};

					var chart = new google.visualization.LineChart(document.getElementById('userschart'));

					chart.draw(data, options);
				}
			</script>";
	break;

	case 3:
		echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'X');
					data.addColumn('number', 'Usuarios');

					var datos =".json_encode(users_dates_dispersion($dispersion))."
					$.each(datos, function( key, value ) {
		  				value[1]= parseFloat(value[1]);
					});

					data.addRows(datos);

					var options = {
						hAxis: {
							title: 'Fecha',
							textStyle: {fontSize: 9}
						},
						vAxis: {
							title: 'Usuarios'
						}
					};

					var chart = new google.visualization.LineChart(document.getElementById('userschart'));

					chart.draw(data, options);
				}
			</script>";
	break;

	case 4:
		echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'X');
					data.addColumn('number', 'Usuarios');

					var datos =".json_encode(newusers_dates_dispersion($dispersion))."
					$.each(datos, function( key, value ) {
		  				value[1]= parseFloat(value[1]);
					});

					data.addRows(datos);

					var options = {
						hAxis: {
							title: 'Fecha',
							textStyle: {fontSize: 9}
						},
						vAxis: {
							title: 'Nuevos Usuarios'
						}
					};

					var chart = new google.visualization.LineChart(document.getElementById('userschart'));

					chart.draw(data, options);
				}
			</script>";
	break;

	case 5:
		echo "<script>
				google.charts.load('current', {packages: ['corechart', 'line']});
				google.charts.setOnLoadCallback(drawBasic);

				function drawBasic() {
					var data = new google.visualization.DataTable();
					data.addColumn('string', 'X');
					data.addColumn('number', 'Cursos');

					var datos =".json_encode(courseview_dates_dispersion($dispersion))."
					$.each(datos, function( key, value ) {
		  				value[1]= parseFloat(value[1]);
					});

					data.addRows(datos);

					var options = {
						hAxis: {
							title: 'Fecha',
							textStyle: {fontSize: 9}
						},
						vAxis: {
							title: 'Cursos Vistos'
						}
					};

					var chart = new google.visualization.LineChart(document.getElementById('userschart'));

					chart.draw(data, options);
				}
			</script>";
	break;
}
