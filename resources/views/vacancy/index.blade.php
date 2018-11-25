<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro de Professores</title>
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">

  </head>
  <body>
	<div class="cabecalho">
		<div class="container">
			<span class="font-cabecalho1">Processos Seletivos</span>

           {{-- @if(date_diff(date_create($data->edict->date_end), date_create(now()))->format('d') > 0)
			    <button type="button" class="btn btn-info">Aberto</button>
            @else
                <button type="button" class="btn btn-danger">Fechado</button>
            @endif--}}
        </div>
	</div>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cargo</th>
                    <th scope="col">Inicio</th>
                    <th scope="col">Termino</th>
                    <th scope="col">#</th>
                </tr>
            </thead>
            <tbody>
             @foreach($data as $d)
                 @if(date_diff(date_create($d->edict->date_end), date_create(now()))->format('d') > 0)
                     <tr class="bg-danger">
                 @else
                     <tr>
                 @endif

                    <td>{{$d->title}} {{$d->matter}}</td>
                    <td>{{date_format(date_create($d->edict->date_start), 'd-m-Y')}}</td>
                    <td>{{date_format(date_create($d->edict->date_end), 'd-m-Y')}}</td>
                    <td>
                        @if(date_diff(date_create($d->edict->date_end), date_create(now()))->format('d') > '0')
                            <a href="/edict/{{$d->id}}"><button type="button" class="btn btn-info">Acessar</button></a>
                        @endif
                    </td>
                </tr>
             @endforeach
            </tbody>
        </table>
        {{ $data->appends(['id' => isset($filter_id) ? $filter_id : ''])->links() }}
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
