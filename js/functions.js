/**
 * Theme functions file
 *
 * Contains handlers for navigation, accessibility, header sizing
 * footer widgets and Featured Content slider
 *
 */
( function( $ ) {
	window.cc = {
		"config": {
			"defaults": {
				"route": "home",
				"$menu": $("#menu-main-nav")
			}
		},
		"init": function(){
			this.setup.menu();
			this.common.route.change();
			this.bind();
		},
		"bind": function(){
			$("body").delegate(".main-enter-site,#main-intro-video", "click", function(){
				// $("#main-intro-video").get(0).play();
				window.cc.runIntro();
				setTimeout(function(){
					$("#main-intro > h1").fadeOut(1000);
					$("#main-intro").fadeOut(3000);
				}, 1000)
			})
			$(window).bind("hashchange", this.common.route.change);
		},

		"runIntro": function(){
			var t = 0;
			var prev;
			$("#main-intro img").each(function(){
				setTimeout(function(ele,before){
					if (before){
						$(before).hide();
					}
					$(ele).show();
				}, (t+=30), this, prev);
				prev = this;
			});
		},

		"setup": {
			"intro": function(){

			},
			"menu": function(){
				$("body").bind("click", function(e){
					if (!$(e.target).parents("#primary-navigation").length){
						$(".menu-item").trigger("mouseout");
					}
				});

				$(".menu-item").each(function(){
					var $sub = $(this).children(".sub-menu");
					if ($sub.length){
						$sub.css("width", $(this).innerWidth() +"px");
						$sub.children("li").first().addClass("first");
					}
					$(this).find("a").each(function(){
						var  href = $(this).attr("href");
						if (href[0] != "#"){
							var hrefSplit = href.split("/");
							var hashName = hrefSplit[ hrefSplit.length - 2 ];

							$(this).attr("data-page", hashName);

							$(this).attr("href", "#!"+hashName);
						}

					})
				});

				window.cc.config.defaults.$menu
					.delegate(".menu-item", "mouseover", function(){
						var $sub = $(this).children(".sub-menu");
						if ($sub.length){
							$sub.show();
						}
					})
					.delegate(".menu-item", "mouseout", function(e){
						var $sub = $(this).children(".sub-menu");
						e.stopPropagation();

						if ($sub.length){
							$sub.hide();
						}
					});
			}
		},


		"common": {
			"route": {
				"getCurrent": function(){
					var hash = window.location.hash.split("#!");
					return !hash[1] ? window.cc.config.defaults.route : hash[1].split("?")[0];
				},

				"getParams": function(cached){
					var delim = location.hash.split("?");
					var params = {};
					if (cached && this.params){
						return this.params;
					} else{
						if (delim[1]){
							delim[1].split("&").map(function(v){
								var vs = v.split("=");
								params[vs[0]] = vs[1];
							});
						}
					}

					this.params = params;

					return params;
				},

				"change": function(){
					var pageName = window.cc.common.route.getCurrent();

					window.cc.config.defaults.$menu.find(".menu-item > a").removeClass("selected")
						.filter("[data-page='"+pageName+"']").addClass("selected")

					window.cc.common.page.display(pageName);
				}
			},
			"page": {
				"config": {
					"container": {
						"id": "primary"
					}
				},

				"get": function(pageName){
					$.get( window.location.pathname + pageName )
						.done( this.render );
				},
				"render": function(tmpl){
					var page = window.cc.pages[ window.cc.common.route.getCurrent() ];
					var $container = $("#"+window.cc.common.page.config.container.id);
					var $tmpl = $("<div id=\""+page.config.id+"\">"+tmpl+"</div>");

					page.data.template = $tmpl;

					$container.append($tmpl.hide());

					if ($.isFunction(page.init)){
						page.init();
					}

					window.cc.common.page.display(page.config.name);
				},
				"display": function(pageName){
					var pageName = (pageName || window.cc.common.route.getCurrent());
					var page = window.cc.pages[ pageName ];
					var $container = $("#"+window.cc.common.page.config.container.id);
					var $page = $("#"+page.config.id);

					if (!$page.length){
						return this.get(pageName);
					}

					if (window.cc.pages._current){
						if ($.isFunction(window.cc.pages._current.stop)){
							window.cc.pages._current.stop();
						}
					}

					window.cc.pages._current = page;

					if ($.isFunction(page.start)){
						page.start();
					}

					$container.children().fadeOut();
					$page.fadeIn();


				}
			},
			"animations": {
				"_builtIn": {
					"map": ["fullShift", "staggeredShift", "rowSlip", "staggeredShift", "staggeredShift", "rowSlip"],
					"getNext": function($container){
						var currentContainer = +$container.find(".featured-gallery-display").data("currentContainer");
						var nextContainer = currentContainer == $container.find(".featured-gallery-container").length-1 ? 0 : currentContainer+1;
						$container.find(".featured-gallery-display").data("currentContainer", nextContainer);
						return nextContainer;
					}
				},
				"randomSelection": function($container){
					var _this = window.cc.common.animations;
					var opt = (Math.random() * _this._builtIn.map.length | 0);
					_this[ _this._builtIn.map[opt] ]($container);
				},
				"rowSlip": function($container){
					var nextContainer = this._builtIn.getNext($container);
					var randRowDirection = (Math.random() * 2 | 0);
					$container.find(".featured-gallery-display .featured-gallery-row").each(function(rowPos){
						var $ele = $(this);
						var c = $ele.children().addClass("removing");
						var w = (c.outerWidth() + 4) * c.length;
						var n = $($container.find(".featured-gallery-container[data-container='"+nextContainer+"']").children().get(rowPos)).children().clone(true);

						var odd = rowPos % 2;

						/**
						 * Randomize the row directions
						 */
						odd = randRowDirection ? !odd : odd;

						if (odd){
							n.css("left", "-"+w*2+"px");
						}

						$ele.append(n);

						$ele.children().animate({
							"left": (odd?"+":"-") + "="+w+"px"
						}, {
							"duration": 700,
							"easing": "easeInQuart"
						}).delay(500).promise().done(function(){
							c.remove();
							n.css("left", 0);
						}); 
					})
				},

				"fullShift": function($container){
					var nextContainer = this._builtIn.getNext($container);
					$container.find(".featured-gallery-display .featured-gallery-row").each(function(rowPos){
						var $ele = $(this);
						var c = $ele.children().addClass("removing");
						var w = (c.outerWidth() + 4) * c.length;
						var n = $($container.find(".featured-gallery-container[data-container='"+nextContainer+"']").children().get(rowPos)).children().clone(true);

						$ele.append(n);

						$ele.children().animate({
							"left": "-="+w+"px"
						}, {
							"duration": 700,
							"easing": "easeInQuart"
						}).delay(500).promise().done(function(){
							c.remove();
							n.css("left", 0);
						}); 
					})

				},
				"staggeredShift": function($container){
					var nextContainer = this._builtIn.getNext($container);
					var t = 0;

					$container.find(".featured-gallery-display .featured-gallery-row").each(function(pos){
						setTimeout(function(ele, rowPos){ 
							var $ele = $(ele);
							var c = $ele.children().addClass("removing");
							var w = (c.outerWidth() + 4) * c.length;
							var n = $($container.find(".featured-gallery-container[data-container='"+nextContainer+"']").children().get(rowPos)).children().clone(true);

							$ele.append(n);

							$ele.children().animate({
								"left": "-="+w+"px"
							}, {
								"duration": 700,
								"easing": "easeInQuart"
							}).delay(500).promise().done(function(){
								c.remove();
								n.css("left", 0);
							}); 
						}, t, this, pos); 
						t+=130; 
					});
				}
			}
		}
	};

	window.cc.pages = $.extend( window.loadablePages, {
		"home": {
			"config": {
				"name": "home",
				"id": "home-page",
				"rotations": {
					"interval": 4600
				}
			},
			"data": {
				"template": null
			},

			"init": function(){
				var $container = this.data.template;

				$container.find(".slider-image").hide().first().show();

				return true;
			},

			"start": function(){
				this.beginImageRotation();
			},

			"stop": function(){
				window.clearInterval( this.data.rotationID );
			},

			"beginImageRotation": function(){
				var $container = this.data.template;
				var $images = $container.find(".slider-image");

				$images.hide().first().show();

				window.clearInterval( this.data.rotationID );

				this.data.rotationID = window.setInterval(function(){ 
					var $vis = $images.filter(":visible");
					var $next = $vis.next().length ? $vis.next() : $images.first();
					$vis.fadeOut(1200);
					$next.fadeIn(1200);
				}, this.config.rotations.interval );
			}
		},
		"lexi-puzder": {
			"config": {
				"name": "lexi-puzder",
				"id": "lexi-puzder-page"
			},
			"data": {
				"template": null
			},
			"init": function(){
				this.data.template.find(".featured-gallery-area").children(":not(:first)").hide();
			}
		},
		"unicorns-2013": {
			"config": {
				"name": "unicorns-2013",
				"id": "unicorns-2013-page"
			},
			"data": {
				"template": null
			},
			"init": function(){
				var _this = this;
				this.data.template.find(".featured-gallery-display .featured-gallery-row").each(function(pos){
					$(this).append( 
						_this.data.template.find(".featured-gallery-container:first")
							.children(".featured-gallery-row[data-row='"+pos+"']")
								.children().clone(true)
					)
				}).parent().data("currentContainer", 0);

			},

			"start": function(){
				// this.data.intervalID = setInterval(window.cc.common.animations.randomSelection, 3800, this.data.template);
			},

			"stop": function(){
				// window.clearInterval( this.data.intervalID );
			}
		},

		"the-dillinger-escape-plan": {
			"config": {
				"name": "the-dillinger-escape-plan",
				"id": "the-dillinger-escape-plan-page"
			},
			"data": {
				"template": null
			},
			"init": function(){
				var _this = this;
				this.data.template.find(".featured-gallery-display .featured-gallery-row").each(function(pos){
					$(this).append( 
						_this.data.template.find(".featured-gallery-container:first")
							.children(".featured-gallery-row[data-row='"+pos+"']")
								.children().clone(true)
					)
				}).parent().data("currentContainer", 0);

			},

			"start": function(){
				if (this.data.template.find(".featured-gallery-item").length > 24){
					this.data.intervalID = setInterval(window.cc.common.animations.randomSelection, 3800, this.data.template);
				}
			},

			"stop": function(){
				if (this.data.template.find(".featured-gallery-item").length > 24){
					window.clearInterval( this.data.intervalID );
				}
			}
		},
		
		"help-grimm": {
			"config": {
				"name": "help-grimm",
				"id": "help-grimm-page",
				"rotations": {
					"interval": 4600
				}
			},
			"data": {
				"template": null
			},
			"init": function(){
				var $container = this.data.template;

				$container.find(".slider-image").hide().first().show();

				this.beginImageRotation();

				return true;
			},

			"beginImageRotation": function(){
				var $container = this.data.template;
				var $images = $container.find(".slider-image");

				$images.hide().first().show();

				window.clearInterval( this.data.rotationID );

				this.data.rotationID = window.setInterval(function(){ 
					var $vis = $images.filter(":visible");
					var $next = $vis.next().length ? $vis.next() : $images.first();
					$vis.fadeOut(1200);
					$next.fadeIn(1200);
				}, this.config.rotations.interval );
			}
		}
	});

	window.cc.init();
} )( jQuery );
