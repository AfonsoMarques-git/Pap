<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/request_otp.css">
    <title>Enter OTP</title>
</head>

<body>
    <div class="container">
        <div class="titulo">Inserir código</div>

        <form action="reset_password.php" method="POST">
            <div class="input-box">
                <input type="password" name="otp" placeholder="Código" required>
            </div>

            <button class="btnSend">Submeter</button>
            <button class="btnBack" onclick="window.history.back();">Voltar</button>
        </form>
    </div>
</body>

</html>