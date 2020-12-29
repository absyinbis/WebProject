<?php 
session_start();
if(!isset($_SESSION["ACCOUNT"]))
  header("Location:LoginView.php");
  
require_once '../php/lib_obj.php';

$ps = unserialize($_SESSION["ACCOUNT"]);

switch ($ps->getAccess()) {
        case 0: include("Admin_Header.html");
        	break;
        	
        case 1: include("PS_Header.html");
        	break;

        case 2: include("PSNyaba_Header.html");
                break;

        case 3: include("PSUser_Header.html");
}
		
?>


    <div class="about">
        <div class="container">
            <h1>الموقع  الالكتروني مراكز  الشرطة  </h1>
            <img src="../image/pi10.jpg" alt="The About image" width="200" height="200">
            <h2 style="text-align: center;">
                .سوف نقوم من خلال هذا الموقع  بتسهيل عملية استخراج  شهادة البراءة  وفتح  المحاضر  واضافة  المطلوبين  والمستخدمين والمحاضر والقضايا والسيارات المسروقه     وتسهيل  عمليه  البحث  عن  المطلوبين  والسيارات المسروقه   وستساهم ايضا في المساعدة  ضباط  المركز  في  اجراء  العميات  بطريقه سهله  واسرع  .
            </h2>
        </div>
    </div>
    <br>
    <br>

<?php 
include("Footer.html");
 ?>