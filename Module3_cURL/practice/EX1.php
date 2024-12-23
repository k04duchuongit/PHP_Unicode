<?php
require_once 'includes/function.php';
$content = httpGet('https://vnexpress.net/giai-tri');

echo $content;
?>