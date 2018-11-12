<?php
    include('dbconnection.php');
    define('full_dir', 'img/');
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
    $sql = "SELECT full_name FROM images WHERE id = $id";
    $res = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($res);
    if(empty($row)) {
        header('Location: index.php');
        exit;
    }
    $full_name = $row['full_name'];
    include('getFeedback.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .wrapper {
            height: 400px;
            width: 400px; 
            margin: 0 auto;  
        }
        img {
            height: 400px;
            width: 400px; 
        }
    </style>
</head>
<body>
   <div class="wrapper">
    <?php
            mysqli_query($link, "UPDATE images SET views_count = views_count + 1 WHERE images.id = $id");
            echo "<img src=" . full_dir . $full_name . " >"
        ?>
    </div>
    <div class="feedback">
        <h4>Отзывы посетителей</h4>
        <p><?php echo $feedback_text ?></p>
    </div>
</body>
</html>
