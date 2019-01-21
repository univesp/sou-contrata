$(function() {
    var CONTADOR = 0;
    var CERTIFICADOS = new Array();

    function validateExtension(file) {
        if (file.get(0).files[0].type != 'application/pdf') {
            $('#msgFail').addClass('msgFail');
            $('#msgFail').append(
                '<div class="alert alert-danger" role="alert">Arquivo Inválido ou maior que 2 Mega-byte (Mb)</div>'
            );
            $('#cadlettters').focus();
            $('.file_graduate').val('');
            $('.file_graduate').focus();
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        } else {
            $('#msgFail').empty();
        }
    }

    function mount_form_graduation(id) {
        var HTML = new Array();
        var codigo;
        CONTADOR++;

        codigo = CONTADOR;

        var today = new Date().toISOString().split('T')[0];
        document
            .getElementsByClassName('inputDataConclusao')[0]
            .setAttribute('max', today);

        HTML.push('<div id="grad_' + codigo + '">');
        HTML.push('<div class="col-md-12" style="margin: 30px 0 0 0;">');
        HTML.push('<fieldset class="scheduler-border">');
        HTML.push(
            '<legend class="scheduler-border">Adição de Formação Acadêmica</legend>'
        );
        HTML.push('<div class="col-md-7">');
        HTML.push('<div class="row">');
        HTML.push('<div class="col-md-12">');
        HTML.push(
            '<select name="graduate_dinamic[]" id="' +
                codigo +
                '" class="form-control graduations graduate-select graduate_dinamic tier">'
        );
        HTML.push(
            '<option value="" selected>SELECIONE A SUA FORMAÇÃO</option>'
        );
        HTML.push('<option value="1">GRADUAÇÃO</option>');
        HTML.push('<option value="2">MESTRADO</option>');
        HTML.push('<option value="3">DOUTORADO</option>');
        HTML.push('</select>');
        HTML.push('<div class="row">');
        HTML.push('<div class="col-md-12" style="padding-left: 0px;">');
        HTML.push('<div class="col-md-6">');
        HTML.push('<label>Selecione a sua Área</label>');
        HTML.push(
            '<select name="area_id[]" class="form-control graduations area" id="area" required>'
        );
        HTML.push('<option value="">Selecione a área</option>');
        HTML.push('</select>');
        HTML.push('</div>');
        HTML.push('<div class="col-md-6" style="padding-right: 0px;">');
        HTML.push('<label>Selecione a sua Subárea</label>');
        HTML.push(
            '<select id="subarea" name="subarea_id[]" class="form-control graduations subarea" disabled required>'
        );
        HTML.push('<option value="">Selecione a subárea</option>');
        HTML.push('</select>');
        HTML.push('</div>');
        HTML.push('</div>');
        HTML.push('</div>');
        HTML.push('</div></div></div>');
        HTML.push('<div class="col-md-7">');
        HTML.push('<div class="row" style="margin-top:10px;">');
        HTML.push('<div class="col-md-12">');
        HTML.push(
            '<label for="inputCursos" class="fonte-campos">Cursos<span class="cor-campo"> *</span></label>'
        );
        HTML.push(
            '<input type="text" class="form-control inputCursos" maxlength="50" name="inputCursos[]" required oninvalid="this.setCustomValidity(Digite o Curso)" onchange="try{setCustomValidity("")}catch(e){}>'
        );
        HTML.push('</div></div>');
        HTML.push('<div class="row" style="margin-top:10px;">');
        HTML.push('<div class="col-md-8">');
        HTML.push(
            '<label for="inpuInstituicao" class="fonte-campos">Instituição<span class="cor-campo"> *</span></label>'
        );
        HTML.push(
            '<input type="text" class="form-control inpuInstituicao" name="inpuInstituicao[]" maxlength="150" required oninvalid="this.setCustomValidity(Digite a Instituição)" onchange="try{setCustomValidity("")}catch(e){}>'
        );
        HTML.push('</div></div>');
        HTML.push('<div class="row" style="margin-top:10px;">');
        HTML.push('<div class="col-md-12">');
        HTML.push(
            '<label for="inputAnoConclusao" class="fonte-campos">Data de conclusão<span class="cor-campo"> *</span></label>'
        );
        HTML.push(
            '<input type="date" class="form-control dataYear inputDataConclusao" name="inputDataConclusao[]" max="' +
                today +
                '" required oninvalid="this.setCustomValidity(Digite o Data de Conclusão)" onchange="try{setCustomValidity("")}catch(e){}" pattern="d{1,2}/d{1,2}/d{4}>'
        );
        HTML.push('</div></div>');
        HTML.push('<div class="row">');
        HTML.push('<div class="col-md-12" style="padding-left:0px;">');
        HTML.push('<p class="text-danger" id="err-' + codigo + '></p>');
        HTML.push('</div></div></div>');
        HTML.push('<div class="row col-md-7">');
        HTML.push(
            '<label for="inpuInstituicao" class="fonte-campos">Insira seu Diploma aqui<span class="cor-campo"> *</span></label>'
        );
        HTML.push('<div class="display-flex">');
        HTML.push(
            '<input type="file" name="file_graduate[]" class="file_graduate" required accept="application/pdf"/>'
        );
        HTML.push(
            '<span class="cor-campo">* Formato do arquivo deve ser PDF, com tamanho max de 4 MB</span></label>'
        );
        HTML.push('</div><br />');
        HTML.push(
            '<button type="button" class="btn btn-success btn-sm novo" style="margin-top: -40px;" novo=' +
                codigo +
                '>Novo</button>'
        );
        HTML.push(
            '<button type="button" class="btn btn-danger btn-sm remove" style="margin-right:10px; margin-top: -40px;" remove=' +
                codigo +
                '>Remover</button>'
        );
        HTML.push('</div></fieldset></div>');

        $('#father').append(HTML.join(''));

        $('.tier').on('change', function() {
            CERTIFICADOS[$(this).attr('id')] = $(this).val();

            if (
                CERTIFICADOS.includes('1') &&
                CERTIFICADOS.includes('2') &&
                CERTIFICADOS.includes('3')
            ) {
                $('.submit').prop('disabled', false);
            } else {
                $('.submit').prop('disabled', true);
            }
        });

        $('.inputDataConclusao').on('blur', function() {
            var field = $(this).val();
            var date = new Date(field);
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            if (date >= today) {
                $(this).val('');
                $(this)
                    .parents('.row')
                    .find('.text-danger')
                    .text('Coloque apenas graduações já finalizadas!');
            } else {
                $(this)
                    .parents('.row')
                    .siblings('.row')
                    .find('.text-danger')
                    .text('');
            }
        });
    }

    function getSelectData() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            url: '../../../area/',
            type: 'get',
            success: function(result) {
                result = JSON.parse(result);
                result.forEach(function(item) {
                    $('.area').append(
                        `<option value="${item.id}">${item.description}</option>`
                    );
                });
            },
            error: function(errors) {}
        });
    }

    $(document).ready(function() {
        getSelectData();

        $(this)
            .find('.subarea')
            .prop('disabled', true);

        var today = new Date().toISOString().split('T')[0];
        document
            .getElementsByClassName('inputDataConclusao')[0]
            .setAttribute('max', today);

        $('#cadlettters').focus();

        $('.file_graduate').change(function() {
            validateExtension($(this));
        });

        $('.tier').on('change', function() {
            CERTIFICADOS[$(this).attr('id')] = $(this).val();
        });

        $('.inputDataConclusao').on('blur', function() {
            var field = $(this).val();
            var date = new Date(field);
            var today = new Date();
            today.setHours(0, 0, 0, 0);
            if (date >= today) {
                $(this).val('');
                $(this)
                    .parents('.row')
                    .siblings('.row')
                    .find('.text-danger')
                    .text('Coloque apenas graduações já finalizadas!');
            } else {
                $(this)
                    .parents('.row')
                    .siblings('.row')
                    .find('.text-danger')
                    .text('');
            }
        });
    });

    $(document).on('click', '.remove', function() {
        var id = $(this).attr('remove');
        delete CERTIFICADOS[id];

        if (
            CERTIFICADOS.includes('1') &&
            CERTIFICADOS.includes('2') &&
            CERTIFICADOS.includes('3')
        ) {
            $('.submit').prop('disabled', false);
        } else {
            $('.submit').prop('disabled', true);
        }
        $('#grad_' + id).remove();
    });

    $(document).on('click', '.novo', function() {
        var id = $(this).attr('novo');

        getSelectData();

        mount_form_graduation(id);
    });

    $(document).on('change', '.graduate_dinamic', function() {
        //$(".area_id").val($(this).val());
    });

    $(document).on('change', '.area', function(e) {
        var comboSubArea = $(this)
            .parents()
            .siblings('.col-md-6')
            .find('.subarea');

        comboSubArea
            .children()
            .not(':first')
            .remove();
        if ($(this).val()) {
            $('.area_id').val($(this).val());

            comboSubArea.prop('disabled', true);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: `../../../subarea/${e.target.value}`,
                type: 'get',
                data: {
                    _token: '{{csrf_token()}}'
                },
                success: function(result) {
                    result = JSON.parse(result);
                    result.forEach(function(item) {
                        comboSubArea.append(
                            `<option value="${item.id}">${item.description}</option>`
                        );
                    });

                    comboSubArea.prop('disabled', false);
                    comboSubArea.focus();
                },
                error: function(errors) {}
            });
        } else {
            comboSubArea.prop('disabled', true);
        }
    });
});
