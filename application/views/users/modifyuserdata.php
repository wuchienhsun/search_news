<h2><?php echo $title; ?></h2>

<h3>會員編號：<?php echo $this->session->userdata['user_id']; ?></h3>
<h3>會員姓名：<?php echo $this->session->userdata['first']; ?></h3> <hr>

<?php echo form_open('user/modifyuda'); ?>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">使用者名稱</label>
    <div class="col-sm-10">
      <input name="username" type="text" class="form-control" id="inputPassword3" value="<?php echo $this->session->userdata['Username']; ?>" placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">信箱</label>
    <div class="col-sm-10">
      <input name="email" type="email" class="form-control" id="inputEmail3" value="<?php echo $this->session->userdata['email']; ?>" placeholder="">
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10">
      <label for="exampleFormControlFile1">個人照片</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
</div>



  <div class="form-group row">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-info btn-lg btn-block">提交</button>
    </div>
  </div>

</form>
