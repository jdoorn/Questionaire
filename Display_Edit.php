<!-- Display_Edit.php

<?php
require 'dbconnect.php';

if(isset($_POST))
{
    if(!empty($_POST['action']))
    {
        // Check if Delete button was pressed
        if($_POST['action']==='Delete')
        {
        
            //sql string
            $sql_delete = "DELETE FROM tbl_poll_q WHERE qQuestion_Id = :questionID";
            
            //prepare the string
			$sqlh_delete =  $pdo->prepare($sql_delete);
            
            //sanitize input
            $questionID = filter_var($_POST['qQuestion_Id'],FILTER_SANITIZE_STRING);
            
            //bind our parameters
			$sqlh_delete->bindparam(":questionID",$questionID);
            
            //execute the query			
			$sqlh_delete->execute();
        }
        
        // Check if Edit button was pressed
        if($_POST['action']==='Edit')
        {
            $_SESSION['questEditID'] = filter_var($_POST['qQuestion_Id'],
                                FILTER_SANITIZE_STRING);
            
            // header takes us to a new page
            header("Location:Edit_Data.php");
            
        }
    }
}


$sql_selectEdit = "SELECT * ".
                  "FROM tbl_poll_q ".
                  "ORDER BY qQuestionNumber";

//run the query                  
$result_edit = $pdo->query($sql_selectEdit);

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
		padding: 8px;
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
    <table border="2">
    <thead>
            <tr>
                 <th>Question</th>
                 <th>Response 1</th>
                 <th>Response 2</th>
                 <th>Response 3</th>
                 <th>Response 4</th>
                 <th>Edit / Delete</th>
            </tr>
    </thead>
    <tbody>
    <?php
        // write rows and add buttons
        while($row = $result_edit->fetch())
        {
        echo(
            '<tr>'.
                 '<td>'.$row['qQuestionNumber'].". ".$row['qQuestion'].'</td>'.
                 '<td>'.$row['qResponse1'].'</td>'.
                 '<td>'.$row['qResponse2'].'</td>'.
                 '<td>'.$row['qResponse3'].'</td>'.
                 '<td>'.$row['qResponse4'].'</td>'.
                 '<td><form method="POST" 
                        action="Display_Edit.php"
                        onsubmit="return confirm('."'".'Are you sure?'.
                        "')".'">'.
                        '<input type ="hidden" 
                                name="qQuestion_Id"
                                value="'.$row['qQuestion_Id'].'">'.
                        '<input type="submit"  
                                value="Edit"
                                name="action"> &nbsp;&nbsp;'.
                        '<input type="submit"  
                                value="Delete"
                                name="action">
                                </form></td>'.
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