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
        $flash.removeClass("hide").delay(6000).slideUp(150);
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

    $("[data-ajax-onload]").each(function() {

        function request() {

            var panelName = $(this);
            var getUrl = $(this).data("ajax-onload");

            $.ajax({
                url:getUrl,
                type:"GET",
                data: {

                },
                success:function(data){
                    $(panelName).html(data);
                },
                error:function(){

                }
            });

        }

        $(this).bind("request", request);
        $(this).trigger('request');

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

    if ($('[data-editor]').length > 0) {
        //$('[data-editor]').wysihtml5();
        $('[data-editor]').each(function() {

            //var currentElement = $(this);
            //
            //var input = $('<input>')
            //    .attr('type', 'hidden')
            //    .attr('name', $(this).data('id'))
            //    .attr('id', $(this).data('id'))
            //    .val($(this).val());

           // currentElement.parent('div').append(input);

            $(this).wysihtml5({
                events: {
                    'change': function(){

                       //$('#' + currentElement.data('id')).val(currentElement.val());
                        //console.log()
                    }
                }
            })
        });


        // $('[data-editor]').each(function() {
        //    var currentElement = $(this);
        //    $(currentElement).Editor({
        //        onContentChanged: function(content) {
        //            currentElement.val($(currentElement).Editor('getText'));
        //        }
        //    });
        //    $(currentElement).Editor("setText", currentElement.val());
        //
        //
        // });

         $('[data-editor]').each(function() {
            //$(this).on('focusout', function() {
            //    $(this).val(this.val().trim());
            //})

             //var currentElement = $(this);
             //
             //$('[data-editor]').summernote({
             //    callbacks: {
             //        onChange: function(contents, $editable) {
             //
             //        }
             //    }
             //});

         });


       // $('[data-editor]').summernote();
       // $('[data-editor]').summernote({
       //     callbacks: {
       //         onChange: function(contents, $editable) {
       //             console.log('onChange:', contents, $editable);
       //         }
       //     }
       // });

        //$('[data-editor]').wysihtml5({
        //    "font-styles": true, //Font styling, e.g. h1, h2, etc. Client true
        //    "emphasis": true, //Italics, bold, etc. Client true
        //    "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Client true
        //    "html": true, //Button which allows you to edit the generated HTML. Client false
        //    "link": true, //Button to insert a link. Client true
        //    "image": true, //Button to insert an image. Client true,
        //    "color": false //Button to change color of font
        //});

    }

    $('#ajaxLoader').loader({
        setGif: function(){
            return "/View/Client/Assets/loader.gif";
        }
    });

    $('#notification').notification({
        duration: 8000,
        icons:{
            success: 'fa fa-check',
            error: 'fa fa-exclamation-triangle',
            warning: 'fa fa-exclamation-circle'
        }
    });

    berkaPhpJs.initAjax();
    berkaPhpJs.initForm();
    berkaPhpJs.initFlash();
};

var request = {
    url: null,
    type: null,
    data: null
}

berkaPhpJs.request = function(request, callback) {

    var settings = {
        url: null,
        type: 'GET',
        data: {},
        message: 'Processing...'
    };

    request = $.extend(settings, request);

    $('#notification').notification('hide');
    $('#ajaxLoader').loader('setMessage', request.message).loader('show');

    $.ajax({
        url:request.url,
        type:request.type,
        data: request.data,
        success: function(response){

            $('#ajaxLoader').loader('hide');
            response = $.parseJSON(response);

            $('#notification').notification('setMessage', response.message);

            if(response.success == true && response.message != false) {
                $('#notification').notification('show', 'success');
            } else if(response.error == true && response.message != false) {
                $('#notification').notification('show', 'error');
            }

            callback(true, response);

        },
        error: function(){

            $('#ajaxLoader').loader('hide');
            $('#notification').notification('setMessage', 'Oop could not connect to the server, try again');
            $('#notification').notification('show', 'error');

            callback(false, null);

        }
    });
};

$(document).ready(function() {
    berkaPhpJs.init();
});



