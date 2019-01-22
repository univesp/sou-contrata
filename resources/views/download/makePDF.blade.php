 <!DOCTYPE html>
    <html>
        <head>
            <title>Minha página de teste</title>
            <style>
                .row{
                    margin-top:15px;

                }
            </style>
        </head>

        <body>
             <h1>Dados</h1><br>



        <fieldset style="border:1px solid #ccc; ">
             <h3>Dados de Usuário:</h3>
                <div class="row">
                    <div class="col-lg-4"  style="font: bold">Nome:</div>
                    <div class="col-lg-8">{{ $name_user }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="font: bold">Email:</div>
                    <div class="col-lg-8">{{ $email_user }}</div>
                </div>
        </fieldset>


        <fieldset style="border:1px solid #ccc; ">
            <h3>Dados Pessoais</h3>
            <div class="container" style="100%;">
                <div style="widht:33.3333%;float:left;">
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Nome:</div>
                        <div class="col-lg-8">{{ $name . " " . $last_name }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Data Nascimento:</div>
                        <div class="col-lg-8">{{ date_format(date_create($date_birth),"d-m-Y") }}</div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4" style="font: bold">CPF:</div>
                        <div class="col-lg-8">{{ $cpf }}</div>
                    </div>
                </div>

                <div style="widht:33.3333%;float:left;margin-left:20%;">
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Telefone:</div>
                        <div class="col-lg-8">{{ $phone }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Celular</div>
                        <div class="col-lg-8">{{ $mobile }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Nome da Mãe:</div>
                        <div class="col-lg-8">{{ $name_mother }}</div>
                    </div>
                </div>

                <div style="widht:33.3333%;float:right;">
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Nome do Pai:</div>
                        <div class="col-lg-8">{{ $name_father }}</div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4" style="font: bold">Nome Social:</div>
                        <div class="col-lg-8">{{ $name_social }}</div>
                    </div>
               </div>
            </fieldset>

                <div style="display: block; page-break-before: always;"></div>

            <fieldset style="border:1px solid #ccc; ">
                <h3>Documentos:</h3>
                <div class="row">
                    <div class="col-lg-4" style="font: bold">RG:</div>
                    <div class="col-lg-8">{{ $rg_number }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-4" style="font: bold">Data Emissão:</div>
                    <div class="col-lg-8">{{ date_format(date_create($data_issue),"d-m-Y") }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="font: bold">UF:</div>
                    <div class="col-lg-8">{{ $uf_issue }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="font: bold">Título de Eleitor:</div>
                    <div class="col-lg-8">{{ $elector_title }}</div>
                </div>


                <div class="row">
                    <div class="col-lg-4" style="font: bold">Zona</div>
                    <div class="col-lg-8">{{ $zone }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4" style="font: bold">Sessão:</div>
                    <div class="col-lg-8">{{ $section }}</div>
                </div>
            </fieldset>

                <div style="display: block; page-break-before: always;"></div>
                <h3>Dados Acadêmicos:</h3>
                @foreach($scholarities as$scholarity)

                    <fieldset>
                        <legend style="font: bold; font-size: 18px">
                            @if($scholarity->scholarity_type == "graduate")
                                Graduação
                            @elseif ($scholarity->scholarity_type == "master")
                                Mestrado
                            @else
                                Doutorado
                            @endif
                        </legend>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Instituição de Ensino:</div>
                            <div class="col-lg-8">{{ $scholarity->teaching_institution }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Data Início:</div>
                            <div class="col-lg-8">{{ date_format(date_create($scholarity->init_date),"d-m-Y") }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Data termino:</div>
                            <div class="col-lg-8">{{ date_format(date_create($scholarity->end_date),"d-m-Y") }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Area:</div>
                            <div class="col-lg-8">{{ $scholarity->area[0]->description }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Lattes:</div>
                            <div class="col-lg-8">{{ $scholarity->class_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4" style="font: bold">Nome do Curso:</div>
                            <div class="col-lg-8">{{ $scholarity->course_name }}</div>
                        </div>
                    </fieldset>
                @endforeach

                @if(!empty($military_certificate))
                <div class="row">
                    <div class="col-lg-4" style="font: bold">Certificado militar:</div>
                    <div class="col-lg-8">{{ $military_certificate }}</div>
                </div>

                @endif

                <div style="display: block; page-break-before: always;"></div>
                <h3> Imgens</h3>
                <fieldset>
                    <img src="{{$military_link}}" style='display:block; width:500px;height:400px;'>
                </fieldset>
                <fieldset>
                    <img src="{{$elector_link}}" style='display:block; width:500px;height:400px;'>
                </fieldset>
                <fieldset>
                    <img src="{{$number_link}}" style='display:block; width:500px;height:400px;'>
                </fieldset>
            </div>
        </body>
    </html>
