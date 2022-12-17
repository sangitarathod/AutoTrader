jQuery(function ($) {

    $("#slider").responsiveSlides({
        auto: true,           // Boolean: Animate automatically, true/false
        speed: 1000,          // Integer: Speed of the transition, in ms
        timeout: 1000,        // Integer: Time between transitions, in ms
        pager: false,         // Boolean: Show pager, true or false
        nav: false,           // Boolean: Show navigation, true or false
        prevText: "Previous", // String: Text for the "previous" button
        nextText: "Next",     // String: Text for the "next" button
        maxwidth: "",     // Integer: Max-width of the slideshow, in px
        controls: "",         // Selector: Where controls should be appended
        namespace: "rslides"  // String: change the default namespace used
    });

});