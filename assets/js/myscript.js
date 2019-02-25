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
          success:function($data){              
              alert("Изменения в книгу, с id " + $data + ", внесены");
              window.location.href = '/books/';
            },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError); 
            }
        });
      });    
      $("#add_book").click(function (e) {
        e.preventDefault();  
        var book = $("#form_create").serialize();
        if($("#genre").val()==="") {
          alert("Выберите жанр!");
          return false;
        }
        if($("#author").val()==="") {
          alert("Выберите автора!");
          return false;
        }
        if($("#title").val()==="") {
          alert("Введите название книги!");
          return false;
        }
        if($("#release_year").val()==="") {
          alert("Введие год издания книги!");
          return false;
        }
        $.ajax({
          url: '/ajax/create_book',
          type: "POST",
          data: book,
          success:function($data){ 
              alert("Книга, " + $data + ", добавлена");
              window.location.href = '/books/';
            },
          error:function (xhr, ajaxOptions, thrownError){
              alert(thrownError); 
            }
        });
      });    
  });