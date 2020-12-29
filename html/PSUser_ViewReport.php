<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");
  
include("PSUser_Header.html");
require_once  '../php/lib_db.php';
$account = unserialize($_SESSION["ACCOUNT"]);

if($_SERVER['REQUEST_METHOD'] === "POST")
  {
    $i = $_POST["search"];
    $sql = "select * from report
            where ps_id = '". $account->getWho() ."'
            and state = 1
            and id like '%".$i."%'
            or name_you like '%".$i."%'
            or report_type like '%".$i."%'
            or date  like '%".$i."%'";
    $reports = Search($sql,'report');
  }
  else
    $reports = getReports($account->getWho());
?>

<div class="row">
  <div class="leftcolumn" style="width: 100%; float: right;">
    <div class="card">

      <form action="PSUser_ViewReport.php" method="post">
        <div class="wrapper">
          <input type="text" class="input" name="search" placeholder="What are you looking for?">
          <div class="searchbtn" onClick="javascript:document.forms[0].submit()"><i class="fas">بحث</i></div>
        </div>
      </form>


      <div class="table-content">
        <table id="user_table" class="table">
          <tr>
            <th onclick="sortTable(0,'user_table')">رقم المحظر</th>
            <th onclick="sortTable(1,'user_table')">اسم صاحب المحظر</th>
            <th onclick="sortTable(2,'user_table')">نوع المحظر</th>
            <th onclick="sortTable(3,'user_table')">التاريخ</th>
          </tr>
          <?php 

          foreach ($reports as $r) {
          ?> 
          <tr>
            <td><?=$r->getId()?></td>
            <td><?=$r->getNameYou()?></td>
            <td><?=$r->getReportType()?></td>
            <td><?=$r->getDate()?></td>
            <td>
            <form action="PSUser_ViewDetailsReport.php" method="post">
              <input type="hidden" name="id" value="<?=$r->getId()?>">
              <input type="submit" value="عرض المحظر">
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