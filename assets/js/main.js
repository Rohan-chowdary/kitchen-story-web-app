
'use strict';
function goBack() {
  window.history.back();
}

/* NICE-SELECT */

'use strict';
$(document).ready(function() {
  $('.nc-select').niceSelect();
});

/* FROMS */

'use strict';
  function onRecaptchaSuccess(){
    $('#submit-form').submit();
  }

/* SUBMIT NO EMPTY FIELD */

'use strict';
$(document).ready(function($){

  $("#searchForm").submit(function() {
    $(this).find(":input").filter(function(){ return !this.value; }).attr("disabled", "disabled");
    return true;
  });

  $( "#searchForm" ).find( ":input" ).prop( "disabled", false );

});

'use strict';
$(document).ready(function(){
  $('.submit-form').on('click', function(){

  $("#searchForm").submit();

  });
});

/* PAGINATION */

'use strict';
$(document).ready(function(){
  $('.change-page').on('click', function(){

    var paramName = 'p';
    var paramValue = $(this).data('page');

    var url = window.location.href;
    var hash = location.hash;
    url = url.replace(hash, '');
    if (url.indexOf(paramName + "=") >= 0)
    {
      var prefix = url.substring(0, url.indexOf(paramName + "=")); 
      var suffix = url.substring(url.indexOf(paramName + "="));
      suffix = suffix.substring(suffix.indexOf("=") + 1);
      suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
      url = prefix + paramName + "=" + paramValue + suffix;
    }
    else
    {
      if (url.indexOf("?") < 0)
        url += "?" + paramName + "=" + paramValue;
      else
        url += "&" + paramName + "=" + paramValue;
    }

    window.location.href = url + hash;

  });
  
});

/* ORDER BY */

'use strict';
function insertParam(key, value) {
  key = escape(key); value = escape(value);

  var kvp = document.location.search.substr(1).split('&');
  if (kvp == '') {
    document.location.search = '?' + key + '=' + value;
  }
  else {

    var i = kvp.length; var x; while (i--) {
      x = kvp[i].split('=');

      if (x[0] == key) {
        x[1] = value;
        kvp[i] = x.join('=');
        break;
      }
    }

    if (i < 0) { kvp[kvp.length] = [key, value].join('='); }

    document.location.search = kvp.join('&');
  }
}

$('#sortby').on('change', function () {
 var key = 'sortby';
 var value = $(this).val();
 insertParam(key, value);
});

/* FOLLOWERS */
'use strict';
$(document).ready(function(){
  $('.follow').on('click', function(){
    var followerId = $(this).data('follower');
    var userId = $(this).data('user');
    $.ajax({
      url: SITEURL+"/controllers/follow.php?action=follow",
      type: 'post',
      data: {
        'follower': followerId,
        'user': userId
      },
      success: function(response){
        $('.follow').addClass('uk-hidden uk-animation-fade');
        $('.follow').siblings().removeClass('uk-hidden');
      },
    });
  });

  $('.unfollow').on('click', function(){
    var followerId = $(this).data('follower');
    var userId = $(this).data('user');
    $.ajax({
      url: SITEURL+"/controllers/follow.php?action=unfollow",
      type: 'post',
      data: {
        'follower': followerId,
        'user': userId
      },
      success: function(response){
        $('.unfollow').addClass('uk-hidden uk-animation-fade');
        $('.unfollow').siblings().removeClass('uk-hidden');
      }
    });
  });
});


/* LIKES */
'use strict';
$(document).ready(function(){
  $('.addfav').on('click', function(){
    var itemId = $(this).data('item');
    var userId = $(this).data('user');
    $.ajax({
      url: SITEURL+"/controllers/like.php?action=add",
      type: 'post',
      data: {
        'item': itemId,
        'user': userId
      },
      success: function(response){
        $('.like').addClass('uk-hidden uk-animation-fade');
        $('.like').siblings().removeClass('uk-hidden');
        $('#likes_count').text(response); 
      },
    });
  });

  $('.removefav').on('click', function(){
    var itemId = $(this).data('item');
    var userId = $(this).data('user');
    $.ajax({
      url: SITEURL+"/controllers/like.php?action=remove",
      type: 'post',
      data: {
        'item': itemId,
        'user': userId
      },
      success: function(response){
        $('.unlike').addClass('uk-hidden uk-animation-fade');
        $('.unlike').siblings().removeClass('uk-hidden');
        $('#likes_count').text(response); 
      }
    });
  });
});

/* COMMENTS */

