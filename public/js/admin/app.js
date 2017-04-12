// Table
$('table input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var checkState = '';

$('.check-action input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.check-action input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.check-action input#check-all').on('ifChecked', function () {
    checkState = 'all';
    countChecked();
});
$('.check-action input#check-all').on('ifUnchecked', function () {
    checkState = 'none';
    countChecked();
});

function countChecked() {
    if (checkState === 'all') {
        $(".check-action input[name='table_records']").iCheck('check');
    }
    if (checkState === 'none') {
        $(".check-action input[name='table_records']").iCheck('uncheck');
    }

    var checkCount = $(".check-action input[name='table_records']:checked").length;

    if (checkCount) {
        $('.column-title').hide();
        $('.check-actions').show();
        $('.action-cnt').html(checkCount + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.check-actions').hide();
    }
}