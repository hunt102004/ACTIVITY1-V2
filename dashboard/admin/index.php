<?php
require_once 'authentication/admin-class.php';

$admin = new ADMIN();
if(!$admin->isUserLoggedIn())
{
    $admin->redirect('../../');
}

$stmt = $admin->runQuery("SELECT * FROM user WHERE id = :id");
$stmt->execute(array(":id" => $_SESSION['adminSession']));
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewpoit" content="width=device-width, initial-scale=.1.0">
    <title>ADMIN DASHBOARD</title>
    <link rel="stylesheet" href="src/css/style.css">
</head>
<style>
    h1{
        text-align: center;
        font-size: 3cm;
    }
    body{
        background-image: url('authentication/welcome.jpg');
    }
    .button-container {
    text-align: center;
}

button {
    border: none;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
}

button a {
    color: white;
    text-decoration: none;
}

</style>
<body>
    <h1>WELCOME <br> <?php echo $user_data ['email'] ?></h1>
    <div class="button-container">
    <button><a href="authentication/admin-class.php?admin_signout">SIGN OUT</a></button>
    </div>
</body>
</html>