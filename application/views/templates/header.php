<html>
    <head>
      <title>搜！新聞</title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()+"/assets/css/style.css"; ?>"/>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url();?>search.png" />
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img src="<?php echo base_url();?>search.png" width="30" height="30" class="d-inline-block align-top"  alt="">
          搜！新聞</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">首頁 <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>about">關於我們</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/posts">最近新增</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/searchs/index">搜尋</a>
      </li>
      <?php if($this->session->userdata('logged_in')) : ?>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url(); ?>/posts/create">新增</a>
      </li>
    <?php endif; ?>

    </ul>
<ul class="navbar-nav navbar-right">
  <?php if(!$this->session->userdata('logged_in')) : ?>
  <li class="nav-item">
    <a class="btn btn-info my-2 my-sm-0" style="margin-right: 5px;" href="<?php echo base_url(); ?>/users/register">註冊</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-info my-2 my-sm-0" href="<?php echo base_url(); ?>/users/login">登入</a>
  </li>
<?php endif; ?>
<?php if($this->session->userdata('logged_in')) : ?>
  <li class="nav-item">
    <a class="btn btn-primary my-2 my-sm-0" style="color: #fff; margin-right: 5px;">歡迎，<?php echo $this->session->userdata('Username'); ?></a>
  </li>
  <li class="nav-item">
    <a class="btn btn-info my-2 my-sm-0" style="margin-right: 5px;" href="<?php echo base_url(); ?>/users/userpage">個人資料</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-danger my-2 my-sm-0" href="<?php echo base_url(); ?>/users/logout">登出</a>
  </li>
<?php endif; ?>
</ul>
    </div>
</nav>


<div class="container">


  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
  <?php endif; ?>


  <?php if($this->session->flashdata('comment_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_deleted').'</p>'; ?>
  <?php endif; ?>


  <?php if($this->session->flashdata('user_modifypwd')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_modifypwd').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_modifyerror')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_modifyerror').'</p>'; ?>
  <?php endif; ?>


  <?php if($this->session->flashdata('user_modifydata')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_modifydata').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('comment_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('comment_updated').'</p>'; ?>
  <?php endif; ?>
