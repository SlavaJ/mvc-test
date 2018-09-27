$( document ).ready(function() {
    $("#btn").click(
        function(){
           var email = $('input[name = email]').val();
           var password = $('input[name = password]').val();

            $.ajax({
                url:     '/ajax/login',
                type:     'POST',
                dataType: 'text', //формат данных
                data: {email : email, password : password},
                success: function(response) {
                    if(response == 'no error') {
                        setTimeout(function(){location.href = '/profile/'}, 2000);
                        $('#result_form').text('Вы будете перенаправлены на страницу профиля.');
                    } else {{
                        alert(response)
                    }}
                },
                error: function(response) {
                    console.log('Do not work');
                }
            });

            return false;
        }
    );
});
