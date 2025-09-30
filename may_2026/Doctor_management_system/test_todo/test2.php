<form action = "<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method = "post">
    <label for = "adate">Appointment Date: </label>
    <input type = "date" id = "adate" name = "adate" required="true">
</form>

<?php /* TESTING PURPOSES ONLY, DO NOT USE
  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'doctored';

  $mysqli = @new mysqli(
    $db_host,
    $db_user,
    $db_password,
    $db_db
  );

  if ($mysqli->connect_error) {
    echo 'Errno: '.$mysqli->connect_errno;
    echo '<br>';
    echo 'Error: '.$mysqli->connect_error;
    exit();
  }

  echo 'Success: A proper connection to MySQL was made.';
  echo '<br>';
  echo 'Host information: '.$mysqli->host_info;
  echo '<br>';
  echo 'Protocol version: '.$mysqli->protocol_version;

  $mysqli->close();


try{

  $db = new pdo('mysql:host=localhost;dbname=doctored;charset=utf8','root','root');

} catch(PDOException $e) {

  die('Connection Error: ' . $e->getMessage() );
}
*/
if (isset($_POST['adate'])){
    $userinput = $_POST['adate'];
}

$date = $user;
$weekday = date('l', strtotime($date)); // note: first argument to date() is lower-case L

switch($weekday) {
    case 'Monday':
        $day_id = 1;
        echo $day_id;
        break;
    case 'Tuesday':
        $day_id = 2;
        echo $day_id;
        break;
    case 'Wednesday':
        $day_id = 3;
        echo $day_id;
        break;
    case 'Thursday':
        $day_id = 4;
        echo $day_id;
        break;
    case 'Friday':
        $day_id = 5;
        echo $day_id;
        break;
    case 'Saturday':
        $day_id = 6;
        echo $day_id;
        break;
    case 'Sunday':
        $day_id = 7;
        echo $day_id;
        break;
    default:
        echo 'Error 404, date not found';
}

echo $weekday; // SHOULD display Sunday



?>