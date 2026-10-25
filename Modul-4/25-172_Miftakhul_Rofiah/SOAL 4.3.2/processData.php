<?php
$errors = array();

if (isset($_POST['submit'])) {
    require 'validate.inc';

    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAddress($errors, $_POST, 'address');
    
    if ($errors) {
        echo '<h1>Invalid, correct the following errors:</h1>';
        echo '<ul>';
        foreach ($errors as $field => $error) {
            echo "<li><b>$field</b> $error</li>";
        }
        echo '</ul>';

        echo '<form action="processData.php" method="POST">';
        include 'form.inc';
        echo '</form>';
        
    } else {
        echo 'Form submitted successfully with no errors';
    }
} else {
    echo '<form action="processData.php" method="POST">';
    include 'form.inc';
    echo '</form>';
}
?>
