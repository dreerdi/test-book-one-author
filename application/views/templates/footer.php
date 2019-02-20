            </div>
        <div class="clear"></div>
    </div>    
    <footer>      
      <div class="container">        
        <p class="text-center"><a href="/">test books | 2019</a></p>
      </div>
    </footer>
    <!-- <script src="/assets/js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <!-- <script src="/assets/js/bootstrap.min.js"></script>      -->
    <!-- <script type="text/javascript" src="/assets/js/myscript.js"></script> -->
   <!--  <script src="/assets/js/myscript.js"></script> -->
   <script>
       $(document).ready(function() {
      $("a#deleteBook").click(function (e) {
          e.preventDefault();  
          alert("Мы не перешли по ссылке, а вывели своё сообщение1111!");      
          });
      $.ajax({
        url: "/books/delete",
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
   </script>
  </body>
</html>