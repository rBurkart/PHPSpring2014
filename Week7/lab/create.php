<?php include 'dependency.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        Util::confirmAccess();
      
        
         $address = new AddressBook();
         $states = new States();
         $states_list = $states->statesList();
         
         
         if ( Util::isPostRequest() ) {
             
              $AddressbookModel = new AddressbookModel(filter_input_array(INPUT_POST));
              
              if ( $address->create($AddressbookModel) ) {
                  echo '<p>Address created</p>';
              } else {
                   echo '<p>Address Could not be created</p>';
              }
          }

         
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Create:</legend>
                <label for="name">Name:</label> 
                <input id="name" type="text" name="name" value="" /> <br />
               
                <label for="address">Address:</label> 
                <input id="address" type="text" name="address" value="" /> <br />
               
                <label for="city">City:</label> 
                <input id="city" type="text" name="city" value="" /> <br />

                <label for="state">State:</label> 
                <select name="state">  
                <?php 
                foreach($states_list as $key => $value) {
                        echo '<option value="'.$key.'">'.$value.'</option>'; 
                }  ?> </select>   <br />
                              
                <label for="zip">ZIP:</label> 
                <input id="zip" type="text" name="zip" value="" /> <br />
               
                
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        
    </body>
</html>
