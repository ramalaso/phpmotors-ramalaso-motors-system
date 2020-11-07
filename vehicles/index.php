<?php
/***********************************************
 * Account  Controller
 *********************************************/

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main_model.php';
// Get the accounts model
require_once '../model/classification-model.php';
// Get the accounts model
require_once '../model/vehicle-model.php';

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
    case 'add-classification':
      if (isset($_SESSION['loggedin']) && $_SESSION['clientData']['clientLevel']>1){
        include '../view/add-classification.php';
      } else {
       header('Location: /index.php');
      }
      break;
    case 'add-vehicle':
      if (isset($_SESSION['loggedin']) && $_SESSION['clientData']['clientLevel']>1){
        include '../view/add-vehicle.php';
      } else {
       header('Location: /index.php');
      }
      break;
    case 'adding-classification':
        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING);
      // Check for missing data
      if(empty($classificationName)){
        $message = '<p>Please provide information for all empty form fields.</p>';
        include '../view/add-classification.php';
        exit;
      }
      
      // Send the data to the model
      $regOutcome = regClassification($classificationName);
      
      // Check and report the result
      if($regOutcome === 1){
        $message = "<p>Thanks for registering $classificationName.</p>";
        // Get the array of classifications
        $classifications = getClassifications();
        // Build a navigation bar using the $classifications array
        $navList = '<ul>';
        $navList .= "<li><a href='/index.php' title='View the PHP Motors home page'>Home</a></li>";
        foreach ($classifications as $classification) {
        $navList .= "<li><a href='/index.php?action=".urlencode($classification['classificationName'])."' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
        }
        $navList .= '</ul>';
        include '../view/add-classification.php';
        exit;
      } else {
        $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
        include '../view/add-classification.php';
        exit;
      }

      
      break;
     case 'adding-vehicle':
         // Filter and store the data
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Check for missing data
        if(empty($invMake)|| empty($invModel)||empty($invDescription)||empty($invImage)||empty($invThumbnail)||empty($invPrice)||empty($invStock)||empty($invColor)||empty($classificationId) ){
          $message = '<p>Please provide information for all empty form fields.</p>';
          include '../view/add-vehicle.php';
          exit;
        }
        
        // Send the data to the model
        $regOutcome = regVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        
        // Check and report the result
        if($regOutcome === 1){
          $message = "<p>Thanks for registering $invModel.</p>";
          include '../view/add-vehicle.php';
          exit;
        } else {
          $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
          include '../view/add-vehicle.php';
          exit;
        }
        break;
    case 'vehicle':
      if (isset($_SESSION['loggedin'])  && $_SESSION['clientData']['clientLevel']>1){
        include '../view/vehicle-man.php';
      } else {
       header('Location: /index.php');
      }
      break;
     default:
        include '../view/home.php';
        break;
 }


?>