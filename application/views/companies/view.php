<?php
header('Content-Type: application/json; charset=UTF-8');
echo '{"company": '.json_encode($company).', "defaultAddress": '.json_encode($defaultAddress).', "contacts": '.json_encode($contacts).'}';
?>