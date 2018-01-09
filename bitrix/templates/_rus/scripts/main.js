var g = this.g = {};

g.orderedImages = [];
g.allSelects = [];
g.nextSlideNumber = 0;
g.sSlider = {};

__isiOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false );

(function($, w) {
	'use strict';

	var win = $(w),
		lang = {
			ru: {
				fillField: 'Заполните это поле',
				wrongEmail: 'Неправильно введён e-mail',
				expand: 'Развернуть',
				noDescription: 'Не найдено описания',
				noCities: 'Ничего не найдено',
				allCities: 'Все города',
				allTypes: 'Все типы бизнеса',
				notFound: 'Не удалось получить информацию',
				jsonURL: '/rus'
			},
			en: {
				fillField: 'Fill this field',
				wrongEmail: 'Wrong email',
				expand: 'Expand',
				noDescription: 'No description found',
				noCities: 'Nothing found',
				allCities: 'All cities',
				allTypes: 'All types',
				notFound: 'Error loading data',
				jsonURL: '/eng'
			}
			,
			cz: {
				fillField: 'Vyplňte v této oblasti',
				wrongEmail: 'Nesprávně zadaná e-mail',
				expand: 'Otevřeno',
				noDescription: 'No popis nalezeno',
				noCities: 'Nic nalezen',
				allCities: 'Všechna Města',
				allTypes: 'Všechny Oblasti Podnikání',
				notFound: 'Nelze získat informace',
				jsonURL: '/cze'
			}
			,
			bg: {
				fillField: 'Напълнете в тази област',
				wrongEmail: 'Неправилно вписани електронна поща',
				expand: 'Разширява',
				noDescription: 'Не може да бъде намерен',
				noCities: 'Нищо намерени',
				allCities: 'Всички градове',
				allTypes: 'Всички видове бизнес',
				notFound: 'Не може да се получи информация',
				jsonURL: '/bgr'
			}
			,
			hu: {
				fillField: 'Töltse ki ezt a mezőt',
				wrongEmail: 'Rossz email',
				expand: 'Kiterjed',
				noDescription: 'Nem található leírás',
				noCities: 'Nincs találat',
				allCities: 'Minden város',
				allTypes: 'Minden típus',
				notFound: 'Hiba az adatok betöltése',
				jsonURL: '/hun'
			}
			,
			hr: {
				fillField: 'Ispunite ovo polje',
				wrongEmail: 'Pogrešno upišete e-mail adresu',
				expand: 'Povećaj',
				noDescription: 'Nije pronađen opisa',
				noCities: 'nema rezultata',
				allCities: 'Svi grada',
				allTypes: 'Sve vrste poslovanja',
				notFound: 'Ne mogu dobiti informacije',
				jsonURL: '/hrv'
			}
		};

	function getIOSWindowHeight() {
		var zoomLevel = document.documentElement.clientWidth / window.innerWidth;
		return window.innerHeight * zoomLevel;
	}
	function getHeightOfIOSToolbars() {
		var tH = (window.orientation === 0 ? screen.height : screen.width) -  getIOSWindowHeight();
		return tH > 1 ? tH : 0;
	}

	var defaultIOSToolbarsHeight = getHeightOfIOSToolbars();

	switch ( $('body').data('lang') ) {
		case 'ru':
			lang = lang.ru;
		break;
		case 'en':
			lang = lang.en;
		break;
		case 'cz':
			lang = lang.cz;
		break;
		case 'bg':
			lang = lang.bg;
		break;
		case 'hu':
			lang = lang.hu;
		break;
		case 'hr':
			lang = lang.hr;
		break;
		default:
			lang = lang.ru;
	}
	g.lang=lang;

	$.fn.unique = function () {
		var arr = this;
		return $.grep(arr, function (v, i) {
			return $.inArray(v, arr) === i;
		});
	}

	$.fn.eSlider = function( prefix, options ) {

		var opts = $.extend({
			horizontal: true,
			ribbon: prefix + '-ribbon',
			item: prefix + '-item',
			prevCtrl: prefix + '-left',
			nextCtrl: prefix + '-right',
			loop: true,
			disabledClass: 'disabled',
			step: 1,
			viewport: 1,
			animSpeed: 200,
			autoTimer: null,
			identifySlides: true,
			resizable: false,
			mouseScroll: false,
			noQueue: false
		}, options);

		return this.each( function() {

			var newPos = 0,
				slider = $(this),
				ribbon = $(opts.ribbon),
				slides = ribbon.children(opts.item),
				slidesAmount = slides.length,
				defSize = opts.horizontal ? slides.eq(0).outerWidth(true) : slides.eq(0).outerHeight(true),
				jumpToEnd,
				jumpToStart,
				autoScroll,
				animation = {},
				resizeSlider,
				addWheelEvent,
				sliderSize,
				viewport,
				step,
				auxSlides = 0,
				maxPoint,
				prevCtrl = $(opts.prevCtrl),
				nextCtrl = $(opts.nextCtrl),
				controls = prevCtrl.add(nextCtrl);

			console.log(slidesAmount)
			if(slidesAmount==1){
				controls.hide();
				return;
			}
			if (opts.mouseScroll) {
				(addWheelEvent = function() {
					slider.off('.wheel').on('mousewheel.wheel wheel.wheel', function(event) {
						if (event.originalEvent.wheelDelta > 0 || event.originalEvent.deltaY < 0) {
							prevCtrl.click();
						} else {
							nextCtrl.click();
						}
						return false;
					});
				})();
			}

			(resizeSlider = function() {
				sliderSize = opts.horizontal ? slider.width() : slider.height();
				viewport = opts.viewport === 'max' ? sliderSize / defSize : opts.viewport;
				switch(opts.step) {
					case 'full': step = Math.ceil(sliderSize / defSize) - 1; break;
					case 'half': step = Math.ceil(sliderSize / defSize / 2); break;
					default: step = opts.step; break;
				}
				if ( slidesAmount <= viewport ) {
					controls.hide();
					opts.mouseScroll && slider.off('.wheel');
					newPos = 0;
					ribbon.css(opts.horizontal ? 'left' : 'top', newPos);
					if (opts.horizontal) ribbon.width(9000/* defSize * slidesAmount */);
				} else {
					controls.show();
					opts.mouseScroll && addWheelEvent();
					if (opts.horizontal) ribbon.width(9000);
				}
				maxPoint = slidesAmount * defSize - sliderSize;
			})();

			if ( opts.resizable ) {
				$(w).on('resize.sSlider', function() {
					resizeSlider();
				});
			}

			if (opts.identifySlides) {
				for ( var i in slides) {
					slides.eq(i).attr('data-slide-id', i);
				}
			}

			if ( opts.loop ) {
				viewport = Math.ceil(viewport);
				auxSlides = viewport * 2;
				newPos = defSize * viewport;
				maxPoint = (slidesAmount + auxSlides / 2) * defSize;
				for ( var i = 1; i < auxSlides; i += 2 ) {
					ribbon.children().eq(-i).clone().prependTo(ribbon).addClass('fake');
					ribbon.children().eq(i).clone().appendTo(ribbon).addClass('fake');
				}
				
			} else {
				prevCtrl.addClass(opts.disabledClass);
			}

			slides = ribbon.children(opts.item);
		    slidesAmount = slides.length;

			ribbon.css(opts.horizontal ? 'left' : 'top', -newPos);

			var sliderReturn = function() {
				slider.trigger('endedMoving');
				if (!opts.loop) return;

				if ( jumpToStart ) {
					newPos = defSize * auxSlides / 2;
				} else if ( jumpToEnd ) {
					newPos = defSize * (slidesAmount - auxSlides / 2 - viewport );
				}

				if ( jumpToStart || jumpToEnd ) {
					ribbon.css(opts.horizontal ? 'left' : 'top', -newPos);
					jumpToStart = false;
					jumpToEnd = false;
				}
			};

			var sliderMove = function() {
				if (jumpToStart) {
					g.nextSlideNumber = 0;
				} else if (jumpToEnd) {
					g.nextSlideNumber = slidesAmount - 1;
				} else {
					g.nextSlideNumber = newPos / defSize - 1;
				}
				slider.trigger('startedMoving');

				if (opts.autoTimer) {
					clearInterval(autoScroll);
					autoScroll = setInterval(function() { nextCtrl.click(); }, opts.autoTimer);
				}

				animation[opts.horizontal ? 'left': 'top'] = -newPos;
				ribbon.stop(true).animate(animation, opts.animSpeed, sliderReturn );
			};

			prevCtrl.click( function() {
				if ( !opts.noQueue && ribbon.is(':animated') ) return false;

				if ( !opts.loop && newPos <= 0 ) {
					$(this).addClass(opts.disabledClass);
					return false;
				}
				controls.removeClass(opts.disabledClass);

				if ( newPos <= defSize * step ) {
					if ( !opts.loop ) {
						$(this).addClass(opts.disabledClass);
						newPos = 0;
						sliderMove();
						return;
					}
					jumpToEnd = true;
				}

				newPos -= defSize * step;
				sliderMove();
			});

			nextCtrl.click( function() {
				if ( !opts.noQueue && ribbon.is(':animated') ) return false;

				if ( !opts.loop && newPos >= maxPoint ) {
					$(this).addClass(opts.disabledClass);
					return false;
				}
				controls.removeClass(opts.disabledClass);
				if ( newPos >= maxPoint - step * defSize ) {
					if (!opts.loop) {
						$(this).addClass(opts.disabledClass);
						newPos = maxPoint;
						sliderMove();
						return;
					}
					jumpToStart = true;
				}

				newPos += defSize * step;
				sliderMove();
			});

			if (opts.autoTimer) {
				autoScroll = setInterval(function() { nextCtrl.click(); }, opts.autoTimer);
			}
		});
	};

	$.fn.newSlider = function(prefix, options) {

		var opts = $.extend({
			horizontal: true,
			ribbon: prefix + '-ribbon',
			item: prefix + '-item',
			prevCtrl: prefix + '-left',
			nextCtrl: prefix + '-right',
			container: prefix + '-container',
			loop: true,
			disabledClass: 'disabled',
			inactiveClass: 'inactive',
			step: 1,
			viewport: 1,
			animSpeed: 200,
			autoTimer: null,
			identifySlides: true,
			resizable: false,
			mouseScroll: false,
			noQueue: false,
			fullSizeSlide: false,
			pagination: false,
			paginationContainer: prefix + '-pagination',
			paginationTag: '<b><i></i></b>'
		}, options);

		return this.each( function() {

			var newPos = 0,
				slider = $(this),
				ribbon = slider.find(opts.ribbon),
				slides = ribbon.find(opts.item),
				container = slider.find(opts.container),
				paginationContainer = slider.find(opts.paginationContainer),
				paginationTag = $(opts.paginationTag),
				paginationTagName = '',
				slidesAmount = slides.length,
				defSize = opts.horizontal ? slides.eq(0).outerWidth(true) : slides.eq(0).outerHeight(true),
				jumpToEnd,
				jumpToStart,
				autoScroll,
				nextSlide,
				animation = {},
				resizeSlider,
				addWheelEvent,
				sliderSize,
				viewport,
				slideNumber = 0,
				step,
				auxSlides = 0,
				maxPoint,
				prevCtrl = slider.find(opts.prevCtrl),
				nextCtrl = slider.find(opts.nextCtrl),
				controls = prevCtrl.add(nextCtrl),
				me;

			/*var Slider = function() {
				this.getSlide = function() {
					return slideNumber;
				};
				this.name =
			};

			var slidor = new Slider();
			g.allSliders = g.allSliders || [];
			g.allSliders.push(slidor);*/

			if (!container.length) container = slider;

			if (opts.mouseScroll) {
				(addWheelEvent = function() {
					slider.off('.wheel').on('mousewheel.wheel wheel.wheel', function(event) {
						if (event.originalEvent.wheelDelta > 0 || event.originalEvent.deltaY < 0) {
							scrollToPrev();
						} else {
							scrollToNext();
						}
						return false;
					});
				})();
			}

			(resizeSlider = function() {
				sliderSize = opts.horizontal ? container.width() : container.height();
				if (opts.fullSizeSlide) {
					defSize = sliderSize;
					slides.each( function() {
						this.style.width = defSize + 'px';
					});
					newPos = defSize * slideNumber;
					ribbon.css(opts.horizontal ? 'left' : 'top', -newPos);
				}
				viewport = opts.viewport === 'max' ? sliderSize / defSize : opts.viewport;
				switch(opts.step) {
					case 'full': step = Math.ceil(sliderSize / defSize) - 1; break;
					case 'half': step = Math.ceil(sliderSize / defSize / 2); break;
					default: step = opts.step; break;
				}
				maxPoint = slidesAmount * defSize - sliderSize;
				if ( slidesAmount <= viewport ) {
					controls.addClass('inactive');
					opts.mouseScroll && slider.off('.wheel');
					newPos = 0;
					ribbon.css(opts.horizontal ? 'left' : 'top', newPos);
				} else {
					controls.removeClass('inactive');
					opts.mouseScroll && addWheelEvent();
				}
			})();

			if (opts.resizable) {
				win.on('resize.sSlider', function() {
					resizeSlider();
				});
			}

			if (opts.identifySlides) {
				for (var i in slides) {
					slides.eq(i).attr('data-slide-id', i);
				}
			}

			if (opts.pagination) {
				paginationContainer.empty();
				for (var i = 0; i < slidesAmount; i++) {
					paginationTag.clone().appendTo(paginationContainer);
				}
				paginationTagName = opts.paginationTag;
				paginationTagName = paginationTagName.substring(paginationTagName.indexOf('<') + 1, paginationTagName.indexOf('>'));

				paginationContainer.on('click', paginationTagName, function() {
					me = $(this);
					if (me.hasClass('active')) return;

					slideNumber = me.index();
					newPos = (slideNumber + auxSlides / 2) * defSize;
					sliderMove();
				}).find(paginationTagName).first().addClass('active');
			}

			if ( opts.loop ) {
				viewport = Math.ceil(viewport);
				auxSlides = viewport * 2;
				newPos = defSize * viewport;
				maxPoint = (slidesAmount + auxSlides / 2) * defSize;
				for ( var i = 1; i < auxSlides; i += 2 ) {
					ribbon.children().eq(-i).clone().prependTo(ribbon).addClass('fake');
					ribbon.children().eq(i).clone().appendTo(ribbon).addClass('fake');
				}
			} else {
				prevCtrl.addClass(opts.disabledClass);
			}

			slides = ribbon.children(opts.item);
		    slidesAmount = slides.length;

			ribbon.css(opts.horizontal ? 'left' : 'top', -newPos);

			var sliderReturn = function() {
				slider.trigger('endedMoving');
				if (!opts.loop) return;

				if ( jumpToStart ) {
					newPos = defSize * auxSlides / 2;
				} else if ( jumpToEnd ) {
					newPos = defSize * (slidesAmount - auxSlides / 2 - viewport );
				}

				if ( jumpToStart || jumpToEnd ) {
					ribbon.css(opts.horizontal ? 'left' : 'top', -newPos);
					jumpToStart = false;
					jumpToEnd = false;
				}
			};

			var sliderMove = function() {
				if (jumpToStart) {
					slideNumber = 0;
				} else if (jumpToEnd) {
					slideNumber = slidesAmount - auxSlides - 1;
				}
				g.nextSlideNumber = slideNumber;
				slider.trigger('startedMoving');
				paginationContainer.find(paginationTagName).eq(slideNumber).addClass('active').siblings().removeClass('active');

				if (opts.autoTimer) {
					clearInterval(autoScroll);
					autoScroll = setInterval( function() {
						scrollToNext();
					}, opts.autoTimer);
				}

				animation[opts.horizontal ? 'left': 'top'] = -newPos;
				ribbon.stop(true).animate(animation, opts.animSpeed, sliderReturn );
			};

			var scrollToPrev = function() {
				if ( (!opts.noQueue && ribbon.is(':animated')) || prevCtrl.hasClass('inactive') ) return false;

				if ( !opts.loop && newPos <= 0 ) {
					prevCtrl.addClass(opts.disabledClass);
					return false;
				}
				controls.removeClass(opts.disabledClass);

				if ( newPos <= defSize * step ) {
					if ( !opts.loop ) {
						prevCtrl.addClass(opts.disabledClass);
						newPos = 0;
						slideNumber -= step;
						sliderMove();
						return;
					}
					jumpToEnd = true;
				}

				newPos -= defSize * step;
				slideNumber -= step;
				sliderMove();
			};

			var scrollToNext = function() {
				if ( (!opts.noQueue && ribbon.is(':animated')) || nextCtrl.hasClass('inactive') ) return false;

				if ( !opts.loop && newPos >= maxPoint ) {
					nextCtrl.addClass(opts.disabledClass);
					return false;
				}
				controls.removeClass(opts.disabledClass);
				if ( newPos >= maxPoint - step * defSize ) {
					if (!opts.loop) {
						nextCtrl.addClass(opts.disabledClass);
						newPos = maxPoint;
						slideNumber += step;
						sliderMove();
						return;
					}
					jumpToStart = true;
				}

				newPos += defSize * step;
				slideNumber += step;
				sliderMove();
			};

			prevCtrl.click( function() {
				scrollToPrev();
			});

			nextCtrl.click( function() {
				scrollToNext();
			});

			if (opts.autoTimer) {
				autoScroll = setInterval( function() {
					scrollToNext();
				}, opts.autoTimer);
			}
		});
	};

	// imitating background-size: cover
	// todo: fix for IE8, fix double call on load
	$.fn.resizeBg = function(options) {

		var opts = $.extend({
			showOrder: false,
			fadeSpeed: 1000
		}, options);

		return this.each( function() {

			var container = $(this),
				images = container.find('img'),
				imageResize,
				containerHeight,
				containerWidth,
				imageWidth,
				imageHeight,
				me;

			g.bgImages = images;

			if ( opts.showOrder ) {
				g.orderedImages.push(this);
			}

			imageResize = function() {
				images.each( function() {
					me = $(this);
					imageWidth = this.clientWidth;
					imageHeight = this.clientHeight;
					containerHeight = container.outerHeight();
					containerWidth = container.outerWidth();

					if ( imageWidth / imageHeight > containerWidth / containerHeight ) {
						me.addClass('vertical');
						this.style.left = (containerWidth - imageWidth) / 2 + 'px';
						this.style.top = 'auto';
					} else {
						me.removeClass('vertical');
						this.style.top = (containerHeight - imageHeight) / 2 + 'px';
						this.style.left = 'auto';
					}
				});
			};

			$(w).on({
				load: function() {
					imageResize();
					imageResize();

					if ( !opts.showOrder ) {
						images.eq(0).animate({ opacity: 1 }, opts.fadeSpeed, function() {
							container.css({'background-image': 'none'});
						});
					}

					if ( $('.ms-item').length ) {
						$('.ms-item').first().fadeIn();
					}
				},
				resize: function() {
					imageResize();
				}
			});
		});
	};

	var sSliderSpeed = $.support.opacity ? 900 : 0;
	var sSliderSpeedHide = $.support.opacity ? 100 : 0;

	$.fn.sSlider1 = function( prefix, options ) {

		var opts = $.extend({
			item: prefix + '-item',
			controls: prefix + '-controls',
			leftScroll: prefix + '-left',
			rightScroll: prefix + '-right',
			controlTag: 'li',
			scrollSpeed: 500,
			viewport: 1,
			autoScrollTime: null
		}, options);

		return this.each( function() {

			var slides = $(this).find(opts.item),
				sliderControls = $(opts.controls),
				slidesAmount = slides.length,
				controlsAmount,
				defSize = 0,
				nextSlide = 0,
				me,
				animation = {},
				excessiveSlides = slidesAmount % opts.viewport;

			if ( slidesAmount <= opts.viewport ) return false;

			defSize = slides.eq(0).outerWidth(true);
			sliderControls.empty();

			controlsAmount = Math.ceil(slidesAmount / opts.viewport);

			for ( var i = 0; i < controlsAmount; i++ ) {
				sliderControls.append( '<' + opts.controlTag + '>' + (i + 1) + '</' + opts.controlTag + '>' );
			}

			// sliderControls.width( function() {
			// 	return $(this).children().outerWidth(true) * controlsAmount;
			// });

			var sliderMove = function() {
				if ( opts.autoScrollTime ) {
					clearInterval( g.sSlider.scrollTimer );
					g.sSlider.scrollTimer = setInterval( scrollToNext, opts.autoScrollTime + opts.scrollSpeed );
				}

				sliderControls.children().removeClass('active').eq(nextSlide).addClass('active');

				slides.eq(nextSlide).fadeIn(sSliderSpeed).siblings(opts.item).fadeOut(sSliderSpeedHide);
				g.bgImages.eq(nextSlide).animate({ opacity: 1 }, sSliderSpeed).siblings().animate({ opacity: 0 }, sSliderSpeedHide);
			};

			var scrollToNext = function() {
				sliderControls.children()[nextSlide + 1] ? nextSlide++ : nextSlide = 0;
				sliderMove();
			};

			$(opts.leftScroll).off().on( 'click', function() {
				sliderControls.children()[nextSlide - 1] ? nextSlide-- : nextSlide = controlsAmount - 1;
				sliderMove();
			});

			$(opts.rightScroll).off().on( 'click', function() {
				scrollToNext();
			});

			sliderControls.off().on( 'click', opts.controlTag, function() {

				me = $(this);
				if ( me.hasClass('active') ) {
					return false;
				}
				nextSlide = me.index();
				sliderMove();
			});

			if ( opts.autoScrollTime ) {
				g.sSlider.scrollTimer = setInterval( scrollToNext, opts.autoScrollTime );
			}

			sliderControls.children().eq(0).addClass('active');
		});
	};

	$.fn.sSlider = function( prefix, options ) {
 
                var opts = $.extend({
                        item: prefix + '-item',
                        controls: prefix + '-controls',
                        leftScroll: prefix + '-left',
                        rightScroll: prefix + '-right',
                        controlTag: 'li',
                        scrollSpeed: 500,
                        viewport: 1,
                        autoScrollTime: null,
                        hoverPause: false
                }, options);
 
                return this.each( function() {
 
                        var $container = $(this),
                                slides = $container.find(opts.item),
                                sliderControls = $(opts.controls),
                                slidesAmount = slides.length,
                                controlsAmount,
                                defSize = 0,
                                nextSlide = 0,
                                me,
                                animation = {},
                                excessiveSlides = slidesAmount % opts.viewport;
 
                        if ( slidesAmount <= opts.viewport ) return false;
 
                        defSize = slides.eq(0).outerWidth(true);
                        sliderControls.empty();
 
                        controlsAmount = Math.ceil(slidesAmount / opts.viewport);
 
                        for ( var i = 0; i < controlsAmount; i++ ) {
                                sliderControls.append( '<' + opts.controlTag + '>' + (i + 1) + '</' + opts.controlTag + '>' );
                        }
 
                        // sliderControls.width( function() {
                        //      return $(this).children().outerWidth(true) * controlsAmount;
                        // });
 
                        var sliderMove = function(isClicked) {
                                if ( opts.autoScrollTime && !isClicked ) {
                                        clearInterval( g.sSlider.scrollTimer );
                                        g.sSlider.scrollTimer = setInterval( scrollToNext, opts.autoScrollTime + opts.scrollSpeed );
                                }
 
                                sliderControls.children().removeClass('active').eq(nextSlide).addClass('active');
 
                                slides.eq(nextSlide).fadeIn(sSliderSpeed).siblings(opts.item).fadeOut(sSliderSpeedHide);
                                g.bgImages.eq(nextSlide).animate({ opacity: 1 }, sSliderSpeed).siblings().animate({ opacity: 0 }, sSliderSpeed);
 
                        };
 
                        var scrollToNext = function(isClicked) {
                                sliderControls.children()[nextSlide + 1] ? nextSlide++ : nextSlide = 0;
                                sliderMove(isClicked);
                        };
 
                        $(opts.leftScroll).off().on( 'click', function(e) {
                                var isClicked = e.originalEvent !== undefined;
                                sliderControls.children()[nextSlide - 1] ? nextSlide-- : nextSlide = controlsAmount - 1;
                                sliderMove(isClicked);
                        });
 
                        $(opts.rightScroll).off().on( 'click', function(e) {
                                var isClicked = e.originalEvent !== undefined;
                                scrollToNext(isClicked);
                        });
 
                        sliderControls.off().on( 'click', opts.controlTag, function(e) {
                                var isClicked = e.originalEvent !== undefined;
 
                                me = $(this);
                                if ( me.hasClass('active') ) {
                                        return false;
                                }
                                nextSlide = me.index();
                                sliderMove(isClicked);
                        });
 
                        $container
                                .on( 'mouseenter', function() {
                                        clearInterval( g.sSlider.scrollTimer );
                                })
                                .on( 'mouseleave', function() {
                                        g.sSlider.scrollTimer = setInterval( scrollToNext, opts.autoScrollTime );
                                });
 
                        if ( opts.autoScrollTime ) {
                                g.sSlider.scrollTimer = setInterval( scrollToNext, opts.autoScrollTime );
                        }
 
                        sliderControls.children().eq(0).addClass('active');
                });
        };

	/*$.fn.select = function( options ) {

		var opts = $.extend({
			animSpeed: 150
		}, options);

		return this.each( function() {

			var select = $(this),
				options = select.find('option'),
				optionList = $('<ul class="select-dropdown">'),
				selectAnchor = $('<div class="styled-selectbox">'),
				me;

			for (var i = 0; i < options.length; i++) {
				optionList.append('<li>' + options.eq(i).text() + '</li>')
			}

			select.after(
				selectAnchor.append('<em>' + options[0].innerHTML + '</em>')
							.append('<div class="select-button"><i></i></div>')
							.append(optionList)
			).hide();

			var anchorTitle = selectAnchor.children('em')[0],
				items = optionList.find('li');

			options.each( function() {
				if ( this.selected ) {
					anchorTitle.innerHTML = this.innerHTML;
					items.eq( $(this).index() ).addClass('active');
					return false;
				}
			});

			g.allSelects.push( selectAnchor );

			var collapse = function() {
				selectAnchor.removeClass('expanded');
				optionList.slideUp( opts.animSpeed );
			};

			selectAnchor.click( function(event) {

				event.stopPropagation();
				if ( $(this).hasClass('expanded') ) {
					collapse();
				} else {
					$(g.allSelects).each( function() {
						this.removeClass('expanded').find('.select-dropdown').slideUp( opts.animSpeed );
					});
					selectAnchor.addClass('expanded');
					optionList.slideDown( opts.animSpeed );
				}
			});

			optionList.click( function(event) {
				event.stopPropagation();
			});

			items.click( function() {
				me = $(this);

				if ( me.hasClass('active') ) {
					return false;
				} else {
					items.removeClass('active');
					me.addClass('active');
				}

				anchorTitle.innerHTML = this.innerHTML;
				options.removeAttr('selected');
				options.eq( me.index() ).attr('selected', true);
				select[0].selectedIndex = me.index();
				select.trigger('change');
				collapse();
			});

			$(document).on( 'click', function() {
				collapse();
			});
		});
	};*/
	$.fn.select = function( options ) {

		var opts = $.extend({
			animSpeed: 150,
			live: false
		}, options);

		return this.each( function() {

			var select = $(this),
				options = select.find('option'),
				optionList = $('<ul class="select-dropdown">'),
				selectAnchor = $('<div class="styled-selectbox">'),
				me;

			for (var i = 0; i < options.length; i++) {
				optionList.append('<li>' + options.eq(i).text() + '</li>')
			}

			select.after(
				selectAnchor.append('<em>' + options[0].innerHTML + '</em>')
							.append('<div class="select-button"><i></i></div>')
							.append(optionList)
			).hide();

			var anchorTitle = selectAnchor.children('em')[0],
				items = optionList.find('li');
			options.each( function() {
				if ( this.selected ) {
					anchorTitle.innerHTML = this.innerHTML;
					items.eq( $(this).index() ).addClass('active');
					return false;
				}
			});
			g.allSelects.push( selectAnchor );

			var collapse = function() {
				selectAnchor.removeClass('expanded');
				optionList.slideUp( opts.animSpeed );
			};

			selectAnchor.click( function(event) {

				event.stopPropagation();
				if ( $(this).hasClass('expanded') ) {
					collapse();
				} else {
					$(g.allSelects).each( function() {
						this.removeClass('expanded').find('.select-dropdown').slideUp( opts.animSpeed );
					});
					selectAnchor.addClass('expanded');
					optionList.slideDown( opts.animSpeed );
				}
			});

			optionList.click( function(event) {
				event.stopPropagation();
			});

			if ( opts.live ) {
				optionList.on('click', 'li', function() {
					me = $(this);

					if ( me.hasClass('active') ) {
						return false;
					} else {
						me.addClass('active').siblings().removeClass('active');
					}
					anchorTitle.innerHTML = this.innerHTML;
					options.removeAttr('selected');
					options.eq( me.index() ).attr('selected', true);
					select[0].selectedIndex = me.index();
					select.trigger('change');
					collapse();
				});
			} else {
				items.click( function() {
					me = $(this);

					if ( me.hasClass('active') ) {
						return false;
					} else {
						items.removeClass('active');
						me.addClass('active');
					}

					anchorTitle.innerHTML = this.innerHTML;
					options.removeAttr('selected');
					options.eq( me.index() ).attr('selected', true);
					select[0].selectedIndex = me.index();
					select.trigger('change');
					collapse();
				});
			}
			$(document).on( 'click', function() {
				collapse();
			});
		});
	};

	$.fn.tabs = function(element, options) {

		var opts = $.extend({
			toSide: true,
			offset: 0,
			fwSpeed: 0,
			bwSpeed: 0,
			emulateClick: false
		}, options);

		return this.each( function() {

			var tabs = $(this),
				itemsToSlide = $(element),
				tabItem = tabs.find('a'),
				curItem = tabs.find('.active').attr('href'),
				prevItem,
				nextItem,
				canClick = true;

			var slideback = function() {
				curItem = tabItem.filter('.active').attr('href');
				nextItem = itemsToSlide.filter(curItem);
				nextItem.show();

				if ( opts.toSide ) {
					nextItem.animate({ left: '-=' + opts.offset }, opts.bwSpeed, function() { canClick = true; });
				} else {
					nextItem.animate({ top: '-=' + opts.offset }, opts.bwSpeed, function() { canClick = true; });
				}

				nextItem.removeClass('faded');
			};

			tabItem.on('click', function(event) {

				event.preventDefault();

				if ( $(this).hasClass('active') || !canClick ) {
					return opts.returnValue;
				}

				canClick = false;
				tabItem.removeClass('active');
				$(this).addClass('active');

				prevItem = itemsToSlide.filter(curItem);
				prevItem.addClass('faded');

				if ( opts.toSide ) {
					prevItem.animate({ left: '+=' + opts.offset }, opts.fwSpeed, function() { prevItem.hide() });
				} else {
					prevItem.animate({ top: '+=' + opts.offset }, opts.fwSpeed, function() { prevItem.hide() });
				}

				setTimeout( slideback, opts.fwSpeed );
			});

			if ( !curItem ) {
				curItem = tabItem.first().attr('href');
				// if (opts.emulateClick) {
				// 	tabItem.first().click();
				// } else {
					tabItem.first().addClass('active');
				// }
				itemsToSlide.not(':first').css( opts.toSide ? 'left' : 'top', opts.offset ).hide().addClass('faded');
			} else {
				itemsToSlide.not(curItem).css( opts.toSide ? 'left' : 'top', opts.offset ).hide().addClass('faded');
			}
		});
	};

	$.fn.switchTabs = function(element, canUnselect, emulateClick, returnValue) {
		return this.each( function() {

			var container = $(this),
				tabs = container.find(element);

			container.on('click', element, function() {
				var me = $(this);
				if ( me.hasClass('active') && !canUnselect ) {
					return returnValue;
				} else if ( me.hasClass('active') ) {
					container.find(element).removeClass('active');
					return returnValue;
				}
				container.find(element).removeClass('active');
				me.addClass('active');
			});

			if ( !canUnselect && !tabs.filter('.active').length ) {
				if ( emulateClick ) {
					tabs.first().click();
				} else {
					tabs.first().addClass('active');
				}
			}

			if(tabs.filter('.active').length){
				tabs.filter('.active').removeClass("active").click();
			}

		});
	};



	$.fn.validate = function() {
		var button = this,
			valid = true,
			toValidate = button.parents('form').find('[required]'),
			validateFill = toValidate.filter('[type=text], [type=email], [type=password], [type=search], textarea'),
			validateEmail = toValidate.filter('[type=email]'),
			validateCheck = toValidate.filter('[type=checkbox]'),
			emailPattern = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/),
			fillError = lang.fillField,
			emailError = lang.wrongEmail;

		validateFill.each( function() {
			var me = $(this);
			if ( $.trim( this.value ).length < 1 ) {
				if ( !me.hasClass('invalid') ) {
					if ( !me.siblings().hasClass('input-error') ) me.after('<div class="input-error"><i></i>' + fillError + '</div>');
					me.addClass('invalid');
				}
				valid = false;
			}
		});

		validateEmail.each( function() {
			var me = $(this);
			if ( !emailPattern.test( this.value ) ) {
				if ( !me.hasClass('invalid') ) {
					if ( !me.siblings().hasClass('input-error') ) me.after('<div class="input-error"><i></i>' + emailError + '</div>');

					me.addClass('invalid');
				}
				valid = false;
			}
		});

		toValidate.keyup( function() {
			$(this).removeClass('invalid').siblings('.input-error').fadeOut(200, function() {
				$(this).remove();
			});
		});

		$('.input-error').click( function() {
			$(this).siblings('input').removeClass('invalid');
			$(this).remove();
		});

		return valid;
	};


	$('.ms-images').resizeBg();
	$('.resize-bg').resizeBg();
	$('.st-image').resizeBg({ showOrder: true });
	$('.tvi-image').resizeBg({ showOrder: true });
	$('.styled-select').select();
	$('.styled-select-live').select({ live: true });

	$('.validate').click( function() {
		return $(this).validate();
	});

	$('.hor-tabs').switchTabs('a');

	$('.cl-tabs').tabs('.clc-item', {
		toSide: true,
		offset: 20,
		fwSpeed: 300,
		bwSpeed: 80,
		emulateClick: true
	});

	if ( g.orderedImages[0] ) {

		$(w).load(function() {

			var j = 0,
				showNextImage,
				curImage;

			(showNextImage = function() {
				curImage = g.orderedImages[j];
				if ( curImage ) {
					$(g.orderedImages[j]).animate({opacity: 1}, 700);
					j++;
					setTimeout( showNextImage, 100 );
				}
			})();
		});
	}

	$('.ms-container').sSlider('.ms', {
		autoScrollTime: 3000,
		scrollSpeed: 600,
		hoverPause: true
	});

	var abSlides = $('.abs-item'),
		commentContainer = $('.ab-comment-container'),
		commentWrapper = $('.ab-comment-wrapper'),

		expandButton = $('.expand-comment'),
		activeSlide;

	$('.about-slider').newSlider('.abs', {
		fullSizeSlide: true,
		resizable: true
	}).on('startedMoving', function() {
		activeSlide = abSlides.eq(g.nextSlideNumber);
		commentWrapper.removeClass('no-restriction');
		commentContainer.text( activeSlide.find('.abi-comment-text').text() );
		if ( commentContainer.height() >= 60 ) {
			expandButton.show();
		} else {
			expandButton.hide();
		}
	});

	if ( $('.about-slider').length ) {
		commentContainer.text( abSlides.first().find('.abi-comment-text').text() );
		expandButton.click( function() {
			commentWrapper.addClass('no-restriction');
			expandButton.hide();
		});
	} else if ( $('.reviews-item').length ) {
		commentWrapper.each( function() {
			if ( $(this).find('.ab-comment-container').height() <= 80 ) {
				$(this).siblings('.expand-comment').hide();
			}
		});
		expandButton.click( function() {
			var me = $(this)
			me.toggleClass('collapse').siblings('.ab-comment-wrapper').toggleClass('no-restriction');
			if ( me.hasClass('collapse') ) {
				me.text('Свернуть');
			} else {
				setTimeout( function() { me.text(lang.expand); }, 400);
			}
		});
	}


	var oldBrowser = !$.support.opacity,
		expandClass = oldBrowser ? 'expand-nofx' : 'expand',
		footerLinks = $('.f-links'),
		fixateFooter,
		footerHeight = 0,
		footer = $('.footer'),
		wrapper = $('.wrapper'),
		push = $('.push'),
		body = $(document.body),
		collapseButton = $('.f-collapse-button');

	if ( localStorage.getItem('linksExpanded') === 'false' ) {
		footerLinks.hide();
		collapseButton.addClass(expandClass);
	}

	fixateFooter = function() {
		footerHeight = footer.height();
		wrapper.css('margin-bottom', -footerHeight);
		push.height(footerHeight);
	};

	$(w).load(fixateFooter);

	collapseButton.click( function() {
		var me = $(this);

		if ( me.hasClass(expandClass) ) {
			me.removeClass(expandClass);
			footerLinks.show();
			fixateFooter();
			body.animate({ scrollTop: $(document).height() - window.innerHeight }, 200 );

			localStorage.setItem('linksExpanded', 'true');
		} else {
			me.addClass(expandClass);
			footerLinks.hide();
			fixateFooter();

			localStorage.setItem('linksExpanded', 'false');
		}
	});

	$(w).resize( function() {
		fixateFooter();
	});

	$('.subscribe-input, .contacts-form, .order-form, .cm-search').find('[type=email], [type=text], [type=password], [type=search], textarea').on({
		focus: function() {
			$(this).parent().addClass('focused');
		},
		blur: function() {
			$(this).parent().removeClass('focused');
		}
	});

	$('.hl-input-field').find('input').on({
		focus: function() {
			$(this).parent().addClass('focused');
		},
		blur: function() {
			if ( !this.value ) $(this).parent().removeClass('focused');
		}
	});

	$('.subscribe-input, .input-wrap').click( function(event) {
		event.preventDefault();
		$(this).find('input').eq(0).focus();
	});

	$('.subscribe-submit').click( function(event) {
		event.stopPropagation();
	});

	$('.ip-slider').eSlider('.ip', {
		viewport: 5,
		autoTimer: 5000
	});

	/*$('.ip-slider').on('mouseenter', function() {
			clearInterval(autoScroll);
		});*/


	$('.in-slider').eSlider('.in', {
		moveSpeed: 100,
		horizontal: false,
		prevCtrl: '.in-up',
		nextCtrl: '.in-down',
		mouseScroll: true
	});

	$('.zs-container').eSlider('.zs', {
		moveSpeed: 100,
		viewport: 3,
		horizontal: false,
		prevCtrl: '.zs-up',
		nextCtrl: '.zs-down',
		mouseScroll: true
	});

	$('.ts-container').eSlider('.ts', {
		viewport: 'max',
		loop: false,
		step: 'half',
		// mouseScroll: true,
		resizable: true,
		noQueue: true
	});

	var imageContainer = $('.zs-image'),
		zoomSlides = $('.zs-item');

	$('.zs-ribbon').on('click', '.zs-item', function() {
		var me = $(this);
		if ( me.hasClass('active') ) return;
		zoomSlides.removeClass('active').filter('[data-slide-id=' + me.data('slide-id') + ']').addClass('active');
		imageContainer.empty();
		var img = new Image();
		var imageResize;
		img.onload = function() {
			imageContainer.append(img).resizeBg({ fadeSpeed: 200 });
			$(w).load();
		};
		img.src = me.data('big-image');
	}).find('.zs-item').not('.fake').first().click();

	var mobileSelect = $('.mobile-dropdown').add('.mdw-inner select'),
		fakeSelectValue = mobileSelect.siblings('.styled-selectbox').find('em');

	if ( mobileSelect[0] ) {
		fakeSelectValue.text( mobileSelect[0][0].innerHTML );

		mobileSelect.change( function() {
			var tabNumber = $(this.value).index();
			$('.cl-tabs').find('a').eq(tabNumber).click();
			fakeSelectValue.text( this[this.selectedIndex].innerHTML );
		});
	}


	var langBox = $('.language-box');

	$('.h-lang').click( function() {
		langBox.slideToggle(100);
		/*return false;*/
	}).find('b, ul a').click( function() {
		langBox.slideUp(100);
	});

	langBox.click( function(event) {
		event.stopPropagation();
	});


	var mobileMenu = $('.mobile-menu-wrapper'),
		mobileSearch = $('.mobile-search-wrapper'),
		mobileLogin = $('.mobile-login-wrapper'),
		mobileMenuButton = $('.hm-menu'),
		mobileSearchButton = $('.hm-search'),
		loginForm = $('.header-login'),
		loginButtons = $('.h-login-button1, .hm-login1'),
		overlay = $('.overlay'),
		overlayElements = overlay.children(),
		body = $(document.body);

	mobileMenuButton.on('click', function() {
		body.removeClass('ms-open');
		body.toggleClass('mm-open');
		loginForm.slideUp(200);
	});
	mobileMenu.find('b').on('click', function() {
		body.removeClass('mm-open');
	});

	mobileSearchButton.on('click', function() {
		body.removeClass('mm-open');
		body.toggleClass('ms-open');
		loginForm.slideUp(200);
	});
	mobileSearch.on('click', function() {
		body.removeClass('ms-open');
	});

	loginButtons.click( function() {
		loginForm.slideToggle(200);
		body.removeClass('ms-open');
		body.removeClass('mm-open');
	});
	loginForm.find('b').click( function() {
		loginForm.slideUp(200);
	});

	var overlayForm = $('.order-form'),
		overlayVideo = $('.video-container'),
		videoTitle = $('.vc-title'),
		videoDate = $('.vc-date'),
		videoText = $('.vc-text'),
		leftPart = $('.vc-left-part');

	overlayElements.hide();
	var overlayClose = function() {
		body.removeClass('show-overlay');
		setTimeout( function() {
			overlayElements.hide();
		}, 200);
	};
	$('.show-overlay').click( function() {
		body.addClass('show-overlay');
		// checkOverlaySpace();
	});
	$('.of-close, .vc-close').click( function() {
		overlayClose();
		document.getElementById('vc-video').src = null;
	});
	overlay.click( function() {
		overlayClose();
	});
	overlayElements.click( function(event) {
		event.stopPropagation();
	});


	var $document = $(document)/*,
		checkOverlaySpace = function() {
			if (overlayForm.height() + 40 > document.documentElement.clientHeight) {
				overlay.addClass('absolute')[0].style.height = $document.height() + 'px';
			} else {
				overlay.removeClass('absolute')[0].style.height = '';
			}
		}*/;

	// $(window).resize(checkOverlaySpace);


	$('.ms-container').on('click', '.slider-button', function() {
		overlayForm.show();
	});
	$('.hd-order').click( function() {
		overlayForm.show();
	});
	$('.sib-order').click( function() {
		overlayForm.show();
		return false;
	});



	var $page = $('body, html');

	$('.tv-container').on('click', '.tv-item', function() {
		var me  = $(this);
		me.addClass('active-video').siblings().removeClass('active-video');
		videoTitle.text( me.find('.tvi-title').text() );
		videoDate.text( me.find('.tvi-date').text() );
		videoText.text( me.find('.tvi-text').text() || lang.noDescription );
		document.getElementById('vc-video').src = 'http://www.youtube.com/embed/' + me.data('youtube-id');
		overlayVideo.show();
		// $page.animate({scrollTop: 0}, 300);
	});
	var nextVideo;
	var changeVideo = function() {
		leftPart.finish().fadeOut(200, function() {
			nextVideo.click();
			leftPart.fadeIn(200);
		});
	};
	$('.vc-left').click( function() {
		nextVideo = $('.active-video');
		if (nextVideo.prev().length) {
			nextVideo = nextVideo.prev();
		} else {
			nextVideo = nextVideo.siblings().last();
		}
		changeVideo();
	});
	$('.vc-right').click( function() {
		nextVideo = $('.active-video');
		if (nextVideo.next().length) {
			nextVideo = nextVideo.next();
		} else {
			nextVideo = nextVideo.siblings().first();
		}
		changeVideo();
	});

	var closePoint = $('.mm-end-marker').offset().top;

	$(w).scroll( function() {
		if ( $(w).scrollTop() > closePoint ) {
			body.removeClass('mm-open');
		}
	});


	// --- about map ---

	var cities = $('.about-map').find('b').not('.planned'),
		mapDescription = $('.am-address'),
		mapText = $('.ama-text');

	cities.on({
		mouseenter: function() {
			mapDescription.addClass('visible');
			mapText.html( $(this).data('address') );
		},
		mouseleave: function() {
			mapDescription.removeClass('visible');
		}
	});

	// --- jobs ---


	$('.jobs-title').click(function(){
		var me = $(this).parent();
		me.siblings().removeClass('expanded').find('.jobs-inner').slideUp(300);
		me.toggleClass('expanded').find('.jobs-inner').slideToggle(300);
	});

	var fileInput = $('.jf-file'),
		fileInputButton = $('.jf-button'),
		fileInputText = $('.jf-text');

	fileInputButton.click( function() {
		$(this).siblings(fileInput).click();
	});

	fileInput.on('change', function() {
		var fileName = this.value;
		if ( ~fileName.indexOf('fakepath') ) {
			fileName = fileName.substr(fileName.lastIndexOf('\\') + 1);
		}
		$(this).siblings('.jf-text').text( fileName );
	});

	// --- map ---

	if ( document.getElementById('g-map') ) {

		var	point = new google.maps.LatLng(55.90871495790008, 37.77853091754913),
			marker,
			mapIcon = '/bitrix/templates/rus/images/logo_map.png',
			pos,
			point;

		g.map = new google.maps.Map(document.getElementById('g-map'), {
			zoom: 13,
			center: point,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL
			},
			panControl: false
		});

		var setMarker = function(coords, mTitle) {
			if (marker) marker.setMap(null);

			pos = $.trim(coords).split(/\s*,\s*/);
			point = new google.maps.LatLng(pos[0], pos[1]);

			marker = new google.maps.Marker({
				position: point,
				map: g.map,
				icon: mapIcon,
				title: 'HRS ' + mTitle
			});

			g.map.panTo(point);
		};

		$('.cl-tabs').on('click', 'a', function() {
			var me = $(this);
			var pointName = me.html();
			pointName = pointName.substr(pointName, pointName.indexOf('<'))
			setMarker( me.data('google-coord'), pointName );
			$('#form-city').val(pointName);
		});
		//.find('a:first').click();
	}

	if ( document.getElementById('gc-map') ) {

		g.map = new google.maps.Map(document.getElementById('gc-map'), {
			zoom: 5,
			center: new google.maps.LatLng(54.526811997673164, 57.855015597724915),
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL
			},
			panControl: false
		});
		window.map=g.map;

		var markers = {
				'hotel': '/bitrix/templates/rus/images/marker_orange.png',
				'restaurant': '/bitrix/templates/rus/images/marker_blue.png',
				'stadium': '/bitrix/templates/rus/images/marker_green.png',
				'retail': '/bitrix/templates/rus/images/marker_red.png',
				'cruise': '/bitrix/templates/rus/images/marker_purple.png',
				'warehouse': '/bitrix/templates/rus/images/marker_gray.png'
			},
			clusters = [
				{
					url: '/bitrix/templates/rus/images/sprite.png',
					height: 45,
					width: 45,
					textColor: 'white',
					textSize: 18,
					backgroundPosition: '-142px -497px',
					fontWeight: 'normal',
					fontFamily: 'PT Sans Narrow, PT Sans'
				}, {
					url: '/bitrix/templates/rus/images/sprite.png',
					height: 63,
					width: 63,
					textColor: 'white',
					textSize: 20,
					backgroundPosition: '-79px -497px',
					fontWeight: 'normal',
					fontFamily: 'PT Sans Narrow, PT Sans'
				}, {
					url: '/bitrix/templates/rus/images/sprite.png',
					width: 79,
					height: 79,
					textColor: 'white',
					textSize: 22,
					backgroundPosition: '0 -497px',
					fontWeight: 'normal',
					fontFamily: 'PT Sans Narrow, PT Sans'
				}
			],
			infoWindow,
			markerClusterer,
			places,
			pos,
			placesList = $('.places-list'),
			placesListWrap = $('.places-list-wrap'),
			placesTabs = $('.places-tabs'),
			typesTable = $('.cc-table'),
			addressList = $('.address-list'),
			addressListWrap = $('.address-list-wrap'),
			addressListHeader = $('.address-list-header'),
			placesContainer = $('.clients-places'),
			filterCountryList = $('.cm-country').find('.select-dropdown'),
			filterCityList = $('.cm-city').find('.select-dropdown'),
			filterTypeList = $('.cm-type').find('.select-dropdown'),
			filterCountryTitle = $('.cm-country').find('.select-dropdown').siblings('em'),
			filterCityTitle = $('.cm-city').find('.select-dropdown').siblings('em'),
			filterTypeTitle = $('.cm-type').find('.select-dropdown').siblings('em'),
			typeTab,
			cityTab,
			placesTab,
			allMarkers = [],
			allWindows = [],
			cityArray = [],
			cityCoordsArray = [],
			uniqueCoords = [],
			citiesWithCoords = [],
			cityString = '',
			zoomCorrection = [33.77913, 29.78793, 22.18377, 11.21927, 7.07763, 3.93279, 1.97241, 1.01721, 0.52115, 0.25374, 0.12862, 0.06397, 0.02986, 0.01716, 0.00819, 0.00407, 0.002, 0.00102, 0.00049, 0.00025, 0.00013, 0.00006];

		g.placesData = [];

		var closeInfoWindows = function() {
			for ( var i in allWindows ) {
				allWindows[i].setMap(null);
			}
			g.infoWindow.setMap(null);
		};
		g.closeInfoWindows=closeInfoWindows;

		var	infoWindow = new InfoBubble({
			content: '<div class="bubble-wrapper"><div class="bubble-header"><span>' + 'this.title' + '</span><b class="bubble-close"><i></i></b></div><div class="bubble-content">' + 'this.html' + '</div></div>',
			padding: 0,
			borderRadius: 5,
			arrowSize: 10,
			borderWidth: 0,
			disableAutoPan: true,
			backgroundClassName: 'map-bubble',
			hideCloseButton: true
		});
		g.infoWindow = infoWindow;
		allWindows.push(infoWindow);

		
		var infoEvent = function(){
			closeInfoWindows();
			var $this=this;
			$.post(g.lang.jsonURL+"/about/client/client.php",{
				"IBLOCK_ID": this.iblock_id,
				"ID": this.element_id,
			},function(data){
				infoWindow.setContent(data);
				infoWindow.open(g.map, $this);
				g.map.panTo( new google.maps.LatLng($this.position.lat() + zoomCorrection[g.map.getZoom()], $this.position.lng()) );
				setTimeout( function() {
					var bubble = $('.map-bubble');
					bubble.mouseup( function() {
						$(w).trigger('mouseup');
					});
					bubble.find('.bubble-close').click( function() {
						g.closeInfoWindows();
					});
				}, 500);
			});
			
		};

		var parseMarkers = function(data) {
			if (allMarkers.length) {
				for ( var i in allMarkers ) {
					allMarkers[i].setMap(null);
				}
				markerClusterer.clearMarkers();
				closeInfoWindows();
				allMarkers = [];
				allWindows = [];
			}
			$(data).each( function() {
				if( !this.latLng ) return;
				pos = this.latLng.split(/\s*,\s*/);

				var marker = new google.maps.Marker({
					position: new google.maps.LatLng(pos[0], pos[1]),
					map: g.map,
					icon: markers[this.type],
					title: this.title,
					element_id: this.ID,
					iblock_id: this.IBLOCK_ID
				});

				allMarkers.push(marker);

				google.maps.event.addListener(marker, 'click', infoEvent );

				/*var	infoWindow = new InfoBubble({
					content: '<div class="bubble-wrapper"><div class="bubble-header"><span>' + this.title + '</span><b class="bubble-close"><i></i></b></div><div class="bubble-content">' + this.html + '</div></div>',
					padding: 0,
					borderRadius: 5,
					arrowSize: 10,
					borderWidth: 0,
					disableAutoPan: true,
					backgroundClassName: 'map-bubble',
					hideCloseButton: true
				});

				allWindows.push(infoWindow);

				google.maps.event.addListener(marker, 'click', function() {
					closeInfoWindows();
					infoWindow.open(g.map, marker);
					g.map.panTo( new google.maps.LatLng(this.position.lat() + zoomCorrection[g.map.getZoom()], this.position.lng()) );
					setTimeout( function() {
						var bubble = $('.map-bubble');
						bubble.mouseup( function() {
							$(w).trigger('mouseup');
						});
						bubble.find('.bubble-close').click( function() {
							closeInfoWindows();
						});
					}, 200);
				});
				*/

			});

			markerClusterer = new MarkerClusterer(g.map, allMarkers, {
				gridSize: 60,
				maxZoom: 10,
				styles: clusters
			});
		};

		var	initialArray,
			sortedByType,
			resultArray,
			typeName,
			cityName,
			newString;

		var filterAddresses = function(printCities) {
			typeTab = typesTable.find('.active');
			cityTab = placesList.find('.active');
			placesTab = placesTabs.find('.active');

			initialArray = g.placesData;
			sortedByType = [];
			resultArray = [];
			typeName;
			cityName;
			newString = '';

			if ( typeTab.length ) {
				typeName = typeTab.data('type');
				for ( var i in initialArray ) {
					if ( initialArray[i]['type'] === typeName ) {
						sortedByType.push(initialArray[i]);
					}
				}
			} else {
				sortedByType = initialArray;
			}

			if ( cityTab.length ) {
				cityName = cityTab.text();
				for ( var i in sortedByType )  {
					if ( sortedByType[i]['city'] === cityName ) {
						resultArray.push(sortedByType[i]);
					}
				}
			} else {
				resultArray = sortedByType;
			}


			if ( printCities ) {
				placesListWrap.addClass('hidden');
				setTimeout( function() {
					placesListWrap.hide();
				}, 300);
				addressList.empty();
				addressListWrap.delay(300).slideDown(300);
				addressListHeader.text( cityTab.length ? cityTab.text() : placesTab.text() );

				if ( resultArray.length ) {
					for ( var i in resultArray ) {
						newString += '<li data-lat-lng="' + resultArray[i]['latLng'] + '"><span>' + resultArray[i]['title'] + '<span></li>';
					}
				} else {
					newString = '<p>' + lang.noCities + '.</p>'
				}
				addressList.append(newString);
			}

			parseMarkers(resultArray);
		};


		var closeAddressList = function() {
			addressListWrap.slideUp(200);
			setTimeout( function() {
				placesListWrap.show();
				setTimeout( function() {
					placesListWrap.removeClass('hidden');
				}, 20);
			}, 200);
			filterCityList.find('li:first').addClass('active').siblings().removeClass('active');
			filterCityTitle.text(lang.allCities);
		};

		$('#gc-map').on('click', '.bubble-close', function() {
			closeInfoWindows();
		});

		typesTable.switchTabs('td', true).on('click', 'td', function() {
			filterAddresses(true);
			if ( $(this).hasClass('active') ) {
				filterTypeList.find('li:contains(' + $(this).text() + ')').addClass('active').siblings().removeClass('active');
				filterTypeTitle.text( $(this).text() );
			} else {
				filterTypeList.find('li:first').addClass('active').siblings().removeClass('active');
				filterTypeTitle.text(lang.allTypes);
			}

		});


		placesList.switchTabs('li').on('click', 'li', function() {
			filterAddresses(true);
			filterCityList.find('li:contains(' + $(this).text() + ')').addClass('active').siblings().removeClass('active');
			filterCityTitle.text( $(this).text() );

			var me = $(this);
			if ( me.data('lat-lng') ) {
				var pos = $.trim( me.data('lat-lng') ).split(/\s*,\s*/);
				if (pos.length !== 2) return;
				g.map.panTo( new google.maps.LatLng(pos[0], pos[1]) );
				g.map.setZoom(10);
			}
		});

		placesTabs.on('click', 'li', function() {
			var me = $(this);

			var moveToCountry = function() {
				if ( me.data('lat-lng') ) {
					var pos = $.trim( me.data('lat-lng') ).split(/\s*,\s*/);
					if (pos.length !== 2) return;
					g.map.panTo( new google.maps.LatLng(pos[0], pos[1]) );
				}
				if ( me.data('zoom') ) g.map.setZoom( me.data('zoom') );
			};

			if (me.hasClass('active') ) {
				placesList.empty().append(cityString);

				filterCityList.empty().append('<li class="active"><span>' + lang.allCities + '</span></li>' + cityString);
				filterCityTitle.text(lang.allCities);

				filterAddresses();
				closeAddressList();
				moveToCountry();
				return;
			}

			placesContainer.addClass('loading');

			$.ajax({
				url: lang.jsonURL + '/about/client/json.php?country=' + me.data('country-id'),
				success: function(data, status, XHR) {
					// console.log('AJAX ' + status + '. XHR status: ' + XHR.status + ' ' + XHR.statusText + '.');
					moveToCountry();
					closeAddressList();
					g.placesData = data;
					cityArray = [];
					cityCoordsArray = [];
					citiesWithCoords = [];
					cityString = '';
					for ( var i in g.placesData ) {
						cityArray.push(g.placesData[i]['city']);
						cityCoordsArray.push(g.placesData[i]['city_lnglat']);
						citiesWithCoords[g.placesData[i]['city']]=g.placesData[i]['city_lnglat'];
					}
					cityArray = $(cityArray).unique();

					for ( var i in cityArray ) {
						cityString += '<li data-lat-lng="' + citiesWithCoords[cityArray[i]] + '"><span>' + cityArray[i] + '</span></li>';
					}

					filterCityList.empty().append('<li class="active"><span>' + lang.allCities + '</span></li>' + cityString);
					filterCityTitle.text(lang.allCities);

					placesList.empty().append(cityString);
					filterAddresses();
				},
				error: function(XHR, status, errorThrown) {
					// console.log('AJAX ' + status + '. XHR status: ' + XHR.status + ' ' + XHR.statusText + '. ErrorThrown: ' + errorThrown.toString() );
					closeAddressList();
					placesList.empty().append('<p>' + lang.notFound + '.</p>');
					g.placesData = [];
				},
				complete: function() {
					placesContainer.removeClass('loading');
				}
			});


			filterCountryList.find('li:contains(' + this.innerHTML + ')').addClass('active').siblings().removeClass('active');
			filterCountryTitle.text(this.innerHTML);

		}).switchTabs('li', false, true);

		var $map = $('.clients-map'),
			$page = $('body, html');

		$('.address-list').on('click', 'li', function() {
			var pos = $.trim( $(this).data('lat-lng') ).split(/\s*,\s*/);
			if (pos.length !== 2) return;
			g.map.setZoom(13);
			g.map.panTo( new google.maps.LatLng(parseFloat(pos[0]) + zoomCorrection[g.map.getZoom()], pos[1]) );

			/*filterCityList.find('li:contains(' + this.innerHTML + ')').addClass('active').siblings().removeClass('active');
			filterCityTitle.text(this.innerHTML);*/
			google.maps.event.trigger(allMarkers[ $(this).index() ], 'click');
			$page.animate({scrollTop: $map.offset().top}, 200);
		});

		$('.al-close').click( function() {
			closeAddressList();
			cityTab.removeClass('active');
		});

		filterCountryList.on('click', 'li', function() {
			placesTabs.find('li:contains(' + $(this).text() + ')').click();
		});

		filterCityList.on('click', 'li', function() {
			var me = placesList.find('li:contains(' + $(this).text() + ')');
			if ( me.length ) {
				me.click();
			} else {
				placesTabs.find('.active').click();
			}
		});

		filterTypeList.on('click', 'li', function() {
			var me = typesTable.find('td:contains(' + $(this).text() + ')');
			if ( me.length ) {
				me.click();
			} else {
				typesTable.find('.active').click();
			}
		});

		//placesTabs.find('.active').trigger("click");

		var resultsList = $('.cm-search-results');

		var closeResults = function() {
			resultsList.hide().empty();
		};

		$('#cm-search').on({
			'keyup reset focus': function() {
				var query = this.value,
					string = '';

				closeResults();
				if (!query) return;
				for (var i in resultArray) {
					if ( ~resultArray[i]['title'].toLowerCase().indexOf( query.toLowerCase() ) ) {
						string += '<li data-lat-lng="' + resultArray[i]['latLng'] + '">' + resultArray[i]['title'] + '</li>';
					}
				}
				if (string) {
					resultsList.show().append(string);
				}
			}
		});

		$(document).click( function() {
			closeResults();
		});

		$('.cm-search').click( function(event) {
			event.stopPropagation();
		});

		$('.cm-search-results').on('click', 'li', function() {
			var pos = $.trim( $(this).data('lat-lng') ).split(/\s*,\s*/);
			if (pos.length !== 2) return;
			g.map.setZoom(13);
			g.map.panTo( new google.maps.LatLng(parseFloat(pos[0]) + zoomCorrection[g.map.getZoom()], pos[1]) );
			closeResults();
		});

		var $filter = $('.cm-filter-wrap'),
			filter = $filter[0],
			curY,
			pressedY,
			prevY,
			delta = 0,
			dragging = false;

		$('.cm-resizer').on({
			mousedown: function(event) {
				event.preventDefault();
				dragging = true;
				prevY = $filter.position().top;
				$filter.addClass('no-transition');
				pressedY = event.pageY;
				delta = 0;
				$(w).on({
					'mousemove.draggable': function(event) {
						delta = event.pageY - pressedY;
						if (!$filter.hasClass('hidden') && delta > 40) return false;
						filter.style.marginTop = -prevY + delta + 'px';
					},
					'mouseup.draggable': function() {
						$(w).off('.draggable');
						$filter.removeClass('no-transition');
						filter.style.marginTop = null;
						if (delta === 0) {
							$filter.toggleClass('hidden');
							return;
						}
						if (delta < -100) {
							$filter.addClass('hidden');
						} else {
							$filter.removeClass('hidden');
						}
					}
				});
			}
		});
	}

	var applyForm = $('.vacancies-form');

	$('.jobs-line').on('click', '.apply-button', function(event) {
		event.preventDefault();
		$('.apply-button').show();
		$(this).hide();
		applyForm.removeClass('dn').appendTo( $(this).parents('.jobs-line') );
	});


	var vacancyCity = document.getElementById('city-select'),
		cityForm = document.getElementById('city-form');

	if (vacancyCity) {
		vacancyCity.onchange = function() {
			cityForm.submit();
		};
	}


	$('.jlc-refresh').click( function(event) {
		var random = event.timeStamp;
		$('.jlc-image').find('.captcha-sid').val(random);
		$('.jlc-image').find('.captcha-img')[0].src = '/bitrix/tools/captcha.php?captcha_sid=' + random;
	});




	var dudes = $('.ts-item').find('a'),
		teamWrapper = $('.team-wrapper');

	dudes.first().addClass('active');

	dudes.click( function() {
		var me = $(this);
		if (me.hasClass('active')) return false;

		$.ajax({
			url: lang.jsonURL+'/about/team/ajax.php?id=' + me.data('team-id'),
			success: function(data, status, XHR) {
				// console.log('AJAX ' + status + '. XHR status: ' + XHR.status + ' ' + XHR.statusText + '.');
				dudes.removeClass('active');
				me.addClass('active');
				teamWrapper.html(data);
			},
			error: function(XHR, status, errorThrown) {
				// console.log('AJAX ' + status + '. XHR status: ' + XHR.status + ' ' + XHR.statusText + '. ErrorThrown: ' + errorThrown.toString() );
			}
		});
	});

	var orderButton = $('.hd-order'),
		alignElement = $('.hdd-text'),
		alignOrderButton;

	if ( alignElement[0] ) {
		(alignOrderButton = function() {
			orderButton.css('top', alignElement.offset().top);
		})();
		$(w).resize( function() {
			alignOrderButton();
		});
	}

	var floatingMenu = $('.floating-menu');

	if (floatingMenu.length) {
		var showLevel = $('.content').offset().top;

		$(w).scroll( function() {
			if (w.innerWidth < 768) return;
			if ($(this).scrollTop() > showLevel) {
				floatingMenu.fadeIn(200);
			} else {
				floatingMenu.fadeOut(200);
			}
		});

		$('.fm-login').click( function() {
			$(w).scrollTop(0);
			loginForm.slideDown(200);
		});
	}


	var productImage = $('.hd-image img')[0];

	var alignImage = function() {
		var $block1 = $('.hd-features'),
			$block2 = $('.hd-image');

		if ($block1.height() > $block2.height()) {
			$block2.css({
				marginTop: ($block1.height() - $block2.height()) / 2
			});
		}
	};

	if (productImage) {
		if (productImage.complete) {
			alignImage();
		} else {
			productImage.onload = alignImage;
		}

	}

	// --- social crap ---

	if ( $('.fb-like')[0] ) {
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		})(document, 'script', 'facebook-jssdk');
	}


	if ( $('.twitter-share-button')[0] ) {
		(function(d,s,id) {
			var js,fjs=d.getElementsByTagName(s)[0];
			if (!d.getElementById(id)) {
				js = d.createElement(s);
				js.id = id;
				js.src='//platform.twitter.com/widgets.js';
				fjs.parentNode.insertBefore(js, fjs);
			}
		})(document, 'script', 'twitter-wjs');
	}

	// --- bootstrap modals ---
	var modals = (function () {
		var dialogShowStartKlass = 'dialog-show-start',
			dialogShowEndKlass = 'dialog-show-end',
			dialogHideStartKlass = 'dialog-hide-start',
			dialogHideEndKlass = 'dialog-hide-end',
			backdropShowStartKlass = 'backdrop-show-start',
			backdropShowEndKlass = 'backdrop-show-end',
			backdropHideStartKlass = 'backdrop-hide-start',

			modalOpenKlass = 'modal-open',
			overflowKlass = 'modal_overflow',
			tempVisKlass = 'temporary-visible-offscreen',
			noTransitionKlass = 'notrs',
			autocloseKlass = 'modal_autoclose',
			$body = $('body'),
			$win = $(window),
			onShowTID,
			autocloseTID,
			autocloseDelay = 4000,

			dialogTransitionDuration = Modernizr.csstransitions ? parseFloat($('.modal-dialog').eq(0).css('transition-duration').split('s')[0], 10) * 1000 : 0,
			backdropTransitionDuration = Modernizr.csstransitions ? parseFloat($('.modal.fade').eq(0).css('transition-duration').split('s')[0], 10) * 1000 : 0;

		function watchTab (e, modal) {
			var $tabbable = $(':tabbable:first, :tabbable:last', modal),
				$tabbableSet,
				isSingle = false;

			if ($tabbable.length === 1) {
				$tabbableSet = $().add(modal).add($tabbable);
				isSingle = true;
			} else {
				$tabbableSet = $tabbable;
			}

			// if it's the first or last tabbable element, refocus
			if ((!e.shiftKey && e.target === $tabbableSet[$tabbableSet.length -1]) ||
				(e.shiftKey && e.target === $tabbableSet[0]) ||
				(isSingle && e.shiftKey && e.target === $tabbableSet[$tabbableSet.length -1]) ||
				$tabbableSet.length === 0) {

				e.preventDefault();
				if ($tabbableSet.length === 0 || (isSingle && e.shiftKey && e.target === $tabbableSet[$tabbableSet.length -1])) {
					modal.focus();
				} else {
					var pos = e.shiftKey ? 'last' : 'first';
					$tabbableSet[pos]().focus();
				}
			}
		}
		function handleScreenOverflow($modal) {
			var $dialog = $modal.find('.modal-dialog'),
				$content = $dialog.find('.modal-content'),
				winH = __isiOS ? getIOSWindowHeight() - (defaultIOSToolbarsHeight - getHeightOfIOSToolbars()) : $win.height();

			if ($content.outerHeight(true) >= winH) {
				if (!$body.hasClass(overflowKlass)) {
					$dialog.addClass(noTransitionKlass);
					$body.addClass(overflowKlass);
					setTimeout(function () {
						$dialog.removeClass(noTransitionKlass);
					}, 30);
				}
			} else if ($body.hasClass(overflowKlass)) {
				$dialog.addClass(noTransitionKlass);
				$body.removeClass(overflowKlass);
				setTimeout(function () {
					$dialog.removeClass(noTransitionKlass);
				}, 30);
			}
		}
		function launchModal($modal) {
			$modal.addClass(tempVisKlass);
			handleScreenOverflow($modal);
			$modal.removeClass(tempVisKlass);
			/*show toolbars*/
			$modal.modal('show');
		}

		$(document)
			.on('show.bs.modal', '.modal', function (e) {
				var $modal = $(this);
				$body.addClass(backdropShowStartKlass);

				console.log($modal[0].offsetHeight);

				if (Modernizr.touch) {
					$modal.data('scroll-top', $win.scrollTop());
				}
				onShowTID = setTimeout(function () {
					$body.addClass(dialogShowStartKlass + ' ' + backdropShowEndKlass);
					if (Modernizr.touch) {
						$win.scrollTop(0);
					}
				}, Modernizr.csstransitions ? backdropTransitionDuration : 0);
			})
			.on('shown.bs.modal', '.modal', function (e) {
				var $modal = $(this);

				if ($modal.is(':visible') && onShowTID) {
					$body.addClass(dialogShowEndKlass);
					if ($modal.hasClass(autocloseKlass)) {
						autocloseTID = setTimeout(function () {
							$modal.modal('hide');
						}, autocloseDelay);
					}
				}
			})
			.on('hide.bs.modal', '.modal', function (e) {
				var originalScrollTop;


				clearTimeout(onShowTID);
				onShowTID = false;
				if ($(e.target).hasClass(autocloseKlass)) {
					clearTimeout(autocloseTID);
				}
				if (Modernizr.touch) {
					originalScrollTop = $(this).data('scroll-top');
				}

				$body
					.addClass(dialogHideStartKlass)
					.removeClass(
					dialogShowStartKlass + ' ' +
					dialogShowEndKlass
				);
				setTimeout(function () {
					$body.addClass(dialogHideEndKlass);
					setTimeout(function () {
						$body
							.removeClass(
							backdropShowStartKlass + ' ' +
							backdropShowEndKlass
						)
							.addClass(backdropHideStartKlass);

						if (Modernizr.touch) {
							$win.scrollTop(originalScrollTop);
						}
					}, 0);
				}, Modernizr.csstransitions ? dialogTransitionDuration / 2 : 0);
			})
			.on('hidden.bs.modal', '.modal', function (e) {
				$body.removeClass(backdropHideStartKlass + ' ' + dialogHideEndKlass + ' ' + dialogHideStartKlass);
			})

			/*handle screen overflow on modal content update*/
			.on('content-update', '.modal', function (e) {
				handleScreenOverflow($(this));
			})

			/*handle tabbing through :tabbable fields inside modal*/
			.on('keydown.bs.modal', '.modal', function (e) {
				if (e.keyCode === 9) { // TAB
					watchTab(e, this);
				}
			});

		$(window)
			.on('resize orientationchange', $.throttle( 250, function(){
				handleScreenOverflow($('.modal.in'));
			}));

		return {
			launchModal: launchModal,
			handleScreenOverflow: handleScreenOverflow
		}
	}());


	// --- region ---
	;(function () {
		var	$regionLabel = $('.h-region'),
			$regionTrigger = $regionLabel.find('.h-region__trigger'),
			$regionModal = $('.region-modal'),
			subRegionKlass = 'region_sub',
			activeRegionKlass = 'region_active',
			regionModalRUClass = 'region-modal_ru';

		function updateHandlerText($clickedRegion,$isAJAX) {
			var parentRegionName = false,
				regionName = $clickedRegion.text();

			if ($clickedRegion.hasClass(subRegionKlass)) {
				parentRegionName = $clickedRegion.data('region');
			}
			var $uid=$clickedRegion.data('uid');
			/*change handler text on region click*/
			var $itog=(parentRegionName ? parentRegionName + ', ' : '') + regionName;
			$regionTrigger.text($itog);

			if($isAJAX){
				$.ajax({
					method: "POST",
					dataType: "HTML",
					url: "/bitrix/templates/rus/ajax/set-region.php",
					data:{
						"region":$itog,
						"uid":$uid,
						"lang":$("BODY").data("lang")
					},
					success: function(data){
						console.log(data);
						$("#ajax-area").html(data);
					},
					error:function(){
						console.error("set region ajax error");
					}
				});
			}
		}
		window.updateHandlerText = updateHandlerText;

		$(document)
			.on('hide.bs.modal', '.region-modal', function (e) {
				/*modal hiding*/
			})
			.on('click', '.region', function (e) {
				var $clickedRegion = $(this),
					$moscowRegion;

				e.preventDefault();

				$regionModal.find('.' + activeRegionKlass).removeClass(activeRegionKlass);

				if ($clickedRegion.hasClass('region-modal__switch_ru')) {
					$moscowRegion = $regionModal.find('.region_sub.ru__mark_msk');
					$moscowRegion.addClass(activeRegionKlass);
					updateHandlerText($moscowRegion);
					return;
				}
				updateHandlerText($clickedRegion,1);

				/*close region modal*/
				$regionModal.modal('hide');
				$clickedRegion.addClass(activeRegionKlass);
			})
			/*bind region modal*/
			.on('click', '.h-region__trigger', function (e) {
				e.preventDefault();
				modals.launchModal($regionModal)
			})
			.on('click', '.region-modal__switch', function (e) {
				$regionModal.toggleClass(regionModalRUClass, !$(this).hasClass('region-modal__switch_other'));
			});
	}());


})(jQuery, this);