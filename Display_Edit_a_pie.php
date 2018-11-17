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
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];
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

    var myConfig'.$row['aQuestionNumber'].' = {
        type: "pie",
        plot: {
          "borderColor": "#7A88A6",
          "borderWidth": 5,

          "valueBox": {
            "placement": "out",
            "text": "%t\n%npv%",
            "fontFamily": "Open Sans"
          },

          "tooltip":{
            "fontSize": "18",
            "fontFamily": "Open Sans",
            "padding": "5 10",
            "text": "%npv%"
          },

          "animation":{
            "effect": 2, 
            "method": 5,
            "speed": 900,
            "sequence": 1,
            "delay": 3000
         }

        },


        "title": {
          "fontColor": "#8e99a9",
          "text": "'.$row['qQuestion'].'",'.'
          "align": "center",
          "offsetX": 10,
          "fontFamily": "Open Sans",
          "fontSize": 25
        },

        "plotarea": {
          "margin": "20 0 0 0"  
        },

        "series": [
         {
          "values": ['.$row['R_1_Pct'].'],
          "text": "'.$row['qResponse1'].'",
          "backgroundColor": "#50ADF5"
         },

         {
          "values": ['.$row['R_2_Pct'].'],
          "text": "'.$row['qResponse2'].'",
          "backgroundColor": "#FF7965"
         },

         {
          values: ['.$row['R_3_Pct'].'],
          text: "'.$row['qResponse3'].'",
           backgroundColor: "#FFCB45"
         },

         {
          values: ['.$row['R_4_Pct'].'],
          text: "'.$row['qResponse4'].'",
           backgroundColor: "#6877e5"
         },

       ]
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