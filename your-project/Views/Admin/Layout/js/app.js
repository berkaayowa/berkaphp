

$app = {
	initAdmin:function(){},
	initHome:function(){},
	initNoAdmin:function(){},
	initList:function(){},
	initImageUpload:function(){},
	initFlash:function(){},
    initError:function(){}
};

$app.initList = function() {
	$('[data-limit-char]').each(function(){
		var length = $(this).data('limit-char');

		$target = $(this).text();
		if($target.length > length) {
			$(this).text($target.substring(0,length)+"...");
		}
	});
}

$app.initImageUpload = function(){
	$upload_btn = $('[data-upload-image]');
	$image = $('#image-box');
	$upload_btn.on('click', function(){
		var upload_link = $('[data-file]').val();
		$image.src=upload_link;
		alert(upload_link);
	});
}

$app.initFlash = function(){

    $msgBox = $('.alert.alert-success.success-alert');
    $message = $('#message');

    setTimeout(function() {
        if($message.text().trim() != '') {
            $msgBox.fadeIn(1000).delay(2000).fadeOut(150);
        }

        $('[data-close-message]').on('click', function() {
            if($msgBox.hasClass('display_debug')) {
                $msgBox.removeClass('display_debug');
                $msgBox.fadeOut(1000);
            }

        });
    }, 100);
}

$app.initHome = function(){
    $app.initError();
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

}

$app.initError = function(){
    $error = $('table.xdebug-error');

}

// $.ajax({
//     data: $("form").serialize(),
//     //etc.
// });


