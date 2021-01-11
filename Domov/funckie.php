<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "usbw";
    $db = "testbd";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Napojenie zlyhalo: %s\n". $conn -> error);
    return $conn;

    /* ENDORA
    host: localhost,
    nick a db: rindo71606057303,
    heslo: CwjLuzQF*/
}

function CloseCon($conn)
{
 $conn -> close();
}

function LoginName()
{
    $conn = OpenCon();

    $sql = "SELECT * FROM osoba WHERE osoba_id='1'";
        if ($result = $conn->query($sql))
        {
            while($row = $result->fetch_assoc())
            {
                echo $row["osoba_meno"]." ".$row["osoba_priezvysko"];
            }
        }
    $result->free();

    CloseCon($conn);      
}

//generácia prvého dashboardu

//generácia programu
function GenerateProgram ()
{
    $conn = OpenCon();
    $sql = "SELECT program_popis FROM program WHERE program_id='1'";
    if ($result = $conn->query($sql))
        {
            while($row = $result->fetch_assoc())
            {
                echo "<h1>" . $row["program_popis"] . "</h1>";
            }
        }
    $result->free();
    CloseCon($conn);
}

//generácia terajšej hodiny
function GenerateClassNow ()
{
    date_default_timezone_set("Europe/Bratislava"); 

    $thistime = strtotime(date('H:i:s'));
    $thisday = date("l");
    $ref_lastPredmet = "";
    $ref_lastMiestnost = "";
    $lastPredmet = &$ref_lastPredmet;
    $lastMiestnost = &$ref_lastMiestnost;

    //zaciatok funckie
    $conn = OpenCon();

    $stmt1 = $conn->prepare("SELECT * FROM prebieha ORDER BY prebieha_datum_cas ASC");
    $stmt2 = $conn->prepare("SELECT * FROM predmet");
    $stmt3 = $conn->prepare("SELECT * FROM miestnost");

    $stmt1->execute();
    $result = $stmt1->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($thisday == date("l",strtotime($row["prebieha_datum_cas"])))
        {
            $newtime = strtotime(date('H:i:s',strtotime($row["prebieha_datum_cas"])));
            if ($thistime > $newtime)
            {
                  $lastPredmet = $row["predmet_predmet_id"];  
                  $lastMiestnost = $row["miestnost_miestnost_id"];
            }
        }      
    }
    /*echo "<p>" . $lastPredmet . "</p>";
    echo "<p>" . $lastMiestnost . "</p>";*/

    $stmt2->execute();
    $result = $stmt2->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row["predmet_id"] == $lastPredmet)
            {
                echo "<p>" . $row["predmet_popis"] . "</p>";
            }
    }
    $stmt3->execute();
    $result = $stmt3->get_result();
    while ($row = $result->fetch_assoc()) {
        if ($row["miestnost_id"] == $lastMiestnost)
            {
                echo "<p>" . $row["miestnost_nazov"] . "</p>";
            }
    }

    CloseCon($conn);
}

//generácia nasledujúcej hodiny
function GenerateClassLater()
{
    date_default_timezone_set("Europe/Bratislava"); 

    $thistime = strtotime(date('H:i:s'));
    $thisday = date("l");
    $ref_lastPredmet = "";
    $ref_lastMiestnost = "";
    $ref_ClassTime = "";
    $ClassTime = &$ref_ClassTime;
    $lastPredmet = &$ref_lastPredmet;
    $lastMiestnost = &$ref_lastMiestnost;

    $conn = OpenCon();

    $stmt1 = $conn->prepare("SELECT * FROM prebieha ORDER BY prebieha_datum_cas ASC");
    $stmt2 = $conn->prepare("SELECT * FROM predmet");
    $stmt3 = $conn->prepare("SELECT * FROM miestnost");
    
    //spracovani údajov
    $stmt1->execute();
    $result = $stmt1->get_result();

    while ($row = $result->fetch_assoc()) {
        if ($thisday == date("l",strtotime($row["prebieha_datum_cas"])))
        {
            $newtime = strtotime(date('H:i:s',strtotime($row["prebieha_datum_cas"]))); 
            if ($thistime < $newtime)
                {
                    $lastPredmet = $row["predmet_predmet_id"];  
                    $ClassTime = date('H:i',strtotime($row["prebieha_datum_cas"]));
                    $lastMiestnost = $row["miestnost_miestnost_id"];
                    break;
                } 
        }
    }

    //výpis názvu predmetu a času predmetu
    $stmt2->execute();
    $result = $stmt2->get_result();
         while ($row = $result->fetch_assoc()) {
              if ($row["predmet_id"] == $lastPredmet)
                 {
                     echo "<p>" . $row["predmet_popis"] . "</p><p>" . $ClassTime . "</p>";
                 }
        }

    //výpis miesnotsti, kde sa koná predmet
    $stmt3->execute();
    $result = $stmt3->get_result();
        while ($row = $result->fetch_assoc()) {
            if ($row["miestnost_id"] == $lastMiestnost)
                   {
                       echo "<p>" . $row["miestnost_nazov"] . "</p>";
                  }
        }
    CloseCon($conn);
}

function GenerateRozvrhHome()
{
    $conn = OpenCon();

    $i = 0;
    $rows = array();
    $rowsnumber = 0;

    date_default_timezone_set("Europe/Bratislava"); 
    $thisday = date("l");
    
    $stmt1 = $conn->prepare("SELECT * FROM prebieha ORDER BY prebieha_datum_cas asc");

    $stmt1->execute();
    $result = $stmt1->get_result();
             while ($row = $result->fetch_assoc())
             {
                if ($thisday == date("l", strtotime($row["prebieha_datum_cas"])))
                {
                    array_push($rows,$row);
                    $rowsnumber++;
                }
             }
    for ($i; $i < $rowsnumber; $i++)
    {
        $ClassId = $rows[$i]["predmet_predmet_id"];
        $RoomId = $rows[$i]["miestnost_miestnost_id"];

        $stmt2 = $conn->prepare("SELECT * FROM predmet WHERE predmet_id = $ClassId");
        $stmt3 = $conn->prepare("SELECT * FROM miestnost WHERE miestnost_id = $RoomId");

        $stmt2->execute();
        $result = $stmt2->get_result();
        while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td class='predmet'><div class='hodina'><p>" . $row["predmet_popis"] . "</p>";   
        }

        $stmt3->execute();
        $result = $stmt3->get_result();
        while ($row = $result->fetch_assoc()) 
        {
            echo "<p>" . $row["miestnost_nazov"] . "</p><p>" . date("H:i", strtotime($rows[$i]["prebieha_datum_cas"])) . "</p></div></td></tr>";  
        }
    };

    CloseCon($conn);
}

function GenerateOznam()
{
    $conn = OpenCon();

    $oznam = array();
    $rowsnumber = 0;

    $stmt1 = $conn->prepare("SELECT * FROM oznamy ORDER BY id_ozn DESC");

    $stmt1->execute();
    $result = $stmt1->get_result();
    while ($row = $result->fetch_assoc())
    {
        array_push($oznam,$row);
        $rowsnumber++;
        if ($rowsnumber == 4) break;
    }
    for ($i = 0; $i < $rowsnumber; $i++)
    {
    echo "
    <h2>". $oznam[$i]["nadpis_ozn"] . "</h2>        
    <p>". $oznam[$i]["text_ozn"] ."</p>
    <hr>";
    ;
    }
}
?>