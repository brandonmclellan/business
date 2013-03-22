//Loads the feature slider for the main page.
jQuery(function($){
        $('#bulletCycle').on('cycled', function(e){
            $('.cycle-nav > li', this)
                    .removeClass('active')
                    .eq(e.relatedIndex)
                        .addClass('active');
        });
    });