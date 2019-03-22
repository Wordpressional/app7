/**********************************************************************************/

/*
Plugin Name: 	BrowserSelector
Written by: 	Crivos - (http://www.crivos.com)
Version: 		0.1
*/

(function($, navigator) {
	$.extend({

		browserSelector: function() {

			var u = navigator.userAgent,
				ua = u.toLowerCase(),
				is = function (t) {
					return ua.indexOf(t) > -1;
				},
				g = 'gecko',
				w = 'webkit',
				s = 'safari',
				o = 'opera',
				h = document.documentElement,
				b = [(!(/opera|webtv/i.test(ua)) && /msie\s(\d)/.test(ua)) ? ('ie ie' + parseFloat(navigator.appVersion.split("MSIE")[1])) : is('firefox/2') ? g + ' ff2' : is('firefox/3.5') ? g + ' ff3 ff3_5' : is('firefox/3') ? g + ' ff3' : is('gecko/') ? g : is('opera') ? o + (/version\/(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery1 : (/opera(\s|\/)(\d+)/.test(ua) ? ' ' + o + RegExp.jQuery2 : '')) : is('konqueror') ? 'konqueror' : is('chrome') ? w + ' chrome' : is('iron') ? w + ' iron' : is('applewebkit/') ? w + ' ' + s + (/version\/(\d+)/.test(ua) ? ' ' + s + RegExp.jQuery1 : '') : is('mozilla/') ? g : '', is('j2me') ? 'mobile' : is('iphone') ? 'iphone' : is('ipod') ? 'ipod' : is('mac') ? 'mac' : is('darwin') ? 'mac' : is('webtv') ? 'webtv' : is('win') ? 'win' : is('freebsd') ? 'freebsd' : (is('x11') || is('linux')) ? 'linux' : '', 'js'];

			c = b.join(' ');
			h.className += ' ' + c;

		},

	});

})(jQuery, navigator);

/**********************************************************************************/

/*
Plugin Name: 	SearchHolder
*/

(function ($) {

	$.searchClick = function (el, options) {
		this.el = $(el);
		this.init(options);
	}

	$.searchClick.DEFAULTS = {
		key_esc: 27
	}

	$.searchClick.prototype = {
		init: function (options) {
			var base = this;
			base.o = $.extend({}, $.searchClick.DEFAULTS, options);
			base.key_esc = base.o.key_esc;
			base.searchWrap = $('.searchform_wrap');
			base.searchBtn = $('.search_button', base.el);
			base.searchClose = $('.close_search_form', base.el);
			base.searchField = $('#s', base.el);
			base.event = Modernizr.touch ? 'touchstart' : 'click';

			base.set();
			base.bind();
		},
		set: function () {
			var transEndEventNames = {
				'WebkitTransition': 'webkitTransitionEnd',
				'MozTransition': 'transitionend',
				'OTransition': 'oTransitionEnd',
				'msTransition': 'MSTransitionEnd',
				'transition': 'transitionend'
			};
			this.transEndEventName = transEndEventNames[Modernizr.prefixed( 'transition' )];
			this.animations = Modernizr.csstransitions;
		},
		hide: function () {
		    var base = this;
		    base.searchWrap.addClass('closed').removeClass('opened');
		    var onEndTransitionFn = function () {
		      base.searchWrap.removeClass('closed');
		    };
		    if (base.animations) {
		      base.searchWrap.on(base.transEndEventName, onEndTransitionFn);
		    } else {
		      onEndAnimationFn();
		    }

		    var $body = $(document.body),
		    $popup = $(".searchform_wrap");

 

		},
		bind: function () {
			this.searchBtn.on(this.event, $.proxy(this.display_show, this));
			this.searchClose.on(this.event, $.proxy(function (e) {
				this.display_hide(e, this.key_esc);
			}, this));
			this.keyDownHandler(this.key_esc);
			
			$(window).on("load",function(){

		        var $win = $('.search-holder'); // or $box parent container
				var $box = $(".vc_child");
				var $sb = $(".search_button");
				
			 	$win.on("click.Bst", function(event){	
					if ( 
		            $box.has(event.target).length == 0 //checks if descendants of $box was clicked
		            &&
		            !$box.is(event.target) //checks if the $box itself was clicked
		            &&
		            !$sb.is(event.target) //checks if the $box itself was clicked
			        ){
						$('.searchform_wrap').removeClass('opened');
					}
				});
				  
			});
			
			
		},
		display_show: function (e) {
			e.preventDefault();
			if (!this.searchWrap.hasClass('opened')) {
				this.searchWrap.addClass('opened');
				this.searchField.focus();
			}
		},
		display_hide: function (e, key) {
			var base = this;
			if (base.searchWrap.hasClass('opened')) {
				if (e.type == base.event || e.type == 'keydown' && e.keyCode === key) {
					e.preventDefault();
					base.hide();
					base.searchField.blur();
				}
			}
		},
		keyDownHandler: function (key) {
			$(window).on('keydown', $.proxy(function (e) {
				this.display_hide(e, key);
			}, this));
		}
	}

	$.fn.extend({
		searchClick: function (option) {
			if (!this.length) return this;
			return this.each(function () {
				var $this = $(this), data = $this.data('searchClick'),
					options = typeof option == 'object' && option;
				if (!data) {
					$this.data('searchClick', new $.searchClick(this, options));
				}
			});
		}
	});

})(jQuery);











/*	Scroll Spy											*/
/* ---------------------------------------------------- */

(function ($) {

	function MadScrollSpy(element, options) {
		var href;
		var self = this;
		var process = $.proxy(this.process, this);
		this.$element = $(element).is('body') ? $(window) : $(element);
		this.$body = $('body');
		this.$scrollElement = this.$element.on('scroll.bs.mad-scroll-spy.data-api', process);
		this.options = $.extend({}, MadScrollSpy.DEFAULTS, options);
		this.selector = (this.options.target || ((href = $(element).attr('href')) && href.replace(/.*(?=#[^\s]+$)/, '')) || '') + ' li > a';

		this.offsets = $([]);
		this.targets = $([]);
		this.activeTarget = null;

		setTimeout(function() {
			self.refresh();
			self.process();
		}, 50);
	}

	MadScrollSpy.DEFAULTS = {
		offset: ($('.section-main').length) ? 55 : 55,
		applyClass: 'current'
	}

	MadScrollSpy.prototype.refresh = function() {
		var offsetMethod = this.$element[0] == window ? 'offset' : 'position';

		var self = this;
		this.$body.find(this.selector).map(function() {
			var $el = $(this);
			var href = $el.data('target') || $el.attr('href');
			var $href = /^#\w/.test(href) && $(href);
			return ($href && $href.length && [[$href[offsetMethod]().top + (!$.isWindow(self.$scrollElement.get(0)) && self.$scrollElement.scrollTop()), href]]) || null
		}).sort(function(a, b) {
			return a[0] - b[0]
		}).each(function() {
			self.offsets.push(this[0]);
			self.targets.push(this[1]);
		});

	}

	MadScrollSpy.prototype.process = function() {
		var scrollTop = this.$scrollElement.scrollTop() + this.options.offset,
			scrollHeight = this.$scrollElement[0].scrollHeight || this.$body[0].scrollHeight,
			maxScroll = scrollHeight - this.$scrollElement.height(),
			offsets = this.offsets,
			targets = this.targets,
			activeTarget = this.activeTarget, i;

		if (scrollTop >= maxScroll) {
			return activeTarget != (i = targets.last()[0]) && this.activate(i);
		}

		for (i = offsets.length; i--; ) {
			activeTarget != targets[i] && scrollTop >= offsets[i] && (!offsets[i + 1] || scrollTop <= offsets[i + 1]) && this.activate(targets[i]);
		}

	}

	MadScrollSpy.prototype.activate = function (target) {
		this.activeTarget = target;
		$(this.selector)
			.parent('.' + this.options.applyClass)
			.removeClass(this.options.applyClass);

		var selector = this.selector + '[href="' + target + '"]';

		var active = $(selector).parent('li').addClass(this.options.applyClass);
		active.trigger('activate');
	}

	$.fn.mad_scrollspy = function (option) {
		return this.each(function() {
			var $this = $(this),
				data = $this.data('bs.madscrollspy'),
				options = typeof option == 'object' && option;
			if (!data) {
				$this.data('bs.madscrollspy', (data = new MadScrollSpy(this, options)));
			}
			if (typeof option == 'string') {
				data[option]();
			}
		});
	}

	$.fn.mad_scrollspy.Constructor = MadScrollSpy;

})(jQuery);

/*	Smooth Scroll
/* --------------------------------------------- */

(function ($) {

	$.madScroll = function (el, options) {
		this.el = $(el);
		this.o = $.extend({}, $.madScroll.DEFAULTS, options);
		this.selector = 'a[href*=#]:not([href=#])';
		if (!this.el.find(this.selector).length) return;
		this.init();
	}

	$.madScroll.DEFAULTS = {
		body : 'body',
		duration : 1200,
		easing : 'easeInOutExpo'
	}

	$.madScroll.prototype = {
		init: function () {
			this.touch = Modernizr.touch;
			this.eventtype = Modernizr.touch ? 'touchstart' : 'click';
			this.window = $(window);
			this.events();
		},
		events: function() {
			var base = this;

			base.o.body.mad_scrollspy(base.o.body.data());

			var hash = window.location.hash.replace(/\//g, ""), toEl = $(hash);
			if (toEl.length) {
				base.window.on('scroll.hash_scroll', function () {
					setTimeout(function () {
						base.window.off('scroll.hash_scroll').scrollTop(
							toEl.offset().top
						);
					}, 10);
				});
			}

			base.el.on(base.eventtype, base.selector, function (e) {
				var newHash = this.hash.replace(/\//g, "");

				if (newHash != '' && newHash != '#') {
					var $section = $(newHash);
					if ($section.length) {
						base.sectionToAnimate(newHash, $section);
						e.preventDefault();
					}
				}
			});
		},
		sectionToAnimate: function (newHash, section) {
//alert($('#header').offset().top);					
		
			var base = this,
				container_offset = section.offset().top,
				//offset = base.o.data.offset;
				offset = 55;

				if ($('#header').hasClass('type-2')) {
					offset = base.o.data.height - 30;
				}
				target = container_offset - offset;

			$('html, body').stop(true, true).animate({
				scrollTop: target
			}, {
				duration: base.o.duration,
				easing: base.o.easing,
				complete: function () {
					if (window.history.replaceState) {
						window.history.replaceState("", "", newHash);
					}
				}
			});
		}
	}

	$.fn.madscroll = function (option) {
		return this.each(function() {
			var $this = $(this),
				data = $this.data('mad.scroll'),
				options = typeof option == 'object' && option;
			if (!data) {
				$this.data('mad.scroll', (data = new $.madScroll(this, options)));
			}
			if (typeof option == 'string') {
				data[option]();
			}
		});
	}

})(jQuery);


/**********************************************************************************/

/**********************************************************************************/

/*
Plugin Name: 	smoothScroll for jQuery.
Written by: 	Crivos - (http://www.crivos.com)
Version: 		0.1

Based on:

	SmoothScroll v1.2.1
	Licensed under the terms of the MIT license.

	People involved
	 - Balazs Galambosi (maintainer)
	 - Patrick Brunner  (original idea)
	 - Michael Herf     (Pulse Algorithm)

*/
(function($) {
	$.extend({

		smoothScroll: function() {

			// Scroll Variables (tweakable)
			var defaultOptions = {

				// Scrolling Core
				frameRate        : 150, // [Hz]
				animationTime    : 700, // [px]
				stepSize         : 80, // [px]

				// Pulse (less tweakable)
				// ratio of "tail" to "acceleration"
				pulseAlgorithm   : true,
				pulseScale       : 8,
				pulseNormalize   : 1,

				// Acceleration
				accelerationDelta : 20,  // 20
				accelerationMax   : 1,   // 1

				// Keyboard Settings
				keyboardSupport   : true,  // option
				arrowScroll       : 50,     // [px]

				// Other
				touchpadSupport   : true,
				fixedBackground   : true,
				excluded          : ""
			};

			var options = defaultOptions;

			// Other Variables
			var isExcluded = false;
			var isFrame = false;
			var direction = { x: 0, y: 0 };
			var initDone  = false;
			var root = document.documentElement;
			var activeElement;
			var observer;
			var deltaBuffer = [ 120, 120, 120 ];

			var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32,
						pageup: 33, pagedown: 34, end: 35, home: 36 };


			/***********************************************
			 * INITIALIZE
			 ***********************************************/

			/**
			 * Tests if smooth scrolling is allowed. Shuts down everything if not.
			 */
			function initTest() {

				var disableKeyboard = false;

				// disable keys for google reader (spacebar conflict)
				if (document.URL.indexOf("google.com/reader/view") > -1) {
					disableKeyboard = true;
				}

				// disable everything if the page is blacklisted
				if (options.excluded) {
					var domains = options.excluded.split(/[,\n] ?/);
					domains.push("mail.google.com"); // exclude Gmail for now
					for (var i = domains.length; i--;) {
						if (document.URL.indexOf(domains[i]) > -1) {
							observer && observer.disconnect();
							removeEvent("mousewheel", wheel);
							disableKeyboard = true;
							isExcluded = true;
							break;
						}
					}
				}

				// disable keyboard support if anything above requested it
				if (disableKeyboard) {
					removeEvent("keydown", keydown);
				}

				if (options.keyboardSupport && !disableKeyboard) {
					addEvent("keydown", keydown);
				}
			}

			/**
			 * Sets up scrolls array, determines if frames are involved.
			 */
			function init() {

				if (!document.body) return;

				var body = document.body;
				var html = document.documentElement;
				var windowHeight = window.innerHeight;
				var scrollHeight = body.scrollHeight;

				// check compat mode for root element
				root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
				activeElement = body;

				initTest();
				initDone = true;

				// Checks if this script is running in a frame
				if (top != self) {
					isFrame = true;
				}

				/**
				 * This fixes a bug where the areas left and right to
				 * the content does not trigger the onmousewheel event
				 * on some pages. e.g.: html, body { height: 100% }
				 */
				else if (scrollHeight > windowHeight &&
						(body.offsetHeight <= windowHeight ||
						 html.offsetHeight <= windowHeight)) {

					// DOMChange (throttle): fix height
					var pending = false;
					var refresh = function () {
						if (!pending && html.scrollHeight != document.height) {
							pending = true; // add a new pending action
							setTimeout(function () {
								html.style.height = document.height + 'px';
								pending = false;
							}, 500); // act rarely to stay fast
						}
					};
					html.style.height = 'auto';
					setTimeout(refresh, 10);

					var config = {
						attributes: true,
						childList: true,
						characterData: false
					};

					observer = new MutationObserver(refresh);
					observer.observe(body, config);

					// clearfix
					if (root.offsetHeight <= windowHeight) {
						var underlay = document.createElement("div");
						underlay.style.clear = "both";
						body.appendChild(underlay);
					}
				}

				// gmail performance fix
				if (document.URL.indexOf("mail.google.com") > -1) {
					var s = document.createElement("style");
					s.innerHTML = ".iu { visibility: hidden }";
					(document.getElementsByTagName("head")[0] || html).appendChild(s);
				}
				// facebook better home timeline performance
				// all the HTML resized images make rendering CPU intensive
				else if (document.URL.indexOf("www.facebook.com") > -1) {
					var home_stream = document.getElementById("home_stream");
					home_stream && (home_stream.style.webkitTransform = "translateZ(0)");
				}
				// disable fixed background
				if (!options.fixedBackground && !isExcluded) {
					body.style.backgroundAttachment = "scroll";
					html.style.backgroundAttachment = "scroll";
				}
			}


			/************************************************
			 * SCROLLING
			 ************************************************/

			var que = [];
			var pending = false;
			var lastScroll = +new Date;

			/**
			 * Pushes scroll actions to the scrolling queue.
			 */
			function scrollArray(elem, left, top, delay) {

				delay || (delay = 1000);
				directionCheck(left, top);

				if (options.accelerationMax != 1) {
					var now = +new Date;
					var elapsed = now - lastScroll;
					if (elapsed < options.accelerationDelta) {
						var factor = (1 + (30 / elapsed)) / 2;
						if (factor > 1) {
							factor = Math.min(factor, options.accelerationMax);
							left *= factor;
							top  *= factor;
						}
					}
					lastScroll = +new Date;
				}

				// push a scroll command
				que.push({
					x: left,
					y: top,
					lastX: (left < 0) ? 0.99 : -0.99,
					lastY: (top  < 0) ? 0.99 : -0.99,
					start: +new Date
				});

				// don't act if there's a pending queue
				if (pending) {
					return;
				}

				var scrollWindow = (elem === document.body);

				var step = function (time) {

					var now = +new Date;
					var scrollX = 0;
					var scrollY = 0;

					for (var i = 0; i < que.length; i++) {

						var item = que[i];
						var elapsed  = now - item.start;
						var finished = (elapsed >= options.animationTime);

						// scroll position: [0, 1]
						var position = (finished) ? 1 : elapsed / options.animationTime;

						// easing [optional]
						if (options.pulseAlgorithm) {
							position = pulse(position);
						}

						// only need the difference
						var x = (item.x * position - item.lastX) >> 0;
						var y = (item.y * position - item.lastY) >> 0;

						// add this to the total scrolling
						scrollX += x;
						scrollY += y;

						// update last values
						item.lastX += x;
						item.lastY += y;

						// delete and step back if it's over
						if (finished) {
							que.splice(i, 1); i--;
						}
					}

					// scroll left and top
					if (scrollWindow) {
						window.scrollBy(scrollX, scrollY);
					}
					else {
						if (scrollX) elem.scrollLeft += scrollX;
						if (scrollY) elem.scrollTop  += scrollY;
					}

					// clean up if there's nothing left to do
					if (!left && !top) {
						que = [];
					}

					if (que.length) {
						requestFrame(step, elem, (delay / options.frameRate + 1));
					} else {
						pending = false;
					}
				};

				// start a new queue of actions
				requestFrame(step, elem, 0);
				pending = true;
			}

			/***********************************************
			 * EVENTS
			 ***********************************************/

			/**
			 * Mouse wheel handler.
			 * @param {Object} event
			 */
			function wheel(event) {

				if (!initDone) {
					init();
				}

				var target = event.target;
				var overflowing = overflowingAncestor(target);

				// use default if there's no overflowing
				// element or default action is prevented
				if (!overflowing || event.defaultPrevented ||
					isNodeName(activeElement, "embed") ||
				   (isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
					return true;
				}

				var deltaX = event.wheelDeltaX || 0;
				var deltaY = event.wheelDeltaY || 0;

				// use wheelDelta if deltaX/Y is not available
				if (!deltaX && !deltaY) {
					deltaY = event.wheelDelta || 0;
				}

				// check if it's a touchpad scroll that should be ignored
				if (!options.touchpadSupport && isTouchpad(deltaY)) {
					return true;
				}

				// scale by step size
				// delta is 120 most of the time
				// synaptics seems to send 1 sometimes
				if (Math.abs(deltaX) > 1.2) {
					deltaX *= options.stepSize / 120;
				}
				if (Math.abs(deltaY) > 1.2) {
					deltaY *= options.stepSize / 120;
				}

				scrollArray(overflowing, -deltaX, -deltaY);
				event.preventDefault();
			}

			/**
			 * Keydown event handler.
			 * @param {Object} event
			 */
			function keydown(event) {

				var target   = event.target;
				var modifier = event.ctrlKey || event.altKey || event.metaKey ||
							  (event.shiftKey && event.keyCode !== key.spacebar);

				// do nothing if user is editing text
				// or using a modifier key (except shift)
				// or in a dropdown
				if ( /input|textarea|select|embed/i.test(target.nodeName) ||
					 target.isContentEditable ||
					 event.defaultPrevented   ||
					 modifier ) {
				  return true;
				}
				// spacebar should trigger button press
				if (isNodeName(target, "button") &&
					event.keyCode === key.spacebar) {
				  return true;
				}

				var shift, x = 0, y = 0;
				var elem = overflowingAncestor(activeElement);
				var clientHeight = elem.clientHeight;

				if (elem == document.body) {
					clientHeight = window.innerHeight;
				}

				switch (event.keyCode) {
					case key.up:
						y = -options.arrowScroll;
						break;
					case key.down:
						y = options.arrowScroll;
						break;
					case key.spacebar: // (+ shift)
						shift = event.shiftKey ? 1 : -1;
						y = -shift * clientHeight * 0.9;
						break;
					case key.pageup:
						y = -clientHeight * 0.9;
						break;
					case key.pagedown:
						y = clientHeight * 0.9;
						break;
					case key.home:
						y = -elem.scrollTop;
						break;
					case key.end:
						var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
						y = (damt > 0) ? damt+10 : 0;
						break;
					case key.left:
						x = -options.arrowScroll;
						break;
					case key.right:
						x = options.arrowScroll;
						break;
					default:
						return true; // a key we don't care about
				}

				scrollArray(elem, x, y);
				event.preventDefault();
			}

			/**
			 * Mousedown event only for updating activeElement
			 */
			function mousedown(event) {
				activeElement = event.target;
			}


			/***********************************************
			 * OVERFLOW
			 ***********************************************/

			var cache = {}; // cleared out every once in while
			setInterval(function () { cache = {}; }, 10 * 1000);

			var uniqueID = (function () {
				var i = 0;
				return function (el) {
					return el.uniqueID || (el.uniqueID = i++);
				};
			})();

			function setCache(elems, overflowing) {
				for (var i = elems.length; i--;)
					cache[uniqueID(elems[i])] = overflowing;
				return overflowing;
			}

			function overflowingAncestor(el) {
				var elems = [];
				var rootScrollHeight = root.scrollHeight;
				do {
					var cached = cache[uniqueID(el)];
					if (cached) {
						return setCache(elems, cached);
					}
					elems.push(el);
					if (rootScrollHeight === el.scrollHeight) {
						if (!isFrame || root.clientHeight + 10 < rootScrollHeight) {
							return setCache(elems, document.body); // scrolling root in WebKit
						}
					} else if (el.clientHeight + 10 < el.scrollHeight) {
						overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
						if (overflow === "scroll" || overflow === "auto") {
							return setCache(elems, el);
						}
					}
				} while (el = el.parentNode);
			}


			/***********************************************
			 * HELPERS
			 ***********************************************/

			function addEvent(type, fn, bubble) {
				window.addEventListener(type, fn, (bubble||false));
			}

			function removeEvent(type, fn, bubble) {
				window.removeEventListener(type, fn, (bubble||false));
			}

			function isNodeName(el, tag) {
				return (el.nodeName||"").toLowerCase() === tag.toLowerCase();
			}

			function directionCheck(x, y) {
				x = (x > 0) ? 1 : -1;
				y = (y > 0) ? 1 : -1;
				if (direction.x !== x || direction.y !== y) {
					direction.x = x;
					direction.y = y;
					que = [];
					lastScroll = 0;
				}
			}

			var deltaBufferTimer;

			function isTouchpad(deltaY) {
				if (!deltaY) return;
				deltaY = Math.abs(deltaY)
				deltaBuffer.push(deltaY);
				deltaBuffer.shift();
				clearTimeout(deltaBufferTimer);
				var allEquals    = (deltaBuffer[0] == deltaBuffer[1] &&
									deltaBuffer[1] == deltaBuffer[2]);
				var allDivisable = (isDivisible(deltaBuffer[0], 120) &&
									isDivisible(deltaBuffer[1], 120) &&
									isDivisible(deltaBuffer[2], 120));
				return !(allEquals || allDivisable);
			}

			function isDivisible(n, divisor) {
				return (Math.floor(n / divisor) == n / divisor);
			}

			var requestFrame = (function () {
				  return  window.requestAnimationFrame       ||
						  window.webkitRequestAnimationFrame ||
						  function (callback, element, delay) {
							  window.setTimeout(callback, delay || (1000/60));
						  };
			})();

			var MutationObserver = window.MutationObserver || window.WebKitMutationObserver;


			/***********************************************
			 * PULSE
			 ***********************************************/

			/**
			 * Viscous fluid with a pulse for part and decay for the rest.
			 * - Applies a fixed force over an interval (a damped acceleration), and
			 * - Lets the exponential bleed away the velocity over a longer interval
			 * - Michael Herf, http://stereopsis.com/stopping/
			 */
			function pulse_(x) {
				var val, start, expx;
				// test
				x = x * options.pulseScale;
				if (x < 1) { // acceleartion
					val = x - (1 - Math.exp(-x));
				} else {     // tail
					// the previous animation ended here:
					start = Math.exp(-1);
					// simple viscous drag
					x -= 1;
					expx = 1 - Math.exp(-x);
					val = start + (expx * (1 - start));
				}
				return val * options.pulseNormalize;
			}

			function pulse(x) {
				if (x >= 1) return 1;
				if (x <= 0) return 0;

				if (options.pulseNormalize == 1) {
					options.pulseNormalize /= pulse_(1);
				}
				return pulse_(x);
			}

			addEvent("mousedown", mousedown);
			addEvent("mousewheel", wheel);
			addEvent("load", init);

		}

	});
})(jQuery);

// open dropdown
(function ($) {
	
$.fn.css3Animate = function(element){
	return $(this).on('click',function(e){
		var dropdown = element;
		$(this).toggleClass('active');
		e.preventDefault();
		if(dropdown.hasClass('opened')){
			dropdown.removeClass('opened').addClass('closed');
			setTimeout(function(){
				dropdown.removeClass('closed')
			},500);
		}else{
			dropdown.addClass('opened');
		}
	});
}

$.mad_global = $.mad_global || {};
$.mad_global.mad_init_carousel = function () {

	$('.owl-carousel').each(function(){
	
		/* Max items counting */
		var max_items = $(this).data('max-items');
		var tablet_items = max_items;
		if(max_items > 1){
			tablet_items = max_items - 1;
		}
		var mobile_items = 1;

		var autoplay_carousel = $(this).data('autoplay');
		var autoplay_timeout = $(this).data('autoplay-timeout');
		if(autoplay_timeout == null) {
			autoplay_timeout = 3000;
		}

		/* Install Owl Carousel */
		$(this).owlCarousel({
			
		    smartSpeed : 450,
		    nav : true,
		    loop  : true,
		    autoplay : autoplay_carousel,
		    autoplayTimeout: autoplay_timeout,
		    navText : false,
		    lazyLoad: true,
		    responsiveClass:true,
		    responsive : {
		        0:{
		            items:mobile_items
		        },
		        481:{
		            items:tablet_items
		        },
		        1200:{
		            items:max_items
		        }
		    }
		    
		});


	});

	$('.mad_owl_prev').on('click',function(){

		$('.owl-carousel').trigger('prev.owl.carousel');

	});


	$('.mad_owl_next').on('click',function(){

		$('.owl-carousel').trigger('next.owl.carousel');

	});


},

$.fn.mad_custom_select = function () {

		return this.each(function () {
			var $this = $(this),
				list = $this.children('ul'),
				select = $this.children('select'),
				title = $this.children('.select_title'),
				options = select.children('option');
			({
				init: function () {
					var base = this;

						base.href = options.eq(0).data('href') !== undefined ? true : false;
						base.process();
						base.listeners();
				},
				process: function () {

					if ($this.find('[data-filter]').length) {
						$.each(options, function (idx, value) {
							list.append('<li data-filter="' + $(value).data('filter') + '">' + $(value).text() + '</li>');
						});
					} else {
						$.each(options, function (idx, value) {
							if ($(value).data('href') !== undefined) {
								list.append('<li><a href="' + $(value).data('href') + '">' + $(value).text() + '</a></li>');
							} else {
								list.append('<li>' + $(value).text() + '</li>');
							}
						});
					}

					select.hide();
				},
				listeners: function () {

					// open list
					title.on('click', function () {
						list.slideToggle(400);
						$(this).toggleClass('active');
					});

					// selected option
					list.on('click', 'li', function () {
						var val = $(this).text();
						title.text(val);
						list.slideUp(400);
						select.val(val);
						title.toggleClass('active');
					});

					// Orderby
					if ($('.woocommerce-ordering').length) {
						$('.woocommerce-ordering').on('click', 'li', function() {
							var $index = $(this).index();
							$(this).parent().next().children('option').eq($index).attr("selected", "selected");
							$(this).closest('form').submit();
						});
					}

				}

			}).init();
		});

}

})(jQuery);



/*	CORE
/* --------------------------------------------- */

(function ($, navigator) {

	$.mad_core = $.mad_core || {};

	$.mad_core.defaults = {
		sticky: true,
		animated: true
	}

	$.mad_core = {
		run: function (options) {
			var base = this;
				base.el = $('body');
				base.init(options);
		},
		setUp: function (options) {
			var base = this;

			var animEndEventNames = {
				'WebkitAnimation' : 'webkitAnimationEnd',
				'OAnimation' : 'oAnimationEnd',
				'msAnimation' : 'MSAnimationEnd',
				'animation' : 'animationend'
			},
			transEndEventNames = {
				'WebkitTransition': 'webkitTransitionEnd',
				'MozTransition': 'transitionend',
				'OTransition': 'oTransitionEnd',
				'msTransition': 'MSTransitionEnd',
				'transition': 'transitionend'
			}

			base.$window = $(window);
			base.ANIMATIONEND = animEndEventNames[ Modernizr.prefixed('animation') ];
			base.TRANSITIONEND = transEndEventNames[ Modernizr.prefixed('transition') ];
			base.SUPPORT = {
				animations : Modernizr.csstransitions && Modernizr.cssanimations,
				ANIMATIONSUPPORTED: Modernizr.cssanimations,
				TRANSITIONSUPPORTED: Modernizr.csstransitions,
				ISTOUCH: Modernizr.touch
			};
			base.XHRLEVEL2 = !!window.FormData;

			base.o = $.extend({}, $.mad_core.defaults, options);
			base.event = base.SUPPORT.ISTOUCH ? 'touchstart' : 'click';

			// Refresh elements
			base.refresh();
		},

		counters : function(){

			var counter = $('[data-counter]');

			counter.each(function(){

				var $this = $(this),
					offset = $this.offset().top - 3000,
					val = $this.data('counter'),
					output = $this.find('.counter_output');

				$(window).on('scroll',function(){

					if($this.hasClass('counted')) return false;

					if($(this).scrollTop() >= offset){
						$this.addClass('counted');

						var counting = setInterval(function(){
							var t = +output.text();
							t++;
							output.text(t);
							if(t == val) clearInterval(counting);

						},4);
						
					}

				});

			});

		},

		isotope : function(){
			var cthis = this;
			$('[data-isotope-options]').each(function(){

				var self = $(this),
				options = self.data('isotope-options');

				self.isotope(options);

			});
		},


		getNewRandomElement : function (filterClasses,container){

			var element = $('<div class="item"></div>'),
				self = this;
				otherElem = container.find('.item');

			element.addClass(filterClasses[self.getRandom(0,filterClasses.length)])
					.html(otherElem.eq(self.getRandom(0,otherElem.length)).html());

			return element;
		},

		getNewRandomElement : function (filterClasses,container){

			var element = $('<div class="item"></div>'),
				self = this;
				otherElem = container.find('.item');

			element.addClass(filterClasses[self.getRandom(0,filterClasses.length)])
					.html(otherElem.eq(self.getRandom(0,otherElem.length)).html());

			return element;
		},

		getRandom : function(start,end){
			return Math.floor(Math.random() * (start - end + 1)) + end;
		},

		isotopeChangeLayout : function(){
		
			var button = $('[data-isotope-container]');
			
			var button_layout = $('[data-layout]');
			
			button_layout.each(function(){
				var $this = $(this),
				layout_bt = $this.data('layout');
				
				if(layout_bt == 'list_view_products') {
					$('#can_change_layout').children("[class*='isotope_item']").addClass('list_view_type');
				}
				
			});

			
			

			button.each(function(){

				var $this = $(this),

					container = $($this.data('isotope-container')),

					layout = $this.data('isotope-layout');

				$this.on('click',function(){

					$(this).addClass('black_button_active').siblings().removeClass('black_button_active').addClass('black_hover');

					if(layout == "list"){

						container.children("[class*='isotope_item']").addClass('list_view_type');

					}

					else{

						container.children("[class*='isotope_item']").removeClass('list_view_type');

					}

					container.isotope('layout');

					container.find('.tooltip_container').tooltip('.tooltip').tooltip('.tooltip');

				});

			});

		},

		search_holder : function(){

			var searchHolder = $('.search-holder');

			if (searchHolder.length) {
				searchHolder.searchClick();
			}

		},


		init: function(options) {

			var base = this;

			base.setUp(options);

			base.counters();

			base.navInit.init(this);

			base.search_holder();

// Scrollspy
			if ($.fn.madscroll) {
				base.navMain.madscroll({
					body : base.el,
					data : base.stickydata
				});
			}

			base.isotopeChangeLayout();

		},

		
		
		
		elements: {
			'.main_navigation, .full_width_nav, .topbar:not(.no-mobile-advanced)': 'navMain',
			'#mobile-advanced': 'navMobile',
			'body.logged-in.admin-bar' : 'logged',
			'#wrapper': 'wrapper',
			'#header' : 'header',
			'#main_navigation_wrap, .sticky_part' : 'navigation'
		},

		$: function (selector) {
			return $(selector);
		},

		refresh: function() {
			for (var key in this.elements) {
				this[this.elements[key]] = this.$(key);
			}
		},

		navInit : {

			init : function (base) {

				this.createResponsiveButtons.call(base);
				this.navProcess(base);

				if ( base.SUPPORT.ISTOUCH ) {
					this.touchNavEvent(base);
				}
			},

			touchNavEvent: function (base) {
				var clicked = false;

				$("li.menu-item-has-children > a, li.cat-parent > a, li.page_item_has_children > a").on(base.event, function (e) {
					if (clicked != this) {
						e.preventDefault();
						clicked = this;
					}
				});
			},

			navProcess: function (base) {

				base.navInit.touchNav(base, base.$window);

				$(window).resize(function (e) {
					setTimeout(function () {
						base.navInit.touchNav(base, e.currentTarget);
					}, 30);
				});

			},

			touchNav: function (base, target) {

				if (base.SUPPORT.ISTOUCH || $(target).width() < 992) {

					if (!base.navMobile.children('ul').length) {
						base.navMobile.append(base.navMain.html());
					}

					base.navButton.on(base.event, function (e) {
						e.preventDefault();

						if (!base.wrapper.is('.active')) {
							$('html, body').animate({ scrollTop: 0 }, 0, function () {
								base.wrapper.css({
									height: base.navMobile.children('ul').outerHeight(true)
								}).addClass('active');
							});
						}
					});

					base.navHide.on(base.event, function (e) {
						e.preventDefault();
						if (base.wrapper.is('.active')) {
							base.wrapper.css({ height: 'auto' }).removeClass('active');
						}
					});

					$('#menu li a.animated').on('click', function(){
						base.wrapper.css({ height: 'auto' }).removeClass('active');
					});

				} else {
					base.navMobile.children('ul').remove();
				}
			},

			createResponsiveButtons : function () {

				this.navButton = $('<button></button>', {
					id: 'responsive-nav-button',
					'class': 'responsive-nav-button'
				}).insertBefore(this.navMain);

				this.navHide = $('<a></a>', {
					id: 'advanced-menu-hide',
					'href' : '#'
				}).insertBefore(this.navMobile); 

			},

		}

	}

})(jQuery, navigator);


// Sticky and Go-top

(function ($, window) {

	function Temp(el, options) {
		this.el = $(el);
		this.init(options);
	}

	Temp.DEFAULTS = {
		sticky: true
	}

	Temp.prototype = {
		init: function (options) {
			var base = this;
				base.window = $(window);
				base.options = $.extend({}, Temp.DEFAULTS, options);
				base.menuWrap = $('.menu_wrap');
				base.goTop = $('<button class="go-to-top" id="go-to-top"></button>').appendTo(base.el);

			// Sticky
			if (base.options.sticky) {
				base.sticky.stickySet.call(base, base.window);
			}

			// Scroll Event
			base.window.on('scroll', function (e) {
				if (base.options.sticky) {
					base.sticky.stickyInit.call(base, e.currentTarget);
				}
				base.gotoTop.scrollHandler.call(base, e.currentTarget);
			});

			// Click Handler Button GotoTop
			base.gotoTop.clickHandler(base);
		},
		sticky: {
			stickySet: function () {
				var menuWrap = this.menuWrap, offset;
				if (menuWrap.length) {
					offset = menuWrap.offset().top;
					$.data(menuWrap, 'data', {
						offset: offset,
						height: menuWrap.outerHeight(true)
					});
					 
				}
			},
			stickyInit: function (win) {
				var base = this, data;
				if (base.menuWrap.length) {
					data = $.data(base.menuWrap, 'data');
					base.sticky.stickyAction(data, win, base);
				}
			},
			stickyAction: function (data, win, base) {
				var scrollTop = $(win).scrollTop();
				if (scrollTop > data.offset) {
					 
					if (!base.menuWrap.hasClass('sticky')) {
						base.menuWrap.addClass('sticky');
					}
				} else {
					 
					if (base.menuWrap.hasClass('sticky')) {
						base.menuWrap.removeClass('sticky');
					}
				}
			}
		},
		gotoTop: {
			scrollHandler: function (win) {
				$(win).scrollTop() > 200 ?
					this.goTop.addClass('go-top-visible'):
					this.goTop.removeClass('go-top-visible');
			},
			clickHandler: function (self) {
				self.goTop.on('click', function (e) {
					e.preventDefault();
					$('html, body').animate({ scrollTop: 0 }, 800);
				});
			}
		}
	}

	/* Temp Plugin
	 * ================================== */

	$.fn.Temp = function (option) {
		return this.each(function () {
			var $this = $(this), data = $this.data('Temp'),
				options = typeof option == 'object' && option;
			if (!data) {
				$this.data('Temp', new Temp(this, options));
			}
		});
	}

})(jQuery, window);
























;(function($){
    "use strict";
    var additions = {
        _inititalized: false,
        _blog_isotope: null,
        init: function() {
            if ( this._inititalized ) return false;
            this._inititalized = true;
            this.blogMasonryImplement();
        },

        //-- Blog masonry initialization
        blogMasonryImplement: function() {
            var this_obj = this;

			
			
            if ( ! $.fn.isotope || ! $.fn.imagesLoaded ) return false;
            $('[data-isotope-options]').each(function(){
				
				 
                var self = $(this),
                    options = self.data('isotope-options');
              

			   if ( self.hasClass('portfolio_isotope_container') ) {
                    //self.isotope('destroy');
                }
              
                this_obj.blogMasonryLoadMore(self,options.itemSelector);
            });
        },

        //-- Blog masonry load more function
        blogMasonryLoadMore: function(container, item) {
            var this_obj = this;
            if ( 'undefined' == typeof( ajax_masonry_load_more_posts ) ) return false;

            var load_more_btn   = $('#load_more');

            if ( ! load_more_btn.length || ! container.length ) return false;


			$('#filters button[data-filter!="*"]').on('click', function(){

				load_more_btn.hide();

			});

			$('#filters button[data-filter="*"]').on('click', function(){

				load_more_btn.show();

			});
			
			
			
            load_more_btn.on( 'click', function(e) {
				
                e.preventDefault();
				
				
				
                var _this = $(this),
                    btn_html = $(this).html();
                if ( 'true' == _this.attr('data-loading') ) return false;
                _this.attr('data-loading', 'true');              
                if( _this.attr('data-columns')!== 'undefined'){
                    var beautyconstruction_col = _this.attr('data-columns')
                }else { var beautyconstruction_col =''; }
                if( _this.attr('data-layout')!== 'undefined'){
                    var beautyconstruction_format = _this.attr('data-layout')
                } else { var beautyconstruction_format =''; } 
				if( _this.attr('data-layout')!== 'undefined'){
                var beautyconstruction_tag_item = _this.attr('data-tag_item_title')
                } else { var beautyconstruction_tag_item =''; }
				if( _this.attr('data-orderby')!== 'undefined'){
                var beautyconstruction_orderby = _this.attr('data-orderby')
                } else { var beautyconstruction_orderby =''; }
				if( _this.attr('data-order')!== 'undefined'){
                var beautyconstruction_order = _this.attr('data-order')
                } else { var beautyconstruction_order =''; }
				if( _this.attr('data-position_text')!== 'undefined'){
                var beautyconstruction_position_text = _this.attr('data-position_text')
                } else { var beautyconstruction_position_text =''; }
				
                var current_page = parseInt( _this.attr('data-current-page'), 10 );
                if ( NaN == current_page ) return false;
                var _data_action= "masonry_load_more_posts";
                var _data_query_vars = ajax_masonry_load_more_posts.query_vars;
                if( _this.attr('data-maxpage')!== 'undefined'){
                    var _data_max_pages = _this.attr('data-maxpage');
                } else { var _data_max_pages = ajax_masonry_load_more_posts.max_pages; }
                var _data_page = current_page + 1;
                var _data_perpage = _this.attr('data-items');
				
                $.ajax({
                    url: ajax_masonry_load_more_posts.ajaxurl,
                    type: 'post',
                    data:"&action="+_data_action+"&query_vars="+_data_query_vars+"&max_pages="+_data_max_pages+"&page="+_data_page+"&perpage="+_data_perpage+"&beautyconstruction_order="+beautyconstruction_order+"&beautyconstruction_orderby="+beautyconstruction_orderby+"&beautyconstruction_col="+beautyconstruction_col+"&beautyconstruction_tag_item="+beautyconstruction_tag_item+"&beautyconstruction_position_text="+beautyconstruction_position_text+"&beautyconstruction_format="+beautyconstruction_format,
                    beforeSend: function() {
                        _this.html('<i class="icon-spinner animate_pulse" style="display: inline-block;"></i>');
                    },
                    success: function( html ) {
                        if ( html != '' ) {
                            container.append( $(html) ).imagesLoaded()
                                .isotope('appended', container.find(item+':not([style])').addClass( container.hasClass('home') ? 'ajax_added type_2' : 'ajax_added') );
                            setTimeout(function(){
                                container.isotope('layout');
                            }, 100);
                        }
                        if ( current_page + 1 == _data_max_pages ) {
                            _this.remove();
                        }
                        else {
                            _this.attr('data-current-page', current_page + 1 );
                            _this.html( btn_html );
                        }
                    },
                    complete: function() {
                        _this.attr('data-loading', 'false');
                       
                    },
					
                    error: function( request, status, error ) {
                        console.log( request.responseText );
                    }
					
                });
            });
        },

       

      
    }

    $(document).ready( function() {
        additions.init();
    });
   


})(jQuery);



