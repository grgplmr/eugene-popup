jQuery(document).ready(function($) {
    // Gestion des onglets
    $('.nav-tab').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');

        $('.nav-tab').removeClass('nav-tab-active');
        $(this).addClass('nav-tab-active');

        $('.tab-content').removeClass('active');
        $(target).addClass('active');
    });

    // Sauvegarde des paramètres
    $('#save-settings').on('click', function() {
        var settings = {};

        // Collecter tous les champs du formulaire
        $('input, textarea, select').each(function() {
            var name = $(this).attr('name');
            if (name) {
                var value = $(this).is(':checkbox') ? $(this).is(':checked') : $(this).val();

                // Construire l'objet settings
                var keys = name.replace(/\]/g, '').split('[');
                var current = settings;

                for (var i = 0; i < keys.length - 1; i++) {
                    if (!current[keys[i]]) {
                        current[keys[i]] = {};
                    }
                    current = current[keys[i]];
                }

                current[keys[keys.length - 1]] = value;
            }
        });

        // Envoyer via AJAX
        $.post(popmagique_ajax.ajax_url, {
            action: 'popmagique_save_settings',
            nonce: popmagique_ajax.nonce,
            settings: settings
        }, function(response) {
            if (response.success) {
                $('<div class="notice notice-success is-dismissible"><p>' + response.data + '</p></div>')
                    .insertAfter('.popmagique-header')
                    .delay(3000)
                    .fadeOut();
            } else {
                $('<div class="notice notice-error is-dismissible"><p>Erreur : ' + response.data + '</p></div>')
                    .insertAfter('.popmagique-header');
            }
        });
    });

    // Réinitialiser les paramètres
    $('#reset-settings').on('click', function() {
        if (confirm('Êtes-vous sûr de vouloir réinitialiser tous les paramètres ?')) {
            location.reload();
        }
    });

    // Upload d'image
    $('.upload-image').on('click', function() {
        var button = $(this);
        var input = button.prev('input');

        var frame = wp.media({
            title: 'Choisir une image',
            button: { text: 'Utiliser cette image' },
            multiple: false
        });

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            input.val(attachment.url);
        });

        frame.open();
    });
});
