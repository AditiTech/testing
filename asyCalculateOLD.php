<?php 
include('includes/config.php');
// include('../../includes/check_session.php');
spl_autoload_register(function ($class_name) {
    include  ROOT_PATH ."classes/". $class_name . '_Class.php';
});

$objAdmin = new Admin();
$objCalc = new Calculation();


if( isset($_POST['formType']) && $_POST['formType'] != '')
{
	$objCalc->name =  $data['name'] = $name = $_POST['name'];
	$data['age'] = $age  = $_POST['age'];
	$amount  = $_POST['sa'];
	$data['amount'] =  $objAdmin->IND_money_format($amount);
	$data['term'] = $term  = $_POST['term'];

	$objCalc->age = $age;
	$objCalc->term = $term;
	$objCalc->amount = $amount;
	

	$result = $objAdmin->getRows('tp', array('where' => array('age' => $age ), 'return_type'=>'single' ));

    $tp = $result['term'.$term];
	

	$sa = $amount / 1000; //high SA rebate

	if($amount > 10000000)
	{
		$c = 0; //accident benefit
	}
	else
	{
		$c = 1;
	}

	if( $amount <= 195000 )
    {
        $b =  0;
    }
    else if( $amount <= 495000)
    {
        $b = 1.5;   
    }
    else if( $amount <= 995000)
    {
        $b = 2.5;   
    }
    else if( $amount >= 1000000)
    {
        $b = 3; 
    }

	//yearly
	$a1 = (2/100)*$tp;  // 2% of TP Mode Rebate
	$st = ($tp - $a1 - $b + $c ) * $sa;
	$st = round($st, 0, PHP_ROUND_HALF_DOWN);
	$gst1 = round((4.5/100)*$st);
	$gst2 = round((2.25/100)*$st);
	
	$yearly_prem_first = $st + $gst1;
	$yearly_prem_later = $st + $gst2;

	$data['yearly_prem_first']  = $objAdmin->IND_money_format($yearly_prem_first); //$objAdmin->IND_money_format();
	$data['yearly_prem_later']  = $objAdmin->IND_money_format($yearly_prem_later);
	

	//half yearly
	$a2 = (1/100)*$tp;  // 1% of TP Mode Rebate
	$st = ($tp - $a2 - $b + $c ) * ($sa/2) ;
	$st = round($st, 0, PHP_ROUND_HALF_DOWN);
	$gst1 = round((4.5/100)*$st);
	$gst2 = round((2.25/100)*$st);
	$half_prem_first = $st + $gst1;
	$half_prem_later = $st + $gst2;


	// Quarterly
	$st =  ($tp - $b + $c ) * ($sa/4) ;
	$st = round($st, 0, PHP_ROUND_HALF_DOWN);
	$gst1 = round((4.5/100)*$st);
	$gst2 = round((2.25/100)*$st);
	$quarterly_prem_first = $st + $gst1;
	$quarterly_prem_later = $st + $gst2;


	// Monthly
	$st = ($tp - $b + $c ) * $sa/12;
	$st = round($st, 0, PHP_ROUND_HALF_DOWN);
	$gst1 = round((4.5/100)*$st);
	$gst2 = round((2.25/100)*$st);
	$monthly_prem_first = $st + $gst1;
	$monthly_prem_later = $st + $gst2;


	//bonus calculation
	if( $term <= 15 )
	{
		$bonus = 41;
	}
	else if( $term >= 16 AND $term <= 19 )
	{
		$bonus = 45;
	}
	else if( $term >= 20 )
	{
		$bonus = 49;
	}
	$data['bonus'] = $bonus;

	$bonus_amount = $bonus/1000 * $amount * $term;

	$data['bonus_amount'] = $objAdmin->IND_money_format($bonus_amount);

	//FAB calculation
	$result_fab = $objAdmin->getRows('fab', array('where' => array('fabTerm' => $term ), 'return_type'=>'single' ));

	if( $amount <= 25000 )
	{
		$fab = $result_fab['fabRange1'];
	}
	else if( $amount >= 25001 && $amount <= 50000 )
	{
		$fab = $result_fab['fabRange2'];
	}
	else if( $amount >= 50001 && $amount <= 199999 )
	{
		$fab = $result_fab['fabRange3'];
	}
	else
	{
		$fab = $result_fab['fabRange4'];	
	}

	$data['fab'] = $fab;

	$fab_amount = $fab/1000 * $amount;
	$data['fab_amount'] = $objAdmin->IND_money_format($fab_amount);

	$total_amount = $amount + $bonus_amount + $fab_amount;
	$data['total_amount'] = $objAdmin->IND_money_format($total_amount);	


	$dsa = 1.25 * $amount;
	$age_at_death  = 59;
	$d_term = $age_at_death - $age + 1;
	$d_bonus_amount =  $bonus/1000 * $amount * $d_term;
	// $d_fab_amount = ($fab/1000) * ($amount/$term)*$d_term;

	$data['dsa'] = $objAdmin->IND_money_format($dsa);
	$data['d_bonus_amount'] = $objAdmin->IND_money_format($d_bonus_amount);

	echo "Mr.". $name." aged ".$age." years \n Sum assured Rs." . $amount ." Term ".$term." years";
	echo "<br>";
	echo "First year Premium : Rs. ".$yearly_prem_first;
	echo "<br>";
	echo "Subsequent Year Premium : Rs. ".$yearly_prem_later;
	echo "<br>";
	echo "Bonus ".$bonus;
	echo "<br>";
	echo "FAB ".$fab;
	echo "<br>";
	echo "SA : Rs. ".$amount;
	echo "<br>";
	echo "Bonus Amount : Rs. ".$bonus_amount;
	echo "<br>";
	echo "FAB Amount Rs. ".$fab_amount;
	echo "<br>";
	echo "<b>Maturity Benefit Rs.</b>".$total_amount;
	echo "<br>";
	echo "<b>Extended Benefit Rs.</b>".$amount." upto 100 years";
	echo "<br>";
	// echo "<br>";
	// echo "DSA Rs.".$dsa;
	// echo "<br>";
	// echo "Death Bonus Amount Rs.".$d_bonus_amount;
	
	// echo json_encode($data);
}

?>



