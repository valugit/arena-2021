<?php
session_start();
include("../data/board.php");
include("../src/controller.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Robot Arena</title>
</head>
<body>

  <h1>Robot Arena</h1>

  <fieldset>
    <legend>Recommencer ?</legend>
    <form action="index.php" method="post">
      A : <input type="text" name='yourrobot' placeholder="Your robot">
      B : <input type="text" name='enemierobot' placeholder="Your enemy robot">
      <input type="submit" name="restart" value="Do it again" />
    </form>
  </fieldset>
  
  <div style="float:left; width: 30%;">
    <pre><?php $arena->drawBoard();?></pre>
  </div>

  <div style="float:left; width: 30%;">
    <h4>Résumé du tour</h4>
    <ul>
      <?php foreach ($turn_report as $line): ?>
        <li><?php echo $line;?></li>
      <?php endforeach ?>
  </div>

  <div style="float:left; width: 30%;">
    <h4>Partie en cours</h4>
    <table style="border:1px solid black;">
      <tr>
        <th>ID</th><th>Class</th><th>Lives</th><th>Pos</th>
      </tr>
    <?php foreach ($arena->getSummary() as $id => $line): ?>
      <tr>
        <td style="border:1px solid black;">
          <?php echo $id; ?>
        </td>
        <td style="border:1px solid black;">
          <?php echo $line["class"];?>
        </td>
        <td style="border:1px solid black;">
          <?php echo $line["life"]; ?>
        </td>
        <td style="border:1px solid black;">
          <?php echo $line["position"]->getDirection()." ".$line["position"]->getX().";".$line["position"]->getY();?>
        </td>
      </tr>
    <?php endforeach ?>
    <table>
  </div>

  
</body>
</html>


