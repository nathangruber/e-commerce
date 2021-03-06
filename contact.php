<?php require_once('includes/session.php');?>
<!DOCTYPE html>

<html lang="en">
<?php require_once 'includes/header.php';?>

<head>
    <title>Contact Us</title>
</head>
<body>
    <?php
        if ($admin) {
            require_once'includes/adminNavbar.php';
        } else {
            require_once'includes/navbar.php';
        }
        ?>
    <div id="fullscreen_bg5" class="fullscreen_bg5"/>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="contactus">
                    <br>
                    <br>
                    <br>
                    <br>
                  <h1>Contact BBS</h1>
                    <br>
                </div>
                     <form class="form-horizontal" name="contactform" method="post" action="emailform.php">
                      <div class="form-group">
                        <label for="first_name" class="col-sm-12 control-label"></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="first_name" placeholder="First Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="col-sm-12 control-label"></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-12 control-label"></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="last_name" class="col-sm-12 control-label"></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="telephone" placeholder="Phone Number">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="comments" class="col-sm-12 control-label"></label>
                        <div class="col-sm-10">
                       <textarea class="form-control" rows="3" name="comments" placeholder="Comments"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-12">
                          <button type="submit" class="btn btn-stripe-1">Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
<?php require_once 'includes/footer.php';?>
</body>
</html>
