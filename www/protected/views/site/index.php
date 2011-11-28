<?php $this->pageTitle=Yii::app()->name; 

if(!Yii::app()->user->isGuest){
	Yii::app()->request->redirect('index.php/patient');
	
}
else{
	Yii::app()->request->redirect('index.php/site/login');
	
}


?>

