@include('includes.header')
<!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      	<h3><i class="fa fa-angle-right"></i> Categories List</h3>
  	<div class="row">
  	
  	</div><!-- row -->

          <div class="row mt">
              <div class="col-md-12">
              
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                    @if(session()->get('success'))
                    <div class="alert alert-success">
                      {{ session()->get('success') }}  
                    </div><br />
                  @endif
            	  	  <h4><i class="fa fa-angle-right"></i> Categories List</h4>
            	  	  <hr>
                      <thead>
                      <tr>
                          <th>ID</th>
                          <th>Category Name</th>
                          <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->category_name}}</td>
                            <td>
                              <a href="{{ route('category.edit',$category->id)}}" class="btn btn-primary btn-xs" style="margin-right:2px;"><i class="fa fa-pencil"></i></a>
                              <form action="{{ route('category.destroy', $category->id)}}" method="post" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o "></i></button>
                              </form>
                            </td>
                        </tr>
                      @endforeach
                      </tbody>
                  </table>
              </div><!-- /content-panel -->
            </div><!-- /col-md-12 -->
        </div><!-- /row -->

		</section><!--/wrapper -->

  </section><!-- /MAIN CONTENT -->

@include('includes.footer')
    