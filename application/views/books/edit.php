
<h2 class="text-center">Редактирование записи</h2>
<form action="/books/edit/<?php echo $book_id_books; ?>/" method="POST" id="form_edit">
	<input class="form-control" value="<?php echo $book_id_books; ?>" type="hidden" id="book_id" name="book_id"><br>
	<label for="genre">жанр
		<select class="form-control" name="genre" id="genre">
			<?php foreach ($genres as $key => $value): ?>
				<option value="<?php echo $value['genre_id']; ?>" <?php if ($value['genre_id'] === $genre_id) { echo 'selected';} ?> ><?php echo $value['title']; ?></option>
			<?php endforeach ?>
		</select>
	</label><br>
	<label for="author">автор
		<select class="form-control" name="author" id="author">
			<?php foreach ($authors as $key => $value): ?>
				<option value="<?php echo $value['author_id']; ?>" <?php if ($value['author_id'] == $author_id_books) { echo 'selected';} ?> ><?php echo $value['fio']; ?></option>
			<?php endforeach ?>
		</select>
	</label><br>
	<label for="title">название книги</label>
	<input class="form-control" value="<?php echo $title_books; ?>" type="input" id="title" name="title" placeholder="название книги"><br>
	<label for="release_year">год выпуска</label>
	<input class="form-control"  value="<?php echo $release_year_books; ?>" type="input" id="release_year" name="release_year" placeholder="год выпуска"><br>
	<input type="submit" class="btn btn-success" value="Внести изменения" name="edit_book" id="edit_book">
</form>