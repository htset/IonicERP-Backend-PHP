<?php
header('Content-Type: application/json; charset=UTF-8');
echo '{"payment": '.json_encode($payment).'}';
?>