<?php
session_start();

$FirstName = $_POST["firstName"];
$LastName = $_POST["lastName"];
$email = $_POST["email"];
$password = $_POST["password"];
$password_2 = $_POST["password_2"];

$isEmailExist = false;

$users = [
    [
        'FirstName' => 'Hans',
        'LastName' => 'Flick',
        'email' => 'bayern@munich',
        'password' => 'Muller',
        'password_2' => 'Muller'
    ],
    [
        'FirstName' => 'Thomas',
        'LastName' => 'Tuchel',
        'email' => 'neymar@mbappe',
        'password' => 'psg',
        'password_2' => 'psg'
    ]
];


foreach ($users as $user) {
    $userEmail = $user["email"];

    if ($email == $userEmail) {
        $isEmailExist = true;
    }
}


if (!$isEmailExist) {
    echo 1;
} else {
    $arr = array(
        'FirstName' => $FirstName,
        'LastName' => $LastName,
        'email' => $email,
        'password' => $password,
        'password_2' => $password_2
    );

    $filename = fopen('array.txt', 'a+');
    $data = json_encode($arr, JSON_UNESCAPED_UNICODE);
    fwrite($filename, $data . "\r\n");
    fclose($filename);

    echo 2;
}
