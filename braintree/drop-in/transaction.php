<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	

	<?php require_once("../../includes/braintree-credentials.php");?>

	<body>

		<?php
		if (isset($_GET["id"])) {
			$transaction = $gateway->transaction()->find($_GET["id"]);

			$transactionSuccessStatuses = [
				Braintree\Transaction::AUTHORIZED,
				Braintree\Transaction::AUTHORIZING,
				Braintree\Transaction::SETTLED,
				Braintree\Transaction::SETTLING,
				Braintree\Transaction::SETTLEMENT_CONFIRMED,
				Braintree\Transaction::SETTLEMENT_PENDING,
				Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
			];

			if (in_array($transaction->status, $transactionSuccessStatuses)) {
				$header = "Succesful payment!";
				$message = "Your test transaction has been successfully processed. See the Braintree API response and try again.";
			} else {
				$header = "Transaction Failed";
				$message = "Your test transaction has a status of " . $transaction->status . ". See the Braintree API response and try again.";
			}
		}
		?>
		<div class="container">


			<h1><?php echo($header)?></h1>

			<p><?php echo($message)?></p>

			<a class="btn btn-secondary btn-lg btn-block" href="index.php" role="button">Test another transaction</a>		


			<h3>API Response</h3>

			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col" colspan=2>Transaction</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">id</th>
						<td><?php echo($transaction->id)?></td>
					</tr>
					<tr>
						<th scope="row">type</th>
						<td><?php echo($transaction->type)?></td>
					</tr>
					<tr>
						<th scope="row">amount</th>
						<td><?php echo($transaction->amount)?></td>
					</tr>
					<tr>
						<th scope="row">status</th>
						<td><?php echo($transaction->status)?></td>
					</tr> 
					<tr>
						<th scope="row">created_at</th>
						<td><?php echo($transaction->createdAt->format('Y-m-d H:i:s'))?></td>
					</tr>     
					<tr>
						<th scope="row">updated_at</th>
						<td><?php echo($transaction->updatedAt->format('Y-m-d H:i:s'))?></td>
					</tr>          
					<thead class="thead-dark">
						<tr>
							<th scope="col" colspan=2>Payment</th>
						</tr>
					</thead>
					<tr>
						<th scope="row">token</th>
						<td><?php echo($transaction->creditCardDetails->token)?></td>
					</tr>
					<tr>
						<th scope="row">bin</th>
						<td><?php echo($transaction->creditCardDetails->bin)?></td>

					</tr>
					<tr>
						<th scope="row">last_4</th>
						<td><?php echo($transaction->creditCardDetails->last4)?></td>
					</tr>
					<tr>
						<th scope="row">card_type</th>
						<td><?php echo($transaction->creditCardDetails->cardType)?></td>
					</tr> 
					<tr>
						<th scope="row">expiration_date</th>
						<td><?php echo($transaction->creditCardDetails->expirationDate)?></td>
					</tr>     
					<tr>
						<th scope="row">cardholder_name</th>
						<td><?php echo($transaction->creditCardDetails->cardholderName)?></td>
					</tr> 
					<tr>
						<th scope="row">customer_location</th>
						<td><?php echo($transaction->creditCardDetails->customerLocation)?></td>
					</tr>              


					<thead class="thead-dark">
						<tr>
							<th scope="col" colspan=2>Customer details</th>
						</tr>
					</thead>

					<tr>
						<th scope="row">id</th>
						<td><?php echo($transaction->customerDetails->id)?></td>
					</tr>
					<tr>
						<th scope="row">first_name</th>
						<td><?php echo($transaction->customerDetails->firstName)?></td>

					</tr>
					<tr>
						<th scope="row">last_name</th>
						<td><?php echo($transaction->customerDetails->lastName)?></td>
					</tr>
					<tr>
						<th scope="row">email</th>
						<td<?php echo($transaction->customerDetails->email)?>></td>
					</tr> 
					<tr>
						<th scope="row">company</th>
						<td><?php echo($transaction->customerDetails->company)?></td>
					</tr>     
					<tr>
						<th scope="row">website</th>
						<td><?php echo($transaction->customerDetails->website)?></td>
					</tr> 
					<tr>
						<th scope="row">phoe</th>
						<td><?php echo($transaction->customerDetails->phone)?></td>
					</tr>
					<tr>
						<th scope="row">fax</th>
						<td><?php echo($transaction->customerDetails->fax)?></td>
					</tr>  					              
				</tbody>
			</table>







