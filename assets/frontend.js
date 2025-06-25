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

});
