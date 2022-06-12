<?php
    session_start();
    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

        if(isset($_POST['loc']) && 
           isset($_POST['aspace']) && 
           isset($_POST['sellerid']) &&
           !empty($_POST['loc']) && 
           !empty($_POST['aspace']) && 
           !empty($_POST['sellerid']) ){
            
            $var1=$_POST['loc']; //value =abc unique time in file php library now
            $var2=$_POST['aspace'];
             
            
             if(isset($_FILES['rsimage'])){
                $var3=$_FILES['rsimage'];
                ///print_r($var4);
                  $filename1= date("dmY_hms").basename($_FILES['rsimage']['name']);
                 $target_path = "staticfiles/";
$target_path = $target_path . $filename1;
             move_uploaded_file($var3['tmp_name'],$target_path);
            }
            
            if(isset($_FILES['csimage'])){
                $var4=$_FILES['csimage'];
                ///print_r($var4);
               $filename2= date("dmY_hms").basename($_FILES['csimage']['name']);
                 $target_path = "staticfiles/";
$target_path = $target_path . $filename2;
             move_uploaded_file($var4['tmp_name'],$target_path);
            }
            if(isset($_FILES['pimage'])){
                $var5=$_FILES['pimage'];
                ///print_r($var4);
                $filename3= date("dmY_hms").basename($_FILES['pimage']['name']);
                 $target_path = "staticfiles/";
$target_path = $target_path . $filename3;
             move_uploaded_file($var5['tmp_name'],$target_path);
            }
          $var6=$_POST['sellerid'];
           
            
            try{
                ///php-mysql 3 way. We will use PDO - PHP data object
                $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
                $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                $sqlquery="INSERT INTO property_upload VALUES(NULL,'$var1',$var2,'$filename1','$filename2','$filename3',$var6)";
                
                try{
                    $dbcon->exec($sqlquery);
                    
                    ?>
                        <script>
                            alert("upload done") ;
                            window.location.assign('uploaded.php');
                        </script>
                    <?php
                }
                catch(PDOException $ex){
                    ?>
                        <script>
                            alert("upload not done") ;
                            window.location.assign('homepage.php');
                        </script>
                    <?php
                }
                
            }
            catch(PDOException $ex){
                ?>
                    <script>
                        alert("upload not done yet") ;
                        window.location.assign('homepage.php');
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>
                    alert("upload error") ;
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