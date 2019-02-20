  $(document).ready(function() {
      $("a#deleteBook").click(function (e) {
          e.preventDefault();  
          alert("Мы не перешли по ссылке, а вывели своё сообщение1111!");      
          });
      $.ajax({
        url: "/application/views/delete_book.php",
        type: "POST",
        data:{
          book_id : $("#deleteBook").val(),
          },
        success:function(){
          alert("Книга удалена!");
          },
        error:function (xhr, ajaxOptions, thrownError){
            alert(thrownError); 
          }
      });
  });