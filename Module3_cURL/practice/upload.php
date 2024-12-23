<?php 
echo '<pre>';
print_r($_FILES);
echo '</pre>';


move_uploaded_file($_FILES['image']['tmp_name'], './uploads/'.$_FILES['image']['name']);
?>