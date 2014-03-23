function getNodeParent(mthis, tag){
    if (mthis.length <= 0) return null;
    var parent = mthis.parent();
    do{
        if (parent[0].nodeName.toLowerCase() == 'body'){
            return null;
        }else{
            if (tag.indexOf('#') != -1 && tag.substring(1) == parent.attr('id')){
                return parent;
            }else if (tag.indexOf('.') != -1 && parent.hasClass(tag.substring(1))){
                return parent;
            }else if(parent[0].tagName.toLowerCase() == tag.toLowerCase())
                return parent;
        }
        parent = parent.parent();

    }while(true);
    return null;
}

function formatMoney(num){
    var n = parseInt(num, 10),
        c = 0,
        d = ",",
        t = ".",
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    var str = s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    return str + ' đ';
}

function updateFormat(ele){
    $(ele).autoNumeric('init', {vMax: '9999999999', aSep:'.', aDec:',', mDec:0, aSign:' ₫', pSign:'s' });
}

function stringToMoney(str){
    var numb = parseInt(str.replace(/[. ₫]+/g, ''), 10);
    return isNaN(numb) ? 0 : numb;
};

/*
function formatMoney(number) {
    return number.formatCurrency();
}
*/

function isInt(n) {
    return n % 1 === 0;
}

$(document).ready(function(){
    $('.datepicker').datepicker();
    $('.timepicker').timepicker();
    $('.datetimepicker').datetimepicker({
        format: 'dd/MM/yyyy hh:mm',
        'pickSeconds': false
    });
    $('.amountInput').autoNumeric('init', {vMax: '9999999999', aSep:'.', aDec:',', mDec:0, aSign:' ₫', pSign:'s' });
    $('.amountFormat').each(function(){
        var n = parseInt($(this).text(), 10),
            c = 0,
            d = ",",
            t = ".",
            s = n < 0 ? "-" : "",
            i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
            j = (j = i.length) > 3 ? j % 3 : 0;
        var str = s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        $(this).html(str + ' ₫');
    });
});