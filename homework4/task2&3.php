<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!--Файл стилей для плагина JQuery-->
    <link rel="stylesheet" href="dimsemenov-Magnific-Popup-2ff1692/dist/magnific-popup.css">
    <style>
        .gallery-image {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body>
<div class="block-img">
    <?php
    //Получаем массив с элементами директории img и убираем точки
    $imgFiles = array_diff(scandir('img/'), array('..', '.'));
    $galleryImagesHtml = null;
    foreach ($imgFiles as $fileName) {
        $galleryImagesHtml.= "<a href='img/$fileName' target='_blank'>
    <img src='img/$fileName' class='gallery-image' alt='photo'>
</a>";
    }
    echo $galleryImagesHtml;
    ?>
</div>
<script src="jquery-3.3.1.min.js"></script>
<script src="dimsemenov-Magnific-Popup-2ff1692/dist/jquery.magnific-popup.js"></script>
<script>
    $(document).ready(() => {
        $('.block-img').magnificPopup({
            delegate: 'a',
            type: 'image'
        });
    })
</script>
</body>
</html>
