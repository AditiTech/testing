<?php 
include('includes/config.php');
// include('../../includes/check_session.php');
spl_autoload_register(function ($class_name) {
    include  ROOT_PATH ."classes/". $class_name . '_Class.php';
});
	
if( $_POST['plan'] == 814)
{
	$obj = new Plan_814();

	$obj->name =   $_POST['name'];
	$obj->age = $_POST['age'];
	$obj->amount  = $_POST['sa'];
	$obj->term  = $_POST['term'];
	$obj->extended_benefit = $obj->amount;

	//bonus calculation
	$obj->cal_bonus();

	//FAB calculation
	$obj->cal_fab();

	//Risk Cover
	$objND = new Calculation();
	$objND->age = $_POST['s_age'];

	$objND->amount = $obj->amount;
	$objND->bonus = $obj->bonus;	
	$objND->term =  $objND->age - $obj->age + 1;

	$objND->cal_normal_death();

	$data['bsa'] = $objND->IND_money_format($objND->amount); // there is no bsa for 815 , consider SA as BSA
	$data['dsa'] = $objND->IND_money_format($objND->dsa);
	$data['d_bonus_amount'] = $objND->IND_money_format($objND->bonus_amount);
	$data['d_fab_amount'] = $objND->IND_money_format($objND->fab_amount); 
	$data['normal_risk_cover'] = $objND->IND_money_format($objND->amount + $objND->bonus_amount + $objND->fab_amount);
	$data['accident_risk_cover'] = $objND->IND_money_format($objND->dsa + $objND->bonus_amount + $objND->fab_amount);
}
else if( $_POST['plan'] == 815)
{
	$obj = new Plan_815();

	$obj->name =   $_POST['name'];
	$obj->age = $_POST['age'];
	$obj->amount  = $_POST['sa'];
	$obj->term  = $_POST['term'];
	$obj->extended_benefit = $obj->amount;

	//bonus calculation
	$obj->cal_bonus();

	//FAB calculation
	$obj->cal_fab();

	//Risk Cover
	$objND = new Calculation();
	$objND->age = $_POST['s_age'];

	$objND->amount = $obj->amount;
	$objND->bonus = $obj->bonus;	
	$objND->term =  $objND->age - $obj->age + 1;

	$objND->cal_normal_death();

	$data['bsa'] = $objND->IND_money_format($objND->bsa);
	$data['dsa'] = $objND->IND_money_format($objND->dsa);
	$data['d_bonus_amount'] = $objND->IND_money_format($objND->bonus_amount);
	$data['d_fab_amount'] = $objND->IND_money_format($objND->fab_amount); 
	$data['normal_risk_cover'] = $objND->IND_money_format($objND->bsa + $objND->bonus_amount + $objND->fab_amount);
	$data['accident_risk_cover'] = $objND->IND_money_format($objND->dsa + $objND->bonus_amount + $objND->fab_amount);
}

echo json_encode($data);

?>



