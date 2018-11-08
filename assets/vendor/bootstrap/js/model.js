let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        $("#komentar-list").empty();
        $('#status').removeAttr('checked');

        let $sel = selector;
        // console.log($sel);
        current_image = $sel.data('imageid');

        if($sel.data('statusForm') == 'Checked'){
          $('#status').attr('checked','checked');
        }

        if (current_image !== undefined) {
          $.get("image/get_komentar/"+current_image, function(data) {
            data_parse = JSON.parse(data);
            data_parse.forEach(el => {
              $("#komentar-list").append("<div class='row'><div class='col-md-9'><img src='"+el.foto+"' alt='Profile' class='img-profile-comment'><b>"+el.nama+"</b></div><div class='col-md-3'><div class='dropdown show'><a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item' href='#'>Report</a></div></div></div></div><div class='row'><div class='col-md-10 offset-md-1'>"+el.komentar+"</div></div><div class='row'><div class='col-md-12 offset-md-1'><span id='date'>"+el.date+"</span><a href='#'>Like </a></div></div><br>");
            });
          }); 
        }


        if($sel.data('website')){
          $('#links-web').show();
          $('#links-web').attr('href',$sel.data('website'));
        }else{
          $('#links-web').hide();
        }

        $('#image-gallery-title').text($sel.data('title'));
        $('#name-user').text($sel.data('user'));
        $('#title').text($sel.data('title'));
        $('#description').text($sel.data('description'));
        $('#commant-form').attr('action',$sel.data('actioncommant'));
        $('#profile').attr('src',$sel.data('foto'));
        $('#image-gallery-image').attr('src', $sel.data('image'));
        $('#image-gallery-image2').attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
