<?php include('header.php');?>
<form id="myForm">
           <label for="makeID"></label>
            <select name="makeID" id="makeID">
            <option disabled selected value> -- Filter By Make -- </option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['makeID']; ?>">
                    <?php echo $make['makeName']; ?>
                </option>
            <?php endforeach; ?>
            <option value="<?php echo FALSE; ?>">
                    <?php echo '**Remove Filter**'; ?>
                </option>
            </select>

            <label for="typeID"></label>
            <select name="typeID" id="typeID">
            <option disabled selected value> -- Filter By Type -- </option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
            <option value="<?php echo FALSE; ?>">
                    <?php echo '**Remove Filter**'; ?>
                </option>
            </select>

            <label for="classID"></label>
            <select name="classID" id="classID">
            <option disabled selected value> -- Filter By Class -- </option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['classID']; ?>">
                    <?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
            <option value="<?php echo FALSE; ?>">
                    <?php echo '**Remove Filter**'; ?>
                </option>
            </select>

            <label for="sort"></label>
            <select name="sort" id="sort">
            <option disabled selected value> -- Sort By... -- </option>
                <option value="v.price">
                   Sort By Price
                </option>
                <option value="v.year">
                   Sort By Year
                </option>
            </select><br>
        
            <input type="hidden" name="action" value="list_vehicles">
                <button type="submit" name="submit" id="submit" class="sub_button">Submit</button>
            </form>

            
<?php if(!$results){?>
               <h2> No Results Found</h2> 
                    
                     <?php } else { ?>
            <div id= "table_div">
            <table class="big_table">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Class</th>
                        <th>Price</th>
                    </tr>
                </thead>

                <tbody>
                    
                    <?php foreach($results as $result) {
                        $class =  $result["className"];
                        $make = $result["makeName"];
                        $type  =  $result["typeName"];
                        $id = $result["vehicleID"];
                        $model = $result["model"];
                        $price  =  number_format($result["price"], 2, '.', ',');
                        $year =  $result["year"];
                    ?>
                        <tr>
                            <td id=admin> <?php echo $year; ?> </td>
                            <td id=admin> <?php echo $make; ?> </td>
                            <td id=admin> <?php echo $model; ?> </td>
                            <td id=admin> <?php echo $type; ?> </td>
                            <td id=admin> <?php echo $class; ?> </td>
                            <td id=admin> <?php echo "$", $price; ?> </td>

                            <td id="delete_button" > 
                                <form id="delete" action = "." method="POST">
                                <input type="hidden" name="action" value="delete_vehicle">
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <button> X </button>
                                </form>
                            </td>
                        </tr>
                    <?php } }?>	
                </tbody>
            </table>
             </div>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="show_add_vehicle_form">
                <button type="submit" name="submit" id="submit" class="add_button">Add Vehicle</button>
            </form>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="edit_makes">
                <button type="submit" name="submit" id="submit" class="sub_button">Edit Makes</button>
            </form>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="edit_types">
                <button type="submit" name="submit" id="submit" class="sub_button">Edit Types</button>
            </form>
            <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="edit_classes">
                <button type="submit" name="submit" id="submit" class="sub_button">Edit Classes</button>
            </form>
         
            
<?php include('footer.php');?>