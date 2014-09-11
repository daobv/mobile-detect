<?php

class FileController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */


    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('login', 'download', 'index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('view', 'create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new FileForm();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['FileForm'])) {
            $file = new File();
            $file->name = $_POST['FileForm']['name'];
            $slug = $file->generateRandomString();
            while (true) {
                $invalidSlug = File::model()->findByAttributes(array('slug' => $slug));
                if (!$invalidSlug) break;
            }
            $file->slug = $slug;
            if ($file->save()) {
                $fileFormTypeArray = $file->fileType();
                foreach ($fileFormTypeArray as $fileType) {
                    if (trim($_POST['FileForm'][$fileType]) != "") {
                        $url = new Url();
                        $url->type = $fileType;
                        $url->file_id = $file->id;
                        $url->day_update = date('d');
                        $url->month_update = date('m');
                        $url->url = $_POST['FileForm'][$fileType];
                        $url->save();
                    }
                }
                $statistic = new Statistic();
                $statistic->file_id = $file->id;
                $statistic->date = date('dmY');
                $statistic->save();
            }
            $this->redirect(array('admin'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $jarId = "";
        $apkId = "";
        $ipaId = "";
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $fileForm = new FileForm();
        $fileForm->name = $model->name;
        foreach ($model['url'] as $url) {
            if ($url->type == 'jar') {
                $jarId = $url->id;
                $fileForm->jar = $url->url;
            } else if ($url->type == 'apk') {
                $apkId = $url->id;
                $fileForm->apk = $url->url;
            } else if ($url->type == 'ipa') {
                $ipaId = $url->id;
                $fileForm->ipa = $url->url;
            }
        }
        if (isset($_POST['FileForm'])) {
            $model->name = $_POST['FileForm']['name'];
            if ($model->save()) {
                $fileFormTypeArray = $model->fileType();
                foreach ($fileFormTypeArray as $fileType) {

                    if (trim($_POST['FileForm'][$fileType]) != "") {
                        $urlId = "";
                        if ($fileType == "apk") {
                            $urlId = $apkId;
                        } else if ($fileType == "jar") {
                            $urlId = $jarId;
                        } else {
                            $urlId = $ipaId;
                        }
                        $url = Url::model()->findByPk($urlId);
                        if ($url) {
                            $url->url = $_POST['FileForm'][$fileType];
                            $url->save();
                        } else {
                            $url = new Url();
                            $url->file_id = $model->id;
                            $url->type = $fileType;
                            $url->url = $_POST['FileForm'][$fileType];
                            $url->save();
                        }

                    }
                }
            }
            $this->redirect(array('file/admin'));
        }

        $this->render('update', array(
            'model' => $fileForm,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $file = $this->loadModel($id);
        if (($file['url'])) {
            foreach ($file['url'] as $url) {
                $url->delete();
            }
        }
        $file->delete();
        // #if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex($slug)
    {
        $file = File::model()->findByAttributes(array('slug' => $slug));
        if ($file) {
            echo '<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tải Xuống ' . $file->name . '</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="stylesheet" type="text/css" media="all" href="' . Yii::app()->theme->baseUrl . '/css/main.css" />
    ';
            echo '</head><body><div style="padding-left: 18px;padding-top:20px;font-size:16px">Tải xuống : <div style="font-weight:bold;display:inline-block">' . $file->name . '</div><br/>';
            $detect = Yii::app()->mobileDetect;
            if ($file['url']) {
                foreach ($file['url'] as $url) {
                    $urlParam = Yii::app()->getBaseUrl(true) . "/file/" . $file->slug . '/' . $url['type'];
                    if ($detect->isMobile()) {
                        if ($detect->isiOS()) {
                            if ($url->type == 'ipa') {

                                echo "<a class='download' href=" . $urlParam . ">" . $file->name . "." . $url['type'] . "</a><br/>";
                            }
                        } else if ($detect->isAndroidOS()) {
                            if ($url->type == 'apk') {
                                echo "<a class='download' href=" . $urlParam . ">" . $file->name . "." . $url['type'] . "</a><br/>";
                            }
                        } else {
                            if ($url->type == 'jar') {
                                echo "<a class='download' href=" . $urlParam . ">" . $file->name . "." . $url['type'] . "</a><br/>";
                            }
                        }
                    } else {
                        echo "<a class='download' href=" . $urlParam . ">" . $file->name . "." . $url['type'] . "</a><br/>";
                    }

                }
            }

            echo '</div></body></html>';
        } else {
            throw new CHttpException(404, 'The specified file cannot be found.');
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new File('search');
        $url = new Url();
        $url->resetClick();
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['File']))
            $model->attributes = $_GET['File'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return File the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = File::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param File $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'file-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionDownload($slug, $type)
    {
        $allUrls = new Url();
        $allUrls->resetClick();
        $file = File::model()->findByAttributes(array('slug' => $slug));
        if ($file) {
            if (count($file['url']) > 0) {
                foreach ($file['url'] as $url) {
                    if ($url->type == $type) {
                        $url->day_click += 1;
                        $url->month_click += 1;
                        $url->total += 1;
                        $url->save();
                        $this->redirect($url->url);
                    }
                }
            }
            $statistic = Statistic::model()->findBySql("SELECT * FROM ".Statistic::model()->tableName()." WHERE file_id=".$file->id." ORDER BY id DESC LIMIT 1");
            $statistic->$type += 1;
            $statistic->save();
        } else {
            throw new CHttpException(404, 'The file requested  page does not exist.');
        }
    }
}
