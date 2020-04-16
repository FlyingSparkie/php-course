<!DOCTYPE html>
<html>
  <head>
    <title>PHP Store</title>
  </head>
  <body>
    <?php
    $name = "PHP Store";
    $credit = 1000;

	echo "<h1>Welcome to ".$name."!</h1>";
	echo "<h2>You have $".$credit." in your wallet.</h2>";
	$products['Computer']=750;
	$products['Car']=15000;
    $products['iPhone']=1000;
    $products['Toaster']=75;
 
    $amount=800;
	$taxRate=0.0825;
	$addedTax= $amount*$taxRate;  //amount = 800, tax = .0825
	echo $addedTax;
    foreach($products as $key => $value){
	echo "<p>The ".$key." costs ".$value."</p>";
    }

	function tax_calc($amount, $tax){
		$added_tax = $amount*$tax;
		$amount_with_tax = round($amount+$added_tax,2);
		return $amount_with_tax;
	}
	foreach($product as $key => $value){
		$cost_with_tax = tax_calc($value,$taxRate);
		echo"<p>The ".$key." costs ".$cost_with_tax." with tax</p>";
	}
	echo "<h2>These are the Items you can afford</h2>";
	foreach($products as $key => $value){
  		if($value <= $credit ){
  		echo "<p>".$key."</p>"; 
  	}
	}

    ?>
  </body>
</html>
		