<!DOCTYPE html>
<html lang="cz">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Bakalářský projekt - webová aplikace na výuku kryptografie">
    <meta name="Author" content="Zdeněk Hejzlar">

    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.css"/>

    <title>Kryptografická aplikace</title>
</head>
<body>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <a href="https://www.uhk.cz"><img src="https://www.uhk.cz/img/svg/logo/uhk-uhk-cs_hor.svg" height="80px"
                                              alt="Logo" class="logoimg"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="../index.php#main">Úvodní informace</a></li>
                <li><a class="nav-link scrollto" href="../index.php#symetric-section">Algoritmy - symetrické</a></li>
                <li><a class="nav-link scrollto" href="../index.php#asymetric-section">Algoritmy - asymetrické</a></li>
                <li><a class="nav-link scrollto" href="../index.php#comparison-section">Porovnání</a></li>
                <li><a class="nav-link scrollto" href="../index.php#usersTable-section">Šifrování v praxi</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<section>
    <?php

    require "db.php";
    $conn = OpenCon();
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sql = "truncate table notSafe";
        $sql2 = "truncate table safe";
        mysqli_query($conn, $sql);
        mysqli_query($conn, $sql2);
        $fn = fopen("defaultDB.txt", "r");
        while (!feof($fn)) {
            $res = fgets($fn);
            $resArray = explode(",", $res);
            $user = $resArray[0];
            $pass = $resArray[1];
            $customMessage = $resArray[2];
            $sql = sprintf("insert into notSafe (id,username,password,message) values (null,'%s','%s','%s');", $conn->real_escape_string($user), $conn->real_escape_string($pass), $conn->real_escape_string($customMessage));
            $result = mysqli_query($conn, $sql);


            $pass = $conn->real_escape_string($pass);
            $encryptedpass = base64_encode(openssl_encrypt(bin2hex($pass), 'blowfish', bin2hex("dbkey"), 1, base64_decode("LHG0xiZoQHuWqOWR+CdJPg==")));
            $sql2 = sprintf("insert into safe (id,username,password,message) values (null,'%s','%s','%s');", $conn->real_escape_string($user), $encryptedpass, $conn->real_escape_string($customMessage));
            $result = mysqli_query($conn, $sql2);
        }
        fclose($fn);
        print('
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
  <div class="alert alert-success d-flex align-items-center" role="alert">
  <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div>
    Defaultní data obnoveny...<br/>
  
  <div id="textshow">Přesměrován budeš za 25 sekund</div>
  <script>
        var sec = 25;
        setInterval(function (){
            document.getElementById("textshow").innerHTML = "Přesměrován budeš za "+ sec + "s";
            sec--;
        },1000);
        setTimeout(function(){
            window.location.replace("http://edu.uhk.cz/~hejzlzd1#usersTable-section");
            }, 25000);
    </script>
    </div>
</div>
  ');
    }
    CloseCon($conn);
    ?>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/js/main.js"></script>
</html>
