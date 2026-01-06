<?php
    function type_getter($conn){
        //function to get all staff suitable for an appointment

        $sql = "SELECT ticket_id, type FROM tickets WHERE staff_type !=? ORDER BY staff_type DESC";

        $stmt = $conn->prepare($sql);

        $stmt->bindparam(1, $exclude_role);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); //adding all fetches everything person that matches the requirements needed
        $conn = null;
        return $result;
    }