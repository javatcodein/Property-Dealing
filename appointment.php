<?php
    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>

        <!DOCTYPE html> <!-- html comment: html version 5 -->
        <html>
            <head>
                <!--meta information-->
                <meta charset="utf-8">
                <title>Sign Up Page</title>
            </head>

            <body>
                <form action="appointmenthome.php" method="POST">
                    
                    Date : <input type="date" name="date"><br><br>
                    Location : <input type="text" name="loc"><br><br>
                    Time : <input type="time" name="time"><br><br>
                    Your ID :<input type="text" value="<?php echo $_SESSION['id']?>" name="id" readonly><br><br>
                    
                    
                    Property Upload ID : <input type="text" name="puid"><br><br>
                    
                   

                    <input type="submit" value="Book">
                </form>
                
                
                <a href="sellerhome.php">Home Page</a>
            </body>
        </html>
    <?php
    }
    else{
        ?>
            <script>
                window.location.assign('loginpage.php');
            </script>
        <?php
    }