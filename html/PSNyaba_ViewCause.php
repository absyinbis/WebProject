<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");
  
include("PSNyaba_Header.html");

require_once  '../php/lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);

if($_SERVER['REQUEST_METHOD'] === "POST")
    {
      $i = $_POST["search"];
      $sql = "select * from cause where ps_id = '".$account->getWho()."' and state = 1
              and report_id like '%".$i."%'
              or national_number like '%".$i."%'
              or cause_type like '%".$i."%'"; 
      $causes = Search($sql,'cause');
    }
    else
      $causes = getCauseByPoliceStation($account->getWho());
?>

<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <form action="PSNyaba_ViewCause.php" method="post">
        <div class="wrapper">
          <input type="text" class="input" name="search" placeholder="What are you looking for?">
          <div class="searchbtn"><i class="fas">بحث</i></div>
        </div>
      </form>


      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">رقم القضية</th>
            <th onclick="sortTable(1,'user_table')">رقم المحظر</th>
            <th onclick="sortTable(2,'user_table')">الرقم الوطني</th>
            <th onclick="sortTable(3,'user_table')">نوع القضية</th>
          </tr>
          <?php
          foreach ($causes as $cause) {
           ?>
          <tr>
          	<td><?=$cause->getId()?></td>
          	<td><?=$cause->getReportId()?></td>
          	<td><?=$cause->getNationalNumber()?></td>
          	<td><?=$cause->getCauseType()?></td>
          	<td>
            	<form action="PSNyaba_ViewDetailsCause.php" method="post">
              		<input type="hidden" name="id" value="<?=$cause->getId()?>">
              		<input type="submit" value="عرض القضية">
            	</form>
          	</td>
          </tr>
      	<?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<?php 
include("Footer.html");
?>