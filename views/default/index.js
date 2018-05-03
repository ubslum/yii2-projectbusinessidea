/**
 * Created by shini on 5/17/2017.
 */

$('.btnNext').click(function(){
    var rs = 0;
    // alert($('.tab-content > .active').find('input'));
    if(chkQChecked() == 1){
        $('.nav-tabs > .active').next('li').find('a').trigger('click');

        if(typeof  $('.nav-tabs > .active').next('li').html() != 'undefined'){
            $('.btnPrevious').show();
            $('.btnNext').show();
            $('.btnNext').html('Tiếp theo');
        }else{
            $('.btnPrevious').show();
            $('.btnNext').hide();
        }
    }else{
        alert("Bạn chưa chọn câu trả lời");
    }
});
chkQChecked = function(){
    var rs = false;
    $('.tab-content > .active').find('input[type="radio"]').each(function(){
        if($(this).is(":checked")){
            rs = true;
            return true;
        }
    });
    return rs;
};
$('.btnPrevious').click(function(){
    $('.nav-tabs > .active').prev('li').find('a').trigger('click');

    if(typeof  $('.nav-tabs > .active').prev('li').html() != 'undefined'){
        $('.btnPrevious').show();
        $('.btnNext').show();
        $('.btnNext').html('Tiếp theo');
    }else{
        $('.btnPrevious').hide();
        $('.btnNext').show();
        $('.btnNext').html('Bắt đầu');
    }
});

$( ".question-answer-block input" ).click(function() {
    name = $(this).attr("optquestion"); //question index
    if($('#answers-store').val() == ''){
        var elems = []
    }else{
        var elems = $('#answers-store').val(); //get answers store
        elems = JSON.parse(elems);
    }
    elems[name] = $(this).val();

    $('#answers-store').val(JSON.stringify(elems)); //store array
});

$('body').on('submit', 'form', function() {
    $(this).find('button[type!=\"button\"],input[type=\"submit\"]').attr('disabled',true);
    setTimeout(function(){
        $(this).find('.has-error').each(function(index, element) {
            $(this).parents('form:first').find(':submit').removeAttr('disabled');
        });
    },1000);
});