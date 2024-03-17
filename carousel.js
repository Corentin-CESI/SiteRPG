$(document).ready(function(){
    // Sélectionnez le conteneur du carrousel et le premier jeu
    var carousel = $('#carousel');
    var firstGame = carousel.children('.game').first();

    // Calculez la largeur totale du carrousel
    var carouselWidth = carousel.width();
    var gameWidth = firstGame.outerWidth(true);
    var totalWidth = gameWidth * carousel.children('.game').length;

    // Clonez les jeux pour le défilement infini
    carousel.append(carousel.html());

    // Animez le carrousel
    function scrollCarousel() {
        carousel.animate({left: '-=' + gameWidth}, 500, function(){
            if (carousel.css('left') == '-' + totalWidth + 'px') {
                carousel.css('left', 0);
            }
        });
    }

    // Démarrez le défilement automatique
    var scrollInterval = setInterval(scrollCarousel, 2000);

    // Arrêtez le défilement lorsque la souris est sur le carrousel
    carousel.mouseenter(function(){
        clearInterval(scrollInterval);
    });

    // Reprenez le défilement lorsque la souris quitte le carrousel
    carousel.mouseleave(function(){
        scrollInterval = setInterval(scrollCarousel, 2000);
    });
});