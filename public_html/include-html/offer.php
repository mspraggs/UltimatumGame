<?php
function offer_form($csrf) {
?>
<p>Imagine you have a pile of one hundred pound coins, dollar coins, or other currency of your choosing. You are going to offer any number of these coins (including 0 or 100) to the second player in this game. If they accept your offer, you both recieve the coins as allocated by yourself. If they don't, neither of you get any coins. Please choose the number of coins you'd like to offer and click submit. It is important that you base your decision on what you'd do if this scenario was real.</p>
<p>You may include your email address if you want to find out whether your offer is accepted. Your email will be used for no purpose other than to notify you of whether your offer is accepted of rejected by the other player.</p>
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
<?php
}
?>