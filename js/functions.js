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
			$(window).bind("hashchange", this.common.route.change);
		},

		"setup": {
			"menu": function(){
				$(".menu-item").each(function(){
					var $sub = $(this).children(".sub-menu");
					if ($sub.length){
						$sub.css("width", $(this).outerWidth() +"px");
						$sub.children("li").first().addClass("first");
					}
					$(this).find("a").each(function(){
						var hrefSplit = $(this).attr("href").split("/");
						var hashName = hrefSplit[ hrefSplit.length - 2 ];

						$(this).attr("data-page", hashName)

						$(this).attr("href", "#!"+hashName);
					})
				});

				window.cc.config.defaults.$menu
					.delegate(".menu-item", "mouseover", function(){
						var $sub = $(this).children(".sub-menu");
						if ($sub.length){
							$sub.show();
						}
					})
					.delegate(".menu-item", "mouseout", function(){
						var $sub = $(this).children(".sub-menu");
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

					page.init();

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

					$container.children().fadeOut();
					$page.fadeIn();



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

				this.beginImageRotation();

				return true;
			},

			"bind": function(){

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
