<div class="container">
  <h2><?php echo $title; ?></h2>
<div class="login-area" style="margin-top: 60px; border: 1px solid; padding:5%;">
  <?php echo form_open('users/login', array('class' => 'sinup-form')); ?>
  <div class="form-group">
    <h3>
    <label for="exampleInputEmail1">帳號</label></h3>
    <input name="username" required="required" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="輸入帳號">
    <small id="emailHelp" class="form-text text-muted">我們不會把你的帳號分享給別人的</small>
  </div>
  <div class="form-group">
    <h3>
    <label for="exampleInputPassword1">密碼</label></h3>
    <input name="password" required="required" type="password" class="form-control" id="exampleInputPassword1" placeholder="輸入密碼">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">記住我</label>
  </div>
  <div class="container">
    <div class="">
      <button name="login" type="submit" class="btn btn-success btn-lg active">登入</button>
      <button  type="submit" class="btn btn-primary btn-lg active">忘記密碼</button>
    </div>
  </div>

<?php echo form_close(); ?>
</div>
</div>
