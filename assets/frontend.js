jQuery(function($) {
    var entry = popmagique_config.entry_popup;
    if (entry.enabled) {
        setTimeout(function() {
            $('#popmagique-entry-popup').fadeIn();
        }, parseInt(entry.delay, 10) || 0);
    }

    var exitCfg = popmagique_config.exit_popup;
    var exitShown = false;
    function showExit() {
        if (exitCfg.enabled && !exitShown) {
            $('#popmagique-exit-popup').fadeIn();
            exitShown = true;
        }
    }

    $(document).on('mouseleave', function(e) {
        if (e.clientY <= 0) {
            showExit();
        }
    });

    $('.popmagique-close, .popmagique-backdrop').on('click', function() {
        $(this).closest('.popmagique-popup').fadeOut();
    });

    $('.popmagique-subscribe-form').on('submit', function(e) {
        e.preventDefault();
        var form = $(this);
        var email = form.find('input[name="email"]').val();

        $.post(popmagique_config.ajax_url, {
            action: 'popmagique_subscribe_email',
            nonce: popmagique_config.nonce,
            email: email
        }, function(response) {
            var message = form.next('.popmagique-response');
            if (response.success) {
                form.hide();
                message.text(response.data).show();
            } else {
                message.text(response.data).show();
            }
        });
    });

});
