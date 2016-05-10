$(document).ready(function() {
    $('.time').mask('00:00:00');
    $('.date-input').mask('00/00/0000');
    
    $('#dateRangePicker')
    .datepicker({
        format: 'dd/mm/yyyy',
        startDate: '01/01/2016',
        endDate: '31/12/2020'
    });
});