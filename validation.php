<?php
$value = $_GET['query'];
$formfield = $_GET['field'];

if ($formfield == "username") {
    if (strlen($value) < 4) {
        echo "Must be 3+ letters";
    } else {
        echo "<span>Valid</span>";
    }
}

if ($formfield == "password") {
    if (strlen($value) < 6) {
        echo "Password too short";
    } else {
        echo "<span>Strong</span>";
    }
}

if ($formfield == "email") {
    if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $value)) {
        echo "Invalid email";
    } else {
        echo "<span>Valid</span>";
    }
}
if ($formfield == "phone") {
    if (!preg_match("/^[0-9]+$/", $value)) {
        echo "Invalid phone";
    } else {
        echo "<span>Valid</span>";
    }
}

if ($formfield == "website") {
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $value)) {
        echo "Invalid website";
    } else {
        echo "<span>Valid</span>";
    }
}
?>