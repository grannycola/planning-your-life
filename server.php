<?php
error_reporting(E_ERROR);
include_once 'config.php';

$variant = $_POST['variant'];

if ($variant == 'get_list'){
    $result = $mysqli->query("SELECT * FROM events");
    echo "<table class='table'>";   
    while ($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>".$row['name']."</td><td>".$row['date']."</td><td>".$row['time']."</td><td>".$row['description']."</td></tr>";
    }
    echo "</table>";
}

if ($variant == 'add_event'){
    $name = $_POST['event_name'];
    $date = $_POST['event_date'];   
    $time = $_POST['event_time'];
    $desc = $_POST['event_desc'];
    echo($name." - name ".$date." - date ".$time." - time ".$desc." - desc ");
        $stmt = $mysqli->prepare( "INSERT events(name, date, time, description) VALUES (?,?,?,?)");
        
        $stmt->bind_param( "ssss", $name, $date, $time, $desc);
        $stmt->execute();
        $stmt->close();
                
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt. "<br>" . $stmt->error;
        }
}

?>