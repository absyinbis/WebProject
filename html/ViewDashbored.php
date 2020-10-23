<?php 
session_start();
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
    $Statistics = getStatistics(["ps_id"=> $account->getId(),"startdate"=> $_POST["startdate"],"enddate"=> $_POST["enddate"]]);
}
else
{
  if($account->getAccess() == "0")
    $Statistics = getStatistics(["ps_id"=> "0"]);
  else
    $Statistics = getStatistics(["ps_id"=> $account->getId()]);
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

          <input type="submit" value="Send data">

        </form>
      </div>

      <table style="width: 100%; height: 90%;">
      	<tr>
      		<td class="celi" style="background-image: url(../image/user.png);">
            <div class="footer"> <?=$Statistics["user"]?> </div>
      		</td>
          <td class="celi" style="background-image: url(../image/law.png);">
            <div class="footer"> <?=$Statistics["cause"]?> </div>
          </td>
      		<td class="celi" style="background-image: url(../image/wanted.png);">
            <div class="footer"> <?=$Statistics["wanted"]?> </div>
      		</td>
      	</tr>
      	<tr>
          <td class="celi" style="background-image: url(../image/car.png);">
            <div class="footer"> <?=$Statistics["carstolen"]?> </div>
          </td>
          <td class="celi" style="background-image: url(../image/report.png);">
            <div class="footer"> <?=$Statistics["report"]?> </div>
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
          <?php if($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
                  <?php if ($account->getAccess() == "0"){ ?>
                    <input type="hidden" name="ps_id" value="<?=$_POST['ps_id']?>">
                  <?php } ?>
                    <input type="hidden" name="startdate" value="<?=$_POST["startdate"]?>">
                    <input type="hidden" name="enddate" value="<?=$_POST['enddate']?>">
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