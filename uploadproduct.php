<?php
    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
     $var1=  $_SESSION['useremail']; ?>

        <!DOCTYPE html> <!-- html comment: html version 5 -->
        <html>
            <head>
                <!--meta information-->
                <meta charset="utf-8">
                <title>Upload Your Product</title>
            </head>

            <body>
              
                <form action="uploadprocess.php" method="POST" enctype="multipart/form-data">
                   
                    Location: <input type="text" name="loc"><br><br>
                    Ammount OF space :<input type="text" name="aspace"><br><br>
                   RS Image: <input type="file" name="rsimage"><br><br>
                    CS Image: <input type="file" name="csimage"><br><br>
                    property Image: <input type="file" name="pimage"><br><br>
                    Your ID :<input type="text" value="<?php echo $_SESSION['id']?>" name="sellerid" readonly><br><br>
                   

                    <input type="submit" value="Upload">
                </form>
                
                
                <a href="homepage.php">Home Page</a>
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