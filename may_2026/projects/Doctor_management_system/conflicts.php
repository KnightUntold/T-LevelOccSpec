<?php require("database.php");
$input = json_decode(file_get_contents('php://input'), true);
$stan = array(
    'failed'=>false,
    'error_message'=>' '
);
$temp;

$selected_date = $input["date"];
$selected_doctor = $input["doctor"];
$selected_time = $input["time"];


$conflicts_query = "SELECT COUNT(*) as conflicts
                    FROM patient_data
                    WHERE app_date = (?) AND app_time = (?) AND doctor = (?)";

$conflict_stmt = mysqli_stmt_init($mysqli);
if (!mysqli_stmt_prepare($conflict_stmt, $conflicts_query)) {
    echo "SQL statement failed";
} else {
    mysqli_stmt_bind_param($conflict_stmt, 'sss',
        $appdate,
        $apptime,
        $doctor);
    $conflicts = mysqli_stmt_execute($conflict_stmt);
}
echo "<pre>" . print_r($conflicts, false) . "</pre>";
$stan = $conflicts;

echo json_encode($stan); //sends to the javascript

$mysqli->close();
?>