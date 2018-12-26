<div class="container" style="margin-top:5px;">
  <h2><?php echo $title; ?></h2>

  <?php if(!$comments) { ?>
    <h2><?php echo "沒有評論"; ?></h2>

  <?php }else { ?>
  <?php foreach($comments as $comment) : ?>
    <table class="table">
      <thead>
        <tr>
          <th >新聞名稱</th>
          <th >評論內容</th>
          <th >評論時間</th>
          <th >修改</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td ><a href="<?php echo base_url(); ?>/posts/<?php echo $comment['news_id'];?>"><?php echo $comment['Title']; ?></a></td>
          <td ><?php echo  $comment['body']; ?></td>
          <td ><?php echo  $comment['created_at']; ?></td>
          <td ><a class="btn btn-danger" style="color: #fff;">修改</a></td>
        </tr>
      </tbody>
    </table>

  <?php endforeach; ?>
<?php } ?>
</div>
