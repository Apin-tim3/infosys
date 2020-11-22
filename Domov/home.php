<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="sidebar">
            <a href="home.html"><button id="home_button">Domov</button></a>
            <a href="../Rozvrh/Rozvrh.html"><button id="rozvrh">Rozvrh</button></a>
            <button id="zapis">Zápis</button>
            <button id="prehlad">Prehľad štúdia</button>
        </div>

        <div id='user'>
            <img src='images/message.png'>
            <img src='images/open.png'>

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
            
                <!-- 
                <p>Hodina</p>
                <p>Miestnost</p>-->
                <h2>Ďaľšia hodina:</h2>
                <?php 
                GenerateClassLater();
                ?>
                <!--<p>Hodina</p>
                <p>Čas</p>
                <p>Miestnosť</p>
                 -->
            </div>
            <div id="home_rozvrh">
                <h1>Dnešný rozvrh</h1>


                <!--Tabuľka sa bude automaticky generovať, toto je len preview-->
                <table>
                    <tr>
                        <th>8:25 - 10:15</td>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>
                    <tr>
                        <th>10:15 - 12:05</td>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>
                    <tr>
                        <th>12:05 - 13:55</td>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>
                    <tr>
                        <th>13:55 - 15:45</td>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>
                    <tr>
                        <th>15:45 - 17:35</td>
                        <td class="predmet"><div class="hodina"><p>Hodina</p><p>Miestnosť</p></div></td>
                    </tr>
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