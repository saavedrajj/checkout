<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PayPal - Express Checkout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <script src="https://www.paypal.com/sdk/js?client-id=AWkb4xIZgEmY2zXdrIJ4EAKWF5XrWMVxu0Pwjfu_sRVBWnDIQiGeowrhcqXdCZ0st9-2frLzviaL_i4e"></script>	
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <?php include "../../includes/navbar.php"; ?>
  <div class="container">
    <h1>PayPal</h1>
    <h2>Express Checkout</h2>
   <div id="paypal-button-container"></div>
   <script>
    paypal.Buttons().render('#paypal-button-container');
  </script>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
</body>
</html>