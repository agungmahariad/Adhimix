// MENU MOBILE SLIDE
$(function () {
  $('.navbar-toggle-sidebar').click(function () {
    $('.navbar-nav').toggleClass('slide-in');
    $('.side-body').toggleClass('body-slide-in');
    $('#search').removeClass('in').addClass('collapse').slideUp(200);
  });

  $('#search-trigger').click(function () {
    $('.navbar-nav').removeClass('slide-in');
    $('.side-body').removeClass('body-slide-in');
    $('.search-input').focus();
  });
});


// BACK TO TOP
jQuery(document).ready(function() {
  var offset = 220;
  var duration = 500;
  jQuery(window).scroll(function() {
    if (jQuery(this).scrollTop() > offset) {
      jQuery('.back-to-top').fadeIn(duration);
    } else {
      jQuery('.back-to-top').fadeOut(duration);
    }
  });
  jQuery('.back-to-top').click(function(event) {
    event.preventDefault();
    jQuery('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});


// BOOTSTRAP
$(document).ready(function(){
  //Tooltip
  $('[data-toggle="tooltip"]').tooltip();

  //Tooltip
  $('[data-toggle="popover"]').popover()
});


// CK EDITOR
var dd=1;
$(".editor").each(function(){
  $(this).attr("id","editor"+dd);
  CKEDITOR.replace( 'editor'+dd);
  dd=dd+1;
});


$("#checkAll1").click(function () {
  $(".check-box1").not(this).prop('checked', this.checked);
});
$("#checkAll2").click(function () {
  $(".check-box2").not(this).prop('checked', this.checked);
});
$("#checkAll3").click(function () {
  $(".check-box3").not(this).prop('checked', this.checked);
});
$("#checkAll4").click(function () {
  $(".check-box4").not(this).prop('checked', this.checked);
});
$("#checkAll5").click(function () {
  $(".check-box5").not(this).prop('checked', this.checked);
});
$("#checkAll6").click(function () {
  $(".check-box6").not(this).prop('checked', this.checked);
});
$("#checkAll7").click(function () {
  $(".check-box7").not(this).prop('checked', this.checked);
});
$("#checkAll8").click(function () {
  $(".check-box8").not(this).prop('checked', this.checked);
});
$("#checkAll9").click(function () {
  $(".check-box9").not(this).prop('checked', this.checked);
});


// IMAGE UPLOAD
$(document).on('click', '.browse', function(){
  var file = $(this).parent().parent().parent().find('.single-upload');
  file.trigger('click');
});
$(document).on('change', '.single-upload', function(){
  $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
});


// IMAGE UPLOAD PREVIEW
var fileDiv = document.getElementById("upload");
var fileInput = document.getElementById("upload-image");

function showThumbnail(files) {
  for (var i = 0; i < files.length; i++) {
    var file = files[i];
    var imageType = /image.*/;
    if (!file.type.match(imageType)) {
      console.log("Not an Image");
      continue;
    }

    var image = document.createElement("img");
    // image.classList.add("")
    var thumbnail = document.getElementById("upload-thumbnail");
    image.file = file;
    thumbnail.appendChild(image);

    var reader = new FileReader();
    reader.onload = (function(aImg) {
      return function(e) {
        aImg.src = e.target.result;
      };
    }(image));
    var ret = reader.readAsDataURL(file);
    var canvas = document.createElement("canvas");
    ctx = canvas.getContext("2d");
    image.onload = function() {
      ctx.drawImage(image, 100, 100);
    }
  }
}

fileInput.addEventListener("change", function(e) {
  var files = this.files;
  showThumbnail(files);
}, false);

fileDiv.addEventListener("click", function(e) {
  $(fileInput).show().focus().click().hide();
  e.preventDefault();
}, false);

fileDiv.addEventListener("dragenter", function(e) {
  e.stopPropagation();
  e.preventDefault();
  fileDiv.innerHTML = "Drop here";
}, false);

fileDiv.addEventListener("dragover", function(e) {
  e.stopPropagation();
  e.preventDefault();
}, false);

fileDiv.addEventListener("drop", function(e) {
  e.stopPropagation();
  e.preventDefault();
  var dt = e.dataTransfer;
  var files = dt.files;
  showThumbnail(files);
}, false);


// SELECT DROPDOWN SHOW HIDE
$(document).ready(function(){
  $("select").change(function(){
    $(this).find("option:selected").each(function(){
      var optionValue = $(this).attr("value");
      if(optionValue){
        $(".box").not("." + optionValue).hide();
        $("." + optionValue).show();
      } else{
        $(".box").hide();
      }
    });
  }).change();
});