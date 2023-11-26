<?php

    $db = new mysqli('localhost', 'root', '', 'crud');

    if (!$db) {
        die(mysqli_error($db));
    };
?>