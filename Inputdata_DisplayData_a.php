<!-- Inputdata_DisplayData_a.php -->
<style>

/* body element */
	body {
	background-color : #FFFFFF;
	color : #666666;
	font-family : Verdana, Arial, sans-serif;
	font-size: 100%;
}
header, nav, main, footer
{
	display: block;
}

	h2 {
		background-color: rgb(178, 27, 0);
		color: white;
		text-align: center;
		padding: 8px;
	}
/* nav element  */
	nav {
	font-weight : bold;
	padding: 20px 5px 0px 20px;
	text-decoration: none;
	float: left;
	background-size : 10%;
}
</style> 

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
    <title>Confirmation</title>
</head>
<body>
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
        include 'menu.php';
                                          
      ?>
</body>
</html>
