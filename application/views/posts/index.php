
<h2><?php echo $title; ?></h2><hr>


<?php foreach($news as $new) : ?>
<img src="<?php echo $new['image'];?>" alt="">

  <h3 style="margin-bottom: 2%;"><?php echo $new['Title']; ?></h3>
  <small class="post-date">發布時間: <?php echo $new['date']; ?>&emsp;&emsp;記者：<?php echo $new['reporter'];?>&emsp;&emsp;總類：<?php echo $new['Type']; ?>&emsp;&emsp;地區：<?php echo $new['Area']; ?></small> <br>
  <?php echo character_limiter($new['content'], 20); ?> <hr>

  <p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$new['news_id']); ?>">Read More</a></p>
<?php endforeach; ?>

<div class="pagination-links" style="margin:30px 0;">
  <?php echo $this->pagination->create_links(); ?>
</div>
