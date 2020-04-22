<?php
namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testShowPost()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testLinkNewArticle(){
       
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $link = $crawler
                ->filter('a:contains("Show")') //get all 'a' that contain name show 
                ->eq(3) //click the 4th one
                ->link();
        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    public function testNewArticle(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/article/new');
        $form = $crawler->selectButton('form[save]')->form();
        $form['form[title]'] = 'More news';
        $form['form[content]'] = 'Company join to form new console';

        $crawler = $client->submit($form);
        $this->assertTrue(
            $client->getResponse()->isRedirect('/'));

    }
}