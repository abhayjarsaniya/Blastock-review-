<style>
  .datepicker {
    z-index: 1200 !important;
  }
</style>

<div class="modal-dialog modal-md">
  <div class="modal-content">
    {!! Form::open(['route' => 'admin.admin.deliveryboy.store', 'files' => true, 'id' => 'form', 'data-toggle' => 'validator']) !!}
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      {{ trans('app.form.form') }}
    </div>
    <div class="modal-body">
      @include('admin.deliveryboy._form')
    </div>
    <div class="modal-footer">
      {!! Form::submit(trans('app.form.save'), ['class' => 'btn btn-flat btn-new']) !!}
    </div>
    {!! Form::close() !!}
  </div> <!-- / .modal-content -->
</div> <!-- / .modal-dialog -->
