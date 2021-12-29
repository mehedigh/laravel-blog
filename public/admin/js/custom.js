
(function($) {
  "use strict";


  var csrf_token =  $('meta[name="csrf-token"]').attr('content');
  
  $(document).ready(function(){
    if ($('#success').val()) {
      tata.success('Success', $('#success').val(), {
        position: 'tr',
        duration: 4000,
        animate: 'slide'
      });
    }
    
    if ($('#error').val()) {
      tata.error('Error', $('#error').val(), {
        position: 'tr',
        duration: 6000,
        animate: 'slide'
      });
    }
  });

  $(document).on('click', ".add_btn", function() {
      $('.add_area').show();
      $('.list_area').hide();
      return false;
  });

  $(document).on('click', ".cancel_btn", function() {
      $('.add_area').hide();
      $('.list_area').show();
      return false;
  });


  $(document).on('click', ".add_btn2", function() {
      $('.add_area2').show();
      $('.list_area2').hide();
      return false;
  });

  $(document).on('click', ".cancel_btn2", function() {
      $('.add_area2').hide();
      $('.list_area2').show();
      return false;
  });

  

  $(document).on('click', ".delete_item", function() {
    var del_url = $(this).attr('href');
    var valId = $(this).attr('data-id');
    swal({
      title: "Are you sure?",
      text: "You will not be able to recover this file",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Yes, delete it!",
      closeOnConfirm: false
    },
    function(){ 
        $.post(del_url, { data: 'value', '_token': csrf_token }, function(json) {
            if(json.st == 1){     
                swal({
                  title: "Success",
                  text: "Deleted successfully",
                  type: "success",
                  showCancelButton: false
                }),                
                $("#row_"+valId).slideUp();
            }
        },'json');
    });

    return false;
});









})(jQuery);