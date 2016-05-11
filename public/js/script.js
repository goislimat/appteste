$('.optional-slide').on('click', function() {
    var clicked = $(this);
    var icon = clicked.children('.btn').children('.glyphicon');

    clicked.next('.optional').slideToggle();

    (icon.hasClass('glyphicon-chevron-down'))
        ? icon.removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up')
        : icon.removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
});

//Função para mostrar e esconder um campo com base no tipo de
//usuário escolhido
function changePropOnCourseSelect(value)
{
    var course = $('.course');

    if(value != 1)
    {
        course.hide().prev().hide();
        course.prop('disabled', true);
        $('.course option:first').prop('selected', true);
    }
    else
    {
        course.show().prev().show();
        course.prop('disabled', false);
    }
}

$(window).on('load', function() 
{
    changePropOnCourseSelect($('.user-type').val());
});

$('.user-type').on('change', function()
{
    changePropOnCourseSelect(this.value);
});

/*
* Exibe mensagem caso haja tentativa de exclusão
* */
$(document).on('submit', '.form-delete', function() {
    return confirm('Tem certeza que deseja excluir esse item?');
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