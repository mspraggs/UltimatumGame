<?php

function response_form($offer,$offer_id, $csrf) {
?>
  <p>You are Player 2, and have been offered <?php echo $offer; ?> coins. Please decide whether to accept or reject this offer. Please make the same decision as if real coins were on offer.</p>

<div class="form">
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