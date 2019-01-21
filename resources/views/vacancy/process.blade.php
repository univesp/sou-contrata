@extends('layouts.header')
@section('title')
	CREDENCIAMENTO
@endsection
@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
	CREDENCIAMENTO
@endsection
@section('username')
{{ "Bem vindo, ". Session::get('user')['user'] }}

@endsection
@section('content')
	<div class="container">
        <div class="row" style="margin-top: 26px; font-size: 20px;">
            <div class="col-sm">
                <a href="{{route('home')}}" class="btn btn-danger">Pagina Inicial</a>
            </div>
        </div>
	@if(!empty($resp) || Session::get('resp') )
	<div class="modal fade in" id="modal-success" style="display: block;">
  		<div class="modal-dialog">
    		<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Parabéns!!!</h4>
				</div>
				<div class="modal-body">
					<p>{{!empty($resp) ? $resp : Session::get('resp')}}</p>
                    {{ Session::forget('resp')}}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" onclick="$('.modal').hide()" data-dismiss="modal">Fechar</button>
				</div>
			</div><!-- /.modal-content -->Pesquisar
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	@endif

	<ul class="nav nav-tabs">
		<li class="active, link"><a href="#">Abertos</a></li>
	</ul>
	<div class="form_dados"></div>
		<table id="example" class="table">
			<thead>
				<tr>
					<th scope="col">Curso</th>
                    <th scope="col">Disciplina</th>
					<th scope="col">Carga Horária</th>
					<th scope="col">Oferta</th>
					<th scope="col">Tipo</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
			@if(isset($data))
				@foreach($data as $d)

					<tr>
						<td>{{$d->title}}</td>
						<td>{{$d->matter}}</td>
						<td>{{$d->payload}}</td>
						<td>{{$d->offer}}</td>
						<td>{{$d->type}}</td>
						<td>
                            <?php $diff = date_diff(date_create($d->edict->date_end), date_create(now()));?>
                            @if($diff->format("%R%a") < 0)
                                @if(!$d->applications->isEmpty() )
                                    <a href="#"> <button type="button"  id="botaoSucess" class="btn btn-success">Credenciado</button></a>
                                @else
                                    <a href="{{ url('position', $d->id) }}"><button type="button"  id="botao" class="btn btn-danger">Credenciar</button></a>
                                @endif
                            @else
                                <a href="#"> <button type="button"  class="alert alert-info">Encerrado</button></a>
                            @endif
                        </td>
					</tr>
				@endforeach
			@endif
			</tbody>
		</table>
		<br/><br/>
        {{--  {{ $data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}  --}}
        </div>
    @include('layouts.footer')
@endsection
@section('script')

<script>
	var botao = document.querySelector('button#botao');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Candidatar');
		$('#botao').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Candidatar' : 'Remover Item';
	});
	var botao = document.querySelector('button#botao1');
	botao.addEventListener('click', function() {
		var aberto = botao.classList.contains('Candidatar');
		$('#botao1').css('background-color', '#006dcc');
		this.innerHTML = aberto ? 'Candidatar' : 'Remover Item';
	});
</script>
@endsection
