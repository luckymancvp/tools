<?php
set_time_limit(0);
if(isset($_POST["submit"])) {
    $file = $_FILES["fileToUpload"]["tmp_name"];
    $target_dir = "./";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>


<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
    Select zip art to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit">
</form>

</body>
</html>