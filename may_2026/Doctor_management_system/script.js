//should let you switch through the dates to get the id of the user based off what date they pick

//this works. need to get the value the day_id returns into a php variable so that i can add it into the prepared statement. AND days_id = ?; - add that to the prepared statement :)
document.getElementById("adate").onchange = function() {myFunction()};
document.getElementById("atime").onchange = function() {secondAJAX()};

function myFunction() {
    var x = document.getElementById("adate");
    let date = new Date(x.value);
    let day_id = date.getDay();

    const url = 'getdoctors.php';
    fetch(url, {
        method: 'POST',
        body: JSON.stringify({ date: day_id})
    })
        .then(data => data.json())
        .then(response =>
        {
            if (response.failed)
            {
                console.log(response.error_message);
            }
            else
            {
                document.querySelector('#doctor').innerHTML = null;
                const select = document.querySelector('#doctor');
                const optPeds = document.createElement("OPTGROUP");
                optPeds.setAttribute("label", "Pediatricians");
                const optGP = document.createElement("OPTGROUP");
                optGP.setAttribute("label", "GPs");

                select.appendChild(optPeds);
                select.appendChild(optGP);

                for(let i=0;i < response.doctors_list.length; i++){
                    let individual_doctor_array = response.doctors_list[i];
                    //let individual_doctor_id = individual_doctor_array.id;
                    let individual_doctor_name = individual_doctor_array.name;
                    let individual_doctor_speciality = individual_doctor_array.speciality;
                    console.log(individual_doctor_speciality);

                    if (individual_doctor_speciality === "Pediatrician") {
                        const newOptn = document.createElement('option');
                        const optnText = document.createTextNode(individual_doctor_name );
                        newOptn.appendChild(optnText);
                        newOptn.setAttribute('value', individual_doctor_name);

                        optPeds.appendChild(newOptn);
                    }
                    else if (individual_doctor_speciality === "GP") {
                        const newOptn = document.createElement('option');
                        const optnText = document.createTextNode(individual_doctor_name);
                        newOptn.appendChild(optnText);
                        newOptn.setAttribute('value', individual_doctor_name);

                        optGP.appendChild(newOptn);

                    }
                }
                // go through the doctors list for loop
                //for every doctor NAME. only need to pull the names. put them into the select
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

}

function getOption() {
    const newOptn = document.createElement('option');
    const optnText = document.createTextNode(individual_doctor_name);
    newOptn.appendChild(optnText);
    newOptn.setAttribute('value', individual_doctor_name);
}

/*
make the opt groups outside of the if statement and then call the values to go into the opt groups inside the if statement
*/

/* function secondAJAX() {
  //this is the data they are grabbing to send to the php
  let day = document.getElementById.onchange("adate");
  let time = document.getElementById.onchange("atime");
  let doctor = document.getElementById.onchange("doctor");


  const url = 'conflicts.php';
  fetch(url, {
    method: 'POST',
    body: JSON.stringify({ date: day}, {time: time}, {doctor: doctor})
  })
  .then(data => data.json())
  .then(response =>
  {
    if (response.failed)
    {
      console.log(response.error_message);
    }
    else
    {
      /*if (response > 0) {
        const CON_MESS = document.createElement("h3");
        CON_MESS.setAttribute("Sorry! This appointment is taken, please pick another date");
      }  else {
        const SUC_MESS = document.createElement("h3");
        SUC_MESS.setAttribute("date is available");
      }
    console.log("hello world");

    }
      // go through the doctors list for loop
      //for every doctor NAME. only need to pull the names. put them into the select
   })
   .catch(error => {
    console.error('Error:', error);
  });
} */