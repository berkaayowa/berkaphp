/*
 ////////////////////////////////////////////////////////////////
 /////////// Framwork JavaScript functions//////////////////////
 ///////////////////////////////////////////////////////////////
 */

var berkaPhpJs = {};

/*
 ////////////////////////////////////////////////////////////////
 /////////// initFlash
 ///////////////////////////////////////////////////////////////
 */

berkaPhpJs.initFlash = function(){

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
        $flash.removeClass("hide").delay(6000).fadeOut(150);
    }

};

/*
 ////////////////////////////////////////////////////////////////
 /////////// initAjax
 ///////////////////////////////////////////////////////////////
 */

berkaPhpJs.initAjax = function(){

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

berkaPhpJs.initForm = function(){

    $('[data-form]').each(function() {

        $(this).on('submit', function(e) {
            $dataErrorMessage = $(this).find('[data-error-message]');
            $(this).find('[data-required]').each(function() {
                if ($(this).val().trim() == "") {
                    $(this).addClass("data-required");
                    e.preventDefault();
                    $dataErrorMessage.fadeIn(100);
                } else {
                    $(this).removeClass("data-required");
                    $dataErrorMessage.fadeOut(100);
                }
            });
        });

    });

};

berkaPhpJs.showProgress = function(text) {
    $('.processing_msg').text(text);
    $('.loading').fadeIn(120);
    $('body').addClass('hover-f-hidden');
}

berkaPhpJs.hideProgress = function() {
    $('.loading').fadeOut(120);
    $('body').removeClass('hover-f-hidden');
}

berkaPhpJs.InfoBar = function(messageType, text) {

    var infobar = $('.alert.alert-success.info-message');
    infobar.text('');
    infobar.text(text);

    if(messageType == 'error') {
        infobar.removeClass('alert-success').addClass('alert-danger')
    } else {
        infobar.removeClass('alert-danger').addClass('alert-success')
    }

    if(infobar.text().trim() != "") {
        infobar.removeClass("hide").delay(3000).fadeOut(150);
    }
};

/*
 ////////////////////////////////////////////////////////////////
 /////////// initBerkaPhp
 ///////////////////////////////////////////////////////////////
 */

berkaPhpJs.init = function(){

    if ($('[data-date]').length > 0) {
        $('[data-date]').each(function () {

            var format = $(this).data("format") == undefined ? $(this).find('input').data("format") : $(this).data("format");

            $(this).datetimepicker({
                format: format
            });
        });
    }
    berkaPhpJs.initAjax();
    berkaPhpJs.initForm();
    berkaPhpJs.initFlash();
};

$(document).ready(function() {
    berkaPhpJs.init();
});



