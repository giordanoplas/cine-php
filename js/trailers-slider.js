(function() {

    var current = 0;
    
    $(document).ready(function() {
        var numImages = 12;
        if (numImages <= 1) {
            $('.right-arrow').css('display', 'none');
            $('.left-arrow').css('display', 'none');
        }

        $('.left-arrow').on('click', function() {
            if (current > 0) {
                current = current - 3;
            } else {
                current = numImages - 3;
            }

            $(".carrusel").animate({"left": - ($('#product_' + current).position().left)}, 500);

            return false;
        });

        $('.left-arrow').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });

        $('.right-arrow').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });

        $('.right-arrow').on('click', function() {
            if (numImages > current + 3) {
                current = current + 3;
            } else {
                current = 0;
            }

            $(".carrusel").animate({"left": - ($('#product_' + current).position().left)}, 500);

            return false;
        }); 
    });

}())