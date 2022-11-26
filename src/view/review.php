<link rel="stylesheet" type="text/css" href="../style/rating_style.css">


<script type="text/javascript">
  
   function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById(cname+"rating").innerHTML=ab;

      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="star2.png";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="star1.png";
      }
   }

</script>


<?php$comment = "";?>
<h2>Tell us your thought about O'Kwiz !!</h2>
<form method="post" action="../public/review.php">
	
	<label>Name</label><input type="text" name="name" class="form-control" required><br><br/>
	<label>Comment:</label> <textarea name="comment" rows="5" cols="40"></textarea><br><br/>
<div class="div">
	  <input type="hidden" name="rating" id="php1_hidden" value="1">
	  <img src="../images/star1.png" onmouseover="change(this.id);" id="php1" class="php">
	  <input type="hidden"  name="rating" id="php2_hidden" value="2">
	  <img src="../images/star1.png" onmouseover="change(this.id);" id="php2" class="php">
	  <input type="hidden"  name="rating" id="php3_hidden" value="3">
	  <img src="../images/star1.png" onmouseover="change(this.id);" id="php3" class="php">
	  <input type="hidden"  name="rating" id="php4_hidden" value="4">
	  <img src="../images/star1.png" onmouseover="change(this.id);" id="php4" class="php">
	  <input type="hidden"  name="rating" id="php5_hidden" value="5">
	  <img src="../images/star1.png" onmouseover="change(this.id);" id="php5" class="php">
  </div>	

	<label>Add my review</label><div><input type="submit" name="add"> </div>
</form>



<?php
	foreach($data as $review){
        	?>
                	<?php echo htmlentities($review['pseudo'])?>
                        <?php echo htmlentities($review['appscore'])?>
                        <?php echo htmlentities($review['review'])?>
			<?php
			}
?>

