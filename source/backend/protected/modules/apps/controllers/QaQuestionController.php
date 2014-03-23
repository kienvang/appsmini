<?php

class QaQuestionController extends Controller
{
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new QaQuestion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QaQuestion']))
		{
			$model->attributes=$_POST['QaQuestion'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QaQuestion']))
		{
			$model->attributes=$_POST['QaQuestion'];
			if($model->save()){
                $this->updateAnswer($model->id);

                if ($model->type != QaQuestion::QA_TEXT)
                    $this->redirect(array('update','id'=>$model->id));
                else
                    $this->redirect(array('index'));
            }

		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new QaQuestion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QaQuestion']))
			$model->attributes=$_GET['QaQuestion'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QaQuestion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QaQuestion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QaQuestion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qa-question-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionAddMoreAnswer(){
        $answer = new QaAnswer();
        $this->renderPartial('item_answer', array('data' => $answer, 'type' => isset($_REQUEST['type']) ? $_REQUEST['type'] : QaQuestion::QA_OPTION_TEXT));
    }

    public function updateAnswer($question_id){
        if (isset($_POST['Answer'])){
            $question = QaQuestion::model()->findByPk($question_id);

            $data = $_POST['Answer'];
            $ans = null;

            foreach ($data as $key => $item){
                if ($item['id'] > 0){
                    if ($question->type == QaQuestion::QA_OPTION_TEXT){
                        if (empty($item['name'])){
                            QaAnswer::model()->deleteByPk(intval($item['id']));
                        }else{
                            $ans = QaAnswer::model()->findByPk(intval($item['id']));
                            if ($ans){
                                $ans->name = $item['name'];
                                $ans->is_right = isset($item['is_right']) ? 1 : 0;
                                $ans->save();
                            }
                        }
                    }elseif ($question->type == QaQuestion::QA_OPTION_IMAGE){
                        if (isset($item['is_delete']))
                            QaAnswer::model()->deleteByPk(intval($item['id']));
                        else{
                            $ans = QaAnswer::model()->findByPk(intval($item['id']));
                            if ($ans){
                                $image = CUploadedFile::getInstanceByName('resource'.$key);
                                if ($image){
                                    $ans->saveImage($image, $key);
                                    $ans->is_right = isset($item['is_right']) ? 1 : 0;
                                    $ans->save();
                                }
                            }
                        }
                    }

                }else{
                    $ans = new QaAnswer();

                    if (isset($item['name']) && !empty($item['name'])){
                        $ans->name = $item['name'];
                        $ans->is_right = isset($item['is_right']) ? 1 : 0;
                        $ans->question_id = $question_id;
                        $ans->save();
                    }elseif (!isset($item['name'])){
                        $image = CUploadedFile::getInstanceByName('resource'.$key);
                        if ($image){
                            $ans->saveImage($image, $key);
                            $ans->is_right = isset($item['is_right']) ? 1 : 0;
                            $ans->question_id = $question_id;
                            $ans->save();
                        }
                    }
                }
            }
        }
    }
}
