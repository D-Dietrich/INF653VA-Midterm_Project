<?php
function get_classes () { 
    global $db;
    $query = 'SELECT * FROM classes ORDER BY classID';
    $statement = $db->prepare($query); 
    $statement->execute();
    $categories = $statement->fetchAll(); 
    $statement->closeCursor(); 
    return $categories;
}

function get_class_name($classID) { 
    global $db;
    if ($classID == FALSE || $classID == NULL) {
        return "None";
    }
    $query = 'SELECT * FROM classes WHERE classID = :classID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':classID', $classID); 
    $statement->execute();
    $classlist = $statement->fetch(); 
    $statement->closeCursor();

        $className = $classlist['className'];
    return $className;
} 

function delete_class ($classID){
    global $db;
    $query = 'DELETE FROM vehicles WHERE class_id = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $classID);
    $success = $statement->execute();
    $statement->closeCursor();

    $query = 'DELETE FROM classes WHERE classID = :id';
    $statement=$db->prepare($query);
    $statement->bindValue(':id', $classID);
    $success = $statement->execute();
    $statement->closeCursor();
}

function add_class ($className) {
    {
        global $db;
        $query = "INSERT INTO classes (className) VALUES (:className)";
        $statement=$db->prepare($query);
        $statement->bindValue(':className', $className);
        $statement->execute();
        $statement->closeCursor();
         }
}

?>