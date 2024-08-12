<?php
require ("db.php");

$query = "SELECT headingTitle, textDesc, colorStyle, date FROM note";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
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
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            user-select: none;
        }

        .container-bg {
            background-color: #212228;
            background-image: linear-gradient(#292a30 0.1em, transparent 0.1em),
                linear-gradient(90deg, #292a30 0.1em, transparent 0.1em);
            background-size: 4em 4em;
            height: 100vh;
        }

        .card {
            max-width: 30%;
            max-height: 30%;
            border-radius: 5px;
            cursor: pointer;
            position: fixed;
            padding: 10px;
            
        }

        .cream {
            background-color: #fef1bf;
            border-top: 30px solid #b6ad89;
        }

        .green {
            background-color: #b0da9e;
            border-top: 30px solid #7b9970;
        }

        .blue {
            background-color: #95cbd6;
            border-top: 30px solid #6f98a0;
        }

        .pink {
            background-color: #e2bae2;
            border-top: 30px solid #c09fc0;
        }

        .nav{
            position: absolute;
            left: 1%;
            top: 50%;
            transform: translate(-0%, -50%);
            background-color: #36353C;
            border-radius: 50%;    
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav a{
            text-decoration: none;
            color: white;
            font-size: 20px;
        }

        hr{
            margin: 5px 0px;
            border:none;
            border-bottom: 1px solid #212228;
            opacity: 0.6;
        }

        .textDesc{
            margin-top: 10px;
        }

    </style>
</head>

<body>
    <div class="container-bg">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $headingTitle = htmlspecialchars($row['headingTitle']);
            $textDesc = htmlspecialchars($row['textDesc']);
            $colorStyle = htmlspecialchars($row['colorStyle']);
            $date = htmlspecialchars($row['date']);

            echo '
                <div class="card ' . $colorStyle . '">
                    <h3>' . $headingTitle . '</h3>
                    <p>' . "Date: " . $date . '</p>
                    <hr>
                    <p class="textDesc">' . $textDesc . '</p> 
                </div>
                ';

        }
        ?>
        
    </div>

    <div class="nav">
        <a href="createNote.php"> + </a>
        
    </div>

    <script>
        let newX = 0, newY = 0, startX = 0, startY = 0;
        let activeCard = null;

        const cards = document.querySelectorAll('.card');

        cards.forEach(card => {
            card.addEventListener('mousedown', mouseDown);
        });

        function mouseDown(e) {
            activeCard = e.currentTarget;  // Use e.currentTarget to get the .card element
            startX = e.clientX;
            startY = e.clientY;

            document.addEventListener('mousemove', mouseMove);
            document.addEventListener('mouseup', mouseUp);
        }

        function mouseMove(e) {
            if (!activeCard) return;

            newX = startX - e.clientX;
            newY = startY - e.clientY;

            startX = e.clientX;
            startY = e.clientY;

            activeCard.style.top = (activeCard.offsetTop - newY) + 'px';
            activeCard.style.left = (activeCard.offsetLeft - newX) + 'px';
        }

        function mouseUp(e) {
            document.removeEventListener('mousemove', mouseMove);
            activeCard = null;
        }
    </script>
</body>

</html>
