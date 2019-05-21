$(document).ready(function(){

    $('#logout').on('click',function(){
       $(this).closest('form').submit();
    });


    $('[data-ctoggle]').on('click',function(){
       var toggle = $(this).data('ctoggle');
       $('#' + toggle).toggle();
    });
});