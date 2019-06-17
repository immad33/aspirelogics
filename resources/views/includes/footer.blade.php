
    <!--footer start-->
        <footer class="site-footer">
            <div class="text-center">
                2014 - Alvarez.is
                <a href="form_component.html#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui-1.9.2.custom.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.touch-punch.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('assets/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    

    <!--common script for all pages-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>    <script src="{{ asset('assets/js/common-scripts.js') }}"></script>
   
  <script>

    $(function() {

      $('.date-picker').datepicker( {
          changeMonth: true,
          changeYear: true,
          showButtonPanel: true,
          dateFormat: 'MM yy',
          onClose: function(dateText, inst) { 
              
              function isDonePressed(){
                  return ($('#ui-datepicker-div').html().indexOf('ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all ui-state-hover') > -1);
              }

              if (isDonePressed()){

                  var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                  var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                  $(this).datepicker('setDate', new Date(year, month, 1));

              }
              
            
          }

      });

    });
  
  
      var ctx = document.getElementById('myChart').getContext('2d');
      

      $(document).ready(function(){
        getGraphData();
      });

      $('#category').on('change', function(){
        getGraphData();
      });

      function getGraphData() {

          var token     = $('meta[name="csrf-token"]').attr('content');
          var category_id = $('#category').val();

          $.ajax({
              type:'GET',
              url:'liveData',
              cache: false,
              dataType:'json',
              data:{_token: token, category_id : category_id},
              success: function(res){
                
                  var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'line',

                    // The data for our dataset
                    data: {
                        labels: res.month,
                        datasets: [{
                            label: $("#category option:selected").text()+' Expense',
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(255, 99, 132)',
                            data: res.data
                        }]
                    },

                    // Configuration options go here
                    options: {}
                });

              }

            });
      }
  

  </script>

  </body>
</html>
  