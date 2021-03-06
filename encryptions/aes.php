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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['plainText']) && isset($_REQUEST['secretKey']) && isset($_REQUEST['mode']) && isset($_REQUEST["bits"])) {
    include("hextobin.php");
    $time_pre = microtime(true);
    $plainText = $_REQUEST['plainText'];
    $secret = $_REQUEST['secretKey'];
    $mode = $_REQUEST['mode'];
    $bits = $_REQUEST['bits'];
    switch ($bits) { // pro ukazku jsou inicializacni vektory nastaveny staticky - v pripade realneho nasazeni je potreba generovat nahodne a ulozit po cas session
        case "128":
            $iv = base64_decode("LHG0xiZoQHuWqOWR+CdJPg==");
            break;
        case "192":
            $iv = base64_decode("MKlt4NNsKWy23LkpyopMHQ==");
            break;
        case "256":
            $iv = base64_decode("9ZV672Cl9337mT74sjM26g==");
            break;
    }

    if ($mode == "encrypt") {
        switch ($bits) {
            case "128":
                $result = base64_encode(openssl_encrypt(bin2hex($plainText), "aes128", bin2hex($secret), 1, $iv));
                break;
            case "192":
                $result = base64_encode(openssl_encrypt(bin2hex($plainText), "aes192", bin2hex($secret), 1, $iv));
                break;
            case "256":
                $result = base64_encode(openssl_encrypt(bin2hex($plainText), "aes256", bin2hex($secret), 1, $iv));
                break;
        }
    } else {
        switch ($bits) {
            case "128":
                $result = hextobin(openssl_decrypt(base64_decode($plainText), "aes128", bin2hex($secret), 1, $iv));
                break;
            case "192":
                $result = hextobin(openssl_decrypt(base64_decode($plainText), "aes192", bin2hex($secret), 1, $iv));
                break;
            case "256":
                $result = hextobin(openssl_decrypt(base64_decode($plainText), "aes256", bin2hex($secret), 1, $iv));
                break;
        }
    }
    $time_post = microtime(true);
    $exec_time = number_format(round($time_post - $time_pre, 6, PHP_ROUND_HALF_UP), 5);
    $timerResult = "<p>??ifrov??n?? trvalo $exec_time sekund</p>";
} else {
    $result = " ";
}

?>

<div class="container shadow p-4">
    <div class="section-title">
        <h4>AES - Advanced Encryption Standard</h4>
        <p class="font-italic">
            AES (Advanced Encryption Standard) je symetrick?? ??ifrovac?? algoritmus, jeho?? ??ifrovac?? kl???? m????e nab??vat
            128,192 ??i 256 bit??.
            Vyu????v?? blokov??ho sch??matu, kter?? prov??d?? slo??it?? ??ifrovac?? operace pomoc?? vnit??n??ch funkc??
            (permutace,substituce). <br/>
            AES roz??i??uje z??klady sv??ho p??edka - DES, tento algoritmus se vyu????v?? i v sou??asn?? dob??. <br/>
            D??ky v??t???? d??lce kl????e je AES zna??n?? bezpe??n??j???? oproti DES, takt???? disponuje lep????m v??konem a je slo??it??j????
            na prolomen??.
        </p>
    </div>
    <div class="content text-center pt-2">
        <form method="POST" action="" autocomplete="off">
            <div class="flex-sm-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="plainText">P??vodn?? text</label>
                            <input name="plainText" class="form-control text-center" id="plainText"
                                   placeholder="Zadej text k ??ifrov??n??" required/>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="afterText">Text po vykon??n?? funkce</label>
                            <input type="text" class="form-control text-center" id="afterText"
                                   value="<?php echo (isset($result)) ? $result : ''; ?>" readonly/>
                        </div>
                    </div>
                </div>
                <div class="row pt-2 justify-content-center">
                    <div class="form-group col-sm-3">
                        <label for="secretKey">??ifrovac?? kl????</label>
                        <input class="form-control text-center" id="secretKey" type="text" name="secretKey"
                               placeholder="Napi?? ??ifrovac?? kl????" value="key" required>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="bits">Po??et bit?? v kl????i</label>
                        <select class="form-control" name="bits" id="bits">
                            <option value="128" selected>128</option>
                            <option value="192">192</option>
                            <option value="256">256</option>
                        </select>
                    </div>
                    <div class="form-group col-sm">
                        <label for="mode">Akce k proveden??</label>
                        <select class="form-control" id="mode" name="mode">
                            <option value="encrypt">??ifruj</option>
                            <option value="decrypt">De??ifruj</option>
                        </select>
                    </div>
                </div>
                <div class="row justify-content-center pt-4">
                    <input class="btn btn-primary text-center" type="submit" name="submit" value="Prove??"
                           style="max-width: 100px">
                </div>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                print("  
                <div class='pt-4 text-center'>V??sledek funkce: ");
                echo (isset($result)) ? $result : '';
                print("<br /> Po????te??n?? text: ");
                echo (isset($plainText)) ? $plainText : '';
                print("<br/> ??ifrovac?? kl????: ");
                echo (isset($secret)) ? $secret : '';
                print("<br /> M??d: ");
                echo (isset($mode)) ? $mode : '';
                print("<br /> D??lka kl????e: ");
                echo (isset($bits)) ? $bits : '';
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
