<!-- old code graveyard. RIP -->
<?php /* PHP HERE
 /* $sql = "INSERT INTO patient_data
                    VALUES ('$firstname',
                            '$lastname',
                            '$email',
                            '$phone',
                            '$appdate',
                            '$apptime',
                            '$doctor',
                            '$patquery')"; */

/*
if (mysqli_query($mysqli, $sql)) {
    echo "<h3>Appointment booked for the $appdate at $apptime. All Appointments are a max of 30 minutes long.</h3>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
*/

// $epoch_user_date = strtotime("@$appdate");
// $user_date = new DateTime($epoch_user_date);
//echo "<pre>" . print_r($user_date, false) . "</pre>";
//$updated_tomorrows_date = $tomorrows_date->format('Y-m-d');


//$speciality_array_data = doctors.Speciality - how to do this? ;-;
/*
$speciality_array_data = array('Pediatrician' ,'GP');

foreach($speciality_array_data as $speciality_array) {
    $doctors_speciality = $speciality_array;
    sql_preparedstatement($mysqli, $doctors_speciality);
    echo $doctors_speciality;
}



function doctors_db($mysqli, $doctors_speciality) {

    $doctors_query = "SELECT daysfordoctors.doctors_id, doctors.Name, daysfordoctors.days_id
        FROM daysfordoctors
        INNER JOIN doctors
        ON daysfordoctors.doctors_id=doctors.ID
        WHERE doctors.Speciality = ?"; // SQL query. selects the data needed from the joint table and joins it with the doctor table
    //sql query SHOULD work. works in sql terminal thingy
    //prepared statement
    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $doctors_query)) {
        echo "SQL Statement failed";
    } else {
        mysqli_stmt_bind_param($stmt, "s", $doctors_speciality);

        mysqli_stmt_execute($stmt);
        $doctors_result = mysqli_stmt_get_result($stmt);

        //put thid dtuff in a foreach loop? and call the function within it?
/* if ($doctors_result)
{
    // If number of rows > 0 - need to do something here but i forgot.
    //about how many rows their are, if 0 then report error??
        if ($doctors_result['total_rows'] > 0) { //shows an error when no rows are displayed
            echo "<h3>No rows of Doctors detected</h3>";

        } else {

            $doctors_array = array(); //makes an array

            while($doctors_row = mysqli_fetch_array($doctors_result)) {

                if (isset($doctors_array[$doctors_row['doctors_id']])) // checks to see if the doctor id is set in the row
                    {
                    $existing_individual_doctor_array = $doctors_array[$doctors_row['doctors_id']]; //puts the array into a new variable

                    $existing_days_working_array = $existing_individual_doctor_array['days_working']; //connect the doctors id to the days working shown on the database
                    // [3]

                    $existing_days_working_array[] = $doctors_row['days_id']; // allows for the days to stack and not rewrite eachother
                    // [3,5]

                    $doctors_array[$doctors_row['doctors_id']]['days_working'] = $existing_days_working_array;
                }
                else
                {
                    /*
                        $individual_doctor_array = array(
                            'doctor_name' => 'Dr William Afton',
                            'days_working' => [3]
                        );


                        // makes the array
                    $individual_doctor_array = array(
                        'doctor_name' => $doctors_row['Name'],
                        'days_working' => array(
                            $doctors_row['days_id']
                        )
                    );

                    $doctors_array[$doctors_row['doctors_id']] = $individual_doctor_array; //makes an array for eaach individual doctor to pull from.

                    /*
                        $doctors_array = array(
                            1 => array(
                                'doctor_name' => 'Dr William Afton',
                                'days_working' => [3]
                            ),
                            2 => array(
                                'doctor_name' => '....',
                                'days_working' => [2,4]
                            );
                        }

                        $doctors_array = array(
                            'gp' = array(
                                1 => array(
                                    'doctor_name' => '....',
                                    'days_working' => [3]
                                ),
                                2 => array(
                                    'doctor_name' => '....',
                                    'days_working' => [2,4]
                                );
                            )
                        }

                        echo "<pre>" . print_r($array, false) . "</pre>"; clearer version of var_dump :D

                }

            }
        }
    }
   /* else
    {
        echo "<h3>No Doctors available on said date. please select another date</h3>";


} */
?>
<?php /*

                //pediatrician needs to change to a way to swap it for gp or keep as pediatrician
                doctors_db($mysqli, 'Pediatrician');
                foreach ($doctors_array as $individual_doctor_key => $individual_doctor_row) //for each loop for each row of doctors
                {

                    ?>
                    <option data-days='<?php echo implode(",", $individual_doctor_row['days_working']); ?>' value = "<?php echo $individual_doctor_key; ?>"><?php echo $individual_doctor_row['doctor_name']; ?></option>
                <!-- within the option tag, it implodes the array into an individual value (doctor name?) -->
               <?php
            } */?>
<?php /*

                foreach ($doctors_array as $individual_doctor_key => $individual_doctor_row)
                {
                    doctors_db($mysqli, 'GP');
                    ?>
                    <option data-days='<?php echo implode(",", $individual_doctor_row['days_working']); ?>' value = "<?php echo $individual_doctor_key; ?>"><?php echo $individual_doctor_row['doctor_name']; ?></option>
                <?php
            } */ ?>

<?php
/* JAVASCRIPT HERE
if (individual_doctor_speciality === "Pediatrician") {
    const optPeds = document.createElement("OPTGROUP");
    optPeds.setAttribute("label", "Pediatricians");

  }
  else if (individual_doctor_speciality === "GP") {
    const optGP = document.createElement("optgroup");
    optGP.setAttribute("label", "GPs");
  }
    */



//greg is my ajax variable :)
/*var greg = new XMLHttpRequest();

greg.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    //when function value is returned run the ajax

  }
}

greg.open("POST", "thingy.php");
greg.send();


*/
?>