@include('includes.header')
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Category Form</h3>
        
        <!-- BASIC FORM ELELEMNTS -->
        <div class="row mt">
          <div class="col-lg-12">
              <div class="form-panel">
                  <h4 class="mb"><i class="fa fa-angle-right"></i> Expenses Form</h4>
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif
                  <form class="form-horizontal style-form" method="post" action="{{ route('expenses.update', $expense->expense_id) }}">
                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Expense Amount</label>
                          <div class="col-sm-10">
                              @csrf
                              @method('PATCH')
                              <input type="text" class="form-control" name="amount" value="{{ $expense->amount }}">
                              <input type="hidden" name="user_id" value="{{ $expense->user_id }}">
                          </div>
                      </div> 

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Expense Date</label>
                          <div class="col-sm-10">
                          <div class="input-group date" data-provide="datepicker">
                              <input type="text" class="form-control" name="date" value="{{ $expense->date }}">
                              <div class="input-group-addon">
                                  <span class="glyphicon glyphicon-th"></span>
                              </div>
                          </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Category</label>
                          <div class="col-sm-10">
                            <select class="form-control" name="category_id">
                              @foreach($categories_list as $category)
                              <option value="{{ $category->id }}" {{ ($expense->category_id == $category->id) ? 'selected' : ''}}>{{ $category->category_name }}</option>
                              @endforeach
                            </select>
                          </div>
                      </div>
                      
                      <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create Expense</button>
                      </div>
                  </form>
              </div>
          </div><!-- col-lg-12-->       
        </div><!-- /row -->
        
    </section><!--/wrapper -->

  </section><!-- /MAIN CONTENT -->

@include('includes.footer')


