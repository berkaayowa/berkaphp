/*
 ////////////////////////////////////////////////////////////////
 /////////// Framwork JavaScript functions//////////////////////
 ///////////////////////////////////////////////////////////////
 */

$app = {
    initBerkaPhp:function(){},
	initFlash:function(){},
    initError:function(){},
    initAjax:function(){}
};

/*
////////////////////////////////////////////////////////////////
/////////// initBerkaPhp
///////////////////////////////////////////////////////////////
 */

$app.initBerkaPhp = function(){
    $app.initError();
    $app.initAjax();
};

/*
 ////////////////////////////////////////////////////////////////
 /////////// initFlash
 ///////////////////////////////////////////////////////////////
 */

$app.initFlash = function(){

    $msgBox = $('.console');
    $message = $('#message');

    setTimeout(function() {
        if($message.text().trim() != '') {
            $msgBox.fadeIn(1000);//.delay(2000).fadeOut(150);
        }

        $('[data-close-message]').on('click', function() {
            if($msgBox.hasClass('display_debug')) {
                $msgBox.removeClass('display_debug');
                $msgBox.fadeOut(1000);
            }
        });
    }, 100);

    $flash = $('.flash');

    if($flash.text().trim() != "") {
        $flash.removeClass("hide").delay(3000).fadeOut(150);
    }
};

/*
 ////////////////////////////////////////////////////////////////
 /////////// initAjax
 ///////////////////////////////////////////////////////////////
 */

$app.initAjax = function(){

    $("[data-ajax]").each(function() {
        $(this).on('click', function() {
            var getUrl = $(this).data("ajax");
            var panelName = $(this).attr("panel");

            $.ajax({
                url:getUrl,
                type:"GET",
                data: {

                },
                success:function(data){
                    $('#'+panelName).html(data);
                },
                error:function(){

                }
            });
        });
    });
};

$app.initError = function(){
    $error = $('table.xdebug-error');
};



