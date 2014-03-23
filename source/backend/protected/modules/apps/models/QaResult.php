<?php

/**
 * This is the model class for table "qa_result".
 *
 * The followings are the available columns in table 'qa_result':
 * @property integer $id
 * @property integer $user_id
 * @property string $question_params
 * @property string $answer_params
 * @property integer $question_id
 * @property integer $answer_id
 * @property string $result_text
 * @property integer $result_right
 * @property string $result_params
 * @property integer $event_id
 */
class QaResult extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'qa_result';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, question_id, answer_id, result_right, event_id', 'numerical', 'integerOnly'=>true),
			array('question_params', 'length', 'max'=>1024),
			array('result_text', 'length', 'max'=>512),
			array('answer_params, result_params', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, question_params, answer_params, question_id, answer_id, result_text, result_right, result_params, event_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'question_params' => 'Question Params',
			'answer_params' => 'Answer Params',
			'question_id' => 'Question',
			'answer_id' => 'Answer',
			'result_text' => 'Result Text',
			'result_right' => 'Result Right',
			'result_params' => 'Result Params',
			'event_id' => 'Event',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('question_params',$this->question_params,true);
		$criteria->compare('answer_params',$this->answer_params,true);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('answer_id',$this->answer_id);
		$criteria->compare('result_text',$this->result_text,true);
		$criteria->compare('result_right',$this->result_right);
		$criteria->compare('result_params',$this->result_params,true);
		$criteria->compare('event_id',$this->event_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QaResult the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
