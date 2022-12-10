<?php

if (isset($_COOKIE["page_control"])) {
    if ($_COOKIE["page_control"] <> "toAdministration") {
        header("Location: /");
    }
} else header("Location: /");

require_once('scripts/boot.php');


$dropdown = array("Pizza1", "Pizza2", "Pizza3");
$str='<select name="drop_down" size="1">';
 
for($i = 0, $c = count($dropdown); $i < $c; $i++) {
     $str.='<option value="'.$i.'">'.$dropdown[$i].' </option>';
 }
$srt.='</select>';
 
echo $str;

?>