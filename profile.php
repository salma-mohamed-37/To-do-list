<?php
session_start();
require("CRUDtask.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/master.css"/>
        <script src="https://kit.fontawesome.com/bdc1a26774.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php include("header.php") ?>
        <div class=profile>
            <?php
            if(isset($_GET["firstname"]) &&isset($_GET["lastname"]))
            {
                echo "<p>Hello ". $_GET["firstname"]." ". $_GET["lastname"].' <a href="CRUDtask.php?event=logout"><i class="fa-solid fa-right-from-bracket" ></i></a></p>';
            }
            ?>    
            <textarea name="task" id=task placeholder="Enter the task here" rows=1 style="resize: none;" ></textarea>
            <i class="fa-solid fa-plus" onclick="insert()"></i> 
            <br/>
            <span id=message style="color: #0e81ab">  </span>
            <br/>
            <ul>
                <?php $task = new taskHandler(); $task->view();?>
            </ul>
            <div id=updatePart style="display:none">
                <textarea id=update rows=1 style="resize: none;"></textarea>
                <input type=button value=update onclick="update()" />
                <input type=text id=htid hidden />
            </div>
        </div>
        <?php include("footer.php") ?>
        <script src="JS/ajax.js"></script>
    </body>
</html>





