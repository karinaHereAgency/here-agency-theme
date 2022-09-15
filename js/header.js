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
    let deskNavSticky = jQuery('.desktop-nav-sticky');

    $win.scroll(function(){
        let currentScrollTop = jQuery(this).scrollTop();

        if ( ( currentScrollTop < lastScrollTop) && (currentScrollTop > minScroll) ){
            deskNavSticky.addClass('visible-nav').removeClass('hidden-nav');
        } else {
            if( deskNavSticky.hasClass('visible-nav') ){ 
                deskNavSticky.addClass('hidden-nav').removeClass('visible-nav');
            }
        }
        lastScrollTop = currentScrollTop;
    });

    // Variables for mobile:
    let mobileAllPanels = jQuery(".mobile-nav .menu-item-has-children ul").hide();
    let mobileBottomNav = jQuery('.mobile-bottom-nav');
    let mobileBottomContainer = jQuery('.mobile-inner-container').hide();
    let hamburgerAnimate = jQuery('.hamburger-menu');
    let hamburgerTrigger = jQuery('.menu-wrapper');

    // If menu has submenu (accordion):
    let subMenuTrigger = jQuery(".menu-item-has-children a");
    let minusIcon = jQuery('.mobile-nav .dh-ft-minus-icon');
    let plusIcon = jQuery('.mobile-nav .dh-ft-plus-icon');

    // If there's an icon outside of menu (for the staggered animation):
    let menuIcon = jQuery('.mobile-inner-container a');

    // Mobile Nav - hamburger
    (function () {
        hamburgerTrigger.on('click', function() {
            hamburgerAnimate.toggleClass('animate');
            jQuery(document.body).toggleClass('stop-scrolling');


            // Open/close menu container:
            if( !mobileBottomNav.hasClass('open') ){
                mobileBottomNav.addClass('open');
                mobileBottomNav.slideToggle(300, function() {
                    mobileBottomContainer.fadeToggle('fast');
                });
                
                // Switch + and - icon:
                plusIcon.removeClass('hide-icon');
                minusIcon.addClass('hide-icon');

                // Animation menu links staggered load
                jQuery('.mobile-bottom-nav ul li').each(function(index){
                    // Turn the index value into a reasonable animation delay
                    var delay = 0.1 + index*0.03;

                    // Apply the animation delay
                    jQuery(this).css("animation-name", "slideInLeft");
                    jQuery(this).css("animation-delay", delay + "s");
                });            

            } else {
                mobileAllPanels.hide();
                jQuery(".mobile-nav .menu-item-has-children").removeClass('active');
                
                mobileBottomNav.removeClass('open');
                mobileBottomContainer.fadeToggle('fast', function() {
                mobileBottomNav.slideToggle(300);
                });

                // Reset animation
                jQuery('.mobile-bottom-nav ul li').css("animation-name", "none");
                jQuery('.mobile-bottom-nav .mobile-inner-container a.social').css("animation-name", "none");
            }


        })
    })();

    // Mobile Nav - accordion (sub-menu)
    (function () {
        mobileAllPanels.removeClass('active');
        plusIcon.removeClass('hide-icon');
        minusIcon.addClass('hide-icon');
        
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
                            parallel_active_links.find('.dh-ft-plus-icon').removeClass('hide-icon');
                            parallel_active_links.find('.dh-ft-minus-icon').addClass('hide-icon');
                        }
            });

            if (!link_status) {
                closest_li.children("ul").slideDown();
                closest_li.addClass("active");
                
                // jQuery('.mobile-nav .arrow-icon img').addClass('rotate');
                link.find('.dh-ft-plus-icon').addClass('hide-icon');
                link.find('.dh-ft-minus-icon').removeClass('hide-icon');
            }
        })
        

        jQuery(".mobile-nav .sub-menu a").click(function(e) {
            hamburgerAnimate.toggleClass('animate');
            jQuery(document.body).toggleClass('stop-scrolling');
            mobileBottomNav.addClass('open');
            mobileBottomNav.slideToggle(300, function() {
                mobileBottomContainer.fadeToggle('fast');
            });
            
        });
        
    })();
});