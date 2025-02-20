<?php
$email = $_POST["email"];
$otp = rand(100000, 999999); // Generate a 6-digit OTP

include_once 'connect.php';

try {
    $sql = "SELECT * FROM utilizadores WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["email" => $email]);
    $count = $stmt->rowCount();
    if ($count > 0) {
        // if exists, send otp and update database

        $sql_update_statement = "UPDATE utilizadores SET otp = :otp WHERE email = :email";
        $statement = $pdo->prepare($sql_update_statement);
        $statement->execute(["otp" => $otp, "email" => $email]);

        try {
            require "emailAPI.php";
            // Recipient
            $mail->CharSet = 'UTF-8';
            $mail->setFrom($sender, 'Companhia da Mariposa');
            $mail->addAddress($email, 'User');
            $mail->addReplyTo($sender, 'OTP Sender');

            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Redefinição de Senha';
            $mail->Body = 'Olá! Aqui está o seu código: ' . $otp . '<br />';

            $mail->send();
            echo '<div class="success-message">O seu código foi enviado, verifique o seu email.</div>';
        } catch (Exception $e) {
            echo 'Ocorreu um erro ao enviar o email: ', $mail->ErrorInfo;
        }
    } else {
        echo "O endereço de email não existe na base de dados.";
    }
} catch (PDOException $e) {
    echo "Ocorreu um erro ao acessar a base de dados: " . $e->getMessage();
}
?>