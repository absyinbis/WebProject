<?php 
include("PSUser_Header.html");
 ?>

<?php 
require_once  '../php/lib_db.php';
 ?>
    <script src="../javascript/zoompic.js"></script>

<div class="leftcolumn" style="width: 100%; float: right;">
	    	<div id="lb-back">
      			<div id="lb-img"></div>
    		</div>
    <div class="card">

	 	<div id="one">
			<div>صور المحظر</div>
      <div class="w3-content w3-display-container" style="width:400px;height: 400px; ">
			<?php
			$result = getImg($_POST["id"]);
	    while ($row = mysqli_fetch_array($result)) {
         echo '<img style="display: none;width:400px;height:400px " class="nature" src="data:img/jpeg;base64, '.base64_encode($row['img']).' ">';
      }
    
			?>
      <button class="w3-button w3-black w3-display-left" onclick="myShow.previous()">&#10095;</button>
      <button class="w3-button w3-black w3-display-right" onclick="myShow.next()">&#10094;</button> 
        </div>
	    </div>
	      
		<div id="two">
			<span style="font-size: 40px">اسم المطلوب : </span>
			
			</div>

	</div>
</div>


<script>
myShow = w3.slideshow(".nature",0);
</script>

 <?php 
include("Footer.html");
  ?>