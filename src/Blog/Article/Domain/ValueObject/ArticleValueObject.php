<?php

namespace App\Blog\Article\Application\Entity;


class ArticleValueObject implements DOMElement{

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
	private $Validator;

    public function __construct(\DateTime $creationDate, string $type, string $title, string $url, string $intro, string $picture, ValidatorInterface $validator)
    {
        
		$this->validator = $validator;
		$errors = count($this->validator->validate($url, [
			new Assert\Url()]));
		$errors+= count($this->validator->validate($title, [
			new Assert\NotBlank()]));
		
			if ($errors>0) {
				throw  new \InvalidArgumentException(sprintf( 'the article is not well instanciated'));
			} 
		$this->creationDate = $creationDate;

        $this->type = $type;
        $this->title = $title;

        $this->url = $url;
        $this->intro = $intro;
        $this->picture = $picture;
    }

}