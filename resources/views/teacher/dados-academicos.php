<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dados Academicos</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	
	<body>
	
		<div class="fonte-cabecalho"></div>
		<div class="container">
			<ul class="nav nav-tabs">
				<li><a href="vaga-disciplina">Área de interesse</a></li>
				<li><a href="dados-pessoais">Dados pessoais</a></li>
				<li class="active, link3"><a href="dados-academicos">Dados academicos</a></li>
			</ul>
			<p class="ob"><span class="cor-campo"> *</span>Obrigatório</p>
			<br />
			<div  class="row">
				<div class="col-md-7">
					<div  class="form-group">
						<label for="cadlettters" class="fonte-campos">Curriculo Lattes<span class="cor-campo"> *</span></label>
                        <input  type="text" class="form-control" id="cadlettters"  placeholder="links para o curriculo lattes">
					</div>
				</div>
			</div> 
			<br />
			<hr />
			<div class="row">
				<h3>Formação acadêmica</h3>

	    	<hr />

	    	<h4>Graduação</h4>
	    	<form action="vaga-disciplina">
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">	
							<label for="inputCursos" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputCursos" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">	
							<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inpuInstituicao" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">	
							<label for="inputSituacao" class="fonte-campos">Situação<span class="cor-campo"> *</span></label>
							<select id="inputSituacao" class="form-control">
								<option selected>Concluido</option>
								<option>Incompleto</option>
							</select>
						</div>
						<div class="col-md-3">	
							<label for="inputAnoConclusao" class="fonte-campos">Ano de conclusão<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputAnoConclusao" required oninvalid="this.setCustomValidity('Digite o Ano de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="float-right">
						<div class="row">
							<img src="img/lixeira.png" class="img-responsive, cadastro-incones">
						</div>
						<div class="row">
							<img src="img/arraste.png" class="img-responsive">
						</div>
					</div>
				</div>
			</div>
		
			<hr />

			<div class="row">	    	
				<h4>Mestrado</h4>
					<div class="col-md-7">
						<div class="row">
							<div class="col-md-12">	
								<label for="inputArea" class="fonte-campos">Área<span class="cor-campo"> *</span></label>
								<input type="text" class="form-control" id="inputArea" required oninvalid="this.setCustomValidity('Digite a Área')" onchange="try{setCustomValidity('')}catch(e){}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">	
								<label for="inputInstiucao_1" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
								<input  type="text" class="form-control" id="inputInstiucao_1" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
							</div>
						</div>
						<div class="row">
							<div class="col-md-5">	
								<label for="inputSituacao_1" class="fonte-campos">Situação<span class="cor-campo"> *</span></label>
								<select id="inputSituacao_1" class="form-control">
									<option selected>Em andamento</option>
									<option>Concluido</option>
								</select>
							</div>
							<div class="col-md-3">	
								<label for="inputAnoConclusao_1" class="fonte-campos">Ano de conclusão<span class="cor-campo"> *</span></label>
								<input  type="text" class="form-control" id="inputAnoConclusao_1" required oninvalid="this.setCustomValidity('Digite o Ano de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
							</div>
						</div>
					</div>

					<div class="col-md-5">
						<div class="float-right">
							<div class="row">
								<img src="img/lixeira.jpg" class="img-responsive, cadastro-incones">
							</div>
							<div class="row">
								<img src="img/arraste.png" class="img-responsive">
							</div>
						</div>
					</div>
			</div>
		
			<hr />
		
			<div class="row">
				<h4>Doutorado</h4>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12">	
							<label for="inputCursos_2" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>
							<input type="text" class="form-control" id="inputCursos_2" required oninvalid="this.setCustomValidity('Digite o Curso')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">	
							<label for="inputInstiucao_2" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>
							<input type="text" class="form-control" id="inputInstiucao_2" required oninvalid="this.setCustomValidity('Digite a Instituição')" onchange="try{setCustomValidity('')}catch(e){}">
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">	
							<label for="inputSituacao_2 class="fonte-campos">Situação<span class="cor-campo"> *</span></label>
							<select id="inputSituacao_2" class="form-control">
								<option selected>Concluido</option>
								<option>Incompleto</option>
							</select>
						</div>
						<div class="col-md-3">	
							<label for="inputAnoConclusao_2" class="fonte-campos">Ano de conclusão<span class="cor-campo"> *</span></label>
							<input  type="text" class="form-control" id="inputAnoConclusao_2" required oninvalid="this.setCustomValidity('Digite o Ano de Conclusão')" onchange="try{setCustomValidity('')}catch(e){}" pattern="[0-9]+$">
						</div>
					</div>
				</div>

				<div class="col-md-5">
					<div class="float-right">
						<div class="row">
							<img src="img/lixeira.jpg" class="img-responsive, cadastro-incones">
						</div>
						<div class="row">
							<img src="img/arraste.png" class="img-responsive">
						</div>
					</div>
	    	
				</div><br />

		</div>
	    <hr />

	    <div style="clear: both;"></div>
		<div class="row">
			<p class="top">Adicionar formação : <span class="cor-campo"> * | Graduação | Mestrado | Doutorado</span><button type="submit" class="btn btn-danger float-right">AVANÇAR</button></p> 
		</div>
		<br /><br />
			</form>
		</div>	
	
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
    
	</body>
</html>