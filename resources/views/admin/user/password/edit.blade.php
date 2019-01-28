@extends('layouts.header')

@section('title')
    DADOS ACADÊMICOS
@endsection

@section('css')
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection

@section('content')
    @section('cabecalho')
        DADOS ACADÊMICOS
    @endsection

    @section('username')
        {{ "Bem vindo, ". Session::get('user')['user'] }}
    @endsection
    {{--  {{dd($candidate, $scholarity[0], $scholarity[0]_type)}}  --}}
    <div class="container">
        <div id="msgFail"></div>
        
        <ul class="nav nav-tabs">
            <li class="enabled"><a href="{{route('admin/personal-data/edit', $user->user_id)}}">Dados Pessoais</a></li>
            <li class="active"><a href="{{route('admin/academic-data/edit', $user->id)}}">Dados Academicos</a></li>
            <li class="active"><a href="{{route('admin/password/edit', $user->id)}}">Senha</a></li>
        </ul>

       <form action="{{ route('admin/password/update', $id)}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">

            </div>
        </form>

        <div class="modal fade in" id="modal-success" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">PDF</h4>
                    </div>
                    <div class="modal-body">
                        <embed
                            src="{{ $scholl->link }}"
                            class="pdf-size"
                            frameborder="0"
                        >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')
@endsection

@section('scripts')
    <script src="{{URL::asset('/js/admin/academic-data.js')}}"></script>
@endsection
