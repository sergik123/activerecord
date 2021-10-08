<?php

namespace Controller;

use Framework\Controller\AbstractController;
use Model\Article;
use Model\User;

class Index extends AbstractController
{
    public function index()
    {
        Article::createDb();
        Article::sendText('my text from db');
        $articles = Article::findAll();

        return $this->view->generate(
            'framework/index.phtml',
            [
                'content'=>$articles['text_content'],
            ]
        );
    }
}