<h2><?php echo $title;  ?></h2>


<?php echo validation_errors(); ?>

<?php echo form_open('posts/update/'.$news['news_id']); ?>
<h2><?php echo $news['news_id']; ?></h2>
<input type="hidden" name="id" value="<?php echo $news['news_id'] ?>">
<div class="form-group">
  <label>標題</label>
  <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $news['Title']; ?>">
</div>
<div class="form-group">
  <label>內文</label>
  <textarea id="editor1" class="form-control" name="body"  placeholder="Add Body"><?php echo $news['content']; ?></textarea>
</div>
<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
</form>
