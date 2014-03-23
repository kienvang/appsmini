<?php

class QaEventController extends Controller
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
		$model=new QaEvent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QaEvent']))
		{
			$model->attributes=$_POST['QaEvent'];
            $model->start_date = Util::convertDate($model->start_date);
            $model->end_date = Util::convertDate($model->end_date);

			if($model->save())
				$this->redirect(array('index'));
		}else{
            $model->start_date = date('d/m/Y', $model->start_date);
            $model->end_date = date('d/m/Y', $model->end_date);
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

		if(isset($_POST['QaEvent']))
		{
			$model->attributes=$_POST['QaEvent'];
            $model->start_date = Util::convertDate($model->start_date);
            $model->end_date = Util::convertDate($model->end_date);
			if($model->save())
				$this->redirect(array('index'));
		}else{
            $model->start_date = date('d/m/Y', $model->start_date);
            $model->end_date = date('d/m/Y', $model->end_date);
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
		$model=new QaEvent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QaEvent']))
			$model->attributes=$_GET['QaEvent'];

		$this->render('index',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QaEvent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QaEvent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QaEvent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qa-event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
