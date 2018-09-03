<?php 
/**
* 
*/
class Plan_827 extends Endowment
{
	public $la, $la_amount, $higher_amt, $rc_type;   

    function __construct( $id='' )
    {
        $this->plan = 827;
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
        $result = $this->getRows('tp_827', array('where' => array('age' => $this->age ), 'return_type'=>'single' ));

        $this->tp = $result['term'.$this->term];
    }

    public function cal_sa()
    {
        $this->sa = $this->amount / 1000; //high SA rebate
    }

    public function cal_accidental_benefit()  //accident benefit
    {
        if( $this->age < 18)
        {
            $this->c = 0; 
        }
        else
        {
            $this->c = 0.5;   
        }
    }

    public function cal_rebate() //(B)  High SA Rebate 
    {   
        if( $this->amount >= 150000 AND $this->amount <= 200000 )
        {
            $b =  1.5;
        }
        else
        {
            $b = 0; 
        }
        $this->b = $b;    }

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
        $this->bonus = 0;
        $this->bonus_amount = 0;
    }

    public function cal_fab()
    {
        $this->fab = 0;
        $this->fab_amount = 0;
        return;   
    }

    public function cal_la()
    {
        $result = $this->getRows('la_827', array('where' => array('term' => $this->term ), 'return_type'=>'single' ));

        $this->la = isset($result['la']) ? $result['la'] : 0;

        $la_amount = $this->la/1000 * $this->amount * $this->term;

        $this->la_amount = $la_amount;
    }

    public function cal_maturity_benefit()
    {   

        $this->maturity_benefit = $this->amount + $this->la_amount; 
    }

    public function cal_normal_death()
    {
        //Basic Sum Assured
        $amt1 = $this->amount; 
        //10 times of annualised premium
        $amt2 = $this->yearly_prem_first * 10;
        //105% of total premiums paid
        $amt3 = $this->yearly_prem_first + ( $this->yearly_prem_later * ( $this->term - 1 ));
        $amt3 = 105*$amt3 / 100;

        if( $amt1 > $amt2 && $amt1 > $amt3)
        {
            $this->higher_amt = $amt1;
        }
        else if( $amt2 > $amt1 && $amt2 > $amt3)
        {
            $this->higher_amt = $amt2;
        }
        else if( $amt3 > $amt1 && $amt3 > $amt2)
        {
            $this->higher_amt = $amt3;
        }

        $this->normal_risk_cover = $this->higher_amt + $this->la_amount;
    }

    public function risk_cover_table()
    {   
        
        $rc_template = '<div class="row">  
          
        <table class="table table-bordered table-responsive col-6 border-0 text-center tab_normal_death">
        <tbody style="float:right;">
          <tr>
            <td><b>If death occurs at age <span id="s_age">'.$this->age.'</span></b></td>
          </tr>
          <tr>
            <td class="text-blue" id="death_occures_formula_text"><b>(Higher of Basic Sum Assured or 10 times of annualised premium or 105% of total premiums paid) plus loyalty addition, if any) + LA </b></td>
          </tr>
          <tr>
            <td><b><span id="bsa"> Rs. '.$this->IND_money_format($this->higher_amt).'</span></b></td>
          </tr>
          <tr>
            <td><b><span class="d_la_amount"> Rs. '.$this->IND_money_format($this->la_amount).'</span></b></td>
          </tr>
          <tr>
            <td class="text-danger"><b><span id="normal_risk_cover" > = Rs. '.$this->IND_money_format($this->normal_risk_cover).'</span></b></td>
          </tr>
          </tbody>
          </table>
      </div>';

        return $rc_template;
    }
    
}
?>
