 <!-- Display_Edit_a.php

<?php
require 'dbconnect.php';


// Build sql  - Table 1 Questions by count
$sql_selectEdit1 = "SELECT aQuestionNumber, qQuestion, 
	qResponse1, (Select count(aResponse) from tbl_poll_a where aResponse = qResponse1) as 'Response1Count',
    qResponse2, (Select count(aResponse) from tbl_poll_a where aResponse = qResponse2) as 'Response2Count',
    qResponse3, (Select count(aResponse) from tbl_poll_a where aResponse = qResponse3) as 'Response3Count',
    qResponse4, (Select count(aResponse) from tbl_poll_a where aResponse = qResponse4) as 'Response4Count'
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestionNumber = qQuestionNumber
Group By aQuestionNumber
ORDER BY aQuestionNumber";
//run the query                  
$result_edit1 = $pdo->query($sql_selectEdit1);

?>
<html>
<head>

<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
</script>


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
<h2>Response Count by Question</h2>	
<?php
        // write rows and add buttons
        while($row = $result_edit1->fetch())
        {
        echo(

          '<div id="myChart'.$row['aQuestionNumber'].'"></div>
      
  <script>
    var myData = ['.$row['Response1Count'].','.$row['Response2Count'].','.$row['Response3Count'].','.$row['Response4Count'].'];'.

 //   'var myConfig = {
    'var myConfig'.$row['aQuestionNumber'].' = {
      "graphset": [{
        "type": "bar",
        "plot": {"background-color": "#7A88A6"},

        "title": {
          "text": "'.$row['qQuestion'].'"'.
        '},
        "scale-x": {
          "labels": ["'.$row['qResponse1'].'","'.$row['qResponse2'].'","'.$row['qResponse3'].'","'.$row['qResponse4'].'"]
        },
        "series": [{
          "values": myData
        }]
      }]
    };

    zingchart.render({
      id: "'.'myChart'.$row['aQuestionNumber'].'",
      data: myConfig'.$row['aQuestionNumber'].'
    }); 
    
  </script> 
  '  
            );
        }
    ?>

</main> 

</body>
</html>