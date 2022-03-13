<html>
<head>
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css"/>
</head>
<body>

<div class="shadow p-4 mt-4 container">
    <h4 class="text-center">Comparison table</h4>
    <table id="comparison" class="table table-dark table-striped table-bordered table-sm">
        <thead class="thead">
        <tr class="text-white">
            <th scope="col" class="th-sm">Name of algorithm</th>
            <th scope="col" class="th-sm">Small file (0.5 MB) - in seconds</th>
            <th scope="col" class="th-sm">Large file (5 MB) - in seconds</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $ciphers = array("aes128", "aes192", "aes256", "blowfish", "des", "des3", "idea", "camellia128", "camellia192", "camellia256", "seed");

        define('FILE_ENCRYPTION_BLOCKS', 5000);


        foreach ($ciphers as $cipher) {
            echo "<tr class='text-white text-center'><td>$cipher</td>";
            $time_pre = microtime(true);
            $key = "secretkey";
            $fileLow = fopen("comparison/lorem_0-5mb.txt", "r");
            $ivLenght = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivLenght);
            while (!feof($fileLow)) {
                $plaintext = fread($fileLow, $ivLenght * FILE_ENCRYPTION_BLOCKS);
                $ciphertext = openssl_encrypt($plaintext, $cipher, $key, 1, $iv);
                $iv = substr($ciphertext, 0, $ivLenght);
            }
            fclose($fileLow);
            $time_post = microtime(true);
            $exec_time = number_format($time_post - $time_pre, 15);

            print("<td scope='row'>$exec_time</td>");

            $time_pre = microtime(true);
            $key = "secretkey";
            $fileBig = fopen("comparison/lorem_5mb.txt", "r"); //Get the code to be encypted.
            $ivLenght = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivLenght);
            while (!feof($fileBig)) {
                $plaintext = fread($fileBig, $ivLenght * FILE_ENCRYPTION_BLOCKS);
                $ciphertext = openssl_encrypt($plaintext, $cipher, $key, 1, $iv);
                $iv = substr($ciphertext, 0, $ivLenght);
            }
            fclose($fileBig);
            $time_post = microtime(true);
            $exec_time = number_format($time_post - $time_pre, 15);
            print("<td scope='row'>$exec_time</td>");

            print("</tr>");

            $plainText = $cipherText = $time_pre = $key = $iv = $time_post = $exec_time = null;
        }


        encryptRSA(1024);
        encryptRSA(2048);
        encryptRSA(4096);

        function encryptRSA($bits)
        {
            print("<tr class='text-white text-center'><td scope='row'>RSA ($bits bit)</td>");
            $time_pred = microtime(true);
            $fileLow = fopen("comparison/lorem_0-5mb.txt", "r");
            $keys = openssl_pkey_new(array('private_key_bits' => $bits, "private_key_type" => OPENSSL_KEYTYPE_RSA));

            openssl_pkey_export($keys, $privKey);
            while (!feof($fileLow)) {
                $plainText = fread($fileLow, FILE_ENCRYPTION_BLOCKS);
                $ciphertext = openssl_private_encrypt($plainText, $encrypted, $privKey);
                $ciphertext = null;
            }
            $time_postd = microtime(true);
            $exec_timed = number_format($time_postd - $time_pred, 15);
            print("<td scope='row'>$exec_timed</td>");


            $time_pred = microtime(true);
            $fileBig = fopen("comparison/lorem_5mb.txt", "r"); //Get the code to be encypted.
            $keys = openssl_pkey_new(array('private_key_bits' => $bits, "private_key_type" => OPENSSL_KEYTYPE_RSA));

            openssl_pkey_export($keys, $privKey);
            while (!feof($fileBig)) {
                $plainText = fread($fileBig, FILE_ENCRYPTION_BLOCKS);
                $ciphertext = openssl_private_encrypt($plainText, $encrypted, $privKey);
                $ciphertext = null;
            }

            $time_postd = microtime(true);
            $exec_timed = number_format($time_postd - $time_pred, 15);
            print("<td scope='row'>$exec_timed</td>");
            print("</tr>");
            fclose($fileBig);
            fclose($fileLow);
        }

        ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
<script>
    $('#comparison').DataTable({
        responsive: true,
        pageLength: 25
    });
</script>
</body>
</html>