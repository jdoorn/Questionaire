<!-- Inputdata_DisplayData_a.php -->
<?php

require 'dbconnect.php';
echo('<br><br>The value of $POST: <br><br>');
print_r($_POST);
$ma = Array($_POST);
echo('<br><br>The value of Array $ma: <br><br>');
print_r($ma);
echo('<br><br>The value of $_SESSION: <br><br>');
print_r($_SESSION);


$response = "Response";
$question = "QuestionNumber";
$comment = "Comment";

echo('<br><br>The value of $response: <br><br>');
print_r($response);
echo('<br><br>The value of $question: <br><br>');
print_r($question);
echo('<br><br>The value of $comment: <br><br>');
print_r($comment);


function myfunction($value,$key)
{
echo "The key $key has the value $value<br><br>";
}
$x=array($ma);
array_walk($x,"myfunction");

echo('<br><br>The value of $value: <br><br>');
foreach($ma as $value){
  echo "$value <br>";
}

// Jim's code
$counter = 0;

  
  //create an array
  $a=array($ma);
 // $ma = array($a);
  
  //add data to test array
  for($c = 0; $c < 6; $c++)
  $a = $response.$counter++;
 // $a = $response.$c;
 echo('<br><br>The value of $a: <br>');
  print_r($a);
  {
       $ma[$c] = $a;
       $a = $a . "a";
  }
  print_r($ma);
  
  //set lenght of array
  $count = count($ma);
  
  //create sql statement
  $sql= "INSERT INTO tbl_poll_a (aQuestionNumber, aResponse, aComment) <br>".
        "VALUES (";
        
  //interval counter      
  $cnt = 0;
  
  
  for($c = 0; $c < $count; $c++)
  {
      //add commas
      $sql = $sql.$ma[$c];
      if($cnt < 2)
      {
          $sql = $sql . "," ;
      }
      
      //close brackets
      if($cnt == 2 && $c < ($count - 1))
      {
      $sql = $sql . "),<br>(" ;
      $cnt = -1;
      }
      else if($cnt == 2 && $c == ($count - 1))
      {
          //for last brace
          $sql = $sql . ");" ;
          $cnt = -1;
      }
      
       $cnt++;
  }
  echo("<br><br>");
  print_r($sql);


/*

$sql_input = "INSERT INTO tbl_poll_a ".
            "(aQuestionNumber, ".
            "aResponse, ".
            "aComment) ".
            "VALUES (".
            ":QuestionNumber, ".
            ":Response, ".
            ":Comment)";
            
//prepare the sql statement - $sqlh_input is defined as an object here
$sqlh_input = $pdo->prepare($sql_input);

//sanitize data
$QuestionNumber = filter_var($_POST[0], FILTER_SANITIZE_STRING);
//$Response = filter_var($_POST['Response'], FILTER_SANITIZE_STRING);          
//$Comment = filter_var($_POST['Comment'], FILTER_SANITIZE_STRING);

//$Response = filter_var($_POST['Response'], FILTER_SANITIZE_STRING);          
//$Comment = filter_var($_POST['Comment'], FILTER_SANITIZE_STRING);

//bind our data
$sqlh_input->bindparam(":QuestionNumber",$QuestionNumber);
$sqlh_input->bindparam(":Response","response test");
$sqlh_input->bindparam(":Comment","comment test");


// execute query
$sqlh_input->execute();
*/
?>

<html>
<head>
    <title>Confirmation</title>
</head>
<body>
      <h2>Information entered successfully</h2>
      <?php
        echo("Question: $QuestionNumber<br>");
        echo("Response: $Response<br>");
        echo("Comment: $Comment<br><br>");
        include 'menu.php';
                                          
      ?>
</body>
</html>
