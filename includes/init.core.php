<?php

    /** init.core.php
    * @author Pierre Romera - pierre.romera@gmail.com
    * @version 1.0
    * @desc Charge les composants essentiels de l'application
    */

    session_start();
    
    // Nous plaçons cette condition au début de chaque includes
    // elle garanti l'inclusion depuis les fichiers autorisés
    // (fichiers qui définissent la constante avec la bonne valeur)
    if(SAFE_PLACE != "FD622N18U8h7y4Xs76cO80QX5AfOWkvg") die();

    // Fonctions permettant de créer une application multi-langues
    require_once(INC_DIR."func.lang.php");
    // Classe permettant d'établir une connexion avec MySql
    require_once(INC_DIR."class.Mysql.php");
    // Classe permettant de ce connecter à l'aide de Facebook Connect
    require_once(INC_DIR."class.FBconnect.php");

    // On défini la langue de l'application:
    // Si une langue est demandée (en GET), on la défini
    // (seulement un jeu de langue est autorisé dans cette fonction)
    if(!isset($_GET['lang']))
        defineLang();
    else
        defineLang($_GET['lang']);

    
    // Ecran courrant de l'application
    // (typiquement, il serra contenut dans la div #workspace)
    if(!isset($_GET['e']))
        define("ECRAN", 1);
    else
        define("ECRAN", $_GET['e']);

    
    // D'autres implacements indispensables,
    // sous répertoires de INC_DIR:

    // le répertoire qui contient les fichiers de langue
    define("LANG_DIR", INC_DIR."lang/");
    // le répertoire qui contient le style
    define("THEME_DIR", INC_DIR."style/");
    // le répertoire qui contient les javascript
    define("JS_DIR", INC_DIR."js/");
    // le repertoire qui contient les médias (selon la langue)
    define("MEDIA_DIR", "./content/");

    // url de l'APP
    define("APP_URL", "http://".$_SERVER["SERVER_NAME"].str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]) );
    
    // On configure ici Facebook Connect:
    // L'ID de l'APP Facebook
    // (conf http://www.facebook.com/developers/ )
    define('FACEBOOK_APP_ID', '');
    
    // Passphrase de l'APP Facebook
    define('FACEBOOK_SECRET', '');
    

    /* @var $FB FBconnect */
    $FB = new FBconnect(FACEBOOK_APP_ID, FACEBOOK_SECRET, false);
    global $FB;

    // EXEMPLE ---------------
    // Force une pseudo connexion à l'aide d'un token personalisé...
    // Pour trouver un token http://developers.facebook.com/docs/api
    // $FB->startSimulation("2227470867|2.SakT0iMxpIxR0_wjxTl_yA__.3600.1284400800-686299757|YYEFvSxQQMxlf3V3joSiGVPWo4I");
    // -----------------------
    
    // MySQL
    /* @var $database dbMySQL */
    $database = new dbMySQL("DESPOTIC-MIND", "root", "rootmdp", "localhost");
    global $database;
    
    // Etablis la connexion à la BDD
    $database->connection();


?>
