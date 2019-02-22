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
		$this->load->view('templates/header', $this->data);
		$this->load->view('books/create', $this->data);
		$this->load->view('templates/footer');
	}

	public function edit($book_id = NULL)
	{
		$this->data['title'] = 'Редактировать книгу';
		$this->data['books_item'] = $this->books_model->getBooks($book_id);
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
		$this->load->view('templates/header', $this->data);
		$this->load->view('books/edit', $this->data);
		$this->load->view('templates/footer');
	}

}