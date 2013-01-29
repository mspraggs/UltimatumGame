<?php

function result($row) {
  $player = $row['player'];
  $offer = $row['offer'];
  $result = $row['result'];
?>
  <p><?php echo $player." ".$offer." ".$result; ?></p>
<?php
}
?>