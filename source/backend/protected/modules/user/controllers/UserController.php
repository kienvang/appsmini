<?php

class UserController extends SBaseController
{
    public $layout='//layouts/column1';
    public $menu=array();
    public $breadcrumbs=array();
    
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        if($id == null)
            return;
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id, 'view'),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SystemUser;
        $employee = new ShopEmployee();
        $employee->setScenario('admin');
        $passwordForm = new ChangePasswordForm();
        $error = false;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SystemUser']))
		{
            $model->attributes=$_POST['SystemUser'];
            if($model->validate()) {
                $model->save();

                if(!$error) {
                    if(empty($_POST['ChangePasswordForm']['password'])) {
                        $password = Utility::generatePassword();
                        $model->setPassword($password);
                        Yii::app()->user->setFlash('The generated Password is {password}', array('{password}' => $password));
                    } else {
                        $passwordForm->attributes = $_POST['ChangePasswordForm'];
                        if($passwordForm->validate())
                            $model->setPassword($_POST['ChangePasswordForm']['password']);
                        else {
                            $error = true;
                        }
                    }
                }

                if(isset($_POST['ShopEmployee'])) {
                    $employee->id = $model->id;
                    $employee->attributes = $_POST['ShopEmployee'];
                    if(!$employee->validate() || !$employee->save()) {
                        $error = true;
                    }
                }

                if(!$error)
                    $this->redirect(array('admin'));
            }
		}

		$this->render('create',array(
			'model'=>$model,
            'passwordForm' => $passwordForm,
            'employee' => $employee
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $error = false;
        $passwordForm = new ChangePasswordForm();
        $model=$this->loadModel($id);
        $employee = ($model->profile) ? $model->profile : new ShopEmployee();
        $employee->setScenario('admin');

        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SystemUser']))
		{
            $model->attributes=$_POST['SystemUser'];
			if($model->validate()) {

                if(!$error && isset($_POST['ChangePasswordForm']) && !empty($_POST['ChangePasswordForm']['password'])) {
                    $passwordForm->attributes = $_POST['ChangePasswordForm'];
                    if($passwordForm->validate())
                        $model->setPassword($_POST['ChangePasswordForm']['password']);
                    else {
                        $error = true;
                    }
                }

                if(isset($_POST['ShopEmployee'])) {
                    $employee->id = $model->id;
                    $employee->attributes = $_POST['ShopEmployee'];
                    if(!$employee->validate() || !$employee->save()) {
                        $error = true;
                    }
                }

                if(!$error && $model->save())
                    $this->redirect(array('admin'));
            }
		}

		$this->render('update',array(
			'model'=>$model,
            'passwordForm' => $passwordForm,
            'employee' => $employee
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
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $this->redirect(array('//user/user/admin'));

		$dataProvider=new CActiveDataProvider('SystemUser');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SystemUser('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SystemUser'])) {
            $model->attributes=$_GET['SystemUser'];
        }

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function loadModel($id, $state = '')
	{
		$model=SystemUser::model()->findByPk($id);
        if($model===null){
            if ($state == '')
                throw new CHttpException(404,'The requested page does not exist.');
            else
                return new SystemUser();
        }
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SystemUser $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='system-user-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
