<?php
function get_makes () { 
    global $db;
    $query = 'SELECT * FROM makes ORDER BY makeID';
    $statement = $db->prepare($query); 
    $statement->execute();
    $categories = $statement->fetchAll(); 
    $statement->closeCursor(); 
    return $categories;
}

function get_make_name($makeID) { 
    global $db;
    if ($makeID == FALSE || $makeID == NULL) {
        return "None";
    }
    $query = 'SELECT * FROM makes WHERE makeID = :makeID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':makeID', $makeID); 
    $statement->execute();
    $makelist = $statement->fetch(); 
    $statement->closeCursor();

        $makeName = $makelist['makeName'];
    return $makeName;
} 

function delete_make ($makeID){
    global $db;
    $query = 'DELETE FROM vehicles WHERE make_id = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $makeID);
    $success = $statement->execute();
    $statement->closeCursor();

    $query = 'DELETE FROM makes WHERE makeID = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $makeID);
    $success = $statement->execute();
    $statement->closeCursor();
}

function add_make ($makeName) {
    {
        global $db;
        $query = "INSERT INTO makes (makeName) VALUES (:makeName)";
        $statement=$db->prepare($query);
        $statement->bindValue(':makeName', $makeName);
        $statement->execute();
        $statement->closeCursor();
         }
}

?>