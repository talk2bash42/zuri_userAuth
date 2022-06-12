<?php
// initiate session
session_start();


if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($email, $password);
}

function loginUser($email, $password)
{
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */

    // file path
    $csv_path = "../storage/users.csv";
    // get all user details from csv
    $file_res = fopen($csv_path, 'r');
    // save data into csv file
    while ($users = fgetcsv($file_res, 1000)) {
        # check if line is not empty
        if (isset($users[0])) {
            // check if user exist
            if ($email == $users[1] && $password == $users[2]) {
                // save user detail to session
                $_SESSION['username'] = $users[0];
                // redirect user to dashboard
                header('location: ../dashboard.php');
                // stop execution
                exit;
            }
        }
    };
    // close file stream
    fclose($file_res);
    
    // invalid login redirect user to login page
    header('location: ../forms/login.html');
}
