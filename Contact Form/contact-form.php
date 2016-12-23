<html>
  <head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Contact Form</title>
  </head>
  <body>
    <nav class="nav navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Contact.US</a>
        </div> <!-- navbar-header -->
      </div> <!-- container-fluid -->
    </nav> <!-- nav navbar-default -->
    <br>
    <div class="row">
      <div class="container">
        <div class="col-md-6 col-md-offset-3">
          <div class="alert text-center" role="alert" id="alerts">
          </div>
          <div class="well">
            <form type="POST" class="form-group">
              <h1 class="text-center">Get in touch!</h1>
              <!-- email -->
              <label for="email">Email Address</label>
              <input type="text" name="email" id="email" placeholder="email@example.com" class="form-control">
              <br>
              <!-- subject -->
              <label for="subject">Subject</label>
              <input type="text" name="subject" id="subject" placeholder="What would you like to tell us?" class="form-control">
              <br>
              <!-- what would you like to ask -->
              <label for="body">What would you like to ask?</label>
              <textarea name="body" class="form-control" id="bodyText" rows="5" placeholder="Please give us a detailed account of your reason for contacting us."></textarea>
              <br>
              <!-- submit btn -->
              <button id="submitBtn" class="btn btn-primary btn-lg btn-block center-block">Submit</button>
            </form>
            <!-- Start PHP -->
            <?php
            // Take data from form
            $emailTo = "contact@contact.us";
            $subject = $_POST["subject"];
            $body = $_POST["body"];
            $headers = "From: ".$_POST["email"];
            // validate?
            // send email using mailer function
            mail($emailTo, $subject, $body, $headers);
            ?>
            <!-- End PHP -->
          </div> <!-- well -->
        </div> <!-- col-md-6 col-md-offset-3 -->
      </div> <!-- container -->
    </div> <!-- row -->
    <script type="text/javascript" src="scripts.js"></script>
  </body>
</html>
