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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['plainText']) && isset($_REQUEST['secretKey']) && isset($_REQUEST['mode'])) {

    $time_pre = microtime(true);
    $plainText = $_REQUEST['plainText'];
    $secret = $_REQUEST['secretKey'];
    $mode = $_REQUEST['mode'];
    function Mod($a, $b)
    {
        return ($a % $b + $b) % $b;
    }

    function Cipher($input, $key, $encipher)
    {
        $keyLen = strlen($key);

        for ($i = 0; $i < $keyLen; ++$i)
            if (!ctype_alpha($key[$i]))
                return ""; // Error

        $output = "";
        $nonAlphaCharCount = 0;
        $inputLen = strlen($input);

        for ($i = 0; $i < $inputLen; ++$i) {
            if (ctype_alpha($input[$i])) {
                $cIsUpper = ctype_upper($input[$i]);
                $offset = ord($cIsUpper ? 'A' : 'a');
                $keyIndex = ($i - $nonAlphaCharCount) % $keyLen;
                $k = ord($cIsUpper ? strtoupper($key[$keyIndex]) : strtolower($key[$keyIndex])) - $offset;
                $k = $encipher ? $k : -$k;
                $ch = chr((Mod(((ord($input[$i]) + $k) - $offset), 26)) + $offset);
                $output .= $ch;
            } else {
                $output .= $input[$i];
                ++$nonAlphaCharCount;
            }
        }
        return $output;
    }

    function Encipher($input, $key)
    {
        return Cipher($input, $key, true);
    }

    function Decipher($input, $key)
    {
        return Cipher($input, $key, false);
    }

    if ($mode == "encrypt") {
        $result = Encipher($plainText, $secret);
    } else {
        $result = Decipher($plainText, $secret);
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
        <h4>Vigenereho šifra</h4>
        <p class="font-italic">
            Tato substituční šifra funguje na základě Caesarovy šifry. K aplikování tohoto algoritmu se využívá všech
            kombinací Caesarovy abecedy (tj. 26 kombinací) poskládaných do "tabulky" souřadnic.<br/>
            Dle klíče a původního textu se následně vybírá sloupec a řádek v tabulce abeced (klíč je stejně dlouhý jako
            plain text, jinak se musí opakovat do dané délky) - znakem na dané pozici v tabulce se nahradí původní znak.
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
                <div class="row pt-2 justify-content-center">
                    <div class="form-group col-sm-3">
                        <label for="secretKey">Šifrovací klíč</label>
                        <input class="form-control text-center" id="secretKey" type="text" name="secretKey"
                               placeholder="Napiš šifrovací klíč" value="key" required>
                    </div>
                    <div class="form-group col-sm-3">
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
