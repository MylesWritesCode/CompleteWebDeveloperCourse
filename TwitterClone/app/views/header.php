<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- jQuery from Google Hosted Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>Twitter Clone</title>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">TwitterClone</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="?page=timeline">Your Timeline</a></li>
            <li><a href="?page=tweets">Your Tweets</a></li>
            <li><a href="?page=profiles">Profiles</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
            <li>
              <?php if (array_key_exists("id", $_SESSION)) { ?>
                <form method="GET">
                  <input type="hidden" value="logout" name="function">
                  <button class="btn btn-primary btn-lg" formmethod="GET" formaction="?function=logout">Log Out</button>
                </form>
              <?php } else { ?>
                <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#logInModal">Log In</button>
              <?php } ?>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      <!-- Modal -->
      <div class="modal fade" id="logInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="logInLabel">Log In</h4>
            </div>
            <div class="modal-body">
              <form class="form-group" method="POST">
                <input type="email" class="form-control" placeholder="Email Address" name="email" id="email">
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <input type="hidden" value="1" id="logInToggleHidden" name="logInToggleHidden">
              </form>
              <div class="alert text-center" id="alerts" name="alerts">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" id="togLogIn">Switch to Sign Up Form</button>
              <button type="button" class="btn btn-success" id="logInBtn">Log In</button>
            </div>
          </div>
        </div>
      </div>
    </nav>
