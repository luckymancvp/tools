<?php

class CampaignForm extends CFormModel
{
	public $access_token;
	public $campaigns;
	public $res;
    public $status;
    public $delay = 5;

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
			array('access_token, campaigns, status, delay', 'required'),
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
            'campaigns' => 'Campaigns',
            'res' => 'Kết Quả Sau Khi Đăng',
		);
	}

    public static function actionList()
    {
        return array(
            'PAUSED' => 'PAUSED',
            'DELETED' => 'DELETED',
            'ARCHIVED' => 'ARCHIVED',
            'ACTIVE' => 'ACTIVE',
        );
    }

    public function execute()
    {
        if (!$this->validate())
            return false;
        $this->res = null;
        $this->campaigns = explode(PHP_EOL, $this->campaigns);
        $service = new CampaignServices();
        $this->res = $service->changeCampaignStatus($this->access_token, $this->campaigns, $this->status, $this->delay);
        $this->res = json_encode($this->res);
        $this->campaigns = implode(PHP_EOL, $this->campaigns);
    }
}