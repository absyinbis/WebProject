<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");
  
require_once  '../php/lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);

if ($account->getAccess() == "0")
include("Admin_Header.html");
else
include("PS_Header.html");

 
if ($_SERVER['REQUEST_METHOD'] === "POST"){
  if ($account->getAccess() == "0")
    $Statistics = getStatistics(["ps_id"=> $_POST["ps_id"],"startdate"=> $_POST["startdate"],"enddate"=> $_POST["enddate"]]);
  else
    $Statistics = getStatistics(["ps_id"=> $account->getWho(),"startdate"=> $_POST["startdate"],"enddate"=> $_POST["enddate"]]);
}
else
{
  if($account->getAccess() == "0")
    $Statistics = getStatistics(["ps_id"=> "0"]);
  else
    $Statistics = getStatistics(["ps_id"=> $account->getWho()]);
}
 ?>






<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <div style="text-align: center;">

        <form action="" method="post">
          <?php if($account->getAccess() == "0") {?>
          <select name="ps_id">
            <option value="0">الكل</option>
            <?php 
              require_once  '../php/lib_db.php';
              $ps = getPoliceStations();
              foreach ($ps as $pss){
            ?> 
            <option value="<?=$pss->getId()?>"><?=$pss->getName()?></option>
            <?php
            } 
             ?>
          </select>
        <?php } ?>

          <input id="date1" type="date" name="startdate" onchange="setrequired()">

          <input id="date2" type="date" name="enddate" onchange="setrequired()"> 

          <input class="btn" type="submit" value="فرز">

        </form>
      </div>
      <br>
      <br>
      <table style="width: 100%; height: 90%;text-align: center">
      	<tr>
      		<td>
            <div class="card">
              <img src="../image/user.png" alt="Avatar">
                <div class="container">
                  <h4><b>مستخدمين</b></h4> 
                  <p><?=$Statistics["user"]?></p> 
                </div>
            </div>
      		</td>
          <td>
            <div class="card">
              <img src="../image/law.png" alt="Avatar">
                <div class="container">
                  <h4><b>القضايا</b></h4> 
                  <p><?=$Statistics["cause"]?></p> 
                </div>
            </div>
          </td>
      		<td>
            <div class="card">
              <img src="../image/report.png" alt="Avatar">
                <div class="container">
                  <h4><b>المحاظر</b></h4> 
                  <p><?=$Statistics["report"]?></p> 
                </div>
            </div>
      		</td>
      	</tr>
      	<tr>
          <td>
            <div class="card">
              <img src="../image/car.png" alt="Avatar">
                <div class="container">
                  <h4><b>السيارات </b></h4> 
                  <p><?=$Statistics["carstolen"]?></p> 
                </div>
            </div>
          </td>
          <td>
            <div class="card">
              <img src="../image/wanted.png" alt="Avatar">
                <div class="container">
                  <h4><b>مطلوبين</b></h4> 
                  <p><?=$Statistics["wanted"]?></p> 
                </div>
            </div>
          </td>
        </tr>
      </table>

      <div style="text-align: center;">

        <form action="PrintDashBored.php" method="post" target="_blank">
          <input type="hidden" name="report" value="<?=$Statistics["report"]?>">
          <input type="hidden" name="carstolen" value="<?=$Statistics["carstolen"]?>">
          <input type="hidden" name="wanted" value="<?=$Statistics["wanted"]?>">
          <input type="hidden" name="cause" value="<?=$Statistics["cause"]?>">
          <input type="hidden" name="user" value="<?=$Statistics["user"]?>">
          <?php if($_SERVER['REQUEST_METHOD'] === 'POST') { 
                  if ($account->getAccess() == "0") { ?>
                    <input type="hidden" name="ps_id" value="<?=$_POST['ps_id']?>">
                  <?php
                }
                  else{ ?>
                    <input type="hidden" name="ps_id" value="<?=$account->getWho()?>">
                <?php } ?>
                    <input type="hidden" name="startdate" value="<?=$_POST["startdate"]?>">
                    <input type="hidden" name="enddate" value="<?=$_POST['enddate']?>">
                  <?php }  
                  else
                  if ($account->getAccess() == "0") { ?>
                    <input type="hidden" name="ps_id" value="0">
                  <?php
                }
                  else{ ?>
                    <input type="hidden" name="ps_id" value="<?=$account->getWho()?>">
                <?php } ?>

          <input class="btn" type="submit" value="طباعة الاحصائية">
        </form>

      </div>
    </div>
  </div>
</div>

<?php
include("Footer.html");
?>