<?php

defined('BASEPATH') OR exit('No direc script access allowed');

class Ajax extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function create_book() 
	{
		$genre_id = $_POST['genre'];
		$author_id = $_POST['author'];
		$title = (string) $_POST['title'];
		$release_year = $_POST['release_year'];
		echo $this->books_model->createBook($genre_id, $author_id, $title, $release_year);
		return TRUE;
	}

	public function delete_book() 
	{
		$book_id = $_POST['book_id'];
		echo $this->books_model->deleteBook($book_id);
		return TRUE;
	}

	public function edit_book() 
	{
		$book_id = $_POST['book_id'];
		$genre_id = $_POST['genre'];
		$author_id = $_POST['author'];
		$title = (string) $_POST['title'];
		$release_year = $_POST['release_year'];
		echo $this->books_model->updateBook($book_id, $genre_id, $author_id, $title, $release_year);
		return TRUE;
	}
}