<?php
require_once 'models/News.php';
class NewsController
{
    private $newsModel;

    public function __construct($conn)
    {
        $this->newsModel = new News($conn);
    }

    //Hien thi danh sach tin tuc
    public function index()
    {
        $news = $this->newsModel->getAllNews();
        require 'views/news/index.php';
    }

    //Hien thi chi tiet tin tuc
    public function detail($id)
    {
        $newsItem = $this->newsModel->getNewsById($id);
        if ($newsItem) {
            require 'views/news/detail.php';
        } else {
            echo "Tin tức không tồn tại!";
        }
    }
}