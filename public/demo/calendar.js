$(function () {
    $.fn.hasScroll = function (axis) {
        var overflow = this.css("overflow"),
            overflowAxis;

        if (typeof axis == "undefined" || axis == "y") overflowAxis = this.css("overflow-y");
        else overflowAxis = this.css("overflow-x");

        var bShouldScroll = this.get(0).scrollHeight > this.innerHeight();

        var bAllowedScroll = (overflow == "auto" || overflow == "visible") ||
                             (overflowAxis == "auto" || overflowAxis == "visible");

        var bOverrideScroll = overflow == "scroll" || overflowAxis == "scroll";

        return (bShouldScroll && bAllowedScroll) || bOverrideScroll;
    };

    $.fn.mousedown = function (data, fn) {
        if (fn == null) {
            fn = data;
            data = null;
        }
        var o = fn;
        fn = function (e) {
            if (!inScrollRange(e)) {
                return o.apply(this, arguments);
            }
            return;
        };
        if (arguments.length > 0) {
            return this.bind("mousedown", data, fn);
        }
        return this.trigger("mousedown");
    };

    $.fn.mouseup = function (data, fn) {
        if (fn == null) {
            fn = data;
            data = null;
        }
        var o = fn;
        fn = function (e) {
            if (!inScrollRange(e)) {
                return o.apply(this, arguments);
            }
            return;
        };
        if (arguments.length > 0) {
            return this.bind("mouseup", data, fn);
        }
        return this.trigger("mouseup");
    };

    $.fn.mousedownScroll = function (data, fn) {
        if (fn == null) {
            fn = data;
            data = null;
        }
        var o = fn;
        fn = function (e) {
            if (inScrollRange(e)) {
                e.type = "mousedownscroll";
                return o.apply(this, arguments);
            }
            return;
        };
        if (arguments.length > 0) {
            return this.bind("mousedown", data, fn);
        }
        return this.trigger("mousedown");
    };

    $.fn.mouseupScroll = function (data, fn) {
        if (fn == null) {
            fn = data;
            data = null;
        }
        var o = fn;
        fn = function (e) {
            if (inScrollRange(e)) {
                e.type = "mouseupscroll";
                return o.apply(this, arguments);
            }
            return;
        };
        if (arguments.length > 0) {
            return this.bind("mouseup", data, fn);
        }
        return this.trigger("mouseup");
    };

    var RECT = function () {
        this.top = 0;
        this.left = 0;
        this.bottom = 0;
        this.right = 0;
    }

    function inRect(rect, x, y) {
        return (y >= rect.top && y <= rect.bottom) &&
               (x >= rect.left && x <= rect.right)
    }

    var scrollSize = measureScrollWidth();

    function inScrollRange(event) {
        var x = event.pageX,
            y = event.pageY,
            e = $(event.target),
            hasY = e.hasScroll(),
            hasX = e.hasScroll("x"),
            rX = null,
            rY = null,
            bInX = false,
            bInY = false

        if (hasY) {
            rY = new RECT();
            rY.top = e.offset().top;
            rY.right = e.offset().left + e.width();
            rY.bottom = rY.top + e.height();
            rY.left = rY.right - scrollSize;

            //if(hasX) rY.bottom -= scrollSize;
            bInY = inRect(rY, x, y);
        }

        if (hasX) {
            rX = new RECT();
            rX.bottom = e.offset().top + e.height();
            rX.left = e.offset().left;
            rX.top = rX.bottom - scrollSize;
            rX.right = rX.left + e.width();

            //if(hasY) rX.right -= scrollSize;
            bInX = inRect(rX, x, y);
        }

        return bInX || bInY;
    }

    function measureScrollWidth() {
        var scrollBarMeasure = $('<div />');
        $('body').append(scrollBarMeasure);
        scrollBarMeasure.width(50).height(50)
            .css({
                overflow: 'scroll',
                visibility: 'hidden',
                position: 'absolute'
            });

        var scrollBarMeasureContent = $('<div />').height(1);
        scrollBarMeasure.append(scrollBarMeasureContent);

        var insideWidth = scrollBarMeasureContent.width();
        var outsideWitdh = scrollBarMeasure.width();
        scrollBarMeasure.remove();

        return outsideWitdh - insideWidth;
    };

    $(document).on("mousedown", function (e) {
        //Determine if has scrollbar(s)
        if (inScrollRange(e)) {
            $(e.target).trigger("mousedownScroll");
        }
    });

    $(document).on("mouseup", function (e) {
        if (inScrollRange(e)) {
            $(e.target).trigger("mouseupScroll");
        }
    });
});

