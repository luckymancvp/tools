<?php

class CampaignsController extends SController
{
	public function actionAdd()
	{
        $res = array();
        $links = array();
        if (request("links")) {
            $links = explode(PHP_EOL, trim(request("links")));
            $links = array_filter($links);
            foreach ($links as $link) {
                $link = trim($link);
                $res[] = $this->saveLink($link);
                sleep(1);
            }
        }
        $this->render('add', array(
            'res' => $res,
            'links' => $links,
        ));
	}

	public function actionDelete()
	{
        $key = request('key');
        $model = Campaigns::model()->findByAttributes(array('key'=>$key));

        if (!$model || $model->user_id !== Users::me()->id)
            throw new CHttpException(400, 'Not found Link');

        if ($model->delete()){
            Yii::app()->user->setFlash('success', "Deleted Successful !");
        };
	}

	public function actionEdit()
	{
        $key = request('key');
        $model = Campaigns::model()->findByAttributes(array('key'=>$key));

        if (!$model || $model->user_id !== Users::me()->id)
            throw new CHttpException(400, 'Not found Link');

        $model->src = trim(request('src'));
        if ($model->save()){
            Yii::app()->user->setFlash('success', "Edit Successful !");
        };
	}

	public function actionIndex()
	{
        $models = Campaigns::model()->findAllByAttributes(array('user_id'=>Users::me()->id));
		$this->render('index', array(
            'models' => $models,
        ));
	}

	public function actionView()
	{
        $key = request('key');

        /** @var Campaigns $model */
        $model = Campaigns::model()->findByAttributes(array('key'=>$key));
        if (!$model)
            throw new CHttpException(404,'This link is not available');

		$model->process();
	}

    private function getOneLink($link, $sep, $key)
    {
        switch ($sep){
            case 'tab':
                $sep = "\t";
                break;
            case 'comma':
                $sep = ',';
                break;
        }

        $items = explode($sep, $link);
        if (sizeof($items) < 2)
            return 'Error create url';

        $model = Links::create($items[0], $items[1], $key);
//        $model->getShorten();
        return $model->getLink();/*. $sep .  $model->shorten*/;
    }

    private function saveLink($link){
        $model = Campaigns::create($link);

        return $model->shorten;
    }
}