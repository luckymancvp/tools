<?php

class SkinsController extends Controller
{
    public function actionIndex()
    {
        $skin = new stdClass();
        $skin->name = '';
        $skin->image_link = '';
        $skin->front_image_link = '';
        $skin->back_image_link = '';

        $content = "";
        if (isset($_POST['form_submit'])) {
            $skin->name = request('skins_name');

            $shorten = vn_str_filter($skin->name) . '-Skin';

            $skin->file = $shorten . '.png';
            $skin->path = DATA_FOLDER . 'skins/' . $skin->file;
            $skin->image_link = request('image_link');
            file_put_contents($skin->path, file_get_contents(request('image_link')));

            /*$feature_file = $shorten . '-Feature.jpg';
            $skin->feature_path = DATA_FOLDER . 'skins/' . $feature_file;
            file_put_contents($skin->feature_path, file_get_contents(request('feature_image_link')));*/


            $skin->front_file = $shorten . '-Front.png';
            $skin->front_path = DATA_FOLDER . 'skins/' . $skin->front_file;
            $skin->front_image_link = request('front_image_link');
            file_put_contents($skin->front_path, file_get_contents(request('front_image_link')));

            $skin->back_file = $shorten . '-Back.png';
            $skin->back_path = DATA_FOLDER . 'skins/' . $skin->back_file;
            $skin->back_image_link = request('back_image_link');
            file_put_contents($skin->back_path, file_get_contents(request('back_image_link')));


            $content = $this->renderPartial('content', array(
                'skin' => $skin,
            ), true);
        }
        $this->render('index', array(
            'content' => $content,
            'skin' => $skin,
        ));
    }
}