$(document).ready(function(){
    $('.wrap-anything-start').each(function(){
        $this = $(this);
        $end = $('.wrap-anything-stop[rel="' + $this.attr('rel') + '"]');
        if ($end.length === 0) {
            return true;
        };
        wrapAnythingPair($this, $end);
    });
});

function wrapAnythingPair($this, $that) {
    rel = $that.attr('rel').replace(/ /g, '-');
    c = 'wrapper-temp-' + rel;
    cc = 'wrapped-' + rel;
    ccc = $this.attr('data-class');
    if ($this.parent().hasClass('ccm-custom-style-container')) {
        ccc += ' ' + $this.parent().attr('class');
        $this.parent().attr('class', '');
    }
    $that.parents().addClass(c);
    $start = $this;
    $stop = $that;
    try {
        if ($this.hasClass(c)) {
            $start = $this.prepend('<div class="wrapper-start-' + rel + '"></div>');
        } else if ($this.parent().hasClass(c)) {
            $start = $this.before('<div class="wrapper-start-' + rel + '"></div>');
        } else {
            $start = $this.parentsUntil('.' + c).last().before('<div class="wrapper-start-' + rel + '"></div>');
        }
        
        $start.parent().addClass('wrapper-tempStop-' + rel);
        
        if ($that.hasClass('wrapper-tempStop-' + rel)) {
            $stop = $that.prepend('<div class="wrapper-end-' + rel + '"></div>');
        } else if ($that.parent().hasClass('wrapper-tempStop-' + rel)) {
            $stop = $that.after('<div class="wrapper-end-' + rel + '"></div>');
        } else {
            $stop = $that.parentsUntil('.wrapper-tempStop-' + rel).last().after('<div class="wrapper-end-' + rel + '"></div>');
        }
        wrapAnythingAddClass(cc, $start, 'wrapper-end-' + rel);
        $('.' + cc).removeClass(cc).wrapAll('<div id="' + rel + '" class="' + ccc + '"></div>');//.removeClass('wrapped-' + $this.attr('data-id'));
    } catch (e) {
        console.log(e, cc);
    }
    $that.parents().removeClass(c);
    $('.wrapper-tempStop-' + rel).removeClass('wrapper-tempStop-' + rel);
    $('.wrapper-start-' + rel).remove();
    $('.wrapper-end-' + rel).remove();
}

function wrapAnythingAddClass(c, $this, endC) {
    $this.addClass(c);
    if (! $this.next().hasClass(endC)) {
        wrapAnythingAddClass(c, $this.next(), endC);
    }
}