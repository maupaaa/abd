<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum o psach</title>
    <link rel="stylesheet" href="styl4.css">
</head>
<body>
    <?php
        $connect = mysqli_connect('localhost','root','','psy');

    ?>
    <header>
        <h1>Forum wielbicieli psów</h1>
    </header>
    <section class="flex">
    <section class="lewy">
        <img src="obraz.jpg" alt="foksterier">
    </section>
    <section class="kolumna">
    <section class="prawy">
        <h2>Zapisz się</h2>
        <form action="" method="post" class="form">
            login: <input type="text" name="login" id="login"><br>
            hasło: <input type="password" name="haslo" id="haslo"><br>
            powtórz hasło: <input type="password" name="phaslo" id="phaslo"><br>
            <input type="submit" value="Zapisz">
           
        </form>
        <?php 
           $login = $_POST['login'];
           $haslo = $_POST['haslo'];
           $phaslo = $_POST['phaslo'];
           
           
           $skrypt1 = "SELECT login FROM uzytkownicy";
           $wynik1 = mysqli_query($connect, $skrypt1);

           $jest = false;
           while($row = mysqli_fetch_array($wynik1)){
               if($row['login']==$login){
                   $jest = true;
               }
           }
           if(empty($haslo)||empty($phaslo)||empty($login)){
               echo "<p>wypełnij wszystkie pola</p>";
            }
           elseif($haslo!=$phaslo){
                echo "<p>hasła nie są takie same, konto nie zostało dodane</p>";
            }
            
            elseif($jest == true){
                echo "<p>login występuje w bazie danych, konto nie zostało dodane.</p>";
            }     
            else{
                $haslo = sha1($_POST['haslo']);
                $skrypt2 = "INSERT INTO uzytkownicy VALUES ('','$login','$haslo');";
                $wynik2 = mysqli_query($connect, $skrypt2);
                echo "<p>Konto zostało dodane.</p>";
            }

            mysqli_close($connect);

           
           ?>
    </section>
    
    <section class="prawy">
        <h2>Zapraszamy wszystkich</h2>
        <ol>
            <li>właścicieli psów</li>
            <li>weterynarzy</li>
            <li>tych, co chcą kupić psa</li>
            <li>tych, co lubią psy</li>
        </ol>
        <a href="regulamin.html">Przeczytaj regulamin forum</a>
    </section>
    
</section>
</section>
    <footer>
        <span>Stronę wykonała: Zofia Palińska XXXXXXXXXXX</span>
    </footer>
</body>
</html>
