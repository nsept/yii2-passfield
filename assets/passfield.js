;(function($, window, document, undefined) {
    function Passfield(element, options) {
        this.$element = $(element);
        this.options = $.extend({}, Passfield.Defaults, options);

        this._prepare();
        this._bind();
    }

    Passfield.prototype._bind = function() {
        var base = this;

        this.$addon.bind('click.passfield', function(e) {
            e.preventDefault();

            if(base.$element.attr('type') == 'password') {
                base.$element.attr('type', 'text');
                base.$addon.empty().append(base.options.iconHide);
                base.$addon.attr('title', base.options.titleHide);
            } else {
                base.$element.attr('type', 'password');
                base.$addon.empty().append(base.options.iconShow);
                base.$addon.attr('title', base.options.titleShow);
            }
        });
    };

    Passfield.prototype._prepare = function() {
        this.$addon = this.$element.parent().find('.passfield-addon');
        this.$addon.append(this.options.iconShow);
        this.$addon.attr('title', this.options.titleShow);
    };

    Passfield.Defaults = {
        iconShow: '<span class="glyphicon glyphicon glyphicon-eye-open">',
        iconHide: '<span class="glyphicon glyphicon-eye-close">',
        titleShow: 'Show password',
        titleHide: 'Hide password'
    };

    $.fn.passfield = function(option) {
        return this.each(function() {
            var $this = $(this),
                data = $this.data('passfield');

            if (!data) {
                data = new Passfield(this, typeof option == 'object' && option);
                $this.data('passfield', data);
            }
        });
    };
})(window.jQuery, window, document);
