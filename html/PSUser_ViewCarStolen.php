<?php 
session_start();
include("PSUser_Header.html");
?>

<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
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
      <form action="PSUser_ViewCarStolen.php" method="post">
        <div class="wrapper">
          <input type="text" class="input" name="search" placeholder="What are you looking for?">
          <div class="searchbtn"><i class="fas">بحث</i></div>
        </div>
      </form>


      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">رقم لوحة</th>
            <th onclick="sortTable(1,'user_table')">رقم الهيكل</th>
            <th onclick="sortTable(2,'user_table')">نوع السيارة</th>
            <th onclick="sortTable(3,'user_table')">الموديل</th>
          </tr>
          <?php 
          require_once  '../php/lib_db.php';
          $account = unserialize($_SESSION["ACCOUNT"]);

          
          if(isset($_POST["search"]))
          {
            $i = $_POST["search"];
            $sql = "select * from car_stolen
            where ps_id = '". $account->getWho() ."'
            and state = 1
            and structure_number like '%".$i."%'
            or plate_number like '%".$i."%'
            or vehicle_type  like '%".$i."%'
            or model like '%".$i."%' ";
            $carstolen = Search($sql,'carstolen');
          }
          else

          $carstolen = getCarStolen();


          foreach ($carstolen as $cs) {
          ?> 
          <tr>
            <td><?=$cs->getPlateNumber()?></td>
            <td><?=$cs->getStructureNumber()?></td>
            <td><?=$cs->getVehicleType()?></td>
            <td><?=$cs->getModel()?></td>
            <td>
            <form action="PSUser_ViewDetailsCarStolen.php" method="post">
              <input type="hidden" name="id" value="<?=$cs->getId()?>">
              <input type="submit" value="عرض السيارة">
            </form>
          </td>
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