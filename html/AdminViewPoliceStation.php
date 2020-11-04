<?php 
include("Admin_Header.html");
?>

<div class="row" id="1">
  <div class="leftcolumn">
    <div class="card">
      
      <div class="wrapper">
        <input type="text" class="input" placeholder="What are you looking for?">
        <div class="searchbtn"><i class="fas">بحث</i></div>
      </div>

      <div class="table-content">
        <table id="police_station_table" class="table">
          <tr>
            <th onclick="sortTable(0,'police_station_table')">رقم</th>
            <th onclick="sortTable(1,'police_station_table')">الاسم</th>
            <th onclick="sortTable(2,'police_station_table')">اسم المستخدم</th>
            <th onclick="sortTable(3,'police_station_table')">كلمى المرور</th>
            <th onclick="sortTable(4,'police_station_table')">رقم الهاتف</th>
            <th onclick="sortTable(4,'police_station_table')">الصلاحية</th>
          </tr>
          <?php 
          require_once  '../php/lib_db.php';
          $ps = getPoliceStations();
          foreach ($ps as $pss) {
          ?> 
          <tr>
            <td><?=$pss->getId()?></td>
            <td><?=$pss->getName()?></td>
            <td><?=$pss->getUserName()?></td>
            <td><?=$pss->getPassword()?></td>
            <td><?=$pss->getPhoneNumber()?></td>
            <?php
            switch ($pss->getAccess()) {
              case 0:
                echo "<td>مسؤول</td>";
                break;
              
              case 1:
                echo "<td>مركز شرطة</td>";
                break;
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
      <form name="police_station" method="post">

        <input id="id_ps" type="hidden" name="id">
        <div>الاسم</div>
        <input id="name_ps" class="input-field" type="text" name="name" placeholder="الرجاء ادخال اسم مركز الشرطة" required>

        <div>اسم المستخدم</div>
        <input id="username_ps" class="input-field" type="text" name="username" placeholder="الرجاء ادخال اسم المستخدم لمرز الشرطة" required>

        <div>كلمة المرور</div>
        <input id="password_ps" class="input-field" type="text" name="password" placeholder="ارجاء ادخال كلمة المرور مركز الشرطة" required>

        <div>رقم الهاتف</div>
        <input id="phonenumber_ps" class="input-field" type="text" name="phonenumber" placeholder="الرجاء ادخال رقم الهاتف لمركز الشرطة" required>

        <div>صلاحية الوصول</div>
        <select id="state_select" class="input-field" name="access" required>
        <option value="" disabled selected hidden>الرجاء اختيار الصالحية</option>
        <option value="0">مسؤول</option>
        <option value="1">مركز شرطة</option>
        </select>

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