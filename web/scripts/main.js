$(function()
{
    //Верхнее меню - появление нижнего уровня меню
    $('.menu ul li').hover(function () {
        clearTimeout($.data(this,'timer'));
        $('ul',this).stop(true,true).slideDown(200);
    }, function () {
        $.data(this,'timer', setTimeout($.proxy(function() {
            $('ul',this).stop(true,true).slideUp(200);
        }, this), 100));
    });


    //слайдер - появление переключателей слайдов
    $('#slider, .slider_wrap').hover(function() {
        $("span.glyphicon-circle-arrow-left, span.glyphicon-circle-arrow-right") .css("display","block");
    },function(){
        $("span.glyphicon-circle-arrow-left, span.glyphicon-circle-arrow-right") .css("display","none");
    });


    //заказать звонок - Всплывающее окно
    $('a#go').click( function(event){
        event.preventDefault();
        $('#overlay').fadeIn(400,
            function(){
                $('#modal_form')
                    .css('display', 'block')
                    .animate({opacity: 1, top: '5%'}, 200);
            });
    });
    /* Зaкрытие мoдaльнoгo oкнa, тут делaем тo же сaмoе нo в oбрaтнoм пoрядке */
    $('#modal_close, #overlay').click( function(){
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,
                function(){
                    $(this).css('display', 'none');
                    $('#overlay').fadeOut(400);
                }
            );
    });


    //fancybox
    $('.fancybox').fancybox();

});
