jQuery(document).ready(function () {
    //Check if current page is active + add class 
    jQuery("a[href*='"+ window.location.href +"']").addClass('active-link');  
    
    // Remove strange LSEP character:
    jQuery("body").children().each(function() {
        jQuery(this).html(jQuery(this).html().replace(/&#8232;/g," "));
    });  

    // Desktop Sticky Nav
    let lastScrollTop = 0;
    let $win = jQuery(window);
    let minScroll = $win.height();   // Get the window height.
    let deskNavSticky = jQuery('.desktop_nav_sticky');

    // Variables for mobile:
    let mobileAllPanels = jQuery(".mobile_nav .menu-item-has-children ul").hide();
    let mobileBottomNav = jQuery('.mobile_bottom_nav');
    let mobileBottomContainer = jQuery('.mobile_inner_container').hide();
    let hamburgerAnimate = jQuery('.hamburger_menu');
    let hamburgerTrigger = jQuery('.menu_wrapper');

    // If menu has submenu (accordion):
    let subMenuTrigger = jQuery(".menu-item-has-children a");
    let minusIcon = jQuery('.mobile_nav .dh_ft_minus_icon');
    let plusIcon = jQuery('.mobile_nav .dh_ft_plus_icon');

    // If there's an icon outside of menu (for the staggered animation):
    let menuIcon = jQuery('.mobile_inner_container a');

    $win.scroll(function(){
        let currentScrollTop = jQuery(this).scrollTop();

        if ( ( currentScrollTop < lastScrollTop) && (currentScrollTop > minScroll) ){
            deskNavSticky.addClass('visible_nav').removeClass('hidden_nav');
        } else {
            if( deskNavSticky.hasClass('visible_nav') ){ 
                deskNavSticky.addClass('hidden_nav').removeClass('visible_nav');
            }
        }
        lastScrollTop = currentScrollTop;
    });

    // Mobile Nav - hamburger
    (function () {
        hamburgerTrigger.on('click', function() {
            hamburgerAnimate.toggleClass('animate');
            jQuery(document.body).toggleClass('stop_scrolling');


            // Open/close menu container:
            if( !mobileBottomNav.hasClass('open') ){
                mobileBottomNav.addClass('open');
                mobileBottomNav.slideToggle(300, function() {
                    mobileBottomContainer.fadeToggle('fast');
                });
                
                // Switch + and - icon:
                plusIcon.removeClass('hide_icon');
                minusIcon.addClass('hide_icon');

                // Animation menu links staggered load
                jQuery('.mobile_bottom_nav ul li').each(function(index){
                    // Turn the index value into a reasonable animation delay
                    var delay = 0.1 + index*0.03;

                    // Apply the animation delay
                    jQuery(this).css("animation-name", "slideInLeft");
                    jQuery(this).css("animation-delay", delay + "s");
                });            

            } else {
                mobileAllPanels.hide();
                jQuery(".mobile_nav .menu-item-has-children").removeClass('active');
                
                mobileBottomNav.removeClass('open');
                mobileBottomContainer.fadeToggle('fast', function() {
                mobileBottomNav.slideToggle(300);
                });

                // Reset animation
                jQuery('.mobile_bottom_nav ul li').css("animation-name", "none");
                jQuery('.mobile_bottom_nav .mobile_inner_container a.social').css("animation-name", "none");
            }


        })
    })();

    // Mobile Nav - accordion (sub-menu)
    (function () {
        mobileAllPanels.removeClass('active');
        plusIcon.removeClass('hide_icon');
        minusIcon.addClass('hide_icon');
        
        subMenuTrigger.click(function(e) {
            e.preventDefault();
            let link = jQuery(this);
            let closest_ul = link.closest("ul");
            let parallel_active_links = closest_ul.find(".active");
            let closest_li = link.closest("li");
            let link_status = closest_li.hasClass("active");
            let count = 0;

            closest_ul.find("ul").slideUp(function() {
                if (++count == closest_ul.find("ul").length){
                parallel_active_links.removeClass("active");
                            parallel_active_links.find('.dh_ft_plus_icon').removeClass('hide_icon');
                            parallel_active_links.find('.dh_ft_minus_icon').addClass('hide_icon');
                        }
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
                
                // jQuery('.mobile_nav .arrow_icon img').addClass('rotate');
                link.find('.dh_ft_plus_icon').addClass('hide_icon');
                link.find('.dh_ft_minus_icon').removeClass('hide_icon');
            }
        })
        

        jQuery(".mobile_nav .sub_menu a").click(function(e) {
            hamburgerAnimate.toggleClass('animate');
            jQuery(document.body).toggleClass('stop_scrolling');
            mobileBottomNav.addClass('open');
            mobileBottomNav.slideToggle(300, function() {
                mobileBottomContainer.fadeToggle('fast');
            });
            
        });
        
    })();
});