<?php

/**
 * This is the model class for table "system_user".
 *
 * The followings are the available columns in table 'system_user':
 * @property string $id
 * @property string $username
 * @property string $password
 * @property integer $createtime
 * @property integer $lastvisit
 * @property integer $superuser
 * @property integer $status
 */
class SystemUser extends CActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BANNED = -1;
    const STATUS_REMOVED = -2;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'system_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
        $usernameRequirements = Yii::app()->getModule('user')->usernameRequirements;

		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, superuser, status', 'required'),
			array('createtime, lastvisit, superuser, status', 'numerical', 'integerOnly'=>true),
			array('password', 'length', 'max' => 128),

            array('username', 'length',
                'max' => $usernameRequirements['maxLen'],
                'min' => $usernameRequirements['minLen'],
                'message' => Yii::t('app',
                        'Username length needs to be between {minLen} and {maxlen} characters', array(
                        '{minLen}' => $usernameRequirements['minLen'],
                        '{maxLen}' => $usernameRequirements['maxLen']))),
            array('username','match','pattern' => $usernameRequirements['match'],'message' => Yii::t('app', $usernameRequirements['dontMatchMessage'])),
            array('username','unique','message' => Yii::t('app', 'This user\'s name already exists.')),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, createtime, lastvisit, superuser, status', 'safe', 'on'=>'search'),
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
            'profile' => array(self::HAS_ONE, 'ShopEmployee', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Tên đăng nhập',
			'password' => 'Mật khẩu',
			'createtime' => 'Ngày tạo',
			'lastvisit' => 'Lần cuối đăng nhập',
			'superuser' => 'Super user',
			'status' => 'Tình trạng',
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
        $condition = array();
        if(!$this->status) {
            $condition[] = 'status != :status';
            $params['status'] = self::STATUS_REMOVED;
        }
        else {
            $condition[] = 'status = :status';
            $params['status'] = $this->status;
        }

        if(!empty($this->username)) {
            $condition[] = 'username LIKE :username';
            $params['username'] = "%".$this->username."%";
        }

        if(!empty($this->superuser)) {
            $condition[] = 'superuser = :superuser';
            $params['superuser'] = $this->superuser;
        }

        $criteria->condition = implode(' and ', $condition);
        $criteria->params = $params;

        return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SystemUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function beforeValidate()
    {
        if ($this->isNewRecord) {
            $this->createtime = time();
        }
        return parent::beforeValidate();
    }

    public function setPassword($password)
    {
        if ($password != '') {
            $this->password = Utility::encryptPassword($password);
            if (!$this->isNewRecord)
                return $this->update();
            else
                return $this;
        }
    }

    public function verifyPassword($password){
        $parts = explode ( ':', $this->password );
        $crypt = $parts [0];
        $salt = @$parts [1]; // Ignore if out of range
        $testcrypt = Utility::getCryptedPassword( $password, $salt );
        if ($crypt == $testcrypt) {
            return true;
        }
        return false;
    }

    public function getListStatus() {
        return array(
            self::STATUS_INACTIVE => 'Chưa kích hoạt',
            self::STATUS_ACTIVE => 'Đã kích hoạt',
            self::STATUS_BANNED => 'Bị khóa',
            self::STATUS_REMOVED => 'Đã xóa'
        );
    }

    public function getStatus() {
        $list = $this->getListStatus();
        if($list[$this->status])
            return $list[$this->status];
        return '';
    }

    public function delete()
    {
        $this->status = self::STATUS_REMOVED;
        return $this->save(false, array('status'));
    }
}
