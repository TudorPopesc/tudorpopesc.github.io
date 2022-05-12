<?php
$succesInsert = $errInsert = "";
$name = $email = $intreb = "";
$nameErr = $emailErr = $intrebErr = "";
$flagName;
$flagEmail;
$flagIntreb;
$succesAddAdmin = $errAddAdmin = "";
$cale = "http://localhost/";
$class = "";
if (isset($_REQUEST['intrebare'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $email = $intreb = "";
		$nameErr = $emailErr = $intrebErr = "";
		$flagName = $flagEmail = $flagIntreb = false;

		if (empty($_POST["name"])) {
			$nameErr = "Введите имя!";
			$flagName = false;
		} else {
			$name = test_input($_POST["name"]);
			if (!preg_match("/^[a-zА-Яа-я]{3,15}$/i", $name)) {
				$nameErr = "Имя не должно содержать цифр";
				$flagName = false;
			} else $flagName = true;
		}

		if (empty($_POST["email"])) {
			$emailErr = "Введите ваш email!";
			$flagEmail = false;
		} else {
			$email = test_input($_POST["email"]);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Не правельный адресс!";
				$flagEmail = false;
			} else $flagEmail = true;
		}

		if (empty($_POST["ques"])) {
			$intrebErr = "Введите вопрос";
			$flagIntreb = false;
		} else {
			$intreb = test_input($_POST["ques"]);
			if (!preg_match("/^[A-Za-zА-Яа-я ,.!?+*&0-9]{5,1000}$/i", $intreb)) {
				$intrebErr = "Вопрос содержит запрещенные символы или слижком короткий!";
				$flagIntreb = false;
			} else $flagIntreb = true;
		}
	}


	if ($flagName and $flagEmail and $flagIntreb) {
		$insertToDB = "INSERT INTO intrebari (email, nume,intrebare,raspuns)
							  VALUES ('$email', '$name', '$intreb','0')";
		try {
			if (mysqli_query($connection, $insertToDB)) {
				$succesInsert = "Вопрос успешно отправлен!";
				$class = "alert-success";
			} else {
				$errInsert = "Что-то пошло не так";
				$class = "alert-danger";
			}
		} catch (mysqli_sql_exception $e) {
			var_dump($e);
			exit;
		}
	}
}


$selectQues = $raspuns = "";
$selectQuesErr = $raspunsErr = "";
$succesUpdate = $errUpdate = "";
if (isset($_REQUEST['raspunde'])) {
	$flagSelect = $flagAnswer = false;
	if ($_POST['selectIntrebare'] != '0') {
		$selectQues = $_POST['selectIntrebare'];
		$selectQuesErr = "";
		$class = "alert-success";
		$flagSelect = true;
	} else {
		$selectQuesErr = "Nu ati ales intrebarea!";
		$class = "alert-danger";
	}
	if (!empty($_POST['raspunsIntreb'])) {
		$raspuns = test_input($_POST['raspunsIntreb']);
		$class = "alert-success";
		$flagAnswer = true;
	} else {
		$raspunsErr = "Lipseste raspunsul!!";
		$class = "alert-danger";
	}
	if ($flagAnswer && $flagSelect) {
		$updateQuery = "UPDATE intrebari SET raspuns = '$raspuns'WHERE id_intrebare = $selectQues";
		try {
			if (mysqli_query($connection, $updateQuery)) {
				$succesUpdate = "Raspunsul a fost trimis!";
				$class = "alert-success";
			} else {
				$class = "alert-danger";
				$errUpdate = "Что-то пошло не так";
			}
		} catch (mysqli_sql_exception $e) {
			var_dump($e);
			exit;
		}
	}
}
$login = $pass = $role = "";
$loginErr = $passErr = $roleErr = "";
if (isset($_REQUEST['add-moderator-admin'])) {
	$flagLogin = $flagPass = $flagSelect = false;
	if (!empty($_POST['login'])) {
		$login =  test_input($_POST['login']);
		$flagLogin = true;
		//$class = "alert-success";
	} else {
		$loginErr = "Nu ati setat login!";
		$class = "alert-danger";
	}
	if (!empty($_POST['pass'])) {
		$pass =  test_input($_POST['pass']);
		$pass = md5($pass);
		$flagPass = true;
		//$class = "alert-success";
	} else {
		$passErr = "Introduceti o parola!";
		$class = "alert-danger";
	}
	if ($_POST['selectRole'] != -1) {
		$role = $_POST['selectRole'];
		$class = "alert-success";
		$flagSelect = true;
	} else {
		$roleErr = "Selectati rolul!";
		$class = "alert-danger";
	}

	if ($flagLogin and $flagPass and $flagSelect) {
		$addAdminQuery = "INSERT INTO admin(login, password,role) VALUES ('$login','$pass', $role)";
		try {
			if (mysqli_query($connection, $addAdminQuery)) {
				$succesAddAdmin = "Adminul a fost adaugat!";
				$class = "alert-success";
			} else {
				$class = "alert-danger";
				$errAddAdmin = "Что-то пошло не так";
			}
		} catch (mysqli_sql_exception $e) {
			var_dump($e);
			exit;
		}
	}
}
$succesDelAdmin = $errDelAdmin = "";
if (isset($_REQUEST['deleteAdmin'])) {
	$selectedAdmin;
	$selectedAdminErr = "";
	$flagSelAdm = false;
	if (isset($_POST['selectAdmin'])) {
		$selectedAdmin = $_POST['selectAdmin'];
		$class = "alert-success";
		$flagSelAdm = true;
	} else {
		$class = "alert-danger";
		$selectedAdminErr = "Nu ati selectat adminul!";
	}

	if ($flagSelAdm) {
		$queryDel = "DELETE FROM admin WHERE id_admin = $selectedAdmin";
		try {
			if (mysqli_query($connection, $queryDel)) {
				$succesDelAdmin = "Adminul a fost sters!";
				$class = "alert-success";
			} else {
				$class = "alert-danger";
				$errDelAdmin = "Что-то пошло не так";
			}
		} catch (mysqli_sql_exception $e) {
			var_dump($e);
			exit;
		}
	}
}

if (isset($_REQUEST['deleteModerator'])) {
	$selectedAdmin;
	$selectedAdminErr = "";
	$flagSelAdm = false;
	if (isset($_POST['selectModer'])) {
		$selectedAdmin = $_POST['selectModer'];
		$class = "alert-success";
		$flagSelAdm = true;
	} else {
		$class = "alert-danger";
		$selectedAdminErr = "Nu ati selectat adminul!";
	}

	if ($flagSelAdm) {
		$queryDel = "DELETE FROM admin WHERE id_admin = $selectedAdmin";
		try {
			if (mysqli_query($connection, $queryDel)) {
				$succesDelAdmin = "Adminul a fost sters!";
				$class = "alert-success";
			} else {
				$class = "alert-danger";
				$errDelAdmin = "Что-то пошло не так";
			}
		} catch (mysqli_sql_exception $e) {
			var_dump($e);
			exit;
		}
	}
}

function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
