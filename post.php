<?php
$servername = "localhost";
$username = "clubuser";
$password = "tarek123";

try {
    $conn = new PDO("mysql:host=$servername;dbname=lebonclub", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    function data($data,$inputs){
        $arr=[];
        foreach($inputs as $input )
        $arr[$input]=isset($data[$input])?$data[$input]:"";
        return $arr;
    }
    if(isset($_POST['csrfmiddlewaretoken'])){
        $data=json_encode(data($_POST,["name_first","name_last","name_child","gender","profession","number","location"]));
        $sql = "INSERT INTO inscri ( metadata, club_id) VALUES (?,?)";
        $stm=$conn->prepare($sql);
        $stm->execute([$data, $_POST['club']]);
        header("Location: index.html");
    }
?>