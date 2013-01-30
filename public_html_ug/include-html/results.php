<?php

function result($row) {
  $player = $row['player'];
  $offer = $row['offer'];
  $result = $row['result'];
?>
  <p><?php echo $player." ".$offer." ".$result; ?></p>
<?php
}

function download() {
  ?>
  <p><a href="download.php">Download</a></p>
  <?php
}

function pagination($page,$last) {
?>
  <div class="pagination">
    <div id="left">
    <?php
    if($page==1) {
      //If we're on the first page, don't link to previous pages
      echo " ";
    }
    else {
      echo "<p><a href='index.php?action=results&pagenum=1'>First</a>";
      $previous=$page-1;
      echo " <a href='index.php?action=results&pagenum=$previous'>Previous</a></p>";
    }
  ?>
  </div>
      <div id="right">
      <?php
      if($page==$last) {
	//If we're on the last page, don't link to further pages
	echo " ";
      }
      else {
	$next=$page+1;
	echo "<p><a href='index.php?action=results&pagenum=$next'>Next</a> ";
	echo "<a href='index.php?action=results&pagenum=$last'>Last</a></p>";
      }
  ?>
  </div>
      </div>
      <?php
      }
?>