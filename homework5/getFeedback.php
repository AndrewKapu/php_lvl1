<?php
    define('FEEDBACK_DIR', 'feedback/');
    $query = "SELECT name FROM feedback WHERE id = $id";
    $resource = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($resource);
    $feedback_file = $row['name'];
    $feedback_text = file_get_contents(FEEDBACK_DIR . "$feedback_file");
?>