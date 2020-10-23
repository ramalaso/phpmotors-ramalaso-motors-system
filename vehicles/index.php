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
        // Filter and store the data
          include '../view/add-classification.php';
        break;
    case 'add-vehicle':
         include '../view/add-vehicle.php';
         break;
    case 'adding-classification':
        // Filter and store the data
        $classificationName = filter_input(INPUT_POST, 'classificationName');
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
        $invMake = filter_input(INPUT_POST, 'invMake');
        $invModel = filter_input(INPUT_POST, 'invModel');
        $invDescription = filter_input(INPUT_POST, 'invDescription');
        $invImage = filter_input(INPUT_POST, 'invImage');
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail');
        $invPrice = filter_input(INPUT_POST, 'invPrice');
        $invStock = filter_input(INPUT_POST, 'invStock');
        $invColor = filter_input(INPUT_POST, 'invColor');
        $classificationId = filter_input(INPUT_POST, 'classificationId');
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
        include '../view/vehicle.php';
        break;
     default:
        include '../view/home.php';
        break;
 }


?>