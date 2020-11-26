<x-frontend>
  <section>
    <h1 class="text-center pb-5 over">Overview</h1>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card text-center shadow-sm">
            <div class="card-header cardhead">
              <!-- <div class="row">
                <div class="col-md-3">
                  <p>Total revenue</p>
                  <h2>$0.00</h2>
                  <span>$0.00 this month</span>
                </div>
                <div class="col-md-3">
                  <p>Total enrollments</p>
                  <h2>0</h2>
                  <span>0 this month</span>
                </div>
                <div class="col-md-3">
                  <p>Instructor rating</p>
                  <h2>0.00</h2>
                  <span>0.00 this month</span>
                </div>
              </div> -->
              <ul class="nav nav-pills card-header-pills navheader">
                <li class="nav-item">
                  
                  <a class="nav-link active nab" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" data-target="#pills-home, #pills-home1">
                    <p>Total revenue</p>
                    <h2>$0.00</h2>
                    <span>$0.00 this month</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link nab" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true" data-target="#pills-profile, #pills-profile_else">
                    <p>Total enrollments</p>
                    <h2>0</h2>
                    <span>0 this month</span>
                  </a>

                </li>
                <li class="nav-item">
                  <a class="nav-link nab" id="pills-rating-tab" data-toggle="pill" href="#pills-rating" role="tab" aria-controls="pills-rating" aria-selected="true" data-target="#pills-rating, #pills-rating_else">
                    <p>Instructor rating</p>
                    <h2>0.00</h2>
                    <span>0 ratings this month</span>
                  </a>
                </li>
              </ul>
            </div>
            <div class="card-body cardbody">
              
              <div class="row">
                <div class="offset-md-8 col-md-2">
                  <span>Date range:</span>
                </div>
                <div class="col-md-2">
                  <select class="form-select">
                    <option>All time</option>
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 12 months</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="home-tab">
                      <p class="mt-5 mb-5 pb-5">No data to display</p>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="profile-tab">  <p class="mt-5 mb-5 pb-5">No data to display1</p>
                    </div>
                    <div class="tab-pane fade" id="pills-rating" role="tabpanel" aria-labelledby="rating-tab">
                      <p class="mt-5 mb-5 pb-5">No data to display2</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer cardfooter">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="home-tab">
                  <a href="#">Revenue Report <i class="bx bx-chevron-right"></i></a>
                 
                </div>

                <div class="tab-pane fade show" id="pills-profile_else" role="tabpanel" aria-labelledby="profile-tab">   
                  <a href="#">Enrollment  <i class="bx bx-chevron-right"></i></a>
                </div>

                <div class="tab-pane fade show" id="pills-rating_else" role="tabpanel" aria-labelledby="profile-tab">   
                  <a href="#">Rating  <i class="bx bx-chevron-right"></i></a>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @section('script_content')
  <script type="text/javascript">
    $(document).ready(function(){
      $('a[data-toggle="pill"]').on('shown.bs.tab', function (e) {
        
      var activated_tab = e.target // activated tab
      var previous_tab = e.relatedTarget // previous tab
      
      if(activated_tab.id === 'pills-home-tab') {
        $('#pills-home1').addClass('active');
        $('#pills-profile_else').removeClass('active');
        $('#pills-rating_else').removeClass('active');
      };
      if(activated_tab.id === 'pills-profile-tab') {
        $('#pills-home1').removeClass('active');
        $('#pills-profile_else').addClass('active');
        $('#pills-rating_else').removeClass('active');
      }
      if(activated_tab.id === 'pills-rating-tab') {
        $('#pills-home1').removeClass('active');
        $('#pills-profile_else').removeClass('active');
        $('#pills-rating_else').addClass('active');
      }
    })
    })
  </script>
  @stop
</x-frontend>