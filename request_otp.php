<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
    <link rel="stylesheet" href="css/request_otp.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container login">
            <form id="otpForm" action="sendOTP.php" method="POST">
                <h1 class="titulo">Enviar Código</h1>
                <p>Introduza o seu email para que possa receber o código de redefinição de palavra-passe</p>
                <div class="input-box">
                    <i class="fa fa-envelope icon"></i>
                    <input type="text" name="email" required placeholder="Email">
                </div>
                <button class="btnSend" id="sendButton">Enviar</button>
                <button class="btnBack" onclick="window.history.back();">Voltar</button>
            </form>
            <div id="message" style="display: none;"></div>
            <button class="otp-link" id="resetButton" style="display: none;" onclick="window.location.href='enterOTP.php'">Redefinir palavra-passe</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#otpForm').submit(function(e) {
                e.preventDefault();
                var email = $('input[name="email"]').val();

                $.ajax({
                    type: 'POST',
                    url: 'sendOTP.php',
                    data: {email: email},
                    success: function(response) {
                        $('#message').html(response).show();
                        if (response.includes('código foi enviado')) {
                            $('#sendButton').prop('disabled', true);
                            $('#resetButton').show();
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>