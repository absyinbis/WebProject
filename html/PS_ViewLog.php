<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");
  
include("PS_Header.html");
require_once  '../php/lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);
if($_SERVER['REQUEST_METHOD'] === "POST")
    {
      $i = $_POST["search"];
      $sql = "SELECT `logg`.`id`, `logg`.`process`, `logg`.`date`, `user`.`name` user_name, `police_station`.`name` ps_name
      FROM `logg` 
      INNER JOIN `user` ON `logg`.`user_id` = `user`.`id`
      INNER JOIN `police_station` ON `logg`.`ps_id` = `police_station`.`id` WHERE police_station.id = '".$account->getWho()."'
      AND `logg`.`process` like '%".$i."%'
      OR `logg`.`id` like '%".$i."%'
      OR `logg`.`date` like '%".$i."%'
      OR `user`.`name` like '%".$i."%'
      OR `police_station`.`name` like '%".$i."%' ";
      $lg = Search($sql,'logg');
    }
    else
      $lg = getAllLogg($account->getWho());
 ?>



<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <form action="PS_ViewLog.php" method="post">
        <div class="wrapper">
          <input type="text" class="input" name="search" placeholder="What are you looking for?">
          <div class="searchbtn" onClick="javascript:document.forms[0].submit()"><i class="fas" >بحث</i></div>
        </div>
      </form>

      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">رقم</th>
            <th onclick="sortTable(1,'user_table')">العملية</th>
            <th onclick="sortTable(2,'user_table')">الاسم</th>
            <th onclick="sortTable(3,'user_table')">تاريخ العملية</th>
            <th onclick="sortTable(4,'user_table')">من</th>
          </tr>
          <?php 
          foreach ($lg as $l) {
          ?> 
          <tr>
            <td><?=$l->getId()?></td>
            <td><?=$l->getProcess()?></td>
            <td><?=$l->getUser_Id()?></td>
            <td><?=$l->getAddDate()?></td>
            <td><?=$l->getPS_Id()?></td>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div>
  </div>
</div>
  <?php 
  include("Footer.html");
   ?>