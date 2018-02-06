<?php
include 'database.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Qpack</title>

        <!---FontAwesome---->
        <link type="text/css" href="CSS/font-awesome.min.css" rel="stylesheet">


        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!---Jquery ui--->
        <link href="CSS/jquery-ui.min.css" rel="stylesheet">
        <!---Main CSS-->
        <link href="CSS/style.css" type="text/css" rel="stylesheet">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

        <script>

            function ajax() {
                var obj_http = new XMLHttpRequest();
                obj_http.onreadystatechange = function () {

                    if (obj_http.readyState == 4 && obj_http.status == 200) {
                        document.getElementById("chat").innerHTML = obj_http.responseText;
                    }
                }
                obj_http.open("POST", 'process.php', true);
                obj_http.send();
            }
        </script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body onload="ajax();">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-offset-2">
                    <div class="panel-group margin_top_50">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="text-center">Chat with you friends </h2>
                            </div>
                            <div class="panel-body" id="chat">

                            </div>
                            <div class="panel-footer">
                         
                                <form action="" method="post" class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-md-5 col-md-offset-1">
                                            <input type="text" class="form-control" name="user_name" placeholder="Enter your Name">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" name="user_message" placeholder="Enter Message">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-1">
                                            <input type="submit" class="btn btn-primary btn-block" name="submit" id="student_name" value="send">
                                        </div>  
                                    </div>
                                </form>
       <?php
                                if (isset($_POST['submit'])) {
                                    $user_name = mysqli_real_escape_string($db_conn, $_POST['user_name']);
                                    $user_message = mysqli_real_escape_string($db_conn, $_POST['user_message']);



                                    if (!isset($user_name) || $user_name == '' || !isset($user_message) || $user_message == '') {
                                        echo $mgs = "<div class='alert alert-danger'>Error!! Field must no be empty</div>";
                                    } else {

                                        $query = "INSERT INTO tbl_user(user_name,user_message) VALUES('$user_name','$user_message')";
                                        $query_run = mysqli_query($db_conn, $query);
                                        if ($query_run){
                                            echo "<embed loop='false' src='sound/plucky.mp3' hidden='false' autoplay='true'>";
                                        } else {
                                            die("Query Problem" . mysqli_error($db_conn));
                                        }
                                    }
                                }
                                ?>
                                



                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Include all compiled plugins (below), or include individual files as needed -->

        <!-----Jquery UI --->
        <script src="js/jquery-ui.min.js"></script>

        <script src="js/bootstrap.min.js"></script>

        <!--Main js--->
        <script src="js/main.js"></script>
    </body>

</html>