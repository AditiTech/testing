<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/jquery-ui-slider-pips.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/custom.css" >

    <title>Anand Calculator</title>
  </head>
<body>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

      <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">Anand-Calculator</a>
      </nav>

    </nav>

    <div class="container-fluid pt-5">

      <div class="row mt-2 mb-1">
          
            <!--image-->
           <!-- <div class="offset-md-1 col-md-4 text-center">
                <img src="images/lic-thumb.png" alt="lic-image" class="lic-thumb-img">
            </div>-->

            <div class="col-md-12">
                <form method="POST" class="cal-lic-form form-inline" id="cal_form">
                    
                    <div class="form-group col-md-3">
                         <select class="col-md-12 form-control" id="plan" name="plan" >
                          <option value="">Select plan</option>
                          <option value="814">New Endowment Plan (814)</option>
                          <option value="815">New Jeevan Anand (815)</option>
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                      <input type="text" class="col-md-12 form-control" id="name" name="name" placeholder="Enter name" value="namrata">
                    </div>

                    <div class="form-group col-md-2">
                      <select class="col-md-12 form-control" id="age" name="age" placeholder="age">
                        <option value="">Select age</option>
                      </select>
                    </div>

                    <div class="form-group col-md-2">
                      <input type="number" class="col-md-12 form-control" id="sa" name="sa" placeholder="Enter sum assured" value="100000">
                      <span class="err-txt-centr text-danger" id="sa_err" style="display: none;"></span>
                    </div>

                    <div class="form-group col-md-2">
                       <select class="col-md-12 form-control" id="term" name="term" >
                        <option value="">Select term</option>
                      </select>
                    </div>
                  
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div> -->
                  
                     <div class="form-group col-md-1 text-center">
                         <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                         <input type="hidden" name="formType" value="calculate">
                     </div>
                  
                  
                  
                    
                </form>
            </div>

            <div class="col mt-3">
              <div id="result"></div>
            </div>
      </div>
      
      <div class="row mt-2 ">

      <div class="col-md-2 text-center"> 
          <img src="images/lic-thumb.png" class="lic-thumb-img img img-responsive">
        </div>

        <div class="col-md-3 mt-1 cal-div"> <!-- text -->
            <p class="text-center fs-26"> <span id="txtName">Mr. Goodwill</span> aged <span id="txtAge">35</span> years 
              <br> <b>Sum Assured</b> <span id="txtSA1">20 Lacs</span>
              <br> <span id="txtTerm">Term 16 Years</span></p>
            <p class="font-weight-bold text-center">First Year Premium : <span id="yearly_prem_first">1,58,740</span></p>
            <p class="font-weight-bold text-center">Subsequent Year Premium : <span id="yearly_prem_later">1,54,735</span></p>
       
       
             <table class="font-weight-bold table table-bordered text-center">
            <tbody><tr>
              <td>Bonus = <span id="txtBonus">45</span></td>
            </tr>
            <tr>
              <td>FAB* = <span id="txtFAB">25</span></td>
            </tr>
          </tbody></table>
       
       
       
       
        </div>

        <div class="col-md-7 mt-1 text-blue cal-div"> <!-- text -->
        <div class="row">
            <div class="col-md-5">
            <p class="float-left font-weight-bold fs-24">Maturity Benefit <br>= SA <br>+ Bonus <br>+ FAB</p>
            <img src="images/lic-family.png" class="lic-family-img" alt="familyilic">
           </div>
          
          
            <ul class="col-md-7 float-left list-group text-center textValue pr-0">
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1">
              Rs. <span id="txtSA2">20,00,000</span>
              <span class="badge float-right badge-pill">SA</span>
          </li>
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
            + Rs. <span id="txtBonusAmount">14,40,000</span>
            <span class="badge float-right badge-pill">Bonus</span>
          </li>
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
            + Rs. <span id="txtFABAmount">50,000</span>
            <span class="badge float-right badge-pill">FAB</span>
          </li>
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
              = Rs. <span id="txtMaturityBenefit">39,40,000</span>
              <span class="badge float-right badge-pill">Total</span>
          </li>
          
          
          
            <p class="text-blue font-weight-bold fs-24 pt-3">Extended Benefit</p>
            <ul class="list-group text-center textValue pr-0">
              <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
                Rs. <span id="txtExtendBenefit">20,00,000</span>
                <span class="badge float-right badge-pill">Upto 100 years</span>
            </li>
            </ul>
          
          
          
          
          </ul>
         
         </div>

        </div>

      </div>

      <div class="row cal-div">
       
      </div>

    <div class="container-fluid h6 cal-div" >
      <div class="row">
        <div class="col-md-12">
          <table class="border-secondary table table-bordered text-center">
            <tbody><tr class="">
              <td class="">Half yearly Premium : <span id="half_prem_first"></span></td>
              <td>Quarterly Premium : <span id="quarterly_prem_first"></span></td>
              <td>Monthly Premium : <span id="monthly_prem_first"></span></td>
            </tr>
            <tr>
              <td>Subsequent Half yearly Premium : <span id="half_prem_later"></span></td>
              <td>Subsequent Quarterly Premium : <span id="quarterly_prem_later"></span></td>
              <td>Subsequent Monthly Premium : <span id="monthly_prem_later"></span></td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>





  <div class="risk_result mb-2 mt-2">
          
        <div class="row">  
          
        <table class="table table-bordered table-responsive col-6 border-0 text-center">
          <tbody style="float:right;">
          <tr>
            <td><b>If death occurs at age <span id="s_age"></span></b></td>
          </tr>
          <tr>
            <td class="text-blue" id="death_occures_formula_text"><b>(BSA + Bonus + FAB)</b></td>
          </tr>
          <tr>
            <td><b><span id="bsa"></span></b></td>
          </tr>
          <tr>
            <td><b><span class="d_bonus_amount" ></span></b></td>
          </tr>
          <tr>
            <td><b><span class="d_fab_amount" ></span></b></td>
          </tr>
          <tr>
            <td class="text-danger"><b><span id="normal_risk_cover" ></span></b></td>
          </tr>
          </tbody>
        </table>
        <table class="table table-bordered table-responsive col-6 border-0 text-white text-center">
          <tbody class="bg-danger ">
          <tr>
            <td><b>In case of accidental death</b></td>
          </tr>
          <tr>
            <td class="text-yellow"><b>(DSA + Bonus + FAB)</b></td>
          </tr>
          <tr>
            <td><b><span id="dsa"></span></b></td>
          </tr>
          <tr>
            <td><b><span class="d_bonus_amount" ></span></b></td>
          </tr>
          <tr>
            <td><b><span class="d_fab_amount" ></span></b></td>
          </tr>
          <tr>
            <td><b><span id="accident_risk_cover" ></span></b></td>
          </tr>
          </tbody>
        </table>
      </div>
      </div>



