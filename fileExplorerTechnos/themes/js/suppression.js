/* **************************************************
Script ajax permettant de supprimer un element d'un click sur
un des bouttons
*/

$('button').on( "click", function(e) {
    
    e.preventDefault();
    // ce script va retourner une "response" de type XMLHttpRequest
    $.ajax({
        type: 'POST',
        url: 'functions/remove.php',
        data :  {
            file: this.dataset.file, 
        },
        success: function () {
            location.reload();
        }
    });
});