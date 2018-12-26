<h2><?php echo $title; ?></h2>


<div class="container" style="margin-top:2%;">
  <div class="text-center">
  <table class="table">
  <thead>
    <tr>
      <th scope="col">user_id</th>
      <th scope="col">First</th>
      <th scope="col">Username</th>
      <th scope="col">password</th>
      <th scope="col">email</th>
      <th scope="col">created_at</th>
      <th scope="col">Level</th>
      <th scope="col">設定</th>
      <th scope="col">我的評論</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <!--
      <td scope="row"><?php echo $this->session->userdata('user_id');?></td>
      <td scope="row"><?php echo $this->session->userdata('first'); ?></td>
      <td scope="row"><?php echo $this->session->userdata('Username'); ?></td>
      <td scope="row"><a href="modify.php" class="btn btn-danger">修改密碼</a></td>
      <td><?php echo $this->session->userdata('email'); ?></td>
      <td><?php echo $this->session->userdata('created_at'); ?></td>
      <td><?php echo $this->session->userdata('Level'); ?></td>
      <td><a href="modify.php" class="btn btn-danger">修改個人資料</a></td>
      <td><a href="usercomment.php" class="btn btn-info">查看</a></td>
    -->
    <td scope="row"><?php echo $this->session->userdata('user_id');?></td>
    <td scope="row"><?php echo $_SESSION['first']; ?></td>
    <td scope="row"><?php echo $_SESSION['Username']; ?></td>
    <td scope="row"><a href="<?php echo base_url(); ?>/users/modifypassword" class="btn btn-danger">修改密碼</a></td>
    <td><?php echo $_SESSION['email']; ?></td>
    <td><?php echo $_SESSION['created_at']; ?></td>
    <td><?php echo $_SESSION['Level']; ?></td>
    <td><a href="<?php echo base_url(); ?>/users/modifyuserdata" class="btn btn-danger">修改個人資料</a></td>
    <td><a href="<?php echo base_url(); ?>/users/usercomment" class="btn btn-info">查看</a></td>
    </tr>
  </tbody>
</table>
</div>
</div>
