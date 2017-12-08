<?php
include_once( "_model/seguranca.php" );


?>
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
			<meta charset="UTF-8"/>
			<title>S.O.S ENEM</title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
			<link rel="stylesheet" type="text/css" href="_css\estilos.css">
			<script type="text/javascript" src="_js\script.js"></script>
		</head>
		
		<body >
			<div class="navbar" style="max-height:200px">
				<span class="texto"> <font size="6"> S.O.S ENEM </font> </span>
				<div>
					<span>  <font size="5"> Bem-vindo <?php
						echo $logado;
						?></font> </span>
					<img src="_images\avatar.jpg" alt="Seu Avatar" title="Avatar" style="max-height: 65px; max-width: 65px" class="img-responsive">
				</div>
			</div>

			<div class = "navbar-header">
				<div class="linha" >
					<div class="navbar">
						<div class="col-md-12">
							<ol>	
								<div class="row">
									<div class="col-md-2"> <a href="realizar-simulado.html">&nbsp;Realizar Simulado&nbsp;</a> </div>
									<div class="col-md-2"> <a href="feedback.html">&nbsp;Feedback&nbsp;</a> </div>
									<div class="col-md-2"> <a href="minha-conta.html">&nbsp;Minha Conta&nbsp;</a> </div>
									<div class="col-md-2"> <a href="ajuda.html">&nbsp;Ajuda&nbsp;</a> </div>
									<div class="col-md-2"> <a href="_controller/logout.php">&nbsp;Sair da Conta&nbsp;</a> </div>
								</div>
							</ol>
						</div>
					</div>
				</div>
			</div>			

			<div id="rowtest" class="row" style='margin-right: 0.2px'>
				<div class="col-md-4" style="margin-top: 15%">
					<table width="317" border="1">
					   <tr>
					    <td width="307">Taxa de Acertos por área de conhecimento</td>
					  </tr> 
					  <tr>
					    <td><table width="32%" border="0" cellpadding="1" cellspacing="1">
					      <tr>
					        <td bgcolor="#009900">32%</td>
					      </tr>
					    </table>
					    <strong>Ciências da Natureza e suas Tecnologias</strong></td>
					  </tr>
					  <tr>
					    <td><table width="26%" border="0" cellpadding="1" cellspacing="1">
					      <tr>
					        <td bgcolor="#CC0000">26%</td>
					      </tr>
					    </table>
					    <strong>Matemática</strong></td>
					  </tr>
					  <tr>
					    <td><table width="40%" border="0" cellpadding="1" cellspacing="1">
					      <tr>
					        <td bgcolor="#3366CC">40%</td>
					      </tr>
					    </table>
					    <strong>Linguagens e Códigos</strong></td>
					  </tr>
					  <tr>
					    <td><table width="38%" border="0" cellpadding="1" cellspacing="1">
					      <tr>
					        <td bgcolor="#FFFF33">38%</td>
					      </tr>
					    </table>
					    <strong>Ciências Humanas e suas Tecnologias</strong></td>
					  </tr>
					</table>
					
				</div>


			<div class="col-md-4">
				<div class="table table-responsive">
					<div class="table table-hover">
						<table class="table" style="margin-top: 49%">
			    			<thead>
			        			<tr>
						        	<th>Nome</th>
						            <th>Pontuação</th>
						        </tr>
						    </thead>
						    <tbody>
						        <tr>
						            <td>João</td>
						            <td>3732</td>
						        </tr>
						        <tr>
						            <td>Maria</td>
						            <td>3412</td>
						        </tr>
						        <tr>
						            <td>Gilda</td>
						            <td>3345</td>
						        </tr>
						        <tr>
						            <td>Fernando</td>
						            <td>3299</td>
						        </tr>
						    </tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div>
					<img src="_images\enem.jpg" alt="Propaganda" title="Propaganda" style="max-height: 90%; margin-top: 5px;  max-width: 95%" class="img-responsive">
					<div style="margin-top: 42%; margin-left: 15%">
						<div id= "linhaSubmit" class="linha" style="width: 100%">
							<div id="navbarSubmit" class="navbar" style="width: 100%">					
								<li> <a style="color: white;" href="submeter-questao.html">&nbsp;Submeter Questão&nbsp;</a> </li>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</body>
	</html>