<div class="container-fluid">
<div class="row">
<div class="col-md-12">
      <div class="p-5 double-slider-scroll">
        <div id="double-label-slider"></div>
      </div>
</div>      
</div> 
</div>      

 
      
      <p class="text-danger"><b>* Based on assumptions</b></p>
      <p><b>Disclaimer</b> : Example qouted above are just for illustration purpose based on the benefit illustration</p>
      <p>As per IRDA norms 4% and 8% illustrations available with LIC</p>
    </div>

    <div class="footer text-right ">
      <div class="bg-dark text-white p-2" >@anand-calculator</div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js" ></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/jquery-ui-slider-pips.js" ></script>

<script type="text/javascript">

$(document).ready(function(){

  var plan = $("#plan");
  var name = $("#name");
  var age = $("#age");
  var sa = $("#sa");
  var term = $("#term");

  var MAX_AGE = 75;
  var MIN_AGE = 0;

  var MAX_TERM = 0;
  var MIN_TERM = 0;

  var MIN_SA_ERR = 'Minimum Sum Assured is 100000';

  var MULTIPLE_OF_ERR = 'Sum Assured should be in multiples of 5000.';

  plan.change(function(){

      var plan_val = plan.val();
      var opt = '<option value="">Select age</option>';

      if( plan_val !== '' ) {

          if( plan_val == '814') 
          {
              MAX_AGE = 55; MIN_AGE = 8; MAX_TERM = 35; MIN_TERM = 12;
          } 
          else if( plan_val == '815') 
          {
              MAX_AGE = 50; MIN_AGE = 18; MAX_TERM = 35; MIN_TERM = 15;
          }
          for( i = MIN_AGE; i <= MAX_AGE; i++)
          {
            opt += '<option value="'+i+'">'+i+'</option>';
          }
      }

      age.empty().append(opt);

  });

  age.change(function(){

      var plan_val = plan.val();
      var age_val = age.val();
      var opt = '<option value="">Select term</option>';

      var max_term = 75 - parseInt(age_val);
      var min_term = 0;

      
      if( age_val != 'Select age' )
      {
          max_term = (max_term < MAX_TERM ) ? max_term : MAX_TERM;
          min_term = MIN_TERM;

          for( i = min_term; i <= max_term; i++)
          {
            opt += '<option value="'+i+'">'+i+'</option>';
          }
      }

      term.empty().append(opt);

  });



  function change_slider(age_x, term_y)
  {
    var doubleLabels = [];
    var first = age_x;
    var last = age_x + parseInt(term_y);
    var j=0;
    doubleLabels.push("<i>Years</i><span>Age</span>");
    for (var i = first; i <= last; i++) {
      j++;
      doubleLabels.push("<i>"+j+"</i><span>"+i+"</span>");
    }

    var max = parseInt(term_y) + 1;

    $("#double-label-slider")
        .slider({
            max: max,
            min: 1,
            value: 0,
            animate: 400
        })
        .slider("pips", {
            rest: "label",
            labels: doubleLabels
        })
        .on("slidechange", function(e,ui) {
            
            var s_age = parseInt(age.val()) + ( parseInt(ui.value) - 2 );

            var last_age = 0;
            if( plan.val() == 814)
            {
              last_age = 7;
            }
            else if( plan.val() == 815 )
            {
              last_age = 17;
            }

            if( s_age != last_age )
            {
                $.ajax({
                    type : 'POST',
                    url  : 'asyRiskCoverCalculate.php',
                    data : {
                          plan:plan.val(),
                          s_age:s_age,
                          name: name.val(),
                          age:age.val(),
                          term:term.val(),
                          sa:sa.val()
                    },
                    dataType: "json",
                    success:function(response){
                        console.log(response);

                        var risk_result = $(".risk_result");
                        risk_result.show();

                        // change formula label 
                        if( plan.val() == 814 )
                        {
                          $("#death_occures_formula_text").html('<b>(SA + Bonus + FAB)</b>');  
                        }
                        else if( plan.val() == 815 )
                        {
                          $("#death_occures_formula_text").html('<b>(BSA + Bonus + FAB)</b>');
                        }
                        

                        $("#s_age").text(s_age);
                        $("#bsa").text( "Rs. "+ response.bsa );
                        $("#dsa").text( "Rs. "+ response.dsa );
                        $(".d_bonus_amount").text( " + Rs. "+ response.d_bonus_amount);
                        $(".d_fab_amount").text( " + Rs. "+response.d_fab_amount);
                        $("#normal_risk_cover").text( " = Rs. "+ response.normal_risk_cover);
                        $("#accident_risk_cover").text( " = Rs. "+ response.accident_risk_cover);

                        if( (parseInt(ui.value) - 1) >= 16 )
                        {
                            $(".d_fab_amount").parentsUntil("tr").show();
                        }
                        else
                        {
                            $(".d_fab_amount").parentsUntil("tr").hide();
                        }
                        
                    },
                    failure:function(data){
                        console.log(data);
                    }
                });
            }
            else
            {
                $(".risk_result").hide();
            }

        });
  }


  var Onlynumber =   /^[0-9]*$/;

  $("#btn-submit").click(function(e){

      e.preventDefault();

      if( plan.val() == '')
      {
          plan.addClass('border-danger');
          return false; 
      }
      else 
      {
        plan.removeClass('border-danger');
      }

      if( name.val() == '')
      {
          name.addClass('border-danger');
          return false; 
      }
      else 
      {
          name.removeClass('border-danger');
      }

      if( age.val() == '')
      {
          age.addClass('border-danger');
          return false; 
      }
      else 
      {
          age.removeClass('border-danger');
      }

      if( sa.val() == '' || !sa.val().match(Onlynumber))
      {
          sa.addClass('border-danger');
          return false; 
      }
      else if( sa.val() < 100000 )
      {
          sa.addClass('border-danger');
          $("#sa_err").text(MIN_SA_ERR).show();
          return false;
      }
      else
      {
          if( sa.val() > 100000 )
          {
              var amt = parseInt(sa.val()) - 100000;
              
              if( ( amt % 5000 ) !== 0 ) 
              {
                  sa.addClass('border-danger');
                  $("#sa_err").text(MULTIPLE_OF_ERR).show();
                  return false;
              }

          }
          sa.removeClass('border-danger');
          $("#sa_err").hide();
      }

      if( term.val() == '')
      {
          term.addClass('border-danger');
          return false; 
      }
      else 
      {
          term.removeClass('border-danger');
      }

      if( plan.val() !='' && name.val() !='' && age.val()!='' && sa.val()!='' && term.val()!='' )
      {
          var formData = $("form").serialize();

          $(".risk_result").hide();
         
          $.ajax({
                type : 'POST',
                url  : 'asyCalculate.php',
                data : formData,
                dataType: "json",
                success:function(data){

                    console.log(data);

                    $(".cal-div").removeClass('cal-div');
                    
                    //show slider
                    change_slider(age.val(), term.val());


                    $("#txtName").text("Mr./Mrs. "+data.name);
                    $("#txtAge").text(data.age);
                    $("#txtSA1").text("Rs." + data.amount);
                    $("#txtTerm").text("Term " + data.term +" Years");

                    $("#yearly_prem_first").text("Rs. " + data.yearly_prem_first);
                    $("#yearly_prem_later").text("Rs. " + data.yearly_prem_later);

                    $("#half_prem_first").text("Rs. " + data.half_prem_first);
                    $("#half_prem_later").text("Rs. " + data.half_prem_later);

                    $("#quarterly_prem_first").text("Rs. " + data.quarterly_prem_first);
                    $("#quarterly_prem_later").text("Rs. " + data.quarterly_prem_later);

                    $("#monthly_prem_first").text("Rs. " + data.monthly_prem_first);
                    $("#monthly_prem_later").text("Rs. " + data.monthly_prem_later);

                    $("#txtSA2").text(data.amount);
                    $("#txtBonusAmount").text(data.bonus_amount);
                    if(data.fab_amount == 0)
                    {
                      $("#txtFABAmount").parent().hide();
                    }
                    else
                    {
                      $("#txtFABAmount").parent().show();
                      $("#txtFABAmount").text(data.fab_amount+"*");  
                    }
                    
                    $("#txtMaturityBenefit").text(data.maturity_benefit+"*");
                    $("#txtExtendBenefit").text(data.extended_benefit);

                    $("#txtBonus").text(data.bonus);
                    if(data.fab == 0)  
                    {
                      $("#txtFAB").parent().hide();
                    }
                    else
                    {
                      $("#txtFAB").parent().show();
                      $("#txtFAB").text(data.fab);  
                    }
                    
                },
                failure:function(data){
                    console.log(data);
                }
          });

          return false;
      }

      return false;

  });
  

  

});  

</script>

  </body>
</html>