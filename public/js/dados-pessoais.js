$(function() {
    /* Validação de checkedbox deficiencia */
    function Validacao() {
        var checkboxes = document.getElementsByName("opcaoDeficiencia");
        var numberOfCheckedItems = 0;
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked)
                numberOfCheckedItems++;
        }
        if (numberOfCheckedItems > 1) {
            alert("Selecione somente uma opção");
            return false;
        }
    }
    // Init
    $(document).ready(function () {

        $("#opcaoSim").click(function() {

            if ($(this).is(':checked')) {
                $(".deficiencia").show();
            } else {
                $(".deficiencia").hide();
            }
        });
        // Button functonality
        $('#addSubmit').click(function (e) {
            e.preventDefault();
            // Remember token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                // Call url
                url: "{{ url('/dados-pessoais/store') }}",
                method: 'post',
                data: {
                    _token: '{{csrf_token()}}',
                    // Call values of fields candidates table
                    cpf: $('#inputNumDoc').val(),
                    date_birth: $('#textDtNasc').val(),
                    flag_deficient: $('#opcaoSim').val(),
                    genre: $('#sexo').val(),
                    last_name: $('#textSobrenome').val(),
                    marital_status: $('#inputEstadoCivil').val(),
                    name: $('#textNome').val(),
                    name_father: $('#inputNomePai').val(),
                    name_mother: $('#inputNomeMae').val(),
                    name_social: $('#textNomeSocial').val(),
                    nationality: $('#inputNatu').val(),
                    obs_deficient: $('#comentario').val(),

                    // Call values of fields addresses table
                    city: $('#inputCidade').val(),
                    complement: $('#inputComplemento').val(),
                    neighborhood: $('#inputBairro').val(),
                    number: $('#inputNum').val(),
                    postal_code: $('#inputCep').val(),
                    public_place: $('#inputLogradouro').val(),
                    state: $('#inputUF').val(),
                    type_public_place: $('#inputTipoLogra').val(),
                },
                success: function (result) {
                    // F12 or inspect on browser to show result
                    console.log(result);
                }
            });
        });
    });
});