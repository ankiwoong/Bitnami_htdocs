<?php
  $conn = mysqli_connect("localhost:3306", "root", "1q2w3e4r5t");
  mysqli_select_db($conn, "opentutorials");
  $result = mysqli_query($conn, "SELECT * FROM topic");
  $row = mysqli_fetch_assoc($result);
  echo $row['id'];
  echo $row['title'];
  
  echo "<br />";

  $row = mysqli_fetch_assoc($result);
  echo $row['id'];
  echo $row['title'];
?>
<?php
  require_once('../lib/print.php');
  require_once('../view/top.php');
?>
<a href="create.php">create</a>
<?php if(isset($_GET['id'])) { ?>
<a href="update.php?id=<?=$_GET['id']?>">update</a>
<form action="delete_process.php" method="post">
    <input type="hidden" name="id" value="<?=$_GET['id']?>">
    <p>
        <input type="submit" value="delete">
    </p>
</form>
<?php } ?>
<h2>
    <?php
      print_title();
    ?>
</h2>
<?php
    print_description();
     ?>
<?php
  require_once('../view/bottom.php');
?>