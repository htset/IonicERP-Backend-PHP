<?php
header('Content-Type: application/json; charset=UTF-8');
echo '{"order": '.json_encode($order).', "orderDetails": '.json_encode($orderDetails).'}';
?>