<?php

namespace App\Blog\Article\Application\Entity;


class Article{

    /**
     * @var int $id
     */
    private $id;

    /**
     * @var \DateTime creationDate
     */
    private $creationDate;

    /**
     * @var string 
     */
    private $type;
    private $title;
    private $url;
    private $intro;
    private $picture;

    public function __construct(int $id, \DateTime $creationDate, string $type, string $title, string $url, string $intro, string $picture)
    {
        $this->id = $id;
        $this->creationDate = $creationDate;
        $this->type = $type;
        $this->title = $title;
        $this->url = $url;
        $this->intro = $intro;
        $this->picture = $picture;
    }


    public function getId(){
		return $this->id;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate(\DateTime $creationDate){
		$this->creationDate = $creationDate;
	}

	public function getType(){
		return $this->type;
	}

	public function setType(string $type){
		$this->type = $type;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle(string $title){
		$this->title = $title;
	}

	public function getUrl(){
		return $this->url;
	}

	public function setUrl(string $url){
		$this->url = $url;
	}

	public function getIntro(){
		return $this->intro;
	}

	public function setIntro(string $intro){
		$this->intro = $intro;
	}

	public function getPicture(){
		return $this->picture;
	}

	public function setPicture(string $picture){
		$this->picture = $picture;
	}


}