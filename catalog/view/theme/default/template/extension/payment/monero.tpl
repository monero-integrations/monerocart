<div id="textbox">
  <h2 class="alignleft"> <?php echo $message; ?>  </h2>
  <input type="button" value="Verify Payment" onClick="window.location.reload()">
</div>

<div class="buttons">
		<link href="http://cdn.monerointegrations.com/style.css" rel="stylesheet">
	
	<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,800' rel='stylesheet'>
        <link href='http://cdn.monerointegrations.com/style.css' rel='stylesheet'>
        
            
            <!-- Monero container payment box -->
            <div class='container-xmr-payment'>
            <!-- header -->
            <div class='header-xmr-payment'>
            <span class='logo-xmr'><img src='http://cdn.monerointegrations.com/logomonero.png' /></span>
            <span class='xmr-payment-text-header'><h2>MONERO PAYMENT</h2></span>
            </div>
            <!-- end header -->
            <!-- xmr content box -->
            <div class='content-xmr-payment'>
            <div class='xmr-amount-send'>
            <span class='xmr-label'>Send:</span>
            <div class='xmr-amount-box'><?php echo $amount_xmr; ?></div><div class='xmr-box'>XMR</div>
            </div>
            <div class='xmr-address'>
            <span class='xmr-label'>To this address:</span>
            <div class='xmr-address-box'><?php echo $integrated_address; ?></div>
            </div>
            <div class='xmr-qr-code'>
            <span class='xmr-label'>Or scan QR:</span>
            <div class='xmr-qr-code-box'><img src='https://api.qrserver.com/v1/create-qr-code/? size=200x200&data=<?=$uri?>' /></div>
            </div>
            <div class='clear'></div>
            </div>
            <!-- end content box -->
            <!-- footer xmr payment -->
            <div class='footer-xmr-payment'>
            <a href='https://getmonero.org' target='_blank'>Help</a> | <a href='https://getmonero.org' target='_blank'>About Monero</a>
            </div>
            <!-- end footer xmr payment -->
            </div>
            <!-- end Monero container payment box -->
      
	</div>
