<?php
session_start();
require "connect.php";
$id_adv=$_GET['id'];
$msg='';
if (isset($_POST['submit_comment'])) {
  # code...
  $comments=$_POST['comment_area'];
  $emails=$_SESSION['email'];
  $sql_add_comment="INSERT INTO comment(Content,Adv_ID,User_Name)VALUES('$comments','$id_adv','$emails')";
  if (mysqli_query($conn,$sql_add_comment)) {

//    echo "string";
  }
  else{
    echo "eee";
  }
}

$sql_adv_show="SELECT * FROM advertising LEFT JOIN user ON advertising.Uname=user.Email WHERE advertising.Adv_ID='$id_adv'";
$res=mysqli_query($conn,$sql_adv_show);
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

<br>
      <div class="advs_box">
     <!-- <div class="adv_box">
        <p class="user_adv_title">عنوان الإعلان </p>
        <hr>
        <p class="user_data">اسم المعلن</p>
        <p class="user_data">المنطقه</p>
      </div>
      <div class="adv_box">
      <img class="adv_img"src="drees1.jpeg" alt="">
      </div>
      <div class="adv_box">
        <h5>الوصف:</h5>
        <p></p>
      </div>
      <div class="adv_box">
        <div class="reply_container">
          <p class="user_data">اسم المعلن</p>
          <hr>
          <p>الرد ..............</p>
          <hr>
          <span class="time">11:05</span>
        </div>
      </div>-->
      <?php
      while($ro=mysqli_fetch_array($res)){
        echo '
              <div class="adv_box">
        <p class="user_adv_title">'.$ro['Title'].'</p>
        <hr>
        <p class="user_data">اسم المعلن : '.$ro['User_Name'].'</p>
        <p class="user_data">المنطقه :'.$ro['City'].'</p>
      </div>
      <div class="adv_box">
      <img class="adv_img"src='.$ro['Picture'].' alt="">
      </div>
      <div class="adv_box">
        <h5>الوصف:</h5>
        <p>'.$ro['Description'].'</p>
      </div>';

$sql_comm="SELECT * FROM comment LEFT JOIN user ON comment.User_Name=user.email WHERE comment.Adv_ID='$id_adv' ";
$res_sql=mysqli_query($conn,$sql_comm);
if (mysqli_num_rows($res_sql)>0) {
 while($row=mysqli_fetch_array($res_sql)){
  echo '<div class="adv_box">
        <div class="reply_container">
          <p class="user_data">'.$row['User_Name'].'</p>
          <hr>
          <p>'.$row['Content'].'</p>
        </div>
      </div>
        ';
 }
}

      }

      ?>
      <?php
        if (isset($_SESSION['email'])) {
          echo '<div class="adv_box">
        <div class="reply_container">
          <p class="user_data">اضف تعليق</p>
          <form  method="post">
            <textarea name="comment_area" rows="10" cols="100"placeholder="من فضلك اكتب تعليقك هنا ......"></textarea>
            <input type="submit" name="submit_comment" value="انشر التعليق">
          </form>
        </div>
      </div>';
        }
      ?>
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
