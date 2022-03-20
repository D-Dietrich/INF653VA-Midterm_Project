<?php include ('view/header.php');?>
             

             <?php if(!$results){?>
                <h2> There are no Makes to display</h2> 
                     
                      <?php } else { ?>
            <div id= "table_div">
             <table>
                 <thead>
                     <tr>
                         <th>Make Name</th>
                     </tr>
                 </thead>
 
                 <tbody>
                     
                     <?php foreach($results as $result) {
                         $id = $result["makeID"];
                         $mName = $result["makeName"];?>
                         <tr>
                             <td> <?php echo $mName; ?> </td>
                             <td id="delete_button" > 
                                 <form id="delete" action = "." method="POST">
                                 <input type="hidden" name="action" value="delete_make">
                                 <input type="hidden" name="id" value="<?php echo $id ?>">
                                 <button> Delete </button>
                             </form>
                             </td>
                         </tr>
                         
                     <?php } }?>	
                 </tbody>
             </table>
            </div>
             <form id="myForm" action="." method="POST">
                 <label for='newMake'>Add New Make:</label>
                 <input type="text" id="newMake" name="newMake" required> <br>
                 <input type="hidden" name="action" value="add_make">
                 <button type="submit" name="submit" id="submit" class="add_button">Add Make</button>
             </form>
             <form id="myForm" action="." method="POST">
                 <input type="hidden" name="action" value="list_vehicles">
                 <button type="submit" name="submit" id="submit" class="sub_button">View Vehicle List</button>
             </form>
             <form id="myForm" action="." method="POST">
            <input type="hidden" name="action" value="show_add_vehicle_form">
                <button type="submit" name="submit" id="submit" class="sub_button">Add Vehicle</button>
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
  <?php include ('view/footer.php');