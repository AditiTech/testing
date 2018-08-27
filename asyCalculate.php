<?php 
include('includes/config.php');
// include('../../includes/check_session.php');
spl_autoload_register(function ($class_name) {
    include  ROOT_PATH ."classes/". $class_name . '_Class.php';
});




if( isset($_POST['formType']) && $_POST['formType'] != '')
{
	if( $_POST['plan'] == 814 )
	{
		$obj814 = new Plan_814();

		$obj814->plan = 814;

		$obj814->name =   $_POST['name'];
		$obj814->age = $_POST['age'];
		$obj814->amount  = $_POST['sa'];
		$obj814->term  = $_POST['term'];
		$obj814->extended_benefit = $obj814->amount;


		$obj814->cal_tp();

		$data['tp'] = $obj814->tp;

		$obj814->cal_sa();

		$obj814->cal_accidental_benefit();	

		$obj814->cal_rebate();

		//yearly
		$obj814->cal_yearly_premium();

		
		//half yearly
		$obj814->cal_half_yearly_premium();


		// Quarterly
		$obj814->cal_quarterly_premium();


		// Monthly
		$obj814->cal_monthly_premium();


		// bonus calculation
		$obj814->cal_bonus();

		// FAB calculation
		$obj814->cal_fab();

		// Maturity benefit calculation
		$obj814->cal_maturity_benefit();

		
		$data['name'] = $obj814->name;
		$data['age'] = $obj814->age;
		$data['sa'] = $obj814->sa;
		$data['amount'] = $obj814->IND_money_format($obj814->amount);
		$data['term'] = $obj814->term;
		$data['bonus'] = $obj814->bonus;
		$data['bonus_amount'] = $obj814->IND_money_format($obj814->bonus_amount);
		$data['fab'] = $obj814->fab;
		$data['fab_amount'] = $obj814->IND_money_format($obj814->fab_amount);
		$data['maturity_benefit'] = $obj814->IND_money_format($obj814->maturity_benefit);
		$data['extended_benefit'] = $obj814->IND_money_format($obj814->extended_benefit);

		$data['yearly_prem_first'] = $obj814->IND_money_format($obj814->yearly_prem_first);
		$data['yearly_prem_later'] = $obj814->IND_money_format($obj814->yearly_prem_later);
		$data['half_prem_first'] = $obj814->IND_money_format($obj814->half_prem_first);
		$data['half_prem_later'] = $obj814->IND_money_format($obj814->half_prem_later);
		$data['quarterly_prem_first'] = $obj814->IND_money_format($obj814->quarterly_prem_first);
		$data['quarterly_prem_later'] = $obj814->IND_money_format($obj814->quarterly_prem_later);
		$data['monthly_prem_first'] = $obj814->IND_money_format($obj814->monthly_prem_first);
		$data['monthly_prem_later'] = $obj814->IND_money_format($obj814->monthly_prem_later);
	}
	else if( $_POST['plan'] == 815 )
	{
		$obj815 = new Plan_815();

		$obj815->plan = 815;

		$obj815->name =   $_POST['name'];
		$obj815->age = $_POST['age'];
		$obj815->amount  = $_POST['sa'];
		$obj815->term  = $_POST['term'];
		$obj815->extended_benefit = $obj815->amount;

		$obj815->cal_tp();

		$obj815->cal_sa();

		$obj815->cal_accidental_benefit();	

		$obj815->cal_rebate();

		//yearly
		$obj815->cal_yearly_premium();

		//half yearly
		$obj815->cal_half_yearly_premium();


		// Quarterly
		$obj815->cal_quarterly_premium();


		// Monthly
		$obj815->cal_monthly_premium();


		//bonus calculation
		$obj815->cal_bonus();

		//FAB calculation
		$obj815->cal_fab();

		//Maturity benefit calculation
		$obj815->cal_maturity_benefit();

		
		$data['name'] = $obj815->name;
		$data['age'] = $obj815->age;
		$data['sa'] = $obj815->sa;
		$data['amount'] = $obj815->IND_money_format($obj815->amount);
		$data['term'] = $obj815->term;
		$data['bonus'] = $obj815->bonus;
		$data['bonus_amount'] = $obj815->IND_money_format($obj815->bonus_amount);
		$data['fab'] = $obj815->fab;
		$data['fab_amount'] = $obj815->IND_money_format($obj815->fab_amount);
		$data['maturity_benefit'] = $obj815->IND_money_format($obj815->maturity_benefit);
		$data['extended_benefit'] = $obj815->IND_money_format($obj815->extended_benefit);

		$data['yearly_prem_first'] = $obj815->IND_money_format($obj815->yearly_prem_first);
		$data['yearly_prem_later'] = $obj815->IND_money_format($obj815->yearly_prem_later);
		$data['half_prem_first'] = $obj815->IND_money_format($obj815->half_prem_first);
		$data['half_prem_later'] = $obj815->IND_money_format($obj815->half_prem_later);
		$data['quarterly_prem_first'] = $obj815->IND_money_format($obj815->quarterly_prem_first);
		$data['quarterly_prem_later'] = $obj815->IND_money_format($obj815->quarterly_prem_later);
		$data['monthly_prem_first'] = $obj815->IND_money_format($obj815->monthly_prem_first);
		$data['monthly_prem_later'] = $obj815->IND_money_format($obj815->monthly_prem_later);

	}
	


	echo json_encode($data);
}

?>



