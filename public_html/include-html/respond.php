<?php

function response_form($offer,$offer_id, $csrf) {
?>
<div class="form">
    <p>You have been offered <?php echo $offer; ?> coins (pounds, dollars, or other currency of your choosing) by the first player in this game, out of a total of one hundred coins. If you accept their offer, you will receive <?php echo $offer; ?> coins and the first player will receive the remainder from the original pile of one hundred. If you refuse the offer, neither of you will receive anything. Please decide whether to accept the offer or not. Remember that you should choose based on what you'd do if this scenario was real.</p>
  <form action="index.php?action=respond&csrf=<?php echo $csrf; ?>" method="post">
    <input type="submit" value="Accept" />
    <input type="hidden" name="result" value="accept" />
    <input type="hidden" name="id" value="<?php echo $offer_id; ?>" />
  </form>
  <br />
  <br />
  <form action="index.php?action=respond&csrf=<?php echo $csrf; ?>" method="post">
    <input type="submit" value="Reject" />
    <input type="hidden" name="result" value="reject" />
    <input type="hidden" name="id" value="<?php echo $offer_id; ?>" />
  </form>
</div>
<?php
}
?>