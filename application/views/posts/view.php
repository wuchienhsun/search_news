<img style="margin-top: 3%;" src="<?php echo $content['image']; ?>" alt="">
<h2 style="margin-top: 3%;"><?php echo $content['Title']; ?></h2>
<small style="margin-top: 3%;" class="post-date">發佈時間: <?php echo $content['date']; ?>&emsp;&emsp;記者：<?php echo $content['reporter'];?>&emsp;&emsp;總類：<?php echo $content['Type']; ?>&emsp;&emsp;地區：<?php echo $content['Area']; ?></small> <br>


<div class="post-body">
<h4 style="line-height: 200%; letter-spacing: 3px;"><?php echo $content['content']; ?></h4>


</div> <hr>
<?php if($this->session->userdata('logged_in') == true) : ?>
  <?php if($this->session->userdata('Level') > 1) : ?>
<a style="margin-bottom:2%;" class="btn btn-outline-success btn-lg btn-block " href="<?php echo base_url(); ?>posts/edit/<?php echo $content['news_id']; ?>">修改新聞</a>
<?php echo form_open('posts/delete/'.$content['news_id']); ?>
<input class="btn btn-outline-danger btn-lg btn-block " type="submit" name="button" value="刪除新聞">
</form>
<hr>

<?php endif; ?>
<?php endif; ?>

<!--show comment -->
<h3>評論</h3>
<?php if($comments){ ?>
<?php foreach($comments as $comment) {?>
<?php if($comment['news_id']== $content['news_id']){ ?>
  <div class="user_id" style="">
    <h5>使用者：<strong><?php echo $comment['Username']; ?></strong> 留言於: <strong><?php echo $comment['created_at']; ?></strong></h5>
    <div class="card-body">
      <p>內容：<?php echo $comment['body']; ?></p>
    </div>
    <?php if($comment['user_id'] == $this->session->userdata('user_id')) { ?>
      <?php echo form_open('comments/updates/'.$comment['comment_id']); ?>
    <button class="btn btn-success" type="submit" name="button">修改評論</button>
  </form>
    <?php echo form_open('comments/delete/'.$comment['comment_id']); ?>
    <button class="btn btn-danger" type="submit" name="button" value="刪除評論">刪除評論</button>
    </form>

  <?php } ?>
<hr>
  </div>
<?php } ?>
<?php } ?>
<?php } else { ?>
  <h3>沒有評論</h3>
<?php } ?>

<hr>


<!--create comment -->
<h3>建立評論</h3>
<?php if($this->session->userdata('logged_in')) : ?>
<?php validation_errors(); ?>
<?php echo form_open('comments/create/'.$content['news_id']); ?>

<div class="form-group">
  <label>內容</label>
  <textarea type="text" name="body"  class="form-control"></textarea>
</div>
<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
<input type="hidden" name="news_id" value="<?php echo $content['news_id']; ?>">
<button class="btn btn-primary" type="submit">Submit</button>
<?php echo form_close(); ?>
<?php else : ?>
  <h3>請先<a class="" href="<?php echo base_url(); ?>users/login">登入</a>或<a class="" href="<?php echo base_url(); ?>users/register">註冊</a>後才可留言</h3>
<?php endif; ?>
