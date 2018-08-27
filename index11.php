<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <link rel="stylesheet" href="assets/css/custom.css" >

    <title>LIC Calculator</title>
  </head>
<body>


    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">

      <nav class="navbar navbar-light">
        <a class="navbar-brand" href="#">LIC-Calculator</a>
      </nav>

    </nav>

    <div class="container-fluid">
      
      <div class="row mt-5">

        <div class="col-md-2 mt-5"> <!-- img -->
          <img src="" class="img img-responsive">
        </div>

        <div class="col-md-4 mt-5"> <!-- text -->
            <p class="text-center fs-26"> <span id="txtName">Mr. Goodwill</span> aged <span id="txtAge">35</span> years 
              <br> <b>Sum Assured</b> <span id="txtSA1">20 Lacs</span>
              <br> <span id="txtTerm">Term 16 Years</span></p>
            <p class="font-weight-bold text-center">First Year Premium : <span id="yearly_prem_first">1,58,740</span></p>
            <p class="font-weight-bold text-center">Subsequent Year Premium : <span id="yearly_prem_later">1,54,735</span></p>
        </div>

        <div class="col-md-5 mr-0 mt-5 pr-0 text-blue"> <!-- text -->
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

      <div class="row">
        <p class=" col-md-2 offset-6 text-blue font-weight-bold fs-24">Extended Benefit</p>
        <ul class="col-md-3 list-group text-center textValue pr-0">
          <li class="bg-danger border-left-radius font-weight-bold list-group-item mb-1 mt-1 pt-1 pb-1"> 
            Rs. <span id="txtExtendBenefit">20,00,000</span>
            <span class="badge float-right badge-pill">Upto 100 years</span>
        </li>
        </ul>
      </div>

     <div class="row">
        <div class="col-2 offset-9">
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

      <div class="row mt-5 mb-5">

            <div class="col offset-2">
                <form method="POST" id="cal_form">

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="">Name</label>
                      <input type="text" class="form-control col-md-5" id="name" name="name" value="GoodWill">
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="">Age</label>
                      <select class="form-control col-md-5" id="age" name="age">
                        <?php
                          for($i=18; $i <= 50; $i++)
                          {
                            echo "<option value='$i'>$i</option>";
                          }
                        ?>  
                      </select>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="">Sum Assured</label>
                      <input type="number" class="form-control col-md-5" id="sa" name="sa" value="100000" >
                      <span class="text-danger" id="sa_err" style="display: none;"></span>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 col-form-label" for="">Term</label>
                       <select class="form-control col-md-5" id="term" name="term">
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
                  
                    <button type="submit" class="btn btn-primary" id="btn-submit">Submit</button>
                    <input type="hidden" name="formType" value="calculate">
                </form>
            </div>

            <div class="col mt-5">
              <div id="result"></div>
            </div>
      </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.3.1.min.js" ></script>
    <script src="assets/js/popper.min.js" ></script>
    <script src="assets/js/bootstrap.min.js" ></script>

<script type="text/javascript">

$(document).ready(function(){

  var name = $("#name");
  var age = $("#age");
  var sa = $("#sa");
  var term = $("#term");

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

                    console.log(data);

                    $("#txtName").text("Mr. "+data.name);
                    $("#txtAge").text(data.age);
                    $("#txtSA1").text("Rs." + data.amount);
                    $("#txtTerm").text("Term " + data.term +"Years");

                    $("#yearly_prem_first").text("Rs. " + data.yearly_prem_first);
                    $("#yearly_prem_later").text("Rs. " + data.yearly_prem_later);

                    $("#txtSA2").text(data.amount);
                    $("#txtBonusAmount").text(data.bonus_amount);
                    $("#txtFABAmount").text(data.fab_amount);
                    $("#txtMaturityBenefit").text(data.maturity_benefit);
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