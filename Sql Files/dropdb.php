 <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $mysqli = new mysqli($dbhost, $dbuser, $dbpass);
         
         if($mysqli->connect_errno ) {
            printf("Connect failed: %s<br />", $mysqli->connect_error);
            exit();
         }
         printf('Connected successfully.<br />');

         if ($mysqli->query("Drop DATABASE dbfoods")) {
            printf("Database TUTORIALS dropped successfully.<br />");
         }
         if ($mysqli->errno) {
            printf("Could not drop database: %s<br />", $mysqli->error);
         }
         $mysqli->close();
      ?>