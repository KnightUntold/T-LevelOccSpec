<?php

require("database.php");
$input = json_decode(file_get_contents('php://input'), true);
$george = array(
    'failed'=>false,
    'error_message'=>' ',
    'doctors_list'=> array()
);
$temp;
$selected_date = $input["date"]; //day id is put into prepared statrement form this variable
$doctors_speciality_array = array('Pediatrician', 'GP');

foreach ($doctors_speciality_array as $individual_doctors_speciality_array) {
    $doctors_query = "SELECT daysfordoctors.doctors_id, doctors.Name, doctors.Speciality, daysfordoctors.days_id
                    FROM daysfordoctors
                    INNER JOIN doctors
                    ON daysfordoctors.doctors_id=doctors.ID
                    WHERE days_id = (?)";

    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $doctors_query)) {
        echo "SQL Statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "i", $selected_date);

        mysqli_stmt_execute($stmt);
        $doctors_result = mysqli_stmt_get_result($stmt);


        $doctors_array = array(); //makes an array

        while($doctors_row = mysqli_fetch_array($doctors_result)) { //runs through all the names given in the database
            $individuals_doctors_array = array( //what is in the array
                'id' => $doctors_row['doctors_id'],
                'name' => $doctors_row['Name'],
                'speciality' => $doctors_row['Speciality']
            );
            $doctors_array[] = $individuals_doctors_array; //transfers all the data in the array into another array

        }
    }
}
$george['doctors_list'] = $doctors_array;

echo json_encode($george); //sends to the javascript


$mysqli->close();
//  echo "<pre>" . print_r($array, false) . "</pre>"; clearer version of var_dump :D

/*
   oh god its time for time. D:

*/
?>

