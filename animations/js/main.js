'use strict';

(function () {
    var words = $('.words-wrapper .words');
    var words_amount = words.find('.word').length;
    var check  = -19 * words_amount;

    console.log(words_amount);
    console.log(parseInt(words.css('top')));

    function wordsAnimate() {
        var top = parseInt(words.css('top')) - 19;

        if (top <= check) {
            top = 0;
        }

        words.delay(300).animate({
            top: top
        }, 500, wordsAnimate);
    }

    wordsAnimate();
})();