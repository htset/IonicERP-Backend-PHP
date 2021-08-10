<?php
header('Content-Type: application/json; charset=UTF-8');
echo '{"product": '.json_encode($product).', 
				"defaultPrice": '.json_encode($defaultPrice).',  
				"prices": '.json_encode($prices).', 
				"supplier": '.json_encode($supplier).', 
				"commissions": '.json_encode($commissions).', 
				"quantities": '.json_encode($quantities).', 
				"defaultQuantity": '.json_encode($defaultQuantity).',
				"discounts": '.json_encode($discounts).' 
			}';
?>