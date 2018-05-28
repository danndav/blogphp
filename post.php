<?php
require('database.php');

if(isset($_POST['delete'])){
    $delete_id =  mysqli_real_escape_string($conn,$_POST['delete_id']);
    

$query ="DELETE FROM posts WHERE id ={$delete_id}";

    if(mysqli_query($conn,$query)){
        	
    //    echo  "<script>  if(confirm('Are u sure'))</script>";
        header('Location:index.php');
    }else{
        echo 'ERROR: '. mysqli_error($conn);
    }
}

// get id
$id = mysqli_real_escape_string($conn,$_GET['id']);

$query= 'SELECT * FROM posts WHERE id= ' .$id;

$result =mysqli_query($conn, $query);

$post = mysqli_fetch_assoc($result);
//var_dump($posts);

mysqli_free_result($result);
mysqli_close($conn)

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Php Blog</title>
</head>
<body> 
    <div class='container'>
        <a class='btn btn-default' href="index.php">Back</a>
        <h1><?php echo $post['title'];?></h1>
        
        <small>Created on <?php echo $post['created_at'];?></small>
        <p><?php echo $post['body'];?></p>
            <hr>

            <form action="<?php $_SERVER['PHP_SELF'];?>" class="pull-right" method="post">
                <input type="hidden" name="delete_id" value="<?php echo $post['id'];?>">
                <input type="submit" name="delete" value="delete" class="btn btn-danger">
            </form>
        <a href="editpost.php?id=<?php echo $post['id'];?>" class='btn btn-primary'>Edit Post</a>
        

    
    </div>
</body>
</html>