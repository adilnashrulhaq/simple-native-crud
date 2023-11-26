<?php
    include 'database.php'; 
    if(isset($_GET['deletedid'])){
        $id=$_GET['deletedid'];

        $sql="delete from `article` where id = $id";
        $result = mysqli_query($db,$sql);
        if($result){
            header('location:article.php');
        } else {
            die(mysqli_error($db));
        }
    }
?>