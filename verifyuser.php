<?php
    

    if(isset($_POST['uemail']) && isset($_POST['upass']) 
       && !empty($_POST['uemail']) && !empty($_POST['upass'])){
        /// data receive
        /// database check email, password
        /// yes, forward homepage
        /// no, forward loginpage
        
        $var1=$_POST['uemail'];
        $var2=md5($_POST['upass']);
        
        try{
            ///php-mysql 3 way. We will use PDO - PHP data object
            $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sqlquery="SELECT id, email FROM buyer WHERE email='$var1' and password='$var2'";
            
            try{
                $returnval=$dbcon->query($sqlquery);
              $table=$returnval->fetchAll();
                if($returnval->rowCount()==1){
                    ///one valid user found
                    session_start();
                    
                    $_SESSION['useremail']=$var1;
                    $_SESSION['id']=$table[0][0];               
                  
                    ?>
                        <script>
                            alert("login successfull") ;
                            window.location.assign('homepage.php');
                        </script>
                    <?php
                }
                else{
                    ///invalid user
                    ?>
                        <script>
                            alert("wrong username or password") ;
                            window.location.assign('loginpage.php');
                        </script>
                    <?php
                }
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('loginpage.php');
                    </script>
                <?php
            }
        }
        catch(PDOException $ex){
            ?>
                <script>
                    window.location.assign('loginpage.php');
                </script>
            <?php
        }
        
    }
    else{
        ?>
            <script>
                window.location.assign('loginpage.php');
            </script>
        <?php
    }
?>