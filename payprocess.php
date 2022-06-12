<?php
    session_start();
    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

        if(isset($_POST['amount']) && 
           isset($_POST['id']) && 
           isset($_POST['pid']) &&
           isset($_POST['date']) &&
           isset($_POST['tran']) &&
           !empty($_POST['amount']) && 
           !empty($_POST['id']) && 
           !empty($_POST['pid']) &&
           !empty($_POST['date']) &&
           !empty($_POST['tran'])){
            
            $var1=$_POST['amount'];
            $var2=$_POST['id'];
            $var3=$_POST['pid'];
            $var4=$_POST['date'];
              $var5=$_POST['tran'];
            
            
          
            
            
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sqlquery="INSERT INTO payment VALUES('$var1',$var2,'$var3','$var4','$var5')";
                
                try{
                    $dbcon->exec($sqlquery);
                    
                    ?>
                        <script>
                            alert("payment done") ;
                            window.location.assign('./detail.php?id=<?= $var3 ?>');
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            window.location.assign('./detail.php?id=<?= $var3 ?>');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        window.location.assign('homepage.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    window.location.assign('homepage.php');
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