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

    <title>LIC Calculator</title>
  </head>
<body>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

      <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">LIC-Calculator</a>
      </nav>

    </nav>

    <div class="container-fluid pt-5">

      <div class="row mt-5 mb-3">
          
            <!--image-->
            <div class="offset-md-1 col-md-4 text-center">
                <img src="images/lic-thumb.png" alt="lic-image" class="lic-thumb-img">
            </div>

            <div class="col-md-6">
                <form method="POST" class="cal-lic-form" id="cal_form">

                    <div class="form-group row">
                      <label class="col-4 col-md-3 col-form-label" for="">Name</label>
                      <input type="text" class="form-control col-8 col-md-6" id="name" name="name" value="namrata">
                    </div>

                    <div class="form-group row">
                      <label class="col-4 col-md-3 col-form-label" for="">Age</label>
                      <select class="form-control col-8 col-md-6" id="age" name="age">
                        <?php
                          for($i=18; $i <= 50; $i++)
                          {
                            echo "<option value='$i'>$i</option>";
                          }
                        ?>  
                      </select>
                    </div>

                    <div class="form-group row">
                      <label class="col-4 col-md-3 col-form-label" for="">Sum Assured</label>
                      <input type="number" class="form-control col-8 col-md-6" id="sa" name="sa" value="100000">
                      <span class="text-danger" id="sa_err" style="display: none;"></span>
                    </div>

                    <div class="form-group row">
                      <label class="col-4 col-md-3 col-form-label" for="">Term</label>
                       <select class="form-control col-8 col-md-6" id="term" name="term">
                        <?php
                          for($i=15; $i <= 35; $i++)
                          {
                            echo "<option value='$i'>$i</option>";
                          }
                        ?>  
                      </select>
                    </div>
                  
                    <!-- <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    </div> -->
                  
                     <div class="form-group row">
                         <button type="submit" class="btn btn-primary col-3 offset-md-3" id="btn-submit">Submit</button>
                         <input type="hidden" name="formType" value="calculate">
                     </div>
                  
                  
                  
                    
                </form>
            </div>

            <div class="col mt-5">
              <div id="result"></div>
            </div>
      </div>
      
      <div class="row mt-3 cal-div">

       <!-- <div class="col-md-2 mt-5"> 
          <img src="" class="img img-responsive">
        </div>-->

        <div class="col-md-5 mt-3"> <!-- text -->
            <p class="text-center fs-26"> <span id="txtName">Mr. Goodwill</span> aged <span id="txtAge">35</span> years 
              <br> <b>Sum Assured</b> <span id="txtSA1">20 Lacs</span>
              <br> <span id="txtTerm">Term 16 Years</span></p>
            <p class="font-weight-bold text-center">First Year Premium : <span id="yearly_prem_first">1,58,740</span></p>
            <p class="font-weight-bold text-center">Subsequent Year Premium : <span id="yearly_prem_later">1,54,735</span></p>
        </div>

        <div class="col-md-7 mr-0 mt-3 pr-0 text-blue"> <!-- text -->
            <p class="col-md-5 float-left font-weight-bold fs-24">Maturity Benefit <br>= SA <br>+ Bonus <br>+ FAB</p>
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
          </ul>

        </div>

      </div>

      <div class="row cal-div">
        <p class=" col-md-2 offset-6 text-blue font-weight-bold fs-24">Extended Benefit</p>
        <ul class="col-md-4 list-group text-center textValue pr-0">
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
            Rs. <span id="txtExtendBenefit">20,00,000</span>
            <span class="badge float-right badge-pill">Upto 100 years</span>
        </li>
        </ul>
      </div>

     <div class="row mb-5 mt-5 cal-div">
         
     
     
     
     
     
     
     
     
     
     
     
         <div class="col-md-6 push-md-6">
          
          
       
           <div class="risk_result mb-5">
          
    
          
        <table class="table table-bordered table-responsive col-md-6 col-6 border-0 text-center" style="float:left;">
          <tbody style="float:right;">
          <tr>
            <td><b>If death occurs at age <span id="s_age"></span></b></td>
          </tr>
          <tr>
            <td class="text-blue"><b>(BSA + Bonus + FAB)</b></td>
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
        <table class="table table-bordered table-responsive col-md-6 col-6 border-0 text-white text-center">
          <tbody class="bg-danger ">
          <tr>
            <td><b>In case of accidental death</b></td>
          </tr>
          <tr>
            <td class="text-blue"><b>(DSA + Bonus + FAB)</b></td>
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
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         <!--image-->
      
             <div class="col-md-6 pull-md-6">
                    <div class="row">
         <div class="col-md-6 text-center">
             <img src="images/lic-family.png" class="lic-family-img" alt="familyilic">
         </div>
         
         
        <div class="col-md-6">
          <table class="font-weight-bold table table-bordered text-center">
            <tbody><tr>
              <td>Bonus = <span id="txtBonus">45</span></td>
            </tr>
            <tr>
              <td>FAB* = <span id="txtFAB">25</span></td>
            </tr>
          </tbody></table>
        </div>
      </div>
      
      </div><!--nw col 6-->
      </div><!--row-->

      <div class="p-5">
        <div id="double-label-slider"></div>
      </div>

     
      
      <p class="text-danger"><b>* Based on assumptions</b></p>
      <p><b>Disclaimer</b> : Example qouted above are just for illustration purpose based on the benefit illustration</p>
      <p>As per IRDA norms 4% and 8% illustrations available with LIC</p>
    </div>

    <div class="footer text-right ">
      <div class="bg-dark text-white p-2" >@lic-calculator</div>
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

  var name = $("#name");
  var age = $("#age");
  var sa = $("#sa");
  var term = $("#term");

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

             $.ajax({
                type : 'POST',
                url  : 'asyRiskCoverCalculate.php',
                data : {
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
            

    });
  }

  

  var Onlynumber =   /^[0-9]*$/;

  age.change(function(){

      var age_val = age.val();

      var max_term = 75 - parseInt(age_val);

      max_term = (max_term < 50 ) ? max_term : 50;  

      var opt = '';
      for( i = 15; i <= max_term; i++)
      {
        opt += '<option value="'+i+'">'+i+'</option>';
      }

      term.empty().append(opt);

  });

  $("#btn-submit").click(function(e){

      e.preventDefault();

      if( name.val() == '')
      {
          name.addClass('border-danger');
          return false; 
      }
      else 
      {
        name.removeClass('border-danger');
      }

      if( sa.val() == '' || !sa.val().match(Onlynumber))
      {
          sa.addClass('border-danger');
          return false; 
      }
      else if( sa.val() < 100000 )
      {
          sa.addClass('border-danger');
          $("#sa_err").text('Minimum Sum Assured is 100000').show();
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
                  $("#sa_err").text('Sum Assured should in multiples of 5000.').show();
                  return false;
              }

          }
          sa.removeClass('border-danger');
          $("#sa_err").hide();
      }

      if( name.val() !='' && age.val()!='' && sa.val()!='' && term.val()!='' )
      {
          var formData = $("form").serialize();
         
          $.ajax({
                type : 'POST',
                url  : 'asyCalculate.php',
                data : formData,
                dataType: "json",
                success:function(data){

                    $(".cal-div").removeClass('cal-div');
                    
                    //show slider
                    change_slider(age.val(), term.val());

                    console.log(data);

                    $("#txtName").text("Mr./Mrs. "+data.name);
                    $("#txtAge").text(data.age);
                    $("#txtSA1").text("Rs." + data.amount);
                    $("#txtTerm").text("Term " + data.term +" Years");

                    $("#yearly_prem_first").text("Rs. " + data.yearly_prem_first);
                    $("#yearly_prem_later").text("Rs. " + data.yearly_prem_later);

                    $("#txtSA2").text(data.amount);
                    $("#txtBonusAmount").text(data.bonus_amount);
                    $("#txtFABAmount").text(data.fab_amount+"*");
                    $("#txtMaturityBenefit").text(data.maturity_benefit+"*");
                    $("#txtExtendBenefit").text(data.extended_benefit);

                    $("#txtBonus").text(data.bonus);
                    $("#txtFAB").text(data.fab);
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