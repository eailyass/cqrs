<?php

namespace App\Blog\Article\Application\Trait;

use App\Blog\Article\Application\Entity\ArticleValueObject;
use App\Blog\Article\Application\Exception\ArticleNotFoundException;

trait FromXML{

    /**
     * Tries to return child node text value of the given element as a NonEmpty value object.
     */
    final public function childToNonEmpty(DOMElement $root, string $name, string $type = NonEmpty::class): ?NonEmpty
    {
        if (null === $value = $this->childValue($root, $name)) {
            return null;
        }
        return $this->toNonEmpty($value, $type);
    }
    
    /**
    * Converts string value to NonEmpty value object.
    */
    final public function toNonEmpty(string $value, string $type = NonEmpty::class): NonEmpty
    {
        $isValid = is_a($type, NonEmpty::class, true);
        Assert::true($isValid, 'INVALID TYPE');
    
        return new NonEmpty($value);
    }


    public function transform(ArticleValueObject $article){
        
        $nonEmptyUrl = $this->childToNonEmpty($article, "url");
        if ($nonEmptyUrl instanceof NonEmpty) {
            return $nonEmptyUrl->getValue();
        }
        $message = sprintf("Aucun article n'a été trouvé pour cette url {{ %value% }}",[$nonEmptyUrl->getValue()]);
        $code = "404";
        throw new ArticleNotFoundException($message, $code);
        
    }
}
