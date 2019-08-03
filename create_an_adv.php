<?php
session_start();
$msg='';
require "connect.php";
if (isset($_FILES['uploadimge'])) {
  # code...
  //print_r($_FILES['uploadimge']);
  $fname=$_FILES['uploadimge']['name'];
   $ftype=$_FILES['uploadimge']['type'];
   $ftemp=$_FILES['uploadimge']['tmp_name'];
   $fsize=$_FILES['uploadimge']['size'];
   $ends=explode('.',$_FILES['uploadimge']['name']);
   $file_ext=strtolower(end($ends));
   $extensions= array("jpeg","jpg","png");
   if (in_array($file_ext,$extensions)) {
     $path=$fname;
     $title=$_POST['adv_title'];
     $city=$_POST['city'];
     $des=$_POST['describtion'];
     $cag=$_POST['adv_section'];
     $user=$_SESSION['email'];
     $sql_add="INSERT INTO  advertising(Title,City,Picture,Description,Category_ID,Uname)VALUES('$title','$city','$path','$des','$cag','$user')";
     if (mysqli_query($conn,$sql_add)) {
       # code...
       $msg="تم اضافة المنتج بنجاح ";
     }
     else{
      $msg="يوجد خطاء بالمدخلات ";
     }
   }
   else{
  $msg="الرجاء رفع صور ";
   }
}
?>
<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>رداء</title>
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>
  <body>
      <!--header-->
    <header>
      <div class="header">
       <a href="index.php" class="logo">رداء</a>
        <div class="header-right">
         <a class="active" href="index.php"> الرئيسية </a>
         <div class="dropdown">
          <button class="dropbtn">الأقسام
           <i class="fa fa-caret-down"></i>
          </button>
           <div class="dropdown-content">
           <!-- <a href="show_advs.php">الفساتين</a>
            <a href="show_advs.php">الحقائب </a>
            <a href="show_advs.php">الأحذيه</a>
            <a href="show_advs.php">المجوهرات</a>
            <a href="show_advs.php">الملابس</a>
            <a href="show_advs.php">العتيقه</a>
            <a href="show_advs.php">آخرى</a>-->
             <?php
 $sql_catg="SELECT * FROM category";
 $resu=mysqli_query($conn,$sql_catg);
 while ($rows=mysqli_fetch_array($resu)) {
  echo '  <a href="show_advs.php?id='.$rows['Category_ID'].'">'.$rows['Category_Name'].'</a>';
 }
 ?>

          </div>
         </div>
         <?php
           if (isset($_SESSION['email'])) {
             echo '  <a href="create_an_adv.php"> إنشاء إعلان </a>';
             echo '<a href="logout.php">تسجيل الخروج</a>';
           }
           else{
             echo "<a href=signup.php> التسجيل </a>
        <button id=loginbtn onclick=document.getElementById('id01').style.display='block'>تسجيل الدخول </button>
        <div id=id01 class=modal>
        <form class=modal-content method=POST action=index.php>
        <div class=container>
        <h1>تسجيل الدخول </h1>
          <hr>
        <label class=label for=email><b>البريد الإلكتروني:  </b></label>
        <br>
        <input class=input type=text placeholder=اكتب بريدك الإلكتروني  name=email required>
        <br>
      <label class=labelfor=psw><b>  كلمة المرور : </b></label>
      <br>
      <input class=input type=password placeholder=اكتب كلمة المرور  name=psw required>

     <div >

       <button class=loginbtn type=button onclick=document.getElementById('id01').style.display='none' class=cancelbtn>إلغاء </button>
      <!-- <button class=loginbtn type=submit class=signup>تسجيل الدخول</button>-->
      <input type=submit name=sub_login class=signup value=سجيل الدخول>
     </div>
   </div>
 </form>
</div>";
           }

         ?>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
         </div>
      </div>
    </header>

<?php echo $msg;?>
    <!--End_header-->
    <div class="create_an_adv_container">

<br><br>
 <h3>فضلاً إملاء الإستمارة بالبيانات المطلوبة لكيي تتمكن من نشر إعلانك</h3>
 <hr>
 </div>
    <div class="form_container">
  <form  method="POST" enctype="multipart/form-data">

    <label class="adv_data"for="adv_title">عنوان الإعلان:</label>
    <input type="text" id="adv_title" name="adv_title" placeholder="العنوان......">
    <label class="adv_data" for="adv_section">القسم:</label>
    <select id="adv_section" name="adv_section">
      <?php
 $sql_catg="SELECT * FROM category";
 $resu=mysqli_query($conn,$sql_catg);
 while ($rows=mysqli_fetch_array($resu)) {
  echo '  <option value='.$rows['Category_ID'].'>'.$rows['Category_Name'].'</option>';
 }

      ?>

    </select>
    <label class="adv_data" for="city">المنطقة:</label>
    <select id="city" name="city">
      <option value="">الرياض</option>
      <option value="">مكة</option>
      <option value="">جدة</option>
      <option value="">الشرقيه</option>
      <option value="">حائل</option>
      <option value="">القصيم</option>
      <option value="">تبوك</option>
      <option value="">الحدود الشمالية</option>
      <option value="">الجوف</option>
      <option value="">عسير</option>
      <option value="">جازان</option>
      <option value="">نجران</option>
      <option value="">الحدود الشمالية</option>
      <option value="">الباحة</option>
    </select>
    <label class="adv_data" for="uploadimge">ارفع الصور:</label><br><br>
    <input type="file" name="uploadimge" id="uploadimge"><br><br>
    <label class="adv_data" for="describtion">الوصف:</label>
    <textarea id="describtion" name="describtion" placeholder="اكتب وصف إعلانك هنا ........" style="height:200px"></textarea>
    <input class="submit"type="submit" value="نشر الإعلان" name="sub">
  </form>

</div>

    <!--footer-->
    <div class="footer">
     <div class="footer_cotainer">
       <ul>
        <li ><a class="footer_cotant" href="#">المساعدة</a></li>
        <li ><a class="footer_cotant" href="#">تواصل معنا</a></li>
        <li ><a class="footer_cotant" href="#">حولنا </a></li>
      </ul>
     </div>
     <div id=copyright>
       جميع الحقوق محفوظة لرداء ٢٠١٩
    </div>
   </div>
  </body>
</html>
