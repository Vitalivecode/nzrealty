(function ($) {
	"use strict";
	var $body = $('body'),
		$window = $(window),
		$siteWrapper = $('#site-wrapper'),
		$document = $(document);
	var APP = {
		init: function () {
			this.narbarDropdownOnHover();
			this.showUISlider();
			this.activeSidebarMenu();
			this.reInitWhenTabShow();
			this.processingStepAddProperty();
			this.enablePopovers();
			this.enableDatepicker();
			this.initToast();
			this.processTestimonials();
			this.scrollSpyLanding();
			this.parallaxImag();
			this.dropdownMenuMobile();
		},
		isMobile: function () {
			return window.matchMedia('(max-width: 1199px)').matches;
		},
		narbarDropdownOnHover: function () {
			var $dropdown = $('.main-header .hover-menu .dropdown');
			if ($dropdown.length < 1) {
				return;
			}
			$dropdown.on('mouseenter', function () {
				if (APP.isMobile()) {
					return;
				}
				var $this = $(this);
				$this.addClass('show')
					.find(' > .dropdown-menu').addClass('show');
			});
			$dropdown.on('mouseleave', function () {
				if (APP.isMobile()) {
					return;
				}
				var $this = $(this);
				$this.removeClass('show')
					.find(' > .dropdown-menu').removeClass('show');
			});
		},
		dropdownMenuMobile: function () {
			$(".main-header .dropdown-menu [data-toggle='dropdown']").on("click", function (event) {
				if (APP.isMobile()) {
					event.preventDefault();
					event.stopPropagation();
					event.stopImmediatePropagation();
					var that = this;
					$(that).next().toggleClass("show");
					$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
						$(that).next().removeClass("show");
					});
				}

			});

		},
		showUISlider: function () {
			var defaultOption = {
				range: true,
				min: 0,
				max: 10000,
				values: [0, 2000],
			};
			var $slider = $('[data-slider="true"]');
			$slider.each(function () {
				var $this = $(this);
				var format = new Intl.NumberFormat('en-US', {
					style: 'currency',
					currency: 'USD',
					minimumFractionDigits: 0,
				});
				var options = $this.data('slider-options');
				options = $.extend({}, defaultOption, options);
				options.slide = function (event, ui) {
					if (options.type === 'currency') {
						$this.parents('.slider-range').find(".amount").val(format.format(ui.values[0]) + " to " + format.format(ui.values[1]));
					}
					if (options.type === 'sqmts') {
						$this.parents('.slider-range').find(".amount").val(ui.values[0] + " to " + ui.values[1] + " sqmts");
					}
				};
				$this.slider(options);
				if (options.type === 'currency') {
					$this.parents('.slider-range').find(".amount").val(format.format($this.slider("values", 0)) +
						" to " + format.format($this.slider("values", 1)));
				}
				if (options.type === 'sqmts') {
					$this.parents('.slider-range').find(".amount").val($this.slider("values", 0) + " to " + $this.slider("values", 1) + " sqmts");
				}

			});
		},
		activeSidebarMenu: function () {
			var $sidebar = $('.db-sidebar');
			if ($sidebar.length < 1) {
				return;
			}
			var $current_link = window.location.pathname;
			var $sidebarLink = $sidebar.find('.sidebar-link');
			$sidebarLink.each(function () {
				var href = $(this).attr('href');
				if ($current_link.indexOf(href) > -1) {
					var $sidebar_item = $(this).parent('.sidebar-item');
					$sidebar_item.addClass('active');
				}
			});

		},
		reInitWhenTabShow: function () {
			var $tabs = $('a[data-toggle="pill"],a[data-toggle="tab"]');
			$tabs.on('show.bs.tab', function (e) {
				var href = $(this).attr('href');
				if (href !== '#') {
					$($(this).attr('href')).find('.slick-slider').slick('refresh');
					$('[data-toggle="tooltip"]').tooltip('update');
					if ($(e.target).attr("href") !== undefined) {
						var $target = $($(e.target).attr("href"));
						APP.util.mfpEvent($target);
					}
				}
				APP.mapbox.init();
			});
		},
		processingStepAddProperty: function () {
			var $step = $('.new-property-step');
			if ($step.length < 1) {
				return;
			}
			var $active_item = $step.find('.nav-link.active').parent();
			var $prev_item = $active_item.prevAll();
			if ($prev_item.length > 0) {
				$prev_item.each(function () {
					$(this).find('.step').html('<i class="fal fa-check text-primary"></i>');

				});
			}
			var $tabs = $('a[data-toggle="pill"],a[data-toggle="tab"]');
			$tabs.on('show.bs.tab', function (e) {
				$(this).find('.number').html($(this).data('number'));
				var $prev_item = $(this).parent().prevAll();
				if ($prev_item.length > 0) {
					$prev_item.each(function () {
						$(this).find('.number').html('<i class="fal fa-check text-primary"></i>');

					});
				}
				var $next_item = $(this).parent().nextAll();
				if ($next_item.length > 0) {
					$next_item.each(function () {
						var number = $(this).find('.nav-link').data('number');
						$(this).find('.number').html(number);

					});
				}
			});
			$('.prev-button').on('click', function (e) {
				e.preventDefault();
				var $parent = $(this).parents('.tab-pane');
				$parent.removeClass('show active');
				$parent.prev().addClass('show active');
				$parent.find('.collapsible').removeClass('show');
				$parent.prev().find('.collapsible').addClass('show');
				var id = $parent.attr('id');
				var $nav_link = $('a[href="#' + id + '"]');
				$nav_link.removeClass('active');
				$nav_link.find('.number').html($nav_link.data('number'));
				var $prev = $nav_link.parent().prev();
				$prev.find('.nav-link').addClass('active');
				var number = $parent.find('.collapse-parent').data('number');
				$parent.find('.number').html(number);
			});
			$('.next-button').on('click', function (e) {
				e.preventDefault();
				var $parent = $(this).parents('.tab-pane');
				$parent.removeClass('show active');
				$parent.next().addClass('show active');
				$parent.find('.collapsible').removeClass('show');
				$parent.next().find('.collapsible').addClass('show');
				var id = $parent.attr('id');
				var $nav_link = $('a[href="#' + id + '"]');
				$nav_link.removeClass('active');
				$nav_link.find('.number').html($nav_link.data('number'));
				var $prev = $nav_link.parent().next();
				$prev.find('.nav-link').addClass('active');
				$nav_link.find('.number').html('<i class="fal fa-check text-primary"></i>');
				$parent.find('.number').html('<i class="fal fa-check text-primary"></i>');
			});
			$step.find('.collapsible').on('show.bs.collapse', function () {
				$(this).find('.number').html($(this).data('number'));
				var $parent = $(this).parents('.tab-pane');
				var $prev_item = $parent.prevAll();
				if ($prev_item.length > 0) {
					$prev_item.each(function () {
						$(this).find('.number').html('<i class="fal fa-check text-primary"></i>');

					});
				}
				var $next_item = $parent.nextAll();
				if ($next_item.length > 0) {
					$next_item.each(function () {
						var number = $(this).find('.collapse-parent').data('number');
						$(this).find('.number').html(number);

					});
				}
			});

		},
		enablePopovers: function () {
			$('[data-toggle="popover"]').popover();
		},
		enableDatepicker: function () {
			var $timePickers = $('.timepicker input');
			$timePickers.each(function () {
				$(this).timepicker({
					icons: {
						up: 'fal fa-angle-up',
						down: 'fal fa-angle-down'
					},
				});
			});
			var $calendar = $('.calendar');
			if ($calendar.length < 1) {
				return;
			}
			var $item = $calendar.find('.card');
			$item.on('click', function (e) {
				e.preventDefault();
				$item.each(function () {
					$(this).removeClass('active');
				});
				$(this).addClass('active');
				$('.widget-request-tour').find('.date').val($(this).data('date'));
    			if(typeof schedule == 'undefined' || schedule.length < 1) {
    				return;
    			}
    			// var day = $(this).find('.day').text();
                // var day = $(this).data('select');
				// $('.widget-request-tour').find('#schedule-time').attr('min', schedule[day][0].min);
				// $('.widget-request-tour').find('#schedule-time').attr('max', schedule[day][0].max);
    			var day = $(this).data('id');
				$('.widget-request-tour').find('#schedule-label').text(schedule[day][0].min + ' to ' + schedule[day][0].max);
				$('.widget-request-tour').find('#schedule-time').val(day);
			})
		},

		initToast: function () {
			$('.toast').toast();
		},
		processTestimonials: function () {
			var $slick_slider = $('.custom-vertical');
			if ($slick_slider.length < 1) {
				return;
			}
			$slick_slider.on('init', function (slick) {
				$(this).find('.slick-current').prev().addClass('prev');
			});

			$slick_slider.on('afterChange', function (event, slick, currentSlide) {
				$(this).find('.slick-slide').removeClass('prev');
				$(this).find('.slick-current').prev().addClass('prev');
			});

		},
		scrollSpyLanding: function () {
			var $langding_menu = $('#landingMenu');
			if ($langding_menu.length < 1) {
				return;
			}
			$('body').scrollspy({
				target: '#landingMenu',
				offset: 200
			});
			$langding_menu.find('.nav-link')
			// Remove links that don't actually link to anything
				.not('[href="#"]')
				.not('[href="#0"]')
				.click(function (event) {
					// On-page links
					if (
						location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
						&&
						location.hostname === this.hostname
					) {
						// Figure out element to scroll to
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
						// Does a scroll target exist?
						if (target.length) {
							// Only prevent default if animation is actually gonna happen
							event.preventDefault();
							$('html, body').animate({
								scrollTop: target.offset().top
							}, 500, function () {
								// Callback after animation
							});
						}
					}
				});
		},
		parallaxImag: function () {
			var image_wrapper = $(".landing-banner");

			image_wrapper.mousemove(function (e) {
				e.preventDefault();

				var wx = $(window).width();
				var wy = $(window).height();

				var x = e.pageX - this.offsetLeft;
				var y = e.pageY - this.offsetTop;

				var newx = x - wx / 2;
				var newy = y - wy / 2;


				$.each(image_wrapper.find('.layer'), function (index) {
					var speed = 0.01 + index / 100;
					TweenMax.to($(this), 1, {x: (1 - newx * speed), y: (1 - newy * speed)});

				});
			});
			image_wrapper.on('mouseleave', (function (e) {
				e.preventDefault();
				$.each(image_wrapper.find('.layer'), function () {
					TweenMax.to($(this), 1, {x: 0, y: 0});

				});

			}));

		},
	};
	/*--------------------------------------------------------------
	 /* Slick Slider
	 --------------------------------------------------------------*/
	APP.slickSlider = {
		init: function ($wrap) {
			this.slickSetup($wrap);
		},
		slickSetup: function ($wrap) {
			var $slicks;
			if ($wrap !== undefined) {
				$slicks = $wrap
			} else {
				$slicks = $('.slick-slider');
			}
			var options_default = {
				slidesToScroll: 1,
				slidesToShow: 1,
				adaptiveHeight: true,
				arrows: true,
				dots: true,
				autoplay: false,
				autoplaySpeed: 3000,
				centerMode: false,
				centerPadding: "50px",
				draggable: true,
				fade: false,
				focusOnSelect: false,
				infinite: false,
				pauseOnHover: false,
				responsive: [],
				rtl: false,
				speed: 300,
				vertical: false,
				prevArrow: '<div class="slick-prev" aria-label="Previous"><i class="far fa-angle-left"></i></div>',
				nextArrow: '<div class="slick-next" aria-label="Next"><i class="far fa-angle-right"></i></div>',
				customPaging: function (slider, i) {
					return $('<span></span>');
				}
			};
			$slicks.each(function () {
				var $this = $(this);
				if (!$this.hasClass('slick-initialized')) {
					var options = $this.data('slick-options');
					if ($this.hasClass('custom-slider-1')) {
						options.customPaging = function (slider, i) {
							return '<span class="dot">' + (i + 1) + '</span>' + '<span class="dot-divider"></span><span class="dot">' + slider.slideCount + '</span>';
						}
					}
					if ($this.hasClass('custom-slider-2')) {
						options.customPaging = function (slider, i) {
							return '<span class="dot">' + (i + 1) + '/' + slider.slideCount + '</span>';
						}
					}
					if ($this.hasClass('custom-slider-3')) {
						options.customPaging = function (slider, i) {
							if (i < 9) {
								return '0' + (i + 1) + '.';
							} else {
								return (i + 1) + '.';
							}

						}
					}
					options = $.extend({}, options_default, options);
					$this.slick(options);
					$this.on('setPosition', function (event, slick) {
						var max_height = 0;
						slick.$slides.each(function () {
							var $slide = $(this);
							if ($slide.hasClass('slick-active')) {
								if (slick.options.adaptiveHeight && (slick.options.slidesToShow > 1) && (slick.options.vertical === false)) {
									if (max_height < $slide.outerHeight()) {
										max_height = $slide.outerHeight();
									}
								}
							}
						});
						if (max_height !== 0) {
							$this.find('> .slick-list').animate({
								height: max_height
							}, 500);
						}
					});

				}
			});
		}
	};
	APP.counter = {
		init: function () {
			if (typeof Waypoint !== 'undefined') {
				$('.counterup').waypoint(function () {
					var start = $(this.element).data('start');
					var end = $(this.element).data('end');
					var decimals = $(this.element).data('decimals');
					var duration = $(this.element).data('duration');
					var separator = $(this.element).data('separator');
					var usegrouping = false;
					if (separator !== '') {
						usegrouping = true
					}
					var decimal = $(this.element).data('decimal');
					var prefix = $(this.element).data('prefix');
					var suffix = $(this.element).data('suffix');
					var options = {
						useEasing: true,
						useGrouping: usegrouping,
						separator: separator,
						decimal: decimal,
						prefix: prefix,
						suffix: suffix
					};
					var counterup = new CountUp(this.element, start, end, decimals, duration, options);
					counterup.start();
					this.destroy();
				}, {
					triggerOnce: true,
					offset: 'bottom-in-view'
				});
			}
		}
	};
	APP.util = {
		init: function () {
			this.mfpEvent();
			this.backToTop();
			this.tooltip();
		},
		mfpEvent: function ($elWrap) {
			if ($elWrap === undefined) {
				$elWrap = $('body');
			}

			$elWrap.find('[data-gtf-mfp]').each(function () {
				var $this = $(this),
					defaults = {
						type: 'image',
						closeOnBgClick: true,
						closeBtnInside: false,
						mainClass: 'mfp-zoom-in',
						midClick: true,
						removalDelay: 300,
						callbacks: {
							beforeOpen: function () {
								// just a hack that adds mfp-anim class to markup
								switch (this.st.type) {
									case 'image':
										this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
										break;
									case 'iframe' :
										this.st.iframe.markup = this.st.iframe.markup.replace('mfp-iframe-scaler', 'mfp-iframe-scaler mfp-with-anim');
										break;
								}
							},
							beforeClose: function () {
								this.container.trigger('gtf_mfp_beforeClose');
							},
							close: function () {
								this.container.trigger('gtf_mfp_close');
							},
							change: function () {
								var _this = this;
								if (this.isOpen) {
									this.wrap.removeClass('mfp-ready');
									setTimeout(function () {
										_this.wrap.addClass('mfp-ready');
									}, 10);
								}
							}
						}
					},
					mfpConfig = $.extend({}, defaults, $this.data("mfp-options"));

				var galleryId = $this.data('gallery-id');
				if (typeof (galleryId) !== "undefined") {
					var items = [],
						items_src = [];
					var $imageLinks = $('[data-gallery-id="' + galleryId + '"]');
					$imageLinks.each(function () {
						var src = $(this).attr('href');
						if (items_src.indexOf(src) < 0) {
							items_src.push(src);
							items.push({
								src: src
							});
						}
					});
					mfpConfig.items = items;
					mfpConfig.gallery = {
						enabled: true
					};
					mfpConfig.callbacks.beforeOpen = function () {
						var index = $imageLinks.index(this.st.el);
						switch (this.st.type) {
							case 'image':
								this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
								break;
							case 'iframe' :
								this.st.iframe.markup = this.st.iframe.markup.replace('mfp-iframe-scaler', 'mfp-iframe-scaler mfp-with-anim');
								break;
						}
						if (-1 !== index) {
							this.goTo(index);
						}
					};
				}
				$this.magnificPopup(mfpConfig);
			});
		},
		tooltip: function ($elWrap) {
			if ($elWrap === undefined) {
				$elWrap = $('body');
			}
			$elWrap.find('[data-toggle="tooltip"]').each(function () {
				var configs = {
					container: $(this).parent()
				};
				if ($(this).closest('.gtf__tooltip-wrap').length) {
					configs = $.extend({}, configs, $(this).closest('.gtf__tooltip-wrap').data('tooltip-options'));
				}
				$(this).tooltip(configs);
			});
		},
		backToTop: function () {
			var $backToTop = $('.gtf-back-to-top');
			if ($backToTop.length > 0) {
				$backToTop.on('click', function (event) {
					event.preventDefault();
					$('html,body').animate({scrollTop: '0px'}, 800);
				});
				$window.on('scroll', function (event) {
					var scrollPosition = $window.scrollTop(),
						windowHeight = $window.height() / 2;
					if (scrollPosition > windowHeight) {
						$backToTop.addClass('in');
					} else {
						$backToTop.removeClass('in');
					}
				});
			}
		},
	};
	APP.chatjs = {
		init: function (el) {
			var $chartEls = $('.chartjs');
			if (el !== undefined) {
				$chartEls = el;
			}
			var defaultOptions = {
				type: 'line',
				maintainAspectRatio: true,
				title: {
					display: false,
					text: 'Line Chart - Animation Progress Bar',
					position: 'top',
					fontSize: 12,
					fontColor: '#696969',
					fontStyle: 'bold',
					padding: 10,
					lineHeight: 1.2
				},
				legend: {
					display: true,
					position: 'bottom',
					align: 'start',
					fullWidth: false,
					reverse: false,
					labels: {
						boxWidth: 18,
						fontSize: 14,
						fontColor: '#9b9b9b',
						fontStyle: 'normal',
						padding: 20,
						usePointStyle: true
					}
				},
			};
			$chartEls.each(function () {
				var $this = $(this),
					chatType = $this.data('chart-type'),
					my_options = $this.data('chart-options'),
					labels = $this.data('chart-labels'),
					datasets = $this.data('chart-datasets'),

					options = $.extend(true, defaultOptions, my_options);
				if (chatType === undefined) {
					chatType = 'line';
				}
				if (typeof Waypoint !== 'undefined') {
					$('.chart').waypoint(function () {
						var myChart = new Chart($this, {
							type: chatType,
							data: {
								labels: labels,
								datasets: datasets
							},
							options: options
						});
						$(window).resize(function () {
							myChart.update();
						});
						$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
							myChart.update();
						});
						$('.collapsible').on('show.bs.collapse', function () {
							myChart.update();
						});
					}, {
						triggerOnce: true,
						offset: 'bottom-in-view'
					});
				}
			});


		}
	};
	APP.uploader = {
		init: function () {
		    Dropzone.autoDiscover = false;
			var $uploadEl = $("[data-uploader='true']");
			if ($uploadEl.length < 1) {
				return;
			}
			var $url = $uploadEl.data("uploader-url");
			var $image_url = $uploadEl.data("uploader-image");
			var $maxFiles = 15;
			var fileList = new Array;
            var i = 0;
			var myDrop = new Dropzone("[data-uploader='true']", {
				url: $url+'?maxFiles='+$maxFiles,
				//uploadMultiple: true,
                //parallelUploads: 10,
                maxFilesize: 8,
				acceptedFiles: "image/*",
				addRemoveLinks: true,
				dictFileTooBig: 'Image is bigger than 8MB',
                maxFiles: $maxFiles,
				/*
				maxfilesexceeded: function(file) {
                    swal("Cancelled", "No more files please!", "error");
                },
                init: function() {
                    this.on("maxfilesexceeded", function(file) {
                    this.removeFile(file);
                });
                this.on('error', function(file, errorMessage) {
                      var mypreview = document.getElementsByClassName('dz-error');
                      mypreview = mypreview[mypreview.length - 1];
                      mypreview.classList.toggle('dz-error');
                      mypreview.classList.toggle('dz-success');
                    });
                },
                /*
                init: function() {
                    this.on("addedfile", function(event) {
                        while (this.files.length > this.options.maxFiles) {
                            this.removeFile(this.files[0]);
                        }
                    });
                    */
                    /*
                    this.on("error", function (file, message) {
                        swal("Cancelled", message, "error");
                        this.removeAllFiles();
                    }); 
                    /*
                    this.on("maxfilesexceeded", function(file){
                        swal("Cancelled", "No more files please!", "error");
                        //this.removeAllFiles(true)
                        //this.removeAllFiles();
                        //this.addFile(file);
                    }); 
                },*/
				success: function(file, res) {
				    var res = $.parseJSON(res);
                    if(res[0].alert == 'success')
                    {
    				    fileList[i] = {"serverFileName" : res[0].data, "fileName" : file.name,"fileId" : i };
                        $('.dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                            var name = el.innerHTML;
                            var $filename = $(this);
                            if (file.name === name) {
                                $filename.attr('data-dz-name', res[0].data);
                            }
                        });
                        i++;
                    }
                    else
                    {
				        swal(res[0].heading, res[0].msg, res[0].alert);   
                    }
                },
				removedfile : function(file)
                {
                    var rmvFile = "";
                    for(var f=0; f<fileList.length; f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile)
                    {
                        swal({
                            title: "Are you sure delete this file?",
                            text: "But you will still be able to retrieve this file.",
                            type: "warning",
                            showCancelButton: true,
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: base_url + 'myaccount/delete',
                                    type: "GET",
                                    data: { 'file': rmvFile},
                                    dataType : 'JSON',
                                    success : function(res){
                                        swal(res[0].heading, res[0].msg, res[0].alert);
                                        if(res[0].alert == 'success')
                                        {
                                            var _ref;
                                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                                        }
                                    },
                                    error: function(error,s) {
                                        console.log(error.responseText);
                                    }
                                });
                            } else {
                                swal("Cancelled", "Your image file is safe :)", "error");
                                return false;
                            }
                        });
                    }
                    else
                    {
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                },
			});
		}
	};
	APP.uploaderUpdate = {
		init: function () {
		    Dropzone.autoDiscover = false;
		    if(typeof galleryResponse == 'undefined') {
				return;
			}
			var $uploadEl = $("[data-uploader='update']");
			if ($uploadEl.length < 1) {
				return;
			}
			var $url = $uploadEl.data("uploader-url");
			var $image_url = $uploadEl.data("uploader-image");
			var $maxFiles = 15;
			var fileList = new Array;
            var i = 0;
			var myDrop = new Dropzone("[data-uploader='update']", {
				url: $url+'?maxFiles='+$maxFiles,
                maxFilesize: 8,
                maxFiles: $maxFiles,
				acceptedFiles: "image/*",
				addRemoveLinks: true,
    			thumbnailWidth: 120,
    			thumbnailHeight: 120,
    			dictFileTooBig: 'Image is bigger than 8MB',
                init: function() { 
                    var thisDropzone = this;
                    $.each(galleryResponse, function(key,value) {
                        fileList[i] = {"serverFileName" : value.name, "fileName" : value.name, "fileId" : i };
                        var mockFile = { name: value.name, size: value.size };
                        thisDropzone.emit("addedfile", mockFile);
                        thisDropzone.emit("thumbnail", mockFile, value.path);
                        thisDropzone.emit("complete", mockFile);
                        $('.dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                            var name = el.innerHTML;
                            var $filename = $(this);
                            if (value.name === name) {
                                $filename.attr('data-dz-name', value.name);
                            }
                        });
                        i++;
                    });
                },
				success: function(file, res) {
				    var res = $.parseJSON(res);
                    if(res[0].alert == 'success')
                    {
    				    fileList[i] = {"serverFileName" : res[0].data, "fileName" : file.name,"fileId" : i };
                        $('.dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                            var name = el.innerHTML;
                            var $filename = $(this);
                            if (file.name === name) {
                                $filename.attr('data-dz-name', res[0].data);
                            }
                        });
                        i++;
                    }
                    else
                    {
				        swal(res[0].heading, res[0].msg, res[0].alert);   
                    }
                }, 
				removedfile : function(file)
                {
                    var rmvFile = "";
                    for(var f=0; f<fileList.length; f++){
                        if(fileList[f].fileName == file.name)
                        {
                            rmvFile = fileList[f].serverFileName;
                        }
                    }
                    if (rmvFile)
                    {
                        swal({
                            title: "Are you sure delete this file?",
                            text: "But you will still be able to retrieve this file.",
                            type: "warning",
                            showCancelButton: true,
                            buttons: true,
                            dangerMode: true,
                        }).then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: base_url + 'myaccount/delete',
                                    type: "GET",
                                    data: { 'file': rmvFile},
                                    dataType : 'JSON',
                                    success : function(res){
                                        swal(res[0].heading, res[0].msg, res[0].alert);
                                        if(res[0].alert == 'success')
                                        {
                                            var _ref;
                                            return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                                        }
                                    },
                                    error: function(error,s) {
                                        console.log(error.responseText);
                                    }
                                });
                            } else {
                                swal("Cancelled", "Your image file is safe :)", "error");
                                return false;
                            }
                        });
                    }
                    else
                    {
                        var _ref;
                        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
                    }
                },
			});
		}
	};
    $(document).ready(function () {
			$('.dropzone').sortable({
                items: '.dz-preview',
                cursor: 'move',
                opacity: 0.5,
                containment: '.dropzone',
                distance: 20,
                tolerance: 'pointer',
                stop: function () {
                    var newQueue = [];
                    var rmvFile = "";
                    $('.dropzone .dz-preview .dz-filename [data-dz-name]').each(function (count, el) {
                        var name = el.innerHTML;
                        var serverFileName = $(this).data('dz-name');
                        if(serverFileName)
                        {
                            newQueue.push(serverFileName);
                        }
                    });
                    if(newQueue.length > 0)
                    {
                        $.post(base_url + 'myaccount/sort', { "files[]" : newQueue }, 
                             function(res){
                                //console.log(res);
                        }, 'json');
                    }
                }
            });
    });
	APP.CollapseTabsAccordion = {
		init: function () {
			this.CollapseSetUp();
		},

		CollapseSetUp: function () {
			var $tabs = $('.collapse-tabs');

			$tabs.find('.tab-pane.active .collapse-parent').attr('data-toggle', 'false');

			$tabs.find('.nav-link').on('show.bs.tab', function (e) {
				if (!$(this).hasClass('nested-nav-link')) {
					var $this_tab = $(this).parents('.collapse-tabs');
					var $tabpane = $($(this).attr('href'));
					$this_tab.find('.collapsible').removeClass('show');
					$this_tab.find('collapse-parent').addClass('collapsed');
					$this_tab.find('collapse-parent').attr('data-toggle', 'collapse');
					$tabpane.find('.collapse-parent').removeClass('collapsed');
					$tabpane.find('.collapse-parent').attr('data-toggle', 'false');
					$tabpane.find('.collapsible').addClass('show');
				}

			});

			$tabs.find('.collapsible').on('show.bs.collapse', function () {
				var $this_tab = $(this).parents('.collapse-tabs'),
					$parent = $(this).parents('.tab-pane.tab-pane-parent'),
					$id = $parent.attr('id'),
					$navItem = $this_tab.find('.nav-link'),
					$navItemClass = 'active';

				$this_tab.find('.collapse-parent').attr('data-toggle', 'collapse');
				$parent.find('.collapse-parent').attr('data-toggle', 'false');
				var $tab_pane = $this_tab.find('.tab-pane');
				if (!$tab_pane.hasClass('nested-tab-pane')) {
					$this_tab.find('.tab-pane').removeClass('show active');
				}
				$parent.addClass('show active');
				var $nav_link = $parent.parents('.collapse-tabs').find('.nav-link');
				if (!$nav_link.hasClass('nested-nav-link')) {
					$nav_link.removeClass('active');
				}
				$navItem.each(function () {
					if (!$(this).hasClass('nested-nav-link')) {
						$(this).removeClass('active');
						if ($(this).attr('href') === '#' + $id) {
							$(this).addClass($navItemClass);
						}
					}

				});

			});

		}


	};
	APP.animation = {
		delay: 100,
		itemQueue: [],
		queueTimer: null,
		$wrapper: null,
		init: function () {
			var _self = this;
			_self.$wrapper = $body;
			_self.itemQueue = [];
			_self.queueTimer = null;
			if (typeof delay !== 'undefined') {
				_self.delay = delay;
			}

			_self.itemQueue["animated_0"] = [];

			$body.find('#content').find('>div,>section').each(function (index) {
				$(this).attr('data-animated-id', (index + 1));
				_self.itemQueue["animated_" + (index + 1)] = [];
			});

			setTimeout(function () {
				_self.registerAnimation();
			}, 200);
		},
		registerAnimation: function () {
			var _self = this;
			$('[data-animate]:not(.animated)', _self.$wrapper).waypoint(function () {
				// Fix for different ver of waypoints plugin.
				var _el = this.element ? this.element : this,
					$this = $(_el);
				if ($this.is(":visible")) {
					var $animated_wrap = $this.closest("[data-animated-id]"),
						animated_id = '0';
					if ($animated_wrap.length) {
						animated_id = $animated_wrap.data('animated-id');
					}
					_self.itemQueue['animated_' + animated_id].push(_el);
					_self.processItemQueue();
				} else {
					$this.addClass($this.data('animate')).addClass('animated');
				}
			}, {
				offset: '90%',
				triggerOnce: true
			});
		},
		processItemQueue: function () {
			var _self = this;
			if (_self.queueTimer) return; // We're already processing the queue
			_self.queueTimer = window.setInterval(function () {
				var has_queue = false;
				for (var animated_id in _self.itemQueue) {
					if (_self.itemQueue[animated_id].length) {
						has_queue = true;
						break;
					}
				}

				if (has_queue) {
					for (var animated_id in _self.itemQueue) {
						var $item = $(_self.itemQueue[animated_id].shift());
						$item.addClass($item.data('animate')).addClass('animated');
					}
					_self.processItemQueue();
				} else {
					window.clearInterval(_self.queueTimer);
					_self.queueTimer = null
				}


			}, _self.delay);
		}
	};
	if ($.fn.dropzone) {
		Dropzone.autoDiscover = false;
	}
	APP.PropertySearchStatusTab = {
		init: function () {
			var property_tabs = $(".property-search-status-tab");
			property_tabs.each(function () {
				if ($(this).hasClass('nav')) {
					$(this).find('.nav-link').on("click", function (event) {
						var data_value = $(this).attr('data-value');
						$(this).parents('.nav').siblings('.search-field').attr('value', data_value);
					});
				} else {
					$(this).find('button').on("click", function (event) {
						event.preventDefault();
						$(this).addClass('active');
						$(this).siblings('button').removeClass('active');
						var data_value = $(this).attr('data-value');
						$(this).siblings('.search-field').attr('value', data_value);
					});
				}
			});

		},
	};
	APP.ShowCompare = {
		init: function () {
			var btn_show = $("#compare .btn-open");
			btn_show.on("click", function (event) {
				event.preventDefault();
				if ($(this).parent('#compare').hasClass('show')) {
					$(this).parent('#compare').removeClass('show');
				} else {
					$(this).parent('#compare').addClass('show');
				}
			});
		},
	};
	APP.headerSticky = {
		scroll_offset_before: 0,

		init: function () {
			this.sticky();
			this.scroll();
			this.resize();
			this.processSticky();
			this.footerBottom();
		},
		sticky: function () {
			$('.header-sticky .sticky-area').each(function () {
				var $this = $(this);
				if (!$this.is(':visible')) {
					return;
				}
				if (!$this.parent().hasClass('sticky-area-wrap')) {
					$this.wrap('<div class="sticky-area-wrap"></div>');
				}
				var $wrap = $this.parent();
				var $nav_dashbard = $('.dashboard-nav');
				$wrap.height($this.outerHeight());
				if (window.matchMedia('(max-width: 1199px)').matches) {
					$nav_dashbard.addClass('header-sticky-smart');
				} else {
					$nav_dashbard.removeClass('header-sticky-smart');
				}
			});
		},
		resize: function () {
			$window.resize(function () {
				APP.headerSticky.sticky();
				APP.headerSticky.processSticky();
				APP.headerSticky.footerBottom();
			});
		},

		scroll: function () {
			$window.on('scroll', function () {
				APP.headerSticky.processSticky();
			});
		},
		processSticky: function () {
			var current_scroll_top = $window.scrollTop();

			var $parent = $('.main-header');
			var is_dark = false;
			if ($parent.hasClass('navbar-dark') && !$parent.hasClass('bg-secondary')) {
				is_dark = true;
			}
			$('.header-sticky .sticky-area').each(function () {
				var $this = $(this);
				if (!$this.is(':visible')) {
					return;
				}

				var $wrap = $this.parent(),
					sticky_top = 0,
					sticky_current_top = $wrap.offset().top,
					borderWidth = $body.css('border-width');
				if (borderWidth !== '') {
					sticky_top += parseInt(borderWidth);
				}


				if (sticky_current_top - sticky_top < current_scroll_top) {
					$this.css('position', 'fixed');
					$this.css('top', sticky_top + 'px');
					$wrap.addClass('sticky');

					if (is_dark) {
						$parent.removeClass('navbar-dark');
						$parent.addClass('navbar-light');
						$parent.addClass('navbar-light-sticky');
					}

				} else {
					if ($parent.hasClass('navbar-light-sticky')) {
						$parent.addClass('navbar-dark');
						$parent.removeClass('navbar-light');
						$parent.removeClass('navbar-light-sticky');
					}
					if ($wrap.hasClass('sticky')) {
						$this.css('position', '').css('top', '');
						$wrap.removeClass('sticky');
					}

				}
			});

			if (APP.headerSticky.scroll_offset_before > current_scroll_top) {
				$('.header-sticky-smart .sticky-area').each(function () {
					if ($(this).hasClass('header-hidden')) {
						$(this).removeClass('header-hidden');
					}
				});
			} else {
				// down
				$('.header-sticky-smart .sticky-area').each(function () {
					var $wrapper = $(this).parent();
					if ($wrapper.length) {
						if ((APP.headerSticky.scroll_offset_before > ($wrapper.offset().top + $(this).outerHeight())) && !$(this).hasClass('header-hidden')) {
							$(this).addClass('header-hidden');
						}
					}

				});
			}
			APP.headerSticky.scroll_offset_before = current_scroll_top;
		},
		footerBottom: function () {
			var $main_footer = $('.footer');
			var $wrapper_content = $('#content');
			$main_footer.css('position', '');
			$wrapper_content.css('padding-bottom', '');
			if ($body.outerHeight() < $window.outerHeight()) {
				$main_footer.css('position', 'fixed');
				$main_footer.css('bottom', '0');
				$main_footer.css('left', '0');
				$main_footer.css('right', '0');
				$main_footer.css('z-index', '0');
				$wrapper_content.css('padding-bottom', $main_footer.outerHeight() + 'px');
			} else {
				$main_footer.css('position', '');
				$wrapper_content.css('padding-bottom', '');
			}
		}
	};
	APP.sidebarSticky = {
		init: function () {
			var header_sticky_height = 0;
			if ($('#site-header.header-sticky').length > 0) {
				header_sticky_height = 60;
			}

			$('.primary-sidebar.sidebar-sticky > .primary-sidebar-inner').hcSticky({
				stickTo: '#sidebar',
				top: header_sticky_height + 30
			});
			$('.primary-map.map-sticky > .primary-map-inner').hcSticky({
				stickTo: '#map-sticky',
				top: header_sticky_height
			});
		}
	};
	APP.mapbox = {
		init: function () {
			var $map_box = $('.mapbox-gl');
			if ($map_box.length < 1) {
				return;
			}
            var centerLngLat = JSON.parse('[' + JSON.parse($map_box.attr('data-mapbox-options')).center + ']');
            if(centerLngLat.length > 0)
                lnglat = centerLngLat;
			var options_default = {
				container: 'map',
				style: 'mapbox://styles/mapbox/streets-v12',
				center: lnglat,
				zoom: 13
			};
			$map_box.each(function () {
				var $this = $(this),
					options = JSON.parse($this.attr('data-mapbox-options')),
					markers = JSON.parse($this.attr('data-mapbox-marker'));
				options = $.extend({}, options_default, options);
				mapboxgl.accessToken = $this.data('mapbox-access-token');
				var map = new mapboxgl.Map(options);
				var $marker_el = $($this.data('marker-target'));
				var $marker_els = $marker_el.find('.marker-item');
				var $marker_draggable = $($this.data('marker-draggable'));
				var $marker_directions = $($this.data('marker-directions'));
				if ($marker_els.length > 0) {
				    var el = document.createElement('div');
						el.className = markers[0].className;
						el.style.backgroundImage = 'url(' + markers[0].backgroundImage + ')';
						el.style.backgroundRepeat = markers[0].backgroundRepeat;
						el.style.width = markers[0].width;
						el.style.height = markers[0].height;
					new mapboxgl.Marker(el).setLngLat(markers[0].position).addTo(map);
					$.each($marker_els, function () {
						var $marker_style = $(this).data('marker-style');
						var el = document.createElement('div');
						el.className = $marker_style.className;
						el.style.backgroundImage = 'url(' + $(this).data('icon-marker') + ')';
						el.style.width = $marker_style.style.width;
						el.style.height = $marker_style.style.height;
						new mapboxgl.Marker(el)
							.setLngLat($(this).data('position'))
							.setPopup(new mapboxgl.Popup({className: $marker_style.popup.className})
								.setHTML($(this).html())
								.setMaxWidth($marker_style.popup.maxWidth)
							)
							.addTo(map);
					});
				} else {
					$.each(markers, function () {
						var el = document.createElement('div');
						el.className = this.className;
						el.style.backgroundImage = 'url(' + this.backgroundImage + ')';
						el.style.backgroundRepeat = this.backgroundRepeat;
						el.style.width = this.width;
						el.style.height = this.height;
						if ($marker_draggable.length > 0) {
						    $('#latitude').val((this.position)[1]);
                            $('#longitude').val((this.position)[0]);
    				        var marker = new mapboxgl.Marker({
                                    draggable: true
                                })
                                .setLngLat(this.position)
    							.addTo(map);
    						function onDragEnd() {
                                const lngLat = marker.getLngLat();
                                $('#latitude').val(`${lngLat.lat}`);
                                $('#longitude').val(`${lngLat.lng}`);
                                $('#map').attr('data-mapbox-options','{"center":[' + `${lngLat.lng}` + ',' + `${lngLat.lat}` +'],"setLngLat":[' + `${lngLat.lng}` + ',' + `${lngLat.lat}` + ']}');
                                $('#map').attr('data-mapbox-marker','[{"position":[' + `${lngLat.lng}` + ',' + `${lngLat.lat}` +'],"className":"marker","backgroundImage":"' + base_url + 'uploads/googlle-market-01.png' +'","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]');
                            }
                             
                            marker.on('dragend', onDragEnd);
    					}
						else{
    						var marker = new mapboxgl.Marker(el)
							.setLngLat(this.position)
							.addTo(map);
						}
					})
				}

				map.scrollZoom.disable();
				if($marker_directions.length > 0)
				{
				    map.addControl(
                        new MapboxDirections({
                            accessToken: mapboxgl.accessToken
                        }),
                        'top-left'
                    );
				}
				else
				    map.addControl(new mapboxgl.NavigationControl());
				map.on('load', function () {
					map.resize();
				});
			});


		}
	};
	APP.seachMapbox = {
	    init: function () {
    	    mapboxgl.accessToken = $('.mapbox-gl').data('mapbox-access-token');
            const map = new mapboxgl.Map({
                container: 'map',
    			style: 'mapbox://styles/mapbox/streets-v12',
    			center: lnglat,
                zoom: 13
            });
            
            const geocoder = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                countries: 'nz',
                mapboxgl: mapboxgl
            });
            document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
            $("#geocoder").change(function() {
                $('#address').val($('.mapboxgl-ctrl-geocoder--input').val());
            });
            map.on('load', () => {
                geocoder.on('result', (event) => {
                    //console.log(event.result);
                    lnglat = event.result.center;
                    $('#map').attr('data-mapbox-options','{"center":[' + lnglat +'],"setLngLat":[' + lnglat + ']}');
                    $('#map').attr('data-mapbox-marker','[{"position":[' + lnglat +'],"className":"marker","backgroundImage":"' + base_url + 'uploads/googlle-market-01.png' +'","backgroundRepeat":"no-repeat","width":"32px","height":"40px"}]');
                    APP.mapbox.init();
                    $('#latitude').val(lnglat[1]);
                    $('#longitude').val(lnglat[0]);
                });
            });
	    },
	};
	APP.Map = {
	    init: function () {
	        
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map').data('position'))?$('#map').data('position'):AUCKLAND;
            var marker_draggable = $($('#map').data('marker-draggable'));
            var marker_zoom = $($('#map').data('marker-zoom'));
            // console.log(myLatlng);
            //console.log(typeof myLatlng);
    	    map = new google.maps.Map(document.getElementById("map"), {
                //center: { lat: lat, lng: lng },
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 5,
            });
            
            const input = document.getElementById("pac-input");
            var options = {
                componentRestrictions: {country: 'NZ'}
            };
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            //const searchBox = new google.maps.places.SearchBox(input);
            const searchBox = new google.maps.places.Autocomplete(input, options);
            
            //console.log(searchBox);
            
            searchBox.bindTo("bounds", map);
            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");
            infowindow.setContent(infowindowContent);
            
            const marker = new google.maps.Marker({
                map,
                draggable: (marker_draggable.length > 0)?true:false,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
            });
            
            
            var geocoder = new google.maps.Geocoder();
            //google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            // console.log(myLatlng);
                            //infowindowContent.children["place-name"].textContent = results[0].name;
                            infowindowContent.children["place-address"].textContent = results[0].formatted_address;
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                            map.setZoom((marker_zoom.length > 0)?16:5);
                        }
                    }
                });
            //});
            
            if(marker_draggable.length > 0){
                google.maps.event.addListener(marker, "dragend", () => {
                    geocoder.geocode({
                        'latLng': marker.getPosition()
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                          if (results[0]) {
                            infowindowContent.children["place-address"].textContent = results[0].formatted_address;
                            infowindow.open(map, marker);
                            map.setCenter(marker.getPosition());
                            //map.setZoom(16);
                            $('#address').val(results[0].formatted_address);
                            //console.log(marker.getPosition().lat());
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                          }
                        }
                    });
                });
            }
            
            
              
            searchBox.addListener("place_changed", () => {
                infowindow.close();
                marker.setVisible(false);
                const place = searchBox.getPlace();
                if (!place.geometry || !place.geometry.location) {
                  // User entered the name of a Place that was not suggested and
                  // pressed the Enter key, or the Place Details request failed.
                  return;
                }
            
                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
                } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(19);
                }
                
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);
                
                //console.log(place.geometry.location.lat());
                //console.log(place.geometry.location.lng());
                
                infowindowContent.children["place-name"].textContent = place.name;
                infowindowContent.children["place-address"].textContent = place.formatted_address;
                infowindow.open(map, marker);
                $('#latitude').val(place.geometry.location.lat());
                $('#longitude').val(place.geometry.location.lng());
                $('#address').val(place.formatted_address);
              });
        
	    },
	};
	
	APP.LocationMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-01').data('position'))?$('#map-01').data('position'):AUCKLAND;
            var icon = ($('#map-01').data('icon-marker'))?$('#map-01').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-01"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
	    },
	};
	
	APP.DirectionMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-06').data('position'))?$('#map-06').data('position'):AUCKLAND;
            var icon = ($('#map-06').data('icon-marker'))?$('#map-06').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-06"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            const infowindowContent = document.getElementById("infowindow-content");
            const marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var place_id = '';
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        place_id = results[0].place_id;
                        infowindow.close();
                        infowindowContent.children["place-address"].textContent = results[0].formatted_address;
                        infowindow.setContent(infowindowContent);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                        new AutocompleteDirectionsHandler(map, place_id);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            place_id = results[0].place_id;
                            infowindow.close();
                            infowindowContent.children["place-address"].textContent = results[0].formatted_address;
                            infowindow.setContent(infowindowContent);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
	    },
	};
	class AutocompleteDirectionsHandler {
        map;
        originPlaceId;
        destinationPlaceId;
        travelMode;
        directionsService;
        directionsRenderer;
        constructor(map, place_id) {
            this.map = map;
            this.originPlaceId = place_id;
            this.destinationPlaceId = "";
            this.travelMode = google.maps.TravelMode.WALKING;
            this.directionsService = new google.maps.DirectionsService();
            this.directionsRenderer = new google.maps.DirectionsRenderer();
            this.directionsRenderer.setMap(map);
            
            var options = {
                componentRestrictions: {country: 'NZ'}
            };
            
            const originInput = document.getElementById("origin-input");
            const destinationInput = document.getElementById("destination-input");
            const modeSelector = document.getElementById("mode-selector");
            // Specify just the place data fields that you need.
            const originAutocomplete = new google.maps.places.Autocomplete(
                originInput,options,
                { fields: ["place_id"] }
            );
            // Specify just the place data fields that you need.
            const destinationAutocomplete = new google.maps.places.Autocomplete(
                destinationInput,options,
                { fields: ["place_id"] }
            );
            this.setupClickListener(
                "changemode-walking",
                google.maps.TravelMode.WALKING
            );
            this.setupClickListener(
                "changemode-transit",
                google.maps.TravelMode.TRANSIT
            );
            this.setupClickListener(
                "changemode-driving",
                google.maps.TravelMode.DRIVING
            );
            this.setupPlaceChangedListener(originAutocomplete, "ORIG");
            this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
                destinationInput
            );
            this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
        }
        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        setupClickListener(id, mode) {
            const radioButton = document.getElementById(id);
            radioButton.addEventListener("click", () => {
                this.travelMode = mode;
                this.route();
            });
        }
        setupPlaceChangedListener(autocomplete, mode) {
            autocomplete.bindTo("bounds", this.map);
            autocomplete.addListener("place_changed", () => {
                const place = autocomplete.getPlace();
                if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    $.toast({
                	    heading: 'Please select an option from the dropdown list.',
                		text: ' ',
                		position: 'top-right',
                		loaderBg: '#ff6849',
                		icon: 'warning',
                		hideAfter: 3500,
                		stack: 6
                	});
                    return;
                }
                if (mode === "ORIG") {
                    this.originPlaceId = place.place_id;
                } else {
                    this.destinationPlaceId = place.place_id;
                }
                this.route();
            });
        }
        route() {
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            const me = this;
            this.directionsService.route(
                {
                    origin: { placeId: this.originPlaceId },
                    destination: { placeId: this.destinationPlaceId },
                    travelMode: this.travelMode,
                },
                (response, status) => {
                    if (status === "OK") {
                      me.directionsRenderer.setDirections(response);
                    } else {
                      $.toast({
                			heading: 'Directions request failed',
                			text: status,
                			position: 'top-right',
                			loaderBg: '#ff6849',
                			icon: 'error',
                			hideAfter: 3500,
                			stack: 6
                	  });
                    }
                }
            );
        }
    };
    
    APP.NearByRestMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-02').data('position'))?$('#map-02').data('position'):AUCKLAND;
            var icon = ($('#map-02').data('icon-marker'))?$('#map-02').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-02"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
            var count ;
            for (count = 0; count < rest_locations.length; count++) {
                const icon = base_url + 'uploads/google-marker-06.png';
                const image = {
                    url: base_url + "uploads/google-marker-06.png",
                    size: new google.maps.Size(26, 37),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32),
                };
                const marker = new google.maps.Marker({
                  position: new google.maps.LatLng(rest_locations[count][1], rest_locations[count][2]),
                  map: map,
                  //title: rest_locations[count][0],
                  icon: icon,
                  title: `${count + 1}. ${rest_locations[count][0]}`,
                  label: `${count + 1}`,
                  optimized: false,
                });
                google.maps.event.addListener(marker, 'click', (function (marker, count) {
                  return function () {
                    infowindow.setContent(rest_locations[count][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, count));
            } 
	    },
	};
	
	APP.NearBySclMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-03').data('position'))?$('#map-03').data('position'):AUCKLAND;
            var icon = ($('#map-03').data('icon-marker'))?$('#map-03').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-03"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
            var count ;
            for (count = 0; count < scl_locations.length; count++) {
                const icon = base_url + 'uploads/google-marker-06.png';
                const image = {
                    url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    size: new google.maps.Size(20, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32),
                };
                const marker = new google.maps.Marker({
                  position: new google.maps.LatLng(scl_locations[count][1], scl_locations[count][2]),
                  map: map,
                  //title: scl_locations[count][0],
                  icon: icon,
                  title: `${count + 1}. ${scl_locations[count][0]}`,
                  label: `${count + 1}`,
                  optimized: false,
                });
                google.maps.event.addListener(marker, 'click', (function (marker, count) {
                  return function () {
                    infowindow.setContent(scl_locations[count][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, count));
            } 
	    },
	};
	
	APP.NearByHosMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-04').data('position'))?$('#map-04').data('position'):AUCKLAND;
            var icon = ($('#map-04').data('icon-marker'))?$('#map-04').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-04"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
            var count ;
            for (count = 0; count < hos_locations.length; count++) {
                const icon = base_url + 'uploads/google-marker-06.png';
                const image = {
                    url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    size: new google.maps.Size(20, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32),
                };
                const marker = new google.maps.Marker({
                  position: new google.maps.LatLng(hos_locations[count][1], hos_locations[count][2]),
                  map: map,
                  //title: hos_locations[count][0],
                  icon: icon,
                  title: `${count + 1}. ${hos_locations[count][0]}`,
                  label: `${count + 1}`,
                  optimized: false,
                });
                google.maps.event.addListener(marker, 'click', (function (marker, count) {
                  return function () {
                    infowindow.setContent(hos_locations[count][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, count));
            } 
	    },
	};
	
	APP.NearByTransMap = {
	    init: function () {
	        let map;
	        const NEW_ZEALAND_BOUNDS = {
              north: -34.36,
              south: -47.35,
              west: 166.28,
              east: -175.81,
            };
            var AUCKLAND = { lat: -37.06, lng: 174.58 };
            var myLatlng = ($('#map-05').data('position'))?$('#map-05').data('position'):AUCKLAND;
            var icon = ($('#map-05').data('icon-marker'))?$('#map-05').data('icon-marker'):'https://maps.gstatic.com/mapfiles/place_api/icons/v2/civic-bldg_pinlet.svg';
    	    map = new google.maps.Map(document.getElementById("map-05"), {
    	        mapTypeControl: false,
                center: AUCKLAND,
                restriction: {
                  latLngBounds: NEW_ZEALAND_BOUNDS,
                  strictBounds: false,
                },
                zoom: 13,
            });
            const infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map,
                anchorPoint: new google.maps.Point(0, -29),
                position: myLatlng,
                icon: icon,
            });
            marker.setVisible(true);
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'latLng': myLatlng
                }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        map.setCenter(myLatlng);
                    }
                }
            });
            google.maps.event.addListener(marker, "click", () => {
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                            map.setCenter(myLatlng);
                        }
                    }
                });
            });
            var count ;
            for (count = 0; count < trans_locations.length; count++) {
                const icon = base_url + 'uploads/google-marker-06.png';
                const image = {
                    url: "https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png",
                    size: new google.maps.Size(20, 32),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(0, 32),
                };
                const marker = new google.maps.Marker({
                  position: new google.maps.LatLng(trans_locations[count][1], trans_locations[count][2]),
                  map: map,
                  //title: trans_locations[count][0],
                  icon: icon,
                  title: `${count + 1}. ${trans_locations[count][0]}`,
                  label: `${count + 1}`,
                  optimized: false,
                });
                google.maps.event.addListener(marker, 'click', (function (marker, count) {
                  return function () {
                    infowindow.setContent(trans_locations[count][0]);
                    infowindow.open(map, marker);
                  }
                })(marker, count));
            } 
	    },
	};
    
	APP.invoice = {
		init: function () {
			this.checkAllListing();
			this.addItem();
			this.deleteItem();
			this.currencySelect();
			this.taxSelect();
			this.discountSelect();
			this.printInvoice();
			this.sortingInvoice();

		},
		checkAllListing: function () {
			var $parent_check = $('.chk-parent');
			if ($parent_check.length < 1) {
				return;
			}
			var $child_checks = $('.child-chk');

			$parent_check.on('click', function () {
				$child_checks.prop('checked', $(this).prop('checked'));
			});

		},
		addItem: function () {
			var $btn_add = $('.btn-invoice-add-item');
			if ($btn_add.length < 1) {
				return;
			}
			$btn_add.on('click', function (e) {
				e.preventDefault();
				$('.item-table tbody').append('<tr>\n' +
					'                                                    <td class="delete-item-row d-block d-md-table-cell w-100 w-md-auto">\n' +
					'                                                        <ul class="table-controls list-unstyled">\n' +
					'                                                            <li><a href="javascript:void(0);" class="delete-item"\n' +
					'                                                                   data-toggle="tooltip" data-placement="top" title=""\n' +
					'                                                                   data-original-title="Delete">\n' +
					'                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"\n' +
					'                                                                     height="24"\n' +
					'                                                                     viewBox="0 0 24 24" fill="none"\n' +
					'                                                                     stroke="currentColor"\n' +
					'                                                                     stroke-width="2" stroke-linecap="round"\n' +
					'                                                                     stroke-linejoin="round"\n' +
					'                                                                     class="feather feather-x-circle">\n' +
					'                                                                    <circle cx="12" cy="12" r="10"></circle>\n' +
					'                                                                    <line x1="15" y1="9" x2="9" y2="15"></line>\n' +
					'                                                                    <line x1="9" y1="9" x2="15" y2="15"></line>\n' +
					'                                                                </svg>\n' +
					'                                                            </a></li>\n' +
					'                                                        </ul>\n' +
					'                                                    </td>\n' +
					'                                                    <td class="description d-block d-md-table-cell w-100 w-md-auto"><input type="text"\n' +
					'                                                                                   class="form-control border-0 shadow-none form-control-lg mb-3"\n' +
					'                                                                                   placeholder="Item Name" name="description[]">\n' +
					'                                                        <select class="form-control border-0 shadow-none form-control-lg"\n' +
					'                                                                title="Select"\n' +
					'                                                                id="country" name="unit[]">\n' +
					'                                                            <option>Select your unit</option>\n' +
					'                                                            <option>Hours</option>\n' +
					'                                                            <option>Months</option>\n' +
					'                                                        </select>\n' +
					'                                                    </td>\n' +
					'                                                    <td class="rate d-inline-block d-md-table-cell">\n' +
					'                                                        <input type="text"\n' +
					'                                                               class="form-control border-0 shadow-none form-control-lg"\n' +
					'                                                               placeholder="Price" name="price[]">\n' +
					'                                                    </td>\n' +
					'                                                    <td class="text-md-right qty d-inline-block d-md-table-cell"><input type="text"\n' +
					'                                                                                      class="form-control border-0 shadow-none form-control-lg"\n' +
					'                                                                                      placeholder="Quantity" name="quality[]"></td>\n' +
					'                                                    <td class="text-md-right amount d-inline-block d-md-table-cell"><span class="editable-amount"><span\n' +
					'                                                            class="currency">$</span> <span class="amount">100.00</span></span>\n' +
					'                                                    </td>\n' +
					'                                                    <td class="text-md-center tax d-inline-block d-md-table-cell">\n' +
					'                                                        <div class="n-chk">\n' +
					'                                                            <label class="new-control new-checkbox new-checkbox-text checkbox-primary h-18 mx-auto my-0">\n' +
					'                                                                <input type="checkbox" class="new-control-input" name="tax[]">\n' +
					'                                                                <span class="d-inline-block d-md-none">Tax</span>\n' +
					'                                                            </label>\n' +
					'                                                        </div>\n' +
					'                                                    </td>\n' +
					'                                                </tr>')

			});

		},
		deleteItem: function () {
			$document.on('click', '.delete-item', function (e) {
				e.preventDefault();
				$(this).parents('tr').remove();

			});

		},
		currencySelect: function () {
			var $currency_select = $('.invoice-select-currency');
			if ($currency_select.length < 1) {
				return;
			}
			var $dropdown_toggle = $currency_select.find('.dropdown-toggle');
			var $toggle_text = $dropdown_toggle.find('.selectable-text');
			var $toggle_image = $dropdown_toggle.find('.image-flag');
			var $items = $currency_select.find('.dropdown-item');
			$items.each(function () {
				$(this).on('click', function (e) {
					e.preventDefault();
					var $self = $(this);
					$toggle_text.text($self.find('.selectable-text').text());
					$toggle_image.html($self.find('.image-flag').html());
					$('.invoice-action-currency input[name=currency]').attr('value', $self.data('value'));
				})

			});


		},
		taxSelect: function () {
			var $tax_select = $('.invoice-tax-select');
			if ($tax_select.length < 1) {
				return;
			}
			var $dropdown_toggle = $tax_select.find('.dropdown-toggle');
			var $toggle_text = $dropdown_toggle.find('.selectable-text');
			var $items = $tax_select.find('.dropdown-item');
			$items.each(function () {
				$(this).on('click', function (e) {
					e.preventDefault();
					var $self = $(this);
					$toggle_text.text($self.text());
					$('input[name=tax-rate]').attr('value', $self.data('value'));
					if ($self.data('value') !== 0) {
						$('.tax-rate').css('display', 'block');
					} else {
						$('.tax-rate').css('display', 'none');
					}
				})

			});


		},
		discountSelect: function () {
			var $discount_select = $('.invoice-discount-select');
			if ($discount_select.length < 1) {
				return;
			}
			var $dropdown_toggle = $discount_select.find('.dropdown-toggle');
			var $toggle_text = $dropdown_toggle.find('.selectable-text');
			var $items = $discount_select.find('.dropdown-item');
			$items.each(function () {
				$(this).on('click', function (e) {
					e.preventDefault();
					var $self = $(this);
					$toggle_text.text($self.text());
					$('input[name=discount-rate]').attr('value', $self.data('value'));
					if ($self.data('value') !== 0) {
						$('.discount-amount').css('display', 'block');
					} else {
						$('.discount-amount').css('display', 'none');
					}
				})

			});


		},
		printInvoice: function () {
			$('.invoice-action-print').on('click', function () {
				window.print();
			});

		},
		sortingInvoice: function () {
			var $table = $('#invoice-list');
			$table.DataTable({
				"order": [],
				"paging": false,
				"searching": false,
				"info": false,
				"columnDefs": [
					{ "orderable": false, "targets": 0 },
					{
					"targets": 'no-sort',
					"orderable": false
				} ]
			});

		}

	};
	APP.report = {
		init: function () {
			this.printReport();
			this.downlodReport();
		},
		printReport: function () {
			$('.report-print').on('click', function () {
				window.print();
			});
		},
		downlodReport: function () {
			$('.report-download').on('click', function () {
				swal({icon: 'warning', title: 'Capturing', text: 'Please wait capture report', showCancelButton: false, buttons: false, closeOnConfirm: false, closeOnCancel: false });
                html2canvas(document.querySelector("#download-report"),{ scale:3 }).then(canvas => {
                    var link = document.createElement('a');
                    link.download = $('title').text() + '.png';
                    link.href = canvas.toDataURL("image/png");
                    link.click();
                    swal.close();
                });
			});
		},

	};
	APP.package = {
		init: function () {
			this.sortingTable();
		},
		sortingTable: function () {
			var $table = $('#package-list');
			var dTable = $table.DataTable({
				"order": [],
				"lengthChange": false,
				"paging": true,
				"searching": true,
				"info": true,/*
				"columnDefs": [
					{ "orderable": false, "targets": 0 },
					{
					"targets": 'no-sort',
					"orderable": false
				} ] */
				"dom":"lrtip"
			});
    		$('#searchBox').keyup(function(){  
                dTable.search($(this).val()).draw();
            });
    		$('#sortBy').change(function(){ 
    		    var label = $(this).val();
    		    if(label != '' && label == 'alphabet')
    		        dTable.order([0, 'asc']);
    		    if(label != '' && label == 'price-low')
    		        dTable.order([6, 'asc']);
    		    if(label != '' && label == 'price-high')
    		        dTable.order([6, 'desc']);
    		    if(label != '' && label == 'date-old')
    		        dTable.order([5, 'asc']);
    		    if(label != '' && label == 'date-new')
    		        dTable.order([5, 'desc']);
    		    dTable.draw();
            });
		}
	};
	APP.properties = {
		init: function () {
			this.sortingTable();
		},
		sortingTable: function () {
			var $table = $('#properties-list');
			var dTable = $table.DataTable({
				"order": [],
				"lengthChange": false,
				"paging": true,
				"searching": true,
				"info": true,/*
				"columnDefs": [
					{ "orderable": false, "targets": 0 },
					{
					"targets": 'no-sort',
					"orderable": false
				} ] */
				"dom":"lrtip"
			});
    		$('#searchBox').keyup(function(){  
                dTable.search($(this).val()).draw();
            });
    		$('#sortBy').change(function(){ 
    		    var label = $(this).val();
    		    if(label != '' && label == 'alphabet')
    		        dTable.order([0, 'asc']);
    		    if(label != '' && label == 'price-low')
    		        dTable.order([0, 'asc']);
    		    if(label != '' && label == 'price-high')
    		        dTable.order([0, 'desc']);
    		    if(label != '' && label == 'date-old')
    		        dTable.order([1, 'asc']);
    		    if(label != '' && label == 'date-new')
    		        dTable.order([1, 'desc']);
    		    dTable.draw();
            });
		}
	};
	APP.schedules = {
		init: function () {
			this.sortingTable();
		},
		sortingTable: function () {
		    var fullDate = new Date();
		    var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		    var currentDate = fullDate.getFullYear() + "-" + twoDigitMonth + "-" + fullDate.getDate();
			var $table = $('#schedules-list');
			var dTable = $table.DataTable({
                //"order": [[2, 'desc']],
				"lengthChange": false,
				"paging": true,
				"searching": true,
				"info": true,
				"pageLength": 5,
				"columnDefs": [
                    {
                        target: [3],
                        visible: false,
                        searchable: true
                    } 
                ],
				"dom":"lrtip"
			});
			var numRows = dTable.rows( ).count();
			$('#schedules-count').text(numRows);
    		$('#searchBox').keyup(function(){  
                dTable.search($(this).val()).draw();
            });
    		$('#sortBy').change(function(){ 
    		    var label = $(this).val();
    		    if(label != '' && label == 'today')
    		        dTable.search(currentDate).draw();
    		    else
    		    {
    		        dTable.search('');
                    dTable.columns().search('').draw();
    		    }
    		    if(label != '' && label == 'alphabet')
    		        dTable.order([0, 'asc']);
    		    if(label != '' && label == 'price-low')
    		        dTable.order([0, 'asc']);
    		    if(label != '' && label == 'price-high')
    		        dTable.order([0, 'desc']);
    		    if(label != '' && label == 'date-old')
    		        dTable.order([2, 'asc']);
    		    if(label != '' && label == 'date-new')
    		        dTable.order([2, 'desc']);
    		    dTable.draw();
            });
		}
	};
	APP.addSchedules = {
		init: function () {
			this.sortingTable();
			this.addTable();
		},
		addTable: function () {
		    var $table = $('#addedSchedules-list');
			var dTable = $table.DataTable();
			$(document).on("click", "#addschedule", function() {
			    var $this = $(this);
			    var action = $this.closest('#schedule-form').data('action');
			    var sdate = $('#sdate').val();
			    var sfrom = $('#sfrom').val();
			    var sto = $('#sto').val();
			    if(sdate == '')
			        return $('.sdate').text('The Date field is required');
			    else
			        $('.sdate').text('');
			    if(sfrom == '')
			        return $('.sfrom').text('The From field is required');
			    else
			        $('.sfrom').text('');
			    if(sto == '')
			        return $('.sto').text('The To field is required');
			    else
			        $('.sto').text('');
			    if(sdate != '' && sfrom != '' && sto != '')
			    {
			        var csrf = $("input[name='8i5PtJZ5g8']").val();
			        $.post(action,{ sdate:sdate, sfrom: sfrom, sto: sto, '8i5PtJZ5g8': csrf }).done(function(res) {
			            res = JSON.parse(res);
                        if(res.alert == 'success')
                        {
                            const tr = $(res.tr);
                            dTable.row.add(tr[0]).draw();
                            dTable.order( [1,'desc'] ).draw();
                            dTable.order( [0,'desc'] ).draw();
                            $('#sdate').val('');
                            $('#sfrom').val('');
                            $('#sto').val('');
                        }
                        swal({
                            icon: res.alert,
                            title: res.heading,
                            text: res.msg,
                            showCancelButton: false,
                            buttons: false,
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            timer: 2000
                        });
			        });
			    }
			});
		},
		sortingTable: function () {
		    var $table = $('#addedSchedules-list');
			var dTable = $table.DataTable({pageLength: 5});
			$(document).on('click', '.delete-schedule', function () {
			    var $this = $(this);
                var id = $this.data('id');
                var property = $this.data('property');
			    swal("Enter reason:", {
                    content: "input",
                })
                .then((reason) => {
                    if(reason != '' && reason != null)
                    {
                        $.get(base_url + 'myaccount/cancelschedule/' + property,{ id:id, reason: reason }).done(function(res) {
                            res = JSON.parse(res);
                            if(res.alert == 'success')
                            {
                                //dTable.row($this.parents('tr')).remove().draw();
                                $this.closest('td').html('<p class="text-danger">'+ reason +'</p>');
                            }
                            swal({
                                icon: res.alert,
                                title: res.heading,
                                text: res.msg,
                                showCancelButton: false,
                                buttons: false,
                                closeOnConfirm: false,
                                closeOnCancel: false,
                                timer: 2000
                            });
                        });
                    }
                });
            });
		}
	};
    APP.commercialPriceSlider =  {
        init: function () {
			this.commercialPriceSlider();
		},
		commercialPriceSlider: function (){
            var $val = $('#price_duration').val();
            if($val === 'Negotiation')
            {
                $('#commercial_price').attr('disabled','disabled');
                $('#commercial_price_slider').find('.ui-slider').attr('class','ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content ui-slider-disabled ui-state-disabled');
            }
            else
            {
                $('#commercial_price').removeAttr('disabled');
                $('#commercial_price_slider').find('.ui-slider').attr('class','ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content');
            }
		}
    };
	$(document).on('change','#type', function(e){
	    e.preventDefault();
	    var $this = $(this);
	    var value = $this.val();
	    if(value === 'residential')
	    {
	        $('.residential').addClass('d-block');
	        $('.residential').removeClass('d-none');
	        $('.commercial').addClass('d-none');
	        $('.commercial').removeClass('d-block');
	       // $('#property-type').html('<option value="apartment">Apartment</option><option value="house">House</option><option value="villa">Villa</option><option value="unit">Unit</option><option value="holidayrental">Holiday Rental</option><option value="lifestyleproperty">Lifestyle Property</option><option value="rooms">Rooms</option><option value="studio">Studio</option><option value="townhouse">Townhouse</option><option value="others">Others</option>');
	    }
	    else
	    {
	        $('.commercial').addClass('d-block');
	        $('.commercial').removeClass('d-none');
	        $('.residential').addClass('d-none');
	        $('.residential').removeClass('d-block');
	       // $('#property-type').html('<option value="farm">Farm</option><option value="industrial">Industrial</option><option value="landsection">Land/Section</option><option value="motelhotel">Motel/Hotel</option><option value="office">Office</option><option value="parkingspace">Parking Space</option><option value="retail">Retail</option><option value="showroom">Showroom</option><option value="warehouse">Warehouse</option><option value="others">Others</option>');
	    }
	    $("#property-type").selectpicker('refresh');
	});
	if($('#type').length)
	{
	    $('#type').change();
	}
	$(document).on('change','.addons', function(e){
	    e.preventDefault();
	    var $this = $(this);
	    var value = 0;
	    var addons = '';
	    var property = ($('#property').length)?parseInt($('#property').data('value')):0;
        if(property === 0)
	    {
	       if($('#boost').is(':checked')) {
	            var name = $('#boost').data('name');
    	        var addonPrice = parseInt($('#boost').data('value'));
                value = value+addonPrice;
                addons = addons+'<div class="row"><div class="col-9"><p class="mb-1 text-right text-capitalize">'+name+' Charges: </p></div><div class="col-3"><p class="mb-1 text-left">'+currency+addonPrice+'</p></div></div>';
	       }
	    }
	    else
	    {
    	    $('.addons:checked').each(function(){
    	        var name = $(this).data('name');
    	        var addonPrice = parseInt($(this).data('value'));
                value = value+addonPrice;
                addons = addons+'<div class="row"><div class="col-9"><p class="mb-1 text-right text-capitalize">'+name+' Charges: </p></div><div class="col-3"><p class="mb-1 text-left">'+currency+addonPrice+'</p></div></div>';
            });
	    }
        value = property+value;
        $('#addons').html(addons);
	    $('#subtotal').text(currency+''+value);
	    $('#total').text(currency+''+value);
	});
    $(document).on('submit','#nzform',function(e){
        e.preventDefault();
        var thisId = $(this);
        var btn = thisId.find("#nz-submit");
        var submit = btn.html();
        btn.html('<i class="fa fa-spinner fa-spin"></i>');
        var action = $(this).attr('data-action');
        var formData = new FormData(thisId[0]);
        $.ajax({
            type:'POST',
            url: action,  
            dataType : 'JSON',
            data: formData,
            // async: false,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                btn.html('<i class="fa fa-spinner fa-spin"></i>');
                btn.attr('disabled','disabled');
            },
            success: function(res){
                thisId.find('.form-group').removeClass('has-danger');
                thisId.find('.form-control').removeClass('form-control-danger');
                thisId.find('.form-text').text('');
                if(!res[0].alert)
                {
                    var errorCount = 1;
                    var click = 0;
                    $.each(res, function(i, item) {
                        if(res[i].error != '')
                        {
                            thisId.find('.' + res[i].class).closest('.form-group').addClass('has-danger');
                            thisId.find('.' + res[i].class).closest('.form-group').find('.form-control').addClass('form-control-danger');
                            thisId.find('.' + res[i].class).html(res[i].error);
                            if(errorCount === 1)
                            {
                                if(thisId.find('.' + res[i].class).closest('#propertyinfo').length)
                                    thisId.find('#propertyinfo-tab').trigger('click');
                                else if(thisId.find('.' + res[i].class).closest('#locationprice').length)
                                    thisId.find('#locationprice-tab').trigger('click');
                                else if(thisId.find('.' + res[i].class).closest('#mediaamenities').length)
                                    thisId.find('#mediaamenities-tab').trigger('click');
                                thisId.find('#' + res[i].class).focus();
                            }
                            errorCount++;
                        }
                        else
                        {
                            thisId.find('.' + res[i].class).closest('.form-group').removeClass('has-danger');
                            thisId.find('.' + res[i].class).closest('.form-group').find('.form-control').removeClass('form-control-danger');
                            thisId.find('.' + res[i].class).html('');
                        }
                    });
                }
                else
                { 
                    if(res[0].redirect)
                        window.location.href = res[0].redirect;
                    if(res[0].reset && res[0].reset == 'yes')
                        thisId[0].reset();
                    if(res[0].captcha && res[0].captcha == 'yes')
                        captcha();
                    if(res[0].loadurl)
                        fetch(res[0].loadurl).then(x => x.text()).then(y => (y !== '')?($('.add-list-register').find('#hide-register-data').hide(),$('.add-list-register').find('#show-packages').html(y)):$('.add-list-register').find('#hide-register-data').show());
                    if(res[0].clear && res[0].clear == 'yes')
                    {
                        $('.add-list-register').find('#hide-register-data').show();
                        $('.add-list-register').find('#show-packages').html('');
                    }
                    if(res[0].alert != 'none')
                    {
                        swal({
                            icon: res[0].alert,
                            title: res[0].heading,
                            text: res[0].msg,
                            showCancelButton: false,
                            buttons: false,
                            closeOnConfirm: false,
                            closeOnCancel: false,
                            timer: 2000
                        });
                    }
                }
                btn.removeAttr('disabled');
                btn.html(submit);
            },
            error: function(error,s) {
                console.log(error.responseText);
                btn.removeAttr('disabled');
                btn.html(submit);        
            }
        });
    });
    $(document).on('click','.show-password',function(e){
        e.preventDefault();
        var currentType = $(this).closest('.form-group').find('#password').attr('type');
        var setCurrentType = (currentType === 'password') ? 'text' : 'password';
        var setIcon = (currentType === 'password') ? '<i class="far fa-eye"></i>' : '<i class="far fa-eye-slash"></i>';
        $(this).closest('.form-group').find('#password').attr('type',setCurrentType);
        $(this).find('.input-group-text').html(setIcon);
    });
    $(document).on('change','#region, #commercial_region, #mobile_region',function(e){
        e.preventDefault();
        var thisId = $(this);
        var IdName = thisId.attr("id");
        districts(IdName);
        suburbs(IdName);
    });    
    $(document).on('change','#district, #commercial_district, #mobile_district',function(e){
        e.preventDefault();
        var thisId = $(this);
        suburbs();
    }); 
    $(document).on('click','.copy-schedule',function(e){
        e.preventDefault();
        var dis = this;
        var row = $(dis).closest('tr');
        var sfrom = row.find('#sfrom').val();
        var sto = row.find('#sto').val();
        var slots = row.find('#slots').val();
        var jsonData = { "sfrom" : sfrom, "sto" : sto, "slots" : slots };
        jsonData = JSON.stringify(jsonData);
        navigator.clipboard.writeText(jsonData).then( success => '', err => console.error('Schedule: Could not copy time: ', err));
    });
    $(document).on('click','.paste-schedule',function(e){
        e.preventDefault();
        var dis = this;
        var row = $(dis).closest('tr');
        var schedule = '';
        navigator.clipboard.readText().then( cliptext => (schedule = JSON.parse(cliptext), row.find('#sfrom').val(schedule.sfrom), row.find('#sto').val(schedule.sto), row.find('#slots').val(schedule.slots)), err => console.log(err) );
    });
    $(document).on('click','.paste-schedule-all',function(e){
        e.preventDefault();
        var dis = this;
        var schedule = '';
        $(".table-shcedule tbody tr").each(function( i ) { 
            var row = $(this);
            navigator.clipboard.readText().then( cliptext => (schedule = JSON.parse(cliptext), row.find('#sfrom').val(schedule.sfrom), row.find('#sto').val(schedule.sto), row.find('#slots').val(schedule.slots)), err => console.log(err) );
        });
    });
    $(document).on('click','.remove-schedule',function(e){
        e.preventDefault();
        var dis = this;
        var row = $(dis).closest('tr');
        var schedule = '';
        row.find('#sfrom').val(''), row.find('#sto').val(''), row.find('#slots').val('');
    });
    $(document).on('click','.remove-schedule-all',function(e){
        e.preventDefault();
        var dis = this;
        var schedule = '';
        $(".table-shcedule tbody tr").each(function( i ) { 
            var row = $(this);
            row.find('#sfrom').val(''), row.find('#sto').val(''), row.find('#slots').val('');
        });
    });
    function districts(IdName = null){
        $.ajax({
            type : 'GET',
            url : base_url + 'lists/districts',
            dataType : 'html',
            data: {
                region : (IdName != null)?$('#'+IdName).val():$("#region").val()
            },
            success : function(res){
                if(IdName === 'region')
                {
                    $("#district").html(res);
                    $("#district").selectpicker('refresh');
                }
                else if(IdName === 'commercial_region')
                {
                    $("#commercial_district").html(res);
                    $("#commercial_district").selectpicker('refresh');
                }
                else if(IdName === 'mobile_region')
                {
                    $("#mobile_district").html(res);
                    $("#mobile_district").selectpicker('refresh');
                }
                else
                {
                    $("#district").html(res);
                    $("#district").selectpicker('refresh');
                }
            },
            error: function(error,s) {
                console.log(error.responseText);
            }
        }); 
    }
    function suburbs(IdName = null){
        $.ajax({
            type : 'GET',
            url : base_url + 'lists/suburbs',
            dataType : 'html',
            data: {
                region : (IdName != null)?$('#'+IdName).val():$("#region").val(),
                district : (IdName != null)?((IdName === 'region')?$("#district").val():((IdName === 'commercial_region')?$("#commercial_district").val():((IdName === 'mobile_region')?$("#mobile_district").val():($("#district").val())))):$("#district").val(),
            },
            success : function(res){
                if(IdName === 'region')
                {
                    $("#suburb").html(res);
                    $("#suburb").selectpicker('refresh');
                }
                else if(IdName === 'commercial_region')
                {
                    $("#commercial_suburb").html(res);
                    $("#commercial_suburb").selectpicker('refresh');
                }
                else if(IdName === 'mobile_region')
                {
                    $("#mobile_suburb").html(res);
                    $("#mobile_suburb").selectpicker('refresh');
                }
                else
                {
                    $("#suburb").html(res);
                    $("#suburb").selectpicker('refresh');
                }
            },
            error: function(error,s) {
                console.log(error.responseText);
            }
        }); 
    }
    $(document).on('click','.wishlist',function(e){
        e.preventDefault();
        var $this = $(this);
        var key = $(this).attr('id');
        var $class = $('#'+key+'.wishlist');
        if(logged)
        {
            $.getJSON(base_url+"myaccount/favorites", { key: key, type: "json" } )
              .done(function(res) {
                  if(res.alert == 'success')
                  {
                      if(res.active)
                      {
                        if($this.hasClass('rounded-circle'))
                        {
                            $this.removeClass('text-body');
                            $this.removeClass('hover-secondary');
                            $this.removeClass('bg-hover-accent');
                            $this.removeClass('border-hover-accent');
                            $this.addClass('text-secondary');
                            $this.addClass('bg-accent');
                            $this.addClass('border-accent');
                        }
                        $class.html('<i class="fas fa-heart"></i>');
                        $('#'+key+'.wishlist-text').html('<i class="fas fa-heart mr-2 fs-15 text-primary"></i> '+res.text);
                      }
                      else
                      {
                        if($this.hasClass('rounded-circle'))
                        {
                            $this.removeClass('text-secondary');
                            $this.removeClass('bg-accent');
                            $this.removeClass('border-accent');
                            $this.addClass('text-body');
                            $this.addClass('hover-secondary');
                            $this.addClass('bg-hover-accent');
                            $this.addClass('border-hover-accent');
                        }
                        ((res.delete && res.delete == true && $this.closest('.favorite').length > 0)?$this.closest('.favorite').remove():'');
                        $class.html('<i class="far fa-heart"></i>');
                        $('#'+key+'.wishlist-text').html('<i class="far fa-heart mr-2 fs-15 text-primary"></i> '+res.text);
                      }
                    $('#favorite.favorite').html(res.count);
                  }
                  $.toast({
        			heading: res.heading,
        			text: res.msg,
        			position: 'top-right',
        			loaderBg: '#ff6849',
        			icon: res.alert,
        			hideAfter: 3500,
        			stack: 6
        		});
              })
              .fail(function( jqxhr, textStatus, error ) {
                $.toast({
        			heading: 'Please Try Again',
        			text: 'Something Went Wrong.',
        			position: 'top-right',
        			loaderBg: '#ff6849',
        			icon: 'error',
        			hideAfter: 3500,
        			stack: 6
        		});
            });
        }
        else
        {
            $.toast({
    			heading: 'Please Login',
    			text: 'Login First to Add Property in  Wishlist.',
    			position: 'top-right',
    			loaderBg: '#ff6849',
    			icon: 'warning',
    			hideAfter: 3500,
    			stack: 6
    		});
    		if($('.user-register-modal').length)
    		    $('.user-register-modal').modal('show');
        }
    });
    $(document).on("click", ".print", function() {
        swal({icon: 'warning', title: 'Capturing', text: 'Please wait capture property', showCancelButton: false, buttons: false, closeOnConfirm: false, closeOnCancel: false });
        html2canvas(document.querySelector("#single-property"),{ scale:3 }).then(canvas => {
            var link = document.createElement('a');
            link.download = $('title').text() + '.png';
            link.href = canvas.toDataURL("image/png");
            link.click();
            swal.close();
        });
    });
    $(document).on("click", ".invoice-download", function() {
        swal({icon: 'warning', title: 'Downloading', text: 'Please wait...', showCancelButton: false, buttons: false, closeOnConfirm: false, closeOnCancel: false });
        html2canvas(document.querySelector(".main-invoice-info"),{ scale:3 }).then(canvas => {
            var link = document.createElement('a');
            link.download = 'Invoice' + $('#invoice-title').text() + '.png';
            link.href = canvas.toDataURL("image/png");
            link.click();
            // var imgData = canvas.toDataURL('image/png');   
            // var doc = new jsPDF('p', 'mm');
            // doc.addImage(imgData, 'PNG', 0, 0);
            // doc.save('Invoice' + $('#invoice-title').text() + '.pdf');
            swal.close();
        });
    });
    $(document).ready(function () {
        var loading = '<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>';
        ($('#packages').length > 0)?(fetch(base_url + 'packages/list?size=big&type=company').then(x => x.text()).then(y => (y !== '')?($('#packages').find('#show-packages').html(y)):'')):''; 
        $(document).on('click', '#packages .nav-link', function(e){
            e.preventDefault();
            var $this = $(this);
            var type = $this.attr('id');
            $('#packages').find('#show-packages').html(loading)
            fetch(base_url + 'packages/list?size=big&type=' + type).then(x => x.text()).then(y => (y !== '')?($('#packages').find('#show-packages').html(y)):''); 
        });
    });
    $(document).on("change", "#register-type", function() {
        var type = $(this).val();
        if(type === 'company')
            $('.add-list-register').find('#name').attr('placeholder','Company Name');
        else
            $('.add-list-register').find('#name').attr('placeholder','Name');
    });
    $(document).on("click", ".negotiation-price", function() {
        var value = $(this).val();
        if(value === '1')
            $('.mention').hide();
        else
            $('.mention').show();
    });
    $('.schedules-modal').click(function(e){
        var id = $(this).data('id');
        
        $('#schedules-modal').modal('show');
        $('#schedules-modal').find('.modal-body').html('<div class="text-center py-5"><i class="fa fa-spinner fa-refresh fa-2x"></i></div>');
        $.get(base_url + 'myaccount/propertyschedulesview', { id: id } ).done(function( data ) {
            $('#schedules-modal').find('.modal-body').html(data);
            APP.addSchedules.init();
        });
    });
    $(document).on("change","#price_duration", function() {
        APP.commercialPriceSlider.init();
    });
    $(document).on("click",".send-schedule-link", function() {
        var $this = $(this); 
        var $link = $this.data('link');
        var $email = $this.data('email');
        var $name = $this.data('name');
        var $id = $this.data('id');
        var $visited = $this.closest('.table-row').find('.schedule-visited');
        if(($email !== '') && ($link !== ''))
        {
            $this.html('<i class="fa fa-spinner fa-spin"></i>');
            $this.tooltip('hide').attr('data-original-title', 'Sending...').tooltip('show');
            $.post(base_url + 'myaccount/sendschedulelink', { "email" : $email, "link" : $link, "name" : $name, "id" : $id }, 
                function(res){
                    if(res.alert === 'success')
                    {
                        $this.removeClass('text-muted').addClass('text-success');
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                        $visited.removeClass('text-muted').addClass('text-success');
                        $visited.attr('title',res.visited);
                        $visited.tooltip('hide').attr('data-original-title', res.visited).tooltip('show');
                    }
                    else
                    {
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                    }
            }, 'json');
            $this.html('<i class="fal fa-link"></i>');
        }
    });
    $(document).on("click",".schedule-visited", function() {
        var $this = $(this);
        var $email = $this.data('email');
        var $name = $this.data('name');
        var $id = $this.data('id');
        if($email !== '')
        {
            $this.html('<i class="fa fa-spinner fa-spin"></i>');
            $this.tooltip('hide').attr('data-original-title', 'Loading...').tooltip('show');
            $.post(base_url + 'myaccount/schedulevisited', { "email" : $email, "name" : $name, "id" : $id }, 
                function(res){
                    if(res.alert === 'success')
                    {
                        $this.removeClass('text-muted').addClass('text-success');
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                    }
                    else
                    {
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                    }
            }, 'json');
            $this.html('<i class="fal fa-check"></i>');
        }
    });
    $(document).on("click",".schedule-cancelled", function() {
        var $this = $(this);
        var $id = $this.data('id');
        if($id !== '')
        {
            $this.html('<i class="fa fa-spinner fa-spin"></i>');
            $this.tooltip('hide').attr('data-original-title', 'Loading...').tooltip('show');
            $.get(base_url + 'myaccount/schedulecancel', {"id" : $id }, 
                function(res){
                    if(res.alert === 'success')
                    {
                        $this.removeClass('text-muted').addClass('text-success');
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                        $this.html('<i class="fal fa-exclamation-circle"></i>');
                    }
                    else
                    {
                        $this.attr('title',res.heading);
                        $this.tooltip('hide').attr('data-original-title', res.heading).tooltip('show');
                        $this.html('<i class="fal fa-check"></i>');
                    }
            }, 'json');
            
        }
    });
    $(document).on("click",".agent-inactive", function(e) {
        e.preventDefault();
        var $this = $(this);
        var $url = $this.data('url');
        swal({
            title: "Are you sure to inactive this PM/Agent?",
            text: "But you will not be able to retrieve this PM/Agent.",
            type: "warning",
            showCancelButton: true,
            buttons: true,
            dangerMode: true,
            }).then((yes) => {
                if (yes) {
                    window.location.href = $url;
                } else {
                    //swal("Cancelled", "Your image file is safe :)", "error");
                    return false;
                }
        });
    });
	$(document).ready(function () {
		APP.init();
		APP.slickSlider.init();
		APP.counter.init();
		APP.util.init();
		APP.chatjs.init();
		APP.uploader.init();
		APP.uploaderUpdate.init();
		APP.CollapseTabsAccordion.init();
		APP.animation.init();
		APP.PropertySearchStatusTab.init();
		APP.ShowCompare.init();
		APP.headerSticky.init();
		APP.sidebarSticky.init();
		APP.mapbox.init();
		if($('#geocoder').length > 0)
		    APP.seachMapbox.init();
		APP.invoice.init();
		APP.package.init();
		APP.properties.init();
		APP.schedules.init();
		//APP.addSchedules.init();
		if((typeof lat != 'undefined') && (typeof lng != 'undefined') && ($('#map').length > 0))
		    APP.Map.init();
		if($('#map-01').length > 0)
		    APP.LocationMap.init();
		if($('#map-02').length > 0)
		    APP.NearByRestMap.init();
		if($('#map-03').length > 0)
		    APP.NearBySclMap.init();
		if($('#map-04').length > 0)
		    APP.NearByHosMap.init();
		if($('#map-05').length > 0)
		    APP.NearByTransMap.init();
		if($('#map-06').length > 0)
		    APP.DirectionMap.init();
		APP.commercialPriceSlider.init();
		APP.report.init();
	});
})(jQuery);

