<?php

function response_form($offer,$offer_id) {
?>
<div class="form">
  <form action="index.php?action=response" method="post">
    <input type="submit" value="Accept" />
    <input type="hidden" name="result" value="accept" />
    <input type="hidden" name="id" value="<?php echo $offer_id; ?>" />
  </form>
  <br />
  <br />
  <form action="index.php?action=response" method="post">
    <input type="submit" value="Reject" />
    <input type="hidden" name="result" value="reject" />
    <input type="hidden" name="id" value="<?php echo $offer_id; ?>" />
  </form>
</div>
<?php
}
?>