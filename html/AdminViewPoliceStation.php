<?php 
session_start();
include("Admin_Header.html");
require_once  '../php/lib_db.php';

if($_SERVER['REQUEST_METHOD'] === "POST")
    {
      $i = $_POST["search"];
      $sql = "select * from police_station where state = 1 and access = 1
              and name like '%".$i."%'
              or username like '%".$i."%'"; 
      $ps = Search($sql,'ps');
    }
    else
      $ps = getPoliceStations();
?>

<div class="row" id="1">
  <div class="leftcolumn">
    <div class="card">
      <div style="text-align: center; color: red;">
        <?php 
        if (isset($_SESSION["ERROR"]))
        {
          echo $_SESSION["ERROR"];
          $_SESSION["ERROR"]= ""; 
        }
        ?>
      </div>
      <form action="AdminViewPoliceStation.php" method="post">
        <div class="wrapper">
          <input type="text" class="input" name="search" placeholder="What are you looking for?">
          <div class="searchbtn"><i class="fas">بحث</i></div>
        </div>
      </form>

      <div class="table-content">
        <table id="police_station_table" class="table">
          <tr>
            <th onclick="sortTable(0,'police_station_table')">رقم</th>
            <th onclick="sortTable(1,'police_station_table')">الاسم</th>
          </tr>
          <?php 

          foreach ($ps as $pss) {
          ?> 
          <tr>
            <td><?=$pss->getId()?></td>
            <td><?=$pss->getName()?></td>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <form name="police_station" method="post">

        <input id="id_ps" type="hidden" name="id">
        <div>الاسم</div>
        <input id="name_ps" class="input-field" type="text" name="name" placeholder="الرجاء ادخال اسم مركز الشرطة" required>

        <input class="btn" type="submit" value="اضافة" onclick="policestation('Add')">
        <input class="btn" type="submit" value="تعديل" onclick="policestation('Edit')">
        <input class="btn" type="submit" value="حذف" onclick="policestation('Delete')">
      </form>
    </div>
  </div>
</div>


<script src="../javascript/tablepolicestationscript.js"></script>

<?php 
include("Footer.html");
?>