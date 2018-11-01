<!-- Display_Edit_a.php

<?php
require 'dbconnect.php';

$sql_selectEdit = "SELECT aQuestionNumber, qQuestion, count(aResponse) as 'ResponseCount', aResponse
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestionNumber = qQuestionNumber
Group By aResponse
ORDER BY aQuestionNumber, count(aResponse) desc, aResponse_Id";

//run the query                  
$result_edit = $pdo->query($sql_selectEdit);

$sql_selectEdit2 = "SELECT aQuestionNumber, qQuestion, aResponse, aComment
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestionNumber = qQuestionNumber
WHERE aComment != ''
Group By aResponse
ORDER BY aQuestionNumber, aResponse_Id";

//run the query                  
$result_edit2 = $pdo->query($sql_selectEdit2);

?>
<html>
<head>
<title>Display Data</title>
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
/*	background-repeat: repeat; */
}
header, nav, main, footer
{
	display: block;
}
td {
		text-align: left;
		padding: 4px;
}
th {
		background-color: rgb(255, 99, 71);
        color: white;
        text-align: center;
		padding: 4px;
}

h1 {
		background-color: rgb(178, 27, 0);
		color: white;
		text-align: center;
		padding: 4px;
}
/* nav element  */
nav {
	font-weight : bold;
	padding: 20px 5px 0px 20px;
	text-decoration: none;
	float: left;
}
</style>  
</head>
<body>
	<h1>Responses by Question</h1>
    <table border="2" width="100%">
    <thead>
            <tr>
                 <th>Question</th>
                 <th>Response</th>
				 <th>Response Count</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['aQuestionNumber'].'. '.$row['qQuestion'].'</td>'.
				 '<td>'.$row['aResponse'].'</td>'.
				 '<td style="text-align:center">'.$row['ResponseCount'].'</td>'.
            '</tr>'
            );
        }
    ?>
    </tbody>
    </table>
		<h1>Comments by Question</h1>
	    <table border="2" width="100%">
    <thead>
            <tr>
                 <th>Question</th>
                 <th>Response</th>
                 <th>Comment</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit2->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['aQuestionNumber'].'. '.$row['qQuestion'].'</td>'.
				 '<td>'.$row['aResponse'].'</td>'.
                 '<td>'.$row['aComment'].'</td>'.
            '</tr>'
            );
        }
    ?>
    </tbody>
    </table>
<?php
  include 'menu.php';
?>
</body>
</html>