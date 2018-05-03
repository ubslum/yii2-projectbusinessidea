var pid = jQuery("#pid").val();
var t = jQuery("#t").val();
// setTimeout(function(){
//     window.location.replace("ket-qua-bao-cao/"+pid+"-"+t);
// }, 3000);

function UrlExists(url)
{
    var response = jQuery.ajax({
        url: url,
        type: 'HEAD',
        async: false
    }).status;

    return (response != "200") ? false : true;
}
function myLoop () {           //  create a loop function
    if(UrlExists("/images/pdf/"+pid+"-1.png")){
        //redirect to view
        setTimeout(function(){
            alert('aaa');
            window.location.replace("bao-cao-danh-gia-y-tuong-kinh-doanh/ket-qua-bao-cao/"+pid+"-"+t);
        }, 3000);
    }else{
        setTimeout(function () {
            myLoop();
        }, 1000)
    }
}
myLoop();
