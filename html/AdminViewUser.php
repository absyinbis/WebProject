<?php 
session_start();
include("Admin_Header.html");
require_once  '../php/lib_db.php';

if($_SERVER['REQUEST_METHOD'] === "POST")
    {
      $i = $_POST["search"];
      $sql = "SELECT `user`.*, `police_station`.`name` who FROM `user` 
              INNER JOIN `police_station` ON `user`.`ps_id` = `police_station`.`id` 
              where `user`.`state` = 1
              and `user`.`name` like '%".$i."%'
              or `user`.`username` like '%".$i."%'
              or `police_station`.`name` like '%".$i."%'"; 
      $usr = Search($sql,'user');
    }
    else
      $usr = getUsers();
 ?>


<div class="row" id="2">
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
      <form action="AdminViewUser.php" method="post">
        <div class="wrapper">
          <input type="text" name="search" class="input" placeholder="What are you looking for?">
          <div class="searchbtn"><i class="fas">بحث</i></div>
        </div>
      </form>

      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">رقم</th>
            <th onclick="sortTable(1,'user_table')">الاسم</th>
            <th onclick="sortTable(2,'user_table')">اسم المستخدم</th>
            <th onclick="sortTable(3,'user_table')">كلمة المرور</th>
            <th onclick="sortTable(4,'user_table')">رقم الهاتف</th>
            <th onclick="sortTable(5,'user_table')">يتبع من</th>
            <th onclick="sortTable(6,'user_table')">صلاحية الوصول</th>
          </tr>
          <?php 
          foreach ($usr as $u) {
          ?> 
          <tr>
            <td><?=$u->getId()?></td>
            <td><?=$u->getName()?></td>
            <td><?=$u->getUserName()?></td>
            <td><?=$u->getPassword()?></td>
            <td><?=$u->getPhoneNumber()?></td>
            <td><?=$u->getWho()?></td>
            <?php
            switch ($u->getAccess()) {
              case 0:
                echo "<td>مسؤل النظام</td>";
                break;

              case 1:
                echo "<td>مسؤل مركز شرطة</td>";
                break;
              case 2:
                echo "<td>وكيل النيابة</td>";
                break;
              
              case 3:
                echo "<td>موظف</td>";
                break;

              case 4:
                echo "<td> مستخدم جوال</td>";

            }
            ?>
          </tr>
          <?php }  ?>
        </table>
      </div>
    </div>
  </div>

  <div class="rightcolumn">
    <div class="card">
      <form name="users" method="post">
        <input id="id_u" type="hidden" name="id">

        <div>الاسم</div>
        <input id="name_u" class="input-field" type="text" name="name" required>

        <div>اسم المستخدم</div>
        <input id="username_u" class="input-field" type="text" name="username" required>

        <div>كلمة المرور</div>
        <input id="password_u" class="input-field" type="text" name="password" required>

        <div>رقم الهاتف</div>
        <input id="phonenumber_u" onkeypress="return onlyNumberKey(event)" class="input-field" type="text" name="phonenumber" required>

        <div>صلاحية الوصول</div>
        <select id="access_select" class="input-field" name="access" onchange="pickANDhide()" required>
        <option value="" disabled selected hidden>الرجاء اختيار الصالحية</option>
        <option value="0">مسؤل النظام</option>
        <option value="1">مسؤل مركز شرطة</option>
        <option value="2">وكيل النيابة</option>
        <option value="3">موظف</option>
        <option value="4">مستخدم جوال</option>
        </select>

        <div>يتبع من</div>
        <select id="ps_select" class="input-field" name="ps_id" required>
        <option value="" disabled selected hidden>الرجاء اختيار مركز الشرطة</option>
        <?php 
          $ps = getPoliceStations();
          foreach ($ps as $pss){
        ?> 
        <option value="<?=$pss->getId()?>"><?=$pss->getName()?></option>
        <?php 
        }
         ?>
        </select>

        <input class="btn" type="submit" value="اضافة" onclick="user('Add')">
        <input class="btn" type="submit" value="تعديل" onclick="user('Edit')">
        <input class="btn" type="submit" value="حذف" onclick="user('Delete')">
      </form>
    </div>
  </div>
</div>


<script src="../javascript/tableuserscript_admin.js"></script>

<?php 
include("Footer.html");
?>