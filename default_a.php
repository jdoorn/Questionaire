<!--   default_a.php
    Created by:  Joyce Doorn
    Created on:  10/11/2018
    Purpose:     This php displays a table to enter poll data 
				 inserts roster data into wp_poll/tbl_poll_a
				 and provides navigation-->

<?php  

// require is all or nothing
// include will still try to run the page
require 'dbconnect.php';
//echo($dbstatus);

//Select Questions

$sql_question = "SELECT * FROM tbl_poll_q ORDER BY qQuestionNumber";

//Execute the state/query
$result = $pdo->query($sql_question);


?>

<html>
<head>
<title>Poll</title>
<style>
	 

/* body element - sets background to tan, text to black */
	body {
	background-color : #FFFFFF;
	color : #666666;
	font-family : Verdana, Arial, sans-serif;
	font-size: 100%;
	background-image: url(images/sand.jpg);
	background-size: repeat;
	color: rgb(64,48,40);
}
header, nav, main, footer
{
	display: block;
}
	th, option {
		text-align: left;
		padding: 3px;
		font-weight: bold;
	}
}
	td {
		text-align: left;
		padding: 3px;
		width: 250px;
	}
//	th {
//		background-color: rgb(255, 99, 71);
//		color: white;
//	}
	input {
		width: 800px;
	}
	#submitbutton {
		width: 200px;
		margin-left: 400px;
		padding: 12px;
		font-weight: bold;
	}
	h1 {
		background-color: rgb(178, 27, 0);
		color: white;
		text-align: center;
		padding: 8px;
	}
/* nav element  */
	nav {
	font-weight: bold;
	padding: 10px 5px 0px 10px;
	text-decoration: none;
	float: left;
}
</head>
</style>  
<body>

<header>
	<h1>Emerging Web Technology Final Project</h1>

</header>

<form method="POST" action="Inputdata_DisplayData_a.php">  
<?php

$cntr = 0;
                    while($row = $result->fetch())
                    { 
						$cntr++;
echo('
<table border="none">
    <thead>
        <tr>
            <th colspan="2">
			<option value="'.$row ['qQuestionNumber'].". ".$row ['qQuestion'].'">'.
							 $row ['qQuestionNumber'].". ".$row ['qQuestion'].'</option>
			</th>
        </tr>
    </thead>

        <tr>
			<th>Select</th>
			<td><select id="Response" name="Response'.$cntr.'" required> 
			
                <option value="">Select</option>.
				<option value="'.$row ['qResponse1'].'">'.
                            $row ['qResponse1'].'</option>
                <option value="'.$row ['qResponse2'].'">'.
                            $row ['qResponse2'].'</option>
                <option value="'.$row ['qResponse3'].'">'.
                            $row ['qResponse3'].'</option>
                <option value="'.$row ['qResponse4'].'">'.
                            $row ['qResponse4'].'</option>
		</td>
		</tr>
		<tr>
			<td><input type="hidden" id="QuestionNumber" name="QuestionNumber'.$cntr.'" 
										value="'.$row ['qQuestionNumber'].'">
			</td>					
		</tr>
		<tr>
			</td>
			<th>Comment</th>
			<td><input type="text" width="250" name="Comment'.$cntr.'"">
			</td>
		</tr>

		</table>

	');
	}
?>
<br>
<tr>
      	<td></td>
    	<td><input id="submitbutton" type="submit" value="Submit Survey" >
    	</td>
	</tr>
	<br>
</form> 	
<?php
    include 'menu.php';

?>
</body>
</html>
