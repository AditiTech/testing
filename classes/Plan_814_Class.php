<?php 
/**
* 
*/
class Plan_814 extends Calculation
{
	
    function __construct( $id='' )
    {
        parent::__construct(); 
    }

    public function __get($property) {
	    if (property_exists($this, $property)) {
	      return $this->$property;
	    }
	}

	public function __set($property, $value) {
	    if (property_exists($this, $property)) {
	      $this->$property = $value;
	    }

	    return $this;
	}
    
    public function cal_tp()
    {
        $result = $this->getRows('tp_814', array('where' => array('age' => $this->age ), 'return_type'=>'single' ));

        $this->tp = $result['term'.$this->term];
    }

    public function cal_sa()
    {
        $this->sa = $this->amount / 1000; //high SA rebate
    }

    public function cal_accidental_benefit()  //accident benefit
    {
        if($this->amount > 10000000)
        {
            $this->c = 0; 
        }
        else if( $this->age < 18)
        {
            $this->c = 0; 
        }
        else
        {
            $this->c = 1;   
        }
    }

    public function cal_rebate() //(B)  High SA Rebate 
    {   
        if( $this->amount <= 195000 )
        {
            $b =  0;
        }
        else if( $this->amount <= 495000)
        {
            $b = 2;   
        }
        else if( $this->amount >= 500000)
        {
            $b = 3; 
        }
        $this->b = $b;
    }

    public function cal_yearly_premium()
    {

        $a1 = (2/100) * $this->tp;  // 2% of TP Mode Rebate
        $st = ($this->tp - $a1 - $this->b + $this->c ) * $this->sa;
        $st = round($st, 0, PHP_ROUND_HALF_DOWN);
        $gst1 = round((4.5/100)*$st);
        $gst2 = round((2.25/100)*$st);
        $this->yearly_prem_first = $st + $gst1;
        $this->yearly_prem_later = $st + $gst2;
    }

    public function cal_half_yearly_premium()
    {
        $a2 = (1/100) * $this->tp;  // 1% of TP Mode Rebate
        $st = ($this->tp - $a2 - $this->b + $this->c ) * ($this->sa/2) ;
        $st = round($st, 0, PHP_ROUND_HALF_DOWN);
        $gst1 = round((4.5/100)*$st);
        $gst2 = round((2.25/100)*$st);
        $this->half_prem_first = $st + $gst1;
        $this->half_prem_later = $st + $gst2;
    }

    public function cal_quarterly_premium()
    {
        $st =  ($this->tp - $this->b + $this->c ) * ($this->sa/4) ;
        $st = round($st, 0, PHP_ROUND_HALF_DOWN);
        $gst1 = round((4.5/100)*$st);
        $gst2 = round((2.25/100)*$st);
        $this->quarterly_prem_first = $st + $gst1;
        $this->quarterly_prem_later = $st + $gst2;
    }

    public function cal_monthly_premium()
    {
        $st = ($this->tp - $this->b + $this->c ) * $this->sa/12;
        $st = round($st, 0, PHP_ROUND_HALF_DOWN);
        $gst1 = round((4.5/100)*$st);
        $gst2 = round((2.25/100)*$st);
        $this->monthly_prem_first = $st + $gst1;
        $this->monthly_prem_later = $st + $gst2;
    }

    public function cal_bonus()
    {
        if( $this->term >= 12 AND $this->term <= 15 )
        {
            $this->bonus = 38;
        }
        else if( $this->term >= 16 AND $this->term <= 19 )
        {
            $this->bonus = 42;
        }
        else if( $this->term >= 20 )
        {
            $this->bonus = 48;
        }

        $bonus_amount = $this->bonus/1000 * $this->amount * $this->term;

        $this->bonus_amount = $bonus_amount;
    }

    public function cal_fab()
    {

        if( $this->term < 15)
        {
            $this->fab = 0;
            $this->fab_amount = 0;
            return;
        }

        $result_fab = $this->getRows('fab', 
                            array('where' => array('fabTerm' => $this->term ), 
                            'return_type'=>'single' ));

        if( $this->amount <= 25000 )
        {
            $this->fab = $result_fab['fabRange1'];
        }
        else if( $this->amount >= 25001 && $this->amount <= 50000 )
        {
            $this->fab = $result_fab['fabRange2'];
        }
        else if( $this->amount >= 50001 && $this->amount <= 199999 )
        {
            $this->fab = $result_fab['fabRange3'];
        }
        else
        {
            $this->fab = $result_fab['fabRange4'];    
        }

        $fab_amount = $this->fab/1000 * $this->amount;
        $this->fab_amount = $fab_amount;
    }

    public function cal_maturity_benefit()
    {   
        $total_amount = $this->amount + $this->bonus_amount + $this->fab_amount;
        $this->maturity_benefit = $total_amount; 
    }

    public function cal_normal_death()
    {

        if($this->term >= 16)
        {
            $this->cal_fab();  
        }
        else
        {
            $this->fab_amount = 0;
        }

        $this->dsa = 1.25 * $this->amount; + $this->amount;

        $this->bonus_amount =  $this->bonus/1000 * $this->amount * $this->term;
    }

    
}
?>
