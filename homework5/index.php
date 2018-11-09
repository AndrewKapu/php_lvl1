<?php
    include('dbconnection.php');
    define('min_dir', 'img_min/');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="wrapper">

<?php
    $sql = "SELECT min_name, id FROM images";
    $res = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $min = $row['min_name'];
        echo "<a href='openImg.php?id=$id'><img src=" . min_dir . $min . "></a></a>";
    }

?>
</div>
</body>
</html>