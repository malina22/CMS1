/**
 * jQuery Wave Text Effect
 */

(function($) {

    $.waveText = function(element, options) {
        var that = this;
        // default settings
        var defaults = {
            period: 0.5,
            letterSpacing: 18,
            amplitude: 20
        }
        that.settings = {}

        // initialization
        that.init = function() {
            that.settings = $.extend({}, defaults, options);
            that.splitToLetters($(element));
            that.doWave(that.settings);
        }

        // split to letters (insert span elements)
        that.splitToLetters = function(el) {
            var letters = el.text().split('');
            var content = '';
            for (var i = 0; i < letters.length; i++ ) {
                content += '<span>' + letters[i] + '</span>';
            }
            el.empty().append(content);
        }

        // main method
        that.doWave = function(options) {
            that.settings = $.extend({}, defaults, options);
            $(element).css({
                position: 'relative'
            });
            var deg = 0;
            var y = 0;
            var m = 0; // memory
            var i = 0;
            var css;
            $(element).children().each(function(){
                y = Math.round(Math.sin(that.settings.period*i) * that.settings.amplitude);
                if (y > m) {
                    deg = that.settings.amplitude;
                } else {
                    deg = -that.settings.amplitude;
                }
                if ((Math.abs(y) == that.settings.amplitude) || (i == 0)) deg = 0;
                m = y; // set memory
                css = {'position': 'absolute','top':y+'px','left':(i * that.settings.letterSpacing)+'px','-webkit-transform':'rotate('+deg+'deg)','-moz-transform':'rotate('+deg+'deg)','-ms-transform':'rotate('+deg+'deg)','-o-transform':'rotate('+deg+'deg)','transform':'rotate('+deg+'deg)'};
                $(this).css(css);
                i++;
            });
        }

        that.init(); // initialize
    }

    $.fn.waveText = function(options) {
        return this.each(function() {
            if (undefined == $(this).data('waveText')) {
                var plugin = new $.waveText(this, options);
                $(this).data('waveText', plugin);
            }
        });
    }

})(jQuery);