'use strict' 
var LibCRUD = {

	init: function(){
		LibCRUD.Save();
		LibCRUD.Delete();
	},

	Save: function(){
		$(document).on('click', '*[data-action="dynamic-form"]', function () {
			var formId		= $(this).data('form');
			var serialized	= $(formId).serialize();
			var formAct		= $(formId).attr('action');
			var reload	    = $(formId).data('reload');

			$.ajax({
				url: formAct,
				data:serialized,
				method: "POST"
			})
				.done(function(result) {

					if(result.code == '200 OK'){
						toastr['success'](result.message);
					} else {
						toastr['error']('Desculpe. Houve um erro inexperado ao tentar executar a ação desejada.');
					};

					// Recarrega todos os componentes dinâmicos da página.
					LibComponent.LoadComponent();

					if(reload === true && result.goUrl != null)
						window.location.href = result.goUrl;
					if(reload === true){
						setTimeout(function () {
							window.location.reload();
						}, 3000);
					}

					// oculta o modal (independente se for modal ou não)
					$('#defaultModal').modal('hide');

				})
				.fail(function(result){
					var messages = result.responseJSON.result;

					messages.forEach(function (item, index) {
						toastr['error'](item.message);
					});

				});
		});
	},

	Delete: function(){
		$(document).on('click', '*[data-action="delete"]', function(){
			var destiny = $(this).val();
			var reload	= $(this).data('reload');

			Swal.fire({
				title: "Você tem certeza?",
				text: "Esta ação irá apagar o registro informado.",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Continuar',
				cancelButtonText: "Cancelar"
			}).then(function(isConfirm) {
				if(isConfirm.value == true){
					$.getJSON(destiny, function(result){
						if(result.code == '200 OK'){
							Swal.fire("Parabéns!", result.message, 'success' );
						} else {
							Swal.fire("Erro!", result.message, 'warning');
						};

						// oculta o modal (independente se for modal ou não)
						$('#defaultModal').modal('hide');

						// Recarrega todos os componentes (se houver)
						Component.LoadComponent();

						if(reload === true) {
							setTimeout(function () {
								window.location.reload();
							}, 3000);
						}
					});
				};
			});
		});
	},
}
;var LibComponent = {

	init: function(){
		LibComponent.LoadComponent();
	},

	LoadComponent: function(componentName){
		var component = 'div[data-component]';
		if( typeof componentName !== 'undefined'){
			component = componentName;
		}

		$(component).each(function(){
			var element = $(this);
			var url = $(this).data('component');

			$.get(url, function (data) {
				element.html(data);
			});
		});

		return false;
	},

	CallReloadAllComponents: function(){
		$(document).on('click', '*[data-reload-components]', function(){
			Component.LoadComponent();
		});
	}
};
;var LibGamification = {

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
;var LibNight = {
	init: function(){
		/*LibNight.init();*/
	},

	/*Execute: function (){
		var checkbox = document.querySelector('input[name=theme]');

		checkbox.addEventListener('change', function() {
			if(this.checked) {
				trans()
				document.documentElement.setAttribute('data-theme', 'dark')
			} else {
				trans()
				document.documentElement.setAttribute('data-theme', 'light')
			}
		})

		let trans = () => {
			document.documentElement.classList.add('transition');
			window.setTimeout(() => {
				document.documentElement.classList.remove('transition')
			}, 1000)
		}
	}*/
};
;var LibNotification = {

	init: function(){

		/* Configura o toastr */
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-bottom-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "5000",
			"timeOut": "5000",
			"extendedTimeOut": "2000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut",
			"escapeHtml": true
		}
	},

	notifications: [],

	SetNotification : function(property, message, type){
		toastr[type](message);
	},

}
;var Screen = {
	init: function (){
		Screen.ClearLog();
		Screen.Modal();
	},

	ClearLog: function () {
		console.log('[Screen.js] O console será limpo após 2 segundos');
		setTimeout(function(){
			console.clear();
		}, 2000)
	},

	Lock: function(message){
		$('#ScreenLock').fadeIn('slow');
		if(typeof message !== "undefined"){
			$('#ScreenLockMessage').html(message);
		}
	},

	UnLock: function(){
		$('#ScreenLock').fadeOut('slow');
	},

	Modal: function () {
		$(document).on('click', '*[data-action="open-dynamic-modal"]', function () {
			var modalContent = null;
			var size = $(this).data('size');

			if(typeof size !== 'undefined'){
				$('#defaultModal > .modal-dialog').css({
					'width': size
				});
			}else{

			}

			// verifica se é um botão ou link
			if($(this).is('button')){
				modalContent = $(this).val();
			}else{
				modalContent = $(this).attr('href');
			};

			// carrega o conteúdo e exibe o modal
			$('#defaultModalContent').load(modalContent, function () {
				//Interface.MaskForms();
				//Interface.EnableSelectTwo();
				$('#defaultModal').modal('show');
			});

			return;
		}).trigger('mask-it');
	},
};
;
$(document).ajaxStart( Screen.Lock );
$(document).ajaxStop( Screen.UnLock );

LibGamification.init();
LibNight.init();
LibComponent.init();
Screen.init();
LibNotification.init();
LibCRUD.init();

console.log("[Main.js] Scripts carregados.");
