<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($fullname, $email, $password);
}

function registerUser($fullname, $email, $password)
{
    //save data into the file
    $csv_data = [$fullname,$email,$password];
    // file path
    $csv_path = "../storage/users.csv";

    // open file stream [append data]
    $file_res = fopen($csv_path, 'a');
    // save data into csv file
    $save = fputcsv($file_res, $csv_data);
    // close file stream
    fclose($file_res);

    // if saved
    if($save){
        echo "User Successfully registered";
    }
    else {
        echo "Unable to register user, Try again";
    }

}
// echo "HANDLE THIS PAGE";
