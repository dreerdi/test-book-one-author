<h2 class="text-center">Добавление книги</h2>
<form action="/books/create/" method="POST" id="form_create">
	<label for="genre">жанр
		<select class="form-control" name="genre" id="genre">
			<?php foreach ($genres as $key => $value): ?>
				<option value="<?php echo $value['genre_id']; ?>"><?php echo $value['title']; ?></option>
			<?php endforeach ?>
		</select>
	</label><br>
	<label for="author">автор
		<select class="form-control" name="author" id="author">
			<?php foreach ($authors as $key => $value): ?>
				<option value="<?php echo $value['author_id']; ?>"><?php echo $value['fio']; ?></option>
			<?php endforeach ?>
		</select>
	</label><br>
	<input class="form-control" type="input" id="title" name="title" placeholder="название книги"><br>
	<input class="form-control" type="input" id="release_year" name="release_year" placeholder="год выпуска"><br>
	<input type="submit" class="btn btn-success" value="Добавить книгу" id="add_book" name="add_book"> 	
</form>