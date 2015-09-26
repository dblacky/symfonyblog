$(document).ready(function() {
    var tmp1=$(window).scrollTop()-50;
    var tmp2=$(window).scrollTop()+50;
    $(window).scroll(function(){
        if($(window).scrollTop()>=tmp2){
            tmp1=$(window).scrollTop()-50;
            tmp2=$(window).scrollTop()+50;
            $('.headline').fadeOut(100);
        }else if($(window).scrollTop()<=tmp1){
            tmp1=$(window).scrollTop()-50;
            tmp2=$(window).scrollTop()+50;
            $('.headline').fadeIn(100);
        }
    });
});