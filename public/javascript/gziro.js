// OOP MVC LogIn System
// Irakli Gzirishvili
// 15/10/2021

// LOG - print values in the browser console.
function LOG(text)
{
    console.log(text);
}
// LENGTH - Set max length for input - Prevent Copy/Paste in input - Run function with pressing to Enter.
function LENGTH(input,length,onEnter)
{
  $(document).ready(function(){
    $('#'+input).keypress(function(key){
      if(onEnter && key.which == 13)
      {
        key.preventDefault();
        onEnter();
      }
      if(this.value.length == length) return false;
    });
    $('#'+input).bind("cut copy paste",function(e) {
      e.preventDefault();
    });
  });
}
// SET_IMG - Set selected img to dispatchEvent.
function SET_IMG(input, where)
{
  $(document).on('change', '#'+input, function (event)
  {
    var fileSelectEle = document.getElementById(input);
    LOG(fileSelectEle.value);
    if(fileSelectEle.value.length == 0) {}else {
          var output = document.getElementById(where);
        if(output)
        {
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function()
        {
        URL.revokeObjectURL(output.src);
        }
      }
    };
  });
}
// ERROR - Show error with text.
function ERROR(text)
{
  var label = $('.form_lbl').html();
  $('#s0').css({'box-shadow': '0px 0px 20px #F02A00'});
  $('.form_lbl').html(text).css({'color': '#F02A00','font-size':'35px'});
  setTimeout(() => {
      $('#s0').css({'box-shadow': '0px 0px 20px #000000'});
      $('.form_lbl').html(label).css({'color': '#272727','font-size':'50px'});
  },3000);
}
// DONE - Show successful operation status with text.
function DONE(text)
{
  var label = $('.form_lbl').html();
  $('#s0').css({'box-shadow': '0px 0px 20px #00ff08'});
  $('.form_lbl').html(text).css({'color': '#00ff08','font-size':'35px'});
  setTimeout(() => {
      $('#s0').css({'box-shadow': '0px 0px 20px #000000'});
      $('.form_lbl').html(label).css({'color': '#272727','font-size':'50px'});
  },3000);
}