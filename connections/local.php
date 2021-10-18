<?php
    function runLocalQuery($sql){
        $servername = "server_name";
        $username = "db_username";
        $password = "db_password";
        $dbname = "db_name";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = $conn->query($sql);

        $array =array();

        if(strpos($sql, "INSERT") === false and strpos($sql, "UPDATE") === false)
            while($result = $query->fetch_assoc())
            {
            $array[] = $result;
            }

        $conn->close();

        return $array;
    }
?>