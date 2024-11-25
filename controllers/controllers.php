<?php
include_once("models/Model.php");
class Controller
{
    public $model;
    public function __construct()
    {
        $this->model = new Model();
    }
    public function index()
    {
        require_once('views/index.php');
    }
    function save()
    {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $this->model->simpanData($nim, $nama);
        $this->index();
    }
    function show_data()
    {
        if (!isset($_GET['i'])) {
            $rs = $this->model->lihatData();
            require_once('views/mhsList.php');
        } else {
            $rs = $this->model->lihatDataDetail($_GET['i']);
            require_once('views/mhsDetail.php');
        }
    }
}
