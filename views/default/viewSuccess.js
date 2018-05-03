// jQuery(".alert-success").append( '<br /> <div class="pdf-msg">Đang xử lý xuất pdf, xin vui lòng chờ...</div>' );
function UrlExists(url)
{
    var response = jQuery.ajax({
        url: url,
        type: 'HEAD',
        async: false
    }).status;

    return (response != "200") ? false : true;
}
var pid = jQuery("#pid").val();
function exportPDF () {
    $.ajax({
        url: "/projectbusinessidea/default/report?pid="+pid,
        data: "",
        type: 'GET',
        success: function (resp) {
            jQuery(".pdf-msg").html( '<a href="/projectbusinessidea/default/report?pid='+pid+'" download>Nhấn vào đây để tải báo cáo về.</a>' );
        }
    });
    return false;
}

function myLoop () {           //  create a loop function
    //  call a 3s setTimeout when the loop is called
    if(UrlExists("/images/pdf/"+pid+"-1.png")){
        var link=document.createElement('a');
        link.href="#";
        // link.download="";
        link.onclick = function(){exportPDF(); return false;};
        link.click();
    }else{
        setTimeout(function () {
            myLoop();
        }, 1000)
    }
}

myLoop();