

( function ( $ ) {
    'use strict';

    function changeRootCSSVariable(variable, value) {
        document.documentElement.style.setProperty(variable, value);
    }

    function getRootCSSVariable(variable) {
        return getComputedStyle(document.documentElement).getPropertyValue(variable);
    }

    function filterUrl(url) {
        let match = url.match(/^[^?#]*/);
        return match ? match[0] : url;
    }


    // add active class to sidebar menu
    var currentUrl = window.location.href;
    var urlText = currentUrl.substring(currentUrl.lastIndexOf('/') + 1);
    var currentUrlLastPart = filterUrl(urlText);
    var anchorTags = $('.app-sidebar-menu ul li a');
    
    anchorTags.each(function(){
        var $this = $(this);
        var anchorHrefLastPart = $this.attr('href').substring($this.attr('href').lastIndexOf('/') + 1);
        
        if (anchorHrefLastPart === currentUrlLastPart.replace(/#/g, '')) {
            $this.addClass('active');
        }
    });



    let sidebarNavLink = $('.app-sidebar-menu ul li.has-dropdown > a');

    sidebarNavLink.each(function(){
        let $this = $(this);
    
        $this.on('click', function(e){
            e.preventDefault();
            let closestMenuItem = $this.closest('.app-sidebar-menu-item')


            if(closestMenuItem.hasClass('dropdown-opened')){
                $(this).parent().removeClass('dropdown-opened').children('ul').slideUp()
                $(this).parent().siblings().children('ul').slideUp()
                
            }else if(closestMenuItem.hasClass('has-dropdown')){
                $(this).siblings('ul').slideDown()
                $(this).parent().addClass('dropdown-opened').siblings().removeClass('dropdown-opened').children('ul').slideUp()
            }
        })
    })

    // open active dropdown if it has active child
    let activeDropdown = $('.app-sidebar-menu ul li.has-dropdown');
    activeDropdown.each(function(){
        let $this = $(this);
        if($this.find('a').hasClass('active')){
            $this.addClass('dropdown-opened').children('ul').show()
        }
    })
    

    // update sidebar menu height
    function update_sidebar_menu_height() {
        let headerHeight = 60;
        let footerHeight = 60;
        let menuHeight = $(window).height() - (headerHeight + footerHeight)

        $('#app-sidebar-menu').css('height',  menuHeight + 'px');
    }

    $(window).on('resize', function(){
        update_sidebar_menu_height()
    });



    // toggle sidebar
    $('#app-sidebar-toggle').on('click', function(){
        let appSidebar = $('#app-wrapper')
        let collapsedData = appSidebar.attr('data-app-sidebar-collapsed');

        if(collapsedData === 'true'){
            appSidebar.attr('data-app-sidebar-collapsed', 'false')
            localStorage.setItem('app_sidebar_state', '')
            $(this).removeClass('collapsed')
            $('#app-sidebar').removeClass('collapsed');
        }
        else{
            appSidebar.attr('data-app-sidebar-collapsed', 'true')
            localStorage.setItem('app_sidebar_state', 'collapsed')
            $(this).addClass('collapsed')
            $('#app-sidebar').addClass('collapsed');
        }
    });


    // app mobile sidebar
    $('.app-sidebar-open-btn').on('click', function(){
        $('#app-sidebar').addClass('open');
        $('.app-backdrop').addClass('show');
    });

    $('.app-sidebar-close-btn').on('click', function(){
        $('#app-sidebar').removeClass('open');
        $('.app-backdrop').removeClass('show');
    });
    $('.app-backdrop').on('click', function(){
        $('#app-sidebar').removeClass('open');
        $(this).removeClass('show');
    });

    // set initial sidebar state
    function set_initial_sidebar_state(){
        let appSidebarToggle = $('#app-sidebar-toggle')
        let appSidebar = $('#app-wrapper')
        let appSidebarState = localStorage.getItem('app_sidebar_state');

        if(appSidebarState === 'collapsed'){
            appSidebar.attr('data-app-sidebar-collapsed', 'true')
            appSidebarToggle.addClass('collapsed')
            $('#app-sidebar').addClass('collapsed');
        }
        else{
            appSidebar.attr('data-app-sidebar-collapsed', 'false')
            appSidebarToggle.removeClass('collapsed')
            $('#app-sidebar').removeClass('collapsed');
        }
    }


    // initialize
    (function() {
        update_sidebar_menu_height();
        set_initial_sidebar_state();
    })();


    // add scrollbar to sidebar menu
    new PerfectScrollbar(document.querySelector('.app-sidebar-menu'), {
        suppressScrollX: true
    });

    
}(jQuery) ) 

