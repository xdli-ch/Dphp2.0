//datetimepicker 函数封装
$(function() {
    if ($('input.search-date').length > 0) {
        $.datetimepicker.setLocale('ch');
        $('input.search-date').datetimepicker({
            datepicker: true,
            timepicker: false,
            scrollMonth: true,
            scrollTime: true,
            scrollInput: false,
            format: 'Y-m-d',
        });

        $('input.search-date').change(function () {
            $(this).parents('form').find('.js-set-time').removeClass('active')
        })
    }

    if ($('input.search-time').length > 0) {
        $.datetimepicker.setLocale('ch');
        $('input.search-time').datetimepicker({
            datepicker: false,
            timepicker: true,
            scrollMonth: true,
            scrollTime: true,
            scrollInput: false,
            format: 'H:i:00',
        });
    }

    if ($('input.search-datetime').length > 0) {
        $.datetimepicker.setLocale('ch');
        $('input.search-datetime').datetimepicker({
            datepicker: true,
            timepicker: true,
            scrollMonth: true,
            scrollTime: true,
            scrollInput: false,
            format: 'Y-m-d H:i:00',
        });
    }
});