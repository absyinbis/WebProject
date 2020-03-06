<?php 
include("PS_Header.html");
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
     


        <div class="column">
          <div class="card1">
            <img src="https://www.google.tn/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png">
            <h3>Card <?=$w->getId()?></h3>
          </div>
        </div>

<?php 
}

  ?>

    </div>
    <?php 
for ($page=1; $page <= $number_of_page; $page++) { 
  
  echo '<a href="PS_ViewWanted.php?page=' . $page .'">'. $page . '</a>';
}
 ?>
  </div>



  <?php 
  include("Footer.html");
   ?>