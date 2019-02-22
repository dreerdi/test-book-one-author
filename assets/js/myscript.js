  $(document).ready(function($) {
      $("a.deleteBook").click(function (e) {
        e.preventDefault();  
        var book_id = e.target.id;
        $.ajax({
          url: '/ajax/delete_book',
          type: "POST",
          data:{
            'book_id' : book_id,
            },
          success:function(data){
              if(data) {
                //alert("Книга " + book_id + " удалена!");
                $("tr#tr" + book_id).remove();
              }              
            },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError); 
            }
        });
      });  
      $("#edit_book").click(function (e) {
        e.preventDefault();  
        var book = $("#form_edit").serialize();
        $.ajax({
          url: '/ajax/edit_book',
          type: "POST",
          data: book,
          success:function(){              
              alert("Изменения внесены");
            },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError); 
            }
        });
      });    
      $("#add_book").click(function (e) {
        e.preventDefault();  
        var book = $("#form_create").serialize();
        $.ajax({
          url: '/ajax/create_book',
          type: "POST",
          data: book,
          success:function(){              
              alert("Книга добавлена");
            },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError); 
            }
        });
      });    
  });