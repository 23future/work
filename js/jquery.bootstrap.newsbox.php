
<?php require_once('pull_from_db.php'); ?>
<script>
/*
 * jQuery Bootstrap News Box v1.0.1
 * 
 * Copyright 2014, Dragan Mitrovic
 * email: gagi270683@gmail.com
 * Free to use and abuse under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */
$( document ).ready(function() {
//Utility
    if (typeof Object.create !== 'function') {
        //Douglas Crockford inheritance function
        Object.create = function (obj) {
            function F() {
            };
            F.prototype = obj;
            return new F();
        };

        function PostDetail(){
            swal("You pressed it ! ");

        }

    }

    (function ($, w, d, undefined) {

        var NewsBox = {

            init: function (options, elem) {
                //cache the references
                var self = this;
                self.elem = elem;
                self.$elem = $(elem);
                self.newsTagName = self.$elem.find(":first-child").prop('tagName');
                self.newsClassName = self.$elem.find(":first-child").attr('class');
                console.log("new Class name:"+self.newsClassName);
                console.log("new TagName :" + self.newsTagName);
                self.timer = null;
                self.resizeTimer = null; // used with window.resize event
                self.animationStarted = false;
                self.isHovered = false;


                if (typeof options === 'string') {
                    //string was passed
                    if (console) {
                        console.error("String property override is not supported");
                    }
                    throw ("String property override is not supported");
                } else {
                    //object was passed
                    //extend user options overrides
                    self.options = $.extend({}, $.fn.bootstrapNews.options, options);

                    self.prepareLayout();


                    //autostart animation
                    if (self.options.autoplay) {
                        self.animate();
                    }
                    //navigation show / hide option
                    if (self.options.navigation) {
                        if ($(".pagination")[0]){
                            // Do something if class exists
                        } else {
                            self.buildNavigation();
                        }

                    }

                    //option for auto pulling of  from db
                    if (self.options.posts) {
                        self.buildPosts();
                    }

                    //enable users to override the methods
                    if (typeof self.options.onToDo === 'function') {
                        self.options.onToDo.apply(self, arguments);
                    }

                }
            },

            prepareLayout: function () {
                var self = this;

                //checking mouse position

                $(self.elem).find('.' + self.newsClassName).on('mouseenter', function () {
                    self.onReset(true);
                });

                $(self.elem).find('.' + self.newsClassName).on('mouseout', function () {
                    self.onReset(false);
                });

                //set news visible / hidden
                $.map(self.$elem.find(self.newsTagName), function (newsItem, index) {
                    if (index > self.options.newsPerPage - 1) {
                        $(newsItem).hide();
                    } else {
                        $(newsItem).show();
                    }
                });

                //prevent user to select more news that it actualy have

                if (self.$elem.find(self.newsTagName).length < self.options.newsPerPage) {
                    self.options.newsPerPage = self.$elem.find(self.newsTagName).length;
                }

                //get height of the very first self.options.newsPerPage news
                var height = 0;

                /*$.map(self.$elem.find(self.newsTagName), function (newsItem, index) {
                        if (index < self.options.newsPerPage) {
                            //alert("this is first " + self.options.newsPerPage);
                            height = parseInt(height) + parseInt($(newsItem).height()) + 10;
                            console.log("this is height:" + height);
                        }
                });

                $(self.elem).css({"overflow-y": "hidden", "height": height});

                $(self.elem).css({"overflow-y": "hidden"});  */
                //recalculate news box height for responsive interfaces
                $(w).resize(function () {
                    if (self.resizeTimer !== null) {
                        clearTimeout(self.resizeTimer);
                    }
                    self.resizeTimer = setTimeout(function () {
                        self.prepareLayout();
                    }, 200);
                });

            },

            findPanelObject: function () {
                var panel = this.$elem;

                while (panel.parent() !== undefined) {
                    panel = panel.parent();
                    if (panel.parent().hasClass('panel')) {
                        return panel.parent();
                    }
                }

                return undefined;
            },

            buildNavigation: function () {
                var panel = this.findPanelObject();
                var self = this;
                if (panel) {
                    var nav = '<ul class="pagination pull-left" style="margin: 0px;">' +
                        '<li><a href="#Modal_window_add_post" data-toggle="modal" class="add_post"><span class="glyphicon glyphicon glyphicon-plus"></span>Pridaj Nazor na ulicu</a></li>' +
                        '</ul>' +
                        '<ul class="pagination pull-right" style="margin: 0px;">' +
                        '<li><a href="#" class="prev"><span class="glyphicon glyphicon-chevron-down"></span></a></li>' +
                        '<li><a href="#" class="next"><span class="glyphicon glyphicon-chevron-up"></span></a></li>' +
                        '</ul><div class="clearfix"></div>';


                    var footer = $(panel).find(".panel-footer")[0];
                    if (footer) {
                        $(footer).append(nav);
                    } else {
                        $(panel).append('<div class="panel-footer">' + nav + '</div>');

                    }

                    var self = this;
                    $(panel).find('.prev').on('click', function (ev) {
                        ev.preventDefault();
                        self.onPrev();
                    });

                    $(panel).find('.next').on('click', function (ev) {
                        ev.preventDefault();
                        self.onNext();
                    });
                    $(self.elem).css({"overflow-y": "visible"});
                }
            },

            buildPosts: function () {
                //alert("som vnutri");
                var panel = this.findPanelObject();
                if (panel) {
                    var list_window = $(panel).find(".demo1")[0];
                    if ($(panel).find(".news-item")[0]){
                        $('#demo1_id').empty();
                        console.log("VYCISTIL som Post's");
                    }

                    if (list_window) {
                        debugger
                        console.log("nasiel som class .demo1");
                        <?php
                        $nav = '';
                        $posts = array();
                        $posts = get_posts_from_db();
                        foreach ($posts as $item) {
                            $nav .= '<li class="news-item"><table cellpadding="4"><tr><td><img src="images/man.png" width="60" class="img-circle" /></td><td>' . $item . '<a href="#Modal_window" data-toggle="modal"> Read more...</a></td></tr></table></li>';

                        }
                        ?>
                        var $pom = <?php echo json_encode($nav); ?>;
                        $(list_window).append($pom);
                        //$(list_window).append('<li class="news-item"><table cellpadding="4"><tr><td><img src=\"images/man.png\" width=\"60\" class=\"img-circle\" /></td><td>'+'<a href=\"#Modal_window\" data-toggle=\"modal\" >Read more...</a></td></tr></table></li>');

                    } else {
                        console.log("NENASIEL som class .demo1");
                        //$(panel).append('<ul class="demo1">' + nav + '</ul>');
                    }
                    //alert("stop it");

                }
            },

            onStop: function () {

            },

            onPause: function () {
                var self = this;
                self.isHovered = true;
                if (this.options.autoplay && self.timer) {
                    clearTimeout(self.timer);
                }
            },

            onReset: function (status) {
                var self = this;
                if (self.timer) {
                    clearTimeout(self.timer);
                }

                if (self.options.autoplay) {
                    self.isHovered = status;
                    self.animate();
                }
            },

            animate: function () {
                var self = this;
                self.timer = setTimeout(function () {

                    if (!self.options.pauseOnHover) {
                        self.isHovered = false;
                    }

                    if (!self.isHovered) {
                        if (self.options.direction === 'up') {
                            self.onNext();
                        } else {
                            self.onPrev();
                        }
                    }
                }, self.options.newsTickerInterval);
            },

            onPrev: function () {

                var self = this;

                if (self.animationStarted) {
                    return false;
                }

                self.animationStarted = true;

                var html = '<' + self.newsTagName + ' style="display:none;" class="' + self.newsClassName + '">' + $(self.$elem).find(self.newsTagName).last().html() + '</' + self.newsTagName + '>';
                $(self.$elem).prepend(html);
                $(self.$elem).find(self.newsTagName).first().slideDown(self.options.animationSpeed, function () {
                    $(self.$elem).find(self.newsTagName).last().remove();
                });

                $(self.$elem).find(self.newsTagName + ':nth-child(' + parseInt(self.options.newsPerPage + 1) + ')').slideUp(self.options.animationSpeed, function () {
                    self.animationStarted = false;
                    self.onReset(self.isHovered);
                });

                $(self.elem).find('.' + self.newsClassName).on('mouseenter', function () {
                    self.onReset(true);
                });

                $(self.elem).find('.' + self.newsClassName).on('mouseout', function () {
                    self.onReset(false);
                });
            },

            onNext: function () {
                var self = this;

                if (self.animationStarted) {
                    return false;
                }

                self.animationStarted = true;

                var html = '<' + self.newsTagName + ' style="display:none;" class=' + self.newsClassName + '>' + $(self.$elem).find(self.newsTagName).first().html() + '</' + self.newsTagName + '>';
                $(self.$elem).append(html);

                $(self.$elem).find(self.newsTagName).first().slideUp(self.options.animationSpeed, function () {
                    $(this).remove();
                });

                $(self.$elem).find(self.newsTagName + ':nth-child(' + parseInt(self.options.newsPerPage + 1) + ')').slideDown(self.options.animationSpeed, function () {
                    self.animationStarted = false;
                    self.onReset(self.isHovered);
                });

                $(self.elem).find('.' + self.newsClassName).on('mouseenter', function () {
                    self.onReset(true);
                });

                $(self.elem).find('.' + self.newsClassName).on('mouseout', function () {
                    self.onReset(false);
                });
            }
        };

        $.fn.bootstrapNews = function (options) {
            //enable multiple DOM object selection (class selector) + enable chaining like $(".class").bootstrapNews().chainingMethod()
            return this.each(function () {

                var newsBox = Object.create(NewsBox);

                newsBox.init(options, this);
                console.log("Creating new"+ newsBox);

            });
        };

        $.fn.bootstrapNews.options = {
            newsPerPage: 4,
            navigation: true,
            posts:true,
            autoplay: true,
            direction: 'up',
            animationSpeed: 'normal',
            newsTickerInterval: 4000, //4 secs
            pauseOnHover: true,
            onStop: null,
            onPause: null,
            onReset: null,
            onPrev: null,
            onNext: null,
            onToDo: null
        };

    })(jQuery, window, document);


});




</script>
