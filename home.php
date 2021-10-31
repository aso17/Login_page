<?php
session_start();
if (!$_SESSION['email']) {
    header("http://localhost/login_page/login.php");
}
$encripEmail = base64_encode($_SESSION['email']);
$encripNama =  base64_encode($_SESSION['nama']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css">
    <title>Home</title>
</head>

<body>
    <div class="container">
        <h4>
            <td>nama: </td><?= $_SESSION['nama']; ?><br>
            <td>email: </td><?= $_SESSION['email']; ?>
        </h4>

        <section>
            Encript User
            <h4>
                <td>nama: </td><?= $encripNama; ?><br>
                <td>email: </td><?= $encripEmail; ?>
            </h4>
        </section>
    </div>
</body>

</html>