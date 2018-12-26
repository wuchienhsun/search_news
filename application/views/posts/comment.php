<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php foreach($comments as $comment) : ?>
<?php echo form_open('comments/update/'.$comment['comment_id']); ?>
<h2><?php echo $comment['comment_id']; ?></h2>
<input type="hidden" name="id" value="<?php echo $comment['comment_id']; ?>">
<div class="form-group">
  <label>內文</label>
  <textarea id="editor1" class="form-control" name="body"  placeholder="Add Body"><?php echo $comment['body']; ?></textarea>
</div>
<button type="submit" class="btn btn-success btn-lg btn-block">Submit</button>
</form>
<?php endforeach;?>
