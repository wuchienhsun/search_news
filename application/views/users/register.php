
<div class="container">
  <h2><?php echo $title; ?></h2>

<?php
echo validation_errors();



?>


<div class="login-area" style="margin-top: 2%; margin-bottom: 3%; border: 1px solid; padding:5%;">
<?php echo form_open('users/register', array('class' => 'sinup-form')); ?>

  <div class="form-group">
    <h3>
    <label for="exampleInputEmail1">姓名</label></h3>
    <input name="firstname" required="required" type="text" class="form-control" id="exampleInputEmail1"  placeholder="輸入真實姓名">
    <small id="emailHelp" class="form-text text-muted">我們只是想知道怎麼稱呼您</small>
  </div>
  <div class="form-group">
    <h3>
    <label for="exampleInputEmail1">帳號</label></h3>
    <input name="username" required="required" type="text" class="form-control" id="exampleInputEmail1"  placeholder="輸入帳號">
    <small id="emailHelp" class="form-text text-muted">我們不會把您的帳號分享給別人的</small>
  </div>
  <div class="form-group">
    <h3>
    <label for="exampleInputEmail1">信箱</label></h3>
    <input name="email" required="required" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="輸入信箱">
    <small id="emailHelp" class="form-text text-muted">忘記密碼時將會寄信給您，您也可以使用信箱當作帳號登入</small>
  </div>
  <div class="form-group">
    <h3>
    <label for="exampleInputPassword1">密碼</label></h3>
    <input name="password" required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="輸入密碼">
  </div>
  <div class="container">
    <div class="">
      <button name="submit" type="submit" class="btn btn-success btn-lg active">註冊</button>
      <button  type="reset" class="btn btn-danger btn-lg active">重新輸入</button>
    </div>
  </div>
<?php echo form_close(); ?>
</div>
</div>
