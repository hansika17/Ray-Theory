<?php









$Pass="";
$myfile = fopen("store_key1.prop", "r") or die("Unable to open file!");
while(!feof($myfile)) {
	$Pass=fgets($myfile);
}
fclose($myfile);
echo $Pass."</br>";

$Clear = "PasswortPasswort";        

//use this method for generation new encoded Key for payment
$crypted = fnEncrypt( "gtKFFx", $Clear);
echo "Encrypred: ".$crypted."</br>";

$newClear = fnDecrypt($crypted, $Clear);
echo "Decrypred: ".$newClear."</br>";      

$keyToBeUsed = fnDecryptForSingleValue($Pass);
echo "Decrypred: ".$keyToBeUsed."</br>"; 

function fnEncrypt($sValue, $sSecretKey)
{
    return rtrim(
        base64_encode(
            mcrypt_encrypt(
                MCRYPT_RIJNDAEL_256,
                $sSecretKey, $sValue, 
                MCRYPT_MODE_ECB, 
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256, 
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND)
                )
            ), "\0"
        );
}

function fnDecrypt($sValue, $sSecretKey)
{
    return rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_256, 
            $sSecretKey, 
            base64_decode($sValue), 
            MCRYPT_MODE_ECB,
            mcrypt_create_iv(
                mcrypt_get_iv_size(
                    MCRYPT_RIJNDAEL_256,
                    MCRYPT_MODE_ECB
                ), 
                MCRYPT_RAND
            )
        ), "\0"
    );
}


function fnDecryptForSingleValue($sValue)
{
    return rtrim(
        mcrypt_decrypt(
            MCRYPT_RIJNDAEL_256, 
            "PasswortPasswort", 
            base64_decode($sValue), 
            MCRYPT_MODE_ECB,
            mcrypt_create_iv(
                mcrypt_get_iv_size(
                    MCRYPT_RIJNDAEL_256,
                    MCRYPT_MODE_ECB
                ), 
                MCRYPT_RAND
            )
        ), "\0"
    );
}




require_once('database.php');
$service_provider = "payu_paisa";
$MERCHANT_KEY = $keyToBeUsed;
$SALT = "eCwWELxi";
$hash = '';
$txnid = '';

$msg="Hi raytheory, \nYou have recieved an Payment. \nPlease find the details below:";
	$headers = "From: webmaster@example.com" . "\r\n" .
	"CC: somebodyelse@example.com";

	foreach ($_POST as $key => $value) 
	{
		$enquiry_data[$key] = $value;
		$msg .= "\n".$key.":".$value;
	}
	$msg = wordwrap($msg,70);
	//mail("contact@raytheory.com","RayTheory Payments",$msg,$headers);
	
	

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";
$surl = "payment_success.php";
$furl = "payment_failure.php";
$service_provider = "payu_paisa";
$action = '';
$posted = array();

if(!empty($_POST)) {
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
// Hash Sequence
}


$surl="http://localhost/xampphtdocsraytheory_hsm/RayTheoryHSM/success.php?txnid=".$txnid."&coursename=".$_POST['coursename'];
$furl="http://localhost/xampphtdocsraytheory_hsm/RayTheoryHSM/cancel.php?txnid=".$txnid."&coursename=".$_POST['coursename'];
	
	
	$sql="INSERT INTO rt_payment (name,email,age,phone,location,note,amount,coursename,txnid,customer_ip,status,pay_time) values 
	('".$_POST['name']."','".$_POST['email']."','".$_POST['age']."','".$_POST['phone']."','".$_POST['location']."',
	'".$_POST['note']."','".$_POST['amount']."','".$_POST['coursename']."','".$txnid."','".$_POST['customer_ip']."','0',NOW())";
	$conn->query($sql);
	
	
//print_r($posted); die;
$hashSequence = "key|txnid|amount|coursename|firstname|email";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($MERCHANT_KEY)
		  ||  empty($txnid)
          || empty($posted['amount'])
          || empty($posted['name'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['coursename'])
          || empty($surl)
          || empty($furl)
		  || empty($service_provider)
  ) {
  } else {
      $hash_string = $MERCHANT_KEY."|".$txnid."|".$posted['amount']."|".$posted['coursename']."|".$posted['name']."|".$posted['email']."|||||||||||";
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

?>
<form action="https://test.payu.in/_payment" method="post" name="payuForm" id="payumoney">
 <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY; ?>" />
  <input type="hidden" name="hash" value="<?php echo $hash; ?>"/>
  <input type="hidden" name="txnid" value="<?php echo $txnid; ?>" />
  <input type="hidden" name="amount" value="<?php echo $posted['amount']; ?>" />
  <input type="hidden" name="firstname" value="<?php echo $posted['name']; ?>" />
  <input type="hidden" name="email" value="<?php echo $posted['email']; ?>" />
  <input type="hidden" name="phone" value="<?php echo $posted['phone']; ?>" />
  <input type="hidden" name="productinfo" value="<?php echo $posted['coursename']; ?>" />
  <input type="hidden" name="surl" value="<?php echo $surl; ?>" size="64" />
  <input type="hidden" name="furl" value="<?php echo $furl; ?>"size="64"/>
  <input type="hidden" name="service_provider" value="" size="64"/>
  </form>
 <script>
window.onload = function(){
  document.forms['payuForm'].submit();
}
</script>