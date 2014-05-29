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
              
              if ( $address->update($AddressbookModel) ) {
                  echo '<p>Address updated</p>';
              } else {
                   echo '<p>Address Could not update</p>';
              }
          }
         
         
         $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
         
         $addressResult = $address->read($id);
          //print_r($addressResult);
          
         if ( !is_array($addressResult) || count($addressResult) <= 0 ) {
             Util::redirect('viewaddress');
         }
         
        ?>
        
        <form name="mainform" action="#" method="post"> 
           <fieldset>
		<legend>Update:</legend>
                <label for="name">Name:</label> 
                <input id="name" type="text" name="name" value="<?php echo $addressResult['name']; ?>" /> <br />
               
                <label for="address">Address:</label> 
                <input id="address" type="text" name="address" value="<?php echo $addressResult['address']; ?>" /> <br />
               
                <label for="city">City:</label> 
                <input id="city" type="text" name="city" value="<?php echo $addressResult['city']; ?>" /> <br />

                <label for="state">State:</label> 
                <select name="state">  
                <?php 
                foreach($states_list as $key => $value) {
                    if($addressResult['state'] == $key)
                    {
                        echo '<option selected="selected" value="'.$key.'">'.$value.'</option>'; 
                    }
                    else
                    {
                        echo '<option value="'.$key.'">'.$value.'</option>'; 
                    }
                }  ?> </select>   <br />
                              
                <label for="zip">ZIP:</label> 
                <input id="zip" type="text" name="zip" value="<?php echo $addressResult['zip']; ?>" /> <br />
               
                
                <input type="hidden" name="id" value="<?php echo $addressResult['id']; ?>" />
                <input type="submit" value="Submit" />
            </fieldset>
        </form>
        
        
    </body>
</html>
