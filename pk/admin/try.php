<!--Main layout-->
<main>
  <div class="container-fluid">

      <!--Section: Modals-->
      <section>



      </section>
      <!--Section: Modals-->

      <!--Section: Main panel-->
      <section class="mb-5">

        <!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">

  <!--Section: Main panel-->
<section class="card card-cascade narrower mb-5">

  <!--Grid row-->
  <div class="row">

  <!--Grid column-->
  <div class="col-md-5">



  </div>
  <!--Grid column-->

  <!--Grid column-->
  <div class="col-md-7">



  </div>
  <!--Grid column-->

  </div>
  <!--Grid row-->

</section>
<!--Section: Main panel-->

<!--Grid column-->
<div class="col-md-5">

  <!--Panel Header-->
  <div class="view view-cascade py-3 gradient-card-header info-color-dark">
      <h5 class="mb-0">Sales</h5>
  </div>
  <!--/Panel Header-->

  <!--Panel content-->
  <div class="card-body">

      <!--Grid row-->
      <div class="row">

          <!--Grid column-->
          <div class="col-md-6 mb-4">



          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4 text-center">



          </div>
          <!--Grid column-->

      </div>
      <!--Grid row-->

  </div>
  <!--Panel content-->

</div>
<!--Grid column-->

<!--Date select-->
<p class="lead">
  <span class="badge info-color-dark p-2">Date range</span>
</p>
<select class="mdb-select colorful-select dropdown-info">
  <option value="" disabled>Choose time period</option>
  <option value="1">Today</option>
  <option value="2">Yesterday</option>
  <option value="3">Last 7 days</option>
  <option value="3">Last 30 days</option>
  <option value="3">Last week</option>
  <option value="3">Last month</option>
</select>

<script>
// Material Select Initialization
$(document).ready(function () {
$('.mdb-select').materialSelect();
});
</script>

<!--Date pickers-->
<p class="lead my-4">
  <span class="badge info-color-dark p-2">Custom date</span>
</p>
<div class="md-form">
  <input placeholder="Selected date" type="text" id="from" class="form-control datepicker">
  <label for="from">From</label>
</div>
<div class="md-form">
  <input placeholder="Selected date" type="text" id="to" class="form-control datepicker">
  <label for="to">To</label>
</div>

<script>
// Data Picker Initialization
$('.datepicker').pickadate();
</script>

      </section>
      <!--Section: Main panel-->

      <!--Section: Table-->
      <section class="mb-5">



      </section>
      <!--Section: Table-->

      <!--Section: Accordion-->
      <section class="mb-5">



      </section>
      <!--Section: Accordion-->

  </div>
</main>
<!--Main layout-->