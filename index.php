<?php
require('database.php');

$query= 'SELECT * FROM posts ORDER BY created_at DESC';

$result =mysqli_query($conn, $query);

$posts = mysqli_fetch_all($result,MYSQLI_ASSOC);
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
    <a href="addpost.php" class='btn btn-primary'>Add Post</a>
        <h1>Posts</h1>
        <?php foreach($posts as $post):?>
        <div class='well'>
        <h3><?php echo $post['title'];?></h3>
        <small>Created on <?php echo $post['created_at'];?></small>
        <p><?php echo $post['body'];?></p>
        <a class='btn btn-default' href="post.php?id=<?php echo $post['id'];?>">Read more</a>
        </div>

        <?php endforeach;?>
    </div>
</body>
</html>