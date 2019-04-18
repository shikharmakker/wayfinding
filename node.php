<?php

      include('Constants.php');
      $x = $_POST['map'];
       $res = mysqli_query($conn,"SELECT * FROM junctions WHERE map = '$x' ");
        $node = array();
        $i=0;
      while($ro = mysqli_fetch_assoc($res)){
          $node[$i]['value'] = $ro['value'];
          $node[$i]['name'] = $ro['name'];
          $node[$i]['Tags'] = $ro['Tags'];
          $node[$i]['Description'] = $ro['Description'];
          $node[$i]['audio'] = $ro['audio'];
          $node[$i]['image'] = $ro['image'];  
          $i++;
      }
      $js = json_encode($node);
      echo $js;
      ?>