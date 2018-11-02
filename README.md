# Questionaire
This if for a class group project. This app will dynamically create questions and collect answers.  
You have the ability to edit and delete questions.  Answers are displayed in a table to make analysis easier.

Files:

  Global:
    wp_poll1 - this will allow you to create the sql database and tables and will populate the tables with some dummy data.

    dbconnect.php - this connects you to the database.  I have set the userid to "root", so you should have the needed authority
    to the database. 

    Menu.php - this is the navigation and it is included in each page.
    
    styles.css - a simple stylesheet
    
  Question Files:
    default.php - this is the page that is displayed on entry.  You can enter a new question, or navigate to other tabs.

    Inputdata_DisplayData.php - if you entered a new question on default.php, you will be passed to this page.  This page will sanitize the data and if all is good, it will insert it into tbl_poll_q and give you a confirmation.  If the data is not good, it will return you to default.php with the error.

    Display_Edit.php - this page will display all of the questions you have created (from tbl_poll_q).  It will allow you to edit and delete questions.  If you edit, it will take you to Edit_Data.php.

    Edit_Data.php - Updates tbl_poll_q with the updated data and returns you to Display_Edit.php.

  Answer Files:
    default_a.php - this page is displayed when you click "Answer Questions".  This page is built by reading tbl_poll_q to create a table with the questions and response choices.  You will be required to answer each question.  When you click "enter", you will be taken to Inputdata_DisplayData_a.php.

    Inputdata_DisplayData_a.php - if you answered questions on default_a.php, you will be passed to this page.  This page will insert a row for each question into tbl_poll_a and give you a confirmation. **NOTE - I still need to add code to sanitize the data and check for errors. 

    Display_Edit_a.php - this page will display all of the questions with their answers (from tbl_poll_a inner joined to tbl_poll_q).  I am building three sql selects and presenting two in tables.  This could be tweaked to display the data however you need to see it.

  
