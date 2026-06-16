<?php
//connect to the database
include 'db_conn.php';

//check if the form was submitted using the post method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //get data from the html form
    $name = $_POST['user_Name'];
    $phone = $_POST['user_Phone'];
    $email = $_POST['user_Email'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];

    //prepare the sql command
    $sql = "INSERT INTO messages (name, phone, email, subject, message) VALUES (?, ?, ?, ?, ?)";
    
    //send the data
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("sssss", $name, $phone, $email, $subject, $message);

        //execute the save
        if ($stmt->execute()) {
            //success: redirected back to the support page
            header("Location: ../support.html?status=success");
            exit(); 
            
        } else {
            //error: Something went wrong
            header("Location: ../support.html?status=error");
            exit();
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    //if someone tries to open this file directly
    header("Location: ../support.html");
    exit();
}
?>