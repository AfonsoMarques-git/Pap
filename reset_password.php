<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/request_otp.css">
    <title>Reset Password</title>
</head>

<body>
    <?php
    $otp = $_POST["otp"];
    include_once 'connect.php';
    $sql = "SELECT * FROM utilizadores WHERE otp = :otp";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["otp" => $otp]);
    $count = $stmt->rowCount();
    if ($count > 0) { ?>
        <div class="container">
            <div class="titulo">Reset Password</div>

            <form action="update_password.php" method="POST">
                <input type="hidden" name="otp" value="<?php echo $otp; ?>">
                <div class="input-box">
                    <input type="password" name="new_password" placeholder="New Password" required>
                </div>

                <div class="input-box">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                </div>

                <button class="btnSend">Submit</button>
            </form>
        </div>
        <?php
    } else {
        echo '<div class="erro">Incorrect OTP, try again later...</div>';
    }
    ?>
</body>

</html>