<?php
function get_items_by_make ($makeID, $sort) {
    global $db;

    
        $query = "SELECT C.className, M.makeName, T.typeName, V.vehicleID, V.model, V.price, V.year
                     FROM vehicles V
                     INNER JOIN classes C
                         ON V.class_id = C.classID
                    INNER JOIN makes M
                         ON V.make_id = M.makeID
                    INNER JOIN types T
                         ON V.type_id = T.typeID
                         WHERE V.make_id = :mID
                    ORDER BY " .$sort ." DESC";
                     $statement=$db->prepare($query);
                     $statement->bindValue(':mID', $makeID);
                     $statement->execute();
                     $results = $statement->fetchAll();
                     $statement->closeCursor();
        return $results;
    
 
}

function get_items_by_type ($typeID, $sort) {
    global $db;

    
        $query = "SELECT C.className, M.makeName, T.typeName, V.vehicleID, V.model, V.price, V.year
                     FROM vehicles V
                     INNER JOIN classes C
                         ON V.class_id = C.classID
                    INNER JOIN makes M
                         ON V.make_id = M.makeID
                    INNER JOIN types T
                         ON V.type_id = T.typeID
                         WHERE V.type_id = :tID
                    ORDER BY " .$sort ." DESC";
                     $statement=$db->prepare($query);
                     $statement->bindValue(':tID', $typeID);
                     $statement->execute();
                     $results = $statement->fetchAll();
                     $statement->closeCursor();
        return $results;
    
 
}

function get_items_by_class ($classID, $sort) {
    global $db;
        $query = "SELECT C.className, M.makeName, T.typeName, V.vehicleID, V.model, V.price, V.year
                     FROM vehicles V
                     INNER JOIN classes C
                         ON V.class_id = C.classID
                    INNER JOIN makes M
                         ON V.make_id = M.makeID
                    INNER JOIN types T
                         ON V.type_id = T.typeID
                         WHERE V.class_id = :cID
                    ORDER BY " .$sort ." DESC";
                     $statement=$db->prepare($query);
                     $statement->bindValue(':cID', $classID);
                     $statement->execute();
                     $results = $statement->fetchAll();
                     $statement->closeCursor();
        return $results;
    
 
}

function get_all_vehicles($sort) {
    global $db;
    $query = "SELECT C.className, M.makeName, T.typeName, V.vehicleID, V.model, V.price, V.year
                     FROM vehicles V
                     INNER JOIN classes C
                         ON V.class_id = C.classID
                    INNER JOIN makes M
                         ON V.make_id = M.makeID
                    INNER JOIN types T
                         ON V.type_id = T.typeID 
                    ORDER BY " .$sort ." DESC";
                     $statement=$db->prepare($query);
                     $statement->execute();
                     $results = $statement->fetchAll();
                     $statement->closeCursor();
        return $results;
}

function get_vehicle ($vehicleID) {
    global $db;
    $query = "SELECT * FROM vehicles
    WHERE vehicles.vehicleID = :vID" ;
    $statement=$db->prepare($query);
    $statement->bindValue(':vID', $vehicleID);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();
    return $result;
}

function delete_vehicle($vehicleID) { 
    global $db;
    $query = 'DELETE FROM vehicles
    WHERE vehicleID = :vID'; 
    $statement = $db->prepare($query);
    $statement->bindValue(':vID', $vehicleID); 
    $statement->execute(); 
    $statement->closeCursor();
    }

function add_vehicle ($classID, $makeID, $typeID, $model, $price, $year) {
    global $db;
    $query = "INSERT INTO vehicles (class_id, make_id, type_id, model, price, year) VALUES (:classID, :makeID, :typeID, :model, :price, :year)";
            $statement=$db->prepare($query);
            $statement->bindValue(':classID', $classID);
            $statement->bindValue(':makeID', $makeID);
            $statement->bindValue(':typeID', $typeID);
            $statement->bindValue(':model', $model);
            $statement->bindValue(':price', $price);
            $statement->bindValue(':year', $year);
            $statement->execute();
            $statement->closeCursor();
			
}
?>