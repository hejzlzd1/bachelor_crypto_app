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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['plainText']) && isset($_REQUEST['posMovementNum']) && isset($_REQUEST['pos']) && isset($_REQUEST['mode'])) {

    $time_pre = microtime(true);
    $plainText = $_REQUEST['plainText'];
    $posMovementNum = $_REQUEST['posMovementNum'];
    $pos = $_REQUEST['pos'];
    if ($pos == "left") {
        $pos = -1;
    } else {
        $pos = 1;
    }
    $mode = $_REQUEST['mode'];
    function Cesar($plainText, $posMovementNum, $pos, $mode)
    {
        global $plainText;
        $test = "abcdefghijklmnopqrstuvwxyz"; //abeceda
        if ($mode != "decrypt") {
            $pos = -$pos;
        } // otoč systém pokud dešifruji
        for ($i = 0; $i < strlen($plainText); $i++) { // pro všechny písmena
            if (strpos($test, $plainText[$i]) !== false) {
                $j = strpos($test, substr($plainText, $i, 1));

                if ($pos == "-1") { //pokud jdu doleva
                    $j -= $posMovementNum; //odecti pocet pozic
                    while ($j < 0) {
                        $j += strlen($test);
                    }
                } else {
                    $j += $posMovementNum; //pricti pocet pozic
                    while ($j + 1 > strlen($test)) {
                        $j -= strlen($test);
                    }
                }
                $plainText[$i] = $test[$j]; //uloz novy znak
            }
        }
    }

    Cesar($plainText, $posMovementNum, $pos, $mode);
    $time_post = microtime(true);
    $exec_time = number_format(round($time_post - $time_pre, 6, PHP_ROUND_HALF_UP), 5);
    $timerResult = "<p>Šifrování trvalo $exec_time sekund</p>";
    $result = $plainText;
} else {
    $result = " ";
}

?>
<div class="container shadow p-4">
    <div class="section-title">
        <h4>Caesarova šifra</h4>
        <p class="font-italic">
            Caesarova šifra je nejjednodušší a nejznámější šifrovací algoritmus, jenž využívá symetrického klíče. Jedná
            se o šifru substituční, což znamená, že znaky jsou systematicky nahrazovány jinými znaky. <br/>
            Toto šifrování je pojmenováno podle Julia Caesara, který ji využíval ve své osobní korespondenci.
            V reálném prostředí se již nepoužívá samostatně, jelikož poskytuje slabé zabezpečení - je lehce
            prolomitelná.
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
                                   placeholder="Zadej text bez diakritiky" required/>
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
                <div class="row pt-2">
                    <div class="form-group col-sm-3">
                        <label for="posMovementNum">Počet znaků k pootočení</label>
                        <input class="form-control" id="posMovementNum" type="number" name="posMovementNum" value="3"
                               required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="pos">Směr pootočení</label>
                        <select class="form-control" name="pos" id="pos">
                            <option value="left">Otočit doleva</option>
                            <option value="right">Otočit doprava</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
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
                echo (isset($_REQUEST['plainText'])) ? $_REQUEST['plainText'] : '';
                print("<br/> Počet otočení: ");
                echo (isset($posMovementNum)) ? $posMovementNum : '';
                print("<br /> Směr otočení: ");
                echo (isset($_REQUEST['pos'])) ? $_REQUEST['pos'] : '';
                print("<br /> Mód: ");
                echo (isset($mode)) ? $mode : '';

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