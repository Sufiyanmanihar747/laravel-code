        $("#toggle").on("click", function () {
            $('i').toggleClass('bi-eye-fill bi-eye-slash-fill');
            if ($('#password').attr("type") == 'password') {

                $('#password').attr('type', 'text');
                $('i').attr('title', 'hide password');

            }
            else {
                $('#password').attr('type', 'password');
                $('i').attr('title', 'show password');
            }
        });
console.log('hello');
console.log('hello');