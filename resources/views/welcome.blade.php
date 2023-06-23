<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>SilksCarp.</title>
    <meta name="description" content />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/topPage/favicon.svg') }}" />

    <link rel="stylesheet"
        href="https://demo.graygrids.com/themes/shopgrids/assets/css/A.bootstrap.min.css+LineIcons.3.0.css+tiny-slider.css+glightbox.min.css,Mcc.OzR7N5fb_Y.css.pagespeed.cf.svKjl5Nf5n.css" />
    <link rel="stylesheet"
        href="https://demo.graygrids.com/themes/shopgrids/assets/css/A.main.css.pagespeed.cf.wZnWV-GMUP.css" />
    <script data-pagespeed-no-defer>
        (function() {
            function f(a, b, d) {
                if (a.addEventListener) a.addEventListener(b, d, !1);
                else if (a.attachEvent) a.attachEvent("on" + b, d);
                else {
                    var c = a["on" + b];
                    a["on" + b] = function() {
                        d.call(this);
                        c && c.call(this)
                    }
                }
            };
            window.pagespeed = window.pagespeed || {};
            var g = window.pagespeed;

            function k(a) {
                this.g = [];
                this.f = 0;
                this.h = !1;
                this.j = a;
                this.i = null;
                this.l = 0;
                this.b = !1;
                this.a = 0
            }

            function l(a, b) {
                var d = b.getAttribute("data-pagespeed-lazy-position");
                if (d) return parseInt(d, 0);
                var d = b.offsetTop,
                    c = b.offsetParent;
                c && (d += l(a, c));
                d = Math.max(d, 0);
                b.setAttribute("data-pagespeed-lazy-position", d);
                return d
            }

            function m(a, b) {
                var d, c, e;
                if (!a.b && (0 == b.offsetHeight || 0 == b.offsetWidth)) return !1;
                a: if (b.currentStyle) c = b.currentStyle.position;
                    else {
                        if (document.defaultView && document.defaultView.getComputedStyle && (c = document.defaultView
                                .getComputedStyle(b, null))) {
                            c = c.getPropertyValue("position");
                            break a
                        }
                        c = b.style && b.style.position ? b.style.position : ""
                    }
                if ("relative" == c) return !0;
                e = 0;
                "number" == typeof window.pageYOffset ? e = window.pageYOffset : document.body && document.body
                    .scrollTop ? e = document.body.scrollTop : document.documentElement &&
                    document.documentElement.scrollTop && (e = document.documentElement.scrollTop);
                d = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
                c = e;
                e += d;
                var h = b.getBoundingClientRect();
                h ? (e = h.top - d, c = h.bottom) : (h = l(a, b), d = h + b.offsetHeight, e = h - e, c = d - c);
                return e <= a.f && 0 <= c + a.f
            }
            k.prototype.m = function(a) {
                p(a);
                var b = this;
                window.setTimeout(function() {
                    var d = a.getAttribute("data-pagespeed-lazy-src");
                    if (d)
                        if ((b.h || m(b, a)) && -1 != a.src.indexOf(b.j)) {
                            var c = a.parentNode,
                                e = a.nextSibling;
                            c && c.removeChild(a);
                            a.c && (a.getAttribute = a.c);
                            a.removeAttribute("onload");
                            a.tagName && "IMG" == a.tagName && g.CriticalImages && f(a, "load", function() {
                                g.CriticalImages.checkImageForCriticality(this);
                                b.b && (b.a--, b.a || g.CriticalImages.checkCriticalImages())
                            });
                            a.removeAttribute("data-pagespeed-lazy-src");
                            a.removeAttribute("data-pagespeed-lazy-replaced-functions");
                            c && c.insertBefore(a, e);
                            if (c = a.getAttribute("data-pagespeed-lazy-srcset")) a.srcset = c, a
                                .removeAttribute("data-pagespeed-lazy-srcset");
                            a.src = d
                        } else b.g.push(a)
                }, 0)
            };
            k.prototype.loadIfVisibleAndMaybeBeacon = k.prototype.m;
            k.prototype.s = function() {
                this.h = !0;
                q(this)
            };
            k.prototype.loadAllImages = k.prototype.s;

            function q(a) {
                var b = a.g,
                    d = b.length;
                a.g = [];
                for (var c = 0; c < d; ++c) a.m(b[c])
            }

            function t(a, b) {
                return a.a ? null != a.a(b) : null != a.getAttribute(b)
            }
            k.prototype.u = function() {
                for (var a = document.getElementsByTagName("img"), b = 0, d; d = a[b]; b++) t(d,
                    "data-pagespeed-lazy-src") && p(d)
            };
            k.prototype.overrideAttributeFunctions = k.prototype.u;

            function p(a) {
                t(a, "data-pagespeed-lazy-replaced-functions") || (a.c = a.getAttribute, a.getAttribute = function(a) {
                    "src" == a.toLowerCase() && t(this, "data-pagespeed-lazy-src") && (a =
                        "data-pagespeed-lazy-src");
                    return this.c(a)
                }, a.setAttribute("data-pagespeed-lazy-replaced-functions", "1"))
            }
            g.o = function(a, b) {
                function d() {
                    if (!(c.b && a || c.i)) {
                        var b = 200;
                        200 < (new Date).getTime() - c.l && (b = 0);
                        c.i = window.setTimeout(function() {
                            c.l = (new Date).getTime();
                            q(c);
                            c.i = null
                        }, b)
                    }
                }
                var c = new k(b);
                g.lazyLoadImages = c;
                f(window, "load", function() {
                    c.b = !0;
                    c.h = a;
                    c.f = 200;
                    if (g.CriticalImages) {
                        for (var b = 0, d = document.getElementsByTagName("img"), r = 0, n; n = d[r]; r++) -
                            1 != n.src.indexOf(c.j) && t(n, "data-pagespeed-lazy-src") && b++;
                        c.a = b;
                        c.a || g.CriticalImages.checkCriticalImages()
                    }
                    q(c)
                });
                b.indexOf("data") && ((new Image).src = b);
                f(window,
                    "scroll", d);
                f(window, "resize", d)
            };
            g.lazyLoadInit = g.o;
        })();

        pagespeed.lazyLoadInit(true, "/pagespeed_static/1.JiBnMqyl6S.gif");
    </script>
