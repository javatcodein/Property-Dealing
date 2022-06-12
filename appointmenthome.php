<?php
    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

        if(isset($_POST['date']) && 
           isset($_POST['loc']) && 
           isset($_POST['time']) &&
           isset($_POST['id']) &&
           isset($_POST['puid']) &&
           !empty($_POST['date']) && 
           !empty($_POST['loc']) && 
           !empty($_POST['time']) && 
           !empty($_POST['id']) && 
           !empty($_POST['puid']) ){
            
            $var1=$_POST['date']; //value =abc unique time in file php library now
            $var2=$_POST['loc'];
             $var3=$_POST['time'];
             $var4=$_POST['id'];
             $var5=$_POST['puid'];
             
            
             
          
           
            
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sqlquery="INSERT INTO appointment VALUES('$var1','$var2','$var3',$var4,$var5)";
                
                try{
                    $dbcon->exec($sqlquery);
                    
                    ?>
                        <script>
                            alert("Book done") ;
                            window.location.assign('book.php');
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            alert("Book not done") ;
                            window.location.assign('homepage.php');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        alert("Book not done yet") ;
                        window.location.assign('homepage.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    alert("Book error") ;
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