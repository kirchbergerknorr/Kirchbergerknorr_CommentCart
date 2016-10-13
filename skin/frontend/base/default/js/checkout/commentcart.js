(function($) {

    var currentUpdate = null;
    var timerHandle = null;
    var isTimerRunning = false;
    var updateInterval = 750;

    /**
     * Timer object to start ajax request when comment typing has ceased,
     * with slight delay, timer will reset when typing resumes during delay
     */
    var startCommentTimer = new function () {
        this.run = function () {
            if(isTimerRunning) {
                clearTimeout(timerHandle);
            }
            else {
                isTimerRunning = true;
            }

            timerHandle = setTimeout(function () {
                isTimerRunning = false;
                timerHandle = null;
                updateComment();
            }, updateInterval);
        }
    };


    var updateComment = function() {
        var commentElement = $('#commentcart');
        var comment = commentElement.val();
        currentUpdate = $.ajax({
            type: 'POST',
            url: Mage.baseUrl + '/commentcart/',
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
    $(document).on('keypress', '#commentcart', startCommentTimer.run);
} (jQuery));
