@if(count($errors) > 0)
<section class="col-lg- connectedSortable">
          <div class="nav-tabs-custom">
                  @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert"
                            aria-hidden="true">
                        &times;
                    </button>
                    {{$error}}
                </div>
                  @endforeach
          </div>
</section>
@endif
