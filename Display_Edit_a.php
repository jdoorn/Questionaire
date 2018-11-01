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
<!-- CSS Stylesheet -->	
<link rel="stylesheet" href="styles.css">

<title>Display Data</title>

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