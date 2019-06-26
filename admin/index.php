<?php
ob_start();
session_start();
    require_once 'dbcon.php';
    
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $login_id = $_POST['login_id'];
    
        
        $query = $conn->query("SELECT * FROM user WHERE username =  '$username' AND password = '$password' AND user_id = '$login_id' ") or die($conn->errno);
        $rows = $query->num_rows;
        $fetch = $query->fetch_array();
                                                                        
            if ($rows == 0) 
                    {
                        
                        header('Location:index.php');
                    } 
                else if ($rows > 0)
                    {
                        
                        $_SESSION['id'] = $fetch['user_id'];
                        header('Location:candidate.php');
            }else{
                header('Location:index.php');
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
                <div class="panel panel-default no-radius">
                    <div class="panel-heading text-center">
                        Admin Login
                    </div>
                    <div class="panel-body">
                        <form action="" method="post">
                        <div class="form-group">
                            <label>Login ID</label>
                            <input class="form-control no-radius" placeholder="Enter Login ID" name="login_id" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <label for = "username" >Username</label>
                                <input class="form-control no-radius" placeholder="Enter Username" name="username" type="text" autofocus>
                        </div>
                        <div class="form-group">
                            <label for = "username" >Password</label>
                                <input class="form-control no-radius" placeholder="Enter Password" name="password" type="password" value="">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" value="Login" class="btn btn-primary btn-block btn-lg no-radius">
                        </div>
                        </form>
                    </div>
                </div>
            </div>          
        </div>
    </div>
    


</body>
<style type="text/css">
    .no-radius{
        border-radius: 0px;
    }
</style>
<?php include ('script.php');?>
<script type="text/javascript">
      function page (src) {
        window.location = src;
      }
</script>
</html>
