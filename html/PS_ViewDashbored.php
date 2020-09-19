<?php
session_start();

include("PS_Header.html");
require_once  '../php/lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
  $Statistics = getStatistics(["ps_id"=> $account->getId(),"access"=> $account->getAccess(),"startdate"=> $_POST["startdate"],"enddate"=> $_POST["enddate"]]);
else
  $Statistics = getStatistics(["access"=> $account->getAccess(),"ps_id"=> $account->getId()]);
?>



<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <div style="text-align: center;">

        <form action="#" method="post">

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
      		<td class="celi" style="background-image: url(../image/wanted.png);">
            <div class="footer"> <?=$Statistics["wanted"]?> </div>
      		</td>
          <td class="celi" style="background-image: url(../image/law.png);">
            <div class="footer"> <?=$Statistics["cause"]?> </div>
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
    </div>
  </div>
</div>

<?php
include("Footer.html");
?>