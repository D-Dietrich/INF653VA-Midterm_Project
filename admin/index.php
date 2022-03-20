<?php
require('../model/database.php'); 
require('../controllers/classes.php'); 
require('../controllers/makes.php'); 
require('../controllers/types.php'); 
require('../controllers/vehicles.php'); 

$action = filter_input(INPUT_POST, 'action'); 
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action'); 
    if ($action == NULL) {
        $action = 'list_vehicles'; } 
} 
/* Vehicle Editing Section */
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
   
    
    include('view/edit_vehicles.php');
} 

else if ($action == 'delete_vehicle') { 
    $vID = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($vID == NULL || $vID == FALSE) 
        { $error = "Missing or incorrect Vehicle ID."; 
        include('view/error.php');
    }
    else {
        delete_vehicle($vID); 
        header("Location: .?");
    }
} 

else if ($action == 'show_add_vehicle_form') { 
    $makes = get_makes();
    $types = get_types();
    $classes = get_classes();
    include('view/add_vehicle_form.php'); 
} 

else if ($action == 'add_vehicle') {
    $make_id = filter_input(INPUT_POST, 'makeID', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'typeID', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'classID', FILTER_VALIDATE_INT);
    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING); 
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
    if ($make_id == NULL || $make_id == FALSE || $type_id == NULL || $type_id == FALSE || $class_id == NULL || $class_id == FALSE || $year == NULL || $year == FALSE || $model == NULL || $model == FALSE || $price == NULL || $price == FALSE) 
        { $error = "Invalid data. Check all fields and try again."; 
            include('view/error.php');
    } 
    else {
        add_vehicle($class_id, $make_id, $type_id, $model, $price, $year); 
        header("Location: .?");
    } 
}

/* Make Editing Section */
else if ($action == 'edit_makes') { 
    $results = get_makes(); 
    include('view/edit_makes.php'); 
}
else if ($action == 'delete_make') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id == NULL || $id == FALSE ) 
        { $error = "Missing or incorrect Make ID."; 
        include('view/error.php');
    }
    else {
        delete_make($id); 
        header("Location: .?action=edit_makes");
    }
}
else if ($action == 'add_make') {
    $makeName = filter_input(INPUT_POST, "newMake", FILTER_SANITIZE_STRING);

    if ($makeName == NULL || $makeName == FALSE) 
    { $error = "Invalid data. Check all fields and try again."; 
        include('view/error.php');
    } 
    else {
        add_make($makeName); 
        header("Location: .?action=edit_makes");
    }
}

 /* Type Editing Section */
else if ($action == 'edit_types') { 
    $results = get_types(); 
    include('view/edit_types.php'); 
}
else if ($action == 'delete_type') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id == NULL || $id == FALSE ) 
        { $error = "Missing or incorrect Type ID."; 
        include('view/error.php');
    }
    else {
        delete_type($id); 
        header("Location: .?action=edit_types");
    }
}
else if ($action == 'add_type') {
    $typeName = filter_input(INPUT_POST, "newType", FILTER_SANITIZE_STRING);

    if ($typeName == NULL || $typeName == FALSE) 
    { $error = "Invalid data. Check all fields and try again."; 
        include('view/error.php');
    } 
    else {
        add_type($typeName); 
        header("Location: .?action=edit_types");
    }
    }

/* Class Editing Section */
else if ($action == 'edit_classes') { 
    $results = get_classes(); 
    include('view/edit_classes.php'); 
}
else if ($action == 'delete_class') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($id == NULL || $id == FALSE ) 
        { $error = "Missing or incorrect Class ID."; 
        include('view/error.php');
    }
    else {
        delete_class($id); 
        header("Location: .?action=edit_classes");
    }
}
else if ($action == 'add_class') {
    $className = filter_input(INPUT_POST, "newClass", FILTER_SANITIZE_STRING);

    if ($className == NULL || $className == FALSE) 
    { $error = "Invalid data. Check all fields and try again."; 
        include('view/error.php');
    } 
    else {
        add_class($className); 
        header("Location: .?action=edit_classes");
    }
    }
?>