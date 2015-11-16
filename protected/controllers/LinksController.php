<?php

class LinksController extends Controller
{
	public function actionBatch()
	{
        $key = request('key', 'luckymancvp');
        $res = array();
        $links = array();
        $sep = request('sep', 'tab');
        if (request("links")) {
            $links = explode(PHP_EOL, trim(request("links")));
            $links = array_filter($links);
            foreach ($links as $link) {
                $res[] = $this->getOneLink($link, $sep, $key);
//                sleep(1);
            }
        }
        $this->render('batch', array(
            'key' => $key,
            'res' => $res,
            'links' => $links,
        ));
	}

	public function actionDelete()
	{
		$this->render('delete');
	}

	public function actionEdit()
	{
		$this->render('edit');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionView()
	{
        $id = request('id');
        /** @var Links $model */
        $model = Links::model()->findByPk(intval($id));
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
}