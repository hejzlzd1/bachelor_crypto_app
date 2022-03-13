<!DOCTYPE html>
<html lang="cz">
<head>
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['plainText']) && isset($_REQUEST['mode']) && $_REQUEST['plainText'] != "") {
    $time_pre = microtime(true);

    if (!isset($_SESSION["privatekey"]) && !isset($_SESSION["public_key"])) {
        $keys = openssl_pkey_new(array('private_key_bits' => 4096, "private_key_type" => OPENSSL_KEYTYPE_RSA));
        openssl_pkey_export($keys, $privKey);
        $pubKey = openssl_pkey_get_details($keys);
        $pubKey = $pubKey["key"];
        $_SESSION["privatekey"] = $privKey;
        $_SESSION["public_key"] = $pubKey;
    } else {
        $privKey = $_SESSION["privatekey"];
        $pubKey = $_SESSION["public_key"];
    }
    $plaintext = $_REQUEST['plainText'];

    $mode = $_REQUEST['mode'];
    if ($mode == "encrypt") {
        openssl_private_encrypt(base64_decode($plaintext), $encrypted, $privKey);
        $result = base64_encode($encrypted);
    } else {
        openssl_public_decrypt(base64_decode($plaintext), $decrypted, $pubKey);
        $result = base64_encode($decrypted);
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
        <h4>RSA</h4>
        <p class="font-italic">
            RSA ( Rivest–Shamir–Adleman ) je asymetrický šifrovací systém, který se používá k bezpečnému přesouvání dat.
            Jedná se o jeden z nejrozšířenějších systémů pomáhající s přesunem informací po internetu ale i k tvorbě
            digitálních podpisů.<br/>
            Tvorba klíčů probíhá výběrem vysokých prvočísel, jejich násobením, výpočtem eulerovy funkce atd. čímž
            vzniknou dva klíče. Následně se pomocí těchto klíčů dle domluvných postupů šifruje/dešifruje. <br/>

            Do času zpracování je započítána i prvotní tvorba klíčů -> je viditelné, jak se rychlost změní při již
            vygenerovaných klíčích.
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#publicKey">
                            Veřejný klíč
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="publicKey" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="publicKeyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="publicKeyLabel">Veřejný klíč</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-dialog modal-dialog-centered p-4  modal-dialog-scrollable"
                                         style="overflow-wrap:anywhere;">
                                        <?php if ($pubKey) {
                                            echo($_SESSION['public_key']);
                                        } else {
                                            echo("Klíč se vytvoří při prvním převodu textu");
                                        } ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#privateKey">
                            Privátní klíč
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="privateKey" data-bs-backdrop="static" data-bs-keyboard="false"
                             tabindex="-1" aria-labelledby="privateKeyLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="privateKeyLabel">Privátní klíč</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable pt-2 p-4"
                                         style="overflow-wrap:anywhere;">
                                        <?php if ($privKey) {
                                            echo($_SESSION['privatekey']);
                                        } else {
                                            echo("Klíč se vytvoří při prvním převodu textu");
                                        } ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-2 justify-content-center">
                <div class="form-group col-sm-4">
                    <label for="mode">Akce k provedení</label>
                    <select class="form-control" id="mode" name="mode">
                        <option value="encrypt">Šifruj</option>
                        <option value="decrypt">Dešifruj</option>
                    </select>
                </div>
            </div>
            <div class="row justify-content-center pt-4">
                <div class="form-group col-sm-4">
                    <input class="btn btn-primary text-center" type="submit" name="submit" value="Proveď"
                           style="max-width: 100px">
                </div>
            </div>
        </form>
        <div class="text-center pt-4">
            <form method="post" action="">
                <input class="btn btn-primary text-center" type="submit" id="deleteSession"
                       name="deleteSession" value="Vymaž klíče" style="max-width: 150px">
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["submit"])) {
        print("  
                <div class='pt-4 text-center'>Výsledek funkce: ");
        if (isset($result)) {
            echo "<div class='col-sm' style='overflow-wrap: break-word;'>$result</div>";
        } else {
            echo " ";
        }
        print("<br /> Počáteční text: ");
        if (isset($_REQUEST['plainText'])) {
            echo "<div class='col-sm' style='overflow-wrap: break-word;'>" . $_REQUEST['plainText'] . "</div>";
        } else {
            echo " ";
        }
        print("<br /> Mód: ");
        echo (isset($mode)) ? $mode : '';
        print("</div>");
    }
    ?>
    <div class="pt-4 text-center"><?php echo (isset($timerResult)) ? $timerResult : ''; ?></div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/js/main.js"></script>
</body>
</html>
<?php
if (isset($_POST["deleteSession"])) {
    $_SESSION = array();
    session_destroy();
    header("rsa.php");
}
?>