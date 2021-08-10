<?php
header('Content-Type: application/json; charset=UTF-8');
echo '{"contact": '.json_encode($contact).', "defaultAddress": '.json_encode($defaultAddress).'}';
?>