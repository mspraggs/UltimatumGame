<?php
function offer_form($csrf) {
?>
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