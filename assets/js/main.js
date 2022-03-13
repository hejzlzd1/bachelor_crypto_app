!function () {
    "use strict";
    var s = (e, t) => (e = e.trim(), t ? [...document.querySelectorAll(e)] : document.querySelector(e)),
        a = (t, e, i, a) => {
            let o = s(e, a);
            o && (a ? o.forEach(e => e.addEventListener(t, i)) : o.addEventListener(t, i))
        }, t = (e, t) => {
            e.addEventListener("scroll", t)
        };
    let e = s("#navbar .scrollto", !0);
    var i = () => {
        var i = window.scrollY + 200;
        e.forEach(e => {
            var t;
            !e.hash || (t = s(e.hash)) && (i >= t.offsetTop && i <= t.offsetTop + t.offsetHeight ? e.classList.add("active") : e.classList.remove("active"))
        })
    };
    window.addEventListener("load", i), t(document, i);
    var o = e => {
        let t = s("#header"), i = t.offsetHeight;
        t.classList.contains("header-scrolled") || (i -= 16);
        e = s(e).offsetTop;
        window.scrollTo({top: e - i, behavior: "smooth"})
    };
    let l = s("#header");
    if (l) {
        var n = l.offsetTop;
        let e = l.nextElementSibling;
        var r = () => {
            n - window.scrollY <= 0 ? (l.classList.add("fixed-top"), e.classList.add("scrolled-offset")) : (l.classList.remove("fixed-top"), e.classList.remove("scrolled-offset"))
        };
        window.addEventListener("load", r), t(document, r)
    }
    let c = s(".back-to-top");
    c && (r = () => {
        100 < window.scrollY ? c.classList.add("active") : c.classList.remove("active")
    }, window.addEventListener("load", r), t(document, r)), a("click", ".mobile-nav-toggle", function (e) {
        s("#navbar").classList.toggle("navbar-mobile"), this.classList.toggle("bi-list"), this.classList.toggle("bi-x")
    }), a("click", ".navbar .dropdown > a", function (e) {
        s("#navbar").classList.contains("navbar-mobile") && (e.preventDefault(), this.nextElementSibling.classList.toggle("dropdown-active"))
    }, !0), a("click", ".scrollto", function (e) {
        if (s(this.hash)) {
            e.preventDefault();
            let t = s("#navbar");
            if (t.classList.contains("navbar-mobile")) {
                t.classList.remove("navbar-mobile");
                let e = s(".mobile-nav-toggle");
                e.classList.toggle("bi-list"), e.classList.toggle("bi-x")
            }
            o(this.hash)
        }
    }, !0), window.addEventListener("load", () => {
        window.location.hash && s(window.location.hash) && o(window.location.hash)
    }), window.addEventListener("load", () => {
        AOS.init({duration: 1e3, easing: "ease-in-out", once: !0, mirror: !1})
    })

}();
