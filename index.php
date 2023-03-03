<?php

/**
 * Description of cardDB
 *
 * @author talha
 */
session_start();

require ('PersonDB.php');
require ('Database.php');
require ('Utility.php');
require ('cardDB.php');

$action = filter_input(INPUT_GET, 'action');
$sign = $_POST['sign'] ?? "";

$debug = $action;
$error_msg = "";
//
if ($sign == NULL || $sign == FALSE || $sign == "") {
    $sign = 'signIn';
    include('signIn.php');
}
if ($sign == 'verifyUser') {

    $userID = $_POST['id'];
    $number = preg_match('@[0-9]@', $userID);
    $uppercase = preg_match('@[A-Z]@', $userID);
    $lowercase = preg_match('@[a-z]@', $userID);

    if ($uppercase || $lowercase || !$number) {
        $error_msg = "Please only enter your ID.";
        include('error.php');
    } else{
        include ('home.php');
        }
}
if ($sign == 'createUser') {

    $newName = $_POST['newName'];
    $newEmail = $_POST['newEmail'];
    $newPass = $_POST['newPass'];

    $onlyLetters = preg_match('@[0-9]@', $newName);
    $nameChars = preg_match('@[^\w]@', $newName);

    $number = preg_match('@[0-9]@', $newPass);
    $uppercase = preg_match('@[A-Z]@', $newPass);
    $lowercase = preg_match('@[a-z]@', $newPass);
    $specialChars = preg_match('@[^\w]@', $newPass);

    if ($newName == '' || $newEmail == '' || $newPass == '') {
        $error_msg = "Please enter your information.";
        include('error.php');
    } else if (strlen($newPass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        $error_msg = "Password must be at least 8 characters and have one Upper Case character, one special character, and one number.";
        include('error.php');
    } else if ($onlyLetters || $nameChars) {
        $error_msg = "User Name must only have letters.";
        include('error.php');
    } else if (Utility::userExists($newEmail)) {
        $error_msg = "User $newEmail already exists.";
        include('error.php');
    } else if ($newPass == '') {
        $error_msg = "Please enter a password.";
        include('error.php');
    } else {
        $_SESSION['email'] = $newEmail;
        PersonDB::createUser($newName, $newEmail, $newPass);
        include('home.php');
    }
} else if ($sign == 'edit') {
    $cardID = $_POST['cardID'];

    include ('editCard.php');
} else if ($sign == 'editCard') {

    $userID = PersonDB::getPersonID($_SESSION['email']);

    $cardID = $_POST['cardID'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $digits = $_POST['digits'];

    $specialN = preg_match('@[^\w]@', $name);
    $specialA = preg_match('@[^\w]@', $address);
    $specialD = preg_match('@[^\w]@', $digits);
    $onlyNum = preg_match('@[0-9]@', $digits);
    $onlyLetters = preg_match('@[0-9]@', $name);

    if ($specialN || $specialA || $specialD || !$onlyNum || $onlyLetters) {
        $error_msg = "Please enter valid information.";
        include('error.php');
    } else {
        cardDB::editCard($cardID, $name, $address, $digits);
        include('home.php');
    }
} else if ($sign == 'add') {
    include ('addCard.php');
} else if ($sign == 'addCard') {

    $userID = PersonDB::getPersonID($_SESSION['email']);

    $name = $_POST['name'];
    $address = $_POST['address'];
    $digits = $_POST['digits'];

    $specialN = preg_match('@[^\w]@', $name);
    $specialA = preg_match('@[^\w]@', $address);
    $specialD = preg_match('@[^\w]@', $digits);
    $onlyNum = preg_match('@[0-9]@', $digits);
    $onlyLetters = preg_match('@[0-9]@', $name);

    if ($name == '' || $address == '' || $digits == '') {
        $error_msg = "Please enter your information.";
        include('error.php');
    } else if ($specialN || $specialA || $specialD || !$onlyNum || $onlyLetters) {
        $error_msg = "Please enter valid information.";
        include('error.php');
    } else {
        cardDB::addCard($userID, $name, $address, $digits);
        include('home.php');
    }
} else if ($sign == 'delete') {

    $userID = PersonDB::getPersonID($_SESSION['email']);
    $cardID = $_POST['cardID'];

    cardDB::deleteCard($cardID);
    include ('home.php');
} else if ($sign == 'home') {
    include 'home.php';
} else if ($sign == 'logout') {
    session_destroy();
    include 'signIn.php';
}
?>

