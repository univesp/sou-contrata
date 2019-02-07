$(document).ready(function(){
    $('#submit').on('click', function (e) {
        e.preventDefault();
        id = $("#hidden-id").val();

        $.ajax({
            url:'../../../admin/password/update/' + id,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            data: { 
                'id' : id,
                _token : $('meta[name="csrf-token"]').attr('content'), 
                old_password: $('#old_password').val(),
                password: $('#password').val(),
                password_confirm: $('#password_confirm').val(),
            },
            success: function (data) {
                if(data.success) {
                    $('#msgSuccess').addClass('msgSuccess');
                    $('#msgSuccess').append(
                        '<div class="alert alert-success" role="alert">'+ data.success +'</div>'
                    );
                    $('input[type="password"]').val('');
                }

                if(data.errors) {
                    $.each(data.errors, function(key, value){
                        $('#msgFail').addClass('msgFail');
                        $('#msgFail').append(
                            '<div class="alert alert-danger" role="alert">' + value + '</div>'
                        );
                    });
                }
                
                setTimeout(() => {
                    $('.alert-success').hide();
                    $('.alert-danger').hide();
                }, 5000);
            },
        });
    });
});