</head>

<body>
    {{-- <noscript>
        <meta HTTP-EQUIV="refresh"
            content="0;url='https://demo.graygrids.com/themes/shopgrids/index.html?PageSpeed=noscript'" />
        <style>

        </style>
        <div style="display:block">Please click
            <a href="https://demo.graygrids.com/themes/shopgrids/index.html?PageSpeed=noscript">here</a> if you are not
            redirected within a few seconds.
        </div>
    </noscript> --}}
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    {{-- <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div> --}}

    <header class="header navbar-area">

        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left text-white fs-md-5">
                            錦鯉販売管理システム
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">

                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">

                        <a class="navbar-brand" href="index.html">
                            {{-- <script data-pagespeed-no-defer>
                                (function() {
                                    for (var g = "function" == typeof Object.defineProperties ? Object.defineProperty : function(b, c, a) {
                                                if (a.get || a.set) throw new TypeError("ES3 does not support getters and setters.");
                                                b != Array.prototype && b != Object.prototype && (b[c] = a.value)
                                            }, h = "undefined" != typeof window && window === this ? this : "undefined" != typeof global &&
                                            null != global ? global : this, k = ["String", "prototype", "repeat"], l = 0; l < k.length -
                                        1; l++) {
                                        var m = k[l];
                                        m in h || (h[m] = {});
                                        h = h[m]
                                    }
                                    var n = k[k.length - 1],
                                        p = h[n],
                                        q = p ? p : function(b) {
                                            var c;
                                            if (null == this) throw new TypeError(
                                                "The 'this' value for String.prototype.repeat must not be null or undefined");
                                            c = this + "";
                                            if (0 > b || 1342177279 < b) throw new RangeError("Invalid count value");
                                            b |= 0;
                                            for (var a = ""; b;)
                                                if (b & 1 && (a += c), b >>>= 1) c += c;
                                            return a
                                        };
                                    q != p && null != q && g(h, n, {
                                        configurable: !0,
                                        writable: !0,
                                        value: q
                                    });
                                    var t = this;

                                    function u(b, c) {
                                        var a = b.split("."),
                                            d = t;
                                        a[0] in d || !d.execScript || d.execScript("var " + a[0]);
                                        for (var e; a.length && (e = a.shift());) a.length || void 0 === c ? d[e] ? d = d[e] : d = d[e] = {} :
                                            d[e] = c
                                    };

                                    function v(b) {
                                        var c = b.length;
                                        if (0 < c) {
                                            for (var a = Array(c), d = 0; d < c; d++) a[d] = b[d];
                                            return a
                                        }
                                        return []
                                    };

                                    function w(b) {
                                        var c = window;
                                        if (c.addEventListener) c.addEventListener("load", b, !1);
                                        else if (c.attachEvent) c.attachEvent("onload", b);
                                        else {
                                            var a = c.onload;
                                            c.onload = function() {
                                                b.call(this);
                                                a && a.call(this)
                                            }
                                        }
                                    };
                                    var x;

                                    function y(b, c, a, d, e) {
                                        this.h = b;
                                        this.j = c;
                                        this.l = a;
                                        this.f = e;
                                        this.g = {
                                            height: window.innerHeight || document.documentElement.clientHeight || document.body
                                                .clientHeight,
                                            width: window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
                                        };
                                        this.i = d;
                                        this.b = {};
                                        this.a = [];
                                        this.c = {}
                                    }

                                    function z(b, c) {
                                        var a, d, e = c.getAttribute("data-pagespeed-url-hash");
                                        if (a = e && !(e in b.c))
                                            if (0 >= c.offsetWidth && 0 >= c.offsetHeight) a = !1;
                                            else {
                                                d = c.getBoundingClientRect();
                                                var f = document.body;
                                                a = d.top + ("pageYOffset" in window ? window.pageYOffset : (document.documentElement || f
                                                    .parentNode || f).scrollTop);
                                                d = d.left + ("pageXOffset" in window ? window.pageXOffset : (document.documentElement || f
                                                    .parentNode || f).scrollLeft);
                                                f = a.toString() + "," + d;
                                                b.b.hasOwnProperty(f) ? a = !1 : (b.b[f] = !0, a = a <= b.g.height && d <= b.g.width)
                                            } a && (b.a.push(e), b.c[e] = !0)
                                    }
                                    y.prototype.checkImageForCriticality = function(b) {
                                        b.getBoundingClientRect && z(this, b)
                                    };
                                    u("pagespeed.CriticalImages.checkImageForCriticality", function(b) {
                                        x.checkImageForCriticality(b)
                                    });
                                    u("pagespeed.CriticalImages.checkCriticalImages", function() {
                                        A(x)
                                    });

                                    function A(b) {
                                        b.b = {};
                                        for (var c = ["IMG", "INPUT"], a = [], d = 0; d < c.length; ++d) a = a.concat(v(document
                                            .getElementsByTagName(c[d])));
                                        if (a.length && a[0].getBoundingClientRect) {
                                            for (d = 0; c = a[d]; ++d) z(b, c);
                                            a = "oh=" + b.l;
                                            b.f && (a += "&n=" + b.f);
                                            if (c = !!b.a.length)
                                                for (a += "&ci=" + encodeURIComponent(b.a[0]), d = 1; d < b.a.length; ++d) {
                                                    var e = "," + encodeURIComponent(b.a[d]);
                                                    131072 >= a.length + e.length && (a += e)
                                                }
                                            b.i && (e = "&rd=" + encodeURIComponent(JSON.stringify(B())), 131072 >= a.length + e.length && (a +=
                                                e), c = !0);
                                            C = a;
                                            if (c) {
                                                d = b.h;
                                                b = b.j;
                                                var f;
                                                if (window.XMLHttpRequest) f = new XMLHttpRequest;
                                                else if (window.ActiveXObject) try {
                                                    f = new ActiveXObject("Msxml2.XMLHTTP")
                                                } catch (r) {
                                                    try {
                                                        f = new ActiveXObject("Microsoft.XMLHTTP")
                                                    } catch (D) {}
                                                }
                                                f && (f.open("POST", d + (-1 == d.indexOf("?") ? "?" : "&") + "url=" + encodeURIComponent(b)), f
                                                    .setRequestHeader("Content-Type", "application/x-www-form-urlencoded"), f.send(a))
                                            }
                                        }
                                    }

                                    function B() {
                                        var b = {},
                                            c;
                                        c = document.getElementsByTagName("IMG");
                                        if (!c.length) return {};
                                        var a = c[0];
                                        if (!("naturalWidth" in a && "naturalHeight" in a)) return {};
                                        for (var d = 0; a = c[d]; ++d) {
                                            var e = a.getAttribute("data-pagespeed-url-hash");
                                            e && (!(e in b) && 0 < a.width && 0 < a.height && 0 < a.naturalWidth && 0 < a.naturalHeight || e in
                                                b && a.width >= b[e].o && a.height >= b[e].m) && (b[e] = {
                                                rw: a.width,
                                                rh: a.height,
                                                ow: a.naturalWidth,
                                                oh: a.naturalHeight
                                            })
                                        }
                                        return b
                                    }
                                    var C = "";
                                    u("pagespeed.CriticalImages.getBeaconData", function() {
                                        return C
                                    });
                                    u("pagespeed.CriticalImages.Run", function(b, c, a, d, e, f) {
                                        var r = new y(b, c, a, e, f);
                                        x = r;
                                        d && w(function() {
                                            window.setTimeout(function() {
                                                A(r)
                                            }, 0)
                                        })
                                    });
                                })();
                                pagespeed.CriticalImages.Run('/ngx_pagespeed_beacon', 'https://demo.graygrids.com/themes/shopgrids/index.html',
                                    'vgO0_CsSLD', false, false, 'CSUQ3AeFCDY');
                            </script> --}}
                            <img src="{{ asset('assets/images/topPage/logo.svg') }}" alt="Logo"
                                data-pagespeed-url-hash="3224337811"
                                onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                        </a>

                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">

                            </div>
                            <div class="navbar-cart d-none">
                                <div class="wishlist">
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-heart"></i>
                                        <span class="total-items">0</span>
                                    </a>
                                </div>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items">2</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">

                        <div class="hero-slider">

                            <div class="single-slider" style="background-image:url(assets/images/topPage/slider1.jpg)">
                                {{-- <div class="content">
                                    <h2><span>No restocking fee ($35 savings)</span>
                                        M75 Sport Watch
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Now Only</span> $320.99</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div> --}}
                            </div>


                            <div class="single-slider" style="background-image:url(assets/images/topPage/slider2.jpg)">
                                {{-- <div class="content">
                                    <h2><span>Big Sale Offer</span>
                                        Get the Best Deal on CCTV Camera
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor incididunt ut
                                        labore dolore magna aliqua.</p>
                                    <h3><span>Combo Only:</span> $590.00</h3>
                                    <div class="button">
                                        <a href="product-grids.html" class="btn">Shop Now</a>
                                    </div>
                                </div> --}}
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">

                            <div class="hero-small-banner"
                                style="background-image:url(assets/images/topPage/slider3.jpg)">
                                {{-- <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div> --}}
                            </div>

                        </div>
                        <div class="col-lg-12 col-md-6 col-12">

                            <div class="hero-small-banner style2"
                                style="background-image:url(assets/images/topPage/slider4.jpg)">
                                {{-- <div class="content">
                                    <h2>
                                        <span>New line required</span>
                                        iPhone 12 Pro Max
                                    </h2>
                                    <h3>$259.99</h3>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="featured-categories section" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">TV & Audios</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/01.jpg') }}"
                                style="width: 180px; height: 240px" alt="#" data-pagespeed-url-hash="1763067336"
                                src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">Desktop & Laptop</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/02.jpg') }}"
                                style="width: 180px; height: 240px" alt="#"
                                data-pagespeed-url-hash="2057567257" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">Cctv Camera</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/03.jpg') }}"
                                style="width: 180px; height: 240px" alt="#"
                                data-pagespeed-url-hash="2352067178" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">Dslr Camera</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/01.jpg') }}"
                                style="width: 180px; height: 240px" alt="#"
                                data-pagespeed-url-hash="2646567099" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">Smart Phones</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/02.jpg') }}"
                                style="width: 180px; height: 240px" alt="#"
                                data-pagespeed-url-hash="2941067020" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-category">
                        <h3 class="heading">Game Console</h3>
                        <ul>
                            <li><a href="product-grids.html">Smart Television</a></li>
                            <li><a href="product-grids.html">QLED TV</a></li>
                            <li><a href="product-grids.html">Audios</a></li>
                            <li><a href="product-grids.html">Headphones</a></li>
                            <li><a href="product-grids.html">View All</a></li>
                        </ul>
                        <div class="images">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/03.jpg') }}"
                                style="width: 180px; height: 240px" alt="#"
                                data-pagespeed-url-hash="3235566941" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>おすすめ商品</h2>
                        <p>Lorem Ipsum の一節にはさまざまなバリエーションがありますが、大部分は何らかの形で改変されています。</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/01.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/01.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-01</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/02.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/02.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-02</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/03.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/03.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-03</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/04.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/04.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-04</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/05.png') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/05.png') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-05</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/01.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/01.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-01</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/02.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/02.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-02</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-product">
                        <div class="product-image">
                            <img data-pagespeed-lazy-src="{{ asset('assets/upload/carp/03.jpg') }}"
                                style="width: 100%; height: 420px" alt="#"
                                data-pagespeed-url-hash="2548583845" src="{{ asset('assets/upload/carp/03.jpg') }}"
                                onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            <div class="button">
                                <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> View
                                    Detail</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">錦鯉</span>
                            <h4 class="title">
                                <a href="product-grids.html">錦鯉-03</a>
                            </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star-filled"></i></li>
                                <li><i class="lni lni-star"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>250000円</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="home-product-list section" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">Best Sellers</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="2685982763"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">GoPro Hero4 Silver</a>
                            </h3>
                            <span>$287.99</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="2980482684"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Puro Sound Labs BT2200</a>
                            </h3>
                            <span>$95.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3274982605"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">HP OfficeJet Pro 8710</a>
                            </h3>
                            <span>$120.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                    <h4 class="list-title">New Arrivals</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3569482526"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">iPhone X 256 GB Space Gray</a>
                            </h3>
                            <span>$1150.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3863982447"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Canon EOS M50 Mirrorless Camera</a>
                            </h3>
                            <span>$950.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="4158482368"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Microsoft Xbox One S</a>
                            </h3>
                            <span>$298.00</span>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">Top Rated</h4>

                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="158014993"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Gear 360 VR Camera</a>
                            </h3>
                            <span>$68.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="452514914"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Samsung Galaxy S9+ 64 GB</a>
                            </h3>
                            <span>$840.00</span>
                        </div>
                    </div>


                    <div class="single-list">
                        <div class="list-image">
                            <a href="product-grids.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/help.webp') }}"
                                    alt="#" data-pagespeed-url-hash="747014835"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"></a>
                        </div>
                        <div class="list-info">
                            <h3>
                                <a href="product-grids.html">Zeus Bluetooth Headphones</a>
                            </h3>
                            <span>$28.00</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="brands" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 col-12">
                    <h2 class="title">Popular Brands</h2>
                </div>
            </div>
            <div class="brands-logo-wrapper">
                <div class="brands-logo-carousel d-flex align-items-center justify-content-between">
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="3611277597" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="3905777518" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="4200277439" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="199810064" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="494309985" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="788809906" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="4200277439" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                    <div class="brand-logo">
                        <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/brand.webp') }}" alt="#"
                            data-pagespeed-url-hash="199810064" src="/pagespeed_static/1.JiBnMqyl6S.gif"
                            onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                            onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="blog-section section" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest News</h2>
                        <p>There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/blog.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3200430300"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">eCommerce</a>
                            <h4>
                                <a href="blog-single-sidebar.html">What information is needed for shipping?</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/blog.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3494930221"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Gaming</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Interesting fact about gaming consoles</a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="blog-single-sidebar.html">
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/blog.webp') }}"
                                    alt="#" data-pagespeed-url-hash="3789430142"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            </a>
                        </div>
                        <div class="blog-content">
                            <a class="category" href="javascript:void(0)">Electronic</a>
                            <h4>
                                <a href="blog-single-sidebar.html">Electronics, instrumentation & control engineering
                                </a>
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt.</p>
                            <div class="button">
                                <a href="javascript:void(0)" class="btn">Read More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>



    <footer class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/logo.svg') }}"
                                        alt="#" data-pagespeed-url-hash="664057475"
                                        src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                        onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                        onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter d-none">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-middle" style="display: none">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="/cdn-cgi/l/email-protection#81f2f4f1f1eef3f5c1f2e9eef1e6f3e8e5f2afe2eeec">
                                        <span class="__cf_email__"
                                            data-cfemail="d7a4a2a7a7b8a5a397a4bfb8a7b0a5beb3a4f9b4b8ba">[email&#160;protected]</span>
                                    </a>
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">About Us</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img data-pagespeed-lazy-src="{{ asset('assets/images/topPage/payment.webp') }}"
                                    alt="#" data-pagespeed-url-hash="2482565258"
                                    src="/pagespeed_static/1.JiBnMqyl6S.gif"
                                    onload="pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);"
                                    onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>SilksCarp</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>


    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <script data-cfasync="false"
        src="https://demo.graygrids.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" data-pagespeed-no-defer>
        pagespeed.lazyLoadImages.overrideAttributeFunctions();
    </script>
    <script src="https://demo.graygrids.com/themes/shopgrids/assets/js/bootstrap.min.js.pagespeed.jm.R6pdwTt0pj.js">
    </script>
    <script
        src="https://demo.graygrids.com/themes/shopgrids/assets/js/tiny-slider.js+glightbox.min.js+main.js.pagespeed.jc.MCgBCVbLAV.js">
    </script>
    <script>
        eval(mod_pagespeed_Zp_OOsHKoc);
    </script>
    <script>
        eval(mod_pagespeed_5TvwT_lz9K);
    </script>
    <script>
        eval(mod_pagespeed_uoja0BW_wo);
    </script>
    <script type="text/javascript">
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script>
</body>

</html>
