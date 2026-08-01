$(document).ready(function(){
    // Support Toggle
    $('.ft-support-input-wrap').show();
    $('.ft-support-input-hide').on('click', function() {
        $('.ft-support-input-wrap').slideUp(300); 
    });
    $('.ft-support-option').on('click', function() {
        $('.ft-support-input-wrap').slideToggle(300);
    });

 });