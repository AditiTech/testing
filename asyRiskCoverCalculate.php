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
	$objRC = new Plan_814();
	$objRC->age = $_POST['s_age'];

	$objRC->amount = $obj->amount;
	$objRC->bonus = $obj->bonus;	
	$objRC->term =  $objRC->age - $obj->age + 1;

	$objRC->cal_normal_death();

	$data['rc_template'] = $objRC->risk_cover_table();
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
	$objRC = new Plan_815();
	$objRC->age = $_POST['s_age'];

	$objRC->amount = $obj->amount;
	$objRC->bonus = $obj->bonus;	
	$objRC->term =  $objRC->age - $obj->age + 1;

	$objRC->cal_normal_death();


	$data['rc_template'] = $objRC->risk_cover_table();
}
else if( $_POST['plan'] == 827)
{
	$obj = new Plan_827();

	$obj->name =   $_POST['name'];
	$obj->age = $_POST['age'];
	$obj->amount  = $_POST['sa'];
	$obj->term  = $_POST['term'];
	$obj->extended_benefit = $obj->amount;

	$obj->cal_tp();

	$obj->cal_sa();

	$obj->cal_accidental_benefit();	

	$obj->cal_rebate();

	//yearly
	$obj->cal_yearly_premium();


	
	//Risk Cover
	$objRC = new Plan_827();
	$objRC->age = $_POST['s_age'];

	$objRC->amount = $obj->amount;
		
	$objRC->term =  $objRC->age - $obj->age + 1;

	$objRC->yearly_prem_first = $obj->yearly_prem_first;

	$objRC->yearly_prem_later = $obj->yearly_prem_later;

	// Loyalty Addition
	$objRC->cal_la();

	$objRC->cal_normal_death();

	

	$data['rc_template'] = $objRC->risk_cover_table();
	
}

echo json_encode($data);

?>



