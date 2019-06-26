<?php
    require_once 'admin/dbcon.php';
    
    if(isset($_POST['login'])){
        $idno=trim($conn->real_escape_string($_POST['idno']));
        $password=trim($conn->real_escape_string($_POST['password']));

    
        $result = $conn->query("SELECT * FROM voters WHERE id_number = '$idno' && password = '".md5($password)."' && `account` = 'active' && `status` = 'Unvoted'") or die(mysqli_errno());

        $row = $result->fetch_array();
        
        $voted = $conn->query("SELECT * FROM `voters` WHERE id_number = '$idno' && password = '".md5($password)."' && `status` = 'Voted'")->num_rows;
        $numberOfRows = $result->num_rows;              
        
        
        if ($numberOfRows > 0){
            session_start();
            $_SESSION['voters_id'] = $row['voters_id'];
            header('location:vote.php');
        }
        

        if($voted == 1){
            ?>
            <script type="text/javascript">
            alert('Sorry You Already Voted')
            </script>
            <?php
        }else{
            ?>
            <script type="text/javascript">
            alert('Your account is not Actived')
            </script>
            <?php
        }
    
    }
?>

<?php include ('head.php');?>
<body>
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Student Login
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                        
                        <div class="form-group">
                            <label for = "username" >Student ID:</label>
                                <input class="form-control" placeholder="Enter Username" name="idno" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <label for = "username" >Password</label>
                                <input class="form-control" placeholder="Enter Password" name="password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-lg">
                        </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>
    </div>

    <!-- <div class="container">
        <div class="row">
           
                <div class="menue">
                    
            </div>
            &nbsp;&nbsp;&nbsp;
            <div class="col-md-4 col-md-offset-4">
            
                <div class="login-panel">
                
                    
                    <div class="form-panel"><center>
                        <i>Login As:</i>
                        <select onchange = "page(this.value)">
                            <option value = "admin/index.php">System Admin</option>
                            <option value = "admin2/index.php">System User</option>
                            <option selected disables>Student Voter</option> 
                        </select>
                        <p/>
                    </center>
                        <form role="form" method = "post" enctype = "multipart/form-data" class="index-form">
                            <div class="form-heading">
                            <center>Student Login</center>
                            </div>
                            
                                
                                <div class="form-field">
                                    <label for = "username">Student ID: </label><br/>
                                        <input class="form-control" placeholder="Enter Student ID" name="idno" type="text" required = "required" autofocus>
                                </div>
                                
                                <div class="form-field">
                                    <label for = "username" >Password: </label>
                                        <input class="form-control" placeholder="Enter Password" name="password" type="password" required = "required">
                                </div>
                             <br/>
                                <center><button class="btn btn-lg btn-success btn-block " name = "login" style= " margin-bottom:0px;" width="50">Login</button>
                                &nbsp; 
                            <a  href="register/index.php"><button type="button" class="btn btn-lg btn-success btn-block" data-dismiss="modal" style= " margin-bottom:0px;">Register</button></a>
            
                                &nbsp;

                                <?php // include ('login_query.php');
                                
                                ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div> -->

  


    
</body>
<?php include ('script.php');?>
<script type="text/javascript">
    function page (src) {
        window.location = src;
    }
</script>
</html>