$(document).ready(function(){
    // When user clicks on submit comment to add comment under post
    $(document).on('click', '#submit_comment', function(e) {
      e.preventDefault();
      var comment_item = $('#comment_item').val();
      var comment_user = $('#comment_user').val();
      var comment_text = $('#comment_text').val();
        // Stop executing if not value is entered
        if (comment_text === "" && comment_user === "" && comment_item === "") return;
        $.ajax({
          url: SITEURL+'/controllers/post-comment.php?type=comment',
          type: "POST",
          data: {
            comment_item: comment_item,
            comment_user: comment_user,
            comment_text: comment_text,
            comment_posted: 1
          },
          success: function(data){
            if (data === "error") {
                    //console.log('Error');
                  } else {
                    var response = JSON.parse(data);
                    $('#comments-wrapper').prepend(response.comment)
                    $('#comments_count').text(response.comments_count); 
                    $('#comment_text').val('');
                    $("html,body").animate({scrollTop: $("#comments-wrapper").offset().top}, 2000);
                  }
                }
              });
      });

    $(document).on('click', '.reply-btn', function(e){
      e.preventDefault();

      var comment_id = $(this).data('id');
      $('form#comment_reply_form_' + comment_id).toggle(500);

      $(document).on('click', '.submit-reply', function(e){
        e.preventDefault();

        var comment_user = $(this).data('user');
        var reply_user = $('#reply_user_' + comment_id).val();
            var reply_textarea = $(this).siblings('textarea'); // reply textarea element
            var reply_text = $(this).siblings('textarea').val();
            $.ajax({
              url: SITEURL+'/controllers/post-comment.php?type=reply',
              type: "POST",
              data: {
                comment_id: comment_id,
                reply_user: reply_user,
                reply_text: reply_text,
                reply_posted: 1
              },
              success: function(data){
                if (data === "error") {
                    //console.log('Error');
                  } else {
                    $('.replies_wrapper_' + comment_id).append(data);
                    reply_textarea.val('');
                    $('form#comment_reply_form_' + comment_id).toggle(500);
                    $("html,body").animate({scrollTop: $("ul#replies_"+comment_id+" li:last").offset().top - 130}, 2000);
                  }
                }
              });
          });
    });
  });

/* FILE VALIDATION & PREVIEW */

'use strict';

$("#image-upload").on('change', function(){

  var file = this.files[0];
  var fileType = file.type;
  var match = ['image/jpeg', 'image/png', 'image/jpg'];
  if(!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))){
    alert('Sorry, only JPG, JPEG, & PNG files are allowed to upload.');
    $("#image-upload").val('');
    return false;
  }
});

$(document).ready(function() {
  $.uploadPreview({
    input_field: "#image-upload",
    preview_box: "#image-preview",
    label_field: "#image-label"
  });
});

/* INSERT RECIPE FORM */

'use strict';
$(document).ready(function(){
  $('.insert-form input, .insert-form textarea').on('focus', function() {

    $('.insert-form input, .insert-form textarea').removeClass('uk-form-danger');
    $('.insert-form label').removeClass('uk-text-danger');
    $('.insert-form #ischecked').removeClass('tas-danger-checkbox');
    $('#error p').empty();
    $('#success p').empty();
    $('.insert-form .errors').hide("");

  });
});

'use strict';
$(document).ready(function(e){
    // Submit form data via Ajax
    $(".insert-form form").on('submit', function(e){
      e.preventDefault();

    $('#error').hide();
    $('#error p').empty();
    $('#success').hide();
    $('#success p').empty();

      $.ajax({
        type: 'POST',
        url: SITEURL+"/controllers/insert-recipe.php",
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(json) {

          $('#submit').show();
          $('#loading').hide();

          if(json.recipeTitle != '') {
            $('.insert-form #errorTitleText').show().html(json.recipeTitle);
            $('.insert-form #title').addClass('uk-form-danger');
          }
          if(json.recipeDescription != '') {
            $('.insert-form #errorDescriptionText').show().html(json.recipeDescription);
            $('.insert-form #description').addClass('uk-form-danger');
          }
          if(json.recipeServs != '') {
            $('.insert-form #errorServingsText').show().html(json.recipeServs);
            $('.insert-form #servings').addClass('uk-form-danger');
          }
          if(json.recipeTime != '') {
            $('.insert-form #errorTimeText').show().html(json.recipeTime);
            $('.insert-form #time').addClass('uk-form-danger');
          }
          if(json.recipeIngred != '') {
            $('.insert-form #errorIngrsText').show().html(json.recipeIngred);
            $('.insert-form #ingredients').addClass('uk-form-danger');
          }
          if(json.recipeInstru != '') {
            $('.insert-form #errorInstrText').show().html(json.recipeInstru);
            $('.insert-form #instructions').addClass('uk-form-danger');
          }
          if(json.recipeImage != '') {
            $('.insert-form #errorImageText').show().html(json.recipeImage);
          }
          if(json.isChecked != '') {
            $('.insert-form #errorCheckedText').show().html(json.isChecked);
            $('.insert-form #ischecked').addClass('tas-danger-checkbox');
            $('.insert-form #checked').addClass('uk-text-danger');
          }
          if(json.error != '' && json.recipeTitle == '' && json.recipeDescription == ''
            && json.isChecked == '' && json.recipeServs == '' && json.recipeTime == ''
            && json.recipeIngred == '' && json.recipeInstru == '' && json.recipeImage == ''){

            $('#error').show();
            $("#error p").append(json.error);

          $('html, body').animate({
            scrollTop: $("#top").offset().top
          }, 1000);

        }
        if (json.success != '' && json.error == '' && json.recipeTitle == '' && json.recipeDescription == ''
          && json.isChecked == '' && json.recipeServs == '' && json.recipeTime == ''
          && json.recipeIngred == '' && json.recipeInstru == '' && json.recipeImage == '') {
          $(".insert-form form")[0].reset();

            $('#success').show();
            $("#success p").append(json.success);

        $('html, body').animate({
          scrollTop: $("#top").offset().top
        }, 1000);

          $(".insert-form form").hide();

      }
    }
  });
    });
  });


