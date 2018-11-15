<!-- Inputdata_DisplayData_a.php -->

<?php

require 'dbconnect.php';
//echo('<br><br>The value of $POST: <br><br>');
//print_r($_POST);

for($c = 0; $c < $_SESSION['cntr']; $c++)

{
	$Response = "Response".($c+1);
	$QuestionNumber = "QuestionNumber".($c+1);
	$Comment = "Comment".($c+1);

/*		
	$sql_input = "INSERT INTO tbl_poll_a 
            (aQuestionNumber, 
            aResponse,  
            aComment)  
            VALUES ('".
			$_POST[$QuestionNumber]."', '".  
            $_POST[$Response]."', ".  
            ":Comment)";
*/

$sql_input = "INSERT INTO tbl_poll_a ".
"(aQuestionNumber, ".
"aResponse, ".
"aComment) ".
"VALUES ('".
$_POST[$QuestionNumber]."', '".
$_POST[$Response]."', '".
$_POST[$Comment]."')";

//print_r($sql_input);			
//prepare the sql statement - $sqlh_input is defined as an object here
$sqlh_input = $pdo->prepare($sql_input);

//sanitize data
$CommentSanitized = filter_var($_POST[$Comment], FILTER_SANITIZE_STRING);

//bind our data
$sqlh_input->bindparam(":Comment",$CommentSanitized);
 
// execute query
$sqlh_input->execute();
}

?>

<html>
<head>
<!-- CSS Stylesheet -->	
<link rel="stylesheet" href="styles.css">

    <title>Questionnaire</title>
</head>
<body>
<div id="wrapper">
<header>
	<h1>Questionnaire</h1>
</header>

<?php
  include 'menu.php';
?>

<main>
      <h2>Information entered successfully</h2>
     <?php
	 
	 for($c = 0; $c < $_SESSION['cntr']; $c++)

{
	$Response = "Response".($c+1);
	$QuestionNumber = "QuestionNumber".($c+1);
	$Comment = "Comment".($c+1);

// Build sql Select	
$sql_select = "SELECT qQuestion from tbl_poll_q 
	WHERE qQuestionNumber = $_POST[$QuestionNumber]";

// execute query
$result = $pdo->query($sql_select);
$row = $result->fetch();
//    echo("Question:<b> $_POST[$QuestionNumber]".". ".$row['qQuestion']."</b><br>");
//    echo("Response: $_POST[$Response]<br>");
//    echo("Comment: $_POST[$Comment]<br><br>");
			
//		echo("<b>$_POST[$QuestionNumber]".". ".$row['qQuestion']."</b><br>");
		echo("<b>".$row['qQuestion']."</b><br>");
        echo("<blockquote> $_POST[$Response]<br>");
        echo("$_POST[$Comment]</blockquote>");
}                                          
      ?>
</main>
</div>
</body>
</html>
