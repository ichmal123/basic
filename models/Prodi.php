<?php
namespace app\models;

use yii\db\ActiveRecord;

class Prodi extends ActiveRecord
{
	public static function tableName()
	{
		return 'prodi';
	}
	public function getJurusan()
	{
		return $this->hasOne(Jurusan::className(), ['id' => 'id_jurusan']);
	}
	public static function getProdiList($cat_id)
	{
		$subCategory = self::find()
			-> select(['id', 'prodi'])
			->wehere(['idJurusan' => $cat_id])
			->asArray()
			->all();

			return $subCategory;
		// $subCategory = self::find()
		// 	->where(['category_id' => $categoryID]);

		// if ($isAjax == true) {
		// 	return $subCategory->select(['id', 'prodi'])->asArray()->all();
		// } else {
		// 	return $subCategory->select(['name'])->indexBy('id')->column();
		// }
	}
}
?>