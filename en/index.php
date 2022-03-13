<!DOCTYPE html>
<html lang="cz">
<?php
session_start();
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="description" content="Bakalářský projekt - webová aplikace na výuku kryptografie">
    <meta name="Author" content="Zdeněk Hejzlar">

    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/dt/dt-1.11.3/fh-3.2.0/r-2.2.9/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.css"/>

    <title>Cryptographic application</title>
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
                <li><a class="nav-link scrollto active" href="index.php#main">Introductory information</a></li>
                <li><a class="nav-link scrollto" href="index.php#symetric-section">Algorithms - symmetric</a></li>
                <li><a class="nav-link scrollto" href="index.php#asymetric-section">Algorithms - asymmetric</a></li>
                <li><a class="nav-link scrollto" href="index.php#comparison-section">Comparison</a></li>
                <li><a class="nav-link scrollto" href="index.php#usersTable-section">Encryption in practice</a></li>
                <li><a class="nav-link " href="../index.php">Czech version</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<main>
    <section id="main" class="col-10 m-auto">
        <div data-aos="zoom-in" class="quote-icon justify-content-center" style="display:flex;align-items:center;">
            <h3 class="section-title">Cryptology in a nutshell</h3>
        </div>
        <div data-aos="fade-up" class="row shadow container p-4 justify-content-center m-auto">
            <div class="col-sm-3">
                <div data-aos="fade-right" data-aos-delay="200" class="nav flex-sm-column nav-pills" role="tablist"
                     aria-orientation="vertical">

                    <button class="nav-link active" id="v-pills-uvod-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-uvod" type="button"
                            role="tab" aria-controls="v-pills-uvod"
                            aria-selected="true">Introduction
                    </button>

                    <button class="nav-link" id="v-pills-symetricke-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-symetricke" type="button"
                            role="tab"
                            aria-controls="v-pills-symetricke" aria-selected="false">Symmetric algorithms
                    </button>

                    <button class="nav-link" id="v-pills-asymetricke-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-asymetricke" type="button"
                            role="tab"
                            aria-controls="v-pills-asymetricke" aria-selected="false">Asymmetric algorithms
                    </button>

                    <button class="nav-link" id="v-pills-ostatni-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-ostatni" type="button"
                            role="tab" aria-controls="v-pills-ostatni"
                            aria-selected="false">Usage
                    </button>
                    <button class="nav-link" id="v-pills-protokoly-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-protokoly" type="button"
                            role="tab" aria-controls="v-pills-protokoly"
                            aria-selected="false">Protocols
                    </button>
                    <button class="nav-link" id="v-pills-tls-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-tls" type="button"
                            role="tab" aria-controls="v-pills-tls"
                            aria-selected="false">SSL vs TLS
                    </button>
                    <button class="nav-link" id="v-pills-ssl-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-ssl" type="button"
                            role="tab" aria-controls="v-pills-ssl"
                            aria-selected="false">Certificates SSL/TLS
                    </button>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200" class="col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-uvod" role="tabpanel"
                         aria-labelledby="v-pills-uvod-tab">
                        One of the most important parts of keeping information confidential is cryptography.
                        In the encryption process, we convert the original "open" readable message into ciphertext.
                        Depending on the algorithm used, the resulting text should be meaningless or directly unreadable
                        to
                        a subject who does not know the auxiliary information to decrypt it. This process is carried out
                        according to predefined
                        rules or by means of a chosen algorithm. An example of the resulting encryption product may be a
                        random
                        mixture of numbers, letters, words or nonsense sentences.
                        <br/><br/>
                        This subcategory of cryptology deals with the overall view of data encryption, also under this
                        category we include reverse decryption. It also examines the security of the encryption
                        algorithms used or
                        the overall security of encryption systems. An essential part of this is the design of
                        encryption and
                        decryption keys used in encryption algorithms and their possible internal
                        calculations.
                    </div>

                    <div class="tab-pane fade" id="v-pills-symetricke" role="tabpanel"
                         aria-labelledby="v-pills-symetricke-tab">
                        When using a symmetric algorithm, a key is used that is identical for encryption and
                        decryption. This variant is simple, but if the key is leaked in one transmitted
                        ciphertext, the rest of the ciphertext where the key is used will be in danger of data leak.
                        <br/><br/>
                        Typical use of this type of key can be found in block ciphers, as well as in substitution
                        ciphers
                        and transposition ciphers. This block cipher uses an implementation of the Feistel function.
                        Uses can be found for example in the DES (Data Encryption Standard) algorithm. <br/> <br/>The
                        advantage of DES is the possibility of using
                        "avalanche"
                        effect, where a large change occurs in the ciphertext when editing the open text. Using DES
                        is not very
                        secure, it is better to use its replacement called AES.

                        Symmetric algorithms are more suitable for archiving confidential information without sending it
                        to second
                        entity.
                    </div>

                    <div class="tab-pane fade" id="v-pills-asymetricke" role="tabpanel"
                         aria-labelledby="v-pills-asymetricke-tab">
                        The term asymmetric algorithm hides the use of two different keys. Both keys have their
                        specific task and cannot be used for anything else. We use the encryption key (public) and also
                        a different key for decryption (private). <br/><br/> To communicate with the recipient, it is
                        then necessary to
                        hand over the private key in a closed line to prevent leakage of the information. This matter
                        is now taken care of by modern algorithms. A prime example is the RSA algorithm and
                        digital signature security.<br/><br/>
                        To achieve asymmetric encryption, three basic conditions must be met.
                        The first condition is the aforementioned use of two different keys. The second condition is
                        to ensure that the ciphertext cannot be extracted from the original text even with knowledge of
                        the public
                        key. The third and last necessary condition is the "uncomputability" of the private key. This
                        property is achieved by using a one-sided function.
                    </div>

                    <div class="tab-pane fade" id="v-pills-ostatni" role="tabpanel"
                         aria-labelledby="v-pills-ostatni-tab">Advanced encryption is currently used
                        wherever personal or secret information needs to be kept confidential. An example of this would
                        be passwords
                        stored in databases.<br/><br/> Another example is network protocols such as TLS and SSL, which
                        ensure that communication between the client and the server is secure. This part is mainly
                        visible in web browsers thanks to the well-known HTTPS and the iconic padlock next to the text
                        field
                        with the address. The use of cryptography is also important in the field of mobile payments or
                        the creation of
                        digital signatures.
                    </div>
                    <div class="tab-pane fade" id="v-pills-protokoly" role="tabpanel"
                         aria-labelledby="v-pills-protokoly-tab">To explain cryptographic protocols, we need
                        define the word "protocol" and understand its meaning. A protocol is a set of rules and
                        instructions
                        specifying how a system should behave and react in a certain situation. Protocols are
                        used everywhere in information technology.
                        <br/><br/>
                        A cryptographic protocol is one that provides secure communication between devices
                        on a network.
                        Its tasks are, for example, to ensure agreement on private and public keys, to ensure
                        secure connections, encrypting communications with a symmetric algorithm. It is composed of
                        smaller units
                        so-called "cryptographic primitives", which are always aimed at performing one specific
                        thing.<br/><br/>
                        Cryptographic primitives are cryptographic algorithms specifically designed to build
                        cryptographic protocol and are highly reliable due to their single-task focus. If
                        these elements are vulnerable, all protocols that use the vulnerable primitives are at
                        risk.<br/><br/>
                        The best known and most used cryptographic protocols are SSL, TLS, SSH.
                    </div>
                    <div class="tab-pane fade" id="v-pills-tls" role="tabpanel"
                         aria-labelledby="v-pills-tls-tab">In the field of cryptology, the best known are
                        cryptographic protocols Secure Socket Layer (SSL) and Transport Layer Security (TLS). They were
                        created
                        to ensure secure and encrypted communication on the network. These protocols focus on
                        authentication of both devices and subsequent encrypted transmissions at the application
                        layer.<br/><br/>
                        Currently, SSL is marked as "obsolete" and is being replaced by a newer version called TLS,
                        which has the vulnerabilities from the original SSL fixed. If a client wants to encrypt their
                        traffic with this
                        protocol, it must be specified to the server. The easiest way to achieve this communication
                        is by using the specified port. An example is https on port 443.
                        <br/> <br/>
                        The communication takes place in several steps. The first step is the "handshake", which is the
                        step in which
                        the client asks the server for a secure connection and agrees on the parameters for the session,
                        specifically the encryption keys and the use of the encryption algorithm. This process uses
                        asymmetric encryption, but further communication is done using symmetric algorithms.<br/><br/>
                        In the first step, the server also sends its SSL/TLS certificate to the client, which then
                        authenticates it. After authentication and successful completion of the handshake phase, the
                        secure connection is initiated.
                    </div>
                    <div class="tab-pane fade" id="v-pills-ssl" role="tabpanel"
                         aria-labelledby="v-pills-ssl-tab">SSL/TLS certificates are an option to verify security
                        connection to the server. These certificates enable encryption of HTTP traffic, which manifests
                        itself in the familiar
                        HTTPS prefix and a lock icon in web browsers. The generated certificate contains
                        domain name, organization name, certificate issuer name, date issued, expiration date,
                        digital signature and public key. It may also contain any subdomains. <br/> <br/> At
                        connecting to the server under an encrypted port, this certificate is sent to the client at the
                        "handshake" phase. The client verifies the received certificate on the issuer side before
                        further communication. This
                        check ensures that the server is who it claims to be. If the certificate is valid and its
                        verification
                        on the issuer's side as well, then it proceeds to the next communication otherwise it terminates
                        handshake and connection.
                    </div>
                </div>
            </div>
    </section>

    <section id="symetric-section" class="col-10 m-auto">
        <div class="container">
            <div data-aos="zoom-in" class="section-title">
                <h3>Symmetric algorithms</h3>
                <p>In this section you can try converting text from its original plain form to encrypted form by
                    using one key. </p>
            </div>
            <nav data-aos="fade-up" data-aos-delay="200">
                <div class="nav nav-pills mb-3" id="tabs-symetrical" role="tablist">
                    <button class="nav-link active" id="tabs-caesar-tab" data-bs-toggle="tab"
                            data-bs-target="#tabs-caesar" type="button"
                            role="tab" aria-controls="tabs-caesar" aria-selected="true">Caesar's cipher
                    </button>
                    <button class="nav-link" id="tabs-vig-tab" data-bs-toggle="tab" data-bs-target="#tabs-vig"
                            type="button" role="tab"
                            aria-controls="tabs-vig" aria-selected="false">Vigenere's cipher
                    </button>
                    <button class="nav-link" id="tabs-blow-tab" data-bs-toggle="tab" data-bs-target="#tabs-blow"
                            type="button" role="tab"
                            aria-controls="tabs-blow" aria-selected="false">Blowfish
                    </button>
                    <button class="nav-link" id="tabs-des-tab" data-bs-toggle="tab" data-bs-target="#tabs-des"
                            type="button" role="tab"
                            aria-controls="tabs-des" aria-selected="false">DES
                    </button>
                    <button class="nav-link" id="tabs-aes-tab" data-bs-toggle="tab" data-bs-target="#tabs-aes"
                            type="button" role="tab"
                            aria-controls="tabs-aes" aria-selected="false">AES
                    </button>

                </div>
            </nav>
            <div data-aos="fade-up" data-aos-delay="200" class="tab-content" id="tabs-symetrical-tabContent">
                <div class="tab-pane fade show active" id="tabs-caesar" role="tabpanel"
                     aria-labelledby="tabs-caesar-tab">
                    <iframe src="encryptions/caesarCode.php" id="caesar" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
                <div class="tab-pane fade" id="tabs-vig" role="tabpanel"
                     aria-labelledby="tabs-vig-tab">
                    <iframe src="encryptions/vigenere.php" id="vig" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
                <div class="tab-pane fade" id="tabs-des" role="tabpanel" aria-labelledby="tabs-des-tab">
                    <iframe src="encryptions/des.php" id="des" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
                <div class="tab-pane fade" id="tabs-blow" role="tabpanel" aria-labelledby="tabs-blow-tab">
                    <iframe src="encryptions/blowfish.php" id="blow" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
                <div class="tab-pane fade" id="tabs-aes" role="tabpanel" aria-labelledby="tabs-aes-tab">
                    <iframe src="encryptions/aes.php" id="aes" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <section id="asymetric-section" class="col-10 m-auto">
        <div class="container">
            <div class="section-title" data-aos="zoom-in">
                <h3>Asymmetric algorithms</h3>
                <p>In this section you can try converting text from its original plain form to encrypted form by
                    using two keys.</p>
            </div>
            <nav data-aos="fade-up" data-aos-delay="200">
                <div class="nav nav-pills mb-3" id="tabs-asymetric" role="tablist">
                    <button class="nav-link active" id="tabs-rsa-tab" data-bs-toggle="tab"
                            data-bs-target="#tabs-rsa" type="button"
                            role="tab" aria-controls="tabs-rsa" aria-selected="true">RSA
                    </button>
                    <button class="nav-link" id="tabs-others-tab" data-bs-toggle="tab" data-bs-target="#tabs-others"
                            type="button" role="tab"
                            aria-controls="tabs-others" aria-selected="false">Others
                    </button>

                </div>
            </nav>
            <div data-aos="fade-up" data-aos-delay="200" class="tab-content" id="tabs-asymetric-tabContent">
                <div class="tab-pane fade show active" id="tabs-rsa" role="tabpanel"
                     aria-labelledby="tabs-rsa-tab">
                    <iframe src="encryptions/RSA.php" id="rsa" frameborder="0" scrolling="auto" width="100%"
                            onload="resizeIframe(this)">
                    </iframe>
                </div>
                <div class="tab-pane fade" id="tabs-others" role="tabpanel"
                     aria-labelledby="tabs-others-tab">
                    <div class="container shadow p-4">
                        <div class="section-title">
                            <h4>Other algorithms</h4>
                            <p class="font-italic">Other algorithms implement key encryption and secure
                                exchange with the counterparty - so that it cannot be misused in transit. Most of these
                                systems
                                do not deal with message encryption per se.
                                <br/>
                                Due to complex implementation (and old php version), no additional algorithms are added
                                to
                                text conversion as with the symmetric algorithms.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="comparison-section" class="col-10 m-auto">
        <div class="container">
            <div class="section-title" data-aos="zoom-in" data-aos-delay="200">
                <h3>Comparison of encryption algorithms</h3>
                <p>This section contains a table comparing the speed of each algorithm based on encryption
                    a small text file (0.5 MB) and
                    a large text file (5 MB)<br/>
                </p>
            </div>
            <iframe data-aos="fade-up" data-aos-delay="200" src="comparison.php" id="comparisonIframe" frameborder="0"
                    scrolling="auto" width="100%"
                    onload="resizeIframe(this)">
            </iframe>
        </div>
    </section>

    <section class="col-10 m-auto" id="usersTable-section">
        <div class="container">
            <div>
                <div class="section-title" data-aos="zoom-in">
                    <h3>Encryption in practice</h3>
                    <p>
                        In this section you can access two database tables. Both tables show how is
                        important
                        to work with encrypted data in the case of a database leak.
                    </p>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#addAccount">Add account
                        </button>
                        <form action="db/removeAccounts.php" method="post">
                            <button type="submit" class="btn btn-primary me-3" name="removeBtn" value="Submit">Remove
                                user
                            </button>
                        </form>
                        <form action="db/loadDefault.php" method="post">
                            <button type="submit" class="btn btn-primary" name="removeBtn" value="Submit">Load default
                                data
                            </button>
                        </form>
                    </div>
                </div>
                <div class="modal fade" id="addAccount" tabindex="-1" aria-labelledby="addAccountLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addAccountLabel">New account to DB</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form action="db/addAccounts.php" target="_blank" method="post" autocomplete="off">
                                <div class="modal-body">
                                    <div>
                                        <label for="username" class="col-form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                               maxlength="30"
                                               placeholder="Enter your nickname" required>
                                    </div>
                                    <div>
                                        <label for="password" class="col-form-label">Password</label>
                                        <input class="form-control" type="password" name="password" id="password"
                                               maxlength="30"
                                               placeholder="Enter your fake password" required>
                                    </div>
                                    <div>
                                        <label for="customMessage" class="col-form-label">Own test message</label>
                                        <input type="text" class="form-control" name="customMessage" id="customMessage"
                                               maxlength="100"
                                               placeholder="Enter your fake/test message (max 100 characters)" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal" name="addBtn"
                                            value="Submit">Add user
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="shadow p-4 mt-4">
                    <h4 class="text-center">Table without password encryption</h4>
                    <table id="notSafe" class="table table-dark table-striped table-bordered table-sm">
                        <thead class="thead">
                        <tr class="text-white">
                            <th scope="col" class="th-sm">ID</th>
                            <th scope="col" class="th-sm">Nickname</th>
                            <th scope="col" class="th-sm">Password</th>
                            <th scope="col" class="th-sm">Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $safe = 0;
                        include("db/showTable.php") ?>
                        </tbody>
                    </table>
                </div>
                <div data-aos="fade-up" data-aos-delay="400" class="shadow p-4 mt-4">
                    <h4 class="text-center">Table with password encryption - Blowfish</h4>
                    <table id="safe" class="table table-dark table-striped table-bordered table-sm">
                        <thead class="thead">
                        <tr class="text-white">
                            <th scope="col" class="th-sm">ID</th>
                            <th scope="col" class="th-sm">Nickname</th>
                            <th scope="col" class="th-sm">Password</th>
                            <th scope="col" class="th-sm">Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $safe = 1;
                        include("db/showTable.php") ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="logo text-center bg-light p-3">
            <a href="https://www.uhk.cz/cs/fakulta-informatiky-a-managementu/fim"><img
                        src="https://www.uhk.cz/img/svg/logo/fim-uhk-cs_hor.svg" height="50px"
                        alt="Logo" class="logoimg"/>
            </a>
            <h5 class="pt-1">This website is a project of the bachelor thesis - Zdeněk Hejzlar ©2022</h5>
            <h5 class="pt-1">The site is suitable for teaching cryptography at FIM</h5>
        </div>
    </footer>
</main>
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
<script>
    function resizeIframe(obj) {
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 20 + 'px';
    }

    $(document).on('shown.bs.tab', 'button[data-bs-toggle="tab"]', function (e) {
        if (e.target.id !== "tabs-others-tab")
            resizeIframe(document.getElementById(e.target.id.replace('-tab', '').replace('tabs-', '')));
    })

    $(document).ready(function () {
        $('#notSafe').DataTable({
            responsive: true
        });

        $('#safe').DataTable({
            responsive: true
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
		