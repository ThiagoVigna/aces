var LibGamification = {

	init: function(){
		LibGamification.imageCircle();
	},

	imageCircle: function(){
		window._iesKnob = {
			att: function (e, t, n) {
				if (e) {
					if (!n) return e.getAttribute(t);
					e.setAttribute(t, n);
				}
				return !1;
			},
			$$$: function (e) {
				return "string" == typeof e && (e = document.getElementById(e)), e;
			},
			ins: function (e, t, n, i, r, o) {
				var a;
				if (o) var s = document.createElementNS("http://www.w3.org/2000/svg", t);
				else s = document.createElement(t);
				if ((i && (s.innerHTML = i), (e = _iesKnob.$$$(e)), n))
					for (a = 0; a < n.length; a += 2) this.att(s, n[a], n[a + 1]);
				return e
					? 1 == r
						? e.insertBefore(s, e.firstChild)
						: r
							? e.insertBefore(s, r)
							: e.appendChild(s)
					: s;
			},
			init: function (e) {
				var t = document.createElement("style");
				document.getElementById("circle-animation-style")
					? e && (document.getElementById("circle-animation-style").innerHTML = "")
					: ((t.id = "circle-animation-style"), document.head.appendChild(t));
				for (
					var n = document.getElementsByClassName("iesknob"), i = 0;
					i < n.length;
					i++
				)
					("true" == n[i].getAttribute("initiated") && "force" != e) ||
					("" == n[i].id && (n[i].id = _iesKnob.guid()),
						_iesKnob.generate(
							n[i].id,
							n[i].getAttribute("data-knob-image"),
							n[i].getAttribute("data-knob-dotimage"),
							n[i].getAttribute("data-knob-percentage"),
							n[i].getAttribute("data-knob-timing"),
							n[i].getAttribute("data-knob-dotcolor"),
							n[i].getAttribute("data-knob-gradient1"),
							n[i].getAttribute("data-knob-gradient2"),
							n[i].getAttribute("data-knob-color")
						),
						n[i].setAttribute("initiated", "true"));
			},
			guid: function () {
				for (
					var e = "",
						t = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz",
						n = 0;
					n < 15;
					n++
				)
					e += t.charAt(Math.floor(Math.random() * t.length));
				return e;
			},
			generate: function (e, t, n, i, r, o, a, s, l) {
				var c = document.getElementById(e);
				c.innerHTML = "";
				var d = _iesKnob.guid(),
					u = _iesKnob.ins(
						c,
						"svg",
						[
							"class",
							"circle-chart",
							"id",
							d,
							"height",
							"101%",
							"width",
							"101%",
							"viewbox",
							"0 0 33.83098862 33.83098862",
							"xmlns",
							"http://www.w3.org/2000/svg",
							"style",
							"height:101%;width:101%;overflow: visible  !important;box-shadow : 0px -0px 10000px transparent;position:absolute;top:-0.5%;left:-0.5%",
							"preserveAspectRatio",
							"none"
						],
						!1,
						!1,
						!0
					),
					g = _iesKnob.ins(u, "defs", !1, !1, !1, !0),
					m = _iesKnob.guid(),
					b = _iesKnob.ins(
						g,
						"linearGradient",
						[
							"id",
							m,
							"x1",
							"0",
							"y1",
							"10",
							"x2",
							"30",
							"y2",
							"10",
							"gradientUnits",
							"userSpaceOnUse",
							"gradientTransform",
							"rotate(90)"
						],
						!1,
						!1,
						!0
					);
				(a && null != a && "" != a) || (a = "#FFD700"),
				(s && null != s && "" != s) || (s = "yellow"),
					_iesKnob.ins(b, "stop", ["stop-color", a, "offset", "0"], !1, !1, !0),
					_iesKnob.ins(b, "stop", ["stop-color", s, "offset", "1"], !1, !1, !0),
					(c.style.backgroundImage = "url(" + t + ")"),
					(c.style.backgroundSize = "99%"),
					(c.style.backgroundPosition = "50% 50%"),
					(c.style.backgroundRepeat = "no-repeat"),
				(l && null != l && "" != l) || (l = "#efefef"),
					_iesKnob.ins(
						u,
						"circle",
						[
							"class",
							"circle-chart__background",
							"stroke",
							l,
							"stroke-width",
							"2",
							"fill",
							"none",
							"cx",
							"16.91549431",
							"cy",
							"16.91549431",
							"r",
							"15.91549431"
						],
						!1,
						!1,
						!0
					),
					_iesKnob.ins(
						u,
						"circle",
						[
							"class",
							"circle-chart__circle",
							"stroke",
							"url(#" + m + ")",
							"stroke-width",
							"2",
							"stroke-dasharray",
							i + ",100",
							"stroke-linecap",
							"round",
							"fill",
							"none",
							"cx",
							"16.91549431",
							"cy",
							"16.91549431",
							"r",
							"15.91549431"
						],
						!1,
						!1,
						!0
					),
					n
						? _iesKnob.ins(
						u,
						"image",
						[
							"href",
							n,
							"height",
							"6",
							"width",
							"6",
							"class",
							"star-element",
							"x",
							"14",
							"y",
							"-2"
						],
						!1,
						!1,
						!0
						)
						: ((o && null != o && "" != o) || (o = "#000000"),
							_iesKnob.ins(
								u,
								"circle",
								[
									"class",
									"star-element",
									"stroke",
									o,
									"r",
									"0.9",
									"fill",
									"none",
									"cx",
									"17",
									"cy",
									"1.1"
								],
								!1,
								!1,
								!0
							)),
					(c.innerHTML = c.innerHTML),
					document.getElementById(d).classList.add(d),
				(r && null != r && "" != r) || (r = 1);
				var f =
					"@keyframes " +
					d +
					"-circle-chart-fill {to { stroke-dasharray: 0 100; }}@keyframes " +
					d +
					"-rotate-star {to { transform: rotate(0deg) }}." +
					d +
					" .circle-chart__circle {animation-timing-function: ease-out;animation: " +
					d +
					"-circle-chart-fill " +
					r +
					"s reverse;transform: rotate(-90deg);transform-origin: center}." +
					d +
					" .star-element {animation-timing-function: ease-out;animation: " +
					d +
					"-rotate-star " +
					r +
					"s reverse;transform: rotate(" +
					360 / (100 / i) +
					"deg);transform-origin: center;}";
				document.getElementById("circle-animation-style").innerHTML += f;
			}
		};
		_iesKnob.init("force");
		setInterval(function () {
			_iesKnob.init("force");
		}, 3000);
	}

};
