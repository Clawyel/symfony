<?php


namespace App\RepositoryInterfaces;


interface ArticlesInterface
{
    public function editArticle();
    public function deleteArticle();
    public function getArticleById();
    public function fetchArticles();
    public function getArticleTagsById();
    public function fetchArticlesTags();
}