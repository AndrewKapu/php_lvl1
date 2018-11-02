<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .gallery-image {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
<?php
    $galleryImagesHtml = null;
    $imagesSource = ['img/1.jpg', 'img/2.jpg', 'img/3.jpg',];
    for ($i = 0; $i < count($imagesSource); $i++) {
        $galleryImagesHtml .= "<a href=\"$imagesSource[$i]\" target=\"_blank\">
            <img src=\"$imagesSource[$i]\" class=\"gallery-image\" alt=\"photo\">
        </a>";
    }
    echo $galleryImagesHtml;
?>
</body>
</html>