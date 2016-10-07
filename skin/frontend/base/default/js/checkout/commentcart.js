(function($) {
    var currentUpdate = null;

    var updateComment = function() {
        var commentElement = $(this);
        var comment = commentElement.val();
        currentUpdate = $.ajax({
            type: 'POST',
            url: '/commentcart/',
            data: {
                comment: comment
            },
            beforeSend: function() {
                if (currentUpdate !== null) {
                    currentUpdate.abort();
                }
            },
            complete: function() {
                currentUpdate = null;
            }
        });
    };
    $(document).on('change', '#commentcart', updateComment);
} (jQuery));