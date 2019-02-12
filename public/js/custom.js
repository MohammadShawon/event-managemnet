$('.delete').on('click', function (e) {
    e.preventDefault();
    var form = $(this).parents('form');
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary data!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }, function (isConfirm) {
        if (isConfirm)
            form.submit();
    });
});

$(".cancel").click(function () {
    history.go(-1);
});

$(".js-source-states").select2();
$(".js-source-states-2").select2();

$('.datapicker2').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
});

// $('.datapicker4').datepicker({

// format: 'yyyy-mm-dd',
// endDate: '+0m',
// autoclose: true, 
// onSelect: function(dateText, inst) {
// alert("adf");
// }
// });

$('.datapicker4').datepicker({
    format: 'yyyy-mm-dd',
    endDate: '+0m',
    autoclose: true,
}).on('changeDate', function (ev) {
    showExprience(ev);
});

$(".interger-decimal-only").each(function () {
    $(this).keypress(function (e) {
        var code = e.charCode;

        if (((code >= 48) && (code <= 57)) || code == 0 || code == 46) {
            return true;
        } else {
            return false;
        }
    });
});

function showExprience(ev) {
    var dt1 = ev.date;
    var dt2 = new Date();
    var ret = [{days: 0, months: 0, years: 0}];

    if (dt1 == dt2)
    {
        ret;
    }

    if (dt1 > dt2)
    {
        var dtmp = dt2;
        dt2 = dt1;
        dt1 = dtmp;
    }
    var year1 = dt1.getFullYear();
    var year2 = dt2.getFullYear();
    var month1 = dt1.getMonth();
    var month2 = dt2.getMonth();

    var day1 = dt1.getDate();
    var day2 = dt2.getDate();

    ret['years'] = year2 - year1;
    ret['months'] = month2 - month1;
    ret['days'] = day2 - day1;

    if (ret['days'] < 0)
    {
        var dtmp1 = new Date(dt1.getFullYear(), dt1.getMonth() + 1, 1, 0, 0, -1);

        var numDays = dtmp1.getDate();

        ret['months'] -= 1;
        ret['days'] += numDays;
    }

    if (ret['months'] < 0)
    {
        ret['months'] += 12;
        ret['years'] -= 1;
    }
    $("#joining").html("ISSL Experience: " + ret.years + "  Year " + ret.months + " Month " + ret.days + " Day");
    //console.log(ret);
}


$(".datapicker3").datepicker({
    format: "mm-yyyy",
    startView: "months",
    minViewMode: "months",
    autoclose: true,
});

// Toastr options
toastr.options = {
    "debug": false,
    "newestOnTop": false,
    "positionClass": "toast-top-center",
    "closeButton": true,
    "debug": false,
            "toastClass": "animated fadeInDown",
};

$(".datepicker").datepicker({
    format: "mm-yyyy",
    endDate: '+0m',
    startView: "months",
    minViewMode: "months"
});

$(document).on("changeDate", ".datepicker", function (event) {
    alert('test');
    $(".my_hidden_input").val($(".datepicker").datepicker('getFormattedDate'));
});