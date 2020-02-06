<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">

  <title>Admin</title>

  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <script src="../javascript/functions.js"></script>

</head>
<body>

<div class="header">
  <h1>My Website</h1>
  <p>Resize the browser window to see the effect.</p>
</div>

<div class="topnav">
  <a href="AdminViewPoliceStation.php">ادارة مراكز الشرطة</a>
  <a href="AdminViewUser.php">ادارة المستخدمين</a>
  <a href="#">ادارة القضاية</a>
  <a href="#">ادارة المحاضر</a>
  <a href="#" style="float:left;">تسجيل الخروج</a>
</div>



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
      <form id="police_station" method="post">
        <div style="color: red;"><?php if(isset($_SESSION["ERROR"])){ echo $_SESSION["ERROR"];
        $_SESSION["ERROR"]='';}?>
        </div>
        <input id="id_ps" type="hidden" name="id">
        <div>name</div>
        <input id="name_ps" class="input-field" type="text" name="name" required>
        <div>username</div>
        <input id="username_ps" class="input-field" type="text" name="username" required>
        <div>password</div>
        <input id="password_ps" class="input-field" type="text" name="password" required>

        <input class="btn" type="submit" value="Add" onclick="changeAction('Add','police_station')">
        <input class="btn" type="submit" value="Edit" onclick="changeAction('Edit','police_station')">
        <input class="btn" type="submit" value="Delete" onclick="changeAction('Delete','police_station')">
      </form>
    </div>
  </div>
</div>


<script src="../javascript/tabelscript.js"></script>

</body>
</html>