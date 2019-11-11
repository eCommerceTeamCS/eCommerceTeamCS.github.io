
<?php
		session_start();	
	   	if(!isset($_SESSION['login'])){
			header("Location: login.html");		
		} 
		if($_SESSION['login'] == true)
		{
			header("Location: bitpaybutton.php");
		}
		else
		{
			header("Location: login.html");
		}
	?>

<!DOCTYPE HTML>
<!--
	Phantom by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <body class="is-preload">
 
      <form action="https://test.bitpay.com/checkout" method="post">
  				<input type="hidden" name="action" value="checkout" />
  			   	<input type="hidden" name="posData" value="" />
  				<input type="hidden" name="data" value="1V6cI4jjXQsPmUC8ZluSIFJryNAjzL+pJmeoFY0e4LQWRg0XhX8kzc1/Ntbika+528mIj99hUbRWLvF5E6mOJ7MdotrPu1qBpk96gRnxIHQ=" />
			        <input type="image" src="https://test.bitpay.com/cdn/en_US/bp-btn-pay-currencies.svg" name="submit" style="width: 210px" alt="BitPay, the easy way to pay with bitcoins.">
			  </form>
    </body>
</html>
  
