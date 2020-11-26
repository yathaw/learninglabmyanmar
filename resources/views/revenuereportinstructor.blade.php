<x-frontend>
  <section>
    <h2 class="text-center pb-5">Revenue Report</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="over mb-3">$0.00</h2>
          <p>Your Lifetime Earnings as of Mar 7,2020</p>
          <div class="card cardbody mt-5 mb-5">
            <div class="chart-pie">
                <canvas id="myAreaChart"></canvas>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <table class="table table-hover">
                <thead>
                  <th>Time Period</th>
                  <th>Pre-tax Amount</th>
                  <th>Withholding Tax</th>
                  <th>Net Earnings</th>
                  <th>Expected Payment Date</th>
                </thead>
                <tbody>
                  <tr>
                    <td>Mar 2020</td>
                    <td>$15.74</td>
                    <td>$1.95</td>
                    <td>$13.79</td>
                    <td>May 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Jan 2020</td>
                    <td>$137.35</td>
                    <td>$19.77</td>
                    <td>$117.58</td>
                    <td>Mar 05, 2020</td>
                  </tr>
                  <tr>
                    <td>Dec 2020</td>
                    <td>$118.39</td>
                    <td>$0.00</td>
                    <td>$118.39</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                  <tr>
                    <td>Feb 2020</td>
                    <td>$207.62</td>
                    <td>$29.55</td>
                    <td>$178.07</td>
                    <td>Apr 08, 2020</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @section('script_content')
    <script src="{{ asset('plugin/Chart.min.js') }}"></script>
    <script src="{{ asset('plugin/chart-area-demo.js') }}"></script>
  @stop
</x-frontend>