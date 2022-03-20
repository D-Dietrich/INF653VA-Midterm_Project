<?php include('view/header.php');?>

<form id="myForm" action="." method="POST">
        <label for="makeID">Make:</label>
            <select name="makeID" id="makeID" required>
            <option disabled selected value> -- Select Vehicle Make -- </option>
            <?php foreach ($makes as $make) : ?>
                <option value="<?php echo $make['makeID']; ?>">
                    <?php echo $make['makeName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
        <label for="typeID">Type:</label>
            <select name="typeID" id="typeID" required>
            <option disabled selected value> -- Select Vehicle Type -- </option>
            <?php foreach ($types as $type) : ?>
                <option value="<?php echo $type['typeID']; ?>">
                    <?php echo $type['typeName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
        <label for="classID">Class:</label>
            <select name="classID" id="classID" required>
            <option disabled selected value> -- Select Vehicle Class -- </option>
            <?php foreach ($classes as $class) : ?>
                <option value="<?php echo $class['classID']; ?>">
                    <?php echo $class['className']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
                <label for='year'>Year:</label>
                <input type="text" id="year" name="year" required><br>
                <label for='model'>Model:</label>
                <input type="text" id="model" name="model" required><br>
                <label for='price'>Price:</label>
                <input type="text" id="price" name="price" required><br>
                <input type="hidden" name="action" value="add_vehicle">
                <button type="submit" name="submit" id="submit" class="add_button">Add Vehicle</button>
            </form>
           
            <?php include('view/footer.php');?>