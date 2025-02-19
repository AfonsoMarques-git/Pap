<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request OTP</title>
    <link rel="stylesheet" href="css/request_otp.css">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container login">
            <form action="sendOTP.php" method="POST">
                <h1 class="titulo">Enviar Código</h1>
                <p>Introduza o seu email para que possa recebar o código de redefinição de palavra-passe</p>
                <div class="input-box">
                    <i class="fa fa-envelope icon"></i>
                    <input type="text" name="email" required placeholder="Email">
                </div>
                <button class="btnSend">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>