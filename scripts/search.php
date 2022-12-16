<?php

if(isset($_POST['search'])) {
    $search = $_POST['search'];
} else {
    echo "произошла ошибка";
}

header("Location: /project?project=$search");

?>