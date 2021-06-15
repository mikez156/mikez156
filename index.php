<!DOCTYPE html>
<html>
<head>
<style>

nav > .nav.nav-tabs{

border: none;
  color:#fff;
  background:#272e38;
  border-radius:0;

}
nav > div a.nav-item.nav-link,
nav > div a.nav-item.nav-link.active
{
border: none;
  padding: 18px 25px;
  color:#fff;
  background:#272e38;
  border-radius:0;
}

nav > div a.nav-item.nav-link.active:after
{
content: "";
position: relative;
bottom: -60px;
left: -10%;
border: 15px solid transparent;
border-top-color: #e74c3c ;
}
.tab-content{
background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top:5px solid #e74c3c;
  border-bottom:5px solid #e74c3c;
  padding:30px 25px;
}

nav > div a.nav-item.nav-link:hover,
nav > div a.nav-item.nav-link:focus
{
border: none;
  background: #e74c3c;
  color:#fff;
  border-radius:0;
  transition:background 0.20s linear;
}
  </style>
</head>
<body>

<?php
include 'nav.php';
?>
<div class="container">
              <div class="row">
                <div class="col-xs-12 col-lg-12">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-reg-tab" data-toggle="tab" href="#nav-reg" role="tab" aria-controls="nav-reg" aria-selected="true">Regular Member</a>
                      <a class="nav-item nav-link" id="nav-saver-tab" data-toggle="tab" href="#nav-saver" role="tab" aria-controls="nav-saver" aria-selected="false">Savers</a>
                      <a class="nav-item nav-link" id="nav-senior-tab" data-toggle="tab" href="#nav-senior" role="tab" aria-controls="nav-senior" aria-selected="false">Seniors</a>
                      <a class="nav-item nav-link" id="nav-loan-tab" data-toggle="tab" href="#nav-loan" role="tab" aria-controls="nav-loan" aria-selected="false">Laon</a>
                      <a class="nav-item nav-link" id="nav-td-tab" data-toggle="tab" href="#nav-td" role="tab" aria-controls="nav-td" aria-selected="false">Time Deposit</a>
                      <a class="nav-item nav-link" id="nav-trading-tab" data-toggle="tab" href="#nav-trading" role="tab" aria-controls="nav-trading" aria-selected="false">Trading</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-reg" role="tabpanel" aria-labelledby="nav-reg-tab">
                    <div class="well well-sm">

                            <h3>HOW TO BECOME A MEMBER</h3>
                            <p>&#9658; A Prospect member must be 18 yrs old and above but not more than 60 yrs old.</p>
                            <p>&#9658; Must undergo pre-membership education seminar (PMES).</p>
                            <p>&#9658; Must be gainfully employed with visible means of income.</p>
                            <p>&#9658; Must not have been convicted of any crime.</p>
                            <p>&#9658; Must submit 2 pcs 1x1 ID picture and 2pcs 2x2 ID picture.</p>
                            <p>&#9658; Submit at least 2 valid ID cards</p>
                            <p>&#9658; Birth Certificate & Marriage Contract(if married).</p>
                            <p>&#9658; Tax Identification Number</p>
                            <p>&#9658; Complete membership application form & pay the following:</p>
                            <table class="table table-bordered" style="width:300px">
                            <tbody>
                            <tr>
                            <th scope="row">SHARE CAPITAL</th>
                            <td>5000</td>
                            </tr>
                            <tr>
                            <th scope="row">MEMBERSHIP FEE</th>
                            <td>200</td>
                            </tr>
                            <tr>
                            <th scope="row">MAS PREMIUM</th>
                            <td>400</td>
                            </tr>
                            <tr>
                            <th scope="row">HEALTH CARE PREMIUM</th>
                            <td>250</td>
                            </tr>
                            <tr>
                            <th scope="row">LHC MEMBERSHIP FEE</th>
                            <td>50</td>
                            </tr>
                            <tr>
                            <th scope="row">REGISTRATION FEE</th>
                            <td>50</td>
                            </tr>
                            <tr>
                            <th scope="row">PASSBOOK</th>
                            <td>50</td>
                            </tr>
                            <tr>
                            <th scope="row">TOTAL</th>
                            <th>6000</th>

                            </tr>
                            </tbody>
                            </table>
                            <p>&#9658; <a href="pdf/pmpcRegular.pdf" download="Regular Membership" >Download Regular Membership Form</a></p>
                            <p>&#9658; Or <a href="newmember.php" >Register</a></p>
                            <p>&#9658; <a href="#" >List of Members with Dividen And patronage</a></p>
                            </div>
                            <div class="container">
    <div class="col-md-6">
                      <h3>MEMBER’S BENEFITS:</h3>
           <div class="jumbutron">
               <p>&#9658;Co-Owner of our COOPERATIVE.</p>
               <p>&#9658;Entitled to Interest on Share Capital and Patronage Refund.</p>
               <p>&#9658;MORTUARY AIDE SERVICE:</p>
               <p>&#9658;A benefit given to the beneficiary of a deceased member.</p>
               <p>&#9658;a. MAS Premium is 400</p>
               <p>&#9658;c. Contestability period to be entitled to MAS,benefit is 1 year upon membership.</p>
               <p>&#9658;d. Claiming period is within 2 months.</p>
               <p>&#9658;e. Amount of MAS benefit depends upon the range of membership as follows:</p>
           </div>
            <div class="container">
              <table class="table table-bordered" style="width:300px">
                  <tr>
                      <th>1 yr & 1 day to 3 yrs </th>
                      <th>P 25,000.00 </th>
                  </tr>
                  <tr>
                      <th>3 yrs & 1 day to 5 yrs </th>
                      <th>P 35,000.00</th>
                  </tr>
                  <tr>
                      <th>5 yrs & 1 day to 8 yrs </th>
                      <th>P 50,000.00</th>
                  </tr>
                  <tr>
                      <th>Above 8 yrs </th>
                      <th>P 65,000.00</th>
                  </tr>
              </table>
          </div>
    </div>
    <div class="col-md-6">
        <h3>LUMINGGOPAN HEALTH CARE</h3>
        <p>&#9658;-A hospitalization benefit given to:</p>
        <p>-The member</p>
        <p>-Parent of the member  and is dependent to the member.</p>
        <p>-Children of the member who is 18 years old and below or children who have special cases regardless of age.</p>
        <p>&#9658;Yearly contribution is 250.</p>
        <p>&#9658;LHC benefit is 2,000.</p>
        <p>&#9658;Confined for at least 24 hours.</p>
        <p>&#9658;Claiming period is within 1 month upon discharge.</p>
    </div>
