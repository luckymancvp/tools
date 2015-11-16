<?php

class PageForm extends CFormModel
{
	public $access_token = 'Please Get New Token';
	public $page_id;
	public $file;
	public $res;
	public $start = -1;/*
    public $content_template = '{name} Who are YOU? Tell Everyone about YOU with the [SPECIAL] Tshirt.
Click to Order ➨ {link} .
ONLY $22 for Tshirt and $39 for Hoodie..';*/
    public $content_template = '{1} in {2} <Limited Quantity | International Shipping | SCOTISH SHIRT>.
(y) Click to Order ➨ {link} .
<3 An Awesome Tee For Everyone  <3';

    public static function model($className = __CLASS__)
    {
        return $className;
    }

    public static function className()
    {
        return __CLASS__;
    }

    /**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('access_token, page_id, content_template, start', 'required'),
//            array('file', 'file', 'types'=>'csv'),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
            'access_token' => 'Access Token',
            'page_id' => 'Page ID',
            'content_template' => 'Nội dung bài viết',
            'file' => 'Danh sách bài viết',
            'res' => 'Kết Quả Sau Khi Đăng',
            'start' => 'Bắt Đầu Từ',
		);
	}

    public function execute()
    {
        if (!$this->validate())
            return false;
        /** @var CUploadedFile $file */
        $file = CUploadedFile::getInstance($this ,'file');
        $csvFile = $file->getTempName();
        $fbService = new FbServices2();
        $pageAccessToken = $fbService->getPageAccessToken($this->page_id, $this->access_token);
        if ($pageAccessToken == FbServices2::ERROR_TOKEN){
            $this->addError('access_token', 'Access Token đã hết hạn');
            return;
        };
        if ($pageAccessToken == FbServices2::ERROR_PAGE_NOT_FOUND){
            $this->addError('page_id', 'Không tồn tại Page.');
            return;
        };

        $this->res = null;

        $fbService->setPageAccessToken($this->page_id, $pageAccessToken);
        $this->res = $fbService->post2Page($csvFile, $this->content_template, $this->start);
        $this->res = implode(PHP_EOL, $this->res);
    }
}