<?php
$success = "";
require_once('connection.php');
require_once('valid.php');
$cale = 'http://localhost/';
session_start();
if (isset($_REQUEST['access'])) {
    if ((isset($_POST["login"])) and (!empty($_POST['login'])) and (isset($_POST["pass"])) and (!empty($_POST['pass']))) {
        $login = $_POST["login"];
        $password = $_POST["pass"];
        $queryLogin = "select login,password,role from admin";
        $res = mysqli_query($connection, $queryLogin);
        $admin = false;
        while ($row = mysqli_fetch_array($res)) {
            if ($row['login'] == trim($login) and $row['password'] == md5($password)) {
                $exist = true;
                if ($row['role'] == '1') {
                    $admin = true;
                }
            }
        }
        if ($exist == true) {
            $_SESSION['user'] = $login;
            if ($admin) {
                header('Location: ' . $cale . 'access.php');
            } else header('Location: ' . $cale . 'accessmoder.php');
        } else {
            header('Location: ' . $cale . 'admin.php');
        }
        $success = "Nu ati introdus date corecte!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- My style -->
    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital@1&family=PT+Serif:wght@700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="frame/bootstrap.css">
    <title>Admin panel</title>
</head>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form">
        <h3 align="center">Sign In</h3>
        <div class="form-inputs">
            <label for="login">Login : </label>
            <input type="text" name="login" class="form-control">
        </div>
        <div class="form-inputs">
            <label for="pass">Parola : </label>
            <input type="password" name="pass" class="form-control">
        </div>
        <div class="submits-and-null" style="display:flex; justify-content:space-around;">

            <input type="reset" value="Sterge" class="btn btn-danger mt-2">
            <input type="submit" value="Login" name="access" class="btn btn-primary mt-2">
        </div>
        <div>
            <?php echo $success; ?>
        </div>
    </form>
</body>

</html>