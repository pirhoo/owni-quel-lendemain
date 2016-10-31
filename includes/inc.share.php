<?php

    /** init.share.php
    * @author Pierre Romera - pierre.romera@gmail.com
    * @version 1.0
    * @desc Charge les boutons de partage de l'application.
    */

    // Nous plaçons cette condition au début de chaque includes
    // elle garanti l'inclusion depuis les fichiers autorisés
    // (fichiers qui définissent la constante avec la bonne valeur)
    if(SAFE_PLACE != "FD622N18U8h7y4Xs76cO80QX5AfOWkvg") die();
    
    define("DOC_URL"   , "http://hackthepress.net/2010/09/28/owni-la-pilule-de-quel-lendemain/");
    define("DOC_TITLE" , "[APP] La pilule de quel Lendemain ?");
    define("DOC_TWUSER", "owni");
    define("FB_FAN", "http://www.facebook.com/OWNI.fr");
?>

<script type="text/javascript">
    
    // Affiche le code d'embed pour les apps
    function doEmbed() {
        $("#mask").fadeIn(500);
        $(".inputEmbed").fadeIn(500);

        // cache l'embed au click sur le masque
        $("#mask").click(function () {
            $(".inputEmbed").fadeOut(500);
        });
    }


    function showFooter() {
        $("#footer").css({ backgroundImage:'url("<?php echo THEME_DIR."img/logo-open.png" ?>")' });
        $("#footer .toggle").show();
        $("#footer .powered img").attr("src", "<?php echo THEME_DIR."img/logo-hover.png" ?>");
    }

    function hideFooter() {
        $("#footer").css({ backgroundImage:'none' });
        $("#footer .toggle").hide();
        $("#footer .powered img").attr("src", "<?php echo THEME_DIR."img/logo.png" ?>");
    }


    $(function () {
        $("#footer .powered").mouseenter(function () {  showFooter();  });
        $("#footer").mouseleave(function () {  hideFooter();  });
    });

    if( RR_UTILS.isApple() )  {
        $("#footer").click(   function () {  showFooter(); });
        $("#workspace").click(function () {  hideFooter(); });
    }
    
 </script>


<!-- Logo de OWNI, idéalement toujours présent sur les app -->
<a href="<?php echo DOC_URL; ?>" class="powered"><img src="<?php echo THEME_DIR."img/logo.png"; ?>" alt="" /></a>


<div class="like toggle">
    <span class="share"  title="<?php __(6); ?>">
        <fb:like href="<?php echo FB_FAN; ?>" layout="button_count" show_faces="false" width="160" action="recommend" font="verdana"></fb:like>
    </span>
</div>


<div class="sharing toggle">

    <a class="share mini-share-mail bg-white"
       target="_blank"
       title="<?php __(4); ?>"
       href='http://www.addtoany.com/email?linkurl=<?php echo  rawurlencode(DOC_URL);  ?>&linkname=<?php echo   rawurlencode(DOC_TITLE);  ?>&t=<?php echo rawurldecode(DOC_TITLE); ?>'>
        <img alt="share mail" src="<?php echo THEME_DIR."img/mini-email.png"; ?>" /> email
    </a>

    <a class="share mini-embed bg-white"
       href="#"
       title="<?php __(5); ?>"
       onclick="doEmbed()">
        &lt;integrer&gt;
    </a>
    
    <span class="share twitter"
          title="<?php __(2); ?>">
        <a href="http://twitter.com/share" 
           class="twitter-share-button"
           data-url="<?php echo DOC_URL; ?>"
           data-text="<?php echo DOC_TITLE; ?>"
           data-count="horizontal" 
           data-via="<?php echo DOC_TWUSER; ?>">Tweet</a>
        <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    </span>
    
    <a class="share facebook" 
       title="<?php __(3); ?>"
       name="fb_share"
       type="button-count"
       share_url="<?php echo DOC_URL;  ?>"
       href="http://www.facebook.com/sharer.php">Partager</a>
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

</div>
