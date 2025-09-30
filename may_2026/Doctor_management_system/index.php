<?php
require("database.php"); //adds database
?>

<!DOCTYPE HTML> <!-- sets the doc type to html -->

<html lang = "en"> <!-- sets the language to english -->
<head>

    <title>doctor booking website 100% real</title> <!-- adds a title to the search bar -->
    <link href = "stylesheet.css" rel = "stylesheet"> <!-- links to the external stylesheet -->
</head>

<body>
<h1>Doctor appointment management system</h1>
<!-- form for patient input -->
<form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">  <!-- makes the form to hold the user inputs, php makes it more secure  -->
    <label for = "fname">Patient First Name: </label>
    <input type = "text" id = "fname" name = "fname" required="true" placeholder = "freddy">

    <label for = "lname">Patient Last Name: </label>
    <input type = "text" id = "lname" name = "lname" required="true" placeholder = "fazbear">
    <br>
    <label for = "email">Email: </label>
    <input type = "email" id = "email" name = "email" required="true" placeholder = "horhorhorhorhor@gmail.com">

    <label for = "phone">Phone Number: </label>
    <input type = "tel" id = "phone" name = "phone" required="true" placeholder = "1-833-578-0158">

    <br>
    <label for = "adate">Appointment Date: </label>
    <input type = "date" id = "adate" name = "adate" required="true">

    <label for = "atime">Appointment Time: </label>
    <select id = "atime" name = "atime" required="true" >
        <?php
        //$time_query = 'SELECT times FROM time_slots'; need to change this to prepared statement only temp
        $time_query = mysqli_query($mysqli, "SELECT times FROM time_slots");
        while($rows = $time_query->fetch_assoc()) {
            $times = $rows['times'];
            echo "<option value='$times'>$times</option>";
        }

        /* $time_query =  "SELECT times FROM time_slots";

          $stmt = mysqli_stmt_init($mysqli);

          if (!mysqli_stmt_prepare($stmt, $time_query)) {
                  echo "SQL Statement failed";
              } else {
                  mysqli_stmt_bind_param($stmt, $time_query);
                  mysqli_stmt_execute($stmt);
                  $time_result = mysqli_stmt_get_result($stmt);
                   $times = $rows['times'];
                  echo "<option value='$times'>$times</option>";
              }    */
        ?>
    </select>

    <br>
    <label for = "doctor">Doctor Name: </label>
    <select id = "doctor" name = "doctor">
        <option value="" disabled selected>Please Select a date and time to see which doctors are available</option>
    </select>

    <br>
    <label for = "pquery">Patient query (max 500 characters): </label> <!-- patient query here -->
    <textarea cols="46" rows="8" name="pquery" id="pquery" required="true" placeholder = "organs fell out" maxlength= "500"></textarea>
    <br>
    <input type="submit" value="Submit">

</form>

<script src="script.js"></script>

</body>

</html>

<?php



//validates user inputs

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $firstname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL); // find validate for the other ones with special chars
    $phone = filter_input(INPUT_POST, "phone", FILTER_VALIDATE_INT);
    $appdate = filter_input(INPUT_POST, "adate");
    $apptime = filter_input(INPUT_POST, "atime");
    $doctor = filter_input(INPUT_POST, "doctor", FILTER_SANITIZE_SPECIAL_CHARS);
    $patquery = filter_input(INPUT_POST, "pquery", FILTER_SANITIZE_SPECIAL_CHARS);
    date_default_timezone_set('Europe/London');
    $timestamp = date("Y-m-d H:i:s");

    $conflicts_query = "SELECT * FROM patient_data
                    WHERE app_date = (?) AND app_time = (?) AND doctor = (?)";
    $conflict_stmt = mysqli_stmt_init($mysqli);
    if (!mysqli_stmt_prepare($conflict_stmt, $conflicts_query)) {
        echo "SQL statement failed";
    } else {
        mysqli_stmt_bind_param($conflict_stmt, 'sss',
            $appdate,
            $apptime,
            $doctor);
        mysqli_stmt_execute($conflict_stmt);
        $conflicts = mysqli_stmt_get_result($conflict_stmt);
    }


    //date stuff
    $tomorrows_date = new DateTime("tomorrow");
    $user_date = new DateTime($appdate);

    if(empty($firstname) or mb_strlen($firstname) > 50 ){
        echo "<h3>please enter a first name or first name is too many characters</h3>";

    } elseif(empty($lastname) or mb_strlen($lastname) > 50 ){
        echo "<h3>please enter a last name or last name is too many characters</h3>";

    } elseif(empty($email) or mb_strlen($email) > 50 ){
        echo "<h3>please enter a valid email address or email address is too many characters</h3>";

    } elseif(empty($phone) or mb_strlen($phone) > 15 ){
        echo "<h3>please enter a valid phone number</h3>";

    } elseif(empty($appdate) or $user_date < $tomorrows_date){
        echo "<h3>please enter a valid appointment date</h3>";


    } elseif(empty($apptime)){
        echo "<h3>please enter a valid appointment time</h3>";

    } elseif(empty($doctor) or mb_strlen($doctor) > 50 ){
        echo "<h3>please enter a doctor's title or doctor's title is too many characters</h3>";

    } elseif(empty($patquery)  or mb_strlen($patquery) > 500 ){
        echo "<h3>please enter a patient query or patient query is too many characters</h3>";

    } elseif ($conflicts -> num_rows > 0) {
        echo "<h3>Sorry! This appointment is taken, please pick another date</h3>";

    } else {

        //puts data into the database

        $sql = "INSERT INTO patient_data 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"; //prepared statement :D


        $stmt = mysqli_stmt_init($mysqli);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed";
        } else {
            mysqli_stmt_bind_param($stmt, 'sssssssss',
                $firstname,
                $lastname,
                $email,
                $phone,
                $appdate,
                $apptime,
                $doctor,
                $patquery,
                $timestamp);
            mysqli_stmt_execute($stmt);
            header('Location: success.php');
            exit;
        }


        //echo "<h3>Appointment booked for the $appdate at $apptime. All Appointments are a max of 30 minutes long.</h3>";
        //echo "<script> alert (`Appointment booked sucessfully. All appointments are a max of 30 minutes long.`)</script>";


        $mysqli->close();  //closes the database connection when no longer needed

    }

}

?>
