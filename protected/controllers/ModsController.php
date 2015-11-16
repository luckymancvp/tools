<?php

class ModsController extends Controller
{
    public function actionIndex()
    {
        $skin = new stdClass();
        $skin->name = '';
        $skin->image_link = '';
        $skin->front_image_link = '';
        $skin->back_image_link = '';

        $content = "";

        $this->render('index', array(
            'content' => $content,
            'skin' => $skin,
        ));
    }
}