(function ($) {
    var day_labels = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
    var month_labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

    // mongolian
    day_labels = ['Да', 'Мя', 'Лх', 'Пү', 'Ба', 'Бя', 'Ня'];
    month_labels = ['1 сар', '2 сар', '3 сар', '4 сар', '5 сар', '6 сар', '7 сар', '8 сар', '9 сар', '10 сар', '11 сар', '12 сар'];

    var days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    var current_date = new Date();
    var tpl = "";
    tpl += "<div class=\"calendar-container calendar-grey\">";
    tpl += "	<div class=\"calendar-wrapper-date\">";
    tpl += "		<div class=\"calendar-input-date\">";
    //tpl += "			<input aria-describedby=\"calendar-help\" aria-hidden=\"true\" placeholder=\"Enter date\" \/>";
    tpl += "			<span>Жил сонгох</span>";
    tpl += "		<\/div>";
    tpl += "		<div aria-hidden=\"true\" class=\"calendar-year-dropdown\">";
    tpl += "			<select>";
    tpl += "				<option value=\"2016\">2016<\/option>";
    tpl += "				<option value=\"2015\">2015<\/option>";
    tpl += "				<option value=\"2014\">2014<\/option>";
    tpl += "			<\/select>";
    tpl += "		<\/div>";
    tpl += "	<\/div>";
    tpl += "	<div aria-hidden=\"true\" class=\"calendar-header\">";
    tpl += "		<div class=\"thead\">";
    tpl += "			<div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"0\">";
    tpl += "					Mo";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"1\">";
    tpl += "					Tu";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"2\">";
    tpl += "					We";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"3\">";
    tpl += "					Th";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"4\">";
    tpl += "					Fr";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"5\">";
    tpl += "					Sa";
    tpl += "				<\/div>";
    tpl += "				<div class=\"calendar-week-day\" data-week-day=\"6\">";
    tpl += "					Su";
    tpl += "				<\/div>";
    tpl += "			<\/div>";
    tpl += "		<\/div>";
    tpl += "	<\/div>";
    tpl += "	<div aria-hidden=\"true\" class=\"scroll-view calendar-scroll-view\">";
    tpl += "		<div class=\"_table\">";
    tpl += "			";
    tpl += "		<\/div>";
    tpl += "	<\/div>";
    tpl += "	<div class=\"calendar-help\" id=\"calendar-help\" style=\"display: none;\">";
    tpl += "		<div class=\"calendar-help-description\">";
    tpl += "			Specify the desired date. After filling the fields, press";
    tpl += "			Enter. Examples of how you can set the date.";
    tpl += "		<\/div>";
    tpl += "		<ul tabindex=\"0\">";
    tpl += "			<li class=\"calendar-help-caption\">Examples<\/li>";
    tpl += "			<li>26 January 2015<span class=\"special-hidden\">,<\/span><\/li>";
    tpl += "			<li>26.01.2015<span class=\"special-hidden\">,<\/span><\/li>";
    tpl += "			<li>January 2015<span class=\"special-hidden\">,<\/span><\/li>";
    tpl += "			<li>yesterday<span class=\"special-hidden\">,<\/span><\/li>";
    tpl += "		<\/ul>";
    tpl += "	<\/div>";
    tpl += "<\/div>";
        
    function build(year, month, context) {
        year = (isNaN(year) || year == null) ? current_date.getFullYear() : year;
        month = (isNaN(month) || month == null) ? current_date.getMonth() : month;

        var html = '';

        var firstDay = new Date(year, month, 1);
        var startingDay = firstDay.getDay();
        var monthLength = days_in_month[month];

        // Date.getDay -> Su = 0, Mon = 1, ..
        // so let's apply small fix
        if (startingDay > 0) {
            startingDay--;
        } else {
            startingDay = 6;
        }

        // compensate for leap year
        if (month == 1) { // February only!
            if ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0) {
                monthLength = 29;
            }
        }

        var monthName = month_labels[month];

        html += '<div class="calendar-month-header">' + monthName + ', ' + year + '</div>';

        // now start first row
        html += '<div class="calendar-row">';

        var day = 1;
        // this loop is for is weeks (rows)
        for (var i = 0; i < 9; i++) {
            // this loop is for weekdays (cells)
            for (var j = 0; j <= 6; j++) {
                var printDay = day <= monthLength && (i > 0 || j >= startingDay);

                html += '<div class="calendar-day';

                if (printDay) {
                    if (context.year == year && context.month == month && context.day == day) {
                        html += ' active';
                    }

                    var title = '';
                    for (var k = 0; k < context.entries.length; k++) {
                        var e = context.entries[k];
                        if (e.year == year && e.month == month && e.day == day) {
                            html += ' enabled';
                            title = e.count + ' record(s)';
                        }
                    }
                }                

                html += '" data-year="' + year + '" data-month="' + month + '" data-day="' + day + '" data-week-day="' + j + '"';
                html += ' title="' + title + '"';                

                html += '>';

                if (printDay) {
                    html += day;
                    day++;
                } else {
                    html += '•';
                }
                html += '</div>';
            }
            // stop making rows if we've run out of days
            if (day > monthLength) {
                break;
            } else {
                html += '</div>';
                html += '<div class="calendar-row">';
            }
        }

        html += '</div>';

        return html;
    }

    function getPreviousYM(year, month) {
        month--;
        if (month < 0) {
            month = 11;
            year--;
        }

        return { year: year, month: month };
    };

    function getNextYM(year, month) {
        month++;
        if (month > 11) {
            month = 0;
            year++;
        }

        return { year: year, month: month };
    };

    function compareYM(x, y) {
        if (x.year > y.year) {
            return 1;
        } else if (x.year < y.year) {
            return -1;
        }

        if (x.month > y.month) {
            return 1;
        } else if (x.month < y.month) {
            return -1;
        }

        if (typeof x.day != undefined && typeof y.day != undefined) {
            return x.day - y.day;
        }

        return 0;
    };

    function getCombinedHeight(elems) {
        var v = 0;
        elems.each(function (x) {
            v += $(this).outerHeight(true);
        });
        return v;
    };

    $.fn.calendar = function (options) {
        var settings = $.extend({}, {
            year: null,
            month: null,
            day: null,

            minYear: null,
            maxYear: null,

            entries: [],

            onSelect: null
        }, options);

        var minYear = settings.minYear;
        var maxYear = settings.maxYear;
        var maxEntries = 5;

        // sort by ascending year
        settings.entries.sort(function (x, y) { return x.year - y.year; });

        if (minYear == null && settings.entries.length > 0) {
            minYear = settings.entries[0].year;
        }
        if (maxYear == null && settings.entries.length > 0) {
            maxYear = settings.entries[settings.entries.length - 1].year;
        }

        if (maxYear == null) {
            maxYear = current_date.getFullYear();
        }

        if (minYear == null) {
            minYear = maxYear - 12;
        }
                
        var maxEntry = null;
        var minEntry = null;

        for (var i = 0; i < settings.entries.length; i++) {
            var c = settings.entries[i];
            if (minEntry == null || compareYM(c, minEntry) == -1) {
                minEntry = c;
            }

            if (maxEntry == null || compareYM(c, maxEntry) == 1) {
                maxEntry = c;
            }
        }

        if (maxEntry == null) {
            maxEntry = { year: settings.year || current_date.getFullYear(), month: settings.month || current_date.getMonth() };
        }

        if (minEntry == null) {
            minEntry = { year: minYear, month: 0 };
        }

        return this.each(function () {
            // plugin
            var elem = $(this);
            var html = $(tpl);            
            var pos = elem.offset();
            var groups = [];
            var timer = null;

            var year = settings.year;
            var month = settings.month;
            var day = settings.day;

            if (year == null || month == null) {                
                year = current_date.getFullYear();
                month = current_date.getMonth();
                day = current_date.getDate();
            }

            var cym = { year: year, month: month };
            if (!(compareYM(cym, minEntry) != -1 && compareYM(cym, maxEntry) != 1)) {
                year = minEntry.year;
                month = minEntry.month;
                day = 1;
            }

            var years = html.find('.calendar-year-dropdown select');
            years.empty();

            for (var i = maxYear; i >= minYear; i--) {
                years.append('<option value="' + i + '">' + i + '</option>');
            }

            var days = html.find('.calendar-header .thead > div');
            days.empty();

            for (var i = 0; i < day_labels.length; i++) {
                days.append('<div class="calendar-week-day" data-week-day="' + i + '">' + day_labels[i] + '</div>');
            }

            html.css({
                position: 'absolute',
                top: pos.top + $(this).height() + 15,
                left: pos.left,
            }).hide();
                        
            html.appendTo(document.body);
                        
            elem.click(function () {                
                if (html.hasClass('calendar-open')) {                    
                    hideDropdown();
                } else {                    
                    showDropdown();
                }
            });

            years.change(function () {
                buildFrom($(this).val(), 0);
            });            
                        
            // now build initial entries
            var scroll = html.find('.calendar-scroll-view');
            var table = html.find('._table');
            var header = html.find('.calendar-header');

            setDate(year, month, day);

            function showDropdown() {
                html.show();

                if (!html.hasClass('calendar-open')) {
                    html.addClass('calendar-open');
                }
            };

            function hideDropdown() {
                html.hide().removeClass('calendar-open');
            };

            function buildFrom(y, m) {
                groups = [];
                table.empty();

                for (var i = 0; i < 3; i++) {
                    var tym = { year: y, month: m };
                    if (!(compareYM(tym, minEntry) != -1 && compareYM(tym, maxEntry) != 1)) {
                        continue;
                    }

                    var ui = $(build(y, m, getBuildContext()));

                    groups.push({
                        year: y,
                        month: m,
                        ui: ui
                    });

                    var ym = getPreviousYM(y, m);
                    y = ym.year;
                    m = ym.month;

                    if (y < minYear) {
                        break;
                    }

                    table.append(ui);
                }
                
                onReachTop();
            };            

            function onReachTop() {
                if (groups.length == 0) {
                    return;
                }

                var first = groups[0];
                var ym = getNextYM(first.year, first.month);

                if (compareYM(ym, maxEntry) == 1) {
                    return;
                }

                if (groups.length >= maxEntries) {                    
                    groups.pop().ui.remove();
                }                

                var ui = $(build(ym.year, ym.month, getBuildContext()));
                groups.unshift({
                    year: ym.year,
                    month: ym.month,
                    ui: ui
                });

                table.prepend(ui);

                var addedHeight = getCombinedHeight(ui);
                scroll.scrollTop(addedHeight - 7);
            };

            function onReachBottom() {
                if (groups.length == 0) {
                    return;
                }

                var last = groups[groups.length - 1];
                var ym = getPreviousYM(last.year, last.month);

                if (compareYM(ym, minEntry) == -1) {
                    return;
                }
                                
                if (groups.length >= maxEntries) {                    
                    groups.shift().ui.remove();
                }

                var ui = $(build(ym.year, ym.month, getBuildContext()));
                
                groups.push({
                    year: ym.year,
                    month: ym.month,
                    ui: ui
                });

                table.append(ui);

                var addedHeight = getCombinedHeight(ui);
                if (groups.length >= maxEntries) {
                    scroll.scrollTop(scroll.scrollTop() - addedHeight + 7);
                }
            };

            function getBuildContext() {
                return {
                    year: year,
                    month: month,
                    day: day,
                    entries: settings.entries
                };
            };

            function setDate(y, m, d, close) {
                if (typeof close == undefined) {
                    close = true;
                }

                year = y;
                month = m;
                day = d;

                buildFrom(y, m);

                elem.html(month_labels[m] + ', ' + y);

                if (close) {
                    hideDropdown();
                }                
            };

            var lastScrollY = 0;
            var working = false;
            function checkScrollPosition() {
                var delta = scroll.scrollTop() - lastScrollY;
                //console.log(scroll.scrollTop() + ',' + scroll.height() + ',' + (scroll.scrollTop() + scroll.height()) + '->' + table.height());

                var worker = null;
                if (scroll.scrollTop() + scroll.height() >= table.height() && delta >= 0) {
                    worker = onReachBottom;
                } else if (scroll.scrollTop() == 0) {
                    worker = onReachTop;
                }

                if (worker && !working) {
                    working = true;

                    if (timer) {
                        clearTimeout(timer);
                    }

                    timer = setTimeout(function () {
                        worker();

                        working = false;
                    }, 200);
                }

                lastScrollY = scroll.scrollTop();
            };

            scroll.scroll(function (ev) {
                checkScrollPosition();
            });

            scroll.mouseupScroll(function (ev) {
                checkScrollPosition();
            });
            
            scroll.mouseup(function (ev) {
                
            });

            scroll.on('mouseenter', '.calendar-day', function (ev) {
                var trigger = $(this);
                var wd = trigger.data('week-day');
                var active = header.find('.hover');
                active.removeClass('hover');

                var th = header.find('[data-week-day="' + wd + '"]');
                if (!th.hasClass('hover')) {
                    th.addClass('hover');
                }
            });

            scroll.on('click', '.calendar-day', function (ev) {
                var trigger = $(this);
                var y = trigger.data('year');
                var m = trigger.data('month');
                var d = trigger.data('day');

                setDate(y, m, d);

                if (settings.onSelect) {
                    settings.onSelect.apply(this, [{ year: y, month: m + 1, day: d }]);
                }
            });

            scroll.mouseleave(function (ev) {
                header.find('.calendar-week-day').each(function () {
                    $(this).removeClass('hover');
                });
            });

            $(document).mouseup(function (ev) {
                if (!html.is(ev.target) // if the target of the click isn't the container...
                    && html.has(ev.target).length === 0 && // ... nor a descendant of the container
                    !elem.is(ev.target)) // nor the trigger element
                {
                    hideDropdown();
                }
            });

            $(window).on(app.event.AJAXIFY_NAVIGATING, function (e) {
                hideDropdown();
                html.remove();
            });

            var help = html.find('.calendar-help');
            var input = html.find('.calendar-input-date');
            var dropdown = html.find('.calendar-year-dropdown');

            if (app.lang == 'mn-MN') {
                input.find('input').attr('placeholder', 'Огноогоо оруулна уу');

                var l = "2016 оны 1 сар 31\n2016.1.31\n2016 он 1 сар\nөчигдөр".split('\n');

                help.find('.calendar-help-description').html("Огноогоо оруулаад Enter товч дарна уу.");
                var examples = help.find('ul');

                examples.empty();

                examples.append('<li class=\"calendar-help-caption\">Жишээ<\/li>')
                for (var i = 0; i < l.length; i++) {
                    examples.append('<li>' + l[i] + '<span class=\"special-hidden\">,<\/span><\/li>');
                }
            }

            input.find('input').focus(function (ev) {
                dropdown.hide();
                header.hide();
                scroll.hide();
                help.show();

                input.css({width: '96%'});
            }).blur(function (ev) {
                dropdown.show();
                help.hide();
                header.show();
                scroll.show();

                input.css({ width: '' });
            }).keypress(function (ev) {
                if (ev.which == 13) {
                    ev.preventDefault();

                    var dt = Date.parse($(this).val());

                    console.log(dt);

                    if (dt) {
                        var ym = { year: dt.getFullYear(), month: dt.getMonth() };

                        if (compareYM(ym, minEntry) != -1 && compareYM(ym, maxEntry) != 1) {
                            setDate(dt.getFullYear(), dt.getMonth(), dt.getDate(), false);

                            $(this).blur().val('');
                        } else {
                            app.ui.alert('Уучлаарай, таны оруулсан огноонд хамаарах мэдээлэл байхгүй байна.');
                        }
                    }                   
                }                
            });
        });
    };
})(jQuery);