<?php
require_once 'config.php';
    $link = new mysqli($host, $user, $password, $database);
if(isset($_POST["login"]) && isset($_POST["pass"]))
{
    if($link->connect_error){
        die("Ошибка: " . $link->connect_error);
    }
    $login = $link->real_escape_string($_POST["login"]);
    $pass = $link->real_escape_string($_POST["pass"]);
    $query = "SELECT login, password, id_role FROM users";
    $result = mysqli_query($link, $query);
	while ($row = mysqli_fetch_array($result)) {
			if (($row[0] == $login) && ($row[1] == $pass) && ($row[2] == 1)){
                header("Location: admin.php");
                break;
			} else if (($row[0] == $login) && ($row[1] == $pass) && ($row[2] == 2)){
                header("Location: manager.php");
                break;
            } else{
                header("Location: error.html");
            }

		}
		mysqli_free_result($result);
        $conn->close();
}