<?php /*
<div class="wrapper">
    <div class="response container">
        <div class="content">
            <div class="icon">
            <img src="/images/<?php echo($icon)?>.svg" alt="">
            </div>

            <h1><?php echo($header)?></h1>
            <section>
                <p><?php echo($message)?></p>
            </section>
            <section>
                <a class="button primary back" href="index.php">
                    <span>Test Another Transaction</span>
                </a>
            </section>
        </div>
    </div>
</div>

<aside class="drawer dark">
    <header>
        <div class="content compact">
            <a href="https://developers.braintreepayments.com" class="braintree" target="_blank">Braintree</a>
            <h3>API Response</h3>
        </div>
    </header>

    <article class="content compact">
        <section>
            <h5>Transaction</h5>
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>id</td>
                        <td><?php echo($transaction->id)?></td>
                    </tr>
                    <tr>
                        <td>type</td>
                        <td><?php echo($transaction->type)?></td>
                    </tr>
                    <tr>
                        <td>amount</td>
                        <td><?php echo($transaction->amount)?></td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td><?php echo($transaction->status)?></td>
                    </tr>
                    <tr>
                        <td>created_at</td>
                        <td><?php echo($transaction->createdAt->format('Y-m-d H:i:s'))?></td>
                    </tr>
                    <tr>
                        <td>updated_at</td>
                        <td><?php echo($transaction->updatedAt->format('Y-m-d H:i:s'))?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section>
            <h5>Payment</h5>

            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>token</td>
                        <td><?php echo($transaction->creditCardDetails->token)?></td>
                    </tr>
                    <tr>
                        <td>bin</td>
                        <td><?php echo($transaction->creditCardDetails->bin)?></td>
                    </tr>
                    <tr>
                        <td>last_4</td>
                        <td><?php echo($transaction->creditCardDetails->last4)?></td>
                    </tr>
                    <tr>
                        <td>card_type</td>
                        <td><?php echo($transaction->creditCardDetails->cardType)?></td>
                    </tr>
                    <tr>
                        <td>expiration_date</td>
                        <td><?php echo($transaction->creditCardDetails->expirationDate)?></td>
                    </tr>
                    <tr>
                        <td>cardholder_name</td>
                        <td><?php echo($transaction->creditCardDetails->cardholderName)?></td>
                    </tr>
                    <tr>
                        <td>customer_location</td>
                        <td><?php echo($transaction->creditCardDetails->customerLocation)?></td>
                    </tr>
                </tbody>
            </table>
        </section>

        <?php if (!is_null($transaction->customerDetails->id)) : ?>
        <section>
            <h5>Customer Details</h5>
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>id</td>
                        <td><?php echo($transaction->customerDetails->id)?></td>
                    </tr>
                    <tr>
                        <td>first_name</td>
                        <td><?php echo($transaction->customerDetails->firstName)?></td>
                    </tr>
                    <tr>
                        <td>last_name</td>
                        <td><?php echo($transaction->customerDetails->lastName)?></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><?php echo($transaction->customerDetails->email)?></td>
                    </tr>
                    <tr>
                        <td>company</td>
                        <td><?php echo($transaction->customerDetails->company)?></td>
                    </tr>
                    <tr>
                        <td>website</td>
                        <td><?php echo($transaction->customerDetails->website)?></td>
                    </tr>
                    <tr>
                        <td>phone</td>
                        <td><?php echo($transaction->customerDetails->phone)?></td>
                    </tr>
                    <tr>
                        <td>fax</td>
                        <td><?php echo($transaction->customerDetails->fax)?></td>
                    </tr>
                </tbody>
            </table>
        </section>i
        <?php endif; ?>

        <section>
            <p class="center small">Integrate with the Braintree SDK for a secure and seamless checkout</p>
        </section>

        <section>
            <a class="button secondary full" href="https://developers.braintreepayments.com/guides/drop-in" target="_blank">
                <span>See the Docs</span>
            </a>
        </section>
    </article>
</aside>
*/ ?>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

