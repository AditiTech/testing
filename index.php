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
                          <option value="827">Jeevan Rakshak (827)</option>
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
                     <span class="err-txt-centr pt-md-2 text-danger" id="sa_err" style="display: none;"></span>
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
            <tr>
              <td>LA* = <span id="txtLA">25</span></td>
            </tr>
          </tbody></table>
       
       
       
       
        </div>

        <div class="col-md-7 mt-1 text-blue cal-div"> <!-- text -->
        <div class="row">
            <div class="col-md-5">
            <p class="float-left font-weight-bold fs-24" id="maturity_benefit_formula">Maturity Benefit <br>= SA <br>+ Bonus <br>+ FAB</p>
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
            + Rs. <span id="txtLAAmount">50,000</span>
            <span class="badge float-right badge-pill">LA</span>
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
          <table class="border-secondary col-md-4 offset-md-2 table table-bordered text-center">
            <tbody>
              <tr>
                <th></th>
                <th>Half Yearly</th>
                <th>Quarterly</th>
                <th>Monthly</th>
              </tr>
            <tr class="">
              <td>First Year</td>
              <td class=""><span id="half_prem_first"></span></td>
              <td><span id="quarterly_prem_first"></span></td>
              <td><span id="monthly_prem_first"></span></td>
            </tr>
            <tr>
              <td>Subsequent Year</td>
              <td><span id="half_prem_later"></span></td>
              <td><span id="quarterly_prem_later"></span></td>
              <td><span id="monthly_prem_later"></span></td>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>





  <div class="risk_result mb-2 mt-2">

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

  var AGE_LIMIT = 0;
  var MAX_AGE = 0;
  var MIN_AGE = 0;

  var MAX_TERM = 0;
  var MIN_TERM = 0;

  var MIN_SA  = 0; 
  var MAX_SA  = 0; 

  var MULTIPLE_OF_ERR = 'Sum Assured should be in multiples of 5000.';



  plan.change(function(){

      var plan_val = plan.val();
      var opt = '<option value="">Select age</option>';

      $(".risk_result").hide();

      if( plan_val !== '' ) {

          if( plan_val == '814') 
          {
              MAX_AGE = 55; MIN_AGE = 8; MAX_TERM = 35; MIN_TERM = 12;
              MIN_SA = 100000;
              AGE_LIMIT = 75;
          } 
          else if( plan_val == '815') 
          {
              MAX_AGE = 50; MIN_AGE = 18; MAX_TERM = 35; MIN_TERM = 15;
              MIN_SA = 100000;
              AGE_LIMIT = 75;
          }
          else if( plan_val == '827') 
          {
              MAX_AGE = 55; MIN_AGE = 8; MAX_TERM = 20; MIN_TERM = 10;
              MIN_SA = 75000; MAX_SA = 200000;
              AGE_LIMIT = 70;
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

      var max_term = AGE_LIMIT - parseInt(age_val);
      var min_term = 0;

      $(".risk_result").hide();
      
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

  term.change(function(){
    $(".risk_result").hide();
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
            if( plan.val() == 814 || plan.val() == 827)
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
                        
                        
                        if( plan.val() == 814 )
                        {
                          risk_result.empty().html(response.rc_template).show();
                          
                          if( (parseInt(ui.value) - 1) >= 16 )
                          {
                              $(".d_fab_amount").parentsUntil("tr").show();
                          }
                          else
                          {
                              $(".d_fab_amount").parentsUntil("tr").hide();
                          }
                        }
                        else if( plan.val() == 815 )
                        {
                          risk_result.empty().html(response.rc_template).show();

                          if( (parseInt(ui.value) - 1) >= 16 )
                          {
                              $(".d_fab_amount").parentsUntil("tr").show();
                          }
                          else
                          {
                              $(".d_fab_amount").parentsUntil("tr").hide();
                          }
                        }
                        else if( plan.val() == 827 )
                        {
                          risk_result.empty().html(response.rc_template).show();
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
      else if( sa.val() < MIN_SA )
      {
          sa.addClass('border-danger');
          $("#sa_err").text("Minimum Sum Assured is "+MIN_SA).show();
          return false;
      }
      else if( MAX_SA != 0 && sa.val() > MAX_SA )
      {
          sa.addClass('border-danger');
          $("#sa_err").text("Maximum Sum Assured is "+MAX_SA).show();
          return false;
      }
      else
      {
          if( sa.val() > MIN_SA )
          {
              var amt = parseInt(sa.val()) - MIN_SA;
              
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


                    // change maturity formula label 
                    if( plan.val() == 814 )
                    {
                      $("#maturity_benefit_formula").html('Maturity Benefit <br>= SA <br>+ Bonus <br>+ FAB');
                      $("#txtBonusAmount").parent().show();
                      $("#txtBonusAmount").text(data.bonus_amount);
                      $("#txtLAAmount").parent().hide();
                      $("#txtBonus").text(data.bonus);
                      if(data.fab == 0)  
                      {
                        $("#txtFAB").parent().hide();
                        $("#txtFABAmount").parent().hide();
                      }
                      else
                      {
                        $("#txtFAB").parent().show();
                        $("#txtFAB").text(data.fab);
                        $("#txtFABAmount").parent().show();
                        $("#txtFABAmount").text(data.fab_amount+"*");    
                      } 
                      $("#txtLA").parent().hide();
                    }
                    else if( plan.val() == 815 )
                    {
                      $("#maturity_benefit_formula").html('Maturity Benefit <br>= SA <br>+ Bonus <br>+ FAB');
                      $("#txtBonusAmount").parent().show();
                      $("#txtBonusAmount").text(data.bonus_amount);
                      $("#txtLAAmount").parent().hide();
                      $("#txtBonus").text(data.bonus);
                    
                      $("#txtFAB").parent().show();
                      $("#txtFAB").text(data.fab); 
                      $("#txtFABAmount").parent().show();
                      $("#txtFABAmount").text(data.fab_amount+"*"); 
                      $("#txtLA").parent().hide(); 
                    }
                    else if( plan.val() == 827 )
                    {
                      $("#maturity_benefit_formula").html('Maturity Benefit <br>= SA <br>+ LA');
                      $("#txtLAAmount").parent().show();
                      $("#txtLAAmount").text(data.la_amount);
                      $("#txtBonusAmount").parent().hide();

                      $("#txtLA").text(data.la);
                      $("#txtLA").parent().show();
                      $("#txtBonus").parent().hide();
                      $("#txtFAB").parent().hide();
                    }
                    
                    $("#txtMaturityBenefit").text(data.maturity_benefit+"*");
                    $("#txtExtendBenefit").text(data.extended_benefit);

                    
                    
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