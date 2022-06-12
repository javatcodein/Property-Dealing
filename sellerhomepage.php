
<?php
    session_start();

    if(isset($_SESSION['useremail']) && !empty($_SESSION['useremail'])){
        ?>
            Welcome 
            <h3>Here you can upload your property info</h3>
       
           
                   
            <a href="uploadproduct.php">Upload Property Info</a>
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
    }
    else{
        ///session doesn't contain any valid user email
        ?>
            <script>
                window.location.assign('loginpage.php');
            </script>
        <?php
    }
?>