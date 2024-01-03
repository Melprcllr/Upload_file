<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $uploadDir = 'uploads/';
  $maxFileSize = 1000000; // 1 MB
  $errors = array();

  if (empty($_FILES['avatar']['name'])) {
    $errors[] = 'Please select a file to upload.';
  } else {
    $imageInfo = getimagesize($_FILES['avatar']['tmp_name']);
    $imageMime = $imageInfo['mime'];
    $authorizedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

    if (!in_array($imageMime, $authorizedMimeTypes)) {
      $errors[] = 'Please select an image of type Jpg, Jpeg, Png, Gif, or Webp.';
    }

    if ($_FILES['avatar']['size'] > $maxFileSize) {
      $errors[] = "Your file must be less than 1 MB.";
    }
  }

  if (empty($errors)) {
    // Generating a unique file name
    $uniqueFileName = uniqid() . '_' . $_FILES['avatar']['name'];

    // Full path to the file on the server
    $uploadFile = $uploadDir . $uniqueFileName;

    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile)) {
      echo "File uploaded successfully!<br>";
      // Display the profile photo
      echo '<img src="' . $uploadFile . '" alt="Profile Photo" /><br>';

      // Display the entered information
      echo "First Name: " . $_POST['firstName'] . "<br>";
      echo "Last Name: " . $_POST['lastName'] . "<br>";
      echo "Age: " . $_POST['age'] . "<br>";

      // Add a Delete button
      echo '<form method="POST">';
      echo '<input type="hidden" name="deleteFile" value="' . $uploadFile . '" />';
      echo '<button name="delete">Delete</button>';
      echo '</form>';
    } else {
      echo "An error occurred while uploading the file.";
    }
  } else {
    foreach ($errors as $error) {
      echo $error . '<br>';
    }
  }

  if (isset($_POST['delete'])) {
    $fileToDelete = $_POST['deleteFile'];
    if (file_exists($fileToDelete)) {
      if (unlink($fileToDelete)) {
        echo "File deleted successfully!<br>";
      } else {
        echo "An error occurred while deleting the file.<br>";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Laisse pas trainer ton file</title>
</head>

<body>
  <form method="POST" enctype="multipart/form-data">
    <label for="imageUpload">Upload a profile image</label>
    <input type="file" name="avatar" id="imageUpload" />

    <label for="firstName">First Name:</label>
    <input type="text" name="firstName" id="firstName" />

    <label for="lastName">Last Name:</label>
    <input type="text" name="lastName" id="lastName" />

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" />

    <button name="send">Send</button>
  </form>
</body>

</html>