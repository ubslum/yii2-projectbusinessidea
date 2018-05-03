function goToByScroll(id){
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
        'slow');
}
goToByScroll('newsletter-block');
$('body').on('submit', '#newsletter-form', function() {
    $(this).find('button[type!="button"],input[type="submit"]').attr('disabled',true);
    setTimeout(function(){
        $(this).find('.has-error').each(function(index, element) {
            $(this).parents('form:first').find(':submit').removeAttr('disabled');
        });
    },1000);
});