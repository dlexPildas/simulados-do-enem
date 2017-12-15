<?php
	include_once( "_model/seguranca.php" );
?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>S.O.S ENEM</title>
		<meta charset = "UTF-8">
		<link rel="stylesheet" type="text/css" href="_css/estiloPainelUsuario.css">
			
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link href="_css/ig-canais.css" rel="stylesheet" type="text/css">
		<header id="cabecalho"> 
	    	
	    	<div>
	        	<span class="rounded float-right" style="margin-top:50">  <font class="font-weight-bold" style="margin-top:50px;" size="5"> 
	        		<p style="margin-top:80px; color:white"> Bem-vindo <?php
						echo $logado;
						?></p> </font> </span>
	        </div>
	        <img src="_images\avatar.jpg" alt="Seu Avatar" title="Avatar" style="max-height: 100px; max-width: 100px" class="img-responsive rounded float-right">
	       
	  		<h1><img src="logo2.png"></h1>
	  
			<!-- 
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
			</script>	-->	
		</header>

	</head>

	<body style="background-color:#E4E4E4">	
		<div class="navbar">
         <?php include('navbar-adm.php') ?>
    	</div>
    	<div  class="row">
			<div class="col-md-3;"  style="background-color:white; width:385px; height:50px; margin-top:20px;margin-right:10px;margin-left: 40px; " > 
    
        		<p class="h1 font-weight-bold" style="text-align:center;  margin-top:9px">Ranking dos usuários</p>
			</div>

	  		<div class="col-md-6;"  style="background-color:white;width:485px; height:50px; margin-top:20px;margin-right:10px;margin-left: 10px; ">
        		<p class="h1 font-weight-bold" style="text-align:center;  margin-top:9px">Acertos por área de conhecimento</p>
			</div>

			<div class="col-md-3;" style="width:385px; height:50px;margin-top:20px;margin-right:20px;margin-left: 10px; margin-bottom:0;">
            	<button type="button"style="height:40px; width:370px" class="btn btn-outline-success h1 font-weight-bold"><font  class="font-weight-bold" style="margin-top:5px;" size="5">Submeter questão<font></button>
            </div>  
    
			<div  class="row">		
	  			<div class="col-md-3;"  style="background-color:white; width:385px; height:500px; margin-top:5px;margin-right:10px;margin-left: 55px; " > 
		 			 <div id="columnchart_values"></div>
				</div>

	  			<div class="col-md-6;" id="piechart" style="background-color:white;width:485px; height:500px; margin-top:5px;margin-right:10px;margin-left: 10px;"> </div>

				<div clas="col-md-3;" style="background-color:white;width:385px; height:500px;margin-top:5px;margin-right:20px;margin-left: 10px;">
					<img   src="image/propaganda.jpg">
				</div>
			</div>
		</div>
	</body>
</html>