</div>
                    </div> <!--regular end-->

                    <div class="tab-pane fade" id="nav-saver" role="tabpanel" aria-labelledby="nav-saver-tab">
                    <div class="col-lg-12">
                    <h3>Become a Saver</h3>
                            <p>&#9658; 2% Interest per annum.</p>
                            <p>&#9658; No withholding taxes.</p>
                            <p>&#9658; 500 minimum maintaining balance to earn interest.</p>
                        <p>&#9658; <a href="pdf/pmpcSaver.pdf" download="Saver Form">Download Savers Form</a></p>
                        <p>&#9658; Or <a href="newmember.php" >Register</a></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-senior" role="tabpanel" aria-labelledby="nav-senior-tab">
                    <h3>Become a Senior member</h3>
                        <p>&#9658; <a href="#" >Download Senior Form</a></p>
                        <p>&#9658; Or <a href="newmember.php" >Register</a></p>
                        
                    </div>
                    <div class="tab-pane fade" id="nav-loan" role="tabpanel" aria-labelledby="nav-loan-tab">
                    <h3>Loans Services</h3>
    <div class="container-fluid">
        <h3>REGULAR LOAN  ( S/C  X  5 )</h3>
        <p>&#9658;Productive & Providential.</p>
        <h3>SPECIAL LOAN   (  S/C  X  5  )</h3>
        <p>&#9658;For agricultural purposes and special projects.</p>
        <h3>BUSINESS LOAN   (  s/c  x  5  )</h3>
        <p>Additional capital for business.</p>
        <h3>SALARY LOAN/ DEP-ED ACCREDITED  ( s/c  x  10 )</h3>
        <p>For Government and private employees.</p>
        <h3>HOUSING LOAN   (  s/c  x  10  )</h3>
        <p>For house construction or renovation.</p>
        <h3>VEHICLE LOAN   (  S/c  x  10  )</h3>
        <p>For the purchase of car, motorcycle for public or private use.</p>
        <h3>CONTRACTOR’S LOAN  (60% of Proj.  Cost)</h3>
        <p>To finance government projects but not to exceed 1M.</p>
        <h3>SHARE CAPITAL LOAN</h3>
        <h3>EMERGENCY LOAN</h3>
