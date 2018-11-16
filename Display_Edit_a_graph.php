 <!-- Display_Edit_a.php

<?php
require 'dbconnect.php';


// Build sql  - Table 1.1 - Percents
$sql_selectEdit1_1 = "SELECT aQuestionNumber, qQuestion, 
(Select count(*) from tbl_poll_a where aQuestionNumber = qQuestionNumber) as 'TotalCount',
-- 1st Response 
	  qResponse1,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse1) as 'R_1_Count',
     	 FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestionNumber = qQuestionNumber 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse1
      and   y.aQuestionNumber = aQuestionNumber),0) as 'R_1_Pct', 
-- 2nd Response 
	  qResponse2,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse2) as 'R_2_Count',
     	  FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestionNumber = qQuestionNumber 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse2
      and   y.aQuestionNumber = aQuestionNumber),0) as 'R_2_Pct', 
-- 3rd Response
	  qResponse3,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse3) as 'R_3_Count',
     	 FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestionNumber = qQuestionNumber 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse3
      and   y.aQuestionNumber = aQuestionNumber),0) as 'R_3_Pct', 
-- 4th Response  
	  qResponse4,
	 (Select count(*) from tbl_poll_a where aResponse = qResponse4) as 'R_4_Count',
     	  FORMAT((Select count(*)/(select count(*) 
                                   FROM tbl_poll_a x 
                                   where x.aQuestionNumber = qQuestionNumber 
                                   ) * 100
      from tbl_poll_a y 
      where y.aResponse = qResponse4
      and   y.aQuestionNumber = aQuestionNumber),0) as 'R_4_Pct'       
FROM tbl_poll_a 
Inner Join tbl_poll_q  on aQuestionNumber = qQuestionNumber
Group By aQuestionNumber
ORDER BY aQuestionNumber";

//run the query                  
$result_edit1_1 = $pdo->query($sql_selectEdit1_1);

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
<h2>Response Percent by Question</h2>	
<?php
        // write rows and add buttons
        while($row = $result_edit1_1->fetch())
        {
        echo(

          '<div id="myChart'.$row['aQuestionNumber'].'"></div>
      
  <script>
    var myData = ['.$row['R_1_Pct'].','.$row['R_2_Pct'].','.$row['R_3_Pct'].','.$row['R_4_Pct'].'];'.

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