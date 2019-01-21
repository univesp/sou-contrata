 <!DOCTYPE html>
    <html>
        <head>
            <title>Minha página de teste</title>
        </head>

        <style>
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row{
            width:100%;
        }

        h3{
            font-size:1.3em;
            font-weight:bold;
        }

        .col-lg-4,.col-lg-8 {
            position: relative;
            min-height: 1px;
            padding-right: 15px;
            padding-left: 15px;
            float:left;
         }

         @media (min-width: 1200px){
            .col-lg-4 {
                width: 33.33333333%;
            }
            .col-lg-8 {
                width: 66.66666667%;
            }
            .container {
            width: 1170px;
            }
         }

            @media (min-width: 992px){
            .container {
                width: 970px;
            }
            }

            @media (min-width: 768px){
            .container {
                width: 750px;
                }
            }

        </style>
        <body>
            <h1>Dados Pessoais {{ $name . " " . $last_name }}</h1>

            <div class="container">
                <div class="row">
                    <div class="col-lg-4">Nome</div>
                    <div class="col-lg-8">{{ $name . " " . $last_name }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Data nascimento</div>
                    <div class="col-lg-8">{{ $date_birth }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-4">E-mail</div>
                    <div class="col-lg-8">{{ $email }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-4">CPF</div>
                    <div class="col-lg-8">{{ $cpf }}</div>
                </div>

                <div class="row">
                    <div class="col-lg-4">Telefone</div>
                    <div class="col-lg-8">{{ $phone }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Celular</div>
                    <div class="col-lg-8">{{ $mobile }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome da mãe</div>
                    <div class="col-lg-8">{{ $name_mother }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome do pai</div>
                    <div class="col-lg-8">{{ $name_father }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>


                <h3>Documentos:</h3>

                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>
                <div class="row">
                    <div class="col-lg-4">Nome social</div>
                    <div class="col-lg-8">{{ $name_social }}</div>
                </div>
            </div>
        </body>
    </html>
