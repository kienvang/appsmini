function showTooltip(x, y, contents) {
    $("<div id='tooltip' class='chart-tooltip'>" + contents + "</div>").css({
        top: y + 5,
        left: x + 5,
    }).appendTo("body").fadeIn(200);
}

var previousPoint = null;
function chartTooltip(element){
    $(element).bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {

                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                console.log(item);

                showTooltip(item.pageX, item.pageY,"aaaaa");
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
}

function chartTooltipBar(element){
    $(element).bind("plothover", function (event, pos, item) {
        if (item) {
            if (previousPoint != item.dataIndex) {

                previousPoint = item.dataIndex;

                $("#tooltip").remove();
                var y = formatMoney(item.datapoint[1]);
                var label_x = item.series.data[item.dataIndex][0];


                showTooltip(item.pageX, item.pageY, label_x + ' : ' + y);
            }
        } else {
            $("#tooltip").remove();
            previousPoint = null;
        }
    });
}

$(function(){
    $('.table-gridview').on('click', '.pagination a', function(){
        var href = $(this).attr('href');

        $('#report-grid').yiiGridView('update', {
            'type' : 'post',
            url: href,
            data: $('#report-submit-data-form').serialize()
        });

        return false;
    });

    $('#myTab a[href=#data]').click();

    if ($("#report-grid tr td.empty").length == 0){
        $('#grid-action').show();

        if ($("#tab-report").length)
            $('html, body').animate({
                scrollTop: $("#tab-report").offset().top - 100
            }, 1000);
        else
            $('html, body').animate({
                scrollTop: $("#report-grid").offset().top
            }, 1000);

    }
});