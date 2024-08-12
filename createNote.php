<?php
require("db.php");

if(isset($_POST["submit"])){
    $headingTitle = $_POST['headingTitle'];
    $textDesc = $_POST['textDesc'];
    $colorStyle = $_POST['colorStyle'];

    if($colorStyle){
        $sql = "INSERT INTO note (headingTitle, textDesc, colorStyle) VALUES ('$headingTitle', '$textDesc', '$colorStyle')";
        if(mysqli_query($conn, $sql)){
            header("Location: viewNote.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>To Do App</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-bg user-panel">
        <form method="POST">
            <h1>Create A Note</h1>
            <input name="headingTitle" type="text" placeholder="Type your heading...">
            <textarea name="textDesc" id="" placeholder="Type your text..."></textarea>
            <p>Choose Style</p>
            <div class="radio-container">
                <input type="radio" id="cream-radBtn" name="colorStyle" value="cream">
                <label for="cream-radBtn" class="cream-label"></label>
                <input type="radio" id="green-radBtn" name="colorStyle" value="green">
                <label for="green-radBtn" class="green-label"></label>
                <input type="radio" id="blue-radBtn" name="colorStyle" value="blue">
                <label for="blue-radBtn" class="blue-label"></label>
                <input type="radio" id="pink-radBtn" name="colorStyle" value="pink">
                <label for="pink-radBtn" class="pink-label"></label>
            </div>
            <button name="submit">Create Note</button>
        </form>
    </div>
    <script src="" async defer></script>
</body>
</html>
