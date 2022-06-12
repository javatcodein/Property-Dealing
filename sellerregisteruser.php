<?php
    /// received data collect

    // to receive the post data we need to call $_POST variable
    // $_POST represents an associative array

    if(isset($_POST['uname']) &&
       isset($_POST['unid']) &&
       isset($_POST['unum']) &&
       isset($_POST['uadd'])&&
       
       isset($_POST['uemail']) &&
       isset($_POST['upass'])&&
       
       ( !empty($_POST['uname']) &&
       !empty($_POST['unid']) &&
        !empty($_POST['unum']) &&
       !empty($_POST['uadd']) &&
         !empty($_POST['uemail']) && 
        !empty($_POST['upass']) )){
       
        /// to establish a connection with database server
        
        $var1=$_POST['uname'];
        $var2=$_POST['unid'];
        $var3=$_POST['unum'];
        $var4=$_POST['uadd'];
        $var5=$_POST['uemail'];
        $var6=md5($_POST['upass']);
         /// using encoded password
        
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query="INSERT INTO seller VALUES(NULL,'$var1','$var2','$var3','$var4','$var5','$var6')";  /// insecure
            
            try{
                /// to insert data to corresponding database
                $dbcon->exec($query);
                
                /// if successful, forward the user to the login page
                ?>
                   
                    <script>
                          alert("signup successfull") ;
                        window.location.assign('sellerloginpage.php')</script>
                <?php
            }
            catch(PDOException $ex){
                /// if not successful, return back to sign up page
                ?>
                    <script>
                          alert("sign up not successfull") ;
                        window.location.assign('sellersignuppage.php')</script>
                <?php
            }
            
        }
        catch(PDOException $ex){
            ?>
                <script>
                     alert("sign up not successfull yet") ;
                    window.location.assign('sellersignuppage.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>
                 alert("sign up not successfull yrt bro") ;
                window.location.assign('sellersignuppage.php')</script>
    
        <?php
        
    }
?>