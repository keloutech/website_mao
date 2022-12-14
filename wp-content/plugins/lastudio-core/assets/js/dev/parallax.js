function _dpvRefreshScroll() {
    jQuery;
    _dpvScrollTop = window.pageYOffset,
        _dpvScrollLeft = window.pageXOffset
}
function _dpvParallaxAll() {
    _dpvRefreshScroll();
    for (var t = 0; t < _dpvImageParallaxImages.length; t++)
        _dpvImageParallaxImages[t].doParallax()
}
if (function() {
        for (var t = ["ms", "moz", "webkit", "o"], i = 0; i < t.length && !window.requestAnimationFrame; ++i)
            window.requestAnimationFrame = window[t[i] + "RequestAnimationFrame"];
        window.requestAnimationFrame || (window.requestAnimationFrame = function(t, i) {
                return window.setTimeout(function() {
                    t()
                }, 16)
            }
        )
    }(),
    "undefined" == typeof _dpvImageParallaxImages)
    var _dpvImageParallaxImages = [], _dpvScrollTop, _dpvWindowHeight, _dpvScrollLeft, _dpvWindowWidth;
!function(t, i, e, s) {
    function n(i, e) {
        this.element = i,
            this.settings = t.extend({}, o, e),
        "" === this.settings.align && (this.settings.align = "center"),
        "" === this.settings.id && (this.settings.id = +new Date),
            this._defaults = o,
            this._name = a,
            this.init()
    }
    var a = "dpvImageParallax"
        , o = {
        direction: "up",
        mobileenabled: !1,
        mobiledevice: !1,
        width: "",
        height: "",
        align: "center",
        opacity: "1",
        velocity: ".3",
        image: "",
        target: "",
        repeat: !1,
        loopScroll: "",
        loopScrollTime: "2",
        removeOrig: !1,
        zIndex: "-1",
        id: "",
        complete: function() {}
    };
    t.extend(n.prototype, {
        init: function() {
            "" === this.settings.target && (this.settings.target = t(this.element)),
                this.settings.target.addClass(this.settings.direction),
            "" === this.settings.image && "undefined" != typeof t(this.element).css("backgroundImage") && "" !== t(this.element).css("backgroundImage") && (this.settings.image = t(this.element).css("backgroundImage").replace(/url\(|\)|"|'/g, "")),
                _dpvImageParallaxImages.push(this),
                this.setup(),
                this.settings.complete(),
                this.containerWidth = 0,
                this.containerHeight = 0
        },
        setup: function() {
            this.settings.removeOrig !== !1 && t(this.element).remove(),
                this.resizeParallaxBackground()
        },
        doParallax: function() {
            if ((!this.settings.mobiledevice || this.settings.mobileenabled) && this.isInView()) {
                "undefined" == typeof this.settings.inner && (this.settings.inner = this.settings.target[0].querySelectorAll(".parallax-inner-" + this.settings.id)[0]);
                var t = this.settings.inner;
                ("undefined" == typeof this.settings.doParallaxClientLastUpdate || +new Date - this.settings.doParallaxClientLastUpdate > 2e3 + 1e3 * Math.random()) && (this.settings.doParallaxClientLastUpdate = +new Date,
                    this.settings.clientWidthCache = this.settings.target[0].clientWidth,
                    this.settings.clientHeightCache = this.settings.target[0].clientHeight),
                0 === this.containerWidth || 0 === this.containerHeight || this.settings.clientWidthCache === this.containerWidth && this.settings.clientHeightCache === this.containerHeight || this.resizeParallaxBackground(),
                    this.containerWidth = this.settings.clientWidthCache,
                    this.containerHeight = this.settings.clientHeightCache;
                var i = (_dpvScrollTop - this.scrollTopMin) / (this.scrollTopMax - this.scrollTopMin)
                    , e = this.moveMax * i;
                ("left" === this.settings.direction || "up" === this.settings.direction) && (e *= -1);
                var s = "translate3d("
                    , n = "px, 0px, 0px)"
                    , a = "translate3d(0px, "
                    , o = "px, 0px)";
                "undefined" != typeof _dpvParallaxIE9 && (s = "translate(",
                    n = "px, 0px)",
                    a = "translate(0px, ",
                    o = "px)"),
                "no-repeat" === t.style.backgroundRepeat && ("down" === this.settings.direction && 0 > e && (e = 0),
                "up" === this.settings.direction && e > 0 && (e = 0)),
                    "left" === this.settings.direction || "right" === this.settings.direction ? (t.style.transition = "transform 1ms linear",
                        t.style.webkitTransform = s + e + n,
                        t.style.transform = s + e + n) : (t.style.transition = "transform 1ms linear",
                        t.style.webkitTransform = a + e + o,
                        t.style.transform = a + e + o),
                    t.style.transition = "transform -1ms linear"
            }
        },
        isInView: function() {
            if ("undefined" == typeof this.settings.offsetLastUpdate || +new Date - this.settings.offsetLastUpdate > 4e3 + 1e3 * Math.random()) {
                this.settings.offsetLastUpdate = +new Date;
                var t = this.settings.target[0];
                this.settings.offsetTopCache = t.getBoundingClientRect().top + i.pageYOffset,
                    this.settings.elemHeightCache = t.clientHeight
            }
            var e = this.settings.offsetTopCache
                , s = this.settings.elemHeightCache;
            return _dpvScrollTop > e + s || e > _dpvScrollTop + _dpvWindowHeight ? !1 : !0
        },
        computeCoverDimensions: function(t, i, e) {
            var s = t / i
                , n = e.offsetWidth / e.offsetHeight;
            if (s >= n)
                var a = e.offsetHeight
                    , o = a / i
                    , r = t * o;
            else
                var r = e.offsetWidth
                    , o = r / t
                    , a = i * o;
            return r + "px " + a + "px"
        },
        resizeParallaxBackground: function() {
            var i = this.settings.target;
            if ("undefined" != typeof i && 0 !== i.length) {
                var e = "true" === this.settings.repeat || this.settings.repeat === !0 || 1 === this.settings.repeat;
                if (i[0].style.minHeight = "150px",
                    "none" === this.settings.direction) {
                    var s = i.width() + parseInt(i.css("paddingRight"), 10) + parseInt(i.css("paddingLeft"), 10)
                        , n = i.offset().left;
                    "center" === this.settings.align ? n = "50% 50%" : "left" === this.settings.align ? n = "0% 50%" : "right" === this.settings.align ? n = "100% 50%" : "top" === this.settings.align ? n = "50% 0%" : "bottom" === this.settings.align && (n = "50% 100%"),
                        i.css({
                            opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                            backgroundSize: "cover",
                            backgroundAttachment: "scroll",
                            backgroundPosition: n,
                            backgroundRepeat: "no-repeat"
                        }),
                    "" !== this.settings.image && "none" !== this.settings.image && i.css({
                        opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                        backgroundImage: "url(" + this.settings.image + ")"
                    })
                } else if ("fixed" === this.settings.direction) {
                    var s = i.width() + parseInt(i.css("paddingRight"), 10) + parseInt(i.css("paddingLeft"), 10)
                        , a = _dpvWindowHeight
                        , o = "0%";
                    "center" === this.settings.align ? o = "50%" : "right" === this.settings.align && (o = "100%");
                    var r = i.offset().left
                        , g = !!navigator.userAgent.match(/MSIE/) || !!navigator.userAgent.match(/Trident.*rv[ :]*11\./) || !!navigator.userAgent.match(/Edge\/12/)
                        , h = !!navigator.userAgent.match(/Edge\/12/);
                    !g && i.find(".fixed-wrapper-" + this.settings.id).length < 1 && t("<div></div>").addClass("fixed-wrapper-" + this.settings.id).prependTo(i),
                    i.find(".parallax-inner-" + this.settings.id).length < 1 && t("<div></div>").addClass("la_parallax_inner").addClass("parallax-inner-" + this.settings.id).addClass(this.settings.direction).prependTo(g ? i : i.find(".fixed-wrapper-" + this.settings.id)),
                        i.css({
                            position: "relative",
                            overflow: "hidden",
                            zIndex: 1
                        }),
                        i.find(".fixed-wrapper-" + this.settings.id).css({
                            position: "absolute",
                            top: 0,
                            left: 0,
                            right: 0,
                            bottom: 0,
                            clip: g ? "auto" : "rect(auto,auto,auto,auto)",
                            webkitTransform: "none",
                            transform: "none"
                        }),
                        i.find(".parallax-inner-" + this.settings.id).css({
                            pointerEvents: "none",
                            width: s,
                            height: a,
                            position: g ? "absolute" : "fixed",
                            zIndex: this.settings.zIndex,
                            top: 0,
                            left: g ? 0 : r,
                            opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                            backgroundSize: e ? "auto" : g ? this.computeCoverDimensions(this.settings.width, this.settings.height, i[0].querySelectorAll(".parallax-inner-" + this.settings.id)[0]) : "cover",
                            backgroundAttachment: "fixed",
                            backgroundPosition: e ? "0 0 " : "50% 50%",
                            backgroundRepeat: e ? "repeat" : "no-repeat",
                            webkitTransform: "translateZ(0)",
                            transform: "translateZ(0)"
                        }),
                    h && (i.css({
                        transform: "none",
                        transformStyle: "flat"
                    }),
                        i.find(".parallax-inner-" + this.settings.id).css({
                            transform: "none",
                            transformStyle: "flat"
                        })),
                    "" !== this.settings.image && "none" !== this.settings.image && i.find(".parallax-inner-" + this.settings.id).css({
                        opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                        backgroundImage: "url(" + this.settings.image + ")"
                    }),
                    this.settings.mobiledevice && !this.settings.mobileenabled && i.find(".parallax-inner-" + this.settings.id).css({
                        position: "absolute",
                        backgroundAttachment: "initial",
                        backgroundSize: "cover",
                        left: "0",
                        right: "0",
                        bottom: "0",
                        top: "0",
                        height: "auto",
                        width: "auto"
                    })
                } else if ("left" === this.settings.direction || "right" === this.settings.direction) {
                    var s = i.width() + parseInt(i.css("paddingRight"), 10) + parseInt(i.css("paddingLeft"), 10)
                        , a = i.height() + parseInt(i.css("paddingTop"), 10) + parseInt(i.css("paddingBottom"), 10)
                        , l = s;
                    s += 400 * Math.abs(parseFloat(this.settings.velocity));
                    var d = "0%";
                    "center" === this.settings.align ? d = "50%" : "bottom" === this.settings.align && (d = "100%");
                    var r = 0;
                    "right" === this.settings.direction && (r -= s - l),
                    i.find(".parallax-inner-" + this.settings.id).length < 1 && t("<div></div>").addClass("la_parallax_inner").addClass("parallax-inner-" + this.settings.id).addClass(this.settings.direction).prependTo(i),
                        i.css({
                            position: "relative",
                            overflow: "hidden",
                            zIndex: 1
                        }).find(".parallax-inner-" + this.settings.id).css({
                            pointerEvents: "none",
                            width: s,
                            height: a,
                            position: "absolute",
                            zIndex: this.settings.zIndex,
                            top: 0,
                            left: r,
                            opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                            backgroundSize: e ? "auto" : this.computeCoverDimensions(this.settings.width, this.settings.height, i[0].querySelectorAll(".parallax-inner-" + this.settings.id)[0]),
                            backgroundPosition: e ? "0 0 " : "50% " + d,
                            backgroundRepeat: e ? "repeat" : "no-repeat"
                        }),
                    "" !== this.settings.image && "none" !== this.settings.image && i.find(".parallax-inner-" + this.settings.id).css({
                        opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                        backgroundImage: "url(" + this.settings.image + ")"
                    });
                    var c = 0;
                    i.offset().top > _dpvWindowHeight && (c = i.offset().top - _dpvWindowHeight);
                    var p = i.offset().top + i.height() + parseInt(i.css("paddingTop"), 10) + parseInt(i.css("paddingBottom"), 10);
                    this.moveMax = s - l,
                        this.scrollTopMin = c,
                        this.scrollTopMax = p
                } else {
                    var m = 800;
                    "down" === this.settings.direction && (m *= 1.2);
                    var s = i.width() + parseInt(i.css("paddingRight"), 10) + parseInt(i.css("paddingLeft"), 10)
                        , a = i.height() + parseInt(i.css("paddingTop"), 10) + parseInt(i.css("paddingBottom"), 10)
                        , f = a;
                    a += m * Math.abs(parseFloat(this.settings.velocity));
                    var r = "0%";
                    "center" === this.settings.align ? r = "50%" : "right" === this.settings.align && (r = "100%");
                    var d = 0;
                    "down" === this.settings.direction && (d -= a - f),
                    i.find(".parallax-inner-" + this.settings.id).length < 1 && t("<div></div>").addClass("la_parallax_inner").addClass("parallax-inner-" + this.settings.id).addClass(this.settings.direction).prependTo(i),
                        i.css({
                            position: "relative",
                            overflow: "hidden",
                            zIndex: 1
                        }).find(".parallax-inner-" + this.settings.id).css({
                            pointerEvents: "none",
                            width: s,
                            height: a,
                            position: "absolute",
                            zIndex: this.settings.zIndex,
                            top: d,
                            left: 0,
                            opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                            backgroundSize: e ? "auto" : this.computeCoverDimensions(this.settings.width, this.settings.height, i[0].querySelectorAll(".parallax-inner-" + this.settings.id)[0]),
                            backgroundPosition: e ? "0" : r + " 50%",
                            backgroundRepeat: e ? "repeat" : "no-repeat"
                        }),
                    "" !== this.settings.image && "none" !== this.settings.image && i.find(".parallax-inner-" + this.settings.id).css({
                        opacity: Math.abs(parseFloat(this.settings.opacity) / 100),
                        backgroundImage: "url(" + this.settings.image + ")"
                    });
                    var c = 0;
                    i.offset().top > _dpvWindowHeight && (c = i.offset().top - _dpvWindowHeight);
                    var p = i.offset().top + i.height() + parseInt(i.css("paddingTop"), 10) + parseInt(i.css("paddingBottom"), 10);
                    this.moveMax = a - f,
                        this.scrollTopMin = c,
                        this.scrollTopMax = p
                }
            }
        }
    }),
        t.fn[a] = function(i) {
            return this.each(function() {
                t.data(this, "plugin_" + a) || t.data(this, "plugin_" + a, new n(this,i))
            }),
                this
        }
}(jQuery, window, document),
    jQuery(document).ready(function(t) {
        "use strict";
        function i() {
            _dpvRefreshScroll();
            for (var t = 0; t < _dpvImageParallaxImages.length; t++)
                _dpvImageParallaxImages[t].doParallax();
            requestAnimationFrame(i)
        }
        function e() {
            _dpvScrollTop = window.pageYOffset,
                _dpvWindowHeight = window.innerHeight,
                _dpvScrollLeft = window.pageXOffset,
                _dpvWindowWidth = window.innerWidth
        }
        t(window).on("scroll touchmove touchstart touchend gesturechange mousemove", function(t) {
            requestAnimationFrame(_dpvParallaxAll)
        }),
        navigator.userAgent.match(/(Mobi|Android)/) && requestAnimationFrame(i),
            t(window).on("grid:items:added", function() {
                setTimeout(function() {
                    var t = jQuery;
                    e(),
                        t.each(_dpvImageParallaxImages, function(t, i) {
                            i.resizeParallaxBackground()
                        })
                }, 1)
            }),
            t(window).on("resize", function() {
                setTimeout(function() {
                    var t = jQuery;
                    e(),
                        t.each(_dpvImageParallaxImages, function(t, i) {
                            i.resizeParallaxBackground()
                        })
                }, 1)
            }),
            setTimeout(function() {
                var t = jQuery;
                e(),
                    t.each(_dpvImageParallaxImages, function(t, i) {
                        i.resizeParallaxBackground()
                    })
            }, 1),
            setTimeout(function() {
                var t = jQuery;
                e(),
                    t.each(_dpvImageParallaxImages, function(t, i) {
                        i.resizeParallaxBackground()
                    })
            }, 100)
    });
!function(a) {
    "use strict";
    document.dpvFindElementParentRow = function(a) {
        for (var b = a.parentNode; !b.classList.contains("vc_row") && !b.classList.contains("wpb_row"); ) {
            if ("HTML" === b.tagName) {
                b = !1;
                break
            }
            b = b.parentNode
        }
        if (b !== !1)
            return b;
        b = a.parentNode;
        for (var c = !1; !c; ) {
            if (Array.prototype.forEach.call(b.classList, function(a, b) {
                    return c ? void 0 : a.match(/row/g) ? void (c = !0) : void 0
                }),
                    c)
                return b;
            if ("HTML" === b.tagName)
                break;
            b = b.parentNode
        }
        return a.parentNode
    }
        ,
        a(document).ready(function(a) {
            function b() {
                return navigator.userAgent.match(/(Mobi|Android)/)
            }
            var c = document.querySelectorAll(".la_parallax_row");
            Array.prototype.forEach.call(c, function(a, b) {
                a.style.zIndex = -1 * (b + 1),
                    a.setAttribute("data-zindex", -1 * (b + 1))
            }),
                a(".la_parallax_row").each(function() {
                    var _that = a(this);
                    a(this).dpvImageParallax({
                        image: a(this).attr("data-bg-image"),
                        direction: a(this).attr("data-direction"),
                        mobileenabled: a(this).attr("data-mobile-enabled"),
                        mobiledevice: b(),
                        opacity: a(this).attr("data-opacity"),
                        width: a(this).attr("data-bg-width"),
                        height: a(this).attr("data-bg-height"),
                        velocity: a(this).attr("data-velocity"),
                        align: a(this).attr("data-bg-align"),
                        repeat: a(this).attr("data-bg-repeat"),
                        zIndex: a(this).attr("data-zindex"),
                        tagid: a(this).attr("data-id"),
                        target: a(document.dpvFindElementParentRow(a(this)[0])),
                        removeOrig: true,
                        complete: function() {
                            a('.parallax-inner-'+ this.id).addClass(_that.attr('class').replace('la_parallax_row',''));
                            this.target.addClass('la-parent-parallax-row');
                        }
                    })
                })
        })
}(jQuery);