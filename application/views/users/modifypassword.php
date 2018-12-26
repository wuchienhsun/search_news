<h2><?php echo $title; ?></h2>


<?php echo form_open('user/modifypwd/'); ?>
<h2>會員編號：<?php echo $this->session->userdata('user_id'); ?></h2>

<div class="form-group">
  <label>輸入舊密碼</label>
  <input type="text" class="form-control" name="password" placeholder="" value="">
</div>
<div class="form-group">
  <label>輸入新密碼</label>
  <input id="editor1" class="form-control" name="newpassowrd"  placeholder="">
</div>
<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
</form>
