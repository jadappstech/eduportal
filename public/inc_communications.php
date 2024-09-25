<?php
     $comm_query = "SELECT * FROM communications LIMIT 1";
     $result = mysqli_query($sqlConnection, $comm_query);

     if($result->num_rows > 0){
         $communication = $result->fetch_all(MYSQLI_ASSOC);
         return $communication[0]['message']; 
     }
     
    //  else{
    //     return null;
    //  }
     // var_dump($communication[0]['message']);die;
     
?>