@include('includes.header')
  
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
          <h3><i class="fa fa-angle-right"></i> Dashboard</h3>
          <div class="row mt">
              <div class="col-lg-12">
                  <select class="form-control" name="category_id" id="category">
                    @foreach($categories_list as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
              </div>
          </div>
          <canvas id="myChart"></canvas>
      </section><!--/wrapper -->
    </section><!-- /MAIN CONTENT -->

    <!--main content end-->

  @include('includes.footer')

