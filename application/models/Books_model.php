<?php

class Books_model extends CI_Model
{
	
	public function __construct()
	{
		$this->load->database();
	}

	public function getBooks($book_id = FALSE)
	{
		if($book_id === FALSE) 
		{
			$query = $this->db->get('books');
			return $query->result_array();
		}
		$query = $this->db->get_where('books', array('book_id' => $book_id));
		return $query->row_array();
	}

	public function createBook($genre_id, $author_id, $title, $release_year)
	{
		$data = array(
			'book_id' => NULL,
			'genre_id' => $genre_id,
			'author_id' => $author_id,
			'title' => $title,
			'release_year' => $release_year
		);
		return $this->db->insert('books', $data);
	}

	public function updateBook($book_id, $genre_id, $author_id, $title, $release_year)
	{
		$data = array(
			'book_id' => $book_id,
			'genre_id' => $genre_id,
			'author_id' => $author_id,
			'title' => $title,
			'release_year' => $release_year
		);
		return $this->db->update('books', $data, array('book_id' => $book_id));
	}

	public function deleteBook($book_id)
	{
		return $this->db->delete('books', array('book_id' => $book_id));
	}

	public function getGenre($genre_id = FALSE) 
	{
		if($genre_id === FALSE) 
		{
			$query = $this->db->get('genres');
			return $query->result_array();
		}
		$query = $this->db->get_where('genres', array('genre_id' => $genre_id));
		return $query->row_array();
	}

	public function getAuthor($book_id = FALSE) 
	{
		if($book_id === FALSE) 
		{
			$query = $this->db->get('authors');
			return $query->result_array();
		}
		$query = $this->db->query("SELECT a.fio FROM `books` b INNER JOIN `authors` a ON a.author_id = b.author_id && b.book_id = $book_id");
		return $query->row_array();
	}
}