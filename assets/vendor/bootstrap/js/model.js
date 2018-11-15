let modalId = $('#image-gallery');

$(document).ready(function () {
  

    loadGallery(true, 'a.thumbnail');

    $('#edit-button').click(function(){
      $('#edit-image').show();
      $('#detail').hide();
    });
    $('#cancel-edit').click(function(){
      $('#edit-image').hide();
      $('#detail').show();
    })

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

        
        $('#detail').show();
        $('#edit-image').hide();
        $('#komentar-list').empty();
        $('#board-list').empty();
        $('#status').removeAttr('checked');
        $('#menu-edit').show();
        $('#button-follow').hide();

        let $sel = selector;
        // console.log($sel);
        
        current_image = $sel.data('imageid');


        if($sel.data('statusForm') == 'Checked'){
          $('#status').attr('checked','checked');
        }

        if (current_image !== undefined) {
          var now = window.location.href;
          var res = now.split('/')
          // console.log(res);
          
          if(res[4] == 'auth'){
            $.get("../image/get_komentar/"+current_image, function(data) {
              data_parse = JSON.parse(data);
              // console.log(data);
              data_parse.forEach(el => {
                if(session_id != el.user_id){
                  $('#komentar-list').append("<div class='row'><div class='col-md-9'><img src='"+el.foto+"' alt='Profile' class='img-profile-comment'><b>"+el.nama+"</b></div><div class='col-md-3'><div class='dropdown show'><a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item' href='#'>Report</a></div></div></div></div><div class='row'><div class='col-md-10 offset-md-1'>"+el.komentar+"</div></div><div class='row'><div class='col-md-12 offset-md-1'><span id='date'>"+el.date+"</span></div></div><br>");
                }else{
                  $('#komentar-list').append("<div class='row'><div class='col-md-9'><img src='"+el.foto+"' alt='Profile' class='img-profile-comment'><b>"+el.nama+"</b></div><div class='col-md-3'><div class='dropdown show'><a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item' href='#'>Report</a><a class='dropdown-item delete-button' href='image/delete_komentar/"+el.id+"'>Delete</a></div></div></div></div><div class='row'><div class='col-md-10 offset-md-1'>"+el.komentar+"</div></div><div class='row'><div class='col-md-12 offset-md-1'><span id='date'>"+el.date+"</span></div></div><br>");
                }
              });
            }); 
          }else{
            $.get("image/get_komentar/"+current_image, function(data) {
              data_parse = JSON.parse(data);
              data_parse.forEach(el => {
                if(session_id != el.user_id){
                  $('#komentar-list').append("<div class='row'><div class='col-md-9'><img src='"+el.foto+"' alt='Profile' class='img-profile-comment'><b>"+el.nama+"</b></div><div class='col-md-3'><div class='dropdown show'><a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item' href='#'>Report</a></div></div></div></div><div class='row'><div class='col-md-10 offset-md-1'>"+el.komentar+"</div></div><div class='row'><div class='col-md-12 offset-md-1'><span id='date'>"+el.date+"</span></div></div><br>");
                }else{
                  $('#komentar-list').append("<div class='row'><div class='col-md-9'><img src='"+el.foto+"' alt='Profile' class='img-profile-comment'><b>"+el.nama+"</b></div><div class='col-md-3'><div class='dropdown show'><a class='dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'></a><div class='dropdown-menu' aria-labelledby='dropdownMenuLink'><a class='dropdown-item' href='#'>Report</a><a class='dropdown-item delete-button' href='image/delete_komentar/"+el.id+"'>Delete</a></div></div></div></div><div class='row'><div class='col-md-10 offset-md-1'>"+el.komentar+"</div></div><div class='row'><div class='col-md-12 offset-md-1'><span id='date'>"+el.date+"</span></div></div><br>");
                }
              });
            }); 
          }
        }

        if(board !== 'undefined'){
          board.forEach(el =>{
            
            if(el.image.length == 0){
              var image = "http://www.trustvets.com/images/NoImageAvailable.png";
            }else{
              var image = el.image[0].url;
            }
            $('#board-list').append("<button type='button' class='list-group-item list-group-item-action'><div class='float-left'> <img src='"+image+"' style='width: 30px;height: 30px;'>  "+el.board.nama_board+"</div><div class='float-right'><a class='btn btn-danger' href='image/pin/"+el.board.id+"/"+current_image+"'><i class='fas fa-thumbtack'></i> Save</a></div></button>")
          })
        }


        if(session_id != $sel.data('user_id')){
          $('#menu-edit').hide();
          $('#button-follow').show();
        }

        if($sel.data('website')){
          $('#links-web').show();
          $('#links-web').attr('href',$sel.data('website'));
        }else{
          $('#links-web').hide();
        }

        $('#edit-action').attr('action', "image/update_action/"+$sel.data('imageid'));
        $('#delete-image').attr('href', "image/delete/"+$sel.data('imageid'));
        $("#name-edit").val($sel.data('title'));
        $("#website-edit").val($sel.data('website'));
        $("#description-edit").val($sel.data('description'));


        $('#image-gallery-title').text($sel.data('title'));
        $('#name-user').text($sel.data('user'));
        $('#title').text($sel.data('title'));
        $('#description').text($sel.data('description'));
        $('#commant-form').attr('action',$sel.data('actioncommant'));
        $('#profile').attr('src',$sel.data('foto'));
        $('#image-gallery-image').attr('src', $sel.data('image'));
        $('#image-gallery-image-pins').attr('src', $sel.data('image'));
        


        $('#email-share').attr('href', "mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 http://localhost/pinterest/image/read/"+$sel.data('imageId'));
        $('#fb-share').attr('href', "http://www.facebook.com/sharer.php?u=http://localhost/pinterest/image/read/"+$sel.data('imageId'));
        $('#google-share').attr('href', "https://plus.google.com/share?url=http://localhost/pinterest/image/read/"+$sel.data('imageId'));
        $('#twitter-share').attr('href', "https://twitter.com/share?url=http://localhost/pinterest/image/read/"+$sel.data('imageId')+"&amp;text=Share%20SImage%20form%20Pinterest&amp;hashtags=Pinterest");

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
