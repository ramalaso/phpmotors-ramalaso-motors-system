<?php
/***********************************************
 * Account  Controller
 *********************************************/

// define("__ROOT__", __DIR__ ."\\");
// require_once __ROOT__ . 'library\connections.php';
// require_once __ROOT__ . 'model\main_model.php';

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main_model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
require_once '../library/functions.php';

 // Get the array of classifications
 $classifications = getClassifications();

// var_dump($classifications);
// exit;

// Build a navigation bar using the $classifications array
 $navList = '<ul>';
 $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
 foreach ($classifications as $classification) {
  $navList .= "<li><a href='/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
 }
 $navList .= '</ul>';

 $action = filter_input(INPUT_GET, 'action');
 if($action == NULL) {
     $action = filter_input(INPUT_POST, 'action');
 }

 switch ($action) {
    case 'register':
        // Filter and store the data
          $clientFirstname = filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING);
          $clientLastname = filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING);
          $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
          $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
        
          $clientEmail = checkEmail($clientEmail);
          $checkPassword = checkPassword($clientPassword);

        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/registration.php';
          exit;
        }
        
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);


        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        
        // Check and report the result
        if($regOutcome === 1){
          $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
          include '../view/login.php';
          exit;
        } else {
          $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
          include '../view/registration.php';
          exit;
        }
        break;
     case 'login':
         include '../view/login.php';
         break;
    case 'registration':
        include '../view/registration.php';
        break;
     default:
        include '../view/home.php';
        break;
 }


?>