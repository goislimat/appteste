//Função para mostrar e esconder um campo com base no tipo de
//usuário escolhido
function changePropOnCourseSelect(value)
{
    if(value != 1)
    {
        $('.course').hide().prev().hide();
        $('.course').prop('disabled', true);
        $('.course option:first').prop('selected', true);
    }
    else
    {
        $('.course').show().prev().show();
        $('.course').prop('disabled', false);
    }
}

$('.user-type').on('change', function()
{
    changePropOnCourseSelect(this.value);
});

$(window).on('load', function() 
{
    changePropOnCourseSelect($('.user-type').val());
});


//Definições de máscara
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