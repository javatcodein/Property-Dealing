<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array

    if(isset($_POST['uname']) &&
       isset($_POST['nid']) &&
       isset($_POST['mnum']) &&
       isset($_POST['address'])&&
       
       isset($_POST['uemail']) &&
       isset($_POST['upass'])&&
       ( !empty($_POST['uname']) &&
       !empty($_POST['nid']) &&
        !empty($_POST['mnum']) &&
       !empty($_POST['address']) &&
         !empty($_POST['uemail']) && 
        !empty($_POST['upass']) )){
       
        /// to establish a connection with database server
        
        $var1=$_POST['uname'];
        $var2=$_POST['nid'];
        $var3=$_POST['mnum'];
        $var4=$_POST['address'];
        $var5=$_POST['uemail'];
        $var6=md5($_POST['upass']); /// using encoded password
        
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO buyer VALUES(NULL,'$var1','$var2','$var3','$var4','$var5','$var6')";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
                
                /// if successful, forward the user to the login page
                ?>
                    <script>window.location.assign('loginpage.php')</script>
                <?php
            }
            catch(PDOException $ex){
                /// if not successful, return back to sign up page
                ?>
                    <script>window.location.assign('signuppage.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>window.location.assign('signuppage.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>window.location.assign('signuppage.php')</script>
    
        <?php
        
    }
?>