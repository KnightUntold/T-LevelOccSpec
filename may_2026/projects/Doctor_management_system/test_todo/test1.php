<?php

include("../database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testfornow</title>
</head>
<body>
<form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
    <h1>heading</h1>
    username: <br>
    <input type = "text" name = "username"><br>
    password:<br>
    <input type = "password" name = "password"><br> <br>
    <input type = "submit" name = "submit" value = "register">

</form>
</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if(empty($username)){
        echo "please enter username";
    } elseif(empty($password)){
        echo "please enter password";
    } else {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        // this needs inserting into the actual project.
        $sql = "INSERT INTO test
                    VALUES (?, ?)";

        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
            mysqli_stmt_execute($stmt);

        }


        echo "you are now registered";
    }

    $mysqli->close();
}

//mysqli_query($mysqli, "INSERT INTO test
//VALUES ('$username', '$hash')");

?>
