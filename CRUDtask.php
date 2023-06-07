<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
Class taskhandler
{
    private $servername ;  private $userName;
    private $password; private $DBName;
    private $conn;

    public function __construct()
    {
        $this->servername = "localhost:3307";
        $this->userName = "salma";
        $this->password = "salma7";
        $this->DBName = "todolist";
        $this->conn =mysqli_connect($this->servername,$this->userName,$this->password,$this->DBName);
        if(!$this->conn)
        {
           die("connection failed: ".mysqli_connect_error());  
        }
    }

    function view()
    {
        $query ="select id, task,completed from task where user='". $_SESSION["loggeduser"]."'";
        $result = mysqli_query($this->conn,$query);
        $num = mysqli_num_rows($result);
        for($i=1; $i<=$num; $i++)
         {
            $row = mysqli_fetch_row($result);
            if($row[2]==1)
            {
                $css="style= 'text-decoration: line-through';";
            }
            else
            {
                $css="";
            }
            echo "<li id=$row[0] ".$css."> <i class='fa-solid fa-check' onclick=complete($row[0])></i>  $row[1]  <i class='fa-solid fa-pencil' onclick=viewToUpdate($row[0])></i>  <i class='fa-solid fa-trash' onclick=Delete($row[0]) ></i></li>";
         }
    }  

    function add()
    {
       $query ="insert into task (task , user, completed) values('".$_POST["task"]."','". $_SESSION["loggeduser"]."',0)";
       if(mysqli_query($this->conn,$query))
       {
        echo "Task Added";
       }
    }

    function viewToUpdate()
    {
        $query ="select task from task where id='".$_REQUEST["id"]."'";
        $result = mysqli_query($this->conn,$query);
        $row = mysqli_fetch_row($result);
        echo $row[0];
    }

    function update()
    {
        $query ="update task set task ='".$_POST["task"]."' where id='".$_REQUEST["id"]."'";
        if(mysqli_query($this->conn,$query))
        {
            echo "Task updated";
        }
    }

    function delete()
    {
       $query ="delete from task where id=".$_REQUEST["id"];
       if(mysqli_query($this->conn,$query))
       {
            echo "Task Deleted";
       }
    }

    function complete ()
    {
        $query = "select completed from task where id='".$_REQUEST["id"]."'";
        $result = mysqli_query($this->conn,$query);
        $column = mysqli_fetch_row($result);
        if($column[0] == 1)
        {
            $query ="update task set completed =0 where id='".$_REQUEST["id"]."'";
            mysqli_query($this->conn,$query);
        }
        else if($column[0] == 0)
        {
            $query ="update task set completed =1 where id='".$_REQUEST["id"]."'";
            mysqli_query($this->conn,$query);
        }
    }   
}

function logout()
{
    session_unset();
    session_destroy(); 
    header("Location: index.php");
}

$taskH = new taskhandler();
if(isset($_REQUEST["event"]))
{
    switch($_REQUEST["event"])
    {
        case "logout":
            logout();
            break;

        case "add":
            $taskH-> add();
            break;

        case "update":
            $taskH-> update();  
            break;

        case "delete":
            $taskH->delete();
            break;

        case "view":
            $taskH->view();
            break;
    
        case "complete":
            $taskH->complete();
            break;  

        case "viewToUpdate":
            $taskH->viewToUpdate();
            break;       

        default:
            echo "default";    
    }
}
?>