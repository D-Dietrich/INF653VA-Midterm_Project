<?php
require('model/database.php'); 
require('controllers/classes.php'); 
require('controllers/makes.php'); 
require('controllers/types.php'); 
require('controllers/vehicles.php'); 

$action = filter_input(INPUT_POST, 'action'); 
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL) {
        $action = 'list_vehicles'; } 
} 

if ($action == 'list_vehicles')
{
    $make_id = filter_input(INPUT_GET, 'makeID', FILTER_VALIDATE_INT); ////Get make filter if applicable
    $class_id = filter_input(INPUT_GET, 'classID', FILTER_VALIDATE_INT); //Get class filter if applicable
    $type_id = filter_input(INPUT_GET, 'typeID', FILTER_VALIDATE_INT); //Get type filter if applicable
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING); //Get sort type if applicable
    if ($sort == NULL || $sort == FALSE){
        $sort = "V.price";
    }
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    if($make_id != NULL || $make_id != FALSE)
    {
        $results = get_items_by_make($make_id, $sort); 
    }
    elseif ($type_id != NULL || $type_id != FALSE)
    {
        $results = get_items_by_type($type_id, $sort); 
    }
    elseif($class_id != NULL || $class_id != FALSE)
    {
        $results = get_items_by_class($class_id, $sort); 
    }
    else
    {
        $results = get_all_vehicles($sort);
    }
   
    
    include('view/vehicle_list.php');
} //Done


?>