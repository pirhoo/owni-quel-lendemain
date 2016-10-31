<?php
    /** HP APP
    * @author Pierre Romera - pierre.romera@gmail.com
    * @version 1.0
    * @desc La page d'accueil de l'application
    */

    // Cette constante est une sécurité pour les includes
    define("SAFE_PLACE", "FD622N18U8h7y4Xs76cO80QX5AfOWkvg");
    
    // Cette constante est essentielle au bon fonctionement de l'app,
    // elle indique le dossier rassemblant toutes les librairies php, js et le thème css
    // (tout ce qui est inclue d'une façon ou d'une autre)
    define("INC_DIR", "./includes/");

    // le coeur de l'application, c-a-d toute ce qu'il faut charger
    // ou définir avant de commencer à travailler...
    require_once(INC_DIR."init.core.php");
?>
<!DOCTYPE html>
<html xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="fr" lang="fr">
    <head>
            <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=990">


            <title><?php __(0); ?> - <?php __(1); ?></title>


            <!-- LE THÈME DE BASE -->
            <link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold,bolditalic&subset=latin' rel='stylesheet' type='text/css'>
            <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:extralight,light,regular,bold&subset=latin' rel='stylesheet' type='text/css'>
            <link type="text/css" rel="stylesheet" href="<?php echo THEME_DIR; ?>style.css" media="screen" />

            <!-- Pour utiliser JQUERY et JQUERY UI-->
            <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-1.4.2.min.js"></script>
            
            <!-- Pour générer des infobulles personnalisées -->
            <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-roro-hidden-title.js"></script>
            <!-- Des fonctions utiles homemade -->
            <script type="text/javascript" src="<?php echo JS_DIR; ?>roro-utils.js"></script>
            <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery-roro-center.js"></script>
            
            <!-- l'APP -->
            <script type="text/javascript" src="<?php echo JS_DIR; ?>class.App.js"></script>

            <script type="text/javascript" src="<?php echo JS_DIR; ?>jquery.scrollTo-min.js"></script>

            <script type="text/javascript">
                var myapp;

                $(document).ready(function () {
                    // centre les éléments avec la classe .center millieu de l'écran (ici l'app)
                    $(".center").center();

                    // cache le mask si on lui clique dessus
                    // sauf si il contient la classe "hold"
                    $("#mask").click(function () {
                        
                        // une classe hold permet de bloquer la fermeture du mask
                        if( ! $(this).hasClass("hold") ) {

                            // pas de fondu sur IPAD et IPHONE
                            if(RR_UTILS.isApple())
                                $(this).hide(0);
                            else
                                $(this).stop().fadeOut(300);
                        }
                    });

                    $(".pays.active").click(function () {
                        var pays = new Array("DE", "BG", "IT", "FR", "UK");

                        // LANCE L'APP
                         myapp = new App("<?php echo MEDIA_DIR; ?>" + pays[ $(this).index() ] + "/");
                    });

                });
            </script>

            <style type="text/css">
                #workspace {
                    background-image:url("<?php echo THEME_DIR; ?>img/bg-home-<?php echo LANG; ?>.jpeg");
                }
            </style>
    </head>
    <body onload="window.scrollTo(0, 1)">

        <?php
            // Hoot essentiel au bon fonctionement de l'API Facebook
            // (ici, plusieurs outils sont réuni dans une classe FBconnect)
            $FB->doFBhoot();
        ?>

        <!-- L'APP en elle même, de 990x667 -->
        <div id="app" class="center">

            <!-- Une surcouche sur la div APP avec un overflow hidden de 990x667 -->
            <div id="overflow">

                <!-- Là où l'application se déroule -->
                <div id="workspace">
                    <div id="home">
                        
                        <div class="pays allemagne active">
                            <?php __(10); ?>
                        </div>
                        
                        <div class="pays bulgarie active">
                            <?php __(11); ?>
                        </div>

                        <div class="pays italie active">
                            <?php __(12); ?>
                        </div>

                        <div class="pays france active">
                            <?php __(13); ?>
                        </div>

                        <div class="pays uk active">
                            <?php __(14); ?>
                        </div>
                        
                    </div>



                    <div id="road" style="width:990px;">
                        
                        <div class="women">
                            <img src="<?php echo THEME_DIR."img/women.png"; ?>" alt="" />
                        </div>

                        <div class="foreground" style="height:0px; width:990px;">
                            <img src="<?php echo THEME_DIR."img/fg-road.png"; ?>" style="width:990px" alt="" />
                        </div>
                        
                        <div class="slide slide-1">
                            <div class="question" style="top:302px;
                                                        left:305px;
                                                        width:100px;
                                                        height:0px;
                                                        font-size:25px;
                                                        color:#ad3233;">                                
                            </div>
                            
                            <div class="box_droite" style="top:330px;
                                                           left:530px;
                                                           width:200px;
                                                           font-size:20px;
                                                           color:white;
                                                           text-align:center;
                                                           font-weight:bold;
                                                           font-family:'Droid Serif'"></div>

                        </div>

                        
                        <div class="slide slide-2">
                            <div class="question" style="position:absolute;
                                                        top:270px;
                                                        left:100px;
                                                        width:200px;
                                                        font-size:40px;
                                                        color:#91e7f4;">
                            </div>
                            
                            <div class="box_droite question" style="font-size:40px !important;
                                                        height:0px;
                                                        left:497px;
                                                        top:210px;
                                                        width:500px;
                                                        text-align:center;
                                                        color:#91e7f4;">
                            </div>
                        </div>

                        
                        <div class="slide slide-3">
                            <div class="question" style="left:250px;
                                                        top:132px;
                                                        width:500px;"></div>
                            <div class="reponse">
                                <div class="chiffre" style="left:670px;
                                                            top:308px;
                                                            width:140px;"></div>
                                
                                <div class="sous_chiffre" style="left:820px;
                                                                    top:320px;
                                                                    width:140px;">
                                    
                                </div>
                                <div class="box_droite" style="left:670px;
                                                                top:400px;
                                                                width:289px;"></div>
                                <a href="" target="_blank" class="source" style="left:600px;
                                                                                 top:580px;"></a>
                            </div>
                        </div>


                        <div class="slide slide-4">
                            <div class="question" style="left: 45px; 
                                                         top: 170px;
                                                         width: 200px;
                                                         text-align: left;
                                                         font-size: 40px;"></div>
                        </div>


                        <div class="slide slide-5">
                            <div class="question"></div>
                            <div class="reponse">
                                <div class="chiffre" style="left:47px;
                                                            top:60px;"></div>
                                <div class="sous_chiffre" style="left:196px;
                                                                 top:84px;
                                                                 width:120px;"></div>
                                <div class="box_droite" style="left:47px;
                                                                  top:140px;
                                                                  width:290px;"></div>
                                <a href="" target="_blank" class="source" style="top:480px;"></a>
                            </div>
                        </div>


                        <div class="slide slide-6">
                            <div class="question" style="font-size:40px;
                                                            left:655px;
                                                            top:220px;
                                                            width:200px;"></div>
                        </div>

                        
                        <div class="slide slide-7">
                            <div class="question" style="font-size:25px;
                                                        left:709px;
                                                        top:211px;
                                                        width:200px;"></div>
                            <div class="reponse">
                                <div class="chiffre" style="top:20px;
                                                            left:60px"></div>
                                <div class="sous_chiffre" style="left:210px;
                                                                 top:35px;
                                                                 width:155px;"></div>
                                <div class="box_droite" style="left:63px;
                                                                top:95px;
                                                                width:290px;"></div>
                                <a href="" target="_blank" class="source" style="left:226px;
                                                                                 top:300px;"></a>
                            </div>
                        </div>


                        <div class="slide slide-8">
                            <div class="question" style="font-size:50px;
                                                        left:300px;
                                                        top:120px;
                                                        width:400px;"></div>
                            <div class="reponse">
                                <div class="chiffre"></div>
                                <div class="sous_chiffre"></div>
                                <div class="box_droite" style="left:700px;
                                                                text-align:center;
                                                                top:260px;
                                                                width:200px;"></div>
                            </div>
                        </div>

                        <div class="slide slide-9">
                            <div class="question" style="left:300px;
                                                        top:470px;
                                                        width:400px;"></div>
                            <div class="reponse">
                                <div class="chiffre" style="left:660px;
                                                            text-align:left;
                                                            top:34px;
                                                            width:300px;"></div>
                                <div class="sous_chiffre" style="left:663px;
                                                                top:107px;
                                                                width:280px;"></div>
                                <div class="box_droite" style="left:660px;
                                                                top:130px;
                                                                width:280px;"></div>
                                <a href="" target="_blank" class="source" style="left:590px;
                                                                                top:315px;"></a>
                            </div>
                        </div>


                        <div class="slide slide-10">
                            <div class="question" style="left:300px;
                                                        top:105px;
                                                        width:400px;"></div>
                        </div>

                        
                        <div class="slide slide-11">
                            <div class="question" style="font-size:24px;
                                                        left:740px;
                                                        text-align:center;
                                                        top:70px;
                                                        width:200px;"></div>
                            <div class="reponse">
                                <div class="chiffre" style="left:65px;
                                                            text-align:left;
                                                            top:120px;
                                                            width:290px;"></div>
                                <div class="sous_chiffre" style="left:70px;
                                                                    top:190px;
                                                                    width:300px;"></div>
                                <div class="box_droite" style="left:70px;
                                                                top:210px;
                                                                width:280px;"></div>
                                <a href="" target="_blank" class="source" style="left:225px;
                                                                                  top:395px;"></a>
                            </div>

                            <a href="index.php" style="height:41px;
                                                        border:0px;
                                                        text-decoration: none;
                                                        display:block;
                                                        margin-left:724px;
                                                        position:absolute;
                                                        top:500px;
                                                        width:239px;"></a>
                        </div>
                        
                    </div>

                </div>


                <!-- Un masque sombre qui recouvre l'application (pour des popups) -->
                <div id="mask"></div>

                <!-- Barre de partage (cachée) -->
                <div id="footer">

                    <div class="ctrl">
                        <span class="previous" onclick="myapp.previous()">Précédent</span>
                        <span class="next" onclick="myapp.next()">Suivante</span>
                    </div>
                    
                    
                    <!-- Les outils pour partager l'APP (Facebook, Twitter, etc) -->
                    <?php include(INC_DIR."inc.share.php"); ?>

                </div>
                
            </div>
        </div>



        <div class="center inputEmbed">
            <label>
                <?php __(7); ?><br />
                <input onclick="$(this).select()" value='<object src="<?php echo APP_URL; ?>" type="text/html" style="height:667px;990px;"></object>' class="codeEmbed text" id="codeEmbedFrame" />
            </label>
            <input onclick="RR_UTILS.copier( document.getElementById('codeEmbedFrame') )"
                       type="button"
                       value="Copier"
                       class="addTitle copier"
                       title="<?php __(9); ?>" />

            <br /><br /><br />

            <label>
                <?php __(8); ?><br />
                <input onclick="$(this).select()" value='<a href="<?php echo APP_URL; ?>" target="_blank"><img src="<?php echo APP_URL; ?>includes/style/img/apercu_<?php echo LANG; ?>.jpg" alt="Despoticmind" /></a>' class="codeEmbed text" id="codeEmbed" />
            </label>
            <input onclick="RR_UTILS.copier( document.getElementById('codeEmbed') )"
                       type="button"
                       value="Copier"
                       class="addTitle copier"
                       title="<?php __(9); ?>" />
            <br /><br /><br />
        </div>
    </body>
</html>