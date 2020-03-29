<?php 
include("PSUser_Header.html");
 ?>

<?php 
  require_once  '../php/lib_db.php';

  $result_per_page = 8;
  $total_rows = mysqli_num_rows(getLenght());
  $number_of_page = ceil($total_rows / $result_per_page);

  if (!isset($_GET["page"])) {
    $page = 1;
  }
  else
  {
    $page = $_GET["page"];
  }

  $start_limit = ($page - 1) * $result_per_page; 

  $wanted = getWanted($start_limit,$result_per_page);

?> 
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="row">


<?php 
foreach ($wanted as $w) {
?>
<form action="PSUser_ViewDetailsWanted.php" method="get">
<button class="card1 column" style="width: 278px;">
        <div>
          <div>
            <input type="hidden" name="id" value="<?=$w->getId()?>">
            <?php 
            echo '<img style="width: 150px; height: 150px; margin-top: 10px " src="data:img/jpeg;base64, '.base64_encode($w->getImg()).' " /> ';
             ?>
            <h3><?=$w->getName()?></h3>
          </div>
        </div>
</button>
</form>
<?php 
}
?>


    </div>
    <div style="text-align: center;">
    <?php 
for ($page=1; $page <= $number_of_page; $page++) { 
  
  echo '<a style="color: white; margin: 10px; margin-top: 20px; padding: 10px; background-color: black;" href="PSUser_ViewWanted.php?page=' . $page .'">'. $page . '</a>';
}
 ?>

 </div>
  </div>



  <?php 
  include("Footer.html");
   ?>