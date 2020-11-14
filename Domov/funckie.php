<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "richardondejka";
    $dbpass = "2798511";
    $db = "richardondrejka";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Napojenie zlyhalo: %s\n". $conn -> error);
    return $conn;
}

function CloseCon($conn)
{
 $conn -> close();
}

function LoginName()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM osoba WHERE osoba_id=1";
    if ($result = $conn->query($sql))
    {
        while($row = $result->fetch_assoc())
        {
            echo $row["osoba_meno"]." ".$row["osoba_priezvysko"];
        }
    }


    CloseCon($conn);      
}

function GenerateRozvrh ()
{
    $conn = OpenCon();



    CloseCon($conn);
}
?>