$(document).ready(function(){
    
//   Header Search Focus 
const searchModal = document.getElementById('searchModal');
const searchInput = document.querySelector('.header-search-input');
searchModal.addEventListener('shown.bs.modal', function () {
    searchInput.focus();
});


});

