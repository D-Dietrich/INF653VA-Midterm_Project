<?php
function get_types () { 
    global $db;
    $query = 'SELECT * FROM types ORDER BY typeID';
    $statement = $db->prepare($query); 
    $statement->execute();
    $categories = $statement->fetchAll(); 
    $statement->closeCursor(); 
    return $categories;
}

function get_type_name($typeID) { 
    global $db;
    if ($typeID == FALSE || $typeID == NULL) {
        return "None";
    }
    $query = 'SELECT * FROM types WHERE typeID = :typeID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':typeID', $typeID); 
    $statement->execute();
    $typelist = $statement->fetch(); 
    $statement->closeCursor();

        $typeName = $typelist['typeName'];
    return $typeName;
} 

function delete_type ($typeID){
    global $db;
    $query = 'DELETE FROM vehicles WHERE type_id = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $typeID);
    $success = $statement->execute();
    $statement->closeCursor();

    $query = 'DELETE FROM types WHERE typeID = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $typeID);
    $success = $statement->execute();
    $statement->closeCursor();
}

function add_type ($typeName) {
    {
        global $db;
        $query = "INSERT INTO types (typeName) VALUES (:typeName)";
        $statement=$db->prepare($query);
        $statement->bindValue(':typeName', $typeName);
        $statement->execute();
        $statement->closeCursor();
         }
}

?>