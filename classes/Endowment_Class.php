<?php 
/**
* 
*/
class Endowment extends CRUD
{
	public $plan; 
    public $name, $age, $term, $amount;
    public $tp, $b, $c, $sa;
    public $yearly_prem_first, $yearly_prem_later;
    public $half_prem_first, $half_prem_later;
    public $quarterly_prem_first, $quarterly_prem_later;
    public $monthly_prem_first, $monthly_prem_later;
    public $bonus, $bonus_amount;
    public $fab, $fab_amount;
    public $maturity_benefit, $extended_benefit;
    public $bsa, $dsa;
    public $normal_risk_cover, $accident_risk_cover;
    
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
    
    public function cal_sa()
    {
        $this->sa = $this->amount / 1000; //high SA rebate
    }

    public function cal_accidental_benefit() 
    {
        if($this->amount > 10000000)
        {
            $this->c = 0; //accident benefit
        }
        else
        {
            $this->c = 1;
        }
    }



    public function IND_money_format($money){
        $len = strlen($money);
        $m = '';
        $money = strrev($money);
        for($i=0;$i<$len;$i++){
            if(( $i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len){
                $m .=',';
            }
            $m .=$money[$i];
        }
        return strrev($m);
    }
}
?>
