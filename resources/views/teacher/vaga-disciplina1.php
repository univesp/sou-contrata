<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vaga</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  </head>
  <body>
	
	<div class="fonte-cabecalho"></div>
	
	
    <div class="container">
		<ul class="nav nav-tabs">
			<li class="active, link3"><a href="vaga-disciplina">Áreas de Interesse</a></li>
			<li><a href="dados-pessoais">Dados pessoais</a></li>
			<li><a href="dados-academicos">Dados Acadêmicos</a></li>
		</ul>
		<p class="ob, cor-campo">*Obrigatório</p>
		<p>Você esta credenciando como docente para:</p>
		<h2>História da Univesp</h2>
		Requisitos
		<ul>
			<li>Docente nas universidades conveniadas com a Univesp</li>
			<li>Minimo: Título de Doutor</li>
		</ul>
		<hr/>

		<form>
			<div class="col-md-6">
				

				<h5><strong class="left">Autoria</strong></h5>

				<div class="checkbox">
				  <label>
				    <input type="checkbox" value="">
					Elaboração de roteiros de aprendizagem
				  </label>
					<div class="checagem"></div>
				   <label>
					<input type="checkbox" value="">
					Elaboração de video aulas 
				  </label>
				  <div class="checagem"></div>
				  <label>
				    <input type="checkbox" value="">
				    Elaboração de atividades avaliativas
				  </label>
				  <label>
				    <input type="checkbox" value="">
				    Elaboração de questões para a prova final da disciplina
				  </label>
				  <label>
				    <input type="checkbox" value="">
					Revisão do banco de questões da disciplina
				  </label>
				  <label>
				    <input type="checkbox" value="">
				      Acompanhamento de Oferta de disciplinas 
 				  </label>
				  <div class="checagem"></div>
				  <label>
				    <input type="checkbox" value="">
				      Validação de material 
 				  </label>
				</div>
			</div>
			<div class="col-md-12">
				<hr />
				<h4>Declaração de Título de Experiência</h2>
				<div class="checagem-radio"></div>
				<h5><strong>Título de Mestre<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="1" id="1" value="1" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-1, col-md-12" style="display:none">
						<input type="radio" id="1" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="2" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="3" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="4" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   <input type="checkbox" name="5" id="5" value="5" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-2, col-md-12" style="display:none">
						<input type="radio" id="5" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="6" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="7" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="8" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
				  </label>
				</div>
				<div class="checagem-radio"></div>
				<h5><strong>Título de Doutor<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="9" id="9" value="9" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-3, col-md-12" style="display:none">
						<input type="radio" id="9" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="10" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="11" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="12" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="13" id="13" value="13" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-4, col-md-12" style="display:none">
						<input type="radio" id="13" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="14" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="15" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="16" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
				</div>
				<div class="checagem-radio"></div>
				<h5><strong>Experiência Docente<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>	
					<input type="checkbox" name="17" id="17" value="17" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-5, col-md-12" style="display:none">
						<input type="radio" id="17" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="18" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="19" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="20" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="21" id="21" value="21" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-6, col-md-12" style="display:none">
						<input type="radio" id="21" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="22" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="23" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="24" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
				</div>
				<div class="checagem-radio"></div>
				<h5><strong>Experiência da Modalidade a Distância<span class="cor-campo">*</span></strong></h5>
				<div class="checagem-radio"></div>
				<div class="checkbox">
				  <label>
					<input type="checkbox" name="25" id="25" value="25" onclick="return itemSelect(this)"/>Área de disciplina
					<div class="item-7, col-md-12" style="display:none">
						<input type="radio" id="25" name="disciplina"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="26" name="disciplina"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="27" name="disciplina"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="28" name="disciplina"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
					<div class="checagem"></div>
				   <label>
				   
				   <input type="checkbox" name="29" id="29" value="29" onclick="return itemSelect(this)"/>Área correlata
					<div class="item-8, col-md-12" style="display:none">
						<input type="radio" id="29" name="correlata"/><span class="alinhamento-radio">1 a 2 anos</span>
						<input type="radio" id="30" name="correlata"/><span class="alinhamento-radio">2 a 3 anos</span>
						<input type="radio" id="31" name="correlata"/><span class="alinhamento-radio">3 a 4 anos</span>
						<input type="radio" id="32" name="correlata"/><span class="alinhamento-radio">7 anos ou mais</span>
					</div>
					
				  </label>
				</div>
		</div>
		<div class="checagem-radio"></div>
        <div class="row">
        	<div class="float-right">
        		<p><a class="ob, cor-campo" href="processos-seletivos">Adicionar outra disciplina</a></p>
        	</div>
        </div>
        <div class="row">
        	<div class="float-right">
        		<button type="button" class="btn btn-danger">AVANÇAR</button>
        	</div>
        </div>
       <br /><br />
	   </div>

	   <script type="text/javascript">

		function itemSelect(elem) {
		  var si = $(elem).val();
		  var isCheck = $(elem).is(':checked');

		  if(isCheck) {
			fadeIn($(elem).siblings());
		  } else {
			fadeOut($(elem).siblings());
		  }
		}

		function fadeIn(itemClass, itemId) {
		  $(itemClass).fadeIn();
		  $(itemId).addClass('borda');
		}

		function fadeOut(itemClass, itemId) {
		  $(itemClass).fadeOut();
		  $(itemId).removeClass('borda');
		}
	
	   </script>
	   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
  </body>
</html>
</html>