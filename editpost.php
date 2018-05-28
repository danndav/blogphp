<?php
require('database.php');
// check for submit

if(isset($_POST['submit'])){
    $update_id =  mysqli_real_escape_string($conn,$_POST['update_id']);
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $body=mysqli_real_escape_string($conn,$_POST['body']);
    $author=mysqli_real_escape_string($conn,$_POST['author']);

    $query ="UPDATE posts SET
            title='$title',
            author='$author',
            body= '$body'
                WHERE id= {$update_id}
            ";
    if(mysqli_query($conn,$query)){
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
mysqli_close($conn);



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
        <h1>Add Post</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
            <div class='form-group'>
                <label for="">Titles</label>
                <input type="text" name='title' class='form-control' value="<?php echo $post['title']?>">
            </div>
            <div class='form-group'>
                <label for="">Author</label>
                <input type="text" name='author' class='form-control' value="<?php echo $post['author']?>">
            </div>
            <div class='form-group'>
                <label for="">Body</label>
                <textarea name='body' class='form-control'><?php echo $post['body'];?></textarea> 
            </div>
            <input type="hidden" name="update_id" value="<?php echo $post['id'];?>">
            <input type="submit" name='submit' value="Add" class='btn btn-primary'>
        </form>
    </div>
</body>
</html>