<?php 
    //this should carry the time period for which the alert stays
    if($comm != 1){
    // var_dump($comm);die;
    echo"<div class='alert alert-info alert-dismissible fade show mb-3' role='alert'>
            $comm"; 
        if ($usertype == 'admin'):
            echo '
            <form action="./disable_public_message.php" method="post">
                <button type="submit" class="close" id="close_communication_alert">
                    <span aria-hidden="true">&times;</span>
                </button>
            </form>
            ';
        endif;
        ?>
    </div>
<?php 
    }else{
        echo "<div></div>";
    }
?>