<?php
function offer_form($csrf) {
?>
<p>You are Player 1. Please select the number of coins to offer to Player 2. Please offer the number of coins that you would offer if you were playing with real coins</p>
<div class="form">
   <form action="index.php?action=offer&csrf=<?php echo $csrf; ?>" method="post">
     <p>Offer: </p>
     <input type="text" name="offer" />
     <br />
     <p>Email (optional):</p>
     <input type="text" name="email" />
     <br/><br />
     <input type="submit" value="Submit" />
   </form>
</div>
<p>Note: your email will be used solely to let you know whether your offer is accepted or not. It will not be disseminated to anyone and will be removed from the website database as soon as you are notified of the acceptance or refusal of your offer.</p>
<?php
}
?>