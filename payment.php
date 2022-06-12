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
                <form action="payprocess.php" method="POST">
                    Amount: <input type="text" name="amount"><br><br>
                    Your ID: <input type="text" name="id"><br><br>
                    Property ID: <input type="text" name="pid"><br><br>
                    Date :<input type="date" name="date"><br><br>
                    Transaction ID :<input type="text" name="tran"><br><br>
                   

                    <input type="submit" value="Pay Now">
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