</div>
                    </div>
                    <div class="tab-pane fade" id="nav-td" role="tabpanel" aria-labelledby="nav-td-tab">
                    <h3>Time Deposit</h3>
    <table class="table table-bordered">
  <thead>
      <tr>
          <th colspan="3">REGULAR TIME DEPOSIT RATE FOR REGULAR MEMBERS</th>
      </tr>
      <tr>
          <th>AMOUNT OF DEPOSIT</th>
          <th>TERM</th>
          <th>INTEREST RATE</th>
      </tr>
    </thead>
      <tr>
          <td rowspan="4">10,000-300,000</td>
          <td>3 Mos</td>
          <td>1.0%</td>
      </tr>
      <tr>
          <td>6 Mos</td>
          <td>1.4%</td>
      </tr>
      <tr>
          <td>9 Mos</td>
          <td>2.4%</td>
      </tr>
      <tr>
          <td>12 Mos</td>
          <td>4.0%</td>
      </tr>
        <tr>
            <th colspan="3">LOCK IN TIME DEPOSIT FOR MEMBERS</th>
        </tr>
        <tr>
            <th>AMOUNT OF DEPOSIT</th>
            <th>TERMS</th>
            <th>INTEREST RATE</th>
        </tr>
        <tr>
            <td>1,000,001-2,500,000</td>
            <td>3 Years</td>
            <td>9.0%</td>
        </tr>
        <tr>
            <td>2,500,001 and above</td>
            <td>3 Years</td>
            <td>10%</td>
        </tr>
        <tr>
            <th colspan="3">Regular Time Deposit Rate for Non Member</th>
        </tr>
        <tr>
            <th>AMOUNT OF DEPOSIT</th>
            <th>TERMS</th>
            <th>INTEREST RATE</th>
        </tr>
        <tr>
            <td>10,000-600,000</td>
            <td>12 Mos</td>
            <td>4.0%</td>
        </tr>
        <tr>
            <td>600,001-999,999</td>
            <td>12 Mos</td>
            <td>5.0%</td>
        </tr>
        <tr>
            <td>1,000,000</td>
            <td>12 Mos</td>
            <td>6.0%</td>
        </tr>
        </table>
                    </div>
                    <div class="tab-pane fade" id="nav-trading" role="tabpanel" aria-labelledby="nav-trading-tab">
                    <h3>AGRI TRADING</h3>
        <p>Agri-Products, Feeds, Rice & treads.</p>
        <h3>FOR RENT</h3>
        <p>Plastic chairs, Bats, Solar Dryer & Function Hall.</p>
        <h3>HARDWARE</h3>
        <p>SELECTED HARDWARE PRODUCTS</p>
                    </div>
                  </div>
                
                </div>
              </div>
        </div>
      </div>
</div>
</body>

</html>