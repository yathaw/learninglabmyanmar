"object" == typeof navigator && function() {
    "use strict";
    var e = "undefined" != typeof globalThis ? globalThis : "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : {};

    function t(e, t) {
        return e(t = {
            exports: {}
        }, t.exports), t.exports
    }
    var n = function(e) {
            return e && e.Math == Math && e
        },
        r = n("object" == typeof globalThis && globalThis) || n("object" == typeof window && window) || n("object" == typeof self && self) || n("object" == typeof e && e) || Function("return this")(),
        i = function(e) {
            try {
                return !!e()
            } catch (e) {
                return !0
            }
        },
        o = !i((function() {
            return 7 != Object.defineProperty({}, 1, {
                get: function() {
                    return 7
                }
            })[1]
        })),
        a = {}.propertyIsEnumerable,
        s = Object.getOwnPropertyDescriptor,
        c = {
            f: s && !a.call({
                1: 2
            }, 1) ? function(e) {
                var t = s(this, e);
                return !!t && t.enumerable
            } : a
        },
        u = function(e, t) {
            return {
                enumerable: !(1 & e),
                configurable: !(2 & e),
                writable: !(4 & e),
                value: t
            }
        },
        l = {}.toString,
        f = function(e) {
            return l.call(e).slice(8, -1)
        },
        h = "".split,
        p = i((function() {
            return !Object("z").propertyIsEnumerable(0)
        })) ? function(e) {
            return "String" == f(e) ? h.call(e, "") : Object(e)
        } : Object,
        d = function(e) {
            if (null == e) throw TypeError("Can't call method on " + e);
            return e
        },
        g = function(e) {
            return p(d(e))
        },
        v = function(e) {
            return "object" == typeof e ? null !== e : "function" == typeof e
        },
        m = function(e, t) {
            if (!v(e)) return e;
            var n, r;
            if (t && "function" == typeof(n = e.toString) && !v(r = n.call(e))) return r;
            if ("function" == typeof(n = e.valueOf) && !v(r = n.call(e))) return r;
            if (!t && "function" == typeof(n = e.toString) && !v(r = n.call(e))) return r;
            throw TypeError("Can't convert object to primitive value")
        },
        y = {}.hasOwnProperty,
        b = function(e, t) {
            return y.call(e, t)
        },
        w = r.document,
        _ = v(w) && v(w.createElement),
        E = function(e) {
            return _ ? w.createElement(e) : {}
        },
        k = !o && !i((function() {
            return 7 != Object.defineProperty(E("div"), "a", {
                get: function() {
                    return 7
                }
            }).a
        })),
        S = Object.getOwnPropertyDescriptor,
        T = {
            f: o ? S : function(e, t) {
                if (e = g(e), t = m(t, !0), k) try {
                    return S(e, t)
                } catch (e) {}
                if (b(e, t)) return u(!c.f.call(e, t), e[t])
            }
        },
        x = function(e) {
            if (!v(e)) throw TypeError(String(e) + " is not an object");
            return e
        },
        A = Object.defineProperty,
        O = {
            f: o ? A : function(e, t, n) {
                if (x(e), t = m(t, !0), x(n), k) try {
                    return A(e, t, n)
                } catch (e) {}
                if ("get" in n || "set" in n) throw TypeError("Accessors not supported");
                return "value" in n && (e[t] = n.value), e
            }
        },
        P = o ? function(e, t, n) {
            return O.f(e, t, u(1, n))
        } : function(e, t, n) {
            return e[t] = n, e
        },
        I = function(e, t) {
            try {
                P(r, e, t)
            } catch (n) {
                r[e] = t
            }
            return t
        },
        j = r["__core-js_shared__"] || I("__core-js_shared__", {}),
        C = Function.toString;
    "function" != typeof j.inspectSource && (j.inspectSource = function(e) {
        return C.call(e)
    });
    var R, L, N, M = j.inspectSource,
        U = r.WeakMap,
        D = "function" == typeof U && /native code/.test(M(U)),
        F = t((function(e) {
            (e.exports = function(e, t) {
                return j[e] || (j[e] = void 0 !== t ? t : {})
            })("versions", []).push({
                version: "3.6.5",
                mode: "global",
                copyright: "© 2020 Denis Pushkarev (zloirock.ru)"
            })
        })),
        B = 0,
        q = Math.random(),
        H = function(e) {
            return "Symbol(" + String(void 0 === e ? "" : e) + ")_" + (++B + q).toString(36)
        },
        V = F("keys"),
        W = function(e) {
            return V[e] || (V[e] = H(e))
        },
        z = {},
        Y = r.WeakMap;
    if (D) {
        var $ = new Y,
            G = $.get,
            K = $.has,
            X = $.set;
        R = function(e, t) {
            return X.call($, e, t), t
        }, L = function(e) {
            return G.call($, e) || {}
        }, N = function(e) {
            return K.call($, e)
        }
    } else {
        var J = W("state");
        z[J] = !0, R = function(e, t) {
            return P(e, J, t), t
        }, L = function(e) {
            return b(e, J) ? e[J] : {}
        }, N = function(e) {
            return b(e, J)
        }
    }
    var Q = {
            set: R,
            get: L,
            has: N,
            enforce: function(e) {
                return N(e) ? L(e) : R(e, {})
            },
            getterFor: function(e) {
                return function(t) {
                    var n;
                    if (!v(t) || (n = L(t)).type !== e) throw TypeError("Incompatible receiver, " + e + " required");
                    return n
                }
            }
        },
        Z = t((function(e) {
            var t = Q.get,
                n = Q.enforce,
                i = String(String).split("String");
            (e.exports = function(e, t, o, a) {
                var s = !!a && !!a.unsafe,
                    c = !!a && !!a.enumerable,
                    u = !!a && !!a.noTargetGet;
                "function" == typeof o && ("string" != typeof t || b(o, "name") || P(o, "name", t), n(o).source = i.join("string" == typeof t ? t : "")), e !== r ? (s ? !u && e[t] && (c = !0) : delete e[t], c ? e[t] = o : P(e, t, o)) : c ? e[t] = o : I(t, o)
            })(Function.prototype, "toString", (function() {
                return "function" == typeof this && t(this).source || M(this)
            }))
        })),
        ee = r,
        te = function(e) {
            return "function" == typeof e ? e : void 0
        },
        ne = function(e, t) {
            return arguments.length < 2 ? te(ee[e]) || te(r[e]) : ee[e] && ee[e][t] || r[e] && r[e][t]
        },
        re = Math.ceil,
        ie = Math.floor,
        oe = function(e) {
            return isNaN(e = +e) ? 0 : (e > 0 ? ie : re)(e)
        },
        ae = Math.min,
        se = function(e) {
            return e > 0 ? ae(oe(e), 9007199254740991) : 0
        },
        ce = Math.max,
        ue = Math.min,
        le = function(e, t) {
            var n = oe(e);
            return n < 0 ? ce(n + t, 0) : ue(n, t)
        },
        fe = function(e) {
            return function(t, n, r) {
                var i, o = g(t),
                    a = se(o.length),
                    s = le(r, a);
                if (e && n != n) {
                    for (; a > s;)
                        if ((i = o[s++]) != i) return !0
                } else
                    for (; a > s; s++)
                        if ((e || s in o) && o[s] === n) return e || s || 0;
                return !e && -1
            }
        },
        he = {
            includes: fe(!0),
            indexOf: fe(!1)
        },
        pe = he.indexOf,
        de = function(e, t) {
            var n, r = g(e),
                i = 0,
                o = [];
            for (n in r) !b(z, n) && b(r, n) && o.push(n);
            for (; t.length > i;) b(r, n = t[i++]) && (~pe(o, n) || o.push(n));
            return o
        },
        ge = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"],
        ve = ge.concat("length", "prototype"),
        me = {
            f: Object.getOwnPropertyNames || function(e) {
                return de(e, ve)
            }
        },
        ye = {
            f: Object.getOwnPropertySymbols
        },
        be = ne("Reflect", "ownKeys") || function(e) {
            var t = me.f(x(e)),
                n = ye.f;
            return n ? t.concat(n(e)) : t
        },
        we = function(e, t) {
            for (var n = be(t), r = O.f, i = T.f, o = 0; o < n.length; o++) {
                var a = n[o];
                b(e, a) || r(e, a, i(t, a))
            }
        },
        _e = /#|\.prototype\./,
        Ee = function(e, t) {
            var n = Se[ke(e)];
            return n == xe || n != Te && ("function" == typeof t ? i(t) : !!t)
        },
        ke = Ee.normalize = function(e) {
            return String(e).replace(_e, ".").toLowerCase()
        },
        Se = Ee.data = {},
        Te = Ee.NATIVE = "N",
        xe = Ee.POLYFILL = "P",
        Ae = Ee,
        Oe = T.f,
        Pe = function(e, t) {
            var n, i, o, a, s, c = e.target,
                u = e.global,
                l = e.stat;
            if (n = u ? r : l ? r[c] || I(c, {}) : (r[c] || {}).prototype)
                for (i in t) {
                    if (a = t[i], o = e.noTargetGet ? (s = Oe(n, i)) && s.value : n[i], !Ae(u ? i : c + (l ? "." : "#") + i, e.forced) && void 0 !== o) {
                        if (typeof a == typeof o) continue;
                        we(a, o)
                    }(e.sham || o && o.sham) && P(a, "sham", !0), Z(n, i, a, e)
                }
        },
        Ie = function(e) {
            if ("function" != typeof e) throw TypeError(String(e) + " is not a function");
            return e
        },
        je = function(e, t, n) {
            if (Ie(e), void 0 === t) return e;
            switch (n) {
                case 0:
                    return function() {
                        return e.call(t)
                    };
                case 1:
                    return function(n) {
                        return e.call(t, n)
                    };
                case 2:
                    return function(n, r) {
                        return e.call(t, n, r)
                    };
                case 3:
                    return function(n, r, i) {
                        return e.call(t, n, r, i)
                    }
            }
            return function() {
                return e.apply(t, arguments)
            }
        },
        Ce = function(e) {
            return Object(d(e))
        },
        Re = Array.isArray || function(e) {
            return "Array" == f(e)
        },
        Le = !!Object.getOwnPropertySymbols && !i((function() {
            return !String(Symbol())
        })),
        Ne = Le && !Symbol.sham && "symbol" == typeof Symbol.iterator,
        Me = F("wks"),
        Ue = r.Symbol,
        De = Ne ? Ue : Ue && Ue.withoutSetter || H,
        Fe = function(e) {
            return b(Me, e) || (Le && b(Ue, e) ? Me[e] = Ue[e] : Me[e] = De("Symbol." + e)), Me[e]
        },
        Be = Fe("species"),
        qe = function(e, t) {
            var n;
            return Re(e) && ("function" != typeof(n = e.constructor) || n !== Array && !Re(n.prototype) ? v(n) && null === (n = n[Be]) && (n = void 0) : n = void 0), new(void 0 === n ? Array : n)(0 === t ? 0 : t)
        },
        He = [].push,
        Ve = function(e) {
            var t = 1 == e,
                n = 2 == e,
                r = 3 == e,
                i = 4 == e,
                o = 6 == e,
                a = 5 == e || o;
            return function(s, c, u, l) {
                for (var f, h, d = Ce(s), g = p(d), v = je(c, u, 3), m = se(g.length), y = 0, b = l || qe, w = t ? b(s, m) : n ? b(s, 0) : void 0; m > y; y++)
                    if ((a || y in g) && (h = v(f = g[y], y, d), e))
                        if (t) w[y] = h;
                        else if (h) switch (e) {
                    case 3:
                        return !0;
                    case 5:
                        return f;
                    case 6:
                        return y;
                    case 2:
                        He.call(w, f)
                } else if (i) return !1;
                return o ? -1 : r || i ? i : w
            }
        },
        We = {
            forEach: Ve(0),
            map: Ve(1),
            filter: Ve(2),
            some: Ve(3),
            every: Ve(4),
            find: Ve(5),
            findIndex: Ve(6)
        },
        ze = function(e, t) {
            var n = [][e];
            return !!n && i((function() {
                n.call(null, t || function() {
                    throw 1
                }, 1)
            }))
        },
        Ye = Object.defineProperty,
        $e = {},
        Ge = function(e) {
            throw e
        },
        Ke = function(e, t) {
            if (b($e, e)) return $e[e];
            t || (t = {});
            var n = [][e],
                r = !!b(t, "ACCESSORS") && t.ACCESSORS,
                a = b(t, 0) ? t[0] : Ge,
                s = b(t, 1) ? t[1] : void 0;
            return $e[e] = !!n && !i((function() {
                if (r && !o) return !0;
                var e = {
                    length: -1
                };
                r ? Ye(e, 1, {
                    enumerable: !0,
                    get: Ge
                }) : e[1] = 1, n.call(e, a, s)
            }))
        },
        Xe = We.forEach,
        Je = ze("forEach"),
        Qe = Ke("forEach"),
        Ze = Je && Qe ? [].forEach : function(e) {
            return Xe(this, e, arguments.length > 1 ? arguments[1] : void 0)
        };
    Pe({
        target: "Array",
        proto: !0,
        forced: [].forEach != Ze
    }, {
        forEach: Ze
    });
    var et = function(e, t, n, r) {
            try {
                return r ? t(x(n)[0], n[1]) : t(n)
            } catch (t) {
                var i = e.return;
                throw void 0 !== i && x(i.call(e)), t
            }
        },
        tt = {},
        nt = Fe("iterator"),
        rt = Array.prototype,
        it = function(e) {
            return void 0 !== e && (tt.Array === e || rt[nt] === e)
        },
        ot = function(e, t, n) {
            var r = m(t);
            r in e ? O.f(e, r, u(0, n)) : e[r] = n
        },
        at = {};
    at[Fe("toStringTag")] = "z";
    var st = "[object z]" === String(at),
        ct = Fe("toStringTag"),
        ut = "Arguments" == f(function() {
            return arguments
        }()),
        lt = st ? f : function(e) {
            var t, n, r;
            return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(n = function(e, t) {
                try {
                    return e[t]
                } catch (e) {}
            }(t = Object(e), ct)) ? n : ut ? f(t) : "Object" == (r = f(t)) && "function" == typeof t.callee ? "Arguments" : r
        },
        ft = Fe("iterator"),
        ht = function(e) {
            if (null != e) return e[ft] || e["@@iterator"] || tt[lt(e)]
        },
        pt = function(e) {
            var t, n, r, i, o, a, s = Ce(e),
                c = "function" == typeof this ? this : Array,
                u = arguments.length,
                l = u > 1 ? arguments[1] : void 0,
                f = void 0 !== l,
                h = ht(s),
                p = 0;
            if (f && (l = je(l, u > 2 ? arguments[2] : void 0, 2)), null == h || c == Array && it(h))
                for (n = new c(t = se(s.length)); t > p; p++) a = f ? l(s[p], p) : s[p], ot(n, p, a);
            else
                for (o = (i = h.call(s)).next, n = new c; !(r = o.call(i)).done; p++) a = f ? et(i, l, [r.value, p], !0) : r.value, ot(n, p, a);
            return n.length = p, n
        },
        dt = Fe("iterator"),
        gt = !1;
    try {
        var vt = 0,
            mt = {
                next: function() {
                    return {
                        done: !!vt++
                    }
                },
                return: function() {
                    gt = !0
                }
            };
        mt[dt] = function() {
            return this
        }, Array.from(mt, (function() {
            throw 2
        }))
    } catch (e) {}
    var yt = function(e, t) {
            if (!t && !gt) return !1;
            var n = !1;
            try {
                var r = {};
                r[dt] = function() {
                    return {
                        next: function() {
                            return {
                                done: n = !0
                            }
                        }
                    }
                }, e(r)
            } catch (e) {}
            return n
        },
        bt = !yt((function(e) {
            Array.from(e)
        }));
    Pe({
        target: "Array",
        stat: !0,
        forced: bt
    }, {
        from: pt
    });
    var wt, _t = Object.keys || function(e) {
            return de(e, ge)
        },
        Et = o ? Object.defineProperties : function(e, t) {
            x(e);
            for (var n, r = _t(t), i = r.length, o = 0; i > o;) O.f(e, n = r[o++], t[n]);
            return e
        },
        kt = ne("document", "documentElement"),
        St = W("IE_PROTO"),
        Tt = function() {},
        xt = function(e) {
            return "<script>" + e + "<\/script>"
        },
        At = function() {
            try {
                wt = document.domain && new ActiveXObject("htmlfile")
            } catch (e) {}
            var e, t;
            At = wt ? function(e) {
                e.write(xt("")), e.close();
                var t = e.parentWindow.Object;
                return e = null, t
            }(wt) : ((t = E("iframe")).style.display = "none", kt.appendChild(t), t.src = String("javascript:"), (e = t.contentWindow.document).open(), e.write(xt("document.F=Object")), e.close(), e.F);
            for (var n = ge.length; n--;) delete At.prototype[ge[n]];
            return At()
        };
    z[St] = !0;
    var Ot = Object.create || function(e, t) {
            var n;
            return null !== e ? (Tt.prototype = x(e), n = new Tt, Tt.prototype = null, n[St] = e) : n = At(), void 0 === t ? n : Et(n, t)
        },
        Pt = Fe("unscopables"),
        It = Array.prototype;
    null == It[Pt] && O.f(It, Pt, {
        configurable: !0,
        value: Ot(null)
    });
    var jt = function(e) {
            It[Pt][e] = !0
        },
        Ct = he.includes,
        Rt = Ke("indexOf", {
            ACCESSORS: !0,
            1: 0
        });
    Pe({
        target: "Array",
        proto: !0,
        forced: !Rt
    }, {
        includes: function(e) {
            return Ct(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    }), jt("includes");
    var Lt, Nt, Mt = ne("navigator", "userAgent") || "",
        Ut = r.process,
        Dt = Ut && Ut.versions,
        Ft = Dt && Dt.v8;
    Ft ? Nt = (Lt = Ft.split("."))[0] + Lt[1] : Mt && (!(Lt = Mt.match(/Edge\/(\d+)/)) || Lt[1] >= 74) && (Lt = Mt.match(/Chrome\/(\d+)/)) && (Nt = Lt[1]);
    var Bt = Nt && +Nt,
        qt = Fe("species"),
        Ht = function(e) {
            return Bt >= 51 || !i((function() {
                var t = [];
                return (t.constructor = {})[qt] = function() {
                    return {
                        foo: 1
                    }
                }, 1 !== t[e](Boolean).foo
            }))
        },
        Vt = We.map,
        Wt = Ht("map"),
        zt = Ke("map");
    Pe({
        target: "Array",
        proto: !0,
        forced: !Wt || !zt
    }, {
        map: function(e) {
            return Vt(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var Yt = i((function() {
        _t(1)
    }));
    Pe({
        target: "Object",
        stat: !0,
        forced: Yt
    }, {
        keys: function(e) {
            return _t(Ce(e))
        }
    });
    var $t = Object.setPrototypeOf || ("__proto__" in {} ? function() {
            var e, t = !1,
                n = {};
            try {
                (e = Object.getOwnPropertyDescriptor(Object.prototype, "__proto__").set).call(n, []), t = n instanceof Array
            } catch (e) {}
            return function(n, r) {
                return x(n),
                    function(e) {
                        if (!v(e) && null !== e) throw TypeError("Can't set " + String(e) + " as a prototype")
                    }(r), t ? e.call(n, r) : n.__proto__ = r, n
            }
        }() : void 0),
        Gt = function(e, t, n) {
            var r, i;
            return $t && "function" == typeof(r = t.constructor) && r !== n && v(i = r.prototype) && i !== n.prototype && $t(e, i), e
        },
        Kt = Fe("match"),
        Xt = function(e) {
            var t;
            return v(e) && (void 0 !== (t = e[Kt]) ? !!t : "RegExp" == f(e))
        },
        Jt = function() {
            var e = x(this),
                t = "";
            return e.global && (t += "g"), e.ignoreCase && (t += "i"), e.multiline && (t += "m"), e.dotAll && (t += "s"), e.unicode && (t += "u"), e.sticky && (t += "y"), t
        };

    function Qt(e, t) {
        return RegExp(e, t)
    }
    var Zt = {
            UNSUPPORTED_Y: i((function() {
                var e = Qt("a", "y");
                return e.lastIndex = 2, null != e.exec("abcd")
            })),
            BROKEN_CARET: i((function() {
                var e = Qt("^r", "gy");
                return e.lastIndex = 2, null != e.exec("str")
            }))
        },
        en = Fe("species"),
        tn = function(e) {
            var t = ne(e),
                n = O.f;
            o && t && !t[en] && n(t, en, {
                configurable: !0,
                get: function() {
                    return this
                }
            })
        },
        nn = O.f,
        rn = me.f,
        on = Q.set,
        an = Fe("match"),
        sn = r.RegExp,
        cn = sn.prototype,
        un = /a/g,
        ln = /a/g,
        fn = new sn(un) !== un,
        hn = Zt.UNSUPPORTED_Y;
    if (o && Ae("RegExp", !fn || hn || i((function() {
            return ln[an] = !1, sn(un) != un || sn(ln) == ln || "/a/i" != sn(un, "i")
        })))) {
        for (var pn = function(e, t) {
                var n, r = this instanceof pn,
                    i = Xt(e),
                    o = void 0 === t;
                if (!r && i && e.constructor === pn && o) return e;
                fn ? i && !o && (e = e.source) : e instanceof pn && (o && (t = Jt.call(e)), e = e.source), hn && (n = !!t && t.indexOf("y") > -1) && (t = t.replace(/y/g, ""));
                var a = Gt(fn ? new sn(e, t) : sn(e, t), r ? this : cn, pn);
                return hn && n && on(a, {
                    sticky: n
                }), a
            }, dn = function(e) {
                e in pn || nn(pn, e, {
                    configurable: !0,
                    get: function() {
                        return sn[e]
                    },
                    set: function(t) {
                        sn[e] = t
                    }
                })
            }, gn = rn(sn), vn = 0; gn.length > vn;) dn(gn[vn++]);
        cn.constructor = pn, pn.prototype = cn, Z(r, "RegExp", pn)
    }
    tn("RegExp");
    var mn = RegExp.prototype.exec,
        yn = String.prototype.replace,
        bn = mn,
        wn = function() {
            var e = /a/,
                t = /b*/g;
            return mn.call(e, "a"), mn.call(t, "a"), 0 !== e.lastIndex || 0 !== t.lastIndex
        }(),
        _n = Zt.UNSUPPORTED_Y || Zt.BROKEN_CARET,
        En = void 0 !== /()??/.exec("")[1];
    (wn || En || _n) && (bn = function(e) {
        var t, n, r, i, o = this,
            a = _n && o.sticky,
            s = Jt.call(o),
            c = o.source,
            u = 0,
            l = e;
        return a && (-1 === (s = s.replace("y", "")).indexOf("g") && (s += "g"), l = String(e).slice(o.lastIndex), o.lastIndex > 0 && (!o.multiline || o.multiline && "\n" !== e[o.lastIndex - 1]) && (c = "(?: " + c + ")", l = " " + l, u++), n = new RegExp("^(?:" + c + ")", s)), En && (n = new RegExp("^" + c + "$(?!\\s)", s)), wn && (t = o.lastIndex), r = mn.call(a ? n : o, l), a ? r ? (r.input = r.input.slice(u), r[0] = r[0].slice(u), r.index = o.lastIndex, o.lastIndex += r[0].length) : o.lastIndex = 0 : wn && r && (o.lastIndex = o.global ? r.index + r[0].length : t), En && r && r.length > 1 && yn.call(r[0], n, (function() {
            for (i = 1; i < arguments.length - 2; i++) void 0 === arguments[i] && (r[i] = void 0)
        })), r
    });
    var kn = bn;
    Pe({
        target: "RegExp",
        proto: !0,
        forced: /./.exec !== kn
    }, {
        exec: kn
    });
    var Sn = RegExp.prototype,
        Tn = Sn.toString,
        xn = i((function() {
            return "/a/b" != Tn.call({
                source: "a",
                flags: "b"
            })
        })),
        An = "toString" != Tn.name;
    (xn || An) && Z(RegExp.prototype, "toString", (function() {
        var e = x(this),
            t = String(e.source),
            n = e.flags;
        return "/" + t + "/" + String(void 0 === n && e instanceof RegExp && !("flags" in Sn) ? Jt.call(e) : n)
    }), {
        unsafe: !0
    });
    var On = function(e) {
            if (Xt(e)) throw TypeError("The method doesn't accept regular expressions");
            return e
        },
        Pn = Fe("match");
    Pe({
        target: "String",
        proto: !0,
        forced: ! function(e) {
            var t = /./;
            try {
                "/./" [e](t)
            } catch (n) {
                try {
                    return t[Pn] = !1, "/./" [e](t)
                } catch (e) {}
            }
            return !1
        }("includes")
    }, {
        includes: function(e) {
            return !!~String(d(this)).indexOf(On(e), arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var In, jn, Cn, Rn = function(e) {
            return function(t, n) {
                var r, i, o = String(d(t)),
                    a = oe(n),
                    s = o.length;
                return a < 0 || a >= s ? e ? "" : void 0 : (r = o.charCodeAt(a)) < 55296 || r > 56319 || a + 1 === s || (i = o.charCodeAt(a + 1)) < 56320 || i > 57343 ? e ? o.charAt(a) : r : e ? o.slice(a, a + 2) : i - 56320 + (r - 55296 << 10) + 65536
            }
        },
        Ln = {
            codeAt: Rn(!1),
            charAt: Rn(!0)
        },
        Nn = !i((function() {
            function e() {}
            return e.prototype.constructor = null, Object.getPrototypeOf(new e) !== e.prototype
        })),
        Mn = W("IE_PROTO"),
        Un = Object.prototype,
        Dn = Nn ? Object.getPrototypeOf : function(e) {
            return e = Ce(e), b(e, Mn) ? e[Mn] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? Un : null
        },
        Fn = Fe("iterator"),
        Bn = !1;
    [].keys && ("next" in (Cn = [].keys()) ? (jn = Dn(Dn(Cn))) !== Object.prototype && (In = jn) : Bn = !0), null == In && (In = {}), b(In, Fn) || P(In, Fn, (function() {
        return this
    }));
    var qn = {
            IteratorPrototype: In,
            BUGGY_SAFARI_ITERATORS: Bn
        },
        Hn = O.f,
        Vn = Fe("toStringTag"),
        Wn = function(e, t, n) {
            e && !b(e = n ? e : e.prototype, Vn) && Hn(e, Vn, {
                configurable: !0,
                value: t
            })
        },
        zn = qn.IteratorPrototype,
        Yn = function() {
            return this
        },
        $n = function(e, t, n) {
            var r = t + " Iterator";
            return e.prototype = Ot(zn, {
                next: u(1, n)
            }), Wn(e, r, !1), tt[r] = Yn, e
        },
        Gn = qn.IteratorPrototype,
        Kn = qn.BUGGY_SAFARI_ITERATORS,
        Xn = Fe("iterator"),
        Jn = function() {
            return this
        },
        Qn = function(e, t, n, r, i, o, a) {
            $n(n, t, r);
            var s, c, u, l = function(e) {
                    if (e === i && g) return g;
                    if (!Kn && e in p) return p[e];
                    switch (e) {
                        case "keys":
                        case "values":
                        case "entries":
                            return function() {
                                return new n(this, e)
                            }
                    }
                    return function() {
                        return new n(this)
                    }
                },
                f = t + " Iterator",
                h = !1,
                p = e.prototype,
                d = p[Xn] || p["@@iterator"] || i && p[i],
                g = !Kn && d || l(i),
                v = "Array" == t && p.entries || d;
            if (v && (s = Dn(v.call(new e)), Gn !== Object.prototype && s.next && (Dn(s) !== Gn && ($t ? $t(s, Gn) : "function" != typeof s[Xn] && P(s, Xn, Jn)), Wn(s, f, !0))), "values" == i && d && "values" !== d.name && (h = !0, g = function() {
                    return d.call(this)
                }), p[Xn] !== g && P(p, Xn, g), tt[t] = g, i)
                if (c = {
                        values: l("values"),
                        keys: o ? g : l("keys"),
                        entries: l("entries")
                    }, a)
                    for (u in c)(Kn || h || !(u in p)) && Z(p, u, c[u]);
                else Pe({
                    target: t,
                    proto: !0,
                    forced: Kn || h
                }, c);
            return c
        },
        Zn = Ln.charAt,
        er = Q.set,
        tr = Q.getterFor("String Iterator");
    Qn(String, "String", (function(e) {
        er(this, {
            type: "String Iterator",
            string: String(e),
            index: 0
        })
    }), (function() {
        var e, t = tr(this),
            n = t.string,
            r = t.index;
        return r >= n.length ? {
            value: void 0,
            done: !0
        } : (e = Zn(n, r), t.index += e.length, {
            value: e,
            done: !1
        })
    }));
    var nr = {
        CSSRuleList: 0,
        CSSStyleDeclaration: 0,
        CSSValueList: 0,
        ClientRectList: 0,
        DOMRectList: 0,
        DOMStringList: 0,
        DOMTokenList: 1,
        DataTransferItemList: 0,
        FileList: 0,
        HTMLAllCollection: 0,
        HTMLCollection: 0,
        HTMLFormElement: 0,
        HTMLSelectElement: 0,
        MediaList: 0,
        MimeTypeArray: 0,
        NamedNodeMap: 0,
        NodeList: 1,
        PaintRequestList: 0,
        Plugin: 0,
        PluginArray: 0,
        SVGLengthList: 0,
        SVGNumberList: 0,
        SVGPathSegList: 0,
        SVGPointList: 0,
        SVGStringList: 0,
        SVGTransformList: 0,
        SourceBufferList: 0,
        StyleSheetList: 0,
        TextTrackCueList: 0,
        TextTrackList: 0,
        TouchList: 0
    };
    for (var rr in nr) {
        var ir = r[rr],
            or = ir && ir.prototype;
        if (or && or.forEach !== Ze) try {
            P(or, "forEach", Ze)
        } catch (e) {
            or.forEach = Ze
        }
    }
    var ar = document.getElementById("container");
    document.addEventListener("focusout", (function(e) {
            e.target.classList && !ar.contains(e.target) && e.target.classList.remove("tab-focus")
        })), document.addEventListener("keydown", (function(e) {
            9 === e.keyCode && setTimeout((function() {
                var e = document.activeElement;
                e && e.classList && !ar.contains(e) && e.classList.add("tab-focus")
            }), 10)
        })),
        function() {
            if ("undefined" != typeof window) try {
                var e = new window.CustomEvent("test", {
                    cancelable: !0
                });
                if (e.preventDefault(), !0 !== e.defaultPrevented) throw new Error("Could not prevent default")
            } catch (e) {
                var t = function(e, t) {
                    var n, r;
                    return (t = t || {}).bubbles = !!t.bubbles, t.cancelable = !!t.cancelable, (n = document.createEvent("CustomEvent")).initCustomEvent(e, t.bubbles, t.cancelable, t.detail), r = n.preventDefault, n.preventDefault = function() {
                        r.call(this);
                        try {
                            Object.defineProperty(this, "defaultPrevented", {
                                get: function() {
                                    return !0
                                }
                            })
                        } catch (e) {
                            this.defaultPrevented = !0
                        }
                    }, n
                };
                t.prototype = window.Event.prototype, window.CustomEvent = t
            }
        }();
    var sr = me.f,
        cr = {}.toString,
        ur = "object" == typeof window && window && Object.getOwnPropertyNames ? Object.getOwnPropertyNames(window) : [],
        lr = {
            f: function(e) {
                return ur && "[object Window]" == cr.call(e) ? function(e) {
                    try {
                        return sr(e)
                    } catch (e) {
                        return ur.slice()
                    }
                }(e) : sr(g(e))
            }
        },
        fr = {
            f: Fe
        },
        hr = O.f,
        pr = function(e) {
            var t = ee.Symbol || (ee.Symbol = {});
            b(t, e) || hr(t, e, {
                value: fr.f(e)
            })
        },
        dr = We.forEach,
        gr = W("hidden"),
        vr = Fe("toPrimitive"),
        mr = Q.set,
        yr = Q.getterFor("Symbol"),
        br = Object.prototype,
        wr = r.Symbol,
        _r = ne("JSON", "stringify"),
        Er = T.f,
        kr = O.f,
        Sr = lr.f,
        Tr = c.f,
        xr = F("symbols"),
        Ar = F("op-symbols"),
        Or = F("string-to-symbol-registry"),
        Pr = F("symbol-to-string-registry"),
        Ir = F("wks"),
        jr = r.QObject,
        Cr = !jr || !jr.prototype || !jr.prototype.findChild,
        Rr = o && i((function() {
            return 7 != Ot(kr({}, "a", {
                get: function() {
                    return kr(this, "a", {
                        value: 7
                    }).a
                }
            })).a
        })) ? function(e, t, n) {
            var r = Er(br, t);
            r && delete br[t], kr(e, t, n), r && e !== br && kr(br, t, r)
        } : kr,
        Lr = function(e, t) {
            var n = xr[e] = Ot(wr.prototype);
            return mr(n, {
                type: "Symbol",
                tag: e,
                description: t
            }), o || (n.description = t), n
        },
        Nr = Ne ? function(e) {
            return "symbol" == typeof e
        } : function(e) {
            return Object(e) instanceof wr
        },
        Mr = function(e, t, n) {
            e === br && Mr(Ar, t, n), x(e);
            var r = m(t, !0);
            return x(n), b(xr, r) ? (n.enumerable ? (b(e, gr) && e[gr][r] && (e[gr][r] = !1), n = Ot(n, {
                enumerable: u(0, !1)
            })) : (b(e, gr) || kr(e, gr, u(1, {})), e[gr][r] = !0), Rr(e, r, n)) : kr(e, r, n)
        },
        Ur = function(e, t) {
            x(e);
            var n = g(t),
                r = _t(n).concat(qr(n));
            return dr(r, (function(t) {
                o && !Dr.call(n, t) || Mr(e, t, n[t])
            })), e
        },
        Dr = function(e) {
            var t = m(e, !0),
                n = Tr.call(this, t);
            return !(this === br && b(xr, t) && !b(Ar, t)) && (!(n || !b(this, t) || !b(xr, t) || b(this, gr) && this[gr][t]) || n)
        },
        Fr = function(e, t) {
            var n = g(e),
                r = m(t, !0);
            if (n !== br || !b(xr, r) || b(Ar, r)) {
                var i = Er(n, r);
                return !i || !b(xr, r) || b(n, gr) && n[gr][r] || (i.enumerable = !0), i
            }
        },
        Br = function(e) {
            var t = Sr(g(e)),
                n = [];
            return dr(t, (function(e) {
                b(xr, e) || b(z, e) || n.push(e)
            })), n
        },
        qr = function(e) {
            var t = e === br,
                n = Sr(t ? Ar : g(e)),
                r = [];
            return dr(n, (function(e) {
                !b(xr, e) || t && !b(br, e) || r.push(xr[e])
            })), r
        };
    if (Le || (Z((wr = function() {
            if (this instanceof wr) throw TypeError("Symbol is not a constructor");
            var e = arguments.length && void 0 !== arguments[0] ? String(arguments[0]) : void 0,
                t = H(e),
                n = function(e) {
                    this === br && n.call(Ar, e), b(this, gr) && b(this[gr], t) && (this[gr][t] = !1), Rr(this, t, u(1, e))
                };
            return o && Cr && Rr(br, t, {
                configurable: !0,
                set: n
            }), Lr(t, e)
        }).prototype, "toString", (function() {
            return yr(this).tag
        })), Z(wr, "withoutSetter", (function(e) {
            return Lr(H(e), e)
        })), c.f = Dr, O.f = Mr, T.f = Fr, me.f = lr.f = Br, ye.f = qr, fr.f = function(e) {
            return Lr(Fe(e), e)
        }, o && (kr(wr.prototype, "description", {
            configurable: !0,
            get: function() {
                return yr(this).description
            }
        }), Z(br, "propertyIsEnumerable", Dr, {
            unsafe: !0
        }))), Pe({
            global: !0,
            wrap: !0,
            forced: !Le,
            sham: !Le
        }, {
            Symbol: wr
        }), dr(_t(Ir), (function(e) {
            pr(e)
        })), Pe({
            target: "Symbol",
            stat: !0,
            forced: !Le
        }, {
            for: function(e) {
                var t = String(e);
                if (b(Or, t)) return Or[t];
                var n = wr(t);
                return Or[t] = n, Pr[n] = t, n
            },
            keyFor: function(e) {
                if (!Nr(e)) throw TypeError(e + " is not a symbol");
                if (b(Pr, e)) return Pr[e]
            },
            useSetter: function() {
                Cr = !0
            },
            useSimple: function() {
                Cr = !1
            }
        }), Pe({
            target: "Object",
            stat: !0,
            forced: !Le,
            sham: !o
        }, {
            create: function(e, t) {
                return void 0 === t ? Ot(e) : Ur(Ot(e), t)
            },
            defineProperty: Mr,
            defineProperties: Ur,
            getOwnPropertyDescriptor: Fr
        }), Pe({
            target: "Object",
            stat: !0,
            forced: !Le
        }, {
            getOwnPropertyNames: Br,
            getOwnPropertySymbols: qr
        }), Pe({
            target: "Object",
            stat: !0,
            forced: i((function() {
                ye.f(1)
            }))
        }, {
            getOwnPropertySymbols: function(e) {
                return ye.f(Ce(e))
            }
        }), _r) {
        var Hr = !Le || i((function() {
            var e = wr();
            return "[null]" != _r([e]) || "{}" != _r({
                a: e
            }) || "{}" != _r(Object(e))
        }));
        Pe({
            target: "JSON",
            stat: !0,
            forced: Hr
        }, {
            stringify: function(e, t, n) {
                for (var r, i = [e], o = 1; arguments.length > o;) i.push(arguments[o++]);
                if (r = t, (v(t) || void 0 !== e) && !Nr(e)) return Re(t) || (t = function(e, t) {
                    if ("function" == typeof r && (t = r.call(this, e, t)), !Nr(t)) return t
                }), i[1] = t, _r.apply(null, i)
            }
        })
    }
    wr.prototype[vr] || P(wr.prototype, vr, wr.prototype.valueOf), Wn(wr, "Symbol"), z[gr] = !0;
    var Vr = O.f,
        Wr = r.Symbol;
    if (o && "function" == typeof Wr && (!("description" in Wr.prototype) || void 0 !== Wr().description)) {
        var zr = {},
            Yr = function() {
                var e = arguments.length < 1 || void 0 === arguments[0] ? void 0 : String(arguments[0]),
                    t = this instanceof Yr ? new Wr(e) : void 0 === e ? Wr() : Wr(e);
                return "" === e && (zr[t] = !0), t
            };
        we(Yr, Wr);
        var $r = Yr.prototype = Wr.prototype;
        $r.constructor = Yr;
        var Gr = $r.toString,
            Kr = "Symbol(test)" == String(Wr("test")),
            Xr = /^Symbol\((.*)\)[^)]+$/;
        Vr($r, "description", {
            configurable: !0,
            get: function() {
                var e = v(this) ? this.valueOf() : this,
                    t = Gr.call(e);
                if (b(zr, e)) return "";
                var n = Kr ? t.slice(7, -1) : t.replace(Xr, "$1");
                return "" === n ? void 0 : n
            }
        }), Pe({
            global: !0,
            forced: !0
        }, {
            Symbol: Yr
        })
    }
    pr("iterator");
    var Jr = he.indexOf,
        Qr = [].indexOf,
        Zr = !!Qr && 1 / [1].indexOf(1, -0) < 0,
        ei = ze("indexOf"),
        ti = Ke("indexOf", {
            ACCESSORS: !0,
            1: 0
        });
    Pe({
        target: "Array",
        proto: !0,
        forced: Zr || !ei || !ti
    }, {
        indexOf: function(e) {
            return Zr ? Qr.apply(this, arguments) || 0 : Jr(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var ni = Q.set,
        ri = Q.getterFor("Array Iterator"),
        ii = Qn(Array, "Array", (function(e, t) {
            ni(this, {
                type: "Array Iterator",
                target: g(e),
                index: 0,
                kind: t
            })
        }), (function() {
            var e = ri(this),
                t = e.target,
                n = e.kind,
                r = e.index++;
            return !t || r >= t.length ? (e.target = void 0, {
                value: void 0,
                done: !0
            }) : "keys" == n ? {
                value: r,
                done: !1
            } : "values" == n ? {
                value: t[r],
                done: !1
            } : {
                value: [r, t[r]],
                done: !1
            }
        }), "values");
    tt.Arguments = tt.Array, jt("keys"), jt("values"), jt("entries");
    var oi = [].join,
        ai = p != Object,
        si = ze("join", ",");
    Pe({
        target: "Array",
        proto: !0,
        forced: ai || !si
    }, {
        join: function(e) {
            return oi.call(g(this), void 0 === e ? "," : e)
        }
    });
    var ci = Ht("slice"),
        ui = Ke("slice", {
            ACCESSORS: !0,
            0: 0,
            1: 2
        }),
        li = Fe("species"),
        fi = [].slice,
        hi = Math.max;
    Pe({
        target: "Array",
        proto: !0,
        forced: !ci || !ui
    }, {
        slice: function(e, t) {
            var n, r, i, o = g(this),
                a = se(o.length),
                s = le(e, a),
                c = le(void 0 === t ? a : t, a);
            if (Re(o) && ("function" != typeof(n = o.constructor) || n !== Array && !Re(n.prototype) ? v(n) && null === (n = n[li]) && (n = void 0) : n = void 0, n === Array || void 0 === n)) return fi.call(o, s, c);
            for (r = new(void 0 === n ? Array : n)(hi(c - s, 0)), i = 0; s < c; s++, i++) s in o && ot(r, i, o[s]);
            return r.length = i, r
        }
    });
    var pi = st ? {}.toString : function() {
        return "[object " + lt(this) + "]"
    };
    st || Z(Object.prototype, "toString", pi, {
        unsafe: !0
    });
    var di = Fe("species"),
        gi = !i((function() {
            var e = /./;
            return e.exec = function() {
                var e = [];
                return e.groups = {
                    a: "7"
                }, e
            }, "7" !== "".replace(e, "$<a>")
        })),
        vi = "$0" === "a".replace(/./, "$0"),
        mi = Fe("replace"),
        yi = !!/./ [mi] && "" === /./ [mi]("a", "$0"),
        bi = !i((function() {
            var e = /(?:)/,
                t = e.exec;
            e.exec = function() {
                return t.apply(this, arguments)
            };
            var n = "ab".split(e);
            return 2 !== n.length || "a" !== n[0] || "b" !== n[1]
        })),
        wi = function(e, t, n, r) {
            var o = Fe(e),
                a = !i((function() {
                    var t = {};
                    return t[o] = function() {
                        return 7
                    }, 7 != "" [e](t)
                })),
                s = a && !i((function() {
                    var t = !1,
                        n = /a/;
                    return "split" === e && ((n = {}).constructor = {}, n.constructor[di] = function() {
                        return n
                    }, n.flags = "", n[o] = /./ [o]), n.exec = function() {
                        return t = !0, null
                    }, n[o](""), !t
                }));
            if (!a || !s || "replace" === e && (!gi || !vi || yi) || "split" === e && !bi) {
                var c = /./ [o],
                    u = n(o, "" [e], (function(e, t, n, r, i) {
                        return t.exec === kn ? a && !i ? {
                            done: !0,
                            value: c.call(t, n, r)
                        } : {
                            done: !0,
                            value: e.call(n, t, r)
                        } : {
                            done: !1
                        }
                    }), {
                        REPLACE_KEEPS_$0: vi,
                        REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE: yi
                    }),
                    l = u[0],
                    f = u[1];
                Z(String.prototype, e, l), Z(RegExp.prototype, o, 2 == t ? function(e, t) {
                    return f.call(e, this, t)
                } : function(e) {
                    return f.call(e, this)
                })
            }
            r && P(RegExp.prototype[o], "sham", !0)
        },
        _i = Ln.charAt,
        Ei = function(e, t, n) {
            return t + (n ? _i(e, t).length : 1)
        },
        ki = function(e, t) {
            var n = e.exec;
            if ("function" == typeof n) {
                var r = n.call(e, t);
                if ("object" != typeof r) throw TypeError("RegExp exec method returned something other than an Object or null");
                return r
            }
            if ("RegExp" !== f(e)) throw TypeError("RegExp#exec called on incompatible receiver");
            return kn.call(e, t)
        },
        Si = Math.max,
        Ti = Math.min,
        xi = Math.floor,
        Ai = /\$([$&'`]|\d\d?|<[^>]*>)/g,
        Oi = /\$([$&'`]|\d\d?)/g;
    wi("replace", 2, (function(e, t, n, r) {
        var i = r.REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE,
            o = r.REPLACE_KEEPS_$0,
            a = i ? "$" : "$0";
        return [function(n, r) {
            var i = d(this),
                o = null == n ? void 0 : n[e];
            return void 0 !== o ? o.call(n, i, r) : t.call(String(i), n, r)
        }, function(e, r) {
            if (!i && o || "string" == typeof r && -1 === r.indexOf(a)) {
                var c = n(t, e, this, r);
                if (c.done) return c.value
            }
            var u = x(e),
                l = String(this),
                f = "function" == typeof r;
            f || (r = String(r));
            var h = u.global;
            if (h) {
                var p = u.unicode;
                u.lastIndex = 0
            }
            for (var d = [];;) {
                var g = ki(u, l);
                if (null === g) break;
                if (d.push(g), !h) break;
                "" === String(g[0]) && (u.lastIndex = Ei(l, se(u.lastIndex), p))
            }
            for (var v, m = "", y = 0, b = 0; b < d.length; b++) {
                g = d[b];
                for (var w = String(g[0]), _ = Si(Ti(oe(g.index), l.length), 0), E = [], k = 1; k < g.length; k++) E.push(void 0 === (v = g[k]) ? v : String(v));
                var S = g.groups;
                if (f) {
                    var T = [w].concat(E, _, l);
                    void 0 !== S && T.push(S);
                    var A = String(r.apply(void 0, T))
                } else A = s(w, l, _, E, S, r);
                _ >= y && (m += l.slice(y, _) + A, y = _ + w.length)
            }
            return m + l.slice(y)
        }];

        function s(e, n, r, i, o, a) {
            var s = r + e.length,
                c = i.length,
                u = Oi;
            return void 0 !== o && (o = Ce(o), u = Ai), t.call(a, u, (function(t, a) {
                var u;
                switch (a.charAt(0)) {
                    case "$":
                        return "$";
                    case "&":
                        return e;
                    case "`":
                        return n.slice(0, r);
                    case "'":
                        return n.slice(s);
                    case "<":
                        u = o[a.slice(1, -1)];
                        break;
                    default:
                        var l = +a;
                        if (0 === l) return t;
                        if (l > c) {
                            var f = xi(l / 10);
                            return 0 === f ? t : f <= c ? void 0 === i[f - 1] ? a.charAt(1) : i[f - 1] + a.charAt(1) : t
                        }
                        u = i[l - 1]
                }
                return void 0 === u ? "" : u
            }))
        }
    }));
    var Pi = Object.is || function(e, t) {
        return e === t ? 0 !== e || 1 / e == 1 / t : e != e && t != t
    };
    wi("search", 1, (function(e, t, n) {
        return [function(t) {
            var n = d(this),
                r = null == t ? void 0 : t[e];
            return void 0 !== r ? r.call(t, n) : new RegExp(t)[e](String(n))
        }, function(e) {
            var r = n(t, e, this);
            if (r.done) return r.value;
            var i = x(e),
                o = String(this),
                a = i.lastIndex;
            Pi(a, 0) || (i.lastIndex = 0);
            var s = ki(i, o);
            return Pi(i.lastIndex, a) || (i.lastIndex = a), null === s ? -1 : s.index
        }]
    }));
    var Ii = Fe("species"),
        ji = function(e, t) {
            var n, r = x(e).constructor;
            return void 0 === r || null == (n = x(r)[Ii]) ? t : Ie(n)
        },
        Ci = [].push,
        Ri = Math.min,
        Li = !i((function() {
            return !RegExp(4294967295, "y")
        }));
    wi("split", 2, (function(e, t, n) {
        var r;
        return r = "c" == "abbc".split(/(b)*/)[1] || 4 != "test".split(/(?:)/, -1).length || 2 != "ab".split(/(?:ab)*/).length || 4 != ".".split(/(.?)(.?)/).length || ".".split(/()()/).length > 1 || "".split(/.?/).length ? function(e, n) {
            var r = String(d(this)),
                i = void 0 === n ? 4294967295 : n >>> 0;
            if (0 === i) return [];
            if (void 0 === e) return [r];
            if (!Xt(e)) return t.call(r, e, i);
            for (var o, a, s, c = [], u = (e.ignoreCase ? "i" : "") + (e.multiline ? "m" : "") + (e.unicode ? "u" : "") + (e.sticky ? "y" : ""), l = 0, f = new RegExp(e.source, u + "g");
                (o = kn.call(f, r)) && !((a = f.lastIndex) > l && (c.push(r.slice(l, o.index)), o.length > 1 && o.index < r.length && Ci.apply(c, o.slice(1)), s = o[0].length, l = a, c.length >= i));) f.lastIndex === o.index && f.lastIndex++;
            return l === r.length ? !s && f.test("") || c.push("") : c.push(r.slice(l)), c.length > i ? c.slice(0, i) : c
        } : "0".split(void 0, 0).length ? function(e, n) {
            return void 0 === e && 0 === n ? [] : t.call(this, e, n)
        } : t, [function(t, n) {
            var i = d(this),
                o = null == t ? void 0 : t[e];
            return void 0 !== o ? o.call(t, i, n) : r.call(String(i), t, n)
        }, function(e, i) {
            var o = n(r, e, this, i, r !== t);
            if (o.done) return o.value;
            var a = x(e),
                s = String(this),
                c = ji(a, RegExp),
                u = a.unicode,
                l = (a.ignoreCase ? "i" : "") + (a.multiline ? "m" : "") + (a.unicode ? "u" : "") + (Li ? "y" : "g"),
                f = new c(Li ? a : "^(?:" + a.source + ")", l),
                h = void 0 === i ? 4294967295 : i >>> 0;
            if (0 === h) return [];
            if (0 === s.length) return null === ki(f, s) ? [s] : [];
            for (var p = 0, d = 0, g = []; d < s.length;) {
                f.lastIndex = Li ? d : 0;
                var v, m = ki(f, Li ? s : s.slice(d));
                if (null === m || (v = Ri(se(f.lastIndex + (Li ? 0 : d)), s.length)) === p) d = Ei(s, d, u);
                else {
                    if (g.push(s.slice(p, d)), g.length === h) return g;
                    for (var y = 1; y <= m.length - 1; y++)
                        if (g.push(m[y]), g.length === h) return g;
                    d = p = v
                }
            }
            return g.push(s.slice(p)), g
        }]
    }), !Li);
    var Ni = Fe("iterator"),
        Mi = Fe("toStringTag"),
        Ui = ii.values;
    for (var Di in nr) {
        var Fi = r[Di],
            Bi = Fi && Fi.prototype;
        if (Bi) {
            if (Bi[Ni] !== Ui) try {
                P(Bi, Ni, Ui)
            } catch (e) {
                Bi[Ni] = Ui
            }
            if (Bi[Mi] || P(Bi, Mi, Di), nr[Di])
                for (var qi in ii)
                    if (Bi[qi] !== ii[qi]) try {
                        P(Bi, qi, ii[qi])
                    } catch (e) {
                        Bi[qi] = ii[qi]
                    }
        }
    }
    var Hi = Fe("iterator"),
        Vi = !i((function() {
            var e = new URL("b?a=1&b=2&c=3", "http://a"),
                t = e.searchParams,
                n = "";
            return e.pathname = "c%20d", t.forEach((function(e, r) {
                t.delete("b"), n += r + e
            })), !t.sort || "http://a/c%20d?a=1&c=3" !== e.href || "3" !== t.get("c") || "a=1" !== String(new URLSearchParams("?a=1")) || !t[Hi] || "a" !== new URL("https://a@b").username || "b" !== new URLSearchParams(new URLSearchParams("a=b")).get("a") || "xn--e1aybc" !== new URL("http://тест").host || "#%D0%B1" !== new URL("http://a#б").hash || "a1c3" !== n || "x" !== new URL("http://x", void 0).host
        })),
        Wi = function(e, t, n) {
            if (!(e instanceof t)) throw TypeError("Incorrect " + (n ? n + " " : "") + "invocation");
            return e
        },
        zi = Object.assign,
        Yi = Object.defineProperty,
        $i = !zi || i((function() {
            if (o && 1 !== zi({
                    b: 1
                }, zi(Yi({}, "a", {
                    enumerable: !0,
                    get: function() {
                        Yi(this, "b", {
                            value: 3,
                            enumerable: !1
                        })
                    }
                }), {
                    b: 2
                })).b) return !0;
            var e = {},
                t = {},
                n = Symbol();
            return e[n] = 7, "abcdefghijklmnopqrst".split("").forEach((function(e) {
                t[e] = e
            })), 7 != zi({}, e)[n] || "abcdefghijklmnopqrst" != _t(zi({}, t)).join("")
        })) ? function(e, t) {
            for (var n = Ce(e), r = arguments.length, i = 1, a = ye.f, s = c.f; r > i;)
                for (var u, l = p(arguments[i++]), f = a ? _t(l).concat(a(l)) : _t(l), h = f.length, d = 0; h > d;) u = f[d++], o && !s.call(l, u) || (n[u] = l[u]);
            return n
        } : zi,
        Gi = /[^\0-\u007E]/,
        Ki = /[.\u3002\uFF0E\uFF61]/g,
        Xi = "Overflow: input needs wider integers to process",
        Ji = Math.floor,
        Qi = String.fromCharCode,
        Zi = function(e) {
            return e + 22 + 75 * (e < 26)
        },
        eo = function(e, t, n) {
            var r = 0;
            for (e = n ? Ji(e / 700) : e >> 1, e += Ji(e / t); e > 455; r += 36) e = Ji(e / 35);
            return Ji(r + 36 * e / (e + 38))
        },
        to = function(e) {
            var t, n, r = [],
                i = (e = function(e) {
                    for (var t = [], n = 0, r = e.length; n < r;) {
                        var i = e.charCodeAt(n++);
                        if (i >= 55296 && i <= 56319 && n < r) {
                            var o = e.charCodeAt(n++);
                            56320 == (64512 & o) ? t.push(((1023 & i) << 10) + (1023 & o) + 65536) : (t.push(i), n--)
                        } else t.push(i)
                    }
                    return t
                }(e)).length,
                o = 128,
                a = 0,
                s = 72;
            for (t = 0; t < e.length; t++)(n = e[t]) < 128 && r.push(Qi(n));
            var c = r.length,
                u = c;
            for (c && r.push("-"); u < i;) {
                var l = 2147483647;
                for (t = 0; t < e.length; t++)(n = e[t]) >= o && n < l && (l = n);
                var f = u + 1;
                if (l - o > Ji((2147483647 - a) / f)) throw RangeError(Xi);
                for (a += (l - o) * f, o = l, t = 0; t < e.length; t++) {
                    if ((n = e[t]) < o && ++a > 2147483647) throw RangeError(Xi);
                    if (n == o) {
                        for (var h = a, p = 36;; p += 36) {
                            var d = p <= s ? 1 : p >= s + 26 ? 26 : p - s;
                            if (h < d) break;
                            var g = h - d,
                                v = 36 - d;
                            r.push(Qi(Zi(d + g % v))), h = Ji(g / v)
                        }
                        r.push(Qi(Zi(h))), s = eo(a, f, u == c), a = 0, ++u
                    }
                }++a, ++o
            }
            return r.join("")
        },
        no = function(e, t, n) {
            for (var r in t) Z(e, r, t[r], n);
            return e
        },
        ro = function(e) {
            var t = ht(e);
            if ("function" != typeof t) throw TypeError(String(e) + " is not iterable");
            return x(t.call(e))
        },
        io = ne("fetch"),
        oo = ne("Headers"),
        ao = Fe("iterator"),
        so = Q.set,
        co = Q.getterFor("URLSearchParams"),
        uo = Q.getterFor("URLSearchParamsIterator"),
        lo = /\+/g,
        fo = Array(4),
        ho = function(e) {
            return fo[e - 1] || (fo[e - 1] = RegExp("((?:%[\\da-f]{2}){" + e + "})", "gi"))
        },
        po = function(e) {
            try {
                return decodeURIComponent(e)
            } catch (t) {
                return e
            }
        },
        go = function(e) {
            var t = e.replace(lo, " "),
                n = 4;
            try {
                return decodeURIComponent(t)
            } catch (e) {
                for (; n;) t = t.replace(ho(n--), po);
                return t
            }
        },
        vo = /[!'()~]|%20/g,
        mo = {
            "!": "%21",
            "'": "%27",
            "(": "%28",
            ")": "%29",
            "~": "%7E",
            "%20": "+"
        },
        yo = function(e) {
            return mo[e]
        },
        bo = function(e) {
            return encodeURIComponent(e).replace(vo, yo)
        },
        wo = function(e, t) {
            if (t)
                for (var n, r, i = t.split("&"), o = 0; o < i.length;)(n = i[o++]).length && (r = n.split("="), e.push({
                    key: go(r.shift()),
                    value: go(r.join("="))
                }))
        },
        _o = function(e) {
            this.entries.length = 0, wo(this.entries, e)
        },
        Eo = function(e, t) {
            if (e < t) throw TypeError("Not enough arguments")
        },
        ko = $n((function(e, t) {
            so(this, {
                type: "URLSearchParamsIterator",
                iterator: ro(co(e).entries),
                kind: t
            })
        }), "Iterator", (function() {
            var e = uo(this),
                t = e.kind,
                n = e.iterator.next(),
                r = n.value;
            return n.done || (n.value = "keys" === t ? r.key : "values" === t ? r.value : [r.key, r.value]), n
        })),
        So = function() {
            Wi(this, So, "URLSearchParams");
            var e, t, n, r, i, o, a, s, c, u = arguments.length > 0 ? arguments[0] : void 0,
                l = this,
                f = [];
            if (so(l, {
                    type: "URLSearchParams",
                    entries: f,
                    updateURL: function() {},
                    updateSearchParams: _o
                }), void 0 !== u)
                if (v(u))
                    if ("function" == typeof(e = ht(u)))
                        for (n = (t = e.call(u)).next; !(r = n.call(t)).done;) {
                            if ((a = (o = (i = ro(x(r.value))).next).call(i)).done || (s = o.call(i)).done || !o.call(i).done) throw TypeError("Expected sequence with length 2");
                            f.push({
                                key: a.value + "",
                                value: s.value + ""
                            })
                        } else
                            for (c in u) b(u, c) && f.push({
                                key: c,
                                value: u[c] + ""
                            });
                    else wo(f, "string" == typeof u ? "?" === u.charAt(0) ? u.slice(1) : u : u + "")
        },
        To = So.prototype;
    no(To, {
        append: function(e, t) {
            Eo(arguments.length, 2);
            var n = co(this);
            n.entries.push({
                key: e + "",
                value: t + ""
            }), n.updateURL()
        },
        delete: function(e) {
            Eo(arguments.length, 1);
            for (var t = co(this), n = t.entries, r = e + "", i = 0; i < n.length;) n[i].key === r ? n.splice(i, 1) : i++;
            t.updateURL()
        },
        get: function(e) {
            Eo(arguments.length, 1);
            for (var t = co(this).entries, n = e + "", r = 0; r < t.length; r++)
                if (t[r].key === n) return t[r].value;
            return null
        },
        getAll: function(e) {
            Eo(arguments.length, 1);
            for (var t = co(this).entries, n = e + "", r = [], i = 0; i < t.length; i++) t[i].key === n && r.push(t[i].value);
            return r
        },
        has: function(e) {
            Eo(arguments.length, 1);
            for (var t = co(this).entries, n = e + "", r = 0; r < t.length;)
                if (t[r++].key === n) return !0;
            return !1
        },
        set: function(e, t) {
            Eo(arguments.length, 1);
            for (var n, r = co(this), i = r.entries, o = !1, a = e + "", s = t + "", c = 0; c < i.length; c++)(n = i[c]).key === a && (o ? i.splice(c--, 1) : (o = !0, n.value = s));
            o || i.push({
                key: a,
                value: s
            }), r.updateURL()
        },
        sort: function() {
            var e, t, n, r = co(this),
                i = r.entries,
                o = i.slice();
            for (i.length = 0, n = 0; n < o.length; n++) {
                for (e = o[n], t = 0; t < n; t++)
                    if (i[t].key > e.key) {
                        i.splice(t, 0, e);
                        break
                    } t === n && i.push(e)
            }
            r.updateURL()
        },
        forEach: function(e) {
            for (var t, n = co(this).entries, r = je(e, arguments.length > 1 ? arguments[1] : void 0, 3), i = 0; i < n.length;) r((t = n[i++]).value, t.key, this)
        },
        keys: function() {
            return new ko(this, "keys")
        },
        values: function() {
            return new ko(this, "values")
        },
        entries: function() {
            return new ko(this, "entries")
        }
    }, {
        enumerable: !0
    }), Z(To, ao, To.entries), Z(To, "toString", (function() {
        for (var e, t = co(this).entries, n = [], r = 0; r < t.length;) e = t[r++], n.push(bo(e.key) + "=" + bo(e.value));
        return n.join("&")
    }), {
        enumerable: !0
    }), Wn(So, "URLSearchParams"), Pe({
        global: !0,
        forced: !Vi
    }, {
        URLSearchParams: So
    }), Vi || "function" != typeof io || "function" != typeof oo || Pe({
        global: !0,
        enumerable: !0,
        forced: !0
    }, {
        fetch: function(e) {
            var t, n, r, i = [e];
            return arguments.length > 1 && (t = arguments[1], v(t) && (n = t.body, "URLSearchParams" === lt(n) && ((r = t.headers ? new oo(t.headers) : new oo).has("content-type") || r.set("content-type", "application/x-www-form-urlencoded;charset=UTF-8"), t = Ot(t, {
                body: u(0, String(n)),
                headers: u(0, r)
            }))), i.push(t)), io.apply(this, i)
        }
    });
    var xo, Ao = {
            URLSearchParams: So,
            getState: co
        },
        Oo = Ln.codeAt,
        Po = r.URL,
        Io = Ao.URLSearchParams,
        jo = Ao.getState,
        Co = Q.set,
        Ro = Q.getterFor("URL"),
        Lo = Math.floor,
        No = Math.pow,
        Mo = /[A-Za-z]/,
        Uo = /[\d+-.A-Za-z]/,
        Do = /\d/,
        Fo = /^(0x|0X)/,
        Bo = /^[0-7]+$/,
        qo = /^\d+$/,
        Ho = /^[\dA-Fa-f]+$/,
        Vo = /[\u0000\u0009\u000A\u000D #%/:?@[\\]]/,
        Wo = /[\u0000\u0009\u000A\u000D #/:?@[\\]]/,
        zo = /^[\u0000-\u001F ]+|[\u0000-\u001F ]+$/g,
        Yo = /[\u0009\u000A\u000D]/g,
        $o = function(e, t) {
            var n, r, i;
            if ("[" == t.charAt(0)) {
                if ("]" != t.charAt(t.length - 1)) return "Invalid host";
                if (!(n = Ko(t.slice(1, -1)))) return "Invalid host";
                e.host = n
            } else if (ra(e)) {
                if (t = function(e) {
                        var t, n, r = [],
                            i = e.toLowerCase().replace(Ki, ".").split(".");
                        for (t = 0; t < i.length; t++) n = i[t], r.push(Gi.test(n) ? "xn--" + to(n) : n);
                        return r.join(".")
                    }(t), Vo.test(t)) return "Invalid host";
                if (null === (n = Go(t))) return "Invalid host";
                e.host = n
            } else {
                if (Wo.test(t)) return "Invalid host";
                for (n = "", r = pt(t), i = 0; i < r.length; i++) n += ta(r[i], Jo);
                e.host = n
            }
        },
        Go = function(e) {
            var t, n, r, i, o, a, s, c = e.split(".");
            if (c.length && "" == c[c.length - 1] && c.pop(), (t = c.length) > 4) return e;
            for (n = [], r = 0; r < t; r++) {
                if ("" == (i = c[r])) return e;
                if (o = 10, i.length > 1 && "0" == i.charAt(0) && (o = Fo.test(i) ? 16 : 8, i = i.slice(8 == o ? 1 : 2)), "" === i) a = 0;
                else {
                    if (!(10 == o ? qo : 8 == o ? Bo : Ho).test(i)) return e;
                    a = parseInt(i, o)
                }
                n.push(a)
            }
            for (r = 0; r < t; r++)
                if (a = n[r], r == t - 1) {
                    if (a >= No(256, 5 - t)) return null
                } else if (a > 255) return null;
            for (s = n.pop(), r = 0; r < n.length; r++) s += n[r] * No(256, 3 - r);
            return s
        },
        Ko = function(e) {
            var t, n, r, i, o, a, s, c = [0, 0, 0, 0, 0, 0, 0, 0],
                u = 0,
                l = null,
                f = 0,
                h = function() {
                    return e.charAt(f)
                };
            if (":" == h()) {
                if (":" != e.charAt(1)) return;
                f += 2, l = ++u
            }
            for (; h();) {
                if (8 == u) return;
                if (":" != h()) {
                    for (t = n = 0; n < 4 && Ho.test(h());) t = 16 * t + parseInt(h(), 16), f++, n++;
                    if ("." == h()) {
                        if (0 == n) return;
                        if (f -= n, u > 6) return;
                        for (r = 0; h();) {
                            if (i = null, r > 0) {
                                if (!("." == h() && r < 4)) return;
                                f++
                            }
                            if (!Do.test(h())) return;
                            for (; Do.test(h());) {
                                if (o = parseInt(h(), 10), null === i) i = o;
                                else {
                                    if (0 == i) return;
                                    i = 10 * i + o
                                }
                                if (i > 255) return;
                                f++
                            }
                            c[u] = 256 * c[u] + i, 2 != ++r && 4 != r || u++
                        }
                        if (4 != r) return;
                        break
                    }
                    if (":" == h()) {
                        if (f++, !h()) return
                    } else if (h()) return;
                    c[u++] = t
                } else {
                    if (null !== l) return;
                    f++, l = ++u
                }
            }
            if (null !== l)
                for (a = u - l, u = 7; 0 != u && a > 0;) s = c[u], c[u--] = c[l + a - 1], c[l + --a] = s;
            else if (8 != u) return;
            return c
        },
        Xo = function(e) {
            var t, n, r, i;
            if ("number" == typeof e) {
                for (t = [], n = 0; n < 4; n++) t.unshift(e % 256), e = Lo(e / 256);
                return t.join(".")
            }
            if ("object" == typeof e) {
                for (t = "", r = function(e) {
                        for (var t = null, n = 1, r = null, i = 0, o = 0; o < 8; o++) 0 !== e[o] ? (i > n && (t = r, n = i), r = null, i = 0) : (null === r && (r = o), ++i);
                        return i > n && (t = r, n = i), t
                    }(e), n = 0; n < 8; n++) i && 0 === e[n] || (i && (i = !1), r === n ? (t += n ? ":" : "::", i = !0) : (t += e[n].toString(16), n < 7 && (t += ":")));
                return "[" + t + "]"
            }
            return e
        },
        Jo = {},
        Qo = $i({}, Jo, {
            " ": 1,
            '"': 1,
            "<": 1,
            ">": 1,
            "`": 1
        }),
        Zo = $i({}, Qo, {
            "#": 1,
            "?": 1,
            "{": 1,
            "}": 1
        }),
        ea = $i({}, Zo, {
            "/": 1,
            ":": 1,
            ";": 1,
            "=": 1,
            "@": 1,
            "[": 1,
            "\\": 1,
            "]": 1,
            "^": 1,
            "|": 1
        }),
        ta = function(e, t) {
            var n = Oo(e, 0);
            return n > 32 && n < 127 && !b(t, e) ? e : encodeURIComponent(e)
        },
        na = {
            ftp: 21,
            file: null,
            http: 80,
            https: 443,
            ws: 80,
            wss: 443
        },
        ra = function(e) {
            return b(na, e.scheme)
        },
        ia = function(e) {
            return "" != e.username || "" != e.password
        },
        oa = function(e) {
            return !e.host || e.cannotBeABaseURL || "file" == e.scheme
        },
        aa = function(e, t) {
            var n;
            return 2 == e.length && Mo.test(e.charAt(0)) && (":" == (n = e.charAt(1)) || !t && "|" == n)
        },
        sa = function(e) {
            var t;
            return e.length > 1 && aa(e.slice(0, 2)) && (2 == e.length || "/" === (t = e.charAt(2)) || "\\" === t || "?" === t || "#" === t)
        },
        ca = function(e) {
            var t = e.path,
                n = t.length;
            !n || "file" == e.scheme && 1 == n && aa(t[0], !0) || t.pop()
        },
        ua = function(e) {
            return "." === e || "%2e" === e.toLowerCase()
        },
        la = {},
        fa = {},
        ha = {},
        pa = {},
        da = {},
        ga = {},
        va = {},
        ma = {},
        ya = {},
        ba = {},
        wa = {},
        _a = {},
        Ea = {},
        ka = {},
        Sa = {},
        Ta = {},
        xa = {},
        Aa = {},
        Oa = {},
        Pa = {},
        Ia = {},
        ja = function(e, t, n, r) {
            var i, o, a, s, c, u = n || la,
                l = 0,
                f = "",
                h = !1,
                p = !1,
                d = !1;
            for (n || (e.scheme = "", e.username = "", e.password = "", e.host = null, e.port = null, e.path = [], e.query = null, e.fragment = null, e.cannotBeABaseURL = !1, t = t.replace(zo, "")), t = t.replace(Yo, ""), i = pt(t); l <= i.length;) {
                switch (o = i[l], u) {
                    case la:
                        if (!o || !Mo.test(o)) {
                            if (n) return "Invalid scheme";
                            u = ha;
                            continue
                        }
                        f += o.toLowerCase(), u = fa;
                        break;
                    case fa:
                        if (o && (Uo.test(o) || "+" == o || "-" == o || "." == o)) f += o.toLowerCase();
                        else {
                            if (":" != o) {
                                if (n) return "Invalid scheme";
                                f = "", u = ha, l = 0;
                                continue
                            }
                            if (n && (ra(e) != b(na, f) || "file" == f && (ia(e) || null !== e.port) || "file" == e.scheme && !e.host)) return;
                            if (e.scheme = f, n) return void(ra(e) && na[e.scheme] == e.port && (e.port = null));
                            f = "", "file" == e.scheme ? u = ka : ra(e) && r && r.scheme == e.scheme ? u = pa : ra(e) ? u = ma : "/" == i[l + 1] ? (u = da, l++) : (e.cannotBeABaseURL = !0, e.path.push(""), u = Oa)
                        }
                        break;
                    case ha:
                        if (!r || r.cannotBeABaseURL && "#" != o) return "Invalid scheme";
                        if (r.cannotBeABaseURL && "#" == o) {
                            e.scheme = r.scheme, e.path = r.path.slice(), e.query = r.query, e.fragment = "", e.cannotBeABaseURL = !0, u = Ia;
                            break
                        }
                        u = "file" == r.scheme ? ka : ga;
                        continue;
                    case pa:
                        if ("/" != o || "/" != i[l + 1]) {
                            u = ga;
                            continue
                        }
                        u = ya, l++;
                        break;
                    case da:
                        if ("/" == o) {
                            u = ba;
                            break
                        }
                        u = Aa;
                        continue;
                    case ga:
                        if (e.scheme = r.scheme, o == xo) e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = r.query;
                        else if ("/" == o || "\\" == o && ra(e)) u = va;
                        else if ("?" == o) e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = "", u = Pa;
                        else {
                            if ("#" != o) {
                                e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.path.pop(), u = Aa;
                                continue
                            }
                            e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = r.query, e.fragment = "", u = Ia
                        }
                        break;
                    case va:
                        if (!ra(e) || "/" != o && "\\" != o) {
                            if ("/" != o) {
                                e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, u = Aa;
                                continue
                            }
                            u = ba
                        } else u = ya;
                        break;
                    case ma:
                        if (u = ya, "/" != o || "/" != f.charAt(l + 1)) continue;
                        l++;
                        break;
                    case ya:
                        if ("/" != o && "\\" != o) {
                            u = ba;
                            continue
                        }
                        break;
                    case ba:
                        if ("@" == o) {
                            h && (f = "%40" + f), h = !0, a = pt(f);
                            for (var g = 0; g < a.length; g++) {
                                var v = a[g];
                                if (":" != v || d) {
                                    var m = ta(v, ea);
                                    d ? e.password += m : e.username += m
                                } else d = !0
                            }
                            f = ""
                        } else if (o == xo || "/" == o || "?" == o || "#" == o || "\\" == o && ra(e)) {
                            if (h && "" == f) return "Invalid authority";
                            l -= pt(f).length + 1, f = "", u = wa
                        } else f += o;
                        break;
                    case wa:
                    case _a:
                        if (n && "file" == e.scheme) {
                            u = Ta;
                            continue
                        }
                        if (":" != o || p) {
                            if (o == xo || "/" == o || "?" == o || "#" == o || "\\" == o && ra(e)) {
                                if (ra(e) && "" == f) return "Invalid host";
                                if (n && "" == f && (ia(e) || null !== e.port)) return;
                                if (s = $o(e, f)) return s;
                                if (f = "", u = xa, n) return;
                                continue
                            }
                            "[" == o ? p = !0 : "]" == o && (p = !1), f += o
                        } else {
                            if ("" == f) return "Invalid host";
                            if (s = $o(e, f)) return s;
                            if (f = "", u = Ea, n == _a) return
                        }
                        break;
                    case Ea:
                        if (!Do.test(o)) {
                            if (o == xo || "/" == o || "?" == o || "#" == o || "\\" == o && ra(e) || n) {
                                if ("" != f) {
                                    var y = parseInt(f, 10);
                                    if (y > 65535) return "Invalid port";
                                    e.port = ra(e) && y === na[e.scheme] ? null : y, f = ""
                                }
                                if (n) return;
                                u = xa;
                                continue
                            }
                            return "Invalid port"
                        }
                        f += o;
                        break;
                    case ka:
                        if (e.scheme = "file", "/" == o || "\\" == o) u = Sa;
                        else {
                            if (!r || "file" != r.scheme) {
                                u = Aa;
                                continue
                            }
                            if (o == xo) e.host = r.host, e.path = r.path.slice(), e.query = r.query;
                            else if ("?" == o) e.host = r.host, e.path = r.path.slice(), e.query = "", u = Pa;
                            else {
                                if ("#" != o) {
                                    sa(i.slice(l).join("")) || (e.host = r.host, e.path = r.path.slice(), ca(e)), u = Aa;
                                    continue
                                }
                                e.host = r.host, e.path = r.path.slice(), e.query = r.query, e.fragment = "", u = Ia
                            }
                        }
                        break;
                    case Sa:
                        if ("/" == o || "\\" == o) {
                            u = Ta;
                            break
                        }
                        r && "file" == r.scheme && !sa(i.slice(l).join("")) && (aa(r.path[0], !0) ? e.path.push(r.path[0]) : e.host = r.host), u = Aa;
                        continue;
                    case Ta:
                        if (o == xo || "/" == o || "\\" == o || "?" == o || "#" == o) {
                            if (!n && aa(f)) u = Aa;
                            else if ("" == f) {
                                if (e.host = "", n) return;
                                u = xa
                            } else {
                                if (s = $o(e, f)) return s;
                                if ("localhost" == e.host && (e.host = ""), n) return;
                                f = "", u = xa
                            }
                            continue
                        }
                        f += o;
                        break;
                    case xa:
                        if (ra(e)) {
                            if (u = Aa, "/" != o && "\\" != o) continue
                        } else if (n || "?" != o)
                            if (n || "#" != o) {
                                if (o != xo && (u = Aa, "/" != o)) continue
                            } else e.fragment = "", u = Ia;
                        else e.query = "", u = Pa;
                        break;
                    case Aa:
                        if (o == xo || "/" == o || "\\" == o && ra(e) || !n && ("?" == o || "#" == o)) {
                            if (".." === (c = (c = f).toLowerCase()) || "%2e." === c || ".%2e" === c || "%2e%2e" === c ? (ca(e), "/" == o || "\\" == o && ra(e) || e.path.push("")) : ua(f) ? "/" == o || "\\" == o && ra(e) || e.path.push("") : ("file" == e.scheme && !e.path.length && aa(f) && (e.host && (e.host = ""), f = f.charAt(0) + ":"), e.path.push(f)), f = "", "file" == e.scheme && (o == xo || "?" == o || "#" == o))
                                for (; e.path.length > 1 && "" === e.path[0];) e.path.shift();
                            "?" == o ? (e.query = "", u = Pa) : "#" == o && (e.fragment = "", u = Ia)
                        } else f += ta(o, Zo);
                        break;
                    case Oa:
                        "?" == o ? (e.query = "", u = Pa) : "#" == o ? (e.fragment = "", u = Ia) : o != xo && (e.path[0] += ta(o, Jo));
                        break;
                    case Pa:
                        n || "#" != o ? o != xo && ("'" == o && ra(e) ? e.query += "%27" : e.query += "#" == o ? "%23" : ta(o, Jo)) : (e.fragment = "", u = Ia);
                        break;
                    case Ia:
                        o != xo && (e.fragment += ta(o, Qo))
                }
                l++
            }
        },
        Ca = function(e) {
            var t, n, r = Wi(this, Ca, "URL"),
                i = arguments.length > 1 ? arguments[1] : void 0,
                a = String(e),
                s = Co(r, {
                    type: "URL"
                });
            if (void 0 !== i)
                if (i instanceof Ca) t = Ro(i);
                else if (n = ja(t = {}, String(i))) throw TypeError(n);
            if (n = ja(s, a, null, t)) throw TypeError(n);
            var c = s.searchParams = new Io,
                u = jo(c);
            u.updateSearchParams(s.query), u.updateURL = function() {
                s.query = String(c) || null
            }, o || (r.href = La.call(r), r.origin = Na.call(r), r.protocol = Ma.call(r), r.username = Ua.call(r), r.password = Da.call(r), r.host = Fa.call(r), r.hostname = Ba.call(r), r.port = qa.call(r), r.pathname = Ha.call(r), r.search = Va.call(r), r.searchParams = Wa.call(r), r.hash = za.call(r))
        },
        Ra = Ca.prototype,
        La = function() {
            var e = Ro(this),
                t = e.scheme,
                n = e.username,
                r = e.password,
                i = e.host,
                o = e.port,
                a = e.path,
                s = e.query,
                c = e.fragment,
                u = t + ":";
            return null !== i ? (u += "//", ia(e) && (u += n + (r ? ":" + r : "") + "@"), u += Xo(i), null !== o && (u += ":" + o)) : "file" == t && (u += "//"), u += e.cannotBeABaseURL ? a[0] : a.length ? "/" + a.join("/") : "", null !== s && (u += "?" + s), null !== c && (u += "#" + c), u
        },
        Na = function() {
            var e = Ro(this),
                t = e.scheme,
                n = e.port;
            if ("blob" == t) try {
                return new URL(t.path[0]).origin
            } catch (e) {
                return "null"
            }
            return "file" != t && ra(e) ? t + "://" + Xo(e.host) + (null !== n ? ":" + n : "") : "null"
        },
        Ma = function() {
            return Ro(this).scheme + ":"
        },
        Ua = function() {
            return Ro(this).username
        },
        Da = function() {
            return Ro(this).password
        },
        Fa = function() {
            var e = Ro(this),
                t = e.host,
                n = e.port;
            return null === t ? "" : null === n ? Xo(t) : Xo(t) + ":" + n
        },
        Ba = function() {
            var e = Ro(this).host;
            return null === e ? "" : Xo(e)
        },
        qa = function() {
            var e = Ro(this).port;
            return null === e ? "" : String(e)
        },
        Ha = function() {
            var e = Ro(this),
                t = e.path;
            return e.cannotBeABaseURL ? t[0] : t.length ? "/" + t.join("/") : ""
        },
        Va = function() {
            var e = Ro(this).query;
            return e ? "?" + e : ""
        },
        Wa = function() {
            return Ro(this).searchParams
        },
        za = function() {
            var e = Ro(this).fragment;
            return e ? "#" + e : ""
        },
        Ya = function(e, t) {
            return {
                get: e,
                set: t,
                configurable: !0,
                enumerable: !0
            }
        };
    if (o && Et(Ra, {
            href: Ya(La, (function(e) {
                var t = Ro(this),
                    n = String(e),
                    r = ja(t, n);
                if (r) throw TypeError(r);
                jo(t.searchParams).updateSearchParams(t.query)
            })),
            origin: Ya(Na),
            protocol: Ya(Ma, (function(e) {
                var t = Ro(this);
                ja(t, String(e) + ":", la)
            })),
            username: Ya(Ua, (function(e) {
                var t = Ro(this),
                    n = pt(String(e));
                if (!oa(t)) {
                    t.username = "";
                    for (var r = 0; r < n.length; r++) t.username += ta(n[r], ea)
                }
            })),
            password: Ya(Da, (function(e) {
                var t = Ro(this),
                    n = pt(String(e));
                if (!oa(t)) {
                    t.password = "";
                    for (var r = 0; r < n.length; r++) t.password += ta(n[r], ea)
                }
            })),
            host: Ya(Fa, (function(e) {
                var t = Ro(this);
                t.cannotBeABaseURL || ja(t, String(e), wa)
            })),
            hostname: Ya(Ba, (function(e) {
                var t = Ro(this);
                t.cannotBeABaseURL || ja(t, String(e), _a)
            })),
            port: Ya(qa, (function(e) {
                var t = Ro(this);
                oa(t) || ("" == (e = String(e)) ? t.port = null : ja(t, e, Ea))
            })),
            pathname: Ya(Ha, (function(e) {
                var t = Ro(this);
                t.cannotBeABaseURL || (t.path = [], ja(t, e + "", xa))
            })),
            search: Ya(Va, (function(e) {
                var t = Ro(this);
                "" == (e = String(e)) ? t.query = null: ("?" == e.charAt(0) && (e = e.slice(1)), t.query = "", ja(t, e, Pa)), jo(t.searchParams).updateSearchParams(t.query)
            })),
            searchParams: Ya(Wa),
            hash: Ya(za, (function(e) {
                var t = Ro(this);
                "" != (e = String(e)) ? ("#" == e.charAt(0) && (e = e.slice(1)), t.fragment = "", ja(t, e, Ia)) : t.fragment = null
            }))
        }), Z(Ra, "toJSON", (function() {
            return La.call(this)
        }), {
            enumerable: !0
        }), Z(Ra, "toString", (function() {
            return La.call(this)
        }), {
            enumerable: !0
        }), Po) {
        var $a = Po.createObjectURL,
            Ga = Po.revokeObjectURL;
        $a && Z(Ca, "createObjectURL", (function(e) {
            return $a.apply(Po, arguments)
        })), Ga && Z(Ca, "revokeObjectURL", (function(e) {
            return Ga.apply(Po, arguments)
        }))
    }

    function Ka(e) {
        return (Ka = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        })(e)
    }

    function Xa(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
    }

    function Ja(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
        }
    }

    function Qa(e, t, n) {
        return t && Ja(e.prototype, t), n && Ja(e, n), e
    }

    function Za(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function es(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, r)
        }
        return n
    }

    function ts(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? es(Object(n), !0).forEach((function(t) {
                Za(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : es(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }

    function ns(e, t) {
        if (null == e) return {};
        var n, r, i = function(e, t) {
            if (null == e) return {};
            var n, r, i = {},
                o = Object.keys(e);
            for (r = 0; r < o.length; r++) n = o[r], t.indexOf(n) >= 0 || (i[n] = e[n]);
            return i
        }(e, t);
        if (Object.getOwnPropertySymbols) {
            var o = Object.getOwnPropertySymbols(e);
            for (r = 0; r < o.length; r++) n = o[r], t.indexOf(n) >= 0 || Object.prototype.propertyIsEnumerable.call(e, n) && (i[n] = e[n])
        }
        return i
    }

    function rs(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            if ("undefined" == typeof Symbol || !(Symbol.iterator in Object(e))) return;
            var n = [],
                r = !0,
                i = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(r = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); r = !0);
            } catch (e) {
                i = !0, o = e
            } finally {
                try {
                    r || null == s.return || s.return()
                } finally {
                    if (i) throw o
                }
            }
            return n
        }(e, t) || os(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function is(e) {
        return function(e) {
            if (Array.isArray(e)) return as(e)
        }(e) || function(e) {
            if ("undefined" != typeof Symbol && Symbol.iterator in Object(e)) return Array.from(e)
        }(e) || os(e) || function() {
            throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")
        }()
    }

    function os(e, t) {
        if (e) {
            if ("string" == typeof e) return as(e, t);
            var n = Object.prototype.toString.call(e).slice(8, -1);
            return "Object" === n && e.constructor && (n = e.constructor.name), "Map" === n || "Set" === n ? Array.from(e) : "Arguments" === n || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n) ? as(e, t) : void 0
        }
    }

    function as(e, t) {
        (null == t || t > e.length) && (t = e.length);
        for (var n = 0, r = new Array(t); n < t; n++) r[n] = e[n];
        return r
    }
    Wn(Ca, "URL"), Pe({
            global: !0,
            forced: !Vi,
            sham: !o
        }, {
            URL: Ca
        }),
        function(e) {
            var t = function() {
                    try {
                        return !!Symbol.iterator
                    } catch (e) {
                        return !1
                    }
                }(),
                n = function(e) {
                    var n = {
                        next: function() {
                            var t = e.shift();
                            return {
                                done: void 0 === t,
                                value: t
                            }
                        }
                    };
                    return t && (n[Symbol.iterator] = function() {
                        return n
                    }), n
                },
                r = function(e) {
                    return encodeURIComponent(e).replace(/%20/g, "+")
                },
                i = function(e) {
                    return decodeURIComponent(String(e).replace(/\+/g, " "))
                };
            (function() {
                try {
                    var t = e.URLSearchParams;
                    return "a=1" === new t("?a=1").toString() && "function" == typeof t.prototype.set
                } catch (e) {
                    return !1
                }
            })() || function() {
                var i = function e(t) {
                        Object.defineProperty(this, "_entries", {
                            writable: !0,
                            value: {}
                        });
                        var n = Ka(t);
                        if ("undefined" === n);
                        else if ("string" === n) "" !== t && this._fromString(t);
                        else if (t instanceof e) {
                            var r = this;
                            t.forEach((function(e, t) {
                                r.append(t, e)
                            }))
                        } else {
                            if (null === t || "object" !== n) throw new TypeError("Unsupported input's type for URLSearchParams");
                            if ("[object Array]" === Object.prototype.toString.call(t))
                                for (var i = 0; i < t.length; i++) {
                                    var o = t[i];
                                    if ("[object Array]" !== Object.prototype.toString.call(o) && 2 === o.length) throw new TypeError("Expected [string, any] as entry at index " + i + " of URLSearchParams's input");
                                    this.append(o[0], o[1])
                                } else
                                    for (var a in t) t.hasOwnProperty(a) && this.append(a, t[a])
                        }
                    },
                    o = i.prototype;
                o.append = function(e, t) {
                    e in this._entries ? this._entries[e].push(String(t)) : this._entries[e] = [String(t)]
                }, o.delete = function(e) {
                    delete this._entries[e]
                }, o.get = function(e) {
                    return e in this._entries ? this._entries[e][0] : null
                }, o.getAll = function(e) {
                    return e in this._entries ? this._entries[e].slice(0) : []
                }, o.has = function(e) {
                    return e in this._entries
                }, o.set = function(e, t) {
                    this._entries[e] = [String(t)]
                }, o.forEach = function(e, t) {
                    var n;
                    for (var r in this._entries)
                        if (this._entries.hasOwnProperty(r)) {
                            n = this._entries[r];
                            for (var i = 0; i < n.length; i++) e.call(t, n[i], r, this)
                        }
                }, o.keys = function() {
                    var e = [];
                    return this.forEach((function(t, n) {
                        e.push(n)
                    })), n(e)
                }, o.values = function() {
                    var e = [];
                    return this.forEach((function(t) {
                        e.push(t)
                    })), n(e)
                }, o.entries = function() {
                    var e = [];
                    return this.forEach((function(t, n) {
                        e.push([n, t])
                    })), n(e)
                }, t && (o[Symbol.iterator] = o.entries), o.toString = function() {
                    var e = [];
                    return this.forEach((function(t, n) {
                        e.push(r(n) + "=" + r(t))
                    })), e.join("&")
                }, e.URLSearchParams = i
            }();
            var o = e.URLSearchParams.prototype;
            "function" != typeof o.sort && (o.sort = function() {
                var e = this,
                    t = [];
                this.forEach((function(n, r) {
                    t.push([r, n]), e._entries || e.delete(r)
                })), t.sort((function(e, t) {
                    return e[0] < t[0] ? -1 : e[0] > t[0] ? 1 : 0
                })), e._entries && (e._entries = {});
                for (var n = 0; n < t.length; n++) this.append(t[n][0], t[n][1])
            }), "function" != typeof o._fromString && Object.defineProperty(o, "_fromString", {
                enumerable: !1,
                configurable: !1,
                writable: !1,
                value: function(e) {
                    if (this._entries) this._entries = {};
                    else {
                        var t = [];
                        this.forEach((function(e, n) {
                            t.push(n)
                        }));
                        for (var n = 0; n < t.length; n++) this.delete(t[n])
                    }
                    var r, o = (e = e.replace(/^\?/, "")).split("&");
                    for (n = 0; n < o.length; n++) r = o[n].split("="), this.append(i(r[0]), r.length > 1 ? i(r[1]) : "")
                }
            })
        }(void 0 !== e ? e : "undefined" != typeof window ? window : "undefined" != typeof self ? self : e),
        function(e) {
            if (function() {
                    try {
                        var t = new e.URL("b", "http://a");
                        return t.pathname = "c d", "http://a/c%20d" === t.href && t.searchParams
                    } catch (e) {
                        return !1
                    }
                }() || function() {
                    var t = e.URL,
                        n = function(t, n) {
                            "string" != typeof t && (t = String(t));
                            var r, i = document;
                            if (n && (void 0 === e.location || n !== e.location.href)) {
                                (r = (i = document.implementation.createHTMLDocument("")).createElement("base")).href = n, i.head.appendChild(r);
                                try {
                                    if (0 !== r.href.indexOf(n)) throw new Error(r.href)
                                } catch (e) {
                                    throw new Error("URL unable to set base " + n + " due to " + e)
                                }
                            }
                            var o = i.createElement("a");
                            if (o.href = t, r && (i.body.appendChild(o), o.href = o.href), ":" === o.protocol || !/:/.test(o.href)) throw new TypeError("Invalid URL");
                            Object.defineProperty(this, "_anchorElement", {
                                value: o
                            });
                            var a = new e.URLSearchParams(this.search),
                                s = !0,
                                c = !0,
                                u = this;
                            ["append", "delete", "set"].forEach((function(e) {
                                var t = a[e];
                                a[e] = function() {
                                    t.apply(a, arguments), s && (c = !1, u.search = a.toString(), c = !0)
                                }
                            })), Object.defineProperty(this, "searchParams", {
                                value: a,
                                enumerable: !0
                            });
                            var l = void 0;
                            Object.defineProperty(this, "_updateSearchParams", {
                                enumerable: !1,
                                configurable: !1,
                                writable: !1,
                                value: function() {
                                    this.search !== l && (l = this.search, c && (s = !1, this.searchParams._fromString(this.search), s = !0))
                                }
                            })
                        },
                        r = n.prototype;
                    ["hash", "host", "hostname", "port", "protocol"].forEach((function(e) {
                        ! function(e) {
                            Object.defineProperty(r, e, {
                                get: function() {
                                    return this._anchorElement[e]
                                },
                                set: function(t) {
                                    this._anchorElement[e] = t
                                },
                                enumerable: !0
                            })
                        }(e)
                    })), Object.defineProperty(r, "search", {
                        get: function() {
                            return this._anchorElement.search
                        },
                        set: function(e) {
                            this._anchorElement.search = e, this._updateSearchParams()
                        },
                        enumerable: !0
                    }), Object.defineProperties(r, {
                        toString: {
                            get: function() {
                                var e = this;
                                return function() {
                                    return e.href
                                }
                            }
                        },
                        href: {
                            get: function() {
                                return this._anchorElement.href.replace(/\?$/, "")
                            },
                            set: function(e) {
                                this._anchorElement.href = e, this._updateSearchParams()
                            },
                            enumerable: !0
                        },
                        pathname: {
                            get: function() {
                                return this._anchorElement.pathname.replace(/(^\/?)/, "/")
                            },
                            set: function(e) {
                                this._anchorElement.pathname = e
                            },
                            enumerable: !0
                        },
                        origin: {
                            get: function() {
                                var e = {
                                        "http:": 80,
                                        "https:": 443,
                                        "ftp:": 21
                                    } [this._anchorElement.protocol],
                                    t = this._anchorElement.port != e && "" !== this._anchorElement.port;
                                return this._anchorElement.protocol + "//" + this._anchorElement.hostname + (t ? ":" + this._anchorElement.port : "")
                            },
                            enumerable: !0
                        },
                        password: {
                            get: function() {
                                return ""
                            },
                            set: function(e) {},
                            enumerable: !0
                        },
                        username: {
                            get: function() {
                                return ""
                            },
                            set: function(e) {},
                            enumerable: !0
                        }
                    }), n.createObjectURL = function(e) {
                        return t.createObjectURL.apply(t, arguments)
                    }, n.revokeObjectURL = function(e) {
                        return t.revokeObjectURL.apply(t, arguments)
                    }, e.URL = n
                }(), void 0 !== e.location && !("origin" in e.location)) {
                var t = function() {
                    return e.location.protocol + "//" + e.location.hostname + (e.location.port ? ":" + e.location.port : "")
                };
                try {
                    Object.defineProperty(e.location, "origin", {
                        get: t,
                        enumerable: !0
                    })
                } catch (n) {
                    setInterval((function() {
                        e.location.origin = t()
                    }), 100)
                }
            }
        }(void 0 !== e ? e : "undefined" != typeof window ? window : "undefined" != typeof self ? self : e), pr("asyncIterator");
    var ss = Fe("isConcatSpreadable"),
        cs = Bt >= 51 || !i((function() {
            var e = [];
            return e[ss] = !1, e.concat()[0] !== e
        })),
        us = Ht("concat"),
        ls = function(e) {
            if (!v(e)) return !1;
            var t = e[ss];
            return void 0 !== t ? !!t : Re(e)
        };
    Pe({
        target: "Array",
        proto: !0,
        forced: !cs || !us
    }, {
        concat: function(e) {
            var t, n, r, i, o, a = Ce(this),
                s = qe(a, 0),
                c = 0;
            for (t = -1, r = arguments.length; t < r; t++)
                if (o = -1 === t ? a : arguments[t], ls(o)) {
                    if (c + (i = se(o.length)) > 9007199254740991) throw TypeError("Maximum allowed index exceeded");
                    for (n = 0; n < i; n++, c++) n in o && ot(s, c, o[n])
                } else {
                    if (c >= 9007199254740991) throw TypeError("Maximum allowed index exceeded");
                    ot(s, c++, o)
                } return s.length = c, s
        }
    }), Pe({
        target: "Object",
        stat: !0,
        forced: Object.assign !== $i
    }, {
        assign: $i
    });
    var fs = T.f,
        hs = i((function() {
            fs(1)
        }));
    Pe({
        target: "Object",
        stat: !0,
        forced: !o || hs,
        sham: !o
    }, {
        getOwnPropertyDescriptor: function(e, t) {
            return fs(g(e), t)
        }
    });
    var ps, ds, gs, vs = r.Promise,
        ms = t((function(e) {
            var t = function(e, t) {
                this.stopped = e, this.result = t
            };
            (e.exports = function(e, n, r, i, o) {
                var a, s, c, u, l, f, h, p = je(n, r, i ? 2 : 1);
                if (o) a = e;
                else {
                    if ("function" != typeof(s = ht(e))) throw TypeError("Target is not iterable");
                    if (it(s)) {
                        for (c = 0, u = se(e.length); u > c; c++)
                            if ((l = i ? p(x(h = e[c])[0], h[1]) : p(e[c])) && l instanceof t) return l;
                        return new t(!1)
                    }
                    a = s.call(e)
                }
                for (f = a.next; !(h = f.call(a)).done;)
                    if ("object" == typeof(l = et(a, p, h.value, i)) && l && l instanceof t) return l;
                return new t(!1)
            }).stop = function(e) {
                return new t(!0, e)
            }
        })),
        ys = /(iphone|ipod|ipad).*applewebkit/i.test(Mt),
        bs = r.location,
        ws = r.setImmediate,
        _s = r.clearImmediate,
        Es = r.process,
        ks = r.MessageChannel,
        Ss = r.Dispatch,
        Ts = 0,
        xs = {},
        As = function(e) {
            if (xs.hasOwnProperty(e)) {
                var t = xs[e];
                delete xs[e], t()
            }
        },
        Os = function(e) {
            return function() {
                As(e)
            }
        },
        Ps = function(e) {
            As(e.data)
        },
        Is = function(e) {
            r.postMessage(e + "", bs.protocol + "//" + bs.host)
        };
    ws && _s || (ws = function(e) {
        for (var t = [], n = 1; arguments.length > n;) t.push(arguments[n++]);
        return xs[++Ts] = function() {
            ("function" == typeof e ? e : Function(e)).apply(void 0, t)
        }, ps(Ts), Ts
    }, _s = function(e) {
        delete xs[e]
    }, "process" == f(Es) ? ps = function(e) {
        Es.nextTick(Os(e))
    } : Ss && Ss.now ? ps = function(e) {
        Ss.now(Os(e))
    } : ks && !ys ? (gs = (ds = new ks).port2, ds.port1.onmessage = Ps, ps = je(gs.postMessage, gs, 1)) : !r.addEventListener || "function" != typeof postMessage || r.importScripts || i(Is) || "file:" === bs.protocol ? ps = "onreadystatechange" in E("script") ? function(e) {
        kt.appendChild(E("script")).onreadystatechange = function() {
            kt.removeChild(this), As(e)
        }
    } : function(e) {
        setTimeout(Os(e), 0)
    } : (ps = Is, r.addEventListener("message", Ps, !1)));
    var js, Cs, Rs, Ls, Ns, Ms, Us, Ds, Fs = {
            set: ws,
            clear: _s
        },
        Bs = T.f,
        qs = Fs.set,
        Hs = r.MutationObserver || r.WebKitMutationObserver,
        Vs = r.process,
        Ws = r.Promise,
        zs = "process" == f(Vs),
        Ys = Bs(r, "queueMicrotask"),
        $s = Ys && Ys.value;
    $s || (js = function() {
        var e, t;
        for (zs && (e = Vs.domain) && e.exit(); Cs;) {
            t = Cs.fn, Cs = Cs.next;
            try {
                t()
            } catch (e) {
                throw Cs ? Ls() : Rs = void 0, e
            }
        }
        Rs = void 0, e && e.enter()
    }, zs ? Ls = function() {
        Vs.nextTick(js)
    } : Hs && !ys ? (Ns = !0, Ms = document.createTextNode(""), new Hs(js).observe(Ms, {
        characterData: !0
    }), Ls = function() {
        Ms.data = Ns = !Ns
    }) : Ws && Ws.resolve ? (Us = Ws.resolve(void 0), Ds = Us.then, Ls = function() {
        Ds.call(Us, js)
    }) : Ls = function() {
        qs.call(r, js)
    });
    var Gs, Ks, Xs, Js, Qs = $s || function(e) {
            var t = {
                fn: e,
                next: void 0
            };
            Rs && (Rs.next = t), Cs || (Cs = t, Ls()), Rs = t
        },
        Zs = function(e) {
            var t, n;
            this.promise = new e((function(e, r) {
                if (void 0 !== t || void 0 !== n) throw TypeError("Bad Promise constructor");
                t = e, n = r
            })), this.resolve = Ie(t), this.reject = Ie(n)
        },
        ec = {
            f: function(e) {
                return new Zs(e)
            }
        },
        tc = function(e, t) {
            if (x(e), v(t) && t.constructor === e) return t;
            var n = ec.f(e);
            return (0, n.resolve)(t), n.promise
        },
        nc = function(e) {
            try {
                return {
                    error: !1,
                    value: e()
                }
            } catch (e) {
                return {
                    error: !0,
                    value: e
                }
            }
        },
        rc = Fs.set,
        ic = Fe("species"),
        oc = "Promise",
        ac = Q.get,
        sc = Q.set,
        cc = Q.getterFor(oc),
        uc = vs,
        lc = r.TypeError,
        fc = r.document,
        hc = r.process,
        pc = ne("fetch"),
        dc = ec.f,
        gc = dc,
        vc = "process" == f(hc),
        mc = !!(fc && fc.createEvent && r.dispatchEvent),
        yc = Ae(oc, (function() {
            if (!(M(uc) !== String(uc))) {
                if (66 === Bt) return !0;
                if (!vc && "function" != typeof PromiseRejectionEvent) return !0
            }
            if (Bt >= 51 && /native code/.test(uc)) return !1;
            var e = uc.resolve(1),
                t = function(e) {
                    e((function() {}), (function() {}))
                };
            return (e.constructor = {})[ic] = t, !(e.then((function() {})) instanceof t)
        })),
        bc = yc || !yt((function(e) {
            uc.all(e).catch((function() {}))
        })),
        wc = function(e) {
            var t;
            return !(!v(e) || "function" != typeof(t = e.then)) && t
        },
        _c = function(e, t, n) {
            if (!t.notified) {
                t.notified = !0;
                var r = t.reactions;
                Qs((function() {
                    for (var i = t.value, o = 1 == t.state, a = 0; r.length > a;) {
                        var s, c, u, l = r[a++],
                            f = o ? l.ok : l.fail,
                            h = l.resolve,
                            p = l.reject,
                            d = l.domain;
                        try {
                            f ? (o || (2 === t.rejection && Tc(e, t), t.rejection = 1), !0 === f ? s = i : (d && d.enter(), s = f(i), d && (d.exit(), u = !0)), s === l.promise ? p(lc("Promise-chain cycle")) : (c = wc(s)) ? c.call(s, h, p) : h(s)) : p(i)
                        } catch (e) {
                            d && !u && d.exit(), p(e)
                        }
                    }
                    t.reactions = [], t.notified = !1, n && !t.rejection && kc(e, t)
                }))
            }
        },
        Ec = function(e, t, n) {
            var i, o;
            mc ? ((i = fc.createEvent("Event")).promise = t, i.reason = n, i.initEvent(e, !1, !0), r.dispatchEvent(i)) : i = {
                promise: t,
                reason: n
            }, (o = r["on" + e]) ? o(i) : "unhandledrejection" === e && function(e, t) {
                var n = r.console;
                n && n.error && (1 === arguments.length ? n.error(e) : n.error(e, t))
            }("Unhandled promise rejection", n)
        },
        kc = function(e, t) {
            rc.call(r, (function() {
                var n, r = t.value;
                if (Sc(t) && (n = nc((function() {
                        vc ? hc.emit("unhandledRejection", r, e) : Ec("unhandledrejection", e, r)
                    })), t.rejection = vc || Sc(t) ? 2 : 1, n.error)) throw n.value
            }))
        },
        Sc = function(e) {
            return 1 !== e.rejection && !e.parent
        },
        Tc = function(e, t) {
            rc.call(r, (function() {
                vc ? hc.emit("rejectionHandled", e) : Ec("rejectionhandled", e, t.value)
            }))
        },
        xc = function(e, t, n, r) {
            return function(i) {
                e(t, n, i, r)
            }
        },
        Ac = function(e, t, n, r) {
            t.done || (t.done = !0, r && (t = r), t.value = n, t.state = 2, _c(e, t, !0))
        },
        Oc = function(e, t, n, r) {
            if (!t.done) {
                t.done = !0, r && (t = r);
                try {
                    if (e === n) throw lc("Promise can't be resolved itself");
                    var i = wc(n);
                    i ? Qs((function() {
                        var r = {
                            done: !1
                        };
                        try {
                            i.call(n, xc(Oc, e, r, t), xc(Ac, e, r, t))
                        } catch (n) {
                            Ac(e, r, n, t)
                        }
                    })) : (t.value = n, t.state = 1, _c(e, t, !1))
                } catch (n) {
                    Ac(e, {
                        done: !1
                    }, n, t)
                }
            }
        };
    yc && (uc = function(e) {
        Wi(this, uc, oc), Ie(e), Gs.call(this);
        var t = ac(this);
        try {
            e(xc(Oc, this, t), xc(Ac, this, t))
        } catch (e) {
            Ac(this, t, e)
        }
    }, (Gs = function(e) {
        sc(this, {
            type: oc,
            done: !1,
            notified: !1,
            parent: !1,
            reactions: [],
            rejection: !1,
            state: 0,
            value: void 0
        })
    }).prototype = no(uc.prototype, {
        then: function(e, t) {
            var n = cc(this),
                r = dc(ji(this, uc));
            return r.ok = "function" != typeof e || e, r.fail = "function" == typeof t && t, r.domain = vc ? hc.domain : void 0, n.parent = !0, n.reactions.push(r), 0 != n.state && _c(this, n, !1), r.promise
        },
        catch: function(e) {
            return this.then(void 0, e)
        }
    }), Ks = function() {
        var e = new Gs,
            t = ac(e);
        this.promise = e, this.resolve = xc(Oc, e, t), this.reject = xc(Ac, e, t)
    }, ec.f = dc = function(e) {
        return e === uc || e === Xs ? new Ks(e) : gc(e)
    }, "function" == typeof vs && (Js = vs.prototype.then, Z(vs.prototype, "then", (function(e, t) {
        var n = this;
        return new uc((function(e, t) {
            Js.call(n, e, t)
        })).then(e, t)
    }), {
        unsafe: !0
    }), "function" == typeof pc && Pe({
        global: !0,
        enumerable: !0,
        forced: !0
    }, {
        fetch: function(e) {
            return tc(uc, pc.apply(r, arguments))
        }
    }))), Pe({
        global: !0,
        wrap: !0,
        forced: yc
    }, {
        Promise: uc
    }), Wn(uc, oc, !1), tn(oc), Xs = ne(oc), Pe({
        target: oc,
        stat: !0,
        forced: yc
    }, {
        reject: function(e) {
            var t = dc(this);
            return t.reject.call(void 0, e), t.promise
        }
    }), Pe({
        target: oc,
        stat: !0,
        forced: yc
    }, {
        resolve: function(e) {
            return tc(this, e)
        }
    }), Pe({
        target: oc,
        stat: !0,
        forced: bc
    }, {
        all: function(e) {
            var t = this,
                n = dc(t),
                r = n.resolve,
                i = n.reject,
                o = nc((function() {
                    var n = Ie(t.resolve),
                        o = [],
                        a = 0,
                        s = 1;
                    ms(e, (function(e) {
                        var c = a++,
                            u = !1;
                        o.push(void 0), s++, n.call(t, e).then((function(e) {
                            u || (u = !0, o[c] = e, --s || r(o))
                        }), i)
                    })), --s || r(o)
                }));
            return o.error && i(o.value), n.promise
        },
        race: function(e) {
            var t = this,
                n = dc(t),
                r = n.reject,
                i = nc((function() {
                    var i = Ie(t.resolve);
                    ms(e, (function(e) {
                        i.call(t, e).then(n.resolve, r)
                    }))
                }));
            return i.error && r(i.value), n.promise
        }
    });
    /*! *****************************************************************************
    	Copyright (c) Microsoft Corporation. All rights reserved.
    	Licensed under the Apache License, Version 2.0 (the "License"); you may not use
    	this file except in compliance with the License. You may obtain a copy of the
    	License at http://www.apache.org/licenses/LICENSE-2.0

    	THIS CODE IS PROVIDED ON AN *AS IS* BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
    	KIND, EITHER EXPRESS OR IMPLIED, INCLUDING WITHOUT LIMITATION ANY IMPLIED
    	WARRANTIES OR CONDITIONS OF TITLE, FITNESS FOR A PARTICULAR PURPOSE,
    	MERCHANTABLITY OR NON-INFRINGEMENT.

    	See the Apache Version 2.0 License for specific language governing permissions
    	and limitations under the License.
    	***************************************************************************** */
    var Pc = function(e, t) {
        return (Pc = Object.setPrototypeOf || {
                __proto__: []
            }
            instanceof Array && function(e, t) {
                e.__proto__ = t
            } || function(e, t) {
                for (var n in t) t.hasOwnProperty(n) && (e[n] = t[n])
            })(e, t)
    };

    function Ic(e, t) {
        function n() {
            this.constructor = e
        }
        Pc(e, t), e.prototype = null === t ? Object.create(t) : (n.prototype = t.prototype, new n)
    }
    var jc, Cc, Rc = function() {
        return (Rc = Object.assign || function(e) {
            for (var t, n = 1, r = arguments.length; n < r; n++)
                for (var i in t = arguments[n]) Object.prototype.hasOwnProperty.call(t, i) && (e[i] = t[i]);
            return e
        }).apply(this, arguments)
    };

    function Lc(e, t) {
        var n = "function" == typeof Symbol && e[Symbol.iterator];
        if (!n) return e;
        var r, i, o = n.call(e),
            a = [];
        try {
            for (;
                (void 0 === t || t-- > 0) && !(r = o.next()).done;) a.push(r.value)
        } catch (e) {
            i = {
                error: e
            }
        } finally {
            try {
                r && !r.done && (n = o.return) && n.call(o)
            } finally {
                if (i) throw i.error
            }
        }
        return a
    }

    function Nc() {
        for (var e = [], t = 0; t < arguments.length; t++) e = e.concat(Lc(arguments[t]));
        return e
    }! function(e) {
        e.Fatal = "fatal", e.Error = "error", e.Warning = "warning", e.Log = "log", e.Info = "info", e.Debug = "debug", e.Critical = "critical"
    }(jc || (jc = {})),
    function(e) {
        e.fromString = function(t) {
            switch (t) {
                case "debug":
                    return e.Debug;
                case "info":
                    return e.Info;
                case "warn":
                case "warning":
                    return e.Warning;
                case "error":
                    return e.Error;
                case "fatal":
                    return e.Fatal;
                case "critical":
                    return e.Critical;
                case "log":
                default:
                    return e.Log
            }
        }
    }(jc || (jc = {})),
    function(e) {
        e.Unknown = "unknown", e.Skipped = "skipped", e.Success = "success", e.RateLimit = "rate_limit", e.Invalid = "invalid", e.Failed = "failed"
    }(Cc || (Cc = {})),
    function(e) {
        e.fromHttpCode = function(t) {
            return t >= 200 && t < 300 ? e.Success : 429 === t ? e.RateLimit : t >= 400 && t < 500 ? e.Invalid : t >= 500 ? e.Failed : e.Unknown
        }
    }(Cc || (Cc = {}));
    var Mc = O.f,
        Uc = Function.prototype,
        Dc = Uc.toString,
        Fc = /^\s*function ([^ (]*)/;
    o && !("name" in Uc) && Mc(Uc, "name", {
        configurable: !0,
        get: function() {
            try {
                return Dc.call(this).match(Fc)[1]
            } catch (e) {
                return ""
            }
        }
    });
    var Bc = Object.setPrototypeOf || ({
            __proto__: []
        }
        instanceof Array ? function(e, t) {
            return e.__proto__ = t, e
        } : function(e, t) {
            for (var n in t) e.hasOwnProperty(n) || (e[n] = t[n]);
            return e
        });
    var qc = function(e) {
        function t(t) {
            var n = this.constructor,
                r = e.call(this, t) || this;
            return r.message = t, r.name = n.prototype.constructor.name, Bc(r, n.prototype), r
        }
        return Ic(t, e), t
    }(Error);

    function Hc(e) {
        switch (Object.prototype.toString.call(e)) {
            case "[object Error]":
            case "[object Exception]":
            case "[object DOMException]":
                return !0;
            default:
                return Jc(e, Error)
        }
    }

    function Vc(e) {
        return "[object ErrorEvent]" === Object.prototype.toString.call(e)
    }

    function Wc(e) {
        return "[object DOMError]" === Object.prototype.toString.call(e)
    }

    function zc(e) {
        return "[object String]" === Object.prototype.toString.call(e)
    }

    function Yc(e) {
        return null === e || "object" !== Ka(e) && "function" != typeof e
    }

    function $c(e) {
        return "[object Object]" === Object.prototype.toString.call(e)
    }

    function Gc(e) {
        return "undefined" != typeof Event && Jc(e, Event)
    }

    function Kc(e) {
        return "undefined" != typeof Element && Jc(e, Element)
    }

    function Xc(e) {
        return Boolean(e && e.then && "function" == typeof e.then)
    }

    function Jc(e, t) {
        try {
            return e instanceof t
        } catch (e) {
            return !1
        }
    }
    wi("match", 1, (function(e, t, n) {
        return [function(t) {
            var n = d(this),
                r = null == t ? void 0 : t[e];
            return void 0 !== r ? r.call(t, n) : new RegExp(t)[e](String(n))
        }, function(e) {
            var r = n(t, e, this);
            if (r.done) return r.value;
            var i = x(e),
                o = String(this);
            if (!i.global) return ki(i, o);
            var a = i.unicode;
            i.lastIndex = 0;
            for (var s, c = [], u = 0; null !== (s = ki(i, o));) {
                var l = String(s[0]);
                c[u] = l, "" === l && (i.lastIndex = Ei(o, se(i.lastIndex), a)), u++
            }
            return 0 === u ? null : c
        }]
    }));
    var Qc, Zc = "undefined" != typeof ArrayBuffer && "undefined" != typeof DataView,
        eu = O.f,
        tu = r.Int8Array,
        nu = tu && tu.prototype,
        ru = r.Uint8ClampedArray,
        iu = ru && ru.prototype,
        ou = tu && Dn(tu),
        au = nu && Dn(nu),
        su = Object.prototype,
        cu = su.isPrototypeOf,
        uu = Fe("toStringTag"),
        lu = H("TYPED_ARRAY_TAG"),
        fu = Zc && !!$t && "Opera" !== lt(r.opera),
        hu = !1,
        pu = {
            Int8Array: 1,
            Uint8Array: 1,
            Uint8ClampedArray: 1,
            Int16Array: 2,
            Uint16Array: 2,
            Int32Array: 4,
            Uint32Array: 4,
            Float32Array: 4,
            Float64Array: 8
        },
        du = function(e) {
            return v(e) && b(pu, lt(e))
        };
    for (Qc in pu) r[Qc] || (fu = !1);
    if ((!fu || "function" != typeof ou || ou === Function.prototype) && (ou = function() {
            throw TypeError("Incorrect invocation")
        }, fu))
        for (Qc in pu) r[Qc] && $t(r[Qc], ou);
    if ((!fu || !au || au === su) && (au = ou.prototype, fu))
        for (Qc in pu) r[Qc] && $t(r[Qc].prototype, au);
    if (fu && Dn(iu) !== au && $t(iu, au), o && !b(au, uu))
        for (Qc in hu = !0, eu(au, uu, {
                get: function() {
                    return v(this) ? this[lu] : void 0
                }
            }), pu) r[Qc] && P(r[Qc], lu, Qc);
    var gu = {
            NATIVE_ARRAY_BUFFER_VIEWS: fu,
            TYPED_ARRAY_TAG: hu && lu,
            aTypedArray: function(e) {
                if (du(e)) return e;
                throw TypeError("Target is not a typed array")
            },
            aTypedArrayConstructor: function(e) {
                if ($t) {
                    if (cu.call(ou, e)) return e
                } else
                    for (var t in pu)
                        if (b(pu, Qc)) {
                            var n = r[t];
                            if (n && (e === n || cu.call(n, e))) return e
                        } throw TypeError("Target is not a typed array constructor")
            },
            exportTypedArrayMethod: function(e, t, n) {
                if (o) {
                    if (n)
                        for (var i in pu) {
                            var a = r[i];
                            a && b(a.prototype, e) && delete a.prototype[e]
                        }
                    au[e] && !n || Z(au, e, n ? t : fu && nu[e] || t)
                }
            },
            exportTypedArrayStaticMethod: function(e, t, n) {
                var i, a;
                if (o) {
                    if ($t) {
                        if (n)
                            for (i in pu)(a = r[i]) && b(a, e) && delete a[e];
                        if (ou[e] && !n) return;
                        try {
                            return Z(ou, e, n ? t : fu && tu[e] || t)
                        } catch (e) {}
                    }
                    for (i in pu) !(a = r[i]) || a[e] && !n || Z(a, e, t)
                }
            },
            isView: function(e) {
                var t = lt(e);
                return "DataView" === t || b(pu, t)
            },
            isTypedArray: du,
            TypedArray: ou,
            TypedArrayPrototype: au
        },
        vu = gu.NATIVE_ARRAY_BUFFER_VIEWS,
        mu = r.ArrayBuffer,
        yu = r.Int8Array,
        bu = !vu || !i((function() {
            yu(1)
        })) || !i((function() {
            new yu(-1)
        })) || !yt((function(e) {
            new yu, new yu(null), new yu(1.5), new yu(e)
        }), !0) || i((function() {
            return 1 !== new yu(new mu(2), 1, void 0).length
        })),
        wu = function(e) {
            if (void 0 === e) return 0;
            var t = oe(e),
                n = se(t);
            if (t !== n) throw RangeError("Wrong length or index");
            return n
        },
        _u = Math.abs,
        Eu = Math.pow,
        ku = Math.floor,
        Su = Math.log,
        Tu = Math.LN2,
        xu = function(e, t, n) {
            var r, i, o, a = new Array(n),
                s = 8 * n - t - 1,
                c = (1 << s) - 1,
                u = c >> 1,
                l = 23 === t ? Eu(2, -24) - Eu(2, -77) : 0,
                f = e < 0 || 0 === e && 1 / e < 0 ? 1 : 0,
                h = 0;
            for ((e = _u(e)) != e || e === 1 / 0 ? (i = e != e ? 1 : 0, r = c) : (r = ku(Su(e) / Tu), e * (o = Eu(2, -r)) < 1 && (r--, o *= 2), (e += r + u >= 1 ? l / o : l * Eu(2, 1 - u)) * o >= 2 && (r++, o /= 2), r + u >= c ? (i = 0, r = c) : r + u >= 1 ? (i = (e * o - 1) * Eu(2, t), r += u) : (i = e * Eu(2, u - 1) * Eu(2, t), r = 0)); t >= 8; a[h++] = 255 & i, i /= 256, t -= 8);
            for (r = r << t | i, s += t; s > 0; a[h++] = 255 & r, r /= 256, s -= 8);
            return a[--h] |= 128 * f, a
        },
        Au = function(e, t) {
            var n, r = e.length,
                i = 8 * r - t - 1,
                o = (1 << i) - 1,
                a = o >> 1,
                s = i - 7,
                c = r - 1,
                u = e[c--],
                l = 127 & u;
            for (u >>= 7; s > 0; l = 256 * l + e[c], c--, s -= 8);
            for (n = l & (1 << -s) - 1, l >>= -s, s += t; s > 0; n = 256 * n + e[c], c--, s -= 8);
            if (0 === l) l = 1 - a;
            else {
                if (l === o) return n ? NaN : u ? -1 / 0 : 1 / 0;
                n += Eu(2, t), l -= a
            }
            return (u ? -1 : 1) * n * Eu(2, l - t)
        },
        Ou = function(e) {
            for (var t = Ce(this), n = se(t.length), r = arguments.length, i = le(r > 1 ? arguments[1] : void 0, n), o = r > 2 ? arguments[2] : void 0, a = void 0 === o ? n : le(o, n); a > i;) t[i++] = e;
            return t
        },
        Pu = me.f,
        Iu = O.f,
        ju = Q.get,
        Cu = Q.set,
        Ru = r.ArrayBuffer,
        Lu = Ru,
        Nu = r.DataView,
        Mu = Nu && Nu.prototype,
        Uu = Object.prototype,
        Du = r.RangeError,
        Fu = xu,
        Bu = Au,
        qu = function(e) {
            return [255 & e]
        },
        Hu = function(e) {
            return [255 & e, e >> 8 & 255]
        },
        Vu = function(e) {
            return [255 & e, e >> 8 & 255, e >> 16 & 255, e >> 24 & 255]
        },
        Wu = function(e) {
            return e[3] << 24 | e[2] << 16 | e[1] << 8 | e[0]
        },
        zu = function(e) {
            return Fu(e, 23, 4)
        },
        Yu = function(e) {
            return Fu(e, 52, 8)
        },
        $u = function(e, t) {
            Iu(e.prototype, t, {
                get: function() {
                    return ju(this)[t]
                }
            })
        },
        Gu = function(e, t, n, r) {
            var i = wu(n),
                o = ju(e);
            if (i + t > o.byteLength) throw Du("Wrong index");
            var a = ju(o.buffer).bytes,
                s = i + o.byteOffset,
                c = a.slice(s, s + t);
            return r ? c : c.reverse()
        },
        Ku = function(e, t, n, r, i, o) {
            var a = wu(n),
                s = ju(e);
            if (a + t > s.byteLength) throw Du("Wrong index");
            for (var c = ju(s.buffer).bytes, u = a + s.byteOffset, l = r(+i), f = 0; f < t; f++) c[u + f] = l[o ? f : t - f - 1]
        };
    if (Zc) {
        if (!i((function() {
                Ru(1)
            })) || !i((function() {
                new Ru(-1)
            })) || i((function() {
                return new Ru, new Ru(1.5), new Ru(NaN), "ArrayBuffer" != Ru.name
            }))) {
            for (var Xu, Ju = (Lu = function(e) {
                    return Wi(this, Lu), new Ru(wu(e))
                }).prototype = Ru.prototype, Qu = Pu(Ru), Zu = 0; Qu.length > Zu;)(Xu = Qu[Zu++]) in Lu || P(Lu, Xu, Ru[Xu]);
            Ju.constructor = Lu
        }
        $t && Dn(Mu) !== Uu && $t(Mu, Uu);
        var el = new Nu(new Lu(2)),
            tl = Mu.setInt8;
        el.setInt8(0, 2147483648), el.setInt8(1, 2147483649), !el.getInt8(0) && el.getInt8(1) || no(Mu, {
            setInt8: function(e, t) {
                tl.call(this, e, t << 24 >> 24)
            },
            setUint8: function(e, t) {
                tl.call(this, e, t << 24 >> 24)
            }
        }, {
            unsafe: !0
        })
    } else Lu = function(e) {
        Wi(this, Lu, "ArrayBuffer");
        var t = wu(e);
        Cu(this, {
            bytes: Ou.call(new Array(t), 0),
            byteLength: t
        }), o || (this.byteLength = t)
    }, Nu = function(e, t, n) {
        Wi(this, Nu, "DataView"), Wi(e, Lu, "DataView");
        var r = ju(e).byteLength,
            i = oe(t);
        if (i < 0 || i > r) throw Du("Wrong offset");
        if (i + (n = void 0 === n ? r - i : se(n)) > r) throw Du("Wrong length");
        Cu(this, {
            buffer: e,
            byteLength: n,
            byteOffset: i
        }), o || (this.buffer = e, this.byteLength = n, this.byteOffset = i)
    }, o && ($u(Lu, "byteLength"), $u(Nu, "buffer"), $u(Nu, "byteLength"), $u(Nu, "byteOffset")), no(Nu.prototype, {
        getInt8: function(e) {
            return Gu(this, 1, e)[0] << 24 >> 24
        },
        getUint8: function(e) {
            return Gu(this, 1, e)[0]
        },
        getInt16: function(e) {
            var t = Gu(this, 2, e, arguments.length > 1 ? arguments[1] : void 0);
            return (t[1] << 8 | t[0]) << 16 >> 16
        },
        getUint16: function(e) {
            var t = Gu(this, 2, e, arguments.length > 1 ? arguments[1] : void 0);
            return t[1] << 8 | t[0]
        },
        getInt32: function(e) {
            return Wu(Gu(this, 4, e, arguments.length > 1 ? arguments[1] : void 0))
        },
        getUint32: function(e) {
            return Wu(Gu(this, 4, e, arguments.length > 1 ? arguments[1] : void 0)) >>> 0
        },
        getFloat32: function(e) {
            return Bu(Gu(this, 4, e, arguments.length > 1 ? arguments[1] : void 0), 23)
        },
        getFloat64: function(e) {
            return Bu(Gu(this, 8, e, arguments.length > 1 ? arguments[1] : void 0), 52)
        },
        setInt8: function(e, t) {
            Ku(this, 1, e, qu, t)
        },
        setUint8: function(e, t) {
            Ku(this, 1, e, qu, t)
        },
        setInt16: function(e, t) {
            Ku(this, 2, e, Hu, t, arguments.length > 2 ? arguments[2] : void 0)
        },
        setUint16: function(e, t) {
            Ku(this, 2, e, Hu, t, arguments.length > 2 ? arguments[2] : void 0)
        },
        setInt32: function(e, t) {
            Ku(this, 4, e, Vu, t, arguments.length > 2 ? arguments[2] : void 0)
        },
        setUint32: function(e, t) {
            Ku(this, 4, e, Vu, t, arguments.length > 2 ? arguments[2] : void 0)
        },
        setFloat32: function(e, t) {
            Ku(this, 4, e, zu, t, arguments.length > 2 ? arguments[2] : void 0)
        },
        setFloat64: function(e, t) {
            Ku(this, 8, e, Yu, t, arguments.length > 2 ? arguments[2] : void 0)
        }
    });
    Wn(Lu, "ArrayBuffer"), Wn(Nu, "DataView");
    var nl = {
            ArrayBuffer: Lu,
            DataView: Nu
        },
        rl = function(e, t) {
            var n = function(e) {
                var t = oe(e);
                if (t < 0) throw RangeError("The argument can't be less than 0");
                return t
            }(e);
            if (n % t) throw RangeError("Wrong offset");
            return n
        },
        il = gu.aTypedArrayConstructor,
        ol = function(e) {
            var t, n, r, i, o, a, s = Ce(e),
                c = arguments.length,
                u = c > 1 ? arguments[1] : void 0,
                l = void 0 !== u,
                f = ht(s);
            if (null != f && !it(f))
                for (a = (o = f.call(s)).next, s = []; !(i = a.call(o)).done;) s.push(i.value);
            for (l && c > 2 && (u = je(u, arguments[2], 2)), n = se(s.length), r = new(il(this))(n), t = 0; n > t; t++) r[t] = l ? u(s[t], t) : s[t];
            return r
        };
    t((function(e) {
        var t = me.f,
            n = We.forEach,
            i = Q.get,
            a = Q.set,
            s = O.f,
            c = T.f,
            l = Math.round,
            f = r.RangeError,
            h = nl.ArrayBuffer,
            p = nl.DataView,
            d = gu.NATIVE_ARRAY_BUFFER_VIEWS,
            g = gu.TYPED_ARRAY_TAG,
            y = gu.TypedArray,
            w = gu.TypedArrayPrototype,
            _ = gu.aTypedArrayConstructor,
            E = gu.isTypedArray,
            k = function(e, t) {
                for (var n = 0, r = t.length, i = new(_(e))(r); r > n;) i[n] = t[n++];
                return i
            },
            S = function(e, t) {
                s(e, t, {
                    get: function() {
                        return i(this)[t]
                    }
                })
            },
            x = function(e) {
                var t;
                return e instanceof h || "ArrayBuffer" == (t = lt(e)) || "SharedArrayBuffer" == t
            },
            A = function(e, t) {
                return E(e) && "symbol" != typeof t && t in e && String(+t) == String(t)
            },
            I = function(e, t) {
                return A(e, t = m(t, !0)) ? u(2, e[t]) : c(e, t)
            },
            j = function(e, t, n) {
                return !(A(e, t = m(t, !0)) && v(n) && b(n, "value")) || b(n, "get") || b(n, "set") || n.configurable || b(n, "writable") && !n.writable || b(n, "enumerable") && !n.enumerable ? s(e, t, n) : (e[t] = n.value, e)
            };
        o ? (d || (T.f = I, O.f = j, S(w, "buffer"), S(w, "byteOffset"), S(w, "byteLength"), S(w, "length")), Pe({
            target: "Object",
            stat: !0,
            forced: !d
        }, {
            getOwnPropertyDescriptor: I,
            defineProperty: j
        }), e.exports = function(e, o, c) {
            var u = e.match(/\d+$/)[0] / 8,
                m = e + (c ? "Clamped" : "") + "Array",
                b = "get" + e,
                _ = "set" + e,
                S = r[m],
                T = S,
                A = T && T.prototype,
                O = {},
                I = function(e, t) {
                    s(e, t, {
                        get: function() {
                            return function(e, t) {
                                var n = i(e);
                                return n.view[b](t * u + n.byteOffset, !0)
                            }(this, t)
                        },
                        set: function(e) {
                            return function(e, t, n) {
                                var r = i(e);
                                c && (n = (n = l(n)) < 0 ? 0 : n > 255 ? 255 : 255 & n), r.view[_](t * u + r.byteOffset, n, !0)
                            }(this, t, e)
                        },
                        enumerable: !0
                    })
                };
            d ? bu && (T = o((function(e, t, n, r) {
                return Wi(e, T, m), Gt(v(t) ? x(t) ? void 0 !== r ? new S(t, rl(n, u), r) : void 0 !== n ? new S(t, rl(n, u)) : new S(t) : E(t) ? k(T, t) : ol.call(T, t) : new S(wu(t)), e, T)
            })), $t && $t(T, y), n(t(S), (function(e) {
                e in T || P(T, e, S[e])
            })), T.prototype = A) : (T = o((function(e, t, n, r) {
                Wi(e, T, m);
                var i, o, s, c = 0,
                    l = 0;
                if (v(t)) {
                    if (!x(t)) return E(t) ? k(T, t) : ol.call(T, t);
                    i = t, l = rl(n, u);
                    var d = t.byteLength;
                    if (void 0 === r) {
                        if (d % u) throw f("Wrong length");
                        if ((o = d - l) < 0) throw f("Wrong length")
                    } else if ((o = se(r) * u) + l > d) throw f("Wrong length");
                    s = o / u
                } else s = wu(t), i = new h(o = s * u);
                for (a(e, {
                        buffer: i,
                        byteOffset: l,
                        byteLength: o,
                        length: s,
                        view: new p(i)
                    }); c < s;) I(e, c++)
            })), $t && $t(T, y), A = T.prototype = Ot(w)), A.constructor !== T && P(A, "constructor", T), g && P(A, g, m), O[m] = T, Pe({
                global: !0,
                forced: T != S,
                sham: !d
            }, O), "BYTES_PER_ELEMENT" in T || P(T, "BYTES_PER_ELEMENT", u), "BYTES_PER_ELEMENT" in A || P(A, "BYTES_PER_ELEMENT", u), tn(m)
        }) : e.exports = function() {}
    }))("Uint16", (function(e) {
        return function(t, n, r) {
            return e(this, t, n, r)
        }
    }));
    var al = Math.min,
        sl = [].copyWithin || function(e, t) {
            var n = Ce(this),
                r = se(n.length),
                i = le(e, r),
                o = le(t, r),
                a = arguments.length > 2 ? arguments[2] : void 0,
                s = al((void 0 === a ? r : le(a, r)) - o, r - i),
                c = 1;
            for (o < i && i < o + s && (c = -1, o += s - 1, i += s - 1); s-- > 0;) o in n ? n[i] = n[o] : delete n[i], i += c, o += c;
            return n
        },
        cl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("copyWithin", (function(e, t) {
        return sl.call(cl(this), e, t, arguments.length > 2 ? arguments[2] : void 0)
    }));
    var ul = We.every,
        ll = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("every", (function(e) {
        return ul(ll(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var fl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("fill", (function(e) {
        return Ou.apply(fl(this), arguments)
    }));
    var hl = We.filter,
        pl = gu.aTypedArray,
        dl = gu.aTypedArrayConstructor;
    (0, gu.exportTypedArrayMethod)("filter", (function(e) {
        for (var t = hl(pl(this), e, arguments.length > 1 ? arguments[1] : void 0), n = ji(this, this.constructor), r = 0, i = t.length, o = new(dl(n))(i); i > r;) o[r] = t[r++];
        return o
    }));
    var gl = We.find,
        vl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("find", (function(e) {
        return gl(vl(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var ml = We.findIndex,
        yl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("findIndex", (function(e) {
        return ml(yl(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var bl = We.forEach,
        wl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("forEach", (function(e) {
        bl(wl(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var _l = he.includes,
        El = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("includes", (function(e) {
        return _l(El(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var kl = he.indexOf,
        Sl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("indexOf", (function(e) {
        return kl(Sl(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var Tl = Fe("iterator"),
        xl = r.Uint8Array,
        Al = ii.values,
        Ol = ii.keys,
        Pl = ii.entries,
        Il = gu.aTypedArray,
        jl = gu.exportTypedArrayMethod,
        Cl = xl && xl.prototype[Tl],
        Rl = !!Cl && ("values" == Cl.name || null == Cl.name),
        Ll = function() {
            return Al.call(Il(this))
        };
    jl("entries", (function() {
        return Pl.call(Il(this))
    })), jl("keys", (function() {
        return Ol.call(Il(this))
    })), jl("values", Ll, !Rl), jl(Tl, Ll, !Rl);
    var Nl = gu.aTypedArray,
        Ml = [].join;
    (0, gu.exportTypedArrayMethod)("join", (function(e) {
        return Ml.apply(Nl(this), arguments)
    }));
    var Ul = Math.min,
        Dl = [].lastIndexOf,
        Fl = !!Dl && 1 / [1].lastIndexOf(1, -0) < 0,
        Bl = ze("lastIndexOf"),
        ql = Ke("indexOf", {
            ACCESSORS: !0,
            1: 0
        }),
        Hl = Fl || !Bl || !ql ? function(e) {
            if (Fl) return Dl.apply(this, arguments) || 0;
            var t = g(this),
                n = se(t.length),
                r = n - 1;
            for (arguments.length > 1 && (r = Ul(r, oe(arguments[1]))), r < 0 && (r = n + r); r >= 0; r--)
                if (r in t && t[r] === e) return r || 0;
            return -1
        } : Dl,
        Vl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("lastIndexOf", (function(e) {
        return Hl.apply(Vl(this), arguments)
    }));
    var Wl = We.map,
        zl = gu.aTypedArray,
        Yl = gu.aTypedArrayConstructor;
    (0, gu.exportTypedArrayMethod)("map", (function(e) {
        return Wl(zl(this), e, arguments.length > 1 ? arguments[1] : void 0, (function(e, t) {
            return new(Yl(ji(e, e.constructor)))(t)
        }))
    }));
    var $l = function(e) {
            return function(t, n, r, i) {
                Ie(n);
                var o = Ce(t),
                    a = p(o),
                    s = se(o.length),
                    c = e ? s - 1 : 0,
                    u = e ? -1 : 1;
                if (r < 2)
                    for (;;) {
                        if (c in a) {
                            i = a[c], c += u;
                            break
                        }
                        if (c += u, e ? c < 0 : s <= c) throw TypeError("Reduce of empty array with no initial value")
                    }
                for (; e ? c >= 0 : s > c; c += u) c in a && (i = n(i, a[c], c, o));
                return i
            }
        },
        Gl = {
            left: $l(!1),
            right: $l(!0)
        },
        Kl = Gl.left,
        Xl = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("reduce", (function(e) {
        return Kl(Xl(this), e, arguments.length, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var Jl = Gl.right,
        Ql = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("reduceRight", (function(e) {
        return Jl(Ql(this), e, arguments.length, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var Zl = gu.aTypedArray,
        ef = gu.exportTypedArrayMethod,
        tf = Math.floor;
    ef("reverse", (function() {
        for (var e, t = Zl(this).length, n = tf(t / 2), r = 0; r < n;) e = this[r], this[r++] = this[--t], this[t] = e;
        return this
    }));
    var nf = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("set", (function(e) {
        nf(this);
        var t = rl(arguments.length > 1 ? arguments[1] : void 0, 1),
            n = this.length,
            r = Ce(e),
            i = se(r.length),
            o = 0;
        if (i + t > n) throw RangeError("Wrong length");
        for (; o < i;) this[t + o] = r[o++]
    }), i((function() {
        new Int8Array(1).set({})
    })));
    var rf = gu.aTypedArray,
        of = gu.aTypedArrayConstructor,
        af = [].slice;
    (0, gu.exportTypedArrayMethod)("slice", (function(e, t) {
        for (var n = af.call(rf(this), e, t), r = ji(this, this.constructor), i = 0, o = n.length, a = new( of (r))(o); o > i;) a[i] = n[i++];
        return a
    }), i((function() {
        new Int8Array(1).slice()
    })));
    var sf = We.some,
        cf = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("some", (function(e) {
        return sf(cf(this), e, arguments.length > 1 ? arguments[1] : void 0)
    }));
    var uf = gu.aTypedArray,
        lf = [].sort;
    (0, gu.exportTypedArrayMethod)("sort", (function(e) {
        return lf.call(uf(this), e)
    }));
    var ff = gu.aTypedArray;
    (0, gu.exportTypedArrayMethod)("subarray", (function(e, t) {
        var n = ff(this),
            r = n.length,
            i = le(e, r);
        return new(ji(n, n.constructor))(n.buffer, n.byteOffset + i * n.BYTES_PER_ELEMENT, se((void 0 === t ? r : le(t, r)) - i))
    }));
    var hf = r.Int8Array,
        pf = gu.aTypedArray,
        df = gu.exportTypedArrayMethod,
        gf = [].toLocaleString,
        vf = [].slice,
        mf = !!hf && i((function() {
            gf.call(new hf(1))
        }));
    df("toLocaleString", (function() {
        return gf.apply(mf ? vf.call(pf(this)) : pf(this), arguments)
    }), i((function() {
        return [1, 2].toLocaleString() != new hf([1, 2]).toLocaleString()
    })) || !i((function() {
        hf.prototype.toLocaleString.call([1, 2])
    })));
    var yf = gu.exportTypedArrayMethod,
        bf = r.Uint8Array,
        wf = bf && bf.prototype || {},
        _f = [].toString,
        Ef = [].join;
    i((function() {
        _f.call({})
    })) && (_f = function() {
        return Ef.call(this)
    });
    var kf = wf.toString != _f;

    function Sf(e, t) {
        return void 0 === t && (t = 0), "string" != typeof e || 0 === t || e.length <= t ? e : e.substr(0, t) + "..."
    }

    function Tf(e, t) {
        if (!Array.isArray(e)) return "";
        for (var n = [], r = 0; r < e.length; r++) {
            var i = e[r];
            try {
                n.push(String(i))
            } catch (e) {
                n.push("[value cannot be serialized]")
            }
        }
        return n.join(t)
    }

    function xf(e, t) {
        return !!zc(e) && (n = t, "[object RegExp]" === Object.prototype.toString.call(n) ? t.test(e) : "string" == typeof t && -1 !== e.indexOf(t));
        var n
    }

    function Af() {
        return "[object process]" === Object.prototype.toString.call("undefined" != typeof process ? process : 0)
    }
    yf("toString", _f, kf);
    var Of = {};

    function Pf() {
        return Af() ? global : "undefined" != typeof window ? window : "undefined" != typeof self ? self : Of
    }

    function If() {
        var e = Pf(),
            t = e.crypto || e.msCrypto;
        if (void 0 !== t && t.getRandomValues) {
            var n = new Uint16Array(8);
            t.getRandomValues(n), n[3] = 4095 & n[3] | 16384, n[4] = 16383 & n[4] | 32768;
            var r = function(e) {
                for (var t = e.toString(16); t.length < 4;) t = "0" + t;
                return t
            };
            return r(n[0]) + r(n[1]) + r(n[2]) + r(n[3]) + r(n[4]) + r(n[5]) + r(n[6]) + r(n[7])
        }
        return "xxxxxxxxxxxx4xxxyxxxxxxxxxxxxxxx".replace(/[xy]/g, (function(e) {
            var t = 16 * Math.random() | 0;
            return ("x" === e ? t : 3 & t | 8).toString(16)
        }))
    }

    function jf(e) {
        if (!e) return {};
        var t = e.match(/^(([^:\/?#]+):)?(\/\/([^\/?#]*))?([^?#]*)(\?([^#]*))?(#(.*))?$/);
        if (!t) return {};
        var n = t[6] || "",
            r = t[8] || "";
        return {
            host: t[4],
            path: t[5],
            protocol: t[2],
            relative: t[5] + n + r
        }
    }

    function Cf(e) {
        if (e.message) return e.message;
        if (e.exception && e.exception.values && e.exception.values[0]) {
            var t = e.exception.values[0];
            return t.type && t.value ? t.type + ": " + t.value : t.type || t.value || e.event_id || "<unknown>"
        }
        return e.event_id || "<unknown>"
    }

    function Rf(e) {
        var t = Pf();
        if (!("console" in t)) return e();
        var n = t.console,
            r = {};
        ["debug", "info", "warn", "error", "log", "assert"].forEach((function(e) {
            e in t.console && n[e].__sentry_original__ && (r[e] = n[e], n[e] = n[e].__sentry_original__)
        }));
        var i = e();
        return Object.keys(r).forEach((function(e) {
            n[e] = r[e]
        })), i
    }

    function Lf(e, t, n) {
        e.exception = e.exception || {}, e.exception.values = e.exception.values || [], e.exception.values[0] = e.exception.values[0] || {}, e.exception.values[0].value = e.exception.values[0].value || t || "", e.exception.values[0].type = e.exception.values[0].type || n || "Error"
    }

    function Nf(e, t) {
        void 0 === t && (t = {});
        try {
            e.exception.values[0].mechanism = e.exception.values[0].mechanism || {}, Object.keys(t).forEach((function(n) {
                e.exception.values[0].mechanism[n] = t[n]
            }))
        } catch (e) {}
    }

    function Mf(e) {
        try {
            for (var t = e, n = [], r = 0, i = 0, o = " > ".length, a = void 0; t && r++ < 5 && !("html" === (a = Uf(t)) || r > 1 && i + n.length * o + a.length >= 80);) n.push(a), i += a.length, t = t.parentNode;
            return n.reverse().join(" > ")
        } catch (e) {
            return "<unknown>"
        }
    }

    function Uf(e) {
        var t, n, r, i, o, a = e,
            s = [];
        if (!a || !a.tagName) return "";
        if (s.push(a.tagName.toLowerCase()), a.id && s.push("#" + a.id), (t = a.className) && zc(t))
            for (n = t.split(/\s+/), o = 0; o < n.length; o++) s.push("." + n[o]);
        var c = ["type", "name", "title", "alt"];
        for (o = 0; o < c.length; o++) r = c[o], (i = a.getAttribute(r)) && s.push("[" + r + '="' + i + '"]');
        return s.join("")
    }
    var Df = Date.now(),
        Ff = 0,
        Bf = {
            now: function() {
                var e = Date.now() - Df;
                return e < Ff && (e = Ff), Ff = e, e
            },
            timeOrigin: Df
        },
        qf = function() {
            if (Af()) try {
                return (e = module, t = "perf_hooks", e.require(t)).performance
            } catch (e) {
                return Bf
            }
            var e, t;
            return Pf().performance && void 0 === performance.timeOrigin && (performance.timeOrigin = performance.timing && performance.timing.navigationStart || Df), Pf().performance || Bf
        }();

    function Hf() {
        return (qf.timeOrigin + qf.now()) / 1e3
    }

    function Vf(e, t) {
        if (!t) return 6e4;
        var n = parseInt("" + t, 10);
        if (!isNaN(n)) return 1e3 * n;
        var r = Date.parse("" + t);
        return isNaN(r) ? 6e4 : r - e
    }

    function Wf(e) {
        try {
            return e && "function" == typeof e && e.name || "<anonymous>"
        } catch (e) {
            return "<anonymous>"
        }
    }
    var zf = Pf(),
        Yf = "Sentry Logger ",
        $f = function() {
            function e() {
                this._enabled = !1
            }
            return e.prototype.disable = function() {
                this._enabled = !1
            }, e.prototype.enable = function() {
                this._enabled = !0
            }, e.prototype.log = function() {
                for (var e = [], t = 0; t < arguments.length; t++) e[t] = arguments[t];
                this._enabled && Rf((function() {
                    zf.console.log(Yf + "[Log]: " + e.join(" "))
                }))
            }, e.prototype.warn = function() {
                for (var e = [], t = 0; t < arguments.length; t++) e[t] = arguments[t];
                this._enabled && Rf((function() {
                    zf.console.warn(Yf + "[Warn]: " + e.join(" "))
                }))
            }, e.prototype.error = function() {
                for (var e = [], t = 0; t < arguments.length; t++) e[t] = arguments[t];
                this._enabled && Rf((function() {
                    zf.console.error(Yf + "[Error]: " + e.join(" "))
                }))
            }, e
        }();
    zf.__SENTRY__ = zf.__SENTRY__ || {};
    var Gf = zf.__SENTRY__.logger || (zf.__SENTRY__.logger = new $f),
        Kf = Ht("splice"),
        Xf = Ke("splice", {
            ACCESSORS: !0,
            0: 0,
            1: 2
        }),
        Jf = Math.max,
        Qf = Math.min;
    Pe({
        target: "Array",
        proto: !0,
        forced: !Kf || !Xf
    }, {
        splice: function(e, t) {
            var n, r, i, o, a, s, c = Ce(this),
                u = se(c.length),
                l = le(e, u),
                f = arguments.length;
            if (0 === f ? n = r = 0 : 1 === f ? (n = 0, r = u - l) : (n = f - 2, r = Qf(Jf(oe(t), 0), u - l)), u + n - r > 9007199254740991) throw TypeError("Maximum allowed length exceeded");
            for (i = qe(c, r), o = 0; o < r; o++)(a = l + o) in c && ot(i, o, c[a]);
            if (i.length = r, n < r) {
                for (o = l; o < u - r; o++) s = o + n, (a = o + r) in c ? c[s] = c[a] : delete c[s];
                for (o = u; o > u - r + n; o--) delete c[o - 1]
            } else if (n > r)
                for (o = u - r; o > l; o--) s = o + n - 1, (a = o + r - 1) in c ? c[s] = c[a] : delete c[s];
            for (o = 0; o < n; o++) c[o + l] = arguments[o + 2];
            return c.length = u - r + n, i
        }
    });
    var Zf = !i((function() {
            return Object.isExtensible(Object.preventExtensions({}))
        })),
        eh = t((function(e) {
            var t = O.f,
                n = H("meta"),
                r = 0,
                i = Object.isExtensible || function() {
                    return !0
                },
                o = function(e) {
                    t(e, n, {
                        value: {
                            objectID: "O" + ++r,
                            weakData: {}
                        }
                    })
                },
                a = e.exports = {
                    REQUIRED: !1,
                    fastKey: function(e, t) {
                        if (!v(e)) return "symbol" == typeof e ? e : ("string" == typeof e ? "S" : "P") + e;
                        if (!b(e, n)) {
                            if (!i(e)) return "F";
                            if (!t) return "E";
                            o(e)
                        }
                        return e[n].objectID
                    },
                    getWeakData: function(e, t) {
                        if (!b(e, n)) {
                            if (!i(e)) return !0;
                            if (!t) return !1;
                            o(e)
                        }
                        return e[n].weakData
                    },
                    onFreeze: function(e) {
                        return Zf && a.REQUIRED && i(e) && !b(e, n) && o(e), e
                    }
                };
            z[n] = !0
        })),
        th = (eh.REQUIRED, eh.fastKey, eh.getWeakData, eh.onFreeze, eh.getWeakData),
        nh = Q.set,
        rh = Q.getterFor,
        ih = We.find,
        oh = We.findIndex,
        ah = 0,
        sh = function(e) {
            return e.frozen || (e.frozen = new ch)
        },
        ch = function() {
            this.entries = []
        },
        uh = function(e, t) {
            return ih(e.entries, (function(e) {
                return e[0] === t
            }))
        };
    ch.prototype = {
            get: function(e) {
                var t = uh(this, e);
                if (t) return t[1]
            },
            has: function(e) {
                return !!uh(this, e)
            },
            set: function(e, t) {
                var n = uh(this, e);
                n ? n[1] = t : this.entries.push([e, t])
            },
            delete: function(e) {
                var t = oh(this.entries, (function(t) {
                    return t[0] === e
                }));
                return ~t && this.entries.splice(t, 1), !!~t
            }
        },
        function(e, t, n) {
            var o = -1 !== e.indexOf("Map"),
                a = -1 !== e.indexOf("Weak"),
                s = o ? "set" : "add",
                c = r[e],
                u = c && c.prototype,
                l = c,
                f = {},
                h = function(e) {
                    var t = u[e];
                    Z(u, e, "add" == e ? function(e) {
                        return t.call(this, 0 === e ? 0 : e), this
                    } : "delete" == e ? function(e) {
                        return !(a && !v(e)) && t.call(this, 0 === e ? 0 : e)
                    } : "get" == e ? function(e) {
                        return a && !v(e) ? void 0 : t.call(this, 0 === e ? 0 : e)
                    } : "has" == e ? function(e) {
                        return !(a && !v(e)) && t.call(this, 0 === e ? 0 : e)
                    } : function(e, n) {
                        return t.call(this, 0 === e ? 0 : e, n), this
                    })
                };
            if (Ae(e, "function" != typeof c || !(a || u.forEach && !i((function() {
                    (new c).entries().next()
                }))))) l = n.getConstructor(t, e, o, s), eh.REQUIRED = !0;
            else if (Ae(e, !0)) {
                var p = new l,
                    d = p[s](a ? {} : -0, 1) != p,
                    g = i((function() {
                        p.has(1)
                    })),
                    m = yt((function(e) {
                        new c(e)
                    })),
                    y = !a && i((function() {
                        for (var e = new c, t = 5; t--;) e[s](t, t);
                        return !e.has(-0)
                    }));
                m || ((l = t((function(t, n) {
                    Wi(t, l, e);
                    var r = Gt(new c, t, l);
                    return null != n && ms(n, r[s], r, o), r
                }))).prototype = u, u.constructor = l), (g || y) && (h("delete"), h("has"), o && h("get")), (y || d) && h(s), a && u.clear && delete u.clear
            }
            f[e] = l, Pe({
                global: !0,
                forced: l != c
            }, f), Wn(l, e), a || n.setStrong(l, e, o)
        }("WeakSet", (function(e) {
            return function() {
                return e(this, arguments.length ? arguments[0] : void 0)
            }
        }), {
            getConstructor: function(e, t, n, r) {
                var i = e((function(e, o) {
                        Wi(e, i, t), nh(e, {
                            type: t,
                            id: ah++,
                            frozen: void 0
                        }), null != o && ms(o, e[r], e, n)
                    })),
                    o = rh(t),
                    a = function(e, t, n) {
                        var r = o(e),
                            i = th(x(t), !0);
                        return !0 === i ? sh(r).set(t, n) : i[r.id] = n, e
                    };
                return no(i.prototype, {
                    delete: function(e) {
                        var t = o(this);
                        if (!v(e)) return !1;
                        var n = th(e);
                        return !0 === n ? sh(t).delete(e) : n && b(n, t.id) && delete n[t.id]
                    },
                    has: function(e) {
                        var t = o(this);
                        if (!v(e)) return !1;
                        var n = th(e);
                        return !0 === n ? sh(t).has(e) : n && b(n, t.id)
                    }
                }), no(i.prototype, n ? {
                    get: function(e) {
                        var t = o(this);
                        if (v(e)) {
                            var n = th(e);
                            return !0 === n ? sh(t).get(e) : n ? n[t.id] : void 0
                        }
                    },
                    set: function(e, t) {
                        return a(this, e, t)
                    }
                } : {
                    add: function(e) {
                        return a(this, e, !0)
                    }
                }), i
            }
        });
    var lh = function() {
        function e() {
            this._hasWeakSet = "function" == typeof WeakSet, this._inner = this._hasWeakSet ? new WeakSet : []
        }
        return e.prototype.memoize = function(e) {
            if (this._hasWeakSet) return !!this._inner.has(e) || (this._inner.add(e), !1);
            for (var t = 0; t < this._inner.length; t++) {
                if (this._inner[t] === e) return !0
            }
            return this._inner.push(e), !1
        }, e.prototype.unmemoize = function(e) {
            if (this._hasWeakSet) this._inner.delete(e);
            else
                for (var t = 0; t < this._inner.length; t++)
                    if (this._inner[t] === e) {
                        this._inner.splice(t, 1);
                        break
                    }
        }, e
    }();

    function fh(e, t, n) {
        if (t in e) {
            var r = e[t],
                i = n(r);
            if ("function" == typeof i) try {
                i.prototype = i.prototype || {}, Object.defineProperties(i, {
                    __sentry_original__: {
                        enumerable: !1,
                        value: r
                    }
                })
            } catch (e) {}
            e[t] = i
        }
    }

    function hh(e) {
        if (Hc(e)) {
            var t = e,
                n = {
                    message: t.message,
                    name: t.name,
                    stack: t.stack
                };
            for (var r in t) Object.prototype.hasOwnProperty.call(t, r) && (n[r] = t[r]);
            return n
        }
        if (Gc(e)) {
            var i = e,
                o = {};
            o.type = i.type;
            try {
                o.target = Kc(i.target) ? Mf(i.target) : Object.prototype.toString.call(i.target)
            } catch (e) {
                o.target = "<unknown>"
            }
            try {
                o.currentTarget = Kc(i.currentTarget) ? Mf(i.currentTarget) : Object.prototype.toString.call(i.currentTarget)
            } catch (e) {
                o.currentTarget = "<unknown>"
            }
            for (var r in "undefined" != typeof CustomEvent && Jc(e, CustomEvent) && (o.detail = i.detail), i) Object.prototype.hasOwnProperty.call(i, r) && (o[r] = i);
            return o
        }
        return e
    }

    function ph(e) {
        return function(e) {
            return ~-encodeURI(e).split(/%..|./).length
        }(JSON.stringify(e))
    }

    function dh(e, t, n) {
        void 0 === t && (t = 3), void 0 === n && (n = 102400);
        var r = mh(e, t);
        return ph(r) > n ? dh(e, t - 1, n) : r
    }

    function gh(e, t) {
        return "domain" === t && e && "object" === Ka(e) && e._events ? "[Domain]" : "domainEmitter" === t ? "[DomainEmitter]" : "undefined" != typeof global && e === global ? "[Global]" : "undefined" != typeof window && e === window ? "[Window]" : "undefined" != typeof document && e === document ? "[Document]" : $c(n = e) && "nativeEvent" in n && "preventDefault" in n && "stopPropagation" in n ? "[SyntheticEvent]" : "number" == typeof e && e != e ? "[NaN]" : void 0 === e ? "[undefined]" : "function" == typeof e ? "[Function: " + Wf(e) + "]" : e;
        var n
    }

    function vh(e, t, n, r) {
        if (void 0 === n && (n = 1 / 0), void 0 === r && (r = new lh), 0 === n) return function(e) {
            var t = Object.prototype.toString.call(e);
            if ("string" == typeof e) return e;
            if ("[object Object]" === t) return "[Object]";
            if ("[object Array]" === t) return "[Array]";
            var n = gh(e);
            return Yc(n) ? n : t
        }(t);
        if (null != t && "function" == typeof t.toJSON) return t.toJSON();
        var i = gh(t, e);
        if (Yc(i)) return i;
        var o = hh(t),
            a = Array.isArray(t) ? [] : {};
        if (r.memoize(t)) return "[Circular ~]";
        for (var s in o) Object.prototype.hasOwnProperty.call(o, s) && (a[s] = vh(s, o[s], n - 1, r));
        return r.unmemoize(t), a
    }

    function mh(e, t) {
        try {
            return JSON.parse(JSON.stringify(e, (function(e, n) {
                return vh(e, n, t)
            })))
        } catch (e) {
            return "**non-serializable**"
        }
    }

    function yh(e, t) {
        void 0 === t && (t = 40);
        var n = Object.keys(hh(e));
        if (n.sort(), !n.length) return "[object has no keys]";
        if (n[0].length >= t) return Sf(n[0], t);
        for (var r = n.length; r > 0; r--) {
            var i = n.slice(0, r).join(", ");
            if (!(i.length > t)) return r === n.length ? i : Sf(i, t)
        }
        return ""
    }
    Pe({
        target: "URL",
        proto: !0,
        enumerable: !0
    }, {
        toJSON: function() {
            return URL.prototype.toString.call(this)
        }
    });
    var bh = We.filter,
        wh = Ht("filter"),
        _h = Ke("filter");
    Pe({
        target: "Array",
        proto: !0,
        forced: !wh || !_h
    }, {
        filter: function(e) {
            return bh(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var Eh, kh = !!vs && i((function() {
        vs.prototype.finally.call({
            then: function() {}
        }, (function() {}))
    }));
    Pe({
            target: "Promise",
            proto: !0,
            real: !0,
            forced: kh
        }, {
            finally: function(e) {
                var t = ji(this, ne("Promise")),
                    n = "function" == typeof e;
                return this.then(n ? function(n) {
                    return tc(t, e()).then((function() {
                        return n
                    }))
                } : e, n ? function(n) {
                    return tc(t, e()).then((function() {
                        throw n
                    }))
                } : e)
            }
        }), "function" != typeof vs || vs.prototype.finally || Z(vs.prototype, "finally", ne("Promise").prototype.finally),
        function(e) {
            e.PENDING = "PENDING", e.RESOLVED = "RESOLVED", e.REJECTED = "REJECTED"
        }(Eh || (Eh = {}));
    var Sh = function() {
            function e(e) {
                var t = this;
                this._state = Eh.PENDING, this._handlers = [], this._resolve = function(e) {
                    t._setResult(Eh.RESOLVED, e)
                }, this._reject = function(e) {
                    t._setResult(Eh.REJECTED, e)
                }, this._setResult = function(e, n) {
                    t._state === Eh.PENDING && (Xc(n) ? n.then(t._resolve, t._reject) : (t._state = e, t._value = n, t._executeHandlers()))
                }, this._attachHandler = function(e) {
                    t._handlers = t._handlers.concat(e), t._executeHandlers()
                }, this._executeHandlers = function() {
                    if (t._state !== Eh.PENDING) {
                        var e = t._handlers.slice();
                        t._handlers = [], e.forEach((function(e) {
                            e.done || (t._state === Eh.RESOLVED && e.onfulfilled && e.onfulfilled(t._value), t._state === Eh.REJECTED && e.onrejected && e.onrejected(t._value), e.done = !0)
                        }))
                    }
                };
                try {
                    e(this._resolve, this._reject)
                } catch (e) {
                    this._reject(e)
                }
            }
            return e.prototype.toString = function() {
                return "[object SyncPromise]"
            }, e.resolve = function(t) {
                return new e((function(e) {
                    e(t)
                }))
            }, e.reject = function(t) {
                return new e((function(e, n) {
                    n(t)
                }))
            }, e.all = function(t) {
                return new e((function(n, r) {
                    if (Array.isArray(t))
                        if (0 !== t.length) {
                            var i = t.length,
                                o = [];
                            t.forEach((function(t, a) {
                                e.resolve(t).then((function(e) {
                                    o[a] = e, 0 === (i -= 1) && n(o)
                                })).then(null, r)
                            }))
                        } else n([]);
                    else r(new TypeError("Promise.all requires an array as input."))
                }))
            }, e.prototype.then = function(t, n) {
                var r = this;
                return new e((function(e, i) {
                    r._attachHandler({
                        done: !1,
                        onfulfilled: function(n) {
                            if (t) try {
                                return void e(t(n))
                            } catch (e) {
                                return void i(e)
                            } else e(n)
                        },
                        onrejected: function(t) {
                            if (n) try {
                                return void e(n(t))
                            } catch (e) {
                                return void i(e)
                            } else i(t)
                        }
                    })
                }))
            }, e.prototype.catch = function(e) {
                return this.then((function(e) {
                    return e
                }), e)
            }, e.prototype.finally = function(t) {
                var n = this;
                return new e((function(e, r) {
                    var i, o;
                    return n.then((function(e) {
                        o = !1, i = e, t && t()
                    }), (function(e) {
                        o = !0, i = e, t && t()
                    })).then((function() {
                        o ? r(i) : e(i)
                    }))
                }))
            }, e
        }(),
        Th = function() {
            function e(e) {
                this._limit = e, this._buffer = []
            }
            return e.prototype.isReady = function() {
                return void 0 === this._limit || this.length() < this._limit
            }, e.prototype.add = function(e) {
                var t = this;
                return this.isReady() ? (-1 === this._buffer.indexOf(e) && this._buffer.push(e), e.then((function() {
                    return t.remove(e)
                })).then(null, (function() {
                    return t.remove(e).then(null, (function() {}))
                })), e) : Sh.reject(new qc("Not adding Promise due to buffer limit reached."))
            }, e.prototype.remove = function(e) {
                return this._buffer.splice(this._buffer.indexOf(e), 1)[0]
            }, e.prototype.length = function() {
                return this._buffer.length
            }, e.prototype.drain = function(e) {
                var t = this;
                return new Sh((function(n) {
                    var r = setTimeout((function() {
                        e && e > 0 && n(!1)
                    }), e);
                    Sh.all(t._buffer).then((function() {
                        clearTimeout(r), n(!0)
                    })).then(null, (function() {
                        n(!0)
                    }))
                }))
            }, e
        }();

    function xh() {
        if (!("fetch" in Pf())) return !1;
        try {
            return new Headers, new Request(""), new Response, !0
        } catch (e) {
            return !1
        }
    }

    function Ah(e) {
        return e && /^function fetch\(\)\s+\{\s+\[native code\]\s+\}$/.test(e.toString())
    }

    function Oh() {
        if (!xh()) return !1;
        try {
            return new Request("_", {
                referrerPolicy: "origin"
            }), !0
        } catch (e) {
            return !1
        }
    }
    var Ph, Ih = Pf(),
        jh = {},
        Ch = {};

    function Rh(e) {
        if (!Ch[e]) switch (Ch[e] = !0, e) {
            case "console":
                ! function() {
                    if (!("console" in Ih)) return;
                    ["debug", "info", "warn", "error", "log", "assert"].forEach((function(e) {
                        e in Ih.console && fh(Ih.console, e, (function(t) {
                            return function() {
                                for (var n = [], r = 0; r < arguments.length; r++) n[r] = arguments[r];
                                Nh("console", {
                                    args: n,
                                    level: e
                                }), t && Function.prototype.apply.call(t, Ih.console, n)
                            }
                        }))
                    }))
                }();
                break;
            case "dom":
                ! function() {
                    if (!("document" in Ih)) return;
                    Ih.document.addEventListener("click", qh("click", Nh.bind(null, "dom")), !1), Ih.document.addEventListener("keypress", Hh(Nh.bind(null, "dom")), !1), ["EventTarget", "Node"].forEach((function(e) {
                        var t = Ih[e] && Ih[e].prototype;
                        t && t.hasOwnProperty && t.hasOwnProperty("addEventListener") && (fh(t, "addEventListener", (function(e) {
                            return function(t, n, r) {
                                return n && n.handleEvent ? ("click" === t && fh(n, "handleEvent", (function(e) {
                                    return function(t) {
                                        return qh("click", Nh.bind(null, "dom"))(t), e.call(this, t)
                                    }
                                })), "keypress" === t && fh(n, "handleEvent", (function(e) {
                                    return function(t) {
                                        return Hh(Nh.bind(null, "dom"))(t), e.call(this, t)
                                    }
                                }))) : ("click" === t && qh("click", Nh.bind(null, "dom"), !0)(this), "keypress" === t && Hh(Nh.bind(null, "dom"))(this)), e.call(this, t, n, r)
                            }
                        })), fh(t, "removeEventListener", (function(e) {
                            return function(t, n, r) {
                                var i = n;
                                try {
                                    i = i && (i.__sentry_wrapped__ || i)
                                } catch (e) {}
                                return e.call(this, t, i, r)
                            }
                        })))
                    }))
                }();
                break;
            case "xhr":
                ! function() {
                    if (!("XMLHttpRequest" in Ih)) return;
                    var e = XMLHttpRequest.prototype;
                    fh(e, "open", (function(e) {
                        return function() {
                            for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                            var r = t[1];
                            return this.__sentry_xhr__ = {
                                method: zc(t[0]) ? t[0].toUpperCase() : t[0],
                                url: t[1]
                            }, zc(r) && "POST" === this.__sentry_xhr__.method && r.match(/sentry_key/) && (this.__sentry_own_request__ = !0), e.apply(this, t)
                        }
                    })), fh(e, "send", (function(e) {
                        return function() {
                            for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                            var r = this,
                                i = {
                                    args: t,
                                    startTimestamp: Date.now(),
                                    xhr: r
                                };
                            return Nh("xhr", Rc({}, i)), r.addEventListener("readystatechange", (function() {
                                if (4 === r.readyState) {
                                    try {
                                        r.__sentry_xhr__ && (r.__sentry_xhr__.status_code = r.status)
                                    } catch (e) {}
                                    Nh("xhr", Rc({}, i, {
                                        endTimestamp: Date.now()
                                    }))
                                }
                            })), e.apply(this, t)
                        }
                    }))
                }();
                break;
            case "fetch":
                ! function() {
                    if (! function() {
                            if (!xh()) return !1;
                            var e = Pf();
                            if (Ah(e.fetch)) return !0;
                            var t = !1,
                                n = e.document;
                            if (n && "function" == typeof n.createElement) try {
                                var r = n.createElement("iframe");
                                r.hidden = !0, n.head.appendChild(r), r.contentWindow && r.contentWindow.fetch && (t = Ah(r.contentWindow.fetch)), n.head.removeChild(r)
                            } catch (e) {
                                Gf.warn("Could not create sandbox iframe for pure fetch check, bailing to window.fetch: ", e)
                            }
                            return t
                        }()) return;
                    fh(Ih, "fetch", (function(e) {
                        return function() {
                            for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                            var r = {
                                args: t,
                                fetchData: {
                                    method: Mh(t),
                                    url: Uh(t)
                                },
                                startTimestamp: Date.now()
                            };
                            return Nh("fetch", Rc({}, r)), e.apply(Ih, t).then((function(e) {
                                return Nh("fetch", Rc({}, r, {
                                    endTimestamp: Date.now(),
                                    response: e
                                })), e
                            }), (function(e) {
                                throw Nh("fetch", Rc({}, r, {
                                    endTimestamp: Date.now(),
                                    error: e
                                })), e
                            }))
                        }
                    }))
                }();
                break;
            case "history":
                ! function() {
                    if (! function() {
                            var e = Pf(),
                                t = e.chrome,
                                n = t && t.app && t.app.runtime,
                                r = "history" in e && !!e.history.pushState && !!e.history.replaceState;
                            return !n && r
                        }()) return;
                    var e = Ih.onpopstate;

                    function t(e) {
                        return function() {
                            for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                            var r = t.length > 2 ? t[2] : void 0;
                            if (r) {
                                var i = Ph,
                                    o = String(r);
                                Ph = o, Nh("history", {
                                    from: i,
                                    to: o
                                })
                            }
                            return e.apply(this, t)
                        }
                    }
                    Ih.onpopstate = function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        var r = Ih.location.href,
                            i = Ph;
                        if (Ph = r, Nh("history", {
                                from: i,
                                to: r
                            }), e) return e.apply(this, t)
                    }, fh(Ih.history, "pushState", t), fh(Ih.history, "replaceState", t)
                }();
                break;
            case "error":
                Vh = Ih.onerror, Ih.onerror = function(e, t, n, r, i) {
                    return Nh("error", {
                        column: r,
                        error: i,
                        line: n,
                        msg: e,
                        url: t
                    }), !!Vh && Vh.apply(this, arguments)
                };
                break;
            case "unhandledrejection":
                Wh = Ih.onunhandledrejection, Ih.onunhandledrejection = function(e) {
                    return Nh("unhandledrejection", e), !Wh || Wh.apply(this, arguments)
                };
                break;
            default:
                Gf.warn("unknown instrumentation type:", e)
        }
    }

    function Lh(e) {
        e && "string" == typeof e.type && "function" == typeof e.callback && (jh[e.type] = jh[e.type] || [], jh[e.type].push(e.callback), Rh(e.type))
    }

    function Nh(e, t) {
        var n, r;
        if (e && jh[e]) try {
            for (var i = function(e) {
                    var t = "function" == typeof Symbol && Symbol.iterator,
                        n = t && e[t],
                        r = 0;
                    if (n) return n.call(e);
                    if (e && "number" == typeof e.length) return {
                        next: function() {
                            return e && r >= e.length && (e = void 0), {
                                value: e && e[r++],
                                done: !e
                            }
                        }
                    };
                    throw new TypeError(t ? "Object is not iterable." : "Symbol.iterator is not defined.")
                }(jh[e] || []), o = i.next(); !o.done; o = i.next()) {
                var a = o.value;
                try {
                    a(t)
                } catch (t) {
                    Gf.error("Error while triggering instrumentation handler.\nType: " + e + "\nName: " + Wf(a) + "\nError: " + t)
                }
            }
        } catch (e) {
            n = {
                error: e
            }
        } finally {
            try {
                o && !o.done && (r = i.return) && r.call(i)
            } finally {
                if (n) throw n.error
            }
        }
    }

    function Mh(e) {
        return void 0 === e && (e = []), "Request" in Ih && Jc(e[0], Request) && e[0].method ? String(e[0].method).toUpperCase() : e[1] && e[1].method ? String(e[1].method).toUpperCase() : "GET"
    }

    function Uh(e) {
        return void 0 === e && (e = []), "string" == typeof e[0] ? e[0] : "Request" in Ih && Jc(e[0], Request) ? e[0].url : String(e[0])
    }
    var Dh, Fh, Bh = 0;

    function qh(e, t, n) {
        return void 0 === n && (n = !1),
            function(r) {
                Dh = void 0, r && Fh !== r && (Fh = r, Bh && clearTimeout(Bh), n ? Bh = setTimeout((function() {
                    t({
                        event: r,
                        name: e
                    })
                })) : t({
                    event: r,
                    name: e
                }))
            }
    }

    function Hh(e) {
        return function(t) {
            var n;
            try {
                n = t.target
            } catch (e) {
                return
            }
            var r = n && n.tagName;
            r && ("INPUT" === r || "TEXTAREA" === r || n.isContentEditable) && (Dh || qh("input", e)(t), clearTimeout(Dh), Dh = setTimeout((function() {
                Dh = void 0
            }), 1e3))
        }
    }
    var Vh = null;
    var Wh = null;
    var zh = /^(?:(\w+):)\/\/(?:(\w+)(?::(\w+))?@)([\w\.-]+)(?::(\d+))?\/(.+)/,
        Yh = function() {
            function e(e) {
                "string" == typeof e ? this._fromString(e) : this._fromComponents(e), this._validate()
            }
            return e.prototype.toString = function(e) {
                void 0 === e && (e = !1);
                var t = this,
                    n = t.host,
                    r = t.path,
                    i = t.pass,
                    o = t.port,
                    a = t.projectId;
                return t.protocol + "://" + t.user + (e && i ? ":" + i : "") + "@" + n + (o ? ":" + o : "") + "/" + (r ? r + "/" : r) + a
            }, e.prototype._fromString = function(e) {
                var t = zh.exec(e);
                if (!t) throw new qc("Invalid Dsn");
                var n = Lc(t.slice(1), 6),
                    r = n[0],
                    i = n[1],
                    o = n[2],
                    a = void 0 === o ? "" : o,
                    s = n[3],
                    c = n[4],
                    u = void 0 === c ? "" : c,
                    l = "",
                    f = n[5],
                    h = f.split("/");
                h.length > 1 && (l = h.slice(0, -1).join("/"), f = h.pop()), this._fromComponents({
                    host: s,
                    pass: a,
                    path: l,
                    projectId: f,
                    port: u,
                    protocol: r,
                    user: i
                })
            }, e.prototype._fromComponents = function(e) {
                this.protocol = e.protocol, this.user = e.user, this.pass = e.pass || "", this.host = e.host, this.port = e.port || "", this.path = e.path || "", this.projectId = e.projectId
            }, e.prototype._validate = function() {
                var e = this;
                if (["protocol", "user", "host", "projectId"].forEach((function(t) {
                        if (!e[t]) throw new qc("Invalid Dsn")
                    })), "http" !== this.protocol && "https" !== this.protocol) throw new qc("Invalid Dsn");
                if (this.port && isNaN(parseInt(this.port, 10))) throw new qc("Invalid Dsn")
            }, e
        }(),
        $h = function() {
            function e() {
                this._notifyingListeners = !1, this._scopeListeners = [], this._eventProcessors = [], this._breadcrumbs = [], this._user = {}, this._tags = {}, this._extra = {}, this._context = {}
            }
            return e.prototype.addScopeListener = function(e) {
                this._scopeListeners.push(e)
            }, e.prototype.addEventProcessor = function(e) {
                return this._eventProcessors.push(e), this
            }, e.prototype._notifyScopeListeners = function() {
                var e = this;
                this._notifyingListeners || (this._notifyingListeners = !0, setTimeout((function() {
                    e._scopeListeners.forEach((function(t) {
                        t(e)
                    })), e._notifyingListeners = !1
                })))
            }, e.prototype._notifyEventProcessors = function(e, t, n, r) {
                var i = this;
                return void 0 === r && (r = 0), new Sh((function(o, a) {
                    var s = e[r];
                    if (null === t || "function" != typeof s) o(t);
                    else {
                        var c = s(Rc({}, t), n);
                        Xc(c) ? c.then((function(t) {
                            return i._notifyEventProcessors(e, t, n, r + 1).then(o)
                        })).then(null, a) : i._notifyEventProcessors(e, c, n, r + 1).then(o).then(null, a)
                    }
                }))
            }, e.prototype.setUser = function(e) {
                return this._user = e || {}, this._notifyScopeListeners(), this
            }, e.prototype.setTags = function(e) {
                return this._tags = Rc({}, this._tags, e), this._notifyScopeListeners(), this
            }, e.prototype.setTag = function(e, t) {
                var n;
                return this._tags = Rc({}, this._tags, ((n = {})[e] = t, n)), this._notifyScopeListeners(), this
            }, e.prototype.setExtras = function(e) {
                return this._extra = Rc({}, this._extra, e), this._notifyScopeListeners(), this
            }, e.prototype.setExtra = function(e, t) {
                var n;
                return this._extra = Rc({}, this._extra, ((n = {})[e] = t, n)), this._notifyScopeListeners(), this
            }, e.prototype.setFingerprint = function(e) {
                return this._fingerprint = e, this._notifyScopeListeners(), this
            }, e.prototype.setLevel = function(e) {
                return this._level = e, this._notifyScopeListeners(), this
            }, e.prototype.setTransaction = function(e) {
                return this._transaction = e, this._span && (this._span.transaction = e), this._notifyScopeListeners(), this
            }, e.prototype.setContext = function(e, t) {
                var n;
                return this._context = Rc({}, this._context, ((n = {})[e] = t, n)), this._notifyScopeListeners(), this
            }, e.prototype.setSpan = function(e) {
                return this._span = e, this._notifyScopeListeners(), this
            }, e.prototype.getSpan = function() {
                return this._span
            }, e.clone = function(t) {
                var n = new e;
                return t && (n._breadcrumbs = Nc(t._breadcrumbs), n._tags = Rc({}, t._tags), n._extra = Rc({}, t._extra), n._context = Rc({}, t._context), n._user = t._user, n._level = t._level, n._span = t._span, n._transaction = t._transaction, n._fingerprint = t._fingerprint, n._eventProcessors = Nc(t._eventProcessors)), n
            }, e.prototype.clear = function() {
                return this._breadcrumbs = [], this._tags = {}, this._extra = {}, this._user = {}, this._context = {}, this._level = void 0, this._transaction = void 0, this._fingerprint = void 0, this._span = void 0, this._notifyScopeListeners(), this
            }, e.prototype.addBreadcrumb = function(e, t) {
                var n = Rc({
                    timestamp: Hf()
                }, e);
                return this._breadcrumbs = void 0 !== t && t >= 0 ? Nc(this._breadcrumbs, [n]).slice(-t) : Nc(this._breadcrumbs, [n]), this._notifyScopeListeners(), this
            }, e.prototype.clearBreadcrumbs = function() {
                return this._breadcrumbs = [], this._notifyScopeListeners(), this
            }, e.prototype._applyFingerprint = function(e) {
                e.fingerprint = e.fingerprint ? Array.isArray(e.fingerprint) ? e.fingerprint : [e.fingerprint] : [], this._fingerprint && (e.fingerprint = e.fingerprint.concat(this._fingerprint)), e.fingerprint && !e.fingerprint.length && delete e.fingerprint
            }, e.prototype.applyToEvent = function(e, t) {
                return this._extra && Object.keys(this._extra).length && (e.extra = Rc({}, this._extra, e.extra)), this._tags && Object.keys(this._tags).length && (e.tags = Rc({}, this._tags, e.tags)), this._user && Object.keys(this._user).length && (e.user = Rc({}, this._user, e.user)), this._context && Object.keys(this._context).length && (e.contexts = Rc({}, this._context, e.contexts)), this._level && (e.level = this._level), this._transaction && (e.transaction = this._transaction), this._span && (e.contexts = Rc({
                    trace: this._span.getTraceContext()
                }, e.contexts)), this._applyFingerprint(e), e.breadcrumbs = Nc(e.breadcrumbs || [], this._breadcrumbs), e.breadcrumbs = e.breadcrumbs.length > 0 ? e.breadcrumbs : void 0, this._notifyEventProcessors(Nc(Gh(), this._eventProcessors), e, t)
            }, e
        }();

    function Gh() {
        var e = Pf();
        return e.__SENTRY__ = e.__SENTRY__ || {}, e.__SENTRY__.globalEventProcessors = e.__SENTRY__.globalEventProcessors || [], e.__SENTRY__.globalEventProcessors
    }

    function Kh(e) {
        Gh().push(e)
    }
    var Xh = function() {
        function e(e, t, n) {
            void 0 === t && (t = new $h), void 0 === n && (n = 3), this._version = n, this._stack = [], this._stack.push({
                client: e,
                scope: t
            })
        }
        return e.prototype._invokeClient = function(e) {
            for (var t, n = [], r = 1; r < arguments.length; r++) n[r - 1] = arguments[r];
            var i = this.getStackTop();
            i && i.client && i.client[e] && (t = i.client)[e].apply(t, Nc(n, [i.scope]))
        }, e.prototype.isOlderThan = function(e) {
            return this._version < e
        }, e.prototype.bindClient = function(e) {
            this.getStackTop().client = e, e && e.setupIntegrations && e.setupIntegrations()
        }, e.prototype.pushScope = function() {
            var e = this.getStack(),
                t = e.length > 0 ? e[e.length - 1].scope : void 0,
                n = $h.clone(t);
            return this.getStack().push({
                client: this.getClient(),
                scope: n
            }), n
        }, e.prototype.popScope = function() {
            return void 0 !== this.getStack().pop()
        }, e.prototype.withScope = function(e) {
            var t = this.pushScope();
            try {
                e(t)
            } finally {
                this.popScope()
            }
        }, e.prototype.getClient = function() {
            return this.getStackTop().client
        }, e.prototype.getScope = function() {
            return this.getStackTop().scope
        }, e.prototype.getStack = function() {
            return this._stack
        }, e.prototype.getStackTop = function() {
            return this._stack[this._stack.length - 1]
        }, e.prototype.captureException = function(e, t) {
            var n = this._lastEventId = If(),
                r = t;
            if (!t) {
                var i = void 0;
                try {
                    throw new Error("Sentry syntheticException")
                } catch (e) {
                    i = e
                }
                r = {
                    originalException: e,
                    syntheticException: i
                }
            }
            return this._invokeClient("captureException", e, Rc({}, r, {
                event_id: n
            })), n
        }, e.prototype.captureMessage = function(e, t, n) {
            var r = this._lastEventId = If(),
                i = n;
            if (!n) {
                var o = void 0;
                try {
                    throw new Error(e)
                } catch (e) {
                    o = e
                }
                i = {
                    originalException: e,
                    syntheticException: o
                }
            }
            return this._invokeClient("captureMessage", e, t, Rc({}, i, {
                event_id: r
            })), r
        }, e.prototype.captureEvent = function(e, t) {
            var n = this._lastEventId = If();
            return this._invokeClient("captureEvent", e, Rc({}, t, {
                event_id: n
            })), n
        }, e.prototype.lastEventId = function() {
            return this._lastEventId
        }, e.prototype.addBreadcrumb = function(e, t) {
            var n = this.getStackTop();
            if (n.scope && n.client) {
                var r = n.client.getOptions && n.client.getOptions() || {},
                    i = r.beforeBreadcrumb,
                    o = void 0 === i ? null : i,
                    a = r.maxBreadcrumbs,
                    s = void 0 === a ? 100 : a;
                if (!(s <= 0)) {
                    var c = Hf(),
                        u = Rc({
                            timestamp: c
                        }, e),
                        l = o ? Rf((function() {
                            return o(u, t)
                        })) : u;
                    null !== l && n.scope.addBreadcrumb(l, Math.min(s, 100))
                }
            }
        }, e.prototype.setUser = function(e) {
            var t = this.getStackTop();
            t.scope && t.scope.setUser(e)
        }, e.prototype.setTags = function(e) {
            var t = this.getStackTop();
            t.scope && t.scope.setTags(e)
        }, e.prototype.setExtras = function(e) {
            var t = this.getStackTop();
            t.scope && t.scope.setExtras(e)
        }, e.prototype.setTag = function(e, t) {
            var n = this.getStackTop();
            n.scope && n.scope.setTag(e, t)
        }, e.prototype.setExtra = function(e, t) {
            var n = this.getStackTop();
            n.scope && n.scope.setExtra(e, t)
        }, e.prototype.setContext = function(e, t) {
            var n = this.getStackTop();
            n.scope && n.scope.setContext(e, t)
        }, e.prototype.configureScope = function(e) {
            var t = this.getStackTop();
            t.scope && t.client && e(t.scope)
        }, e.prototype.run = function(e) {
            var t = Qh(this);
            try {
                e(this)
            } finally {
                Qh(t)
            }
        }, e.prototype.getIntegration = function(e) {
            var t = this.getClient();
            if (!t) return null;
            try {
                return t.getIntegration(e)
            } catch (t) {
                return Gf.warn("Cannot retrieve integration " + e.id + " from the current Hub"), null
            }
        }, e.prototype.startSpan = function(e, t) {
            return void 0 === t && (t = !1), this._callExtensionMethod("startSpan", e, t)
        }, e.prototype.traceHeaders = function() {
            return this._callExtensionMethod("traceHeaders")
        }, e.prototype._callExtensionMethod = function(e) {
            for (var t = [], n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
            var r = Jh(),
                i = r.__SENTRY__;
            if (i && i.extensions && "function" == typeof i.extensions[e]) return i.extensions[e].apply(this, t);
            Gf.warn("Extension method " + e + " couldn't be found, doing nothing.")
        }, e
    }();

    function Jh() {
        var e = Pf();
        return e.__SENTRY__ = e.__SENTRY__ || {
            extensions: {},
            hub: void 0
        }, e
    }

    function Qh(e) {
        var t = Jh(),
            n = tp(t);
        return np(t, e), n
    }

    function Zh() {
        var e = Jh();
        return ep(e) && !tp(e).isOlderThan(3) || np(e, new Xh), Af() ? function(e) {
            try {
                var t = Jh().__SENTRY__;
                if (!t || !t.extensions || !t.extensions.domain) return tp(e);
                var n = t.extensions.domain.active;
                if (!n) return tp(e);
                if (!ep(n) || tp(n).isOlderThan(3)) {
                    var r = tp(e).getStackTop();
                    np(n, new Xh(r.client, $h.clone(r.scope)))
                }
                return tp(n)
            } catch (t) {
                return tp(e)
            }
        }(e) : tp(e)
    }

    function ep(e) {
        return !!(e && e.__SENTRY__ && e.__SENTRY__.hub)
    }

    function tp(e) {
        return e && e.__SENTRY__ && e.__SENTRY__.hub || (e.__SENTRY__ = e.__SENTRY__ || {}, e.__SENTRY__.hub = new Xh), e.__SENTRY__.hub
    }

    function np(e, t) {
        return !!e && (e.__SENTRY__ = e.__SENTRY__ || {}, e.__SENTRY__.hub = t, !0)
    }

    function rp(e) {
        for (var t = [], n = 1; n < arguments.length; n++) t[n - 1] = arguments[n];
        var r = Zh();
        if (r && r[e]) return r[e].apply(r, Nc(t));
        throw new Error("No hub defined or " + e + " was not found on the hub, please open a bug report.")
    }

    function ip(e) {
        var t;
        try {
            throw new Error("Sentry syntheticException")
        } catch (e) {
            t = e
        }
        return rp("captureException", e, {
            originalException: e,
            syntheticException: t
        })
    }

    function op(e) {
        rp("withScope", e)
    }
    var ap = function() {
            function e(e) {
                this.dsn = e, this._dsnObject = new Yh(e)
            }
            return e.prototype.getDsn = function() {
                return this._dsnObject
            }, e.prototype.getStoreEndpoint = function() {
                return "" + this._getBaseUrl() + this.getStoreEndpointPath()
            }, e.prototype.getStoreEndpointWithUrlEncodedAuth = function() {
                var e, t = {
                    sentry_key: this._dsnObject.user,
                    sentry_version: "7"
                };
                return this.getStoreEndpoint() + "?" + (e = t, Object.keys(e).map((function(t) {
                    return encodeURIComponent(t) + "=" + encodeURIComponent(e[t])
                })).join("&"))
            }, e.prototype._getBaseUrl = function() {
                var e = this._dsnObject,
                    t = e.protocol ? e.protocol + ":" : "",
                    n = e.port ? ":" + e.port : "";
                return t + "//" + e.host + n
            }, e.prototype.getStoreEndpointPath = function() {
                var e = this._dsnObject;
                return (e.path ? "/" + e.path : "") + "/api/" + e.projectId + "/store/"
            }, e.prototype.getRequestHeaders = function(e, t) {
                var n = this._dsnObject,
                    r = ["Sentry sentry_version=7"];
                return r.push("sentry_client=" + e + "/" + t), r.push("sentry_key=" + n.user), n.pass && r.push("sentry_secret=" + n.pass), {
                    "Content-Type": "application/json",
                    "X-Sentry-Auth": r.join(", ")
                }
            }, e.prototype.getReportDialogEndpoint = function(e) {
                void 0 === e && (e = {});
                var t = this._dsnObject,
                    n = this._getBaseUrl() + (t.path ? "/" + t.path : "") + "/api/embed/error-page/",
                    r = [];
                for (var i in r.push("dsn=" + t.toString()), e)
                    if ("user" === i) {
                        if (!e.user) continue;
                        e.user.name && r.push("name=" + encodeURIComponent(e.user.name)), e.user.email && r.push("email=" + encodeURIComponent(e.user.email))
                    } else r.push(encodeURIComponent(i) + "=" + encodeURIComponent(e[i]));
                return r.length ? n + "?" + r.join("&") : n
            }, e
        }(),
        sp = [];

    function cp(e) {
        var t = {};
        return function(e) {
            var t = e.defaultIntegrations && Nc(e.defaultIntegrations) || [],
                n = e.integrations,
                r = [];
            if (Array.isArray(n)) {
                var i = n.map((function(e) {
                        return e.name
                    })),
                    o = [];
                t.forEach((function(e) {
                    -1 === i.indexOf(e.name) && -1 === o.indexOf(e.name) && (r.push(e), o.push(e.name))
                })), n.forEach((function(e) {
                    -1 === o.indexOf(e.name) && (r.push(e), o.push(e.name))
                }))
            } else "function" == typeof n ? (r = n(t), r = Array.isArray(r) ? r : [r]) : r = Nc(t);
            var a = r.map((function(e) {
                return e.name
            }));
            return -1 !== a.indexOf("Debug") && r.push.apply(r, Nc(r.splice(a.indexOf("Debug"), 1))), r
        }(e).forEach((function(e) {
            t[e.name] = e,
                function(e) {
                    -1 === sp.indexOf(e.name) && (e.setupOnce(Kh, Zh), sp.push(e.name), Gf.log("Integration installed: " + e.name))
                }(e)
        })), t
    }
    var up, lp = function() {
            function e(e, t) {
                this._integrations = {}, this._processing = !1, this._backend = new e(t), this._options = t, t.dsn && (this._dsn = new Yh(t.dsn))
            }
            return e.prototype.captureException = function(e, t, n) {
                var r = this,
                    i = t && t.event_id;
                return this._processing = !0, this._getBackend().eventFromException(e, t).then((function(e) {
                    return r._processEvent(e, t, n)
                })).then((function(e) {
                    i = e && e.event_id, r._processing = !1
                })).then(null, (function(e) {
                    Gf.error(e), r._processing = !1
                })), i
            }, e.prototype.captureMessage = function(e, t, n, r) {
                var i = this,
                    o = n && n.event_id;
                return this._processing = !0, (Yc(e) ? this._getBackend().eventFromMessage("" + e, t, n) : this._getBackend().eventFromException(e, n)).then((function(e) {
                    return i._processEvent(e, n, r)
                })).then((function(e) {
                    o = e && e.event_id, i._processing = !1
                })).then(null, (function(e) {
                    Gf.error(e), i._processing = !1
                })), o
            }, e.prototype.captureEvent = function(e, t, n) {
                var r = this,
                    i = t && t.event_id;
                return this._processing = !0, this._processEvent(e, t, n).then((function(e) {
                    i = e && e.event_id, r._processing = !1
                })).then(null, (function(e) {
                    Gf.error(e), r._processing = !1
                })), i
            }, e.prototype.getDsn = function() {
                return this._dsn
            }, e.prototype.getOptions = function() {
                return this._options
            }, e.prototype.flush = function(e) {
                var t = this;
                return this._isClientProcessing(e).then((function(n) {
                    return clearInterval(n.interval), t._getBackend().getTransport().close(e).then((function(e) {
                        return n.ready && e
                    }))
                }))
            }, e.prototype.close = function(e) {
                var t = this;
                return this.flush(e).then((function(e) {
                    return t.getOptions().enabled = !1, e
                }))
            }, e.prototype.setupIntegrations = function() {
                this._isEnabled() && (this._integrations = cp(this._options))
            }, e.prototype.getIntegration = function(e) {
                try {
                    return this._integrations[e.id] || null
                } catch (t) {
                    return Gf.warn("Cannot retrieve integration " + e.id + " from the current Client"), null
                }
            }, e.prototype._isClientProcessing = function(e) {
                var t = this;
                return new Sh((function(n) {
                    var r = 0,
                        i = 0;
                    clearInterval(i), i = setInterval((function() {
                        t._processing ? (r += 1, e && r >= e && n({
                            interval: i,
                            ready: !1
                        })) : n({
                            interval: i,
                            ready: !0
                        })
                    }), 1)
                }))
            }, e.prototype._getBackend = function() {
                return this._backend
            }, e.prototype._isEnabled = function() {
                return !1 !== this.getOptions().enabled && void 0 !== this._dsn
            }, e.prototype._prepareEvent = function(e, t, n) {
                var r = this,
                    i = this.getOptions(),
                    o = i.environment,
                    a = i.release,
                    s = i.dist,
                    c = i.maxValueLength,
                    u = void 0 === c ? 250 : c,
                    l = i.normalizeDepth,
                    f = void 0 === l ? 3 : l,
                    h = Rc({}, e);
                void 0 === h.environment && void 0 !== o && (h.environment = o), void 0 === h.release && void 0 !== a && (h.release = a), void 0 === h.dist && void 0 !== s && (h.dist = s), h.message && (h.message = Sf(h.message, u));
                var p = h.exception && h.exception.values && h.exception.values[0];
                p && p.value && (p.value = Sf(p.value, u));
                var d = h.request;
                d && d.url && (d.url = Sf(d.url, u)), void 0 === h.event_id && (h.event_id = n && n.event_id ? n.event_id : If()), this._addIntegrations(h.sdk);
                var g = Sh.resolve(h);
                return t && (g = t.applyToEvent(h, n)), g.then((function(e) {
                    return "number" == typeof f && f > 0 ? r._normalizeEvent(e, f) : e
                }))
            }, e.prototype._normalizeEvent = function(e, t) {
                return e ? Rc({}, e, e.breadcrumbs && {
                    breadcrumbs: e.breadcrumbs.map((function(e) {
                        return Rc({}, e, e.data && {
                            data: mh(e.data, t)
                        })
                    }))
                }, e.user && {
                    user: mh(e.user, t)
                }, e.contexts && {
                    contexts: mh(e.contexts, t)
                }, e.extra && {
                    extra: mh(e.extra, t)
                }) : null
            }, e.prototype._addIntegrations = function(e) {
                var t = Object.keys(this._integrations);
                e && t.length > 0 && (e.integrations = t)
            }, e.prototype._processEvent = function(e, t, n) {
                var r = this,
                    i = this.getOptions(),
                    o = i.beforeSend,
                    a = i.sampleRate;
                return this._isEnabled() ? "number" == typeof a && Math.random() > a ? Sh.reject("This event has been sampled, will not send event.") : new Sh((function(i, a) {
                    r._prepareEvent(e, n, t).then((function(e) {
                        if (null !== e) {
                            var n = e;
                            if (t && t.data && !0 === t.data.__sentry__ || !o) return r._getBackend().sendEvent(n), void i(n);
                            var s = o(e, t);
                            if (void 0 === s) Gf.error("`beforeSend` method has to return `null` or a valid event.");
                            else if (Xc(s)) r._handleAsyncBeforeSend(s, i, a);
                            else {
                                if (null === (n = s)) return Gf.log("`beforeSend` returned `null`, will not send event."), void i(null);
                                r._getBackend().sendEvent(n), i(n)
                            }
                        } else a("An event processor returned null, will not send event.")
                    })).then(null, (function(e) {
                        r.captureException(e, {
                            data: {
                                __sentry__: !0
                            },
                            originalException: e
                        }), a("Event processing pipeline threw an error, original event will not be sent. Details have been sent as a new event.\nReason: " + e)
                    }))
                })) : Sh.reject("SDK not enabled, will not send event.")
            }, e.prototype._handleAsyncBeforeSend = function(e, t, n) {
                var r = this;
                e.then((function(e) {
                    null !== e ? (r._getBackend().sendEvent(e), t(e)) : n("`beforeSend` returned `null`, will not send event.")
                })).then(null, (function(e) {
                    n("beforeSend rejected with " + e)
                }))
            }, e
        }(),
        fp = function() {
            function e() {}
            return e.prototype.sendEvent = function(e) {
                return Sh.resolve({
                    reason: "NoopTransport: Event has been skipped because no Dsn is configured.",
                    status: Cc.Skipped
                })
            }, e.prototype.close = function(e) {
                return Sh.resolve(!0)
            }, e
        }(),
        hp = function() {
            function e(e) {
                this._options = e, this._options.dsn || Gf.warn("No DSN provided, backend will not do anything."), this._transport = this._setupTransport()
            }
            return e.prototype._setupTransport = function() {
                return new fp
            }, e.prototype.eventFromException = function(e, t) {
                throw new qc("Backend has to implement `eventFromException` method")
            }, e.prototype.eventFromMessage = function(e, t, n) {
                throw new qc("Backend has to implement `eventFromMessage` method")
            }, e.prototype.sendEvent = function(e) {
                this._transport.sendEvent(e).then(null, (function(e) {
                    Gf.error("Error while sending event: " + e)
                }))
            }, e.prototype.getTransport = function() {
                return this._transport
            }, e
        }();
    var pp = function() {
            function e() {
                this.name = e.id
            }
            return e.prototype.setupOnce = function() {
                up = Function.prototype.toString, Function.prototype.toString = function() {
                    for (var e = [], t = 0; t < arguments.length; t++) e[t] = arguments[t];
                    var n = this.__sentry_original__ || this;
                    return up.apply(n, e)
                }
            }, e.id = "FunctionToString", e
        }(),
        dp = We.some,
        gp = ze("some"),
        vp = Ke("some");
    Pe({
        target: "Array",
        proto: !0,
        forced: !gp || !vp
    }, {
        some: function(e) {
            return dp(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var mp = [/^Script error\.?$/, /^Javascript error: Script error\.? on line 0$/],
        yp = function() {
            function e(t) {
                void 0 === t && (t = {}), this._options = t, this.name = e.id
            }
            return e.prototype.setupOnce = function() {
                Kh((function(t) {
                    var n = Zh();
                    if (!n) return t;
                    var r = n.getIntegration(e);
                    if (r) {
                        var i = n.getClient(),
                            o = i ? i.getOptions() : {},
                            a = r._mergeOptions(o);
                        if (r._shouldDropEvent(t, a)) return null
                    }
                    return t
                }))
            }, e.prototype._shouldDropEvent = function(e, t) {
                return this._isSentryError(e, t) ? (Gf.warn("Event dropped due to being internal Sentry Error.\nEvent: " + Cf(e)), !0) : this._isIgnoredError(e, t) ? (Gf.warn("Event dropped due to being matched by `ignoreErrors` option.\nEvent: " + Cf(e)), !0) : this._isBlacklistedUrl(e, t) ? (Gf.warn("Event dropped due to being matched by `blacklistUrls` option.\nEvent: " + Cf(e) + ".\nUrl: " + this._getEventFilterUrl(e)), !0) : !this._isWhitelistedUrl(e, t) && (Gf.warn("Event dropped due to not being matched by `whitelistUrls` option.\nEvent: " + Cf(e) + ".\nUrl: " + this._getEventFilterUrl(e)), !0)
            }, e.prototype._isSentryError = function(e, t) {
                if (void 0 === t && (t = {}), !t.ignoreInternal) return !1;
                try {
                    return e && e.exception && e.exception.values && e.exception.values[0] && "SentryError" === e.exception.values[0].type || !1
                } catch (e) {
                    return !1
                }
            }, e.prototype._isIgnoredError = function(e, t) {
                return void 0 === t && (t = {}), !(!t.ignoreErrors || !t.ignoreErrors.length) && this._getPossibleEventMessages(e).some((function(e) {
                    return t.ignoreErrors.some((function(t) {
                        return xf(e, t)
                    }))
                }))
            }, e.prototype._isBlacklistedUrl = function(e, t) {
                if (void 0 === t && (t = {}), !t.blacklistUrls || !t.blacklistUrls.length) return !1;
                var n = this._getEventFilterUrl(e);
                return !!n && t.blacklistUrls.some((function(e) {
                    return xf(n, e)
                }))
            }, e.prototype._isWhitelistedUrl = function(e, t) {
                if (void 0 === t && (t = {}), !t.whitelistUrls || !t.whitelistUrls.length) return !0;
                var n = this._getEventFilterUrl(e);
                return !n || t.whitelistUrls.some((function(e) {
                    return xf(n, e)
                }))
            }, e.prototype._mergeOptions = function(e) {
                return void 0 === e && (e = {}), {
                    blacklistUrls: Nc(this._options.blacklistUrls || [], e.blacklistUrls || []),
                    ignoreErrors: Nc(this._options.ignoreErrors || [], e.ignoreErrors || [], mp),
                    ignoreInternal: void 0 === this._options.ignoreInternal || this._options.ignoreInternal,
                    whitelistUrls: Nc(this._options.whitelistUrls || [], e.whitelistUrls || [])
                }
            }, e.prototype._getPossibleEventMessages = function(e) {
                if (e.message) return [e.message];
                if (e.exception) try {
                    var t = e.exception.values && e.exception.values[0] || {},
                        n = t.type,
                        r = void 0 === n ? "" : n,
                        i = t.value,
                        o = void 0 === i ? "" : i;
                    return ["" + o, r + ": " + o]
                } catch (t) {
                    return Gf.error("Cannot extract message for event " + Cf(e)), []
                }
                return []
            }, e.prototype._getEventFilterUrl = function(e) {
                try {
                    if (e.stacktrace) {
                        var t = e.stacktrace.frames;
                        return t && t[t.length - 1].filename || null
                    }
                    if (e.exception) {
                        var n = e.exception.values && e.exception.values[0].stacktrace && e.exception.values[0].stacktrace.frames;
                        return n && n[n.length - 1].filename || null
                    }
                    return null
                } catch (t) {
                    return Gf.error("Cannot extract url for event " + Cf(e)), null
                }
            }, e.id = "InboundFilters", e
        }(),
        bp = /^\s*at (?:(.*?) ?\()?((?:file|https?|blob|chrome-extension|address|native|eval|webpack|<anonymous>|[-a-z]+:|.*bundle|\/).*?)(?::(\d+))?(?::(\d+))?\)?\s*$/i,
        wp = /^\s*(.*?)(?:\((.*?)\))?(?:^|@)?((?:file|https?|blob|chrome|webpack|resource|moz-extension).*?:\/.*?|\[native code\]|[^@]*(?:bundle|\d+\.js))(?::(\d+))?(?::(\d+))?\s*$/i,
        _p = /^\s*at (?:((?:\[object object\])?.+) )?\(?((?:file|ms-appx|https?|webpack|blob):.*?):(\d+)(?::(\d+))?\)?\s*$/i,
        Ep = /(\S+) line (\d+)(?: > eval line \d+)* > eval/i,
        kp = /\((\S*)(?::(\d+))(?::(\d+))\)/;

    function Sp(e) {
        var t = null,
            n = e && e.framesToPop;
        try {
            if (t = function(e) {
                    if (!e || !e.stacktrace) return null;
                    for (var t, n = e.stacktrace, r = / line (\d+).*script (?:in )?(\S+)(?:: in function (\S+))?$/i, i = / line (\d+), column (\d+)\s*(?:in (?:<anonymous function: ([^>]+)>|([^\)]+))\((.*)\))? in (.*):\s*$/i, o = n.split("\n"), a = [], s = 0; s < o.length; s += 2) {
                        var c = null;
                        (t = r.exec(o[s])) ? c = {
                            url: t[2],
                            func: t[3],
                            args: [],
                            line: +t[1],
                            column: null
                        }: (t = i.exec(o[s])) && (c = {
                            url: t[6],
                            func: t[3] || t[4],
                            args: t[5] ? t[5].split(",") : [],
                            line: +t[1],
                            column: +t[2]
                        }), c && (!c.func && c.line && (c.func = "?"), a.push(c))
                    }
                    if (!a.length) return null;
                    return {
                        message: xp(e),
                        name: e.name,
                        stack: a
                    }
                }(e)) return Tp(t, n)
        } catch (e) {}
        try {
            if (t = function(e) {
                    if (!e || !e.stack) return null;
                    for (var t, n, r, i = [], o = e.stack.split("\n"), a = 0; a < o.length; ++a) {
                        if (n = bp.exec(o[a])) {
                            var s = n[2] && 0 === n[2].indexOf("native");
                            n[2] && 0 === n[2].indexOf("eval") && (t = kp.exec(n[2])) && (n[2] = t[1], n[3] = t[2], n[4] = t[3]), r = {
                                url: n[2] && 0 === n[2].indexOf("address at ") ? n[2].substr("address at ".length) : n[2],
                                func: n[1] || "?",
                                args: s ? [n[2]] : [],
                                line: n[3] ? +n[3] : null,
                                column: n[4] ? +n[4] : null
                            }
                        } else if (n = _p.exec(o[a])) r = {
                            url: n[2],
                            func: n[1] || "?",
                            args: [],
                            line: +n[3],
                            column: n[4] ? +n[4] : null
                        };
                        else {
                            if (!(n = wp.exec(o[a]))) continue;
                            n[3] && n[3].indexOf(" > eval") > -1 && (t = Ep.exec(n[3])) ? (n[1] = n[1] || "eval", n[3] = t[1], n[4] = t[2], n[5] = "") : 0 !== a || n[5] || void 0 === e.columnNumber || (i[0].column = e.columnNumber + 1), r = {
                                url: n[3],
                                func: n[1] || "?",
                                args: n[2] ? n[2].split(",") : [],
                                line: n[4] ? +n[4] : null,
                                column: n[5] ? +n[5] : null
                            }
                        }!r.func && r.line && (r.func = "?"), i.push(r)
                    }
                    if (!i.length) return null;
                    return {
                        message: xp(e),
                        name: e.name,
                        stack: i
                    }
                }(e)) return Tp(t, n)
        } catch (e) {}
        return {
            message: xp(e),
            name: e && e.name,
            stack: [],
            failed: !0
        }
    }

    function Tp(e, t) {
        try {
            return Rc({}, e, {
                stack: e.stack.slice(t)
            })
        } catch (t) {
            return e
        }
    }

    function xp(e) {
        var t = e && e.message;
        return t ? t.error && "string" == typeof t.error.message ? t.error.message : t : "No error message"
    }

    function Ap(e) {
        var t = Pp(e.stack),
            n = {
                type: e.name,
                value: e.message
            };
        return t && t.length && (n.stacktrace = {
            frames: t
        }), void 0 === n.type && "" === n.value && (n.value = "Unrecoverable error caught"), n
    }

    function Op(e) {
        return {
            exception: {
                values: [Ap(e)]
            }
        }
    }

    function Pp(e) {
        if (!e || !e.length) return [];
        var t = e,
            n = t[0].func || "",
            r = t[t.length - 1].func || "";
        return -1 === n.indexOf("captureMessage") && -1 === n.indexOf("captureException") || (t = t.slice(1)), -1 !== r.indexOf("sentryWrapped") && (t = t.slice(0, -1)), t.map((function(e) {
            return {
                colno: null === e.column ? void 0 : e.column,
                filename: e.url || t[0].url,
                function: e.func || "?",
                in_app: !0,
                lineno: null === e.line ? void 0 : e.line
            }
        })).slice(0, 50).reverse()
    }

    function Ip(e, t, n) {
        var r, i;
        if (void 0 === n && (n = {}), Vc(e) && e.error) return r = Op(Sp(e = e.error));
        if (Wc(e) || (i = e, "[object DOMException]" === Object.prototype.toString.call(i))) {
            var o = e,
                a = o.name || (Wc(o) ? "DOMError" : "DOMException"),
                s = o.message ? a + ": " + o.message : a;
            return Lf(r = jp(s, t, n), s), r
        }
        return Hc(e) ? r = Op(Sp(e)) : $c(e) || Gc(e) ? (Nf(r = function(e, t, n) {
            var r = {
                exception: {
                    values: [{
                        type: Gc(e) ? e.constructor.name : n ? "UnhandledRejection" : "Error",
                        value: "Non-Error " + (n ? "promise rejection" : "exception") + " captured with keys: " + yh(e)
                    }]
                },
                extra: {
                    __serialized__: dh(e)
                }
            };
            if (t) {
                var i = Pp(Sp(t).stack);
                r.stacktrace = {
                    frames: i
                }
            }
            return r
        }(e, t, n.rejection), {
            synthetic: !0
        }), r) : (Lf(r = jp(e, t, n), "" + e, void 0), Nf(r, {
            synthetic: !0
        }), r)
    }

    function jp(e, t, n) {
        void 0 === n && (n = {});
        var r = {
            message: e
        };
        if (n.attachStacktrace && t) {
            var i = Pp(Sp(t).stack);
            r.stacktrace = {
                frames: i
            }
        }
        return r
    }
    var Cp = function() {
            function e(e) {
                this.options = e, this._buffer = new Th(30), this.url = new ap(this.options.dsn).getStoreEndpointWithUrlEncodedAuth()
            }
            return e.prototype.sendEvent = function(e) {
                throw new qc("Transport Class has to implement `sendEvent` method")
            }, e.prototype.close = function(e) {
                return this._buffer.drain(e)
            }, e
        }(),
        Rp = Pf(),
        Lp = function(e) {
            function t() {
                var t = null !== e && e.apply(this, arguments) || this;
                return t._disabledUntil = new Date(Date.now()), t
            }
            return Ic(t, e), t.prototype.sendEvent = function(e) {
                var t = this;
                if (new Date(Date.now()) < this._disabledUntil) return Promise.reject({
                    event: e,
                    reason: "Transport locked till " + this._disabledUntil + " due to too many requests.",
                    status: 429
                });
                var n = {
                    body: JSON.stringify(e),
                    method: "POST",
                    referrerPolicy: Oh() ? "origin" : ""
                };
                return void 0 !== this.options.headers && (n.headers = this.options.headers), this._buffer.add(new Sh((function(e, r) {
                    Rp.fetch(t.url, n).then((function(n) {
                        var i = Cc.fromHttpCode(n.status);
                        if (i !== Cc.Success) {
                            if (i === Cc.RateLimit) {
                                var o = Date.now();
                                t._disabledUntil = new Date(o + Vf(o, n.headers.get("Retry-After"))), Gf.warn("Too many requests, backing off till: " + t._disabledUntil)
                            }
                            r(n)
                        } else e({
                            status: i
                        })
                    })).catch(r)
                })))
            }, t
        }(Cp),
        Np = function(e) {
            function t() {
                var t = null !== e && e.apply(this, arguments) || this;
                return t._disabledUntil = new Date(Date.now()), t
            }
            return Ic(t, e), t.prototype.sendEvent = function(e) {
                var t = this;
                return new Date(Date.now()) < this._disabledUntil ? Promise.reject({
                    event: e,
                    reason: "Transport locked till " + this._disabledUntil + " due to too many requests.",
                    status: 429
                }) : this._buffer.add(new Sh((function(n, r) {
                    var i = new XMLHttpRequest;
                    for (var o in i.onreadystatechange = function() {
                            if (4 === i.readyState) {
                                var e = Cc.fromHttpCode(i.status);
                                if (e !== Cc.Success) {
                                    if (e === Cc.RateLimit) {
                                        var o = Date.now();
                                        t._disabledUntil = new Date(o + Vf(o, i.getResponseHeader("Retry-After"))), Gf.warn("Too many requests, backing off till: " + t._disabledUntil)
                                    }
                                    r(i)
                                } else n({
                                    status: e
                                })
                            }
                        }, i.open("POST", t.url), t.options.headers) t.options.headers.hasOwnProperty(o) && i.setRequestHeader(o, t.options.headers[o]);
                    i.send(JSON.stringify(e))
                })))
            }, t
        }(Cp),
        Mp = function(e) {
            function t() {
                return null !== e && e.apply(this, arguments) || this
            }
            return Ic(t, e), t.prototype._setupTransport = function() {
                if (!this._options.dsn) return e.prototype._setupTransport.call(this);
                var t = Rc({}, this._options.transportOptions, {
                    dsn: this._options.dsn
                });
                return this._options.transport ? new this._options.transport(t) : xh() ? new Lp(t) : new Np(t)
            }, t.prototype.eventFromException = function(e, t) {
                var n = Ip(e, t && t.syntheticException || void 0, {
                    attachStacktrace: this._options.attachStacktrace
                });
                return Nf(n, {
                    handled: !0,
                    type: "generic"
                }), n.level = jc.Error, t && t.event_id && (n.event_id = t.event_id), Sh.resolve(n)
            }, t.prototype.eventFromMessage = function(e, t, n) {
                void 0 === t && (t = jc.Info);
                var r = jp(e, n && n.syntheticException || void 0, {
                    attachStacktrace: this._options.attachStacktrace
                });
                return r.level = t, n && n.event_id && (r.event_id = n.event_id), Sh.resolve(r)
            }, t
        }(hp),
        Up = function(e) {
            function t(t) {
                return void 0 === t && (t = {}), e.call(this, Mp, t) || this
            }
            return Ic(t, e), t.prototype._prepareEvent = function(t, n, r) {
                return t.platform = t.platform || "javascript", t.sdk = Rc({}, t.sdk, {
                    name: "sentry.javascript.browser",
                    packages: Nc(t.sdk && t.sdk.packages || [], [{
                        name: "npm:@sentry/browser",
                        version: "5.15.5"
                    }]),
                    version: "5.15.5"
                }), e.prototype._prepareEvent.call(this, t, n, r)
            }, t.prototype.showReportDialog = function(e) {
                void 0 === e && (e = {});
                var t = Pf().document;
                if (t)
                    if (this._isEnabled()) {
                        var n = e.dsn || this.getDsn();
                        if (e.eventId)
                            if (n) {
                                var r = t.createElement("script");
                                r.async = !0, r.src = new ap(n).getReportDialogEndpoint(e), e.onLoad && (r.onload = e.onLoad), (t.head || t.body).appendChild(r)
                            } else Gf.error("Missing `Dsn` option in showReportDialog call");
                        else Gf.error("Missing `eventId` option in showReportDialog call")
                    } else Gf.error("Trying to call showReportDialog with Sentry Client is disabled")
            }, t
        }(lp),
        Dp = 0;

    function Fp() {
        return Dp > 0
    }

    function Bp() {
        Dp += 1, setTimeout((function() {
            Dp -= 1
        }))
    }

    function qp(e, t, n) {
        if (void 0 === t && (t = {}), "function" != typeof e) return e;
        try {
            if (e.__sentry__) return e;
            if (e.__sentry_wrapped__) return e.__sentry_wrapped__
        } catch (t) {
            return e
        }
        var r = function() {
            var r = Array.prototype.slice.call(arguments);
            try {
                n && "function" == typeof n && n.apply(this, arguments);
                var i = r.map((function(e) {
                    return qp(e, t)
                }));
                return e.handleEvent ? e.handleEvent.apply(this, i) : e.apply(this, i)
            } catch (e) {
                throw Bp(), op((function(n) {
                    n.addEventProcessor((function(e) {
                        var n = Rc({}, e);
                        return t.mechanism && (Lf(n, void 0, void 0), Nf(n, t.mechanism)), n.extra = Rc({}, n.extra, {
                            arguments: r
                        }), n
                    })), ip(e)
                })), e
            }
        };
        try {
            for (var i in e) Object.prototype.hasOwnProperty.call(e, i) && (r[i] = e[i])
        } catch (e) {}
        e.prototype = e.prototype || {}, r.prototype = e.prototype, Object.defineProperty(e, "__sentry_wrapped__", {
            enumerable: !1,
            value: r
        }), Object.defineProperties(r, {
            __sentry__: {
                enumerable: !1,
                value: !0
            },
            __sentry_original__: {
                enumerable: !1,
                value: e
            }
        });
        try {
            Object.getOwnPropertyDescriptor(r, "name").configurable && Object.defineProperty(r, "name", {
                get: function() {
                    return e.name
                }
            })
        } catch (e) {}
        return r
    }
    var Hp = function() {
            function e(t) {
                this.name = e.id, this._onErrorHandlerInstalled = !1, this._onUnhandledRejectionHandlerInstalled = !1, this._options = Rc({
                    onerror: !0,
                    onunhandledrejection: !0
                }, t)
            }
            return e.prototype.setupOnce = function() {
                Error.stackTraceLimit = 50, this._options.onerror && (Gf.log("Global Handler attached: onerror"), this._installGlobalOnErrorHandler()), this._options.onunhandledrejection && (Gf.log("Global Handler attached: onunhandledrejection"), this._installGlobalOnUnhandledRejectionHandler())
            }, e.prototype._installGlobalOnErrorHandler = function() {
                var t = this;
                this._onErrorHandlerInstalled || (Lh({
                    callback: function(n) {
                        var r = n.error,
                            i = Zh(),
                            o = i.getIntegration(e),
                            a = r && !0 === r.__sentry_own_request__;
                        if (o && !Fp() && !a) {
                            var s = i.getClient(),
                                c = Yc(r) ? t._eventFromIncompleteOnError(n.msg, n.url, n.line, n.column) : t._enhanceEventWithInitialFrame(Ip(r, void 0, {
                                    attachStacktrace: s && s.getOptions().attachStacktrace,
                                    rejection: !1
                                }), n.url, n.line, n.column);
                            Nf(c, {
                                handled: !1,
                                type: "onerror"
                            }), i.captureEvent(c, {
                                originalException: r
                            })
                        }
                    },
                    type: "error"
                }), this._onErrorHandlerInstalled = !0)
            }, e.prototype._installGlobalOnUnhandledRejectionHandler = function() {
                var t = this;
                this._onUnhandledRejectionHandlerInstalled || (Lh({
                    callback: function(n) {
                        var r = n;
                        try {
                            "reason" in n ? r = n.reason : "detail" in n && "reason" in n.detail && (r = n.detail.reason)
                        } catch (e) {}
                        var i = Zh(),
                            o = i.getIntegration(e),
                            a = r && !0 === r.__sentry_own_request__;
                        if (!o || Fp() || a) return !0;
                        var s = i.getClient(),
                            c = Yc(r) ? t._eventFromIncompleteRejection(r) : Ip(r, void 0, {
                                attachStacktrace: s && s.getOptions().attachStacktrace,
                                rejection: !0
                            });
                        c.level = jc.Error, Nf(c, {
                            handled: !1,
                            type: "onunhandledrejection"
                        }), i.captureEvent(c, {
                            originalException: r
                        })
                    },
                    type: "unhandledrejection"
                }), this._onUnhandledRejectionHandlerInstalled = !0)
            }, e.prototype._eventFromIncompleteOnError = function(e, t, n, r) {
                var i, o = Vc(e) ? e.message : e;
                if (zc(o)) {
                    var a = o.match(/^(?:[Uu]ncaught (?:exception: )?)?(?:((?:Eval|Internal|Range|Reference|Syntax|Type|URI|)Error): )?(.*)$/i);
                    a && (i = a[1], o = a[2])
                }
                var s = {
                    exception: {
                        values: [{
                            type: i || "Error",
                            value: o
                        }]
                    }
                };
                return this._enhanceEventWithInitialFrame(s, t, n, r)
            }, e.prototype._eventFromIncompleteRejection = function(e) {
                return {
                    exception: {
                        values: [{
                            type: "UnhandledRejection",
                            value: "Non-Error promise rejection captured with value: " + e
                        }]
                    }
                }
            }, e.prototype._enhanceEventWithInitialFrame = function(e, t, n, r) {
                e.exception = e.exception || {}, e.exception.values = e.exception.values || [], e.exception.values[0] = e.exception.values[0] || {}, e.exception.values[0].stacktrace = e.exception.values[0].stacktrace || {}, e.exception.values[0].stacktrace.frames = e.exception.values[0].stacktrace.frames || [];
                var i = isNaN(parseInt(r, 10)) ? void 0 : r,
                    o = isNaN(parseInt(n, 10)) ? void 0 : n,
                    a = zc(t) && t.length > 0 ? t : function() {
                        try {
                            return document.location.href
                        } catch (e) {
                            return ""
                        }
                    }();
                return 0 === e.exception.values[0].stacktrace.frames.length && e.exception.values[0].stacktrace.frames.push({
                    colno: i,
                    filename: a,
                    function: "?",
                    in_app: !0,
                    lineno: o
                }), e
            }, e.id = "GlobalHandlers", e
        }(),
        Vp = function() {
            function e() {
                this._ignoreOnError = 0, this.name = e.id
            }
            return e.prototype._wrapTimeFunction = function(e) {
                return function() {
                    for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                    var r = t[0];
                    return t[0] = qp(r, {
                        mechanism: {
                            data: {
                                function: Wf(e)
                            },
                            handled: !0,
                            type: "instrument"
                        }
                    }), e.apply(this, t)
                }
            }, e.prototype._wrapRAF = function(e) {
                return function(t) {
                    return e(qp(t, {
                        mechanism: {
                            data: {
                                function: "requestAnimationFrame",
                                handler: Wf(e)
                            },
                            handled: !0,
                            type: "instrument"
                        }
                    }))
                }
            }, e.prototype._wrapEventTarget = function(e) {
                var t = Pf(),
                    n = t[e] && t[e].prototype;
                n && n.hasOwnProperty && n.hasOwnProperty("addEventListener") && (fh(n, "addEventListener", (function(t) {
                    return function(n, r, i) {
                        try {
                            "function" == typeof r.handleEvent && (r.handleEvent = qp(r.handleEvent.bind(r), {
                                mechanism: {
                                    data: {
                                        function: "handleEvent",
                                        handler: Wf(r),
                                        target: e
                                    },
                                    handled: !0,
                                    type: "instrument"
                                }
                            }))
                        } catch (e) {}
                        return t.call(this, n, qp(r, {
                            mechanism: {
                                data: {
                                    function: "addEventListener",
                                    handler: Wf(r),
                                    target: e
                                },
                                handled: !0,
                                type: "instrument"
                            }
                        }), i)
                    }
                })), fh(n, "removeEventListener", (function(e) {
                    return function(t, n, r) {
                        var i = n;
                        try {
                            i = i && (i.__sentry_wrapped__ || i)
                        } catch (e) {}
                        return e.call(this, t, i, r)
                    }
                })))
            }, e.prototype._wrapXHR = function(e) {
                return function() {
                    for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                    var r = this,
                        i = ["onload", "onerror", "onprogress", "onreadystatechange"];
                    return i.forEach((function(e) {
                        e in r && "function" == typeof r[e] && fh(r, e, (function(t) {
                            var n = {
                                mechanism: {
                                    data: {
                                        function: e,
                                        handler: Wf(t)
                                    },
                                    handled: !0,
                                    type: "instrument"
                                }
                            };
                            return t.__sentry_original__ && (n.mechanism.data.handler = Wf(t.__sentry_original__)), qp(t, n)
                        }))
                    })), e.apply(this, t)
                }
            }, e.prototype.setupOnce = function() {
                this._ignoreOnError = this._ignoreOnError;
                var e = Pf();
                fh(e, "setTimeout", this._wrapTimeFunction.bind(this)), fh(e, "setInterval", this._wrapTimeFunction.bind(this)), fh(e, "requestAnimationFrame", this._wrapRAF.bind(this)), "XMLHttpRequest" in e && fh(XMLHttpRequest.prototype, "send", this._wrapXHR.bind(this)), ["EventTarget", "Window", "Node", "ApplicationCache", "AudioTrackList", "ChannelMergerNode", "CryptoOperation", "EventSource", "FileReader", "HTMLUnknownElement", "IDBDatabase", "IDBRequest", "IDBTransaction", "KeyOperation", "MediaController", "MessagePort", "ModalWindow", "Notification", "SVGElementInstance", "Screen", "TextTrack", "TextTrackCue", "TextTrackList", "WebSocket", "WebSocketWorker", "Worker", "XMLHttpRequest", "XMLHttpRequestEventTarget", "XMLHttpRequestUpload"].forEach(this._wrapEventTarget.bind(this))
            }, e.id = "TryCatch", e
        }(),
        Wp = function() {
            function e(t) {
                this.name = e.id, this._options = Rc({
                    console: !0,
                    dom: !0,
                    fetch: !0,
                    history: !0,
                    sentry: !0,
                    xhr: !0
                }, t)
            }
            return e.prototype._consoleBreadcrumb = function(e) {
                var t = {
                    category: "console",
                    data: {
                        arguments: e.args,
                        logger: "console"
                    },
                    level: jc.fromString(e.level),
                    message: Tf(e.args, " ")
                };
                if ("assert" === e.level) {
                    if (!1 !== e.args[0]) return;
                    t.message = "Assertion failed: " + (Tf(e.args.slice(1), " ") || "console.assert"), t.data.arguments = e.args.slice(1)
                }
                Zh().addBreadcrumb(t, {
                    input: e.args,
                    level: e.level
                })
            }, e.prototype._domBreadcrumb = function(e) {
                var t;
                try {
                    t = e.event.target ? Mf(e.event.target) : Mf(e.event)
                } catch (e) {
                    t = "<unknown>"
                }
                0 !== t.length && Zh().addBreadcrumb({
                    category: "ui." + e.name,
                    message: t
                }, {
                    event: e.event,
                    name: e.name
                })
            }, e.prototype._xhrBreadcrumb = function(e) {
                if (e.endTimestamp) {
                    if (e.xhr.__sentry_own_request__) return;
                    Zh().addBreadcrumb({
                        category: "xhr",
                        data: e.xhr.__sentry_xhr__,
                        type: "http"
                    }, {
                        xhr: e.xhr
                    })
                } else this._options.sentry && e.xhr.__sentry_own_request__ && zp(e.args[0])
            }, e.prototype._fetchBreadcrumb = function(e) {
                if (e.endTimestamp) {
                    var t = Zh().getClient(),
                        n = t && t.getDsn();
                    if (this._options.sentry && n) {
                        var r = new ap(n).getStoreEndpoint();
                        if (r && -1 !== e.fetchData.url.indexOf(r) && "POST" === e.fetchData.method && e.args[1] && e.args[1].body) return void zp(e.args[1].body)
                    }
                    e.error ? Zh().addBreadcrumb({
                        category: "fetch",
                        data: Rc({}, e.fetchData, {
                            status_code: e.response.status
                        }),
                        level: jc.Error,
                        type: "http"
                    }, {
                        data: e.error,
                        input: e.args
                    }) : Zh().addBreadcrumb({
                        category: "fetch",
                        data: Rc({}, e.fetchData, {
                            status_code: e.response.status
                        }),
                        type: "http"
                    }, {
                        input: e.args,
                        response: e.response
                    })
                }
            }, e.prototype._historyBreadcrumb = function(e) {
                var t = Pf(),
                    n = e.from,
                    r = e.to,
                    i = jf(t.location.href),
                    o = jf(n),
                    a = jf(r);
                o.path || (o = i), i.protocol === a.protocol && i.host === a.host && (r = a.relative), i.protocol === o.protocol && i.host === o.host && (n = o.relative), Zh().addBreadcrumb({
                    category: "navigation",
                    data: {
                        from: n,
                        to: r
                    }
                })
            }, e.prototype.setupOnce = function() {
                var e = this;
                this._options.console && Lh({
                    callback: function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        e._consoleBreadcrumb.apply(e, Nc(t))
                    },
                    type: "console"
                }), this._options.dom && Lh({
                    callback: function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        e._domBreadcrumb.apply(e, Nc(t))
                    },
                    type: "dom"
                }), this._options.xhr && Lh({
                    callback: function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        e._xhrBreadcrumb.apply(e, Nc(t))
                    },
                    type: "xhr"
                }), this._options.fetch && Lh({
                    callback: function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        e._fetchBreadcrumb.apply(e, Nc(t))
                    },
                    type: "fetch"
                }), this._options.history && Lh({
                    callback: function() {
                        for (var t = [], n = 0; n < arguments.length; n++) t[n] = arguments[n];
                        e._historyBreadcrumb.apply(e, Nc(t))
                    },
                    type: "history"
                })
            }, e.id = "Breadcrumbs", e
        }();

    function zp(e) {
        try {
            var t = JSON.parse(e);
            Zh().addBreadcrumb({
                category: "sentry." + ("transaction" === t.type ? "transaction" : "event"),
                event_id: t.event_id,
                level: t.level || jc.fromString("error"),
                message: Cf(t)
            }, {
                event: t
            })
        } catch (e) {
            Gf.error("Error while adding sentry type breadcrumb")
        }
    }
    var Yp = function() {
            function e(t) {
                void 0 === t && (t = {}), this.name = e.id, this._key = t.key || "cause", this._limit = t.limit || 5
            }
            return e.prototype.setupOnce = function() {
                Kh((function(t, n) {
                    var r = Zh().getIntegration(e);
                    return r ? r._handler(t, n) : t
                }))
            }, e.prototype._handler = function(e, t) {
                if (!(e.exception && e.exception.values && t && Jc(t.originalException, Error))) return e;
                var n = this._walkErrorTree(t.originalException, this._key);
                return e.exception.values = Nc(n, e.exception.values), e
            }, e.prototype._walkErrorTree = function(e, t, n) {
                if (void 0 === n && (n = []), !Jc(e[t], Error) || n.length + 1 >= this._limit) return n;
                var r = Ap(Sp(e[t]));
                return this._walkErrorTree(e[t], t, Nc([r], n))
            }, e.id = "LinkedErrors", e
        }(),
        $p = Pf(),
        Gp = function() {
            function e() {
                this.name = e.id
            }
            return e.prototype.setupOnce = function() {
                Kh((function(t) {
                    if (Zh().getIntegration(e)) {
                        if (!$p.navigator || !$p.location) return t;
                        var n = t.request || {};
                        return n.url = n.url || $p.location.href, n.headers = n.headers || {}, n.headers["User-Agent"] = $p.navigator.userAgent, Rc({}, t, {
                            request: n
                        })
                    }
                    return t
                }))
            }, e.id = "UserAgent", e
        }(),
        Kp = [new yp, new pp, new Vp, new Wp, new Hp, new Yp, new Gp];

    function Xp(e) {
        if (void 0 === e && (e = {}), void 0 === e.defaultIntegrations && (e.defaultIntegrations = Kp), void 0 === e.release) {
            var t = Pf();
            t.SENTRY_RELEASE && t.SENTRY_RELEASE.id && (e.release = t.SENTRY_RELEASE.id)
        }! function(e, t) {
            !0 === t.debug && Gf.enable();
            var n = Zh(),
                r = new e(t);
            n.bindClient(r)
        }(Up, e)
    }
    var Jp = We.find,
        Qp = !0,
        Zp = Ke("find");
    "find" in [] && Array(1).find((function() {
        Qp = !1
    })), Pe({
        target: "Array",
        proto: !0,
        forced: Qp || !Zp
    }, {
        find: function(e) {
            return Jp(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    }), jt("find");
    var ed = "[\t\n\v\f\r                　\u2028\u2029\ufeff]",
        td = RegExp("^" + ed + ed + "*"),
        nd = RegExp(ed + ed + "*$"),
        rd = function(e) {
            return function(t) {
                var n = String(d(t));
                return 1 & e && (n = n.replace(td, "")), 2 & e && (n = n.replace(nd, "")), n
            }
        },
        id = {
            start: rd(1),
            end: rd(2),
            trim: rd(3)
        },
        od = me.f,
        ad = T.f,
        sd = O.f,
        cd = id.trim,
        ud = r.Number,
        ld = ud.prototype,
        fd = "Number" == f(Ot(ld)),
        hd = function(e) {
            var t, n, r, i, o, a, s, c, u = m(e, !1);
            if ("string" == typeof u && u.length > 2)
                if (43 === (t = (u = cd(u)).charCodeAt(0)) || 45 === t) {
                    if (88 === (n = u.charCodeAt(2)) || 120 === n) return NaN
                } else if (48 === t) {
                switch (u.charCodeAt(1)) {
                    case 66:
                    case 98:
                        r = 2, i = 49;
                        break;
                    case 79:
                    case 111:
                        r = 8, i = 55;
                        break;
                    default:
                        return +u
                }
                for (a = (o = u.slice(2)).length, s = 0; s < a; s++)
                    if ((c = o.charCodeAt(s)) < 48 || c > i) return NaN;
                return parseInt(o, r)
            }
            return +u
        };
    if (Ae("Number", !ud(" 0o1") || !ud("0b1") || ud("+0x1"))) {
        for (var pd, dd = function(e) {
                var t = arguments.length < 1 ? 0 : e,
                    n = this;
                return n instanceof dd && (fd ? i((function() {
                    ld.valueOf.call(n)
                })) : "Number" != f(n)) ? Gt(new ud(hd(t)), n, dd) : hd(t)
            }, gd = o ? od(ud) : "MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger".split(","), vd = 0; gd.length > vd; vd++) b(ud, pd = gd[vd]) && !b(dd, pd) && sd(dd, pd, ad(ud, pd));
        dd.prototype = ld, ld.constructor = dd, Z(r, "Number", dd)
    }
    Pe({
        target: "Number",
        stat: !0
    }, {
        isNaN: function(e) {
            return e != e
        }
    });
    var md = c.f,
        yd = function(e) {
            return function(t) {
                for (var n, r = g(t), i = _t(r), a = i.length, s = 0, c = []; a > s;) n = i[s++], o && !md.call(r, n) || c.push(e ? [n, r[n]] : r[n]);
                return c
            }
        },
        bd = {
            entries: yd(!0),
            values: yd(!1)
        }.entries;

    function wd(e, t) {
        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
    }

    function _d(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
        }
    }

    function Ed(e, t, n) {
        return t && _d(e.prototype, t), n && _d(e, n), e
    }

    function kd(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function Sd(e, t) {
        return function(e) {
            if (Array.isArray(e)) return e
        }(e) || function(e, t) {
            var n = [],
                r = !0,
                i = !1,
                o = void 0;
            try {
                for (var a, s = e[Symbol.iterator](); !(r = (a = s.next()).done) && (n.push(a.value), !t || n.length !== t); r = !0);
            } catch (e) {
                i = !0, o = e
            } finally {
                try {
                    r || null == s.return || s.return()
                } finally {
                    if (i) throw o
                }
            }
            return n
        }(e, t) || function() {
            throw new TypeError("Invalid attempt to destructure non-iterable instance")
        }()
    }
    Pe({
        target: "Object",
        stat: !0
    }, {
        entries: function(e) {
            return bd(e)
        }
    });
    var Td = function(e) {
            return null != e ? e.constructor : null
        },
        xd = function(e, t) {
            return !!(e && t && e instanceof t)
        },
        Ad = function(e) {
            return null == e
        },
        Od = function(e) {
            return Td(e) === Object
        },
        Pd = function(e) {
            return Td(e) === String
        },
        Id = function(e) {
            return Array.isArray(e)
        },
        jd = function(e) {
            return xd(e, NodeList)
        },
        Cd = Ad,
        Rd = Od,
        Ld = function(e) {
            return Td(e) === Number && !Number.isNaN(e)
        },
        Nd = Pd,
        Md = function(e) {
            return Td(e) === Boolean
        },
        Ud = Id,
        Dd = jd,
        Fd = function(e) {
            return xd(e, Element)
        },
        Bd = function(e) {
            return xd(e, Event)
        },
        qd = function(e) {
            return Ad(e) || (Pd(e) || Id(e) || jd(e)) && !e.length || Od(e) && !Object.keys(e).length
        },
        Hd = {
            facebook: {
                domain: "facebook.com",
                url: function(e) {
                    return "https://graph.facebook.com/?id=".concat(e, "&fields=og_object{engagement}")
                },
                shareCount: function(e) {
                    return e.og_object.engagement.count
                },
                popup: {
                    width: 640,
                    height: 360
                }
            },
            twitter: {
                domain: "twitter.com",
                url: function() {
                    return null
                },
                shareCount: function() {
                    return null
                },
                popup: {
                    width: 640,
                    height: 240
                }
            },
            pinterest: {
                domain: "pinterest.com",
                url: function(e) {
                    return "https://widgets.pinterest.com/v1/urls/count.json?url=".concat(e)
                },
                shareCount: function(e) {
                    return e.count
                },
                popup: {
                    width: 830,
                    height: 700
                }
            },
            github: {
                domain: "github.com",
                url: function(e, t) {
                    return "https://api.github.com/repos/".concat(e).concat(Nd(t) ? "?access_token=".concat(t) : "")
                },
                shareCount: function(e) {
                    return e.data.stargazers_count
                }
            },
            youtube: {
                domain: "youtube.com",
                url: function(e, t) {
                    return "https://www.googleapis.com/youtube/v3/channels?part=statistics&id=".concat(e, "&key=").concat(t)
                },
                shareCount: function(e) {
                    if (!qd(e.error)) return null;
                    var t = Sd(e.items, 1)[0];
                    return qd(t) ? null : t.statistics.subscriberCount
                }
            }
        },
        Vd = {
            debug: !1,
            wrapper: {
                className: "shr"
            },
            count: {
                className: "shr__count",
                displayZero: !1,
                format: !0,
                position: "after",
                increment: !0
            },
            tokens: {
                github: "",
                youtube: ""
            },
            storage: {
                enabled: !0,
                key: "shr",
                ttl: 3e5
            }
        };

    function Wd(e) {
        return new Promise((function(t, n) {
            var r = "jsonp_callback_".concat(Math.round(1e5 * Math.random())),
                i = document.createElement("script");
            i.addEventListener("error", (function(e) {
                return n(e)
            })), window[r] = function(e) {
                delete window[r], document.body.removeChild(i), t(e)
            };
            var o = new URL(e);
            o.searchParams.set("callback", r), i.setAttribute("src", o.toString()), document.body.appendChild(i)
        }))
    }
    var zd = function() {},
        Yd = function() {
            function e() {
                var t = !!(0 < arguments.length && void 0 !== arguments[0]) && arguments[0];
                wd(this, e), this.enabled = window.console && t, this.enabled && this.log("Debugging enabled")
            }
            return Ed(e, [{
                key: "log",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.log, console) : zd
                }
            }, {
                key: "warn",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.warn, console) : zd
                }
            }, {
                key: "error",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.error, console) : zd
                }
            }]), e
        }();

    function $d(e, t) {
        return function() {
            return Array.from(document.querySelectorAll(t)).includes(this)
        }.call(e, t)
    }

    function Gd(e, t) {
        var n = e.length ? e : [e];
        Array.from(n).reverse().forEach((function(e, n) {
            var r = 0 < n ? t.cloneNode(!0) : t,
                i = e.parentNode,
                o = e.nextSibling;
            r.appendChild(e), o ? i.insertBefore(r, o) : i.appendChild(r)
        }))
    }

    function Kd(e, t, n) {
        var r = document.createElement(e);
        return Rd(t) && function(e, t) {
            !Fd(e) || qd(t) || Object.entries(t).filter((function(e) {
                var t = Sd(e, 2)[1];
                return !Cd(t)
            })).forEach((function(t) {
                var n = Sd(t, 2),
                    r = n[0],
                    i = n[1];
                return e.setAttribute(r, i)
            }))
        }(r, t), Nd(n) && (r.innerText = n), r
    }

    function Xd(e) {
        var t = /\./.test(1.1.toLocaleString()) ? "." : ",",
            n = new RegExp("\\".concat(t, "\\d+$"));
        return Math.round(e).toLocaleString().replace(n, "")
    }

    function Jd() {
        for (var e = 0 < arguments.length && void 0 !== arguments[0] ? arguments[0] : {}, t = arguments.length, n = Array(1 < t ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
        if (!n.length) return e;
        var i = n.shift();
        return Rd(i) ? (Object.keys(i).forEach((function(t) {
            Rd(i[t]) ? (!Object.keys(e).includes(t) && Object.assign(e, kd({}, t, {})), Jd(e[t], i[t])) : Object.assign(e, kd({}, t, i[t]))
        })), Jd.apply(void 0, [e].concat(n))) : e
    }
    var Qd = function() {
        function e(t, n) {
            var r = !(2 < arguments.length && void 0 !== arguments[2]) || arguments[2];
            wd(this, e), this.enabled = r && e.supported, this.key = t, this.ttl = n
        }
        return Ed(e, [{
            key: "get",
            value: function(t) {
                if (!e.supported || !this.enabled) return null;
                var n = window.localStorage.getItem(this.key);
                if (qd(n)) return null;
                var r = window.localStorage.getItem("".concat(this.key, "_ttl"));
                if (qd(r) || r < Date.now()) return null;
                var i = JSON.parse(n);
                return Nd(t) && t.length ? i[t] : i
            }
        }, {
            key: "set",
            value: function(t) {
                if (e.supported && this.enabled && Rd(t)) {
                    var n = this.get();
                    qd(n) && (n = {}), Jd(n, t), window.localStorage.setItem(this.key, JSON.stringify(n)), window.localStorage.setItem("".concat(this.key, "_ttl"), Date.now() + this.ttl)
                }
            }
        }], [{
            key: "supported",
            get: function() {
                try {
                    return "localStorage" in window && (window.localStorage.setItem("___test", "___test"), window.localStorage.removeItem("___test"), !0)
                } catch (e) {
                    return !1
                }
            }
        }]), e
    }();
    var Zd = function() {
            function e(t, n) {
                var r = this;
                wd(this, e), this.elements = {
                    count: null,
                    trigger: null,
                    popup: null
                }, Fd(t) ? this.elements.trigger = t : Nd(t) && (this.elements.trigger = document.querySelector(t)), Fd(this.elements.trigger) && qd(this.elements.trigger.shr) && (this.config = Jd({}, Vd, n, {
                    networks: Hd
                }), this.console = new Yd(this.config.debug), this.storage = new Qd(this.config.storage.key, this.config.storage.ttl, this.config.storage.enabled), this.getCount().then((function(e) {
                    return r.updateDisplay(e)
                })).catch((function() {})), this.listeners(!0), this.elements.trigger.shr = this)
            }
            return Ed(e, [{
                key: "destroy",
                value: function() {
                    this.listeners(!1)
                }
            }, {
                key: "listeners",
                value: function() {
                    var e = this,
                        t = 0 < arguments.length && void 0 !== arguments[0] && arguments[0] ? "addEventListener" : "removeEventListener";
                    this.elements.trigger[t]("click", (function(t) {
                        return e.share(t)
                    }), !1)
                }
            }, {
                key: "share",
                value: function(e) {
                    var t = this;
                    this.openPopup(e);
                    var n = this.config.count.increment;
                    this.getCount().then((function(e) {
                        return t.updateDisplay(e, n)
                    })).catch((function() {}))
                }
            }, {
                key: "openPopup",
                value: function(e) {
                    if (!qd(this.network) && this.networkConfig.popup) {
                        Bd(e) && e.preventDefault();
                        var t = this.networkConfig.popup,
                            n = t.width,
                            r = t.height,
                            i = "shr-popup--".concat(this.network);
                        if (this.popup && !this.popup.closed) this.popup.focus(), this.console.log("Popup re-focused.");
                        else {
                            var o = void 0 === window.screenLeft ? window.screen.left : window.screenLeft,
                                a = void 0 === window.screenTop ? window.screen.top : window.screenTop,
                                s = window.screen.width / 2 - n / 2 + o,
                                c = window.screen.height / 2 - r / 2 + a;
                            this.popup = window.open(this.href, i, "top=".concat(c, ",left=").concat(s, ",width=").concat(n, ",height=").concat(r)), this.popup && !this.popup.closed && Md(this.popup.closed) ? (this.popup.focus(), this.console.log("Popup opened.")) : this.console.error("Popup blocked.")
                        }
                    }
                }
            }, {
                key: "getCount",
                value: function() {
                    var e = this,
                        t = !(0 < arguments.length && void 0 !== arguments[0]) || arguments[0];
                    return new Promise((function(n, r) {
                        var i = e.apiUrl;
                        if (qd(i)) r(new Error("No URL available for ".concat(e.network, ".")));
                        else {
                            if (t) {
                                var o = e.storage.get(e.target);
                                if (!qd(o) && Object.keys(o).includes(e.network)) {
                                    var a = o[e.network];
                                    return n(Ld(a) ? a : 0), void e.console.log("getCount for '".concat(e.target, "' for '").concat(e.network, "' resolved from cache."))
                                }
                            }
                            Wd(i).then((function(t) {
                                var r = 0,
                                    i = e.elements.trigger.getAttribute("data-shr-display");
                                r = qd(i) ? e.networkConfig.shareCount(t) : t[i], qd(r) ? r = 0 : (r = parseInt(r, 10), !Ld(r) && (r = 0)), e.storage.set(kd({}, e.target, kd({}, e.network, r))), n(r)
                            })).catch(r)
                        }
                    }))
                }
            }, {
                key: "updateDisplay",
                value: function(e) {
                    var t = !!(1 < arguments.length && void 0 !== arguments[1]) && arguments[1],
                        n = this.config,
                        r = n.count,
                        i = n.wrapper,
                        o = t ? e + 1 : e,
                        a = r.position.toLowerCase();
                    if (0 < o || r.displayZero) {
                        var s = function(e) {
                                return Math.round(o / e * 10) / 10
                            },
                            c = Xd(o);
                        r.format && (1e6 < o ? c = "".concat(s(1e6), "M") : 1e3 < o && (c = "".concat(s(1e3), "K"))), Fd(this.elements.count) ? this.elements.count.textContent = c : (Gd(this.elements.trigger, Kd("span", {
                            class: i.className
                        })), this.elements.count = Kd("span", {
                            class: "".concat(r.className, " ").concat(r.className, "--").concat(a)
                        }, c), this.elements.trigger.insertAdjacentElement("after" === a ? "afterend" : "beforebegin", this.elements.count))
                    }
                }
            }, {
                key: "href",
                get: function() {
                    return Fd(this.elements.trigger) ? this.elements.trigger.href : null
                }
            }, {
                key: "network",
                get: function() {
                    var e = this;
                    if (!Fd(this.elements.trigger)) return null;
                    var t = this.config.networks;
                    return Object.keys(t).find((function(n) {
                        return function(e) {
                            var t = new URL(e).hostname,
                                n = t.split("."),
                                r = n.length;
                            return 2 < r && (t = "".concat(n[r - 2], ".").concat(n[r - 1]), 2 === n[r - 2].length && 2 === n[r - 1].length && (t = "".concat(n[r - 3], ".").concat(t))), t
                        }(e.href) === t[n].domain
                    }))
                }
            }, {
                key: "networkConfig",
                get: function() {
                    return qd(this.network) ? null : this.config.networks[this.network]
                }
            }, {
                key: "target",
                get: function() {
                    if (qd(this.network)) return null;
                    var e = new URL(this.href);
                    switch (this.network) {
                        case "facebook":
                            return e.searchParams.get("u");
                        case "github":
                            return e.pathname.substring(1);
                        case "youtube":
                            return e.pathname.split("/").pop();
                        default:
                            return e.searchParams.get("url")
                    }
                }
            }, {
                key: "apiUrl",
                get: function() {
                    if (qd(this.network)) return null;
                    var e = this.config.tokens;
                    switch (this.network) {
                        case "github":
                            return this.networkConfig.url(this.target, e.github);
                        case "youtube":
                            return this.networkConfig.url(this.target, e.youtube);
                        default:
                            return this.networkConfig.url(encodeURIComponent(this.target))
                    }
                }
            }], [{
                key: "setup",
                value: function(t) {
                    var n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
                        r = null;
                    if (Nd(t) ? r = Array.from(document.querySelectorAll(t)) : Fd(t) ? r = [t] : Dd(t) ? r = Array.from(t) : Ud(t) && (r = t.filter(Fd)), qd(r)) return null;
                    var i = Object.assign({}, Vd, n);
                    return Nd(t) && i.watch && new MutationObserver((function(n) {
                        Array.from(n).forEach((function(n) {
                            Array.from(n.addedNodes).forEach((function(n) {
                                Fd(n) && $d(n, t) && new e(n, i)
                            }))
                        }))
                    })).observe(document.body, {
                        childList: !0,
                        subtree: !0
                    }), r.map((function(t) {
                        return new e(t, n)
                    }))
                }
            }]), e
        }(),
        eg = function(e) {
            return e && e.Math == Math && e
        },
        tg = eg("object" == typeof globalThis && globalThis) || eg("object" == typeof window && window) || eg("object" == typeof self && self) || eg("object" == typeof e && e) || Function("return this")(),
        ng = function(e) {
            try {
                return !!e()
            } catch (e) {
                return !0
            }
        },
        rg = !ng((function() {
            return 7 != Object.defineProperty({}, 1, {
                get: function() {
                    return 7
                }
            })[1]
        })),
        ig = {}.propertyIsEnumerable,
        og = Object.getOwnPropertyDescriptor,
        ag = {
            f: og && !ig.call({
                1: 2
            }, 1) ? function(e) {
                var t = og(this, e);
                return !!t && t.enumerable
            } : ig
        },
        sg = function(e, t) {
            return {
                enumerable: !(1 & e),
                configurable: !(2 & e),
                writable: !(4 & e),
                value: t
            }
        },
        cg = {}.toString,
        ug = function(e) {
            return cg.call(e).slice(8, -1)
        },
        lg = "".split,
        fg = ng((function() {
            return !Object("z").propertyIsEnumerable(0)
        })) ? function(e) {
            return "String" == ug(e) ? lg.call(e, "") : Object(e)
        } : Object,
        hg = function(e) {
            if (null == e) throw TypeError("Can't call method on " + e);
            return e
        },
        pg = function(e) {
            return fg(hg(e))
        },
        dg = function(e) {
            return "object" == typeof e ? null !== e : "function" == typeof e
        },
        gg = function(e, t) {
            if (!dg(e)) return e;
            var n, r;
            if (t && "function" == typeof(n = e.toString) && !dg(r = n.call(e))) return r;
            if ("function" == typeof(n = e.valueOf) && !dg(r = n.call(e))) return r;
            if (!t && "function" == typeof(n = e.toString) && !dg(r = n.call(e))) return r;
            throw TypeError("Can't convert object to primitive value")
        },
        vg = {}.hasOwnProperty,
        mg = function(e, t) {
            return vg.call(e, t)
        },
        yg = tg.document,
        bg = dg(yg) && dg(yg.createElement),
        wg = function(e) {
            return bg ? yg.createElement(e) : {}
        },
        _g = !rg && !ng((function() {
            return 7 != Object.defineProperty(wg("div"), "a", {
                get: function() {
                    return 7
                }
            }).a
        })),
        Eg = Object.getOwnPropertyDescriptor,
        kg = {
            f: rg ? Eg : function(e, t) {
                if (e = pg(e), t = gg(t, !0), _g) try {
                    return Eg(e, t)
                } catch (e) {}
                if (mg(e, t)) return sg(!ag.f.call(e, t), e[t])
            }
        },
        Sg = function(e) {
            if (!dg(e)) throw TypeError(String(e) + " is not an object");
            return e
        },
        Tg = Object.defineProperty,
        xg = {
            f: rg ? Tg : function(e, t, n) {
                if (Sg(e), t = gg(t, !0), Sg(n), _g) try {
                    return Tg(e, t, n)
                } catch (e) {}
                if ("get" in n || "set" in n) throw TypeError("Accessors not supported");
                return "value" in n && (e[t] = n.value), e
            }
        },
        Ag = rg ? function(e, t, n) {
            return xg.f(e, t, sg(1, n))
        } : function(e, t, n) {
            return e[t] = n, e
        },
        Og = function(e, t) {
            try {
                Ag(tg, e, t)
            } catch (n) {
                tg[e] = t
            }
            return t
        },
        Pg = tg["__core-js_shared__"] || Og("__core-js_shared__", {}),
        Ig = Function.toString;
    "function" != typeof Pg.inspectSource && (Pg.inspectSource = function(e) {
        return Ig.call(e)
    });
    var jg, Cg, Rg, Lg = Pg.inspectSource,
        Ng = tg.WeakMap,
        Mg = "function" == typeof Ng && /native code/.test(Lg(Ng)),
        Ug = t((function(e) {
            (e.exports = function(e, t) {
                return Pg[e] || (Pg[e] = void 0 !== t ? t : {})
            })("versions", []).push({
                version: "3.6.5",
                mode: "global",
                copyright: "© 2020 Denis Pushkarev (zloirock.ru)"
            })
        })),
        Dg = 0,
        Fg = Math.random(),
        Bg = function(e) {
            return "Symbol(" + String(void 0 === e ? "" : e) + ")_" + (++Dg + Fg).toString(36)
        },
        qg = Ug("keys"),
        Hg = function(e) {
            return qg[e] || (qg[e] = Bg(e))
        },
        Vg = {},
        Wg = tg.WeakMap;
    if (Mg) {
        var zg = new Wg,
            Yg = zg.get,
            $g = zg.has,
            Gg = zg.set;
        jg = function(e, t) {
            return Gg.call(zg, e, t), t
        }, Cg = function(e) {
            return Yg.call(zg, e) || {}
        }, Rg = function(e) {
            return $g.call(zg, e)
        }
    } else {
        var Kg = Hg("state");
        Vg[Kg] = !0, jg = function(e, t) {
            return Ag(e, Kg, t), t
        }, Cg = function(e) {
            return mg(e, Kg) ? e[Kg] : {}
        }, Rg = function(e) {
            return mg(e, Kg)
        }
    }
    var Xg, Jg, Qg = {
            set: jg,
            get: Cg,
            has: Rg,
            enforce: function(e) {
                return Rg(e) ? Cg(e) : jg(e, {})
            },
            getterFor: function(e) {
                return function(t) {
                    var n;
                    if (!dg(t) || (n = Cg(t)).type !== e) throw TypeError("Incompatible receiver, " + e + " required");
                    return n
                }
            }
        },
        Zg = t((function(e) {
            var t = Qg.get,
                n = Qg.enforce,
                r = String(String).split("String");
            (e.exports = function(e, t, i, o) {
                var a = !!o && !!o.unsafe,
                    s = !!o && !!o.enumerable,
                    c = !!o && !!o.noTargetGet;
                "function" == typeof i && ("string" != typeof t || mg(i, "name") || Ag(i, "name", t), n(i).source = r.join("string" == typeof t ? t : "")), e !== tg ? (a ? !c && e[t] && (s = !0) : delete e[t], s ? e[t] = i : Ag(e, t, i)) : s ? e[t] = i : Og(t, i)
            })(Function.prototype, "toString", (function() {
                return "function" == typeof this && t(this).source || Lg(this)
            }))
        })),
        ev = tg,
        tv = function(e) {
            return "function" == typeof e ? e : void 0
        },
        nv = function(e, t) {
            return arguments.length < 2 ? tv(ev[e]) || tv(tg[e]) : ev[e] && ev[e][t] || tg[e] && tg[e][t]
        },
        rv = Math.ceil,
        iv = Math.floor,
        ov = function(e) {
            return isNaN(e = +e) ? 0 : (e > 0 ? iv : rv)(e)
        },
        av = Math.min,
        sv = function(e) {
            return e > 0 ? av(ov(e), 9007199254740991) : 0
        },
        cv = Math.max,
        uv = Math.min,
        lv = function(e, t) {
            var n = ov(e);
            return n < 0 ? cv(n + t, 0) : uv(n, t)
        },
        fv = function(e) {
            return function(t, n, r) {
                var i, o = pg(t),
                    a = sv(o.length),
                    s = lv(r, a);
                if (e && n != n) {
                    for (; a > s;)
                        if ((i = o[s++]) != i) return !0
                } else
                    for (; a > s; s++)
                        if ((e || s in o) && o[s] === n) return e || s || 0;
                return !e && -1
            }
        },
        hv = {
            includes: fv(!0),
            indexOf: fv(!1)
        },
        pv = hv.indexOf,
        dv = function(e, t) {
            var n, r = pg(e),
                i = 0,
                o = [];
            for (n in r) !mg(Vg, n) && mg(r, n) && o.push(n);
            for (; t.length > i;) mg(r, n = t[i++]) && (~pv(o, n) || o.push(n));
            return o
        },
        gv = ["constructor", "hasOwnProperty", "isPrototypeOf", "propertyIsEnumerable", "toLocaleString", "toString", "valueOf"],
        vv = gv.concat("length", "prototype"),
        mv = {
            f: Object.getOwnPropertyNames || function(e) {
                return dv(e, vv)
            }
        },
        yv = {
            f: Object.getOwnPropertySymbols
        },
        bv = nv("Reflect", "ownKeys") || function(e) {
            var t = mv.f(Sg(e)),
                n = yv.f;
            return n ? t.concat(n(e)) : t
        },
        wv = function(e, t) {
            for (var n = bv(t), r = xg.f, i = kg.f, o = 0; o < n.length; o++) {
                var a = n[o];
                mg(e, a) || r(e, a, i(t, a))
            }
        },
        _v = /#|\.prototype\./,
        Ev = function(e, t) {
            var n = Sv[kv(e)];
            return n == xv || n != Tv && ("function" == typeof t ? ng(t) : !!t)
        },
        kv = Ev.normalize = function(e) {
            return String(e).replace(_v, ".").toLowerCase()
        },
        Sv = Ev.data = {},
        Tv = Ev.NATIVE = "N",
        xv = Ev.POLYFILL = "P",
        Av = Ev,
        Ov = kg.f,
        Pv = function(e, t) {
            var n, r, i, o, a, s = e.target,
                c = e.global,
                u = e.stat;
            if (n = c ? tg : u ? tg[s] || Og(s, {}) : (tg[s] || {}).prototype)
                for (r in t) {
                    if (o = t[r], i = e.noTargetGet ? (a = Ov(n, r)) && a.value : n[r], !Av(c ? r : s + (u ? "." : "#") + r, e.forced) && void 0 !== i) {
                        if (typeof o == typeof i) continue;
                        wv(o, i)
                    }(e.sham || i && i.sham) && Ag(o, "sham", !0), Zg(n, r, o, e)
                }
        },
        Iv = Array.isArray || function(e) {
            return "Array" == ug(e)
        },
        jv = function(e) {
            return Object(hg(e))
        },
        Cv = function(e, t, n) {
            var r = gg(t);
            r in e ? xg.f(e, r, sg(0, n)) : e[r] = n
        },
        Rv = !!Object.getOwnPropertySymbols && !ng((function() {
            return !String(Symbol())
        })),
        Lv = Rv && !Symbol.sham && "symbol" == typeof Symbol.iterator,
        Nv = Ug("wks"),
        Mv = tg.Symbol,
        Uv = Lv ? Mv : Mv && Mv.withoutSetter || Bg,
        Dv = function(e) {
            return mg(Nv, e) || (Rv && mg(Mv, e) ? Nv[e] = Mv[e] : Nv[e] = Uv("Symbol." + e)), Nv[e]
        },
        Fv = Dv("species"),
        Bv = function(e, t) {
            var n;
            return Iv(e) && ("function" != typeof(n = e.constructor) || n !== Array && !Iv(n.prototype) ? dg(n) && null === (n = n[Fv]) && (n = void 0) : n = void 0), new(void 0 === n ? Array : n)(0 === t ? 0 : t)
        },
        qv = nv("navigator", "userAgent") || "",
        Hv = tg.process,
        Vv = Hv && Hv.versions,
        Wv = Vv && Vv.v8;
    Wv ? Jg = (Xg = Wv.split("."))[0] + Xg[1] : qv && (!(Xg = qv.match(/Edge\/(\d+)/)) || Xg[1] >= 74) && (Xg = qv.match(/Chrome\/(\d+)/)) && (Jg = Xg[1]);
    var zv = Jg && +Jg,
        Yv = Dv("species"),
        $v = function(e) {
            return zv >= 51 || !ng((function() {
                var t = [];
                return (t.constructor = {})[Yv] = function() {
                    return {
                        foo: 1
                    }
                }, 1 !== t[e](Boolean).foo
            }))
        },
        Gv = Dv("isConcatSpreadable"),
        Kv = zv >= 51 || !ng((function() {
            var e = [];
            return e[Gv] = !1, e.concat()[0] !== e
        })),
        Xv = $v("concat"),
        Jv = function(e) {
            if (!dg(e)) return !1;
            var t = e[Gv];
            return void 0 !== t ? !!t : Iv(e)
        };
    Pv({
        target: "Array",
        proto: !0,
        forced: !Kv || !Xv
    }, {
        concat: function(e) {
            var t, n, r, i, o, a = jv(this),
                s = Bv(a, 0),
                c = 0;
            for (t = -1, r = arguments.length; t < r; t++)
                if (o = -1 === t ? a : arguments[t], Jv(o)) {
                    if (c + (i = sv(o.length)) > 9007199254740991) throw TypeError("Maximum allowed index exceeded");
                    for (n = 0; n < i; n++, c++) n in o && Cv(s, c, o[n])
                } else {
                    if (c >= 9007199254740991) throw TypeError("Maximum allowed index exceeded");
                    Cv(s, c++, o)
                } return s.length = c, s
        }
    });
    var Qv = function(e) {
            if ("function" != typeof e) throw TypeError(String(e) + " is not a function");
            return e
        },
        Zv = function(e, t, n) {
            if (Qv(e), void 0 === t) return e;
            switch (n) {
                case 0:
                    return function() {
                        return e.call(t)
                    };
                case 1:
                    return function(n) {
                        return e.call(t, n)
                    };
                case 2:
                    return function(n, r) {
                        return e.call(t, n, r)
                    };
                case 3:
                    return function(n, r, i) {
                        return e.call(t, n, r, i)
                    }
            }
            return function() {
                return e.apply(t, arguments)
            }
        },
        em = [].push,
        tm = function(e) {
            var t = 1 == e,
                n = 2 == e,
                r = 3 == e,
                i = 4 == e,
                o = 6 == e,
                a = 5 == e || o;
            return function(s, c, u, l) {
                for (var f, h, p = jv(s), d = fg(p), g = Zv(c, u, 3), v = sv(d.length), m = 0, y = l || Bv, b = t ? y(s, v) : n ? y(s, 0) : void 0; v > m; m++)
                    if ((a || m in d) && (h = g(f = d[m], m, p), e))
                        if (t) b[m] = h;
                        else if (h) switch (e) {
                    case 3:
                        return !0;
                    case 5:
                        return f;
                    case 6:
                        return m;
                    case 2:
                        em.call(b, f)
                } else if (i) return !1;
                return o ? -1 : r || i ? i : b
            }
        },
        nm = {
            forEach: tm(0),
            map: tm(1),
            filter: tm(2),
            some: tm(3),
            every: tm(4),
            find: tm(5),
            findIndex: tm(6)
        },
        rm = Object.defineProperty,
        im = {},
        om = function(e) {
            throw e
        },
        am = function(e, t) {
            if (mg(im, e)) return im[e];
            t || (t = {});
            var n = [][e],
                r = !!mg(t, "ACCESSORS") && t.ACCESSORS,
                i = mg(t, 0) ? t[0] : om,
                o = mg(t, 1) ? t[1] : void 0;
            return im[e] = !!n && !ng((function() {
                if (r && !rg) return !0;
                var e = {
                    length: -1
                };
                r ? rm(e, 1, {
                    enumerable: !0,
                    get: om
                }) : e[1] = 1, n.call(e, i, o)
            }))
        },
        sm = nm.filter,
        cm = $v("filter"),
        um = am("filter");
    Pv({
        target: "Array",
        proto: !0,
        forced: !cm || !um
    }, {
        filter: function(e) {
            return sm(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var lm, fm = Object.keys || function(e) {
            return dv(e, gv)
        },
        hm = rg ? Object.defineProperties : function(e, t) {
            Sg(e);
            for (var n, r = fm(t), i = r.length, o = 0; i > o;) xg.f(e, n = r[o++], t[n]);
            return e
        },
        pm = nv("document", "documentElement"),
        dm = Hg("IE_PROTO"),
        gm = function() {},
        vm = function(e) {
            return "<script>" + e + "<\/script>"
        },
        mm = function() {
            try {
                lm = document.domain && new ActiveXObject("htmlfile")
            } catch (e) {}
            var e, t;
            mm = lm ? function(e) {
                e.write(vm("")), e.close();
                var t = e.parentWindow.Object;
                return e = null, t
            }(lm) : ((t = wg("iframe")).style.display = "none", pm.appendChild(t), t.src = String("javascript:"), (e = t.contentWindow.document).open(), e.write(vm("document.F=Object")), e.close(), e.F);
            for (var n = gv.length; n--;) delete mm.prototype[gv[n]];
            return mm()
        };
    Vg[dm] = !0;
    var ym = Object.create || function(e, t) {
            var n;
            return null !== e ? (gm.prototype = Sg(e), n = new gm, gm.prototype = null, n[dm] = e) : n = mm(), void 0 === t ? n : hm(n, t)
        },
        bm = Dv("unscopables"),
        wm = Array.prototype;
    null == wm[bm] && xg.f(wm, bm, {
        configurable: !0,
        value: ym(null)
    });
    var _m = function(e) {
            wm[bm][e] = !0
        },
        Em = nm.find,
        km = !0,
        Sm = am("find");
    "find" in [] && Array(1).find((function() {
        km = !1
    })), Pv({
        target: "Array",
        proto: !0,
        forced: km || !Sm
    }, {
        find: function(e) {
            return Em(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    }), _m("find");
    var Tm = function(e, t, n, r) {
            try {
                return r ? t(Sg(n)[0], n[1]) : t(n)
            } catch (t) {
                var i = e.return;
                throw void 0 !== i && Sg(i.call(e)), t
            }
        },
        xm = {},
        Am = Dv("iterator"),
        Om = Array.prototype,
        Pm = function(e) {
            return void 0 !== e && (xm.Array === e || Om[Am] === e)
        },
        Im = {};
    Im[Dv("toStringTag")] = "z";
    var jm = "[object z]" === String(Im),
        Cm = Dv("toStringTag"),
        Rm = "Arguments" == ug(function() {
            return arguments
        }()),
        Lm = jm ? ug : function(e) {
            var t, n, r;
            return void 0 === e ? "Undefined" : null === e ? "Null" : "string" == typeof(n = function(e, t) {
                try {
                    return e[t]
                } catch (e) {}
            }(t = Object(e), Cm)) ? n : Rm ? ug(t) : "Object" == (r = ug(t)) && "function" == typeof t.callee ? "Arguments" : r
        },
        Nm = Dv("iterator"),
        Mm = function(e) {
            if (null != e) return e[Nm] || e["@@iterator"] || xm[Lm(e)]
        },
        Um = function(e) {
            var t, n, r, i, o, a, s = jv(e),
                c = "function" == typeof this ? this : Array,
                u = arguments.length,
                l = u > 1 ? arguments[1] : void 0,
                f = void 0 !== l,
                h = Mm(s),
                p = 0;
            if (f && (l = Zv(l, u > 2 ? arguments[2] : void 0, 2)), null == h || c == Array && Pm(h))
                for (n = new c(t = sv(s.length)); t > p; p++) a = f ? l(s[p], p) : s[p], Cv(n, p, a);
            else
                for (o = (i = h.call(s)).next, n = new c; !(r = o.call(i)).done; p++) a = f ? Tm(i, l, [r.value, p], !0) : r.value, Cv(n, p, a);
            return n.length = p, n
        },
        Dm = Dv("iterator"),
        Fm = !1;
    try {
        var Bm = 0,
            qm = {
                next: function() {
                    return {
                        done: !!Bm++
                    }
                },
                return: function() {
                    Fm = !0
                }
            };
        qm[Dm] = function() {
            return this
        }, Array.from(qm, (function() {
            throw 2
        }))
    } catch (e) {}
    var Hm = function(e, t) {
            if (!t && !Fm) return !1;
            var n = !1;
            try {
                var r = {};
                r[Dm] = function() {
                    return {
                        next: function() {
                            return {
                                done: n = !0
                            }
                        }
                    }
                }, e(r)
            } catch (e) {}
            return n
        },
        Vm = !Hm((function(e) {
            Array.from(e)
        }));
    Pv({
        target: "Array",
        stat: !0,
        forced: Vm
    }, {
        from: Um
    });
    var Wm = hv.includes,
        zm = am("indexOf", {
            ACCESSORS: !0,
            1: 0
        });
    Pv({
        target: "Array",
        proto: !0,
        forced: !zm
    }, {
        includes: function(e) {
            return Wm(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    }), _m("includes");
    var Ym, $m, Gm, Km = !ng((function() {
            function e() {}
            return e.prototype.constructor = null, Object.getPrototypeOf(new e) !== e.prototype
        })),
        Xm = Hg("IE_PROTO"),
        Jm = Object.prototype,
        Qm = Km ? Object.getPrototypeOf : function(e) {
            return e = jv(e), mg(e, Xm) ? e[Xm] : "function" == typeof e.constructor && e instanceof e.constructor ? e.constructor.prototype : e instanceof Object ? Jm : null
        },
        Zm = Dv("iterator"),
        ey = !1;
    [].keys && ("next" in (Gm = [].keys()) ? ($m = Qm(Qm(Gm))) !== Object.prototype && (Ym = $m) : ey = !0), null == Ym && (Ym = {}), mg(Ym, Zm) || Ag(Ym, Zm, (function() {
        return this
    }));
    var ty = {
            IteratorPrototype: Ym,
            BUGGY_SAFARI_ITERATORS: ey
        },
        ny = xg.f,
        ry = Dv("toStringTag"),
        iy = function(e, t, n) {
            e && !mg(e = n ? e : e.prototype, ry) && ny(e, ry, {
                configurable: !0,
                value: t
            })
        },
        oy = ty.IteratorPrototype,
        ay = function() {
            return this
        },
        sy = function(e, t, n) {
            var r = t + " Iterator";
            return e.prototype = ym(oy, {
                next: sg(1, n)
            }), iy(e, r, !1), xm[r] = ay, e
        },
        cy = Object.setPrototypeOf || ("__proto__" in {} ? function() {
            var e, t = !1,
                n = {};
            try {
                (e = Object.getOwnPropertyDescriptor(Object.prototype, "__proto__").set).call(n, []), t = n instanceof Array
            } catch (e) {}
            return function(n, r) {
                return Sg(n),
                    function(e) {
                        if (!dg(e) && null !== e) throw TypeError("Can't set " + String(e) + " as a prototype")
                    }(r), t ? e.call(n, r) : n.__proto__ = r, n
            }
        }() : void 0),
        uy = ty.IteratorPrototype,
        ly = ty.BUGGY_SAFARI_ITERATORS,
        fy = Dv("iterator"),
        hy = function() {
            return this
        },
        py = function(e, t, n, r, i, o, a) {
            sy(n, t, r);
            var s, c, u, l = function(e) {
                    if (e === i && g) return g;
                    if (!ly && e in p) return p[e];
                    switch (e) {
                        case "keys":
                        case "values":
                        case "entries":
                            return function() {
                                return new n(this, e)
                            }
                    }
                    return function() {
                        return new n(this)
                    }
                },
                f = t + " Iterator",
                h = !1,
                p = e.prototype,
                d = p[fy] || p["@@iterator"] || i && p[i],
                g = !ly && d || l(i),
                v = "Array" == t && p.entries || d;
            if (v && (s = Qm(v.call(new e)), uy !== Object.prototype && s.next && (Qm(s) !== uy && (cy ? cy(s, uy) : "function" != typeof s[fy] && Ag(s, fy, hy)), iy(s, f, !0))), "values" == i && d && "values" !== d.name && (h = !0, g = function() {
                    return d.call(this)
                }), p[fy] !== g && Ag(p, fy, g), xm[t] = g, i)
                if (c = {
                        values: l("values"),
                        keys: o ? g : l("keys"),
                        entries: l("entries")
                    }, a)
                    for (u in c)(ly || h || !(u in p)) && Zg(p, u, c[u]);
                else Pv({
                    target: t,
                    proto: !0,
                    forced: ly || h
                }, c);
            return c
        },
        dy = Qg.set,
        gy = Qg.getterFor("Array Iterator"),
        vy = py(Array, "Array", (function(e, t) {
            dy(this, {
                type: "Array Iterator",
                target: pg(e),
                index: 0,
                kind: t
            })
        }), (function() {
            var e = gy(this),
                t = e.target,
                n = e.kind,
                r = e.index++;
            return !t || r >= t.length ? (e.target = void 0, {
                value: void 0,
                done: !0
            }) : "keys" == n ? {
                value: r,
                done: !1
            } : "values" == n ? {
                value: t[r],
                done: !1
            } : {
                value: [r, t[r]],
                done: !1
            }
        }), "values");
    xm.Arguments = xm.Array, _m("keys"), _m("values"), _m("entries");
    var my = function(e, t) {
            var n = [][e];
            return !!n && ng((function() {
                n.call(null, t || function() {
                    throw 1
                }, 1)
            }))
        },
        yy = [].join,
        by = fg != Object,
        wy = my("join", ",");
    Pv({
        target: "Array",
        proto: !0,
        forced: by || !wy
    }, {
        join: function(e) {
            return yy.call(pg(this), void 0 === e ? "," : e)
        }
    });
    var _y = nm.map,
        Ey = $v("map"),
        ky = am("map");
    Pv({
        target: "Array",
        proto: !0,
        forced: !Ey || !ky
    }, {
        map: function(e) {
            return _y(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var Sy = function(e, t, n) {
            var r, i;
            return cy && "function" == typeof(r = t.constructor) && r !== n && dg(i = r.prototype) && i !== n.prototype && cy(e, i), e
        },
        Ty = "[\t\n\v\f\r                　\u2028\u2029\ufeff]",
        xy = RegExp("^" + Ty + Ty + "*"),
        Ay = RegExp(Ty + Ty + "*$"),
        Oy = function(e) {
            return function(t) {
                var n = String(hg(t));
                return 1 & e && (n = n.replace(xy, "")), 2 & e && (n = n.replace(Ay, "")), n
            }
        },
        Py = {
            start: Oy(1),
            end: Oy(2),
            trim: Oy(3)
        },
        Iy = mv.f,
        jy = kg.f,
        Cy = xg.f,
        Ry = Py.trim,
        Ly = tg.Number,
        Ny = Ly.prototype,
        My = "Number" == ug(ym(Ny)),
        Uy = function(e) {
            var t, n, r, i, o, a, s, c, u = gg(e, !1);
            if ("string" == typeof u && u.length > 2)
                if (43 === (t = (u = Ry(u)).charCodeAt(0)) || 45 === t) {
                    if (88 === (n = u.charCodeAt(2)) || 120 === n) return NaN
                } else if (48 === t) {
                switch (u.charCodeAt(1)) {
                    case 66:
                    case 98:
                        r = 2, i = 49;
                        break;
                    case 79:
                    case 111:
                        r = 8, i = 55;
                        break;
                    default:
                        return +u
                }
                for (a = (o = u.slice(2)).length, s = 0; s < a; s++)
                    if ((c = o.charCodeAt(s)) < 48 || c > i) return NaN;
                return parseInt(o, r)
            }
            return +u
        };
    if (Av("Number", !Ly(" 0o1") || !Ly("0b1") || Ly("+0x1"))) {
        for (var Dy, Fy = function(e) {
                var t = arguments.length < 1 ? 0 : e,
                    n = this;
                return n instanceof Fy && (My ? ng((function() {
                    Ny.valueOf.call(n)
                })) : "Number" != ug(n)) ? Sy(new Ly(Uy(t)), n, Fy) : Uy(t)
            }, By = rg ? Iy(Ly) : "MAX_VALUE,MIN_VALUE,NaN,NEGATIVE_INFINITY,POSITIVE_INFINITY,EPSILON,isFinite,isInteger,isNaN,isSafeInteger,MAX_SAFE_INTEGER,MIN_SAFE_INTEGER,parseFloat,parseInt,isInteger".split(","), qy = 0; By.length > qy; qy++) mg(Ly, Dy = By[qy]) && !mg(Fy, Dy) && Cy(Fy, Dy, jy(Ly, Dy));
        Fy.prototype = Ny, Ny.constructor = Fy, Zg(tg, "Number", Fy)
    }
    var Hy = ng((function() {
        fm(1)
    }));
    Pv({
        target: "Object",
        stat: !0,
        forced: Hy
    }, {
        keys: function(e) {
            return fm(jv(e))
        }
    });
    var Vy = jm ? {}.toString : function() {
        return "[object " + Lm(this) + "]"
    };
    jm || Zg(Object.prototype, "toString", Vy, {
        unsafe: !0
    });
    var Wy = function() {
        var e = Sg(this),
            t = "";
        return e.global && (t += "g"), e.ignoreCase && (t += "i"), e.multiline && (t += "m"), e.dotAll && (t += "s"), e.unicode && (t += "u"), e.sticky && (t += "y"), t
    };

    function zy(e, t) {
        return RegExp(e, t)
    }
    var Yy = {
            UNSUPPORTED_Y: ng((function() {
                var e = zy("a", "y");
                return e.lastIndex = 2, null != e.exec("abcd")
            })),
            BROKEN_CARET: ng((function() {
                var e = zy("^r", "gy");
                return e.lastIndex = 2, null != e.exec("str")
            }))
        },
        $y = RegExp.prototype.exec,
        Gy = String.prototype.replace,
        Ky = $y,
        Xy = function() {
            var e = /a/,
                t = /b*/g;
            return $y.call(e, "a"), $y.call(t, "a"), 0 !== e.lastIndex || 0 !== t.lastIndex
        }(),
        Jy = Yy.UNSUPPORTED_Y || Yy.BROKEN_CARET,
        Qy = void 0 !== /()??/.exec("")[1];
    (Xy || Qy || Jy) && (Ky = function(e) {
        var t, n, r, i, o = this,
            a = Jy && o.sticky,
            s = Wy.call(o),
            c = o.source,
            u = 0,
            l = e;
        return a && (-1 === (s = s.replace("y", "")).indexOf("g") && (s += "g"), l = String(e).slice(o.lastIndex), o.lastIndex > 0 && (!o.multiline || o.multiline && "\n" !== e[o.lastIndex - 1]) && (c = "(?: " + c + ")", l = " " + l, u++), n = new RegExp("^(?:" + c + ")", s)), Qy && (n = new RegExp("^" + c + "$(?!\\s)", s)), Xy && (t = o.lastIndex), r = $y.call(a ? n : o, l), a ? r ? (r.input = r.input.slice(u), r[0] = r[0].slice(u), r.index = o.lastIndex, o.lastIndex += r[0].length) : o.lastIndex = 0 : Xy && r && (o.lastIndex = o.global ? r.index + r[0].length : t), Qy && r && r.length > 1 && Gy.call(r[0], n, (function() {
            for (i = 1; i < arguments.length - 2; i++) void 0 === arguments[i] && (r[i] = void 0)
        })), r
    });
    var Zy = Ky;
    Pv({
        target: "RegExp",
        proto: !0,
        forced: /./.exec !== Zy
    }, {
        exec: Zy
    });
    var eb = RegExp.prototype,
        tb = eb.toString,
        nb = ng((function() {
            return "/a/b" != tb.call({
                source: "a",
                flags: "b"
            })
        })),
        rb = "toString" != tb.name;
    (nb || rb) && Zg(RegExp.prototype, "toString", (function() {
        var e = Sg(this),
            t = String(e.source),
            n = e.flags;
        return "/" + t + "/" + String(void 0 === n && e instanceof RegExp && !("flags" in eb) ? Wy.call(e) : n)
    }), {
        unsafe: !0
    });
    var ib = Dv("match"),
        ob = function(e) {
            var t;
            return dg(e) && (void 0 !== (t = e[ib]) ? !!t : "RegExp" == ug(e))
        },
        ab = function(e) {
            if (ob(e)) throw TypeError("The method doesn't accept regular expressions");
            return e
        },
        sb = Dv("match"),
        cb = function(e) {
            var t = /./;
            try {
                "/./" [e](t)
            } catch (n) {
                try {
                    return t[sb] = !1, "/./" [e](t)
                } catch (e) {}
            }
            return !1
        };
    Pv({
        target: "String",
        proto: !0,
        forced: !cb("includes")
    }, {
        includes: function(e) {
            return !!~String(hg(this)).indexOf(ab(e), arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var ub = function(e) {
            return function(t, n) {
                var r, i, o = String(hg(t)),
                    a = ov(n),
                    s = o.length;
                return a < 0 || a >= s ? e ? "" : void 0 : (r = o.charCodeAt(a)) < 55296 || r > 56319 || a + 1 === s || (i = o.charCodeAt(a + 1)) < 56320 || i > 57343 ? e ? o.charAt(a) : r : e ? o.slice(a, a + 2) : i - 56320 + (r - 55296 << 10) + 65536
            }
        },
        lb = {
            codeAt: ub(!1),
            charAt: ub(!0)
        },
        fb = lb.charAt,
        hb = Qg.set,
        pb = Qg.getterFor("String Iterator");
    py(String, "String", (function(e) {
        hb(this, {
            type: "String Iterator",
            string: String(e),
            index: 0
        })
    }), (function() {
        var e, t = pb(this),
            n = t.string,
            r = t.index;
        return r >= n.length ? {
            value: void 0,
            done: !0
        } : (e = fb(n, r), t.index += e.length, {
            value: e,
            done: !1
        })
    }));
    var db = Dv("species"),
        gb = !ng((function() {
            var e = /./;
            return e.exec = function() {
                var e = [];
                return e.groups = {
                    a: "7"
                }, e
            }, "7" !== "".replace(e, "$<a>")
        })),
        vb = "$0" === "a".replace(/./, "$0"),
        mb = Dv("replace"),
        yb = !!/./ [mb] && "" === /./ [mb]("a", "$0"),
        bb = !ng((function() {
            var e = /(?:)/,
                t = e.exec;
            e.exec = function() {
                return t.apply(this, arguments)
            };
            var n = "ab".split(e);
            return 2 !== n.length || "a" !== n[0] || "b" !== n[1]
        })),
        wb = function(e, t, n, r) {
            var i = Dv(e),
                o = !ng((function() {
                    var t = {};
                    return t[i] = function() {
                        return 7
                    }, 7 != "" [e](t)
                })),
                a = o && !ng((function() {
                    var t = !1,
                        n = /a/;
                    return "split" === e && ((n = {}).constructor = {}, n.constructor[db] = function() {
                        return n
                    }, n.flags = "", n[i] = /./ [i]), n.exec = function() {
                        return t = !0, null
                    }, n[i](""), !t
                }));
            if (!o || !a || "replace" === e && (!gb || !vb || yb) || "split" === e && !bb) {
                var s = /./ [i],
                    c = n(i, "" [e], (function(e, t, n, r, i) {
                        return t.exec === Zy ? o && !i ? {
                            done: !0,
                            value: s.call(t, n, r)
                        } : {
                            done: !0,
                            value: e.call(n, t, r)
                        } : {
                            done: !1
                        }
                    }), {
                        REPLACE_KEEPS_$0: vb,
                        REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE: yb
                    }),
                    u = c[0],
                    l = c[1];
                Zg(String.prototype, e, u), Zg(RegExp.prototype, i, 2 == t ? function(e, t) {
                    return l.call(e, this, t)
                } : function(e) {
                    return l.call(e, this)
                })
            }
            r && Ag(RegExp.prototype[i], "sham", !0)
        },
        _b = Object.is || function(e, t) {
            return e === t ? 0 !== e || 1 / e == 1 / t : e != e && t != t
        },
        Eb = function(e, t) {
            var n = e.exec;
            if ("function" == typeof n) {
                var r = n.call(e, t);
                if ("object" != typeof r) throw TypeError("RegExp exec method returned something other than an Object or null");
                return r
            }
            if ("RegExp" !== ug(e)) throw TypeError("RegExp#exec called on incompatible receiver");
            return Zy.call(e, t)
        };
    wb("search", 1, (function(e, t, n) {
        return [function(t) {
            var n = hg(this),
                r = null == t ? void 0 : t[e];
            return void 0 !== r ? r.call(t, n) : new RegExp(t)[e](String(n))
        }, function(e) {
            var r = n(t, e, this);
            if (r.done) return r.value;
            var i = Sg(e),
                o = String(this),
                a = i.lastIndex;
            _b(a, 0) || (i.lastIndex = 0);
            var s = Eb(i, o);
            return _b(i.lastIndex, a) || (i.lastIndex = a), null === s ? -1 : s.index
        }]
    }));
    var kb = function(e, t, n) {
            for (var r in t) Zg(e, r, t[r], n);
            return e
        },
        Sb = !ng((function() {
            return Object.isExtensible(Object.preventExtensions({}))
        })),
        Tb = t((function(e) {
            var t = xg.f,
                n = Bg("meta"),
                r = 0,
                i = Object.isExtensible || function() {
                    return !0
                },
                o = function(e) {
                    t(e, n, {
                        value: {
                            objectID: "O" + ++r,
                            weakData: {}
                        }
                    })
                },
                a = e.exports = {
                    REQUIRED: !1,
                    fastKey: function(e, t) {
                        if (!dg(e)) return "symbol" == typeof e ? e : ("string" == typeof e ? "S" : "P") + e;
                        if (!mg(e, n)) {
                            if (!i(e)) return "F";
                            if (!t) return "E";
                            o(e)
                        }
                        return e[n].objectID
                    },
                    getWeakData: function(e, t) {
                        if (!mg(e, n)) {
                            if (!i(e)) return !0;
                            if (!t) return !1;
                            o(e)
                        }
                        return e[n].weakData
                    },
                    onFreeze: function(e) {
                        return Sb && a.REQUIRED && i(e) && !mg(e, n) && o(e), e
                    }
                };
            Vg[n] = !0
        })),
        xb = (Tb.REQUIRED, Tb.fastKey, Tb.getWeakData, Tb.onFreeze, t((function(e) {
            var t = function(e, t) {
                this.stopped = e, this.result = t
            };
            (e.exports = function(e, n, r, i, o) {
                var a, s, c, u, l, f, h, p = Zv(n, r, i ? 2 : 1);
                if (o) a = e;
                else {
                    if ("function" != typeof(s = Mm(e))) throw TypeError("Target is not iterable");
                    if (Pm(s)) {
                        for (c = 0, u = sv(e.length); u > c; c++)
                            if ((l = i ? p(Sg(h = e[c])[0], h[1]) : p(e[c])) && l instanceof t) return l;
                        return new t(!1)
                    }
                    a = s.call(e)
                }
                for (f = a.next; !(h = f.call(a)).done;)
                    if ("object" == typeof(l = Tm(a, p, h.value, i)) && l && l instanceof t) return l;
                return new t(!1)
            }).stop = function(e) {
                return new t(!0, e)
            }
        }))),
        Ab = function(e, t, n) {
            if (!(e instanceof t)) throw TypeError("Incorrect " + (n ? n + " " : "") + "invocation");
            return e
        },
        Ob = Tb.getWeakData,
        Pb = Qg.set,
        Ib = Qg.getterFor,
        jb = nm.find,
        Cb = nm.findIndex,
        Rb = 0,
        Lb = function(e) {
            return e.frozen || (e.frozen = new Nb)
        },
        Nb = function() {
            this.entries = []
        },
        Mb = function(e, t) {
            return jb(e.entries, (function(e) {
                return e[0] === t
            }))
        };
    Nb.prototype = {
        get: function(e) {
            var t = Mb(this, e);
            if (t) return t[1]
        },
        has: function(e) {
            return !!Mb(this, e)
        },
        set: function(e, t) {
            var n = Mb(this, e);
            n ? n[1] = t : this.entries.push([e, t])
        },
        delete: function(e) {
            var t = Cb(this.entries, (function(t) {
                return t[0] === e
            }));
            return ~t && this.entries.splice(t, 1), !!~t
        }
    };
    var Ub = {
            getConstructor: function(e, t, n, r) {
                var i = e((function(e, o) {
                        Ab(e, i, t), Pb(e, {
                            type: t,
                            id: Rb++,
                            frozen: void 0
                        }), null != o && xb(o, e[r], e, n)
                    })),
                    o = Ib(t),
                    a = function(e, t, n) {
                        var r = o(e),
                            i = Ob(Sg(t), !0);
                        return !0 === i ? Lb(r).set(t, n) : i[r.id] = n, e
                    };
                return kb(i.prototype, {
                    delete: function(e) {
                        var t = o(this);
                        if (!dg(e)) return !1;
                        var n = Ob(e);
                        return !0 === n ? Lb(t).delete(e) : n && mg(n, t.id) && delete n[t.id]
                    },
                    has: function(e) {
                        var t = o(this);
                        if (!dg(e)) return !1;
                        var n = Ob(e);
                        return !0 === n ? Lb(t).has(e) : n && mg(n, t.id)
                    }
                }), kb(i.prototype, n ? {
                    get: function(e) {
                        var t = o(this);
                        if (dg(e)) {
                            var n = Ob(e);
                            return !0 === n ? Lb(t).get(e) : n ? n[t.id] : void 0
                        }
                    },
                    set: function(e, t) {
                        return a(this, e, t)
                    }
                } : {
                    add: function(e) {
                        return a(this, e, !0)
                    }
                }), i
            }
        },
        Db = (t((function(e) {
            var t, n = Qg.enforce,
                r = !tg.ActiveXObject && "ActiveXObject" in tg,
                i = Object.isExtensible,
                o = function(e) {
                    return function() {
                        return e(this, arguments.length ? arguments[0] : void 0)
                    }
                },
                a = e.exports = function(e, t, n) {
                    var r = -1 !== e.indexOf("Map"),
                        i = -1 !== e.indexOf("Weak"),
                        o = r ? "set" : "add",
                        a = tg[e],
                        s = a && a.prototype,
                        c = a,
                        u = {},
                        l = function(e) {
                            var t = s[e];
                            Zg(s, e, "add" == e ? function(e) {
                                return t.call(this, 0 === e ? 0 : e), this
                            } : "delete" == e ? function(e) {
                                return !(i && !dg(e)) && t.call(this, 0 === e ? 0 : e)
                            } : "get" == e ? function(e) {
                                return i && !dg(e) ? void 0 : t.call(this, 0 === e ? 0 : e)
                            } : "has" == e ? function(e) {
                                return !(i && !dg(e)) && t.call(this, 0 === e ? 0 : e)
                            } : function(e, n) {
                                return t.call(this, 0 === e ? 0 : e, n), this
                            })
                        };
                    if (Av(e, "function" != typeof a || !(i || s.forEach && !ng((function() {
                            (new a).entries().next()
                        }))))) c = n.getConstructor(t, e, r, o), Tb.REQUIRED = !0;
                    else if (Av(e, !0)) {
                        var f = new c,
                            h = f[o](i ? {} : -0, 1) != f,
                            p = ng((function() {
                                f.has(1)
                            })),
                            d = Hm((function(e) {
                                new a(e)
                            })),
                            g = !i && ng((function() {
                                for (var e = new a, t = 5; t--;) e[o](t, t);
                                return !e.has(-0)
                            }));
                        d || ((c = t((function(t, n) {
                            Ab(t, c, e);
                            var i = Sy(new a, t, c);
                            return null != n && xb(n, i[o], i, r), i
                        }))).prototype = s, s.constructor = c), (p || g) && (l("delete"), l("has"), r && l("get")), (g || h) && l(o), i && s.clear && delete s.clear
                    }
                    return u[e] = c, Pv({
                        global: !0,
                        forced: c != a
                    }, u), iy(c, e), i || n.setStrong(c, e, r), c
                }("WeakMap", o, Ub);
            if (Mg && r) {
                t = Ub.getConstructor(o, "WeakMap", !0), Tb.REQUIRED = !0;
                var s = a.prototype,
                    c = s.delete,
                    u = s.has,
                    l = s.get,
                    f = s.set;
                kb(s, {
                    delete: function(e) {
                        if (dg(e) && !i(e)) {
                            var r = n(this);
                            return r.frozen || (r.frozen = new t), c.call(this, e) || r.frozen.delete(e)
                        }
                        return c.call(this, e)
                    },
                    has: function(e) {
                        if (dg(e) && !i(e)) {
                            var r = n(this);
                            return r.frozen || (r.frozen = new t), u.call(this, e) || r.frozen.has(e)
                        }
                        return u.call(this, e)
                    },
                    get: function(e) {
                        if (dg(e) && !i(e)) {
                            var r = n(this);
                            return r.frozen || (r.frozen = new t), u.call(this, e) ? l.call(this, e) : r.frozen.get(e)
                        }
                        return l.call(this, e)
                    },
                    set: function(e, r) {
                        if (dg(e) && !i(e)) {
                            var o = n(this);
                            o.frozen || (o.frozen = new t), u.call(this, e) ? f.call(this, e, r) : o.frozen.set(e, r)
                        } else f.call(this, e, r);
                        return this
                    }
                })
            }
        })), {
            CSSRuleList: 0,
            CSSStyleDeclaration: 0,
            CSSValueList: 0,
            ClientRectList: 0,
            DOMRectList: 0,
            DOMStringList: 0,
            DOMTokenList: 1,
            DataTransferItemList: 0,
            FileList: 0,
            HTMLAllCollection: 0,
            HTMLCollection: 0,
            HTMLFormElement: 0,
            HTMLSelectElement: 0,
            MediaList: 0,
            MimeTypeArray: 0,
            NamedNodeMap: 0,
            NodeList: 1,
            PaintRequestList: 0,
            Plugin: 0,
            PluginArray: 0,
            SVGLengthList: 0,
            SVGNumberList: 0,
            SVGPathSegList: 0,
            SVGPointList: 0,
            SVGStringList: 0,
            SVGTransformList: 0,
            SourceBufferList: 0,
            StyleSheetList: 0,
            TextTrackCueList: 0,
            TextTrackList: 0,
            TouchList: 0
        }),
        Fb = Dv("iterator"),
        Bb = Dv("toStringTag"),
        qb = vy.values;
    for (var Hb in Db) {
        var Vb = tg[Hb],
            Wb = Vb && Vb.prototype;
        if (Wb) {
            if (Wb[Fb] !== qb) try {
                Ag(Wb, Fb, qb)
            } catch (e) {
                Wb[Fb] = qb
            }
            if (Wb[Bb] || Ag(Wb, Bb, Hb), Db[Hb])
                for (var zb in vy)
                    if (Wb[zb] !== vy[zb]) try {
                        Ag(Wb, zb, vy[zb])
                    } catch (e) {
                        Wb[zb] = vy[zb]
                    }
        }
    }
    var Yb = nm.every,
        $b = my("every"),
        Gb = am("every");
    Pv({
        target: "Array",
        proto: !0,
        forced: !$b || !Gb
    }, {
        every: function(e) {
            return Yb(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var Kb = nm.forEach,
        Xb = my("forEach"),
        Jb = am("forEach"),
        Qb = Xb && Jb ? [].forEach : function(e) {
            return Kb(this, e, arguments.length > 1 ? arguments[1] : void 0)
        };
    Pv({
        target: "Array",
        proto: !0,
        forced: [].forEach != Qb
    }, {
        forEach: Qb
    });
    var Zb = hv.indexOf,
        ew = [].indexOf,
        tw = !!ew && 1 / [1].indexOf(1, -0) < 0,
        nw = my("indexOf"),
        rw = am("indexOf", {
            ACCESSORS: !0,
            1: 0
        });
    Pv({
        target: "Array",
        proto: !0,
        forced: tw || !nw || !rw
    }, {
        indexOf: function(e) {
            return tw ? ew.apply(this, arguments) || 0 : Zb(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var iw = Object.assign,
        ow = Object.defineProperty,
        aw = !iw || ng((function() {
            if (rg && 1 !== iw({
                    b: 1
                }, iw(ow({}, "a", {
                    enumerable: !0,
                    get: function() {
                        ow(this, "b", {
                            value: 3,
                            enumerable: !1
                        })
                    }
                }), {
                    b: 2
                })).b) return !0;
            var e = {},
                t = {},
                n = Symbol();
            return e[n] = 7, "abcdefghijklmnopqrst".split("").forEach((function(e) {
                t[e] = e
            })), 7 != iw({}, e)[n] || "abcdefghijklmnopqrst" != fm(iw({}, t)).join("")
        })) ? function(e, t) {
            for (var n = jv(e), r = arguments.length, i = 1, o = yv.f, a = ag.f; r > i;)
                for (var s, c = fg(arguments[i++]), u = o ? fm(c).concat(o(c)) : fm(c), l = u.length, f = 0; l > f;) s = u[f++], rg && !a.call(c, s) || (n[s] = c[s]);
            return n
        } : iw;
    Pv({
        target: "Object",
        stat: !0,
        forced: Object.assign !== aw
    }, {
        assign: aw
    });
    var sw = Dv("species"),
        cw = function(e, t) {
            var n, r = Sg(e).constructor;
            return void 0 === r || null == (n = Sg(r)[sw]) ? t : Qv(n)
        },
        uw = lb.charAt,
        lw = function(e, t, n) {
            return t + (n ? uw(e, t).length : 1)
        },
        fw = [].push,
        hw = Math.min,
        pw = !ng((function() {
            return !RegExp(4294967295, "y")
        }));
    wb("split", 2, (function(e, t, n) {
        var r;
        return r = "c" == "abbc".split(/(b)*/)[1] || 4 != "test".split(/(?:)/, -1).length || 2 != "ab".split(/(?:ab)*/).length || 4 != ".".split(/(.?)(.?)/).length || ".".split(/()()/).length > 1 || "".split(/.?/).length ? function(e, n) {
            var r = String(hg(this)),
                i = void 0 === n ? 4294967295 : n >>> 0;
            if (0 === i) return [];
            if (void 0 === e) return [r];
            if (!ob(e)) return t.call(r, e, i);
            for (var o, a, s, c = [], u = (e.ignoreCase ? "i" : "") + (e.multiline ? "m" : "") + (e.unicode ? "u" : "") + (e.sticky ? "y" : ""), l = 0, f = new RegExp(e.source, u + "g");
                (o = Zy.call(f, r)) && !((a = f.lastIndex) > l && (c.push(r.slice(l, o.index)), o.length > 1 && o.index < r.length && fw.apply(c, o.slice(1)), s = o[0].length, l = a, c.length >= i));) f.lastIndex === o.index && f.lastIndex++;
            return l === r.length ? !s && f.test("") || c.push("") : c.push(r.slice(l)), c.length > i ? c.slice(0, i) : c
        } : "0".split(void 0, 0).length ? function(e, n) {
            return void 0 === e && 0 === n ? [] : t.call(this, e, n)
        } : t, [function(t, n) {
            var i = hg(this),
                o = null == t ? void 0 : t[e];
            return void 0 !== o ? o.call(t, i, n) : r.call(String(i), t, n)
        }, function(e, i) {
            var o = n(r, e, this, i, r !== t);
            if (o.done) return o.value;
            var a = Sg(e),
                s = String(this),
                c = cw(a, RegExp),
                u = a.unicode,
                l = (a.ignoreCase ? "i" : "") + (a.multiline ? "m" : "") + (a.unicode ? "u" : "") + (pw ? "y" : "g"),
                f = new c(pw ? a : "^(?:" + a.source + ")", l),
                h = void 0 === i ? 4294967295 : i >>> 0;
            if (0 === h) return [];
            if (0 === s.length) return null === Eb(f, s) ? [s] : [];
            for (var p = 0, d = 0, g = []; d < s.length;) {
                f.lastIndex = pw ? d : 0;
                var v, m = Eb(f, pw ? s : s.slice(d));
                if (null === m || (v = hw(sv(f.lastIndex + (pw ? 0 : d)), s.length)) === p) d = lw(s, d, u);
                else {
                    if (g.push(s.slice(p, d)), g.length === h) return g;
                    for (var y = 1; y <= m.length - 1; y++)
                        if (g.push(m[y]), g.length === h) return g;
                    d = p = v
                }
            }
            return g.push(s.slice(p)), g
        }]
    }), !pw);
    var dw = Py.trim;
    for (var gw in Pv({
            target: "String",
            proto: !0,
            forced: function(e) {
                return ng((function() {
                    return !!"\t\n\v\f\r                　\u2028\u2029\ufeff" [e]() || "​᠎" != "​᠎" [e]() || "\t\n\v\f\r                　\u2028\u2029\ufeff" [e].name !== e
                }))
            }("trim")
        }, {
            trim: function() {
                return dw(this)
            }
        }), Db) {
        var vw = tg[gw],
            mw = vw && vw.prototype;
        if (mw && mw.forEach !== Qb) try {
            Ag(mw, "forEach", Qb)
        } catch (e) {
            mw.forEach = Qb
        }
    }
    var yw = Dv("iterator"),
        bw = !ng((function() {
            var e = new URL("b?a=1&b=2&c=3", "http://a"),
                t = e.searchParams,
                n = "";
            return e.pathname = "c%20d", t.forEach((function(e, r) {
                t.delete("b"), n += r + e
            })), !t.sort || "http://a/c%20d?a=1&c=3" !== e.href || "3" !== t.get("c") || "a=1" !== String(new URLSearchParams("?a=1")) || !t[yw] || "a" !== new URL("https://a@b").username || "b" !== new URLSearchParams(new URLSearchParams("a=b")).get("a") || "xn--e1aybc" !== new URL("http://тест").host || "#%D0%B1" !== new URL("http://a#б").hash || "a1c3" !== n || "x" !== new URL("http://x", void 0).host
        })),
        ww = /[^\0-\u007E]/,
        _w = /[.\u3002\uFF0E\uFF61]/g,
        Ew = Math.floor,
        kw = String.fromCharCode,
        Sw = function(e) {
            return e + 22 + 75 * (e < 26)
        },
        Tw = function(e, t, n) {
            var r = 0;
            for (e = n ? Ew(e / 700) : e >> 1, e += Ew(e / t); e > 455; r += 36) e = Ew(e / 35);
            return Ew(r + 36 * e / (e + 38))
        },
        xw = function(e) {
            var t, n, r = [],
                i = (e = function(e) {
                    for (var t = [], n = 0, r = e.length; n < r;) {
                        var i = e.charCodeAt(n++);
                        if (i >= 55296 && i <= 56319 && n < r) {
                            var o = e.charCodeAt(n++);
                            56320 == (64512 & o) ? t.push(((1023 & i) << 10) + (1023 & o) + 65536) : (t.push(i), n--)
                        } else t.push(i)
                    }
                    return t
                }(e)).length,
                o = 128,
                a = 0,
                s = 72;
            for (t = 0; t < e.length; t++)(n = e[t]) < 128 && r.push(kw(n));
            var c = r.length,
                u = c;
            for (c && r.push("-"); u < i;) {
                var l = 2147483647;
                for (t = 0; t < e.length; t++)(n = e[t]) >= o && n < l && (l = n);
                var f = u + 1;
                if (l - o > Ew((2147483647 - a) / f)) throw RangeError("Overflow: input needs wider integers to process");
                for (a += (l - o) * f, o = l, t = 0; t < e.length; t++) {
                    if ((n = e[t]) < o && ++a > 2147483647) throw RangeError("Overflow: input needs wider integers to process");
                    if (n == o) {
                        for (var h = a, p = 36;; p += 36) {
                            var d = p <= s ? 1 : p >= s + 26 ? 26 : p - s;
                            if (h < d) break;
                            var g = h - d,
                                v = 36 - d;
                            r.push(kw(Sw(d + g % v))), h = Ew(g / v)
                        }
                        r.push(kw(Sw(h))), s = Tw(a, f, u == c), a = 0, ++u
                    }
                }++a, ++o
            }
            return r.join("")
        },
        Aw = function(e) {
            var t = Mm(e);
            if ("function" != typeof t) throw TypeError(String(e) + " is not iterable");
            return Sg(t.call(e))
        },
        Ow = nv("fetch"),
        Pw = nv("Headers"),
        Iw = Dv("iterator"),
        jw = Qg.set,
        Cw = Qg.getterFor("URLSearchParams"),
        Rw = Qg.getterFor("URLSearchParamsIterator"),
        Lw = /\+/g,
        Nw = Array(4),
        Mw = function(e) {
            return Nw[e - 1] || (Nw[e - 1] = RegExp("((?:%[\\da-f]{2}){" + e + "})", "gi"))
        },
        Uw = function(e) {
            try {
                return decodeURIComponent(e)
            } catch (t) {
                return e
            }
        },
        Dw = function(e) {
            var t = e.replace(Lw, " "),
                n = 4;
            try {
                return decodeURIComponent(t)
            } catch (e) {
                for (; n;) t = t.replace(Mw(n--), Uw);
                return t
            }
        },
        Fw = /[!'()~]|%20/g,
        Bw = {
            "!": "%21",
            "'": "%27",
            "(": "%28",
            ")": "%29",
            "~": "%7E",
            "%20": "+"
        },
        qw = function(e) {
            return Bw[e]
        },
        Hw = function(e) {
            return encodeURIComponent(e).replace(Fw, qw)
        },
        Vw = function(e, t) {
            if (t)
                for (var n, r, i = t.split("&"), o = 0; o < i.length;)(n = i[o++]).length && (r = n.split("="), e.push({
                    key: Dw(r.shift()),
                    value: Dw(r.join("="))
                }))
        },
        Ww = function(e) {
            this.entries.length = 0, Vw(this.entries, e)
        },
        zw = function(e, t) {
            if (e < t) throw TypeError("Not enough arguments")
        },
        Yw = sy((function(e, t) {
            jw(this, {
                type: "URLSearchParamsIterator",
                iterator: Aw(Cw(e).entries),
                kind: t
            })
        }), "Iterator", (function() {
            var e = Rw(this),
                t = e.kind,
                n = e.iterator.next(),
                r = n.value;
            return n.done || (n.value = "keys" === t ? r.key : "values" === t ? r.value : [r.key, r.value]), n
        })),
        $w = function() {
            Ab(this, $w, "URLSearchParams");
            var e, t, n, r, i, o, a, s, c, u = arguments.length > 0 ? arguments[0] : void 0,
                l = this,
                f = [];
            if (jw(l, {
                    type: "URLSearchParams",
                    entries: f,
                    updateURL: function() {},
                    updateSearchParams: Ww
                }), void 0 !== u)
                if (dg(u))
                    if ("function" == typeof(e = Mm(u)))
                        for (n = (t = e.call(u)).next; !(r = n.call(t)).done;) {
                            if ((a = (o = (i = Aw(Sg(r.value))).next).call(i)).done || (s = o.call(i)).done || !o.call(i).done) throw TypeError("Expected sequence with length 2");
                            f.push({
                                key: a.value + "",
                                value: s.value + ""
                            })
                        } else
                            for (c in u) mg(u, c) && f.push({
                                key: c,
                                value: u[c] + ""
                            });
                    else Vw(f, "string" == typeof u ? "?" === u.charAt(0) ? u.slice(1) : u : u + "")
        },
        Gw = $w.prototype;
    kb(Gw, {
        append: function(e, t) {
            zw(arguments.length, 2);
            var n = Cw(this);
            n.entries.push({
                key: e + "",
                value: t + ""
            }), n.updateURL()
        },
        delete: function(e) {
            zw(arguments.length, 1);
            for (var t = Cw(this), n = t.entries, r = e + "", i = 0; i < n.length;) n[i].key === r ? n.splice(i, 1) : i++;
            t.updateURL()
        },
        get: function(e) {
            zw(arguments.length, 1);
            for (var t = Cw(this).entries, n = e + "", r = 0; r < t.length; r++)
                if (t[r].key === n) return t[r].value;
            return null
        },
        getAll: function(e) {
            zw(arguments.length, 1);
            for (var t = Cw(this).entries, n = e + "", r = [], i = 0; i < t.length; i++) t[i].key === n && r.push(t[i].value);
            return r
        },
        has: function(e) {
            zw(arguments.length, 1);
            for (var t = Cw(this).entries, n = e + "", r = 0; r < t.length;)
                if (t[r++].key === n) return !0;
            return !1
        },
        set: function(e, t) {
            zw(arguments.length, 1);
            for (var n, r = Cw(this), i = r.entries, o = !1, a = e + "", s = t + "", c = 0; c < i.length; c++)(n = i[c]).key === a && (o ? i.splice(c--, 1) : (o = !0, n.value = s));
            o || i.push({
                key: a,
                value: s
            }), r.updateURL()
        },
        sort: function() {
            var e, t, n, r = Cw(this),
                i = r.entries,
                o = i.slice();
            for (i.length = 0, n = 0; n < o.length; n++) {
                for (e = o[n], t = 0; t < n; t++)
                    if (i[t].key > e.key) {
                        i.splice(t, 0, e);
                        break
                    } t === n && i.push(e)
            }
            r.updateURL()
        },
        forEach: function(e) {
            for (var t, n = Cw(this).entries, r = Zv(e, arguments.length > 1 ? arguments[1] : void 0, 3), i = 0; i < n.length;) r((t = n[i++]).value, t.key, this)
        },
        keys: function() {
            return new Yw(this, "keys")
        },
        values: function() {
            return new Yw(this, "values")
        },
        entries: function() {
            return new Yw(this, "entries")
        }
    }, {
        enumerable: !0
    }), Zg(Gw, Iw, Gw.entries), Zg(Gw, "toString", (function() {
        for (var e, t = Cw(this).entries, n = [], r = 0; r < t.length;) e = t[r++], n.push(Hw(e.key) + "=" + Hw(e.value));
        return n.join("&")
    }), {
        enumerable: !0
    }), iy($w, "URLSearchParams"), Pv({
        global: !0,
        forced: !bw
    }, {
        URLSearchParams: $w
    }), bw || "function" != typeof Ow || "function" != typeof Pw || Pv({
        global: !0,
        enumerable: !0,
        forced: !0
    }, {
        fetch: function(e) {
            var t, n, r, i = [e];
            return arguments.length > 1 && (t = arguments[1], dg(t) && (n = t.body, "URLSearchParams" === Lm(n) && ((r = t.headers ? new Pw(t.headers) : new Pw).has("content-type") || r.set("content-type", "application/x-www-form-urlencoded;charset=UTF-8"), t = ym(t, {
                body: sg(0, String(n)),
                headers: sg(0, r)
            }))), i.push(t)), Ow.apply(this, i)
        }
    });
    var Kw = {
            URLSearchParams: $w,
            getState: Cw
        },
        Xw = lb.codeAt,
        Jw = tg.URL,
        Qw = Kw.URLSearchParams,
        Zw = Kw.getState,
        e_ = Qg.set,
        t_ = Qg.getterFor("URL"),
        n_ = Math.floor,
        r_ = Math.pow,
        i_ = /[A-Za-z]/,
        o_ = /[\d+-.A-Za-z]/,
        a_ = /\d/,
        s_ = /^(0x|0X)/,
        c_ = /^[0-7]+$/,
        u_ = /^\d+$/,
        l_ = /^[\dA-Fa-f]+$/,
        f_ = /[\u0000\u0009\u000A\u000D #%/:?@[\\]]/,
        h_ = /[\u0000\u0009\u000A\u000D #/:?@[\\]]/,
        p_ = /^[\u0000-\u001F ]+|[\u0000-\u001F ]+$/g,
        d_ = /[\u0009\u000A\u000D]/g,
        g_ = function(e, t) {
            var n, r, i;
            if ("[" == t.charAt(0)) {
                if ("]" != t.charAt(t.length - 1)) return "Invalid host";
                if (!(n = m_(t.slice(1, -1)))) return "Invalid host";
                e.host = n
            } else if (T_(e)) {
                if (t = function(e) {
                        var t, n, r = [],
                            i = e.toLowerCase().replace(_w, ".").split(".");
                        for (t = 0; t < i.length; t++) n = i[t], r.push(ww.test(n) ? "xn--" + xw(n) : n);
                        return r.join(".")
                    }(t), f_.test(t)) return "Invalid host";
                if (null === (n = v_(t))) return "Invalid host";
                e.host = n
            } else {
                if (h_.test(t)) return "Invalid host";
                for (n = "", r = Um(t), i = 0; i < r.length; i++) n += k_(r[i], b_);
                e.host = n
            }
        },
        v_ = function(e) {
            var t, n, r, i, o, a, s, c = e.split(".");
            if (c.length && "" == c[c.length - 1] && c.pop(), (t = c.length) > 4) return e;
            for (n = [], r = 0; r < t; r++) {
                if ("" == (i = c[r])) return e;
                if (o = 10, i.length > 1 && "0" == i.charAt(0) && (o = s_.test(i) ? 16 : 8, i = i.slice(8 == o ? 1 : 2)), "" === i) a = 0;
                else {
                    if (!(10 == o ? u_ : 8 == o ? c_ : l_).test(i)) return e;
                    a = parseInt(i, o)
                }
                n.push(a)
            }
            for (r = 0; r < t; r++)
                if (a = n[r], r == t - 1) {
                    if (a >= r_(256, 5 - t)) return null
                } else if (a > 255) return null;
            for (s = n.pop(), r = 0; r < n.length; r++) s += n[r] * r_(256, 3 - r);
            return s
        },
        m_ = function(e) {
            var t, n, r, i, o, a, s, c = [0, 0, 0, 0, 0, 0, 0, 0],
                u = 0,
                l = null,
                f = 0,
                h = function() {
                    return e.charAt(f)
                };
            if (":" == h()) {
                if (":" != e.charAt(1)) return;
                f += 2, l = ++u
            }
            for (; h();) {
                if (8 == u) return;
                if (":" != h()) {
                    for (t = n = 0; n < 4 && l_.test(h());) t = 16 * t + parseInt(h(), 16), f++, n++;
                    if ("." == h()) {
                        if (0 == n) return;
                        if (f -= n, u > 6) return;
                        for (r = 0; h();) {
                            if (i = null, r > 0) {
                                if (!("." == h() && r < 4)) return;
                                f++
                            }
                            if (!a_.test(h())) return;
                            for (; a_.test(h());) {
                                if (o = parseInt(h(), 10), null === i) i = o;
                                else {
                                    if (0 == i) return;
                                    i = 10 * i + o
                                }
                                if (i > 255) return;
                                f++
                            }
                            c[u] = 256 * c[u] + i, 2 != ++r && 4 != r || u++
                        }
                        if (4 != r) return;
                        break
                    }
                    if (":" == h()) {
                        if (f++, !h()) return
                    } else if (h()) return;
                    c[u++] = t
                } else {
                    if (null !== l) return;
                    f++, l = ++u
                }
            }
            if (null !== l)
                for (a = u - l, u = 7; 0 != u && a > 0;) s = c[u], c[u--] = c[l + a - 1], c[l + --a] = s;
            else if (8 != u) return;
            return c
        },
        y_ = function(e) {
            var t, n, r, i;
            if ("number" == typeof e) {
                for (t = [], n = 0; n < 4; n++) t.unshift(e % 256), e = n_(e / 256);
                return t.join(".")
            }
            if ("object" == typeof e) {
                for (t = "", r = function(e) {
                        for (var t = null, n = 1, r = null, i = 0, o = 0; o < 8; o++) 0 !== e[o] ? (i > n && (t = r, n = i), r = null, i = 0) : (null === r && (r = o), ++i);
                        return i > n && (t = r, n = i), t
                    }(e), n = 0; n < 8; n++) i && 0 === e[n] || (i && (i = !1), r === n ? (t += n ? ":" : "::", i = !0) : (t += e[n].toString(16), n < 7 && (t += ":")));
                return "[" + t + "]"
            }
            return e
        },
        b_ = {},
        w_ = aw({}, b_, {
            " ": 1,
            '"': 1,
            "<": 1,
            ">": 1,
            "`": 1
        }),
        __ = aw({}, w_, {
            "#": 1,
            "?": 1,
            "{": 1,
            "}": 1
        }),
        E_ = aw({}, __, {
            "/": 1,
            ":": 1,
            ";": 1,
            "=": 1,
            "@": 1,
            "[": 1,
            "\\": 1,
            "]": 1,
            "^": 1,
            "|": 1
        }),
        k_ = function(e, t) {
            var n = Xw(e, 0);
            return n > 32 && n < 127 && !mg(t, e) ? e : encodeURIComponent(e)
        },
        S_ = {
            ftp: 21,
            file: null,
            http: 80,
            https: 443,
            ws: 80,
            wss: 443
        },
        T_ = function(e) {
            return mg(S_, e.scheme)
        },
        x_ = function(e) {
            return "" != e.username || "" != e.password
        },
        A_ = function(e) {
            return !e.host || e.cannotBeABaseURL || "file" == e.scheme
        },
        O_ = function(e, t) {
            var n;
            return 2 == e.length && i_.test(e.charAt(0)) && (":" == (n = e.charAt(1)) || !t && "|" == n)
        },
        P_ = function(e) {
            var t;
            return e.length > 1 && O_(e.slice(0, 2)) && (2 == e.length || "/" === (t = e.charAt(2)) || "\\" === t || "?" === t || "#" === t)
        },
        I_ = function(e) {
            var t = e.path,
                n = t.length;
            !n || "file" == e.scheme && 1 == n && O_(t[0], !0) || t.pop()
        },
        j_ = function(e) {
            return "." === e || "%2e" === e.toLowerCase()
        },
        C_ = {},
        R_ = {},
        L_ = {},
        N_ = {},
        M_ = {},
        U_ = {},
        D_ = {},
        F_ = {},
        B_ = {},
        q_ = {},
        H_ = {},
        V_ = {},
        W_ = {},
        z_ = {},
        Y_ = {},
        $_ = {},
        G_ = {},
        K_ = {},
        X_ = {},
        J_ = {},
        Q_ = {},
        Z_ = function(e, t, n, r) {
            var i, o, a, s, c, u = n || C_,
                l = 0,
                f = "",
                h = !1,
                p = !1,
                d = !1;
            for (n || (e.scheme = "", e.username = "", e.password = "", e.host = null, e.port = null, e.path = [], e.query = null, e.fragment = null, e.cannotBeABaseURL = !1, t = t.replace(p_, "")), t = t.replace(d_, ""), i = Um(t); l <= i.length;) {
                switch (o = i[l], u) {
                    case C_:
                        if (!o || !i_.test(o)) {
                            if (n) return "Invalid scheme";
                            u = L_;
                            continue
                        }
                        f += o.toLowerCase(), u = R_;
                        break;
                    case R_:
                        if (o && (o_.test(o) || "+" == o || "-" == o || "." == o)) f += o.toLowerCase();
                        else {
                            if (":" != o) {
                                if (n) return "Invalid scheme";
                                f = "", u = L_, l = 0;
                                continue
                            }
                            if (n && (T_(e) != mg(S_, f) || "file" == f && (x_(e) || null !== e.port) || "file" == e.scheme && !e.host)) return;
                            if (e.scheme = f, n) return void(T_(e) && S_[e.scheme] == e.port && (e.port = null));
                            f = "", "file" == e.scheme ? u = z_ : T_(e) && r && r.scheme == e.scheme ? u = N_ : T_(e) ? u = F_ : "/" == i[l + 1] ? (u = M_, l++) : (e.cannotBeABaseURL = !0, e.path.push(""), u = X_)
                        }
                        break;
                    case L_:
                        if (!r || r.cannotBeABaseURL && "#" != o) return "Invalid scheme";
                        if (r.cannotBeABaseURL && "#" == o) {
                            e.scheme = r.scheme, e.path = r.path.slice(), e.query = r.query, e.fragment = "", e.cannotBeABaseURL = !0, u = Q_;
                            break
                        }
                        u = "file" == r.scheme ? z_ : U_;
                        continue;
                    case N_:
                        if ("/" != o || "/" != i[l + 1]) {
                            u = U_;
                            continue
                        }
                        u = B_, l++;
                        break;
                    case M_:
                        if ("/" == o) {
                            u = q_;
                            break
                        }
                        u = K_;
                        continue;
                    case U_:
                        if (e.scheme = r.scheme, null == o) e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = r.query;
                        else if ("/" == o || "\\" == o && T_(e)) u = D_;
                        else if ("?" == o) e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = "", u = J_;
                        else {
                            if ("#" != o) {
                                e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.path.pop(), u = K_;
                                continue
                            }
                            e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, e.path = r.path.slice(), e.query = r.query, e.fragment = "", u = Q_
                        }
                        break;
                    case D_:
                        if (!T_(e) || "/" != o && "\\" != o) {
                            if ("/" != o) {
                                e.username = r.username, e.password = r.password, e.host = r.host, e.port = r.port, u = K_;
                                continue
                            }
                            u = q_
                        } else u = B_;
                        break;
                    case F_:
                        if (u = B_, "/" != o || "/" != f.charAt(l + 1)) continue;
                        l++;
                        break;
                    case B_:
                        if ("/" != o && "\\" != o) {
                            u = q_;
                            continue
                        }
                        break;
                    case q_:
                        if ("@" == o) {
                            h && (f = "%40" + f), h = !0, a = Um(f);
                            for (var g = 0; g < a.length; g++) {
                                var v = a[g];
                                if (":" != v || d) {
                                    var m = k_(v, E_);
                                    d ? e.password += m : e.username += m
                                } else d = !0
                            }
                            f = ""
                        } else if (null == o || "/" == o || "?" == o || "#" == o || "\\" == o && T_(e)) {
                            if (h && "" == f) return "Invalid authority";
                            l -= Um(f).length + 1, f = "", u = H_
                        } else f += o;
                        break;
                    case H_:
                    case V_:
                        if (n && "file" == e.scheme) {
                            u = $_;
                            continue
                        }
                        if (":" != o || p) {
                            if (null == o || "/" == o || "?" == o || "#" == o || "\\" == o && T_(e)) {
                                if (T_(e) && "" == f) return "Invalid host";
                                if (n && "" == f && (x_(e) || null !== e.port)) return;
                                if (s = g_(e, f)) return s;
                                if (f = "", u = G_, n) return;
                                continue
                            }
                            "[" == o ? p = !0 : "]" == o && (p = !1), f += o
                        } else {
                            if ("" == f) return "Invalid host";
                            if (s = g_(e, f)) return s;
                            if (f = "", u = W_, n == V_) return
                        }
                        break;
                    case W_:
                        if (!a_.test(o)) {
                            if (null == o || "/" == o || "?" == o || "#" == o || "\\" == o && T_(e) || n) {
                                if ("" != f) {
                                    var y = parseInt(f, 10);
                                    if (y > 65535) return "Invalid port";
                                    e.port = T_(e) && y === S_[e.scheme] ? null : y, f = ""
                                }
                                if (n) return;
                                u = G_;
                                continue
                            }
                            return "Invalid port"
                        }
                        f += o;
                        break;
                    case z_:
                        if (e.scheme = "file", "/" == o || "\\" == o) u = Y_;
                        else {
                            if (!r || "file" != r.scheme) {
                                u = K_;
                                continue
                            }
                            if (null == o) e.host = r.host, e.path = r.path.slice(), e.query = r.query;
                            else if ("?" == o) e.host = r.host, e.path = r.path.slice(), e.query = "", u = J_;
                            else {
                                if ("#" != o) {
                                    P_(i.slice(l).join("")) || (e.host = r.host, e.path = r.path.slice(), I_(e)), u = K_;
                                    continue
                                }
                                e.host = r.host, e.path = r.path.slice(), e.query = r.query, e.fragment = "", u = Q_
                            }
                        }
                        break;
                    case Y_:
                        if ("/" == o || "\\" == o) {
                            u = $_;
                            break
                        }
                        r && "file" == r.scheme && !P_(i.slice(l).join("")) && (O_(r.path[0], !0) ? e.path.push(r.path[0]) : e.host = r.host), u = K_;
                        continue;
                    case $_:
                        if (null == o || "/" == o || "\\" == o || "?" == o || "#" == o) {
                            if (!n && O_(f)) u = K_;
                            else if ("" == f) {
                                if (e.host = "", n) return;
                                u = G_
                            } else {
                                if (s = g_(e, f)) return s;
                                if ("localhost" == e.host && (e.host = ""), n) return;
                                f = "", u = G_
                            }
                            continue
                        }
                        f += o;
                        break;
                    case G_:
                        if (T_(e)) {
                            if (u = K_, "/" != o && "\\" != o) continue
                        } else if (n || "?" != o)
                            if (n || "#" != o) {
                                if (null != o && (u = K_, "/" != o)) continue
                            } else e.fragment = "", u = Q_;
                        else e.query = "", u = J_;
                        break;
                    case K_:
                        if (null == o || "/" == o || "\\" == o && T_(e) || !n && ("?" == o || "#" == o)) {
                            if (".." === (c = (c = f).toLowerCase()) || "%2e." === c || ".%2e" === c || "%2e%2e" === c ? (I_(e), "/" == o || "\\" == o && T_(e) || e.path.push("")) : j_(f) ? "/" == o || "\\" == o && T_(e) || e.path.push("") : ("file" == e.scheme && !e.path.length && O_(f) && (e.host && (e.host = ""), f = f.charAt(0) + ":"), e.path.push(f)), f = "", "file" == e.scheme && (null == o || "?" == o || "#" == o))
                                for (; e.path.length > 1 && "" === e.path[0];) e.path.shift();
                            "?" == o ? (e.query = "", u = J_) : "#" == o && (e.fragment = "", u = Q_)
                        } else f += k_(o, __);
                        break;
                    case X_:
                        "?" == o ? (e.query = "", u = J_) : "#" == o ? (e.fragment = "", u = Q_) : null != o && (e.path[0] += k_(o, b_));
                        break;
                    case J_:
                        n || "#" != o ? null != o && ("'" == o && T_(e) ? e.query += "%27" : e.query += "#" == o ? "%23" : k_(o, b_)) : (e.fragment = "", u = Q_);
                        break;
                    case Q_:
                        null != o && (e.fragment += k_(o, w_))
                }
                l++
            }
        },
        eE = function(e) {
            var t, n, r = Ab(this, eE, "URL"),
                i = arguments.length > 1 ? arguments[1] : void 0,
                o = String(e),
                a = e_(r, {
                    type: "URL"
                });
            if (void 0 !== i)
                if (i instanceof eE) t = t_(i);
                else if (n = Z_(t = {}, String(i))) throw TypeError(n);
            if (n = Z_(a, o, null, t)) throw TypeError(n);
            var s = a.searchParams = new Qw,
                c = Zw(s);
            c.updateSearchParams(a.query), c.updateURL = function() {
                a.query = String(s) || null
            }, rg || (r.href = nE.call(r), r.origin = rE.call(r), r.protocol = iE.call(r), r.username = oE.call(r), r.password = aE.call(r), r.host = sE.call(r), r.hostname = cE.call(r), r.port = uE.call(r), r.pathname = lE.call(r), r.search = fE.call(r), r.searchParams = hE.call(r), r.hash = pE.call(r))
        },
        tE = eE.prototype,
        nE = function() {
            var e = t_(this),
                t = e.scheme,
                n = e.username,
                r = e.password,
                i = e.host,
                o = e.port,
                a = e.path,
                s = e.query,
                c = e.fragment,
                u = t + ":";
            return null !== i ? (u += "//", x_(e) && (u += n + (r ? ":" + r : "") + "@"), u += y_(i), null !== o && (u += ":" + o)) : "file" == t && (u += "//"), u += e.cannotBeABaseURL ? a[0] : a.length ? "/" + a.join("/") : "", null !== s && (u += "?" + s), null !== c && (u += "#" + c), u
        },
        rE = function() {
            var e = t_(this),
                t = e.scheme,
                n = e.port;
            if ("blob" == t) try {
                return new URL(t.path[0]).origin
            } catch (e) {
                return "null"
            }
            return "file" != t && T_(e) ? t + "://" + y_(e.host) + (null !== n ? ":" + n : "") : "null"
        },
        iE = function() {
            return t_(this).scheme + ":"
        },
        oE = function() {
            return t_(this).username
        },
        aE = function() {
            return t_(this).password
        },
        sE = function() {
            var e = t_(this),
                t = e.host,
                n = e.port;
            return null === t ? "" : null === n ? y_(t) : y_(t) + ":" + n
        },
        cE = function() {
            var e = t_(this).host;
            return null === e ? "" : y_(e)
        },
        uE = function() {
            var e = t_(this).port;
            return null === e ? "" : String(e)
        },
        lE = function() {
            var e = t_(this),
                t = e.path;
            return e.cannotBeABaseURL ? t[0] : t.length ? "/" + t.join("/") : ""
        },
        fE = function() {
            var e = t_(this).query;
            return e ? "?" + e : ""
        },
        hE = function() {
            return t_(this).searchParams
        },
        pE = function() {
            var e = t_(this).fragment;
            return e ? "#" + e : ""
        },
        dE = function(e, t) {
            return {
                get: e,
                set: t,
                configurable: !0,
                enumerable: !0
            }
        };
    if (rg && hm(tE, {
            href: dE(nE, (function(e) {
                var t = t_(this),
                    n = String(e),
                    r = Z_(t, n);
                if (r) throw TypeError(r);
                Zw(t.searchParams).updateSearchParams(t.query)
            })),
            origin: dE(rE),
            protocol: dE(iE, (function(e) {
                var t = t_(this);
                Z_(t, String(e) + ":", C_)
            })),
            username: dE(oE, (function(e) {
                var t = t_(this),
                    n = Um(String(e));
                if (!A_(t)) {
                    t.username = "";
                    for (var r = 0; r < n.length; r++) t.username += k_(n[r], E_)
                }
            })),
            password: dE(aE, (function(e) {
                var t = t_(this),
                    n = Um(String(e));
                if (!A_(t)) {
                    t.password = "";
                    for (var r = 0; r < n.length; r++) t.password += k_(n[r], E_)
                }
            })),
            host: dE(sE, (function(e) {
                var t = t_(this);
                t.cannotBeABaseURL || Z_(t, String(e), H_)
            })),
            hostname: dE(cE, (function(e) {
                var t = t_(this);
                t.cannotBeABaseURL || Z_(t, String(e), V_)
            })),
            port: dE(uE, (function(e) {
                var t = t_(this);
                A_(t) || ("" == (e = String(e)) ? t.port = null : Z_(t, e, W_))
            })),
            pathname: dE(lE, (function(e) {
                var t = t_(this);
                t.cannotBeABaseURL || (t.path = [], Z_(t, e + "", G_))
            })),
            search: dE(fE, (function(e) {
                var t = t_(this);
                "" == (e = String(e)) ? t.query = null: ("?" == e.charAt(0) && (e = e.slice(1)), t.query = "", Z_(t, e, J_)), Zw(t.searchParams).updateSearchParams(t.query)
            })),
            searchParams: dE(hE),
            hash: dE(pE, (function(e) {
                var t = t_(this);
                "" != (e = String(e)) ? ("#" == e.charAt(0) && (e = e.slice(1)), t.fragment = "", Z_(t, e, Q_)) : t.fragment = null
            }))
        }), Zg(tE, "toJSON", (function() {
            return nE.call(this)
        }), {
            enumerable: !0
        }), Zg(tE, "toString", (function() {
            return nE.call(this)
        }), {
            enumerable: !0
        }), Jw) {
        var gE = Jw.createObjectURL,
            vE = Jw.revokeObjectURL;
        gE && Zg(eE, "createObjectURL", (function(e) {
            return gE.apply(Jw, arguments)
        })), vE && Zg(eE, "revokeObjectURL", (function(e) {
            return vE.apply(Jw, arguments)
        }))
    }
    iy(eE, "URL"), Pv({
        global: !0,
        forced: !bw,
        sham: !rg
    }, {
        URL: eE
    });
    var mE = nm.some,
        yE = my("some"),
        bE = am("some");
    Pv({
        target: "Array",
        proto: !0,
        forced: !yE || !bE
    }, {
        some: function(e) {
            return mE(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var wE = "".repeat || function(e) {
            var t = String(hg(this)),
                n = "",
                r = ov(e);
            if (r < 0 || r == 1 / 0) throw RangeError("Wrong number of repetitions");
            for (; r > 0;
                (r >>>= 1) && (t += t)) 1 & r && (n += t);
            return n
        },
        _E = 1..toFixed,
        EE = Math.floor,
        kE = function(e, t, n) {
            return 0 === t ? n : t % 2 == 1 ? kE(e, t - 1, n * e) : kE(e * e, t / 2, n)
        },
        SE = _E && ("0.000" !== 8e-5.toFixed(3) || "1" !== .9.toFixed(0) || "1.25" !== 1.255.toFixed(2) || "1000000000000000128" !== (0xde0b6b3a7640080).toFixed(0)) || !ng((function() {
            _E.call({})
        }));
    Pv({
        target: "Number",
        proto: !0,
        forced: SE
    }, {
        toFixed: function(e) {
            var t, n, r, i, o = function(e) {
                    if ("number" != typeof e && "Number" != ug(e)) throw TypeError("Incorrect invocation");
                    return +e
                }(this),
                a = ov(e),
                s = [0, 0, 0, 0, 0, 0],
                c = "",
                u = "0",
                l = function(e, t) {
                    for (var n = -1, r = t; ++n < 6;) r += e * s[n], s[n] = r % 1e7, r = EE(r / 1e7)
                },
                f = function(e) {
                    for (var t = 6, n = 0; --t >= 0;) n += s[t], s[t] = EE(n / e), n = n % e * 1e7
                },
                h = function() {
                    for (var e = 6, t = ""; --e >= 0;)
                        if ("" !== t || 0 === e || 0 !== s[e]) {
                            var n = String(s[e]);
                            t = "" === t ? n : t + wE.call("0", 7 - n.length) + n
                        } return t
                };
            if (a < 0 || a > 20) throw RangeError("Incorrect fraction digits");
            if (o != o) return "NaN";
            if (o <= -1e21 || o >= 1e21) return String(o);
            if (o < 0 && (c = "-", o = -o), o > 1e-21)
                if (n = (t = function(e) {
                        for (var t = 0, n = e; n >= 4096;) t += 12, n /= 4096;
                        for (; n >= 2;) t += 1, n /= 2;
                        return t
                    }(o * kE(2, 69, 1)) - 69) < 0 ? o * kE(2, -t, 1) : o / kE(2, t, 1), n *= 4503599627370496, (t = 52 - t) > 0) {
                    for (l(0, n), r = a; r >= 7;) l(1e7, 0), r -= 7;
                    for (l(kE(10, r, 1), 0), r = t - 1; r >= 23;) f(1 << 23), r -= 23;
                    f(1 << r), l(1, 1), f(2), u = h()
                } else l(0, n), l(1 << -t, 0), u = h() + wE.call("0", a);
            return u = a > 0 ? c + ((i = u.length) <= a ? "0." + wE.call("0", a - i) + u : u.slice(0, i - a) + "." + u.slice(i - a)) : c + u
        }
    });
    var TE = ag.f,
        xE = function(e) {
            return function(t) {
                for (var n, r = pg(t), i = fm(r), o = i.length, a = 0, s = []; o > a;) n = i[a++], rg && !TE.call(r, n) || s.push(e ? [n, r[n]] : r[n]);
                return s
            }
        },
        AE = {
            entries: xE(!0),
            values: xE(!1)
        },
        OE = AE.entries;
    Pv({
        target: "Object",
        stat: !0
    }, {
        entries: function(e) {
            return OE(e)
        }
    });
    var PE = AE.values;
    Pv({
        target: "Object",
        stat: !0
    }, {
        values: function(e) {
            return PE(e)
        }
    });
    var IE = Math.max,
        jE = Math.min,
        CE = Math.floor,
        RE = /\$([$&'`]|\d\d?|<[^>]*>)/g,
        LE = /\$([$&'`]|\d\d?)/g;
    wb("replace", 2, (function(e, t, n, r) {
        var i = r.REGEXP_REPLACE_SUBSTITUTES_UNDEFINED_CAPTURE,
            o = r.REPLACE_KEEPS_$0,
            a = i ? "$" : "$0";
        return [function(n, r) {
            var i = hg(this),
                o = null == n ? void 0 : n[e];
            return void 0 !== o ? o.call(n, i, r) : t.call(String(i), n, r)
        }, function(e, r) {
            if (!i && o || "string" == typeof r && -1 === r.indexOf(a)) {
                var c = n(t, e, this, r);
                if (c.done) return c.value
            }
            var u = Sg(e),
                l = String(this),
                f = "function" == typeof r;
            f || (r = String(r));
            var h = u.global;
            if (h) {
                var p = u.unicode;
                u.lastIndex = 0
            }
            for (var d = [];;) {
                var g = Eb(u, l);
                if (null === g) break;
                if (d.push(g), !h) break;
                "" === String(g[0]) && (u.lastIndex = lw(l, sv(u.lastIndex), p))
            }
            for (var v, m = "", y = 0, b = 0; b < d.length; b++) {
                g = d[b];
                for (var w = String(g[0]), _ = IE(jE(ov(g.index), l.length), 0), E = [], k = 1; k < g.length; k++) E.push(void 0 === (v = g[k]) ? v : String(v));
                var S = g.groups;
                if (f) {
                    var T = [w].concat(E, _, l);
                    void 0 !== S && T.push(S);
                    var x = String(r.apply(void 0, T))
                } else x = s(w, l, _, E, S, r);
                _ >= y && (m += l.slice(y, _) + x, y = _ + w.length)
            }
            return m + l.slice(y)
        }];

        function s(e, n, r, i, o, a) {
            var s = r + e.length,
                c = i.length,
                u = LE;
            return void 0 !== o && (o = jv(o), u = RE), t.call(a, u, (function(t, a) {
                var u;
                switch (a.charAt(0)) {
                    case "$":
                        return "$";
                    case "&":
                        return e;
                    case "`":
                        return n.slice(0, r);
                    case "'":
                        return n.slice(s);
                    case "<":
                        u = o[a.slice(1, -1)];
                        break;
                    default:
                        var l = +a;
                        if (0 === l) return t;
                        if (l > c) {
                            var f = CE(l / 10);
                            return 0 === f ? t : f <= c ? void 0 === i[f - 1] ? a.charAt(1) : i[f - 1] + a.charAt(1) : t
                        }
                        u = i[l - 1]
                }
                return void 0 === u ? "" : u
            }))
        }
    }));
    var NE = mv.f,
        ME = {}.toString,
        UE = "object" == typeof window && window && Object.getOwnPropertyNames ? Object.getOwnPropertyNames(window) : [],
        DE = {
            f: function(e) {
                return UE && "[object Window]" == ME.call(e) ? function(e) {
                    try {
                        return NE(e)
                    } catch (e) {
                        return UE.slice()
                    }
                }(e) : NE(pg(e))
            }
        },
        FE = {
            f: Dv
        },
        BE = xg.f,
        qE = nm.forEach,
        HE = Hg("hidden"),
        VE = Dv("toPrimitive"),
        WE = Qg.set,
        zE = Qg.getterFor("Symbol"),
        YE = Object.prototype,
        $E = tg.Symbol,
        GE = nv("JSON", "stringify"),
        KE = kg.f,
        XE = xg.f,
        JE = DE.f,
        QE = ag.f,
        ZE = Ug("symbols"),
        ek = Ug("op-symbols"),
        tk = Ug("string-to-symbol-registry"),
        nk = Ug("symbol-to-string-registry"),
        rk = Ug("wks"),
        ik = tg.QObject,
        ok = !ik || !ik.prototype || !ik.prototype.findChild,
        ak = rg && ng((function() {
            return 7 != ym(XE({}, "a", {
                get: function() {
                    return XE(this, "a", {
                        value: 7
                    }).a
                }
            })).a
        })) ? function(e, t, n) {
            var r = KE(YE, t);
            r && delete YE[t], XE(e, t, n), r && e !== YE && XE(YE, t, r)
        } : XE,
        sk = function(e, t) {
            var n = ZE[e] = ym($E.prototype);
            return WE(n, {
                type: "Symbol",
                tag: e,
                description: t
            }), rg || (n.description = t), n
        },
        ck = Lv ? function(e) {
            return "symbol" == typeof e
        } : function(e) {
            return Object(e) instanceof $E
        },
        uk = function(e, t, n) {
            e === YE && uk(ek, t, n), Sg(e);
            var r = gg(t, !0);
            return Sg(n), mg(ZE, r) ? (n.enumerable ? (mg(e, HE) && e[HE][r] && (e[HE][r] = !1), n = ym(n, {
                enumerable: sg(0, !1)
            })) : (mg(e, HE) || XE(e, HE, sg(1, {})), e[HE][r] = !0), ak(e, r, n)) : XE(e, r, n)
        },
        lk = function(e, t) {
            Sg(e);
            var n = pg(t),
                r = fm(n).concat(dk(n));
            return qE(r, (function(t) {
                rg && !fk.call(n, t) || uk(e, t, n[t])
            })), e
        },
        fk = function(e) {
            var t = gg(e, !0),
                n = QE.call(this, t);
            return !(this === YE && mg(ZE, t) && !mg(ek, t)) && (!(n || !mg(this, t) || !mg(ZE, t) || mg(this, HE) && this[HE][t]) || n)
        },
        hk = function(e, t) {
            var n = pg(e),
                r = gg(t, !0);
            if (n !== YE || !mg(ZE, r) || mg(ek, r)) {
                var i = KE(n, r);
                return !i || !mg(ZE, r) || mg(n, HE) && n[HE][r] || (i.enumerable = !0), i
            }
        },
        pk = function(e) {
            var t = JE(pg(e)),
                n = [];
            return qE(t, (function(e) {
                mg(ZE, e) || mg(Vg, e) || n.push(e)
            })), n
        },
        dk = function(e) {
            var t = e === YE,
                n = JE(t ? ek : pg(e)),
                r = [];
            return qE(n, (function(e) {
                !mg(ZE, e) || t && !mg(YE, e) || r.push(ZE[e])
            })), r
        };
    if (Rv || (Zg(($E = function() {
            if (this instanceof $E) throw TypeError("Symbol is not a constructor");
            var e = arguments.length && void 0 !== arguments[0] ? String(arguments[0]) : void 0,
                t = Bg(e),
                n = function(e) {
                    this === YE && n.call(ek, e), mg(this, HE) && mg(this[HE], t) && (this[HE][t] = !1), ak(this, t, sg(1, e))
                };
            return rg && ok && ak(YE, t, {
                configurable: !0,
                set: n
            }), sk(t, e)
        }).prototype, "toString", (function() {
            return zE(this).tag
        })), Zg($E, "withoutSetter", (function(e) {
            return sk(Bg(e), e)
        })), ag.f = fk, xg.f = uk, kg.f = hk, mv.f = DE.f = pk, yv.f = dk, FE.f = function(e) {
            return sk(Dv(e), e)
        }, rg && (XE($E.prototype, "description", {
            configurable: !0,
            get: function() {
                return zE(this).description
            }
        }), Zg(YE, "propertyIsEnumerable", fk, {
            unsafe: !0
        }))), Pv({
            global: !0,
            wrap: !0,
            forced: !Rv,
            sham: !Rv
        }, {
            Symbol: $E
        }), qE(fm(rk), (function(e) {
            ! function(e) {
                var t = ev.Symbol || (ev.Symbol = {});
                mg(t, e) || BE(t, e, {
                    value: FE.f(e)
                })
            }(e)
        })), Pv({
            target: "Symbol",
            stat: !0,
            forced: !Rv
        }, {
            for: function(e) {
                var t = String(e);
                if (mg(tk, t)) return tk[t];
                var n = $E(t);
                return tk[t] = n, nk[n] = t, n
            },
            keyFor: function(e) {
                if (!ck(e)) throw TypeError(e + " is not a symbol");
                if (mg(nk, e)) return nk[e]
            },
            useSetter: function() {
                ok = !0
            },
            useSimple: function() {
                ok = !1
            }
        }), Pv({
            target: "Object",
            stat: !0,
            forced: !Rv,
            sham: !rg
        }, {
            create: function(e, t) {
                return void 0 === t ? ym(e) : lk(ym(e), t)
            },
            defineProperty: uk,
            defineProperties: lk,
            getOwnPropertyDescriptor: hk
        }), Pv({
            target: "Object",
            stat: !0,
            forced: !Rv
        }, {
            getOwnPropertyNames: pk,
            getOwnPropertySymbols: dk
        }), Pv({
            target: "Object",
            stat: !0,
            forced: ng((function() {
                yv.f(1)
            }))
        }, {
            getOwnPropertySymbols: function(e) {
                return yv.f(jv(e))
            }
        }), GE) {
        var gk = !Rv || ng((function() {
            var e = $E();
            return "[null]" != GE([e]) || "{}" != GE({
                a: e
            }) || "{}" != GE(Object(e))
        }));
        Pv({
            target: "JSON",
            stat: !0,
            forced: gk
        }, {
            stringify: function(e, t, n) {
                for (var r, i = [e], o = 1; arguments.length > o;) i.push(arguments[o++]);
                if (r = t, (dg(t) || void 0 !== e) && !ck(e)) return Iv(t) || (t = function(e, t) {
                    if ("function" == typeof r && (t = r.call(this, e, t)), !ck(t)) return t
                }), i[1] = t, GE.apply(null, i)
            }
        })
    }
    $E.prototype[VE] || Ag($E.prototype, VE, $E.prototype.valueOf), iy($E, "Symbol"), Vg[HE] = !0, Pv({
        target: "Number",
        stat: !0
    }, {
        isNaN: function(e) {
            return e != e
        }
    });
    var vk = kg.f,
        mk = ng((function() {
            vk(1)
        }));

    function yk(e, t) {
        for (var n = 0; n < t.length; n++) {
            var r = t[n];
            r.enumerable = r.enumerable || !1, r.configurable = !0, "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r)
        }
    }

    function bk(e, t, n) {
        return t in e ? Object.defineProperty(e, t, {
            value: n,
            enumerable: !0,
            configurable: !0,
            writable: !0
        }) : e[t] = n, e
    }

    function wk(e, t) {
        var n = Object.keys(e);
        if (Object.getOwnPropertySymbols) {
            var r = Object.getOwnPropertySymbols(e);
            t && (r = r.filter((function(t) {
                return Object.getOwnPropertyDescriptor(e, t).enumerable
            }))), n.push.apply(n, r)
        }
        return n
    }

    function _k(e) {
        for (var t = 1; t < arguments.length; t++) {
            var n = null != arguments[t] ? arguments[t] : {};
            t % 2 ? wk(Object(n), !0).forEach((function(t) {
                bk(e, t, n[t])
            })) : Object.getOwnPropertyDescriptors ? Object.defineProperties(e, Object.getOwnPropertyDescriptors(n)) : wk(Object(n)).forEach((function(t) {
                Object.defineProperty(e, t, Object.getOwnPropertyDescriptor(n, t))
            }))
        }
        return e
    }
    Pv({
        target: "Object",
        stat: !0,
        forced: !rg || mk,
        sham: !rg
    }, {
        getOwnPropertyDescriptor: function(e, t) {
            return vk(pg(e), t)
        }
    }), Pv({
        target: "Object",
        stat: !0,
        sham: !rg
    }, {
        getOwnPropertyDescriptors: function(e) {
            for (var t, n, r = pg(e), i = kg.f, o = bv(r), a = {}, s = 0; o.length > s;) void 0 !== (n = i(r, t = o[s++])) && Cv(a, t, n);
            return a
        }
    }), wb("match", 1, (function(e, t, n) {
        return [function(t) {
            var n = hg(this),
                r = null == t ? void 0 : t[e];
            return void 0 !== r ? r.call(t, n) : new RegExp(t)[e](String(n))
        }, function(e) {
            var r = n(t, e, this);
            if (r.done) return r.value;
            var i = Sg(e),
                o = String(this);
            if (!i.global) return Eb(i, o);
            var a = i.unicode;
            i.lastIndex = 0;
            for (var s, c = [], u = 0; null !== (s = Eb(i, o));) {
                var l = String(s[0]);
                c[u] = l, "" === l && (i.lastIndex = lw(o, sv(i.lastIndex), a)), u++
            }
            return 0 === u ? null : c
        }]
    }));
    var Ek = {
        addCSS: !0,
        thumbWidth: 15,
        watch: !0
    };

    function kk(e, t) {
        return function() {
            return Array.from(document.querySelectorAll(t)).includes(this)
        }.call(e, t)
    }
    var Sk = function(e) {
            return null != e ? e.constructor : null
        },
        Tk = function(e, t) {
            return !!(e && t && e instanceof t)
        },
        xk = function(e) {
            return null == e
        },
        Ak = function(e) {
            return Sk(e) === Object
        },
        Ok = function(e) {
            return Sk(e) === String
        },
        Pk = function(e) {
            return Array.isArray(e)
        },
        Ik = function(e) {
            return Tk(e, NodeList)
        },
        jk = Ok,
        Ck = Pk,
        Rk = Ik,
        Lk = function(e) {
            return Tk(e, Element)
        },
        Nk = function(e) {
            return Tk(e, Event)
        },
        Mk = function(e) {
            return xk(e) || (Ok(e) || Pk(e) || Ik(e)) && !e.length || Ak(e) && !Object.keys(e).length
        };

    function Uk(e, t) {
        if (1 > t) {
            var n = function(e) {
                var t = "".concat(e).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
                return t ? Math.max(0, (t[1] ? t[1].length : 0) - (t[2] ? +t[2] : 0)) : 0
            }(t);
            return parseFloat(e.toFixed(n))
        }
        return Math.round(e / t) * t
    }
    var Dk, Fk, Bk, qk = function() {
            function e(t, n) {
                (function(e, t) {
                    if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
                })(this, e), Lk(t) ? this.element = t : jk(t) && (this.element = document.querySelector(t)), Lk(this.element) && Mk(this.element.rangeTouch) && (this.config = _k({}, Ek, {}, n), this.init())
            }
            return function(e, t, n) {
                t && yk(e.prototype, t), n && yk(e, n)
            }(e, [{
                key: "init",
                value: function() {
                    e.enabled && (this.config.addCSS && (this.element.style.userSelect = "none", this.element.style.webKitUserSelect = "none", this.element.style.touchAction = "manipulation"), this.listeners(!0), this.element.rangeTouch = this)
                }
            }, {
                key: "destroy",
                value: function() {
                    e.enabled && (this.config.addCSS && (this.element.style.userSelect = "", this.element.style.webKitUserSelect = "", this.element.style.touchAction = ""), this.listeners(!1), this.element.rangeTouch = null)
                }
            }, {
                key: "listeners",
                value: function(e) {
                    var t = this,
                        n = e ? "addEventListener" : "removeEventListener";
                    ["touchstart", "touchmove", "touchend"].forEach((function(e) {
                        t.element[n](e, (function(e) {
                            return t.set(e)
                        }), !1)
                    }))
                }
            }, {
                key: "get",
                value: function(t) {
                    if (!e.enabled || !Nk(t)) return null;
                    var n, r = t.target,
                        i = t.changedTouches[0],
                        o = parseFloat(r.getAttribute("min")) || 0,
                        a = parseFloat(r.getAttribute("max")) || 100,
                        s = parseFloat(r.getAttribute("step")) || 1,
                        c = r.getBoundingClientRect(),
                        u = 100 / c.width * (this.config.thumbWidth / 2) / 100;
                    return 0 > (n = 100 / c.width * (i.clientX - c.left)) ? n = 0 : 100 < n && (n = 100), 50 > n ? n -= (100 - 2 * n) * u : 50 < n && (n += 2 * (n - 50) * u), o + Uk(n / 100 * (a - o), s)
                }
            }, {
                key: "set",
                value: function(t) {
                    e.enabled && Nk(t) && !t.target.disabled && (t.preventDefault(), t.target.value = this.get(t), function(e, t) {
                        if (e && t) {
                            var n = new Event(t, {
                                bubbles: !0
                            });
                            e.dispatchEvent(n)
                        }
                    }(t.target, "touchend" === t.type ? "change" : "input"))
                }
            }], [{
                key: "setup",
                value: function(t) {
                    var n = 1 < arguments.length && void 0 !== arguments[1] ? arguments[1] : {},
                        r = null;
                    if (Mk(t) || jk(t) ? r = Array.from(document.querySelectorAll(jk(t) ? t : 'input[type="range"]')) : Lk(t) ? r = [t] : Rk(t) ? r = Array.from(t) : Ck(t) && (r = t.filter(Lk)), Mk(r)) return null;
                    var i = _k({}, Ek, {}, n);
                    if (jk(t) && i.watch) {
                        var o = new MutationObserver((function(n) {
                            Array.from(n).forEach((function(n) {
                                Array.from(n.addedNodes).forEach((function(n) {
                                    Lk(n) && kk(n, t) && new e(n, i)
                                }))
                            }))
                        }));
                        o.observe(document.body, {
                            childList: !0,
                            subtree: !0
                        })
                    }
                    return r.map((function(t) {
                        return new e(t, n)
                    }))
                }
            }, {
                key: "enabled",
                get: function() {
                    return "ontouchstart" in document.documentElement
                }
            }]), e
        }(),
        Hk = tg.Promise,
        Vk = Dv("species"),
        Wk = function(e) {
            var t = nv(e),
                n = xg.f;
            rg && t && !t[Vk] && n(t, Vk, {
                configurable: !0,
                get: function() {
                    return this
                }
            })
        },
        zk = /(iphone|ipod|ipad).*applewebkit/i.test(qv),
        Yk = tg.location,
        $k = tg.setImmediate,
        Gk = tg.clearImmediate,
        Kk = tg.process,
        Xk = tg.MessageChannel,
        Jk = tg.Dispatch,
        Qk = 0,
        Zk = {},
        eS = function(e) {
            if (Zk.hasOwnProperty(e)) {
                var t = Zk[e];
                delete Zk[e], t()
            }
        },
        tS = function(e) {
            return function() {
                eS(e)
            }
        },
        nS = function(e) {
            eS(e.data)
        },
        rS = function(e) {
            tg.postMessage(e + "", Yk.protocol + "//" + Yk.host)
        };
    $k && Gk || ($k = function(e) {
        for (var t = [], n = 1; arguments.length > n;) t.push(arguments[n++]);
        return Zk[++Qk] = function() {
            ("function" == typeof e ? e : Function(e)).apply(void 0, t)
        }, Dk(Qk), Qk
    }, Gk = function(e) {
        delete Zk[e]
    }, "process" == ug(Kk) ? Dk = function(e) {
        Kk.nextTick(tS(e))
    } : Jk && Jk.now ? Dk = function(e) {
        Jk.now(tS(e))
    } : Xk && !zk ? (Bk = (Fk = new Xk).port2, Fk.port1.onmessage = nS, Dk = Zv(Bk.postMessage, Bk, 1)) : !tg.addEventListener || "function" != typeof postMessage || tg.importScripts || ng(rS) || "file:" === Yk.protocol ? Dk = "onreadystatechange" in wg("script") ? function(e) {
        pm.appendChild(wg("script")).onreadystatechange = function() {
            pm.removeChild(this), eS(e)
        }
    } : function(e) {
        setTimeout(tS(e), 0)
    } : (Dk = rS, tg.addEventListener("message", nS, !1)));
    var iS, oS, aS, sS, cS, uS, lS, fS, hS = {
            set: $k,
            clear: Gk
        },
        pS = kg.f,
        dS = hS.set,
        gS = tg.MutationObserver || tg.WebKitMutationObserver,
        vS = tg.process,
        mS = tg.Promise,
        yS = "process" == ug(vS),
        bS = pS(tg, "queueMicrotask"),
        wS = bS && bS.value;
    wS || (iS = function() {
        var e, t;
        for (yS && (e = vS.domain) && e.exit(); oS;) {
            t = oS.fn, oS = oS.next;
            try {
                t()
            } catch (e) {
                throw oS ? sS() : aS = void 0, e
            }
        }
        aS = void 0, e && e.enter()
    }, yS ? sS = function() {
        vS.nextTick(iS)
    } : gS && !zk ? (cS = !0, uS = document.createTextNode(""), new gS(iS).observe(uS, {
        characterData: !0
    }), sS = function() {
        uS.data = cS = !cS
    }) : mS && mS.resolve ? (lS = mS.resolve(void 0), fS = lS.then, sS = function() {
        fS.call(lS, iS)
    }) : sS = function() {
        dS.call(tg, iS)
    });
    var _S, ES, kS, SS, TS = wS || function(e) {
            var t = {
                fn: e,
                next: void 0
            };
            aS && (aS.next = t), oS || (oS = t, sS()), aS = t
        },
        xS = function(e) {
            var t, n;
            this.promise = new e((function(e, r) {
                if (void 0 !== t || void 0 !== n) throw TypeError("Bad Promise constructor");
                t = e, n = r
            })), this.resolve = Qv(t), this.reject = Qv(n)
        },
        AS = {
            f: function(e) {
                return new xS(e)
            }
        },
        OS = function(e, t) {
            if (Sg(e), dg(t) && t.constructor === e) return t;
            var n = AS.f(e);
            return (0, n.resolve)(t), n.promise
        },
        PS = function(e) {
            try {
                return {
                    error: !1,
                    value: e()
                }
            } catch (e) {
                return {
                    error: !0,
                    value: e
                }
            }
        },
        IS = hS.set,
        jS = Dv("species"),
        CS = Qg.get,
        RS = Qg.set,
        LS = Qg.getterFor("Promise"),
        NS = Hk,
        MS = tg.TypeError,
        US = tg.document,
        DS = tg.process,
        FS = nv("fetch"),
        BS = AS.f,
        qS = BS,
        HS = "process" == ug(DS),
        VS = !!(US && US.createEvent && tg.dispatchEvent),
        WS = Av("Promise", (function() {
            if (!(Lg(NS) !== String(NS))) {
                if (66 === zv) return !0;
                if (!HS && "function" != typeof PromiseRejectionEvent) return !0
            }
            if (zv >= 51 && /native code/.test(NS)) return !1;
            var e = NS.resolve(1),
                t = function(e) {
                    e((function() {}), (function() {}))
                };
            return (e.constructor = {})[jS] = t, !(e.then((function() {})) instanceof t)
        })),
        zS = WS || !Hm((function(e) {
            NS.all(e).catch((function() {}))
        })),
        YS = function(e) {
            var t;
            return !(!dg(e) || "function" != typeof(t = e.then)) && t
        },
        $S = function(e, t, n) {
            if (!t.notified) {
                t.notified = !0;
                var r = t.reactions;
                TS((function() {
                    for (var i = t.value, o = 1 == t.state, a = 0; r.length > a;) {
                        var s, c, u, l = r[a++],
                            f = o ? l.ok : l.fail,
                            h = l.resolve,
                            p = l.reject,
                            d = l.domain;
                        try {
                            f ? (o || (2 === t.rejection && JS(e, t), t.rejection = 1), !0 === f ? s = i : (d && d.enter(), s = f(i), d && (d.exit(), u = !0)), s === l.promise ? p(MS("Promise-chain cycle")) : (c = YS(s)) ? c.call(s, h, p) : h(s)) : p(i)
                        } catch (e) {
                            d && !u && d.exit(), p(e)
                        }
                    }
                    t.reactions = [], t.notified = !1, n && !t.rejection && KS(e, t)
                }))
            }
        },
        GS = function(e, t, n) {
            var r, i;
            VS ? ((r = US.createEvent("Event")).promise = t, r.reason = n, r.initEvent(e, !1, !0), tg.dispatchEvent(r)) : r = {
                promise: t,
                reason: n
            }, (i = tg["on" + e]) ? i(r) : "unhandledrejection" === e && function(e, t) {
                var n = tg.console;
                n && n.error && (1 === arguments.length ? n.error(e) : n.error(e, t))
            }("Unhandled promise rejection", n)
        },
        KS = function(e, t) {
            IS.call(tg, (function() {
                var n, r = t.value;
                if (XS(t) && (n = PS((function() {
                        HS ? DS.emit("unhandledRejection", r, e) : GS("unhandledrejection", e, r)
                    })), t.rejection = HS || XS(t) ? 2 : 1, n.error)) throw n.value
            }))
        },
        XS = function(e) {
            return 1 !== e.rejection && !e.parent
        },
        JS = function(e, t) {
            IS.call(tg, (function() {
                HS ? DS.emit("rejectionHandled", e) : GS("rejectionhandled", e, t.value)
            }))
        },
        QS = function(e, t, n, r) {
            return function(i) {
                e(t, n, i, r)
            }
        },
        ZS = function(e, t, n, r) {
            t.done || (t.done = !0, r && (t = r), t.value = n, t.state = 2, $S(e, t, !0))
        },
        eT = function(e, t, n, r) {
            if (!t.done) {
                t.done = !0, r && (t = r);
                try {
                    if (e === n) throw MS("Promise can't be resolved itself");
                    var i = YS(n);
                    i ? TS((function() {
                        var r = {
                            done: !1
                        };
                        try {
                            i.call(n, QS(eT, e, r, t), QS(ZS, e, r, t))
                        } catch (n) {
                            ZS(e, r, n, t)
                        }
                    })) : (t.value = n, t.state = 1, $S(e, t, !1))
                } catch (n) {
                    ZS(e, {
                        done: !1
                    }, n, t)
                }
            }
        };
    WS && (NS = function(e) {
        Ab(this, NS, "Promise"), Qv(e), _S.call(this);
        var t = CS(this);
        try {
            e(QS(eT, this, t), QS(ZS, this, t))
        } catch (e) {
            ZS(this, t, e)
        }
    }, (_S = function(e) {
        RS(this, {
            type: "Promise",
            done: !1,
            notified: !1,
            parent: !1,
            reactions: [],
            rejection: !1,
            state: 0,
            value: void 0
        })
    }).prototype = kb(NS.prototype, {
        then: function(e, t) {
            var n = LS(this),
                r = BS(cw(this, NS));
            return r.ok = "function" != typeof e || e, r.fail = "function" == typeof t && t, r.domain = HS ? DS.domain : void 0, n.parent = !0, n.reactions.push(r), 0 != n.state && $S(this, n, !1), r.promise
        },
        catch: function(e) {
            return this.then(void 0, e)
        }
    }), ES = function() {
        var e = new _S,
            t = CS(e);
        this.promise = e, this.resolve = QS(eT, e, t), this.reject = QS(ZS, e, t)
    }, AS.f = BS = function(e) {
        return e === NS || e === kS ? new ES(e) : qS(e)
    }, "function" == typeof Hk && (SS = Hk.prototype.then, Zg(Hk.prototype, "then", (function(e, t) {
        var n = this;
        return new NS((function(e, t) {
            SS.call(n, e, t)
        })).then(e, t)
    }), {
        unsafe: !0
    }), "function" == typeof FS && Pv({
        global: !0,
        enumerable: !0,
        forced: !0
    }, {
        fetch: function(e) {
            return OS(NS, FS.apply(tg, arguments))
        }
    }))), Pv({
        global: !0,
        wrap: !0,
        forced: WS
    }, {
        Promise: NS
    }), iy(NS, "Promise", !1), Wk("Promise"), kS = nv("Promise"), Pv({
        target: "Promise",
        stat: !0,
        forced: WS
    }, {
        reject: function(e) {
            var t = BS(this);
            return t.reject.call(void 0, e), t.promise
        }
    }), Pv({
        target: "Promise",
        stat: !0,
        forced: WS
    }, {
        resolve: function(e) {
            return OS(this, e)
        }
    }), Pv({
        target: "Promise",
        stat: !0,
        forced: zS
    }, {
        all: function(e) {
            var t = this,
                n = BS(t),
                r = n.resolve,
                i = n.reject,
                o = PS((function() {
                    var n = Qv(t.resolve),
                        o = [],
                        a = 0,
                        s = 1;
                    xb(e, (function(e) {
                        var c = a++,
                            u = !1;
                        o.push(void 0), s++, n.call(t, e).then((function(e) {
                            u || (u = !0, o[c] = e, --s || r(o))
                        }), i)
                    })), --s || r(o)
                }));
            return o.error && i(o.value), n.promise
        },
        race: function(e) {
            var t = this,
                n = BS(t),
                r = n.reject,
                i = PS((function() {
                    var i = Qv(t.resolve);
                    xb(e, (function(e) {
                        i.call(t, e).then(n.resolve, r)
                    }))
                }));
            return i.error && r(i.value), n.promise
        }
    });
    var tT, nT = kg.f,
        rT = "".startsWith,
        iT = Math.min,
        oT = cb("startsWith"),
        aT = !(oT || (tT = nT(String.prototype, "startsWith"), !tT || tT.writable));
    Pv({
        target: "String",
        proto: !0,
        forced: !aT && !oT
    }, {
        startsWith: function(e) {
            var t = String(hg(this));
            ab(e);
            var n = sv(iT(arguments.length > 1 ? arguments[1] : void 0, t.length)),
                r = String(e);
            return rT ? rT.call(t, r, n) : t.slice(n, n + r.length) === r
        }
    });
    var sT, cT, uT, lT = function(e) {
            return null != e ? e.constructor : null
        },
        fT = function(e, t) {
            return Boolean(e && t && e instanceof t)
        },
        hT = function(e) {
            return null == e
        },
        pT = function(e) {
            return lT(e) === Object
        },
        dT = function(e) {
            return lT(e) === String
        },
        gT = function(e) {
            return lT(e) === Function
        },
        vT = function(e) {
            return Array.isArray(e)
        },
        mT = function(e) {
            return fT(e, NodeList)
        },
        yT = function(e) {
            return hT(e) || (dT(e) || vT(e) || mT(e)) && !e.length || pT(e) && !Object.keys(e).length
        },
        bT = hT,
        wT = pT,
        _T = function(e) {
            return lT(e) === Number && !Number.isNaN(e)
        },
        ET = dT,
        kT = function(e) {
            return lT(e) === Boolean
        },
        ST = gT,
        TT = vT,
        xT = mT,
        AT = function(e) {
            return fT(e, Element)
        },
        OT = function(e) {
            return fT(e, Event)
        },
        PT = function(e) {
            return fT(e, KeyboardEvent)
        },
        IT = function(e) {
            return fT(e, TextTrack) || !hT(e) && dT(e.kind)
        },
        jT = function(e) {
            return fT(e, Promise) && gT(e.then)
        },
        CT = function(e) {
            if (fT(e, window.URL)) return !0;
            if (!dT(e)) return !1;
            var t = e;
            e.startsWith("http://") && e.startsWith("https://") || (t = "http://".concat(e));
            try {
                return !yT(new URL(t).hostname)
            } catch (e) {
                return !1
            }
        },
        RT = yT,
        LT = (sT = document.createElement("span"), cT = {
            WebkitTransition: "webkitTransitionEnd",
            MozTransition: "transitionend",
            OTransition: "oTransitionEnd otransitionend",
            transition: "transitionend"
        }, uT = Object.keys(cT).find((function(e) {
            return void 0 !== sT.style[e]
        })), !!ET(uT) && cT[uT]);

    function NT(e, t) {
        setTimeout((function() {
            try {
                e.hidden = !0, e.offsetHeight, e.hidden = !1
            } catch (e) {}
        }), t)
    }
    var MT = {
            isIE:
                /* @cc_on!@ */
                !!document.documentMode,
            isEdge: window.navigator.userAgent.includes("Edge"),
            isWebkit: "WebkitAppearance" in document.documentElement.style && !/Edge/.test(navigator.userAgent),
            isIPhone: /(iPhone|iPod)/gi.test(navigator.platform),
            isIos: /(iPad|iPhone|iPod)/gi.test(navigator.platform)
        },
        UT = function(e) {
            return function(t, n, r, i) {
                Qv(n);
                var o = jv(t),
                    a = fg(o),
                    s = sv(o.length),
                    c = e ? s - 1 : 0,
                    u = e ? -1 : 1;
                if (r < 2)
                    for (;;) {
                        if (c in a) {
                            i = a[c], c += u;
                            break
                        }
                        if (c += u, e ? c < 0 : s <= c) throw TypeError("Reduce of empty array with no initial value")
                    }
                for (; e ? c >= 0 : s > c; c += u) c in a && (i = n(i, a[c], c, o));
                return i
            }
        },
        DT = {
            left: UT(!1),
            right: UT(!0)
        }.left,
        FT = my("reduce"),
        BT = am("reduce", {
            1: 0
        });

    function qT(e, t) {
        return t.split(".").reduce((function(e, t) {
            return e && e[t]
        }), e)
    }

    function HT() {
        for (var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
        if (!n.length) return e;
        var i = n.shift();
        return wT(i) ? (Object.keys(i).forEach((function(t) {
            wT(i[t]) ? (Object.keys(e).includes(t) || Object.assign(e, Za({}, t, {})), HT(e[t], i[t])) : Object.assign(e, Za({}, t, i[t]))
        })), HT.apply(void 0, [e].concat(n))) : e
    }

    function VT(e, t) {
        var n = e.length ? e : [e];
        Array.from(n).reverse().forEach((function(e, n) {
            var r = n > 0 ? t.cloneNode(!0) : t,
                i = e.parentNode,
                o = e.nextSibling;
            r.appendChild(e), o ? i.insertBefore(r, o) : i.appendChild(r)
        }))
    }

    function WT(e, t) {
        AT(e) && !RT(t) && Object.entries(t).filter((function(e) {
            var t = rs(e, 2)[1];
            return !bT(t)
        })).forEach((function(t) {
            var n = rs(t, 2),
                r = n[0],
                i = n[1];
            return e.setAttribute(r, i)
        }))
    }

    function zT(e, t, n) {
        var r = document.createElement(e);
        return wT(t) && WT(r, t), ET(n) && (r.innerText = n), r
    }

    function YT(e, t, n, r) {
        AT(t) && t.appendChild(zT(e, n, r))
    }

    function $T(e) {
        xT(e) || TT(e) ? Array.from(e).forEach($T) : AT(e) && AT(e.parentNode) && e.parentNode.removeChild(e)
    }

    function GT(e) {
        if (AT(e))
            for (var t = e.childNodes.length; t > 0;) e.removeChild(e.lastChild), t -= 1
    }

    function KT(e, t) {
        return AT(t) && AT(t.parentNode) && AT(e) ? (t.parentNode.replaceChild(e, t), e) : null
    }

    function XT(e, t) {
        if (!ET(e) || RT(e)) return {};
        var n = {},
            r = HT({}, t);
        return e.split(",").forEach((function(e) {
            var t = e.trim(),
                i = t.replace(".", ""),
                o = t.replace(/[[\]]/g, "").split("="),
                a = rs(o, 1)[0],
                s = o.length > 1 ? o[1].replace(/["']/g, "") : "";
            switch (t.charAt(0)) {
                case ".":
                    ET(r.class) ? n.class = "".concat(r.class, " ").concat(i) : n.class = i;
                    break;
                case "#":
                    n.id = t.replace("#", "");
                    break;
                case "[":
                    n[a] = s
            }
        })), HT(r, n)
    }

    function JT(e, t) {
        if (AT(e)) {
            var n = t;
            kT(n) || (n = !e.hidden), e.hidden = n
        }
    }

    function QT(e, t, n) {
        if (xT(e)) return Array.from(e).map((function(e) {
            return QT(e, t, n)
        }));
        if (AT(e)) {
            var r = "toggle";
            return void 0 !== n && (r = n ? "add" : "remove"), e.classList[r](t), e.classList.contains(t)
        }
        return !1
    }

    function ZT(e, t) {
        return AT(e) && e.classList.contains(t)
    }

    function ex(e, t) {
        var n = Element.prototype;
        return (n.matches || n.webkitMatchesSelector || n.mozMatchesSelector || n.msMatchesSelector || function() {
            return Array.from(document.querySelectorAll(t)).includes(this)
        }).call(e, t)
    }

    function tx(e) {
        return this.elements.container.querySelectorAll(e)
    }

    function nx(e) {
        return this.elements.container.querySelector(e)
    }

    function rx() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
            t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
        AT(e) && (e.focus({
            preventScroll: !0
        }), t && QT(e, this.config.classNames.tabFocus))
    }
    Pv({
        target: "Array",
        proto: !0,
        forced: !FT || !BT
    }, {
        reduce: function(e) {
            return DT(this, e, arguments.length, arguments.length > 1 ? arguments[1] : void 0)
        }
    });
    var ix, ox = {
            "audio/ogg": "vorbis",
            "audio/wav": "1",
            "video/webm": "vp8, vorbis",
            "video/mp4": "avc1.42E01E, mp4a.40.2",
            "video/ogg": "theora"
        },
        ax = {
            audio: "canPlayType" in document.createElement("audio"),
            video: "canPlayType" in document.createElement("video"),
            check: function(e, t, n) {
                var r = MT.isIPhone && n && ax.playsinline,
                    i = ax[e] || "html5" !== t;
                return {
                    api: i,
                    ui: i && ax.rangeInput && ("video" !== e || !MT.isIPhone || r)
                }
            },
            pip: !(MT.isIPhone || !ST(zT("video").webkitSetPresentationMode) && (!document.pictureInPictureEnabled || zT("video").disablePictureInPicture)),
            airplay: ST(window.WebKitPlaybackTargetAvailabilityEvent),
            playsinline: "playsInline" in document.createElement("video"),
            mime: function(e) {
                if (RT(e)) return !1;
                var t = rs(e.split("/"), 1)[0],
                    n = e;
                if (!this.isHTML5 || t !== this.type) return !1;
                Object.keys(ox).includes(n) && (n += '; codecs="'.concat(ox[e], '"'));
                try {
                    return Boolean(n && this.media.canPlayType(n).replace(/no/, ""))
                } catch (e) {
                    return !1
                }
            },
            textTracks: "textTracks" in document.createElement("video"),
            rangeInput: (ix = document.createElement("input"), ix.type = "range", "range" === ix.type),
            touch: "ontouchstart" in document.documentElement,
            transitions: !1 !== LT,
            reducedMotion: "matchMedia" in window && window.matchMedia("(prefers-reduced-motion)").matches
        },
        sx = function() {
            var e = !1;
            try {
                var t = Object.defineProperty({}, "passive", {
                    get: function() {
                        return e = !0, null
                    }
                });
                window.addEventListener("test", null, t), window.removeEventListener("test", null, t)
            } catch (e) {}
            return e
        }();

    function cx(e, t, n) {
        var r = this,
            i = arguments.length > 3 && void 0 !== arguments[3] && arguments[3],
            o = !(arguments.length > 4 && void 0 !== arguments[4]) || arguments[4],
            a = arguments.length > 5 && void 0 !== arguments[5] && arguments[5];
        if (e && "addEventListener" in e && !RT(t) && ST(n)) {
            var s = t.split(" "),
                c = a;
            sx && (c = {
                passive: o,
                capture: a
            }), s.forEach((function(t) {
                r && r.eventListeners && i && r.eventListeners.push({
                    element: e,
                    type: t,
                    callback: n,
                    options: c
                }), e[i ? "addEventListener" : "removeEventListener"](t, n, c)
            }))
        }
    }

    function ux(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
            n = arguments.length > 2 ? arguments[2] : void 0,
            r = !(arguments.length > 3 && void 0 !== arguments[3]) || arguments[3],
            i = arguments.length > 4 && void 0 !== arguments[4] && arguments[4];
        cx.call(this, e, t, n, !0, r, i)
    }

    function lx(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
            n = arguments.length > 2 ? arguments[2] : void 0,
            r = !(arguments.length > 3 && void 0 !== arguments[3]) || arguments[3],
            i = arguments.length > 4 && void 0 !== arguments[4] && arguments[4];
        cx.call(this, e, t, n, !1, r, i)
    }

    function fx(e) {
        var t = this,
            n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
            r = arguments.length > 2 ? arguments[2] : void 0,
            i = !(arguments.length > 3 && void 0 !== arguments[3]) || arguments[3],
            o = arguments.length > 4 && void 0 !== arguments[4] && arguments[4],
            a = function a() {
                lx(e, n, a, i, o);
                for (var s = arguments.length, c = new Array(s), u = 0; u < s; u++) c[u] = arguments[u];
                r.apply(t, c)
            };
        cx.call(this, e, n, a, !0, i, o)
    }

    function hx(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
            n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2],
            r = arguments.length > 3 && void 0 !== arguments[3] ? arguments[3] : {};
        if (AT(e) && !RT(t)) {
            var i = new CustomEvent(t, {
                bubbles: n,
                detail: ts(ts({}, r), {}, {
                    plyr: this
                })
            });
            e.dispatchEvent(i)
        }
    }

    function px() {
        this && this.eventListeners && (this.eventListeners.forEach((function(e) {
            var t = e.element,
                n = e.type,
                r = e.callback,
                i = e.options;
            t.removeEventListener(n, r, i)
        })), this.eventListeners = [])
    }

    function dx() {
        var e = this;
        return new Promise((function(t) {
            return e.ready ? setTimeout(t, 0) : ux.call(e, e.elements.container, "ready", t)
        })).then((function() {}))
    }

    function gx(e) {
        jT(e) && e.then(null, (function() {}))
    }

    function vx(e) {
        return !!(TT(e) || ET(e) && e.includes(":")) && (TT(e) ? e : e.split(":")).map(Number).every(_T)
    }

    function mx(e) {
        if (!TT(e) || !e.every(_T)) return null;
        var t = rs(e, 2),
            n = t[0],
            r = t[1],
            i = function e(t, n) {
                return 0 === n ? t : e(n, t % n)
            }(n, r);
        return [n / i, r / i]
    }

    function yx(e) {
        var t = function(e) {
                return vx(e) ? e.split(":").map(Number) : null
            },
            n = t(e);
        if (null === n && (n = t(this.config.ratio)), null === n && !RT(this.embed) && TT(this.embed.ratio) && (n = this.embed.ratio), null === n && this.isHTML5) {
            var r = this.media;
            n = mx([r.videoWidth, r.videoHeight])
        }
        return n
    }

    function bx(e) {
        if (!this.isVideo) return {};
        var t = this.elements.wrapper,
            n = yx.call(this, e),
            r = rs(TT(n) ? n : [0, 0], 2),
            i = 100 / r[0] * r[1];
        if (t.style.paddingBottom = "".concat(i, "%"), this.isVimeo && !this.config.vimeo.premium && this.supported.ui) {
            var o = 100 / this.media.offsetWidth * parseInt(window.getComputedStyle(this.media).paddingBottom, 10),
                a = (o - i) / (o / 50);
            this.media.style.transform = "translateY(-".concat(a, "%)")
        } else this.isHTML5 && t.classList.toggle(this.config.classNames.videoFixedRatio, null !== n);
        return {
            padding: i,
            ratio: n
        }
    }
    var wx = {
        getSources: function() {
            var e = this;
            return this.isHTML5 ? Array.from(this.media.querySelectorAll("source")).filter((function(t) {
                var n = t.getAttribute("type");
                return !!RT(n) || ax.mime.call(e, n)
            })) : []
        },
        getQualityOptions: function() {
            return this.config.quality.forced ? this.config.quality.options : wx.getSources.call(this).map((function(e) {
                return Number(e.getAttribute("size"))
            })).filter(Boolean)
        },
        setup: function() {
            if (this.isHTML5) {
                var e = this;
                e.options.speed = e.config.speed.options, RT(this.config.ratio) || bx.call(e), Object.defineProperty(e.media, "quality", {
                    get: function() {
                        var t = wx.getSources.call(e).find((function(t) {
                            return t.getAttribute("src") === e.source
                        }));
                        return t && Number(t.getAttribute("size"))
                    },
                    set: function(t) {
                        if (e.quality !== t) {
                            if (e.config.quality.forced && ST(e.config.quality.onChange)) e.config.quality.onChange(t);
                            else {
                                var n = wx.getSources.call(e).find((function(e) {
                                    return Number(e.getAttribute("size")) === t
                                }));
                                if (!n) return;
                                var r = e.media,
                                    i = r.currentTime,
                                    o = r.paused,
                                    a = r.preload,
                                    s = r.readyState,
                                    c = r.playbackRate;
                                e.media.src = n.getAttribute("src"), ("none" !== a || s) && (e.once("loadedmetadata", (function() {
                                    e.speed = c, e.currentTime = i, o || gx(e.play())
                                })), e.media.load())
                            }
                            hx.call(e, e.media, "qualitychange", !1, {
                                quality: t
                            })
                        }
                    }
                })
            }
        },
        cancelRequests: function() {
            this.isHTML5 && ($T(wx.getSources.call(this)), this.media.setAttribute("src", this.config.blankVideo), this.media.load(), this.debug.log("Cancelled network requests"))
        }
    };

    function _x(e) {
        return TT(e) ? e.filter((function(t, n) {
            return e.indexOf(t) === n
        })) : e
    }
    var Ex = $v("slice"),
        kx = am("slice", {
            ACCESSORS: !0,
            0: 0,
            1: 2
        }),
        Sx = Dv("species"),
        Tx = [].slice,
        xx = Math.max;
    Pv({
        target: "Array",
        proto: !0,
        forced: !Ex || !kx
    }, {
        slice: function(e, t) {
            var n, r, i, o = pg(this),
                a = sv(o.length),
                s = lv(e, a),
                c = lv(void 0 === t ? a : t, a);
            if (Iv(o) && ("function" != typeof(n = o.constructor) || n !== Array && !Iv(n.prototype) ? dg(n) && null === (n = n[Sx]) && (n = void 0) : n = void 0, n === Array || void 0 === n)) return Tx.call(o, s, c);
            for (r = new(void 0 === n ? Array : n)(xx(c - s, 0)), i = 0; s < c; s++, i++) s in o && Cv(r, i, o[s]);
            return r.length = i, r
        }
    });
    var Ax = xg.f,
        Ox = mv.f,
        Px = Qg.set,
        Ix = Dv("match"),
        jx = tg.RegExp,
        Cx = jx.prototype,
        Rx = /a/g,
        Lx = /a/g,
        Nx = new jx(Rx) !== Rx,
        Mx = Yy.UNSUPPORTED_Y;
    if (rg && Av("RegExp", !Nx || Mx || ng((function() {
            return Lx[Ix] = !1, jx(Rx) != Rx || jx(Lx) == Lx || "/a/i" != jx(Rx, "i")
        })))) {
        for (var Ux = function(e, t) {
                var n, r = this instanceof Ux,
                    i = ob(e),
                    o = void 0 === t;
                if (!r && i && e.constructor === Ux && o) return e;
                Nx ? i && !o && (e = e.source) : e instanceof Ux && (o && (t = Wy.call(e)), e = e.source), Mx && (n = !!t && t.indexOf("y") > -1) && (t = t.replace(/y/g, ""));
                var a = Sy(Nx ? new jx(e, t) : jx(e, t), r ? this : Cx, Ux);
                return Mx && n && Px(a, {
                    sticky: n
                }), a
            }, Dx = function(e) {
                e in Ux || Ax(Ux, e, {
                    configurable: !0,
                    get: function() {
                        return jx[e]
                    },
                    set: function(t) {
                        jx[e] = t
                    }
                })
            }, Fx = Ox(jx), Bx = 0; Fx.length > Bx;) Dx(Fx[Bx++]);
        Cx.constructor = Ux, Ux.prototype = Cx, Zg(tg, "RegExp", Ux)
    }

    function qx(e) {
        for (var t = arguments.length, n = new Array(t > 1 ? t - 1 : 0), r = 1; r < t; r++) n[r - 1] = arguments[r];
        return RT(e) ? e : e.toString().replace(/{(\d+)}/g, (function(e, t) {
            return n[t].toString()
        }))
    }
    Wk("RegExp");
    var Hx = function() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : "";
            return e.replace(new RegExp(t.toString().replace(/([.*+?^=!:${}()|[\]/\\])/g, "\\$1"), "g"), n.toString())
        },
        Vx = function() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "";
            return e.toString().replace(/\w\S*/g, (function(e) {
                return e.charAt(0).toUpperCase() + e.substr(1).toLowerCase()
            }))
        };

    function Wx() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
            t = e.toString();
        return t = Hx(t, "-", " "), t = Hx(t, "_", " "), t = Vx(t), Hx(t, " ", "")
    }

    function zx(e) {
        var t = document.createElement("div");
        return t.appendChild(e), t.innerHTML
    }
    var Yx = {
            pip: "PIP",
            airplay: "AirPlay",
            html5: "HTML5",
            vimeo: "Vimeo",
            youtube: "YouTube"
        },
        $x = function() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {};
            if (RT(e) || RT(t)) return "";
            var n = qT(t.i18n, e);
            if (RT(n)) return Object.keys(Yx).includes(e) ? Yx[e] : "";
            var r = {
                "{seektime}": t.seekTime,
                "{title}": t.title
            };
            return Object.entries(r).forEach((function(e) {
                var t = rs(e, 2),
                    r = t[0],
                    i = t[1];
                n = Hx(n, r, i)
            })), n
        },
        Gx = function() {
            function e(t) {
                Xa(this, e), this.enabled = t.config.storage.enabled, this.key = t.config.storage.key
            }
            return Qa(e, [{
                key: "get",
                value: function(t) {
                    if (!e.supported || !this.enabled) return null;
                    var n = window.localStorage.getItem(this.key);
                    if (RT(n)) return null;
                    var r = JSON.parse(n);
                    return ET(t) && t.length ? r[t] : r
                }
            }, {
                key: "set",
                value: function(t) {
                    if (e.supported && this.enabled && wT(t)) {
                        var n = this.get();
                        RT(n) && (n = {}), HT(n, t), window.localStorage.setItem(this.key, JSON.stringify(n))
                    }
                }
            }], [{
                key: "supported",
                get: function() {
                    try {
                        if (!("localStorage" in window)) return !1;
                        return window.localStorage.setItem("___test", "___test"), window.localStorage.removeItem("___test"), !0
                    } catch (e) {
                        return !1
                    }
                }
            }]), e
        }();

    function Kx(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "text";
        return new Promise((function(n, r) {
            try {
                var i = new XMLHttpRequest;
                if (!("withCredentials" in i)) return;
                i.addEventListener("load", (function() {
                    if ("text" === t) try {
                        n(JSON.parse(i.responseText))
                    } catch (e) {
                        n(i.responseText)
                    } else n(i.response)
                })), i.addEventListener("error", (function() {
                    throw new Error(i.status)
                })), i.open("GET", e, !0), i.responseType = t, i.send()
            } catch (e) {
                r(e)
            }
        }))
    }

    function Xx(e, t) {
        if (ET(e)) {
            var n = ET(t),
                r = function() {
                    return null !== document.getElementById(t)
                },
                i = function(e, t) {
                    e.innerHTML = t, n && r() || document.body.insertAdjacentElement("afterbegin", e)
                };
            if (!n || !r()) {
                var o = Gx.supported,
                    a = document.createElement("div");
                if (a.setAttribute("hidden", ""), n && a.setAttribute("id", t), o) {
                    var s = window.localStorage.getItem("".concat("cache", "-").concat(t));
                    if (null !== s) {
                        var c = JSON.parse(s);
                        i(a, c.content)
                    }
                }
                Kx(e).then((function(e) {
                    RT(e) || (o && window.localStorage.setItem("".concat("cache", "-").concat(t), JSON.stringify({
                        content: e
                    })), i(a, e))
                })).catch((function() {}))
            }
        }
    }
    var Jx = Math.ceil,
        Qx = Math.floor;
    Pv({
        target: "Math",
        stat: !0
    }, {
        trunc: function(e) {
            return (e > 0 ? Qx : Jx)(e)
        }
    });
    var Zx = function(e) {
            return Math.trunc(e / 60 / 60 % 60, 10)
        },
        eA = function(e) {
            return Math.trunc(e / 60 % 60, 10)
        },
        tA = function(e) {
            return Math.trunc(e % 60, 10)
        };

    function nA() {
        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
            t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
            n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
        if (!_T(e)) return nA(void 0, t, n);
        var r = function(e) {
                return "0".concat(e).slice(-2)
            },
            i = Zx(e),
            o = eA(e),
            a = tA(e);
        return i = t || i > 0 ? "".concat(i, ":") : "", "".concat(n && e > 0 ? "-" : "").concat(i).concat(r(o), ":").concat(r(a))
    }
    var rA = {
        getIconUrl: function() {
            var e = new URL(this.config.iconUrl, window.location).host !== window.location.host || MT.isIE && !window.svg4everybody;
            return {
                url: this.config.iconUrl,
                cors: e
            }
        },
        findElements: function() {
            try {
                return this.elements.controls = nx.call(this, this.config.selectors.controls.wrapper), this.elements.buttons = {
                    play: tx.call(this, this.config.selectors.buttons.play),
                    pause: nx.call(this, this.config.selectors.buttons.pause),
                    restart: nx.call(this, this.config.selectors.buttons.restart),
                    rewind: nx.call(this, this.config.selectors.buttons.rewind),
                    fastForward: nx.call(this, this.config.selectors.buttons.fastForward),
                    mute: nx.call(this, this.config.selectors.buttons.mute),
                    pip: nx.call(this, this.config.selectors.buttons.pip),
                    airplay: nx.call(this, this.config.selectors.buttons.airplay),
                    settings: nx.call(this, this.config.selectors.buttons.settings),
                    captions: nx.call(this, this.config.selectors.buttons.captions),
                    fullscreen: nx.call(this, this.config.selectors.buttons.fullscreen)
                }, this.elements.progress = nx.call(this, this.config.selectors.progress), this.elements.inputs = {
                    seek: nx.call(this, this.config.selectors.inputs.seek),
                    volume: nx.call(this, this.config.selectors.inputs.volume)
                }, this.elements.display = {
                    buffer: nx.call(this, this.config.selectors.display.buffer),
                    currentTime: nx.call(this, this.config.selectors.display.currentTime),
                    duration: nx.call(this, this.config.selectors.display.duration)
                }, AT(this.elements.progress) && (this.elements.display.seekTooltip = this.elements.progress.querySelector(".".concat(this.config.classNames.tooltip))), !0
            } catch (e) {
                return this.debug.warn("It looks like there is a problem with your custom controls HTML", e), this.toggleNativeControls(!0), !1
            }
        },
        createIcon: function(e, t) {
            var n = rA.getIconUrl.call(this),
                r = "".concat(n.cors ? "" : n.url, "#").concat(this.config.iconPrefix),
                i = document.createElementNS("http://www.w3.org/2000/svg", "svg");
            WT(i, HT(t, {
                "aria-hidden": "true",
                focusable: "false"
            }));
            var o = document.createElementNS("http://www.w3.org/2000/svg", "use"),
                a = "".concat(r, "-").concat(e);
            return "href" in o && o.setAttributeNS("http://www.w3.org/1999/xlink", "href", a), o.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", a), i.appendChild(o), i
        },
        createLabel: function(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                n = $x(e, this.config),
                r = ts(ts({}, t), {}, {
                    class: [t.class, this.config.classNames.hidden].filter(Boolean).join(" ")
                });
            return zT("span", r, n)
        },
        createBadge: function(e) {
            if (RT(e)) return null;
            var t = zT("span", {
                class: this.config.classNames.menu.value
            });
            return t.appendChild(zT("span", {
                class: this.config.classNames.menu.badge
            }, e)), t
        },
        createButton: function(e, t) {
            var n = this,
                r = HT({}, t),
                i = function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                        t = e.toString();
                    return (t = Wx(t)).charAt(0).toLowerCase() + t.slice(1)
                }(e),
                o = {
                    element: "button",
                    toggle: !1,
                    label: null,
                    icon: null,
                    labelPressed: null,
                    iconPressed: null
                };
            switch (["element", "icon", "label"].forEach((function(e) {
                Object.keys(r).includes(e) && (o[e] = r[e], delete r[e])
            })), "button" !== o.element || Object.keys(r).includes("type") || (r.type = "button"), Object.keys(r).includes("class") ? r.class.split(" ").some((function(e) {
                return e === n.config.classNames.control
            })) || HT(r, {
                class: "".concat(r.class, " ").concat(this.config.classNames.control)
            }) : r.class = this.config.classNames.control, e) {
                case "play":
                    o.toggle = !0, o.label = "play", o.labelPressed = "pause", o.icon = "play", o.iconPressed = "pause";
                    break;
                case "mute":
                    o.toggle = !0, o.label = "mute", o.labelPressed = "unmute", o.icon = "volume", o.iconPressed = "muted";
                    break;
                case "captions":
                    o.toggle = !0, o.label = "enableCaptions", o.labelPressed = "disableCaptions", o.icon = "captions-off", o.iconPressed = "captions-on";
                    break;
                case "fullscreen":
                    o.toggle = !0, o.label = "enterFullscreen", o.labelPressed = "exitFullscreen", o.icon = "enter-fullscreen", o.iconPressed = "exit-fullscreen";
                    break;
                case "play-large":
                    r.class += " ".concat(this.config.classNames.control, "--overlaid"), i = "play", o.label = "play", o.icon = "play";
                    break;
                default:
                    RT(o.label) && (o.label = i), RT(o.icon) && (o.icon = e)
            }
            var a = zT(o.element);
            return o.toggle ? (a.appendChild(rA.createIcon.call(this, o.iconPressed, {
                class: "icon--pressed"
            })), a.appendChild(rA.createIcon.call(this, o.icon, {
                class: "icon--not-pressed"
            })), a.appendChild(rA.createLabel.call(this, o.labelPressed, {
                class: "label--pressed"
            })), a.appendChild(rA.createLabel.call(this, o.label, {
                class: "label--not-pressed"
            }))) : (a.appendChild(rA.createIcon.call(this, o.icon)), a.appendChild(rA.createLabel.call(this, o.label))), HT(r, XT(this.config.selectors.buttons[i], r)), WT(a, r), "play" === i ? (TT(this.elements.buttons[i]) || (this.elements.buttons[i] = []), this.elements.buttons[i].push(a)) : this.elements.buttons[i] = a, a
        },
        createRange: function(e, t) {
            var n = zT("input", HT(XT(this.config.selectors.inputs[e]), {
                type: "range",
                min: 0,
                max: 100,
                step: .01,
                value: 0,
                autocomplete: "off",
                role: "slider",
                "aria-label": $x(e, this.config),
                "aria-valuemin": 0,
                "aria-valuemax": 100,
                "aria-valuenow": 0
            }, t));
            return this.elements.inputs[e] = n, rA.updateRangeFill.call(this, n), qk.setup(n), n
        },
        createProgress: function(e, t) {
            var n = zT("progress", HT(XT(this.config.selectors.display[e]), {
                min: 0,
                max: 100,
                value: 0,
                role: "progressbar",
                "aria-hidden": !0
            }, t));
            if ("volume" !== e) {
                n.appendChild(zT("span", null, "0"));
                var r = {
                        played: "played",
                        buffer: "buffered"
                    } [e],
                    i = r ? $x(r, this.config) : "";
                n.innerText = "% ".concat(i.toLowerCase())
            }
            return this.elements.display[e] = n, n
        },
        createTime: function(e, t) {
            var n = XT(this.config.selectors.display[e], t),
                r = zT("div", HT(n, {
                    class: "".concat(n.class ? n.class : "", " ").concat(this.config.classNames.display.time, " ").trim(),
                    "aria-label": $x(e, this.config)
                }), "00:00");
            return this.elements.display[e] = r, r
        },
        bindMenuItemShortcuts: function(e, t) {
            var n = this;
            ux.call(this, e, "keydown keyup", (function(r) {
                if ([32, 38, 39, 40].includes(r.which) && (r.preventDefault(), r.stopPropagation(), "keydown" !== r.type)) {
                    var i, o = ex(e, '[role="menuitemradio"]');
                    if (!o && [32, 39].includes(r.which)) rA.showMenuPanel.call(n, t, !0);
                    else 32 !== r.which && (40 === r.which || o && 39 === r.which ? (i = e.nextElementSibling, AT(i) || (i = e.parentNode.firstElementChild)) : (i = e.previousElementSibling, AT(i) || (i = e.parentNode.lastElementChild)), rx.call(n, i, !0))
                }
            }), !1), ux.call(this, e, "keyup", (function(e) {
                13 === e.which && rA.focusFirstMenuItem.call(n, null, !0)
            }))
        },
        createMenuItem: function(e) {
            var t = this,
                n = e.value,
                r = e.list,
                i = e.type,
                o = e.title,
                a = e.badge,
                s = void 0 === a ? null : a,
                c = e.checked,
                u = void 0 !== c && c,
                l = XT(this.config.selectors.inputs[i]),
                f = zT("button", HT(l, {
                    type: "button",
                    role: "menuitemradio",
                    class: "".concat(this.config.classNames.control, " ").concat(l.class ? l.class : "").trim(),
                    "aria-checked": u,
                    value: n
                })),
                h = zT("span");
            h.innerHTML = o, AT(s) && h.appendChild(s), f.appendChild(h), Object.defineProperty(f, "checked", {
                enumerable: !0,
                get: function() {
                    return "true" === f.getAttribute("aria-checked")
                },
                set: function(e) {
                    e && Array.from(f.parentNode.children).filter((function(e) {
                        return ex(e, '[role="menuitemradio"]')
                    })).forEach((function(e) {
                        return e.setAttribute("aria-checked", "false")
                    })), f.setAttribute("aria-checked", e ? "true" : "false")
                }
            }), this.listeners.bind(f, "click keyup", (function(e) {
                if (!PT(e) || 32 === e.which) {
                    switch (e.preventDefault(), e.stopPropagation(), f.checked = !0, i) {
                        case "language":
                            t.currentTrack = Number(n);
                            break;
                        case "quality":
                            t.quality = n;
                            break;
                        case "speed":
                            t.speed = parseFloat(n)
                    }
                    rA.showMenuPanel.call(t, "home", PT(e))
                }
            }), i, !1), rA.bindMenuItemShortcuts.call(this, f, i), r.appendChild(f)
        },
        formatTime: function() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
            if (!_T(e)) return e;
            var n = Zx(this.duration) > 0;
            return nA(e, n, t)
        },
        updateTimeDisplay: function() {
            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null,
                t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0,
                n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
            AT(e) && _T(t) && (e.innerText = rA.formatTime(t, n))
        },
        updateVolume: function() {
            this.supported.ui && (AT(this.elements.inputs.volume) && rA.setRange.call(this, this.elements.inputs.volume, this.muted ? 0 : this.volume), AT(this.elements.buttons.mute) && (this.elements.buttons.mute.pressed = this.muted || 0 === this.volume))
        },
        setRange: function(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0;
            AT(e) && (e.value = t, rA.updateRangeFill.call(this, e))
        },
        updateProgress: function(e) {
            var t = this;
            if (this.supported.ui && OT(e)) {
                var n = 0;
                if (e) switch (e.type) {
                    case "timeupdate":
                    case "seeking":
                    case "seeked":
                        n = function(e, t) {
                            return 0 === e || 0 === t || Number.isNaN(e) || Number.isNaN(t) ? 0 : (e / t * 100).toFixed(2)
                        }(this.currentTime, this.duration), "timeupdate" === e.type && rA.setRange.call(this, this.elements.inputs.seek, n);
                        break;
                    case "playing":
                    case "progress":
                        ! function(e, n) {
                            var r = _T(n) ? n : 0,
                                i = AT(e) ? e : t.elements.display.buffer;
                            if (AT(i)) {
                                i.value = r;
                                var o = i.getElementsByTagName("span")[0];
                                AT(o) && (o.childNodes[0].nodeValue = r)
                            }
                        }(this.elements.display.buffer, 100 * this.buffered)
                }
            }
        },
        updateRangeFill: function(e) {
            var t = OT(e) ? e.target : e;
            if (AT(t) && "range" === t.getAttribute("type")) {
                if (ex(t, this.config.selectors.inputs.seek)) {
                    t.setAttribute("aria-valuenow", this.currentTime);
                    var n = rA.formatTime(this.currentTime),
                        r = rA.formatTime(this.duration),
                        i = $x("seekLabel", this.config);
                    t.setAttribute("aria-valuetext", i.replace("{currentTime}", n).replace("{duration}", r))
                } else if (ex(t, this.config.selectors.inputs.volume)) {
                    var o = 100 * t.value;
                    t.setAttribute("aria-valuenow", o), t.setAttribute("aria-valuetext", "".concat(o.toFixed(1), "%"))
                } else t.setAttribute("aria-valuenow", t.value);
                MT.isWebkit && t.style.setProperty("--value", "".concat(t.value / t.max * 100, "%"))
            }
        },
        updateSeekTooltip: function(e) {
            var t = this;
            if (this.config.tooltips.seek && AT(this.elements.inputs.seek) && AT(this.elements.display.seekTooltip) && 0 !== this.duration) {
                var n = "".concat(this.config.classNames.tooltip, "--visible"),
                    r = function(e) {
                        return QT(t.elements.display.seekTooltip, n, e)
                    };
                if (this.touch) r(!1);
                else {
                    var i = 0,
                        o = this.elements.progress.getBoundingClientRect();
                    if (OT(e)) i = 100 / o.width * (e.pageX - o.left);
                    else {
                        if (!ZT(this.elements.display.seekTooltip, n)) return;
                        i = parseFloat(this.elements.display.seekTooltip.style.left, 10)
                    }
                    i < 0 ? i = 0 : i > 100 && (i = 100), rA.updateTimeDisplay.call(this, this.elements.display.seekTooltip, this.duration / 100 * i), this.elements.display.seekTooltip.style.left = "".concat(i, "%"), OT(e) && ["mouseenter", "mouseleave"].includes(e.type) && r("mouseenter" === e.type)
                }
            }
        },
        timeUpdate: function(e) {
            var t = !AT(this.elements.display.duration) && this.config.invertTime;
            rA.updateTimeDisplay.call(this, this.elements.display.currentTime, t ? this.duration - this.currentTime : this.currentTime, t), e && "timeupdate" === e.type && this.media.seeking || rA.updateProgress.call(this, e)
        },
        durationUpdate: function() {
            if (this.supported.ui && (this.config.invertTime || !this.currentTime)) {
                if (this.duration >= Math.pow(2, 32)) return JT(this.elements.display.currentTime, !0), void JT(this.elements.progress, !0);
                AT(this.elements.inputs.seek) && this.elements.inputs.seek.setAttribute("aria-valuemax", this.duration);
                var e = AT(this.elements.display.duration);
                !e && this.config.displayDuration && this.paused && rA.updateTimeDisplay.call(this, this.elements.display.currentTime, this.duration), e && rA.updateTimeDisplay.call(this, this.elements.display.duration, this.duration), rA.updateSeekTooltip.call(this)
            }
        },
        toggleMenuButton: function(e, t) {
            JT(this.elements.settings.buttons[e], !t)
        },
        updateSetting: function(e, t, n) {
            var r = this.elements.settings.panels[e],
                i = null,
                o = t;
            if ("captions" === e) i = this.currentTrack;
            else {
                if (i = RT(n) ? this[e] : n, RT(i) && (i = this.config[e].default), !RT(this.options[e]) && !this.options[e].includes(i)) return void this.debug.warn("Unsupported value of '".concat(i, "' for ").concat(e));
                if (!this.config[e].options.includes(i)) return void this.debug.warn("Disabled value of '".concat(i, "' for ").concat(e))
            }
            if (AT(o) || (o = r && r.querySelector('[role="menu"]')), AT(o)) {
                this.elements.settings.buttons[e].querySelector(".".concat(this.config.classNames.menu.value)).innerHTML = rA.getLabel.call(this, e, i);
                var a = o && o.querySelector('[value="'.concat(i, '"]'));
                AT(a) && (a.checked = !0)
            }
        },
        getLabel: function(e, t) {
            switch (e) {
                case "speed":
                    return 1 === t ? $x("normal", this.config) : "".concat(t, "&times;");
                case "quality":
                    if (_T(t)) {
                        var n = $x("qualityLabel.".concat(t), this.config);
                        return n.length ? n : "".concat(t, "p")
                    }
                    return Vx(t);
                case "captions":
                    return aA.getLabel.call(this);
                default:
                    return null
            }
        },
        setQualityMenu: function(e) {
            var t = this;
            if (AT(this.elements.settings.panels.quality)) {
                var n = this.elements.settings.panels.quality.querySelector('[role="menu"]');
                TT(e) && (this.options.quality = _x(e).filter((function(e) {
                    return t.config.quality.options.includes(e)
                })));
                var r = !RT(this.options.quality) && this.options.quality.length > 1;
                if (rA.toggleMenuButton.call(this, "quality", r), GT(n), rA.checkMenu.call(this), r) {
                    var i = function(e) {
                        var n = $x("qualityBadge.".concat(e), t.config);
                        return n.length ? rA.createBadge.call(t, n) : null
                    };
                    this.options.quality.sort((function(e, n) {
                        var r = t.config.quality.options;
                        return r.indexOf(e) > r.indexOf(n) ? 1 : -1
                    })).forEach((function(e) {
                        rA.createMenuItem.call(t, {
                            value: e,
                            list: n,
                            type: "quality",
                            title: rA.getLabel.call(t, "quality", e),
                            badge: i(e)
                        })
                    })), rA.updateSetting.call(this, "quality", n)
                }
            }
        },
        setCaptionsMenu: function() {
            var e = this;
            if (AT(this.elements.settings.panels.captions)) {
                var t = this.elements.settings.panels.captions.querySelector('[role="menu"]'),
                    n = aA.getTracks.call(this),
                    r = Boolean(n.length);
                if (rA.toggleMenuButton.call(this, "captions", r), GT(t), rA.checkMenu.call(this), r) {
                    var i = n.map((function(n, r) {
                        return {
                            value: r,
                            checked: e.captions.toggled && e.currentTrack === r,
                            title: aA.getLabel.call(e, n),
                            badge: n.language && rA.createBadge.call(e, n.language.toUpperCase()),
                            list: t,
                            type: "language"
                        }
                    }));
                    i.unshift({
                        value: -1,
                        checked: !this.captions.toggled,
                        title: $x("disabled", this.config),
                        list: t,
                        type: "language"
                    }), i.forEach(rA.createMenuItem.bind(this)), rA.updateSetting.call(this, "captions", t)
                }
            }
        },
        setSpeedMenu: function() {
            var e = this;
            if (AT(this.elements.settings.panels.speed)) {
                var t = this.elements.settings.panels.speed.querySelector('[role="menu"]');
                this.options.speed = this.options.speed.filter((function(t) {
                    return t >= e.minimumSpeed && t <= e.maximumSpeed
                }));
                var n = !RT(this.options.speed) && this.options.speed.length > 1;
                rA.toggleMenuButton.call(this, "speed", n), GT(t), rA.checkMenu.call(this), n && (this.options.speed.forEach((function(n) {
                    rA.createMenuItem.call(e, {
                        value: n,
                        list: t,
                        type: "speed",
                        title: rA.getLabel.call(e, "speed", n)
                    })
                })), rA.updateSetting.call(this, "speed", t))
            }
        },
        checkMenu: function() {
            var e = this.elements.settings.buttons,
                t = !RT(e) && Object.values(e).some((function(e) {
                    return !e.hidden
                }));
            JT(this.elements.settings.menu, !t)
        },
        focusFirstMenuItem: function(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
            if (!this.elements.settings.popup.hidden) {
                var n = e;
                AT(n) || (n = Object.values(this.elements.settings.panels).find((function(e) {
                    return !e.hidden
                })));
                var r = n.querySelector('[role^="menuitem"]');
                rx.call(this, r, t)
            }
        },
        toggleMenu: function(e) {
            var t = this.elements.settings.popup,
                n = this.elements.buttons.settings;
            if (AT(t) && AT(n)) {
                var r = t.hidden,
                    i = r;
                if (kT(e)) i = e;
                else if (PT(e) && 27 === e.which) i = !1;
                else if (OT(e)) {
                    var o = ST(e.composedPath) ? e.composedPath()[0] : e.target,
                        a = t.contains(o);
                    if (a || !a && e.target !== n && i) return
                }
                n.setAttribute("aria-expanded", i), JT(t, !i), QT(this.elements.container, this.config.classNames.menu.open, i), i && PT(e) ? rA.focusFirstMenuItem.call(this, null, !0) : i || r || rx.call(this, n, PT(e))
            }
        },
        getMenuSize: function(e) {
            var t = e.cloneNode(!0);
            t.style.position = "absolute", t.style.opacity = 0, t.removeAttribute("hidden"), e.parentNode.appendChild(t);
            var n = t.scrollWidth,
                r = t.scrollHeight;
            return $T(t), {
                width: n,
                height: r
            }
        },
        showMenuPanel: function() {
            var e = this,
                t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : "",
                n = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                r = this.elements.container.querySelector("#plyr-settings-".concat(this.id, "-").concat(t));
            if (AT(r)) {
                var i = r.parentNode,
                    o = Array.from(i.children).find((function(e) {
                        return !e.hidden
                    }));
                if (ax.transitions && !ax.reducedMotion) {
                    i.style.width = "".concat(o.scrollWidth, "px"), i.style.height = "".concat(o.scrollHeight, "px");
                    var a = rA.getMenuSize.call(this, r),
                        s = function t(n) {
                            n.target === i && ["width", "height"].includes(n.propertyName) && (i.style.width = "", i.style.height = "", lx.call(e, i, LT, t))
                        };
                    ux.call(this, i, LT, s), i.style.width = "".concat(a.width, "px"), i.style.height = "".concat(a.height, "px")
                }
                JT(o, !0), JT(r, !1), rA.focusFirstMenuItem.call(this, r, n)
            }
        },
        setDownloadUrl: function() {
            var e = this.elements.buttons.download;
            AT(e) && e.setAttribute("href", this.download)
        },
        create: function(e) {
            var t = this,
                n = rA.bindMenuItemShortcuts,
                r = rA.createButton,
                i = rA.createProgress,
                o = rA.createRange,
                a = rA.createTime,
                s = rA.setQualityMenu,
                c = rA.setSpeedMenu,
                u = rA.showMenuPanel;
            this.elements.controls = null, TT(this.config.controls) && this.config.controls.includes("play-large") && this.elements.container.appendChild(r.call(this, "play-large"));
            var l = zT("div", XT(this.config.selectors.controls.wrapper));
            this.elements.controls = l;
            var f = {
                class: "plyr__controls__item"
            };
            return _x(TT(this.config.controls) ? this.config.controls : []).forEach((function(s) {
                if ("restart" === s && l.appendChild(r.call(t, "restart", f)), "rewind" === s && l.appendChild(r.call(t, "rewind", f)), "play" === s && l.appendChild(r.call(t, "play", f)), "fast-forward" === s && l.appendChild(r.call(t, "fast-forward", f)), "progress" === s) {
                    var c = zT("div", {
                            class: "".concat(f.class, " plyr__progress__container")
                        }),
                        h = zT("div", XT(t.config.selectors.progress));
                    if (h.appendChild(o.call(t, "seek", {
                            id: "plyr-seek-".concat(e.id)
                        })), h.appendChild(i.call(t, "buffer")), t.config.tooltips.seek) {
                        var p = zT("span", {
                            class: t.config.classNames.tooltip
                        }, "00:00");
                        h.appendChild(p), t.elements.display.seekTooltip = p
                    }
                    t.elements.progress = h, c.appendChild(t.elements.progress), l.appendChild(c)
                }
                if ("current-time" === s && l.appendChild(a.call(t, "currentTime", f)), "duration" === s && l.appendChild(a.call(t, "duration", f)), "mute" === s || "volume" === s) {
                    var d = t.elements.volume;
                    if (AT(d) && l.contains(d) || (d = zT("div", HT({}, f, {
                            class: "".concat(f.class, " plyr__volume").trim()
                        })), t.elements.volume = d, l.appendChild(d)), "mute" === s && d.appendChild(r.call(t, "mute")), "volume" === s && !MT.isIos) {
                        var g = {
                            max: 1,
                            step: .05,
                            value: t.config.volume
                        };
                        d.appendChild(o.call(t, "volume", HT(g, {
                            id: "plyr-volume-".concat(e.id)
                        })))
                    }
                }
                if ("captions" === s && l.appendChild(r.call(t, "captions", f)), "settings" === s && !RT(t.config.settings)) {
                    var v = zT("div", HT({}, f, {
                        class: "".concat(f.class, " plyr__menu").trim(),
                        hidden: ""
                    }));
                    v.appendChild(r.call(t, "settings", {
                        "aria-haspopup": !0,
                        "aria-controls": "plyr-settings-".concat(e.id),
                        "aria-expanded": !1
                    }));
                    var m = zT("div", {
                            class: "plyr__menu__container",
                            id: "plyr-settings-".concat(e.id),
                            hidden: ""
                        }),
                        y = zT("div"),
                        b = zT("div", {
                            id: "plyr-settings-".concat(e.id, "-home")
                        }),
                        w = zT("div", {
                            role: "menu"
                        });
                    b.appendChild(w), y.appendChild(b), t.elements.settings.panels.home = b, t.config.settings.forEach((function(r) {
                        var i = zT("button", HT(XT(t.config.selectors.buttons.settings), {
                            type: "button",
                            class: "".concat(t.config.classNames.control, " ").concat(t.config.classNames.control, "--forward"),
                            role: "menuitem",
                            "aria-haspopup": !0,
                            hidden: ""
                        }));
                        n.call(t, i, r), ux.call(t, i, "click", (function() {
                            u.call(t, r, !1)
                        }));
                        var o = zT("span", null, $x(r, t.config)),
                            a = zT("span", {
                                class: t.config.classNames.menu.value
                            });
                        a.innerHTML = e[r], o.appendChild(a), i.appendChild(o), w.appendChild(i);
                        var s = zT("div", {
                                id: "plyr-settings-".concat(e.id, "-").concat(r),
                                hidden: ""
                            }),
                            c = zT("button", {
                                type: "button",
                                class: "".concat(t.config.classNames.control, " ").concat(t.config.classNames.control, "--back")
                            });
                        c.appendChild(zT("span", {
                            "aria-hidden": !0
                        }, $x(r, t.config))), c.appendChild(zT("span", {
                            class: t.config.classNames.hidden
                        }, $x("menuBack", t.config))), ux.call(t, s, "keydown", (function(e) {
                            37 === e.which && (e.preventDefault(), e.stopPropagation(), u.call(t, "home", !0))
                        }), !1), ux.call(t, c, "click", (function() {
                            u.call(t, "home", !1)
                        })), s.appendChild(c), s.appendChild(zT("div", {
                            role: "menu"
                        })), y.appendChild(s), t.elements.settings.buttons[r] = i, t.elements.settings.panels[r] = s
                    })), m.appendChild(y), v.appendChild(m), l.appendChild(v), t.elements.settings.popup = m, t.elements.settings.menu = v
                }
                if ("pip" === s && ax.pip && l.appendChild(r.call(t, "pip", f)), "airplay" === s && ax.airplay && l.appendChild(r.call(t, "airplay", f)), "download" === s) {
                    var _ = HT({}, f, {
                        element: "a",
                        href: t.download,
                        target: "_blank"
                    });
                    t.isHTML5 && (_.download = "");
                    var E = t.config.urls.download;
                    !CT(E) && t.isEmbed && HT(_, {
                        icon: "logo-".concat(t.provider),
                        label: t.provider
                    }), l.appendChild(r.call(t, "download", _))
                }
                "fullscreen" === s && l.appendChild(r.call(t, "fullscreen", f))
            })), this.isHTML5 && s.call(this, wx.getQualityOptions.call(this)), c.call(this), l
        },
        inject: function() {
            var e = this;
            if (this.config.loadSprite) {
                var t = rA.getIconUrl.call(this);
                t.cors && Xx(t.url, "sprite-plyr")
            }
            this.id = Math.floor(1e4 * Math.random());
            var n = null;
            this.elements.controls = null;
            var r = {
                    id: this.id,
                    seektime: this.config.seekTime,
                    title: this.config.title
                },
                i = !0;
            ST(this.config.controls) && (this.config.controls = this.config.controls.call(this, r)), this.config.controls || (this.config.controls = []), AT(this.config.controls) || ET(this.config.controls) ? n = this.config.controls : (n = rA.create.call(this, {
                id: this.id,
                seektime: this.config.seekTime,
                speed: this.speed,
                quality: this.quality,
                captions: aA.getLabel.call(this)
            }), i = !1);
            var o, a;
            if (i && ET(this.config.controls) && (o = n, Object.entries(r).forEach((function(e) {
                    var t = rs(e, 2),
                        n = t[0],
                        r = t[1];
                    o = Hx(o, "{".concat(n, "}"), r)
                })), n = o), ET(this.config.selectors.controls.container) && (a = document.querySelector(this.config.selectors.controls.container)), AT(a) || (a = this.elements.container), a[AT(n) ? "insertAdjacentElement" : "insertAdjacentHTML"]("afterbegin", n), AT(this.elements.controls) || rA.findElements.call(this), !RT(this.elements.buttons)) {
                var s = function(t) {
                    var n = e.config.classNames.controlPressed;
                    Object.defineProperty(t, "pressed", {
                        enumerable: !0,
                        get: function() {
                            return ZT(t, n)
                        },
                        set: function() {
                            var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                            QT(t, n, e)
                        }
                    })
                };
                Object.values(this.elements.buttons).filter(Boolean).forEach((function(e) {
                    TT(e) || xT(e) ? Array.from(e).filter(Boolean).forEach(s) : s(e)
                }))
            }
            if (MT.isEdge && NT(a), this.config.tooltips.controls) {
                var c = this.config,
                    u = c.classNames,
                    l = c.selectors,
                    f = "".concat(l.controls.wrapper, " ").concat(l.labels, " .").concat(u.hidden),
                    h = tx.call(this, f);
                Array.from(h).forEach((function(t) {
                    QT(t, e.config.classNames.hidden, !1), QT(t, e.config.classNames.tooltip, !0)
                }))
            }
        }
    };

    function iA(e) {
        var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
            n = e;
        if (t) {
            var r = document.createElement("a");
            r.href = n, n = r.href
        }
        try {
            return new URL(n)
        } catch (e) {
            return null
        }
    }

    function oA(e) {
        var t = new URLSearchParams;
        return wT(e) && Object.entries(e).forEach((function(e) {
            var n = rs(e, 2),
                r = n[0],
                i = n[1];
            t.set(r, i)
        })), t
    }
    var aA = {
            setup: function() {
                if (this.supported.ui)
                    if (!this.isVideo || this.isYouTube || this.isHTML5 && !ax.textTracks) TT(this.config.controls) && this.config.controls.includes("settings") && this.config.settings.includes("captions") && rA.setCaptionsMenu.call(this);
                    else {
                        if (AT(this.elements.captions) || (this.elements.captions = zT("div", XT(this.config.selectors.captions)), function(e, t) {
                                AT(e) && AT(t) && t.parentNode.insertBefore(e, t.nextSibling)
                            }(this.elements.captions, this.elements.wrapper)), MT.isIE && window.URL) {
                            var e = this.media.querySelectorAll("track");
                            Array.from(e).forEach((function(e) {
                                var t = e.getAttribute("src"),
                                    n = iA(t);
                                null !== n && n.hostname !== window.location.href.hostname && ["http:", "https:"].includes(n.protocol) && Kx(t, "blob").then((function(t) {
                                    e.setAttribute("src", window.URL.createObjectURL(t))
                                })).catch((function() {
                                    $T(e)
                                }))
                            }))
                        }
                        var t = _x((navigator.languages || [navigator.language || navigator.userLanguage || "en"]).map((function(e) {
                                return e.split("-")[0]
                            }))),
                            n = (this.storage.get("language") || this.config.captions.language || "auto").toLowerCase();
                        if ("auto" === n) n = rs(t, 1)[0];
                        var r = this.storage.get("captions");
                        if (kT(r) || (r = this.config.captions.active), Object.assign(this.captions, {
                                toggled: !1,
                                active: r,
                                language: n,
                                languages: t
                            }), this.isHTML5) {
                            var i = this.config.captions.update ? "addtrack removetrack" : "removetrack";
                            ux.call(this, this.media.textTracks, i, aA.update.bind(this))
                        }
                        setTimeout(aA.update.bind(this), 0)
                    }
            },
            update: function() {
                var e = this,
                    t = aA.getTracks.call(this, !0),
                    n = this.captions,
                    r = n.active,
                    i = n.language,
                    o = n.meta,
                    a = n.currentTrackNode,
                    s = Boolean(t.find((function(e) {
                        return e.language === i
                    })));
                this.isHTML5 && this.isVideo && t.filter((function(e) {
                    return !o.get(e)
                })).forEach((function(t) {
                    e.debug.log("Track added", t), o.set(t, {
                        default: "showing" === t.mode
                    }), "showing" === t.mode && (t.mode = "hidden"), ux.call(e, t, "cuechange", (function() {
                        return aA.updateCues.call(e)
                    }))
                })), (s && this.language !== i || !t.includes(a)) && (aA.setLanguage.call(this, i), aA.toggle.call(this, r && s)), QT(this.elements.container, this.config.classNames.captions.enabled, !RT(t)), TT(this.config.controls) && this.config.controls.includes("settings") && this.config.settings.includes("captions") && rA.setCaptionsMenu.call(this)
            },
            toggle: function(e) {
                var t = this,
                    n = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                if (this.supported.ui) {
                    var r = this.captions.toggled,
                        i = this.config.classNames.captions.active,
                        o = bT(e) ? !r : e;
                    if (o !== r) {
                        if (n || (this.captions.active = o, this.storage.set({
                                captions: o
                            })), !this.language && o && !n) {
                            var a = aA.getTracks.call(this),
                                s = aA.findTrack.call(this, [this.captions.language].concat(is(this.captions.languages)), !0);
                            return this.captions.language = s.language, void aA.set.call(this, a.indexOf(s))
                        }
                        this.elements.buttons.captions && (this.elements.buttons.captions.pressed = o), QT(this.elements.container, i, o), this.captions.toggled = o, rA.updateSetting.call(this, "captions"), hx.call(this, this.media, o ? "captionsenabled" : "captionsdisabled")
                    }
                    setTimeout((function() {
                        o && t.captions.toggled && (t.captions.currentTrackNode.mode = "hidden")
                    }))
                }
            },
            set: function(e) {
                var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1],
                    n = aA.getTracks.call(this);
                if (-1 !== e)
                    if (_T(e))
                        if (e in n) {
                            if (this.captions.currentTrack !== e) {
                                this.captions.currentTrack = e;
                                var r = n[e],
                                    i = r || {},
                                    o = i.language;
                                this.captions.currentTrackNode = r, rA.updateSetting.call(this, "captions"), t || (this.captions.language = o, this.storage.set({
                                    language: o
                                })), this.isVimeo && this.embed.enableTextTrack(o), hx.call(this, this.media, "languagechange")
                            }
                            aA.toggle.call(this, !0, t), this.isHTML5 && this.isVideo && aA.updateCues.call(this)
                        } else this.debug.warn("Track not found", e);
                else this.debug.warn("Invalid caption argument", e);
                else aA.toggle.call(this, !1, t)
            },
            setLanguage: function(e) {
                var t = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                if (ET(e)) {
                    var n = e.toLowerCase();
                    this.captions.language = n;
                    var r = aA.getTracks.call(this),
                        i = aA.findTrack.call(this, [n]);
                    aA.set.call(this, r.indexOf(i), t)
                } else this.debug.warn("Invalid language argument", e)
            },
            getTracks: function() {
                var e = this,
                    t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                    n = Array.from((this.media || {}).textTracks || []);
                return n.filter((function(n) {
                    return !e.isHTML5 || t || e.captions.meta.has(n)
                })).filter((function(e) {
                    return ["captions", "subtitles"].includes(e.kind)
                }))
            },
            findTrack: function(e) {
                var t, n = this,
                    r = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                    i = aA.getTracks.call(this),
                    o = function(e) {
                        return Number((n.captions.meta.get(e) || {}).default)
                    },
                    a = Array.from(i).sort((function(e, t) {
                        return o(t) - o(e)
                    }));
                return e.every((function(e) {
                    return !(t = a.find((function(t) {
                        return t.language === e
                    })))
                })), t || (r ? a[0] : void 0)
            },
            getCurrentTrack: function() {
                return aA.getTracks.call(this)[this.currentTrack]
            },
            getLabel: function(e) {
                var t = e;
                return !IT(t) && ax.textTracks && this.captions.toggled && (t = aA.getCurrentTrack.call(this)), IT(t) ? RT(t.label) ? RT(t.language) ? $x("enabled", this.config) : e.language.toUpperCase() : t.label : $x("disabled", this.config)
            },
            updateCues: function(e) {
                if (this.supported.ui)
                    if (AT(this.elements.captions))
                        if (bT(e) || Array.isArray(e)) {
                            var t = e;
                            if (!t) {
                                var n = aA.getCurrentTrack.call(this);
                                t = Array.from((n || {}).activeCues || []).map((function(e) {
                                    return e.getCueAsHTML()
                                })).map(zx)
                            }
                            var r = t.map((function(e) {
                                return e.trim()
                            })).join("\n");
                            if (r !== this.elements.captions.innerHTML) {
                                GT(this.elements.captions);
                                var i = zT("span", XT(this.config.selectors.caption));
                                i.innerHTML = r, this.elements.captions.appendChild(i), hx.call(this, this.media, "cuechange")
                            }
                        } else this.debug.warn("updateCues: Invalid input", e);
                else this.debug.warn("No captions element to render to")
            }
        },
        sA = {
            enabled: !0,
            title: "",
            debug: !1,
            autoplay: !1,
            autopause: !0,
            playsinline: !0,
            seekTime: 10,
            volume: 1,
            muted: !1,
            duration: null,
            displayDuration: !0,
            invertTime: !0,
            toggleInvert: !0,
            ratio: null,
            clickToPlay: !0,
            hideControls: !0,
            resetOnEnd: !1,
            disableContextMenu: !0,
            loadSprite: !0,
            iconPrefix: "plyr",
            iconUrl: "https://cdn.plyr.io/3.6.2/plyr.svg",
            blankVideo: "https://cdn.plyr.io/static/blank.mp4",
            quality: {
                default: 576,
                options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240],
                forced: !1,
                onChange: null
            },
            loop: {
                active: !1
            },
            speed: {
                selected: 1,
                options: [.5, .75, 1, 1.25, 1.5, 1.75, 2, 4]
            },
            keyboard: {
                focused: !0,
                global: !1
            },
            tooltips: {
                controls: !1,
                seek: !0
            },
            captions: {
                active: !1,
                language: "auto",
                update: !1
            },
            fullscreen: {
                enabled: !0,
                fallback: !0,
                iosNative: !1
            },
            storage: {
                enabled: !0,
                key: "plyr"
            },
            controls: ["play-large", "play", "progress", "current-time", "mute", "volume", "captions", "settings", "pip", "airplay", "fullscreen"],
            settings: ["captions", "quality", "speed"],
            i18n: {
                restart: "Restart",
                rewind: "Rewind {seektime}s",
                play: "Play",
                pause: "Pause",
                fastForward: "Forward {seektime}s",
                seek: "Seek",
                seekLabel: "{currentTime} of {duration}",
                played: "Played",
                buffered: "Buffered",
                currentTime: "Current time",
                duration: "Duration",
                volume: "Volume",
                mute: "Mute",
                unmute: "Unmute",
                enableCaptions: "Enable captions",
                disableCaptions: "Disable captions",
                download: "Download",
                enterFullscreen: "Enter fullscreen",
                exitFullscreen: "Exit fullscreen",
                frameTitle: "Player for {title}",
                captions: "Captions",
                settings: "Settings",
                pip: "PIP",
                menuBack: "Go back to previous menu",
                speed: "Speed",
                normal: "Normal",
                quality: "Quality",
                loop: "Loop",
                start: "Start",
                end: "End",
                all: "All",
                reset: "Reset",
                disabled: "Disabled",
                enabled: "Enabled",
                advertisement: "Ad",
                qualityBadge: {
                    2160: "4K",
                    1440: "HD",
                    1080: "HD",
                    720: "HD",
                    576: "SD",
                    480: "SD"
                }
            },
            listeners: {
                seek: null,
                play: null,
                pause: null,
                restart: null,
                rewind: null,
                fastForward: null,
                mute: null,
                volume: null,
                captions: null,
                download: null,
                fullscreen: null,
                pip: null,
                airplay: null,
                speed: null,
                quality: null,
                loop: null,
                language: null
            },
            events: ["ended", "progress", "stalled", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "seeked", "emptied", "ratechange", "cuechange", "download", "enterfullscreen", "exitfullscreen", "captionsenabled", "captionsdisabled", "languagechange", "controlshidden", "controlsshown", "ready", "statechange", "qualitychange", "adsloaded", "adscontentpause", "adscontentresume", "adstarted", "adsmidpoint", "adscomplete", "adsallcomplete", "adsimpression", "adsclick"],
            selectors: {
                editable: "input, textarea, select, [contenteditable]",
                container: ".plyr",
                controls: {
                    container: null,
                    wrapper: ".plyr__controls"
                },
                labels: "[data-plyr]",
                buttons: {
                    play: '[data-plyr="play"]',
                    pause: '[data-plyr="pause"]',
                    restart: '[data-plyr="restart"]',
                    rewind: '[data-plyr="rewind"]',
                    fastForward: '[data-plyr="fast-forward"]',
                    mute: '[data-plyr="mute"]',
                    captions: '[data-plyr="captions"]',
                    download: '[data-plyr="download"]',
                    fullscreen: '[data-plyr="fullscreen"]',
                    pip: '[data-plyr="pip"]',
                    airplay: '[data-plyr="airplay"]',
                    settings: '[data-plyr="settings"]',
                    loop: '[data-plyr="loop"]'
                },
                inputs: {
                    seek: '[data-plyr="seek"]',
                    volume: '[data-plyr="volume"]',
                    speed: '[data-plyr="speed"]',
                    language: '[data-plyr="language"]',
                    quality: '[data-plyr="quality"]'
                },
                display: {
                    currentTime: ".plyr__time--current",
                    duration: ".plyr__time--duration",
                    buffer: ".plyr__progress__buffer",
                    loop: ".plyr__progress__loop",
                    volume: ".plyr__volume--display"
                },
                progress: ".plyr__progress",
                captions: ".plyr__captions",
                caption: ".plyr__caption"
            },
            classNames: {
                type: "plyr--{0}",
                provider: "plyr--{0}",
                video: "plyr__video-wrapper",
                embed: "plyr__video-embed",
                videoFixedRatio: "plyr__video-wrapper--fixed-ratio",
                embedContainer: "plyr__video-embed__container",
                poster: "plyr__poster",
                posterEnabled: "plyr__poster-enabled",
                ads: "plyr__ads",
                control: "plyr__control",
                controlPressed: "plyr__control--pressed",
                playing: "plyr--playing",
                paused: "plyr--paused",
                stopped: "plyr--stopped",
                loading: "plyr--loading",
                hover: "plyr--hover",
                tooltip: "plyr__tooltip",
                cues: "plyr__cues",
                hidden: "plyr__sr-only",
                hideControls: "plyr--hide-controls",
                isIos: "plyr--is-ios",
                isTouch: "plyr--is-touch",
                uiSupported: "plyr--full-ui",
                noTransition: "plyr--no-transition",
                display: {
                    time: "plyr__time"
                },
                menu: {
                    value: "plyr__menu__value",
                    badge: "plyr__badge",
                    open: "plyr--menu-open"
                },
                captions: {
                    enabled: "plyr--captions-enabled",
                    active: "plyr--captions-active"
                },
                fullscreen: {
                    enabled: "plyr--fullscreen-enabled",
                    fallback: "plyr--fullscreen-fallback"
                },
                pip: {
                    supported: "plyr--pip-supported",
                    active: "plyr--pip-active"
                },
                airplay: {
                    supported: "plyr--airplay-supported",
                    active: "plyr--airplay-active"
                },
                tabFocus: "plyr__tab-focus",
                previewThumbnails: {
                    thumbContainer: "plyr__preview-thumb",
                    thumbContainerShown: "plyr__preview-thumb--is-shown",
                    imageContainer: "plyr__preview-thumb__image-container",
                    timeContainer: "plyr__preview-thumb__time-container",
                    scrubbingContainer: "plyr__preview-scrubbing",
                    scrubbingContainerShown: "plyr__preview-scrubbing--is-shown"
                }
            },
            attributes: {
                embed: {
                    provider: "data-plyr-provider",
                    id: "data-plyr-embed-id"
                }
            },
            ads: {
                enabled: !1,
                publisherId: "",
                tagUrl: ""
            },
            previewThumbnails: {
                enabled: !1,
                src: ""
            },
            vimeo: {
                byline: !1,
                portrait: !1,
                title: !1,
                speed: !0,
                transparent: !1,
                premium: !1,
                referrerPolicy: null
            },
            youtube: {
                noCookie: !0,
                rel: 0,
                showinfo: 0,
                iv_load_policy: 3,
                modestbranding: 1
            }
        },
        cA = "picture-in-picture",
        uA = "inline",
        lA = {
            html5: "html5",
            youtube: "youtube",
            vimeo: "vimeo"
        },
        fA = "audio",
        hA = "video";
    var pA = function() {},
        dA = function() {
            function e() {
                var t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                Xa(this, e), this.enabled = window.console && t, this.enabled && this.log("Debugging enabled")
            }
            return Qa(e, [{
                key: "log",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.log, console) : pA
                }
            }, {
                key: "warn",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.warn, console) : pA
                }
            }, {
                key: "error",
                get: function() {
                    return this.enabled ? Function.prototype.bind.call(console.error, console) : pA
                }
            }]), e
        }(),
        gA = function() {
            function e(t) {
                var n = this;
                Xa(this, e), this.player = t, this.prefix = e.prefix, this.property = e.property, this.scrollPosition = {
                    x: 0,
                    y: 0
                }, this.forceFallback = "force" === t.config.fullscreen.fallback, this.player.elements.fullscreen = t.config.fullscreen.container && function(e, t) {
                    return (Element.prototype.closest || function() {
                        var e = this;
                        do {
                            if (ex.matches(e, t)) return e;
                            e = e.parentElement || e.parentNode
                        } while (null !== e && 1 === e.nodeType);
                        return null
                    }).call(e, t)
                }(this.player.elements.container, t.config.fullscreen.container), ux.call(this.player, document, "ms" === this.prefix ? "MSFullscreenChange" : "".concat(this.prefix, "fullscreenchange"), (function() {
                    n.onChange()
                })), ux.call(this.player, this.player.elements.container, "dblclick", (function(e) {
                    AT(n.player.elements.controls) && n.player.elements.controls.contains(e.target) || n.toggle()
                })), ux.call(this, this.player.elements.container, "keydown", (function(e) {
                    return n.trapFocus(e)
                })), this.update()
            }
            return Qa(e, [{
                key: "onChange",
                value: function() {
                    if (this.enabled) {
                        var e = this.player.elements.buttons.fullscreen;
                        AT(e) && (e.pressed = this.active), hx.call(this.player, this.target, this.active ? "enterfullscreen" : "exitfullscreen", !0)
                    }
                }
            }, {
                key: "toggleFallback",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                    if (e ? this.scrollPosition = {
                            x: window.scrollX || 0,
                            y: window.scrollY || 0
                        } : window.scrollTo(this.scrollPosition.x, this.scrollPosition.y), document.body.style.overflow = e ? "hidden" : "", QT(this.target, this.player.config.classNames.fullscreen.fallback, e), MT.isIos) {
                        var t = document.head.querySelector('meta[name="viewport"]'),
                            n = "viewport-fit=cover";
                        t || (t = document.createElement("meta")).setAttribute("name", "viewport");
                        var r = ET(t.content) && t.content.includes(n);
                        e ? (this.cleanupViewport = !r, r || (t.content += ",".concat(n))) : this.cleanupViewport && (t.content = t.content.split(",").filter((function(e) {
                            return e.trim() !== n
                        })).join(","))
                    }
                    this.onChange()
                }
            }, {
                key: "trapFocus",
                value: function(e) {
                    if (!MT.isIos && this.active && "Tab" === e.key && 9 === e.keyCode) {
                        var t = document.activeElement,
                            n = tx.call(this.player, "a[href], button:not(:disabled), input:not(:disabled), [tabindex]"),
                            r = rs(n, 1)[0],
                            i = n[n.length - 1];
                        t !== i || e.shiftKey ? t === r && e.shiftKey && (i.focus(), e.preventDefault()) : (r.focus(), e.preventDefault())
                    }
                }
            }, {
                key: "update",
                value: function() {
                    var t;
                    this.enabled ? (t = this.forceFallback ? "Fallback (forced)" : e.native ? "Native" : "Fallback", this.player.debug.log("".concat(t, " fullscreen enabled"))) : this.player.debug.log("Fullscreen not supported and fallback disabled");
                    QT(this.player.elements.container, this.player.config.classNames.fullscreen.enabled, this.enabled)
                }
            }, {
                key: "enter",
                value: function() {
                    this.enabled && (MT.isIos && this.player.config.fullscreen.iosNative ? this.target.webkitEnterFullscreen() : !e.native || this.forceFallback ? this.toggleFallback(!0) : this.prefix ? RT(this.prefix) || this.target["".concat(this.prefix, "Request").concat(this.property)]() : this.target.requestFullscreen({
                        navigationUI: "hide"
                    }))
                }
            }, {
                key: "exit",
                value: function() {
                    if (this.enabled)
                        if (MT.isIos && this.player.config.fullscreen.iosNative) this.target.webkitExitFullscreen(), gx(this.player.play());
                        else if (!e.native || this.forceFallback) this.toggleFallback(!1);
                    else if (this.prefix) {
                        if (!RT(this.prefix)) {
                            var t = "moz" === this.prefix ? "Cancel" : "Exit";
                            document["".concat(this.prefix).concat(t).concat(this.property)]()
                        }
                    } else(document.cancelFullScreen || document.exitFullscreen).call(document)
                }
            }, {
                key: "toggle",
                value: function() {
                    this.active ? this.exit() : this.enter()
                }
            }, {
                key: "usingNative",
                get: function() {
                    return e.native && !this.forceFallback
                }
            }, {
                key: "enabled",
                get: function() {
                    return (e.native || this.player.config.fullscreen.fallback) && this.player.config.fullscreen.enabled && this.player.supported.ui && this.player.isVideo
                }
            }, {
                key: "active",
                get: function() {
                    if (!this.enabled) return !1;
                    if (!e.native || this.forceFallback) return ZT(this.target, this.player.config.classNames.fullscreen.fallback);
                    var t = this.prefix ? document["".concat(this.prefix).concat(this.property, "Element")] : document.fullscreenElement;
                    return t && t.shadowRoot ? t === this.target.getRootNode().host : t === this.target
                }
            }, {
                key: "target",
                get: function() {
                    return MT.isIos && this.player.config.fullscreen.iosNative ? this.player.media : this.player.elements.fullscreen || this.player.elements.container
                }
            }], [{
                key: "native",
                get: function() {
                    return !!(document.fullscreenEnabled || document.webkitFullscreenEnabled || document.mozFullScreenEnabled || document.msFullscreenEnabled)
                }
            }, {
                key: "prefix",
                get: function() {
                    if (ST(document.exitFullscreen)) return "";
                    var e = "";
                    return ["webkit", "moz", "ms"].some((function(t) {
                        return !(!ST(document["".concat(t, "ExitFullscreen")]) && !ST(document["".concat(t, "CancelFullScreen")])) && (e = t, !0)
                    })), e
                }
            }, {
                key: "property",
                get: function() {
                    return "moz" === this.prefix ? "FullScreen" : "Fullscreen"
                }
            }]), e
        }(),
        vA = Math.sign || function(e) {
            return 0 == (e = +e) || e != e ? e : e < 0 ? -1 : 1
        };

    function mA(e) {
        var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 1;
        return new Promise((function(n, r) {
            var i = new Image,
                o = function() {
                    delete i.onload, delete i.onerror, (i.naturalWidth >= t ? n : r)(i)
                };
            Object.assign(i, {
                onload: o,
                onerror: o,
                src: e
            })
        }))
    }
    Pv({
        target: "Math",
        stat: !0
    }, {
        sign: vA
    });
    var yA = {
            addStyleHook: function() {
                QT(this.elements.container, this.config.selectors.container.replace(".", ""), !0), QT(this.elements.container, this.config.classNames.uiSupported, this.supported.ui)
            },
            toggleNativeControls: function() {
                var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                e && this.isHTML5 ? this.media.setAttribute("controls", "") : this.media.removeAttribute("controls")
            },
            build: function() {
                var e = this;
                if (this.listeners.media(), !this.supported.ui) return this.debug.warn("Basic support only for ".concat(this.provider, " ").concat(this.type)), void yA.toggleNativeControls.call(this, !0);
                AT(this.elements.controls) || (rA.inject.call(this), this.listeners.controls()), yA.toggleNativeControls.call(this), this.isHTML5 && aA.setup.call(this), this.volume = null, this.muted = null, this.loop = null, this.quality = null, this.speed = null, rA.updateVolume.call(this), rA.timeUpdate.call(this), yA.checkPlaying.call(this), QT(this.elements.container, this.config.classNames.pip.supported, ax.pip && this.isHTML5 && this.isVideo), QT(this.elements.container, this.config.classNames.airplay.supported, ax.airplay && this.isHTML5), QT(this.elements.container, this.config.classNames.isIos, MT.isIos), QT(this.elements.container, this.config.classNames.isTouch, this.touch), this.ready = !0, setTimeout((function() {
                    hx.call(e, e.media, "ready")
                }), 0), yA.setTitle.call(this), this.poster && yA.setPoster.call(this, this.poster, !1).catch((function() {})), this.config.duration && rA.durationUpdate.call(this)
            },
            setTitle: function() {
                var e = $x("play", this.config);
                if (ET(this.config.title) && !RT(this.config.title) && (e += ", ".concat(this.config.title)), Array.from(this.elements.buttons.play || []).forEach((function(t) {
                        t.setAttribute("aria-label", e)
                    })), this.isEmbed) {
                    var t = nx.call(this, "iframe");
                    if (!AT(t)) return;
                    var n = RT(this.config.title) ? "video" : this.config.title,
                        r = $x("frameTitle", this.config);
                    t.setAttribute("title", r.replace("{title}", n))
                }
            },
            togglePoster: function(e) {
                QT(this.elements.container, this.config.classNames.posterEnabled, e)
            },
            setPoster: function(e) {
                var t = this,
                    n = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                return n && this.poster ? Promise.reject(new Error("Poster already set")) : (this.media.setAttribute("data-poster", e), dx.call(this).then((function() {
                    return mA(e)
                })).catch((function(n) {
                    throw e === t.poster && yA.togglePoster.call(t, !1), n
                })).then((function() {
                    if (e !== t.poster) throw new Error("setPoster cancelled by later call to setPoster")
                })).then((function() {
                    return Object.assign(t.elements.poster.style, {
                        backgroundImage: "url('".concat(e, "')"),
                        backgroundSize: ""
                    }), yA.togglePoster.call(t, !0), e
                })))
            },
            checkPlaying: function(e) {
                var t = this;
                QT(this.elements.container, this.config.classNames.playing, this.playing), QT(this.elements.container, this.config.classNames.paused, this.paused), QT(this.elements.container, this.config.classNames.stopped, this.stopped), Array.from(this.elements.buttons.play || []).forEach((function(e) {
                    Object.assign(e, {
                        pressed: t.playing
                    }), e.setAttribute("aria-label", $x(t.playing ? "pause" : "play", t.config))
                })), OT(e) && "timeupdate" === e.type || yA.toggleControls.call(this)
            },
            checkLoading: function(e) {
                var t = this;
                this.loading = ["stalled", "waiting"].includes(e.type), clearTimeout(this.timers.loading), this.timers.loading = setTimeout((function() {
                    QT(t.elements.container, t.config.classNames.loading, t.loading), yA.toggleControls.call(t)
                }), this.loading ? 250 : 0)
            },
            toggleControls: function(e) {
                var t = this.elements.controls;
                if (t && this.config.hideControls) {
                    var n = this.touch && this.lastSeekTime + 2e3 > Date.now();
                    this.toggleControls(Boolean(e || this.loading || this.paused || t.pressed || t.hover || n))
                }
            },
            migrateStyles: function() {
                var e = this;
                Object.values(ts({}, this.media.style)).filter((function(e) {
                    return !RT(e) && e.startsWith("--plyr")
                })).forEach((function(t) {
                    e.elements.container.style.setProperty(t, e.media.style.getPropertyValue(t)), e.media.style.removeProperty(t)
                })), RT(this.media.style) && this.media.removeAttribute("style")
            }
        },
        bA = function() {
            function e(t) {
                Xa(this, e), this.player = t, this.lastKey = null, this.focusTimer = null, this.lastKeyDown = null, this.handleKey = this.handleKey.bind(this), this.toggleMenu = this.toggleMenu.bind(this), this.setTabFocus = this.setTabFocus.bind(this), this.firstTouch = this.firstTouch.bind(this)
            }
            return Qa(e, [{
                key: "handleKey",
                value: function(e) {
                    var t = this.player,
                        n = t.elements,
                        r = e.keyCode ? e.keyCode : e.which,
                        i = "keydown" === e.type,
                        o = i && r === this.lastKey;
                    if (!(e.altKey || e.ctrlKey || e.metaKey || e.shiftKey) && _T(r)) {
                        if (i) {
                            var a = document.activeElement;
                            if (AT(a)) {
                                var s = t.config.selectors.editable;
                                if (a !== n.inputs.seek && ex(a, s)) return;
                                if (32 === e.which && ex(a, 'button, [role^="menuitem"]')) return
                            }
                            switch ([32, 37, 38, 39, 40, 48, 49, 50, 51, 52, 53, 54, 56, 57, 67, 70, 73, 75, 76, 77, 79].includes(r) && (e.preventDefault(), e.stopPropagation()), r) {
                                case 48:
                                case 49:
                                case 50:
                                case 51:
                                case 52:
                                case 53:
                                case 54:
                                case 55:
                                case 56:
                                case 57:
                                    o || (t.currentTime = t.duration / 10 * (r - 48));
                                    break;
                                case 32:
                                case 75:
                                    o || gx(t.togglePlay());
                                    break;
                                case 38:
                                    t.increaseVolume(.1);
                                    break;
                                case 40:
                                    t.decreaseVolume(.1);
                                    break;
                                case 77:
                                    o || (t.muted = !t.muted);
                                    break;
                                case 39:
                                    t.forward();
                                    break;
                                case 37:
                                    t.rewind();
                                    break;
                                case 70:
                                    t.fullscreen.toggle();
                                    break;
                                case 67:
                                    o || t.toggleCaptions();
                                    break;
                                case 76:
                                    t.loop = !t.loop
                            }
                            27 === r && !t.fullscreen.usingNative && t.fullscreen.active && t.fullscreen.toggle(), this.lastKey = r
                        } else this.lastKey = null
                    }
                }
            }, {
                key: "toggleMenu",
                value: function(e) {
                    rA.toggleMenu.call(this.player, e)
                }
            }, {
                key: "firstTouch",
                value: function() {
                    var e = this.player,
                        t = e.elements;
                    e.touch = !0, QT(t.container, e.config.classNames.isTouch, !0)
                }
            }, {
                key: "setTabFocus",
                value: function(e) {
                    var t = this.player,
                        n = t.elements;
                    if (clearTimeout(this.focusTimer), "keydown" !== e.type || 9 === e.which) {
                        "keydown" === e.type && (this.lastKeyDown = e.timeStamp);
                        var r, i = e.timeStamp - this.lastKeyDown <= 20;
                        if ("focus" !== e.type || i) r = t.config.classNames.tabFocus, QT(tx.call(t, ".".concat(r)), r, !1), "focusout" !== e.type && (this.focusTimer = setTimeout((function() {
                            var e = document.activeElement;
                            n.container.contains(e) && QT(document.activeElement, t.config.classNames.tabFocus, !0)
                        }), 10))
                    }
                }
            }, {
                key: "global",
                value: function() {
                    var e = !(arguments.length > 0 && void 0 !== arguments[0]) || arguments[0],
                        t = this.player;
                    t.config.keyboard.global && cx.call(t, window, "keydown keyup", this.handleKey, e, !1), cx.call(t, document.body, "click", this.toggleMenu, e), fx.call(t, document.body, "touchstart", this.firstTouch), cx.call(t, document.body, "keydown focus blur focusout", this.setTabFocus, e, !1, !0)
                }
            }, {
                key: "container",
                value: function() {
                    var e = this.player,
                        t = e.config,
                        n = e.elements,
                        r = e.timers;
                    !t.keyboard.global && t.keyboard.focused && ux.call(e, n.container, "keydown keyup", this.handleKey, !1), ux.call(e, n.container, "mousemove mouseleave touchstart touchmove enterfullscreen exitfullscreen", (function(t) {
                        var i = n.controls;
                        i && "enterfullscreen" === t.type && (i.pressed = !1, i.hover = !1);
                        var o = 0;
                        ["touchstart", "touchmove", "mousemove"].includes(t.type) && (yA.toggleControls.call(e, !0), o = e.touch ? 3e3 : 2e3), clearTimeout(r.controls), r.controls = setTimeout((function() {
                            return yA.toggleControls.call(e, !1)
                        }), o)
                    }));
                    var i = function(t) {
                            if (!t) return bx.call(e);
                            var r = n.container.getBoundingClientRect(),
                                i = r.width,
                                o = r.height;
                            return bx.call(e, "".concat(i, ":").concat(o))
                        },
                        o = function() {
                            clearTimeout(r.resized), r.resized = setTimeout(i, 50)
                        };
                    ux.call(e, n.container, "enterfullscreen exitfullscreen", (function(t) {
                        var r = e.fullscreen,
                            a = r.target,
                            s = r.usingNative;
                        if (a === n.container && (e.isEmbed || !RT(e.config.ratio))) {
                            var c = "enterfullscreen" === t.type,
                                u = i(c);
                            u.padding;
                            ! function(t, n, r) {
                                if (e.isVimeo && !e.config.vimeo.premium) {
                                    var i = e.elements.wrapper.firstChild,
                                        o = rs(t, 2)[1],
                                        a = rs(yx.call(e), 2),
                                        s = a[0],
                                        c = a[1];
                                    i.style.maxWidth = r ? "".concat(o / c * s, "px") : null, i.style.margin = r ? "0 auto" : null
                                }
                            }(u.ratio, 0, c), s || (c ? ux.call(e, window, "resize", o) : lx.call(e, window, "resize", o))
                        }
                    }))
                }
            }, {
                key: "media",
                value: function() {
                    var e = this,
                        t = this.player,
                        n = t.elements;
                    if (ux.call(t, t.media, "timeupdate seeking seeked", (function(e) {
                            return rA.timeUpdate.call(t, e)
                        })), ux.call(t, t.media, "durationchange loadeddata loadedmetadata", (function(e) {
                            return rA.durationUpdate.call(t, e)
                        })), ux.call(t, t.media, "ended", (function() {
                            t.isHTML5 && t.isVideo && t.config.resetOnEnd && (t.restart(), t.pause())
                        })), ux.call(t, t.media, "progress playing seeking seeked", (function(e) {
                            return rA.updateProgress.call(t, e)
                        })), ux.call(t, t.media, "volumechange", (function(e) {
                            return rA.updateVolume.call(t, e)
                        })), ux.call(t, t.media, "playing play pause ended emptied timeupdate", (function(e) {
                            return yA.checkPlaying.call(t, e)
                        })), ux.call(t, t.media, "waiting canplay seeked playing", (function(e) {
                            return yA.checkLoading.call(t, e)
                        })), t.supported.ui && t.config.clickToPlay && !t.isAudio) {
                        var r = nx.call(t, ".".concat(t.config.classNames.video));
                        if (!AT(r)) return;
                        ux.call(t, n.container, "click", (function(i) {
                            ([n.container, r].includes(i.target) || r.contains(i.target)) && (t.touch && t.config.hideControls || (t.ended ? (e.proxy(i, t.restart, "restart"), e.proxy(i, (function() {
                                gx(t.play())
                            }), "play")) : e.proxy(i, (function() {
                                gx(t.togglePlay())
                            }), "play")))
                        }))
                    }
                    t.supported.ui && t.config.disableContextMenu && ux.call(t, n.wrapper, "contextmenu", (function(e) {
                        e.preventDefault()
                    }), !1), ux.call(t, t.media, "volumechange", (function() {
                        t.storage.set({
                            volume: t.volume,
                            muted: t.muted
                        })
                    })), ux.call(t, t.media, "ratechange", (function() {
                        rA.updateSetting.call(t, "speed"), t.storage.set({
                            speed: t.speed
                        })
                    })), ux.call(t, t.media, "qualitychange", (function(e) {
                        rA.updateSetting.call(t, "quality", null, e.detail.quality)
                    })), ux.call(t, t.media, "ready qualitychange", (function() {
                        rA.setDownloadUrl.call(t)
                    }));
                    var i = t.config.events.concat(["keyup", "keydown"]).join(" ");
                    ux.call(t, t.media, i, (function(e) {
                        var r = e.detail,
                            i = void 0 === r ? {} : r;
                        "error" === e.type && (i = t.media.error), hx.call(t, n.container, e.type, !0, i)
                    }))
                }
            }, {
                key: "proxy",
                value: function(e, t, n) {
                    var r = this.player,
                        i = r.config.listeners[n],
                        o = !0;
                    ST(i) && (o = i.call(r, e)), !1 !== o && ST(t) && t.call(r, e)
                }
            }, {
                key: "bind",
                value: function(e, t, n, r) {
                    var i = this,
                        o = !(arguments.length > 4 && void 0 !== arguments[4]) || arguments[4],
                        a = this.player,
                        s = a.config.listeners[r],
                        c = ST(s);
                    ux.call(a, e, t, (function(e) {
                        return i.proxy(e, n, r)
                    }), o && !c)
                }
            }, {
                key: "controls",
                value: function() {
                    var e = this,
                        t = this.player,
                        n = t.elements,
                        r = MT.isIE ? "change" : "input";
                    if (n.buttons.play && Array.from(n.buttons.play).forEach((function(n) {
                            e.bind(n, "click", (function() {
                                gx(t.togglePlay())
                            }), "play")
                        })), this.bind(n.buttons.restart, "click", t.restart, "restart"), this.bind(n.buttons.rewind, "click", t.rewind, "rewind"), this.bind(n.buttons.fastForward, "click", t.forward, "fastForward"), this.bind(n.buttons.mute, "click", (function() {
                            t.muted = !t.muted
                        }), "mute"), this.bind(n.buttons.captions, "click", (function() {
                            return t.toggleCaptions()
                        })), this.bind(n.buttons.download, "click", (function() {
                            hx.call(t, t.media, "download")
                        }), "download"), this.bind(n.buttons.fullscreen, "click", (function() {
                            t.fullscreen.toggle()
                        }), "fullscreen"), this.bind(n.buttons.pip, "click", (function() {
                            t.pip = "toggle"
                        }), "pip"), this.bind(n.buttons.airplay, "click", t.airplay, "airplay"), this.bind(n.buttons.settings, "click", (function(e) {
                            e.stopPropagation(), e.preventDefault(), rA.toggleMenu.call(t, e)
                        }), null, !1), this.bind(n.buttons.settings, "keyup", (function(e) {
                            var n = e.which;
                            [13, 32].includes(n) && (13 !== n ? (e.preventDefault(), e.stopPropagation(), rA.toggleMenu.call(t, e)) : rA.focusFirstMenuItem.call(t, null, !0))
                        }), null, !1), this.bind(n.settings.menu, "keydown", (function(e) {
                            27 === e.which && rA.toggleMenu.call(t, e)
                        })), this.bind(n.inputs.seek, "mousedown mousemove", (function(e) {
                            var t = n.progress.getBoundingClientRect(),
                                r = 100 / t.width * (e.pageX - t.left);
                            e.currentTarget.setAttribute("seek-value", r)
                        })), this.bind(n.inputs.seek, "mousedown mouseup keydown keyup touchstart touchend", (function(e) {
                            var n = e.currentTarget,
                                r = e.keyCode ? e.keyCode : e.which;
                            if (!PT(e) || 39 === r || 37 === r) {
                                t.lastSeekTime = Date.now();
                                var i = n.hasAttribute("play-on-seeked"),
                                    o = ["mouseup", "touchend", "keyup"].includes(e.type);
                                i && o ? (n.removeAttribute("play-on-seeked"), gx(t.play())) : !o && t.playing && (n.setAttribute("play-on-seeked", ""), t.pause())
                            }
                        })), MT.isIos) {
                        var i = tx.call(t, 'input[type="range"]');
                        Array.from(i).forEach((function(t) {
                            return e.bind(t, r, (function(e) {
                                return NT(e.target)
                            }))
                        }))
                    }
                    this.bind(n.inputs.seek, r, (function(e) {
                        var n = e.currentTarget,
                            r = n.getAttribute("seek-value");
                        RT(r) && (r = n.value), n.removeAttribute("seek-value"), t.currentTime = r / n.max * t.duration
                    }), "seek"), this.bind(n.progress, "mouseenter mouseleave mousemove", (function(e) {
                        return rA.updateSeekTooltip.call(t, e)
                    })), this.bind(n.progress, "mousemove touchmove", (function(e) {
                        var n = t.previewThumbnails;
                        n && n.loaded && n.startMove(e)
                    })), this.bind(n.progress, "mouseleave touchend click", (function() {
                        var e = t.previewThumbnails;
                        e && e.loaded && e.endMove(!1, !0)
                    })), this.bind(n.progress, "mousedown touchstart", (function(e) {
                        var n = t.previewThumbnails;
                        n && n.loaded && n.startScrubbing(e)
                    })), this.bind(n.progress, "mouseup touchend", (function(e) {
                        var n = t.previewThumbnails;
                        n && n.loaded && n.endScrubbing(e)
                    })), MT.isWebkit && Array.from(tx.call(t, 'input[type="range"]')).forEach((function(n) {
                        e.bind(n, "input", (function(e) {
                            return rA.updateRangeFill.call(t, e.target)
                        }))
                    })), t.config.toggleInvert && !AT(n.display.duration) && this.bind(n.display.currentTime, "click", (function() {
                        0 !== t.currentTime && (t.config.invertTime = !t.config.invertTime, rA.timeUpdate.call(t))
                    })), this.bind(n.inputs.volume, r, (function(e) {
                        t.volume = e.target.value
                    }), "volume"), this.bind(n.controls, "mouseenter mouseleave", (function(e) {
                        n.controls.hover = !t.touch && "mouseenter" === e.type
                    })), n.fullscreen && Array.from(n.fullscreen.children).filter((function(e) {
                        return !e.contains(n.container)
                    })).forEach((function(r) {
                        e.bind(r, "mouseenter mouseleave", (function(e) {
                            n.controls.hover = !t.touch && "mouseenter" === e.type
                        }))
                    })), this.bind(n.controls, "mousedown mouseup touchstart touchend touchcancel", (function(e) {
                        n.controls.pressed = ["mousedown", "touchstart"].includes(e.type)
                    })), this.bind(n.controls, "focusin", (function() {
                        var r = t.config,
                            i = t.timers;
                        QT(n.controls, r.classNames.noTransition, !0), yA.toggleControls.call(t, !0), setTimeout((function() {
                            QT(n.controls, r.classNames.noTransition, !1)
                        }), 0);
                        var o = e.touch ? 3e3 : 4e3;
                        clearTimeout(i.controls), i.controls = setTimeout((function() {
                            return yA.toggleControls.call(t, !1)
                        }), o)
                    })), this.bind(n.inputs.volume, "wheel", (function(e) {
                        var n = e.webkitDirectionInvertedFromDevice,
                            r = rs([e.deltaX, -e.deltaY].map((function(e) {
                                return n ? -e : e
                            })), 2),
                            i = r[0],
                            o = r[1],
                            a = Math.sign(Math.abs(i) > Math.abs(o) ? i : o);
                        t.increaseVolume(a / 50);
                        var s = t.media.volume;
                        (1 === a && s < 1 || -1 === a && s > 0) && e.preventDefault()
                    }), "volume", !1)
                }
            }]), e
        }(),
        wA = $v("splice"),
        _A = am("splice", {
            ACCESSORS: !0,
            0: 0,
            1: 2
        }),
        EA = Math.max,
        kA = Math.min;
    Pv({
        target: "Array",
        proto: !0,
        forced: !wA || !_A
    }, {
        splice: function(e, t) {
            var n, r, i, o, a, s, c = jv(this),
                u = sv(c.length),
                l = lv(e, u),
                f = arguments.length;
            if (0 === f ? n = r = 0 : 1 === f ? (n = 0, r = u - l) : (n = f - 2, r = kA(EA(ov(t), 0), u - l)), u + n - r > 9007199254740991) throw TypeError("Maximum allowed length exceeded");
            for (i = Bv(c, r), o = 0; o < r; o++)(a = l + o) in c && Cv(i, o, c[a]);
            if (i.length = r, n < r) {
                for (o = l; o < u - r; o++) s = o + n, (a = o + r) in c ? c[s] = c[a] : delete c[s];
                for (o = u; o > u - r + n; o--) delete c[o - 1]
            } else if (n > r)
                for (o = u - r; o > l; o--) s = o + n - 1, (a = o + r - 1) in c ? c[s] = c[a] : delete c[s];
            for (o = 0; o < n; o++) c[o + l] = arguments[o + 2];
            return c.length = u - r + n, i
        }
    });
    var SA = t((function(e, t) {
        e.exports = function() {
            var e = function() {},
                t = {},
                n = {},
                r = {};

            function i(e, t) {
                if (e) {
                    var i = r[e];
                    if (n[e] = t, i)
                        for (; i.length;) i[0](e, t), i.splice(0, 1)
                }
            }

            function o(t, n) {
                t.call && (t = {
                    success: t
                }), n.length ? (t.error || e)(n) : (t.success || e)(t)
            }

            function a(t, n, r, i) {
                var o, s, c = document,
                    u = r.async,
                    l = (r.numRetries || 0) + 1,
                    f = r.before || e,
                    h = t.replace(/[\?|#].*$/, ""),
                    p = t.replace(/^(css|img)!/, "");
                i = i || 0, /(^css!|\.css$)/.test(h) ? ((s = c.createElement("link")).rel = "stylesheet", s.href = p, (o = "hideFocus" in s) && s.relList && (o = 0, s.rel = "preload", s.as = "style")) : /(^img!|\.(png|gif|jpg|svg|webp)$)/.test(h) ? (s = c.createElement("img")).src = p : ((s = c.createElement("script")).src = t, s.async = void 0 === u || u), s.onload = s.onerror = s.onbeforeload = function(e) {
                    var c = e.type[0];
                    if (o) try {
                        s.sheet.cssText.length || (c = "e")
                    } catch (e) {
                        18 != e.code && (c = "e")
                    }
                    if ("e" == c) {
                        if ((i += 1) < l) return a(t, n, r, i)
                    } else if ("preload" == s.rel && "style" == s.as) return s.rel = "stylesheet";
                    n(t, c, e.defaultPrevented)
                }, !1 !== f(t, s) && c.head.appendChild(s)
            }

            function s(e, n, r) {
                var s, c;
                if (n && n.trim && (s = n), c = (s ? r : n) || {}, s) {
                    if (s in t) throw "LoadJS";
                    t[s] = !0
                }

                function u(t, n) {
                    ! function(e, t, n) {
                        var r, i, o = (e = e.push ? e : [e]).length,
                            s = o,
                            c = [];
                        for (r = function(e, n, r) {
                                if ("e" == n && c.push(e), "b" == n) {
                                    if (!r) return;
                                    c.push(e)
                                }--o || t(c)
                            }, i = 0; i < s; i++) a(e[i], r, n)
                    }(e, (function(e) {
                        o(c, e), t && o({
                            success: t,
                            error: n
                        }, e), i(s, e)
                    }), c)
                }
                if (c.returnPromise) return new Promise(u);
                u()
            }
            return s.ready = function(e, t) {
                return function(e, t) {
                    e = e.push ? e : [e];
                    var i, o, a, s = [],
                        c = e.length,
                        u = c;
                    for (i = function(e, n) {
                            n.length && s.push(e), --u || t(s)
                        }; c--;) o = e[c], (a = n[o]) ? i(o, a) : (r[o] = r[o] || []).push(i)
                }(e, (function(e) {
                    o(t, e)
                })), s
            }, s.done = function(e) {
                i(e, [])
            }, s.reset = function() {
                t = {}, n = {}, r = {}
            }, s.isDefined = function(e) {
                return e in t
            }, s
        }()
    }));

    function TA(e) {
        return new Promise((function(t, n) {
            SA(e, {
                success: t,
                error: n
            })
        }))
    }

    function xA(e) {
        e && !this.embed.hasPlayed && (this.embed.hasPlayed = !0), this.media.paused === e && (this.media.paused = !e, hx.call(this, this.media, e ? "play" : "pause"))
    }
    var AA = {
        setup: function() {
            var e = this;
            QT(e.elements.wrapper, e.config.classNames.embed, !0), e.options.speed = e.config.speed.options, bx.call(e), wT(window.Vimeo) ? AA.ready.call(e) : TA(e.config.urls.vimeo.sdk).then((function() {
                AA.ready.call(e)
            })).catch((function(t) {
                e.debug.warn("Vimeo SDK (player.js) failed to load", t)
            }))
        },
        ready: function() {
            var e = this,
                t = this,
                n = t.config.vimeo,
                r = n.premium,
                i = n.referrerPolicy,
                o = ns(n, ["premium", "referrerPolicy"]);
            r && Object.assign(o, {
                controls: !1,
                sidedock: !1
            });
            var a = oA(ts({
                    loop: t.config.loop.active,
                    autoplay: t.autoplay,
                    muted: t.muted,
                    gesture: "media",
                    playsinline: !this.config.fullscreen.iosNative
                }, o)),
                s = t.media.getAttribute("src");
            RT(s) && (s = t.media.getAttribute(t.config.attributes.embed.id));
            var c, u = RT(c = s) ? null : _T(Number(c)) ? c : c.match(/^.*(vimeo.com\/|video\/)(\d+).*/) ? RegExp.$2 : c,
                l = zT("iframe"),
                f = qx(t.config.urls.vimeo.iframe, u, a);
            l.setAttribute("src", f), l.setAttribute("allowfullscreen", ""), l.setAttribute("allow", "autoplay,fullscreen,picture-in-picture"), RT(i) || l.setAttribute("referrerPolicy", i);
            var h = t.poster;
            if (r) l.setAttribute("data-poster", h), t.media = KT(l, t.media);
            else {
                var p = zT("div", {
                    class: t.config.classNames.embedContainer,
                    "data-poster": h
                });
                p.appendChild(l), t.media = KT(p, t.media)
            }
            Kx(qx(t.config.urls.vimeo.api, u), "json").then((function(e) {
                if (!RT(e)) {
                    var n = new URL(e[0].thumbnail_large);
                    n.pathname = "".concat(n.pathname.split("_")[0], ".jpg"), yA.setPoster.call(t, n.href).catch((function() {}))
                }
            })), t.embed = new window.Vimeo.Player(l, {
                autopause: t.config.autopause,
                muted: t.muted
            }), t.media.paused = !0, t.media.currentTime = 0, t.supported.ui && t.embed.disableTextTrack(), t.media.play = function() {
                return xA.call(t, !0), t.embed.play()
            }, t.media.pause = function() {
                return xA.call(t, !1), t.embed.pause()
            }, t.media.stop = function() {
                t.pause(), t.currentTime = 0
            };
            var d = t.media.currentTime;
            Object.defineProperty(t.media, "currentTime", {
                get: function() {
                    return d
                },
                set: function(e) {
                    var n = t.embed,
                        r = t.media,
                        i = t.paused,
                        o = t.volume,
                        a = i && !n.hasPlayed;
                    r.seeking = !0, hx.call(t, r, "seeking"), Promise.resolve(a && n.setVolume(0)).then((function() {
                        return n.setCurrentTime(e)
                    })).then((function() {
                        return a && n.pause()
                    })).then((function() {
                        return a && n.setVolume(o)
                    })).catch((function() {}))
                }
            });
            var g = t.config.speed.selected;
            Object.defineProperty(t.media, "playbackRate", {
                get: function() {
                    return g
                },
                set: function(e) {
                    t.embed.setPlaybackRate(e).then((function() {
                        g = e, hx.call(t, t.media, "ratechange")
                    })).catch((function() {
                        t.options.speed = [1]
                    }))
                }
            });
            var v = t.config.volume;
            Object.defineProperty(t.media, "volume", {
                get: function() {
                    return v
                },
                set: function(e) {
                    t.embed.setVolume(e).then((function() {
                        v = e, hx.call(t, t.media, "volumechange")
                    }))
                }
            });
            var m = t.config.muted;
            Object.defineProperty(t.media, "muted", {
                get: function() {
                    return m
                },
                set: function(e) {
                    var n = !!kT(e) && e;
                    t.embed.setVolume(n ? 0 : t.config.volume).then((function() {
                        m = n, hx.call(t, t.media, "volumechange")
                    }))
                }
            });
            var y, b = t.config.loop;
            Object.defineProperty(t.media, "loop", {
                get: function() {
                    return b
                },
                set: function(e) {
                    var n = kT(e) ? e : t.config.loop.active;
                    t.embed.setLoop(n).then((function() {
                        b = n
                    }))
                }
            }), t.embed.getVideoUrl().then((function(e) {
                y = e, rA.setDownloadUrl.call(t)
            })).catch((function(t) {
                e.debug.warn(t)
            })), Object.defineProperty(t.media, "currentSrc", {
                get: function() {
                    return y
                }
            }), Object.defineProperty(t.media, "ended", {
                get: function() {
                    return t.currentTime === t.duration
                }
            }), Promise.all([t.embed.getVideoWidth(), t.embed.getVideoHeight()]).then((function(n) {
                var r = rs(n, 2),
                    i = r[0],
                    o = r[1];
                t.embed.ratio = [i, o], bx.call(e)
            })), t.embed.setAutopause(t.config.autopause).then((function(e) {
                t.config.autopause = e
            })), t.embed.getVideoTitle().then((function(n) {
                t.config.title = n, yA.setTitle.call(e)
            })), t.embed.getCurrentTime().then((function(e) {
                d = e, hx.call(t, t.media, "timeupdate")
            })), t.embed.getDuration().then((function(e) {
                t.media.duration = e, hx.call(t, t.media, "durationchange")
            })), t.embed.getTextTracks().then((function(e) {
                t.media.textTracks = e, aA.setup.call(t)
            })), t.embed.on("cuechange", (function(e) {
                var n = e.cues,
                    r = (void 0 === n ? [] : n).map((function(e) {
                        return function(e) {
                            var t = document.createDocumentFragment(),
                                n = document.createElement("div");
                            return t.appendChild(n), n.innerHTML = e, t.firstChild.innerText
                        }(e.text)
                    }));
                aA.updateCues.call(t, r)
            })), t.embed.on("loaded", (function() {
                (t.embed.getPaused().then((function(e) {
                    xA.call(t, !e), e || hx.call(t, t.media, "playing")
                })), AT(t.embed.element) && t.supported.ui) && t.embed.element.setAttribute("tabindex", -1)
            })), t.embed.on("bufferstart", (function() {
                hx.call(t, t.media, "waiting")
            })), t.embed.on("bufferend", (function() {
                hx.call(t, t.media, "playing")
            })), t.embed.on("play", (function() {
                xA.call(t, !0), hx.call(t, t.media, "playing")
            })), t.embed.on("pause", (function() {
                xA.call(t, !1)
            })), t.embed.on("timeupdate", (function(e) {
                t.media.seeking = !1, d = e.seconds, hx.call(t, t.media, "timeupdate")
            })), t.embed.on("progress", (function(e) {
                t.media.buffered = e.percent, hx.call(t, t.media, "progress"), 1 === parseInt(e.percent, 10) && hx.call(t, t.media, "canplaythrough"), t.embed.getDuration().then((function(e) {
                    e !== t.media.duration && (t.media.duration = e, hx.call(t, t.media, "durationchange"))
                }))
            })), t.embed.on("seeked", (function() {
                t.media.seeking = !1, hx.call(t, t.media, "seeked")
            })), t.embed.on("ended", (function() {
                t.media.paused = !0, hx.call(t, t.media, "ended")
            })), t.embed.on("error", (function(e) {
                t.media.error = e, hx.call(t, t.media, "error")
            })), setTimeout((function() {
                return yA.build.call(t)
            }), 0)
        }
    };

    function OA(e) {
        e && !this.embed.hasPlayed && (this.embed.hasPlayed = !0), this.media.paused === e && (this.media.paused = !e, hx.call(this, this.media, e ? "play" : "pause"))
    }

    function PA(e) {
        return e.noCookie ? "https://www.youtube-nocookie.com" : "http:" === window.location.protocol ? "http://www.youtube.com" : void 0
    }
    var IA = {
            setup: function() {
                var e = this;
                if (QT(this.elements.wrapper, this.config.classNames.embed, !0), wT(window.YT) && ST(window.YT.Player)) IA.ready.call(this);
                else {
                    var t = window.onYouTubeIframeAPIReady;
                    window.onYouTubeIframeAPIReady = function() {
                        ST(t) && t(), IA.ready.call(e)
                    }, TA(this.config.urls.youtube.sdk).catch((function(t) {
                        e.debug.warn("YouTube API failed to load", t)
                    }))
                }
            },
            getTitle: function(e) {
                var t = this;
                Kx(qx(this.config.urls.youtube.api, e)).then((function(e) {
                    if (wT(e)) {
                        var n = e.title,
                            r = e.height,
                            i = e.width;
                        t.config.title = n, yA.setTitle.call(t), t.embed.ratio = [i, r]
                    }
                    bx.call(t)
                })).catch((function() {
                    bx.call(t)
                }))
            },
            ready: function() {
                var e = this,
                    t = e.media && e.media.getAttribute("id");
                if (RT(t) || !t.startsWith("youtube-")) {
                    var n = e.media.getAttribute("src");
                    RT(n) && (n = e.media.getAttribute(this.config.attributes.embed.id));
                    var r, i, o = RT(r = n) ? null : r.match(/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/) ? RegExp.$2 : r,
                        a = (i = e.provider, "".concat(i, "-").concat(Math.floor(1e4 * Math.random()))),
                        s = zT("div", {
                            id: a,
                            "data-poster": e.poster
                        });
                    e.media = KT(s, e.media);
                    var c = function(e) {
                        return "https://i.ytimg.com/vi/".concat(o, "/").concat(e, "default.jpg")
                    };
                    mA(c("maxres"), 121).catch((function() {
                        return mA(c("sd"), 121)
                    })).catch((function() {
                        return mA(c("hq"))
                    })).then((function(t) {
                        return yA.setPoster.call(e, t.src)
                    })).then((function(t) {
                        t.includes("maxres") || (e.elements.poster.style.backgroundSize = "cover")
                    })).catch((function() {}));
                    var u = e.config.youtube;
                    e.embed = new window.YT.Player(a, {
                        videoId: o,
                        host: PA(u),
                        playerVars: HT({}, {
                            autoplay: e.config.autoplay ? 1 : 0,
                            hl: e.config.hl,
                            controls: e.supported.ui ? 0 : 1,
                            disablekb: 1,
                            playsinline: e.config.fullscreen.iosNative ? 0 : 1,
                            cc_load_policy: e.captions.active ? 1 : 0,
                            cc_lang_pref: e.config.captions.language,
                            widget_referrer: window ? window.location.href : null
                        }, u),
                        events: {
                            onError: function(t) {
                                if (!e.media.error) {
                                    var n = t.data,
                                        r = {
                                            2: "The request contains an invalid parameter value. For example, this error occurs if you specify a video ID that does not have 11 characters, or if the video ID contains invalid characters, such as exclamation points or asterisks.",
                                            5: "The requested content cannot be played in an HTML5 player or another error related to the HTML5 player has occurred.",
                                            100: "The video requested was not found. This error occurs when a video has been removed (for any reason) or has been marked as private.",
                                            101: "The owner of the requested video does not allow it to be played in embedded players.",
                                            150: "The owner of the requested video does not allow it to be played in embedded players."
                                        } [n] || "An unknown error occured";
                                    e.media.error = {
                                        code: n,
                                        message: r
                                    }, hx.call(e, e.media, "error")
                                }
                            },
                            onPlaybackRateChange: function(t) {
                                var n = t.target;
                                e.media.playbackRate = n.getPlaybackRate(), hx.call(e, e.media, "ratechange")
                            },
                            onReady: function(t) {
                                if (!ST(e.media.play)) {
                                    var n = t.target;
                                    IA.getTitle.call(e, o), e.media.play = function() {
                                        OA.call(e, !0), n.playVideo()
                                    }, e.media.pause = function() {
                                        OA.call(e, !1), n.pauseVideo()
                                    }, e.media.stop = function() {
                                        n.stopVideo()
                                    }, e.media.duration = n.getDuration(), e.media.paused = !0, e.media.currentTime = 0, Object.defineProperty(e.media, "currentTime", {
                                        get: function() {
                                            return Number(n.getCurrentTime())
                                        },
                                        set: function(t) {
                                            e.paused && !e.embed.hasPlayed && e.embed.mute(), e.media.seeking = !0, hx.call(e, e.media, "seeking"), n.seekTo(t)
                                        }
                                    }), Object.defineProperty(e.media, "playbackRate", {
                                        get: function() {
                                            return n.getPlaybackRate()
                                        },
                                        set: function(e) {
                                            n.setPlaybackRate(e)
                                        }
                                    });
                                    var r = e.config.volume;
                                    Object.defineProperty(e.media, "volume", {
                                        get: function() {
                                            return r
                                        },
                                        set: function(t) {
                                            r = t, n.setVolume(100 * r), hx.call(e, e.media, "volumechange")
                                        }
                                    });
                                    var i = e.config.muted;
                                    Object.defineProperty(e.media, "muted", {
                                        get: function() {
                                            return i
                                        },
                                        set: function(t) {
                                            var r = kT(t) ? t : i;
                                            i = r, n[r ? "mute" : "unMute"](), hx.call(e, e.media, "volumechange")
                                        }
                                    }), Object.defineProperty(e.media, "currentSrc", {
                                        get: function() {
                                            return n.getVideoUrl()
                                        }
                                    }), Object.defineProperty(e.media, "ended", {
                                        get: function() {
                                            return e.currentTime === e.duration
                                        }
                                    });
                                    var a = n.getAvailablePlaybackRates();
                                    e.options.speed = a.filter((function(t) {
                                        return e.config.speed.options.includes(t)
                                    })), e.supported.ui && e.media.setAttribute("tabindex", -1), hx.call(e, e.media, "timeupdate"), hx.call(e, e.media, "durationchange"), clearInterval(e.timers.buffering), e.timers.buffering = setInterval((function() {
                                        e.media.buffered = n.getVideoLoadedFraction(), (null === e.media.lastBuffered || e.media.lastBuffered < e.media.buffered) && hx.call(e, e.media, "progress"), e.media.lastBuffered = e.media.buffered, 1 === e.media.buffered && (clearInterval(e.timers.buffering), hx.call(e, e.media, "canplaythrough"))
                                    }), 200), setTimeout((function() {
                                        return yA.build.call(e)
                                    }), 50)
                                }
                            },
                            onStateChange: function(t) {
                                var n = t.target;
                                switch (clearInterval(e.timers.playing), e.media.seeking && [1, 2].includes(t.data) && (e.media.seeking = !1, hx.call(e, e.media, "seeked")), t.data) {
                                    case -1:
                                        hx.call(e, e.media, "timeupdate"), e.media.buffered = n.getVideoLoadedFraction(), hx.call(e, e.media, "progress");
                                        break;
                                    case 0:
                                        OA.call(e, !1), e.media.loop ? (n.stopVideo(), n.playVideo()) : hx.call(e, e.media, "ended");
                                        break;
                                    case 1:
                                        e.config.autoplay || !e.media.paused || e.embed.hasPlayed ? (OA.call(e, !0), hx.call(e, e.media, "playing"), e.timers.playing = setInterval((function() {
                                            hx.call(e, e.media, "timeupdate")
                                        }), 50), e.media.duration !== n.getDuration() && (e.media.duration = n.getDuration(), hx.call(e, e.media, "durationchange"))) : e.media.pause();
                                        break;
                                    case 2:
                                        e.muted || e.embed.unMute(), OA.call(e, !1);
                                        break;
                                    case 3:
                                        hx.call(e, e.media, "waiting")
                                }
                                hx.call(e, e.elements.container, "statechange", !1, {
                                    code: t.data
                                })
                            }
                        }
                    })
                }
            }
        },
        jA = {
            setup: function() {
                this.media ? (QT(this.elements.container, this.config.classNames.type.replace("{0}", this.type), !0), QT(this.elements.container, this.config.classNames.provider.replace("{0}", this.provider), !0), this.isEmbed && QT(this.elements.container, this.config.classNames.type.replace("{0}", "video"), !0), this.isVideo && (this.elements.wrapper = zT("div", {
                    class: this.config.classNames.video
                }), VT(this.media, this.elements.wrapper), this.elements.poster = zT("div", {
                    class: this.config.classNames.poster
                }), this.elements.wrapper.appendChild(this.elements.poster)), this.isHTML5 ? wx.setup.call(this) : this.isYouTube ? IA.setup.call(this) : this.isVimeo && AA.setup.call(this)) : this.debug.warn("No media element found!")
            }
        },
        CA = function() {
            function e(t) {
                var n = this;
                Xa(this, e), this.player = t, this.config = t.config.ads, this.playing = !1, this.initialized = !1, this.elements = {
                    container: null,
                    displayContainer: null
                }, this.manager = null, this.loader = null, this.cuePoints = null, this.events = {}, this.safetyTimer = null, this.countdownTimer = null, this.managerPromise = new Promise((function(e, t) {
                    n.on("loaded", e), n.on("error", t)
                })), this.load()
            }
            return Qa(e, [{
                key: "load",
                value: function() {
                    var e = this;
                    this.enabled && (wT(window.google) && wT(window.google.ima) ? this.ready() : TA(this.player.config.urls.googleIMA.sdk).then((function() {
                        e.ready()
                    })).catch((function() {
                        e.trigger("error", new Error("Google IMA SDK failed to load"))
                    })))
                }
            }, {
                key: "ready",
                value: function() {
                    var e, t = this;
                    this.enabled || ((e = this).manager && e.manager.destroy(), e.elements.displayContainer && e.elements.displayContainer.destroy(), e.elements.container.remove()), this.startSafetyTimer(12e3, "ready()"), this.managerPromise.then((function() {
                        t.clearSafetyTimer("onAdsManagerLoaded()")
                    })), this.listeners(), this.setupIMA()
                }
            }, {
                key: "setupIMA",
                value: function() {
                    var e = this;
                    this.elements.container = zT("div", {
                        class: this.player.config.classNames.ads
                    }), this.player.elements.container.appendChild(this.elements.container), google.ima.settings.setVpaidMode(google.ima.ImaSdkSettings.VpaidMode.ENABLED), google.ima.settings.setLocale(this.player.config.ads.language), google.ima.settings.setDisableCustomPlaybackForIOS10Plus(this.player.config.playsinline), this.elements.displayContainer = new google.ima.AdDisplayContainer(this.elements.container, this.player.media), this.loader = new google.ima.AdsLoader(this.elements.displayContainer), this.loader.addEventListener(google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED, (function(t) {
                        return e.onAdsManagerLoaded(t)
                    }), !1), this.loader.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, (function(t) {
                        return e.onAdError(t)
                    }), !1), this.requestAds()
                }
            }, {
                key: "requestAds",
                value: function() {
                    var e = this.player.elements.container;
                    try {
                        var t = new google.ima.AdsRequest;
                        t.adTagUrl = this.tagUrl, t.linearAdSlotWidth = e.offsetWidth, t.linearAdSlotHeight = e.offsetHeight, t.nonLinearAdSlotWidth = e.offsetWidth, t.nonLinearAdSlotHeight = e.offsetHeight, t.forceNonLinearFullSlot = !1, t.setAdWillPlayMuted(!this.player.muted), this.loader.requestAds(t)
                    } catch (e) {
                        this.onAdError(e)
                    }
                }
            }, {
                key: "pollCountdown",
                value: function() {
                    var e = this,
                        t = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                    if (!t) return clearInterval(this.countdownTimer), void this.elements.container.removeAttribute("data-badge-text");
                    var n = function() {
                        var t = nA(Math.max(e.manager.getRemainingTime(), 0)),
                            n = "".concat($x("advertisement", e.player.config), " - ").concat(t);
                        e.elements.container.setAttribute("data-badge-text", n)
                    };
                    this.countdownTimer = setInterval(n, 100)
                }
            }, {
                key: "onAdsManagerLoaded",
                value: function(e) {
                    var t = this;
                    if (this.enabled) {
                        var n = new google.ima.AdsRenderingSettings;
                        n.restoreCustomPlaybackStateOnAdBreakComplete = !0, n.enablePreloading = !0, this.manager = e.getAdsManager(this.player, n), this.cuePoints = this.manager.getCuePoints(), this.manager.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, (function(e) {
                            return t.onAdError(e)
                        })), Object.keys(google.ima.AdEvent.Type).forEach((function(e) {
                            t.manager.addEventListener(google.ima.AdEvent.Type[e], (function(e) {
                                return t.onAdEvent(e)
                            }))
                        })), this.trigger("loaded")
                    }
                }
            }, {
                key: "addCuePoints",
                value: function() {
                    var e = this;
                    RT(this.cuePoints) || this.cuePoints.forEach((function(t) {
                        if (0 !== t && -1 !== t && t < e.player.duration) {
                            var n = e.player.elements.progress;
                            if (AT(n)) {
                                var r = 100 / e.player.duration * t,
                                    i = zT("span", {
                                        class: e.player.config.classNames.cues
                                    });
                                i.style.left = "".concat(r.toString(), "%"), n.appendChild(i)
                            }
                        }
                    }))
                }
            }, {
                key: "onAdEvent",
                value: function(e) {
                    var t = this,
                        n = this.player.elements.container,
                        r = e.getAd(),
                        i = e.getAdData();
                    switch (function(e) {
                        hx.call(t.player, t.player.media, "ads".concat(e.replace(/_/g, "").toLowerCase()))
                    }(e.type), e.type) {
                        case google.ima.AdEvent.Type.LOADED:
                            this.trigger("loaded"), this.pollCountdown(!0), r.isLinear() || (r.width = n.offsetWidth, r.height = n.offsetHeight);
                            break;
                        case google.ima.AdEvent.Type.STARTED:
                            this.manager.setVolume(this.player.volume);
                            break;
                        case google.ima.AdEvent.Type.ALL_ADS_COMPLETED:
                            this.player.ended ? this.loadAds() : this.loader.contentComplete();
                            break;
                        case google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED:
                            this.pauseContent();
                            break;
                        case google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED:
                            this.pollCountdown(), this.resumeContent();
                            break;
                        case google.ima.AdEvent.Type.LOG:
                            i.adError && this.player.debug.warn("Non-fatal ad error: ".concat(i.adError.getMessage()))
                    }
                }
            }, {
                key: "onAdError",
                value: function(e) {
                    this.cancel(), this.player.debug.warn("Ads error", e)
                }
            }, {
                key: "listeners",
                value: function() {
                    var e, t = this,
                        n = this.player.elements.container;
                    this.player.on("canplay", (function() {
                        t.addCuePoints()
                    })), this.player.on("ended", (function() {
                        t.loader.contentComplete()
                    })), this.player.on("timeupdate", (function() {
                        e = t.player.currentTime
                    })), this.player.on("seeked", (function() {
                        var n = t.player.currentTime;
                        RT(t.cuePoints) || t.cuePoints.forEach((function(r, i) {
                            e < r && r < n && (t.manager.discardAdBreak(), t.cuePoints.splice(i, 1))
                        }))
                    })), window.addEventListener("resize", (function() {
                        t.manager && t.manager.resize(n.offsetWidth, n.offsetHeight, google.ima.ViewMode.NORMAL)
                    }))
                }
            }, {
                key: "play",
                value: function() {
                    var e = this,
                        t = this.player.elements.container;
                    this.managerPromise || this.resumeContent(), this.managerPromise.then((function() {
                        e.manager.setVolume(e.player.volume), e.elements.displayContainer.initialize();
                        try {
                            e.initialized || (e.manager.init(t.offsetWidth, t.offsetHeight, google.ima.ViewMode.NORMAL), e.manager.start()), e.initialized = !0
                        } catch (t) {
                            e.onAdError(t)
                        }
                    })).catch((function() {}))
                }
            }, {
                key: "resumeContent",
                value: function() {
                    this.elements.container.style.zIndex = "", this.playing = !1, gx(this.player.media.play())
                }
            }, {
                key: "pauseContent",
                value: function() {
                    this.elements.container.style.zIndex = 3, this.playing = !0, this.player.media.pause()
                }
            }, {
                key: "cancel",
                value: function() {
                    this.initialized && this.resumeContent(), this.trigger("error"), this.loadAds()
                }
            }, {
                key: "loadAds",
                value: function() {
                    var e = this;
                    this.managerPromise.then((function() {
                        e.manager && e.manager.destroy(), e.managerPromise = new Promise((function(t) {
                            e.on("loaded", t), e.player.debug.log(e.manager)
                        })), e.initialized = !1, e.requestAds()
                    })).catch((function() {}))
                }
            }, {
                key: "trigger",
                value: function(e) {
                    for (var t = this, n = arguments.length, r = new Array(n > 1 ? n - 1 : 0), i = 1; i < n; i++) r[i - 1] = arguments[i];
                    var o = this.events[e];
                    TT(o) && o.forEach((function(e) {
                        ST(e) && e.apply(t, r)
                    }))
                }
            }, {
                key: "on",
                value: function(e, t) {
                    return TT(this.events[e]) || (this.events[e] = []), this.events[e].push(t), this
                }
            }, {
                key: "startSafetyTimer",
                value: function(e, t) {
                    var n = this;
                    this.player.debug.log("Safety timer invoked from: ".concat(t)), this.safetyTimer = setTimeout((function() {
                        n.cancel(), n.clearSafetyTimer("startSafetyTimer()")
                    }), e)
                }
            }, {
                key: "clearSafetyTimer",
                value: function(e) {
                    bT(this.safetyTimer) || (this.player.debug.log("Safety timer cleared from: ".concat(e)), clearTimeout(this.safetyTimer), this.safetyTimer = null)
                }
            }, {
                key: "enabled",
                get: function() {
                    var e = this.config;
                    return this.player.isHTML5 && this.player.isVideo && e.enabled && (!RT(e.publisherId) || CT(e.tagUrl))
                }
            }, {
                key: "tagUrl",
                get: function() {
                    var e = this.config;
                    if (CT(e.tagUrl)) return e.tagUrl;
                    var t = {
                        AV_PUBLISHERID: "58c25bb0073ef448b1087ad6",
                        AV_CHANNELID: "5a0458dc28a06145e4519d21",
                        AV_URL: window.location.hostname,
                        cb: Date.now(),
                        AV_WIDTH: 640,
                        AV_HEIGHT: 480,
                        AV_CDIM2: e.publisherId
                    };
                    return "".concat("https://go.aniview.com/api/adserver6/vast/", "?").concat(oA(t))
                }
            }]), e
        }(),
        RA = nm.findIndex,
        LA = !0,
        NA = am("findIndex");
    "findIndex" in [] && Array(1).findIndex((function() {
        LA = !1
    })), Pv({
        target: "Array",
        proto: !0,
        forced: LA || !NA
    }, {
        findIndex: function(e) {
            return RA(this, e, arguments.length > 1 ? arguments[1] : void 0)
        }
    }), _m("findIndex");
    var MA = Math.min,
        UA = [].lastIndexOf,
        DA = !!UA && 1 / [1].lastIndexOf(1, -0) < 0,
        FA = my("lastIndexOf"),
        BA = am("indexOf", {
            ACCESSORS: !0,
            1: 0
        }),
        qA = DA || !FA || !BA ? function(e) {
            if (DA) return UA.apply(this, arguments) || 0;
            var t = pg(this),
                n = sv(t.length),
                r = n - 1;
            for (arguments.length > 1 && (r = MA(r, ov(arguments[1]))), r < 0 && (r = n + r); r >= 0; r--)
                if (r in t && t[r] === e) return r || 0;
            return -1
        } : UA;
    Pv({
        target: "Array",
        proto: !0,
        forced: qA !== [].lastIndexOf
    }, {
        lastIndexOf: qA
    });
    var HA = function(e, t) {
            var n = {};
            return e > t.width / t.height ? (n.width = t.width, n.height = 1 / e * t.width) : (n.height = t.height, n.width = e * t.height), n
        },
        VA = function() {
            function e(t) {
                Xa(this, e), this.player = t, this.thumbnails = [], this.loaded = !1, this.lastMouseMoveTime = Date.now(), this.mouseDown = !1, this.loadedImages = [], this.elements = {
                    thumb: {},
                    scrubbing: {}
                }, this.load()
            }
            return Qa(e, [{
                key: "load",
                value: function() {
                    var e = this;
                    this.player.elements.display.seekTooltip && (this.player.elements.display.seekTooltip.hidden = this.enabled), this.enabled && this.getThumbnails().then((function() {
                        e.enabled && (e.render(), e.determineContainerAutoSizing(), e.loaded = !0)
                    }))
                }
            }, {
                key: "getThumbnails",
                value: function() {
                    var e = this;
                    return new Promise((function(t) {
                        var n = e.player.config.previewThumbnails.src;
                        if (RT(n)) throw new Error("Missing previewThumbnails.src config attribute");
                        var r = function() {
                            e.thumbnails.sort((function(e, t) {
                                return e.height - t.height
                            })), e.player.debug.log("Preview thumbnails", e.thumbnails), t()
                        };
                        if (ST(n)) n((function(t) {
                            e.thumbnails = t, r()
                        }));
                        else {
                            var i = (ET(n) ? [n] : n).map((function(t) {
                                return e.getThumbnail(t)
                            }));
                            Promise.all(i).then(r)
                        }
                    }))
                }
            }, {
                key: "getThumbnail",
                value: function(e) {
                    var t = this;
                    return new Promise((function(n) {
                        Kx(e).then((function(r) {
                            var i, o, a = {
                                frames: (i = r, o = [], i.split(/\r\n\r\n|\n\n|\r\r/).forEach((function(e) {
                                    var t = {};
                                    e.split(/\r\n|\n|\r/).forEach((function(e) {
                                        if (_T(t.startTime)) {
                                            if (!RT(e.trim()) && RT(t.text)) {
                                                var n = e.trim().split("#xywh="),
                                                    r = rs(n, 1);
                                                if (t.text = r[0], n[1]) {
                                                    var i = rs(n[1].split(","), 4);
                                                    t.x = i[0], t.y = i[1], t.w = i[2], t.h = i[3]
                                                }
                                            }
                                        } else {
                                            var o = e.match(/([0-9]{2})?:?([0-9]{2}):([0-9]{2}).([0-9]{2,3})( ?--> ?)([0-9]{2})?:?([0-9]{2}):([0-9]{2}).([0-9]{2,3})/);
                                            o && (t.startTime = 60 * Number(o[1] || 0) * 60 + 60 * Number(o[2]) + Number(o[3]) + Number("0.".concat(o[4])), t.endTime = 60 * Number(o[6] || 0) * 60 + 60 * Number(o[7]) + Number(o[8]) + Number("0.".concat(o[9])))
                                        }
                                    })), t.text && o.push(t)
                                })), o),
                                height: null,
                                urlPrefix: ""
                            };
                            a.frames[0].text.startsWith("/") || a.frames[0].text.startsWith("http://") || a.frames[0].text.startsWith("https://") || (a.urlPrefix = e.substring(0, e.lastIndexOf("/") + 1));
                            var s = new Image;
                            s.onload = function() {
                                a.height = s.naturalHeight, a.width = s.naturalWidth, t.thumbnails.push(a), n()
                            }, s.src = a.urlPrefix + a.frames[0].text
                        }))
                    }))
                }
            }, {
                key: "startMove",
                value: function(e) {
                    if (this.loaded && OT(e) && ["touchmove", "mousemove"].includes(e.type) && this.player.media.duration) {
                        if ("touchmove" === e.type) this.seekTime = this.player.media.duration * (this.player.elements.inputs.seek.value / 100);
                        else {
                            var t = this.player.elements.progress.getBoundingClientRect(),
                                n = 100 / t.width * (e.pageX - t.left);
                            this.seekTime = this.player.media.duration * (n / 100), this.seekTime < 0 && (this.seekTime = 0), this.seekTime > this.player.media.duration - 1 && (this.seekTime = this.player.media.duration - 1), this.mousePosX = e.pageX, this.elements.thumb.time.innerText = nA(this.seekTime)
                        }
                        this.showImageAtCurrentTime()
                    }
                }
            }, {
                key: "endMove",
                value: function() {
                    this.toggleThumbContainer(!1, !0)
                }
            }, {
                key: "startScrubbing",
                value: function(e) {
                    (bT(e.button) || !1 === e.button || 0 === e.button) && (this.mouseDown = !0, this.player.media.duration && (this.toggleScrubbingContainer(!0), this.toggleThumbContainer(!1, !0), this.showImageAtCurrentTime()))
                }
            }, {
                key: "endScrubbing",
                value: function() {
                    var e = this;
                    this.mouseDown = !1, Math.ceil(this.lastTime) === Math.ceil(this.player.media.currentTime) ? this.toggleScrubbingContainer(!1) : fx.call(this.player, this.player.media, "timeupdate", (function() {
                        e.mouseDown || e.toggleScrubbingContainer(!1)
                    }))
                }
            }, {
                key: "listeners",
                value: function() {
                    var e = this;
                    this.player.on("play", (function() {
                        e.toggleThumbContainer(!1, !0)
                    })), this.player.on("seeked", (function() {
                        e.toggleThumbContainer(!1)
                    })), this.player.on("timeupdate", (function() {
                        e.lastTime = e.player.media.currentTime
                    }))
                }
            }, {
                key: "render",
                value: function() {
                    this.elements.thumb.container = zT("div", {
                        class: this.player.config.classNames.previewThumbnails.thumbContainer
                    }), this.elements.thumb.imageContainer = zT("div", {
                        class: this.player.config.classNames.previewThumbnails.imageContainer
                    }), this.elements.thumb.container.appendChild(this.elements.thumb.imageContainer);
                    var e = zT("div", {
                        class: this.player.config.classNames.previewThumbnails.timeContainer
                    });
                    this.elements.thumb.time = zT("span", {}, "00:00"), e.appendChild(this.elements.thumb.time), this.elements.thumb.container.appendChild(e), AT(this.player.elements.progress) && this.player.elements.progress.appendChild(this.elements.thumb.container), this.elements.scrubbing.container = zT("div", {
                        class: this.player.config.classNames.previewThumbnails.scrubbingContainer
                    }), this.player.elements.wrapper.appendChild(this.elements.scrubbing.container)
                }
            }, {
                key: "destroy",
                value: function() {
                    this.elements.thumb.container && this.elements.thumb.container.remove(), this.elements.scrubbing.container && this.elements.scrubbing.container.remove()
                }
            }, {
                key: "showImageAtCurrentTime",
                value: function() {
                    var e = this;
                    this.mouseDown ? this.setScrubbingContainerSize() : this.setThumbContainerSizeAndPos();
                    var t = this.thumbnails[0].frames.findIndex((function(t) {
                            return e.seekTime >= t.startTime && e.seekTime <= t.endTime
                        })),
                        n = t >= 0,
                        r = 0;
                    this.mouseDown || this.toggleThumbContainer(n), n && (this.thumbnails.forEach((function(n, i) {
                        e.loadedImages.includes(n.frames[t].text) && (r = i)
                    })), t !== this.showingThumb && (this.showingThumb = t, this.loadImage(r)))
                }
            }, {
                key: "loadImage",
                value: function() {
                    var e = this,
                        t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                        n = this.showingThumb,
                        r = this.thumbnails[t],
                        i = r.urlPrefix,
                        o = r.frames[n],
                        a = r.frames[n].text,
                        s = i + a;
                    if (this.currentImageElement && this.currentImageElement.dataset.filename === a) this.showImage(this.currentImageElement, o, t, n, a, !1), this.currentImageElement.dataset.index = n, this.removeOldImages(this.currentImageElement);
                    else {
                        this.loadingImage && this.usingSprites && (this.loadingImage.onload = null);
                        var c = new Image;
                        c.src = s, c.dataset.index = n, c.dataset.filename = a, this.showingThumbFilename = a, this.player.debug.log("Loading image: ".concat(s)), c.onload = function() {
                            return e.showImage(c, o, t, n, a, !0)
                        }, this.loadingImage = c, this.removeOldImages(c)
                    }
                }
            }, {
                key: "showImage",
                value: function(e, t, n, r, i) {
                    var o = !(arguments.length > 5 && void 0 !== arguments[5]) || arguments[5];
                    this.player.debug.log("Showing thumb: ".concat(i, ". num: ").concat(r, ". qual: ").concat(n, ". newimg: ").concat(o)), this.setImageSizeAndOffset(e, t), o && (this.currentImageContainer.appendChild(e), this.currentImageElement = e, this.loadedImages.includes(i) || this.loadedImages.push(i)), this.preloadNearby(r, !0).then(this.preloadNearby(r, !1)).then(this.getHigherQuality(n, e, t, i))
                }
            }, {
                key: "removeOldImages",
                value: function(e) {
                    var t = this;
                    Array.from(this.currentImageContainer.children).forEach((function(n) {
                        if ("img" === n.tagName.toLowerCase()) {
                            var r = t.usingSprites ? 500 : 1e3;
                            if (n.dataset.index !== e.dataset.index && !n.dataset.deleting) {
                                n.dataset.deleting = !0;
                                var i = t.currentImageContainer;
                                setTimeout((function() {
                                    i.removeChild(n), t.player.debug.log("Removing thumb: ".concat(n.dataset.filename))
                                }), r)
                            }
                        }
                    }))
                }
            }, {
                key: "preloadNearby",
                value: function(e) {
                    var t = this,
                        n = !(arguments.length > 1 && void 0 !== arguments[1]) || arguments[1];
                    return new Promise((function(r) {
                        setTimeout((function() {
                            var i = t.thumbnails[0].frames[e].text;
                            if (t.showingThumbFilename === i) {
                                var o;
                                o = n ? t.thumbnails[0].frames.slice(e) : t.thumbnails[0].frames.slice(0, e).reverse();
                                var a = !1;
                                o.forEach((function(e) {
                                    var n = e.text;
                                    if (n !== i && !t.loadedImages.includes(n)) {
                                        a = !0, t.player.debug.log("Preloading thumb filename: ".concat(n));
                                        var o = t.thumbnails[0].urlPrefix + n,
                                            s = new Image;
                                        s.src = o, s.onload = function() {
                                            t.player.debug.log("Preloaded thumb filename: ".concat(n)), t.loadedImages.includes(n) || t.loadedImages.push(n), r()
                                        }
                                    }
                                })), a || r()
                            }
                        }), 300)
                    }))
                }
            }, {
                key: "getHigherQuality",
                value: function(e, t, n, r) {
                    var i = this;
                    if (e < this.thumbnails.length - 1) {
                        var o = t.naturalHeight;
                        this.usingSprites && (o = n.h), o < this.thumbContainerHeight && setTimeout((function() {
                            i.showingThumbFilename === r && (i.player.debug.log("Showing higher quality thumb for: ".concat(r)), i.loadImage(e + 1))
                        }), 300)
                    }
                }
            }, {
                key: "toggleThumbContainer",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                        t = arguments.length > 1 && void 0 !== arguments[1] && arguments[1],
                        n = this.player.config.classNames.previewThumbnails.thumbContainerShown;
                    this.elements.thumb.container.classList.toggle(n, e), !e && t && (this.showingThumb = null, this.showingThumbFilename = null)
                }
            }, {
                key: "toggleScrubbingContainer",
                value: function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0],
                        t = this.player.config.classNames.previewThumbnails.scrubbingContainerShown;
                    this.elements.scrubbing.container.classList.toggle(t, e), e || (this.showingThumb = null, this.showingThumbFilename = null)
                }
            }, {
                key: "determineContainerAutoSizing",
                value: function() {
                    (this.elements.thumb.imageContainer.clientHeight > 20 || this.elements.thumb.imageContainer.clientWidth > 20) && (this.sizeSpecifiedInCSS = !0)
                }
            }, {
                key: "setThumbContainerSizeAndPos",
                value: function() {
                    if (this.sizeSpecifiedInCSS) {
                        if (this.elements.thumb.imageContainer.clientHeight > 20 && this.elements.thumb.imageContainer.clientWidth < 20) {
                            var e = Math.floor(this.elements.thumb.imageContainer.clientHeight * this.thumbAspectRatio);
                            this.elements.thumb.imageContainer.style.width = "".concat(e, "px")
                        } else if (this.elements.thumb.imageContainer.clientHeight < 20 && this.elements.thumb.imageContainer.clientWidth > 20) {
                            var t = Math.floor(this.elements.thumb.imageContainer.clientWidth / this.thumbAspectRatio);
                            this.elements.thumb.imageContainer.style.height = "".concat(t, "px")
                        }
                    } else {
                        var n = Math.floor(this.thumbContainerHeight * this.thumbAspectRatio);
                        this.elements.thumb.imageContainer.style.height = "".concat(this.thumbContainerHeight, "px"), this.elements.thumb.imageContainer.style.width = "".concat(n, "px")
                    }
                    this.setThumbContainerPos()
                }
            }, {
                key: "setThumbContainerPos",
                value: function() {
                    var e = this.player.elements.progress.getBoundingClientRect(),
                        t = this.player.elements.container.getBoundingClientRect(),
                        n = this.elements.thumb.container,
                        r = t.left - e.left + 10,
                        i = t.right - e.left - n.clientWidth - 10,
                        o = this.mousePosX - e.left - n.clientWidth / 2;
                    o < r && (o = r), o > i && (o = i), n.style.left = "".concat(o, "px")
                }
            }, {
                key: "setScrubbingContainerSize",
                value: function() {
                    var e = HA(this.thumbAspectRatio, {
                            width: this.player.media.clientWidth,
                            height: this.player.media.clientHeight
                        }),
                        t = e.width,
                        n = e.height;
                    this.elements.scrubbing.container.style.width = "".concat(t, "px"), this.elements.scrubbing.container.style.height = "".concat(n, "px")
                }
            }, {
                key: "setImageSizeAndOffset",
                value: function(e, t) {
                    if (this.usingSprites) {
                        var n = this.thumbContainerHeight / t.h;
                        e.style.height = "".concat(e.naturalHeight * n, "px"), e.style.width = "".concat(e.naturalWidth * n, "px"), e.style.left = "-".concat(t.x * n, "px"), e.style.top = "-".concat(t.y * n, "px")
                    }
                }
            }, {
                key: "enabled",
                get: function() {
                    return this.player.isHTML5 && this.player.isVideo && this.player.config.previewThumbnails.enabled
                }
            }, {
                key: "currentImageContainer",
                get: function() {
                    return this.mouseDown ? this.elements.scrubbing.container : this.elements.thumb.imageContainer
                }
            }, {
                key: "usingSprites",
                get: function() {
                    return Object.keys(this.thumbnails[0].frames[0]).includes("w")
                }
            }, {
                key: "thumbAspectRatio",
                get: function() {
                    return this.usingSprites ? this.thumbnails[0].frames[0].w / this.thumbnails[0].frames[0].h : this.thumbnails[0].width / this.thumbnails[0].height
                }
            }, {
                key: "thumbContainerHeight",
                get: function() {
                    return this.mouseDown ? HA(this.thumbAspectRatio, {
                        width: this.player.media.clientWidth,
                        height: this.player.media.clientHeight
                    }).height : this.sizeSpecifiedInCSS ? this.elements.thumb.imageContainer.clientHeight : Math.floor(this.player.media.clientWidth / this.thumbAspectRatio / 4)
                }
            }, {
                key: "currentImageElement",
                get: function() {
                    return this.mouseDown ? this.currentScrubbingImageElement : this.currentThumbnailImageElement
                },
                set: function(e) {
                    this.mouseDown ? this.currentScrubbingImageElement = e : this.currentThumbnailImageElement = e
                }
            }]), e
        }(),
        WA = {
            insertElements: function(e, t) {
                var n = this;
                ET(t) ? YT(e, this.media, {
                    src: t
                }) : TT(t) && t.forEach((function(t) {
                    YT(e, n.media, t)
                }))
            },
            change: function(e) {
                var t = this;
                qT(e, "sources.length") ? (wx.cancelRequests.call(this), this.destroy.call(this, (function() {
                    t.options.quality = [], $T(t.media), t.media = null, AT(t.elements.container) && t.elements.container.removeAttribute("class");
                    var n = e.sources,
                        r = e.type,
                        i = rs(n, 1)[0],
                        o = i.provider,
                        a = void 0 === o ? lA.html5 : o,
                        s = i.src,
                        c = "html5" === a ? r : "div",
                        u = "html5" === a ? {} : {
                            src: s
                        };
                    Object.assign(t, {
                        provider: a,
                        type: r,
                        supported: ax.check(r, a, t.config.playsinline),
                        media: zT(c, u)
                    }), t.elements.container.appendChild(t.media), kT(e.autoplay) && (t.config.autoplay = e.autoplay), t.isHTML5 && (t.config.crossorigin && t.media.setAttribute("crossorigin", ""), t.config.autoplay && t.media.setAttribute("autoplay", ""), RT(e.poster) || (t.poster = e.poster), t.config.loop.active && t.media.setAttribute("loop", ""), t.config.muted && t.media.setAttribute("muted", ""), t.config.playsinline && t.media.setAttribute("playsinline", "")), yA.addStyleHook.call(t), t.isHTML5 && WA.insertElements.call(t, "source", n), t.config.title = e.title, jA.setup.call(t), t.isHTML5 && Object.keys(e).includes("tracks") && WA.insertElements.call(t, "track", e.tracks), (t.isHTML5 || t.isEmbed && !t.supported.ui) && yA.build.call(t), t.isHTML5 && t.media.load(), RT(e.previewThumbnails) || (Object.assign(t.config.previewThumbnails, e.previewThumbnails), t.previewThumbnails && t.previewThumbnails.loaded && (t.previewThumbnails.destroy(), t.previewThumbnails = null), t.config.previewThumbnails.enabled && (t.previewThumbnails = new VA(t))), t.fullscreen.update()
                }), !0)) : this.debug.warn("Invalid source format")
            }
        };
    var zA, YA = function() {
        function e(t, n) {
            var r = this;
            if (Xa(this, e), this.timers = {}, this.ready = !1, this.loading = !1, this.failed = !1, this.touch = ax.touch, this.media = t, ET(this.media) && (this.media = document.querySelectorAll(this.media)), (window.jQuery && this.media instanceof jQuery || xT(this.media) || TT(this.media)) && (this.media = this.media[0]), this.config = HT({}, sA, e.defaults, n || {}, function() {
                    try {
                        return JSON.parse(r.media.getAttribute("data-plyr-config"))
                    } catch (e) {
                        return {}
                    }
                }()), this.elements = {
                    container: null,
                    fullscreen: null,
                    captions: null,
                    buttons: {},
                    display: {},
                    progress: {},
                    inputs: {},
                    settings: {
                        popup: null,
                        menu: null,
                        panels: {},
                        buttons: {}
                    }
                }, this.captions = {
                    active: null,
                    currentTrack: -1,
                    meta: new WeakMap
                }, this.fullscreen = {
                    active: !1
                }, this.options = {
                    speed: [],
                    quality: []
                }, this.debug = new dA(this.config.debug), this.debug.log("Config", this.config), this.debug.log("Support", ax), !bT(this.media) && AT(this.media))
                if (this.media.plyr) this.debug.warn("Target already setup");
                else if (this.config.enabled)
                if (ax.check().api) {
                    var i = this.media.cloneNode(!0);
                    i.autoplay = !1, this.elements.original = i;
                    var o = this.media.tagName.toLowerCase(),
                        a = null,
                        s = null;
                    switch (o) {
                        case "div":
                            if (a = this.media.querySelector("iframe"), AT(a)) {
                                if (s = iA(a.getAttribute("src")), this.provider = function(e) {
                                        return /^(https?:\/\/)?(www\.)?(youtube\.com|youtube-nocookie\.com|youtu\.?be)\/.+$/.test(e) ? lA.youtube : /^https?:\/\/player.vimeo.com\/video\/\d{0,9}(?=\b|\/)/.test(e) ? lA.vimeo : null
                                    }(s.toString()), this.elements.container = this.media, this.media = a, this.elements.container.className = "", s.search.length) {
                                    var c = ["1", "true"];
                                    c.includes(s.searchParams.get("autoplay")) && (this.config.autoplay = !0), c.includes(s.searchParams.get("loop")) && (this.config.loop.active = !0), this.isYouTube ? (this.config.playsinline = c.includes(s.searchParams.get("playsinline")), this.config.youtube.hl = s.searchParams.get("hl")) : this.config.playsinline = !0
                                }
                            } else this.provider = this.media.getAttribute(this.config.attributes.embed.provider), this.media.removeAttribute(this.config.attributes.embed.provider);
                            if (RT(this.provider) || !Object.keys(lA).includes(this.provider)) return void this.debug.error("Setup failed: Invalid provider");
                            this.type = hA;
                            break;
                        case "video":
                        case "audio":
                            this.type = o, this.provider = lA.html5, this.media.hasAttribute("crossorigin") && (this.config.crossorigin = !0), this.media.hasAttribute("autoplay") && (this.config.autoplay = !0), (this.media.hasAttribute("playsinline") || this.media.hasAttribute("webkit-playsinline")) && (this.config.playsinline = !0), this.media.hasAttribute("muted") && (this.config.muted = !0), this.media.hasAttribute("loop") && (this.config.loop.active = !0);
                            break;
                        default:
                            return void this.debug.error("Setup failed: unsupported type")
                    }
                    this.supported = ax.check(this.type, this.provider, this.config.playsinline), this.supported.api ? (this.eventListeners = [], this.listeners = new bA(this), this.storage = new Gx(this), this.media.plyr = this, AT(this.elements.container) || (this.elements.container = zT("div", {
                        tabindex: 0
                    }), VT(this.media, this.elements.container)), yA.migrateStyles.call(this), yA.addStyleHook.call(this), jA.setup.call(this), this.config.debug && ux.call(this, this.elements.container, this.config.events.join(" "), (function(e) {
                        r.debug.log("event: ".concat(e.type))
                    })), this.fullscreen = new gA(this), (this.isHTML5 || this.isEmbed && !this.supported.ui) && yA.build.call(this), this.listeners.container(), this.listeners.global(), this.config.ads.enabled && (this.ads = new CA(this)), this.isHTML5 && this.config.autoplay && setTimeout((function() {
                        return gx(r.play())
                    }), 10), this.lastSeekTime = 0, this.config.previewThumbnails.enabled && (this.previewThumbnails = new VA(this))) : this.debug.error("Setup failed: no support")
                } else this.debug.error("Setup failed: no support");
            else this.debug.error("Setup failed: disabled by config");
            else this.debug.error("Setup failed: no suitable element passed")
        }
        return Qa(e, [{
            key: "play",
            value: function() {
                var e = this;
                return ST(this.media.play) ? (this.ads && this.ads.enabled && this.ads.managerPromise.then((function() {
                    return e.ads.play()
                })).catch((function() {
                    return gx(e.media.play())
                })), this.media.play()) : null
            }
        }, {
            key: "pause",
            value: function() {
                return this.playing && ST(this.media.pause) ? this.media.pause() : null
            }
        }, {
            key: "togglePlay",
            value: function(e) {
                return (kT(e) ? e : !this.playing) ? this.play() : this.pause()
            }
        }, {
            key: "stop",
            value: function() {
                this.isHTML5 ? (this.pause(), this.restart()) : ST(this.media.stop) && this.media.stop()
            }
        }, {
            key: "restart",
            value: function() {
                this.currentTime = 0
            }
        }, {
            key: "rewind",
            value: function(e) {
                this.currentTime -= _T(e) ? e : this.config.seekTime
            }
        }, {
            key: "forward",
            value: function(e) {
                this.currentTime += _T(e) ? e : this.config.seekTime
            }
        }, {
            key: "increaseVolume",
            value: function(e) {
                var t = this.media.muted ? 0 : this.volume;
                this.volume = t + (_T(e) ? e : 0)
            }
        }, {
            key: "decreaseVolume",
            value: function(e) {
                this.increaseVolume(-e)
            }
        }, {
            key: "toggleCaptions",
            value: function(e) {
                aA.toggle.call(this, e, !1)
            }
        }, {
            key: "airplay",
            value: function() {
                ax.airplay && this.media.webkitShowPlaybackTargetPicker()
            }
        }, {
            key: "toggleControls",
            value: function(e) {
                if (this.supported.ui && !this.isAudio) {
                    var t = ZT(this.elements.container, this.config.classNames.hideControls),
                        n = void 0 === e ? void 0 : !e,
                        r = QT(this.elements.container, this.config.classNames.hideControls, n);
                    if (r && TT(this.config.controls) && this.config.controls.includes("settings") && !RT(this.config.settings) && rA.toggleMenu.call(this, !1), r !== t) {
                        var i = r ? "controlshidden" : "controlsshown";
                        hx.call(this, this.media, i)
                    }
                    return !r
                }
                return !1
            }
        }, {
            key: "on",
            value: function(e, t) {
                ux.call(this, this.elements.container, e, t)
            }
        }, {
            key: "once",
            value: function(e, t) {
                fx.call(this, this.elements.container, e, t)
            }
        }, {
            key: "off",
            value: function(e, t) {
                lx(this.elements.container, e, t)
            }
        }, {
            key: "destroy",
            value: function(e) {
                var t = this,
                    n = arguments.length > 1 && void 0 !== arguments[1] && arguments[1];
                if (this.ready) {
                    var r = function() {
                        document.body.style.overflow = "", t.embed = null, n ? (Object.keys(t.elements).length && ($T(t.elements.buttons.play), $T(t.elements.captions), $T(t.elements.controls), $T(t.elements.wrapper), t.elements.buttons.play = null, t.elements.captions = null, t.elements.controls = null, t.elements.wrapper = null), ST(e) && e()) : (px.call(t), KT(t.elements.original, t.elements.container), hx.call(t, t.elements.original, "destroyed", !0), ST(e) && e.call(t.elements.original), t.ready = !1, setTimeout((function() {
                            t.elements = null, t.media = null
                        }), 200))
                    };
                    this.stop(), clearTimeout(this.timers.loading), clearTimeout(this.timers.controls), clearTimeout(this.timers.resized), this.isHTML5 ? (yA.toggleNativeControls.call(this, !0), r()) : this.isYouTube ? (clearInterval(this.timers.buffering), clearInterval(this.timers.playing), null !== this.embed && ST(this.embed.destroy) && this.embed.destroy(), r()) : this.isVimeo && (null !== this.embed && this.embed.unload().then(r), setTimeout(r, 200))
                }
            }
        }, {
            key: "supports",
            value: function(e) {
                return ax.mime.call(this, e)
            }
        }, {
            key: "isHTML5",
            get: function() {
                return this.provider === lA.html5
            }
        }, {
            key: "isEmbed",
            get: function() {
                return this.isYouTube || this.isVimeo
            }
        }, {
            key: "isYouTube",
            get: function() {
                return this.provider === lA.youtube
            }
        }, {
            key: "isVimeo",
            get: function() {
                return this.provider === lA.vimeo
            }
        }, {
            key: "isVideo",
            get: function() {
                return this.type === hA
            }
        }, {
            key: "isAudio",
            get: function() {
                return this.type === fA
            }
        }, {
            key: "playing",
            get: function() {
                return Boolean(this.ready && !this.paused && !this.ended)
            }
        }, {
            key: "paused",
            get: function() {
                return Boolean(this.media.paused)
            }
        }, {
            key: "stopped",
            get: function() {
                return Boolean(this.paused && 0 === this.currentTime)
            }
        }, {
            key: "ended",
            get: function() {
                return Boolean(this.media.ended)
            }
        }, {
            key: "currentTime",
            set: function(e) {
                if (this.duration) {
                    var t = _T(e) && e > 0;
                    this.media.currentTime = t ? Math.min(e, this.duration) : 0, this.debug.log("Seeking to ".concat(this.currentTime, " seconds"))
                }
            },
            get: function() {
                return Number(this.media.currentTime)
            }
        }, {
            key: "buffered",
            get: function() {
                var e = this.media.buffered;
                return _T(e) ? e : e && e.length && this.duration > 0 ? e.end(0) / this.duration : 0
            }
        }, {
            key: "seeking",
            get: function() {
                return Boolean(this.media.seeking)
            }
        }, {
            key: "duration",
            get: function() {
                var e = parseFloat(this.config.duration),
                    t = (this.media || {}).duration,
                    n = _T(t) && t !== 1 / 0 ? t : 0;
                return e || n
            }
        }, {
            key: "volume",
            set: function(e) {
                var t = e;
                ET(t) && (t = Number(t)), _T(t) || (t = this.storage.get("volume")), _T(t) || (t = this.config.volume), t > 1 && (t = 1), t < 0 && (t = 0), this.config.volume = t, this.media.volume = t, !RT(e) && this.muted && t > 0 && (this.muted = !1)
            },
            get: function() {
                return Number(this.media.volume)
            }
        }, {
            key: "muted",
            set: function(e) {
                var t = e;
                kT(t) || (t = this.storage.get("muted")), kT(t) || (t = this.config.muted), this.config.muted = t, this.media.muted = t
            },
            get: function() {
                return Boolean(this.media.muted)
            }
        }, {
            key: "hasAudio",
            get: function() {
                return !this.isHTML5 || (!!this.isAudio || (Boolean(this.media.mozHasAudio) || Boolean(this.media.webkitAudioDecodedByteCount) || Boolean(this.media.audioTracks && this.media.audioTracks.length)))
            }
        }, {
            key: "speed",
            set: function(e) {
                var t = this,
                    n = null;
                _T(e) && (n = e), _T(n) || (n = this.storage.get("speed")), _T(n) || (n = this.config.speed.selected);
                var r = this.minimumSpeed,
                    i = this.maximumSpeed;
                n = function() {
                    var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : 0,
                        t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : 0,
                        n = arguments.length > 2 && void 0 !== arguments[2] ? arguments[2] : 255;
                    return Math.min(Math.max(e, t), n)
                }(n, r, i), this.config.speed.selected = n, setTimeout((function() {
                    t.media.playbackRate = n
                }), 0)
            },
            get: function() {
                return Number(this.media.playbackRate)
            }
        }, {
            key: "minimumSpeed",
            get: function() {
                return this.isYouTube ? Math.min.apply(Math, is(this.options.speed)) : this.isVimeo ? .5 : .0625
            }
        }, {
            key: "maximumSpeed",
            get: function() {
                return this.isYouTube ? Math.max.apply(Math, is(this.options.speed)) : this.isVimeo ? 2 : 16
            }
        }, {
            key: "quality",
            set: function(e) {
                var t = this.config.quality,
                    n = this.options.quality;
                if (n.length) {
                    var r = [!RT(e) && Number(e), this.storage.get("quality"), t.selected, t.default].find(_T),
                        i = !0;
                    if (!n.includes(r)) {
                        var o = function(e, t) {
                            return TT(e) && e.length ? e.reduce((function(e, n) {
                                return Math.abs(n - t) < Math.abs(e - t) ? n : e
                            })) : null
                        }(n, r);
                        this.debug.warn("Unsupported quality option: ".concat(r, ", using ").concat(o, " instead")), r = o, i = !1
                    }
                    t.selected = r, this.media.quality = r, i && this.storage.set({
                        quality: r
                    })
                }
            },
            get: function() {
                return this.media.quality
            }
        }, {
            key: "loop",
            set: function(e) {
                var t = kT(e) ? e : this.config.loop.active;
                this.config.loop.active = t, this.media.loop = t
            },
            get: function() {
                return Boolean(this.media.loop)
            }
        }, {
            key: "source",
            set: function(e) {
                WA.change.call(this, e)
            },
            get: function() {
                return this.media.currentSrc
            }
        }, {
            key: "download",
            get: function() {
                var e = this.config.urls.download;
                return CT(e) ? e : this.source
            },
            set: function(e) {
                CT(e) && (this.config.urls.download = e, rA.setDownloadUrl.call(this))
            }
        }, {
            key: "poster",
            set: function(e) {
                this.isVideo ? yA.setPoster.call(this, e, !1).catch((function() {})) : this.debug.warn("Poster can only be set for video")
            },
            get: function() {
                return this.isVideo ? this.media.getAttribute("poster") || this.media.getAttribute("data-poster") : null
            }
        }, {
            key: "ratio",
            get: function() {
                if (!this.isVideo) return null;
                var e = mx(yx.call(this));
                return TT(e) ? e.join(":") : e
            },
            set: function(e) {
                this.isVideo ? ET(e) && vx(e) ? (this.config.ratio = e, bx.call(this)) : this.debug.error("Invalid aspect ratio specified (".concat(e, ")")) : this.debug.warn("Aspect ratio can only be set for video")
            }
        }, {
            key: "autoplay",
            set: function(e) {
                var t = kT(e) ? e : this.config.autoplay;
                this.config.autoplay = t
            },
            get: function() {
                return Boolean(this.config.autoplay)
            }
        }, {
            key: "currentTrack",
            set: function(e) {
                aA.set.call(this, e, !1)
            },
            get: function() {
                var e = this.captions,
                    t = e.toggled,
                    n = e.currentTrack;
                return t ? n : -1
            }
        }, {
            key: "language",
            set: function(e) {
                aA.setLanguage.call(this, e, !1)
            },
            get: function() {
                return (aA.getCurrentTrack.call(this) || {}).language
            }
        }, {
            key: "pip",
            set: function(e) {
                if (ax.pip) {
                    var t = kT(e) ? e : !this.pip;
                    ST(this.media.webkitSetPresentationMode) && this.media.webkitSetPresentationMode(t ? cA : uA), ST(this.media.requestPictureInPicture) && (!this.pip && t ? this.media.requestPictureInPicture() : this.pip && !t && document.exitPictureInPicture())
                }
            },
            get: function() {
                return ax.pip ? RT(this.media.webkitPresentationMode) ? this.media === document.pictureInPictureElement : this.media.webkitPresentationMode === cA : null
            }
        }], [{
            key: "supported",
            value: function(e, t, n) {
                return ax.check(e, t, n)
            }
        }, {
            key: "loadSprite",
            value: function(e, t) {
                return Xx(e, t)
            }
        }, {
            key: "setup",
            value: function(t) {
                var n = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                    r = null;
                return ET(t) ? r = Array.from(document.querySelectorAll(t)) : xT(t) ? r = Array.from(t) : TT(t) && (r = t.filter(AT)), RT(r) ? null : r.map((function(t) {
                    return new e(t, n)
                }))
            }
        }]), e
    }();
    YA.defaults = (zA = sA, JSON.parse(JSON.stringify(zA)));
    var $A, GA = {
            video: {
                type: "video",
                title: "View From A Blue Moon",
                sources: [{
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4",
                    type: "video/mp4",
                    size: 576
                }, {
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4",
                    type: "video/mp4",
                    size: 720
                }, {
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4",
                    type: "video/mp4",
                    size: 1080
                }, {
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4",
                    type: "video/mp4",
                    size: 1440
                }],
                poster: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg",
                tracks: [{
                    kind: "captions",
                    label: "English",
                    srclang: "en",
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt",
                    default: !0
                }, {
                    kind: "captions",
                    label: "French",
                    srclang: "fr",
                    src: "https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt"
                }],
                previewThumbnails: {
                    src: ["https://cdn.plyr.io/static/demo/thumbs/100p.vtt", "https://cdn.plyr.io/static/demo/thumbs/240p.vtt"]
                }
            },
            audio: {
                type: "audio",
                title: "Kishi Bashi &ndash; &ldquo;It All Began With A Burst&rdquo;",
                sources: [{
                    src: "https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.mp3",
                    type: "audio/mp3"
                }, {
                    src: "https://cdn.plyr.io/static/demo/Kishi_Bashi_-_It_All_Began_With_a_Burst.ogg",
                    type: "audio/ogg"
                }]
            },
            youtube: {
                type: "video",
                sources: [{
                    src: "https://youtube.com/watch?v=bTqVqk7FSmY",
                    provider: "youtube"
                }]
            },
            vimeo: {
                type: "video",
                sources: [{
                    src: "https://vimeo.com/40648169",
                    provider: "vimeo"
                }]
            }
        },
        KA = function(e) {
            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : "",
                n = arguments.length > 2 && void 0 !== arguments[2] && arguments[2];
            return e && e.classList[n ? "add" : "remove"](t)
        };
    $A = "plyr.io", window.location.host === $A && Xp({
        dsn: "https://d4ad9866ad834437a4754e23937071e4@sentry.io/305555",
        whitelistUrls: [$A].map((function(e) {
            return new RegExp("https://(([a-z0-9])+(.))*".concat(e))
        }))
    }), document.addEventListener("DOMContentLoaded", (function() {
        Zd.setup(".js-shr", {
            count: {
                className: "button__count"
            },
            wrapper: {
                className: "button--with-count"
            }
        });
        var e = new YA("#player", {
            debug: !0,
            title: "View From A Blue Moon",
            iconUrl: "https://cdn.plyr.io/3.6.2/demo.svg",
            keyboard: {
                global: !0
            },
            tooltips: {
                controls: !0
            },
            captions: {
                active: !0
            },
            ads: {
                enabled: window.location.host.includes($A),
                publisherId: "918848828995742"
            },
            previewThumbnails: {
                enabled: !0,
                src: ["https://cdn.plyr.io/static/demo/thumbs/100p.vtt", "https://cdn.plyr.io/static/demo/thumbs/240p.vtt"]
            },
            vimeo: {
                referrerPolicy: "no-referrer"
            }
        });
        window.player = e;
        var t = document.querySelectorAll("[data-source]"),
            n = Object.keys(GA),
            r = Boolean(window.history && window.history.pushState),
            i = window.location.hash.substring(1),
            o = i.length;

        function a(e) {
            Array.from(t).forEach((function(e) {
                return KA(e.parentElement, "active", !1)
            })), KA(document.querySelector('[data-source="'.concat(e, '"]')), "active", !0), Array.from(document.querySelectorAll(".plyr__cite")).forEach((function(e) {
                e.hidden = !0
            })), document.querySelector(".plyr__cite--".concat(e)).hidden = !1
        }

        function s(t, r) {
            !n.includes(t) || !r && t === i || !i.length && "video" === t || (e.source = GA[t], i = t, a(t))
        }
        Array.from(t).forEach((function(e) {
            e.addEventListener("click", (function() {
                var t = e.getAttribute("data-source");
                s(t), r && window.history.pushState({
                    type: t
                }, "", "#".concat(t))
            }))
        })), window.addEventListener("popstate", (function(e) {
            e.state && Object.keys(e.state).includes("type") && s(e.state.type)
        })), o || (i = "video"), r && n.includes(i) && window.history.replaceState({
            type: i
        }, "", o ? "#".concat(i) : ""), "video" !== i && s(i, !0), a(i)
    }))
}();
//# sourceMappingURL=demo.js.map