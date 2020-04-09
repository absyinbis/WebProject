<?php 
include("Admin_Header.html");
 ?>



<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <div class="wrapper">
        <input type="text" class="input" placeholder="What are you looking for?">
        <div class="searchbtn"><i class="fas">بحث</i></div>
      </div>

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
          require_once  '../php/lib_db.php';
          $lg = getAllLogg();
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