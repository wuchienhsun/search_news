<h2><?php echo $title; ?> : <?php echo $text;?></h2>
<h2><?php echo $title2; ?> : <?php if(isset($number))
{

    $selected = array("標題", "內容", "時間", "總類", "國家");

    switch ($number) {
      case '1':
        echo $selected[0];
        break;
      case '2':
        echo $selected[1];
        break;
      case '3':
        echo $selected[2];
        break;
      case '4':
        echo $selected[3];
        break;
      case '5':
        echo $selected[4];
        break;
      default:
        echo "<script>alert('請選擇條件');</script>";
        echo "請選擇條件";
        break;
    }
} ?></h2>
<h2>搜尋結果：筆</h2>
<hr>

<?php foreach($results as $row) : ?>


<img src="<?php echo $row['image']; ?>" alt="">
<h1><?php echo  $row['Title']; ?></h1>
<h4>發布時間：<?php echo $row['date']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;記者:<?php echo $row['reporter'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;總類:<?php echo $row['Type'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;國家:<?php echo $row['Area']; ?></h4> <hr />
<h2>內文：</h2><h5><?php echo character_limiter($row['content'], 20); ?></h5>
<p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$row['news_id']); ?>">Read More</a></p> <hr>

<?php endforeach; ?>
