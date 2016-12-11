(function($, Drupal, drupalSettings){
    var destroy_form;
    $('#edit-entity-follower').hide('true');
    $('#edit-entity-tipster').hide('true');

    $('#edit-profile-utilisateur-follower').click(function () {
        $('#edit-entity-follower').show('true');
        $('#edit-entity-tipster').hide('true');
        destroy_form = '#edit-entity-tipster';
    });

    $('#edit-profile-utilisateur-tipster').click(function () {
        $('#edit-entity-follower').hide('true');
        $('#edit-entity-tipster').show('true');
        destroy_form = '#edit-entity-follower';
    });

    $('#edit-submit').click(function () {
       // alert(destroy_form);
        $('#edit-entity-tipster').show('true');
   document.getElementById('#edit-entity-tipster').innerHTML = '<span></span>';
    });
})(jQuery, Drupal, drupalSettings);
