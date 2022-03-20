<?php include('view/header.php');?>
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
                            <td> <?php echo $year; ?> </td>
                            <td > <?php echo $make; ?> </td>
                            <td > <?php echo $model; ?> </td>
                            <td > <?php echo $type; ?> </td>
                            <td > <?php echo $class; ?> </td>
                            <td > <?php echo "$", $price; ?> </td>
                        </tr>
                    <?php } }?>	
                </tbody>
            </table>
        </div>
<?php include('view/footer.php');?>