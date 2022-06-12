<style>
    table, th, td{
        border: 1px solid blue;
        border-collapse: collapse;
        text-align: center;
    }
    
    tr:hover{
        background-color: bisque;
    }
</style>


<?php
    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>
          
            
                        <table>
                            <thead>
                                 <tr>
                                    <th>ID</th>

                                    <th>Location</th>
                                    <th>Amount Of Space</th>
                                    <th>rsimage</th>
                                    <th>csimage</th>
                                    <th>pimage</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    try{
                                        ///php-mysql 3 way. We will use PDO - PHP data object
                                        $dbcon = new PDO("mysql:host=localhost:3306;dbname=project;","root","");
                                        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                        $sqlquery="SELECT * FROM property_upload";

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
                                                            <img width="80" height="80" alt="Property image" src="<?php echo $row['rsimage'] ?>">
                                                        </td>

                                                         <td>
                                                            <img width="80" height="80" alt="Property image" src="<?php echo $row['csimage'] ?>">
                                                        </td>
                                                        <td>
                                                            <img width="80" height="80" alt="Property image" src="<?php echo $row['pimage'] ?>">
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
                                        
                                    }
                                
                            </tbody>
                        </table>
                    
                }
            
            
            
            <br>
          
            
            <input type="button" value="Logout" id="logoutbtn">

            <script>
                var elm=document.getElementById('logoutbtn');
                elm.addEventListener('click', processlogout);
                
                function processlogout(){
                    window.location.assign('logoutprocess.php');
                }
                
            </script>

        <?php
    
    else{
        ///session doesn't contain any valid user email
        ?>
            <script>
                window.location.assign('loginpage.php');
            </script>
      
    }

?>

         
                
    

