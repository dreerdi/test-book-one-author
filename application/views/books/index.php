<h2 class="text-center">Каталог</h2>
<a href="/books/create/" class="btn btn-success text-center">Добавить книгу</a>
<table class="table table-striped table-bordered">
	<tr class="success">
		<th class="text-center">id</th>
		<th class="text-center">Жанр</th>
		<th class="text-center">Автор</th>
		<th class="text-center">Название книги</th>
		<th class="text-center">Год издания</th>
		<th class="text-center">Редактировать/удалить запись</th>		
	</tr>
	<?php foreach ($books as $key => $value): ?>
		<tr>
			<td class="text-center"><?php echo $value['book_id']; ?></td>
			<td><?php echo $this->books_model->getGenre($value['genre_id'])['title']; ?></td>
			<td><?php echo $this->books_model->getAuthor($value['book_id'])['fio']; ?></td>
			<td><?php echo $value['title']; ?></td>
			<td class="text-center"><?php echo $value['release_year']; ?></td>
			<td class="text-center"><a href="/books/edit/<?php echo $value['book_id']; ?>/" title="Редактировать запись"><span class="glyphicon glyphicon-pencil"></span></a><span>  /  </span><a id="deleteBook" value="<?php echo $value['book_id']; ?>" href="/books/delete/<?php echo $value['book_id']; ?>/" title="Удалить запись"><span class="glyphicon glyphicon-trash"></span></a></td>
		</tr>
	<?php endforeach ?>
</table>