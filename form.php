<?php
// Merchant key here as provided by Payu

?>
<html>
  <head>
  <script src="https://www.paypalobjects.com/api/checkout.js"></script>
  <script type = "text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  </head>
  <body>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
	  <input type="text" name="customer_ip" value="<?=$_SERVER['REMOTE_ADDR']?>">
      <table>
        <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo (empty($posted['amount'])) ? '' : $posted['amount'] ?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" /> <span>*</span>
		  <span id="correctName"></span></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" /> <span>*</span>
		  <span id="correctEmail"></span></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" id="phone"/> <span>*</span>
		  <span id="correctNumber"></span></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo (empty($posted['productinfo'])) ? '' : $posted['productinfo'] ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo (empty($posted['surl'])) ? '' : $posted['surl'] ?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo (empty($posted['furl'])) ? '' : $posted['furl'] ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <tr>
            <td colspan="4"><input type="submit" value="Submit" id="submit" /></td>
        </tr>
      </table>
    </form>
	<div id="paypal-button-container"></div>
  </body>
  <script type = "text/javascript">
$("#submit").click(function() {
var name = $("#firstname").val();
var email = $("#email").val();
var phone = $("#phone").val();
$("#returnmessage").empty(); // To empty previous error/success message.
// Checking for blank fields.
if (name == '' || email == '' || phone == '') {
 event.preventDefault();
  $( "span" ).text( "please fill required field" ).show();
} 
 if (!validateEmail(email)) {
event.preventDefault();
  $( "#correctEmail" ).text( "please fill correct email" ).show();
}
 if (!validateName(name)) {
event.preventDefault();
  $( "#correctName" ).text( "special characters and number are not allowed " ).show();
}
if (!validateNumber(phone)) {
event.preventDefault();
  $( "#correctNumber" ).text( "please fill number of 10 digit" ).show();
}
function validateEmail(sEmail) {
var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
function validateName(sEmail) {
var filter = /^[a-zA-Z\s]+$/;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
function validateNumber(sEmail) {
var filter = /^\d{10}$/;;
if (filter.test(sEmail)) {
return true;
}
else {
return false;
}
};
});
  </script>
  <script>
 
    paypal.Button.render({

        // Set your environment

        env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    
        style: {
            label: 'checkout',
            size:  'small',    // small | medium | large | responsive
            shape: 'pill',     // pill | rect
            color: 'gold'      // gold | blue | silver | black
        },


            // Show the buyer a 'Pay Now' button in the checkout flow
             client: {
            sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
            production: 'hansika.kalra171@gmail.com'
        },

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [
                        {
                            amount: { total: '0.01', currency: 'USD' }
                        }
                    ]
                }
            });
        },

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                window.alert('Payment Complete!');
            });
        }

    }, '#paypal-button-container');
	</script>
</html>
