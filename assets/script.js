
$('.modalErrorconnection').modal('toggle');

$('.modalErrorinscription').modal('toggle');

$('.modalErrorevent').modal('toggle');


/////////////////////////////////////////popover//////////
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});

////////bouton scroll to top//////////
//When the user scrolls down 20 px from the top of the document, show the button
window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
////lors du click sur les boutons supprimer
        $('.delete-event').click(function () {
    //tu vas me récupérer l'id de l'evenement dans l'attribut data-delete-id
    //data-delete-id se trouve dans le bouton supprimer de ma card
    ///dataset = pour récupérer les attributs data-.....
    $eventId = $(this)[0].dataset.deleteId; // Obtenir le data-delete-id="" dans le bouton supprimer
    //on va chercher l'id du bouton confirmer du modal et à partir de ce moment
    //on va pointer sur mesevenements.php?id
    $('#validateDeleteEvent')[0].href = 'mesevenements.php?id=' + $eventId
});
//on a créé cet événement dans le javascript pour ne pas multiplier le modal dans la vue
//on a déplacé les liens le bouton supprimer de la card vers le bouton confirmer suppr du modal
//et le bouton confirmer du modal reprend l'id de l'event pour la suppression de mon événement