/* NEWSLETTER */

'use strict';
$('.new-subscriber form').on("submit", function(event){ 

  event.preventDefault();  

  var $this = $('#submit-subscriber');
  var loadingText = '<span class="anim-rotate" uk-icon="refresh"></span>';
  if ($('#submit-subscriber').html() !== loadingText) {
    $this.html(loadingText);
  }

  $.ajax({
    type: 'POST',
    url: SITEURL+"/controllers/add-subscriber.php",
    data: {
      subscriber_email:$("#subscriber_email").val(),
    },
    success: function(data) {

      setTimeout(function(){
        $('#showresults').html(data);
        $this.html($this.val());
      }, 1000);

    }
  });
});

'use strict';
$('.newsletter form').on("submit", function(event){ 

  event.preventDefault();  

  var $this = $('#submit-newsletter');
  var loadingText = '<span class="anim-rotate" uk-icon="refresh"></span>';
  if ($('#submit-newsletter').html() !== loadingText) {
    $this.html(loadingText);
  }

  $.ajax({
    type: 'POST',
    url: SITEURL+"/controllers/add-subscriber.php",
    data: {
      subscriber_email:$("#newsletter_email").val(),
    },
    success: function(data) {

      setTimeout(function(){
        $('#getresults').html(data);
        $this.html($this.val());
      }, 1000);

    }
  });
});

/* REMOVE USER RECIPE */

'use strict';
function deleteAlert(itemId, userId) {

  UIkit.modal.confirm('Are you sure you want to continue?').then(function() {

    var rowId = $('.id-'+itemId);
    var table = $('#recipes_table').DataTable();
    $.ajax({
      url: SITEURL+"/controllers/delete-recipe.php",
      type: 'post',
      data: {
        'item': itemId,
        'user': userId
      },
      success: function(response){
        UIkit.notification('Your recipe #ID'+itemId+' has been removed.', 'success');
        table.ajax.reload();
      }
    });

  }, function () {
    //console.log('Rejected.')
  });

};

'use strict';
$(document).ready(function(){
  $('#recipes_table').on('click', '.deleteItem', function(){

    var itemId = $(this).data('item');
    var userId = $(this).data('user');

    deleteAlert(itemId, userId);

  });
});

'use strict';
$(document).ready(function(){
  $('#favorites_table').on('click', '.deleteItem', function(){
    var itemId = $(this).data('item');
    var userId = $(this).data('user');
    var table = $('#favorites_table').DataTable();
    $.ajax({
      url: SITEURL+"/controllers/like.php?action=remove",
      type: 'post',
      data: {
        'item': itemId,
        'user': userId
      },
      success: function(response){
                //UIkit.notification('This Favorite Has Been Removed', 'success');
                table.ajax.reload();
              }
            });
  });
});

/* DISABLE NICE SELECT MOBILE DEVICES */

'use strict';
$(document).ready(function() {
  checkSize();
  $(window).resize(checkSize);
});

function checkSize(){
  if (window.matchMedia("(min-width: 768px)").matches) {
    $("select").removeClass('uk-select');
    $("select").niceSelect();
    $("select").addClass('nc-select');
  } else {
    $("select").niceSelect("destroy");
    $("select").removeClass('nc-select');
    $("select").addClass('uk-select');
  }
}

/* UPDATE PROFILE */

'use strict';
$('.update-profile form').on("submit", function(event){ 

  event.preventDefault();  

  var $this = $('#submit-send');
  var loadingText = '<span class="anim-rotate" uk-icon="refresh"></span>';
  if ($('#submit-send').html() !== loadingText) {
    $this.html(loadingText);
  }

  $.ajax({
    type: 'POST',
    url: SITEURL+"/controllers/update-profile.php",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData:false,
    success: function(data) {

      setTimeout(function(){
        $('#showresults').html(data);
        $this.html($this.val());
      }, 1000);

    }
  });
});