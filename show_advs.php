<?php
session_start();
require "connect.php";
$ids;
$depa='';
if (isset($_GET['id'])) {
  # code...
  $ids=$_GET['id'];
  $sql_adv="SELECT * FROM advertising LEFT JOIN user ON advertising.Uname=user.Email  WHERE advertising.Category_ID='$ids'";
  $res=mysqli_query($conn,$sql_adv);
  $sql_depa="SELECT * FROM category WHERE Category_ID='$ids'";
 $resu_dep=mysqli_query($conn,$sql_depa);
 while($rows_d=mysqli_fetch_array($resu_dep)){
   $depa=$rows_d['Category_Name'];
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
            <!--<a href="show_advs.php">الفساتين</a>
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

    <div >
      <div class="title">
        <h1><?php echo $depa;?> </h1>
        <hr>
      </div>
    <div class="all_adv">
    <!-- <div class="adv_container">
      <div class="img_adv_container">
       <img src="drees1.jpeg" alt="Mountains" style="width:100%">
      </div>
      <div class="info_adv_container">
       <h4 class="title_of_adv">عنوان الاعلان</h4>
       <p class="user_name">اسم المعلن </p>
      </div>
    </div>
    <div class="adv_container">
     <div class="img_adv_container">
      <img src="drees1.jpeg" alt="Mountains" style="width:100%">
     </div>
     <div class="info_adv_container">
      <h4 class="title_of_adv">عنوان الاعلان</h4>
      <p class="user_name">اسم المعلن </p>
     </div>
   </div>
   <div class="adv_container">
    <div class="img_adv_container">
     <img src="drees1.jpeg" alt="Mountains" style="width:100%">
    </div>
    <div class="info_adv_container">
     <h4 class="title_of_adv">عنوان الاعلان</h4>
     <p class="user_name">اسم المعلن </p>
    </div>
  </div>
  <div class="adv_container">
   <div class="img_adv_container">
    <img src="drees1.jpeg" alt="Mountains" style="width:100%">
   </div>
   <div class="info_adv_container">
    <h4 class="title_of_adv">عنوان الاعلان</h4>
    <p class="user_name">اسم المعلن </p>
   </div>
 </div>
 <div class="adv_container">
  <div class="img_adv_container">
   <img src="drees1.jpeg" alt="Mountains" style="width:100%">
  </div>
  <div class="info_adv_container">
   <h4 class="title_of_adv">عنوان الاعلان</h4>
   <p class="user_name">اسم المعلن </p>
  </div>
</div>
<div class="adv_container">
 <div class="img_adv_container">
  <img src="drees1.jpeg" alt="Mountains" style="width:100%">
 </div>
 <div class="info_adv_container">
  <h4 class="title_of_adv">عنوان الاعلان</h4>
  <p class="user_name">اسم المعلن </p>
 </div>
</div>
<div class="adv_container">
 <div class="img_adv_container">
  <img src="drees1.jpeg" alt="Mountains" style="width:100%">
 </div>
 <div class="info_adv_container">
  <h4 class="title_of_adv">عنوان الاعلان</h4>
  <p class="user_name">اسم المعلن </p>
 </div>
</div>
<div class="adv_container">
 <div class="img_adv_container">
  <img src="drees1.jpeg" alt="Mountains" style="width:100%">
 </div>
 <div class="info_adv_container">
  <h4 class="title_of_adv">عنوان الاعلان</h4>
  <p class="user_name">اسم المعلن </p>
 </div>
</div>
<div class="adv_container">
 <div class="img_adv_container">
  <img src="drees1.jpeg" alt="Mountains" style="width:100%">
 </div>
 <div class="info_adv_container">
  <h4 class="title_of_adv">عنوان الاعلان</h4>
  <p class="user_name">اسم المعلن </p>
 </div>
</div>-->
<?php
while ($rows=mysqli_fetch_array($res)) {
  # code...
  echo '
<div class="adv_container">
<a href="show_adv.php?id='.$rows['Adv_ID'].'">
     <div class="img_adv_container">
      <img src='.$rows['Picture'].' alt="Mountains" style="width:100%">
     </div>
     <div class="info_adv_container">
      <h4 class="title_of_adv">'.$rows['Title'].'</h4>
      <p class="user_name">'.$rows['User_Name'].'</p>
     </div>
     </a>
   </div>
  ';
}

?>
  </div>
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
