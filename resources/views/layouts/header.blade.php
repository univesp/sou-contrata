<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('/css/datatables/dataTables.bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('/css/fontawesome/release/v5.6.3/css/all.css')}}" rel="stylesheet">
        <link rel="shortcut icon" href="https://apps.univesp.br/common/favicon.ico" >
        @yield('css')
    </head>
    <body>
    <div class="fonte-cabecalho">
        <div class="container">
            <div  class="col-sm-6 col-xs-6 col-md-6">
                <div class="imagem-topo-sou">
                    <img src="{{URL::asset('img/logo-sou.png')}}">
                </div>
                <div class="text-pequeno">
                    <span>Processo de Credenciamento</span>
                </div>
                <div class="text-big">
                    <span>@yield('cabecalho')</span>
                </div>
                <div class="imagem-topo-sou">
                    <img src="{{URL::asset('img/logo-abaixo.jpg')}}">
                </div>
            </div>
            <div style="color:white;" class="col-sm-6 col-xs-6 col-md-6 imagem-univesp float-right">
                <img src="{{URL::asset('/img/univesp.png')}}">
                <div class="col-sm-12 col-xs-12 col-md-12">
                    <div class="col-sm-12 col-xs-12 col-md-10">
                        <input type="hidden" value="{{ $id = Session::get('user')['id'] }}">
                            <span class="float-right text-user"><a href="{{ route('admin/admin-user') }}" class="profile-link" data-toggle="tooltip" data-placement="bottom" title="Editar perfil">@yield('username')</a></span>
                    </div>
                    @if (Session::get('user')['user'])
                        <form action="{{route('logoff')}}">
                            <div class="col-md-2">
                                <button class="btn btn-danger" type="submit">Sair</button>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both;"></div>
        @yield('content')
        <script src="{{URL::asset('/js/jquery.min.js')}}"></script>
        <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('/js/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('/js/datatables/dataTables.bootstrap.min.js')}}"></script>
        @yield('scripts')

        <script>
            $(function() {
                /*Tooltip*/
                $('[data-toggle="tooltip"]').tooltip();

                /*Datatable*/
                $(document).ready(function(){
                    $('.change-status').change(function() {
                        id = $(this).data('id');
                        $.ajax({
                            url:'../admin/change-status',
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                            data: { 'id' : id },
                            success: function(data){
                                console.log(data);
                            },
                        });
                    });

                    $('#example').DataTable( {
					    "searching": true,
                        "ordering": false,
                        "language": {
                            "sEmptyTable": "Nenhum registro encontrado",
                            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                            "sInfoPostFix": "",
                            "sInfoThousands": ".",
                            "sLengthMenu": "_MENU_ resultados por página",
                            "sLoadingRecords": "Carregando...",
                            "sProcessing": "Processando...",
                            "sZeroRecords": "Nenhum registro encontrado",
                            "sSearch": "Pesquisar",
                            "oPaginate": {
                                "sNext": "Próximo",
                                "sPrevious": "Anterior",
                                "sFirst": "Primeiro",
                                "sLast": "Último"
                            },
                            "oAria": {
                                "sSortAscending": ": Ordenar colunas de forma ascendente",
                                "sSortDescending": ": Ordenar colunas de forma descendente"
                            }
                        }
				    });
                });
            });
        </script>
    </body>
</html>
