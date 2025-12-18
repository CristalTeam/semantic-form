<?php
use Carbon\Carbon;

$months = [];
for ($m = 1; $m <= 12; $m++) {
    $months[] = Carbon::create(2000, $m, 1)
        ->translatedFormat('F');
}

$days = [];
$start = Carbon::create(2024, 1, 7);

for ($d = 0; $d < 7; $d++) {
    $days[] = mb_strtoupper(
        mb_substr(
            $start->copy()->addDays($d)->translatedFormat('l'),
            0,
            1
        )
    );
}

$months = json_encode($months, JSON_UNESCAPED_UNICODE);
$days   = json_encode($days, JSON_UNESCAPED_UNICODE);

?>

<script>
    $(function () {
        $('.ui.calendar.date').each(function (idx, elm) {
            elm = $(elm);
            var format = elm.data('datepicker-format');

            if (!format) {
                format = 'YYYY/MM/DD';
            }

            elm.calendar({
                type: 'date',
                formatter: {
                    date: function (date, settings) {
                        if (!date) {
                            return '';
                        }
                        var DD = ("0" + date.getDate()).slice(-2);
                        var MM = ("0" + (date.getMonth() + 1)).slice(-2);
                        var MMMM = settings.text.months[date.getMonth()];
                        var YY = date.getFullYear().toString().substr(2, 2);
                        var YYYY = date.getFullYear();

                        return format.replace('DD', DD).replace('MMMM', MMMM).replace('MM', MM).replace('YYYY', YYYY).replace('YY', YY);
                    }
                },
                text: {
                    days: {!! $days !!},
                    months: {!! $months !!}
                }
            });
        });
    });
</script>
