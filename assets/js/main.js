/*
 * Wthree Theme Js 
 */ 

(function( $ ) {
    
     "use strict";
    
    $( document ).ready(function() {
        
        /* Sticky navbar and searchForm */
        $(window).on("scroll", function() {
            if( $(this).scrollTop() > 1) {
                $('#nav').addClass('sticky-navbar');
            } else {
                $('#nav').removeClass('sticky-navbar');
            }
        });
        
        //Preloader
        $('#preloader-overlay').fadeOut(550);
        
        /* FitVidJs Video Responsive Plugin */
        $(document).ready(function(){
            // Target your .container, .wrapper, .post, etc.
            $(".post").fitVids();
        });
        
        $(".post").fitVids({ customSelector: "iframe[src^='https://video.wordpress.com'], iframe[src^='http://myviiids.com']"});

        
        /* Toggling Sidebar Menus */
        $('.show-dropdown').on('click', function() {
            $(this).parent().next('ul').slideToggle(250);
            $(this).toggleClass(' area-expanded');
            
            $(this).parent().toggleClass(' active-item');
        });
        
        $('a.dropdown-toggle').on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
        })
        

        /*  redirecting to first post if posts avaiable, when click on a page */
        var redirect_url = $('#redirect-url').val();
        if (redirect_url != undefined ) {
            try {
               window.location.href = redirect_url;
            } catch(err) {
                //error when redirecting to the first post
            }
        }
        
        /* Adding active class to change the background color of links */
        try {
            var sidenav_links = $('#tutorials-menu a');
            var first_column_links = $('#left-menu-items a');
        } catch(err) {
            //No items found
        }
        
        var i;

        for( i=0; i<sidenav_links.length; i++ ) {
            if( window.location.href.indexOf( sidenav_links[i].href ) >= 0 ) {
                sidenav_links[i].classList.add( "active" );
            }
        }
        
        for( i=0; i<first_column_links.length; i++ ) {
            if( window.location.href.indexOf( first_column_links[i].href ) >= 0 ) {
                first_column_links[i].classList.add( "active" );
            }
        }

        /*  Displaying Search Form  */
        $('#search-icon').on("click", function() {
            $('#search-window').fadeIn(450);
            $('#overlay-content').show(900);
            $('#close-search-window').show(200);
        });

        /*  Hiding Search Form  */
        $('#close-search-window').on("click", function() {
            $('#search-window').fadeOut(550);
            $('#overlay-content').hide(200);
            $(this).hide(150);
        });
        
        /*  For Side Menu opening */
        $('#menu-icon').on( "click", function() {
            $('#sidenav').animate({width: 'toggle'}, 300);
            /* close the mega menu if it is opened */
            try {
                $('.dropdown-contents').fadeOut(300);
            } catch(err) {
                //Mega menu might not have opened
            }
        });
        
         /*  For Side Menu Toggling */
        $('#close-button').on( "click", function() {
            $('#sidenav').animate( {width: 'toggle'}, 300 );
        });
        
        /*  Activating Bootstrap Tooltips  */
        $('[data-toggle="tooltip"]').tooltip();
        
        /* Activating Bootstrap Popovers */
        $('[data-toggle="popover"]').popover();
        
        
        /* AJAX Functions */
        
        $(document).on('click', '.wthree-load-more:not(.loading)', function() {
            
            var that = $(this);
            
            var page = that.data('page');
            var new_page = page+1;
            var ajaxurl = that.data('url');
            
            //preventing click again until finished loading
            that.addClass('loading');
            
            $.ajax({
                
                url : ajaxurl,
                type : 'post',
                data : {
                    page : page,
                    action : 'wthree_load_more',
                },
                
                error : function(response) {
                    console.log(response);
                },
                success : function(response) {
                    $('.wthree-post-container').append(response);
                    that.data( 'page', new_page );
                    
                    //Removing Loading Class
                    that.removeClass('loading');
                }
                
            });
            
        });
        
        
        
        
        
    });
 
})( jQuery );


