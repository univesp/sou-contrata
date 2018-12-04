@extends('layouts.header')
@section('title')
    ÁREA DE INTERESSE
@endsection
@section('css')
    <link href="{{URL::asset('/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/style.css')}}" rel="stylesheet">
@endsection
@section('cabecalho')
    ÁREA DE INTERESSE
@endsection
@section('username')
    {{ "Bem vindo, ". Session::get('user')['user'] }}
@endsection
@section('content')
    <div class="container">
		<ul class="nav nav-tabs">
            {{-- <li><a href="{{ route('personal-data.index') }}">Dados Pessoais</a></li> --}}
            <li class="disabled"><a href="#">Dados Pessoais</a></li>
            {{-- <li><a href="{{ route('professorAcademicData') }}">Dados Academicos</a></li> --}}
            <li class="disabled"><a href="#">Dados Academicos</a></li>
            <li class="active, link3"><a href="{{ route('professorPosition', ['id' => Session::get('vagueId')]) }}">Área de Interesse</a></li>
		</ul>
        <div class="vague-information">
            <p class="ob, cor-campo">*Campos Obrigatórios</p>
            <p>Você esta se credenciando</p>
            <p><strong>{{$data->title}}</strong></p>
            Requisitos
            <ul>
                <li>Docente nas universidades conveniadas com a Univesp</li>
                <li>Minimo: Título de Doutor</li>
            </ul>
        </div>
		<hr/>

        <form action="{{ route('professorPosition')}}" method="post">
            {{ csrf_field() }}
                <input type="hidden" name="vacancy_id" value="{{$id}}">
                <h5><strong class="left">Serviços</strong> <span class="cor-campo"> *</span></h5>
                <i id="text-negrito">Você pode se credenciar para vários serviços</i>
                <br>
                <div class="checkbox">
                        <div class="row">
                        @foreach($data->services as $services)
                                <div class="col-md-12">
                                <label>
                                    <input type="checkbox" name="sevices[]" value="{{$services->id}}">{{$services->title}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                </div>
                <div class="col-md-12">
                    <hr />
                    <h4>Declaração de Título de Experiência</h4>
                    <br>
                    @foreach($result as $key => $title)
                        <h5><strong>{{$key}}<span class="cor-campo">*</span></strong></h5>
                        <div class="row">
                        <div class="checkbox align-checkbox">
                            @foreach($title as $k => $criterion)
                                <div class="col-md-12">
                                    <label class="reset-label">
                                        <input type="checkbox" name="criteria[]" id="criteria_{{$criterion['id']}}" value="{{$criterion['id']}}" />{{$criterion['name']}}
                                    </label>
                                    <div class="none checagem-radio">
                                        @foreach($criterion['type'] as $c => $type)
                                            <label class="reset-label">
                                                <input type="radio" id="type_{{$type['id']}}" name="type_{{$criterion['id']}}" value="{{$type['id']}}"/><span class="align-span">{{$type['description']}}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>


                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="float-right">
                            <button type="submit" class="btn btn-danger" disabled id="submit">AVANÇAR</button>
                        </div>
                    </div>
                    <br /><br />
                 </div>
        </form>
    </div>
@endsection
@section('scripts')
<script>
        $(document).ready(function() {
            $('input:checkbox').on('change', function() {
               $(this).parent().siblings().toggle();
               if ($('input[name="sevices[]"]:checked').length && $('input[name="criteria[]"]:checked').length && $('input[type=radio][name*="type_"]:checked').length > 2){
                $('#submit').prop('disabled', false);
               } else {
                $('#submit').prop('disabled', true);
               }
            });
            $('input:radio').on('change', function() {
                if ($('input[name="sevices[]"]:checked').length && $('input[name="criteria[]"]:checked').length && $('input[type=radio][name*="type_"]:checked').length > 2){
                $('#submit').prop('disabled', false);
               } else {
                $('#submit').prop('disabled', true);
               }
            });
            $('input:radio[value="1"]').attr('checked', true);
        });

</script>
@endsection
