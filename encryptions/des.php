<html>
<head>
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php
include("hextobin.php");
$iv = base64_decode("1Cx8KlzcYlE="); // pro ukazku jsou inicializacni vektory nastaveny staticky - v pripade realneho nasazeni je potreba generovat nahodne a ulozit po cas session
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['plainText']) && isset($_REQUEST['secretKey']) && isset($_REQUEST['mode'])) {

    $time_pre = microtime(true);
    $plainText = $_REQUEST['plainText'];
    $secret = $_REQUEST['secretKey'];
    $mode = $_REQUEST['mode'];
    if ($mode == "encrypt") {
        $result = base64_encode(openssl_encrypt(bin2hex($plainText), "des", bin2hex($secret), 1, $iv));
    } else {
        $result = hextobin(openssl_decrypt(base64_decode($plainText), "des", bin2hex($secret), 1, $iv));
    }
    $time_post = microtime(true);
    $exec_time = number_format(round($time_post - $time_pre, 6, PHP_ROUND_HALF_UP), 5);
    $timerResult = "<p>Šifrování trvalo $exec_time sekund</p>";
} else {
    $result = " ";
}

?>

<div class="container shadow p-4">
    <div class="section-title">
        <h4>DES - Data Encryption Standard</h4>
        <p class="font-italic">
            DES (Data Encryption Standard) je symetrický šifrovací algoritmus, jehož šifrovací klíč má 64 bitů (8
            kontrolních, 56 efektivních).
            Využívá blokového schématu, který provádí složité šifrovací operace. <br/>
            Na základě DES byly vytvořeny další pokročilé šifrovací algoritmy. <br/>
            Využití zde nalezla i Feistelova funkce. Šifra lze lehce prolomit brute
            forcem, proto lze pro zvýšení bezpečnosti využít tripleDES (trojitá aplikace DES), jenž přináší nevýhodu v
            podobě snížení rychlosti.
        </p>
    </div>
    <div class="content text-center pt-2">
        <form method="POST" action="" autocomplete="off">
            <div class="flex-sm-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="plainText">Původní text</label>
                            <input name="plainText" class="form-control text-center" id="plainText"
                                   placeholder="Zadej text k šifrování" required/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="afterText">Text po vykonání funkce</label>
                            <input type="text" class="form-control text-center" id="afterText"
                                   value="<?php echo (isset($result)) ? $result : ''; ?>" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 justify-content-center">
                    <div class="form-group col-sm-4">
                        <label for="secretKey">Šifrovací klíč</label>
                        <input class="form-control text-center" id="secretKey" type="text" name="secretKey"
                               placeholder="Napiš šifrovací klíč" value="key" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="mode">Akce k provedení</label>
                        <select class="form-control" id="mode" name="mode">
                            <option value="encrypt">Šifruj</option>
                            <option value="decrypt">Dešifruj</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center pt-4">
                    <input class="btn btn-primary text-center" type="submit" name="submit" value="Proveď"
                           style="max-width: 100px">
                </div>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                print("  
                <div class='pt-4 text-center'>Výsledek funkce: ");
                echo (isset($result)) ? $result : '';
                print("<br /> Počáteční text: ");
                echo (isset($plainText)) ? $plainText : '';
                print("<br/> Šifrovací klíč: ");
                echo (isset($secret)) ? $secret : '';
                print("<br /> Mód: ");
                echo (isset($mode)) ? $mode : '';
                print("<br /> Délka klíče: ");
                echo('64 bitů');
                print("</div>");
            }
            ?>
            <div class="pt-4 text-center"><?php echo (isset($timerResult)) ? $timerResult : ''; ?></div>

        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>