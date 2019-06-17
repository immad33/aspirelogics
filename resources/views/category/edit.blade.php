@include('includes.header')
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
      	<h3><i class="fa fa-angle-right"></i> Category Form</h3>
      	
      	<!-- BASIC FORM ELELEMNTS -->
      	<div class="row mt">
      		<div class="col-lg-12">
              <div class="form-panel">
              	  <h4 class="mb"><i class="fa fa-angle-right"></i> Category Form</h4>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif
                  <form class="form-horizontal style-form" method="post" action="{{ route('category.update', $category->id) }}">
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
                          <div class="col-sm-10">
                              @csrf
                              @method('PATCH')
                              <input type="text" class="form-control" name="category_name" value="{{$category->category_name}}">
                          </div>
                      </div>
                      
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary">Update Category</button>
                      </div>
                  </form>
              </div>
      		</div><!-- col-lg-12-->      	
      	</div><!-- /row -->
      	
    </section><!--/wrapper -->

  </section><!-- /MAIN CONTENT -->

@include('includes.footer')
