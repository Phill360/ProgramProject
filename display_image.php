<!DOCTYPE html>
<html>
    <body>
        <form method="GET" action=" ">
            <input type="text" name="your_imagename"/>
            <input type="submit" name="display_name" value="Display"/>
        </form>


<?php 
    $getname = $_GET['your_imagename'];
    
    
    echo "<img src = fetch_image.php?name=".$getname." width=200 height=200>";
?>


    
    </body>
</html>