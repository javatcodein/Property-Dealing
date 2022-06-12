<?php

    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){

        if(isset($_GET['param1']) && !empty($_GET['param1'])){
        ?> 
            <table>
                
                <thead>
                    <tr>
                        <th>ID</th>
                    
                        <th>Location</th>
                        <th>Amount Of Space</th>
      
                        <th>pimage</th>
                        
                       
                    </tr>
                </thead>
               
                
                <tbody>
                    <?php
                        try{
                            ///php-mysql 3 way. We will use PDO - PHP data object
                            $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
                            $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                            
                            $searchval=$_GET['param1'];
                            $sqlquery="";
                            if(!empty($searchval)){
                                $sqlquery="SELECT * FROM property_upload where Location LIKE '%$searchval%'";
                            }
                            
                            
                            try{
                                $returnval=$dbcon->query($sqlquery); ///PDOStatement
                                
                                $productstable=$returnval->fetchAll();
                                
                                foreach($productstable as $row){
                                    ?>
                                        <tr>
                                            <td><?php echo $row[0] ?></td>   
                                            <td><?php echo $row[1] ?></td>   
                                            <td><?php echo $row[2] ?></td>   
                                            
                                            <td>
                                                <img width="80" height="80" alt="Property image" src="staticfiles/<?php echo $row['pimage'] ?>">
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            catch(PDOException $ex){
                                ?>
                                    <tr>
                                        <td colspan="4">Data read error ... ...</td>    
                                    </tr>
                                <?php
                            }
                            
                        }
                        catch(PDOException $ex){
                            ?>
                                <tr>
                                    <td colspan="4">Data read error ... ...</td>    
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>


            <a href="homepage.php">Home Page</a>
        <?php  
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

   <br>
            <br>
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3677.4709281374294!2d89.55071591496413!3d22.82206018505495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ff90089b8b1e03%3A0xbba517c23ae5f684!2sShib%20Bari%20More%20Cir%2C%20Khulna!5e0!3m2!1sen!2sbd!4v1610607967212!5m2!1sen!2sbd" width="1250" height="530" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>