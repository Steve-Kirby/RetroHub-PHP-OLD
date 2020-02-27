<HTML>
<?php
ob_start();
session_start();
require_once "dbConnect.php";

# private key file to use
//$MY_KEY_FILE = "myprivate1.pem";

# public certificate file to use
$MY_CERT_FILE = "mypublic1.pem";

#Paypals public certificate 
$PAYPAL_CERT_FILE = "pay_cert.pem";

# path to the openssl binary
$OPENSSL = "/usr/bin/openssl";

$sql="SELECT * FROM cart WHERE userID =".$_SESSION['user'];
$query= mysqli_query($conn,$sql);
$i = 1;
while ($row = mysqli_fetch_array($query)){
	
	$query2 = mysqli_query($conn,"SELECT * FROM items WHERE itemID={$row['itemID']}");
	while($row2 = mysqli_fetch_array($query2)){
		${'tug'.$i} = $row2['itemTitle'];
		$i+=1;
		${'tug'.$i} = $row2['itemPrice'];
		$i+=1;
	}
}

$form = array('cmd' => '_cart',
        'business' => '',
        'upload' => '1',
        'cert_id' => '',
        'lc' => 'UK',
        'currency_code' => 'GBP',
        'custom' => 'clearcart',
        'item_name_1' => $tug1,
        'amount_1' => $tug2,
		'item_name_2' => $tug3,
        'amount_2' => $tug4,
        'item_name_3' => $tug5,
        'amount_3' => $tug6,
        'item_name_4' => $tug7,
        'amount_4' => $tug8,
        'item_name_5' => $tug9,
        'amount_5' => $tug10,
        'item_name_6' => $tug11,
        'amount_6' => $tug12,
        'item_name_7' => $tug13,
        'amount_7' => $tug14,
        'item_name_8' => $tug15,
        'amount_8' => $tug16,
        'item_name_9' => $tug17,
        'amount_9' => $tug18,
        'item_name_10' => $tug19,
        'amount_10' => $tug20,
		'item_name_11' => $tug21,
        'amount_11' => $tug22,
        'item_name_12' => $tug23,
        'amount_12' => $tug24,
        'item_name_13' => $tug25,
        'amount_13' => $tug26,
        'item_name_14' => $tug27,
        'amount_14' => $tug28,
        'item_name_15' => $tug29,
        'amount_15' => $tug30,
        'item_name_16' => $tug31,
        'amount_16' => $tug32,
        'item_name_17' => $tug33,
        'amount_17' => $tug34,
        'item_name_18' => $tug35,
        'amount_18' => $tug36,
  		'image_url' => '',
   		'no_note' => '0',
    	'no_shipping'  => '2'

	);


	$encrypted = paypal_encrypt($form);


function paypal_encrypt($hash)
{
	//Sample PayPal Button Encryption: Copyright 2006-2010 StellarWebSolutions.com
	//Not for resale - license agreement at
	//http://www.stellarwebsolutions.com/en/eula.php
	global $MY_KEY_FILE;
	global $MY_CERT_FILE;
	global $PAYPAL_CERT_FILE;
	global $OPENSSL;


	if (!file_exists($MY_KEY_FILE)) {
		echo "ERROR: MY_KEY_FILE $MY_KEY_FILE not found\n";
	}
	if (!file_exists($MY_CERT_FILE)) {
		echo "ERROR: MY_CERT_FILE $MY_CERT_FILE not found\n";
	}
	if (!file_exists($PAYPAL_CERT_FILE)) {
		echo "ERROR: PAYPAL_CERT_FILE $PAYPAL_CERT_FILE not found\n";
	}


	//Assign Build Notation for PayPal Support
	$hash['bn']= 'StellarWebSolutions.PHP_EWP2';

	$data = "";
	foreach ($hash as $key => $value) {
		if ($value != "") {
			//echo "Adding to blob: $key=$value\n";
			$data .= "$key=$value\n";
		}
	}

	$openssl_cmd = "($OPENSSL smime -sign -signer $MY_CERT_FILE -inkey $MY_KEY_FILE " .
						"-outform der -nodetach -binary <<_EOF_\n$data\n_EOF_\n) | " .
						"$OPENSSL smime -encrypt -des3 -binary -outform pem $PAYPAL_CERT_FILE";

	exec($openssl_cmd, $output, $error);

	if (!$error) {
		return implode("\n",$output);
	} else {
		return "ERROR: encryption failed";
	}
};
?> 


<?php 

//$cartempty = "DELETE FROM cart where userID =".$_SESSION['user'];
//$deadcart = mysqli_query($conn,$cartempty);
?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post" >
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="
<?PHP echo $encrypted; ?>">
<input type="submit" value="Checkout with PayPal!">
</form>
</BODY>

</HTML>