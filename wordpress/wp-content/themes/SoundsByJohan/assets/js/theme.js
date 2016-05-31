jQuery(document).ready(function($) {



    var app = {
        init: function() {
            nav.$menuButtons = $('nav ul li');
            nav.$menuButtonsMobile = $('nav.mobile ul li');
            app.$bodyHtml = $('body, html');
            app.$sections = $('section');
            app.bindEvents();
            app.blockScroll = false;
        },
        bindEvents: function() {
            nav.$menuButtons.on('click', nav.onClickMenuButton);
            $(window).on('scroll', this.onScroll);
        },
        scrollCooldown: function () {
          setTimeout(function() {
              app.blockScroll = false;
          }, 100);
        },
        onScroll: function () {
            if(app.blockScroll) {
                return;
            }
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();
            if(workSlide.willDeactiveIfScroll) {
                workSlide.setActive(false);
            }
            app.$sections.each(function (i, section) {
                var sectionPosTop = $(section).position().top;
                var sectionHeight = $(section).height();
                var isBelow = sectionPosTop >= scrollTop + (windowHeight * 0.5);
                var isAbove = (sectionPosTop + sectionHeight) < (scrollTop);
                var isActive = !isBelow && !isAbove;
                var sectionIndex = $(section).index();
                if(isActive) {
                    $(section).addClass('anim');
                    nav.$menuButtons.removeClass('active');
                    nav.$menuButtons.eq(sectionIndex).addClass('active');
                    nav.$menuButtonsMobile.eq(sectionIndex).addClass('active');
                    console.log(nav.$menuButtons);
                }
            });
            
            $('html').css('background-position', '0 ' + $(window).scrollTop()*0.5 + 'px');
            $('body').css('background-position', $(window).scrollTop()*-0.1 + 'px ' + $(window).scrollTop()*-0.1 + 'px');
        }
    };
    var nav = {
        onClickMenuButton: function(e) {
            var $clickedEl = $(e.currentTarget);
            var $scrollTarget = $('section.' + $clickedEl.data('target'));
            nav.gotoSection($scrollTarget);
            $('.menu-toggle').attr('checked', false); // Checks it

        },
        gotoSection: function($section) {
            app.$bodyHtml.animate({
                scrollTop: $section.offset().top - $('.main-header').height()
            });
        }
    };
    var workSlide = {
        active: false,
        currentIndex: 0,
        willDeactiveIfScroll: true,
        init: function() {
            this.$el = $('.work-slide');
            this.$overlay = $('.work-slide .overlay');
            this.$workThumbs = $('.work-thumbs li');
            this.$workItems = $('.work-items li');
            this.$inner = $('.work-slide .inner');
            this.$scroller = $('.work-slide .scroller');
            this.$next = this.$el.find('.next');
            this.$prev = this.$el.find('.prev');
            this.numberOfItems = this.$workItems.length;

            this.bind();
        },
        bind: function() {
            this.$workThumbs.on('click', this.onClickWorkThumb);
            this.$overlay.on('click', this.onClickOverlay);
            this.$next.on('click', this.onClickNext);
            this.$prev.on('click', this.onClickPrev);
            this.$inner.on('scroll', this.onMouseEnter);
            this.$inner.on('mouseenter', this.onMouseEnter);
            this.$inner.on('mouseleave', this.onMouseLeave);
        },
        setActive: function(active) {
            this.active = active;
            if (this.active) {
                this.$el.addClass('active');
                this.willDeactiveIfScroll = false;
                nav.gotoSection($('section.work'));
                $('html').css('overflow', 'hidden');
                setTimeout(function () {
                    workSlide.willDeactiveIfScroll = true;
                }, 500);
            } else {
                this.$el.removeClass('active');
            }
        },
        showWorkItem: function(itemIndex) {
            this.$scroller.scrollTop(0);
            if(itemIndex < 0) {
                return;
            } else if(itemIndex > (this.numberOfItems - 1)) {
                return;
            }
            this.currentIndex = itemIndex;
            this.$next.removeClass('hidden');
            this.$prev.removeClass('hidden');
            if(itemIndex === 0) {
                this.$prev.addClass('hidden');
            } else if(itemIndex === (this.numberOfItems - 1)) {
                this.$next.addClass('hidden');
            }
            this.$workItems.removeClass('active');
            this.$workItems.eq(this.currentIndex).addClass('active');
        },
        onScroll: function () {
            nav.gotoSection($('section.work'));
        },
        onMouseEnter: function () {
            app.blockScroll = true;
            app.scrollCooldown();
            $('html').css('overflow', 'hidden');
        },
        onMouseLeave: function () {
            app.blockScroll = true;
            app.scrollCooldown();
            $('html').css('overflow', 'auto');
        },
        onClickPrev: function() {
            var index = workSlide.currentIndex - 1;
            workSlide.showWorkItem(index);
        },
        onClickNext: function() {
            var index = workSlide.currentIndex + 1;
            workSlide.showWorkItem(index);
        },
        onClickOverlay: function(e) {
            workSlide.setActive(false);
        },
        onClickWorkThumb: function(e) {
            var $clickedEl = $(e.currentTarget);
            var workThumbIndex = $clickedEl.index();
            workSlide.showWorkItem(workThumbIndex);
            workSlide.setActive(true);
        }
    };

    app.init();
    workSlide.init();

    //Bakgrundsparallax
    var superParallaxer = {
        posx: 0,
        posy: 0,
        $outer: $('.super-parallaxer'),
        $inner: $('.super-parallaxer > *:first-child'),
        init: function() {
            this.bind();
            this.loop();
        },
        bind: function() {
            $(window).on('scroll', this.onScroll);
        },
        loop: function() {
            setTimeout(function() {
                superParallaxer.posy = $(window).scrollTop();
                superParallaxer.posx++;
                superParallaxer.setBackgroundPos();
                superParallaxer.loop();
            }, 10);
        },
        onScroll: function() {
            superParallaxer.posy = $(window).scrollTop();
        },
        setBackgroundPos: function() {
            this.$outer.css('background-position', (this.posx * -0.05) + 'px ' + (this.posy * 0.2) + 'px');
            this.$inner.css('background-position', (this.posx * -0.1) + 'px ' + (this.posy * 0.4) + 'px')
        }
    };
    superParallaxer.init();
});
