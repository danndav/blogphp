<?php
require('database.php');
// check for submit
$msg="";
$msgClass= "";


if(isset($_POST['submit'])){
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $body=mysqli_real_escape_string($conn,$_POST['body']);
    $author=mysqli_real_escape_string($conn,$_POST['author']);

    if(!empty($title) && !empty($body) && !empty($author)){
        
        $query ="INSERT INTO posts(title,author,body) VALUES('$title','$author','$body')";
        
            if(mysqli_query($conn,$query)){
                header('Location:index.php');
            }else{
                echo 'ERROR: '. mysqli_error($conn);
            }

    }else{
        $msg="<h3>please fill in all fields</h3>";
        $msgClass= 'alert-danger';

    }



    
}



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
    <?php  if($msg !=""): ?>
            <div class="alert-danger"><?php echo $msg?></div>
        <?php endif;?>
        <h1>Add Post</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class='form-group'>
                <label for="">Titles</label>
                <input type="text" name='title' class='form-control'>
            </div>
            <div class='form-group'>
                <label for="">Author</label>
                <input type="text" name='author' class='form-control'>
            </div>
            <div class='form-group'>
                <label for="">Body</label>
                <textarea name='body' class='form-control'></textarea> 
            </div>
            <input type="submit" name='submit' value="Add" class='btn btn-primary'>
        </form>
    </div>
</body>
</html>