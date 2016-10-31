
function App(mediaDir) {

    this.mediaDir   = mediaDir;
    this.step = 0;
    this.locked = false;
    this.autoscroll = true;

    // mes slides
    this.slides = new Array();

    this.init = function () {

        var app = this;

        // charge les slides
        $.getJSON( app.mediaDir + 'slides.json', function(data) {

            // créait les objets Slide
            for(i in data)
                app.slides.push( data[i] );

            app.start(0);

        });
    }
    
    this.start = function (step, autoscroll) {

        var app = this;
        var slide = $(".slide:eq("+step+")");
        
        app.autoscroll = (autoscroll === undefined) ? true : autoscroll;
        app.step = step;

        $("#road").fadeIn(700);
        $(".ctrl").fadeIn(700);
        
        $(".question:first", slide).html(     app.slides[step].question     );
        $(".box_droite:first", slide).html(   app.slides[step].box_droite   );
        $(".chiffre:first", slide).html(      app.slides[step].chiffre      );
        $(".sous_chiffre:first", slide).html( app.slides[step].sous_chiffre );
        $(".source:first", slide).attr("href",app.slides[step].source       );

       // anime le changement d'étape
       $("#road").animate({marginTop: (step + 1) *-667}, 1000);
       $(".women").animate({top:370 + (step * 667) + app.slides[ step ].decalage}, 1001, function () {

            if(app.autoscroll)
                setTimeout(function () {

                    // passe au suivant si il y a un suivant
                    if(step + 1 < app.slides.length) {

                       // récursivité, rappel la fonction pour passer à l'étape suivante'
                       if(app.autoscroll)
                            app.start(step + 1);

                    }

                }, 8000);

        });
    }

    this.next = function () {
        if(this.step + 1 < this.slides.length)
            this.start(this.step +1, false);
    }


    this.previous = function () {
        if(this.step > 0)
            this.start(this.step - 1, false);
    }

    this.init();
    app = this;

    $(function () {
        $(window).keydown(function(e){

            switch (e.keyCode) {
                case 38: // flèche gauche
                    app.previous();
                    break;
                case 40: // flèche droite
                    app.next();
                    break;
            }

        });
    });


}