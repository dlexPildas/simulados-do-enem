<?php
	include_once( "_model/seguranca.php" );
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>S.O.S ENEM</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="_css/estilo.css">
			
		<link href="_css/ig-canais.css" rel="stylesheet" type="text/css">
		<header> 
			<link rel="stylesheet" type="text/css" href="_css/bootstrap3.css">
	    	
	  
			
			<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
	   		<script type="text/javascript">
	     		google.charts.load('current', {'packages':['corechart']});
	      		google.charts.setOnLoadCallback(drawChart);

	      		function drawChart() {

			        var data = google.visualization.arrayToDataTable([
			         	['Task', 'Hours per Day'],
			          	['Linguagens',     25],
			          	['Matemática',      30],
			          	['Ciências Humanas',  24],
			          	['Ciências da Natureza', 31],
			        ]);

		       		var options = {
		          		title: ""};

		        	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

		        	chart.draw(data, options);
	      		}
	    	</script>		
			

			<script type="text/javascript">
				google.charts.load("current", {packages:['corechart']});
				google.charts.setOnLoadCallback(drawChart);

				function drawChart() {
				    var data = google.visualization.arrayToDataTable([
				      	["Ranking", "Pontuação", { role: "style" } ],
				      	["Indio", 2013, "#8FFFBD"],
				      	["Marcos", 2350, "silver"],
				      	["Lucas", 1992, "#b87333"],
				      	["Alyson", 2452, "gold"]
				    ]);

		    		var view = new google.visualization.DataView(data);
		   			view.setColumns([0, 1, { 
		   				calc: "stringify",
		               	sourceColumn: 1,
		            	type: "string",
		                role: "annotation" },
		            2]);

		   			var options = {
				    	title: "",
				    	width: 370,
				    	height: 400,
				    	bar: {groupWidth: "95%"},
				    	legend: { position: "none" },
		    		};

		   			var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
		    		chart.draw(view, options);
				}
			</script>
		</header>

	</head>

	<body style="background-color:#E4E4E4">	

		<div class="navbar">
<<<<<<< HEAD
        	<?php include('navbar-usuario.php') ?>
=======
         <?php include('navbar-adm.php') ?>
>>>>>>> 8a4e7fc01575e095c7fa468a31ef44072b6a60dc
    	</div>

    	<div  class="row">
			<div class="col-md-3;" style="background-color:white; width:385px; height:50px; margin-top:20px;margin-right:10px;margin-left: 40px; " > 
    
        		<p class="h3 font-weight-bold" style="text-align:center;  margin-top:9px">Ranking dos usuários</p>
			</div>

	  		<div class="col-md-3;"  style="background-color:white;width:485px; height:50px; margin-top:20px;margin-right:10px;margin-left: 10px; ">
        		<p class="h3 font-weight-bold" style="text-align:center;  margin-top:9px">Acertos por área de conhecimento</p>
			</div>

			<div class="col-md-3;" style="width:385px; height:50px;margin-top:20px;margin-right:20px;margin-left: 10px; margin-bottom:0;">
            	<button type="button"style="height:40px; width:370px" <font style="margin-top:5px;" size="5">Submeter questão<font></button>
            </div>  
    
			<div  class="row">		
	  			<div class="col-md-3;"  style="background-color:white; width:385px; height:500px; margin-top:5px;margin-right:10px;margin-left: 55px; " > 
		 			 <div id="columnchart_values"></div>
				</div>

	  			<div class="col-md-3;" id="piechart" style="background-color:white;width:485px; height:500px; margin-top:5px;margin-right:10px;margin-left: 10px;"> </div>

				<div clas="col-md-3;" style="background-color:white;width:385px; height:500px;margin-top:5px;margin-right:20px;margin-left: 10px;">
					<img   src="image/propaganda.jpg">
				</div>
			</div>
		</div>
	</body>
</html>