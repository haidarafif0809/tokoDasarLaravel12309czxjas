
$('.js-selectize-reguler').selectize({
 sortField: 'text'
});

$('.js-selectize-multi').selectize({
  sortField: 'text',
  delimiter: ',',
  maxItems: null,
});

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    daysOfWeekDisabled: '0,6',
    daysOfWeekHighlighted: '0,6',
    autoclose: true,
});

$('.clockpicker').clockpicker({
    placement: 'bottom',
    align: 'left',
    autoclose: true,
    'default': '07:00'
});
