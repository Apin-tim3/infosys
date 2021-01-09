<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="domstyle.css">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <a href="home.php"><button id="home_button">Domov</button></a>
            <a href="../Rozvrh/Rozvrh.html"><button id="rozvrh">Rozvrh</button></a>
            <a href="../zapisy/zapis.html"><button id="zapis">Zápis</button></a>
            <button id="prehlad">Prehľad štúdia</button>
        </div>

        <div id='user'>
            <img src='../images/message.png'>
            <img src='../images/open.png'>

        <?php include 'funckie.php';
            LoginName();?>
            
        <div class='profile_pic'></div>
         </div>

        <!--Pomocný kontajner pre zarovnanie objektov-->
        <div id="flex_inside">

            <!--Tabulka ohľadom prebiehajúcej hodiny
                nadpis, predmet, čas a miestnosť by sa mali generovať automaticky-->
            <div id="now">
            
            <?php 
            GenerateProgram();
            ?>
            <h2>Priebiehajúca hodina:</h2>
            <?php 
            GenerateClassNow();
            ?>
            
            <h2>Ďaľšia hodina:</h2>
            <?php 
            GenerateClassLater();
            ?>

            </div>
            <div id="home_rozvrh">
                <h1>Dnešný rozvrh</h1>


                <!--Tabuľka sa bude automaticky generovať, toto je len preview-->
                <table>
                    <!--<tr>
                        <th>8:25 - 10:15</th>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>-->

                    <?php
                    GenerateRozvrhHome()
                    ?>

                </table>
            </div>
            <div id="oznamy">
                <h1>Oznamy</h1>
                    <hr>
                    <h2>Správa</h2>
                    <p>Odio fermentum sodales venenatis sed arcu dignissim mauris,
                        libero, sed. Felis ut lacus, nulla eu, rhoncus id egestas aliquam.
                        Eros, congue sollicitudin nulla nunc, consequat quis odio tortor. 
                        In quis nascetur quis sodales amet risus rutrum tincidunt. Enim.</p>
                    <hr>
                    <h2>Oznam</h2>
                    <p>Odio fermentum sodales venenatis sed arcu dignissim mauris,
                        libero, sed. Felis ut lacus, nulla eu, rhoncus id egestas aliquam.
                        Eros, congue sollicitudin nulla nunc, consequat quis odio tortor. 
                        In quis nascetur quis sodales amet risus rutrum tincidunt. Enim.</p>
                    <hr>
                    <h2>Zmena</h2>
                    <p>Odio fermentum sodales venenatis sed arcu dignissim mauris,
                        libero, sed. Felis ut lacus, nulla eu, rhoncus id egestas aliquam.
                        Eros, congue sollicitudin nulla nunc, consequat quis odio tortor. 
                        In quis nascetur quis sodales amet risus rutrum tincidunt. Enim.</p>
                    <hr>
                    <h2>Oznam</h2>
                    <p>Odio fermentum sodales venenatis sed arcu dignissim mauris,
                        libero, sed. Felis ut lacus, nulla eu, rhoncus id egestas aliquam.
                        Eros, congue sollicitudin nulla nunc, consequat quis odio tortor. 
                        In quis nascetur quis sodales amet risus rutrum tincidunt. Enim.</p>
                    <hr>
            </div>
        </div>
        
    </body>
    <footer>

    </footer>
</html>