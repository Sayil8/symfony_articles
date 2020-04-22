<?php

namespace Tests\Entity;
use PHPUnit\Framework\TestCase;
use App\Entity\Article;

class ArticleTest extends TestCase {


    public function testContentArticle(){
        $article = new Article();
        $article->setContent(3);

        $this->assertEquals(3, $article->getContent());
    }

    public function testContentTitle(){
    }
}