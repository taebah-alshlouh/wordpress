jQuery(document).ready(function($){
  
  var custom_theme_file_frame;

  $('.ta-image-upload').click( function(){

      event.preventDefault();
      var frame;

      // Create a new media frame
      frame = wp.media({

          title: ta_mag_admin.upload_image_title,
          button: {
            text: ta_mag_admin.choose_image_title
          },
          multiple: false
          
      });

      frame.on( 'select', function() {

          var attachment = frame.state().get('selection').first().toJSON();
          $('.ta-image-prev').html( '<img src="'+attachment.url+'" style="width:200px;height:auto;" />' );
          $('.term-image-preview').show();
          $('.ta-img-delete').show();
          $('.ta-image-upload').val( attachment.id ).trigger('change');

      });

      // Finally, open the modal on click
      frame.open();

  });

  $('.ta-img-delete').click( function(){
    
    $(this).hide();
    $('.term-image-preview').hide();
    $('.ta-image-prev').empty();
    $('.ta-image-upload').val( '' ).trigger('change');

  });

   // Remove Category Image
    $(document).ajaxSuccess(function(e, request, settings){

        var object = settings.data;
        if( typeof object == 'string' ){
          var object = object.split("&");
          if( object.includes( 'action=add-tag' ) && object.includes( 'screen=edit-category' ) && object.includes( 'taxonomy=category' ) ){
              
            $('.ta-img-delete').hide();
            $('.ta-image-prev').empty();
            $('.ta-image-upload').attr('value','');

          }
        }

    });

});