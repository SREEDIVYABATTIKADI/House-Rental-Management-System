<?php
// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $id=$_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $phone=$_POST['phone'];

  // Validate form data
  $errors = array();
  if (empty($name)) {
    $errors[] = 'Please enter your name';
  }
  if (empty($email)) {
    $errors[] = 'Please enter your email';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please enter a valid email address';
  }
  if (empty($password)) {
    $errors[] = 'Please enter a password';
  } elseif (strlen($password) < 6) {
    $errors[] = 'Password must be at least 6 characters long';
  }
  if (empty($phone)) {
    $errors[] = 'Please enter a phone number';
  } elseif (strlen($phone) < 10 ||strlen($phone)>10) {
    $errors[] = 'Phone number must be at least 10 characters long';
  }
  else{
    if(!is_numeric($phone))
    {
      $errors[] = 'Phone number contains numbers only';
    }
  }


  // If there are no errors, display success message
  if (empty($errors)) {
    //echo '<div class="success">Registration successful</div>';
    $servername = "localhost"; 
    $username = "root"; 
    $dbname = "sree"; 
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // Get user data from the form
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $occupation=$_POST['occupation'];
    $password = $_POST['password'];

    // Prepare SQL statement to insert data into the users table
    $sql = "INSERT INTO users (id,name,email,phoneno,occupation,password) VALUES ('$id','$name','$email','$phone','$occupation','$password')";

    if ($conn->query($sql) === TRUE) {
      echo "<script> alert('Registration is Successful')</script>";
    } 
    else 
    {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } 
  else {
    // If there are errors, display them
    echo '<div class="errors">';
    foreach ($errors as $error) {
      echo '<div>' . $error . '</div>';
    }
    echo '</div>';
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color:#FFFFFf;
    }

    .container {
      max-width: 500px;
      margin: auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }

    input[type="submit"] {
      display: block;
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: none;
      background-color: #00ffa0;
      color: #ffffff;
      font-weight: bold;
      cursor: pointer;
    }

    .errors {
      background-color: #ffae42;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
    }

    .success {
      background-color: #00ff00;
      color: #fff;
      padding: 10px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Registration Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div class="form-group">
        <label for="id">ID:</label>
        <input type="number" name="id" id="id"
          value="<?php echo isset($phone) ? htmlspecialchars($phno) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"
          value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
      </div>

      <div class="form-group">
        <label for="phone">Phone number:</label>
        <input type="number" name="phone" id="phone"
          value="<?php echo isset($phone) ? htmlspecialchars($phno) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="occupation">Occupation:</label>
        <input type="text" name="occupation" id="occupation"
          value="<?php echo isset($occupation) ? htmlspecialchars($occupation) : ''; ?>">
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

      </div>
      <input type="submit" value="REGISTER">
    </form>

  </div>
</body>

</html>