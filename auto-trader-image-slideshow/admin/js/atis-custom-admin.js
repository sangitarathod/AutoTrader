jQuery(function ($) {
    // on upload button click
    $('body').on('click', '.rudr-upload', function (event) {
        event.preventDefault(); // prevent default link click and page refresh

        const button = $(this)
        const imageId = button.next().next().val();

        const customUploader = wp.media({
            title: 'Insert image', // modal window title
            library: {
                // uploadedTo : wp.media.view.settings.post.id, // attach to the current post?
                type: 'image'
            },
            button: {
                text: 'Use this image' // button label text
            },
            multiple: false
        }).on('select', function () { // it also has "open" and "close" events
            const attachment = customUploader.state().get('selection').first().toJSON();
            button.removeClass('button').html('<img src="' + attachment.url + '">'); // add image instead of "Upload Image"
            button.next().show(); // show "Remove image" link
            button.next().next().val(attachment.id);
            button.next().next().next().hide();
            // Populate the hidden field with image ID
        })

        // already selected images
        customUploader.on('open', function () {

            if (imageId) {
                const selection = customUploader.state().get('selection')
                attachment = wp.media.attachment(imageId);
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            }

        })

        customUploader.open()

    });
    // on remove button click
    $('body').on('click', '.rudr-remove', function (event) {
        event.preventDefault();
        const button = $(this);
        button.next().val(''); // emptying the hidden field
        button.hide().prev().addClass('button aaa').html('Upload image');
        $('.aaa').hide(); // replace the image with text
    });


    var max_fields = 10; //Maximum allowed input fields 
    var wrapper = $(".wrapper"); //Input fields wrapper
    var add_button = $(".add_fields"); //Add button class or ID
    var x = 1; //Initial input field is set to 1

    //When user click on add input button
    $(add_button).click(function (e) {
        e.preventDefault();
        //Check maximum allowed input fields
        if (x < max_fields) {
            x++; //input field increment
            //add input field
            $(wrapper).append('<div class="slider-images"><a href="#" class="button rudr-upload">Upload image</a><a href = "#" class= "button rudr-remove" style = "display:none" > Remove image</a><input type="hidden" name="atis_settings[atis_image][]"><a href="javascript:void(0);" class="remove_field">Remove</a></div>');
        } else {
            alert('you can set max 10 images');
        }
    });

    //when user click on remove button
    $(wrapper).on("click", ".remove_field", function (e) {
        e.preventDefault();
        $(this).parent('div').remove(); //remove inout field
        x--; //inout field decrement
    })
});