<?php

defined('BASEPATH') OR exit('No direc script access allowed');

class Books extends MY_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index() 
	{
		$this->data['title'] = 'Каталог книг';
		$this->data['books'] = $this->books_model->getBooks();
		//$this->data['genre_item'] = $this->books_model->getItemGenre($this->data['books'][$genre_id]);
		if(empty($this->data['books'])) {
			show_404();
		}
		$this->load->view('templates/header', $this->data);
		$this->load->view('books/index', $this->data);
		$this->load->view('templates/footer');
	}

	public function create() 
	{
		$this->data['title'] = 'Добавить книгу';
		$this->data['result'] = 'Книга добавлена';
		$this->data['genres'] = $this->books_model->getGenre();
		$this->data['authors'] = $this->books_model->getAuthor();
		if($this->input->post('genre') && $this->input->post('author') && $this->input->post('title') && $this->input->post('release_year')) {
			$genre_id = $this->input->post('genre');
			$author_id = $this->input->post('author');
			$title = (string) $this->input->post('title');
			$release_year = $this->input->post('release_year');
			if($this->books_model->createBook($genre_id, $author_id, $title, $release_year)) {
				$this->data['result'] = 'запись добавлена';
				$this->load->view('templates/header', $this->data);
				$this->load->view('books/success', $this->data);
				$this->load->view('templates/footer');
			} 
		} else {
			$this->load->view('templates/header', $this->data);
			$this->load->view('books/create', $this->data);
			$this->load->view('templates/footer');
		}
	}

	public function edit($slug = NULL)
	{
		$this->data['title'] = 'Редактировать книгу';
		$this->data['books_item'] = $this->books_model->getBooks($slug);
		if(empty($this->data['books_item'])) {
			show_404();
		}
		$this->data['genres'] = $this->books_model->getGenre();
		$this->data['authors'] = $this->books_model->getAuthor();
		$this->data['genre_id'] = $this->data['books_item']['genre_id'];;
		$this->data['book_id_books'] = $this->data['books_item']['book_id'];
		$this->data['author_id_books'] = $this->data['books_item']['author_id'];
		$this->data['genre_id_books'] = $this->books_model->getGenre($this->data['books_item']['genre_id'])['title'];
		$this->data['author_books'] = $this->books_model->getAuthor($this->data['books_item']['book_id'])['fio'];
		$this->data['title_books'] = $this->data['books_item']['title'];
		$this->data['release_year_books'] = $this->data['books_item']['release_year'];
		if($this->input->post('genre') && $this->input->post('author') && $this->input->post('title') && $this->input->post('release_year')) {
			$book_id = $this->input->post('book_id');
			$author_id = $this->input->post('author');
			$genre_id = $this->input->post('genre');
			$title = (string) $this->input->post('title');
			$release_year = $this->input->post('release_year');
			if($this->books_model->updateBook($book_id, $genre_id, $author_id, $title, $release_year)) {
				$this->data['result'] = 'запись изменена';
				$this->load->view('templates/header', $this->data);
				$this->load->view('books/success', $this->data);
				$this->load->view('templates/footer');
			} 
		} else {
			$this->load->view('templates/header', $this->data);
			$this->load->view('books/edit', $this->data);
			$this->load->view('templates/footer');
		}
	}
	public function delete($book_id = NULL)
	{
		$this->data['delete_book'] = $this->books_model->getBooks($book_id);
		if(empty($this->data['delete_book'])) {
			show_404();
		}
		$this->data['title'] = 'Удалить новость';
		$this->data['result'] = 'Ошибка удаления';
		if($this->books_model->deleteBook($book_id)) {
			$this->data['result'] = "книга ".$this->data['delete_book']['title']." удалена";
		}
		$this->load->view('templates/header', $this->data);
		$this->load->view('books/success', $this->data);
		$this->load->view('templates/footer');
	}
}