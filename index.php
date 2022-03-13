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
                <li><a class="nav-link scrollto active" href="index.php#main">Úvodní informace</a></li>
                <li><a class="nav-link scrollto" href="index.php#symetric-section">Algoritmy - symetrické</a></li>
                <li><a class="nav-link scrollto" href="index.php#asymetric-section">Algoritmy - asymetrické</a></li>
                <li><a class="nav-link scrollto" href="index.php#comparison-section">Porovnání</a></li>
                <li><a class="nav-link scrollto" href="index.php#usersTable-section">Šifrování v praxi</a></li>
                <li><a class="nav-link " href="en/index.php">Anglická verze</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<main>
    <section id="main" class="col-10 m-auto">
        <div data-aos="zoom-in" class="quote-icon justify-content-center" style="display:flex;align-items:center;">
            <h3 class="section-title">Kryptologie v kostce</h3>
        </div>
        <div data-aos="fade-up" class="row shadow container p-4 justify-content-center m-auto">
            <div class="col-sm-3">
                <div data-aos="fade-right" data-aos-delay="200" class="nav flex-sm-column nav-pills" role="tablist"
                     aria-orientation="vertical">

                    <button class="nav-link active" id="v-pills-uvod-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-uvod" type="button"
                            role="tab" aria-controls="v-pills-uvod"
                            aria-selected="true">Úvod
                    </button>

                    <button class="nav-link" id="v-pills-symetricke-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-symetricke" type="button"
                            role="tab"
                            aria-controls="v-pills-symetricke" aria-selected="false">Symetrické algoritmy
                    </button>

                    <button class="nav-link" id="v-pills-asymetricke-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-asymetricke" type="button"
                            role="tab"
                            aria-controls="v-pills-asymetricke" aria-selected="false">Asymetrické algoritmy
                    </button>

                    <button class="nav-link" id="v-pills-ostatni-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-ostatni" type="button"
                            role="tab" aria-controls="v-pills-ostatni"
                            aria-selected="false">Využití
                    </button>
                    <button class="nav-link" id="v-pills-protokoly-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-protokoly" type="button"
                            role="tab" aria-controls="v-pills-protokoly"
                            aria-selected="false">Protokoly
                    </button>
                    <button class="nav-link" id="v-pills-tls-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-tls" type="button"
                            role="tab" aria-controls="v-pills-tls"
                            aria-selected="false">SSL vs TLS
                    </button>
                    <button class="nav-link" id="v-pills-ssl-tab" data-bs-toggle="pill"
                            data-bs-target="#v-pills-ssl" type="button"
                            role="tab" aria-controls="v-pills-ssl"
                            aria-selected="false">Certifikáty SSL/TLS
                    </button>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-delay="200" class="col-sm-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-uvod" role="tabpanel"
                         aria-labelledby="v-pills-uvod-tab">
                        Jednou z nejdůležitějších částí při utajování informací ve zprávě je kryptografie.
                        Při procesu šifrování převádíme původní „otevřenou“ čitelnou zprávu na zašifrovaný text.
                        Výsledný text by v závislosti na použitém algoritmu měl být nesmyslný či přímo nečitelný pro
                        entitu, která nezná pomocné informace k dešifrování. Tento proces se provádí dle předem určených
                        pravidel či pomocí zvoleného algoritmu. Příkladem finálního produktu šifrování může být náhodná
                        směsice čísel, písmen, slov, nesmyslných vět. <br/><br/>
                        Tato podkategorie kryptologie se zabývá celkovým pohledem na šifrování dat, taktéž pod tuto
                        kategorii spadá zpětná dešifrace. Dále zkoumá bezpečnost použitých šifrovacích algoritmů či
                        případně celkovou bezpečnost šifrovacích systémů. Podstatnou částí je i tvorba šifrovacích a
                        dešifrovacích klíčů, které se využívají v šifrovacích algoritmech a jejich případných interních
                        výpočtech.
                    </div>

                    <div class="tab-pane fade" id="v-pills-symetricke" role="tabpanel"
                         aria-labelledby="v-pills-symetricke-tab">
                        Při použití symetrického algoritmu se využije klíč, který je totožný pro šifrování i
                        dešifrování. Tato varianta je jednoduchá, avšak při prolomení klíče v jednom přeneseném
                        zašifrovaném textu dojde k prolomení zbytku, kde je klíč použit. <br/><br/>
                        Typické využití tohoto typu klíče lze nalézt u blokových šifer, dále se jedná o substituční
                        a transpoziční šifry. Toto šifrování pomocí bloků využívá implementace Feistelovy funkce.
                        Využití lze nalézt
                        například v algoritmu DES (Data Encryption Standard). <br/> <br/>Výhodou DES je možnost využití
                        „lavinového“
                        efektu, kdy při editaci otevřeného textu nastane velká změna v šifrovaném textu. Použití DES
                        není příliš
                        bezpečné, lepší je využít jeho náhradníka s názvem AES.

                        Symetrické algoritmy jsou spíše vhodné pro archivaci důvěrných informací bez posílání druhé
                        entitě.
                    </div>

                    <div class="tab-pane fade" id="v-pills-asymetricke" role="tabpanel"
                         aria-labelledby="v-pills-asymetricke-tab">
                        Pod pojmem asymetrický algoritmus se schovává využití dvou odlišných klíčů. Oba klíče mají svůj
                        specifický úkol a na nic jiného je nelze využít. Využíváme klíč na šifrování (veřejný) a také
                        odlišný klíč určený k dešifrování (privátní). <br/><br/> Pro komunikaci s příjemcem je pak nutné
                        předat privátní klíč v uzavřené lince, aby nedošlo k úniku daných informací. O tuto záležitost
                        se nyní dokážou postarat moderní algoritmy samy. Ukázkovým příkladem je algoritmus RSA a
                        zabezpečení digitálním podpisem.<br/><br/>
                        K dosažení asymetrického šifrování je zapotřebí splnit tři základní požadované podmínky.
                        První podmínkou je již zmíněné využití dvou různých klíčů. Druhou podmínkou je
                        zajistit, aby ze zašifrovaného textu nebylo možné získat původní text i se znalostí veřejného
                        klíče. Třetí a poslední nutnou podmínkou je „nevypočitatelnost“ privátního klíče. Této
                        vlastnosti se dosahuje pomocí využití jednostranné funkce.
                    </div>

                    <div class="tab-pane fade" id="v-pills-ostatni" role="tabpanel"
                         aria-labelledby="v-pills-ostatni-tab">Pokročilé šifrování se v současné době využívá prakticky
                        všude, kde je potřeba utajit osobní či tajné informace. Ukázkovým příkladem mohou být hesla
                        uložená v databázích.<br/><br/> Dalším příkladem jsou síťové protokoly typu TLS a SSL, které
                        zajišťují, aby komunikace mezi klientem a serverem probíhala bezpečně. Tato část je především
                        viditelná ve webových prohlížečích díky známému HTTPS a ikonickému zámečku vedle textového pole
                        s adresou. Využití kryptografie je významné také v oblasti mobilních plateb či tvorbě
                        digitálních podpisů.
                    </div>
                    <div class="tab-pane fade" id="v-pills-protokoly" role="tabpanel"
                         aria-labelledby="v-pills-protokoly-tab">Pro vysvětlení kryptografických protokolů je potřeba
                        definovat si slovo „protokol“ a pochopit jeho význam. Protokol je sada pravidel a instrukcí
                        určující, jak se má daný systém zachovat v určité situaci a reagovat na ni. Protokoly se
                        používají prakticky všude v oblasti informačních technologií.
                        <br/><br/>
                        Kryptografický protokol je takový protokol, který zajišťuje bezpečnou komunikaci mezi zařízeními
                        na síti.
                        Jeho úkoly jsou například zajištění dohody na privátních a veřejných klíčích, zajištění
                        bezpečného spojení, šifrování komunikace symetrickým algoritmem. Je složen z menších celků
                        takzvaných „kryptografických primitiv“, které jsou vždy zaměřeny na provádění jedné specifické
                        věci.<br/><br/>
                        Kryptografické primitiva jsou šifrovací algoritmy speciálně vytvořené za účelem stavby
                        kryptografického protokolu a díky jejich zaměření na jeden úkol jsou vysoce spolehlivé. Pokud se
                        u těchto prvků vyskytne zranitelnost, jsou ohroženy všechny protokoly, které daných primitiv
                        využívají.<br/><br/>
                        Mezi nejznámější a nejvíce uživateli používané kryptografické protokoly patří SSL, TLS, SSH.
                    </div>
                    <div class="tab-pane fade" id="v-pills-tls" role="tabpanel"
                         aria-labelledby="v-pills-tls-tab">V oblasti kryptologie jsou nejznámější především
                        kryptografické protokoly Secure Socket Layer (SSL) a Transport Layer Security (TLS). Vytvořeny
                        byli s cílem zajistit bezpečnou a šifrovanou komunikaci na síti. Zmíněné protokoly se zaměřují
                        na ověření obou zařízení a následné šifrované přenosy v oblasti aplikační vrstvy.<br/><br/> V
                        současné době je SSL označeno jako „zastaralé“ a je nahrazováno novější verzí s názvem TLS,
                        které má opravené zranitelnosti z původního SSL. Pokud klient chce svůj provoz šifrovat tímto
                        způsobem je nutno to serveru specifikovat. Nejjednodušší způsob, jak dosáhnout této komunikace
                        je pak užitím specifikovaného portu. Příkladem je https na portu 443.
                        <br/> <br/>
                        Komunikace probíhá v několika krocích. Prvním krokem je „handshake“, což je krok, ve kterém
                        klient požádá server o zabezpečené spojení a domlouvá se na parametrech pro danou session,
                        specificky pak šifrovací klíče a použití šifrovacího algoritmu. Tento proces využívá
                        asymetrického šifrování, další komunikace však probíhá pomocí symetrických algoritmů.<br/><br/>
                        V prvním kroku taktéž server odesílá svůj SSL/TLS certifikát ke klientovi, který ho následně
                        ověřuje. Po ověření a úspěšném dokončení fáze „handshake“ se zahajuje zabezpečené spojení.
                    </div>
                    <div class="tab-pane fade" id="v-pills-ssl" role="tabpanel"
                         aria-labelledby="v-pills-ssl-tab">SSL/TLS certifikáty jsou možností, jak ověřit bezpečnost
                        připojení k serveru. Tyto certifikáty umožňují šifrování HTTP přenosu, což se projevuje známým
                        prefixem HTTPS a ikonou zámečku v internetových prohlížečích. Vygenerovaný certifikát obsahuje
                        název domény, název organizace, název vystavitele certifikátu, datum vystavení, datum zániku,
                        digitální podpis a veřejný klíč. Taktéž může obsahovat případné subdomény. <br/> <br/> Při
                        připojení k serveru pod šifrovaným portem je tento certifikát odeslán klientovi ve fázi
                        „handshake“. Klient přijatý certifikát ověřuje na straně vydavatele před další komunikací. Tato
                        kontrola zajistí, že je server tím, za koho se vydává. Pokud je certifikát platný a jeho ověření
                        na straně vydavatele také, pak se přechází k další komunikaci v opačném případě k ukončení
                        handshaku a spojení.
                    </div>
                </div>
            </div>
    </section>

    <section id="symetric-section" class="col-10 m-auto">
        <div class="container">
            <div data-aos="zoom-in" class="section-title">
                <h3>Symetrické algoritmy</h3>
                <p>V této sekci je možné vyzkoušet si převod textu z jeho původní plain formy do zašifrované podoby za
                    pomocí jednoho klíče. </p>
            </div>
            <nav data-aos="fade-up" data-aos-delay="200">
                <div class="nav nav-pills mb-3" id="tabs-symetrical" role="tablist">
                    <button class="nav-link active" id="tabs-caesar-tab" data-bs-toggle="tab"
                            data-bs-target="#tabs-caesar" type="button"
                            role="tab" aria-controls="tabs-caesar" aria-selected="true">Caesarova šifra
                    </button>
                    <button class="nav-link" id="tabs-vig-tab" data-bs-toggle="tab" data-bs-target="#tabs-vig"
                            type="button" role="tab"
                            aria-controls="tabs-vig" aria-selected="false">Vigenereho šifra
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
                <h3>Asymetrické algoritmy</h3>
                <p>V této sekci je možné vyzkoušet si převod textu z jeho původní plain formy do zašifrované podoby za
                    pomocí dvou klíčů.</p>
            </div>
            <nav data-aos="fade-up" data-aos-delay="200">
                <div class="nav nav-pills mb-3" id="tabs-asymetric" role="tablist">
                    <button class="nav-link active" id="tabs-rsa-tab" data-bs-toggle="tab"
                            data-bs-target="#tabs-rsa" type="button"
                            role="tab" aria-controls="tabs-rsa" aria-selected="true">RSA
                    </button>
                    <button class="nav-link" id="tabs-others-tab" data-bs-toggle="tab" data-bs-target="#tabs-others"
                            type="button" role="tab"
                            aria-controls="tabs-others" aria-selected="false">Ostatní
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
                            <h4>Ostatní algoritmy</h4>
                            <p class="font-italic">Ostatní algoritmy implementují šifrování klíčů a jejich bezpečnou
                                výměnu s protistranou - aby nemohl být při přesunu zneužit. Většina těchto systémů se
                                nezabývá pouze šifrováním zpráv jako takových.
                                <br/>
                                Z důvodu složité implementace (a staré verze php) nejsou další algoritmy přidány k
                                převodu textu jako u algoritmů symetrických.
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
                <h3>Porovnání šifrovacích algoritmů</h3>
                <p>V této sekci se nachází tabulka porovnávající rychlost jednotlivých algoritmů na základě šifrování
                    malého textového souboru (0.5 MB) a
                    velkého textového souboru (5 MB)<br/>
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
                    <h3>Šifrování v praxi</h3>
                    <p>
                        V této části se nachází přístup do dvou databázových tabulek. Obě tabulky zobrazují, jak je
                        důležité
                        pracovat se zašifrovanými daty v případě úniku dat z databáze.
                    </p>
                    <div class="d-flex justify-content-center mt-4">
                        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#addAccount">Přidat účet
                        </button>
                        <form action="db/removeAccounts.php" method="post">
                            <button type="submit" class="btn btn-primary me-3" name="removeBtn" value="Submit">Odstranit
                                uživatele
                            </button>
                        </form>
                        <form action="db/loadDefault.php" method="post">
                            <button type="submit" class="btn btn-primary" name="removeBtn" value="Submit">Načti test.
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
                                <h5 class="modal-title" id="addAccountLabel">Nový účet do DB</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form action="db/addAccounts.php" target="_blank" method="post" autocomplete="off">
                                <div class="modal-body">
                                    <div>
                                        <label for="username" class="col-form-label">Uživatelská přezdívka</label>
                                        <input type="text" class="form-control" name="username" id="username"
                                               maxlength="30"
                                               placeholder="Zadej přezdívku" required>
                                    </div>
                                    <div>
                                        <label for="password" class="col-form-label">Heslo</label>
                                        <input class="form-control" type="password" name="password" id="password"
                                               maxlength="30"
                                               placeholder="Zadej vymyšlené heslo" required>
                                    </div>
                                    <div>
                                        <label for="customMessage" class="col-form-label">Vlastní zkušební
                                            zpráva</label>
                                        <input type="text" class="form-control" name="customMessage" id="customMessage"
                                               maxlength="100"
                                               placeholder="Zadej vymyšlenou zprávu (max 100 znaků)" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zavřít
                                    </button>
                                    <button class="btn btn-primary" type="submit" data-bs-dismiss="modal" name="addBtn"
                                            value="Submit">Přidat uživatele
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="shadow p-4 mt-4">
                    <h4 class="text-center">Tabulka bez šifrování hesel</h4>
                    <table id="notSafe" class="table table-dark table-striped table-bordered table-sm">
                        <thead class="thead">
                        <tr class="text-white">
                            <th scope="col" class="th-sm">ID</th>
                            <th scope="col" class="th-sm">Přezdívka</th>
                            <th scope="col" class="th-sm">Heslo</th>
                            <th scope="col" class="th-sm">Zpráva</th>
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
                    <h4 class="text-center">Tabulka se šifrováním hesel - Blowfish</h4>
                    <table id="safe" class="table table-dark table-striped table-bordered table-sm">
                        <thead class="thead">
                        <tr class="text-white">
                            <th scope="col" class="th-sm">ID</th>
                            <th scope="col" class="th-sm">Přezdívka</th>
                            <th scope="col" class="th-sm">Heslo</th>
                            <th scope="col" class="th-sm">Zpráva</th>
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
            <h5 class="pt-1">Tato webová stránka je projektem bakalářské práce - Zdeněk Hejzlar ©2022</h5>
            <h5 class="pt-1">Stranka je vhodna k vyuce kryptografie na FIM</h5>
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
		