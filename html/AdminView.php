<?php 
session_start();

 ?>

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
  <a onclick="opentab(1)">ادارة مراكز الشرطة</a>
  <a onclick="opentab(2)">ادارة المستخدمين</a>
  <a onclick="opentab(3)">ادارة القضاية</a>
  <a onclick="opentab(4)">ادارة المحاضر</a>
  <a style="float:left;">تسجيل الخروج</a>
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

<div class="row" id="2" style="display: none;">
  <div class="leftcolumn">
    <div class="card">
      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">id</th>
            <th onclick="sortTable(1,'user_table')">name</th>
            <th onclick="sortTable(2,'user_table')">username</th>
            <th onclick="sortTable(3,'user_table')">password</th>
            <th onclick="sortTable(4,'user_table')">phonenumber</th>
          </tr>
          <?php 
          $usr = getUsers();
          foreach ($usr as $u) {
          ?> 
          <tr>
            <td><?=$u->getId()?></td>
            <td><?=$u->getName()?></td>
            <td><?=$u->getUserName()?></td>
            <td><?=$u->getPassword()?></td>
            <td><?=$u->getPhoneNumber()?></td>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <form id="user" method="get">
        <div>name</div>
        <input id="name_u" class="input-field" type="text" name="name" required>
        <div>username</div>
        <input id="username_u" class="input-field" type="text" name="username" required>
        <div>password</div>
        <input id="password_u" class="input-field" type="text" name="password" required>
        <div>phone number</div>
        <input id="phonenumber_u" class="input-field" type="text" name="phonenumber" required>

        <input class="btn" type="submit" value="Add" onclick="changeAction(this.value,'user')">
        <input class="btn" type="submit" value="Edit" onclick="changeAction(this.value,'user')">
      </form>
    </div>
  </div>
</div>

<div class="row" id="3" style="display: none;">
  <div class="leftcolumn">
    <div class="card">33</div>
  </div>

  <div class="rightcolumn">
    <div class="card">33</div>
  </div>
</div>

<div class="row" id="4" style="display: none;">
  <div class="leftcolumn">
    <div class="card">44</div>
  </div>

  <div class="rightcolumn">
    <div class="card">44</div>
  </div>
</div>

<script src="../javascript/tabelscript.js"></script>

</body>
</html>
