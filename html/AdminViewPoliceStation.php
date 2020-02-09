<?php 
include("Admin_Header.html");
?>

<div class="row" id="1">
  <div class="leftcolumn">
    <div class="card">
      <div class="table-content">
        <table id="police_station_table" class="table">
          <tr>
            <th onclick="sortTable(0,'police_station_table')">id</th>
            <th onclick="sortTable(1,'police_station_table')">name</th>
            <th onclick="sortTable(2,'police_station_table')">username</th>
            <th onclick="sortTable(3,'police_station_table')">password</th>
          </tr>
          <?php 
          require_once  '../php/lib_db.php';
          $acc = getPoliceStations();
          foreach ($acc as $a) {
          ?> 
          <tr>
            <td><?=$a->getId()?></td>
            <td><?=$a->getName()?></td>
            <td><?=$a->getUserName()?></td>
            <td><?=$a->getPassword()?></td>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <form name="police_station" method="post">
        <div style="color: red;"><?php if(isset($_SESSION["ERROR"])){ echo $_SESSION["ERROR"];
        $_SESSION["ERROR"]='';}?>
        </div>
        <input id="id_ps" type="hidden" name="id">
        <div>name</div>
        <input id="name_ps" class="input-field" type="text" name="name">
        <div>username</div>
        <input id="username_ps" class="input-field" type="text" name="username">
        <div>password</div>
        <input id="password_ps" class="input-field" type="text" name="password">

        <input class="btn" type="submit" value="Add" onclick="policestation('Add')">
        <input class="btn" type="submit" value="Edit" onclick="policestation('Edit')">
        <input class="btn" type="submit" value="Delete" onclick="policestation('Delete')">
      </form>
    </div>
  </div>
</div>


<script src="../javascript/tablepolicestationscript.js"></script>

<?php 
include("Footer.html");
?>