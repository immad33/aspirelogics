@include('includes.header')

    <!-- START MAIN CONTENT -->
    <section id="main-content">

      <section class="wrapper">
      	<h3><i class="fa fa-angle-right"></i> Expenses List</h3>
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
	                  	  	  <h4><i class="fa fa-angle-right"></i> Expenses List</h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Amount</th>
                                  <th>Category</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach($expenses as $expense)
                                <tr>
                                    <td>{{$expense->expense_id}}</td>
                                    <td>{{$expense->amount}}</td>
                                    <td>{{$expense->category_id}}</td>
                                    <td>
                                      <a href="{{ route('expenses.edit',$expense->expense_id)}}" class="btn btn-primary btn-xs" style="margin-right:2px;"><i class="fa fa-pencil"></i></a>
                                      <form action="{{ route('expenses.destroy', $expense->expense_id)}}" method="post" style="display:inline-block;">
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

    