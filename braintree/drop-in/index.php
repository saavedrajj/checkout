<?php require_once("../../includes/braintree-credentials.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Drop-In UI</title>
 <script src="https://js.braintreegateway.com/web/dropin/1.16.0/js/dropin.min.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
</head>
<body>
  <?php include "../../includes/navbar.php"; ?>
  <div class="container">
    <h1>Braintree</h1>
    <h2>Drop-In UI</h2>
    <?php //include "../includes/credit-cards.html"; ?>
    <form method="post" id="payment-form" action="<?php echo $baseUrl;?>checkout.php">

<!--
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" aria-describedby="amountHelp" placeholder="0.00">
        <small id="amountHelp" class="form-text text-muted">Type the amount in £</small>
      </div>



      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">£</span>
        </div>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
      </div>
    -->

    <div class="form-group">
      <label for="amount">Amount</label>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">£</span>
        </div>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="0.00" aria-label="0.00" aria-describedby="basic-addon1">
      </div>
    </div>

    <div id="dropin-container"></div>
    <input id="nonce" name="payment_method_nonce" type="hidden" />
   <!--
      <button id="submit-button2">Request payment method</button>
    -->
    <button  id="submit-button" class="btn btn-secondary btn-lg btn-block">Submit payment</button>

  </form>
</div>
<script>
  var form = document.querySelector('#payment-form');
  var client_token = "<?php echo($gateway->ClientToken()->generate()); ?>";
  braintree.dropin.create({
    authorization: client_token,
    selector: '#dropin-container'
    /*,
    paypal: {
      flow: 'checkout',
      amount: '10.00',
      currency: 'GBP'
    }*/

  }, function (createErr, instance) {
    if (createErr) {
      console.log('Create Error', createErr);
      return;
    }
    form.addEventListener('submit', function (event) {
      event.preventDefault();

      instance.requestPaymentMethod(function (err, payload) {
        if (err) {
          console.log('Request Payment Method Error', err);
          return;
        }
              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
    });
  });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>