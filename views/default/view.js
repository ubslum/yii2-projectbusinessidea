/**
 * Created by shini on 5/24/2017.
 */
$(document).on('click', '.viewmore', function(){
    var qid = $(this).attr('qid');
    $.ajax({
        url: "projectbusinessidea/default/ajax-question-content",
        data: {"pid" : $('#pid').val(), "qid" : qid},
        type: "POST",
        beforeSend: function( xhr ) {
            // alert('aaa');
        }
    }).done(function( data ) {
        // alert(data);
        $('#modalContent').html(data);
        $('#question-content').modal('show');
    });

    return false;
});