
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